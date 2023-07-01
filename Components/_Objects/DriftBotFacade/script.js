/* eslint-disable no-undef */
/* eslint-disable no-shadow */
/* eslint-disable prefer-rest-params */
/* eslint-disable no-sequences */
/* eslint-disable no-unused-expressions */
/* eslint-disable no-console */
// Eslint disabled for issues with standard drift scripts
import $ from 'jquery';

const DrifFacade = () => {
  const facade = $('.drift-facade');
  const optimizeVar = window.optimize_drift ? window.optimize_drift : 'drift';
  const driftID = $('#drift-trigger--main').attr('data-drift-id');
  const spinnerObj =
    '<span class="spinner-border active spinner-border-sm" role="status" aria-hidden="true"></span>';

  let bubble;
  let bubbleExit;
  let facadeButton;

  /**
   * Handles Google Optimize variable that enables facade
   */
  if (optimizeVar === 'facade') {
    bubble = $(facade).find('.text-bubble');
    bubbleExit = $(facade).find('#pop-bubble');
    facadeButton = $(facade).find('#drift-trigger--main');
  }

  /**
   *
   * Add listen to Gforms confirmation event to make sure facade can be triggered
   * by it's buttons;
   */
  const gformConfirmationListener = () => {
    $(document).on('gform_confirmation_loaded', botsFacadeController);
  };

  /**
   * Get all links with bot anchors like #leadbot-
   */
  const findBotTargets = () => {
    const botTargets = [];
    const botAnchors = [
      '#leadbot-',
      '#book-a-demo',
      '#get-a-trial',
      '#PartnerBot',
      '#convo-starter-template',
    ];

    botAnchors.forEach((item) => {
      const targets = $(`a[href^="${item}"]`);
      if (targets[0]) {
        botTargets.push(targets);
      }
    });

    return botTargets;
  };

  /**
   * Hide facade after load
   * @returns void
   */
  const hideFacade = () => {
    if (typeof drift.openChat !== 'undefined') {
      $(facade).fadeOut(300);

      drift.openChat();

      // TODO - Improve chat opening tracking
      setTimeout(() => {
        $('.spinner-border').removeClass('active');
      }, 2000);
    } else {
      setTimeout(hideFacade, 300);
    }
  };

  /**
   * Download Drift and hide facade
   */
  const loadDriftScripts = () => {
    const t = (window.driftt = window.drift = window.driftt || []); // eslint-disable-line no-multi-assign

    if (window.isDesktop) {
      if (!t.init) {
        if (t.invoked)
          return undefined(
            window.console && console.error && console.error('Drift snippet included twice.'),
          );
        (t.invoked = !0),
          (t.methods = [
            'identify',
            'config',
            'track',
            'reset',
            'debug',
            'show',
            'ping',
            'page',
            'hide',
            'off',
            'on',
          ]),
          (t.factory = function (e) {
            return function () {
              const n = Array.prototype.slice.call(arguments);
              return n.unshift(e), t.push(n), t;
            };
          }),
          t.methods.forEach((e) => {
            t[e] = t.factory(e);
          }),
          (t.load = function (t) {
            const e = 3e5;
            const n = Math.ceil(new Date() / e) * e;
            const o = document.createElement('script');
            (o.type = 'text/javascript'),
              (o.async = !0),
              (o.crossorigin = 'anonymous'),
              (o.src = `https://js.driftt.com/include/${n}/${t}.js`);
            const i = document.getElementsByTagName('script')[0];
            i.parentNode.insertBefore(o, i);
          });
      }

      drift.SNIPPET_VERSION = '0.3.1'; // eslint-disable-line no-undef
      drift.load(driftID); // eslint-disable-line no-undef
      drift.on('emailCapture', (api) => /* eslint-disable-line no-unused-vars */ {
        drift.api.setUserAttributes({
          GCLID: new URLSearchParams(window.location.search).get('gclid'),
        });
      });
    }

    return true;
  };

  const startFacade = () => {
    if (window.isDesktop()) {
      $(facade).css('display', 'flex');

      $(facadeButton).on('click', function () {
        $(bubble).fadeOut(200);
        $(this).toggleClass('loading');

        if (driftID) {
          loadDriftScripts(driftID);
          hideFacade();
        }
      });

      $(bubbleExit).on('click', () => {
        $(bubble).fadeOut();
      });
    }
  };

  const botsFacadeController = () => {
    const targets = findBotTargets();

    if (targets.length > 0) {
      $(targets).each((id, item) => {
        $(item).on('click', (e) => {
          e.preventDefault();
          $(item).append(spinnerObj);

          loadDriftScripts(driftID);

          window.location.href = $(item).attr('href');
          hideFacade($(item));
        });
      });
    }
  };

  /**
   *
   * Facade button's handling
   * @returns void
   */
  const initComponent = () => {
    if (optimizeVar === 'facade') {
      startFacade();
      botsFacadeController();
      gformConfirmationListener();
    } else if (optimizeVar === 'drift') {
      loadDriftScripts(driftID);
    } else {
      loadDriftScripts(driftID);
    }

    return true;
  };

  return {
    init: initComponent,
  };
};

$(window).on('load', () => {
  const driftFacade = DrifFacade();

  driftFacade.init();
});
