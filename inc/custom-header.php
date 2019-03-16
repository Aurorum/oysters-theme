<?php
/**
 * Custom Header feature
 *
 * @package Oysters
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses oysters_header_style()
 */

function oysters_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'oysters_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . 'resources/boats.png',
		'default-text-color'     => '0E8484',
		'width'                  => 1000,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'oysters_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'oysters_custom_header_setup' );

if ( ! function_exists( 'oysters_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see oysters_custom_header_setup().
	 */
	function oysters_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do it to it!
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom colour for the text use that. 
		// But don't just stop there; we should take that colour and makes it a theme throughout the site
		// We've already grabbed control of the label to inform the user of this
		else :
			?>
			.site-title a,
			.secondary-title a,
			.site-description,
			.entry-title a,
			a, a:hover { /* Hovers are shown with an underline, but a colour is needed for a page link fallback */
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			
			.jetpack-social-navigation ul li, 
			button, 
			mark,
			ins,
			input[type="button"], 
			input[type="reset"], 
			input[type="submit"],
			.wp-block-button__link,
			.main-navigation ul li.page_item_has_children:hover > ul {
				background-color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			
			.main-navigation ul li.page_item_has_children > ul,
			.main-navigation ul li.page_item_has_children > ul a {
				color: white;
			}
			
			.wp-block-pullquote {
				border-top-color: #<?php echo esc_attr( $header_text_color ); ?>;
		                border-bottom-color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			
			blockquote,
			.sticky {
				border-left-color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
