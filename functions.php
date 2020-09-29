<?php

// 'post-formats', 'post-thumbnails', 'custom-header', 'custom-background', 'custom-logo', 'menus', 'automatic-feed-links', 'html5', 'title-tag', 'customize-selective-refresh-widgets', 'starter-content', 'responsive-embeds', 'align-wide', 'dark-editor-style', 'disable-custom-colors', 'disable-custom-font-sizes', 'editor-color-palette', 'editor-font-sizes', 'editor-styles', 'wp-block-styles', and 'core-block-patterns'.


if ( ! function_exists( 'techiepress_theme_setup' ) ) {
	function techiepress_theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-header' );
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