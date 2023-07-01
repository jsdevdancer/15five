import $ from 'jquery';
import videoModalController from '../../../assets/scripts/utils/video-modal-controller';

const initUnlockedContentVideo = (component, hasCookie) => {
  const tooltipHandler = () => {
    const tooltip = $(component).find('.tooltip__wrapper');
    const close = $(tooltip).find('.close');

    setTimeout(() => {
      $(tooltip).show(200);
    }, 200);

    $(close).on('click', () => {
      close.hide(0, tooltip.hide(200));
    });
  };

  const init = () => {
    videoModalController(component);
    $([document.documentElement, document.body]).animate(
      {
        scrollTop: $('.tooltip__wrapper').offset().top,
      },
      200,
    );
    if (!hasCookie) {
      tooltipHandler(component);
    }
  };

  init();
};

$(() => {
  $('.content-single-post.post--video').each((_, component) => {
    initUnlockedContentVideo(component);
  });
});

export default initUnlockedContentVideo;
