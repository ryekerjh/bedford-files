<?php
	$current = get_the_ID();

	$args = [
		'post_type' => 'post',
		'posts_per_page' => 2,
		'post__not_in' => [$current]
	];
	$more = new WP_Query($args);

	if($more->have_posts()) :
	?>
		<section id="explore-posts">
			<div class="explore-wrap flex-row align-start justify-between">
				<?php while($more->have_posts()) : $more->the_post(); ?>
					<div class="more-post flex-row align-center justify-between col-2">
						<?php the_post_thumbnail('related',['class'=>'col-2 more-post-thumb']); ?>
						<div class="col-2 more-post-content">
							<?php 
							$cats = get_the_category();
							echo '<a class="more-post-cat" href="' . get_term_link($cats[0]->term_id) . '">' . $cats[0]->name . '</a>';
							?>
							<h3 class="more-pos-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo wp_trim_words(get_the_title(), 5); ?></a></h3>
							<?php echo excerpt(15); ?>
							<div class="rs-code">
								<?php 
								$rs = get_field('rs_code'); 
								if($rs){
									echo do_shortcode($rs);
								}
								?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; 
	wp_reset_query();
	wp_reset_postdata();
	?>