
document.querySelector('.edit-profile-pic').addEventListener('click', function () {
  document.querySelector('#profile_pics').click();
});

document.querySelector('#profile_pics').addEventListener('change', function () {
  document.querySelector('#hiddenSubmitButton').click();
});

const editUserBtn = document.getElementById('edit-username-btn');
const newUserInput = document.getElementById('username_input');
const newDescInput = document.getElementById('desc_input');
const submitBtn = document.getElementById('submitChangeUsr');
const submitBtnProfile_desc = document.getElementById('submitChangeDesc');

editUserBtn.addEventListener('click', function(){
  newUserInput.disabled = !newUserInput.disabled;
  newUserInput.focus();

  newUserInput.addEventListener('blur', function(){
    submitBtn.click();
  });
});

const editDescBtn = document.getElementById('edit-desc-btn');
editDescBtn.addEventListener('click', function() {
    newDescInput.disabled = !newDescInput.disabled;
    newDescInput.focus();

    newDescInput.addEventListener('blur', function() {
        submitBtnProfile_desc.click();
    });
});






