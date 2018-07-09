class Portfolio {
  constructor() {
      this.selector = 'all';
      this.PortfolioDivs = document.querySelectorAll('.mix'); // returns an array
    	this.PortfolioImages = document.querySelectorAll('.portfolio__image'); // returns an array
      this.menuButtons = document.querySelectorAll('.portfolio__selector'); // returns an array
      this.position = 0;
      this.modal = document.getElementById('modal');
      this.close = document.getElementsByClassName('modal__close')[0];
      this.next = document.getElementsByClassName('modal__pointer-next')[0];
      this.prev = document.getElementsByClassName('modal__pointer-prev')[0];
      this.imageWrap = document.getElementsByClassName('modal__wrap-image')[0];
    	this.events();

      //****************   METHODS   ************************
      this.getAllImages = function(sel) {
        //this.selector (sel) is set by menuButtons data-filter value (selectImages function bellow)
        //this method sets PortfolioImages to an array of images with selected class
        if (sel === 'all') {
          this.PortfolioImages = document.querySelectorAll('.portfolio__image');
        } else {
          var parents = document.querySelectorAll('.mix' + sel);
          var images = [];
          for(var i=0; i<parents.length; i++) {
            images.push(parents[i].childNodes[1]);
          }
          this.PortfolioImages = images;
        }
      }

      this.getOpeningPosition = function(element) {
        //gets the position of opening image
        for(var i = 0; i < this.PortfolioImages.length; i++) {
          if(this.PortfolioImages[i] === element) {
            var pos = i;
          }
        }
        return pos;
      }
      this.getElement = function(position) {
        for(var i = 0; i < this.PortfolioImages.length; i++) {
          if(i === position) {
            var el = this.PortfolioImages[i];
             }
           }
        return el;
      }
      this.setImage = function(element) {
        //get clicked element parents data-img attr
        var imageString = element.parentElement.getAttribute('data-img');
        //convert string data-img to node
        var wrapper= document.createElement('div');
        wrapper.innerHTML= imageString;
        var image= wrapper.firstChild;
       //remove width and height attribute
        image.removeAttribute('width');
        image.removeAttribute('height');

       //check if modal has an image
       var imgWrap = this.imageWrap;
       if( imgWrap.getElementsByTagName('img').length > 0 ) {
       //if there is an image get an array of them and remove them
         var elemImg = imgWrap.getElementsByTagName('img');
         for (var i = 0; i < elemImg.length; i++) {
           elemImg[i].parentNode.removeChild(elemImg[i]);
         }
       }
       //insert an image element from data-img into modal (before cation)
       imgWrap.appendChild(image);
      }
      this.pointersDisplay = function(p) {
        var last = this.PortfolioImages.length - 1;
        var first = 0;
        //if there is only one image hide next and prev buttons
        if (this.PortfolioImages.length === 1) {
          this.prev.style.visibility = "hidden";
          this.next.style.visibility = "hidden";
        } else if (p === last) {
          this.next.style.visibility = "hidden";
          this.prev.style.visibility = "visible";
        } else if (p === first) {
          this.prev.style.visibility = "hidden";
          this.next.style.visibility = "visible";
        } else {
          this.prev.style.visibility = "visible";
          this.next.style.visibility = "visible";
        }
      }
  }

  events() {
    for (var i = 0; i<this.PortfolioDivs.length; i++) {
      this.PortfolioDivs[i].addEventListener('click', this.startModal.bind(this));
    }
    for (var i = 0; i<this.menuButtons.length; i++) {
      this.menuButtons[i].addEventListener('click', this.reselectImages.bind(this));
    }
    this.close.addEventListener('click', this.closeModal.bind(this));
    this.next.addEventListener('click', this.nextImage.bind(this));
    this.prev.addEventListener('click', this.prevImage.bind(this));
    window.addEventListener('load', this.selectImages.bind(this));
  }

  selectImages() {
    for (var i = 0; i<this.menuButtons.length; i++) {
      var active = this.menuButtons[i].getAttribute('class');
      if(active === 'button__menu portfolio__selector mixitup-control-active') {
        this.selector = this.menuButtons[i].getAttribute('data-filter');
      }
    }
    this.getAllImages(this.selector);
  }
  reselectImages() {
    //get data-filter value from clicked object and set this.selector to data-filter value
    this.selector = event.target.getAttribute('data-filter'); //returns a string filter
    //run a getAllImages method with this.selector parameter
    this.getAllImages(this.selector);
  }

  startModal(event) {
    var clickedElement = event.target.parentElement.childNodes[1];
    //get clicked elements position
    this.position = this.getOpeningPosition(clickedElement);
    //set displayed image of element
    this.setImage(clickedElement);
    //pointers display logic
    this.pointersDisplay(this.position);
    //display Modal
    this.modal.style.display = "block";
  }

  closeModal() {
    this.modal.style.display = "none";
  }

  nextImage() {
    //set position to next index
    this.position += 1;
    //get the element with positions index
    var setElement = this.getElement(this.position);
    //pointers display logic
    this.pointersDisplay(this.position);
    //set image of setElement
    this.setImage(setElement);
  }

  prevImage() {
    //set position to next index
    this.position -= 1;
    //get the element with positions index
    var setElement = this.getElement(this.position);
    //pointers display logic
    this.pointersDisplay(this.position);
    //set image of setElement
    this.setImage(setElement);
  }
}

export default Portfolio;
