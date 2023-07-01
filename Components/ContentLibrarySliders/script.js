/* eslint-disable no-nested-ternary */
import $ from 'jquery';

// Values
const distanceToScroll = 328;

/**
 * Move the the silder horizontally, on click
 */
$('.content-library-category:not(.taxonomy-page) .o-arrow').on('click', (e) => {
  // DOM Elements
  const thisButton = $(e.currentTarget);
  const siblingButton = thisButton.siblings('.o-arrow');
  const cardsWrapper = $(thisButton).parents('.content-library-category').find('.c-resource-cards');
  // Dynamic Values
  const cardsCount = cardsWrapper.children().length;
  /**
   * E.g. 328 * 10 - 1280 - 80 - 32;
   * 328 is the card width (296px) plus 32px (margin-right)
   * 10 is the total number of cards
   * 1280 is the .c-resource-cards width
   * 80 is the wrapper right negative margin
   * 32 is the last 32px margin-right
   */
  const rightMostLimit = distanceToScroll * cardsCount - (cardsWrapper.width() + 80 + 32);

  // If the 'previous' button is clicked
  if (thisButton.hasClass('previous')) {
    cardsWrapper.animate(
      {
        scrollLeft: `-=${distanceToScroll}px`,
      },
      window.ANIMATION_TIME,
      () => {
        // Enable the 'next' button
        siblingButton.hasClass('disabled') && siblingButton.removeClass('disabled');
        // If at the beginning of the scroll, disable the 'previous' button
        cardsWrapper.scrollLeft() === 0 && thisButton.addClass('disabled');
      },
    );
    // If the 'next' button is clicked
  } else {
    cardsWrapper.animate(
      {
        scrollLeft: `+=${distanceToScroll}px`,
      },
      window.ANIMATION_TIME,
      () => {
        // Enable the 'previous' button
        siblingButton.hasClass('disabled') && siblingButton.removeClass('disabled');
        // If at the end of the scroll (rightMostLimit), disable the 'next' button
        cardsWrapper.scrollLeft() === rightMostLimit && thisButton.addClass('disabled');
      },
    );
  }
});

/**
 * Enable/Disable buttons on scroll
 */
$('.content-library-category:not(.taxonomy-page) .c-resource-cards').on('scroll', (e) => {
  if (window.isDesktop()) {
    // DOM Elements
    const thisCardsWrapper = $(e.currentTarget);
    const thisPreviousButton = thisCardsWrapper
      .parents('.content-library-category')
      .find('.o-arrow.previous');
    const thisNextButton = thisCardsWrapper
      .parents('.content-library-category')
      .find('.o-arrow.next');

    // Dynamic values
    const cardsCount = thisCardsWrapper.children().length;
    const rightMostLimit = distanceToScroll * cardsCount - (thisCardsWrapper.width() + 80 + 32);

    // 'previous' button
    // If not at the beginning of the scroll, disable the 'previous' button
    if (thisCardsWrapper.scrollLeft() > 0) {
      thisPreviousButton.hasClass('disabled') && thisPreviousButton.removeClass('disabled');
      // If at the beginning of the scroll, disable the 'previous' button
    } else if (thisCardsWrapper.scrollLeft() === 0) {
      !thisPreviousButton.hasClass('disabled') && thisPreviousButton.addClass('disabled');
    }

    // 'next' button
    // If not at the end of the scroll, disable the 'next' button
    if (thisCardsWrapper.scrollLeft() < rightMostLimit) {
      thisNextButton.hasClass('disabled') && thisNextButton.removeClass('disabled');
      // If at the end of the scroll, disable the 'previous' button
    } else if (thisCardsWrapper.scrollLeft() >= rightMostLimit) {
      !thisNextButton.hasClass('disabled') && thisNextButton.addClass('disabled');
    }
  }
});

/**
 * Requests Content Library posts, based on the filters selected
 * @returns {undefined}
 */
const getContentLibraryPosts = (pageNumber = 1) => {
  $.ajax({
    type: 'post',
    dataType: 'json',
    url: window.FlyntData.ajaxurl,
    data: {
      action: 'get_content_library_posts',
      nonce: $('.taxonomy-page').data('nonce'),
      categoryID: $('.taxonomy-page').data('category-id'),
      roleIDs: JSON.parse($('#selectedRoles').val()).join(','),
      typeIDs: JSON.parse($('#selectedTypes').val()).join(','),
      paged: pageNumber,
    },
    success: (response) => {
      // Injects resource cards
      $('.c-resource-cards', '.taxonomy-page').html(response.posts);

      // Changes data-pagination value
      $('.taxonomy-page').data('pagination', pageNumber);

      // Replaces pagination by building new pagination buttons
      const pagesNumber = Math.ceil(response.pages_num); // <= 4 ? Math.ceil(response.pages_num) : 4;
      let paginationButtons = '';

      for (
        let i = pageNumber - 1 < 1 ? 1 : pageNumber - 1;
        i <=
        (pagesNumber >= 3
          ? pageNumber + 1 >= 3
            ? pageNumber + 1 < pagesNumber
              ? pageNumber + 1
              : pagesNumber
            : 3
          : 2);
        i++
      ) {
        paginationButtons += `<button type="button" class="button button--pagination" data-page="${i}">
          ${i}
        </button>`;
      }

      if (pagesNumber > 1) {
        $('.pagination', '.taxonomy-page').show();

        // Removes current pagination buttons
        $('.pagination .button--pagination', '.taxonomy-page').remove();

        // Adds the ellipsis button
        if (pagesNumber > 4 && pageNumber < 3) {
          paginationButtons += `<button type="button" class="button button--pagination disabled">...</button>`;
        }

        // Injects new pagination buttons
        $('.pagination .button.previous', '.taxonomy-page').after(paginationButtons);

        // Enables/disables arrow buttons
        if (pageNumber > 1 && pageNumber < pagesNumber) {
          $('.o-arrow.previous, .o-arrow.next', '.taxonomy-page .pagination').removeClass(
            'disabled',
          );
        } else if (pageNumber === pagesNumber) {
          $('.o-arrow.previous', '.taxonomy-page .pagination').removeClass('disabled');
          $('.o-arrow.next', '.taxonomy-page .pagination').addClass('disabled');
        } else if (pageNumber === 1) {
          $('.o-arrow.previous', '.taxonomy-page .pagination').addClass('disabled');
          $('.o-arrow.next', '.taxonomy-page .pagination').removeClass('disabled');
        }
      } else {
        $('.pagination', '.taxonomy-page').hide();
      }

      // Removes .current class
      $('.pagination .button--pagination', '.taxonomy-page').removeClass('current');

      // Add .current class to button of the current page
      $('.pagination', '.taxonomy-page').find(`[data-page='${pageNumber}']`).addClass('current');
    },
  });
};

/**
 * Opens/closes filter menu on click
 */
const filterMenu = $('.filter__menu');
const filterButtonOpen = $('.filter > button', '.taxonomy-page');
const filterButtonClose = $('#js-closeFilterMenu', '.taxonomy-page');
const filterButtonApply = $('#js-applyFilterMenu', '.taxonomy-page');

/**
 * Requests Content Library posts, based on the filters selected
 * @param {String} action - Toggles or closes the filter menu
 * @returns {undefined}
 */
const openCloseFilterMenu = (action) => {
  // Toggles "checked" class
  filterButtonOpen.toggleClass('checked');

  // Changes aria label
  if (!filterButtonOpen.hasClass('open')) {
    filterButtonOpen.attr('aria-expanded', 'true');
    filterButtonClose.attr('aria-expanded', 'true');
    filterButtonApply.attr('aria-expanded', 'true');
  } else {
    filterButtonOpen.attr('aria-expanded', 'false');
    filterButtonClose.attr('aria-expanded', 'false');
    filterButtonApply.attr('aria-expanded', 'false');
  }

  // Toggles class
  filterButtonOpen.toggleClass('open');

  // Toggles block vertical scroll (only on mobile)
  if (!window.isDesktop()) {
    $('html').toggleClass(window.NO_SCROLL_CLASS);
  }

  // Opens/closes menu
  action === 'toggle' && filterMenu.toggle();
  action === 'close' && filterMenu.hide();
};

// Opens menu
filterButtonOpen.on('click', () => {
  openCloseFilterMenu('toggle');
});

// Closes menu (on click on filterButtonClose and filterButtonApply)
filterButtonClose.add(filterButtonApply).on('click', () => {
  openCloseFilterMenu('close');
});

/**
 * Filters results on taxonomy buttons click (.filter__menu or .active-filters)
 */
$(document).on(
  'click',
  '.taxonomy-page .filter__menu ul .button--tag, .taxonomy-page .active-filters .button--tag',
  (e) => {
    const thisButton = $(e.currentTarget);
    const thisButtonTaxonomy = thisButton.data('taxonomy');
    const thisButtonTermID = thisButton.data('term-id');
    const thisButtonOnFilterMenu = $('.taxonomy-page .filter__menu').find(
      `[data-term-id='${thisButtonTermID}']`,
    );

    // Gets the right hidden input
    const hiddenInput = thisButtonTaxonomy === 'role' ? $('#selectedRoles') : $('#selectedTypes');

    // Gets the array saved in the hidden field
    let termIDsArray = JSON.parse(hiddenInput.val());

    // Adds thisButtonTermID to array, removes it otherwise
    !termIDsArray.includes(thisButtonTermID)
      ? termIDsArray.push(thisButtonTermID)
      : (termIDsArray = termIDsArray.filter((id) => id !== thisButtonTermID));

    // Saves the array in the hidden field
    hiddenInput.val(JSON.stringify(termIDsArray));

    // Adds the filter to '.active-filters' div if it's not there already. Removes it otherwise.
    const activeFilter = $('.active-filters').find(`[data-term-id='${thisButtonTermID}']`);
    if (!activeFilter.length > 0) {
      $('.active-filters').prepend(
        $('#js-removeThisFilter')
          .html()
          .replace('__data-taxonomy=""', `data-taxonomy="${thisButtonTaxonomy}"`)
          .replace('__data-term-id=""', `data-term-id="${thisButtonTermID}"`)
          .replace('__aria-hidden="true"', 'aria-hidden="false"')
          .replace('__Placeholder', thisButton.text()),
      );
    } else {
      activeFilter.remove();
    }

    // Toggles class .has-filters on .active-filters based on whether there are filters in it or not
    $('.active-filters').children('.button--tag').length > 0
      ? $('.active-filters').addClass('has-filters')
      : $('.active-filters').removeClass('has-filters');

    // Toggles button state (checked/not-checked) and toggles the "checked" class
    thisButtonOnFilterMenu.data('checked') === false
      ? thisButtonOnFilterMenu.data('checked', true).addClass('checked')
      : thisButtonOnFilterMenu.data('checked', false).removeClass('checked');

    // Makes the request
    getContentLibraryPosts();
  },
);

/**
 * Clear all filters
 */
$('#js-clearAllFilters').on('click', () => {
  // Removes all buttons from .active-filters
  $('.active-filters').children('.button--tag').remove();

  // Toggles class .has-filters on .active-filters based on whether there are filters in it or not
  $('.active-filters').children('.button--tag').length > 0
    ? $('.active-filters').addClass('has-filters')
    : $('.active-filters').removeClass('has-filters');

  // Resets all filter buttons
  $('.filter__menu').find('.button--tag').removeClass('checked').data('checked', false);

  // Clears IDs
  $('#selectedRoles, #selectedTypes').val('[]');

  // Makes the request
  getContentLibraryPosts();
});

/**
 * Scrolls o-tabs to the current .o-tab--selected, on Content Category pages
 */
if ($('html').hasClass('tax-content-category')) {
  const categoryTabs = $('.content-library-categories .o-tabs');
  const categoryTabsWidth = categoryTabs.width();
  const allTabsWidth = categoryTabs
    .children()
    .toArray()
    .reduce((accum, curr, index) => accum + $(categoryTabs.children()[index]).outerWidth(), 0);

  // Only if there's not enough width to show all categories tabs
  if (categoryTabsWidth < allTabsWidth) {
    categoryTabs.scrollLeft($('.content-library-categories .o-tab--selected').position().left - 16);
  }
}

/**
 * Handles pagination
 */
$(document).on('click', '.taxonomy-page .pagination .button', (e) => {
  const thisButton = $(e.currentTarget);
  const currentPage = $('.taxonomy-page').data('pagination');
  const pageNumber =
    thisButton.data('page') || (thisButton.hasClass('next') ? currentPage + 1 : currentPage - 1);

  getContentLibraryPosts(pageNumber);
});
