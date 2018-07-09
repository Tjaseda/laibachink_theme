class LoadMoreButton {
  constructor() {
    this.PortfolioImages = document.querySelectorAll('.portfolio__image'); // returns an array
    this.PortfolioDivs = document.querySelectorAll('.mix'); // returns an array
    this.displayedImages;
    this.notDisplayedImages;
    this.count;
    this.menuButtons = document.querySelectorAll('.portfolio__selector'); // returns an array
    this.loadMoreButton = document.getElementsByClassName('button__load-more')[0];
    this.loadMoreButtonText = document.getElementsByClassName('button__load-more')[0].textContent;
    this.innerWidth;
    this.events();

    this.getAllImages = function(sel) {
      //this.selector (sel) is set by menuButtons data-filter value (selectImages function bellow)
      //this method sets PortfolioImages to an array of images with selected class
      var parents = document.querySelectorAll('.mix' + sel);
      var images = [];
      for(var i=0; i<parents.length; i++) {
        images.push(parents[i].childNodes[1]);
      }
      this.PortfolioImages = images;
      this.PortfolioDivs = parents;
    }

    this.displayLoadMoreButton = function(width) {
      //8 images in a row
      if (width > 1550 && this.PortfolioImages.length > 15) {
        this.loadMoreButton.style.visibility = "visible";
      }
      //6 images in a row
      else if (width < 1550 && width > 970 && this.PortfolioImages.length > 12){
        this.loadMoreButton.style.visibility = "visible";
      }
      //4 images in a row
      else if (width < 970 && width > 740 && this.PortfolioImages.length > 12){
        this.loadMoreButton.style.visibility = "visible";
      }
      //3 images in a row
      else if (width < 740 && width > 500 && this.PortfolioImages.length > 9){
        this.loadMoreButton.style.visibility = "visible";
      }
      //2 images in a row
      else if (width < 500 && this.PortfolioImages.length > 8){
        this.loadMoreButton.style.visibility = "visible";
      }
      else {
        this.loadMoreButton.style.visibility = "hidden";
      }
  }

  this.hideImages = function(width) {
    var displayed = [];
    var notDisplayed = [];

    //8 images in a row
    if (width > 1550) {
      for (var i=0; i<this.PortfolioDivs.length; i++) {
        if (i < 16) {
          displayed.push(this.PortfolioDivs[i]);
        } else {
          notDisplayed.push(this.PortfolioDivs[i]);
        }
      }
    }
    //6 images in a row
    else if (width < 1550 && width > 970) {
      for (var i=0; i<this.PortfolioDivs.length; i++) {
        if (i < 12) {
          displayed.push(this.PortfolioDivs[i]);
        } else {
          notDisplayed.push(this.PortfolioDivs[i]);
        }
      }
    }
    //4 images in a row
    else if (width < 970 && width > 740) {
      for (var i=0; i<this.PortfolioDivs.length; i++) {
        if (i < 12) {
          displayed.push(this.PortfolioDivs[i]);
        } else {
          notDisplayed.push(this.PortfolioDivs[i]);
        }
      }
    }
    //3 images in a row
    else if (width < 740 && width > 500) {
      for (var i=0; i<this.PortfolioDivs.length; i++) {
        if (i < 9) {
          displayed.push(this.PortfolioDivs[i]);
        } else {
          notDisplayed.push(this.PortfolioDivs[i]);
        }
      }
    }
    //2 images in a row
    else if (width < 500) {
      for (var i=0; i<this.PortfolioDivs.length; i++) {
        if (i < 8) {
          displayed.push(this.PortfolioDivs[i]);
        } else {
          notDisplayed.push(this.PortfolioDivs[i]);
        }
      }
    }
    this.displayedImages = displayed;
    this.notDisplayedImages = notDisplayed;

    this.hide(this.displayedImages, this.notDisplayedImages);
  }

  this.hide = function(ds, hd) {
      for (var i=0; i<hd.length; i++) {
        hd[i].style.position = "absolute";
        hd[i].style.top = "-9999px";
        hd[i].style.left = "-9999px";
      }
      for (var i=0; i<ds.length; i++) {
        ds[i].style.position = "relative";
        ds[i].style.top = "0";
        ds[i].style.left = "0";
    }
  }
}

  events() {
    window.addEventListener('load', this.displayButton.bind(this));
    window.addEventListener('resize', this.displayButton.bind(this));
    for (var i = 0; i<this.menuButtons.length; i++) {
      this.menuButtons[i].addEventListener('click', this.resetImages.bind(this));
    }
    this.loadMoreButton.addEventListener('click', this.displayMore.bind(this));
  }

  displayMore() {
    var width = window.innerWidth;
    var count = this.notDisplayedImages.length;
    var displayed = this.displayedImages;
    var notDisplayed = this.notDisplayedImages;

    //8 images in a row
    if (width > 1550) {
      if (this.loadMoreButtonText === "Vec Slik") {
        for(var i=notDisplayed.length - 1; i >= 0; i -= 1) {
          if(i < 8) {
            displayed.push(notDisplayed[i]);
            notDisplayed.splice(i, 1);
          }
        }
      } else {
        for(var i=displayed.length - 1; i >= 16; i -= 1) {
          notDisplayed.push(displayed[i]);
          displayed.splice(i, 1);
        }
      }
    }
    //6 images in a row
    else if (width < 1550 && width > 970) {
      if (this.loadMoreButtonText === "Vec Slik") {
        for(var i=notDisplayed.length - 1; i >= 0; i -= 1) {
          if(i < 6) {
            displayed.push(notDisplayed[i]);
            notDisplayed.splice(i, 1);
          }
        }
      } else {
        for(var i=displayed.length - 1; i >= 12; i -= 1) {
          notDisplayed.push(displayed[i]);
          displayed.splice(i, 1);
        }
      }
    }
    //4 images in a row
    else if (width < 970 && width > 740) {
      if (this.loadMoreButtonText === "Vec Slik") {
        for(var i=notDisplayed.length - 1; i >= 0; i -= 1) {
          if(i < 8) {
            displayed.push(notDisplayed[i]);
            notDisplayed.splice(i, 1);
          }
        }
      } else {
        for(var i=displayed.length - 1; i >= 12; i -= 1) {
          notDisplayed.push(displayed[i]);
          displayed.splice(i, 1);
        }
      }
    }
    //3 images in a row
    else if (width < 740 && width > 500) {
      if (this.loadMoreButtonText === "Vec Slik") {
        for(var i=notDisplayed.length - 1; i >= 0; i -= 1) {
          if(i < 6) {
            displayed.push(notDisplayed[i]);
            notDisplayed.splice(i, 1);
          }
        }
      } else {
        for(var i=displayed.length - 1; i >= 9; i -= 1) {
          notDisplayed.push(displayed[i]);
          displayed.splice(i, 1);
        }
      }
    }
    //2 images in a row
    else if (width < 500) {
      if (this.loadMoreButtonText === "Vec Slik") {
        for(var i=notDisplayed.length - 1; i >= 0; i -= 1) {
          if(i < 6) {
            displayed.push(notDisplayed[i]);
            notDisplayed.splice(i, 1);
          }
        }
      } else {
        for(var i=displayed.length - 1; i >= 8; i -= 1) {
          notDisplayed.push(displayed[i]);
          displayed.splice(i, 1);
        }
      }
    }

    this.displayedImages = displayed;
    this.notDisplayedImages = notDisplayed;

    if(this.notDisplayedImages.length === 0) {
      this.loadMoreButton.textContent = "Manj Slik";
    }
    else {
      this.loadMoreButton.textContent = "Vec Slik";
    }

    this.loadMoreButtonText = this.loadMoreButton.textContent;
    this.hide(this.displayedImages, this.notDisplayedImages);
  }

  displayButton() {
    //Set images
    this.innerWidth = window.innerWidth;

    for (var i = 0; i<this.menuButtons.length; i++) {
      var active = this.menuButtons[i].getAttribute('class');
      if(active === 'button__menu portfolio__selector mixitup-control-active') {
        this.selector = this.menuButtons[i].getAttribute('data-filter');
      }
    }
    this.getAllImages(this.selector);
    this.displayLoadMoreButton(this.innerWidth);
    this.hideImages(this.innerWidth);
  }

  resetImages() {
    // 1. SELECT IMAGES
    // get data-filter value from clicked object and set this.selector to data-filter value
    this.selector = event.target.getAttribute('data-filter'); //returns a string filter
    //run a getAllImages method with this.selector parameter - sets this.PotfolioImages array to only include images with selected parameter
    this.getAllImages(this.selector);
    //run a displayLoadMoreButton method with current screen width
    this.displayLoadMoreButton(this.innerWidth);
    this.hideImages(this.innerWidth);
  }
}

export default LoadMoreButton;
