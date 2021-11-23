<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tara
 */

get_header(); ?>

	<div id="primary" class="full container content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header id="archive-header" class="page-header container-md flex-row align-start justify-start">
				<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'tara' ), '<span>' . get_search_query() . '</span>' );
				?>
			</header><!-- .page-header -->


			<div id="archive-items" class="container-md flex-row align-start justify-between flex-wrap">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<a class="archive-item" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('archive', ['class'=>'archive-item-image']); ?>
						<div class="archive-item-meta flex align-center justify-center">
							<div class="archive-item-title"><?php the_title(); ?></div>
						</div>
					</a>

				<?php endwhile; ?>
			</div>


			<div id="archive-load-more" class="container-md">
				<?php 
				$cat = get_query_var('cat');
				$current_cat = get_category($cat);
				//LOAD MORE GOES HERE
				echo do_shortcode('[ajax_load_more id="loadmore" repeater="template_2" container_type="div" post_type="post" offset="9" category="' . $current_cat->slug . '" posts_per_page="9" pause="true" scroll="false" transition="fade" images_loaded="true" button_label="Load <span>More</span> Posts"]');
				?>
			</div>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
