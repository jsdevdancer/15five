import $ from 'jquery';
import videoModalController from '../../assets/scripts/utils/video-modal-controller';

$(() => {
  $('.video-and-cta-hero').each((id, component) => {
    videoModalController(component);
  });
});
