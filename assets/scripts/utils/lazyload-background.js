import $ from 'jquery';

const enableLazyLoadBackground = (component) => {
  let targets = $(component).find('.lazyload-bg');

  if ($(targets).length === 0) {
    if ($(component).hasClass('lazyload-bg')) {
      targets = component;
    }
  }

  const enableBackground = (target) => {
    if ($(target).css('background-image') === 'none') {
      $(target).css('background-image', `url(${$(target).attr('data-bg-image')})`);
    }
  };

  const initComponent = () => {
    $(window).on('scroll', () => {
      $(targets).each((id, target) => {
        const posFromTop = $(target).offset().top;
        const posFromBottom = posFromTop + $(target).height();
        if (
          (window.scrollY < posFromTop && window.scrollY > posFromTop - 300) ||
          (window.scrollY > posFromBottom && window.scrollY < posFromBottom + 300)
        ) {
          enableBackground(target);
          if (id >= $(targets).lenght) {
            $(window).off('scroll');
          }
        }
      });
    });
  };

  initComponent();
};

export default enableLazyLoadBackground;
