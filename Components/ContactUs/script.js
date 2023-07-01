import $ from 'jquery';
import 'jquery-nice-select';

const initContactUs = (component) => {
  $(component).find('select').niceSelect();

  $(document).on('gform_post_render', () => {
    $(component).find('select').niceSelect();
  });
  /**
   * Close success message
   */
  $(component)
    .find('.success button')
    .on('click', () => {
      $(component).find('.success').hide();
    });

  /**
   * Adds or removes css classes based on the scroll postition
   * @param {JQuery<HTMLElement>} formHolder
   * @param {number} formPosFromTop Form vertical position
   * @param {number} formHeight Form Height
   * @param {number} formColHeight Form Column Height + it's vertical position
   * @param {number} headerHeight Page header height
   */
  
  const stickyFormHandler = (
    formSection,
    formHolder,
    headerHeight,
    heightDifference
  ) => {
     if(window.scrollY > formSection.offset().top - headerHeight && 
        window.scrollY < formSection.offset().top + heightDifference) {
          formHolder.addClass('sticky');
          formHolder.removeClass('stick-to-bottom');
      }else if(window.scrollY < formSection.offset().top) {
        formHolder.removeClass('sticky');
        formHolder.removeClass('stick-to-bottom');
      }else if(window.scrollY > formSection.offset().top + heightDifference) {
        formHolder.removeClass('sticky');
        formHolder.addClass('stick-to-bottom');
      }
  };

  /**
   * Handles the info colection and activation events for stickyForm
   */
  const activateStickyForm = () => {
  const formHolder = $(component).find('.u-gravity-form');
  const formSection = formHolder.parents('section');

    if (window.isDesktop()) {
      const content = $(component).find('.col__content .content');
      const headerHeight = $('.main-header').outerHeight(true);
        
        $(document).on('scroll', () => {
          const heightDifference = content.outerHeight(true) - formHolder.outerHeight(true);
          stickyFormHandler(formSection, formHolder, headerHeight, heightDifference);
        });
    } else {
      formHolder.removeClass('sticky');
      formHolder.removeClass('stick-to-bottom');
    }
  };

  activateStickyForm();

  window.onresize = activateStickyForm;
};

$(() => {
  $('.contact-us').each((_, component) => {
    initContactUs(component);
  });
});
