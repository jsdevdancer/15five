import $ from 'jquery';
import 'slick-carousel';

const ThriveSpeakersCarousel = (scope) => {
  const autoplaySpeed = window.ThriveSpeakersCarouselData.autoplay_speed; // default 3000 (acf)

  /**
   * Build slick slider obj
   */
  const initSlider = () => {
    const options = {
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: $('.arrow-prev'),
      nextArrow: $('.arrow-next'),
      variableWidth: true,
      centerMode: true,
      autoplay: true,
      autoplaySpeed: autoplaySpeed,
    };
    $(scope).find('.slides').slick(options);
  };

  const initComponent = () => {
    initSlider();
  };

  return {
    init: initComponent,
  };
};

$(() => {
  $('.thrive-speakers-carousel').each((id, scope) => {
    const thriveSpeakersCarousel = ThriveSpeakersCarousel(scope);

    thriveSpeakersCarousel.init();
  });

  // setting arrows wrapper and hiding bars height

  const carousel = $('.thrive-speakers-carousel');
  const bar = $(carousel).find('.bar');
  const slide = $(carousel).find('.slick-slide');
  const arrows = $(carousel).find('.thrive-speakers-carousel--arrows-wrapper');
  
  $(document).ready(a => {
    setInterval(b => {
      const slideHeight = slide.height();
      $(arrows).css("height",`calc(${slideHeight}px - 300px)`);
      $(bar).css("height",`calc(${slideHeight}px - 300px)`);
    }, 100);
  });
});
