import $ from 'jquery';

const inScope = $('.plans-pricing-features-list').length > 0;

/**
 * Sets table header to fixed on scroll
 */
const setFixed = (force = false) => {
  let tableHeader;
  let nextWrapper;
  const mainHeaderHeight = $('.main-header').height();

  if (window.matchMedia('(max-width: 1200px)').matches) {
    tableHeader = $('.plan-tabs');
    nextWrapper = $('.table-header-wrapper');
  } else {
    tableHeader = $('.table-header-wrapper');
    nextWrapper = $('.table-body-wrapper');
  }

  const elementTopPos = tableHeader.position().top;

  const updatePosition = () => {
    const scrollPos = window.scrollY;

    if (scrollPos + mainHeaderHeight >= elementTopPos) {
      tableHeader.addClass('fixed');
      tableHeader.css('top', mainHeaderHeight);

      nextWrapper.addClass('fixed');
    }

    if (scrollPos + mainHeaderHeight < elementTopPos) {
      tableHeader.removeClass('fixed');
      tableHeader.removeAttr();

      nextWrapper.removeClass('fixed');
    }
  };

  if (force) {
    updatePosition();
  }

  $(document).on('scroll', updatePosition);
};

/**
 * Scrolls tabs bar a little to the left so the user can see all tabs
 */
const shiftTabs = () => {
  const tabs = $('.plans-pricing-features-list .plan-tabs');
  tabs.animate({ scrollLeft: 60 });
};

/**
 * Handles tab clicks
 */
const tabClickHandler = () => {
  const tab = $('.plans-pricing-features-list .plan-tab');
  const tableTDs = $(
    '.plans-pricing-features-list th[data-plan], .plans-pricing-features-list td[data-plan]',
  );
  tab.on('click', function () {
    // Change active tab
    tab.removeClass('active');
    $(this).addClass('active');

    //
    const clickedPlan = $(this).data().plan;
    tableTDs.each(function () {
      if ($(this).data().plan === clickedPlan) {
        $(this).addClass('active');
      } else {
        $(this).removeClass('active');
      }
    });
  });
};

/**
 * Changes the current section div text
 */
const updateCurrentTableHeading = () => {
  const tableHeader = $('.plans-pricing-features-list .table-header-wrapper');

  if ($(tableHeader).length > 0) {
    $(window).on('scroll', () => {
      const tableHeaderBottomPosition = tableHeader[0].getBoundingClientRect().bottom;

      $.each($('.desktop-table-title'), (i, el) => {
        if ($(el).offset().top <= window.scrollY + tableHeaderBottomPosition) {
          if ($('.current-section').text() !== $(el).attr('data-title')) {
            $('.current-section').text($(el).attr('data-title'));
          }
        }
      });
    });
  }
};

/**
 * Shows table popovers on click
 */
const popoverHandler = () => {
  const withPopover = $('.plans-pricing-features-list .has-popover');
  $('span', withPopover).on('click', function (e) {
    e.stopPropagation();

    $('.description-popover', withPopover).hide();
    $(this).siblings('.description-popover').show();
  });

  // Closes popover when clicking outside of it
  $('html').on('click', () => {
    $('.description-popover', withPopover).hide();
  });
};

/**
 * Change table labels colspan on scroll
 */

const changeColspanOnScroll = () => {
  const planLabelColspan = $('.plans-pricing-features-list .plan__label:nth-child(2)');
  const mediaQueryList = window.matchMedia('(max-width: 991px)');
  mediaQueryList.addEventListener('change', (e) => {
    if (e.matches) {
      planLabelColspan.attr('colspan', 1);
    } else {
      planLabelColspan.attr('colspan', 2);
    }
  });
};

$(() => {
  if (inScope) {
    setFixed();
    shiftTabs();
    tabClickHandler();
    updateCurrentTableHeading();
    popoverHandler();
    changeColspanOnScroll();

    $('.notification-bar button.close-button').on('click', () => {
      setFixed(true);
    });

    $(window).on('resize', () => {
      setFixed(true);
    });
  }
});
