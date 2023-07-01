import $ from 'jquery';
import 'slick-carousel';

const HomepageHero = (scope) => {
  const autoplaySpeed = window.HomepageHeroData.autoplay_speed; // default 3000 (acf)

  /**
   * Build slick slider obj
   */
  const initSlider = () => {
    const options = {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
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
  $('.homepage-hero').each((id, scope) => {
    const homepageHero = HomepageHero(scope);

    homepageHero.init();
  });
});
