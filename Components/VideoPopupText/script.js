import $ from 'jquery';
import videoModalController from '../../assets/scripts/utils/video-modal-controller';

$(() => {
  $('.video-popup-text').each((id, component) => {
    videoModalController(component);
  });
});
