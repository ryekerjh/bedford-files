<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tara
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="container comments-area comments">

	<?php
	$comments_args = array(
		// Change the fields that show in the form
		'fields' => array(
			'author' => '<div class="comment-form-author comment-input-wrap col-2"><input id="author" name="author" type="text" value="" size="30" maxlength="245" aria-required="true" required="required" placeholder="Name"></div>',
			'email' => '<div class="comment-form-email comment-input-wrap col-2"><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required" placeholder="Email"></div>',
			'url' => '<div class="comment-form-url comment-input-wrap col-1"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"" size="30" maxlength="100" placeholder="Website"></div>'
		),
		'class_submit' => __('btn btn-rv', 'verisage'),
        // Change the title of send button 
        'label_submit' => __( 'Submit Comment', 'verisage' ),
        // Change the title of the reply section
        'title_reply' => __( '', 'verisage' ),
        'title_reply_before' => __( '' ),
        'title_reply_after' => '',
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<div class="comment-form-comment comment-input-wrap"><textarea id="comment" rows="8" name="comment" aria-required="true" placeholder="Your Comment"></textarea></div>',
	);
	comment_form( $comments_args );

	
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'vcreative' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'vcreative' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'vcreative' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'vcreative' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'vcreative' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'vcreative' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'vcreative' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'vcreative' ); ?></p>
	<?php
	endif;
	?>

</div><!-- #comments -->