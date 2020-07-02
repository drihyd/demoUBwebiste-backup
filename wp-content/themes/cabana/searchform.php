<form class="searchbar" method="get" action="<?php echo home_url( '/' ); ?>">

	<div class="input-prepend">

		<input type="text" id="prependedInput" name="s" size="60%" style="width:65%;display:inline-block" placeholder="<?php echo __( 'Enter your search term...', 'cabana' ); ?>" value="<?php the_search_query(); ?>">
		
	<input type="submit" name="submit" id="searchsubmit" class="btn" value="Submit" style="width:34%;border:none;background-color: #F68B1F;
    color: #fff !important;display:inline-block;padding:8px 8px 10px 8px;position:relative;bottom:5px">	


	</div><!-- end .input-prepend -->

</form><!-- end .searchbar -->