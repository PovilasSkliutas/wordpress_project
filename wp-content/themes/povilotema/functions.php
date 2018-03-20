<?php
/*
 *  Author: Povilas Skliutas
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

 // Uzkraukime kalbas
 add_action( 'after_setup_theme', 'languages' );
 function languages(){
     load_theme_textdomain( 'povilotema', get_template_directory() . '/languages' );
 }

 // 1.Zingsnis: Navigacijos vietu registravimas
 register_nav_menus(
     array( // Using array to specify more menus if needed
     'header-menu' => 'Header navigacija', // Main Navigation
    )
);

 // 2.Zingsnis: Kaip aprasyti navigacijos vieta Wordpress
 function header_navigation() {
 	wp_nav_menu( // funkcija nav isvedimui vartotojui
 	array(
 		'theme_location'  => 'header-menu',
        'depth' => 1,
 		)
 	);
 }

 // 3. Zingsnis: Kaip iterpti css per functions.php:
 wp_register_style('own-style', get_template_directory_uri() . '/css/style.css', array(), '1', 'all');
 wp_enqueue_style('own-style');

 // 4.Zingsnis: Kaip uzregistruoti widget areas
 if (function_exists('register_sidebar')) {
     // Define Sidebar Widget Area 1
     register_sidebar(array(
        'name' => __('apatinis valdiklis', 'povilotema'),
        'id' => 'footer_sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<span style="display: none;">',
        'after_title' => '</span>'
     ));
 }

 // skirtingas paveikslelio dydis
add_image_size('mazas-paveikslelis', 300, 200, true);
add_image_size('didelis-paveikslelis', 1280, 400, true);
add_image_size('home-paveikslelis', 600, 300, true);
add_image_size('logos', 100, 100, true);

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 50;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}
// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <br> <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Skaityti plačiau', 'povilotema') . '</a>';
}


// Sukuriame puslapiavima: Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
        'prev_text' => __('« Buvęs', 'povilotema'),
        'next_text' => __('Sekantis »', 'povilotema')
    ));
}

// Custom post type
add_theme_support('post-thumbnails');

$arg = array(
    'public' => true,
    'labels' => array(
        'name' => __('Companies', 'povilotema'),
        'singular_name' => __('Companies', 'povilotema')
    ),
    'supports' => array('title','thumbnail'),
);

register_post_type('clients', $arg);


/*------------------------------------*\
    Functions
\*------------------------------------*/
// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}
// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
// Remove Admin bar
function remove_admin_bar()
{
    return false;
}
// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}
// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


?>
