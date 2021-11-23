<?php


namespace Underpin\Post_Templates\Factories;


use Underpin\Traits\Instance_Setter;
use Underpin\Post_Templates\Abstracts\Post_Template;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Post_Template_Instance extends Post_Template {
	use Instance_Setter;

	public function __construct( $args ) {
		$this->set_values($args);
	}

}