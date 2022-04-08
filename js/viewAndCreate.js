const slider = document.querySelector('#slider');
const svg = document.querySelector('#svgDiv');

setTimeout(() => {
    slider.classList.add('slideIn');
}, 150);

setTimeout(() => {
    svg.classList.add('svgDivShow');
}, 950);