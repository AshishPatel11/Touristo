const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.list-container');
    const navul = document.querySelectorAll('.list-container li ');

    burger.addEventListener('click', () => {
        nav.classList.toggle('list-active');

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


let tl9 = gsap.timeline({
    scrollTrigger: {
        trigger: '.nav-container',
        start: '0%',
        end: '1%',
        scrub: 1,
    }
});
let tl18 = gsap.timeline({
    scrollTrigger: {
        trigger: '.nav-container',
        start: '0%',
        end: '1%',
        scrub: 1,
    }
});
let tl19 = gsap.timeline({
    scrollTrigger: {
        trigger: '.nav-container',
        start: '0%',
        end: '1%',
        scrub: 1,
    }
});
let tl20 = gsap.timeline({
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
let tl11 = gsap.timeline({
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

tl9.fromTo(".nav-container", { y: 10 }, {
    y: 0,
    backgroundColor: "rgb(36, 36, 36)", color: "rgb(255, 255, 255)"
});
tl10.to(".nav-option a", {
    color: "rgb(255, 255, 255)"
});
tl11.to(".burger div", { backgroundColor: "rgb(255, 255, 255)" });
tl18.to(".location .Vector_2", { fill: "black" });
tl19.to(".logo-svg .strok", { stroke: "white" });
tl20.to(".logo-svg .logo-text,.plane > *, .location .Vector, .sndo > *", { fill: "white" });