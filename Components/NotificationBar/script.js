import $ from 'jquery';

$('.notification-bar .close-button').on('click', (e) => {
  const thisButton = $(e.currentTarget);
  const cookieType = thisButton.data('cookie-type');
  const hours = cookieType ? thisButton.data('cookie-hours') : '';
  const expiration =
    cookieType === 'period' ? new Date(Date.now() + hours * 3.6e6).toUTCString() : '';

  document.cookie = `15five_notification_bar_closed=true; expires=${expiration}; path=/`;

  $('.notification-bar').hide();
  $('html').removeClass('notification-bar-active notification-bar-active-with-button');
});
