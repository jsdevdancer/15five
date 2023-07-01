import $ from 'jquery';
import validateEmail from '../../../assets/scripts/utils/validate-email';
import sendDataToPardot from '../../../assets/scripts/utils/pardot';

const waitForRecaptcha = function (callback) {
  let result;

  if (typeof window.grecaptcha === 'object') {
    result = callback();
  } else {
    setTimeout(() => {
      waitForRecaptcha(callback);
    }, 500);
  }
  return result;
};

/**
 * Send data to Pardot
 */
const initSubscriptionForm = (component) => {
  /**
   * Send Data to pardot
   * */
  const submitForm = () => {
    const email = $(component).find(`#${component.id}-subscribe`).val();
    const gclid = $(component).find(`#${component.id}-gclid`).val();
    const pardotUrl = $(component).attr('data-pardot');

    sendDataToPardot(email, gclid, component.id, pardotUrl);
  };

  /**
   * Renders the recaptcha ID with the necessary specs
   * @returns Recaptcha Widget ID
   */
  const renderRecaptcha = () => {
    const holder = $(component).find('.g-recaptcha').attr('id');
    const captchaID = window.grecaptcha.render(
      holder,
      {
        sitekey: '6LcBRlQdAAAAANcqVcztOFoNEtQCG0kHRAwkDxub',
        size: 'invisible',
        badge: 'bottomleft',
        callback: submitForm,
      },
      true,
    );
    return captchaID;
  };

  /**
   * Enqueues the recaptcha script in the head and activates the render function
   */
  const enqueueRecaptcha = async () => {
    let isLoaded = false;
    let widgetID;

    if (typeof window.grecaptcha !== 'object') {
      const firstScript = document.getElementsByTagName('script')[0];

      const scriptHolder = document.createElement('script');
      scriptHolder.id = 'subscription-form-recaptcha';
      scriptHolder.type = 'text/javascript';
      scriptHolder.src = 'https://www.google.com/recaptcha/api.js?render=explicit';

      $(firstScript).prepend(scriptHolder);
    } else {
      isLoaded = true;
    }

    if (isLoaded) {
      widgetID = renderRecaptcha();
    } else {
      widgetID = waitForRecaptcha(renderRecaptcha);
    }

    return widgetID || false;
  };

  /**
   * Validate email field and activates recaptcha
   */
  const validateForm = (widgetID) => {
    const email = $(component).find(`#${component.id}-subscribe`).val();

    if (validateEmail(email)) {
      // Execute recaptcha test
      window.grecaptcha.execute(widgetID);

      $(component).children().hide();
      $(component).find('.sending').show();
    } else {
      $(component).find('.error').text('Insert a valid email.').show();
    }
  };

  /**
   * Set event on submit event handler
   * @param {string} widgetID
   */
  const initHandler = (widgetID) => {
    $(component).on('submit', (e) => {
      e.preventDefault();
      validateForm(widgetID);
    });
  };

  /**
   * Adds recaptcha and starts submit handler
   */
  const loadHandler = () => {
    const widgetID = enqueueRecaptcha();
    initHandler(widgetID);

    $(component).off('click');
  };

  const init = () => {
    $(component).on('click', () => {
      loadHandler();
    });
  };

  init();
};

$(() => {
  $('form.subscription-form').each((_, component) => {
    initSubscriptionForm(component);
  });
});
