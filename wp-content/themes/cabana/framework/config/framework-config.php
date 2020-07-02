<?php
if (!function_exists('redux_init')) :
	function redux_init() {

	$args = array();

	// For use with a tab example below
	$tabs = array();

	ob_start();

	$ct = wp_get_theme();
	$theme_data = $ct;
	$item_name = $theme_data->get('Name'); 
	$tags = $ct->Tags;
	$screenshot = $ct->get_screenshot();
	$class = $screenshot ? 'has-screenshot' : '';

	$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','cabana' ), $ct->display('Name') );

	?>
	<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
		<?php if ( $screenshot ) : ?>
			<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
			<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
				<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
			</a>
			<?php endif; ?>
			<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		<?php endif; ?>

		<h4>
			<?php echo $ct->display('Name'); ?>
		</h4>

		<div>
			<ul class="theme-info">
				<li><?php printf( __('By %s','cabana'), $ct->display('Author') ); ?></li>
				<li><?php printf( __('Version %s','cabana'), $ct->display('Version') ); ?></li>
				<li><?php echo '<strong>'.__('Tags', 'cabana').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
			</ul>
			<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
			<?php if ( $ct->parent() ) {
				printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
					__( 'http://codex.wordpress.org/Child_Themes','cabana' ),
					$ct->parent()->display( 'Name' ) );
			} ?>
			
		</div>

	</div>

	<?php
	$item_info = ob_get_contents();
	    
	ob_end_clean();

	$sampleHTML = '';
	if( file_exists( dirname(__FILE__).'/info-html.html' )) {
		/** @global WP_Filesystem_Direct $wp_filesystem  */
		global $wp_filesystem;
		if (empty($wp_filesystem)) {
			require_once(ABSPATH .'/wp-admin/includes/file.php');
			WP_Filesystem();
		}  		
		$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
	}

	// BEGIN Sample Config

	// Setting dev mode to true allows you to view the class settings/info in the panel.
	// Default: true
	$args['dev_mode'] = false;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['dev_mode_icon_class'] = '';

	// Set a custom option name. Don't forget to replace spaces with underscores!
	$args['opt_name'] = 'cabana_wp';

	// Setting system info to true allows you to view info useful for debugging.
	// Default: false
	//$args['system_info'] = true;


	// Set the icon for the system info tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['system_info_icon'] = 'info-sign';

	// Set the class for the system info tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['system_info_icon_class'] = 'icon-large';

	$theme = wp_get_theme();

	$args['display_name'] = $theme->get('Name');
	//$args['database'] = "theme_mods_expanded";
	$args['display_version'] = $theme->get('Version');

	// If you want to use Google Webfonts, you MUST define the api key.
	$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

	// Define the starting tab for the option panel.
	// Default: '0';
	//$args['last_tab'] = '0';

	// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
	// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
	// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
	// Default: 'standard'
	//$args['admin_stylesheet'] = 'standard';

	// Setup custom links in the footer for share icons
	/*$args['share_icons']['twitter'] = array(
	    'link' => 'http://twitter.com/ghost1227',
	    'title' => 'Follow me on Twitter', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
	);
	$args['share_icons']['linked_in'] = array(
	    'link' => 'http://www.linkedin.com/profile/view?id=52559281',
	    'title' => 'Find me on LinkedIn', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
	);*/

	// Enable the import/export feature.
	// Default: true
	//$args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['import_icon_class'] = '';

	/**
	 * Set default icon class for all sections and tabs
	 * @since 3.0.9
	 */
	//$args['default_icon_class'] = '';


	// Set a custom menu icon.
	//$args['menu_icon'] = '';

	// Set a custom title for the options page.
	// Default: Options
	$args['menu_title'] = __('Options', 'cabana');

	// Set a custom page title for the options page.
	// Default: Options
	$args['page_title'] = __('Options', 'cabana');

	// Set a custom page slug for options page (wp-admin/themes.php?page=***).
	// Default: redux_options
	$args['page_slug'] = 'redux_options';

	$args['default_show'] = true;
	$args['default_mark'] = '*';

	// Set a custom page capability.
	// Default: manage_options
	//$args['page_cap'] = 'manage_options';

	// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
	// Default: menu
	//$args['page_type'] = 'submenu';

	// Set the parent menu.
	// Default: themes.php
	// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	//$args['page_parent'] = 'options-general.php';

	// Set a custom page location. This allows you to place your menu where you want in the menu order.
	// Must be unique or it will override other items!
	// Default: null
	//$args['page_position'] = null;

	// Set a custom page icon class (used to override the page icon next to heading)
	//$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';

	// Disable the panel sections showing as submenu items.
	// Default: true
	//$args['allow_sub_menu'] = false;
	    
	// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-1',
	    'title' => __('Theme Information 1', 'cabana'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'cabana')
	);
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-2',
	    'title' => __('Theme Information 2', 'cabana'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'cabana')
	);

	// Set the help sidebar for the options page.                                        
	$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'cabana');


	// Add HTML before the form.
	if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
		if (!empty($args['global_variable'])) {
			$v = $args['global_variable'];
		} else {
			$v = str_replace("-", "_", $args['opt_name']);
		}
		$args['intro_text'] = sprintf( __('<p>Welcome to the Theme Options panel. If you require further assistance please refer to the help documentation supplied with the theme.</p>', 'cabana' ), $v );
	} else {
		$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'cabana');
	}

	// Add content after the form.
	//$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'cabana');

	// Set footer/credit line.
	//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'cabana');


	$sections = array();              

	//Background Patterns Reader
	$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
	$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) :
		
	  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
	  	$sample_patterns = array();

	    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

	      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
	      	$name = explode(".", $sample_patterns_file);
	      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
	      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
	      }
	    }
	  endif;
	endif;


	$sections[] = array(
		'title' => __( 'Homepage', 'cabana' ),
		'icon' => 'el-icon-home',
		'fields' => array(
				
			array(
		        'id'=>'multi-one-page-chooser',
		        'type'=> 'button_set',
		        'title' => __( 'Multi Page or One Page', 'cabana' ),
		        'subtitle'=> __( 'Choose if you are either using the theme as Multi Page or One Page.<br /><br /><strong>Note: This sets certain options dynamically in the theme for you.</strong>', 'cabana' ),

		        'options'  => array(
		            '1' => 'Multi Page',
		            '2' => 'One Page'
		        ), 
		        'default'  => '1',
			),
		
			array(
			    'id'=> 'home-options-select',
			    'type'=> 'select',
			    'title'=> __( 'Homepage Template Select', 'cabana' ), 
			    'subtitle'=> __( 'Choose the template, which is currently set for your homepage.<br /><br /><strong>Note: If you are using the Blog Style template you ONLY need to fill in the About section below.</strong><br /><br /><strong>Note: If you are using the Portfolio Showcase template you ONLY need to choose the Portfolio items Select field below.</strong>', 'cabana' ),
			    'options'=> array(
			        '1' => 'Homepage (Agency Default)',
			        '2' => 'Homepage (Agency Alternative)',
			        '3' => 'One Page (Team)',
			        '4' => 'One Page (Personal)'
			    ),
			    'default'  => '1',
			),

			array(
			    "id" => "homepage-blocks",
			    "type" => "sorter",
			    'title' => __( 'Layout Manager', 'cabana' ), 
			    'subtitle' => __( 'Organize how you would like the layout to appear on your homepage.<br /><br /><strong>You can drag & drop sections, and remove them completely if required.</strong>', 'cabana' ),
			    'options' => array(
			        "enabled" => array(
			            "placebo" => "placebo", //REQUIRED!
			            "about-block" => "About",
			            "work-block" => "Work",
			            "quotes-block-top" => "Quotes Top",
			            "services-block" => "Services",
			            "tweet-block" => "Latest Tweet",
			            "team-block" => "Team/About Me",
			            "quotes-block-bottom" => "Quotes Bottom",
			            "news-block" => "News",
			            "contact-block" => "Contact"
			        ),
			        "disabled" => array(
			            "placebo" => "placebo", //REQUIRED!
			        ),
			    ),
			),
			
			array(
                'id'=>'section-about-start',
                'type' => 'section',
                'title' => __( 'About Section', 'cabana' ),                          
                'indent' => true // Indent all options below until the next 'section' option is set.
                ),
            array(
            	'id'=>'about-icon',
            	'type' => 'text',
            	'title' => __( 'About Icon', 'cabana' ), 
            	'subtitle' => __( 'Please add an icon to appear above your title. eg; [icon name=fa-heart]<br/><br />All list of available icons can be found <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">here</a>.', 'cabana' ),
            	'default'  => '[icon name=fa-heart]'
            	),	    
			array(
				'id'=>'about-title',
				'type' => 'text',
				'title' => __( 'About Title', 'cabana' ), 
				'subtitle' => __( 'Please enter a title for the about section.<br />eg; So who are Cabana.', 'cabana' ),
				'default'  => 'Section Title'
				),
			array(
		        'id'=> 'about-introduction',
		        'type'=> 'editor',
		        'title'=> __( 'About Introduction', 'cabana' ), 
		        'subtitle' => __( 'Please enter a short overview to appear in the about section.', 'cabana' ),
		        'default'=> '<p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing.</p><p>Holistically pontificate installed base portals after maintainable products are produced and shared leading to fantastic results.</p>',
		        'editor_options'=> array(
		            'teeny'=> true,
		            'textarea_rows'=> 10,
		            'wpautop'=> false,
		            'media_buttons'=> false,
		        	)
			    ),
			array(
				'id'=>'about-button-copy',
				'type' => 'text',
				'title' => __( 'About Button Text', 'cabana' ), 
				'subtitle' => __( 'Please enter text for your about button.<br />eg; View our work.', 'cabana' ),
				'default' => 'Button text',
				),
			array(
				'id'=>'about-button-url-select',
				'type' => 'select',
				'data' => 'pages',
				'title' => __( 'About Button URL', 'cabana' ), 
				'subtitle' => __( 'Please choose a page for your about button to link to.<br />eg; About Us', 'cabana' ),
				'placeholder' => 'Choose a Page',
				),
			array(
                'id'=>'section-about-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
                ),
                
            array(
                'id'=>'section-work-start',
                'type' => 'section',
                'title' => __( 'Work Section', 'cabana' ),                          
                'indent' => true // Indent all options below until the next 'section' option is set.
                ),
            array(
            	'id'=>'work-icon',
            	'type' => 'text',
            	'title' => __( 'Work Icon', 'cabana' ), 
            	'subtitle' => __( 'Please add an icon to appear above your title. eg; [icon name=fa-heart]<br/><br />All list of available icons can be found <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">here</a>.', 'cabana' ),
            	'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
            	'default'  => '[icon name=fa-heart]'
            	),
			array(
				'id'=>'work-navigation-visibility',
				'type' => 'switch',
				'title' => __( 'Portfolio Navigation Visibility', 'cabana' ),
				'subtitle'=> __( 'Choose to show the portfolio navigation in the work section.<br /><br />Default: Enabled.', 'cabana' ),
				'default'  => true,
				'on' => 'Enabled',
				'off' => 'Disabled',
				),
			array(
				'id'=>'work-title',
				'type' => 'text',
				'title' => __( 'Work Title', 'cabana' ), 
				'subtitle' => __( 'Please enter a title for your work section.<br /><br />eg; Work.', 'cabana' ),
				'default'  => 'Title'
				),
			array(
				'id'=>'work-subtitle',
				'type' => 'text',
				'title' => __( 'Work Subtitle', 'cabana' ), 
				'subtitle' => __( 'Please enter a subtitle for your work section.<br /><br />eg; Some we prepared earlier.', 'cabana' ),
				'required' => array('home-options-select', '=' , '1' ),
				'default'  => 'This is a subtitle'
				),
			array(
			    'id'=> 'work-introduction',
			    'type'=> 'editor',
			    'title'=> __( 'Work Introduction', 'cabana' ), 
			    'subtitle' => __( 'Please enter a short overview to appear in the work section.', 'cabana' ),
			    'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
			    'default'=> '<p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing.</p><p>Holistically pontificate installed base portals after maintainable products are produced and shared leading to fantastic results.</p>',
			    'editor_options'=> array(
			        'teeny'=> true,
			        'textarea_rows'=> 10,
			        'wpautop'=> false,
			        'media_buttons'=> false,
			    	)
			    ),
			array(
				'id'=>'work-button-text',
				'type' => 'text',
				'title' => __( 'Work Button Text', 'cabana' ), 
				'subtitle' => __( 'Please enter text for your work button.<br /><br />eg; See all work.', 'cabana' ),
				'default'  => 'Button Text'
				),
			array(
				'id'=>'work-button-url-select',
				'type' => 'select',
				'data' => 'pages',
				'title' => __( 'Work Button URL', 'cabana' ), 
				'subtitle' => __( 'Please choose a page for your work button to link to.<br />eg; Portfolio', 'cabana' ),
				'placeholder' => 'Choose a Page',
				),
			array(
		        'id'       => 'work-items-select',
		        'type'     => 'select',
		        'title'    => __( 'Portfolio items Select', 'cabana' ), 
		        'subtitle' => __( 'Please choose how many portfolio items you would like to show in the work section.<br /><br />Default: 5.', 'cabana' ),
		        'required' => array('home-options-select', '=' , array( 1,2,3,4 ) ),
		        'options'  => array(
		            '1' => '1 item',
		            '2' => '2 items',
		            '3' => '3 items',
		            '4' => '4 items',
		            '5' => '5 items',
		            '6' => '6 items',
		            '7' => '7 items',
		            '8' => '8 items',
		            '9' => '9 items',
		            '10' => '10 items',
		            '11' => '11 items',
		            '12' => '12 items',
		            '13' => '13 items',
		            '14' => '14 items',
		            '15' => '15 items',
		            '16' => '16 items',
		            '17' => '17 items',
		            '18' => '18 items',
		            '19' => '19 items',
		            '20' => '20 items',
		            '21' => '21 items',
		            '22' => '22 items',
		            '23' => '23 items',
		            '24' => '24 items',
		            '25' => '25 items',
		            '26' => '26 items',
		            '27' => '27 items',
		            '28' => '28 items',
		            '29' => '29 items',
		            '30' => '30 items',
		            '31' => '31 items',
		            '32' => '32 items',
		            '33' => '33 items',
		            '34' => '34 items',
		            '35' => '35 items',
		            '36' => '36 items',
		            '37' => '37 items',
		            '38' => '38 items',
		            '39' => '39 items',
		            '40' => '40 items'
		        ),
		        'default'  => '5',
		        'placeholder' => 'Choose number of items',
		        ),
		     array(
				'id'=>'section-work-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
		        
		     array(
		         'id'=>'section-services-start',
		         'type' => 'section',
		         'title' => __( 'Services Section', 'cabana' ),                           
		         'indent' => true // Indent all options below until the next 'section' option is set.
		         ),
		     array(
		     	'id'=>'services-icon',
		     	'type' => 'text',
		     	'title' => __( 'Services Icon', 'cabana' ), 
		     	'subtitle' => __( 'Please add an icon to appear above your title. eg; [icon name=fa-heart]<br/><br />All list of available icons can be found <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">here</a>.', 'cabana' ),
		     	'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
		     	'default'  => '[icon name=fa-heart]'
		     	),
		     array(
		     	'id'=>'services-title',
		     	'type' => 'text',
		     	'title' => __( 'Services Title', 'cabana' ), 
		     	'subtitle' => __( 'Please enter a title for your services section.<br /><br />eg; Services.', 'cabana' ),
		     	'default'  => 'Title'
		     	),
		     array(
		     	'id'=>'services-subtitle',
		     	'type' => 'text',
		     	'title' => __( 'Services Subtitle', 'cabana' ), 
		     	'subtitle' => __( 'Please enter a subtitle for your services section.<br /><br />eg; This is what we provide.', 'cabana' ),
		     	'required' => array('home-options-select', '=' , '1' ),
		     	'default'  => 'This is a subtitle'
		     	),
		     array(
		         'id'=> 'services-introduction',
		         'type'=> 'editor',
		         'title'=> __( 'Services Introduction', 'cabana' ), 
		         'subtitle' => __( 'Please enter a short overview to appear in the services section.', 'cabana' ),
		         'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
		         'default'=> '<p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing.</p><p>Holistically pontificate installed base portals after maintainable products are produced and shared leading to fantastic results.</p>',
		         'editor_options'=> array(
		             'teeny'=> true,
		             'textarea_rows'=> 10,
		             'wpautop'=> false,
		             'media_buttons'=> false,
		         	)
		         ),
		     array(
		     	'id'=>'services-button-text',
		     	'type' => 'text',
		     	'title' => __( 'Services Button Text', 'cabana' ), 
		     	'subtitle' => __( 'Please enter text for your services button.<br /><br />eg; All we do.', 'cabana' ),
		     	'default'  => 'Button Text'
		     	),
		     array(
		     	'id'=>'services-button-url-select',
		     	'type' => 'select',
		     	'data' => 'pages',
		     	'title' => __( 'Services Button URL', 'cabana' ), 
		     	'subtitle' => __( 'Please choose a page for your services button to link to.<br />eg; Services', 'cabana' ),
		     	'placeholder' => 'Choose a Page',
		     	),
		     array(
				'id'       => 'service-items-select',
				'type'     => 'select',
				'title'    => __( 'Service items Select', 'cabana' ), 
				'subtitle' => __( 'Please choose how many service items you would like to show in the services section.<br /><br />Default: 5.', 'cabana' ),
				'required' => array('home-options-select', '=' , array( 1,2,3,4 ) ),
				'options'  => array(
				    '1' => '1 item',
				    '2' => '2 items',
				    '3' => '3 items',
				    '4' => '4 items',
				    '5' => '5 items',
				    '6' => '6 items',
				    '7' => '7 items',
				    '8' => '8 items',
				    '9' => '9 items',
				    '10' => '10 items',
				    '11' => '11 items',
				    '12' => '12 items',
				    '13' => '13 items',
				    '14' => '14 items',
				    '15' => '15 items',
				    '16' => '16 items',
				    '17' => '17 items',
				    '18' => '18 items',
				    '19' => '19 items',
				    '20' => '20 items'
				),
				'default'  => '5',
				'placeholder' => 'Choose number of items',
				),
		      array(
				'id'=>'section-services-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
		          
		      array(
		          'id'=>'section-team-start',
		          'type' => 'section',
		          'title' => __( 'Team / About Me Section', 'cabana' ),                           
		          'indent' => true // Indent all options below until the next 'section' option is set.
		          ),
		      array(
		      	'id'=>'team-icon',
		      	'type' => 'text',
		      	'title' => __( 'Team / About Me Icon', 'cabana' ), 
		      	'subtitle' => __( 'Please add an icon to appear above your title. eg; [icon name=fa-heart]<br/><br />All list of available icons can be found <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">here</a>.', 'cabana' ),
		      	'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
		      	'default'  => '[icon name=fa-heart]'
		      	),
		      array(
		      	'id'=>'team-title',
		      	'type' => 'text',
		      	'title' => __( 'Team / About Me Title', 'cabana' ), 
		      	'subtitle' => __( 'Please enter a title for your team section.<br /><br />eg; Team.', 'cabana' ),
		      	'default'  => 'Title'
		      	),
		      array(
		      	'id'=>'team-subtitle',
		      	'type' => 'text',
		      	'title' => __( 'Team / About Me Subtitle', 'cabana' ), 
		      	'subtitle' => __( 'Please enter a subtitle for your team section.<br /><br />eg; We\'re a funny old bunch.', 'cabana' ),
		      	'default'  => 'This is a subtitle'
		      	),
		      array(
				'id'=> 'team-introduction',
				'type'=> 'editor',
				'title'=> __( 'Team / About Me Introduction', 'cabana' ), 
				'subtitle' => __( 'Please enter a short overview to appear in the team/about me section.', 'cabana' ),
				'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
				'default'=> '<p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing.</p><p>Holistically pontificate installed base portals after maintainable products are produced and shared leading to fantastic results.</p>',
				'editor_options'=> array(
				  'teeny'=> true,
				  'textarea_rows'=> 10,
				  'wpautop'=> false,
				  'media_buttons'=> false,
					)
				),
				array(
				'id'=>'team-profile-image',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Profile Image', 'cabana' ),
				'required' => array('home-options-select', '=' , '4' )
				),
		      array(
		      	'id'=>'team-button-text',
		      	'type' => 'text',
		      	'title' => __( 'Team / About Me Button Text', 'cabana' ), 
		      	'subtitle' => __( 'Please enter text for your team button.<br /><br />eg; Meet \'em all.', 'cabana' ),
		      	'default'  => 'Button Text'
		      	),
		      array(
		      	'id'=>'team-button-url-select',
		      	'type' => 'select',
		      	'data' => 'pages',
		      	'title' => __( 'Team / About Me Button URL', 'cabana' ), 
		      	'subtitle' => __( 'Please choose a page for your team button to link to.<br />eg; Meet the team', 'cabana' ),
		      	'placeholder' => 'Choose a Page',
		      	),
		      array(
				'id'       => 'team-items-select',
				'type'     => 'select',
				'title'    => __( 'Team items Select', 'cabana' ), 
				'subtitle' => __( 'Please choose how many items you would like to show in the team section.<br /><br />Default: 5.', 'cabana' ),
				'required' => array('home-options-select', '=' , array( 1,2,3 ) ),
				'options'  => array(
				    '1' => '1 item',
				    '2' => '2 items',
				    '3' => '3 items',
				    '4' => '4 items',
				    '5' => '5 items',
				    '6' => '6 items',
				    '7' => '7 items',
				    '8' => '8 items',
				    '9' => '9 items',
				    '10' => '10 items',
				    '11' => '11 items',
				    '12' => '12 items',
				    '13' => '13 items',
				    '14' => '14 items',
				    '15' => '15 items',
				    '16' => '16 items',
				    '17' => '17 items',
				    '18' => '18 items',
				    '19' => '19 items',
				    '20' => '20 items'
				),
				'default'  => '5',
				'placeholder' => 'Choose number of items',
				),
		       array(
				'id'=>'section-team-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
			
			array(
			    'id'=>'section-news-start',
			    'type' => 'section',
			    'title' => __( 'News Section', 'cabana' ),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
				'id'=>'news-icon',
				'type' => 'text',
				'title' => __( 'News Icon', 'cabana' ), 
				'subtitle' => __( 'Please add an icon to appear above your title. eg; [icon name=fa-heart]<br/><br />All list of available icons can be found <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">here</a>.', 'cabana' ),
				'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
				'default'  => '[icon name=fa-heart]'
				),
			array(
				'id'=>'news-title',
				'type' => 'text',
				'title' => __( 'News Title', 'cabana' ), 
				'subtitle' => __( 'Please enter a title for your news section.<br /><br />eg; News.', 'cabana' ),
				'default'  => 'Title'
				),
			array(
				'id'=>'news-subtitle',
				'type' => 'text',
				'title' => __( 'News Subtitle', 'cabana' ), 
				'subtitle' => __( 'Please enter a subtitle for your news section.<br /><br />eg; What we\'ve written recently.', 'cabana' ),
				'default'  => 'This is a subtitle'
				),
			array(
				'id'=> 'news-introduction',
				'type'=> 'editor',
				'title'=> __( 'News Introduction', 'cabana' ), 
				'subtitle' => __( 'Please enter a short overview to appear in the news section.', 'cabana' ),
				'required' => array('home-options-select', '=' , array( 2,3,4 ) ),
				'default'=> '<p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing.</p><p>Holistically pontificate installed base portals after maintainable products are produced and shared leading to fantastic results.</p>',
				'editor_options'=> array(
				  'teeny'=> true,
				  'textarea_rows'=> 10,
				  'wpautop'=> false,
				  'media_buttons'=> false,
					)
				),
			array(
				'id'=>'news-button-text',
				'type' => 'text',
				'title' => __( 'News Button Text', 'cabana' ), 
				'subtitle' => __( 'Please enter text for your news button.<br /><br />eg; Read all posts.', 'cabana' ),
				'default'  => 'Button Text'
				),
			array(
				'id'=>'news-button-url-select',
				'type' => 'select',
				'data' => 'pages',
				'title' => __( 'News Button URL', 'cabana' ), 
				'subtitle' => __( 'Please choose a page for your news button to link to.<br />eg; Blog', 'cabana' ),
				'placeholder' => 'Choose a Page',
				),
			array(
				'id'       => 'news-items-select',
				'type'     => 'select',
				'title'    => __( 'News items Select', 'cabana' ), 
				'subtitle' => __( 'Please choose how many items you would like to show in the news section.<br /><br />Default: 5.', 'cabana' ),
				'options'  => array(
				    '1' => '1 item',
				    '2' => '2 items',
				    '3' => '3 items',
				    '4' => '4 items',
				    '5' => '5 items',
				    '6' => '6 items',
				    '7' => '7 items',
				    '8' => '8 items',
				    '9' => '9 items',
				    '10' => '10 items',
				    '11' => '11 items',
				    '12' => '12 items',
				    '13' => '13 items',
				    '14' => '14 items',
				    '15' => '15 items',
				    '16' => '16 items',
				    '17' => '17 items',
				    '18' => '18 items',
				    '19' => '19 items',
				    '20' => '20 items'
				),
				'default'  => '5',
				'placeholder' => 'Choose number of items',
				),
			 array(
				'id'=>'section-news-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),		
			),
	);



	$sections[] = array(
		'type' => 'divide',
	);
	
	$sections[] = array(
		'icon' => 'el-icon-font',
		'title' => __( 'Typography', 'cabana' ),
		'fields' => array(
			array(
				'id'=>'typography-logo',
				'type' => 'typography', 
				'title' => __( 'Text Logo', 'cabana' ),
				'google'=>true,
				'all_styles' => true,
				'font-size'=>false,
				'line-height'=>false,
				'output' => array('.logo h1, #footer-global[role="contentinfo"] .company-title'),
				'units'=>'px',
				'subtitle'=> __( 'Specify the font properties for your text logo (if you chose this on the previous page).', 'cabana' ),
				'default'=> array(
					'color'=>"#333", 
					'font-style'=>'700', 
					'font-family'=>'Montserrat', 'sans-serif', 
					'google' => true ),
			),
		
			array(
				'id'=>'typography-uber-statement',
				'type' => 'typography', 
				'title' => __( 'Uber Statement', 'cabana' ),
				'google'=>true,
				'all_styles' => true,
				'font-size'=>false,
				'line-height'=>false,
				'output' => array('.uber-statement h2, .agency-alt .uber-statement h2'),
				'units'=>'px',
				'subtitle'=> __( 'Specify the font properties for your uber statement.', 'cabana' ),
				'default'=> array(
					'color'=>"#ffffff", 
					'font-style'=>'700', 
					'font-family'=>'Montserrat', 'sans-serif', 
					'google' => true ),
			),
			
			array(
				'id'=>'typography-homepage-section-header',
				'type' => 'typography', 
				'title' => __( 'Homepage Section Header', 'cabana' ),
				'google'=>true,
				'all_styles' => true,
				'font-size'=>false,
				'line-height'=>false,
				'output' => array('.homepage-section-header h1'),
				'units'=>'px',
				'subtitle'=> __( 'Specify the font properties for the homepage section headers.', 'cabana' ),
				'default'=> array(
					'color'=>"#333333", 
					'font-style'=>'700', 
					'font-family'=>'Montserrat', 'sans-serif', 
					'google' => true ),
			),
		
		
			array(
				'id'=>'typography-body',
				'type' => 'typography',
				'title' => __( 'Body Font', 'cabana' ),
				'subtitle' => __( 'Specify the font properties for the body.', 'cabana' ),
				'google'=>true,
				'font-size'=>false,
				'line-height'=>false,
				'all_styles' => true,
				'units'=>'px',
				'output' => array( 'body' ),
				'default' => array(
					'color'=>'#646464',
					'font-size'=>'14px',
					'font-family'=>'Cantarell', 'sans-serif',
					'font-style'=>'400',
					'line-height'=>'25px',
					),
				),
			array(
				'id'=>'typography-body-secondary',
				'type' => 'typography',
				'title' => __( 'Body Font (Secondary)', 'cabana' ),
				'subtitle' => __( 'Specify the font properties for the body secondary copy.', 'cabana' ),
				'google'=>true,
				'font-size'=>false,
				'line-height'=>false,
				'all_styles' => true,
				'units'=>'px',
				'output' => array( '.agency-default .homepage-section-intro p:first-of-type, .agency-alt .homepage-section-intro p:first-of-type, .project-item .details p, blockquote, blockquote p, .agency-alt .news-item .post-cat, #twitter-fetcher-tweet, .agency-alt #homepage-team .team-member .details p, #header-global[role="banner"] .social-links li, #footer-global[role="contentinfo"] .social-links li, .title-container p, .agency-default #homepage-news .news-item .details p, .agency-default #homepage-team .team-member .details p, .contact-details-standard, .team-member .member-role, .about-profile .about-profile-list li, .post-excerpt .meta-details p, .post-single .meta-details p, .article-author, .comments-info, .comment .date, .comment-reply-link, .single-project .project-details li, .single-project .client-name, .plan-price span, .skillbar-title em, blockquote.large, blockquote.large p, .first-paragraph, .one-page-team #homepage-about .homepage-section-intro p:first-of-type, .one-page-team .homepage-section-intro p:first-of-type, .one-page-personal .homepage-section-intro p:first-of-type, .blog-style .homepage-section-intro p:first-of-type, .one-page-team .news-item .post-cat, .one-page-personal .news-item .post-cat, .woocommerce .woocommerce-breadcrumb, .woocommerce-page .woocommerce-breadcrumb, .woocommerce-result-count, .woocommerce-review-link' ),
				'default' => array(
					'color'=>'#646464',
					'font-family'=>'Crimson Text', 'serif',
					'font-style'=>'400italic',
					),
				),
			array(
				'id'=>'typography-body-tertiary',
				'type' => 'typography',
				'title' => __( 'Body Font (Tertiary)', 'cabana' ),
				'subtitle' => __( 'Specify the font properties for the body tertiary copy.', 'cabana' ),
				'google'=>true,
				'font-size'=>false,
				'line-height'=>false,
				'all_styles' => true,
				'units'=>'px',
				'output' => array( '.main-navigation, .project-item .details p span, .agency-default #homepage-news .news-item .details p span, .agency-default #homepage-team .team-member .details p span, .copyright-details, .single-project .project-details li span, .single-project .client-name span, a.read-more-btn, .contact-btn, .filter li a, .contact-form input[type="text"], .contact-form input[type="password"], .contact-form input[type="email"], .contact-form textarea, .contact-form select, #submit, .contact-details, .homepage-quotes .quotes cite, #twitter-fetcher-tweet .timePosted, .project-nav li a, .team-member .member-role span, .about-profile .about-profile-list li span, .post-excerpt .date-stamp, .post-single .date-stamp, .post-excerpt .meta-details p span, .post-single .meta-details p span, .post-tags a, .article-author span, .pager a, .comments-info span, .comment .date span, ul.tabs li, .easyPieChart, .label, .plan-price, .plan-title, .sign-up-btn, .skillbar-title em span, blockquote.large cite, .dropcap, a.read-more-btn-uber, .agency-alt #homepage-team .team-member .details p span, .agency-alt .news-item .post-cat span, .one-page-team .news-item .date-stamp, .one-page-personal .news-item .date-stamp, .one-page-team .news-item .post-cat span, .one-page-personal .news-item .post-cat span' ),
				'default' => array(
					'color'=>'#646464',
					'font-family'=>'Montserrat', 'sans-serif',
					'font-style'=>'400',
					),
				),
			
			array(
				'id'=>'typography-general-heading',
				'type' => 'typography', 
				'title' => __( 'General Headings', 'cabana' ),
				'google'=>true,
				'all_styles' => true,
				'font-size'=>false,
				'line-height'=>false,
				'output' => array('h1, h2, h3, h4, h5, h6'),
				'units'=>'px',
				'subtitle'=> __( 'Specify the font properties for general headings.', 'cabana' ),
				'default'=> array(
					'color'=>"#333333", 
					'font-family'=>'Montserrat', 'sans-serif',
					'font-style'=>'700', 
					'google' => true ),
			),
		)
	);
	
	$sections[] = array(
			'icon' => 'el-icon-website',
			'title' => __( 'Layouts', 'cabana' ),
			'fields' => array(
				array(
					'id'=>'page-layout',
					'type' => 'image_select',
					'title' => __( 'Standard Page Layout', 'cabana' ), 
					'subtitle' => __( 'Choose the layout for your standard pages. You can choose between full-width or with sidebar.', 'cabana' ),
					'options' => array(
							'1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
							'2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
							'3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url.'assets/img/2cr.png'),
						),
					'default' => '1',
				),
				array(
					'id'=>'blog-layout',
					'type' => 'image_select',
					'title' => __( 'Blog Page Layout', 'cabana' ), 
					'subtitle' => __( 'Choose the layout for your blog pages. You can choose between full-width or with sidebar.', 'cabana' ),
					'options' => array(
							'1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
							'2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
							'3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url.'assets/img/2cr.png'),
						),
					'default' => '1',
				),
			)
		);
		
	$sections[] = array(
		'icon' => 'el-icon-cogs',
		'title' => __( 'Header', 'cabana' ),
		'fields' => array(
		
			array(
			    'id'=>'section-logos-start',
			    'type' => 'section',
			    'title' => __( 'Custom Logo', 'cabana' ),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
				'id'=>'header-logo',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Image Logo', 'cabana' ),
				'subtitle' => __( 'Upload your own logo to appear in the theme.', 'cabana' ),
				),
			array(
				'id'=>'header-text-logo',
				'type' => 'checkbox',
				'title' => __( 'Text Logo', 'cabana' ), 
				'subtitle' => __( 'Uncheck this option if you chose an image logo above<br /><br />(default: true).', 'cabana' ),
				'default' => '1'// 1 = on | 0 = off
				),
			array(
				'id'=>'section-logos-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-favicon-touch-start',
			    'type' => 'section',
			    'title' => __( 'Favicon / Touch Icons', 'cabana' ),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
				'id'=>'header-custom-favicon',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Custom Favicon', 'cabana' ),
				'subtitle' => __( 'Upload an image file that will represent your website favicon', 'cabana' ),
				),
			array(
				'id'=>'header-apple-touch-icon-iphone',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Apple Touch Icon (iPhone/iPod)', 'cabana' ),
				'subtitle' => __( 'Upload an image file that will represent your Apple touch icon for non-retina iPhone/iPod (Size must be 60x60px). ', 'cabana' ),
				),
			array(
				'id'=>'header-apple-touch-icon-ipad',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Apple Touch Icon (iPad)', 'cabana' ),
				'subtitle' => __( 'Upload an image file that will represent your Apple touch icon for non-retina iPad (Size must be 76x76px). ', 'cabana' ),
				),
			array(
				'id'=>'header-apple-touch-icon-iphone-retina',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Apple Touch Icon (iPhone/iPod Retina)', 'cabana' ),
				'subtitle' => __( 'Upload an image file that will represent your Apple touch icon for retina iPhone/iPod (Size must be 120x120px). ', 'cabana' ),
				),
			array(
				'id'=>'header-apple-touch-icon-ipad-retina',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Apple Touch Icon (iPad Retina)', 'cabana' ),
				'subtitle' => __( 'Upload an image file that will represent your Apple touch icon for retina iPad (Size must be 152x152px). ', 'cabana' ),
				),
			array(
				'id'=>'section-favicon-touch-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-header-images-start',
			    'type' => 'section',
			    'title' => __( 'Header Images', 'cabana' ),
			    'subtitle' => __( 'Upload a selection of images to use in your homepage header.', 'cabana' ),                          
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
				'id'=>'header-slideshow-image-one',
				'type' => 'media', 
				'url'=> true,
				'output' => array('.header-background-image'), // An array of CSS selectors to apply this font style to dynamically
				'title' => __( 'Header Image #1', 'cabana' ),
				'default'  => array(
				            'url'=>'http://placehold.it/3000.png&text=1'
				        ),
				),
			array(
				'id'=>'header-slideshow-image-two',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Header Image #2', 'cabana' ),
				'default'  => array(
				            'url'=>'http://placehold.it/3000.png&text=2'
				        ),
				),
			array(
				'id'=>'header-slideshow-image-three',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Header Image #3', 'cabana' ),
				'default'  => array(
				            'url'=>'http://placehold.it/3000.png&text=3'
				        ),
				),
			array(
				'id'=>'header-slideshow-image-four',
				'type' => 'media', 
				'url'=> true,
				'title' => __( 'Header Image #4', 'cabana' ),
				'default'  => array(
				            'url'=>'http://placehold.it/3000.png&text=4'
				        ),
				),
			array(
				'id'=>'section-header-images-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
			
			array(
			    'id'=>'section-uber-statement-start',
			    'type' => 'section',
			    'title' => __( 'Uber Statement', 'cabana' ),                        
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id' => 'uber-statement',
			    'title' => __( 'Uber Statement Text', 'cabana' ), 
			    'type' => 'text',
			    'subtitle' => __( 'Please enter your uber statement<br />(eg; Creating quite stunning online experiences).', 'cabana' ),
			    'default' => 'Large header statement'
			    ),
			array(
				'id'=>'uber-statement-button-text',
				'type' => 'text',
				'title' => __( 'Uber Statement Button Text', 'cabana' ), 
				'subtitle' => __( 'Enter the text to appear on your button<br />(eg; View our work).', 'cabana' ),
				'default' => 'Button Text'
				),
			array(
				'id'=>'uber-button-url-select-page',
				'type' => 'select',
				'data' => 'pages',
				'title' => __( 'Uber Statement Button URL (Multi Page version)', 'cabana' ), 
				'subtitle' => __( 'Please choose a page for your uber statement button to link to.<br />eg; Portfolio', 'cabana' ),
				'placeholder' => 'Choose a Page',
				),
			array(
				'id'=>'uber-button-url-select-section',
				'type' => 'select',
				'title' => __( 'Uber Statement Button URL (Single Page version)', 'cabana' ), 
				'subtitle' => __( 'Please choose a section for your uber statement button to scroll to.<br />eg; Portfolio', 'cabana' ),
				'options'  => array(
					'#homepage-about' => 'About',
				    '#homepage-portfolio' => 'Portfolio',
				    '#homepage-services' => 'Services',
				    '#homepage-team' => 'Meet the team',
				    '#homepage-profile' => 'About Me',
				    '#homepage-news' => 'News',
				    '#homepage-contact' => 'Contact',
				),
				'placeholder' => 'Choose a homepage section',
				),
			array(
				'id'=>'section-uber-statement-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
		)
	);

	$sections[] = array(
		'icon' => 'el-icon-cogs',
		'title' => __( 'Footer', 'cabana' ),
		'fields' => array(
			array(
		        'id' => 'footer-copyright',
		        'type' => 'text',
		        'title' => __( 'Footer Copyright Text', 'cabana' ),
		        'subtitle' => __( 'Please enter the text to appear at the bottom of your Footer (eg; All rights reserved. A GuuThemes production.)', 'cabana' ),
		        'default' => 'All rights reserved. A GuuThemes production.',
			    ),
		    array(
		    	'id' =>'google-analytics-tracking-code',
		    	'type' => 'textarea',
		    	'title' => __( 'Google Analytics Tracking Code', 'cabana' ), 
		    	'subtitle' => __( 'Paste your Google Analytics tracking code here (Remember you need to paste all the Javascript code, not just your ID). This will be added into the footer template of your theme.<br /><br />Do not have Google Analytics? Unsure what to paste in this box? Visit this <a href="http://www.google.com/analytics" target="_blank">link</a> to find out more.', 'cabana' ),
		    	'rows' => '15',
		    	),		    
		)
	);

	$sections[] = array(
		'icon' => 'el-icon-twitter',
		'title' => __( 'Twitter Divider', 'cabana' ),
		'fields' => array(
			array(
				'id'=>'divider-twitter-background',
				'type' => 'background',
				'output' => array('.bg2'),
				'title' => __( 'Divider Background', 'cabana' ),
				'subtitle' => __( 'Upload a background image for your Twitter divider.', 'cabana' ),
				'default' => array(
		            'background-repeat'  => 'no-repeat',
		            'background-size' => 'contain'
		            )
				),
			array(
				'id'=>'divider-twitter-id',
				'type' => 'text',
				'title' => __( 'Twitter ID', 'cabana' ), 
				'subtitle' => __( 'Enter your Twitter ID<br />(eg; 345735908357048478).<br />This enables you to show your latest tweet.<br /><br /><strong>Please refer to the documentation supplied on how to get your Twitter ID.</strong>', 'cabana' ),
				'default' => '352711627528880128',
				),
			array(
				'id'=>'divider-twitter-profile',
				'type' => 'text',
				'title' => __( 'Twitter Profile URL', 'cabana' ), 
				'subtitle' => __( 'Enter your Twitter profile URL<br />(eg; https://twitter.com/guuthemes).', 'cabana' ),
				'default' => 'https://twitter.com/envato',
				),
		)
	);
	
	$sections[] = array(
		'icon' => 'el-icon-comment',
		'title' => __( 'Quotes Divider', 'cabana' ),
		'fields' => array(
			array(
				'id'=>'divider-quotes-background-one',
				'type' => 'background',
				'output' => array('.bg1'),
				'title' => __( 'Divider Background #1', 'cabana' ),
				'subtitle' => __( 'Upload a background image for your top quotes.', 'cabana' ),
				'default' => array(
				    'background-repeat'  => 'no-repeat',
				    'background-size' => 'contain'
				    )
				),
			array(
				'id'=>'divider-quotes-background-two',
				'type' => 'background',
				'output' => array('.bg3'),
				'title' => __( 'Divider Background #2', 'cabana' ),
				'subtitle' => __( 'Upload a background image for your bottom quotes.', 'cabana' ),
				'default' => array(
				    'background-repeat'  => 'no-repeat',
				    'background-size' => 'contain'
				    )
				),
		)
	);		
		
	$sections[] = array(
		'icon' => 'el-icon-video',
		'title' => __( 'Buttons', 'cabana' ),
		'fields' => array(
			array(
			    'id'=>'section-buttons-standard-start',
			    'type' => 'section',
			    'title' => __( 'Standard Buttons', 'cabana' ),
			    'subtitle' => __('Here you can style the majority of the buttons in your theme.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
		        'id'       => 'standard-button-text',
		        'type'     => 'color',
		        'mode' => 'color',
		        'title'    => __('Text Color', 'cabana'), 
		        'subtitle' => __('Pick a text color for your standard button (default: #fff).', 'cabana'),
		        'output' => array( 'a.read-more-btn, .contact-btn, .pagination .next, .pagination .prev, .project-nav li, .project-nav .back-link a, .project-nav .next-link a, .project-nav .previous-link a, .comment-form #submit, .pager a, .contact-form-standard #submit, .sign-up-btn, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button' ),
		        'default'  => '#ffffff',
		        'validate' => 'color',
			    ),
			array(
			    'id'       => 'standard-button-normal-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Normal State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your standard button normal state (default: #333).', 'cabana'),
			    'output' => array( 'a.read-more-btn, .contact-btn, .pagination .next, .pagination .prev, .project-nav li, .project-nav .back-link:hover, .comment-form #submit, .pager a, .contact-form-standard #submit, .sign-up-btn, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'standard-button-hover-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Hover State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your standard button hover state (default: #dd3e3e).', 'cabana'),
			    'output' => array( 'a.read-more-btn:hover, .contact-btn:hover, .pagination .next:hover, .pagination .prev:hover, .project-nav .next-link:hover, .project-nav .previous-link:hover, .project-nav .back-link, .comment-form #submit:hover, .pager a:hover, .contact-form-standard #submit:hover, .sign-up-btn:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#dd3e3e',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-buttons-standard-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
			
			array(
			    'id'=>'section-button-uber-start',
			    'type' => 'section',
			    'title' => __( 'Uber Statement Button', 'cabana' ),
			    'subtitle' => __('Here you can style the button that appears with your Uber Statement.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'uber-button-text',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your standard button (default: #fff).', 'cabana'),
			    'output' => array( 'a.read-more-btn-uber' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'uber-button-normal-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Normal State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your standard button normal state (default: #dd3e3e).', 'cabana'),
			    'output' => array( 'a.read-more-btn-uber' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#dd3e3e',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'uber-button-hover-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Hover State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your standard button hover state (default: #333).', 'cabana'),
			    'output' => array( 'a.read-more-btn-uber:hover' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-button-uber-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-button-about-start',
			    'type' => 'section',
			    'title' => __( 'About Button', 'cabana' ),
			    'subtitle' => __('Here you can style the button that appears in the About area.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'about-button-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your about button (default: #333).', 'cabana'),
			    'output' => array( '.agency-default #homepage-about .homepage-section-header a.read-more-btn, .agency-alt #homepage-about .homepage-section-header a.read-more-btn, .one-page-team #homepage-about .homepage-section-header a.read-more-btn, .one-page-personal #homepage-about .homepage-section-header a.read-more-btn, .blog-style #homepage-about .homepage-section-header a.read-more-btn, #submit, .portfolio-showcase .filter li .current' ),
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'about-button-normal-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Normal State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your about button normal state (default: #fff).', 'cabana'),
			    'output' => array( '.agency-default #homepage-about .homepage-section-header a.read-more-btn, .agency-alt #homepage-about .homepage-section-header a.read-more-btn, .one-page-team #homepage-about .homepage-section-header a.read-more-btn, .one-page-personal #homepage-about .homepage-section-header a.read-more-btn, .blog-style #homepage-about .homepage-section-header a.read-more-btn, #submit, .portfolio-showcase .filter li a' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'about-button-hover-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Hover State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your about button hover state (default: #dd3e3e).', 'cabana'),
			    'output' => array( '.agency-default #homepage-about .homepage-section-header a.read-more-btn:hover, .agency-alt #homepage-about .homepage-section-header a.read-more-btn:hover, .one-page-team #homepage-about .homepage-section-header a.read-more-btn:hover, .one-page-personal #homepage-about .homepage-section-header a.read-more-btn:hover, .blog-style #homepage-about .homepage-section-header a.read-more-btn:hover, #submit:hover, .portfolio-showcase .filter li a:hover, .portfolio-showcase .filter li .current' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#dd3e3e',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-button-about-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-button-footer-start',
			    'type' => 'section',
			    'title' => __( 'Footer Button', 'cabana' ),
			    'subtitle' => __('Here you can style the button that appears in the footer.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'footer-button-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your footer button (default: #333).', 'cabana'),
			    'output' => array( '#footer-global[role="contentinfo"] .contact-btn, #footer-global[role="contentinfo"] .back-top-btn' ),
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'footer-button-normal-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Normal State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your footer button normal state (default: #fff).', 'cabana'),
			    'output' => array( '#footer-global[role="contentinfo"] .contact-btn, #footer-global[role="contentinfo"] .back-top-btn' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'footer-button-hover-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Hover State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your footer button hover state (default: #dd3e3e).', 'cabana'),
			    'output' => array( '#footer-global[role="contentinfo"] .contact-btn:hover, #footer-global[role="contentinfo"] .back-top-btn:hover' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#dd3e3e',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-button-footer-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-button-portfolio-filter-start',
			    'type' => 'section',
			    'title' => __( 'Portfolio Filter Buttons', 'cabana' ),
			    'subtitle' => __('Here you can style the buttons for the portfolio filter.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'portfolio-filter-button-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your filter button (default: #fff).', 'cabana'),
			    'output' => array( '.filter li a, .filter li a:hover, .filter li .current' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'portfolio-filter-button-normal-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Normal State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your filter button normal state (default: #ddd).', 'cabana'),
			    'output' => array( '.filter li a' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#dddddd',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'portfolio-filter-button-hover-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Hover State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your filter button hover state (default: #333).', 'cabana'),
			    'output' => array( '.filter li a:hover, .filter li .current' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-button-portfolio-filter-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-button-tags-start',
			    'type' => 'section',
			    'title' => __( 'Post Tag Button', 'cabana' ),
			    'subtitle' => __('Here you can style the buttons for your post tags.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'tags-button-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your post tags button (default: #fff).', 'cabana'),
			    'output' => array( '.post-tags a' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'tags-button-normal-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Normal State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your post tags button normal state (default: #ddd).', 'cabana'),
			    'output' => array( '.post-tags a' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#dddddd',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'tags-button-hover-state',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Hover State', 'cabana'), 
			    'subtitle' => __('Pick a background color for your post tags button hover state (default: #333).', 'cabana'),
			    'output' => array( '.post-tags a:hover' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-button-tags-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
			
		)
	);
	
	$sections[] = array(
		'icon' => 'el-icon-tint',
		'title' => __('Colors', 'cabana'),
		'fields' => array(
		
			array(
			    'id'=>'section-text-logo-color-start',
			    'type' => 'section',
			    'title' => __( 'Text Logo Color', 'cabana' ),
			    'subtitle' => __('Here you can choose the color for your text logo.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'text-logo-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Logo Color', 'cabana'), 
			    'subtitle' => __('Pick a color for your text logo (default: #333).', 'cabana'),
			    'output' => array( '.logo h1 a' ),
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-text-logo-color-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
		
			array(
			    'id'=>'section-icons-color-start',
			    'type' => 'section',
			    'title' => __( 'Icon Color', 'cabana' ),
			    'subtitle' => __('Here you can choose color settings for the various icons used in the theme.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'service-icons-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Service Icons', 'cabana'), 
			    'subtitle' => __('Pick a color for your service icons (default: #ddd).', 'cabana'),
			    'output' => array( '.service-item .details .fa' ),
			    'default'  => '#dddddd',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'homepage-section-icons-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Homepage Section Icons', 'cabana'), 
			    'subtitle' => __('Pick a color for your homepage section icons (default: #ddd).', 'cabana'),
			    'output' => array( '.agency-alt .homepage-section-header .fa, .one-page-team .homepage-section-header .fa, .one-page-personal .homepage-section-header .fa' ),
			    'default'  => '#dddddd',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'team-member-icons-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Team Member Social Icons', 'cabana'), 
			    'subtitle' => __('Pick a color for your team social icons (default: #333).', 'cabana'),
			    'output' => array( '.team-member .social-icons li .fa' ),
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'header-social-icons-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Header Social Icons', 'cabana'), 
			    'subtitle' => __('Pick a color for your header social icons (default: #fff).', 'cabana'),
			    'output' => array( '.social-icons li .fa, .one-page-team .social-icons li .fa, .one-page-personal .social-icons li .fa' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'portfolio-icon-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Portfolo Project Icon', 'cabana'), 
			    'subtitle' => __('Pick a color for your project icon (default: #ddd).', 'cabana'),
			    'output' => array( '.single-project .project-icons .fa' ),
			    'default'  => '#dddddd',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'author-bio-icon-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Author Bio Icons', 'cabana'), 
			    'subtitle' => __('Pick a color for your author icon (default: #333).', 'cabana'),
			    'output' => array( '.author-bio .author-social-icons li .fa' ),
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-icons-color-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
			
			array(
			    'id'=>'section-date-stamp-start',
			    'type' => 'section',
			    'title' => __( 'Date Stamp', 'cabana' ),
			    'subtitle' => __('Here you can style the date stamps that appear with your posts.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'date-stamp-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your date stamp (default: #fff).', 'cabana'),
			    'output' => array( '.post-excerpt .date-stamp .month, .post-single .date-stamp .month, .post-excerpt .date-stamp .day, .post-single .date-stamp .day, .one-page-team .news-item .date-stamp, .one-page-personal .news-item .date-stamp' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'date-stamp-background-color',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Background Color', 'cabana'), 
			    'subtitle' => __('Pick a background color for your date stamp (default: #333).', 'cabana'),
			    'output' => array( '.date-stamp' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-date-stamp-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-about-area-start',
			    'type' => 'section',
			    'title' => __( 'About Section', 'cabana' ),
			    'subtitle' => __('Here you can style the about area at the top of your homepage.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'about-area-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your about area (default: #fff).', 'cabana'),
			    'output' => array( '#homepage-about .icon-holder .fa, .agency-default .homepage-section-header h1, .agency-default #homepage-about .homepage-section-intro p:first-of-type, .agency-default #homepage-about .homepage-section-intro p, .agency-alt #homepage-about .homepage-section-header h1, .agency-alt #homepage-about .homepage-section-intro p:first-of-type, .agency-alt #homepage-about .homepage-section-intro p, .one-page-team #homepage-about .homepage-section-header h1, .one-page-personal #homepage-about .homepage-section-header h1, .one-page-team #homepage-about .homepage-section-intro p:first-of-type, .one-page-personal #homepage-about .homepage-section-intro p:first-of-type, .one-page-team #homepage-about .homepage-section-intro p, .one-page-personal #homepage-about .homepage-section-intro p, .blog-style .homepage-section-header h1, .blog-style .homepage-section-intro p:first-of-type, .blog-style .homepage-section-intro p' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'about-area-background-color',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Background Color', 'cabana'), 
			    'subtitle' => __('Pick a background color for your about area (default: #333).', 'cabana'),
			    'output' => array( '#homepage-about' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-about-area-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-contact-area-start',
			    'type' => 'section',
			    'title' => __( 'Contact Section', 'cabana' ),
			    'subtitle' => __('Here you can style the contact area on your homepage.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'contact-area-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your contact area (default: #fff).', 'cabana'),
			    'output' => array( '#homepage-contact .fa, .contact-details, .contact-details li a, ::-webkit-input-placeholder' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array( 
		        'id'       => 'contact-area-form-border-color',
		        'type'     => 'border',
		        'title'    => __('Contact Form Bottom Border', 'cabana'),
		        'subtitle' => __('Adjust the bottom border for your text fields (default: #fff).', 'cabana'),
		        'output'   => array('.contact-form input[type="text"], .contact-form input[type="password"], .contact-form input[type="email"], .contact-form textarea, .contact-form select'),
		        'all' => false,
		        'left' => false,
		        'right' => false,
		        'top' => false,
		        'default' => array(
                    'border-color'  => '#ffffff', 
                    'border-style'  => 'solid', 
                    'border-bottom' => '3px'
                	)
			    ),
			array(
			    'id'       => 'contact-area-background-color',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Background Color', 'cabana'), 
			    'subtitle' => __('Pick a background color for your contact area (default: #333).', 'cabana'),
			    'output' => array( '#homepage-contact' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-contact-area-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
			array(
			    'id'=>'section-footer-area-start',
			    'type' => 'section',
			    'title' => __( 'Footer', 'cabana' ),
			    'subtitle' => __('Here you can style the footer area.', 'cabana'),                           
			    'indent' => true // Indent all options below until the next 'section' option is set.
			    ),
			array(
			    'id'       => 'footer-area-text-color',
			    'type'     => 'color',
			    'mode' => 'color',
			    'title'    => __('Text Color', 'cabana'), 
			    'subtitle' => __('Pick a text color for your footer area (default: #fff).', 'cabana'),
			    'output' => array( '#footer-global[role="contentinfo"] a, #footer-global[role="contentinfo"] .social-links li a, #footer-global[role="contentinfo"] .social-links li:not(:last-of-type):after' ),
			    'default'  => '#ffffff',
			    'validate' => 'color',
			    ),
			array(
			    'id'       => 'footer-area-background-color',
			    'type'     => 'color',
			    'mode' => 'background-color',
			    'title'    => __('Background Color', 'cabana'), 
			    'subtitle' => __('Pick a background color for your footer area (default: #333).', 'cabana'),
			    'output' => array( '#footer-global[role="contentinfo"]' ), // An array of CSS selectors to apply this font style to
			    'default'  => '#333333',
			    'validate' => 'color',
			    ),
			array(
				'id'=>'section-footer-area-end',
				'type' => 'section',
				'indent' => false // Indent all options below until the next 'section' option is set.
				),
		)
	);
	
	$sections[] = array(
		'icon' => 'el-icon-map-marker',
		'title' => __( 'Google Map', 'cabana' ),
		'fields' => array(
			array(
		        'id' => 'map-latitude',
		        'type' => 'text',
		        'title' => __( 'Latitude', 'cabana' ),
		        'subtitle' => __( 'Please enter the Latitude value for your location. (eg; 53.481508)', 'cabana' ),
			    ),
		    array(
		        'id' => 'map-longitude',
		        'type' => 'text',
		        'title' => __( 'Longitude', 'cabana' ),
		        'subtitle' => __( 'Please enter the Longitude value for your location. (eg; -2.250613)', 'cabana' ),
			    ),
		)
	);
	
	$sections[] = array(
		'icon' => 'el-icon-phone',
		'title' => __( 'Contact', 'cabana' ),
		'fields' => array(
			array(
		        'id' => 'contact-title',
		        'type' => 'text',
		        'title' => __( 'Contact Details Title', 'cabana' ),
		        'subtitle' => __( 'Please enter a title for your contact details. (eg; Contact Info.)', 'cabana' ),
			    ),
		    array(
		        'id' => 'contact-address',
		        'type' => 'text',
		        'title' => __( 'Contact Address', 'cabana' ),
		        'subtitle' => __( 'Please enter your company address (eg; 10 Columbus Circle, New York, NY 10019, United States.)', 'cabana' ),
			    ),
		    array(
		        'id' => 'contact-telephone',
		        'type' => 'text',
		        'title' => __( 'Contact Telephone', 'cabana' ),
		        'subtitle' => __( 'Please enter your company landline number (eg; (212) 823-6000.)', 'cabana' ),
			    ),
		    array(
		        'id' => 'contact-mobile',
		        'type' => 'text',
		        'title' => __( 'Contact Mobile', 'cabana' ),
		        'subtitle' => __( 'Please enter your company mobile number (eg; (212) 823-6001.)', 'cabana' ),
			    ),
		    array(
		        'id' => 'contact-email',
		        'type' => 'text',
		        'title' => __( 'Contact Email', 'cabana' ),
		        'subtitle' => __( 'Please enter your company email address (eg; marc@guuthemes.com) This will also populate into your Contact Form.', 'cabana' ),
		        'default'  => 'sayhello@cabana.com',
			    ),
		)
	);
	
	$sections[] = array(
		'icon' => 'el-icon-group',
		'title' => __( 'Social', 'cabana' ),
		'fields' => array(
			array(
		        'id' => 'social-twitter',
		        'type' => 'text',
		        'title' => __( 'Twitter', 'cabana' ),
		        'subtitle' => __( 'Enter your Twitter Profile URL (ie; http://twitter.com/guuthemes)', 'cabana' ),
		        'default'  => 'https://twitter.com/envato',
			    ),
		    array(
		        'id' => 'social-facebook',
		        'type' => 'text',
		        'title' => __( 'Facebook', 'cabana' ),
		        'subtitle' => __( 'Enter your Facebook Profile URL (ie; http://facebook.com/guuthemes)', 'cabana' ),
		        'default'  => 'https://www.facebook.com/envato',
			    ),
		    array(
		        'id' => 'social-linkedin',
		        'type' => 'text',
		        'title' => __( 'Linkedin', 'cabana' ),
		        'subtitle' => __( 'Enter your Linkedin Profile URL (ie; http://linkedin.com/in/guuthemes)', 'cabana' ),
		        'default'  => 'http://www.linkedin.com/company/envato',
			    ),
		    array(
		        'id' => 'social-pinterest',
		        'type' => 'text',
		        'title' => __( 'Pinterest', 'cabana' ),
		        'subtitle' => __( 'Enter your Pinterest Profile URL (ie; http://pinterest.com/guuthemes)', 'cabana' ),
		        'default'  => 'http://www.pinterest.com/envato',
			    ),
		    array(
		        'id' => 'social-googleplus',
		        'type' => 'text',
		        'title' => __( 'Google +', 'cabana' ),
		        'subtitle' => __( 'Enter your Google + Profile URL (ie; http://plus.google.com/+guuthemes)', 'cabana' ),
		        'default'  => 'https://plus.google.com/+envato',
			    ),
		    array(
		        'id' => 'social-flickr',
		        'type' => 'text',
		        'title' => __( 'Flickr', 'cabana' ),
		        'subtitle' => __( 'Enter your Flickr Profile URL (ie; http://flickr.com/photos/guuthemes)', 'cabana' ),
		        'default'  => 'http://www.flickr.com/photos/we-are-envato',
			    ),
			array(
			    'id' => 'social-instagram',
			    'type' => 'text',
			    'title' => __( 'Instagram', 'cabana' ),
			    'subtitle' => __( 'Enter your Instagram Profile URL (ie; http://instagram.com/guuthemes)', 'cabana' ),
			    'default'  => 'http://www.instagram.com/we-are-envato',
			    ),
		    array(
		        'id' => 'social-dribbble',
		        'type' => 'text',
		        'title' => __( 'Dribbble', 'cabana' ),
		        'subtitle' => __( 'Enter your Dribbble Profile URL (ie; http://dribbble.com/guuthemes)', 'cabana' ),
		        'default'  => 'http://dribbble.com/envato',
			    ),
		    array(
		        'id' => 'social-youtube',
		        'type' => 'text',
		        'title' => __( 'YouTube', 'cabana' ),
		        'subtitle' => __( 'Enter your YouTube Profile URL (ie; http://youtube.com/user/guuthemes)', 'cabana' ),
		        'default'  => 'https://www.youtube.com/user/Envato',
			    ),
		    array(
		        'id' => 'social-vimeo',
		        'type' => 'text',
		        'title' => __( 'Vimeo', 'cabana' ),
		        'subtitle' => __( 'Enter your Vimeo Profile URL (ie; http://vimeo.com/guuthemes)', 'cabana' ),
		        'default'  => 'http://vimeo.com/envato',
			    ),
		)
	);
	
	$sections[] = array(
		'icon' => 'el-icon-css',
		'title' => __( 'Custom CSS', 'cabana' ),
		'fields' => array(
			array(
				'id' =>'custom-css',
				'type' => 'textarea',
				'title' => __( 'Custom CSS', 'cabana' ), 
				'subtitle' => __( 'This CSS will be appended to the primary stylesheet. Ideal for custom CSS stylings that you do not want overwritten by updates.<br><br><strong>NB;</strong> If a style does not seem to be taking effect, you may need to add <strong>!important</strong> to the end.<br><br>ie;<br><br><strong>.my-heading {<br>color: blue!important;<br>}</strong>', 'cabana' ),
				'rows' => '15',
				),
		)
	);
			
	if (function_exists('wp_get_theme')){
	$theme_data = wp_get_theme();
	$theme_uri = $theme_data->get('ThemeURI');
	$description = $theme_data->get('Description');
	$author = $theme_data->get('Author');
	$version = $theme_data->get('Version');
	$tags = $theme_data->get('Tags');
	}else{
	$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
	$theme_uri = $theme_data['URI'];
	$description = $theme_data['Description'];
	$author = $theme_data['Author'];
	$version = $theme_data['Version'];
	$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="redux-framework-section-desc">';
	$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'cabana').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'cabana').$author.'</p>';
	$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'cabana').$version.'</p>';
	$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
	if ( !empty( $tags ) ) {
		$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'cabana').implode(', ', $tags).'</p>';	
	}
	$theme_info .= '</div>';

	if(file_exists(dirname(__FILE__).'/README.md')){
	$sections['theme_docs'] = array(
				'icon' => ReduxFramework::$_url.'assets/img/glyphicons/glyphicons_071_book.png',
				'title' => __('Documentation', 'cabana'),
				'fields' => array(
					array(
						'id'=>'17',
						'type' => 'raw',
						'content' => file_get_contents(dirname(__FILE__).'/README.md')
						),				
				),
				
				);
	}//if

	$sections[] = array(
		'type' => 'divide',
	);

	$sections[] = array(
		'icon' => 'el-icon-info-sign',
		'title' => __('Theme Information', 'cabana'),
		'fields' => array(
			array(
				'id'=>'raw_new_info',
				'type' => 'raw',
				'content' => $item_info,
				)
			),   
		);


	if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
	    $tabs['docs'] = array(
			'icon' => 'el-icon-book',
			    'title' => __('Documentation', 'cabana'),
	        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
	    );
	}

	global $ReduxFramework;
	$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

	// END Sample Config
	}
	add_action('init', 'redux_init');
endif;

/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
if ( !function_exists( 'redux_add_another_section' ) ):
	function redux_add_another_section($sections){
	    //$sections = array();
	    $sections[] = array(
	        'title' => __('Section via hook', 'cabana'),
	        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'cabana'),
			'icon' => 'el-icon-paper-clip',
			    // Leave this as a blank section, no options just some intro text set above.
	        'fields' => array()
	    );

	    return $sections;
	}
	add_filter('redux/options/redux_demo/sections', 'redux_add_another_section');
	// replace redux_demo with your opt_name
endif;
/**

	Filter hook for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
if ( !function_exists( 'redux_change_framework_args' ) ):
	function redux_change_framework_args($args){
	    //$args['dev_mode'] = true;
	    
	    return $args;
	}
	add_filter('redux/options/redux_demo/args', 'redux_change_framework_args');
	// replace redux_demo with your opt_name
endif;
/**

	Filter hook for filtering the default value of any given field. Very useful in development mode.

**/
if ( !function_exists( 'redux_change_option_defaults' ) ):
	function redux_change_option_defaults($defaults){
	    $defaults['str_replace'] = "Testing filter hook!";
	    
	    return $defaults;
	}
	add_filter('redux/options/redux_demo/defaults', 'redux_change_option_defaults');
	// replace redux_demo with your opt_name
endif;

/** 

	Custom function for the callback referenced above

 */
if ( !function_exists( 'redux_my_custom_field' ) ):
	function redux_my_custom_field($field, $value) {
	    print_r($field);
	    print_r($value);
	}
endif;

/**
 
	Custom function for the callback validation referenced above

**/
if ( !function_exists( 'redux_validate_callback_function' ) ):
	function redux_validate_callback_function($field, $value, $existing_value) {
	    $error = false;
	    $value =  'just testing';
	    /*
	    do your validation
	    
	    if(something) {
	        $value = $value;
	    } elseif(something else) {
	        $error = true;
	        $value = $existing_value;
	        $field['msg'] = 'your custom error message';
	    }
	    */
	    
	    $return['value'] = $value;
	    if($error == true) {
	        $return['error'] = $field;
	    }
	    return $return;
	}
endif;
/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
if ( !function_exists( 'redux_test_compiler' ) ):
	function redux_test_compiler($options, $css) {
		echo "<h1>The compiler hook has run!";
		//print_r($options); //Option values
		print_r($css); //So you can compile the CSS within your own file to cache
	    $filename = dirname(__FILE__) . '/avada' . '.css';

			    global $wp_filesystem;
			    if( empty( $wp_filesystem ) ) {
			        require_once( ABSPATH .'/wp-admin/includes/file.php' );
			        WP_Filesystem();
			    }

			    if( $wp_filesystem ) {
			        $wp_filesystem->put_contents(
			            $filename,
			            $css,
			            FS_CHMOD_FILE // predefined mode settings for WP files
			        );
			    }

	}
	//add_filter('redux/options/redux_demo/compiler', 'redux_test_compiler', 10, 2);
	// replace redux_demo with your opt_name
endif;


/**

	Remove all things related to the Redux Demo mode.

**/
if ( !function_exists( 'redux_remove_demo_options' ) ):
	function redux_remove_demo_options() {
		
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
		}

		// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	

	}
	//add_action( 'redux/plugin/hooks', 'redux_remove_demo_options' );	
endif;
