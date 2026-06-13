<?php
/**
 * Page Pattern: Thank You
 *
 * This file contains the complete page data for the 'Thank You' page.
 * It can be imported to create/update the page on other environments.
 *
 * Includes: Content, Featured Image, Status, Attributes, Custom Fields
 *
 * To use: Tools → Page Content Sync → Import All Pages from Files
 *
 * @package CustomTheme
 */

return array(
	'title'               => 'Thank You',
	'slug'                => 'thank-you',
	'status'              => 'publish',
	'excerpt'             => '',
	'parent_slug'         => '',
	'menu_order'          => 0,
	'template'            => '',
	'featured_image_url'  => '',
	'featured_image_path' => '', // Theme assets path (ships via Git)
	'custom_fields'       => array(),
	'content'             => <<<'EOD'
<!-- wp:mbn-theme/div-wrap {"backgroundImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-inner-hero.jpg","backgroundImageId":495,"backgroundType":"image","borderWidth":"0","borderRadius":"0","metadata":{"name":"Hero","categories":["banner"],"patternName":"core/block/870"},"className":"sec_ihero","style":{"spacing":{"padding":{"bottom":"100px"}}}} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block sec_ihero" style="padding-bottom:100px;background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-inner-hero.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;background-attachment:scroll;border-width:0;border-style:solid;border-radius:0"><div class="div-wrap-content"><!-- wp:columns {"isStackedOnMobile":false,"className":"mb_0"} -->
<div class="wp-block-columns is-not-stacked-on-mobile mb_0"><!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"center","level":1,"className":"text_gradient"} -->
<h1 class="wp-block-heading has-text-align-center text_gradient">Thank You</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Thank you for contacting us, we will get back to you as soon as we can.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/">Back to Homepage</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->
EOD
	,
);
