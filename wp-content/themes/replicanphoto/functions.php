<?php

$functions_path = get_template_directory() . '/functions/';
include_once get_template_directory() . '/functions/replican-se-functions.php';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces 
require_once ($functions_path . 'define_template.php'); // language
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
require_once ($functions_path . 'shortcodes.php');
require_once ($functions_path . 'dynamic-image.php');

/* ----------------------------------------------------------------------------------- */
/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function replican_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('replican-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'));
        wp_enqueue_script('replican-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'));
        wp_enqueue_script('replican-kwicks', get_template_directory_uri() . '/js/jquery.kwicks-1.5.1.js', array('jquery'));
        wp_enqueue_script('replican-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'));
        wp_enqueue_script('replican-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'));
        wp_enqueue_script('replican-touch', get_template_directory_uri() . '/js/touchTouch.jquery.js', array('jquery'));
    } elseif (is_admin()) {
        
    }
}

add_action('wp_enqueue_scripts', 'replican_wp_enqueue_scripts');
//enque
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, null);
   wp_enqueue_script('jquery');
}
/* ----------------------------------------------------------------------------------- */
/* Custom Jqueries Enqueue */
/* ----------------------------------------------------------------------------------- */

function replican_custom_jquery() {
}

add_action('wp_footer', 'replican_custom_jquery');

/* ----------------------------------------------------------------------------------- */

/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */

function replican_add_stylesheet() {
    wp_enqueue_style('shortcodes', get_template_directory_uri() . "/css/shortcode.css", '', '', 'all');
}

add_action('init', 'replican_add_stylesheet');

//Front Page Rename
$get_status = replican_get_option('re_nm');
$get_file_ac = get_template_directory() . '/front-page.php';
$get_file_dl = get_template_directory() . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
//False Part
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}

function replican_get_option($name) {
    $options = get_option('replican_options');
    if (isset($options[$name]))
        return $options[$name];
}

//
function replican_update_option($name, $value) {
    $options = get_option('replican_options');
    $options[$name] = $value;
    return update_option('replican_options', $options);
}

//
function replican_delete_option($name) {
    $options = get_option('replican_options');
    unset($options[$name]);
    return update_option('replican_options', $options);
}

//Enqueue comment thread js
function replican_enqueue_scripts() {
    if (is_singular() and get_site_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'replican_enqueue_scripts');
add_theme_support('custom-background');

// comment form placeholder

add_filter( 'comment_form_default_fields', 'replican_comment_placeholders' );

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
function replican_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
            . _x(
                'Name*',
                'comment form placeholder',
                'replican'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="text"',
        /* We use a proper type attribute to make use of the browsers
         * validation, and to get the matching keyboard on smartphones.
         */
        '<input type="email" placeholder="contact@example.com*"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="text"',
        // Again: a better 'type' attribute value.
        '<input placeholder="http://example.com" id="url" name="url" type="url"',
        $fields['url']
    );
	

    return $fields;
}
//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if ( function_exists( 'add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail
//----------------------------------------------
//----------register and label gallery post type
//----------------------------------------------

// placeholder to textarea
function replican_comment_textarea_field($comment_field) {
 
    $comment_field = 
        '<p class="comment-form-comment">
            <textarea required placeholder="Enter Your Comment" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </p>';
 
    return $comment_field;
}
add_filter('comment_form_field_comment','replican_comment_textarea_field');

if ( ! function_exists( 'replican_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function replican_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'replican' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'replican' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'replican' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

//custom post type
add_action( 'init', 'replican_gallery_post_type' );
function replican_gallery_post_type() {
	register_post_type( 'gallery_post',
		array(
			'labels' => array(
				'name' => __( 'Gallery', 'replican' ),
				'singular_name' => __( 'Gallery','replican' ),
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				'taxonomy' => 'series'
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}
//custom taxonomy
	function replican_gallery_taxonomy_init() {
   register_taxonomy(
    'filter',
    'gallery_post',
    array(
        'hierarchical' => true,
        'label' => 'Filter',
        'query_var' => true,
        'rewrite' => array('slug' => 'filter')
    )
);
}
 
add_action( 'init', 'replican_gallery_taxonomy_init' );

/* content blog background */
function replican_blog_background () {
?>
<?php if (replican_get_option('replican_backgrndbg') != '') { ?>
  <div class="bg-content" style="background: url(<?php echo replican_get_option('replican_backgrndbg'); ?>) repeat 50% 50%;">
<?php } else { ?>
  <div class="bg-content">
<?php } ?>
<?php
}

/* custom dashboard widget */
add_action('wp_dashboard_setup', 'replican_dashboard_widgets');  
function replican_dashboard_widgets() {  
     global $wp_meta_boxes;  
     // remove unnecessary widgets  
     // var_dump( $wp_meta_boxes['dashboard'] ); // use to get all the widget IDs  
     unset(  
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],  
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],  
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']  
     );  

     // add a custom dashboard widget  
     wp_add_dashboard_widget( 'dashboard_custom_feed', 'Latest From SmallEnvelop Blog', 'replican_dashboard_custom_feed_output', 'side' ); //add new RSS feed output  
}  

function replican_dashboard_custom_feed_output() {  
     echo '<div class="rss-widget">';  
     wp_widget_rss_output(array(  
          'url' => 'http://smallenvelop.com/blog/feed/',  //put your feed URL here  
          'title' => 'What\'s up from Adam Scott',  
          'items' => 4, //how many posts to show  
          'show_summary' => 1,  
          'show_author' => 0,  
          'show_date' => 1  
     ));  
     echo "</div>";  
}
