import $ from 'jquery';

class MobileMenu {
  constructor() {
    this.burgerIcon = $('.toggle-nav');
    this.menu = $('.menu-menu-1-container');
    this.menuItem = $('.menu-item.a');
    this.window = $(window);
    this.primaryNav = $('.primary-nav');
    this.width;
    this.events();
    this.getWidth();
  }

  events() {
    this.burgerIcon.click(this.toggleMenu.bind(this));
    this.window.resize(this.getWidth.bind(this));
    this.menu.click(this.closeMenu.bind(this));
  }

  closeMenu() {
    if (this.width < 970) {
      this.menu.toggleClass('menu-menu-1-container--is-visible');
      this.burgerIcon.toggleClass('toggle-nav--close-x');
      this.primaryNav.toggleClass('primary-nav--is-expanded');
    }
  }

  getWidth() {
    this.width = this.window.width();
  }

  toggleMenu(e) {
    e.preventDefault();
    this.menu.toggleClass('menu-menu-1-container--is-visible');
    this.burgerIcon.toggleClass('toggle-nav--close-x');
    this.primaryNav.toggleClass('primary-nav--is-expanded');
  }
}

export default MobileMenu;
