<?php
/**
 * Default Header Template content.
 *
 * This file syncs to the "Header Template" Block Template post on theme activation.
 * Edit the Block Template post in WordPress admin, then export back to this file
 * using the export button in the admin.
 *
 * @package CustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"metadata":{"categories":["header"],"patternName":"core/simple-header-with-dark-background","name":"Simple header with dark background"},"align":"full","className":"sec_navbar has-background-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"20px","bottom":"20px","left":"35px","right":"35px"}}},"backgroundColor":"black","textColor":"white","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignfull sec_navbar has-background-color has-white-color has-black-background-color has-text-color has-background has-link-color" style="padding-top:20px;padding-right:35px;padding-bottom:20px;padding-left:35px"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
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
