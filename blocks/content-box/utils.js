/**
 * Sanitize raw CSS input before injecting into a <style> tag.
 *
 * Removes vectors that could break out of a <style> block or execute code:
 *  - </style> tag sequences
 *  - CSS expression() (IE legacy code execution)
 *  - javascript: and vbscript: protocol references
 *  - @import rules (can load external resources / exfiltrate data)
 *  - data: URIs inside url() (can embed scripts in some browsers)
 *
 * @param {string} css Raw CSS string from block attributes.
 * @return {string} Sanitized CSS safe to inject into a <style> tag.
 */
export function sanitizeCSS( css ) {
	if ( ! css || typeof css !== 'string' ) {
		return '';
	}

	return css
		.replace( /<\/style/gi, '' )
		.replace( /expression\s*\(/gi, '' )
		.replace( /javascript\s*:/gi, '' )
		.replace( /vbscript\s*:/gi, '' )
		.replace( /@import\b/gi, '/* @import blocked */' )
		.replace( /url\s*\(\s*(['"]?)\s*data:/gi, 'url($1invalid:' );
}
