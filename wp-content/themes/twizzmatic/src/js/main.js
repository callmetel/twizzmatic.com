(function main($) {
	$(() => {
		// Include your main JS generic code here

		/*********************
		 ** Nav Menu Functions
		 **********************/

		$(".nav-menu-trigger").click(function (e) {
			e.preventDefault();
			$("body").toggleClass("nav-open locked");
		});

		/*********************
		 ** Main Body Functions
		 **********************/

		$(window)
			.resize(function () {
				var $headerHeight = $("#main-header").outerHeight();

				$("main,#main-header .nav-wrapper").css(
					"padding-top",
					$headerHeight + 10
				);
			})
			.resize();

		/*****************************
		 ** Filter News Click Function
		 ******************************/

		$(".posts-filter .filter-title").click(function (e) {
			e.preventDefault();
			$(".filter-content").slideToggle(500);
		});

		/*****************************
		 ** Featured Slider Functions
		 ******************************/

		var slide;

		function changeSlide(slide) {
			$(".featured-slide,.slider-indicator").removeClass("active");
			$(".slider-title").removeClass("animate__animated animate__fadeInUpBig");
			$(".slider-image").removeClass("animate__animated animate__slideInRight");
			$(".slider-link").removeClass("animate__animated animate__fadeInUp");
			var nextSlide = $(
				'.featured-slide[data-slide="' +
					slide +
					'"],.slider-indicator[data-slide="' +
					slide +
					'"]'
			);

			nextSlide.addClass("active");
			nextSlide
				.find(".slider-title")
				.addClass("animate__animated animate__fadeInUpBig");
			nextSlide
				.find(".slider-image")
				.addClass("animate__animated animate__slideInRight");
			nextSlide
				.find(".slider-link")
				.addClass("animate__animated animate__fadeInUp");
		}

		$("#featured-slider .slider-indicator").click(function (e) {
			e.preventDefault();
			slide = $(this).attr("data-slide");
			changeSlide(slide);
		});

		function autoSlide() {
			var currSlide = $("#featured-slider .featured-slide.active").attr(
					"data-slide"
				),
				nextSlide = $("#featured-slider .featured-slide.active")
					.next()
					.attr("data-slide");

			if (currSlide === $(".featured-slide:last").attr("data-slide")) {
				slide = $(".featured-slide:first").attr("data-slide");
			} else {
				slide = nextSlide;
			}
			changeSlide(slide);
		}

		setInterval(autoSlide, 4000);
	});
})(jQuery);
