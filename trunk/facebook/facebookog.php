<?php
/*
  Plugin Name: Facebook Open Graph
  Plugin URI: http://www.johnjameskilpatrick.co.uk
  Description: Easily add Facebook Open Graph data to your blog.
  Author: John Kilpatrtick
  Version: 1
  Author URI: http://www.johnjameskilpatrick.co.uk
  License: 
 */
 
define ('pluginDirName', 'facebook-open-graph');

$fbappID    = get_option('facebook_appID');
$fbadminID   = get_option('facebook_adminID');
$fbimage    = get_option('facebook_image');
$fbhtml    = get_option('facebook_html');

function facebook_open_graph_init(){
    global $fbappID, $fbadminID, $fbimage;
    if (have_posts()):while(have_posts()):the_post();endwhile;endif;
    
    $title          =   single_post_title('', FALSE);
    $url            =   get_permalink();

    
    echo <<< EOD

<!-- Facebook Open Graph --> 
<meta property="fb:app_id" content="$fbappID" />
<meta property="fb:admins" content="$fbadminID" />

EOD;
    
    if (is_single() || is_page() ) { 
        $description    =   strip_tags(get_the_excerpt($post->ID));
        $image          =   get_first_image();
        
        echo <<< EOD
<meta property="og:title" content="$title" />
<meta property="og:description" content="$description" />
<meta property="og:type" content="article" />
<meta property="og:image" content="$image" />
<meta property="og:url" content="$url"/>
EOD;
    } else {
        $sitename           =   get_bloginfo('name');
        $description        =   get_bloginfo('description');
        $url                =   get_bloginfo('url');
        echo <<< EOD
<meta property="og:site_name" content="$sitename" />
<meta property="og:description" content="$description" />
<meta property="og:type" content="website" />
<meta property="og:image" content="$fbimage" />
<meta property="og:url" content="$url"/>
EOD;
    } 
}

function get_first_image() {
    global $fbappID, $fbadminID, $fbimage;
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img =  $fbimage;
    }
    return $first_img;
}

//*************** Admin function ***************
function fbopengraph_admin() {
    include_once 'facebookog_admin.php';
}


function admin_actions() {
    add_options_page("Facebook Open Graph", "Facebook Open Graph", 1, "Facebook_Open_Graph", "fbopengraph_admin");
}

add_action('wp_head', 'facebook_open_graph_init');
add_action('admin_menu', 'admin_actions');
add_action('admin_print_scripts-settings_page_fbopengraph_admin', 'admin_scripts');

function admin_scripts() {
	wp_enqueue_script('pluginscript', plugins_url('/js/script.js', __FILE__), array('jquery'));
}

//Setting Links
/**
* Add Settings link to plugins - code from GD Star Ratings
*/
function add_settings_link($links, $file) {
    static $this_plugin;
    if (!$this_plugin)
        $this_plugin = plugin_basename(__FILE__);

    if ($file == $this_plugin) {
        $settings_link = '<a href="admin.php?page=Facebook_Open_Graph">' . __("Settings", "Facebook Open Graph") . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
 }
 
 add_filter('plugin_action_links', 'add_settings_link', 10, 2 );