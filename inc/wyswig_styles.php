<?php 

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		// FAQ Info Wrapper
		array(  
			'title' => 'Red Bullets',  
			'selector' => 'ul',  
			'classes' => 'bullets red',
			'wrapper' => false,
		),
		array(  
			'title' => 'Black Bullets',  
			'selector' => 'ul',  
			'classes' => 'bullets black',
			'wrapper' => false,
		),
		array(  
			'title' => 'White Bullets',  
			'selector' => 'ul',  
			'classes' => 'bullets white',
			'wrapper' => false,
		),
		array(  
			'title' => 'Gray Bullets',  
			'selector' => 'ul',  
			'classes' => 'bullets gray',
			'wrapper' => false,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array[ 'style_formats' ] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  