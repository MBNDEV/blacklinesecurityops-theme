<?php
/**
 * Theme footer template.
 *
 * @package CustomTheme
 */

?>
	<footer id="colophon" class="site-footer">
		<?php
		// Output Footer Template block content.
		$footer_html = custom_theme_get_global_footer_template_output_html();
		echo $footer_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- block editor content
		?>
	</footer>
</div>
<?php wp_footer(); ?>
<script>
	// anchor links smooth scroll
	document.addEventListener('DOMContentLoaded', function () {
		const SCROLL_OFFSET = 50;

		function scrollToTarget(target) {
			const top = target.getBoundingClientRect().top + window.scrollY - SCROLL_OFFSET;
			window.scrollTo({ top, behavior: 'smooth' });
		}

		// Match pure anchors (#id) and path+hash links (/page#id)
		document.querySelectorAll('a[href*="#"]').forEach(anchor => {
			anchor.addEventListener('click', function (e) {
				const href = this.getAttribute('href');
				if ( ! href ) return;

				const url = new URL(href, window.location.href);
				const hash = url.hash;

				if ( ! hash || hash === '#' ) return;

				// Only intercept when the target page is the current page
				const samePage =
					url.origin === window.location.origin &&
					url.pathname === window.location.pathname;

				if ( ! samePage ) return; // let the browser navigate normally

				e.preventDefault();
				try {
					const target = document.querySelector(hash);
					if (target) {
						scrollToTarget(target);
						history.pushState(null, '', hash);
					}
				} catch (err) {}
			});
		});

		// Smooth-scroll on load when arriving via a hash link (e.g. /about#id01)
		if (window.location.hash) {
			try {
				const target = document.querySelector(window.location.hash);
				if (target) {
					setTimeout(() => scrollToTarget(target), 100);
				}
			} catch (err) {}
		}
	});
</script>

</body>
</html>
