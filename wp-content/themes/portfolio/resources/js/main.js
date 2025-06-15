import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);


class App {
    constructor() {
        this.slides = document.querySelectorAll('.slide');
        this.scrollDrivenSliderSticky();
        this.viewportWidth = window.innerWidth;
    }

    scrollDrivenSliderSticky() {

        if (document.querySelector('.paragraphs-list')) {
            gsap.to('.paragraph', {
                xPercent: 100 * (this.slides.length - 1) * (this.viewportWidth < 410 ? 4.7 : 4.5),
                ease: 'none',
                scrollTrigger: {
                    trigger: '.paragraphs-list',
                    start: 'top top',
                    scrub: true,
                    pin: true,
                    anticipatePin: 1,

                }
            });
        }
    }


}

new App();