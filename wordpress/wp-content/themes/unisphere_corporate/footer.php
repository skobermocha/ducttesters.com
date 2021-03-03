<?php
/**
 * Template: Footer.php
 *
 * @package WPFramework
 * @subpackage Template
 */
?>
		<!--END #content-->
		</div>
			
		<!--BEGIN .footer-->
		<div class="footer">
<!--
				<ul>
					<li class="page_item page-item-<?php echo get_option('page_on_front'); ?><?php if( is_front_page() ) echo ' current_page_item'; ?>"><a href="<?php bloginfo('url'); ?> "><span>Home</span></a></li>
					<?php if( get_option('unisphere_enable_portfolio') == "Y" && get_option('unisphere_portfolio_cat') != "" ) : ?><li class="page_item <?php if( get_query_var('cat') == get_option('unisphere_portfolio_cat') || get_root_category(get_query_var('cat')) == get_option('unisphere_portfolio_cat') || get_root_category(get_current_cat()) == get_option('unisphere_portfolio_cat') ) echo ' current_page_item'; ?>"><a href="<?php echo get_category_link(get_option('unisphere_portfolio_cat')); ?> "><span class="separator">|</span><span><?php echo get_cat_name(get_option('unisphere_portfolio_cat')); ?></span></a></li><?php endif; ?>
					<?php if( get_option('unisphere_enable_blog') == "Y" && get_option('unisphere_blog_cat') != "" ) : ?><li class="page_item <?php if( get_query_var('cat') == get_option('unisphere_blog_cat') || get_root_category(get_query_var('cat')) == get_option('unisphere_blog_cat') || get_root_category(get_current_cat()) == get_option('unisphere_blog_cat') ) echo ' current_page_item'; ?>"><a href="<?php echo get_category_link(get_option('unisphere_blog_cat')); ?> "><span class="separator">|</span><span><?php echo get_cat_name(get_option('unisphere_blog_cat')); ?></span></a></li><?php endif; ?>
					<?php wp_list_pages( 'link_after=</span>&link_before=<span class="separator">|</span><span>&depth=1&sort_column=menu_order&title_li=&exclude=' . get_option('page_on_front') . ',' . get_option('unisphere_top_nav_excluded_pages') ); ?>
				</ul>
				<p id="copyright">&copy; <?php the_time( 'Y' ); ?> All Rights Reserved</p>

-->			
				<p style="text-align: center; color: white;">"QUALITY ENERGY CONSULTING WITH THE TESTING TO PROVE IT" </p>
			<!-- Theme Hook -->
			<?php wp_footer(); ?>
		
		<!--END .footer-->
		</div>
<p style="text-align:center">DuctTesters, Inc. | PO Box 266 Ripon, CA 95366 | 209.579.5000 | 866.950.1191</p>
	<!--END .container-->
	</div> 
	
	<script type='text/javascript'>
	
		<?php
			$my_query = new WP_Query('cat=' . get_option('unisphere_slider_cat') . '&showposts=' . get_option('unisphere_slider_posts_number'));
			if( $my_query->post_count > 1 ) :
		?>	
	
		jQuery(document).ready(function(){

			jQuery('#slider-images').jCarouselLite({
			    visible: 1,
			    speed: 800,
			    auto: <?php if(get_option('unisphere_slider_seconds') != '') { echo get_option('unisphere_slider_seconds'); } else { echo "3"; } ?>000,
				btnNext: "#slider-nav-right",
			    btnPrev: "#slider-nav-left"
			});
			
			jQuery("#slider-text").jCarouselLite({
				
				visible: 1,
			 	speed: 800,
			    auto: <?php if(get_option('unisphere_slider_seconds') != '') { echo get_option('unisphere_slider_seconds'); } else { echo "3"; } ?>000,
				vertical: true,
				btnNext: "#slider-nav-right",
			    btnPrev: "#slider-nav-left"
			});
			
			jQuery("#qoute-slider").jCarouselLite({
				
				visible: 1,
			 	speed: 800,
			    auto: <?php if(get_option('unisphere_slider_seconds') != '') { echo get_option('unisphere_slider_seconds'); } else { echo "3"; } ?>000,
				vertical: true,
				btnNext: "#slider-nav-right",
			    btnPrev: "#slider-nav-left"
			});
	   
		});
	
		<?php else : ?>
		
		jQuery("#slider-nav-right").hide();
		jQuery("#slider-nav-left").hide();
			
		<?php endif; ?>
	
	</script>

	
	<!--[if IE 6]>
	<script type='text/javascript' src='<?php echo THEME . '/library/media/js/DD_belatedPNG_0.0.7a-min.js' ?>'></script>
	<script type='text/javascript'>
	  DD_belatedPNG.fix('#slider-nav-left');
	  DD_belatedPNG.fix('#slider-nav-right');
	</script>
	<![endif]--> 
	
	<script type='text/javascript' src='<?php echo THEME . '/library/media/js/screen.js' ?>'></script>
	
<!--END body-->
</body>
<!--END html(kthxbye)-->
</html>