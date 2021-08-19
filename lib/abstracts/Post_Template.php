<?php
/**
 *
 *
 * @since
 * @package
 */


namespace Underpin_Post_Templates\Abstracts;


use Underpin\Traits\Feature_Extension;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Post_Template
 *
 *
 * @since
 * @package
 */
abstract class Post_Template {
	use Feature_Extension;

	protected $template;

	public function do_actions() {
		add_filter( 'wp_insert_post_data', [ $this, 'register_project_templates' ] );
		add_filter( 'theme_page_templates', array( $this, 'add_new_template' ) );
	}

	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 * @param array $posts_templates
	 * @return mixed
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates[ $this->template ] = $this->name;

		return $posts_templates;
	}

	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doesn't really exist.
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key, 'themes' );

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates[ $this->template ] = $this->name;

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	}
}