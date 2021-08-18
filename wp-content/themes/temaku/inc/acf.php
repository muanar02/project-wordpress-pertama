<?php

/* ACF options menu */
if( function_exists('acf_add_options_page') ) {
    /// Register Theme Options
    acf_add_options_page(array(
      'page_title'  => __('Theme Options', 'belajar'),
      'menu_title'  => __('Theme Options', 'belajar'),
      'menu_slug'   => 'theme-options',
      'capability'  => 'edit_posts',
      'position'    => '60',
      'icon_url'    => 'dashicons-admin-site',
      'redirect'    => true,
    ));
}

/* ACF JSON Save */
function theme_options_acf_json_save($path) {
	$path = THEME_DIR.'/inc/acf-json';
	return $path;
}
add_filter('acf/settings/save_json', 'theme_options_acf_json_save');


/* ACF JSON Load */
function theme_options_acf_json_load($paths) {
	unset( $paths[0] );
	$paths[] = THEME_DIR.'/inc/acf-json';
	return $paths;
}
add_filter('acf/settings/load_json', 'theme_options_acf_json_load');


?>