function changeBorderColor(){
  var formS = document.getElementById('groupSearch');
  formS.style.border = '3px solid blue';
  formS.style.borderRadius = '8px';
}

function restoreBorderColor(event){
  var formS = document.getElementById('groupSearch');
  var targetElement = event.target;

  if (targetElement !== formS && !formS.contains(targetElement)) {
    formS.style.border = '';
    formS.style.borderRadius = '';
  }
}

document.addEventListener('click', restoreBorderColor);