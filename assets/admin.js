/* globals FlyntData, FlyntComponentScreenshots */

import $ from 'jquery';
import './admin.scss';

/**
 * Component Screenshot
 *
 */
const ajaxCache = {};

function init() {
  const $body = $('body');

  $body.on('mouseenter', 'a[data-layout]', (e) => {
    const $target = $(e.currentTarget);
    const layout = $target.data('layout');
    showComponentScreenshot(layout, $target.closest('.acf-fc-popup'));
  });

  $body.on('mouseleave', 'a[data-layout]', (e) => {
    const $target = $(e.currentTarget);
    hideComponentScreenshot($target.closest('.acf-fc-popup'));
  });
}

function showComponentScreenshot(layout, $wrapper) {
  const componentName = firstToUpperCase(layout);
  /* eslint-disable-next-line max-len */
  const image = `${FlyntData.templateDirectoryUri}/${FlyntComponentScreenshots.components[componentName]}/screenshot.png`;
  const $wrapperContainer = $("<div class='flyntComponentScreenshot-imageWrapper'>").appendTo(
    $wrapper,
  );

  getImage(image).done(() => {
    $wrapperContainer.prepend(`<img class='flyntComponentScreenshot-image' src='${image}'>`);
  });
}

function hideComponentScreenshot($wrapper) {
  $wrapper.find('.flyntComponentScreenshot-imageWrapper').remove();
}

function firstToUpperCase(str) {
  return str.substr(0, 1).toUpperCase() + str.substr(1);
}

function getImage(image) {
  if (!ajaxCache[image]) {
    ajaxCache[image] = $.ajax({
      url: image,
    });
  }
  return ajaxCache[image];
}

$(init);

function importAll(r) {
  r.keys().forEach(r);
}

importAll(require.context('../Components/', true, /\/admin\.js$/));
