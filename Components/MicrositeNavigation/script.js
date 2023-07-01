import $ from 'jquery';

const initMicrositeNavigation = (component) => {
  const modal = $(component).find('.popup .modal');

  const modalHandling = () => {
    const trigger = $(
      '.navbar_microsite_button .button, .microsite-hero .button, .page-template-microsite .text-image-button picture',
    );
    const close = $(component).find('.popup i.close');

    trigger.each(function () {
      $(this).on('click', (e) => {
        e.preventDefault();
        $(this).parents('body').find('header .modal').addClass('active');
      });
    });

    close.each(function () {
      $(this).on('click', () => {
        $(this).parents('header').find('.modal').removeClass('active');
      });
    });

    modal.each(function () {
      $(this).on('click', (e) => {
        if (e.target.classList.contains('modal')) {
          $(this).parents('header').find('.modal').removeClass('active');
        }
      });
    });
  };

  if (modal.length > 0) {
    modalHandling();
  }
};

$(() => {
  $.each($('.navbar_microsite__wrapper'), (k, element) => {
    initMicrositeNavigation(element);
  });
  $('.navbar__wrapper button').on('click', (e) => {
    $('.navbar_microsite').toggleClass('open');
  });
  $('.navbar_microsite .navbar__menu__item').on('click', (e) => {
    $('.navbar_microsite').removeClass('open');
    $('.navbar__wrapper button').removeClass('mobile-menu-open');
    $('html').removeClass('no-scroll');
  });
});
