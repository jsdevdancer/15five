import $ from 'jquery';
import wistiaEmbedController from './wistia-embed-controller';

const videoModalController = (component) => {
  const popup = $(component).find('.popup');
  const button = $(component).find('.play-button');
  const close = $(component).find('i.close');
  const modal = $(component).find('.modal');
  const isSelfHosted = popup.hasClass('self');
  const isWistia = popup.hasClass('wistia');

  const deprecatedWistiaController = () => {
    // Pause Wistia Video on popup close
    window._wq = window._wq || []; // eslint-disable-line no-underscore-dangle
    // eslint-disable-next-line no-undef
    _wq.push({
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

  const modalController = () => {
    button.each(function () {
      $(this).on('click', () => {
        $(component).find('.modal').addClass('active');
        if (isSelfHosted) {
          $(component).find('video')[0].play();
        } else if (isWistia) {
          wistiaEmbedController(modal);
        } else {
          deprecatedWistiaController();
        }
      });
    });

    close.each(function () {
      $(this).on('click', () => {
        if (isSelfHosted) {
          $(component).find('video')[0].pause();
        }
        $(component).find('.modal').removeClass('active');
      });
    });

    modal.each(function () {
      $(this).on('click', (e) => {
        if (e.target.classList.contains('modal')) {
          if (isSelfHosted) {
            $(component).find('video')[0].pause();
          }
          $(component).find('.modal').removeClass('active');
        }
      });
    });
  };

  const initComponent = () => {
    modalController();
  };

  initComponent();
};

export default videoModalController;
