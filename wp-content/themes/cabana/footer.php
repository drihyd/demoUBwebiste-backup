<?php global $cabana_wp; ?>

	<footer id="footer-global" role="contentinfo">
		
		<div class="container">
			
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
				<?php
        if(is_active_sidebar('footer-widget-1')){
        	dynamic_sidebar('footer-widget-1');
        }
        ?>
       </div>
       <div class="col-xs-12 col-sm-4 col-md-4">
        <?php
        if(is_active_sidebar('footer-widget-2')){
        	dynamic_sidebar('footer-widget-2');
        }
        ?>
       </div>
       <div class="col-xs-12 col-sm-4 col-md-4">
        <?php
        if(is_active_sidebar('footer-widget-3')){
        	dynamic_sidebar('footer-widget-3');
        }
        ?>
      </div>
      </div>
      <div class="row">
		<div class="col-sm-12">
        <?php get_template_part( 'partials/social', 'links' ); ?>
				<p class="company-title"><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?> - The Mining & Excavation Experts & Consultants in India.</a></p>
				
				<?php if ( $cabana_wp['multi-one-page-chooser'] == '1' ) { ?>
				
				<?php if ( $cabana_wp['contact-email'] ) { ?>
					<a class="contact-btn" href="mailto:<?php echo $cabana_wp['contact-email']; ?>"><?php _e( 'Come say hello', 'cabana' ); ?></a>
				<?php } ?>
				
				<?php } else { ?>
				
				<div id="back-to-top">
				
					<a class="back-top-btn" href="#header-global"><?php _e( 'Back to top', 'cabana' ); ?></a>
				
				</div><!-- end #back-to-top -->
				
				<?php } ?>
		  		
		  		<p class="copyright-details">&copy; <?php echo date( 'Y' ) ?> <span><?php echo bloginfo( 'name' ); ?></span>. <?php echo $cabana_wp['footer-copyright']; ?></p>

				</div>

		  	</div><!-- end .row -->
	  	
	  	</div><!-- end .container -->
	
	</footer><!-- end #footer-global -->
<button style="transform: rotate(90deg);position: fixed; top: 45%; right:-70px;z-index: 9;background-color: #F68B1F;border-color: #F68B1F;border-bottom-right-radius: 0;border-bottom-left-radius: 0;" type="button" class="btn btn-info btn-lg adm-enq-btn" data-toggle="modal" data-target="#helloDownload">Download Brochure</button>

<!-- Modal -->
<div id="helloDownload" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please fill the form to download brochure</h4>
      </div>
      <div class="modal-body">
      	<?php echo do_shortcode( '[contact-form-7 id="2205" title="Download Brochure"]' ); ?>
      </div>
    </div>

  </div>
</div>
  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '210177512738917');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=210177512738917&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-7223320-1', 'auto');
  ga('send', 'pageview');

</script>
        <!-- analytics -->
<!-- <script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//kalyanchandra.com/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 3]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//kalyanchandra.com/analytics/piwik.php?idsite=3" style="border:0;" alt="" /></p></noscript> -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics1.webmetrics.in/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 7]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics1.webmetrics.in/piwik.php?idsite=7" style="border:0;" alt="" /></p></noscript>

	
<?php echo $cabana_wp['google-analytics-tracking-code']; ?>



<?php wp_footer(); ?>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1035776568;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1035776568/?guid=ON&amp;script=0"/>
</div>
</noscript>
<script type='text/javascript'>
window.__lo_site_id = 69631;

(function() {
	var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
	wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
  })();
</script>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    var thankyouURL = document.getElementById("thankyouURL").value;
    var formname = document.getElementById("formname").value;
    ga('send', {hitType: 'event', eventCategory: 'Download-Brochure', eventAction: 'Click', eventLabel: formname});
    fbq('track', 'Lead');
    location = thankyouURL;
}, false );
</script>

</body>
</html>