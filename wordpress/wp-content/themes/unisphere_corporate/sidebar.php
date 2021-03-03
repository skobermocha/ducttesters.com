<?php
/**
 * Template: Sidebar.php
 *
 * @package WPFramework
 * @subpackage Template
 */	
?>	        
        <!--BEGIN #secondary .aside-->
        <div id="secondary" class="aside">
        	
        	<?php 
        		

        	 ?>
        	
        	<?php // If we are viewing a category or a single post, show the list of subcategories
        		if ( get_query_var('cat') != '' || is_single() ) : ?>
        	
    		<!--BEGIN #widget-categories-->
	        <div id="widget-categories" class="widget">
				<!--
<ul>
					<?php wp_list_categories( 'title_li=&child_of=' . get_root_category(get_current_cat()) ); ?>
				</ul>
-->
	        <!--END #widget-categories-->
	        </div>
	        
	        <?php	/* Widgetized Area */
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Blog/Portfolio Sidebar') ) ?>
	        
	        <?php else : ?>
	        
        	<!--BEGIN #widget-pages-->
	        <div id="widget-pages" class="widget">
				<ul>
					<?php wp_list_pages( 'title_li=&child_of=' . get_root_page($post->ID) ); ?>
				</ul>
	        <!--END #widget-pages-->
	        </div>
	        
	        <?php	/* Widgetized Area */
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Content Page Sidebar') ) ?>
	        
	        <?php endif; ?>
	        
		<!--END #secondary .aside-->
		</div>