jQuery(document).ready(function ($) {


	$('.page-heading-wrap div.bluebox-container').prepend
		('<button class="btn btn-mobile-sub-nav">menu</button>');


	$('.btn-mobile-sub-nav').click(function() {
      // calculate the bottom of the page-heading container
      var top = $('.page-heading-wrap').position().top + $('.page-heading-wrap').outerHeight(true);
      // set the top positioning based on the size of the page-heading-wrap div
      $('.sidebar .widget-wrap > ul.menu').css('top', top);
      // toggle visibility
      $('.sidebar .widget-wrap > ul.menu').toggleClass('toggled');
    });

		if( typeof trackEvents == 'function' )
    {
			//Mobile sidebar menu button
			$(".btn-mobile-sub-nav").on('click', function() {
			trackEvents( 'interaction-mobilesidenav', 'sidenav', 'Menu');
			});
		}

});
