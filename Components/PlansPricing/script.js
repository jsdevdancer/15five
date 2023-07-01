import $ from 'jquery';
import 'slick-carousel';

const pricingPlans = $('.plans-pricing .plans');

if (pricingPlans.length > 0) {
  const initSlider = () => {
    const options = {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      infinite: false,
    };

    $('.plans-pricing .plans').slick(options);
  };

  const destroySlider = () => {
    $('.plans-pricing .plans').slick('unslick');
  };

  const mediaQueryList = window.matchMedia('(max-width: 991px)');

  if (mediaQueryList.matches) {
    initSlider();
  }

  mediaQueryList.addEventListener('change', (event) => {
    if (event.matches) {
      initSlider();
    } else {
      destroySlider();
    }
  });
}
