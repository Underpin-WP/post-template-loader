<?php

use Underpin\Abstracts\Underpin;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observers\Loader( 'post_templates', [
	'instance' => 'Underpin\Post_Templates\Abstracts\Post_Template',
	'default'  => 'Underpin\Post_Templates\Factories\Post_Template_Instance',
] ) );