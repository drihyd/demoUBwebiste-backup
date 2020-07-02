<?php

/* Cabana functions and definitions */

/*-----------------------------------------------------------------------------------*/
/* Register the Redux Framework and Config file
/*-----------------------------------------------------------------------------------*/

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_config ) && file_exists( dirname( __FILE__ ) . '/framework/config/framework-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/config/framework-config.php' );
}

/*-----------------------------------------------------------------------------------*/
/* Register WooCommerce
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'woocommerce' );

/*-----------------------------------------------------------------------------------*/
/* Declaring the content width based on the theme's design and stylesheet
/*-----------------------------------------------------------------------------------*/

if ( !isset( $content_width ) )
  $content_width = 960; /* pixels */

/*-----------------------------------------------------------------------------------*/
/* Declaring the theme language domain (for language translations)
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain( 'cabana', get_template_directory().'/languages' );

/*-----------------------------------------------------------------------------------*/
/* Register Automatic Feed Links
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Register & Enqueue JS and CSS
/*-----------------------------------------------------------------------------------*/

function gt_queue_assets() {  	
  	if ( !is_admin() ) {
  	
  	wp_enqueue_script( 'jquery' );
  	
  // Register Scripts
	wp_register_script( 'modernizr', get_template_directory_uri() .'/assets/js/modernizr-2.6.2.min.js' );
	wp_register_script( 'google-maps-api', 'http://maps.google.com/maps/api/js?sensor=true', 'jquery', '1.0', true );
	wp_register_script( 'gmaps', get_template_directory_uri() .'/assets/js/jquery.gmaps.min.js', 'jquery', '0.4', true );
	wp_register_script( 'backstretch', get_template_directory_uri() .'/assets/js/jquery.backstretch.min.js', 'jquery', '2.0', true );
	wp_register_script( 'clingify', get_template_directory_uri() .'/assets/js/jquery.clingify.min.js', 'jquery', '1.0', true );
	wp_register_script( 'fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', 'jquery', '1.0', true );
	wp_register_script( 'flexslider', get_template_directory_uri() .'/assets/js/jquery.flexslider.min.js', 'jquery', '2.1', true );
	wp_register_script( 'form', get_template_directory_uri() .'/assets/js/jquery.form.min.js', 'jquery', '3.1', true );
	wp_register_script( 'validate', get_template_directory_uri() .'/assets/js/jquery.validate.min.js', 'jquery', '1.9', true );
	wp_register_script( 'isotope', get_template_directory_uri() .'/assets/js/jquery.isotope.min.js', 'jquery', '1.5', true );
	wp_register_script( 'quote-rotator', get_template_directory_uri() .'/assets/js/jquery.quote.rotator.min.js', 'jquery', '1.0', true );
	wp_register_script( 'superfish', get_template_directory_uri() .'/assets/js/superfish.min.js', 'jquery', '1.0', true );
	wp_register_script( 'hover-intent', get_template_directory_uri() .'/assets/js/hoverIntent.min.js', 'jquery', '1.0', true );
	wp_register_script( 'twitter-fetcher', get_template_directory_uri() .'/assets/js/twitterfetcher.min.js', 'jquery', '10.0', true );
	wp_register_script( 'fokus', get_template_directory_uri() .'/assets/js/fokus.min.js', false, '0.5', true );
	wp_register_script( 'selectnav', get_template_directory_uri() .'/assets/js/selectnav.min.js', false, '1.0', true );
	wp_register_script( 'custom-js', get_template_directory_uri() .'/assets/js/custom.js', 'jquery', '1.0', true );
  	
  // Register Styles
  	wp_register_style( 'superfish', get_template_directory_uri() .'/assets/css/superfish.css' );
  	wp_register_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css' );
  	wp_register_style( 'flexslider', get_template_directory_uri() .'/assets/css/flexslider.css' );
  	wp_register_style( 'woocommerce', get_template_directory_uri() .'/assets/css/woocommerce.css' );
  	wp_register_style( 'style', get_stylesheet_directory_uri() .'/style.css' );
	if ( !is_admin() && isset($GLOBALS['cabana_wp']['custom-css']) && !empty($GLOBALS['cabana_wp']['custom-css']) ) {
        wp_add_inline_style( 'style', $GLOBALS['cabana_wp']['custom-css'] );
    }
	
  // Enqueue Scripts (Global)
  	wp_enqueue_script( 'modernizr' );
  	wp_enqueue_script( 'google-maps-api' );
  	wp_enqueue_script( 'gmaps' );
  	wp_enqueue_script( 'backstretch' );
  	wp_enqueue_script( 'clingify' );
  	wp_enqueue_script( 'fitvids' );
  	wp_enqueue_script( 'flexslider' );
  	wp_enqueue_script( 'form' );
  	wp_enqueue_script( 'validate' );
  	wp_enqueue_script( 'isotope' );
  	wp_enqueue_script( 'quote-rotator' );
  	wp_enqueue_script( 'superfish' );
  	wp_enqueue_script( 'hover-intent' );
  	wp_enqueue_script( 'twitter-fetcher' );
  	wp_enqueue_script( 'fokus' );
  	wp_enqueue_script( 'selectnav' );
	wp_enqueue_script( 'custom-js' );
	
  // Enqueue Styles (Global)	
  	wp_enqueue_style( 'superfish' );
  	wp_enqueue_style( 'font-awesome' );
  	wp_enqueue_style( 'flexslider' );
  	wp_enqueue_style( 'woocommerce' );
	wp_enqueue_style( 'style' );
	} 
}
add_action( 'wp_enqueue_scripts', 'gt_queue_assets' );

// Load Admin assets 
function gt_admin_scripts() {
	wp_register_script( 'gt-admin-js', get_template_directory_uri() . '/assets/js/jquery.custom.admin.js' );
    wp_enqueue_script( 'gt-admin-js' );
    wp_register_style( 'gt-admin-css', get_template_directory_uri() . '/assets/css/custom-admin.css' );
    wp_enqueue_style( 'gt-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'gt_admin_scripts' );

// Load custom CSS for Redux panel
function gt_redux_add_css() {
    wp_register_style(
        'redux-custom-css',
        get_template_directory_uri() . '/assets/css/redux-custom.css',
        array( 'redux-css' ),
        time(),
        'all'
    );  
    wp_enqueue_style( 'redux-custom-css' );
}
add_action( 'redux/page/cabana_wp/enqueue', 'gt_redux_add_css' );

// Load custom scripts for slideshow & twitter feed (via wp_localize_script)
function gt_custom_scripts() {

	global $cabana_wp;
	$site_parameters = array(
	    'twitterID' => $cabana_wp['divider-twitter-id'],
	    'slideshow_image_one' => $cabana_wp['header-slideshow-image-one']['url'],
	    'slideshow_image_two' => $cabana_wp['header-slideshow-image-two']['url'],
	    'slideshow_image_three' => $cabana_wp['header-slideshow-image-three']['url'],
	    'slideshow_image_four' => $cabana_wp['header-slideshow-image-four']['url']
	    );
 
    wp_register_script( 'custom-scripts', get_template_directory_uri() .'/assets/js/custom-scripts.js', 'jquery', '1.0', true );
    wp_enqueue_script( 'custom-scripts' );
    wp_localize_script( 'custom-scripts', 'SiteParameters', $site_parameters );
}
add_action( 'wp_enqueue_scripts', 'gt_custom_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Custom Body Class for Templates
/*-----------------------------------------------------------------------------------*/

add_filter( 'body_class', 'gt_template_body_class' );
function gt_template_body_class( $classes ) {
	if ( is_page_template( 'page-templates/template-agency-default.php' ) )
		$classes[] = 'agency-default';
	if ( is_page_template( 'page-templates/template-agency-alt.php' ) )
		$classes[] = 'agency-alt';
	if ( is_page_template( 'page-templates/template-one-page-team.php' ) )
		$classes[] = 'one-page-team';
	if ( is_page_template( 'page-templates/template-one-page-personal.php' ) )
		$classes[] = 'one-page-personal';
	if ( is_page_template( 'page-templates/template-portfolio-showcase.php' ) )
		$classes[] = 'portfolio-showcase';
	if ( is_page_template( 'page-templates/template-blog-style.php' ) )
		$classes[] = 'blog-style';
	if ( is_page_template( 'page-templates/template-contact.php' ) )
		$classes[] = 'contact';
     return $classes;
}

/*-----------------------------------------------------------------------------------*/
/* Enable Threaded Comments
/*-----------------------------------------------------------------------------------*/

function gt_enable_threaded_comments() {
    if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
       wp_enqueue_script('comment-reply');
    }
}
add_action( 'get_header', 'gt_enable_threaded_comments' );

/*-----------------------------------------------------------------------------------*/
/* Conditionally Enqueue Script for IE browsers less than IE9
/*-----------------------------------------------------------------------------------*/

function gt_enqueue_lt_ie9() {
    global $is_IE;
 
    // Return early, if not IE
    if ( ! $is_IE ) return;
 
    // Include the file, if needed
    if ( ! function_exists( 'wp_check_browser_version' ) )
        include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );
 
    // IE version conditional enqueue
    $response = wp_check_browser_version();
    if ( 0 > version_compare( intval( $response['version'] ) , 9 ) )
        wp_enqueue_script( 'wps-html5shiv', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), 'pre3.6', false );
}
add_action( 'wp_enqueue_scripts', 'gt_enqueue_lt_ie9' );

/*-----------------------------------------------------------------------------------*/
/* Register Navigation Menus
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'register_nav_menus' ) ) :
	register_nav_menus( array(
		  'Multi Header' => __( 'Multi-Page Header', 'cabana' ),
		  'One Header' => __( 'One Page Header', 'cabana' )
		));
endif;

/*-----------------------------------------------------------------------------------*/
/* Configure Thumbnails
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 300, true ); // Normal post thumbnails
	add_image_size( 'large', 632, 290, true ); // Large thumbnails
	add_image_size( 'small', 125, '', true ); // Small thumbnails
	add_image_size( 'team-member-thumb', 600, 600, true ); // News Thumbnail (appears on the homepage)
	add_image_size( 'news-thumb', 600, 600, true ); // News Thumbnail (appears on the homepage)
	add_image_size( 'portfolio-thumb', 600, 600, true ); // Portfolio Thumbnail (appears on the homepage)
	add_image_size( 'news-large', 980, 600, true ); // Large Post Thumbnail (appears on single post and archive pages)
}

/*-----------------------------------------------------------------------------------*/
/* Register Sidebars
/*-----------------------------------------------------------------------------------*/

function gt_widgets_init() {
	register_sidebar( array(
	  'name' => 'Blog Sidebar',
	  'id' => 'sidebar-blog',
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget' => "</div>",
	  'before_title' => '<header><h4 class="widget-title">',
	  'after_title' => '</h4></header>',
	) );
  	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'sidebar-page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<header><h4 class="widget-title">',
		'after_title' => '</h4></header>',
	) );
	register_sidebar( array(
		'name' => 'Shop Sidebar',
		'id' => 'sidebar-shop',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<header><h4 class="widget-title">',
		'after_title' => '</h4></header>',
	) );
}
add_action( 'init', 'gt_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/* Custom function for the Comments
/*-----------------------------------------------------------------------------------*/

function gt_comments( $comment, $args, $depth ) {
	$GLOBALS[ 'comment' ] = $comment;
?>
	<li class="comment">
	
		<div>
			
		<?php echo get_avatar( $comment, $size = '80' ); ?>
		    
		    <div class="comment-meta">
		        <h5 class="author"><a href="<?php comment_author_url(); ?>" target="about_blank"><?php comment_author(); ?></a></h5>
		        <p class="date"><?php _e( 'commented on', 'cabana' ); ?> <span><?php printf(__( '%1$s at %2$s', 'cabana' ), get_comment_date(),  get_comment_time()) ?></span></p>
		    </div>
		    
		    <div class="comment-entry">
		    <?php comment_text() ?>
		    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ] ) ) ) ?>
		    </div>
		
		</div>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-moderate"><?php _e( 'Your comment is awaiting moderation.', 'cabana' ) ?></em>
			<br />
		<?php endif; ?>
		
		<?php edit_comment_link( __( '(Edit)', 'cabana' ),'  ','' ) ?>
		
<?php
}

/*-----------------------------------------------------------------------------------*/
/* Custom function for the Comment Form
/*-----------------------------------------------------------------------------------*/

add_filter( 'comment_form_defaults', 'gt_comment_form' );

function gt_comment_form( $form_options ) {

    // Fields Array
    $fields = array(

	    'author' =>
	    '<p class="comment-form-author">' .
	    '<input id="author" name="author" type="text" size="30" placeholder="' . __( 'Your Name (required)', 'cabana' ) . '" />' .
	    '</p>',
	
	    'email' =>
	    '<p class="comment-form-email">' .
	    '<input id="email" name="email" type="text" size="30" placeholder="' . __( 'Your Email (will not be published)', 'cabana' ) . '" />' .
	    '</p>',
	
	    'url' =>
	    '<p class="comment-form-url">'  .
	    '<input name="url" size="30" id="url" type="text" placeholder="' . __( 'Your Website (optional)', 'cabana' ) . '" />' .
	    '</p>',

    );

    // Form Options Array
    $form_options = array(
        // Include Fields Array
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),

        // Template Options
        'comment_field' =>
        '<p class="comment-form-comment">' .
        '<textarea name="comment" id="comment" aria-required="true" rows="8" cols="45" placeholder="' . __( 'Please leave your comment...', 'cabana' ) . '"></textarea>' .
        '</p>',

        'must_log_in' =>
        '<p class="must-log-in">' .
        sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'cabana' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) .
        '</p>',

        'logged_in_as' =>
        '<p class="logged-in-as">' .
        sprintf( __( 'You are currently logged in<a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'cabana' ),
            admin_url( 'profile.php' ), (isset( $user_identity )), wp_logout_url( apply_filters('the_permalink', get_permalink() ) ) ) .
        '</p>',

        'comment_notes_before' => '',

        'comment_notes_after' => '',

        // Rest of Options
        'id_form' => 'form-comment',
        'id_submit' => 'submit',
        'title_reply' => __( 'We would love to hear your comments', 'cabana' ),
        'title_reply_to' => __( 'Leave a Reply to %s', 'cabana' ),
        'cancel_reply_link' => __( 'Cancel reply', 'cabana' ),
        'label_submit' => __( 'Post Comment', 'cabana' ),
    );

    return $form_options;
}

/*-----------------------------------------------------------------------------------*/
/* Custom Navigation for Single Posts
/*-----------------------------------------------------------------------------------*/

if (! function_exists( 'gt_content_nav' )):
/**
 * Display navigation to next/previous pages when applicable
 */
function gt_content_nav( $nav_id ) {
global $wp_query;

?>

<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
	<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x('<', 'Previous post link', 'cabana') . '</span> %title' ); ?>
	<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x('>', 'Next post link', 'cabana') . '</span>' ); ?>
</ul>

<?php endif; ?>

<?php
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Numbered Post Navigation (for Post Index, Archives, and Search Results)
/*-----------------------------------------------------------------------------------*/

function wp_pagenavi() {
  
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if ( !$current = get_query_var( 'paged' ) ) $current = 1;
  $args['base'] = str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) );
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '< Prev';
  $args['next_text'] = 'Next >';
 
  if ( $max > 1 ) echo '</pre>
    <div class="pagination">';
 echo $pages . paginate_links( $args );
 if ( $max > 1 ) echo '</div>';

}

/*-----------------------------------------------------------------------------------*/
/* Custom function for the Excerpt
/*-----------------------------------------------------------------------------------*/

function gt_custom_trim_excerpt( $text ) {
    global $post;
    if ( '' == $text ) {
        $text = get_the_content( '' );
        $text = apply_filters( 'the_content', $text );
        $text = str_replace( '\]\]\>', ']]&gt;', $text );
        $text = preg_replace( '@<script[^>]*?>.*?</script>@si', '', $text );
        $text = strip_tags( $text, '<p>,<a>,<em>,<blockquote>,<iframe>' );
        $excerpt_length = 20;
        $words = explode( ' ', $text, $excerpt_length + 1 );
        if ( count( $words ) > $excerpt_length ) {
            array_pop( $words );
            array_push( $words, '...' );
            $text = implode( ' ', $words );
        }
    }
    return $text;
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'gt_custom_trim_excerpt' );

/*-----------------------------------------------------------------------------------*/
/* Add custom fields to Author Bio
/*-----------------------------------------------------------------------------------*/

function gt_add_to_author_profile( $contactmethods ) {
	
	$contactmethods['rss_url'] = 'RSS URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	$contactmethods['pinterest_profile'] = 'Pinterest Profile URL';
	$contactmethods['dribbble_profile'] = 'Dribbble Profile URL';
	$contactmethods['flickr_profile'] = 'Flickr Profile URL';
	$contactmethods['instagram_profile'] = 'Instagram Profile URL';
	$contactmethods['vimeo_profile'] = 'Vimeo Profile URL';
	$contactmethods['youtube_profile'] = 'YouTube Profile URL';
	
	return $contactmethods;
}

add_filter( 'user_contactmethods', 'gt_add_to_author_profile', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/* Custom Search Filter For Blog (Returns only Posts)
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'gt_remove_from_search' ) ) {
	function gt_remove_from_search() {
	    global $wp_post_types;
	    $wp_post_types['page']->exclude_from_search = true;
	}
	add_action( 'init', 'gt_remove_from_search' );
}

/*-----------------------------------------------------------------------------------*/
/* TGM Plugin Activation
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/functions/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'gt_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function gt_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     				=> 'GT Custom Post Types', // The plugin name
			'slug'     				=> 'gt-cpt', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/plugins/gt-cpt.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'GT Shortcodes', // The plugin name
			'slug'     				=> 'gt-shortcodes', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/plugins/gt-shortcodes.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Really Simple Twitter Feed Widget', // The plugin name
			'slug'     				=> 'really-simple-twitter-feed-widget', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/plugins/really-simple-twitter-feed-widget.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.5.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Recent Posts Extended', // The plugin name
			'slug'     				=> 'recent-posts-widget-extended', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/plugins/recent-posts-widget-extended.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '0.9.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'cabana';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/*-----------------------------------------------------------------------------------*/
/* Enable Font Awesome Shortcodes
/*-----------------------------------------------------------------------------------*/

class FontAwesome {
    public function __construct() {
        add_action( 'init', array( &$this, 'init' ) );
    }

    public function init() {
        add_shortcode( 'icon', array( $this, 'setup_shortcode' ) );
        add_filter( 'widget_text', 'do_shortcode' );
    }

    public function setup_shortcode( $params ) {
        extract( shortcode_atts( array(
                    'name'  => 'fa-wrench'
                ), $params ) );
        $icon = '<i class="fa '.$params['name'].'"></i>';

        return $icon;
    }

}

new FontAwesome();

/*-----------------------------------------------------------------------------------*/
/* Register Custom Taxonomy for Portfolio
/*-----------------------------------------------------------------------------------*/

register_taxonomy( 
    'project-type', 
        array( 'portfolio' ),
        array( 'hierarchical' => true, 
        'label' => 'Project Type',
        'singular_label' => 'Project Type', 
        'rewrite' => true ) 
        );
        
/*-----------------------------------------------------------------------------------*/
/* Output Static Image (Portfolio Project)
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'gt_image' ) ) {
    function gt_image( $postid, $imagesize ) {
        // get the featured image for the post
        $thumbid = 0;
        if( has_post_thumbnail( $postid ) ) {
            $thumbid = get_post_thumbnail_id( $postid );
        }
        
        $image_ids_raw = get_post_meta( $postid, 'gt_image_ids', true );

        if( $image_ids_raw ) {
            // Using WP3.5; use post__in orderby option
            $image_ids = explode( ',', $image_ids_raw );
            $temp_id = $postid;
            $postid = null;
            $orderby = 'post__in';
            $include = $image_ids;
        } else {
            $orderby = 'menu_order';
            $include = '';
        }
    
        // get first 10 attachments for the post
        $args = array(
            'include' => $include,
            'orderby' => $orderby,
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => 10
        );
        $attachments = get_posts( $args );

        $postid = ( isset( $temp_id ) ) ? $temp_id : $postid;

        if( !empty( $attachments ) ) {
            foreach( $attachments as $attachment ) {
                // if current image is featured image reloop
                if( $attachment->ID == $thumbid ) continue; 
                $full = wp_get_attachment_image_src( $attachment->ID, 'full', false, false );  
                $large = wp_get_attachment_image_src( $attachment->ID, 'feature-image', false, false );
                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                $title = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                echo "<div class='portfolio-thumbs'>";
                echo '<img src="'.$full[0].'" alt="'.$alt.'" />';
                echo "</div>";
            }
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/* Output Slideshow (Portfolio Project)
/*-----------------------------------------------------------------------------------*/

function gt_gallery( $postid, $imagesize ) { ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery(".slider").flexslider({
                preload: true,
                preloadImage: jQuery(".flexslider-<?php echo $postid; ?>").attr('data-loader')
            });
        });
    </script>
    <?php 
        $loader = 'loader.gif';
        $thumbid = 0;
    
        // get the featured image for the post
        if( has_post_thumbnail( $postid ) ) {
            $thumbid = get_post_thumbnail_id( $postid );
        }
        echo "<!-- BEGIN #slider-$postid -->\n<div class='flexslider' data-loader='" . get_template_directory_uri() . "/assets/img/$loader'>";
        
        $image_ids_raw = get_post_meta( $postid, 'gt_image_ids', true );

        if( $image_ids_raw ) {
            // Using WP3.5; use post__in orderby option
            $image_ids = explode( ',', $image_ids_raw );
            $temp_id = $postid;
            $postid = null;
            $orderby = 'post__in';
            $include = $image_ids;
        } else {
            $orderby = 'menu_order';
            $include = '';
        }

        // get all of the attachments for the post
        $args = array(
            'include' => $include,
            'orderby' => $orderby,
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => -1
        );
        $attachments = get_posts($args);
        
        if( !empty( $attachments ) ) {
            echo '<ul class="slides">';
            $i = 0;
            foreach( $attachments as $attachment ) {
                if( $attachment->ID == $thumbid ) continue;
                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                $full = wp_get_attachment_image_src( $attachment->ID, 'full', false, false );
                $large = wp_get_attachment_image_src( $attachment->ID, 'feature-image', false, false );
                $caption = $attachment->post_excerpt;
                $caption = ($caption) ? "<div class='slider-desc'>$caption</div>" : '';
                $alt = ( !empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
                echo "<li>$caption<img height='$src[2]' width='$src[1]' src='$full[0]' alt='$alt' /></li>";
                $i++;
            }
            echo '</ul>';
        }
        echo '</div>';
    }

/*-----------------------------------------------------------------------------------*/
/* Remove stray p, and br tags from GT Shortcodes Plugin
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_content', 'gt_clean_shortcodes' );
 
function gt_clean_shortcodes( $content ) {
 
	// array of custom shortcodes requiring the fix 
	$block = join( '|',array( 'skillbar','piechart','blockquote','accordion','tabgroup','pricing','styled_paragraph' ) );
 
	// opening tag
	$rep = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content );
		
	// closing tag
	$rep = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep );
 
	return $rep;
 
}



/*-----------------------------------------------------------------------------------*/
/* Add contact form 7 Indian phone number validation
/*-----------------------------------------------------------------------------------*/


add_filter( 'wpcf7_is_tel', 'custom_tel_validation' , 10, 2 );
function custom_tel_validation($res, $tel) {
	$result = preg_match("/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/i", $tel );
	return $result;
}


/*-----------------------------------------------------------------------------------*/
/* Alter column count for WooCommerce Related Products
/*-----------------------------------------------------------------------------------*/

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'child_after_single_product_summary', 20 );
 
function child_after_single_product_summary() {
  woocommerce_related_products( 3, 3 );
}
    
/*-----------------------------------------------------------------------------------*/
/* Fixes WC3 Validation WordPress bug!!!!
/*-----------------------------------------------------------------------------------*/
 
function gt_replace_cat_tag ( $text ) {
$text = str_replace( 'rel="category tag"', "", $text ); return $text;
}
add_filter( 'the_category', 'gt_replace_cat_tag' );


/* functions by Deep Red Ink */
register_sidebar( array(
'name' => 'Footer Widget Space 1',
'id' => 'footer-widget-1',
'description' => 'Appears in the footer area',
'before_widget' => '<div id="%1$s" class="inbound-grid widget myclass %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Widget Space 2',
'id' => 'footer-widget-2',
'description' => 'Appears in the footer area',
'before_widget' => '<div id="%1$s" class="inbound-grid widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Widget Space 3',
'id' => 'footer-widget-3',
'description' => 'Appears in the footer area',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

/*Code for Google Conversion Tracking Pixels - Added by Deep Red Ink */
if(is_page('thank-you-blasting-mats')) {
?>
<!-- Google Code for Products-Blasting-Mats Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "MPIyCMmjkGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=MPIyCMmjkGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }
if(is_page('thank-you-seismograph')) { ?>
<!-- Google Code for Products-Seismograph Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "zmv2COCjpGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=zmv2COCjpGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<?php }
if(is_page('thank-you-vod')) { ?>
<!-- Google Code for Products-VOD-Meter Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "2qfVCIWkkGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=2qfVCIWkkGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }
if(is_page('thank-you-footer')) { ?>
<!-- Google Code for Got-A-Question-Footer-Form Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "29TfCL2gkGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=29TfCL2gkGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }
if(is_page('thank-you-write-to-us')) { ?>
<!-- Google Code for Write-To-Us-Home-Page Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "-jcrCKDZqWsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=-jcrCKDZqWsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }
if(is_page('thank-you-employment')) { ?>
<!-- Google Code for Opportunities-Employment Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "ooxmCMWikGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=ooxmCMWikGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<?php }
if(is_page('thank-you-consultants')) { ?>
<!-- Google Code for Opportunities-Consultants Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "nODbCO-mpGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=nODbCO-mpGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }
if(is_page('thank-you-subcontractors')) { ?>
<!-- Google Code for Opportunities-Sub-Contractors Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "iRM4CL-lkGsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=iRM4CL-lkGsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }
if(is_page('thank-you')) { ?>
<!-- Google Code for Contact-Form Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "1iGNCK7eqWsQuOTy7QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1035776568/?label=1iGNCK7eqWsQuOTy7QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }