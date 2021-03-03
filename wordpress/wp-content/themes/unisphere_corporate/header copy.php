<?php
/**
 * Template: Header.php 
 *
 * @package WPFramework
 * @subpackage Template
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--BEGIN html-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<!-- Built on WP Framework (http://wpframework.com) - Powered by WordPress (http://wordpress.org) -->

<!--BEGIN head-->
<head profile="http://gmpg.org/xfn/11">

	<title>DuctTesters, Inc 	<?php wp_title(); ?></title>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress" />
	<meta name="framework" content="WP Framework" />

	<!-- Favicon: Browser + iPhone Webclip -->
	<link rel="shortcut icon" href="<?php echo IMAGES . '/favicon.ico'; ?>" />
	<link rel="apple-touch-icon" href="<?php echo IMAGES . '/iphone.png'; ?>" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo CSS . '/print.css'; ?>" type="text/css" media="print" />
	<link rel="stylesheet" href="<?php echo CSS . '/skins/' . get_option('unisphere_skin') . '/skin.css'; ?>" type="text/css" media="screen, projection" />

  	<!-- Links: RSS + Atom Syndication + Pingback etc. -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo( 'rss_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Theme Hook -->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments ?>
	<?php wp_head(); ?>
	
<!--END head-->
</head>

<!--BEGIN body-->
<body class="<?php semantic_body(); ?>">
	
	<!--BEGIN .container-->
	<div class="container">

		<!--BEGIN .header-->
		<div class="header">
			<div id="logo">
				<a href="<?php bloginfo( 'url' ); ?>">			
				<?php if( get_option('unisphere_logo') != "") : ?>
					<img src="<?php echo get_option('unisphere_logo') ?>" alt="<?php bloginfo( 'name' ) ?>" /> 
				<?php else : ?>
					<?php bloginfo( 'name' ) ?>
				<?php endif; ?>
				</a>
			</div>
				
<?php
  $portfolio_cat_id = get_option('unisphere_portfolio_cat');
  $blog_cat_id = get_option('unisphere_blog_cat');
?>
		
			<div class="menu">
				<ul class="nav">
					<li class="page_item page-item-<?php echo get_option('page_on_front'); ?><?php if( is_front_page() ) echo ' current_page_item'; ?>"><a href="<?php bloginfo('url'); ?> "><span>Home</span></a></li>
					<?php if( get_option('unisphere_enable_portfolio') == "Y" && get_option('unisphere_portfolio_cat') != "" ) : ?><li class="page_item <?php if( get_query_var('cat') == $portfolio_cat_id || get_root_category(get_query_var('cat')) == $portfolio_cat_id || get_root_category(get_current_cat()) == $portfolio_cat_id ) echo ' current_page_item'; ?>"><a href="<?php echo get_category_link($portfolio_cat_id); ?> "><span><?php echo get_cat_name($portfolio_cat_id); ?></span></a></li><?php endif; ?>
					<?php if( get_option('unisphere_enable_blog') == "Y" && get_option('unisphere_blog_cat') != "" ) : ?><li class="page_item <?php if( get_query_var('cat') == $blog_cat_id || get_root_category(get_query_var('cat')) == $blog_cat_id || get_root_category(get_current_cat()) == $blog_cat_id ) echo ' current_page_item'; ?>"><a href="<?php echo get_category_link($blog_cat_id); ?> "><span><?php echo get_cat_name($blog_cat_id); ?></span></a></li><?php endif; ?>
					<?php wp_list_pages( 'link_after=</span>&link_before=<span>&depth=1&sort_column=menu_order&title_li=&exclude=' . get_option('page_on_front') . ',' . get_option('unisphere_top_nav_excluded_pages') ); ?>
				</ul>
			</div>
			
		<!--END .header-->
		</div>

		<!--BEGIN #content-->
		<div id="content">		