import $ from 'jquery';
import 'slick-carousel';

$('.testimonial.slider').each(function (key) {
  $(this).attr('data-slider', key);

  $(`[data-slider="${key}"] .testimonial-image .image`).slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    arrows: false,
    dots: false,
    touchMove: false,
    draggable: false,
  });

  $(`[data-slider="${key}"] .testimonial-content`).slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    arrows: false,
    dots: true,
    asNavFor: $(`[data-slider="${key}"] .testimonial-image .image`),
  });
});
