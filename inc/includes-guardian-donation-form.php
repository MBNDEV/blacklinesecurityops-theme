<?php
/**
 * Guardian donation form: rich recurring-tier radio cards.
 *
 * Gravity Forms radio fields only support a plain-text label per choice, which can't
 * reproduce the Figma design's pricing cards (title, price, italic perk description,
 * gold "Subscribe" pill, and a footnote on one tier).
 *
 * The card copy itself lives in the Guardian Tiers Cards post type, not here.
 *
 * Every filter here is scoped by the custom CSS class on the target field —
 * `gf-tier-cards` for the recurring tiers, `gf-onetime-amounts` for the one-time
 * amount — and touches nothing else on the site. Scoping by form ID instead was the
 * original approach and broke silently: the form is numbered differently per
 * environment, so hooks written against one environment's ID render nothing on the
 * others. The same classes already drive the styling in `resources/css/app.css`.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'gform_field_input', 'blacklinesecurityops_render_guardian_tier_cards', 10, 5 );
add_filter( 'gform_get_form_filter', 'blacklinesecurityops_guardian_other_amount_script', 10, 2 );
add_filter( 'gform_other_choice_value', 'blacklinesecurityops_guardian_other_choice_label', 10, 2 );

/**
 * Renames the "Other" choice on the one-time-gift amount field to "Enter an amount:".
 *
 * Deliberately NOT stored as a custom choice in the field's `choices` array — GF's own
 * form editor doesn't recognize a hand-added `isOtherChoice` entry, and re-saving the
 * form there (even without touching this field) regenerates the choices and silently
 * drops it, reverting the label back to "Other". This filter computes the label at
 * render time instead, so it survives any admin edit of the form.
 *
 * Scoped by the field's `gf-onetime-amounts` CSS class, not a form ID — see
 * blacklinesecurityops_render_guardian_tier_cards() for why.
 *
 * @param string              $placeholder Default "Other" label.
 * @param null|GF_Field_Radio $field       The field being rendered, or null.
 * @return string
 */
function blacklinesecurityops_guardian_other_choice_label( $placeholder, $field ) {
  if ( blacklinesecurityops_guardian_field_has_class( $field, 'gf-onetime-amounts' ) ) {
      return 'Enter an amount:';
  }

	return $placeholder;
}

/**
 * GF bakes the "Other" choice's label text into the disabled amount input's initial
 * value too (they share one `$choice['text']` in GF core), so the field opens showing
 * "Enter an amount:" instead of a short "$" hint. GF's own toggle script only ever
 * flips `disabled` and never touches `value`, so it's safe to clear/replace it once here.
 *
 * Also relocates the field's "(minimum $1)" description — GF always renders it as a
 * block below the whole choice list — to sit beside the amount input, matching Figma.
 *
 * Both element ids are derived from the form and field actually rendered; the field is
 * located by its `gf-onetime-amounts` CSS class. The script no-ops when that field has
 * no "Other" choice enabled, which is the case on the current form.
 *
 * @param string $form_string Fully rendered form HTML.
 * @param array  $form        The form object.
 * @return string
 */
function blacklinesecurityops_guardian_other_amount_script( $form_string, $form ) {
	$field_id = 0;

  foreach ( (array) rgar( $form, 'fields' ) as $field ) {
    if ( blacklinesecurityops_guardian_field_has_class( $field, 'gf-onetime-amounts' ) ) {
        $field_id = (int) $field->id;
        break;
    }
  }

  if ( 0 === $field_id ) {
      return $form_string;
  }

	$prefix   = (int) rgar( $form, 'id' ) . '_' . $field_id;
	$input_id = wp_json_encode( 'input_' . $prefix . '_other' );
	$desc_id  = wp_json_encode( 'gfield_description_' . $prefix );

	$script  = '<script>document.addEventListener("DOMContentLoaded", function () {';
	$script .= 'var el = document.getElementById(' . $input_id . ');';
	$script .= 'if (el) { el.placeholder = "$"; if (el.value === "Enter an amount:") { el.value = ""; } }';
	$script .= 'var desc = document.getElementById(' . $desc_id . ');';
	$script .= 'if (el && desc) { el.insertAdjacentElement("afterend", desc); }';
	$script .= '});</script>';

	return $form_string . $script;
}

/**
 * Tests whether a Gravity Forms field carries a given custom CSS class.
 *
 * @param null|object $field      The field being rendered, or null.
 * @param string      $class_name Class to look for.
 * @return bool
 */
function blacklinesecurityops_guardian_field_has_class( $field, $class_name ) {
  if ( ! $field || ! isset( $field->cssClass ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase -- GF_Field's own camelCase property.
      return false;
  }

	return in_array( $class_name, preg_split( '/\s+/', (string) $field->cssClass, -1, PREG_SPLIT_NO_EMPTY ), true ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase -- GF_Field's own camelCase property.
}

/**
 * Computes the submit value for a choice exactly as Gravity Forms would render it.
 *
 * GF hashes the choice values at render time and rejects any submitted value that isn't
 * in that hash with "Invalid selection. Please select from the available choices."
 * (GF_Field::get_state_validation_message). Two details make a raw `$choice['value']`
 * fail that check: GF falls back to the choice *text* when no explicit value is set, and
 * it appends `|<price>` on a field with prices enabled — which a donation tier field has.
 *
 * Mirrors GF_Field_Radio::get_choice_html().
 *
 * @param object $field  The GF_Field instance being rendered.
 * @param array  $choice The choice properties.
 * @return string
 */
function blacklinesecurityops_guardian_choice_value( $field, $choice ) {
	// phpcs:disable WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase -- GF_Field's own camelCase properties.
	$value = ! empty( $choice['value'] ) || $field->enableChoiceValue ? $choice['value'] : rgar( $choice, 'text' );

  if ( $field->enablePrice ) {
      $price  = rgempty( 'price', $choice ) ? 0 : GFCommon::to_number( rgar( $choice, 'price' ) );
      $value .= '|' . $price;
  }
	// phpcs:enable WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

	return (string) $value;
}

/**
 * Renders the recurring-tier choices as clickable pricing cards.
 *
 * Scoped by the field's `gf-tier-cards` CSS class rather than a form ID: the form is
 * numbered differently per environment, and an ID-scoped hook silently renders nothing
 * on every environment but the one it was written against.
 *
 * Card copy (price, perk description, footnote) comes from the Guardian Tiers Cards post
 * type, paired to each choice by title — see inc/includes-guardian-tier-cards-cpt.php. A
 * choice with no matching card still renders as a card with just its label and Subscribe
 * pill, so adding a choice in the form editor never breaks the grid.
 *
 * @param string $input   Default field input markup (replaced entirely).
 * @param object $field   The GF_Field instance for this field.
 * @param string $value   Currently selected choice value, if any.
 * @param int    $lead_id Entry ID (0 on the front-end form).
 * @param int    $form_id The form ID.
 * @return string
 */
function blacklinesecurityops_render_guardian_tier_cards( $input, $field, $value, $lead_id, $form_id ) {
  if ( ! blacklinesecurityops_guardian_field_has_class( $field, 'gf-tier-cards' ) ) {
      return $input;
  }

	$name = 'input_' . $field->id;
	$out  = '<div class="ginput_container ginput_container_radio gf-tier-grid">';

	$index = 0;
  foreach ( (array) $field->choices as $choice ) {
      ++$index;
      $slug = blacklinesecurityops_guardian_choice_value( $field, $choice );
      $meta = blacklinesecurityops_get_guardian_tier_card_for_choice( $choice );
      $id   = 'choice_' . $form_id . '_' . $field->id . '_' . $index;

    if ( rgblank( $value ) && 'entry' !== rgget( 'view' ) ) {
        $checked = checked( (bool) rgar( $choice, 'isSelected' ), true, false );
    } else {
        $checked = checked( GFFormsModel::choice_value_match( $field, $choice, $value ), true, false );
    }

      $out .= '<label class="gf-tier-card gf-tier-' . $index . '" for="' . esc_attr( $id ) . '">';
      $out .= '<input type="radio" name="' . esc_attr( $name ) . '" id="' . esc_attr( $id ) . '" value="' . esc_attr( $slug ) . '" class="gf-tier-input"' . $checked . ' />';
      $out .= '<span class="gf-tier-name">' . esc_html( $choice['text'] ) . '</span>';

    if ( $meta['price'] ) {
        $out .= '<span class="gf-tier-price">' . esc_html( $meta['price'] ) . '</span>';
    }

    if ( $meta['desc'] ) {
        $out .= '<span class="gf-tier-desc">(' . esc_html( $meta['desc'] ) . ')</span>';
    }

      $out .= '<span class="gf-tier-subscribe">Subscribe</span>';

    if ( $meta['note'] ) {
        $out .= '<span class="gf-tier-note">' . esc_html( $meta['note'] ) . '</span>';
    }

      $out .= '</label>';
  }

	$out .= '</div>';

	return $out;
}
