<?php
/**
 * Page Pattern: Contact
 * 
 * This file contains the complete page data for the 'Contact' page.
 * It can be imported to create/update the page on other environments.
 * 
 * Includes: Content, Featured Image, Status, Attributes, Custom Fields
 * 
 * To use: Tools → Page Content Sync → Import All Pages from Files
 * 
 * @package CustomTheme
 */

return array(
	'title'              => "Contact",
	'slug'               => "contact",
	'status'             => "publish",
	'excerpt'            => "",
	'parent_slug'        => "",
	'menu_order'         => 0,
	'template'           => "",
	'featured_image_url' => "",
	'featured_image_path' => "", // Theme assets path (ships via Git)
	'custom_fields'      => [],
	'content'            => <<<'EOD'
<!-- wp:mbn-theme/div-wrap {"className":"sec_contactus","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"black","textColor":"white"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_contactus has-white-color has-black-background-color has-text-color has-background has-link-color"><div class="div-wrap-content"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:mbn-theme/content-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","title":"Contact","titleTag":"h1","titleClass":"text_gradient","customCSS":".test {\nbackground:red;\n}","className":"contact_copy"} -->
<style>.test {
background:red;
}</style><div class="wp-block-mbn-theme-content-box content-box icon-position-left contact_copy"><div class="content-box-inner flex gap-4 flex-row items-start"><div class="content-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="content-box-content" style="flex:1px;width:100%"><h1 class="content-box-title text_gradient">Contact</h1><div class="content-box-blocks"><!-- wp:paragraph -->
<p>Our executive protection specialists work closely with all Blackline clients to meet the specific needs of your organization, families, or both.&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Our risk advisors will assess, design and deliver the right solution for you - whether your need is for risk management services or a custom security solution.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>With resources across the country, Blackline can provide unparalleled elite protection services throughout the United States.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"contact_info flex","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group contact_info flex"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-phone.svg","iconImageId":463,"iconPosition":"left","iconSize":32,"title":"\u003cstrong\u003ePhone\u003c/strong\u003e","titleTag":"h4","titleColor":"#ffffff","description":"\u003cp\u003e\u003ca href=\u0022tel:+1 (844) 225-3546\u0022\u003e+1 (844) 225-3546\u003c/a\u003e\u003c/p\u003e","className":"flex_column col_phone"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column col_phone"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-phone.svg" alt="" style="width:32px;height:32px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Phone</strong></h4><div class="icon-box-description"><p><a href="tel:+1 (844) 225-3546">+1 (844) 225-3546</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-email.svg","iconImageId":464,"iconPosition":"left","iconSize":32,"title":"\u003cstrong\u003eEmail\u003c/strong\u003e","titleTag":"h4","titleColor":"#ffffff","description":"\u003cp\u003e\u003ca href=\u0022mailto:info@blacklinesecurityoperations.com\u0022\u003einfo@blacklinesecurityoperations.com\u003c/a\u003e\u003c/p\u003e","className":"flex_column col_email"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column col_email"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-email.svg" alt="" style="width:32px;height:32px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Email</strong></h4><div class="icon-box-description"><p><a href="mailto:info@blacklinesecurityoperations.com">info@blacklinesecurityoperations.com</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-mapin.svg","iconImageId":462,"iconPosition":"left","iconSize":32,"title":"\u003cstrong\u003eOffice\u003c/strong\u003e","titleTag":"h4","titleColor":"#ffffff","description":"\u003cp\u003eBlackline Guardian Fund, United States\u003c/p\u003e\u003cp\u003e\u003ca href=\u0022#\u0022 class=\u0022btn_getdir\u0022\u003eGet directions\u003c/a\u003e\u003c/p\u003e","className":"flex_column col_office"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column col_office"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-mapin.svg" alt="" style="width:32px;height:32px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Office</strong></h4><div class="icon-box-description"><p>Blackline Guardian Fund, United States</p><p><a href="#" class="btn_getdir">Get directions</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box --></div>
<!-- /wp:group --></div></div></div></div>
<!-- /wp:mbn-theme/content-box --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"contact_form","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group contact_form"><!-- wp:gravityforms/form {"formId":"2","title":false,"description":false,"ajax":true,"inputPrimaryColor":"#204ce5"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->
EOD
);
