import $ from 'jquery';
import enableLazyLoadBackground from '../../assets/scripts/utils/lazyload-background';

const initHomeClients = (component) => {
  if ($(component).find('lazyload-bg').length > 0 || $(component).hasClass('lazyload-bg')) {
    enableLazyLoadBackground(component);
  }
};

$(() => {
  $('.client-reviews').each((id, component) => {
    initHomeClients(component);
  });
});
