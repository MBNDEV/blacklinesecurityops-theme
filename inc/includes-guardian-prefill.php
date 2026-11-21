<?php
/**
 * Guardian donation forms: pre-fill from URL parameters.
 *
 * Donors whose gift never charged (Kicbac was left in test mode) get a Klaviyo
 * "complete your gift" link carrying their details and chosen gift as query params;
 * assets/js/guardian-prefill.js fills the form and selects the gift from them.
 *
 * Scoped by form ID, unlike the class-scoped hooks in includes-guardian-donation-form.php:
 * the Klaviyo links point at two specific production forms, and the other forms that
 * share the gf-tier-cards / gf-onetime-amounts classes should not pick this up.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

add_action( 'gform_enqueue_scripts', 'blacklinesecurityops_enqueue_guardian_prefill_script' );

/**
 * Enqueues the pre-fill script when the General Fund (7) or Savannah Craven (9) form renders,
 * and hands it the form IDs so the JS has no list of its own to keep in sync.
 *
 * @param array $form The form being rendered.
 * @return void
 */
function blacklinesecurityops_enqueue_guardian_prefill_script( $form ) {
  $handle   = 'blacklinesecurityops-guardian-prefill';
  $form_ids = array( 7, 9 );

  if ( ! in_array( (int) rgar( $form, 'id' ), $form_ids, true ) || wp_script_is( $handle ) ) {
    return;
  }

  wp_enqueue_script(
    $handle,
    get_theme_file_uri( 'assets/js/guardian-prefill.js' ),
    array( 'jquery', 'gform_gravityforms' ),
    filemtime( get_theme_file_path( 'assets/js/guardian-prefill.js' ) ),
    true
  );

  wp_add_inline_script( $handle, 'window.blacklinesecurityopsGuardianPrefillForms = ' . wp_json_encode( $form_ids ) . ';', 'before' );
}
