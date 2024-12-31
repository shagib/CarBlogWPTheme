<?php
/**
 * CarBlog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CarBlog
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carblog_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on CarBlog, use a find and replace
		* to change 'carblog' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'carblog', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'carblog' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'carblog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'carblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'carblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'carblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'carblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'carblog_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
define('CARBLOG_THEME_DIR', get_template_directory() );
define('CARBLOG_THEME_URI', get_template_directory_uri());
define('CARBLOG_THEME_CSS_DIR', CARBLOG_THEME_URI.'/assets/css/');
define('CARBLOG_THEME_JS_DIR', CARBLOG_THEME_URI.'/assets/js/');
define('CARBLOG_THEME_INC', CARBLOG_THEME_DIR.'/inc/');

function carblog_scripts() {
	wp_enqueue_style( 'carblog-fonts', carblog_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'carblog-bootstrap', CARBLOG_THEME_CSS_DIR.'bootstrap.min.css', array(), '5.2.3' );
	wp_enqueue_style('fontawesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0');
	wp_enqueue_style( 'carblog-slick', CARBLOG_THEME_CSS_DIR.'slick.min.css', array(), '1.0.0' );
	wp_enqueue_style( 'carblog-main', CARBLOG_THEME_CSS_DIR. 'style.css', array(), time() );
	wp_style_add_data( 'carblog-style', 'rtl', 'replace' );
	wp_enqueue_style( 'carblog-style', get_stylesheet_uri() );


	wp_enqueue_script( 'carblog-bootstrap', CARBLOG_THEME_JS_DIR.'navigation.js', array(), '5.2.3', true );
	// wp_enqueue_script( 'carblog-bootstrap', CARBLOG_THEME_JS_DIR.'bootstrap.bundle.min.js', array(), '5.2.3', true );
	// wp_enqueue_script( 'carblog-slick', CARBLOG_THEME_JS_DIR.'slick.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'carblog-custom', CARBLOG_THEME_JS_DIR . 'custom.js', array('jquery'), time(), true );

    // Localize ajaxurl
    wp_localize_script('carblog-custom', 'ajax_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carblog_scripts' );

/*
	Register Fonts
*/
function carblog_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'carblog' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Inter Tight:400,500,600,700|Poppins:400,500,600,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


// function carblog_custom_excerpt_more($more) {
//     return ''; // Removes the [...]
// }
// add_filter('excerpt_more', 'carblog_custom_excerpt_more');
function custom_excerpt_more($more) {
    return '<a href="' . get_permalink() . '"> [...]</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');



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



function newsletter_subscription() {
    $email = sanitize_email($_POST['email']);
    // Add email to MailChimp or similar service
    wp_send_json_success(array('message' => 'Subscribed!'));
}
add_action('wp_ajax_subscribe_newsletter', 'newsletter_subscription');
add_action('wp_ajax_nopriv_subscribe_newsletter', 'newsletter_subscription');

//For post content
add_action('wp_ajax_load_post_content', 'load_post_content');
add_action('wp_ajax_nopriv_load_post_content', 'load_post_content'); // For non-logged-in users
function load_post_content() {
	
	// Check if the post ID is passed in the URL (e.g., ?post_id=123)
	
		$post_id = intval($_POST['post_id']); // Sanitize the input to prevent malicious input
		$post = get_post($post_id);

		if ($post) {
			setup_postdata($post);
			?>
				<div class="post-item">
                    <div class="thumbnail-wrapper">
                        <?php 
							if (has_post_thumbnail($post_id)) {
								echo get_the_post_thumbnail($post_id, 'large');  
							}
						?>
                    </div>
					<div class="writer">
                        <p>By 
							<span class="author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
							<span class="duration"><?php echo esc_html( date( 'F j, Y', strtotime( $post->post_date ) ) ); ?>
							</span>
						</p>
                    </div>
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="blog-title">
                        <h3><?php echo esc_html($post->post_title); ?></h3>
                    </a>
					<div class="short-desc">
						<p class="content">
							<?php 
								if (!empty($post->post_excerpt)) {
									echo esc_html($post->post_excerpt);
								} else {
									// Fallback: get first 40 words of the post content if no excerpt
									$content = wp_trim_words( $post->post_content, 60, '' );
									echo esc_html($content);
								}
							
							?>
							<a href="<?php echo esc_url(get_permalink($post->ID)); ?>">[...]</a>
						</p>
					</div>
                    <a class="btn read-more" href="<?php echo esc_url(get_permalink($post->ID)); ?>">Read More</a>
                                
                </div>
			<?php
			wp_reset_postdata();
		} else {
			echo '<p>Post not found.</p>';
		}

		wp_die();


}


// Function to set post views
function set_post_views($postID) {
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1'); // Initialize with 1 to count the first view
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Function to get post views
function get_post_views($postID) {
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        return "0"; // Return 0 if no views have been counted yet
    }
    return $count;
}

// Function to add view count only for single post views
function track_post_views($postID) {
    if (!is_single()) return; // Only count views on single post pages
    if (empty($postID)) {
        global $post;
        $postID = $post->ID;
    }
    set_post_views($postID);
}
add_action('wp_head', 'track_post_views'); // Hook into wp_head to track views





