function addElement(parentElement, addedElement) {
  let el = document.querySelector(parentElement);
  if(el) {
    el.insertAdjacentHTML('beforeend', addedElement);
  }
}

addElement('.alert-success.alert-icon', '<i class="fa-solid fa-check-circle alert-icon"></i>');
addElement('.alert-danger.alert-icon', '<i class="fa-solid fa-exclamation-triangle alert-icon"></i>');
addElement('.alert-warning.alert-icon', '<i class="fa-solid fa-exclamation-triangle alert-icon"></i>');
addElement('.alert-info.alert-icon', '<i class="fa-solid fa-info-circle alert-icon"></i>');
