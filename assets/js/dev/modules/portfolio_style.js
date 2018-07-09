class PortfolioStyle {
  constructor() {
    this.images = document.querySelectorAll('.mix'); //returns an array
    this.meta = document.getElementsByClassName('portfolio__meta'); //returns an array
    this.overlay = document.getElementsByClassName('portfolio__overlay'); //returns an array
    this.events();
  }
  events() {
    for (var i = 0; i<this.images.length; i++) {
      this.images[i].addEventListener('mouseover', this.showOverlay.bind(this));
      this.images[i].addEventListener('mouseout', this.hideOverlay.bind(this));
    }
  }

  showOverlay(event) {
    var hovered = event.target.parentElement;
    var hoveredMeta = hovered.childNodes[5];
    var hoveredOverlay = hovered.childNodes[3];
    hoveredMeta.style.opacity = "1";
    hoveredOverlay.style.opacity = "1";
  }

  hideOverlay() {
    for (var i = 0; i<this.meta.length; i++) {
      this.meta[i].style.opacity = "0";
    }
    for (var i = 0; i<this.overlay.length; i++) {
      this.overlay[i].style.opacity = "0";
    }
  }
}

export default PortfolioStyle;
