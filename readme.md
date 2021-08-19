# Underpin post template Loader

Loader That assists with adding post templates to a WordPress website.

## Installation

### Using Composer

`composer require underpin/post-template-loader`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-post-templates/post-templates.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new post templates as-needed.

## Example

A very basic example could look something like this.

```php
\Underpin\underpin()->post_templates()->add( 'example-batch', [
  'name'     => 'Template Name', // Shows in dropdown
  'template' => 'template-name' // Shows when post template is fetched, and in REST
] );
```

Alternatively, you can extend `post template` and reference the extended class directly, like so:

```php
underpin()->post_templates()->add('key','Namespace\To\Class');
```