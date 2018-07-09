class MobileMenu {
  constructor() {
    this.burgerIcon = document.getElementsByClassName('toggle-nav')[0];
    this.menu = document.getElementsByClassName('menu-menu-1-container')[0];
    this.primaryNav = document.getElementsByClassName('primary-nav')[0];
    this.events();
  }

  events() {
    this.burgerIcon.addEventListener('click', this.toggleMenu.bind(this));
  }

  toggleMenu(e) {
    e.preventDefault();
    this.menu.classList.toggle('menu-menu-1-container--is-visible');
    this.burgerIcon.classList.toggle('toggle-nav--close-x');
    this.primaryNav.classList.toggle('primary-nav--is-expanded');
  }
}

export default MobileMenu;
