import '../css/app.css';

require('select2');

$('select').select2();

$('#contactButton').click(e => {
    e.preventDefault()
    $('#contactForm').slideDown()
    $('#contactButton').slideUp()
})

//Suppression des éléments
document.querySelectorAll('[data-delete]').forEach(a => {
    a.addEventListener('click', e => {
        e.preventDefault()
        fetch(a.getAttribute('href'), {
            method: 'DELETE',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({'_token': a.dataset.token})
        }).then(response => response.json())
          .then(data => {
              if(data.success)
              {
                a.parentNode.parentNode.removeChild(a.parentNode)
              }
              else
              {
                  alert(data.error)
              }
          }).catch(e => alert(e))
    })
})



console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
