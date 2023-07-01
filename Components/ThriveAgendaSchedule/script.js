import $ from 'jquery';

// bind filter on radio button click
$('.thrive-agenda-schedule-navbar--filters--filters-wrapper').on( 'click', 'input', function() {
  // get filter value from input value
  const filterValue = this.value;
  const events = $('.thrive-agenda-schedule--day--event');
  let type;
  const navbarHeight = $('.thrive-agenda-schedule-navbar').outerHeight();
  const headerHeight = $('.main-header').outerHeight();


  $('html, body').animate({
    scrollTop: $(".thrive-agenda-schedule").offset().top - navbarHeight - headerHeight
  }, 50);

  $.each(events, function() {
    // do something with `item`
    type = $(this).attr("data-category");

    $(this).hide();
    if(type === filterValue){
      $(this).show();
    } else if(filterValue === 'all') {
      $(this).show();
    }
  });

    
});

// show hide filters
$('.filter-button').on('click', () => {
  $('.thrive-agenda-schedule-navbar--filters--filters-wrapper').toggle('show');
});
$('body').on('click', (e) => {
  if(!$(e.target).is('.filter-button')) {
    $('.thrive-agenda-schedule-navbar--filters--filters-wrapper').hide();
  }
});

// make fitlers bar sticky
$(document).ready(() => {
  const navbarTop = $('.thrive-agenda-schedule-navbar').offset().top;
  let windowTop = $(window).scrollTop();
  const headerHeight = $('.main-header').outerHeight();
  if (navbarTop < windowTop + headerHeight) {
      $('.thrive-agenda-schedule-navbar').addClass('sticky-nav');
      $('.thrive-agenda-schedule').addClass('sticky-nav');
    } else {
      $('.thrive-agenda-schedule').removeClass('sticky-nav');
      $('.thrive-agenda-schedule-navbar').removeClass('sticky-nav');
    }
  $(window).scroll(() => {
    windowTop = $(window).scrollTop();

    if (navbarTop < windowTop + headerHeight) {
      $('.thrive-agenda-schedule-navbar').addClass('sticky-nav');
      $('.thrive-agenda-schedule').addClass('sticky-nav');
    } else {
      $('.thrive-agenda-schedule').removeClass('sticky-nav');
      $('.thrive-agenda-schedule-navbar').removeClass('sticky-nav');
    }
  });

  // highlight active section on scroll
  let id;
  let navbarHeight;
  $(window).scroll(() => {
    navbarHeight = $('.thrive-agenda-schedule-navbar').outerHeight();
    $('.thrive-agenda-schedule--day').each(function() {
      id = $(this).attr("id");
      if ( $(window).scrollTop() + navbarHeight + headerHeight + 1 >= $(`#${id}`).offset().top) {
          $(".thrive-agenda-schedule-navbar--buttons-wrapper__button").removeClass("active");
          $(`.thrive-agenda-schedule-navbar--buttons-wrapper__button[data-id="${id}"]`).addClass("active");
        } else {
        $(`.thrive-agenda-schedule-navbar--buttons-wrapper__button[data-id="${id}"]`).removeClass("active");
      }
    });
  });
});
