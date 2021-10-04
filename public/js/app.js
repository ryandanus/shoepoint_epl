document.title = title;

// Smart navbar, source: https://bootstrap-menu.com/detail-smart-hide.html
// add padding top to show content behind navbar
$('body').css('padding-top', $('.navbar').outerHeight() + 'px');

// detect scroll top or down
if ($('.smart-scroll').length > 0) { // check if element exists
    var last_scroll_top = 0;
    $(window).on('scroll', function() {
        scroll_top = $(this).scrollTop();

        if(scroll_top == 0)
        {
            $('.smart-scroll').removeClass('shadow-sm');
        }
        else if(scroll_top < last_scroll_top)
        {
            $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up').addClass('shadow-sm');
        }
        else
        {
            $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
        }

        last_scroll_top = scroll_top;
    });
}

var btn = $('#scrollTop');

$(window).on('scroll', function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  console.log("Clicked");
  $('html, body').animate({scrollTop:0}, '300');
});

$(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('.testimonial-carousel').slick({
        speed: 500,
        centerMode: true,
        centerPadding: '5%',
        cssEase: 'ease-in-out',
        infinite: true,
        slidesToShow: 3,
        easing: 'swing',
        lazyLoad: 'ondemand',
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    arrows: false,
                    centerPadding: '20%',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerPadding: '10%',
                    slidesToShow: 1
                }
            },
        ]
    });
});

$("#explore").on('click', function(){
  $('html, body').animate({
      scrollTop: $( $.attr(this, 'href') ).offset().top
  }, 1000);
  return false;
});

function scrollToElement(elementId){
    var target = "#" + elementId;

    window.setTimeout(function(){
        $('html, body').animate({
            scrollTop: $( $(target) ).offset().top
        }, 1000);
    }, 500);
}