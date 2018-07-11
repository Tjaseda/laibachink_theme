import $ from 'jquery';
import waypoints from '../../../../node_modules/waypoints/lib/noframework.waypoints';
import SweetScroll from 'sweet-scroll';

class StickyHeader {
  constructor() {
    this.siteHeader = $('.primary-nav');
    this.headerTrigger = $('.large-hero__text-content');
    this.window = $(window);
    this.width;
    this.createHeaderWaypoint();
    this.getWidth();
    this.pageSections = $('.page-section');
    this.headerLinks = $('.nav-link');
    this.addSmoothScrolling();
    this.events();
  }

  events() {
    this.window.resize(this.getWidth.bind(this));
  }

  getWidth() {
    this.width = this.window.width();
    this.createHeaderWaypoint();
  }

  addSmoothScrolling() {
    document.addEventListener('DOMContentLoaded', () => {
      const scroller = new SweetScroll({ trigger: '[data-scroll]', duration: 2000 });
    }, false);
  }

  createHeaderWaypoint() {
    var that = this;
    new Waypoint({
      element: this.headerTrigger[0],
      handler: function(direction) {
        if (direction == "down" && that.width >= 970) {
          that.siteHeader.css('background-color', 'rgba(0, 0, 0, 0.8)');
        } else if (direction == "up" && that.width >= 970){
          that.siteHeader.css('background-color', 'rgba(0, 0, 0, 0.5)');
        }
      }
    });
  }
}

export default StickyHeader;
