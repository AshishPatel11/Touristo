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