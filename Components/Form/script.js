import $ from 'jquery';
import 'jquery-nice-select';

$('select').niceSelect();

$(document).on('gform_post_render', () => {
  $('select').niceSelect();
});

/**
 * Close success message
 */
$('.contact-us .success button').on('click', () => {
  $('.contact-us .success').hide();
});
