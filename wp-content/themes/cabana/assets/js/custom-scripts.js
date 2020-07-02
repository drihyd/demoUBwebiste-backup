// When DOM is fully loaded
jQuery(document).ready(function ($) {

	"use strict"; 

	if ($('body.agency-default, body.agency-alt, body.one-page-team, body.one-page-personal').length) {
	twitterFetcher.fetch(SiteParameters.twitterID, 'twitter-fetcher-tweet', 1, true, false); };

	$('.portfolio-showcase').backstretch(SiteParameters.slideshow_image_one);
	$('.header-image-slideshow').backstretch([
	SiteParameters.slideshow_image_one,
	SiteParameters.slideshow_image_two,
	SiteParameters.slideshow_image_three,
	SiteParameters.slideshow_image_four],
	{duration: 2000, fade: 1000});

});