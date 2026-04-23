<?php
/**
 * Custom Theme functions and setup.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! defined( 'CUSTOM_THEME_SECTION_BG_TABLET_IMAGE_SIZE' ) ) {
	define( 'CUSTOM_THEME_SECTION_BG_TABLET_IMAGE_SIZE', 'section-bg-tablet' );
}
if ( ! defined( 'CUSTOM_THEME_SECTION_BG_MOBILE_IMAGE_SIZE' ) ) {
	define( 'CUSTOM_THEME_SECTION_BG_MOBILE_IMAGE_SIZE', 'section-bg-mobile' );
}

if ( ! class_exists( 'YahnisElsts\PluginUpdateChecker\v5\PucFactory' ) ) {
  require_once get_theme_file_path( 'vendor/autoload.php' );
}

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

/**
 * Load global button component
 */
require_once get_theme_file_path( 'template-parts/button.php' );

/**
 * Theme setup
 */
function blacklinesecurityops_theme_setup() {
	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Inject compiled Tailwind CSS intro the iframed block editor canvas.
	add_editor_style( 'assets/build/tailwind.css' );

  // Enqueue editor styles
  add_editor_style( 'editor.css' );

  // Add support for responsive embedded content
  add_theme_support( 'responsive-embeds' );

	// Add support for custom line height.
	add_theme_support( 'custom-line-height' );

	// Add support for custom spacing.
	add_theme_support( 'custom-spacing' );

	// Add support for custom units.
  add_theme_support( 'custom-units' );

  // Register navigation menus
  register_nav_menus(
    array(
		'primary-menu'  => __( 'Primary Menu', 'mbn-theme' ),
		'footer-menu'   => __( 'Footer Menu', 'mbn-theme' ),
		'footer-menu-1' => __( 'Footer Menu Column 1', 'mbn-theme' ),
		'footer-menu-2' => __( 'Footer Menu Column 2', 'mbn-theme' ),
		'footer-legal'  => __( 'Footer Legal Links', 'mbn-theme' ),
		'mobile-menu'   => __( 'Mobile Menu', 'mbn-theme' ),
	)
  );
}

add_action( 'after_setup_theme', 'blacklinesecurityops_theme_setup' );

/**
 * Enable SVG uploads.
 *
 * @param array $mimes Allowed MIME types.
 * @return array
 */
function blacklinesecurityops_enable_svg_upload( $mimes ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'blacklinesecurityops_enable_svg_upload' );

/**
 * Fix SVG display in media library
 *
 * @param array      $response   Prepared attachment data.
 * @param WP_Post    $attachment Attachment object.
 * @param array|bool $meta       Attachment metadata (unused).
 * @return array
 */
function blacklinesecurityops_fix_svg_display( $response, $attachment, $meta ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
  if ( 'image' !== $response['type'] || 'svg+xml' !== $response['subtype'] || ! class_exists( 'SimpleXMLElement' ) ) {
    return $response;
  }

  $path = get_attached_file( $attachment->ID );
  if ( ! $path || ! file_exists( $path ) ) {
    return $response;
  }

  $svg_content = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
  if ( false === $svg_content ) {
    return $response;
  }

  $svg = simplexml_load_string( $svg_content );
  if ( false !== $svg ) {
    $width  = $svg['width'] ? floatval( $svg['width'] ) : 0;
    $height = $svg['height'] ? floatval( $svg['height'] ) : 0;
    if ( $width > 0 && $height > 0 ) {
      $response['width']  = $width;
      $response['height'] = $height;
    }
  }

  return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'blacklinesecurityops_fix_svg_display', 10, 3 );

/**
 * Enqueue Slick Slider for Logo List block
 */
function blacklinesecurityops_enqueue_slick_slider() {
  // Only load on frontend
  if ( is_admin() ) {
    return;
  }

  // Slick CSS
  wp_enqueue_style(
    'slick-slider',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
    array(),
    '1.8.1'
  );

  wp_enqueue_style(
    'slick-theme',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
    array(),
    '1.8.1'
  );

  // Slick JS (requires jQuery)
  wp_enqueue_script(
    'slick-slider',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
    array( 'jquery' ),
    '1.8.1',
    true
  );
}
add_action( 'wp_enqueue_scripts', 'blacklinesecurityops_enqueue_slick_slider' );

// Load theme components
require_once get_theme_file_path( 'block-registry.php' );
require_once get_theme_file_path( 'tailwind-loader.php' );
require_once get_theme_file_path( 'optimize.php' );

// Load integrated inc/ files.
require_once get_theme_file_path( 'inc/includes-theme-options.php' );          // Native theme options page.
require_once get_theme_file_path( 'inc/includes-post-meta.php' );              // Native post meta boxes.
require_once get_theme_file_path( 'inc/includes-theme-preset-options-render.php' ); // Font presets & CSS variables.
require_once get_theme_file_path( 'inc/includes-html-injection.php' );         // Custom HTML injection.
require_once get_theme_file_path( 'inc/includes-widget-loader.php' );          // Widget area auto-loader.
require_once get_theme_file_path( 'inc/includes-block-templates.php' );        // Block Templates (Header/Footer) system.
require_once get_theme_file_path( 'inc/includes-template-page-sync.php' );     // Page template sync.
require_once get_theme_file_path( 'inc/includes-theme-block-section.php' );    // Section background utilities.
require_once get_theme_file_path( 'inc/includes-block-patterns.php' );         // Reusable block patterns.
require_once get_theme_file_path( 'inc/includes-template-sync-tools.php' );    // Template import/export tools.
require_once get_theme_file_path( 'inc/includes-page-sync.php' );              // Page content sync (optional).
require_once get_theme_file_path( 'inc/includes-nav-menu-sync.php' );          // Nav menu export/import via Git.

PucFactory::buildUpdateChecker(
  'https://github.com/MBNDEV/mbn-theme',
  get_theme_file_path( 'style.css' ),
  'mbn-theme'
);
