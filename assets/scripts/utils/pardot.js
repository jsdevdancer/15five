import $ from 'jquery';

export default function sendDataToPardot(email, gclid, formElement, pardotUrl = false) {
  $.ajax({
    type: 'POST',
    url: window.FlyntData.ajaxurl,
    data: {
      action: 'send_data_to_pardot',
      nonce: $('.subscription-form').data('nonce'),
      location: formElement,
      email: email,
      pardotUrl: pardotUrl,
      gclid: gclid,
    },

    success: (response) => {
      if (typeof response === 'string') {
        if (!response.includes('error')) {
          $(`#${formElement}`).children().hide();
          $(`#${formElement}`).find('.success').show();
        } else {
          $(`#${formElement}`).css('flex-direction', 'row-reverse');
          $(`#${formElement}`).find('.error').show();
        }
      }
    },
  });
}
