"use strict";

/* -------------------------------------------------------------------------- */
/*                              Config                                        */
/* -------------------------------------------------------------------------- */
var CONFIG =
 {
  isNavbarVerticalCollapsed: false,
  theme: 'light',
  isRTL: false,
  isFluid: true,
  navbarStyle: 'vibrant',
  navbarPosition: 'vertical'
};
Object.keys(CONFIG).forEach(function (key) {
  if (localStorage.getItem(key) === null) {
    localStorage.setItem(key, CONFIG[key]);
  }
});
if (JSON.parse(localStorage.getItem('isNavbarVerticalCollapsed'))) {
  document.documentElement.classList.add('navbar-vertical-collapsed');
}