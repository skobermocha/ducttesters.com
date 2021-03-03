<?php
/**
 * Template: Page.php
 *
 * @package WPFramework
 * @subpackage Template
 */

get_header();
?>

			<!--BEGIN #sub-header -->
			<div id="sub-header">
				<h2><?php echo get_page_name_by_ID(get_root_page($wp_query->post->ID)); ?></h2>
				<div id="qoute-slider">
					<ul>
						<li><p><?php echo get_post_meta(get_root_page($wp_query->post->ID), "sub_header_message", $single = true); ?></p></li>
						<li><p><?php echo get_post_meta(get_root_page($wp_query->post->ID), "sub_header_message1", $single = true); ?></p></li>
						<li><p><?php echo get_post_meta(get_root_page($wp_query->post->ID), "sub_header_message2", $single = true); ?></p></li>
					</ul>
				</div>												
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
						<h1 class="entry-title"><?php the_title(); ?></h1>
	                    <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
	                    <!--BEGIN .entry-meta .entry-header-->
						<div class="entry-meta entry-header">
							<?php edit_post_link( 'edit', '<span class="edit-post">[', ']</span>' ); ?>
						<!--END .entry-meta .entry-header-->
	                    </div>
	                    <?php endif; ?>
	
						<!--BEGIN .entry-content .article-->
						<div class="entry-content article">							
						<?php $T=get_the_title();
						 if ( $T=="Send Us Files" ) include("dropper.php");?>
							
						<?php the_content(); ?>
						<!--END .entry-content .article-->
						</div>
	
						<!-- Auto Discovery Trackbacks
						<?php trackback_rdf(); ?>
						-->
					<!--END .hentry-->
					</div>
					<?php comments_template( '', true ); ?>
	
				<?php endwhile; endif; ?>
				<!--END #primary .hfeed-->
				</div>

<?php get_sidebar(); ?>

			</div>
			<div id="main-content-bottom">&nbsp;</div>
			
<?php get_footer(); ?>