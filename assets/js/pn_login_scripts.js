// Removes the WP CSS.
var logincss = document.querySelector('#login-css');
logincss.disabled = true;
var buttonscss = document.querySelector('#buttons-css');
buttonscss.disabled = true;
var formscss = document.querySelector('#forms-css');
formscss.disabled = true;

// Add's in a link to PageNorth.co.uk
var a = document.createElement('a');
var linkText = document.createTextNode("Powered by PageNorth Digital");
var img = new Image(20,20); // width, height values are optional params
img.src = '/wp-content/plugins/pn_admin_mods_plugin/assets/img/pn-delta.svg';
a.appendChild(linkText);
a.appendChild(img);
a.title = "PageNorth";
a.className += "pageNorthLink powered_by_pn pn_link_dark";
a.href = "http://pagenorth.co.uk";
document.body.appendChild(a);

// Changes the username label text.
var label_user_login = document.getElementsByTagName('label')[0];
label_user_login.innerText = "Email Address";

// Add autocomplete="off" to form
var form = document.getElementsByTagName('form')[0];
form.setAttribute('autocomplete', 'off');