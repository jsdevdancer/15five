import $ from 'jquery';
import videoModalController from '../../assets/scripts/utils/video-modal-controller';

$(() => {
  $('.microsite-hero').each((id, component) => {
    videoModalController(component);
  });
});
