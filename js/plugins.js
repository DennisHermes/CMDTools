const containers0 = document.querySelector('#container1');
const containers1 = document.querySelector('#container2');
const containers2 = document.querySelector('#container3');

setTimeout(() => {
    containers0.classList.add('fade');
}, 150);

setTimeout(() => {
    containers1.classList.add('fade');
}, 300);

setTimeout(() => {
    containers2.classList.add('fade');
}, 450);