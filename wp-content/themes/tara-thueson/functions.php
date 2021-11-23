<?php
/**
 * tara functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tara
 */

if ( ! function_exists( 'tara_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tara_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tara, use a find and replace
		 * to change 'tara' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tara', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Side Menu', 'tara' ),
			'menu-2' => esc_html__( 'Top Menu', 'tara' ),
			'menu-3' => esc_html__( 'Bottom Menu', 'tara' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tara_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tara_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tara_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tara_content_width', 640 );
}
add_action( 'after_setup_theme', 'tara_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tara_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tara' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tara' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tara_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tara_scripts() {	
	wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/inc/fonts/css/font-awesome.min.css' );

	wp_enqueue_style( 'crop-style', get_stylesheet_directory_uri() . '/js/smash/crop/crop.css' );
	
	wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/js/smash/slick/slick.css' );
	
	wp_enqueue_style( 'tara-style', get_stylesheet_uri() );
	
	// wp_enqueue_style( 'tara-style', get_stylesheet_directory_uri() . '/sass/style.css' );
	
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1', true );
	
	wp_enqueue_script( 'tara-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'cookie-script', get_template_directory_uri() . '/js/smash/js-cookie.js', array(), '1', true );
	
	wp_enqueue_script( 'smash-script', get_template_directory_uri() . '/js/smash/smash.js', array(), '1', true );
	
	wp_enqueue_script( 'slide-nav', get_template_directory_uri() . '/js/smash/slide-nav.js', array(), '1', true );
	
	wp_enqueue_script( 'crop-script', get_template_directory_uri() . '/js/smash/crop/crop.js', array(), '1', true );

	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/smash/slick/slick.min.js', array(), '1', true );
	
	wp_enqueue_script( 'social-script', get_template_directory_uri() . '/js/smash/social/social.min.js', array(), '1', true );

	wp_enqueue_script( 'waypoints-script', get_template_directory_uri() . '/js/smash/waypoints/jquery.waypoints.min.js', array(), '1', true );

	wp_enqueue_script( 'tara-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tara_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*****************
*
* IMAGE SIZES
*
*****************/
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'featured', 2000, 1290, true ); // (cropped)
	add_image_size( 'tall', 1100, 1500, true ); // (cropped)
	add_image_size( 'related', 510, 724, true ); // (cropped)
	add_image_size( 'archive', 670, 920, true ); // (cropped)
	add_image_size( 'popup', 500, 320, true ); // (cropped)
	add_image_size( 'sidebar-tall', 600, 730, true ); // (cropped)
	add_image_size( 'sidebar-wide', 600, 340, true ); // (cropped)
	add_image_size( 'shop', 440, 440, true ); // (cropped)
	add_image_size( 'printable', 400, 300, true ); // (cropped)
}

/*****************
*
* ACF OPTIONS
*
*****************/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Settings',
		'menu_title'	=> 'Home Settings',
		'parent_slug'	=> 'theme-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-settings',
	));
	
}



/*****************
*
* CUSTOMIZED SEARCH
*
*****************/
function custom_search_form( $form ) {
	$form = '<form method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">';
	$form .= '<label>';
	$form .= '<span class="screen-reader-text">Search for:</span>';
	$form .= '<div class="search-with-icon seach-icon-left"><input type="text" class="search-field" placeholder="Search" value="' . wp_specialchars($s, 1) . '" name="s"><i class="fa fa-search" aria-hidden="true"></i></div>';
	$form .= '</label>';
	$form .= '</form>';
	return $form;
}
add_filter( 'get_search_form', 'custom_search_form' );


/*****************
*
* FLEX_ROW SHORTCODE
*
*****************/
function row_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'cols' => '2'
    ), $atts);
    return '<div class="flex_row col-'.$a['cols'].'">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'flex_row', 'row_shortcode' );



/*****************
*
* PRINTABLE SHORTCODE
*
*****************/
// register shortcode
add_shortcode( 'smash_printable', 'smash_printable_embed_shortcode' );
// define instagram shortcode
function smash_printable_embed_shortcode( $atts, $content = null ) {
    // define main output
    $a = shortcode_atts( array(
    	'id' 		=> '',
    ), $atts);

    $r_id = $a['id'];

    if(have_rows('printables')) : while(have_rows('printables')) : the_row('printables');

  	$printable_id = get_sub_field('printable_id');
		$printable_title = get_sub_field('printable_title');
		$printable_description = get_sub_field('printable_description');
		$printable_thumbnail = get_sub_field('printable_thumbnail');
		$printable_ingredients = get_sub_field('printable_ingredients');
		$printable_directions = get_sub_field('printable_directions');

		if($printable_id == $r_id) {

			$str .= '<div id="printable" class="printable">
					<div class="printable-header">
						<div class="printable-header-left">
							<h2 class="printable-title">' . $printable_title . '</h2>
							<div class="printable-description">' . $printable_description . '</div>
							<a class="btn btn-primary print-printable"><i class="fa fa-print" aria-hidden="true"></i><span>Print Recipe</span></a>
						</div>
						<div class="printable-header-right">' . wp_get_attachment_image($printable_thumbnail, 'printable') . '</div>
					</div>
					<div class="printable-details">
						<div class="ingredients">
							<h3>Ingredients</h3>
							' . $printable_ingredients . '
						</div>
						<div class="directions">
							<h3>Directions</h3>
							' . $printable_directions . '
						</div>
					</div>
				</div>';
		}
    
	endwhile; endif;

    return $str;
}




/*****************
*
* INSTAGRAM SHORTCODE
*
*****************/
// register shortcode
add_shortcode( 'instasmash', 'instasmash_embed_shortcode' );

// get instagram ID
function smash_get_instagram_user($username) {
	$result = wp_remote_get('https://www.instagram.com/' . $username . '/?__a=1');

	if( is_wp_error( $result ) ) {
		// error handling
        $error_message = $result->get_error_message();
        $str           = "Something went wrong: $error_message";
	} else {
		$body = json_decode($result['body']);
		$user = $body->graphql->user;
		$userID = $user->id;

		if (empty($user)) { 
			return;
		} else {
			return $user;
		}
	}
}
 
// define instagram shortcode
function instasmash_embed_shortcode( $atts, $content = null ) {
    // define main output
    $a = shortcode_atts( array(
    	'count' => 8,
    	'profile' => false
    ), $atts);
    $str    = "";
    $token = get_field('instagram_access_token','option');
    $userName = get_field('instagram_handle','option');
    $igUser = smash_get_instagram_user($userName);
    $userID = $igUser->id;
    $userFollowers = $igUser->edge_followed_by->count;
    $showNum = $a['count'];

    if($userFollowers>1000000000000) {
    	$userFollowers = round(($userFollowers/1000000000000),2).'t';	
    } else if ($userFollowers>1000000000) {
    	$userFollowers = round(($userFollowers/1000000000),2).'b';
    } else if($userFollowers>1000000) {
    	$userFollowers = round(($userFollowers/1000000),2).'m';	
    } else if($userFollowers>1000) {
    	$userFollowers = round(($userFollowers/1000),2).'k';
    }

    // get remote data
    $result = wp_remote_get( "https://api.instagram.com/v1/users/" . $userID . "/media/recent/?access_token=" . $token . "&count=" . $showNum );
		// print_r($result);

    if ( is_wp_error( $result ) ) {
        // error handling
        $error_message = $result->get_error_message();
        $str           = "Something went wrong: $error_message";
    } else {
        // processing further
        $result    = json_decode( $result['body'] );
        $main_data = array();
        $n         = 0;

        // get username and actual thumbnail
        foreach ( $result->data as $d ) {
            $main_data[ $n ]['user']      = $d->user->username;
            $main_data[ $n ]['thumbnail'] = $d->images->standard_resolution->url;
            $main_data[ $n ]['link'] = $d->link;
            $n++;
        }

        // create main string, pictures embedded in links
        foreach ( $main_data as $data ) {
            $str .= '<a class="instafeed-item" target="_blank" href="'.$data['link'].'"><div class="crop-wrap" style="background: url('.$data['thumbnail'].') no-repeat; background-size: cover; background-position: center center;"></div><div class="ig-bg"><i class="fa fa-instagram" aria-hidden="true"></i></div></a> ';
        }

        if($a['profile']){
        	$str .= '<div class="instasmash-footer"><div><i class="fa fa-instagram" aria-hidden="true"></i></div><a href="//instagram.com/'.$userName.'" target="_blank">@'.$userName.'</a><div class="user-count">'.$userFollowers.' followers</div></div>';
        }
    }

    return $str;
}

// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}



/**
 * Add custom posts_per_page perameters.
 **/
function my_post_queries( $query ) {
	// do not alter the query on wp-admin pages and only alter it if it's the main query
	if (!is_admin() && $query->is_main_query()){

		// alter the query for the home and category pages 
		// if(is_front_page()){
		// 	$query->set('posts_per_page', 6);
		// }

		if(is_archive()){
			$query->set('posts_per_page', 9);
		}

		if(is_category()){
			$query->set('posts_per_page', 9);
		}

	}
}
add_action( 'pre_get_posts', 'my_post_queries' );



function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


/**
 * Add class to exceprt.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function add_excerpt_class( $excerpt )
{
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}
 
add_filter( "the_excerpt", "add_excerpt_class" );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return '<p class="excerpt">' . $excerpt . '</p>';
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}


/**
 * Change the archive title filte.
 **/
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});


/*****************
*
* Disable Client Updates
*
*****************/
if ( ! function_exists( 'disableClientUpdates' ) ) :

	function disableClientUpdates(){
		if(is_user_logged_in() && is_admin()){
			$current_user = wp_get_current_user();
			if($current_user->data->user_login == 'smashcreative'){
				return;
			} else {
				define('DISALLOW_FILE_MODS',true);
			}
		}
	}

endif;
add_action( 'after_setup_theme', 'disableClientUpdates' );