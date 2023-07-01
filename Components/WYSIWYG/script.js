import $, { each } from 'jquery';

$('table th').each(function(i,elem) {
  var num = i + 1;
  $('table td:nth-child(' + num + ')').attr('data-label', $(elem).text());
});