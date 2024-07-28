<?php
/*
 * The template for displaying "Page 404"
*/

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'rosemary_template_404_theme_setup' ) ) {
	add_action( 'rosemary_action_before_init_theme', 'rosemary_template_404_theme_setup', 1 );
	function rosemary_template_404_theme_setup() {
		rosemary_add_template(array(
			'layout' => '404',
			'mode'   => 'internal',
			'title'  => 'Page 404',
			'theme_options' => array(
				'article_style' => 'stretch'
			)
			));
	}
}

// Template output
if ( !function_exists( 'rosemary_template_404_output' ) ) {
	function rosemary_template_404_output() {
		$bg_image = rosemary_get_custom_option('404_image_background');
		?>
		<article class="post_item post_item_404">
			<div class="post_content">
				<div class="image_wrap">
					<div class="image-404">
						<img src="<?php echo esc_url($bg_image)?>">
					</div>
					<div class="icon-404"><span class="icon icon-comment-1"></span><span class="description"><?php echo esc_html__('Ooooops!', 'rosemary'); ?></span></div>
				</div>
                <h2 class="page_subtitle"><?php esc_html_e('The requested page cannot be found', 'rosemary'); ?></h2>
                <p class="page_description"><?php echo wp_kses_data( sprintf( __('Can\'t find what you need? Take a moment and do a search below or start from <a href="%s">our homepage</a>.', 'rosemary'), esc_url(home_url('/')) ) ); ?></p>

				<div class="page_search"><?php echo trim(rosemary_sc_search(array('state'=>'fixed', 'title'=>esc_html__('To search type and hit enter', 'rosemary')))); ?></div>
			</div>
		</article>
		<?php
	}
}
?>