<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tara
 */
?>

<aside id="secondary" class="widget-area">

	<!-- About -->
	<div id="about-widget" class="smash-widget">
		<?php 
		$aboutImage = get_field('about_image','option');
		if($aboutImage){ 
			echo wp_get_attachment_image($aboutImage, 'sidebar'); 
		} ?>
		<div class="about-widget-text">
			<?php the_field('about_text','option'); ?>
		</div>
		<a class="btn btn-secondary" href="<?php the_field('about_cta_link','option'); ?>"><?php the_field('about_cta','option'); ?></a>
	</div>
	
	<?php
		get_search_form();
	?>

	<!-- Instagram -->
	<div id="instasmash" class="ig-container flex-col smash-widget">
		<div class="smash-widget-title">Follow On Instagram</div>
		<?php 
		// echo do_shortcode('[instasmash count="2" profile="true"]'); 
		echo do_shortcode('[instagram-feed num=2 cols=1]');
		?>
		<div class="instasmash-footer">
			<div><i class="fa fa-instagram" aria-hidden="true"></i></div>
			<a href="//instagram.com/<?php echo get_field('instagram_handle','option'); ?>" target="_blank">@<?php echo get_field('instagram_handle','option'); ?></a>
		</div>
	</div>

	<!-- Latest Vids -->
	<?php
		$args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'category' => 'videos'
		];
		$postsLoop = new WP_Query($args);

		if($postsLoop->have_posts()) :
	?>
		<div class="latest-vids smash-widget">
			<div class="latest-vids-title smash-widget-title">Latest Posts <i class="fa fa-caret-down" aria-hidden="true"></i></div>
			<?php while($postsLoop->have_posts()) : $postsLoop->the_post(); ?>
				<a class="latest-vid" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('sidebar-wide'); ?>
					<div class="flex align-center justify-center">
						<?php the_title(); ?>
					</div>
				</a>
			<?php endwhile; ?>
		</div>
	<?php endif; 
	wp_reset_query();
	wp_reset_postdata();
	?>

	<!-- Subscribe -->
	<div class="sidebar-subscribe smash-widget">
		<div class="flex-row align-center justify-between">
			<div class="sidebar-subscribe-content col-2">
				<?php the_field('sidebar_subscribe_content','option'); ?>
			</div>
			<?php 
			$image = get_field('sidebar_subscribe_image','option'); 
			if($image){
				echo wp_get_attachment_image($image,'sidebar-tall', false, ['class'=>'col-2']);
			}
			?>
		</div>
		<div class="sidebar-subscribe-form">
			<?php the_field('sidebar_subscribe_form','option'); ?>
		</div>
	</div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>