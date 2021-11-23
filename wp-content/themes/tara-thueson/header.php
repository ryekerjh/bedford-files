<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tara
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  // THIS IS SMASH CREATIVE TRCKING
	  ga('create', 'UA-105377962-33', 'tarathueson.com');
	  ga('send', 'pageview');

	  // THIS IS CLIENT TRACKING
	  ga('create', 'UA-115828406-1', {'name':'b'});
	  ga('b.send', 'pageview');

	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(!is_user_logged_in() && get_field('show_coming_soon_page','option')){
	include('coming-soon.php');
} ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tara' ); ?></a>

	<?php 
	$fb = get_field('facebook_handle','option');
	$tw = get_field('twitter_handle','option');
	$yt = get_field('youtube_handle','option');
	$pn = get_field('pinterest_handle','option');
	$ig = get_field('instagram_handle','option');
	if($fb || $tw || $yt || $pn || $ig){
	?>
	<div class="vertical-nav-social">
		<div class="social-icons flex-col align-center">
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

	<div id="instasmash" class="ig-container">
		<?php 
		// echo do_shortcode('[instasmash count="10"]'); 
		echo do_shortcode('[instagram-feed num=10 nummobile=10 cols=10 colsmobile=10]'); 
		?>
	</div>
	<div id="waypoint"></div>

	<header id="masthead" class="site-header">
		<div class="site-navigation-wrap">
			<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Start Here</span><span class="cd-menu-icon"></span></a>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tara' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'category-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
			
			<?php if(have_rows('shops','option')) : ?>
				<div id="shop-drop">
					<div class="shop-drop-nav">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
						<span><?php the_field('shop_title','option'); ?></span>
					</div>
					<div class="shop-drop-dropper">
						<?php while(have_rows('shops','option')) : the_row('shops','option'); ?>
							<a class="shop-drop-link" href="<?php the_sub_field('shop_link'); ?>">
								<img src="<?php the_sub_field('shop_image','option'); ?>">
							</a>	
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</header><!-- #masthead -->

<div class="cd-main-content">
	<div id="content" class="site-content">
		<a class="logo" href="<?php bloginfo('url'); ?>"><img src="<?php the_field('logo','option'); ?>"></a>
