(function main($) {
  $(() => {
    // Include your main JS generic code here

    /*********************
    ** Nav Menu Functions
    **********************/

    	$('.nav-menu-trigger').click(function(e){
    		e.preventDefault();
    		$('body').toggleClass('nav-open locked');
    	});

    /*********************
    ** Main Body Functions
    **********************/

    	$(window).resize(function(){
    		var $headerHeight = $('#main-header').outerHeight();

    		$('main,#main-header .nav-wrapper').css('padding-top', $headerHeight+10);
    	}).resize();

    /*****************************
    ** Filter News Click Function
    ******************************/

      $('.posts-filter .filter-title').click(function(e){
        e.preventDefault();
        $('.filter-content').slideToggle(500);
      });

    /*****************************
    ** Featured Slider Functions
    ******************************/

      function changeSlide(slide) {
        $('.featured-slide,.slider-indicator').removeClass('active');
        $('.featured-slide[data-slide="'+slide+'"],.slider-indicator[data-slide="'+slide+'"]').addClass('active');
      }

      $('.featured-slider .slider-indicator').click(function(e){
        e.preventDefault();
        var slide = $(this).attr('data-slide');
        changeSlide(slide);
      });

  });
}(jQuery));
