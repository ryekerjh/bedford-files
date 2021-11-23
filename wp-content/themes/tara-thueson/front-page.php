<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tara
 */

get_header(); ?>

	<div id="primary" class="full content-area">
		<main id="main" class="site-main">

			<!-- 2 large posts with sidebar -->
			<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 2
				];
				$postsLoop = new WP_Query($args);

				if($postsLoop->have_posts()) :
			?>
				<section id="large-posts-section" class="container-md">
					<div id="left-content" class="posts-wrapper">
						<?php while($postsLoop->have_posts()) : $postsLoop->the_post(); ?>
							<div class="large-post post-block">
								<a class="post-image-link" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('tall',['class'=>'large-post-thumb']); ?>
									<div class="post-image-hover flex align-center justify-center">
										<div class="viewpost">VIEW <span>the</span> Post</div>
									</div>
								</a>
								
								<div class="entry-meta">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="cats-drop">
										<span>explore</span> More <i class="fa fa-caret-down" aria-hidden="true"></i>
										<?php the_category(' '); ?>
									</div>
								</div>

								<?php echo excerpt(60); ?>

								<?php
									$rs = get_field('rs_code');
									if($rs){
										echo do_shortcode($rs);
									}
								?>

								<a class="btn btn-primary btn-full" href="<?php the_permalink(); ?>">View the Post</a>

								<div class="post-footer-wrap flex-row align-center justify-between">
									<a class="post-footer-comments" href="<?php the_permalink(); ?>?showcomments=true">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<?php comments_number('0 comments','1 comment','% comments'); ?>
									</a>
									<div id="share-<?php echo get_the_ID(); ?>" class="social-share">
										Share
										<input class="image" type="hidden" value="<?php the_post_thumbnail_url(); ?>">
										<input class="url" type="hidden" value="<?php the_permalink(); ?>">
										<input class="title" type="hidden" value="<?php the_title(); ?>">
										<button class="share s_facebook btn-off"><i class="fa fa-facebook" aria-hidden="true"></i></button>
										<button class="share s_twitter btn-off"><i class="fa fa-twitter" aria-hidden="true"></i></button>
										<button class="share s_pinterest btn-off"><i class="fa fa-pinterest-p" aria-hidden="true"></i></button>
										<!-- <button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php urlencode(the_permalink()); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></button> -->
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>

					<?php get_sidebar(); ?>

					<div class="clearfix"></div>
				</section>
			<?php endif; 
			wp_reset_query();
			wp_reset_postdata();
			?>

			<!-- shop favorites -->
			<?php if(have_rows('shop_favorites','option')) : ?>
				<section id="shop-favorites-1" class="shop-favorites">
					<?php 
					$count = 1;
					while(have_rows('shop_favorites','option')) : the_row('shop_favorites','option'); ?>
						<?php if($count == 1) { ?>
							<div class="container-xl flex-row align-center justify-between">
								<div class="shop-favorites-header">
									<div class="shop-favorites-title">Shop <span><?php the_sub_field('shop_category','option'); ?></span> Favorites</div>
									<a href="<?php the_sub_field('shop_page','option'); ?>">View All</a>
								</div>
								<div class="shop-favorites-block">
									<?php the_sub_field('shop_favorites_code','option'); ?>
								</div>
							</div>
						<?php } ?>
					<?php 
					$count++;
					endwhile; ?>
				</section>
			<?php endif; ?>

			<!-- 4 small posts -->
			<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 4,
					'offset' => 2
				];
				$postsLoop = new WP_Query($args);
				$count = 1;

				if($postsLoop->have_posts()) :
			?>
				<section id="small-posts-section-1" class="container-lg">
					<div class="posts-wrapper">
						<?php while($postsLoop->have_posts()) : $postsLoop->the_post(); ?>

							<?php if($count % 2 == 1){ ?>
								<div class="posts-row flex-row align-start justify-between">
							<?php } ?>

							<div class="post-block small-post">
								<a class="post-image-link" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('tall',['class'=>'large-post-thumb']); ?>
									<div class="post-image-hover flex align-center justify-center">
										<div class="viewpost">View <span>the</span> Post</div>
									</div>
								</a>
								
								<div class="entry-meta">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="cats-drop">
										<span>explore</span> More <i class="fa fa-caret-down" aria-hidden="true"></i>
										<?php the_category(' '); ?>
									</div>
								</div>

								<?php echo excerpt(30); ?>

								<?php
									$rs = get_field('rs_code');
									if($rs){
										echo do_shortcode($rs);
									}
								?>

								<a class="btn btn-primary btn-full" href="<?php the_permalink(); ?>">View the Post</a>

								<div class="post-footer-wrap flex-row align-center justify-between">
									<a class="post-footer-comments" href="<?php the_permalink(); ?>?showcomments=true">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<?php comments_number('0 comments','1 comment','% comments'); ?>
									</a>
									<div id="share-<?php echo get_the_ID(); ?>" class="social-share">
										Share
										<input class="image" type="hidden" value="<?php the_post_thumbnail_url(); ?>">
										<input class="url" type="hidden" value="<?php the_permalink(); ?>">
										<input class="title" type="hidden" value="<?php the_title(); ?>">
										<button class="share s_facebook btn-off"><i class="fa fa-facebook" aria-hidden="true"></i></button>
										<button class="share s_twitter btn-off"><i class="fa fa-twitter" aria-hidden="true"></i></button>
										<button class="share s_pinterest btn-off"><i class="fa fa-pinterest-p" aria-hidden="true"></i></button>
										<!-- <button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php urlencode(the_permalink()); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></button> -->
									</div>
								</div>
							</div>

							<?php if($count % 2 == 0){ ?>
								</div>
							<?php } ?>

						<?php 
						$count++;
						endwhile; ?>
					</div>

					<div class="clearfix"></div>
				</section>
			<?php endif; 
			wp_reset_query();
			wp_reset_postdata();
			?>

			<!-- shop favorites -->
			<?php if(have_rows('shop_favorites','option')) : ?>
				<section id="shop-favorites-1" class="shop-favorites">
					<?php 
					$count = 1;
					while(have_rows('shop_favorites','option')) : the_row('shop_favorites','option'); ?>
						<?php if($count == 2) { ?>
							<div class="container-xl flex-row align-center justify-center">
								<div class="shop-favorites-header">
									<div class="shop-favorites-title">Shop <span><?php the_sub_field('shop_category','option'); ?></span> Favorites</div>
									<a href="<?php the_sub_field('shop_page','option'); ?>">View All</a>
								</div>
								<div class="shop-favorites-block">
									<?php the_sub_field('shop_favorites_code','option'); ?>
								</div>
							</div>
						<?php } ?>
					<?php 
					$count++;
					endwhile; ?>
				</section>
			<?php endif; ?>

			<!-- 2 small posts -->
			<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 2,
					'offset' => 6
				];
				$postsLoop = new WP_Query($args);
				$count = 1;

				if($postsLoop->have_posts()) :
			?>
				<section id="small-posts-section-2" class="container-lg">
					<div class="posts-wrapper">
						<?php while($postsLoop->have_posts()) : $postsLoop->the_post(); ?>

							<?php if($count % 2 == 1){ ?>
								<div class="posts-row flex-row align-start justify-between">
							<?php } ?>

							<div class="post-block small-post">
								<a class="post-image-link" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('tall',['class'=>'large-post-thumb']); ?>
									<div class="post-image-hover flex align-center justify-center">
										<div class="viewpost">View <span>the</span> Post</div>
									</div>
								</a>
								
								<div class="entry-meta">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="cats-drop">
										<span>explore</span> More <i class="fa fa-caret-down" aria-hidden="true"></i>
										<?php the_category(' '); ?>
									</div>
								</div>

								<?php echo excerpt(30); ?>

								<?php
									$rs = get_field('rs_code');
									if($rs){
										echo do_shortcode($rs);
									}
								?>

								<a class="btn btn-primary btn-full" href="<?php the_permalink(); ?>">View the Post</a>

								<div class="post-footer-wrap flex-row align-center justify-between">
									<a class="post-footer-comments" href="<?php the_permalink(); ?>?showcomments=true">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<?php comments_number('0 comments','1 comment','% comments'); ?>
									</a>
									<div id="share-<?php echo get_the_ID(); ?>" class="social-share">
										Share
										<input class="image" type="hidden" value="<?php the_post_thumbnail_url(); ?>">
										<input class="url" type="hidden" value="<?php the_permalink(); ?>">
										<input class="title" type="hidden" value="<?php the_title(); ?>">
										<button class="share s_facebook btn-off"><i class="fa fa-facebook" aria-hidden="true"></i></button>
										<button class="share s_twitter btn-off"><i class="fa fa-twitter" aria-hidden="true"></i></button>
										<button class="share s_pinterest btn-off"><i class="fa fa-pinterest-p" aria-hidden="true"></i></button>
										<!-- <button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php urlencode(the_permalink()); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></button> -->
									</div>
								</div>
							</div>

							<?php if($count % 2 == 0){ ?>
								</div>
							<?php } ?>

						<?php 
						$count++;
						endwhile; ?>
					</div>

					<div class="clearfix"></div>
				</section>
			<?php endif; 
			wp_reset_query();
			wp_reset_postdata();
			?>

			<!-- More posts nav -->
			<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 4,
					'offset' => 8
				];
				$postsLoop = new WP_Query($args);
				$count = 1;

				if($postsLoop->have_posts()) :
			?>
				<section id="more-posts">
					<div class="container">
						<div class="more-posts-wrap flex-row align-start justify-center">
							<?php while($postsLoop->have_posts()) : $postsLoop->the_post(); ?>
								<a class="more-post" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('related', ['class'=>'more-post-thumb']); ?>
									<div class="more-post-title"><?php the_title(); ?></div>
								</a>
							<?php endwhile; ?>
						</div>
                        <?php echo do_shortcode('[ajax_load_more repeater="template_1" container_type="div" css_classes="more-posts-wrap flex-wrap align-start justify-center" post_type="post" posts_per_page="12" offset="12" pause="true" scroll="false" transition_container="false" button_label="Load More Posts"]'); ?>
					</div>
				</section>
			<?php endif; 
			wp_reset_query();
			wp_reset_postdata();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
