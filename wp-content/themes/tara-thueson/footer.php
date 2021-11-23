<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tara
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if(get_field('subscribe','option')) : ?>
			<div class="footer-subscribe">
				<?php the_field('subscribe','option'); ?>
			</div>
		<?php endif; ?>
		<div class="footer-body">
			<img class="logo" src="<?php the_field('logo','option'); ?>">
			<div class="footer-nav">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-3',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'cd-navigation cd-single-item-wrapper',
					) );
				?>
			</div>
			<div class="site-info flex-row align-center justify-center">
				<div class="site-copy">&COPY; <?php bloginfo('name'); ?>. All Rights Reserved.</div>
				<div class="site-built">Design + Development by <a href="//smashcreative.com/" target="_blank">Smash Creative</a></div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div>

<nav id="cd-lateral-nav">
	<!-- menu photo -->
	<?php 
	$photo = get_field('nav_photo','option');
	if($photo){ ?>
		<div class="lateral-nav-photo">
			<img src="<?php echo $photo; ?>">
		</div>
	<?php } ?>

	<div class="cd-lateral-nav-body">
		<!-- social -->
		<?php 
		$fb = get_field('facebook_handle','option');
		$tw = get_field('twitter_handle','option');
		$yt = get_field('youtube_handle','option');
		$pn = get_field('pinterest_handle','option');
		$ig = get_field('instagram_handle','option');
		if($fb || $tw || $yt || $pn || $ig){
		?>
			<div class="lateral-nav-social">
				<div class="social-icons flex-row align-center justify-center">
					<?php if($fb){ ?>
						<a href="//facebook.com/<?php echo $fb; ?>">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if($tw){ ?>
						<a href="//twitter.com/<?php echo $tw; ?>">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if($yt){ ?>
						<a href="//youtube.com/<?php echo $yt; ?>">
							<i class="fa fa-youtube-play" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if($pn){ ?>
						<a href="//pinterest.com/<?php echo $pn; ?>">
							<i class="fa fa-pinterest-p" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if($ig){ ?>
						<a href="//instagram.com/<?php echo $ig; ?>">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<!-- search -->
		<div class="lateral-nav-search">
			<?php echo get_search_form(); ?>
		</div>

		<!-- primary nav -->
		<div class="lateral-nav-primary">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'cd-navigation cd-single-item-wrapper',
				) );
			?>
		</div>

		<!-- secondary nav -->
		<div class="lateral-nav-secondary">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'secondary-menu',
					'menu_class'     => 'cd-navigation cd-single-item-wrapper',
				) );
			?>
		</div>
	</div>


</nav>

</div><!-- #page -->

<a id="back_to_top" class="flex-col align-center justify-center" href="#page">
	<i class="fa fa-angle-up flex align-center justify-center" aria-hidden="true"></i>
	<span>Back To Top</span>
</a>

<?php if(have_rows('custom_popups','option')) : while(have_rows('custom_popups','option')) : the_row('custom_popups','option');
    $cookie = get_sub_field('use_cookie','option');
    $show = get_sub_field('show_after','option');
    $expire = get_sub_field('expire_after','option');
?>
<aside id="popup-modal" class="modal popup-modal" <?php if($cookie && $show && $expire){ echo 'data-cookie='.$cookie.' data-show='.$show.' data-expire='.$expire; } ?> data-trigger="<?php the_sub_field('popup_trigger_class','option'); ?>">
    <div id="popup-modal-box" class="modal-box">
        <div id="popup-close">
            <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/black-x.png">
        </div>
        <div id="popup-modal-inner" class="modal-inner flex justify-center">
                <?php if ( get_sub_field('popup_image','option') ) : $image = get_sub_field('popup_image','option'); ?>
                    <img src="<?php echo $image['sizes']['large']; ?>" class="popup-image">
                <?php endif; ?>
                <?php if ( get_sub_field('popup_text','option') ) : ?>
                    <div class="popup-text flex-col align-center justify-center">
                        <?php echo get_sub_field('popup_text','option'); ?>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</aside>
<?php endwhile; endif; ?>


<?php wp_footer(); ?>

</body>
</html>
