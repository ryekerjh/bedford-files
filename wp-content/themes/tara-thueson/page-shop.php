<?php
/**
 * Template Name: Shop
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

			<div id="shop-page">
				
				<div class="shop-banner" style="background-image: url('<?php the_field('shop-banner'); ?>')">
					<div class="sb-title"><?php the_field('shop-banner-title'); ?></div>
				</div>

				<?php $shopCats = get_field('shop_categories'); ?>

				<?php foreach($shopCats as $shopCat){
						$args = [
							'post_type' 		=> 'product',
							'posts_per_page' 	=> -1,
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'product_category',
									'field' 	=> 'term_id',
									'terms' 	=> [$shopCat],
									'operator' 	=> 'IN'
								]
							]
						];

						$shopQuery = new WP_Query($args);

						if($shopQuery->have_posts()) : 

							$term = get_term($shopCat);
						?>
							<section class="shop-section container-md">
								<div class="product-category"><?php echo $term->name; ?></div>
								<div class="shop-row flex-wrap align-start justify-between">
									<?php while($shopQuery->have_posts()) : $shopQuery->the_post(); ?>
										<a class="product" href="<?php the_field('product_link'); ?>" target="_blank">
											<div><?php the_post_thumbnail('shop'); ?></div>
											<h6><?php the_title(); ?></h6>
										</a>
									<?php endwhile; ?>
								</div>
							</section>

						<?php endif; ?>
				<?php } ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
