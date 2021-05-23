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

  });
}(jQuery));
