const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-ul');
    const navul = document.querySelectorAll('.nav-ul li ');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        navul.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            }
            else {
                link.style.animation = `nav-optionFade 0.3s ease forwards ${index / 7 + 0.5}s`;
            }
        });
        burger.classList.toggle('toggle');
    });
}
navSlide();
// ...............................................👇animation👇.................................................
let tl = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '0%',
        end: '100%',
        scrub: 1,
    }
});
let tl2 = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '0%',
        end: '100%',
        scrub: 1,
    }
});
let tl4 = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '0%',
        end: '100%',
        scrub: 1,
    }
});
let tl5 = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '0%',
        end: '100%',
        scrub: 1,
    }
});
let tl6 = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '0%',
        end: '100%',
        scrub: 1,
    }
});
let tl7 = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '0%',
        end: '100%',
        scrub: 1,
    }
});
let tl8 = gsap.timeline({
    scrollTrigger: {
        trigger: '.sec',
        start: '25%',
        end: '80%',
        scrub: 1,
    }
});
let tl9 = gsap.timeline({
    scrollTrigger: {
        trigger: '.nav-container',
        start: '0%',
        end: '1%',
        scrub: 1,
    }
});
let tl10 = gsap.timeline({
    scrollTrigger: {
        trigger: '.nav-container',
        start: '0%',
        end: '1%',
        scrub: 1,
    }
});
let tl3 = gsap.timeline({
    scrollTrigger: {
        trigger: '.nav-container',
        start: '0%',
        end: '5000%',
        scrub: 1,
        pin: true,
        pinSpacing: false,

    }
});
tl.to(".intro-text", { y: -70 });
tl2.to(".tour-svg", { y: -70 });
tl4.to(".wave-img", { y: 50 });
tl5.fromTo("#girl", { opacity: 1 }, { opacity: 0, x: 70 });
tl6.fromTo("#plane", { x: 40, y: 10 }, { x: -500, y: -50 });
tl7.to("#sun", { y: 60 });
tl8.fromTo(".form-container", { x: -80, opacity: 0 }, { x: 0, opacity: 1 });
tl9.to(".nav-container", {
    backgroundColor: "#332f2f", color: "rgb(255, 255, 255)"
});
tl10.to(".nav-option a", {
    color: "rgb(255, 255, 255)"
});