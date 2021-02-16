<?php

// 'post-formats', 'post-thumbnails', 'custom-header', 'custom-background', 'custom-logo', 'menus', 'automatic-feed-links', 'html5', 'title-tag', 'customize-selective-refresh-widgets', 'starter-content', 'responsive-embeds', 'align-wide', 'dark-editor-style', 'disable-custom-colors', 'disable-custom-font-sizes', 'editor-color-palette', 'editor-font-sizes', 'editor-styles', 'wp-block-styles', and 'core-block-patterns'.

if ( ! function_exists( 'techiepress_theme_setup' ) ) {
	function techiepress_theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		$args = array(
			'flex-width'    => true,
			'width'         => 1200,
			'flex-height'   => true,
			'height'        => 300,
			'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
		);
		add_theme_support( 'custom-header', $args );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	}
}

add_action( 'after_setup_theme', 'techiepress_theme_setup' );


add_action( 'wp_enqueue_scripts', 'techiepress_wp_enqueue_scripts' );

function techiepress_wp_enqueue_scripts() {

	wp_enqueue_script( 'bootstrap-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-bundle', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'bootstrap-jquery' ), '1.0.0', true );
	
	wp_enqueue_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css', '', '1.0.0', 'all' );
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', '', '1.0.0', 'all' );

	wp_enqueue_style( 'techiepress-food', get_stylesheet_directory_uri() . '/assets/css/style.css', '', '1.0.0', 'all' );

	if ( is_front_page() ) {
		wp_enqueue_script( 'techiepress-food-jq', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'techiepress-food-add', get_stylesheet_directory_uri() . '/assets/js/food-add.js', array( 'techiepress-food-jq' ), '1.0.0', true );
	}

}
