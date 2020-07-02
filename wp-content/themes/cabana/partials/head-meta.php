<?php global $cabana_wp; ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>

	<title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title( '' ); ?></title>
	
	<!-- Meta
	================================================== -->
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS2 Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
  <meta name="msvalidate.01" content="18C21940D093ED45BD47F7BA66936A3D" />
	<!-- Favicons
	================================================== -->
	
	<link rel="icon" type="image/png" href="<?php echo $cabana_wp['header-custom-favicon']['url']; ?>" />
	<link rel="apple-touch-icon" href="<?php echo $cabana_wp['header-apple-touch-icon-iphone']['url']; ?>" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $cabana_wp['header-apple-touch-icon-ipad']['url']; ?>" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $cabana_wp['header-apple-touch-icon-iphone-retina']['url']; ?>" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $cabana_wp['header-apple-touch-icon-ipad-retina']['url']; ?>" />
	<?php
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
	}
	if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
		wpcf7_enqueue_styles();
	}
	?>

<?php wp_head(); ?>

<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '1383242412000802']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1383242412000802&amp;ev=PixelInitialized" /></noscript>

  <meta name="google-site-verification" content="OhZwwNYLYXWcrcav1GPYgvPBLsUb71XmizPfmEq2zVk" />
</script>
<script type="text/javascript"> //<![CDATA[ 
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>


</head>