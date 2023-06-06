$(function () {
    "use strict";

    //=========MENU FIX JS=========   
    if ($('.main_menu').offset() != undefined) {
        var navoff = $('.main_menu').offset().top;
        $(window).scroll(function () {
            var scrolling = $(this).scrollTop();

            if (scrolling > navoff) {
                $('.main_menu').addClass('menu_fix');
            } else {
                $('.main_menu').removeClass('menu_fix');
            }
        });
    }
    
    //*=======BANNER SLIDER====== 
    $('.banner_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        arrows: false,

        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    dots: true,
                    arrows: false,
                }
            }   
        ]

    }); 

    //=======SELECT2====== 
    $(document).ready(function() {
        $('.select_2').select2();
    });


    //=========COUNTER.JS=========   
    $('.counter').countUp();
    
    
    //*=======BANNER SLIDER====== 
    $('.testi_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        // vertical: true,
        nextArrow: '<i class="fas fa-long-arrow-right nxt_arr"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prv_arr"></i>',

        responsive: [
            {
                breakpoint: 768,
                settings: {
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    dots: true,
                    arrows: false,
                }
            }   
        ]

    }); 


    //*==========SCROLL BUTTON==========  
    $('.wsus__scroll_btn').on('click', function () {
        $('html, body').animate({
            scrollTop: 0,
        }, 500);
    });

    $(window).on('scroll', function () {
        var scrolling = $(this).scrollTop();

        if (scrolling > 300) {
            $('.wsus__scroll_btn').fadeIn();
        } else {
            $('.wsus__scroll_btn').fadeOut();
        }
    });

    
    //*==========STICKY SIDEBAR========= 
    $("#sticky_sidebar").stickit({
        top:80,
    })

    $("#sticky_sidebar2").stickit({
        top:80,
    })


    $(document).ready(function() {
        $('.summer_note').summernote();
    });


    //*=======BANNER SLIDER====== 
    $('.pro_det_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
    }); 

    
    //*==========DASHBOARD MENU==========  
    $('.wsus__menu_icon').on('click', function(){
        $('.wsus__dashboard_side_bar').addClass('.show_menu');
    });
        
    $('.wsus__close_icon').on('click', function(){
        $('.wsus__dashboard_side_bar').removeClass('.show_menu');
    });

});
