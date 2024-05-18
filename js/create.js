$(document).ready(function () {

    $('#uid').focus(function () {
        $('.fa-id-card').css('animation-name', 'fadeIn');
    });
    $('#uid').blur(function () {
        $('.fa-id-card').css('animation-name', '');
    });

    $('#password').focus(function () {
        $('.fa-lock').css('animation-name', 'fadeIn');
    });
    $('#password').blur(function () {
        $('.fa-lock').css('animation-name', '');
    });

    $('#userid').focus(function () {
        $('.fa-user').css('animation-name', 'fadeIn');
    });
    $('#userid').blur(function () {
        $('.fa-user').css('animation-name', '');
    });

});

const colorInput = document.querySelector('.pick');
const textInput = document.getElementById('color');
colorInput.value='#a0a0a0';
textInput.value = colorInput.value;

function updateColor() {
    textInput.value = colorInput.value;
    document.getElementById('theme').setAttribute('content', colorInput.value);
    document.body.style.backgroundColor = colorInput.value;
    document.documentElement.style.setProperty('--theme', colorInput.value);
}

const submit = document.querySelector(".submit");
const lu = document.querySelector(".condition");
const passwordInput = document.querySelector('#password');

lu.style.display='none';

passwordInput.addEventListener('input', function () {
  const inputValue = this.value;
  const hasUppercase = /[A-Z]/.test(inputValue);
  const hasLowercase = /[a-z]/.test(inputValue);
  const isLengthGreaterThan8 = inputValue.length >= 8;

  lu.style.display = 'block';
  submit.style.display = 'none';

  function onchange() {
    if (hasUppercase && hasLowercase && isLengthGreaterThan8) {
      lu.style.display = 'none';
      submit.style.display = 'block';
    } else {
      document.querySelector(".eightW").style.color = isLengthGreaterThan8 ? '#808080' : 'red';
      document.querySelector(".upper").style.color = hasUppercase ? '#808080' : 'red';
      document.querySelector(".lower").style.color = hasLowercase ? '#808080' : 'red';
    }
  }

  onchange();
});


