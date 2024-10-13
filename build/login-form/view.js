/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./src/login-form/view.js ***!
  \********************************/
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.easy-smart-login-form');
  const userNameInput = document.getElementById('userNameInput');
  const userPasswordInput = document.getElementById('userPasswordInput');
  const userNameError = document.createElement('div');
  const userPasswordError = document.createElement('div');
  userNameError.className = 'error-message';
  userPasswordError.className = 'error-message';
  userNameInput.parentNode.insertBefore(userNameError, userNameInput.nextSibling);
  userPasswordInput.parentNode.insertBefore(userPasswordError, userPasswordInput.nextSibling);
  form.addEventListener('submit', function (event) {
    let valid = true;

    // Validate user name or email
    const userNameValue = userNameInput.value.trim();
    if (!userNameValue || !validateEmail(userNameValue) && !validateUserName(userNameValue)) {
      userNameError.textContent = 'Please enter a valid user name or email.';
      valid = false;
    } else {
      userNameError.textContent = '';
    }

    // Validate password
    const userPasswordValue = userPasswordInput.value.trim();
    if (userPasswordValue.length < 4) {
      userPasswordError.textContent = 'Password must be at least 4 characters long.';
      valid = false;
    } else {
      userPasswordError.textContent = '';
    }
    if (!valid) {
      event.preventDefault();
    }
  });
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
  }
  function validateUserName(userName) {
    const re = /^[a-zA-Z0-9_]+$/;
    return re.test(userName);
  }
});
/******/ })()
;
//# sourceMappingURL=view.js.map