import $ from 'jquery';
import videoModalController from '../../assets/scripts/utils/video-modal-controller';

$(() => {
  $('.product-feature-hero').each((id, component) => {
    videoModalController(component);
  });
});
