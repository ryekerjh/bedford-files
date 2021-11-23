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

	<div class="entry-content container-md">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jessa' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div id="contact-form-wrapper">
		<div class="container-md">
			<div class="contact-form">
				<?php the_field('contact_form'); ?>
			</div>
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
