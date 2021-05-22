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

  });
}(jQuery));
