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
	'title'               => 'Home',
	'slug'                => 'home',
	'status'              => 'publish',
	'excerpt'             => '',
	'parent_slug'         => '',
	'menu_order'          => 0,
	'template'            => '',
	'featured_image_url'  => '',
	'featured_image_path' => '', // Theme assets path (ships via Git)
	'custom_fields'       => array(),
	'content'             => <<<'EOD'
<!-- wp:mbn-theme/div-wrap {"backgroundImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/bg-sechero.jpg","backgroundImageId":69,"backgroundType":"image","customClassName":"hero_test","borderWidth":"0","metadata":{"name":"Hero"},"className":"sec_hero","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"}}}} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block hero_test sec_hero" style="padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px;background-image:url(http://localhost:8082/wp-content/uploads/2026/04/bg-sechero.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;background-attachment:scroll;border-width:0;border-style:solid"><div class="div-wrap-content"><!-- wp:cover {"url":"http://localhost:8082/wp-content/uploads/2026/04/portrait-of-bearded-bodyguard-in-earphone.mp4","id":66,"dimRatio":0,"isUserOverlayColor":true,"backgroundType":"video","customGradient":"linear-gradient(135deg,rgb(0,0,0) 0%,rgba(0,0,0,0) 100%)","contentPosition":"center center","isDark":false,"sizeSlug":"full","className":"postatic","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light postatic has-white-color has-text-color has-link-color" style="padding-top:100px;padding-bottom:100px"><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="http://localhost:8082/wp-content/uploads/2026/04/portrait-of-bearded-bodyguard-in-earphone.mp4" data-object-fit="cover"></video><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim has-background-gradient" style="background:linear-gradient(135deg,rgb(0,0,0) 0%,rgba(0,0,0,0) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"text_eyebrow","style":{"typography":{"textTransform":"uppercase"}}} -->
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
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","iconSize":72,"titleTag":"h2","titleClass":"text_gradient","className":"heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:72px;height:72px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">THE HIGHEST OPERATIONAL STANDARDS</h2></div></div></div>
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
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/bg-discreet.jpg","imageId":132,"imagePosition":"background","title":"Discreet, under-the-radar presence","titleTag":"h3","content":"\u003cp\u003ewith the highest degree of readiness\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/bg-discreet.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Discreet, under-the-radar presence</h3><div class="image-box-text"><p>with the highest degree of readiness</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/img-02.jpg","imageId":203,"imagePosition":"background","title":"Security management and risk consulting","titleTag":"h3","content":"\u003cp\u003e\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/img-02.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Security management and risk consulting</h3><div class="image-box-text"><p></p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/img-04.jpg","imageId":201,"imagePosition":"background","title":"Seamless coordination","titleTag":"h3","content":"\u003cp\u003ewith law enforcement and existing security teams\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/img-04.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Seamless coordination</h3><div class="image-box-text"><p>with law enforcement and existing security teams</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/img-05.jpg","imageId":200,"imagePosition":"background","title":"Compliance","titleTag":"h3","content":"\u003cp\u003ewith all federal, state, and local regulatory requirements\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/img-05.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Compliance</h3><div class="image-box-text"><p>with all federal, state, and local regulatory requirements</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/img-03.jpg","imageId":202,"imagePosition":"background","title":"Comprehensive protection","titleTag":"h3","content":"\u003cp\u003eanytime, anywhere\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/img-03.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Comprehensive protection</h3><div class="image-box-text"><p>anytime, anywhere</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/img-06.jpg","imageId":199,"imagePosition":"background","title":"Threat assements and Planning","titleTag":"h3","content":"\u003cp\u003eThoughtful, constructive\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/img-06.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Threat assements and Planning</h3><div class="image-box-text"><p>Thoughtful, constructive</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item -->

<!-- wp:mbn-theme/slider-item -->
<div class="wp-block-mbn-theme-slider-item slider-item"><div class="slider-item-content"><!-- wp:mbn-theme/image-box {"imageUrl":"http://localhost:8082/wp-content/uploads/2026/04/img-07.jpg","imageId":198,"imagePosition":"background","title":"Scalable Solutions","titleTag":"h3","content":"\u003cp\u003escalable protective solutions based on evolving risk levels\u003c/p\u003e","showList":false} -->
<div class="wp-block-mbn-theme-image-box image-box image-position-background" style="background-image:url(http://localhost:8082/wp-content/uploads/2026/04/img-07.jpg);background-size:cover;background-position:center"><div class="image-box-inner"><div class="image-box-content"><h3 class="image-box-title">Scalable Solutions</h3><div class="image-box-text"><p>scalable protective solutions based on evolving risk levels</p></div></div></div></div>
<!-- /wp:mbn-theme/image-box --></div></div>
<!-- /wp:mbn-theme/slider-item --></div></div>
<!-- /wp:mbn-theme/mbn-slider --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"backgroundImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/bg-support-01.jpg","backgroundImageId":151,"backgroundType":"image","backgroundPosition":"bottom center","className":"sec_support","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_support has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd;background-image:url(http://localhost:8082/wp-content/uploads/2026/04/bg-support-01.jpg);background-size:cover;background-position:bottom center;background-repeat:no-repeat;background-attachment:scroll"><div class="div-wrap-content"><!-- wp:mbn-theme/content-box {"boxWidth":"700px","boxMargin":"0 0 70px","iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","title":"Support for Members of Congress and Other Government Officials","titleTag":"h2","titleClass":"text_gradient","className":"copy"} -->
<div class="wp-block-mbn-theme-content-box content-box icon-position-left copy" style="width:700px;margin:0 0 70px"><div class="content-box-inner flex gap-4 flex-row items-start"><div class="content-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="content-box-content" style="flex:1px;width:100%"><h2 class="content-box-title text_gradient">Support for Members of Congress and Other Government Officials</h2><div class="content-box-blocks"><!-- wp:paragraph -->
<p>Blackline protects and supports government officials operating in threat-sensitive environments.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Our executive protection and residential security programs for members of congress and other covered government officials are all structured to align with legislative security allowances and reimbursement schedules.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Blackline’s services can easily be set up to operate within defined monthly security budgets. We provide all required documentation for reimbursement and also integrate seamlessly with all existing congressional security guidelines.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">LEARN WHO WE SUPPORT</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div></div></div>
<!-- /wp:mbn-theme/content-box --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"align":"full","className":"sec_mediabox","style":{"spacing":{"padding":{"right":"0px","left":"0px","top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"black","textColor":"white"} -->
<div class="wp-block-mbn-theme-div-wrap alignfull div-wrap-block  sec_mediabox has-white-color has-black-background-color has-text-color has-background has-link-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><div class="div-wrap-content"><!-- wp:columns {"isStackedOnMobile":false,"className":"fullw no-gap"} -->
<div class="wp-block-columns is-not-stacked-on-mobile fullw no-gap"><!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:image {"id":143,"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"imgfull"} -->
<figure class="wp-block-image size-full imgfull"><img src="http://localhost:8082/wp-content/uploads/2026/04/img-support1.jpg" alt="" class="wp-image-143" style="object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:video {"id":415,"className":"videobox"} -->
<figure class="wp-block-video videobox"><video autoplay loop muted poster="http://localhost:8082/wp-content/uploads/2026/04/img-support2.jpg" src="http://localhost:8082/wp-content/uploads/2026/04/bodyguard-awaiting-video.mp4" playsinline></video></figure>
<!-- /wp:video --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"className":"sec_leadership","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"},"spacing":{"padding":{"top":"50px","bottom":"50px"}}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_leadership has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd;padding-top:50px;padding-bottom:50px"><div class="div-wrap-content"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","iconSize":72,"titleTag":"h2","titleClass":"text_gradient","className":"leadership_title"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left leadership_title"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:72px;height:72px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient"><em>LEADERSHIP TEAM</em></h2></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:columns {"className":"leadership_box","style":{"typography":{"fontSize":"16px"}}} -->
<div class="wp-block-columns leadership_box" style="font-size:16px"><!-- wp:column {"width":"42%","className":"media"} -->
<div class="wp-block-column media" style="flex-basis:42%"><!-- wp:image {"id":169,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost:8082/wp-content/uploads/2026/04/img-brandon-tatum.webp" alt="" class="wp-image-169"/></figure>
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
<div class="wp-block-column media" style="flex-basis:42%"><!-- wp:image {"id":451,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost:8082/wp-content/uploads/2026/04/img-brad-battaglia2.webp" alt="" class="wp-image-451"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","titleTag":"h2","titleClass":"text_gradient","className":"leadership_title"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left leadership_title"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient"><em>LEADERSHIP TEAM</em></h2></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:columns {"className":"leadership_box","style":{"typography":{"fontSize":"16px"}}} -->
<div class="wp-block-columns leadership_box" style="font-size:16px"><!-- wp:column {"width":"42%","className":"media"} -->
<div class="wp-block-column media" style="flex-basis:42%"><!-- wp:image {"id":168,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost:8082/wp-content/uploads/2026/04/img-bradley-cox.webp" alt="" class="wp-image-168"/></figure>
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
<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom","width":"62%","className":"copy"} -->
<div class="wp-block-column is-vertically-aligned-bottom copy" style="flex-basis:62%"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","titleTag":"h2","titleClass":"text_gradient","metadata":{"name":"Title with icon"},"className":"heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">TRUSTED BY THESE WELL KNOWN COMPANIES</h2><div class="icon-box-description"><p>From Fortune 1000 corporations to high-risk verticals like healthcare and insurance, Blackline Security Ops’ executive protection teams uncover threats sooner, protect leaders more effectively, and quickly adapt to a fast-changing risk environment.</p></div></div></div></div>
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
<div class="wp-block-group"><!-- wp:mbn-theme/logo-list {"logos":[{"id":180,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1.png","alt":""},{"id":181,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo2.png","alt":""},{"id":188,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1-2.png","alt":""},{"id":185,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo2-1.png","alt":""},{"id":187,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1-1.png","alt":""},{"id":186,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo2-2.png","alt":""},{"id":191,"url":"http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1-3.png","alt":""}],"gridColumns":7,"gridGap":"0","logoHeight":""} -->
<div class="wp-block-mbn-theme-logo-list logo-list display-grid"><div class="logo-list-container logo-grid" style="display:grid;grid-template-columns:repeat(7, 1fr);gap:0" data-logo-height=""><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo2.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1-2.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo2-1.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1-1.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo2-2.png" alt="" loading="lazy"/></div><div class="logo-list-item"><img src="http://localhost:8082/wp-content/uploads/2026/04/Placeholder-Logo1-3.png" alt="" loading="lazy"/></div></div></div>
<!-- /wp:mbn-theme/logo-list --></div>
<!-- /wp:group --></div></div>
<!-- /wp:mbn-theme/div-wrap -->

<!-- wp:mbn-theme/div-wrap {"className":"sec_getintouch","style":{"elements":{"link":{"color":{"text":"#b6b8bd"}}},"color":{"text":"#b6b8bd"}},"backgroundColor":"black"} -->
<div class="wp-block-mbn-theme-div-wrap div-wrap-block  sec_getintouch has-black-background-color has-text-color has-background has-link-color" style="color:#b6b8bd"><div class="div-wrap-content"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg","iconImageId":368,"iconPosition":"left","titleTag":"h2","titleClass":"text_gradient","metadata":{"name":"Title with icon"},"className":"gitcopy heading_icon"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left gitcopy heading_icon"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-brand.svg" alt="" style="width:64px;height:64px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h2 class="icon-box-title text_gradient">GET IN TOUCH</h2><div class="icon-box-description"><p>To request a confidential briefing or discuss protection requirements, complete the form below. Sensitive operational details should be discussed by phone or in person.</p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:group {"className":"get_info","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group get_info"><!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-email.svg","iconImageId":464,"iconPosition":"left","iconSize":32,"titleTag":"h4","titleColor":"#ffffff","className":"flex_column"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-email.svg" alt="" style="width:32px;height:32px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Email</strong></h4><div class="icon-box-description"><p><a href="mailto:info@blacklinesecurityoperations.com">info@blacklinesecurityoperations.com</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-phone.svg","iconImageId":463,"iconPosition":"left","iconSize":32,"titleTag":"h4","titleColor":"#ffffff","className":"flex_column"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-phone.svg" alt="" style="width:32px;height:32px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Phone</strong></h4><div class="icon-box-description"><p><a href="tel:+1 (844) 225-3546">+1 (844) 225-3546</a></p></div></div></div></div>
<!-- /wp:mbn-theme/icon-box -->

<!-- wp:mbn-theme/icon-box {"iconImageUrl":"http://localhost:8082/wp-content/uploads/2026/04/icon-mapin.svg","iconImageId":462,"iconPosition":"left","iconSize":32,"titleTag":"h4","titleColor":"#ffffff","className":"flex_column"} -->
<div class="wp-block-mbn-theme-icon-box icon-box icon-position-left flex_column"><div class="icon-box-inner flex gap-4 flex-row items-start text-left"><div class="icon-box-icon" style="flex-shrink:0"><img src="http://localhost:8082/wp-content/uploads/2026/04/icon-mapin.svg" alt="" style="width:32px;height:32px;object-fit:contain"/></div><div class="icon-box-content" style="flex:1px"><h4 class="icon-box-title" style="color:#ffffff"><strong>Office</strong></h4><div class="icon-box-description"><p>Blackline Guardian Fund, United States</p><p><a href="#" class="btn_getdir">Get directions</a></p></div></div></div></div>
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
	,
);
