import 'slick-carousel';
import $ from 'jquery';

const cardContainer = $('.complementary-features .features .card-container');

if (cardContainer.find('.feature-card').length > 1) {
  cardContainer.addClass('slider');
}

const slider = $('.complementary-features .features .card-container.slider');
const options = {
  infinite: false,
  adaptiveHeight: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  draggable: false,
  arrows: true,
  appendArrows: slider.parents('.complementary-features').find('.features .o-arrows'),
  prevArrow: slider.parents('.complementary-features').find('.features .o-arrows .prev'),
  nextArrow: slider.parents('.complementary-features').find('.features .o-arrows .next'),
  mobileFirst: false,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 1,
      },
    },
    {
      breakpoint: 992,
      settings: 'unslick',
    },
  ],
};

$(window).on('load resize', () => {
  if (window.isDesktop() && slider.length && !slider.hasClass('slick-initialized')) {
    slider.slick(options);

    // Update pagination (current slide number)
    slider.on('beforeChange', (event, slick, currentSlide, nextSlide) => {
      const currentSlideEl = slider.siblings('.slider-meta').find('.current');
      currentSlideEl.text(nextSlide + 1);
    });
  } else if (!slider.length) {
    cardContainer.siblings('.slider-meta').addClass('d-lg-none');
  }

  if (slider.hasClass('slick-initialized')) {
    const { slideCount } = slider[0].slick;

    // Remove pagination when not necessary
    if (window.innerWidth >= 1200) {
      if (
        slideCount <= options.slidesToShow &&
        !slider.siblings('.slider-meta').find('.pagination').hasClass('slick-hidden')
      ) {
        slider.siblings('.slider-meta').find('.pagination').addClass('slick-hidden');
      } else if (
        slideCount > options.slidesToShow &&
        slider.siblings('.slider-meta').find('.pagination').hasClass('slick-hidden')
      ) {
        slider.siblings('.slider-meta').find('.pagination').removeClass('slick-hidden');
      }
    } else if (window.innerWidth > 992 && window.innerWidth < 1200) {
      if (
        slideCount <= options.responsive[0].settings.slidesToShow &&
        !slider.siblings('.slider-meta').find('.pagination').hasClass('slick-hidden')
      ) {
        slider.siblings('.slider-meta').find('.pagination').addClass('slick-hidden');
      } else if (
        slideCount > options.responsive[0].settings.slidesToShow &&
        slider.siblings('.slider-meta').find('.pagination').hasClass('slick-hidden')
      ) {
        slider.siblings('.slider-meta').find('.pagination').removeClass('slick-hidden');
      }
    }
  }
});
