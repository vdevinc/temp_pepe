// ==========Menu Toggle=============

var menuButton = $('.menu-button'),
    navItems   = $('.nav-wrap li');

menuButton.click(function() {
  navItems.toggleClass('active');
});