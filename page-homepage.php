<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<div class="col-sm-8">
						
							<header>
								
								<?php 
									$post_thumbnail_id = get_post_thumbnail_id();
									$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-featured' );
								?>
								
								<div class="img-border jumbotron">
									<h1>JAACF</h1>
								</div>

							<!-- 	<div class="jumbotron" style="background-image: url('<?php echo $featured_src[0]; ?>'); background-repeat: no-repeat; background-position: 0 0;">
					
									<div class="page-header">
										<h1><?php bloginfo('title'); ?><small><?php echo get_post_meta($post->ID, 'custom_tagline' , true);?></small></h1>
									</div>				
									
								</div> -->
							
							</header>
						
							<section class="row post_content">
							
								
								<?php the_content(); ?>
	
														
							</section> 
						</div>
						<div class="col-sm-4">
							<h4>Misson:</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
								Quia aperiam, consequuntur, fugit voluptatum ipsum odit amet nulla unde animi! 
								Hic autem eveniet error tempora facilis quia atque, ut et, molestiae!
							</p>
							<a href="#" class="btn btn-primary btn-lg">Donate now</a>
							
							<hr>
							
							<h4>Board of Directors</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, itaque corrupti nihil distinctio perferendis veniam sequi architecto similique modi blanditiis, labore placeat rem voluptas molestias eius voluptatum unde quo harum?
							</p>
							<ul>
								<li>Firstname Lastname, <em>Title goes here</em></li>
								<li>Firstname Lastname, <em>Title goes here</em></li>
								<li>Firstname Lastname, <em>Title goes here</em></li>
								<li>Firstname Lastname, <em>Title goes here</em></li>
								<li>Firstname Lastname, <em>Title goes here</em></li>
							</ul>

							<hr>

							<h4>Thanks to our sponsors</h4>
							<p>Without you, it wouldn't be possible!</p>
							<button class="btn btn-success">Find out more</button>
						</div>
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php 
						// No comments on homepage
						//comments_template();
					?>
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>