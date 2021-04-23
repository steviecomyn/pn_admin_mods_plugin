// Removes the WP CSS.
var logincss = document.querySelector('#login-css');
logincss.disabled = true;
var buttonscss = document.querySelector('#buttons-css');
buttonscss.disabled = true;
var formscss = document.querySelector('#forms-css');
formscss.disabled = true;

// Changes the username label text.
var label_user_login = document.getElementsByTagName('label')[0];
label_user_login.innerText = "Email Address";

// Add autocomplete="off" to form
// var form = document.getElementsByTagName('form')[0];
// form.setAttribute('autocomplete', 'off');