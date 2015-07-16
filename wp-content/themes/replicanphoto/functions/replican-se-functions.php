<?php

//Load languages file
$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);
load_theme_textdomain('replican', get_template_directory() . '/languages');

function replican_setup() {
    /* ----------------------------------------------------------- */
    /* Theme Support
      /*------------------------------------------------------------ */
    add_theme_support('post-thumbnails');
    add_image_size('post_thumbnail', 600, 250, true);
    add_image_size('post_thumbnail_1', 70, 70, true);
    /* ----------------------------------------------------------------------------------- */
    /* Auto Feed Links Support
      /*----------------------------------------------------------------------------------- */
    add_theme_support('automatic-feed-links');

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();
    // activate support for thumbnails
    // added in 2.9
    register_nav_menus(array(
            'custom_menu' => __( 'Main Menu','replican' ),
            'secondary-menu' => __( 'Top Header Menu','replican' )
        )
);
}

add_action('after_setup_theme', 'replican_setup');

// Add CLASS attributes to the first <ul> occurence in wp_page_menu

function replican_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu nav">', $ulclass, 1);
}

add_filter('wp_page_menu', 'replican_add_menuclass');



function replican_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'menu_class' => 'sf-menu nav', 'menu_id' => '', 'fallback_cb' => 'replican_nav_fallback'));
    else
        replican_nav_fallback();
}

function replican_nav_fallback() {
    ?>

    <ul class="sf-menu nav">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

function replican_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . HOME . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . HOME . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'replican_nav_menu_items');
// top header menu
function replican_top_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'secondary-menu', 'menu_class' => 'sf-menu nav', 'menu_id' => '','container' => '', 'fallback_cb' => 'replican_nav_fallback'));
    else
        replican_nav_fallback();
}
function replican_top_nav_fallback() {
    ?>

    <ul class="sf-menu nav">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}
/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
  /*----------------------------------------------------------------------------------- */

function replican_breadcrumbs() {
    $delimiter = '&#187;';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '&#187;' . $slug['slug'] . '&#187;">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo PAGE . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div>';
}

//* ----------------------------------------------------------------------------------- */
/* Function to call first uploaded image in functions file
 /*----------------------------------------------------------------------------------- */
/**
 * This function thumbnail id and
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function replican_get_thumbnail($iw, $ih) {
	$id="";
    $permalink = get_permalink($id);
    $thumb = get_post_thumbnail_id();
    if($thumb){
    $image = replican_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
        print "<a href='$permalink'><img class='postimg' src='$image[url]' width='$image[width]' height='$image[height]' /></a>";
    }
    }
}
/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function replican_get_image($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
	$id="";
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if($img_source){
    $img_path = replican_image_resize($img_source, $w, $h);
    if (!empty($img_path['url'])) {
        print "<a href='$permalink'><img src='$img_path[url]' class='postimg' alt='Post Image'/></a>";
    }
    }
}

//for home gallery
function replican_get_image2($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
	$id="";
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if($img_source){
    $img_path = replican_image_resize($img_source, $w, $h);
    if (!empty($img_path['url'])) {
        print "<img src='$img_path[url]'/>";
    }
    }
}

//crop img link
function catch_that_image($width, $height) {
  $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $id="";
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if($img_source){
    $img_path = replican_image_resize($img_source, $w, $h);
    if (!empty($img_path['url'])) {
        print "<a href='$img_path[url]' class='magnifier'>";
    }
    }
}

//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function replican_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . '&nbsp' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function replican_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'class' => 'list extra extra1',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

/** Register sidebars by running replican_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'replican_widgets_init');

/**
 * Pagination
 *
 */
function replican_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}

/////////Theme Options
/* ----------------------------------------------------------------------------------- */
/* Add Favicon
  /*----------------------------------------------------------------------------------- */
function replican_childtheme_favicon() {
    if (replican_get_option('replican_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . replican_get_option('replican_favicon') . '"/>' . "\n";
    } else {
        ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
        <?php
    }
}

add_action('wp_head', 'replican_childtheme_favicon');

/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */

function replican_of_head_css() {
    $output = '';
    $custom_css = replican_get_option('replican_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'replican_of_head_css');

// activate support for thumbnails
function get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

//Trm excerpt
function replican_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

function replican_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

//Trm post title
function the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}

remove_shortcode('gallery');
add_shortcode('gallery', 'inkthemes_gallery_shortcode');

function inkthemes_gallery_shortcode($attr) {
    $post = get_post();
    static $instance = 0;
    $instance++;

    if (!empty($attr['ids'])) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if (empty($attr['orderby']))
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ($output != '')
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
                    ), $attr));
    $id = intval($id);
    if ('RAND' == $order)
        $orderby = 'none';

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }
    if (empty($attachments))
        return '';
    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment)
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100 / $columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";
    ?>
   
    <?php
    $gallery_style = $gallery_div = '';
    if (apply_filters('use_default_gallery_style', true))
        $gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
    $size_class = sanitize_html_class($size);
    $gallery_div = "<div id='$selector' class='$selector gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $gallery_ul = "<ul class='portfolio clearfix thumbnail col-{$columns}'>";
    $output = apply_filters('gallery_style', $gallery_style . "\n\t\t" . $gallery_div . $gallery_ul);
    $i = 0;
    ?>
    <?php
    foreach ($attachments as $gallery_image) {
        $attachment_img = wp_get_attachment_url($gallery_image->ID);
        $img_source = replican_image_resize($attachment_img, 270, 180);
        $output .= '<li class="box">';
        $output .= '<a class="magnifier" alt="' . $gallery_image->post_excerpt . '" href="' . $attachment_img . '">';
        $output .= '<img src="' . $img_source['url'] . '" alt=""/>';
        $output .= '</a>';
        $output .= "</li>";
    }
    $output .= "
	<br style='clear: both;' />			
	</ul>\n
	</div>"
    ;
    return $output;
}
?>