<?php


/**add Style, bootstrap, jquery, font-awesome file */

function register_stylesheet(){

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

add_action('wp_enqueue_scripts', 'register_stylesheet');




/**Add basic theme support functions  */

function starweb_theme_support() {

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
add_action( 'after_setup_theme', 'starweb_theme_support' );




/**
   * Register Navigation
*/

if ( ! function_exists( 'starweb_register_nav_menu' ) ) {

	function starweb_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'text_domain' ),
	    	'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
		) );
	}
}
add_action( 'after_setup_theme', 'starweb_register_nav_menu', 0 );



/**
 * Filters fo navigation to add classes to li and a tag in bootstrap
 */


function add_class_li( $classes, $item, $args ) {
    // Only affect the menu placed in the 'primary' wp_nav_bar() theme location
    if ( 'primary_menu' === $args->theme_location && isset($args->li_class) && isset($args->active_class)) {
        $classes[] = $args->li_class;
        $classes[] = $args->active_class;
    }
    return $classes;
}

add_filter( 'nav_menu_css_class', 'add_class_li', 10, 3 );


function add_class_anchor( $atts, $item, $args ) {
    // Only affect the menu placed in the 'primary' wp_nav_bar() theme location
    if( $args->theme_location === 'primary_menu' ) {
        // add the desired attributes:
        $atts['class'] = 'nav-link';
      }
      return $atts;
  }

add_filter( 'nav_menu_link_attributes', 'add_class_anchor', 10, 3 );




/**Add image sizes */

add_image_size('single-post-thumbnail', 800, 400, array('left', 'top')); 
add_image_size('blog-thumbnail', 300, 400, true); 



/**
 * Add a sidebar.
 */
function starweb_siderbar() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'textdomain' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'textdomain' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'starweb_siderbar' );




/**
 * Register a custom post type called "project".
 *
 * @see get_post_type_labels() for label keys.
 */
function starweb_projects() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Project', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'project', $args );
}

add_action( 'init', 'starweb_projects' );


/**Add taxonomy for our custom Post type Project
 * Register a private 'Genre' taxonomy for post type 'Project'.
 *
 */
function register_private_taxonomy() {
    $args = array(
       'label'        => __( 'Categories', 'textdomain' ),
       'public'       => true,
       'hierarchical' => true   // setting it to false it will add a tag, setting true will be add a category
   );
   
   register_taxonomy( 'project-categories', 'project', $args );
}
add_action( 'init', 'register_private_taxonomy');








function register_formajax_script(){

    wp_enqueue_script( 'formajax-script', get_template_directory_uri().'/assets/js/formajax.js', 
    array('jquery'), '1.1', 'true');

    wp_localize_script('formajax-script', 'form_ajax', array(
        'url' => admin_url('admin-ajax.php'),
        'token' => wp_create_nonce("email-token"),
    ));

}

add_action('wp_enqueue_scripts','register_formajax_script');



add_action('wp_ajax_send_email', 'send_email');
add_action('wp_ajax_nopriv_send_email', 'send_email'); 

function send_email() {

    if(!wp_verify_nonce($_POST['token'], 'email-token')){

        wp_send_json_error("Nonce is incorrect". $_POST['token'] ,401);
        die();
    }

    // Access data sent via AJAX
    $fname = sanitize_text_field($_POST['fname']);
    $lname = sanitize_text_field($_POST['lname']);



    // Prepare a response (in this case, sending back the processed data)
       $response = array(
        'message' => 'Data received and processed successfully',
        'fname' => $fname,
        'lname' => $lname,
    ); 
    // Send the JSON-encoded response
    wp_send_json_success($response);


    //send data to email

    /* $to = 'webmaker1989@gmail.com'; // Replace with the recipient's email address
        $subject = 'New Form Submission';
        $message = 'Name: ' . $_POST['fname'] . "\n";
        $message .= 'Last name: ' . $_POST['lname'];

    $headers = array('Content-Type: text/html; charset=UTF-8');

    if (wp_mail($to, $subject, $message, $headers)) {
        
        $response = array(
            'message' => 'Email Sent Successfully',
            'fname' => $fname,
            'lname' => $lname,
        );

        wp_send_json_success($response);

    } else {
        // Email sending failed
        wp_send_json_error(array('message' => 'Failed to send email'));
    }  */


}




function starweb_loadmore_script(){
    wp_enqueue_script('ajaxloadmore', get_template_directory_uri() . '/assets/js/loadmore.js', array('jquery'), 1.1, true);

  // Create a new WP_Query instance to get the main query
  $query = new WP_Query();

   // wp_localize_script('$handle', $object_name, $l10n)

   wp_localize_script('ajaxloadmore', 'load_more_obj', array(
    'max_page' => $query->max_num_pages,
    'ajax_url' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce("user_more_following"),
   ));
}

add_action('wp_enqueue_scripts', 'starweb_loadmore_script');


add_action('wp_ajax_send_pagenum', 'send_pagenum');
add_action('wp_ajax_nopriv_send_pagenum', 'send_pagenum'); 

function send_pagenum(){
    //echo "hello world";

    if(!wp_verify_nonce($_POST['security'], 'user_more_following')){
        wp_send_json_error("Nonce is incorrect",401);
        die();
    }

    $args = array(
        'cat' => 4,
        'post_status' => array( // (string | array) - use post status. Retrieves posts by Post Status, default value i'publish'.
            'publish', // - a published post or page.
            'future'// - a post to publish in the future.
          ),
          'posts_per_page' => 1,
          'paged' => $_POST['currPage']
     ); 
    $query = new WP_Query($args);
    
    if ( $query->have_posts() ) {
    
        while (  $query->have_posts() ) {
            $query->the_post(); ?>
    
    <?php get_template_part('includes/section', 'card'); ?>

        <?php
        
     // Always remember to use wp_reset_postdata() after a custom query
    wp_reset_postdata();

    // Make sure to exit the function to avoid sending extra data
    exit();   
    }

}
}




/** Shortcode */

function display_date(){
    $date =  date("Y/m/d");
    return $date;
}

add_shortcode('date', 'display_date');


/** Shortcode **/


function foobar_func($atts){
     
    $a = shortcode_atts(array(
            'foo' => 'something',
            'bar' => 'something else',
    ), $atts);

	return "foo = {$a['foo']}";
}
add_shortcode( 'foobar', 'foobar_func' );




/** shortcode to display images */

 function display_img($atts){

    $a = shortcode_atts( array(
		'src' => 'https://cdn.pixabay.com/photo/2023/08/08/18/01/butterfly-8177925_1280.jpg',
        'w'=> '300',
	), $atts );

    return "<img src = '$a[src]' width='$a[w]' height='300'";

}

add_shortcode('image', 'display_img');
 
//[img src ="" w= ""];






/** display 2 most recent posts shortcode */

//[recent_posts cat_name= '' number = 3] it will display three posts

/** display 2 most recent posts shortcode */

// [recent_posts number="3" cat_name=""] it will display three posts

add_shortcode('recent_posts', 'most_recent_fun');

function most_recent_fun($atts){
    $a = shortcode_atts( array(
        'number' => 3,
        'cat_name' => 'seo',
    ), $atts );

    $args = array(
        'post_type' => 'post', // Changed 'post' to 'post_type'
        'category_name' => $a['cat_name'],
        'post_status' => array(
            'publish',
            'future'
        ),
        'posts_per_page' => $a['number'],
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $output = ''; // Create a variable to store the output

        while ($query->have_posts()) {
            $query->the_post();
            // Append each post title to the output
            $output .= '<div class="post-container">';
            $output .= '<h3>' . get_the_title() . '</h3>';
            $output .= '</div>';
        }

        return $output; // Return the generated HTML
    }
}




/**
 * Adding slick js before closing of body tag
 */


/*  function enqueue_slick_slider(){
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), false, 'all');

    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', array('slick-css'), false, 'all');
    
    wp_enqueue_script( 'slick-script', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 
    array(), false , 'true');
 }
 
 add_action('wp_footer', 'enqueue_slick_slider');
  */
 
 
 function slick_slider(){ ?>
 
 <script>
 
 jQuery(document).ready(function(){
   jQuery('.slick-class').slick({
   dots: true,
   infinite: true,
   speed: 300,
   slidesToShow: 2,
   slidesToScroll: 2,
   responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

 });
 });
     
  
 </script>
 
 <?php	
 }
 
 add_action('wp_footer', 'slick_slider');




 
 function project_slider_shortcode() {
    $args = array(
        'post_type' => 'project', // Changed 'post' to 'post_type'
        'post_status' => array('publish')
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        ob_start();

        $output = '';

        $output .= '<div class="project-outer-container slick-class">';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="project-container">  
                <div class="project-block">
                    <div class="archive-page-thumbnails w-full">' . get_the_post_thumbnail(get_the_ID(), 'blog-thumbnail') . '</div>
                    <div class="project-info">
                        <h3>' . get_the_title() . '</h3> <p>'. get_the_excerpt() .
						'</p><a href="' . the_permalink() . '" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>';
        }

        $output .= '</div>';

        // Restore the global post data
        wp_reset_postdata();
        ob_get_clean();
        return $output;
    }
}
add_shortcode('project_slider', 'project_slider_shortcode');






