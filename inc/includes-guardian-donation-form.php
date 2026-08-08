<?php
/**
 * Guardian donation form: rich recurring-tier radio cards.
 *
 * Gravity Forms radio fields only support a plain-text label per choice, which can't
 * reproduce the Figma design's pricing cards (title, price, italic perk description,
 * gold "Subscribe" pill, and a footnote on one tier). This filter is scoped to the
 * exact form + field ID it targets (form 4, field 4) and cannot affect any other
 * Gravity Forms field on the site.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'gform_field_input_4_4', 'blacklinesecurityops_render_guardian_tier_cards', 10, 5 );
add_filter( 'gform_get_form_filter_4', 'blacklinesecurityops_guardian_other_amount_script', 10, 2 );
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
 * @param string              $placeholder Default "Other" label.
 * @param null|GF_Field_Radio $field       The field being rendered, or null.
 * @return string
 */
function blacklinesecurityops_guardian_other_choice_label( $placeholder, $field ) {
	if ( $field && 4 === (int) $field->formId && 2 === (int) $field->id ) {
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
 * @param string $form_string Fully rendered form HTML.
 * @param object $form        The form object.
 * @return string
 */
function blacklinesecurityops_guardian_other_amount_script( $form_string, $form ) {
	$script  = '<script>document.addEventListener("DOMContentLoaded", function () {';
	$script .= 'var el = document.getElementById("input_4_2_other");';
	$script .= 'if (el) { el.placeholder = "$"; if (el.value === "Enter an amount:") { el.value = ""; } }';
	$script .= 'var desc = document.getElementById("gfield_description_4_2");';
	$script .= 'if (el && desc) { el.insertAdjacentElement("afterend", desc); }';
	$script .= '});</script>';

	return $form_string . $script;
}

/**
 * Renders the six recurring-tier choices as clickable pricing cards.
 *
 * @param string $input   Default field input markup (replaced entirely).
 * @param object $field   The GF_Field_Radio instance for this field.
 * @param string $value   Currently selected choice value, if any.
 * @param int    $lead_id Entry ID (0 on the front-end form).
 * @param int    $form_id The form ID.
 * @return string
 */
function blacklinesecurityops_render_guardian_tier_cards( $input, $field, $value, $lead_id, $form_id ) {
	$tiers = array(
		'guardian'           => array(
			'price' => '$10/month',
			'desc'  => 'Receive a free Blackline wristband',
			'note'  => '',
		),
		'defender'           => array(
			'price' => '$25/month',
			'desc'  => 'Receive a free Blackline wristband and hat',
			'note'  => '',
		),
		'protector'          => array(
			'price' => '$50/month',
			'desc'  => 'Receive a free Blackline wristband, hat and t-shirt',
			'note'  => '',
		),
		'sentinel'           => array(
			'price' => '$100/month',
			'desc'  => 'Receive all the above plus a 2-hour firearms training course in Scottsdale, Arizona',
			'note'  => '',
		),
		'founders_circle'    => array(
			'price' => '$250/month',
			'desc'  => 'Enjoy a one-on-one Facetime meeting with Brandon Tatum plus a personalized Blackline backpack filled with swag',
			'note'  => '',
		),
		'strategic_guardian' => array(
			'price' => '$6,000/year',
			'desc'  => 'Strategic Guardians will enjoy a personal dinner with Brandon Tatum at The Belmont in Scottsdale, Arizona',
			'note'  => 'This is a monthly $500 subscription, due up front, which becomes $500/month after 12 months.',
		),
	);

	$name = 'input_' . $field->id;
	$out  = '<div class="ginput_container ginput_container_radio gf-tier-grid">';

	$index = 0;
	foreach ( (array) $field->choices as $choice ) {
		++$index;
		$slug    = $choice['value'];
		$meta    = isset( $tiers[ $slug ] ) ? $tiers[ $slug ] : array(
			'price' => '',
			'desc'  => '',
			'note'  => '',
		);
		$id      = 'choice_' . $form_id . '_' . $field->id . '_' . $index;
		$checked = checked( $value, $slug, false );

		$out .= '<label class="gf-tier-card gf-tier-' . $index . '" for="' . esc_attr( $id ) . '">';
		$out .= '<input type="radio" name="' . esc_attr( $name ) . '" id="' . esc_attr( $id ) . '" value="' . esc_attr( $slug ) . '" class="gf-tier-input"' . $checked . ' />';
		$out .= '<span class="gf-tier-name">' . esc_html( $choice['text'] ) . '</span>';
		$out .= '<span class="gf-tier-price">' . esc_html( $meta['price'] ) . '</span>';
		$out .= '<span class="gf-tier-desc">(' . esc_html( $meta['desc'] ) . ')</span>';
		$out .= '<span class="gf-tier-subscribe">Subscribe</span>';

		if ( $meta['note'] ) {
			$out .= '<span class="gf-tier-note">' . esc_html( $meta['note'] ) . '</span>';
		}

		$out .= '</label>';
	}

	$out .= '</div>';

	return $out;
}
