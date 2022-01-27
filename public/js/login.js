let button = document.querySelector('.form-password button');
if(button) {
  button.addEventListener('click', (el) => {
    el.preventDefault();

    let elm   = document.querySelector('.form-password button #icon');
    let input = document.querySelector('.form-password input');
    let type  = input.getAttribute('type');

    if(type == 'password') {
      input.setAttribute('type', 'text');
      elm.setAttribute('data-icon', 'eye-slash');
    } else {
      elm.setAttribute('data-icon', 'eye');
      input.setAttribute('type', 'password');
    }
  });
}
