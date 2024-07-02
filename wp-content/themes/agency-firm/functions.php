<?php
/**
 * Theme functions and definitions
 *
 * @package agency-firm
 */

/**
 * After setup theme hook
 */
function agency_firm_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'agency-firm', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/agency-firm-customizer-options.php';	
}
add_action( 'after_setup_theme', 'agency_firm_theme_setup' );

/**
 * Load assets.
 */

function agency_firm_theme_css() {
	wp_enqueue_style( 'agency-firm-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('agency-firm-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('agency-firm-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );
    wp_enqueue_style('agency-firm-bootstrap-smartmenus-css', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" ); 	
}
add_action( 'wp_enqueue_scripts', 'agency_firm_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function agency_firm_parent_theme_options() {
	$arilewp_mods = get_option( 'theme_mods_arilewp' );
	if ( ! empty( $arilewp_mods ) ) {
		foreach ( $arilewp_mods as $arilewp_mod_k => $arilewp_mod_v ) {
			set_theme_mod( $arilewp_mod_k, $arilewp_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'agency_firm_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_agency_firm_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'arilewp_page_header_background_color', 'rgba(0,0,0,0.32)' );
	set_theme_mod( 'arilewp_testomonial_background_image', get_stylesheet_directory_uri().'/assets/img/theme-bg.jpg' );
	set_theme_mod( 'arilewp_testimonial_overlay_disable', true );
	set_theme_mod( 'arilewp_typography_disabled', true );
	set_theme_mod( 'arilewp_theme_color_skin', 'theme-dark' );
	set_theme_mod( 'arilewp_theme_color', 'theme-default' );
	set_theme_mod( 'arilewp_main_header_style', 'transparent' );
	set_theme_mod( 'arilewp_slider_caption_layout', 'arilewp_slider_captoin_layout2' );
	set_theme_mod( 'arilewp_project_layout', 'arilewp_project_layout2' );
	set_theme_mod( 'arilewp_project_layout', 'arilewp_project_layout2' );
	set_theme_mod( 'arilewp_testimonial_layout', 'arilewp_testimonial_layout2' );
	set_theme_mod( 'arilewp_blog_layout', 'arilewp_blog_layout2' );
	set_theme_mod( 'arilewp_blog_column_layout', '2' );
	set_theme_mod( 'arilewp_team_layout', 'arilewp_team_layout2' );
	set_theme_mod( 'arilewp_typography_h1_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_h2_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_h3_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_h4_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_h5_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_h6_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_widget_title_font_family', 'Prompt' );
	set_theme_mod( 'arilewp_typography_menu_bar_text_transform', 'uppercase' );
	set_theme_mod( 'arilewp_typography_dropdown_bar_text_transform', 'uppercase' );
	update_option( 'fresh_agency_firm_site_activate', true );
}

/**
 * Custom Theme Script
*/
function agency_firm_custom_theme_css() {
	$agency_firm_testomonial_background_image = get_theme_mod('arilewp_testomonial_background_image');
	?>
    <style type="text/css">
		<?php if($agency_firm_testomonial_background_image != null) : ?>
		.theme-testimonial { 
		        background-image: url(<?php echo esc_url( $agency_firm_testomonial_background_image ); ?>); 
                background-size: cover;
				background-position: center center;
		}
        <?php endif; ?>
    </style>
 
<?php }
add_action('wp_footer','agency_firm_custom_theme_css');

/**
 * Page header
 *
 */
function agency_firm_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'agency_firm_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/agency-firm-page-header.jpg',
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'agency_firm_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'agency_firm_custom_header_setup' );

/**
 * Custom background
 *
 */
function agency_firm_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'agency_firm_custom_background_args', array(
		'default-color' => '202020',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'agency_firm_custom_background_setup' );


if ( ! function_exists( 'agency_firm_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see agency_firm_custom_header_setup().
	 */
	function agency_firm_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;