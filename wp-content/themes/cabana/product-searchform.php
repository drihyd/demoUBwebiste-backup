<form class="searchbar woocommerce" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	
	<div class="input-prepend">
	
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="prependedInput" placeholder="<?php _e( 'Search for products...', 'woocommerce' ); ?>" />
		<input type="hidden" name="post_type" value="product" />
		
		<i class="fa fa-search"></i>
	
	</div><!-- end .input-prepend -->

</form><!-- end .searchbar -->