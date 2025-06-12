import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);


class App {
    constructor() {
        this.slides = document.querySelectorAll('.slide');
        this.scrollDrivenSliderSticky();
    }

    scrollDrivenSliderSticky() {

        if (document.querySelector('.paragraphs-list')) {
            gsap.to('.paragraph', {
                xPercent: 100 * (this.slides.length - 1) * 4.5,
                ease: 'none',
                scrollTrigger: {
                    trigger: '.paragraphs-list',
                    start: 'top top',
                    // end: () => '+=' + document.querySelector('.paragraphs-list').offsetWidth,
                    scrub: true,
                    pin: true,
                    anticipatePin: 1,

                }
            });
        }
    }


}

new App();