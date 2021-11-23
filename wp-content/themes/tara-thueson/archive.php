<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tara
 */

get_header(); ?>

	<div id="primary" class="full container content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header id="archive-header" class="page-header container-md flex-row align-start justify-start">
				<div class="archive-cat btn"><?php the_archive_title(); ?> <i class="fa fa-circle" aria-hidden="true"></i> Latest Posts</div>
				<?php 
				$term = get_queried_object()->term_id;
				$parent = get_queried_object()->category_parent;
				$parentName = get_cat_name($term);
				$parentLink = get_category_link($parent);
				$children = get_terms( 'category', array(
					'parent'    => $term,
					'hide_empty' => false
				) );

				if($children || $parent){
				?>
					<div id="category-nav" class="btn">
						<div id="category-selection">
							<div class="category-selection-title"><span>Explore</span><span><i class="fa fa-caret-down" aria-hidden="true"></i></span></div>
							<ul class="category-selection-list">
								<?php 
									if($parent){
										wp_list_categories(array('child_of' => $parent, 'title_li' => '', 'show_option_none' => '')); 
									} else {
										wp_list_categories(array('child_of' => $term, 'title_li' => '', 'show_option_none' => ''));
									}
								?>
							</ul>
						</div>
					</div>
				<?php } ?>
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
