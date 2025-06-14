export class Observer {

    constructor() {
        this.showUpElements = document.querySelectorAll(`[data-animation="show-up"]`);

        this.showUpElements.forEach((showUpElement) => {
            showUpElement.classList.add('no-opacity');
        });

        this.showUpObserver = new IntersectionObserver(this.showUpAnimation);

        this.observeAction();
        this.delay = 0;
    }

    showUpAnimation = (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('show-up');
                    entry.target.classList.remove('no-opacity');
                }, this.delay);

                this.delay += 100;
            }
        });

        this.delay = 0;
    }


    observeAction() {
        this.showUpElements.forEach((element) => {
            this.showUpObserver.observe(element);
        });

    }
}
new Observer();