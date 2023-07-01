import $ from 'jquery';

import videoModalController from '../../assets/scripts/utils/video-modal-controller';

$(() => {
  $('.two-video-section').each((id, component) => {
    $(component)
      .find('.video-wrapper')
      .each((key, video) => {
        videoModalController(video);
      });
  });
});
