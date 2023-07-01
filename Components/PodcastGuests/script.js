import $ from 'jquery';

$('.podcast-guests #toggle-hidden-guests').on('click', (e) => {
  const el = $(e.target);
  const { allAriaLabel, lessAriaLabel, allLabel, lessLabel } = el.data();

  $('.hidden-guests').slideToggle(500, 'linear', () => {
    el.toggleClass('all-visible');
    if (el.hasClass('all-visible')) {
      el.text(lessLabel);
      el.attr('aria-label', lessAriaLabel);
    } else {
      el.text(allLabel);
      el.attr('aria-label', allAriaLabel);
    }
  });
});
