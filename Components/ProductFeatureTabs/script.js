import $ from 'jquery';

$('.product-feature-tabs').on('click', '.o-tab', (e) => {
  e.preventDefault();
  const clickedTab = $(e.currentTarget)[0];

  // Make sure we're only selecting inside the section we are clicking
  const thisTab = $(e.currentTarget).parents('.product-feature-tabs');

  const dataTab = clickedTab.dataset.tabId;

  // Scrolling clicked tab into view
  // // left position of clicked element = Its offset - first tab's offset
  const amountToScroll =
    $(e.currentTarget).position().left -
    $(e.currentTarget).parent('.o-tabs').find('.o-tab:first-child()').position().left;

  thisTab.find('.o-tabs').animate({
    scrollLeft: amountToScroll,
  });

  // If clicking a tab that is already active ignore
  if (!clickedTab.classList.contains('o-tab--selected')) {
    thisTab.find('.o-tab.o-tab--selected').removeClass('o-tab--selected');
    thisTab.find('.tab-content.active').removeClass('active');
    thisTab.find(`.o-tab[data-tab-id='${dataTab}']`).addClass('o-tab--selected');
    thisTab.find(`.tab-content[data-tab-content-id='${dataTab}']`).addClass('active');
  }
});
