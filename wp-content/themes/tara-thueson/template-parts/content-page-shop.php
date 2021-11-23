<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jessa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="shop-page">
		<div class="entry-header container-md">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-4',
					'menu_id'        => 'shop-menu',
				) );
			?>
		</div>

		<div class="entry-content container-md">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jessa' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
