import $ from 'jquery';
import 'slick-carousel';

const pricingPlans = $('.plans-pricing-new .plans');

if (pricingPlans.length > 0) {
  /**
   * Slick Slider
   */
  const initSlider = () => {
    const options = {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      infinite: false,
    };

    pricingPlans.slick(options);
  };

  const destroySlider = () => {
    pricingPlans.slick('unslick');
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

  /**
   * Same height features list sections
   */
  const sameHeightFeaturesListSection = () => {
    if (!mediaQueryList.matches) {
      for (let i = 1; i <= 3; i++) {
        const elements = `.plans-pricing-new .plan__features_section:nth-child(${i})`;
        $(elements).removeAttr('style');
        const maxHeight = Math.max(
          ...$(elements)
            .toArray()
            .map((el) => el.clientHeight),
        );
        $(elements).height(maxHeight);
      }
    } else {
      $('.plans-pricing-new .plan__features_section').removeAttr('style');
    }
  };
  sameHeightFeaturesListSection();
  $(window).on('resize', () => {
    sameHeightFeaturesListSection();
  });
}
