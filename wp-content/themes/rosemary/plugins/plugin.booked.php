<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('rosemary_booked_theme_setup')) {
	add_action( 'rosemary_action_before_init_theme', 'rosemary_booked_theme_setup', 1 );
	function rosemary_booked_theme_setup() {
		// Register shortcode in the shortcodes list
		if (rosemary_exists_booked()) {
			add_action('rosemary_action_add_styles', 					'rosemary_booked_frontend_scripts');
			//add_action('rosemary_action_shortcodes_list',				'rosemary_booked_reg_shortcodes');
			//if (function_exists('rosemary_exists_visual_composer') && rosemary_exists_visual_composer())
				//add_action('rosemary_action_shortcodes_list_vc',		'rosemary_booked_reg_shortcodes_vc');

		}
		if (is_admin()) {
			add_filter( 'rosemary_filter_importer_required_plugins',	'rosemary_booked_importer_required_plugins', 10, 2);
			add_filter( 'rosemary_filter_required_plugins',				'rosemary_booked_required_plugins' );
		}
	}
}


// Check if plugin installed and activated
if ( !function_exists( 'rosemary_exists_booked' ) ) {
	function rosemary_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list

if ( !function_exists( 'rosemary_booked_required_plugins' ) ) {
	//add_filter('rosemary_filter_required_plugins',	'rosemary_booked_required_plugins');
	function rosemary_booked_required_plugins($list=array()) {
		$list[] = array(
			'name' 		=> 'Booked',
			'slug' 		=> 'booked',
			'source'	=> rosemary_get_file_dir('plugins/install/booked.zip'),
			'required' 	=> false
		);
		return $list;
	}
}



// Enqueue custom styles
if ( !function_exists( 'rosemary_booked_frontend_scripts' ) ) {
	//add_action( 'rosemary_action_add_styles', 'rosemary_booked_frontend_scripts' );
	function rosemary_booked_frontend_scripts() {
		if (file_exists(rosemary_get_file_dir('css/plugin.booked.css')))
			rosemary_enqueue_style( 'rosemary-plugin.booked-style',  rosemary_get_file_url('css/plugin.booked.css'), array(), null );
	}
}



// One-click import support
//------------------------------------------------------------------------

// Check in the required plugins
if ( !function_exists( 'rosemary_booked_importer_required_plugins' ) ) {
	//add_filter( 'rosemary_filter_importer_required_plugins',	'rosemary_booked_importer_required_plugins', 10, 2);
	function rosemary_booked_importer_required_plugins($not_installed='', $list='') {
		//if (in_array('booked', rosemary_storage_get('required_plugins')) && !rosemary_exists_booked() )
		if (rosemary_strpos($list, 'booked')!==false && !rosemary_exists_booked() )
			$not_installed .= '<br>Booked Appointments';
		return $not_installed;
	}
}

// Set options for one-click importer

if ( !function_exists( 'rosemary_booked_importer_set_options' ) ) {
	//add_filter( 'rosemary_filter_importer_options',	'rosemary_booked_importer_set_options', 10, 1 );
	function rosemary_booked_importer_set_options($options=array()) {
		if (is_array($options)) {
			$options['folder_with_essgrids'] = 'demo/booked';			// Name of the folder with Essential Grids
		}
		return $options;
	}
}


// Lists
//------------------------------------------------------------------------

// Return booked calendars list, prepended inherit (if need)
if ( !function_exists( 'rosemary_get_list_booked_calendars' ) ) {
	function rosemary_get_list_booked_calendars($prepend_inherit=false) {
		return rosemary_exists_booked() ? rosemary_get_list_terms($prepend_inherit, 'booked_custom_calendars') : array();
	}
}

			

?>