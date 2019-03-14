/*music in news page*/
$('body').on('mouseenter','.m-music-inner a',function(){
    $(this).parents('.m-owl-newsinner2').addClass('movie-hover');
});
$('body').on('mouseleave','.m-music-inner a',function(){
    $(this).parents('.m-owl-newsinner2').removeClass('movie-hover');
});
/*music in news page*

 /*mainpage reviews script*/
$('.k-rate.circle').circleProgress({
    size:80,
    fill: {gradient: ['#ff1e41', '#ff5f43']}
});
/*mainpage reviews script*/

/*Mega Menu*/
$('ul.nav > li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
/*Mega Menu*/
/*app mobile move down*/
$('.app-slider-box').css('top','50px');
/*app mobile move down*/
/*countdown*/
$(function () {
    var austDay = new Date();

    if (typeof navaObject !== 'undefined') {
        austDay = new Date(navaObject.year, parseInt(navaObject.month-1), navaObject.day);
        $('#defaultCountdown').countdown({until: austDay});
        $('#defaultCountdown').countdown($.countdown.regionalOptions['fa']);
        $('#year').text(austDay.getFullYear());
    }
});
/*countdown*/
/*Menu Mobile*/
function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "topnav") {
        x.className += " responsible";
    } else {
        x.className = "topnav";
    }
}
/*Menu Mobile*/
/*Back to Top*/
$(document).ready(function(){
    $('body').append('<div id="toTop" class="btn"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
/*Back to Top*/
/*Search Module*/
$(".searchbtn").click(function(){
    $('.lightbox-overlay').css('display','block');
    $('.searchbox').css('display','block');
});

$(".lightbox-overlay").click(function(){
    $('.lightbox-overlay').css('display','none');
    $('.searchbox').css('display','none');
});
/*Search Module*/
/*login Module*/
$(".loginbtn").click(function(){
    $('.lightbox-overlay').css('display','block');
    $('.loginbox').css('display','block');
});

$(".lightbox-overlay").click(function(){
    $('.lightbox-overlay').css('display','none');
    $('.loginbox').css('display','none');
});
/*login Module*/
/*Rate Module*/
$(".ratebtn").click(function(){
    $('.lightbox-overlay').css('display','block');
    $('.ratebox').css('display','block');
});

$(".lightbox-overlay").click(function(){
    $('.lightbox-overlay').css('display','none');
    $('.ratebox').css('display','none');
});
/*Rate Module*/
/*Alphabet Module*/
$(".search-a-z").click(function(){
    $('.lightbox-overlay').css('display','block');
    $('.AlphabetSub').css('display','block');
});

$(".lightbox-overlay").click(function(){
    $('.lightbox-overlay').css('display','none');
    $('.AlphabetSub').css('display','none');
});
/*Alphabet Module*/
/*Tooltip*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
/*Tooltip*/
/*Rating Reviews Tooltip*/
jQuery( document ).ready(function($) {
    if ($(".x").length) {
        $(".x").slider({
            tooltip: 'always'
        });
    }
});
/*Rating Reviews Tooltip*/
/*Anchor Smooth Move*/
$(document).on('click', '.lyric-btn a', function(event){
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top - 200
    }, 2000);
});
popupWidth = 520, popupHeight = 350;
function winTop() {
    return screen.height / 2 - popupWidth / 2
}

function winLeft() {
    return screen.width / 2 - popupHeight / 2
}

function mmt_social_share(a) {
    var b = winTop()
        , c = winLeft();
    window.open(a, "اشتراک گذاری", "top=" + b + ",left=" + c + ",toolbar=0,status=0,width=" + popupWidth + ",height=" + popupHeight)
}
/*Anchor Smooth Move*/
/*player scroll change*/
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".player").removeClass("music-player");
    }else {
        $(".player").addClass("music-player");
    }
});
/*player scroll change*/
/*ُSharing*/
popupWidth = 520, popupHeight = 350;
function winTop() {
    return screen.height / 2 - popupWidth / 2
}

function winLeft() {
    return screen.width / 2 - popupHeight / 2
}

function mmt_social_share(a) {
    var b = winTop()
        , c = winLeft();
    window.open(a, "اشتراک گذاری", "top=" + b + ",left=" + c + ",toolbar=0,status=0,width=" + popupWidth + ",height=" + popupHeight)
}



/*ُSharing*/

/*main page main slider*/
$('#owl-k-slider').owlCarousel({
    rtl:true,
    loop:true,
    dots:false,
    margin:0,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4,
        }
    }
});
/*main page main slider*/
/*main page music carousel*/
$('#owl-k-music').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:true,
    margin:5,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:3,
        },
        1000:{
            items:5,
        }
    }

});
/*main page music carousel*/
/*Navagram Inner Page carousel */
$('#m-owl-navagramsinner').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:false,
    margin:10,
    nav:false,
    dots:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:1,
        },
        1000:{
            items:5,
        }
    }
});
/*Navagram Inner Page carousel */
/*app slider*/
$('#owl-k-app').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    loop:true,
    margin:0,
    nav:false,
    dots:false,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:1,
        },
        1000:{
            items:1,
        }
    }

});
/*app slider*/
/*usic Page carousel*/
$('.owl-k-music-row').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:false,
    loop:true,
    margin:7.5,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:3,
        },
        1000:{
            items:4,
        }
    }

});
/*Music page carousel*/
/*video Page Slider*/
$('#owl-k-video-slider').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    loop:true,
    margin:0,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:1,
        },
        1000:{
            items:1,
        }
    }

});
/*video Page Slider*/
/*news inner bottom carousel*/
$('#m-owl-newsinner').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:1,
        },
        1000:{
            items:3,
        }
    }
});
/*news inner bottom carousel*/
/*artist page Carousels*/
$('#owl-k-music-artist').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:false,
    margin:10,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:3,
        },
        1000:{
            items:5,
        }
    }
});
$('#owl-k-news-artist').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:false,
    margin:10,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:3,
        },
        1000:{
            items:3,
        }
    }
});
$('#owl-k-reviews-artist').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:false,
    margin:10,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
        },

        600:{
            items:3,
        },
        1000:{
            items:5,
        }
    }
});
$('#owl-k-navagram-artist').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:false,
    margin:10,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
        },

        600:{
            items:3,
        },
        1000:{
            items:4,
        }
    }
});
$('#owl-k-video-artist').owlCarousel({
    rtl:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:false,
    margin:10,
    nav:true,
    navText:['<div class="pr-btn"></div>','<div class="nx-btn"></div>'],
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
        },

        600:{
            items:3,
        },
        1000:{
            items:3,
        }
    }
});
/*artist page Carousels*/

$(document).on('click','[role="tab"]', function() {
    $id = $(this).attr('aria-controls');
    $('[role="tabpanel"]').removeClass('active');
    $('[role="tabpanel"]').removeClass('in');
    $("#"+$id).addClass('active').addClass('in');

});

function isMobileDevice() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

    // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {
        return true;
    }

    if (/android/i.test(userAgent)) {
        return true;
    }

    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return true;
    }

    return false;
}






/*
 $('#owl-k-music-inner').owlCarousel({
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:false,
 loop:true,
 margin:0,
 nav:false,
 dots:true,
 loop:true,
 responsiveClass:true,
 responsive:{
 0:{
 items:1,
 },

 600:{
 items:1,
 },
 1000:{
 items:1,
 }
 }

 });

 $('.owl-k-music-row-inner').owlCarousel({
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 loop:true,
 margin:120,
 nav:false,
 dots:true,
 loop:true,
 responsiveClass:true,
 responsive:{
 0:{
 items:1,
 },

 600:{
 items:3,
 },
 1000:{
 items:4,
 }
 }

 });
 $('#owl-k-music-inner').owlCarousel({
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 loop:true,
 margin:10,
 nav:false,
 dots:false,
 responsiveClass:true,
 responsive:{
 0:{
 items:1,
 },

 600:{
 items:3,
 },
 1000:{
 items:5,
 }
 }
 });



 $('#owl-k-news-inner').owlCarousel({
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 loop:true,
 margin:10,
 nav:false,
 dots:false,
 responsiveClass:true,
 responsive:{
 0:{
 items:1,
 },

 600:{
 items:3,
 },
 1000:{
 items:5,
 }
 }
 });



 $('#owl-k-news').owlCarousel({
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 loop:true,
 margin:10,
 nav:false,
 dots:false,
 responsiveClass:true,
 responsive:{
 0:{
 items:1,
 },

 600:{
 items:3,
 },
 1000:{
 items:5,
 }
 }
 });





 $('#owl-k-video').owlCarousel({
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 loop:true,
 margin:10,
 nav:false,
 dots:false,
 responsiveClass:true,
 responsive:{
 0:{
 items:1,
 },

 600:{
 items:3,
 },
 1000:{
 items:5,
 }
 }
 });


 */
