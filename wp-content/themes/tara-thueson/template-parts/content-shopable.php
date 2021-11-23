<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tara
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header container-md">
		<div class="post-meta flex-row align-center justify-center">
			<div class="post-cats">
				<?php 
				$cats = get_the_category();
				echo '<a href="' . get_term_link($cats[0]->term_id) . '">' . $cats[0]->name . '</a>';
				?>
			</div>
			<div class="post-date">
				<?php the_date('m/d/Y'); ?>
			</div>
		</div>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content container-md">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<div id="shopable">
		<?php if(have_rows('shopable_sections')) : while(have_rows('shopable_sections')) : the_row('shopable_sections'); ?>
			<div class="shopable-section">
				<div class="section-title">
					<div class="section-title-border">
						<?php the_sub_field('section_title'); ?>
					</div>
				</div>
				<?php if(have_rows('section_items')) : while(have_rows('section_items')) : the_row('section_items'); ?>
					<section class="shopable-item flex align-center justify-between">
						<img class="shopable-item-image" src="<?php the_sub_field('item_image'); ?>">
						<div class="shopable-item-sep"></div>
						<div class="shopable-item-content">
							<div class="shopable-item-count">
								<?php echo get_row_index(); ?>.
							</div>
							<div class="shopable-item-title">
								<?php the_sub_field('item_title'); ?>
							</div>
							<div class="shopable-item-company">
								<?php the_sub_field('item_company'); ?>
							</div>
							<div class="shopable-item-description">
								<?php the_sub_field('item_description'); ?>
							</div>
							<a class="shopable-item-cta btn btn-primary" href="<?php the_sub_field('item_link'); ?>">Shop Now</a>
						</div>
					</section>
				<?php endwhile; endif; ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
	
	<div class="post-foot">
		<div class="line-header flex-row align-center justify-between">
			<div id="comment-btn" class="line-content"><?php comments_number('Leave A Comment <i class="fa fa-caret-down" aria-hidden="true"></i>'); ?></div>
			<div id="share-<?php echo get_the_ID(); ?>" class="social-share line-content">
				Share
				<input class="image" type="hidden" value="<?php the_post_thumbnail_url(); ?>">
				<input class="url" type="hidden" value="<?php the_permalink(); ?>">
				<input class="title" type="hidden" value="<?php the_title(); ?>">
				<button class="share s_facebook btn-off"><i class="fa fa-facebook" aria-hidden="true"></i></button>
				<button class="share s_pinterest btn-off"><i class="fa fa-pinterest-p" aria-hidden="true"></i></button>
				<button class="share s_twitter btn-off"><i class="fa fa-twitter" aria-hidden="true"></i></button>
				<button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php urlencode(the_permalink()); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></button>
			</div>
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
