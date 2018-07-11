import $ from 'jquery';
import waypoints from '../../../../node_modules/waypoints/lib/noframework.waypoints';

class RevealOnScroll {
  constructor() {
    this.itemsToReveal = $('.team-profile__wrap');
    this.contactItems = $('.contact__item-wrap');
    this.pageSectionLast = $('.page-section:last');
    this.hideInitially();
    this.createWaypoints();
  }

  hideInitially() {
    this.itemsToReveal.addClass('reveal-item');
    this.contactItems.addClass('reveal-item');
  }

  createWaypoints() {
    this.itemsToReveal.each(function() {
      var that = this;
      new Waypoint({
        element: that,
        handler: function() {
          $(that).addClass('reveal-item--is-visible');
        },
        offset: '90%'
      });
    });

    this.contactItems.each(function() {
      var that = this;
      new Waypoint({
        element: that,
        handler: function() {
          $(that).addClass('reveal-item--is-visible');
        },
        offset: '95%'
      });
    });
  }
}

export default RevealOnScroll;
