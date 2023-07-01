import $ from 'jquery';
import enableLazyLoadBackground from '../../assets/scripts/utils/lazyload-background';
import videoModalController from '../../assets/scripts/utils/video-modal-controller';

const initVideoTestimonial = (component) => {
  videoModalController(component);

  if ($(component).find('.lazyload-bg').length > 0 || $(component).hasClass('lazyload-bg')) {
    enableLazyLoadBackground(component);
  }
};

$(() => {
  $('.video-testimonial').each((id, component) => {
    initVideoTestimonial(component);
  });
});
