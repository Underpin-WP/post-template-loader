<?php


namespace Underpin_Post_Templates\Factories;


use Underpin\Traits\Instance_Setter;
use Underpin_Post_Templates\Abstracts\Post_Template;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Post_Template_Instance extends Post_Template {
	use Instance_Setter;

	public function __construct( $args ) {
		$this->set_values($args);
	}

}