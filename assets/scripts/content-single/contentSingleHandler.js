import $ from 'jquery';
import initUnlockedContentVideo from '../../../Components/_Objects/UnlockedContentVideo/script';
import cookieHandler from '../utils/cookie';

const contentSingleHandler = () => {
  /**
   * Content library back button
   * @returns {Undefined}
   */
  window.contentLibraryBackButton = (e) => {
    e.preventDefault();
    if (document.referrer !== '') {
      window.history.back();
    } else {
      window.location.href = e.target.dataset.href;
    }
    return false;
  };

  const contentSingleVideoUnlocker = (component, hasCookie) => {
    // get post info
    const postID = $(component).attr('data-post-id');
    // send request for said info

    const cookie = cookieHandler(`video-${postID}-unlocked`);

    const settings = {
      type: 'POST',
      url: window.FlyntData.ajaxurl,
      data: {
        action: 'single_content_video_unlocker',
        postID: postID,
      },
      beforeSend() {
        cookie.setCookie('1', 365);
        $('#content').html('<div class="loader__wrapper"><div class="spinner"></div></div>');
      },
      success(result) {
        const html = JSON.parse(result);
        $('#content').html(html);
        initUnlockedContentVideo($('.content-single-post.post--video'), hasCookie);
      },
    };

    $.ajax(settings);
  };

  /**
   * Content library single post video modal
   */
  $(() => {
    $('.content-single-post.gated--video').each((_, component) => {
      const postID = $(component).attr('data-post-id');
      const cookie = cookieHandler(`video-${postID}-unlocked`);
      // Unlock if cookie is present
      if (cookie.getCookie() === '1') {
        contentSingleVideoUnlocker(component, true);
      }

      // Unlock after confirmation
      $(document).on('gform_confirmation_loaded', (e, formId) => {
        e.preventDefault();
        if ($(component).attr('data-form-id') === `${formId}`) {
          contentSingleVideoUnlocker(component, false);
        }
      });
    });
  });
};

export default contentSingleHandler;
