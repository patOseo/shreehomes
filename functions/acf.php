<?php 

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


// Google Maps ACF
function my_acf_google_map_api( $api ){
    $api['key'] = get_field('google_api_key', 'option');
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');