<?php
/**
 * Page Pattern: Home
 * 
 * This file contains the complete page data for the 'Home' page.
 * It can be imported to create/update the page on other environments.
 * 
 * Includes: Content, Featured Image, Status, Attributes, Custom Fields
 * 
 * To use: Tools → Page Content Sync → Import All Pages from Files
 * 
 * @package CustomTheme
 */

return array(
	'title'              => 'Home',
	'slug'               => 'home',
	'status'             => 'publish',
	'excerpt'            => '',
	'parent_slug'        => '',
	'menu_order'         => 0,
	'template'           => '',
	'featured_image_url' => '',
	'featured_image_path' => '', // Theme assets path (ships via Git)
	'custom_fields'      => array (
),
	'content'            => <<<'EOD'
<!-- wp:mbn-theme/div-wrap {"backgroundImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-sechero.jpg","backgroundImageId":69,"backgroundType":"image","customClassName":"hero_test","borderWidth":"0","metadata":{"name":"Hero"},"className":"sec_hero","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}}}} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block hero_test sec_hero" style="padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-sechero.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;background-attachment:scroll;border-width:0;border-style:solid"><div class="div-wrap-content"><!-- wp:cover {"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/portrait-of-bearded-bodyguard-in-earphone.mp4","id":66,"dimRatio":0,"isUserOverlayColor":true,"backgroundType":"video","customGradient":"linear-gradient(135deg,rgb(0,0,0) 0%,rgba(0,0,0,0) 100%)","contentPosition":"center center","isDark":false,"sizeSlug":"full","className":"postatic","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light postatic has-white-color has-text-color has-link-color" style="padding-top:100px;padding-bottom:100px"><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/portrait-of-bearded-bodyguard-in-earphone.mp4" data-object-fit="cover"></video><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim has-background-gradient" style="background:linear-gradient(135deg,rgb(0,0,0) 0%,rgba(0,0,0,0) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"text_eyebrow","style":{"typography":{"textTransform":"uppercase"}}} -->
<p class="text_eyebrow" style="text-transform:uppercase">Experience.&nbsp; Vigilance.&nbsp; Confidence.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"text_gradient"} -->
<h1 class="wp-block-heading text_gradient">Executive protection for what matters most.</h1>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">REQUEST PROTECTION BRIEFING</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"className":"sec_nextfold","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"80px","bottom":"80px"}}},"backgroundColor":"black","textColor":"white"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_nextfold has-white-color has-black-background-color has-text-color has-background has-link-color" style="padding-top:80px;padding-bottom:80px"><div class="div-wrap-content"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","iconSize":72,"title":"THE HIGHEST OPERATIONAL STANDARDS","titleTag":"h2","titleClass":"text_gradient","className":"heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:72px;height:72px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">THE HIGHEST OPERATIONAL STANDARDS</h2></div></div></div>
<!-- /wp:mbn-theme/icon-box --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"55.5%"} -->
<div class="wp-block-column" style="flex-basis:55.5%"><!-- wp:paragraph {"style":{"color":{"text":"#b6b8bd"},"elements":{"link":{"color":{"text":"#b6b8bd"}}}}} -->
<p class="has-text-color has-link-color" style="color:#b6b8bd"><strong>Blackline Security Operations </strong>specializes in high-end, client-focused security, training and consulting solutions. The company was built on a credo of ironclad discretion, unfaltering discipline and thoughtful, intelligence-led planning. Every protective assignment follows established doctrine and proven operational procedures.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:mbn-theme/mbn-slider {"slidesDesktop":4,"slidesTablet":3,"slidesMobile":2,"className":"nextfold_slider"} -->
<div class="wp-block-mbn-theme-mbn-slider mbn-slider display-slider nextfold_slider"><div class="mbn-slider-items items-slider" data-autoplay="true" data-autoplay-speed="3000" data-speed="500" data-infinite="true" data-dots="true" data-arrows="true" data-fade="false" data-center-mode="false" data-slides-desktop="4" data-slides-tablet="3" data-slides-mobile="2"><!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-discreet.jpg","imageId":132,"imagePosition":"background","title":"Discreet, under-the-radar presence","titleTag":"h3","content":"\u003cp\u003ewith the highest degree of readiness\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-discreet.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Discreet, under-the-radar presence</h3><div class="image-box-text"><p>with the highest degree of readiness</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-02.jpg","imageId":203,"imagePosition":"background","title":"Security management and risk consulting","titleTag":"h3","content":"\u003cp\u003e\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-02.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Security management and risk consulting</h3><div class="image-box-text"><p></p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-04.jpg","imageId":201,"imagePosition":"background","title":"Seamless coordination","titleTag":"h3","content":"\u003cp\u003ewith law enforcement and existing security teams\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-04.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Seamless coordination</h3><div class="image-box-text"><p>with law enforcement and existing security teams</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-05.jpg","imageId":200,"imagePosition":"background","title":"Compliance","titleTag":"h3","content":"\u003cp\u003ewith all federal, state, and local regulatory requirements\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-05.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Compliance</h3><div class="image-box-text"><p>with all federal, state, and local regulatory requirements</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-03.jpg","imageId":202,"imagePosition":"background","title":"Comprehensive protection","titleTag":"h3","content":"\u003cp\u003eanytime, anywhere\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-03.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Comprehensive protection</h3><div class="image-box-text"><p>anytime, anywhere</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-06.jpg","imageId":199,"imagePosition":"background","title":"Threat assements and Planning","titleTag":"h3","content":"\u003cp\u003eThoughtful, constructive\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-06.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Threat assements and Planning</h3><div class="image-box-text"><p>Thoughtful, constructive</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-07.jpg","imageId":198,"imagePosition":"background","title":"Scalable Solutions","titleTag":"h3","content":"\u003cp\u003escalable protective solutions based on evolving risk levels\u003c/p\u003e"} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-07.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Scalable Solutions</h3><div class="image-box-text"><p>scalable protective solutions based on evolving risk levels</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item --></div></div>
<!-- /wp:mbn-theme/mbn-slider --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"backgroundImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-support-01.jpg","backgroundImageId":151,"backgroundType":"image","backgroundPosition":"bottom center","className":"sec_support","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_support has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd;background-image:url(http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bg-support-01.jpg);background-size:cover;background-position:bottom center;background-repeat:no-repeat;background-attachment:scroll"><div class="div-wrap-content"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"700px","className":"copy","style":{"spacing":{"padding":{"bottom":"40px"}}}} -->
<div class="wp-block-column copy" style="padding-bottom:40px;flex-basis:700px"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","title":"Support for Members of Congress and Other Government Officials","titleTag":"h2","titleClass":"text_gradient","description":"\u003cp\u003eBlackline protects and supports government officials operating in threat-sensitive environments.\u003c/p\u003e\u003cp\u003eOur executive protection and residential security programs for members of congress and other covered government officials are all structured to align with legislative security allowances and reimbursement schedules.\u003c/p\u003e\u003cp\u003eBlackline’s services can easily be set up to operate within defined monthly security budgets. We provide all required documentation for reimbursement and also integrate seamlessly with all existing congressional security guidelines.\u003c/p\u003e","className":"heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">Support for Members of Congress and Other Government Officials</h2><div class="icon-box-description"><p>Blackline protects and supports government officials operating in threat-sensitive environments.</p><p>Our executive protection and residential security programs for members of congress and other covered government officials are all structured to align with legislative security allowances and reimbursement schedules.</p><p>Blackline’s services can easily be set up to operate within defined monthly security budgets. We provide all required documentation for reimbursement and also integrate seamlessly with all existing congressional security guidelines.</p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">LEARN WHO WE SUPPORT</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"align":"full","className":"sec_mediabox","style":{"spacing":{"padding":{"right":"0px","left":"0px","top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"black","textColor":"white"} -->
<div class="wp-block-mbn-theme-div-wrap alignfull div-wrap-block  sec_mediabox has-white-color has-black-background-color has-text-color has-background has-link-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><div class="div-wrap-content"><!-- wp:columns {"isStackedOnMobile":false,"className":"fullw no-gap"} -->
<div class="wp-block-columns is-not-stacked-on-mobile fullw no-gap"><!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:image {"id":143,"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"imgfull"} -->
<figure class="wp-block-image size-full imgfull"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-support1.jpg" alt="" class="wp-image-143" style="object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:video {"id":415,"className":"videobox"} -->
<figure class="wp-block-video videobox"><video autoplay loop muted poster="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-support2.jpg" src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/bodyguard-awaiting-video.mp4" playsinline></video></figure>
<!-- /wp:video --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"className":"sec_leadership","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"},"spacing":{"padding":{"top":"50px","bottom":"50px"}}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_leadership has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd;padding-top:50px;padding-bottom:50px"><div class="div-wrap-content"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","iconSize":72,"title":"\u003cem\u003eLEADERSHIP TEAM\u003c/em\u003e","titleTag":"h2","titleClass":"text_gradient","className":"leadership_title"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left leadership_title"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:72px;height:72px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient"><em>LEADERSHIP TEAM</em></h2></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:columns {"className":"leadership_box","style":{"typography":{"fontSize":"16px"}}} -->
<div class="wp-block-columns leadership_box" style="font-size:16px"><!-- wp:column {"width":"42%","className":"media"} -->
<div class="wp-block-column media" style="flex-basis:42%"><!-- wp:image {"id":169,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-brandon-tatum.webp" alt="" class="wp-image-169"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"copy"} -->
<div class="wp-block-column copy"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-link-color">Brandon Tatum</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"24px"}},"textColor":"white"} -->
<p class="has-white-color has-text-color has-link-color" style="font-size:24px">Chief Executive Officer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Brandon Tatum is the CEO of Blackline Security Operations.&nbsp; His impressive resumé includes over six years of service with the Tucson, Arizona Police Department as a SWAT operator, a Field Training Officer, a G.I., as well as their Public Information Officer.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>In these various capacities, Officer Tatum built an enviable reputation in the security field, one rooted in discipline, threat awareness and operational readiness.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Tatum is a true rarity in the field of private security.&nbsp; He brings an incomparable combination of law enforcement experience, tactical training and executive leadership that is far from ordinary in the protection industry.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>As the hands-on leader of Blackline Security Operations, Tatum is the principal architect of Blackline’s mission and high operational standards.&nbsp; Brandon uses Blackline for all his own executive and family protection.&nbsp; This ensures that the company delivers a standard of excellence for its clients that the CEO himself relies on.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Blackline is well on its way to becoming America’s most trusted and influential protective services company - one known for operational excellence, unwavering integrity, constant innovation and an ironclad commitment to client safety.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"leadership_box","style":{"typography":{"fontSize":"16px"}}} -->
<div class="wp-block-columns leadership_box" style="font-size:16px"><!-- wp:column {"className":"copy"} -->
<div class="wp-block-column copy"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-link-color">Brad Battaglia</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"24px"}},"textColor":"white"} -->
<p class="has-white-color has-text-color has-link-color" style="font-size:24px">Director of Executive Protection and Field Operations</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Bradley Battaglia is a seasoned security professional with over two decades of experience serving in the U.S. Military, local law enforcement, and the private sector.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Brad’s military background includes serving as a U.S. Army Airborne Infantry Sniper Section Sergeant, where he led specialized teams and executed precision engagements in the most complex operational settings.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>After his military service, Brad continued his career as a Special Weapons and Tactics (SWAT) sniper and Deputy Sheriff.&nbsp;There, he gained invaluable experience and expertise in threat response, crisis management, and Arizona law enforcement operations.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>In the private security sector, Battaglia served as a PSS, a Protective Security Specialist, in Baghdad, Iraq under Triple Canopy’s Worldwide Protective Services contract - one of the most rigorous federal security programs in existence.&nbsp;Triple Canopy is a private American security company that provides armed security, mission support and risk management services to corporate and governmental clients.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Brad Battaglia earned a Bachelor’s degree in Intelligence Studies, with a specialty in Counterterrorism.&nbsp;This has provided Brad with a formidable academic foundation for advanced threat analysis and strategic security planning.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%","className":"media"} -->
<div class="wp-block-column media" style="flex-basis:42%"><!-- wp:image {"id":167,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-brad-battaglia.webp" alt="" class="wp-image-167"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","title":"\u003cem\u003eLEADERSHIP TEAM\u003c/em\u003e","titleTag":"h2","titleClass":"text_gradient","className":"leadership_title"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left leadership_title"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient"><em>LEADERSHIP TEAM</em></h2></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:columns {"className":"leadership_box","style":{"typography":{"fontSize":"16px"}}} -->
<div class="wp-block-columns leadership_box" style="font-size:16px"><!-- wp:column {"width":"42%","className":"media"} -->
<div class="wp-block-column media" style="flex-basis:42%"><!-- wp:image {"id":168,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/img-bradley-cox.webp" alt="" class="wp-image-168"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"copy"} -->
<div class="wp-block-column copy"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-link-color">Bradley Cox</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"24px"}},"textColor":"white"} -->
<p class="has-white-color has-text-color has-link-color" style="font-size:24px">Chief of Security Operations | Blackline Security Operations</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Bradley Cox serves as Chief of Security Operations for Blackline Security Operations, leading protective operations for ultra-high-net-worth individuals, public figures, and organizations facing elevated risk.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>With more than 20 years of experience across military combat operations, law enforcement, government contracting, and executive protection, Bradley brings a rare combination of field-tested leadership and high-level security strategy. He has led complex operations in both domestic and international environments, overseeing teams responsible for safeguarding principals, families, and critical assets.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>His expertise includes threat assessment, secure travel, crisis response, and proactive security planning designed to identify and mitigate risk before it escalates. Prior to his corporate protection leadership, Bradley served in high-threat regions supporting U.S. interests through convoy security, facility defense, and personnel training. He also served as a Sergeant in the United States Army, including combat deployments to Iraq.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Bradley is a recipient of the Bronze Star Medal with Valor and holds advanced credentials in executive protection, firearms instruction, defensive tactics, surveillance detection, and emergency medical response.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>At Blackline, he brings discipline, discretion, and proven operational leadership to clients who require serious protection in serious environments.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"className":"sec_trusted","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_trusted has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd"><div class="div-wrap-content"><!-- wp:columns {"verticalAlignment":"bottom"} -->
<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom","width":"56%","className":"copy"} -->
<div class="wp-block-column is-vertically-aligned-bottom copy" style="flex-basis:56%"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","title":"TRUSTED BY THESE WELL KNOWN COMPANIES","titleTag":"h2","titleClass":"text_gradient","description":"\u003cp\u003eFrom Fortune 1000 corporations to high-risk verticals like healthcare and insurance, Blackline Security Ops’ executive protection teams uncover threats sooner, protect leaders more effectively, and quickly adapt to a fast-changing risk environment.\u003c/p\u003e","metadata":{"name":"Title with icon"},"className":"heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">TRUSTED BY THESE WELL KNOWN COMPANIES</h2><div class="icon-box-description"><p>From Fortune 1000 corporations to high-risk verticals like healthcare and insurance, Blackline Security Ops’ executive protection teams uncover threats sooner, protect leaders more effectively, and quickly adapt to a fast-changing risk environment.</p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"","className":"action"} -->
<div class="wp-block-column is-vertically-aligned-bottom action"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"black","textColor":"white","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-black-background-color has-text-color has-background has-link-color wp-element-button" href="#">EXPLORE CLIENT STORIES</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:mbn-theme/logo-list {"logos":[{"id":180,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1.png","alt":""},{"id":181,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo2.png","alt":""},{"id":188,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1-2.png","alt":""},{"id":185,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo2-1.png","alt":""},{"id":187,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1-1.png","alt":""},{"id":186,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo2-2.png","alt":""},{"id":191,"url":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1-3.png","alt":""}],"gridColumns":7,"gridGap":"0","logoHeight":""} -->
<div class="wp-block-mbn-theme-logo-list logo-list display-grid"><div class="logo-list-container logo-grid" style="display:grid;grid-template-columns:repeat(7, 1fr);gap:0" data-logo-height=""><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo2.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1-2.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo2-1.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1-1.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo2-2.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/Placeholder-Logo1-3.png" alt="" loading="lazy"/></div></div></div>
<!-- /wp:mbn-theme/logo-list --></div>
<!-- /wp:group --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"className":"sec_getintouch","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_getintouch has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd"><div class="div-wrap-content"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","title":"GET IN TOUCH","titleTag":"h2","titleClass":"text_gradient","description":"\u003cp\u003eTo request a confidential briefing or discuss protection requirements, complete the form below. Sensitive operational details should be discussed by phone or in person.\u003c/p\u003e","metadata":{"name":"Title with icon"},"className":"gitcopy heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left gitcopy heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://blacklinesecurityops.dev.local/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">GET IN TOUCH</h2><div class="icon-box-description"><p>To request a confidential briefing or discuss protection requirements, complete the form below. Sensitive operational details should be discussed by phone or in person.</p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:group {"className":"get_info","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group get_info"><!-- wp:mbn-theme/icon-box {"iconType":"svg","iconSvgCode":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 width=\u002228\u0022 height=\u002222\u0022 viewBox=\u00220 0 28 22\u0022 fill=\u0022none\u0022\u003e\n  \u003cpath d=\u0022M2.27148 0.5H24.7939C25.2713 0.5 25.68 0.669072 26.042 1.03125C26.4042 1.39325 26.5732 1.80194 26.5732 2.2793V19.4688C26.5732 19.9433 26.404 20.3494 26.042 20.71C25.6801 21.0707 25.2719 21.2402 24.7939 21.2402H2.27148C1.8558 21.2402 1.49268 21.1107 1.16699 20.8369L1.0293 20.7109C0.668656 20.3505 0.5 19.9439 0.5 19.4688V2.2793C0.5 1.80152 0.668732 1.39303 1.0293 1.03125H1.03027C1.39088 0.669222 1.79695 0.5 2.27148 0.5ZM1.77148 2.43945V19.9688H25.2939V3.36816L24.5195 3.87793L13.8984 10.8701C13.8131 10.9149 13.7374 10.951 13.6699 10.9775C13.6487 10.9859 13.6058 10.9971 13.5322 10.9971C13.459 10.997 13.4167 10.9859 13.3955 10.9775C13.3278 10.9509 13.2517 10.9151 13.166 10.8701L2.77148 4.02637V3.09473L13.2588 9.96387L13.5322 10.1436L13.8057 9.96387L24.9346 2.69727L26.3408 1.7793H0.761719L1.77148 2.43945Z\u0022 fill=\u0022#DD9E2D\u0022 stroke=\u0022#DD9E2D\u0022/\u003e\n\u003c/svg\u003e","iconPosition":"left","iconSize":32,"title":"\u003cstrong\u003eEmail\u003c/strong\u003e","titleTag":"h4","titleColor":"#ffffff","description":"\u003cp\u003e\u003ca href=\u0022mailto:info@blacklinesecurityoperations.com\u0022\u003einfo@blacklinesecurityoperations.com\u003c/a\u003e\u003c/p\u003e","className":"flex_column"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><div class="icon-box-svg" style="width:32px;height:32px"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="22" viewBox="0 0 28 22" fill="none">
  <path d="M2.27148 0.5H24.7939C25.2713 0.5 25.68 0.669072 26.042 1.03125C26.4042 1.39325 26.5732 1.80194 26.5732 2.2793V19.4688C26.5732 19.9433 26.404 20.3494 26.042 20.71C25.6801 21.0707 25.2719 21.2402 24.7939 21.2402H2.27148C1.8558 21.2402 1.49268 21.1107 1.16699 20.8369L1.0293 20.7109C0.668656 20.3505 0.5 19.9439 0.5 19.4688V2.2793C0.5 1.80152 0.668732 1.39303 1.0293 1.03125H1.03027C1.39088 0.669222 1.79695 0.5 2.27148 0.5ZM1.77148 2.43945V19.9688H25.2939V3.36816L24.5195 3.87793L13.8984 10.8701C13.8131 10.9149 13.7374 10.951 13.6699 10.9775C13.6487 10.9859 13.6058 10.9971 13.5322 10.9971C13.459 10.997 13.4167 10.9859 13.3955 10.9775C13.3278 10.9509 13.2517 10.9151 13.166 10.8701L2.77148 4.02637V3.09473L13.2588 9.96387L13.5322 10.1436L13.8057 9.96387L24.9346 2.69727L26.3408 1.7793H0.761719L1.77148 2.43945Z" fill="#DD9E2D" stroke="#DD9E2D"/>
</svg></div></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Email</strong></h4><div class="icon-box-description"><p><a href="mailto:info@blacklinesecurityoperations.com">info@blacklinesecurityoperations.com</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:mbn-theme/icon-box {"iconType":"svg","iconSvgCode":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 width=\u002232\u0022 height=\u002232\u0022 viewBox=\u00220 0 32 32\u0022 fill=\u0022none\u0022\u003e\n  \u003cpath d=\u0022M5.49202 4.29297H10.159C10.4429 4.29305 10.6543 4.37934 10.827 4.54199C11.0199 4.72357 11.1656 4.97248 11.2508 5.3125L12.1405 9.34082C12.1874 9.6688 12.1776 9.93944 12.1248 10.1611C12.0758 10.3672 11.9768 10.5392 11.8211 10.6875L11.8153 10.6943L8.45784 14.0049L8.17854 14.2803L8.37874 14.6172C8.94454 15.568 9.54555 16.458 10.1815 17.2871C10.8202 18.1199 11.5294 18.912 12.3084 19.6631C13.122 20.5033 13.9723 21.2654 14.8592 21.9482C15.7521 22.6357 16.6848 23.2372 17.6571 23.752L17.9881 23.9277L18.2498 23.6592L21.4559 20.3691L21.4657 20.3584C21.6698 20.1369 21.8904 19.9983 22.1297 19.9268L22.1307 19.9277C22.3247 19.8702 22.5181 19.8482 22.7127 19.8623L22.908 19.8887L26.6815 20.7236C27.0065 20.8142 27.2512 20.9736 27.4364 21.1973C27.6173 21.4158 27.7068 21.6631 27.7069 21.96V26.5078C27.7069 26.8656 27.5921 27.1386 27.367 27.3613C27.1392 27.5866 26.8659 27.6992 26.5155 27.6992C23.9878 27.6991 21.404 27.0919 18.7596 25.8633C16.116 24.6351 13.6586 22.8892 11.3885 20.6191C9.26049 18.4911 7.59223 16.1973 6.37776 13.7383L6.14046 13.2451L5.91682 12.749C4.83529 10.2746 4.30061 7.85669 4.30061 5.49219C4.30063 5.17911 4.38843 4.92968 4.56136 4.7207L4.64046 4.63379C4.8654 4.40761 5.13796 4.29297 5.49202 4.29297ZM5.58772 6.09375C5.62843 7.03203 5.77599 8.01839 6.02718 9.05176C6.27991 10.0914 6.67731 11.2422 7.2137 12.501L7.50276 13.1797L8.0262 12.6592L10.7176 9.98145L10.911 9.78906L10.8543 9.52246L10.0955 5.96777L10.0116 5.57227H5.56526L5.58772 6.09375ZM26.4285 21.9717L26.0291 21.8896L22.7157 21.2041L22.4442 21.1475L22.2528 21.3486L19.6356 24.0918L19.1541 24.5957L19.786 24.8896C20.7021 25.3158 21.6961 25.6624 22.7664 25.9307C23.838 26.1992 24.8839 26.3605 25.9032 26.4121L26.4285 26.4385V21.9717Z\u0022 fill=\u0022#DD9E2D\u0022 stroke=\u0022#DD9E2D\u0022/\u003e\n\u003c/svg\u003e","iconPosition":"left","iconSize":32,"title":"\u003cstrong\u003ePhone\u003c/strong\u003e","titleTag":"h4","titleColor":"#ffffff","description":"\u003cp\u003e\u003ca href=\u0022tel:+1 (844) 225-3546\u0022\u003e+1 (844) 225-3546\u003c/a\u003e\u003c/p\u003e","className":"flex_column"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><div class="icon-box-svg" style="width:32px;height:32px"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
  <path d="M5.49202 4.29297H10.159C10.4429 4.29305 10.6543 4.37934 10.827 4.54199C11.0199 4.72357 11.1656 4.97248 11.2508 5.3125L12.1405 9.34082C12.1874 9.6688 12.1776 9.93944 12.1248 10.1611C12.0758 10.3672 11.9768 10.5392 11.8211 10.6875L11.8153 10.6943L8.45784 14.0049L8.17854 14.2803L8.37874 14.6172C8.94454 15.568 9.54555 16.458 10.1815 17.2871C10.8202 18.1199 11.5294 18.912 12.3084 19.6631C13.122 20.5033 13.9723 21.2654 14.8592 21.9482C15.7521 22.6357 16.6848 23.2372 17.6571 23.752L17.9881 23.9277L18.2498 23.6592L21.4559 20.3691L21.4657 20.3584C21.6698 20.1369 21.8904 19.9983 22.1297 19.9268L22.1307 19.9277C22.3247 19.8702 22.5181 19.8482 22.7127 19.8623L22.908 19.8887L26.6815 20.7236C27.0065 20.8142 27.2512 20.9736 27.4364 21.1973C27.6173 21.4158 27.7068 21.6631 27.7069 21.96V26.5078C27.7069 26.8656 27.5921 27.1386 27.367 27.3613C27.1392 27.5866 26.8659 27.6992 26.5155 27.6992C23.9878 27.6991 21.404 27.0919 18.7596 25.8633C16.116 24.6351 13.6586 22.8892 11.3885 20.6191C9.26049 18.4911 7.59223 16.1973 6.37776 13.7383L6.14046 13.2451L5.91682 12.749C4.83529 10.2746 4.30061 7.85669 4.30061 5.49219C4.30063 5.17911 4.38843 4.92968 4.56136 4.7207L4.64046 4.63379C4.8654 4.40761 5.13796 4.29297 5.49202 4.29297ZM5.58772 6.09375C5.62843 7.03203 5.77599 8.01839 6.02718 9.05176C6.27991 10.0914 6.67731 11.2422 7.2137 12.501L7.50276 13.1797L8.0262 12.6592L10.7176 9.98145L10.911 9.78906L10.8543 9.52246L10.0955 5.96777L10.0116 5.57227H5.56526L5.58772 6.09375ZM26.4285 21.9717L26.0291 21.8896L22.7157 21.2041L22.4442 21.1475L22.2528 21.3486L19.6356 24.0918L19.1541 24.5957L19.786 24.8896C20.7021 25.3158 21.6961 25.6624 22.7664 25.9307C23.838 26.1992 24.8839 26.3605 25.9032 26.4121L26.4285 26.4385V21.9717Z" fill="#DD9E2D" stroke="#DD9E2D"/>
</svg></div></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Phone</strong></h4><div class="icon-box-description"><p><a href="tel:+1 (844) 225-3546">+1 (844) 225-3546</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:mbn-theme/icon-box {"iconType":"svg","iconSvgCode":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 width=\u002232\u0022 height=\u002232\u0022 viewBox=\u00220 0 32 32\u0022 fill=\u0022none\u0022\u003e\n  \u003cpath d=\u0022M16.0002 2.95947C18.7426 2.95952 21.1537 3.91573 23.2531 5.84717C25.3237 7.75196 26.3741 10.3096 26.3742 13.5757C26.3742 14.9148 26.0791 16.2521 25.4806 17.5894C24.871 18.9518 24.1054 20.2557 23.1847 21.5024C22.258 22.7574 21.2513 23.9286 20.1642 25.0161C19.065 26.116 18.0395 27.0898 17.0881 27.937L17.0832 27.9419L17.0773 27.9468C16.9383 28.0782 16.7783 28.1734 16.592 28.2339C16.3814 28.3022 16.181 28.3345 15.9894 28.3345C15.7981 28.3345 15.6024 28.302 15.4006 28.2349C15.2224 28.1756 15.0695 28.0824 14.9367 27.9526L14.9279 27.9438L14.9181 27.936L14.1877 27.2769C13.4437 26.5944 12.6593 25.8408 11.8351 25.0161C10.7482 23.9287 9.7413 22.7573 8.81462 21.5024C7.89411 20.2559 7.13052 18.9514 6.52361 17.5894C5.92772 16.2521 5.63396 14.9151 5.63396 13.5757C5.63405 10.3095 6.68317 7.7519 8.75114 5.84717C10.8479 3.91586 13.2577 2.95947 16.0002 2.95947ZM15.9992 4.23877C13.4616 4.23887 11.2986 5.11332 9.54216 6.85986C7.77755 8.61469 6.90554 10.8678 6.90544 13.5757C6.90544 15.4227 7.67788 17.4436 9.14079 19.6226C10.6042 21.802 12.7821 24.2303 15.6593 26.9067L15.9953 27.2202L16.3361 26.9106C19.281 24.239 21.4794 21.8091 22.9123 19.6216C24.3413 17.4398 25.0949 15.4194 25.0949 13.5757C25.0948 10.8677 24.222 8.61472 22.4572 6.85986C20.7003 5.11327 18.5369 4.23877 15.9992 4.23877ZM15.9972 11.436C16.5292 11.4361 16.9681 11.6176 17.342 11.9897C17.7152 12.3614 17.8967 12.799 17.8967 13.3306C17.8966 13.8627 17.7154 14.2995 17.3439 14.6704C16.9725 15.0412 16.5355 15.2221 16.0031 15.2222C15.4702 15.2222 15.0329 15.042 14.6623 14.6733C14.2922 14.3047 14.1105 13.8688 14.1105 13.3364C14.1105 12.8034 14.2906 12.3635 14.6603 11.9897L14.6613 11.9907C15.0301 11.6183 15.4657 11.436 15.9972 11.436Z\u0022 fill=\u0022#DD9E2D\u0022 stroke=\u0022#DD9E2D\u0022/\u003e\n\u003c/svg\u003e","iconPosition":"left","iconSize":32,"title":"\u003cstrong\u003eOffice\u003c/strong\u003e","titleTag":"h4","titleColor":"#ffffff","description":"\u003cp\u003eBlackline Guardian Fund, United States\u003c/p\u003e\u003cp\u003e\u003ca href=\u0022#\u0022 class=\u0022btn_getdir\u0022\u003eGet directions\u003c/a\u003e\u003c/p\u003e","className":"flex_column"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><div class="icon-box-svg" style="width:32px;height:32px"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
  <path d="M16.0002 2.95947C18.7426 2.95952 21.1537 3.91573 23.2531 5.84717C25.3237 7.75196 26.3741 10.3096 26.3742 13.5757C26.3742 14.9148 26.0791 16.2521 25.4806 17.5894C24.871 18.9518 24.1054 20.2557 23.1847 21.5024C22.258 22.7574 21.2513 23.9286 20.1642 25.0161C19.065 26.116 18.0395 27.0898 17.0881 27.937L17.0832 27.9419L17.0773 27.9468C16.9383 28.0782 16.7783 28.1734 16.592 28.2339C16.3814 28.3022 16.181 28.3345 15.9894 28.3345C15.7981 28.3345 15.6024 28.302 15.4006 28.2349C15.2224 28.1756 15.0695 28.0824 14.9367 27.9526L14.9279 27.9438L14.9181 27.936L14.1877 27.2769C13.4437 26.5944 12.6593 25.8408 11.8351 25.0161C10.7482 23.9287 9.7413 22.7573 8.81462 21.5024C7.89411 20.2559 7.13052 18.9514 6.52361 17.5894C5.92772 16.2521 5.63396 14.9151 5.63396 13.5757C5.63405 10.3095 6.68317 7.7519 8.75114 5.84717C10.8479 3.91586 13.2577 2.95947 16.0002 2.95947ZM15.9992 4.23877C13.4616 4.23887 11.2986 5.11332 9.54216 6.85986C7.77755 8.61469 6.90554 10.8678 6.90544 13.5757C6.90544 15.4227 7.67788 17.4436 9.14079 19.6226C10.6042 21.802 12.7821 24.2303 15.6593 26.9067L15.9953 27.2202L16.3361 26.9106C19.281 24.239 21.4794 21.8091 22.9123 19.6216C24.3413 17.4398 25.0949 15.4194 25.0949 13.5757C25.0948 10.8677 24.222 8.61472 22.4572 6.85986C20.7003 5.11327 18.5369 4.23877 15.9992 4.23877ZM15.9972 11.436C16.5292 11.4361 16.9681 11.6176 17.342 11.9897C17.7152 12.3614 17.8967 12.799 17.8967 13.3306C17.8966 13.8627 17.7154 14.2995 17.3439 14.6704C16.9725 15.0412 16.5355 15.2221 16.0031 15.2222C15.4702 15.2222 15.0329 15.042 14.6623 14.6733C14.2922 14.3047 14.1105 13.8688 14.1105 13.3364C14.1105 12.8034 14.2906 12.3635 14.6603 11.9897L14.6613 11.9907C15.0301 11.6183 15.4657 11.436 15.9972 11.436Z" fill="#DD9E2D" stroke="#DD9E2D"/>
</svg></div></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Office</strong></h4><div class="icon-box-description"><p>Blackline Guardian Fund, United States</p><p><a href="#" class="btn_getdir">Get directions</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"gitform","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group gitform"><!-- wp:shortcode -->
[gravityform id="1" title="false" ajax="true"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->
EOD
);
