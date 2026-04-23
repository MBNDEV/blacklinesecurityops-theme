<?php
/**
 * Nav Menu Sync - Export/Import WordPress navigation menus to/from PHP files.
 *
 * Exports all nav_menu terms + items to template-parts/nav-menus/*.php for Git tracking.
 * On import, resolves post slugs and term slugs to local IDs so menus work across environments.
 *
 * Workflow:
 *   Local  → edit in Appearance > Menus → Export → commit to Git → push
 *   Remote → pull Git → Block Templates > Nav Menu Sync → Import
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

/**
 * Absolute path to the nav menu export directory.
 *
 * @return string No trailing slash.
 */
function custom_theme_nav_menus_export_dir(): string {
	return get_theme_file_path( 'template-parts/nav-menus' );
}

/**
 * Ensure the export directory exists and is writable.
 *
 * @throws Exception If the directory cannot be created or written to.
 */
function custom_theme_nav_menus_ensure_export_dir(): void {
	$dir = custom_theme_nav_menus_export_dir();
	if ( ! is_dir( $dir ) ) {
		wp_mkdir_p( $dir );
	}
	if ( ! is_dir( $dir ) ) {
		throw new Exception( sprintf( 'Could not create directory: %s', esc_html( $dir ) ) );
	}
	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_is_writable
	if ( ! is_writable( $dir ) ) {
		throw new Exception( sprintf( 'Directory is not writable: %s', esc_html( $dir ) ) );
	}
}

/**
 * Resolve a post_type menu item's object_id from a post slug.
 *
 * @param string $post_type Post type (e.g. 'page', 'post').
 * @param string $slug      Post slug.
 * @return int Post ID, or 0 if not found.
 */
function custom_theme_nav_resolve_post_id( string $post_type, string $slug ): int {
	$post = get_page_by_path( $slug, OBJECT, $post_type );
	if ( $post instanceof WP_Post ) {
		return (int) $post->ID;
	}

	$posts = get_posts(
		array(
			'post_type'              => $post_type,
			'name'                   => $slug,
			'post_status'            => 'any',
			'numberposts'            => 1,
			'fields'                 => 'ids',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		)
	);

	return ! empty( $posts ) ? (int) $posts[0] : 0;
}

/**
 * Resolve a taxonomy menu item's object_id from a term slug.
 *
 * @param string $taxonomy Taxonomy name.
 * @param string $slug     Term slug.
 * @return int Term ID, or 0 if not found.
 */
function custom_theme_nav_resolve_term_id( string $taxonomy, string $slug ): int {
	$term = get_term_by( 'slug', $slug, $taxonomy );
	return ( $term instanceof WP_Term ) ? (int) $term->term_id : 0;
}

// ---------------------------------------------------------------------------
// Export
// ---------------------------------------------------------------------------

/**
 * Serialize a single WP_Term (nav_menu) to a PHP file.
 *
 * Post/page items are stored by slug so they resolve correctly on any environment.
 * Custom (external) links are stored verbatim — use relative URLs (e.g. /contact)
 * so they remain portable.
 * Parent relationships are stored as 0-based array indices, not database IDs.
 *
 * @param WP_Term $menu Nav menu term.
 * @return string Absolute path to the written file.
 * @throws Exception On write failure.
 */
function custom_theme_export_nav_menu( WP_Term $menu ): string {
	$raw_items = wp_get_nav_menu_items( $menu->term_id );
	$raw_items = is_array( $raw_items ) ? $raw_items : array();

	// Build item-ID → array-index map for parent resolution.
	$id_to_index = array();
	foreach ( $raw_items as $i => $item ) {
		$id_to_index[ (int) $item->ID ] = $i;
	}

	$items = array();
	foreach ( $raw_items as $i => $item ) {
		$parent_index = -1;
		$parent_db_id = (int) $item->menu_item_parent;
		if ( $parent_db_id > 0 && isset( $id_to_index[ $parent_db_id ] ) ) {
			$parent_index = $id_to_index[ $parent_db_id ];
		}

		$entry = array(
			'title'        => $item->title,
			'type'         => $item->type,    // 'post_type' | 'taxonomy' | 'custom'
			'object'       => $item->object,  // 'page' | 'post' | 'category' | 'custom' etc.
			'url'          => $item->url,
			'target'       => $item->target,
			'attr_title'   => $item->attr_title,
			'description'  => $item->description,
			'classes'      => array_values( array_filter( (array) $item->classes ) ),
			'xfn'          => $item->xfn,
			'order'        => (int) $item->menu_order,
			'parent_index' => $parent_index,
		);

		// Store a portable slug for post_type items.
		if ( 'post_type' === $item->type && $item->object_id > 0 ) {
			$post = get_post( (int) $item->object_id );
			if ( $post instanceof WP_Post ) {
				$entry['object_slug'] = $post->post_name;
			}
		}

		// Store taxonomy + slug for taxonomy items.
		if ( 'taxonomy' === $item->type && $item->object_id > 0 ) {
			$term = get_term( (int) $item->object_id );
			if ( $term instanceof WP_Term ) {
				$entry['object_slug']     = $term->slug;
				$entry['object_taxonomy'] = $term->taxonomy;
			}
		}

		$items[] = $entry;
	}

	// Collect which registered theme locations this menu is assigned to.
	$all_locations    = get_nav_menu_locations();
	$menu_locations   = array();
	foreach ( $all_locations as $location => $menu_id ) {
		if ( (int) $menu_id === (int) $menu->term_id ) {
			$menu_locations[] = $location;
		}
	}

	// Build the PHP file content.
	$data = array(
		'name'      => $menu->name,
		'slug'      => $menu->slug,
		'locations' => $menu_locations,
		'items'     => $items,
	);

	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_var_export -- used for file serialization, not debugging.
	$exported_array = var_export( $data, true );

	$file_content  = "<?php\n";
	$file_content .= "/**\n";
	$file_content .= " * Nav Menu: {$menu->name}\n";
	$file_content .= " *\n";
	$file_content .= " * Auto-exported by Theme Nav Menu Sync.\n";
	$file_content .= " * Edit menus in Appearance > Menus, then re-export via\n";
	$file_content .= " * Block Templates > Nav Menu Sync.\n";
	$file_content .= " *\n";
	$file_content .= " * NOTE: Post/page items are stored as slugs for portability.\n";
	$file_content .= " * Custom links: use relative URLs (e.g. /contact) to stay portable.\n";
	$file_content .= " *\n";
	$file_content .= " * @package CustomTheme\n";
	$file_content .= " */\n\n";
	$file_content .= 'return ' . $exported_array . ";\n";

	custom_theme_nav_menus_ensure_export_dir();

	$file_path = custom_theme_nav_menus_export_dir() . '/' . sanitize_file_name( $menu->slug ) . '.php';

	global $wp_filesystem;
	if ( empty( $wp_filesystem ) ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		WP_Filesystem();
	}

	if ( false === $wp_filesystem->put_contents( $file_path, $file_content, FS_CHMOD_FILE ) ) {
		throw new Exception( sprintf( 'Failed to write: %s', esc_html( $file_path ) ) );
	}

	return $file_path;
}

/**
 * Export every registered nav menu to its own PHP file.
 *
 * @return array{ exported: int, errors: string[] }
 */
function custom_theme_export_all_nav_menus(): array {
	$menus    = wp_get_nav_menus();
	$exported = 0;
	$errors   = array();

	foreach ( $menus as $menu ) {
		try {
			custom_theme_export_nav_menu( $menu );
			++$exported;
		} catch ( Exception $e ) {
			$errors[] = $menu->name . ': ' . $e->getMessage();
		}
	}

	return array(
		'exported' => $exported,
		'errors'   => $errors,
	);
}

// ---------------------------------------------------------------------------
// Import
// ---------------------------------------------------------------------------

/**
 * Validate the raw data array from a nav menu PHP file.
 *
 * @param mixed  $data     Data loaded from the file.
 * @param string $filename File basename for error messages.
 * @throws Exception If required keys are missing or types are wrong.
 */
function custom_theme_validate_nav_menu_file_data( $data, string $filename ): void {
	if ( ! is_array( $data ) ) {
		throw new Exception( sprintf( 'Invalid format in %s: expected array.', esc_html( $filename ) ) );
	}
	foreach ( array( 'name', 'slug', 'items' ) as $required ) {
		if ( ! isset( $data[ $required ] ) ) {
			throw new Exception( sprintf( 'Missing required key "%s" in %s.', esc_html( $required ), esc_html( $filename ) ) );
		}
	}
}

/**
 * Create or retrieve a nav menu by slug; update its name if it already exists.
 *
 * @param string $name Menu display name.
 * @param string $slug Menu slug.
 * @return int Menu term_id.
 * @throws Exception If creation fails.
 */
function custom_theme_nav_get_or_create_menu( string $name, string $slug ): int {
	$existing = wp_get_nav_menu_object( $slug );
	if ( $existing instanceof WP_Term ) {
		return (int) $existing->term_id;
	}

	$result = wp_create_nav_menu( $name );
	if ( is_wp_error( $result ) ) {
		throw new Exception( $result->get_error_message() );
	}

	return (int) $result;
}

/**
 * Build the wp_update_nav_menu_item() args for one serialized item.
 * Does NOT set parent-id — that is handled in a second pass.
 *
 * @param array $item Serialized menu item.
 * @param int   $pos  1-based menu order position.
 * @return array
 */
function custom_theme_nav_build_item_args( array $item, int $pos ): array {
	$args = array(
		'menu-item-title'       => sanitize_text_field( $item['title'] ?? '' ),
		'menu-item-type'        => sanitize_text_field( $item['type'] ?? 'custom' ),
		'menu-item-object'      => sanitize_text_field( $item['object'] ?? 'custom' ),
		'menu-item-url'         => esc_url_raw( $item['url'] ?? '' ),
		'menu-item-target'      => sanitize_text_field( $item['target'] ?? '' ),
		'menu-item-attr-title'  => sanitize_text_field( $item['attr_title'] ?? '' ),
		'menu-item-description' => sanitize_text_field( $item['description'] ?? '' ),
		'menu-item-classes'     => implode( ' ', array_map( 'sanitize_html_class', (array) ( $item['classes'] ?? array() ) ) ),
		'menu-item-xfn'         => sanitize_text_field( $item['xfn'] ?? '' ),
		'menu-item-position'    => isset( $item['order'] ) ? (int) $item['order'] : $pos,
		'menu-item-status'      => 'publish',
		'menu-item-parent-id'   => 0,
	);

	$type   = $args['menu-item-type'];
	$object = $args['menu-item-object'];
	$slug   = sanitize_title( $item['object_slug'] ?? '' );

	if ( 'post_type' === $type && '' !== $slug ) {
		$post_id = custom_theme_nav_resolve_post_id( $object, $slug );
		if ( $post_id > 0 ) {
			$args['menu-item-object-id'] = $post_id;
			$args['menu-item-url']       = (string) get_permalink( $post_id );
		}
	} elseif ( 'taxonomy' === $type && '' !== $slug ) {
		$taxonomy = sanitize_key( $item['object_taxonomy'] ?? $object );
		$term_id  = custom_theme_nav_resolve_term_id( $taxonomy, $slug );
		if ( $term_id > 0 ) {
			$args['menu-item-object-id'] = $term_id;
			$link                        = get_term_link( $term_id, $taxonomy );
			$args['menu-item-url']       = is_string( $link ) ? $link : $args['menu-item-url'];
		}
	}

	return $args;
}

/**
 * Import a single nav menu from a deserialized data array.
 *
 * Existing items are cleared before re-importing so the result always
 * matches the file exactly (no stale items left behind).
 *
 * @param array $data Data from a nav menu PHP file.
 * @return array{ created: bool }
 * @throws Exception On failure.
 */
function custom_theme_import_single_nav_menu( array $data ): array {
	$name  = sanitize_text_field( $data['name'] );
	$slug  = sanitize_title( $data['slug'] );
	$items = is_array( $data['items'] ) ? $data['items'] : array();
	$locs  = is_array( $data['locations'] ?? null ) ? $data['locations'] : array();

	$created = ! ( wp_get_nav_menu_object( $slug ) instanceof WP_Term );
	$menu_id = custom_theme_nav_get_or_create_menu( $name, $slug );

	// Clear existing items for a clean slate.
	$existing = wp_get_nav_menu_items( $menu_id, array( 'post_status' => 'any' ) );
	if ( is_array( $existing ) ) {
		foreach ( $existing as $old_item ) {
			wp_delete_post( (int) $old_item->ID, true );
		}
	}

	// First pass: create all items, collect new IDs.
	$new_ids = array(); // array-index → new nav_menu_item post ID.
	foreach ( $items as $i => $item ) {
		$args   = custom_theme_nav_build_item_args( $item, $i + 1 );
		$new_id = wp_update_nav_menu_item( $menu_id, 0, $args );
		if ( ! is_wp_error( $new_id ) ) {
			$new_ids[ $i ] = (int) $new_id;
		}
	}

	// Second pass: wire up parent relationships.
	foreach ( $items as $i => $item ) {
		$parent_index = (int) ( $item['parent_index'] ?? -1 );
		if ( $parent_index < 0 || ! isset( $new_ids[ $parent_index ], $new_ids[ $i ] ) ) {
			continue;
		}
		wp_update_nav_menu_item(
			$menu_id,
			$new_ids[ $i ],
			array(
				'menu-item-parent-id' => $new_ids[ $parent_index ],
				'menu-item-status'    => 'publish',
			)
		);
	}

	// Assign to registered theme locations.
	if ( ! empty( $locs ) ) {
		$current = get_nav_menu_locations();
		foreach ( $locs as $location ) {
			$current[ sanitize_key( $location ) ] = $menu_id;
		}
		set_theme_mod( 'nav_menu_locations', $current );
	}

	return array( 'created' => $created );
}

/**
 * Import all nav menus from PHP files in the export directory.
 *
 * @return array{ created: int, updated: int, errors: string[] }
 * @throws Exception If directory is missing or has no files.
 */
function custom_theme_import_all_nav_menus(): array {
	$dir = custom_theme_nav_menus_export_dir();

	if ( ! is_dir( $dir ) ) {
		throw new Exception( 'Nav menus directory not found. Export menus first.' );
	}

	$files = glob( $dir . '/*.php' );
	if ( empty( $files ) ) {
		throw new Exception( sprintf( 'No nav menu files found in %s. Export first and commit to Git.', esc_html( $dir ) ) );
	}

	$created = 0;
	$updated = 0;
	$errors  = array();

	foreach ( $files as $file ) {
		try {
			$filename = basename( $file );
			$data     = include $file; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_include
			custom_theme_validate_nav_menu_file_data( $data, $filename );
			$result = custom_theme_import_single_nav_menu( $data );
			if ( $result['created'] ) {
				++$created;
			} else {
				++$updated;
			}
		} catch ( Exception $e ) {
			$errors[] = basename( $file ) . ': ' . $e->getMessage();
		}
	}

	return array(
		'created' => $created,
		'updated' => $updated,
		'errors'  => $errors,
	);
}

// ---------------------------------------------------------------------------
// Admin form handlers
// ---------------------------------------------------------------------------

/**
 * Process export/import form submissions.
 *
 * @return void
 */
function custom_theme_handle_nav_menu_sync_actions(): void {
	if ( ! isset( $_POST['custom_theme_nav_sync_action'] ) ) {
		return;
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	check_admin_referer( 'custom_theme_nav_sync', 'custom_theme_nav_sync_nonce' );

	$action = sanitize_text_field( wp_unslash( $_POST['custom_theme_nav_sync_action'] ) );

	if ( 'export_menus' === $action ) {
		try {
			$result  = custom_theme_export_all_nav_menus();
			$message = sprintf(
				// translators: %d is the number of menus exported.
				__( '%d menu(s) exported to template-parts/nav-menus/ successfully!', 'mbn-theme' ),
				$result['exported']
			);
			if ( ! empty( $result['errors'] ) ) {
				$message .= ' Errors: ' . implode( '; ', array_map( 'esc_html', $result['errors'] ) );
			}
			add_settings_error(
				'custom_theme_nav_sync',
				'export_success',
				$message,
				empty( $result['errors'] ) ? 'updated' : 'warning'
			);
		} catch ( Exception $e ) {
			add_settings_error( 'custom_theme_nav_sync', 'export_error', 'Export failed: ' . esc_html( $e->getMessage() ), 'error' );
		}
	} elseif ( 'import_menus' === $action ) {
		try {
			$result  = custom_theme_import_all_nav_menus();
			$message = sprintf(
				// translators: %1$d menus created, %2$d updated.
				__( 'Import complete! Created: %1$d, Updated: %2$d', 'mbn-theme' ),
				$result['created'],
				$result['updated']
			);
			if ( ! empty( $result['errors'] ) ) {
				$message .= ' | Errors: ' . implode( '; ', array_map( 'esc_html', $result['errors'] ) );
			}
			add_settings_error(
				'custom_theme_nav_sync',
				'import_success',
				$message,
				empty( $result['errors'] ) ? 'updated' : 'warning'
			);
		} catch ( Exception $e ) {
			add_settings_error( 'custom_theme_nav_sync', 'import_error', 'Import failed: ' . esc_html( $e->getMessage() ), 'error' );
		}
	}
}
add_action( 'admin_init', 'custom_theme_handle_nav_menu_sync_actions' );

// ---------------------------------------------------------------------------
// Admin page
// ---------------------------------------------------------------------------

/**
 * Register Nav Menu Sync under the WordPress Tools menu.
 *
 * @return void
 */
function custom_theme_add_nav_menu_sync_page(): void {
	add_management_page(
		__( 'Nav Menu Sync', 'mbn-theme' ),
		__( 'Nav Menu Sync', 'mbn-theme' ),
		'manage_options',
		'nav-menu-sync',
		'custom_theme_render_nav_menu_sync_page'
	);
}
add_action( 'admin_menu', 'custom_theme_add_nav_menu_sync_page' );

/**
 * Render the Nav Menu Sync admin page.
 *
 * @return void
 */
function custom_theme_render_nav_menu_sync_page(): void {
	$menus         = wp_get_nav_menus();
	$registered    = get_registered_nav_menus();
	$assigned      = get_nav_menu_locations();
	$export_dir    = custom_theme_nav_menus_export_dir();
	$exported_files = is_dir( $export_dir ) ? ( glob( $export_dir . '/*.php' ) ?: array() ) : array();
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Nav Menu Sync', 'mbn-theme' ); ?></h1>
		<p><?php esc_html_e( 'Export navigation menus to PHP files for Git tracking, then import on staging/production.', 'mbn-theme' ); ?></p>

		<?php settings_errors( 'custom_theme_nav_sync' ); ?>

		<!-- Registered menus status table -->
		<div class="card" style="max-width:860px;">
			<h2><?php esc_html_e( 'Current Menus', 'mbn-theme' ); ?></h2>
			<?php if ( empty( $menus ) ) : ?>
				<p><em><?php esc_html_e( 'No menus found. Create menus via Appearance > Menus first.', 'mbn-theme' ); ?></em></p>
			<?php else : ?>
				<table class="widefat striped" style="margin-top:10px;">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Menu Name', 'mbn-theme' ); ?></th>
							<th><?php esc_html_e( 'Slug', 'mbn-theme' ); ?></th>
							<th><?php esc_html_e( 'Items', 'mbn-theme' ); ?></th>
							<th><?php esc_html_e( 'Theme Location', 'mbn-theme' ); ?></th>
							<th><?php esc_html_e( 'Exported File', 'mbn-theme' ); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ( $menus as $menu ) :
						$menu_items  = wp_get_nav_menu_items( $menu->term_id );
						$item_count  = is_array( $menu_items ) ? count( $menu_items ) : 0;
						$menu_locs   = array();
						foreach ( $assigned as $loc => $mid ) {
							if ( (int) $mid === (int) $menu->term_id && isset( $registered[ $loc ] ) ) {
								$menu_locs[] = esc_html( $registered[ $loc ] ) . ' <code>(' . esc_html( $loc ) . ')</code>';
							}
						}
						$file_path  = $export_dir . '/' . sanitize_file_name( $menu->slug ) . '.php';
						$has_file   = file_exists( $file_path );
						?>
						<tr>
							<td><strong><?php echo esc_html( $menu->name ); ?></strong></td>
							<td><code><?php echo esc_html( $menu->slug ); ?></code></td>
							<td><?php echo esc_html( $item_count ); ?></td>
							<td><?php echo $menu_locs ? implode( '<br>', $menu_locs ) : '&mdash;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
							<td>
								<?php if ( $has_file ) : ?>
									<span style="color:#46b450;">&#10003; <code><?php echo esc_html( $menu->slug ); ?>.php</code></span>
								<?php else : ?>
									<span style="color:#dba617;">&#9888; <?php esc_html_e( 'Not yet exported', 'mbn-theme' ); ?></span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>

		<!-- Export card -->
		<div class="card" style="max-width:860px;margin-top:20px;">
			<h2>&#x1F4E4; <?php esc_html_e( 'Export All Menus to Files', 'mbn-theme' ); ?></h2>
			<p>
				<?php esc_html_e( 'Writes each menu to', 'mbn-theme' ); ?>
				<code>template-parts/nav-menus/{slug}.php</code>.
				<?php esc_html_e( 'Commit these files to Git and push.', 'mbn-theme' ); ?>
			</p>
			<p><strong><?php esc_html_e( 'What gets exported:', 'mbn-theme' ); ?></strong></p>
			<ul style="margin-left:20px;">
				<li>&#10003; <?php esc_html_e( 'Menu name and slug', 'mbn-theme' ); ?></li>
				<li>&#10003; <?php esc_html_e( 'All menu items — title, URL, target, CSS classes, description', 'mbn-theme' ); ?></li>
				<li>&#10003; <?php esc_html_e( 'Dropdown (parent/child) relationships stored as relative array indices — no database IDs', 'mbn-theme' ); ?></li>
				<li>&#10003; <?php esc_html_e( 'Post / page links stored as slugs, resolved to the correct local URL on import', 'mbn-theme' ); ?></li>
				<li>&#10003; <?php esc_html_e( 'Theme location assignments (primary-menu, footer-menu, etc.)', 'mbn-theme' ); ?></li>
			</ul>
			<div style="background:#e7f3ff;border-left:4px solid #2271b1;padding:10px 15px;margin:15px 0;">
				<strong><?php esc_html_e( 'Tip: Custom links', 'mbn-theme' ); ?></strong>
				<p style="margin:5px 0;">
					<?php esc_html_e( 'Use relative URLs (e.g. /contact, /about) for custom links so they work on every environment without editing.', 'mbn-theme' ); ?>
				</p>
			</div>
			<form method="post" style="margin-top:15px;">
				<?php wp_nonce_field( 'custom_theme_nav_sync', 'custom_theme_nav_sync_nonce' ); ?>
				<input type="hidden" name="custom_theme_nav_sync_action" value="export_menus">
				<button type="submit" class="button button-secondary">
					&#x1F4E4; <?php esc_html_e( 'Export All Menus to Files', 'mbn-theme' ); ?>
				</button>
			</form>
		</div>

		<!-- Import card -->
		<div class="card" style="max-width:860px;margin-top:20px;">
			<h2>&#x1F4E5; <?php esc_html_e( 'Import Menus from Files', 'mbn-theme' ); ?></h2>
			<p>
				<?php esc_html_e( 'Reads all', 'mbn-theme' ); ?>
				<code>template-parts/nav-menus/*.php</code>
				<?php esc_html_e( 'files and creates or updates the matching menus.', 'mbn-theme' ); ?>
			</p>
			<?php if ( empty( $exported_files ) ) : ?>
				<p><em style="color:#d63638;">
					<?php esc_html_e( 'No exported files found. Export first, commit to Git, and pull on this environment.', 'mbn-theme' ); ?>
				</em></p>
			<?php else : ?>
				<p><strong><?php esc_html_e( 'Files available:', 'mbn-theme' ); ?></strong></p>
				<ul style="margin-left:20px;">
					<?php foreach ( $exported_files as $f ) : ?>
						<li><code>template-parts/nav-menus/<?php echo esc_html( basename( $f ) ); ?></code></li>
					<?php endforeach; ?>
				</ul>
				<p>
					<strong style="color:#d63638;">&#9888; <?php esc_html_e( 'Warning:', 'mbn-theme' ); ?></strong>
					<?php esc_html_e( 'All existing items in each matched menu will be cleared and re-created from the file. Menu assignments to theme locations will be applied.', 'mbn-theme' ); ?>
				</p>
				<form method="post" style="margin-top:15px;">
					<?php wp_nonce_field( 'custom_theme_nav_sync', 'custom_theme_nav_sync_nonce' ); ?>
					<input type="hidden" name="custom_theme_nav_sync_action" value="import_menus">
					<button type="submit" class="button button-primary">
						&#x1F4E5; <?php esc_html_e( 'Import All Menus from Files', 'mbn-theme' ); ?>
					</button>
				</form>
			<?php endif; ?>
		</div>

		<!-- Workflow guide -->
		<div class="card" style="max-width:860px;margin-top:20px;background:#f0f6fc;border-left:4px solid #0073aa;">
			<h2>&#x2139;&#xFE0F; <?php esc_html_e( 'Git Workflow', 'mbn-theme' ); ?></h2>

			<h3><?php esc_html_e( 'Local Development', 'mbn-theme' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Create or edit menus in Appearance > Menus', 'mbn-theme' ); ?></li>
				<li><?php esc_html_e( 'Click "Export All Menus to Files" above', 'mbn-theme' ); ?></li>
				<li>
					<?php esc_html_e( 'Commit the generated files to Git:', 'mbn-theme' ); ?>
					<code>template-parts/nav-menus/*.php</code>
				</li>
				<li><?php esc_html_e( 'Push to GitHub', 'mbn-theme' ); ?></li>
			</ol>

			<h3><?php esc_html_e( 'Staging / Production', 'mbn-theme' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Pull latest code from Git', 'mbn-theme' ); ?></li>
				<li><?php esc_html_e( 'Go to Block Templates > Nav Menu Sync', 'mbn-theme' ); ?></li>
				<li><?php esc_html_e( 'Click "Import All Menus from Files"', 'mbn-theme' ); ?></li>
			</ol>

			<h3><?php esc_html_e( 'Notes', 'mbn-theme' ); ?></h3>
			<ul style="margin-left:20px;">
				<li>
					<strong><?php esc_html_e( 'Post/page links', 'mbn-theme' ); ?>:</strong>
					<?php esc_html_e( 'Stored as slugs and resolved to the correct local URL on import. If a page does not exist on the target environment yet, run the Page Content Sync import first.', 'mbn-theme' ); ?>
				</li>
				<li>
					<strong><?php esc_html_e( 'Navigation block vs classic menus', 'mbn-theme' ); ?>:</strong>
					<?php esc_html_e( 'This tool manages classic WordPress menus (registered via register_nav_menus). If the header uses a Navigation block with an inline structure, the block template sync already covers it.', 'mbn-theme' ); ?>
				</li>
			</ul>
		</div>
	</div>
	<?php
}
