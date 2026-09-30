<?php
/**
 * Custom post type: Guardian Tiers Cards — editable copy for the Guardian donation
 * form's recurring-tier pricing cards.
 *
 * The card copy used to be a hardcoded array in the renderer, which meant every wording
 * or price change was a code deploy. Each tier is a post here instead: the post title is
 * the match key against the Gravity Forms choice label, and Price Label / Description /
 * Note carry the rest of the card.
 *
 * Nothing about a tier is meant to be reachable on the front end — these posts are copy
 * fragments, not pages — so the type is registered fully private: no single URLs, no
 * archive, excluded from site search and from both core and Yoast sitemaps.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post type key for a Guardian tier card.
 *
 * @return string
 */
function blacklinesecurityops_guardian_tier_post_type(): string {
	return 'mbn_guardian_tier';
}

/**
 * Meta keys for the tier card fields, keyed by the request field name used in the meta box.
 *
 * @return array<string,string>
 */
function blacklinesecurityops_guardian_tier_fields(): array {
	return array(
		'blgf_guardian_tier_price' => '_blgf_guardian_tier_price',
		'blgf_guardian_tier_desc'  => '_blgf_guardian_tier_desc',
		'blgf_guardian_tier_note'  => '_blgf_guardian_tier_note',
	);
}

/**
 * Register the Guardian Tiers Cards post type.
 *
 * @return void
 */
function blacklinesecurityops_register_guardian_tier_post_type(): void {
	$labels = array(
		'name'               => __( 'Guardian Tiers Cards', 'mbn-theme' ),
		'singular_name'      => __( 'Guardian Tier Card', 'mbn-theme' ),
		'add_new'            => __( 'Add New', 'mbn-theme' ),
		'add_new_item'       => __( 'Add New Guardian Tier Card', 'mbn-theme' ),
		'edit_item'          => __( 'Edit Guardian Tier Card', 'mbn-theme' ),
		'new_item'           => __( 'New Guardian Tier Card', 'mbn-theme' ),
		'view_item'          => __( 'View Guardian Tier Card', 'mbn-theme' ),
		'search_items'       => __( 'Search Guardian Tiers Cards', 'mbn-theme' ),
		'not_found'          => __( 'No guardian tier cards found.', 'mbn-theme' ),
		'not_found_in_trash' => __( 'No guardian tier cards found in Trash.', 'mbn-theme' ),
		'all_items'          => __( 'Guardian Tiers Cards', 'mbn-theme' ),
	);

	register_post_type(
      blacklinesecurityops_guardian_tier_post_type(),
      array(
		  'labels'              => $labels,
		  'public'              => false,
		  'publicly_queryable'  => false,
		  'exclude_from_search' => true,
		  'show_ui'             => true,
		  'show_in_menu'        => true,
		  'show_in_nav_menus'   => false,
		  'show_in_rest'        => false,
		  'query_var'           => false,
		  'rewrite'             => false,
		  'has_archive'         => false,
		  'hierarchical'        => false,
		  'capability_type'     => 'post',
		  'menu_position'       => 22,
		  'menu_icon'           => 'dashicons-awards',
		  'supports'            => array( 'title', 'revisions', 'page-attributes' ),
	  )
	);
}
add_action( 'init', 'blacklinesecurityops_register_guardian_tier_post_type', 5 );

/**
 * Keep the tier cards out of Yoast's sitemap.
 *
 * Core's sitemaps already skip the type because it isn't public; Yoast builds its own
 * index from its own settings, so it needs telling separately.
 *
 * @param bool   $excluded  Whether the type is excluded.
 * @param string $post_type Post type being considered.
 * @return bool
 */
function blacklinesecurityops_guardian_tier_exclude_from_sitemap( $excluded, $post_type ) {
  if ( blacklinesecurityops_guardian_tier_post_type() === $post_type ) {
      return true;
  }

	return $excluded;
}
add_filter( 'wpseo_sitemap_exclude_post_type', 'blacklinesecurityops_guardian_tier_exclude_from_sitemap', 10, 2 );

/**
 * Register the card copy meta box.
 *
 * @return void
 */
function blacklinesecurityops_register_guardian_tier_meta_box(): void {
	add_meta_box(
      'blgf_guardian_tier_metabox',
      __( 'Tier Card', 'mbn-theme' ),
      'blacklinesecurityops_render_guardian_tier_meta_box',
      blacklinesecurityops_guardian_tier_post_type(),
      'normal',
      'high'
	);
}
add_action( 'add_meta_boxes', 'blacklinesecurityops_register_guardian_tier_meta_box' );

/**
 * Render the card copy meta box.
 *
 * @param WP_Post $post Current post object.
 * @return void
 */
function blacklinesecurityops_render_guardian_tier_meta_box( $post ): void {
	wp_nonce_field( 'blgf_guardian_tier_metabox', 'blgf_guardian_tier_nonce' );

	$price = get_post_meta( $post->ID, '_blgf_guardian_tier_price', true );
	$desc  = get_post_meta( $post->ID, '_blgf_guardian_tier_desc', true );
	$note  = get_post_meta( $post->ID, '_blgf_guardian_tier_note', true );
  ?>
	<p class="description">
		<?php esc_html_e( 'The title above must match the Gravity Forms choice label for this tier — that is how the card is paired with the product choice.', 'mbn-theme' ); ?>
	</p>

	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="blgf_guardian_tier_price"><?php esc_html_e( 'Price Label', 'mbn-theme' ); ?></label>
			</th>
			<td>
				<input type="text" name="blgf_guardian_tier_price" id="blgf_guardian_tier_price" class="regular-text" value="<?php echo esc_attr( $price ); ?>" />
				<p class="description"><?php esc_html_e( 'Shown under the title, e.g. $25/month.', 'mbn-theme' ); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="blgf_guardian_tier_desc"><?php esc_html_e( 'Description', 'mbn-theme' ); ?></label>
			</th>
			<td>
				<textarea name="blgf_guardian_tier_desc" id="blgf_guardian_tier_desc" rows="3" class="large-text"><?php echo esc_textarea( $desc ); ?></textarea>
				<p class="description"><?php esc_html_e( 'The perk line. Rendered in parentheses on the card.', 'mbn-theme' ); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="blgf_guardian_tier_note"><?php esc_html_e( 'Note', 'mbn-theme' ); ?></label>
			</th>
			<td>
				<textarea name="blgf_guardian_tier_note" id="blgf_guardian_tier_note" rows="3" class="large-text"><?php echo esc_textarea( $note ); ?></textarea>
				<p class="description"><?php esc_html_e( 'Optional footnote below the Subscribe pill. Leave empty to omit it.', 'mbn-theme' ); ?></p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save the card copy meta box.
 *
 * @param int $post_id Post ID.
 * @return void
 */
function blacklinesecurityops_save_guardian_tier_meta_box( $post_id ): void {
  if ( ! isset( $_POST['blgf_guardian_tier_nonce'] ) ) {
      return;
  }

  if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['blgf_guardian_tier_nonce'] ) ), 'blgf_guardian_tier_metabox' ) ) {
      return;
  }

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
  }

  if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
  }

  foreach ( blacklinesecurityops_guardian_tier_fields() as $field_name => $meta_key ) {
    if ( isset( $_POST[ $field_name ] ) ) {
        update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field_name ] ) ) );
    } else {
        delete_post_meta( $post_id, $meta_key );
    }
  }
}
add_action( 'save_post_mbn_guardian_tier', 'blacklinesecurityops_save_guardian_tier_meta_box' );

/**
 * Show the card copy in the admin list so tiers can be scanned without opening each one.
 *
 * @param array<string,string> $columns Existing columns.
 * @return array<string,string>
 */
function blacklinesecurityops_guardian_tier_admin_columns( $columns ) {
	$date = isset( $columns['date'] ) ? array( 'date' => $columns['date'] ) : array();
	unset( $columns['date'] );

	$columns['blgf_guardian_tier_price'] = __( 'Price Label', 'mbn-theme' );
	$columns['blgf_guardian_tier_desc']  = __( 'Description', 'mbn-theme' );

	return array_merge( $columns, $date );
}
add_filter( 'manage_mbn_guardian_tier_posts_columns', 'blacklinesecurityops_guardian_tier_admin_columns' );

/**
 * Fill the custom admin list columns.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 * @return void
 */
function blacklinesecurityops_guardian_tier_admin_column_content( $column, $post_id ): void {
	$fields = blacklinesecurityops_guardian_tier_fields();

  if ( isset( $fields[ $column ] ) ) {
      echo esc_html( (string) get_post_meta( $post_id, $fields[ $column ], true ) );
  }
}
add_action( 'manage_mbn_guardian_tier_posts_custom_column', 'blacklinesecurityops_guardian_tier_admin_column_content', 10, 2 );

/**
 * Order the admin list by the Order field rather than date, so the list reads in the same
 * sequence the cards are meant to be presented in.
 *
 * @param WP_Query $query Current query.
 * @return void
 */
function blacklinesecurityops_guardian_tier_admin_order( $query ): void {
  if ( ! is_admin() || ! $query->is_main_query() ) {
      return;
  }

  if ( blacklinesecurityops_guardian_tier_post_type() !== $query->get( 'post_type' ) ) {
      return;
  }

  if ( ! $query->get( 'orderby' ) ) {
      $query->set( 'orderby', 'menu_order title' );
      $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'blacklinesecurityops_guardian_tier_admin_order' );

/**
 * Normalizes a title or Gravity Forms choice string into a match key.
 *
 * `sanitize_title()` absorbs differences in case, punctuation and stray whitespace
 * between the form editor and the card title; underscores are folded to dashes on top of
 * that so a machine-style choice value (`founders_circle`) still pairs with the
 * human-readable card title it was named after ("Founder's Circle").
 *
 * @param string $text Title or choice string.
 * @return string Match key, or '' when nothing usable remains.
 */
function blacklinesecurityops_guardian_tier_key( string $text ): string {
	return str_replace( '_', '-', sanitize_title( $text ) );
}

/**
 * All published tier cards, keyed by the normalized post title.
 *
 * @return array<string,array{price:string,desc:string,note:string}>
 */
function blacklinesecurityops_get_guardian_tier_cards(): array {
	static $cards = null;

  if ( null !== $cards ) {
      return $cards;
  }

	$cards = array();

	$posts = get_posts(
      array(
		  'post_type'        => blacklinesecurityops_guardian_tier_post_type(),
		  'post_status'      => 'publish',
		  'posts_per_page'   => -1,
		  'orderby'          => 'menu_order title',
		  'order'            => 'ASC',
		  'no_found_rows'    => true,
		  'suppress_filters' => false,
	  )
	);

  foreach ( $posts as $post ) {
      $key = blacklinesecurityops_guardian_tier_key( $post->post_title );
    if ( '' === $key ) {
        continue;
    }

      $cards[ $key ] = array(
          'price' => (string) get_post_meta( $post->ID, '_blgf_guardian_tier_price', true ),
          'desc'  => (string) get_post_meta( $post->ID, '_blgf_guardian_tier_desc', true ),
          'note'  => (string) get_post_meta( $post->ID, '_blgf_guardian_tier_note', true ),
      );
  }

	return $cards;
}

/**
 * Card copy for one Gravity Forms choice.
 *
 * Matches on the choice label first (the documented pairing), falling back to the choice
 * value so a tier whose stored value is the human-readable string still resolves.
 *
 * @param array<string,mixed> $choice A GF choice array.
 * @return array{price:string,desc:string,note:string}
 */
function blacklinesecurityops_get_guardian_tier_card_for_choice( $choice ): array {
	$cards = blacklinesecurityops_get_guardian_tier_cards();

  foreach ( array( 'text', 'value' ) as $part ) {
      $key = blacklinesecurityops_guardian_tier_key( isset( $choice[ $part ] ) ? (string) $choice[ $part ] : '' );

    if ( '' !== $key && isset( $cards[ $key ] ) ) {
        return $cards[ $key ];
    }
  }

	return array(
		'price' => '',
		'desc'  => '',
		'note'  => '',
	);
}

/**
 * Seeds the six tiers that used to be hardcoded in the renderer, once per site.
 *
 * Without this the form would lose all its card copy the moment this file shipped, since
 * the posts don't exist yet on any environment. Runs once — the flag is set even when
 * cards already exist, so an editor who deletes a tier doesn't get it recreated on the
 * next request.
 *
 * @return void
 */
function blacklinesecurityops_seed_guardian_tier_cards(): void {
  if ( get_option( 'blgf_guardian_tiers_seeded' ) ) {
      return;
  }

	update_option( 'blgf_guardian_tiers_seeded', 1 );

	$existing = get_posts(
      array(
		  'post_type'      => blacklinesecurityops_guardian_tier_post_type(),
		  'post_status'    => 'any',
		  'posts_per_page' => 1,
		  'fields'         => 'ids',
		  'no_found_rows'  => true,
	  )
	);

  if ( ! empty( $existing ) ) {
      return;
  }

	$tiers = array(
		array(
			'title' => 'Guardian',
			'price' => '$10/month',
			'desc'  => 'Receive a free Blackline wristband',
			'note'  => '',
		),
		array(
			'title' => 'Defender',
			'price' => '$25/month',
			'desc'  => 'Receive a free Blackline wristband and hat',
			'note'  => '',
		),
		array(
			'title' => 'Protector',
			'price' => '$50/month',
			'desc'  => 'Receive a free Blackline wristband, hat and t-shirt',
			'note'  => '',
		),
		array(
			'title' => 'Sentinel',
			'price' => '$100/month',
			'desc'  => 'Receive all the above plus a 2-hour firearms training course in Scottsdale, Arizona',
			'note'  => '',
		),
		array(
			'title' => 'Founders Circle',
			'price' => '$250/month',
			'desc'  => 'Enjoy a one-on-one Facetime meeting with Brandon Tatum plus a personalized Blackline backpack filled with swag',
			'note'  => '',
		),
		array(
			'title' => 'Strategic Guardian',
			'price' => '$6,000/year',
			'desc'  => 'Strategic Guardians will enjoy a personal dinner with Brandon Tatum at The Belmont in Scottsdale, Arizona',
			'note'  => 'This is a monthly $500 subscription, due up front, which becomes $500/month after 12 months.',
		),
	);

	foreach ( $tiers as $order => $tier ) {
		$post_id = wp_insert_post(
          array(
			  'post_type'   => blacklinesecurityops_guardian_tier_post_type(),
			  'post_status' => 'publish',
			  'post_title'  => $tier['title'],
			  'menu_order'  => $order + 1,
		  )
		);

      if ( ! $post_id || is_wp_error( $post_id ) ) {
          continue;
      }

		update_post_meta( $post_id, '_blgf_guardian_tier_price', $tier['price'] );
		update_post_meta( $post_id, '_blgf_guardian_tier_desc', $tier['desc'] );
		update_post_meta( $post_id, '_blgf_guardian_tier_note', $tier['note'] );
	}
}
add_action( 'init', 'blacklinesecurityops_seed_guardian_tier_cards', 6 );
