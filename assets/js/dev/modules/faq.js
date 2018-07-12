class Faq {
  constructor() {
    this.selectors = document.querySelectorAll('[data-selector]');
    this.selector;
    this.wrap = document.getElementsByClassName('faq__item-wrap')[0];
    this.items = document.querySelectorAll('.faq__item');
    this.events();

    this.displayItem = function(element) {
      var selector = element.getAttribute('data-selector');
      var itemSelector;
      var item;

      for (var i=0; i<this.items.length; i++) {
        itemSelector = this.items[i].getAttribute('data-selected');
        if(itemSelector === selector) {
          item = this.items[i];
          this.items[i].classList.add('visible');
        }
        else {
          this.items[i].classList.remove('visible');
        }
      }

      this.setHeight(item);
    }

    this.setHeight = function(element) {
      var height = element.offsetHeight;

      this.wrap.style.height = height + 'px';
    }
  }

  events() {
    window.addEventListener('load', this.activateButton.bind(this));
    window.addEventListener('resize', this.resizeFaq.bind(this));
    for (var i=0; i<this.selectors.length; i++) {
      this.selectors[i].addEventListener('click', this.reactivateButton.bind(this))
    }
  }

  activateButton() {
    for (var i=0; i<this.selectors.length; i++) {
      if(i === 0) {
        this.selector = this.selectors[i];
      }
      else {
        this.selectors[i].classList.remove('active');
      }
    }

    this.selector.classList.add('active');

    this.displayItem(this.selector);
  }

  resizeFaq() {
    this.displayItem(this.selector);
  }

  reactivateButton(event) {
    this.selector = event.target;

    for (var i=0; i<this.selectors.length; i++) {
      this.selectors[i].classList.remove('active');
    }

    this.selector.classList.add('active');
    this.displayItem(this.selector);
  }
}

export default Faq;
