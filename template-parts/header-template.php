<?php
/**
 * Header Template Block Template.
 *
 * Syncs with "Header Template" Block Template post.
 * Edit in WordPress admin, then export using Block Templates → Sync Tools.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"metadata":{"categories":["header"],"patternName":"core/simple-header-with-dark-background","name":"Simple header with dark background"},"align":"full","className":"sec_navbar has-background-color","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignfull sec_navbar has-background-color"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":150,"className":"navbar_logo"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:navigation {"ref":240,"overlayMenu":"never","icon":"menu","className":"navbar_menu show_nav_lg","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:buttons {"className":"navbar_btn"} -->
<div class="wp-block-buttons navbar_btn"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">REQUEST PROTECTION</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:navigation {"ref":240,"overlayMenu":"always","icon":"menu","className":"navbar_menu hide_nav_lg","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
