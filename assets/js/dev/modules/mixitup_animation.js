var containerEl = document.querySelector('[data-ref~="mixitup-container"]');

            var mixer = mixitup(containerEl, {
                selectors: {
                    target: '[data-ref~="mixitup-target"]'
                },
                animation: {
                  duration: 500
                },
                load: {
                  filter: '.dean'
                }
            });
