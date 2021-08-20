<?php

use function Underpin\underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $file, $class ) {
	if ( ! defined( 'UNDERPIN_POST_TEMPLATES_ROOT_DIR' ) ) {
		define( 'UNDERPIN_POST_TEMPLATES_ROOT_DIR', plugin_dir_path( __FILE__ ) );
	}

	require_once( UNDERPIN_POST_TEMPLATES_ROOT_DIR . 'lib/abstracts/Post_Template.php' );
	require_once( UNDERPIN_POST_TEMPLATES_ROOT_DIR . 'lib/factories/Post_Template_Instance.php' );

	// Register the loader
	Underpin\underpin()->get( $file, $class )->loaders()->add( 'post_templates', [
		'instance'  => 'Underpin_Post_Templates\Abstracts\Post_Template',
		'default'   => 'Underpin_Post_Templates\Factories\Post_Template_Instance',
	] );

}, 10, 2 );