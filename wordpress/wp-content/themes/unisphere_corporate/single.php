<?php
/**
 * Template: Single.php
 *
 * @package WPFramework
 * @subpackage Template
 */

get_header();
?>

			<!--BEGIN #sub-header -->
			<div id="sub-header">
				<h2><?php echo get_cat_name(get_root_category(get_current_cat())) ?></h2>
				<?php if( get_root_category(get_current_cat()) == get_option('unisphere_portfolio_cat') ) { echo '<p>' . get_option('unisphere_portfolio_page_headline') . '</p>'; } ?>
				<?php if( get_root_category(get_current_cat()) == get_option('unisphere_blog_cat') ) { echo '<p>' . get_option('unisphere_blog_page_headline') . '</p>'; } ?>
			</div>
			<!--END #sub-header -->
			
			<div id="main-content-top">&nbsp;</div>
			<div id="main-content-middle">
				
				<!--BEGIN #primary .hfeed-->
				<div id="primary" class="hfeed">
				<?php if ( have_posts() ) : ?>
	                <?php while ( have_posts() ) : the_post(); ?>
	
					<!--BEGIN .hentry-->
					<div id="post-<?php the_ID(); ?>" class="<?php semantic_entries(); ?>">
						<h2 class="entry-title"><?php the_title(); ?></h2>
	
						<!--BEGIN .entry-meta .entry-header-->
						<div class="entry-meta entry-header">
<span class="published"><abbr class="published-time" title="<?php the_time( get_option('date_format') .' - '. get_option('time_format') ); ?>"><?php the_time( get_option('date_format') ); ?></abbr></span>
							<!--
<span class="meta-sep">&mdash;</span>
							<span class="comment-count"><a href="<?php comments_link(); ?>"><?php comments_number( 'Leave a Comment', '1 Comment', '% Comments' ); ?></a></span>
-->
							<?php edit_post_link( 'edit', '<span class="edit-post">[', ']</span>' ); ?>
						<!--END .entry-meta .entry-header-->
	                    </div>
	
						<!--BEGIN .entry-content .article-->
						<div class="entry-content article">
							<?php if( get_post_meta($post->ID, "portfolio_img", $single = true) != '' ) : ?>
							<img class="portfolio-img" src="<?php echo get_post_meta($post->ID, "portfolio_img", $single = true); ?>" alt="<?php the_title(); ?>" />
							<?php endif; ?>
							<?php the_content( 'Read more &raquo;' ); ?>
							<?php wp_link_pages( array( 'before' => '<div id="page-links"><p><strong>Pages:</strong> ', 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
						<!--END .entry-content .article-->
						</div>
	
						<!--BEGIN .entry-meta .entry-footer-->
	                    <div class="entry-meta entry-footer">
							<!--<?php if ( framework_get_terms( 'tags' ) ) { ?>
	                        <hr />
	                        <span class="entry-tags">Tags: <?php echo framework_get_terms( 'tags' ); ?></span> 
	                        <hr />
	                        <?php } ?>-->
						<!--END .entry-meta .entry-footer-->
	                    </div>
	                    
	                    <!-- Auto Discovery Trackbacks
						<?php trackback_rdf(); ?>
						-->
					<!--END .hentry-->
					</div>
	
					<?php comments_template( '', true ); ?>
	                <?php include ( TEMPLATEPATH . '/navigation.php' ); ?>
					<?php endwhile; else : ?>
	
					<!--BEGIN #post-0-->
					<div id="post-0" class="<?php semantic_entries(); ?>">
						<h2 class="entry-title">Not Found</h2>
	
						<!--BEGIN .entry-content-->
						<div class="entry-content">
							<p>Sorry, but you are looking for something that isn't here.</p>
							<?php get_search_form(); ?>
						<!--END .entry-content-->
						</div>
					<!--END #post-0-->
					</div>
	
				<?php endif; ?>
				<!--END #primary .hfeed-->
				</div>

<?php get_sidebar(); ?>

			</div>
			<div id="main-content-bottom">&nbsp;</div>
			
<?php get_footer(); ?>