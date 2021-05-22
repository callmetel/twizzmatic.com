(function main($) {
  $(() => {
    // Include your main JS generic code here

    /*********************
    ** Nav Menu Functions
    **********************/

    	$('.nav-menu-trigger').click(function(e){
    		e.preventDefault();
    		$('body').toggleClass('nav-open');
    	});

    /*********************
    ** Main Body Functions
    **********************/

    	$(window).resize(function(){
    		var $headerHeight = $('#main-header').outerHeight();

    		$('main').css('padding-top', $headerHeight+10);
    	}).resize();

  });
}(jQuery));
