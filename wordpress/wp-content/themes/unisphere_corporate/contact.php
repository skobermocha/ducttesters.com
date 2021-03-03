<?php
/*
Template Name: Contact Page
*/

get_header();
?>

			<!--BEGIN #sub-header -->
			<div id="sub-header">
				<h2><?php echo get_page_name_by_ID(get_root_page($wp_query->post->ID)); ?></h2>
				<div class="callme" style="float:right;"><object type="application/x-shockwave-flash" data="https://clients4.google.com/voice/embed/webCallButton" width="230" height="85"><param name="movie" value="https://clients4.google.com/voice/embed/webCallButton" /><param name="wmode" value="transparent" /><param name="FlashVars" value="id=716fb43c98a595572f415bd417276526fe7b6dbb&style=0" /></object>
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
							<?php the_content(); ?>
						<!--END .entry-content .article-->
						</div>
						
						<?php   
							if($_POST['unisphere_hidden'] == 'Y') 
							{  
								// Contact subject
								$subject = $_POST['unisphere_contact_subject'];
								// Details
								$message = $_POST['unisphere_contact_message'];
								
								// Mail of sender
								$mail_from = $_POST['unisphere_contact_email'];
								// From
								$header = "from: ". $_POST['unisphere_contact_name'] . " <" . $_POST['unisphere_contact_email'] . ">";
								
								// Enter your email address
								$to = get_option('unisphere_destination_email');
								
								$send_contact = mail($to,$subject,$message,$header);
								
								// Check, if message was sent to your email								
								if($send_contact)
								{
									echo "<hr />Thank you, we've received your contact information.<hr />";
								}
								else 
								{
									echo "<hr />Your message could not be sent. Make sure you filled all the fields correctly and try again.<hr />";
								}
							}
						?>  
						
						<div id="unisphere-contact-form">
							<form name="unisphere_contact_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">		
						        <input type="hidden" name="unisphere_hidden" value="Y">
					
								<label><?php _e("Name: ") ?></label>
								<input type="text" name="unisphere_contact_name" />
								<div class="spacer"></div>
								
								<label><?php _e("E-mail: ") ?></label>
								<input type="text" name="unisphere_contact_email" />
								<div class="spacer"></div>
								
								<label><?php _e("Subject: ") ?></label>
								<input type="text" name="unisphere_contact_subject" />
								<div class="spacer"></div>
								
								<label><?php _e("Message: ") ?></label>
								<textarea rows="10" cols="40" name="unisphere_contact_message"></textarea>
								<div class="spacer"></div>
								
								<button type="submit">Send</button>
					    	</form>
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