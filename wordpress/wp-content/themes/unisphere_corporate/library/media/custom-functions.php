<?php
/**
 * Custom Functions - Theme Specific Functions
 *
 * Use this file to write any custom functions you may need.
 * To take advantage of WP Framework's hook system, view them @ ( library/core/framework-hook-system.php )
 * To see what default behavior WP Framework uses, view them @ ( library/framework.php )
 *
 * You'll find a few example functions below to get you started.
 * These are real functions and actually work, so try them out by uncommenting the lines to get a feel on how they all work.
 *
 * @package WPFramework
 * @subpackage Template
 */

/* <- remove this line
// Example #1: Remove default behavior, simply call the remove_action with the first argument being the hook name, and the second argument being the hook function
remove_action( 'framework_hook_menu', 'framework_menu' );

// Example #2: Hook into a function by creating a function
// and calling the add_action with the first argument being the action you want to hook into, and the second argument being your function you just created.
function my_custom_function() {
	echo "Custom Function's rock!";
}
add_action( 'framework_hook_body_open', 'my_custom_function' );

// Example #3: To filter through a function, simply create the custom function with a parameter (can be any name) and return whatever you plan on doing with it
// Then call the add_filter function with the first argument being the filter you want to filter through, and the second argument being the function you just created.
function my_custom_filter( $content ){
	$content = 'My Custom filter is replacing the actual content!';
	return  $content;
}
add_filter( 'the_content', 'my_custom_filter' );
and remove this line -> */

// Get root parent of a page
function get_root_page($page_id) 
{
	global $wpdb;
	
	$parent = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE post_type='page' AND ID = '$page_id'");
	
	if ($parent == 0) 
		return $page_id;
	else 
		return get_root_page($parent);
}

// Get root parent of a category
function get_root_category($category_id)
{
	global $wpdb;
	
	$parent = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '$category_id'" );

	if ($parent == 0) 
		return $category_id;
	else 
		return get_root_category($parent);
		
	
}

function get_current_cat()
{
	$home_featured_slider_cat_id = get_option('unisphere_slider_cat');
	
	$current_cat = get_query_var('cat');
						
	if($current_cat == '')
	{
		// Get one of the post categories
		foreach((get_the_category()) as $category) 
		{ 
			// Check if category is not the "Featured" category
			if ($category->cat_ID != $home_featured_slider_cat_id) {
				$current_cat = $category->cat_ID; 
				break;
			}
		} 	
	}
	
	return $current_cat;
}

function get_page_name_by_ID($page_id)
{
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '$page_id'");
	return $page_name;
}

// Register the widget areas
if ( function_exists('register_sidebar') )	
	
	register_sidebar(array('name'=>'Blog/Portfolio Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><ul><li>',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array('name'=>'Content Page Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><ul><li>',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array('name'=>'Home Left Section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><ul><li>',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array('name'=>'Home Middle Section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><ul><li>',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array('name'=>'Home Right Section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><ul><li>',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

/************ Unisphere Menu in Admin Area *****************/

// Initialize Customization Menu in the Admin area
function unisphere_admin() {  
	include( TEMPLATEPATH . '/library/unisphere_admin.php');  
}  

// Adds the Unisphere Menu to the Wordpress admin area
function unisphere_admin_actions() {  
    add_menu_page("Unisphere Corporate", "Unisphere Corporate", 1, "Unisphere Corporate", "unisphere_admin");  
}  

add_action('admin_menu', 'unisphere_admin_actions');  


/************ Custom Field Templates in Post and Page Area *****************/

// This function tells WP to add a new "meta box"
function unisphere_add_meta_box()
{
	add_meta_box(
		'unisphere_page_meta_box', // id of the <div> we'll add
		'UniSphere Corporate Page Options', //title
		'unisphere_add_page_meta_content', // callback function that will echo the box content
		'page', // where to add the box: on "post", "page", or "link" page
		'normal',
		'high' 
	);
	
	add_meta_box(
		'unisphere_post_meta_box', // id of the <div> we'll add
		'UniSphere Corporate Post Options', //title
		'unisphere_add_post_meta_content', // callback function that will echo the box content
		'post', // where to add the box: on "post", "page", or "link" page
		'normal',
		'high' 
	);
}

// This function echoes the content of our meta box
function unisphere_add_page_meta_content()
{
	global $post;
	
	echo
		'<label> Add Sub Header Message (Optional)<br />
		 <input type="text" name="unisphere_sub_header_message" value="' . get_post_meta($post->ID, 'sub_header_message', true) . '" style="width: 99%;" />
		 </label>
		';
}

// This function echoes the content of our meta box
function unisphere_add_post_meta_content()
{
	global $post;
	
	echo
		'<label> Upload and paste the <b>featured image URL (374x239 px)</b> if this is a featured post<br />
		 <input type="text" name="unisphere_featured_img" value="' . get_post_meta($post->ID, 'featured_img', true) . '" style="width: 99%;" />
		 </label>
		 <br /><br />
		 <label> Upload and paste the <b>portfolio image URL (680x251 px)</b> if this is a portfolio post<br />
		 <input type="text" name="unisphere_portfolio_img" value="' . get_post_meta($post->ID, 'portfolio_img', true) . '" style="width: 99%;" />
		 </label>
		';
}

function unisphere_meta_save_postdata($post_id)
{	
	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$currentFile = $parts[count($parts) - 1];
	
	// If in a Page, save the specific page custom fields, ...
	if ( 'page.php' == $currentFile ) 
	{  
		$data = $_POST['unisphere_sub_header_message'];  

		if(get_post_meta($post_id, 'sub_header_message') == "")  
			add_post_meta($post_id, 'sub_header_message', $data, true);  
		elseif($data != get_post_meta($post_id, 'sub_header_message', true))  
			update_post_meta($post_id, 'sub_header_message', $data);  
		elseif($data == "")  
			delete_post_meta($post_id, 'sub_header_message', get_post_meta($post_id, 'sub_header_message', true));
	} 
	else 
	{ // ... else save the specific post custom fields!
		// Featured Image
		$featured_img = $_POST['unisphere_featured_img'];  

		if(get_post_meta($post_id, 'featured_img') == "")  
			add_post_meta($post_id, 'featured_img', $featured_img, true);  
		elseif($featured_img != get_post_meta($post_id, 'featured_img', true))  
			update_post_meta($post_id, 'featured_img', $featured_img);  
		elseif($featured_img == "")  
			delete_post_meta($post_id, 'featured_img', get_post_meta($post_id, 'featured_img', true));
		
		// Portfolio Image			
		$portfolio_img = $_POST['unisphere_portfolio_img'];  

		if(get_post_meta($post_id, 'portfolio_img') == "")  
			add_post_meta($post_id, 'portfolio_img', $portfolio_img, true);  
		elseif($portfolio_img != get_post_meta($post_id, 'portfolio_img', true))  
			update_post_meta($post_id, 'portfolio_img', $portfolio_img);  
		elseif($portfolio_img == "")  
			delete_post_meta($post_id, 'portfolio_img', get_post_meta($post_id, 'portfolio_img', true));
	}  
}

if (is_admin())
{
	/* Use the admin_menu action to define the custom boxes */
	add_action('admin_menu', 'unisphere_add_meta_box');
}
/* Use the save_post action to do something with the data entered */
add_action('save_post', 'unisphere_meta_save_postdata');

?>