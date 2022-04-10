const title = document.querySelector('.title');
const box1 = document.querySelector('.box1');
const box2 = document.querySelector('.box2');

setTimeout(() => {
    title.classList.add('fade');
}, 150);

setTimeout(() => {
    box1.classList.add('fade');
}, 1000);

setTimeout(() => {
    box2.style.display = 'block';
}, 1600);

setTimeout(() => {
    box2.classList.add('fade');
}, 1800);