/* eslint-disable no-underscore-dangle */
import $ from 'jquery';

const wistiaEmbedController = (modal) => {
  const iframe = $(modal).find('iframe');
  const videoID = $(iframe).attr('data-video-id');
  const close = $(modal).find('i.close');

  const addScript = () => {
    $(modal).append('<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>');
  };

  const stopVideoHandler = () => {
    // eslint-disable-next-line no-undef
    window._wq = window._wq || [];
    window._wq.push({
      id: '_all',
      onReady: function (video) {
        close.on('click', () => {
          video.pause();
        });

        modal.on('click', (e) => {
          if (e.target.classList.contains('modal')) {
            video.pause();
          }
        });
      },
    });
  };

  const loadIframe = () => {
    if (iframe.attr('src') === '') {
      addScript();
      const wistiaUrl = `https://fast.wistia.net/embed/iframe/${videoID}?seo=false&videoFoam=true`;

      $(iframe).attr('src', wistiaUrl);
      stopVideoHandler();
    }
  };

  loadIframe();
};

export default wistiaEmbedController;
