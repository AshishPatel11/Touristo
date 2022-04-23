let anmt = gsap.timeline({
    scrollTrigger:{
        trigger: 'body',
        start: '0%',
        end: '50%',
        scrub: 0,
    }
});
let anmt1 = gsap.timeline({
    scrollTrigger:{
        trigger: '.page1',
        start: '0%',
        end: '100%',
        scrub: 0,
    }
});
let anmt2 = gsap.timeline({
    scrollTrigger:{
        trigger: '.page1',
        start: '0%',
        end: '100%',
        scrub: 0,
    }
});
anmt.to(".search-container form",{transform:"scale(0,0)", y:500});
anmt1.fromTo(".card1",{opacity:0, y:200},{opacity:1, y:0});