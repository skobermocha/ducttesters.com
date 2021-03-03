<?php
/**
 * Template: 404.php
 *
 * @package WPFramework
 * @subpackage Template
 */

header( "HTTP/1.1 404 Not found", true, 404 );
get_header();
?>
			<!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed">
				<!--BEGIN #post-0-->
				<div id="post-0" class="<?php semantic_entries(); ?>">
					<h1 class="entry-title">Not Found</h1>

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p>Sorry, but you are looking for something that isn't here.</p>
<object type="application/x-shockwave-flash" data="https://clients4.google.com/voice/embed/webCallButton" width="230" height="85"><param name="movie" value="https://clients4.google.com/voice/embed/webCallButton" /><param name="wmode" value="transparent" /><param name="FlashVars" value="id=716fb43c98a595572f415bd417276526fe7b6dbb&style=0" /></object>
						<?php get_search_form(); ?>
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>
			<!--END #primary .hfeed-->
			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>