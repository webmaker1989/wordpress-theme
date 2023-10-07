<?php

namespace Starwebfront\classes;

class AddThemeSupport{

    public function __construct(){
        add_action( 'after_setup_theme', array($this,'theme_support'));
    }

    public function theme_support(){
    
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'custom-logo', array(
        'height' => 480,
        'width'  => 720,
    ) );

    /* post formats */
    add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    
    /* post thumbnails */
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'project' ) );
  
    /* HTML5 */
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 
    'style', 'script' ) );
  
    /* automatic feed links */
    add_theme_support( 'automatic-feed-links' );
    
    /* custom background */
    add_theme_support( 'custom-background' );

    /**widgets */
    add_theme_support('widgets');

    }
}
