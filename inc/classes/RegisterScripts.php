<?php
/**
 * Enqueue script and styles 
 *
 * @package WordPress
 * @subpackage star web front
 * @since star web front 1.0
 */

 namespace Starwebfront\classes;

 class RegisterScripts{

    public function __construct(){
    add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
    }

    public function register_scripts(){

        wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', 
    array(), '1.1', 'true');

    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', array(), '1.1', 
    'all');

    wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', 
    array(), '1.1', 'true');

    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css' );

    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), false, 'all');

    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', array('slick-css'), 
    false, 'all');
    
    wp_enqueue_script( 'slick-script', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 
    array(), false , true);

    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), 
    filemtime(get_template_directory() . '/assets/css/main.css'), 'all');

        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), 
        filemtime(get_template_directory() . '/style.css'), 'all');
    }
 }
