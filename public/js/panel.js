let button = document.querySelector('.btn-toggler');
let body = document.querySelector('body');
let overlay = document.querySelector('.overlay');

if(button) {
  button.addEventListener('click', function() {
    body.classList.toggle('toggled');
  });
}

if(overlay) {
  overlay.addEventListener('click', function() {
    body.classList.toggle('toggled');
  });
}
