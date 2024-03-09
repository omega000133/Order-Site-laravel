new WOW().init();

//anim function

$(function() {
  var anim = function() {

      var st1 = ($('html').scrollTop() > 0) ? $('html').scrollTop() : 0;
      var st2 = ($('body').scrollTop() > 0) ? $('body').scrollTop() : 0;
      var st = (st1 > st2) ? st1 : st2;

      $('.anim').each(function() {
          var triggerPos = st + (window.innerHeight * 0.65);
          if (triggerPos >= $(this).offset().top && !$(this).hasClass('on')) {
              $(this).addClass('on');
          }
          // else if (triggerPos < $(this).offset().top && $(this).hasClass('on')) {
          //     $(this).removeClass('on');
          // }
      });
  };

  anim();

  $(window).scroll(function() {
      anim();
  });
});


$(document).ready(function () {
  $(".slick-content").slick({
    dots: false,
    arrows: false,
    autoplay: true,
    slidesToScroll: 1,
    slidesToShow: 3,
    autoplaySpeed: 1000,
    responsive: [
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          variableWidth: false,
        },
      },
    ],
  });

  //hamburger
  const hamburger = document.getElementById("hamburger");
  const nav = document.getElementById("nav-menu");
    hamburger.addEventListener("click", function() {
     hamburger.classList.toggle("active");
     nav.classList.toggle("active");
  })
});



const mySwiper = new Swiper ('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  speed: 200,
  mousewheel: false,
  autoplay: true,
  coverflowEffect: {
  rotate: 30,
  slideShadows: true
},
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
})


