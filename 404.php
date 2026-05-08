<?php
/**
 * 404 template file.
 *
 * @package CustomTheme
 */

get_header();
?>
<main id="main" class="site-main">
 <div class="wp-block-mbn-theme-div-wrap div-wrap-block sec_ihero" style="background-image:url(/wp-content/uploads/2026/04/bg-inner-hero.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;background-attachment:scroll;border-width:0;border-style:solid;border-radius:0">
    <div class="div-wrap-content">
        <div class="wp-block-columns is-not-stacked-on-mobile mb_0 is-layout-flex wp-container-core-columns-is-layout-9d6595d7 wp-block-columns-is-layout-flex">
            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
                <h1 class="wp-block-heading text_gradient">Oops! </h1>
                <h3>It seems you’ve hit a 404 error</h3><br>
                <p>Please return to the homepage or use the navigation menu.</p><br>
                <div class="wp-block-button">
                    <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();