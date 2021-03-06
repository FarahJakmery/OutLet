$(window).ready(function () {
  //
  $("#navbar-btn").on("click", function () {
    $("#navbarNavDropdown").slideToggle();
  })
  // Product Page
  // Slide Down/Up Product Cassification ...
  $(".prudact-page .title .show").on("click", function () {
    console.log("c");
    $(this).find("i").toggleClass("fa-angle-up fa-angle-down");
    $(this).parents(".title").next().slideToggle();
  })
  // Show Prudect Classfication detiles
  $(".product-classification-small-screen span i").on("click", function () {
    $(this).addClass("fa-rotate-180");
    $(".overlay").fadeIn();
    var classfication = $($(this).parents(".sm").data("classifaction"));
    var sm = $(this).parents(".sm");
    sm.addClass("active")
    var $trigger = $(this);
    classfication.slideToggle();
    $(document).on("click", function (event) {
      if ($(event.target).hasClass("overlay")) {
        classfication.slideUp();
        $(".overlay").fadeOut();
        $trigger.removeClass("fa-rotate-180");
        sm.removeClass("active")
      }
    });
  })
  
  //Count Header Sliders
  numb = ($(".header .container .swiper-wrapper").children().length).toLocaleString('en-US', { minimumIntegerDigits: 2, useGrouping: false })
  $(".scroll-count.max-count").text(numb)

  // User List Show/Hide
  $(".user-list .hide-show").on("click", function () {
    if ($(".user-list").hasClass("visible")) {
      $(".user-list").css({
        "right":"-260px",
      })
      $(this).find("i").toggleClass("fa-spin");
      $(".user-list").toggleClass("visible")
    } else {
      $(".user-list").css({
        "right":"0",
      })
      $(this).find("i").toggleClass("fa-spin");
      $(".user-list").toggleClass("visible")
    }
  })

  function stickyHeader() {
        let scroll_top = $(window).scrollTop(),
            siteHeader = $('.navbar'),
            offsetTop = siteHeader.outerHeight(),
            offsetTopAnimation = offsetTop + 10;

        if (siteHeader.hasClass('sticky-header')) {
            if (scroll_top > offsetTopAnimation) {
                siteHeader.addClass('sticky-on');
            } else {
                siteHeader.removeClass('sticky-on');
            }
        }
    }
    $(window).on("scroll", function () {
      stickyHeader ()
    })
  // Toggale Class Active
  //
  toggleActive($(".navbar-expand-lg .navbar-nav .nav-item"));
  //Navbar UserType
  toggleActive($(".navbar-expand-lg .navbar-nav .nav-item .icons .icon"));
  //
  toggleActive($(".navbar-expand-lg .navbar-nav .nav-item .icons .icon .user-type li"))
  // Clothes Section
  toggleActive($(".header .clothes-section ul li"));
  // Services in Footer
  toggleActive($(".footer .about .services i"));
  // Choose Number Page In Prudacts Page
  toggleActive($(".page-number .number"));
  // Choose Color In Product Descriptio/Evaluation Page
  toggleActive($(".product-info .product-detiels .product-color .colors .color"));
  // Choose Color Product Cassification ...
  toggleActive($(".prudact-color .prudact-colors ul li"))
  // Choose Size Product Cassification ...
  toggleActive($(".prudact-size .prudact-sizes span"))
  // Function Used
  function toggleActive(e) {
    e.on("click", function () {
      $(this).addClass("active").siblings().removeClass("active");
    })
  };
  toggleLike($(".product-info .product-detiels .product-amount .love"))
  toggleLike($(".prudact-page .prudact-view .prudact-images .item .love"));
  function toggleLike(e) {
    e.on("click", function () {
      $(this).toggleClass("like");
    })
  };
  // Toggale Class Active in Service Section used parent()
  $(".service .row div i").on("click", function () {
    $(this).addClass("active").parent().siblings().find("i").removeClass("active");
  })
  //Swetch Between User Types
  var userAngle = $(".navbar-expand-lg .navbar-nav .nav-item .icons .icon .icon-angle i");
  var userType = $(".navbar-expand-lg .navbar-nav .nav-item .icons .icon .user-type");
  $("#user-type").on("click", function () {
    if (userType.hasClass("visible")) {
      userType.toggleClass("visible");
      userAngle.toggleClass("fa-rotate-90")
      userType.slideToggle();
    } else {
      userType.toggleClass("visible");
      userAngle.toggleClass("fa-rotate-90")
      userType.slideToggle(600);
    }
    $(document).on("click", function (event) {
      var $trigger = $(".navbar-expand-lg .navbar-nav .nav-item .icons .icon");
      console.log($trigger.has(event.target))
      console.log($trigger.has(event.target).length)
      if ($trigger !== event.target && !$trigger.has(event.target).length) {
        userType.slideUp();
      }
    })
  })
  // Search Section
  var search = $(".navbar-expand-lg .navbar-nav .nav-item .icons .icon:eq(0) form input");
  var searchLI = $(".navbar-nav .nav-item .icons .icon:eq(0) .search") ;
  $(".navbar-nav .nav-item .icons .icon:eq(0) .search").on("click", function () {
      if (search.hasClass("visible")) {
        search.toggleClass("visible");
        search.animate({
          width: "0px",
          paddingRight: "0px",
          paddingLeft: "0px",
        }, 800);
        $(".navbar-nav .nav-item .icons .icon .search").toggleClass(" fa-search fa-times-circle");
      } else {
        search.toggleClass("visible");
        if ($(window).width() > 991) {
          search.animate({
            width: "170px",
            paddingRight: "20px",
            paddingLeft: "40px",
          }, 800);
        } else {
          search.animate({
            width: "100%",
            paddingRight: "40px",
          }, 1000);

        }
      
        $(".navbar-nav .nav-item .icons .icon .search").toggleClass(" fa-search fa-times-circle");
    }
  })
  // if (search.hasClass("visible")) {
  //   $(document).on("click", function (event) {
  //     console.log("yes")
  //     if (searchLI !== event.target && !searchLI.has(event.target).length) {
  //       search.removeClass("visible");
  //       $(".navbar-nav .nav-item .icons .icon .search").toggleClass(" fa-search fa-times-circle");
  //       search.animate({
  //         width: "0px",
  //         paddingLeft: "0px",
  //         paddingRight: "0px",
  //       }, 800);
  //     }
  //   })
  // }
  
    search.focus(function () {
      search.css({
        outline: "none",
        boxShadow: "0 0 10px 0px #aaa",
      })
      search.addClass("visible");
    })
  

 
  // Navbar lists
  $(".navbar .navbar-nav .nav-item:lt(4)").on("click", function () {
    var thisNav = $($(this).data("type"));
    var thisNavName = $(this);
    thisNav.siblings().slideUp();
    thisNav.slideToggle();
    $(document).on("click", function (event) {
      var $trigger = thisNavName;
      if ($trigger !== event.target && !$trigger.has(event.target).length) {
        if (thisNav !== event.target && !thisNav.has(event.target).length) {
          thisNav.slideUp();
        }
      }
    });
  });
  
  // Shuffle In Gallery Slider
  $(".gallery-shuffle .buttons button").on("click", function () {
    $(this).addClass("active").siblings().removeClass("active");
    if ($(this).data("type") === "all") {
      $(".gallery-shuffle .gallery-slider .swiper-slide").css("opacity", "1");
    } else {
      $(".gallery-shuffle .gallery-slider .swiper-slide").css("opacity", "0.3");
      $($(this).data("type")).parents(".swiper-slide").css("opacity", "1");
    }
  })
  
  // Calucate Top For Navbar Items' Lists
  $(".navbar .navbar-lists").css("top", $(".navbar").innerHeight() + 3);
  // Calucate width for Clothes Section in Header
  $(".main-slider .item .timer-collec").width($(".main-slider .item img").innerWidth() - 17);
  //Height Items In Brand Section  
  $(".brand .brand-slider .item").css("height", $(".brand .brand-slider .flickity-viewport").innerHeight() - "20");

  // Start Login Page
  // Show And Hide Password
  $("#showpassword").on("click", function () {
    if ($(this).parent().hasClass("visible")) {
      $(this).parent().toggleClass("visible");
      $(this).toggleClass("fa-eye-slash fa-eye");
      $("#password").attr("type", "password");
    } else {
      $(this).parent().toggleClass("visible");
      $(this).toggleClass("fa-eye-slash fa-eye");
      $("#password").attr("type", "text");
    }
  })
  //End Login Page
  // Start Profile Page
  // Choose Edit for User 
  toggleActive($(".profile .user-list .options .option"));
  // End Profile Page
  // Start Abstract Page
  // Calucate Total Price For Items That User Haves
  var totalPrice = 0;
  $(".cart-process .container .cart-item .price .item-price").each(function () {
    totalPrice += parseFloat($(this).text());
  });
  $("#abs-total-price").text(totalPrice);
  var totalPriceAdress = 0;
  $(".change-adress .cart-content .cart-item .item-price .price").each(function () {
    totalPriceAdress += parseFloat($(this).text());
  });
  // $("#total-price-add").text(totalPriceAdress);
  // To limit number After Point you Can Use
  $("#total-price-add").text(totalPriceAdress.toFixed(2) + "$");
  // End Abstract Page

  // Start Cart Page
  var number = 0;
  productCounter($(".cart-process .cart-item .number-of-item .increase-decrease span.clickable"));
  productCounter($(".product-info .product-detiels .product-amount .increase-decrease span.clickable"));
  lessThan1($(".cart-process .cart-item .number-of-item .increase-decrease .number"));
  lessThan1($(".product-info .product-detiels .product-amount .increase-decrease .number"));
  function productCounter(e) {
    $(e).each(function () {
      $(this).on("click", function () {
        if ($(this).hasClass("plus")) {
          var numberHtml = $(this).prev();
          number = parseInt(numberHtml.text());
          $(this).prev().text(++number);
          $(this).prev().attr("data-number", number);
        } else if ($(this).hasClass("minus") && number > 1) {
          var numberHtml = $(this).next();
          number = parseInt(numberHtml.text());
          $(this).next().text(--number);
          $(this).next().attr("data-number", number);
        }
        if (number == "1") {
          $(this).css({
            color: "#d8d8d8",
          });
        } else if (number > 1) {
          $(this).siblings(".minus").css({
            color: "#000",
          });
        }
        // totalPriceCalc()
      })
    })
  }
  function lessThan1(e) {
    $(e).each(function () {
      // $(this).change( function () {
        var number1 = $(this).text();
        if (number1 <= "1") {
          $(this).prev().css({
            color: "#d8d8d8",
          });
        } else if (number1 > 1) {
          $(this).prev().css({
            color: "#000",
          });
        }
      // })
    })
  }
  // Remove Item
  $(".cart-process .cart-item .cancel i").on("click", function () {
    $(this).parents(".cart-item").remove();
    totalPriceCalc()
  })
  // Promo Code Input
  $(".cart-process .container .row .promo-code input").focus(function () {
    $(".cart-process .container .row .promo-code .place-holder").fadeOut(200);
  })
  $(".cart-process .container .row .promo-code input").blur(function () {
    $(".cart-process .container .row .promo-code .place-holder").fadeIn(200);
  })
  // End Cart Page
  // Start Product Evaluation Page
  var line = $(".product-info .evaluation .star-rate-left .evaluations li .main-line .line");
  line.each(function () {
    $(this).animate({
    width: $(this).data("rate"),
  },2000)
  })
  // End Product Evaluation Page

   // calculation total price in Cart Page
   function totalPriceCalc() {
    var item = $(".cart-process .cart-item");
    let cartTotalPrice = 0;
    item.each(function (){
      var itemCount = parseInt($(this).find(".number-of-item .increase-decrease .number").text());
      var itemPrice = parseFloat($(this).find(".price").text());
      var itemTotalPrice = itemCount * itemPrice;
      console.log(itemTotalPrice)
      cartTotalPrice = cartTotalPrice + itemTotalPrice;
      $(this).find('.item-total-price').text(itemTotalPrice.toFixed(2))
    })
    $(".cart-process .container .total-price .total #total-price").text(cartTotalPrice.toFixed(3))
  }
  totalPriceCalc()
  $('.cart-process .cart-item .number-of-item .increase-decrease span.clickable').on('click', function () {
    totalPriceCalc()
  // }
  })

  // Tabs in Prudact Details
  // $(".product-info .evaluation .tab-btn").on("click", function () {
  //   $(this).addClass("active").siblings().removeClass("active");
  //   var tab = $(this).data("tab");
  //   console.log(tab)
  //   $(".tab-show .tab-block").find(tab).addClass("active tracking-in-expand-fwd-top").siblings().removeClass("active flip-scale-2-hor-top")
  //   // $(".tab-show .tab-block").find(tab)
  // })

  // input two sliders in prudacts page 

  $(document).ready(function(){
    $('.star').click(function(){
        $(this).addClass('on');
         
    //  How to select the parent div of 'this'?
        $(this).parent().addClass('rated');
         
    //  How to select stars to the left side of 'this'?
        $(this).prevAll().addClass('on');
        $(this).nextAll().removeClass('on');
    });
      
  });
  $('.product-info .product-img-collection .secondry-imgs img').on('click', function () {
    $('.product-info .product-img-collection .main-img img').attr('src',$(this).attr('src'))
  })
  
  // add class(on) to stars, if thier is value gets from database
  
  // if (starCount !== '') {
  //   var itemClick = $('.modal .rating-stars ul .star')
  //   itemClick.each((id , e) => {
  //     var thisItem = e
  //     if (id < starCount ) {
    //       $(thisItem).addClass("on")
    //     }
    //   })
    // } 
    
    const starCount = $('.modal .rating-stars ul').data('star') ;
  var itemClick = $('.modal .rating-stars ul .star')
    const starRating = $('.product-info .evaluation .star-rate-right .stars').data('star') ;
  var itemClickRate = $('.product-info .evaluation .star-rate-right .stars li')
  function starLight(count, stars) {
    if (count !== '') {
      stars.each((id , e) => {
        var thisItem = e
        if (id < count ) {
          $(thisItem).addClass("on")
        }
      })
    } 
  }
  starLight(starCount,itemClick)
  starLight(starRating,itemClickRate)
 
})

var temp1 = 0;
	function counterTemp() {
		temp1 += 1;
	}
	setInterval(counterTemp,1000)
	// var price = 0;
	// let timer2=$('.data-left-time');
	// timer2.each(function () { 
	// 	var maxPrice = $(this).data("maxprice");
	// 	price = maxPrice
	// })
	function updateTimer2() {
		let timer=$('.timer');
		timer.each(function () {
			var thisItem = $(this)
			var maxPrice = $(this).data("maxprice");
			var minPrice = $(this).data("minprice");
			var currentPrice;
			var decreasePrice = $(this).data("decreaseprice");
			var decreseTime = parseInt($(this).data("decresetime"));
			var thisItemPrice = $(this).parents('.product-detiels').find('.price .new .new-price')
			var endTime = $(this).data("endtime");
			
			
			var dataStart= $(this).data("start");
			var dataEnd= $(this).data("end");
			var future = Date.parse(dataEnd);
			var past = Date.parse(dataStart);
			var now = new Date();
			var now1 = Date.parse(now);
			var diff = parseFloat($(this).data('diff')) * 1000 * 60 * 60;
			var diffSecs = diff / 1000;
			var left = now - past;
			// console.log(diffSecs)
			var diffCounter = future - now;
			var leftTime = left * 100 / diff ;
			var days = Math.floor(diffCounter / (1000 * 60 * 60 * 24));
			var hours = Math.floor(diffCounter / (1000 * 60 * 60));
			var minutes = Math.floor(diffCounter / (1000 * 60 ));
			// console.log(hours)
			// Count the seconds that have passed
			var secsPassed = Math.floor(left / (1000));
			// Count how many groups of 20 minutes that have passed
			var secs2 = (secsPassed / (decreseTime));
			// floor value
			var secs3 = Math.floor(secsPassed / (decreseTime));
			// Subtracting these values we get rate of seconds for the current 20 minutes group
			var secLeft = secs2 - secs3
			// Count how many seconds that have passed in the current 20 minutes group
			var secsCount = Math.round(decreseTime - secLeft * decreseTime);
			// console.log(secsCount)
			if ( temp1 == 1 ) {
				currentPrice = (maxPrice - (secs3 * decreasePrice)).toFixed(3);
				$(this).attr('data-currentprice', currentPrice);
				thisItemPrice.text(currentPrice);
			}
			if ( secsCount == 1 ) {
				var currentPrice1 = parseFloat(thisItemPrice.text());
				// console.log(currentPrice1)
				if ( currentPrice1 > minPrice ) {
					currentPrice1 = (currentPrice1 - decreasePrice).toFixed(3);
					// console.log(decreasePrice)
					if (currentPrice1 < minPrice) {
						currentPrice1 = minPrice;
					}
					$(this).attr('data-currentprice', currentPrice1);
					// console.log(currentPrice)
				} else if ( currentPrice1 < minPrice ){
					currentPrice1 = minPrice;
				}
				thisItemPrice.text(currentPrice1);
				// console.log(currentPrice)
			}
			// $(this).attr('data-currentprice', currentPrice);
			var mins = Math.floor(diffCounter / (1000 * 60));
			var secs = Math.floor(diffCounter / 1000);
			if(diffCounter > 0 ){
        d = days;
        // h = hours - days * 24;
        h = hours ;
        h2 = Math.floor(h / 10);
        h1 = Math.floor(h - h2*10);
        m = mins - hours * 60;
        m2 = Math.floor(m / 10);
        m1 = Math.floor(m - m2*10);
        s = secs - mins * 60;
        s2 =Math.floor(s / 10);
        s1 = Math.floor(s - s2*10);
			}else if (diffCounter <= 0) {
        h2 = 0;
        h1 = 0;
        m2 = 0;
        m1 = 0;
        s2 =0;
        s1 = 0;
				parseFloat(thisItemPrice.text(minPrice))
			}
			if (minutes <= -120) {
				thisItem.attr('data-endtime', 'true')
			}
			thisItem.html(
    '<div class="time"><span class="line"></span><span class="time-n">' + h2 + '</span></div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + h1 + '</span></div>' +
    '<div class="dots"> : </div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + m2 + '</span></div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + m1 + '</span></div>' +
    '<div class="dots"> : </div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + s2 + '</span></div>' +
        '<div class="time"><span class="line"></span><span class="time-n">' + s1 + '</span></div>'
      );
		})
};
	// Call timer function
setInterval(updateTimer2, 1000);
// Timer function ::
function updateTimer() {
  let timer=document.querySelectorAll(".timer");
  timer.forEach(ele => {
  datePrice = ele.getAttribute("data-start")
  future = Date.parse(datePrice);
  now = new Date();
  diff = future - now;

  days = Math.floor(diff / (1000 * 60 * 60 * 24));
  hours = Math.floor(diff / (1000 * 60 * 60));
  mins = Math.floor(diff / (1000 * 60));
  secs = Math.floor(diff / 1000);

  d = days;
  h = hours - days * 24;
  h2 = Math.floor(h / 10);
  h1 = Math.floor(h - h2*10);
  m = mins - hours * 60;
  m2 = Math.floor(m / 10);
  m1 = Math.floor(m - m2*10);
  s = secs - mins * 60;
  s2 =Math.floor(s / 10);
  s1 = Math.floor(s - s2*10);

    ele.innerHTML =
    '<div class="time"><span class="line"></span><span class="time-n">' + h2 + '</span></div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + h1 + '</span></div>' +
    '<div class="dots"> : </div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + m2 + '</span></div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + m1 + '</span></div>' +
    '<div class="dots"> : </div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + s2 + '</span></div>' +
    '<div class="time"><span class="line"></span><span class="time-n">' + s1 + '</span></div>';
})
};
 // Call timer function
// setInterval('updateTimer()', 1000);

// Price-Range Section


var headerSlider = new Swiper(".header-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    direction: "vertical",
    speed: 900,
    // loop: true,
    // freeMode: true,
    centeredSlides: true,
  effect: 'slide',
    pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
        },
    scrollbar: {
      el: ".swiper-scrollbar",
      draggable: "false",
  },
    autoplay: {
      delay: 4000,
  },
  });
var mainSlider = new Swiper(".main-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 900,
    loop: true,
    freeMode: true,
    centeredSlides: true,
    navigation: {
        nextEl: '.main-slider-btn-prev',
        prevEl: '.main-slider-btn-next',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
  //   autoplay: {
  //     delay: 2000,
  // },
  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: 3,
    },
    992: {
      slidesPerView: 3,
      spaceBetween:0,
    }
    },
  });
  var gallerySlider = new Swiper(".gallery-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 600,
    loop: true,
    freeMode: true,
    navigation: {
      nextEl: '.gallery-slider-btn-next',
      prevEl: '.gallery-slider-btn-prev',
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      480: {
          slidesPerView:2,
      },
      768: {
          slidesPerView :3,
      },
      1024: {
          slidesPerView:4,
      },
      1200: {
        slidesPerView:5,
      },
      },
});
var fashionSlider = new Swiper(".fashion-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    freeMode: true,
    speed:600,
    navigation: {
        nextEl: '.fashion-btn-next',
        prevEl: '.fashion-btn-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
var summerSlider = new Swiper(".summer-sale-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    freeMode: true,
    speed:600,
    navigation: {
        nextEl: '.summer-btn-next',
        prevEl: '.summer-btn-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
var brandSlider = new Swiper(".brand-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    freeMode: true,
    navigation: {
        nextEl: '.brand-btn-next',
        prevEl: '.brand-btn-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});
var swiper = new Swiper(".product-classification-small-screen", {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: false,
    freeMode: true,
    pagination: {
        clickable: true,
  },
  scrollbar: {
      el: ".swiper-scrollbar",
      hide: true,
  },
  breakpoints: {
    380: {
      slidesPerView: 4,
    },
  },
});
var productImgs = new Swiper(".product-imgs", {
    slidesPerView: 3,
    spaceBetween: 10,
    direction: "vertical",
    loop: false,
    // freeMode: true,
    navigation: {
      nextEl: '.product-slider-btn-next',
      prevEl: '.product-slider-btn-prev',
    },
});
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 0,
    loop: true,
    freeMode: true,
    navigation: {
        nextEl: '.product-slider-btn-next',
        prevEl: '.product-slider-btn-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
  },
});
var swiper = new Swiper(".mySwiper1", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    freeMode: true,
    navigation: {
        nextEl: '.mySwiper1-btn-next',
        prevEl: '.mySwiper1-btn-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
   
});

