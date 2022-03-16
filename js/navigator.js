const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.navLinks');
    const links = document.querySelectorAll('.navLinks li');

    burger.addEventListener('click', () => {
        nav.classList.toggle('navActive');

        links.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`
            }
        });

        burger.classList.toggle('toggle');

    });
}

navSlide();