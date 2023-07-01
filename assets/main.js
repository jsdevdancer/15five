import 'normalize.css/normalize.css';
import './main.scss';
import $ from 'jquery';
import contentSingleHandler from './scripts/content-single/contentSingleHandler';

// jQuery
window.$ = $;
window.jQuery = $;

// Global Variables
window.DESKTOP_BREAKPOINT = 992;
window.ANIMATION_TIME = 500;
window.IS_DESKTOP_CLASS = 'is-desktop';
window.NO_SCROLL_CLASS = 'no-scroll';

// Global functions
/**
 * Checks if it's desktop by checking the existence of a class and the
 * window width (if equal or higher than 992px)
 * @returns {Boolean} true if it's desktop, false otherwise
 */
window.isDesktop = () => {
  if (
    $('html').hasClass(window.IS_DESKTOP_CLASS) &&
    $(window).width() >= window.DESKTOP_BREAKPOINT
  ) {
    return true;
  }
  return false;
};

// Scripts for content post type templates
contentSingleHandler();

// Lazy loading
window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.preloadAfterLoad = true;
require('lazysizes');

// Retina support for inline background images
if (window.devicePixelRatio >= 1.5) {
  const elems = document.getElementsByTagName('*');
  for (let i = 0; i < elems.length; i++) {
    const newImageURL = elems[i].getAttribute('data-2x');
    if (newImageURL) {
      let inlineStyle = elems[i].style.cssText;
      inlineStyle = inlineStyle.replace(/url\(['|"](.*)['|"]\)/g, () => `url('${newImageURL}')`);

      elems[i].style.cssText = inlineStyle;
    }
  }
}

function importAll(r) {
  r.keys().forEach(r);
}

importAll(require.context('../Components/', true, /\/script\.js$/));

// Global Navigation Variables
// CSS classes
const menuOpenClass = 'mobile-menu-open';
const subMenuOpenClass = 'mobile-sub-menu-open';
const isDesktopClass = 'is-desktop';
const isHoverClass = 'is-hover';
const isOnScrollClass = 'navbar__wrapper--on-scroll';
// DOM Elements
const navbarWrapper = $('.navbar__wrapper');
const navbarMenu = $('.navbar__menu');
const navbarBurger = $('.navbar__burger');
const navBarMenuItemMegaMenu = $('.navbar__menu__item.has-mega-menu');
const navBarMenuLinkMegaMenu = $('.navbar__menu__item.has-mega-menu .navbar__menu__link');
const megaMenu = $('.navbar__mega-menu');
const navBarButtons = $('.navbar__buttons');

// Functions
/**
 * Checks if it's desktop by checking the existence of a class and the
 * window width (if equal or higher than 992px)
 * @returns {Boolean} true if it's desktop, false otherwise
 */
const isDesktop = () => {
  if (navbarWrapper.hasClass(isDesktopClass) && $(window).width() >= window.DESKTOP_BREAKPOINT) {
    return true;
  }
  return false;
};

/**
 * Hides mega menus, remove hover class and change aria label
 * @returns {undefined}
 */
const hideMegaMenu = () => {
  if (isDesktop()) {
    megaMenu.hide();
    navBarMenuLinkMegaMenu.removeClass(isHoverClass).attr('aria-expanded', 'false');
  }
};

/**
 * Rearranges the menu for desktop
 * @returns {undefined}
 */
const desktopMenu = () => {
  // If equal or higher than 992px
  if ($(window).width() >= window.DESKTOP_BREAKPOINT) {
    // Add class to menu wrapper
    navbarWrapper.addClass(isDesktopClass);

    // Move menu and buttons
    navbarMenu.insertAfter('.navbar__logo').show();
    navBarButtons.insertAfter(navbarMenu).show();

    // Close open mega menus
    megaMenu.hide();
  } else {
    navbarWrapper.removeClass(isDesktopClass);

    // Verify if 'navbarMenu' is already on the right DOM position. If not move it
    if (navbarMenu.prev().attr('class') !== navbarWrapper.attr('class')) {
      navbarMenu.insertAfter(navbarWrapper);
    }

    // Verify if 'navBarButtons' is already on the right DOM position. If not move it
    if (navBarButtons.parent().attr('class') !== navbarMenu.attr('class')) {
      navBarButtons.appendTo(navbarMenu);
    }

    // Close if menu is open
    !navbarBurger.hasClass(menuOpenClass) && navbarMenu.hide();

    // Close open mega menus
    megaMenu.hide();
  }
};

// Calls desktopMenu() on load and on window resize
desktopMenu();
$(window).on('resize', () => {
  desktopMenu();
});

/**
 * Opens mobile menu on click
 */
navbarBurger.on('click', (e) => {
  e.preventDefault();
  const thisButton = $(e.currentTarget);

  // Toggles scroll class
  navbarWrapper.toggleClass(isOnScrollClass);

  // Changes aria label
  !thisButton.hasClass(menuOpenClass)
    ? thisButton.attr('aria-expanded', 'true')
    : thisButton.attr('aria-expanded', 'false');

  // Toggles class
  thisButton.toggleClass(menuOpenClass);

  // Toggles block vertical scroll
  $('html').toggleClass(window.NO_SCROLL_CLASS);

  // Toggles mobile menu
  navbarMenu.toggle();
});

/**
 * Opens mobile menu items on click
 */
navBarMenuLinkMegaMenu.on('click', (e) => {
  if (!isDesktop()) {
    const thisLink = $(e.currentTarget);
    const thisListItem = thisLink.parent();
    const thisMegaMenu = thisLink.next(megaMenu);

    // Toggle slide submenu
    if (!thisLink.hasClass(subMenuOpenClass)) {
      // Add height: auto
      thisListItem.addClass('u-height-auto');
      // Add 'mobile-sub-menu-open' class
      thisLink.addClass(subMenuOpenClass);
      // Show submenu
      thisMegaMenu.slideDown(window.ANIMATION_TIME);
      // Update aria
      thisLink.attr('aria-expanded', 'true');
    } else {
      // Remove 'mobile-sub-menu-open' class
      thisLink.removeClass(subMenuOpenClass);
      // Hide submenu
      thisMegaMenu.slideUp(window.ANIMATION_TIME, () => {
        // Remove height: auto
        thisListItem.removeClass('u-height-auto');
      });
      // Update aria
      thisLink.attr('aria-expanded', 'false');
    }
  }
});

/**
 * Opens mega menus on desktop, on mouseenter or when hitting Enter
 */
navBarMenuLinkMegaMenu.on('mouseenter keyup', (e) => {
  if (isDesktop()) {
    if (e.type === 'mouseenter' || (e.type === 'keyup' && e.key === 'Enter')) {
      const thisLink = $(e.currentTarget);
      const thisMegaMenu = thisLink.next(megaMenu);

      if (!thisLink.hasClass(isHoverClass)) {
        hideMegaMenu();
        // Adds class the hovered link
        thisLink.addClass(isHoverClass).attr('aria-expanded', 'true');
        // Shows the hovered one
        thisMegaMenu.show();
      } else {
        hideMegaMenu();
      }
    }
  }
});

/**
 * Close menu when pressing Escape key
 */
$(document).on('keyup', (e) => {
  if (e.key === 'Escape') {
    hideMegaMenu();
  }
});

/**
 * Closes mega menus on desktop, on mouseleave
 */
navBarMenuItemMegaMenu.on('mouseleave', () => {
  hideMegaMenu();
});
