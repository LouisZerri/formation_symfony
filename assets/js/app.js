import '../css/app.css';

require('select2');

$('select').select2();

$('#contactButton').click(e => {
    e.preventDefault()
    $('#contactForm').slideDown()
    $('#contactButton').slideUp()
})



console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
