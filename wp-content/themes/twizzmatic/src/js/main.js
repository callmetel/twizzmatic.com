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
			$(".slider-link").removeClass(
				"animate__animated animate__fadeInUp animate__delay-1s"
			);
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
				.addClass("animate__animated animate__fadeInUp animate__delay-1s");
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

		var setAutoSlide = setInterval(autoSlide, 5000);

		$(".featured-slider .slider-link").hover(
			function () {
				// Over
				clearInterval(setAutoSlide);
			},
			function () {
				// Out
				setAutoSlide = setInterval(autoSlide, 5000);
			}
		);

		const navbar = document.getElementById("main-header");

		window.onscroll = () => {
			if (window.scrollY > 150) {
				navbar.classList.add("scrolled");
			} else {
				navbar.classList.remove("scrolled");
			}
		};

		$(".posts-grid .post-content").click(function (e) {
			if ($(e.target).attr("href") === undefined) {
				window.open($(this).find(".post-title a").attr("href"));
			}
		});

		$("li.product").click(function (e) {
			e.stopPropagation();
			if ($.inArray(e.currentTarget, $(this).children())) {
				console.log(e.currentTarget);

				if (
					$(e.target).hasClass("add_to_cart_button") &&
					!$(e.target).hasClass("product_type_simple")
				) {
					e.preventDefault();
				}
			}
			// If (
			// 	$(e.target).hasClass("add_to_cart_button") &&
			// 	!$(e.target).hasClass("product_type_simple")
			// ) {
			// 	E.preventDefault();
			// 	$(this).find("wc-quick-view-button").trigger("click");
			// }
		});
	});
})(jQuery);
