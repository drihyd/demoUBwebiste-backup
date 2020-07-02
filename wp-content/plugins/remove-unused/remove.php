<?php
/*
 * Plugin Name: WP Remove Assets DRI
 * Version: 0.1
 * Description: Filter particular scripts and style to load in posts or pages that don't need it.
 * Author: Deep Red Ink
*/
 
 
// remove script handles we don't need, each with their own conditions
 
add_action('wp_print_scripts', 'wra_filter_scripts', 100000);
add_action('wp_print_footer_scripts',  'wra_filter_scripts', 100000);
 
function wra_filter_scripts(){
    #wp_deregister_script($handle);
    #wp_dequeue_script($handle);

    if(is_page_template('home')){
		 wp_deregister_script('contact-form-7');
		 wp_dequeue_script('contact-form-7');

         //   wp_deregister_script('contact-form-7');
         // wp_dequeue_script('contact-form-7');
    }


    if(is_home()){
         wp_deregister_script('admin-bar');
         wp_dequeue_script('admin-bar');
          wp_deregister_script('comment-reply');
         wp_dequeue_script('comment-reply'); 
         wp_deregister_script('scripts-google');
         wp_dequeue_script('scripts-google'); 
          wp_deregister_script('selectnav');
          wp_dequeue_script('selectnav'); 
         wp_deregister_script('contact-form-7');
         wp_dequeue_script('contact-form-7');
         wp_deregister_script('google-maps-api');
         wp_dequeue_script('google-maps-api');
         wp_deregister_script('google-recaptcha');
		 wp_dequeue_script('google-recaptcha');
          wp_deregister_script('gmaps');
        wp_dequeue_script('gmaps');

         wp_deregister_script('handl-utm-grabber');
         wp_dequeue_script('handl-utm-grabber');
         
         
    }
    // if( !is_singular( 'docs' ) ){
    //     // the table of contents plugin is being used on documentation pages only
    //     wp_deregister_script('toc-front');
    //     wp_dequeue_script('toc-front');
    // }
 
    // if( !is_singular( array('docs', 'post' ) ) ){
    //     wp_deregister_script('codebox');
    //     wp_dequeue_script('codebox');
    // }
}
 
 
// remove styles we don't need
add_action('wp_print_styles', 'wra_filter_styles', 100000);
add_action('wp_print_footer_scripts', 'wra_filter_styles', 100000);
function wra_filter_styles(){
 
    #wp_deregister_style($handle);
    #wp_dequeue_style($handle);

    //no more bbpress styles.
    
   
    if(is_page_template('template-home-page.php')){
         // the table of contents plugin is being used on documentation pages only
		wp_deregister_style('wp-paginate');
		wp_dequeue_style('wp-paginate');

        wp_deregister_style('colorbox-theme3');
        wp_dequeue_style('colorbox-theme3');

        wp_deregister_style('contact-form-7');
        wp_dequeue_style('contact-form-7');
            
     }
     

}
 
 
 
 
// list loaded assets by our theme and plugins so we know what we're dealing with. This is viewed by admin users only.
add_action('wp_print_footer_scripts', 'wra_list_assets', 900000);
function wra_list_assets(){
    if ( !current_user_can('delete_users') ){
        return;
    }
  echo '<div style="width:50%;margin:0 auto;background:#e4e4e4;padding:10px 35px;">';
    echo '<h2>List of all scripts loaded on this particular page.</h2>';
   echo '<p>This can differ from page to page depending of what is loaded in that particular page.</p>';
  echo '</div>';

    // Print all loaded Scripts (JS)
    global $wp_scripts;
    wra_print_assets($wp_scripts);
    echo '<div style="width:50%;margin:0 auto;background:#e4e4e4;padding:10px 35px;">';
     echo '<h2>List of all css styles loaded on this particular page.</h2>';
     echo '<p>This can differ from page to page depending of what is loaded in that particular page.</p>';
      echo '</div>';
    // Print all loaded Styles (CSS)
    global $wp_styles;
    wra_print_assets($wp_styles);
}
 
function wra_print_assets($wp_asset){
    $nb_of_asset = 0;
    foreach( $wp_asset->queue as $asset ) :
        $nb_of_asset ++;
        $asset_obj = $wp_asset->registered[$asset];
        wra_asset_template($asset_obj, $nb_of_asset);
    endforeach;
}
 
function wra_asset_template($asset_obj, $nb_of_asset){
    if( is_object( $asset_obj ) ){
        echo '<div class="wra_asset" style="width:50%;margin:0 auto;padding: 2rem; color:#fff;font-size: 1.2rem;line-height:150%;background:#4a3e3e; border-bottom: 1px solid #ccc;">';
 
        echo '<div class="wra_asset_nb"><span style="width: 150px; display: inline-block">Number:</span>';
        echo $nb_of_asset . '</div>';
 
 
        echo '<div class="wra_asset_handle"><span style="width: 150px; display: inline-block">Handle:</span>';
        echo $asset_obj->handle . '</div>';
 
        echo '<div class="wra_asset_src"><span style="width: 150px; display: inline-block">Source:</span>';
        echo $asset_obj->src . '</div>';
 
        echo '<div class="wra_asset_deps"><span style="width: 150px; display: inline-block">Dependencies:</span>';
        foreach( $asset_obj->deps as $deps){
           echo $deps . ' / ';
        }
        echo '</div>';
 
        echo '<div class="wra_asset_ver"><span style="width: 150px; display: inline-block">Version:</span>';
        echo $asset_obj->ver . '</div>';
 
        echo '</div>';
 
    }
}