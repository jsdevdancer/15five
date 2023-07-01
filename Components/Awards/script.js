import $ from 'jquery';

$('.awards #awards-show-more').on('click', (e) => {
  const clicked = $(e.currentTarget);
  const expandingAccordion = clicked.prev();
  const showMoreLabel = clicked.attr('data-show-more');
  const showLessLabel = clicked.attr('data-show-less');
  expandingAccordion.slideToggle(window.ANIMATION_TIME, () => {
    expandingAccordion.toggleClass('collapsed');
    clicked.text(() => (expandingAccordion.hasClass('collapsed') ? showMoreLabel : showLessLabel));
  });
});
