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
    ** News Load More Function
    ******************************/

      var ppp = 3; // Post per page
      var pageNumber = 1;


      function load_posts(){
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    $("#ajax_posts").append($data);
                    $(".load-more-btn").attr("disabled",false);
                } else{
                    $(".load-more-btn").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
      }

      $(".load-more-btn").on("click",function(){ // When btn is pressed.
        $(".load-more-btn").attr("disabled",true); // Disable the button, temp.
        load_posts();
        $(this).insertAfter('#ajax_posts'); // Move the 'Load More' button to the end of the the newly added posts.
      });

  });
}(jQuery));
