const colorInput = document.querySelector('.pick');
const textInput = document.getElementById('color');
textInput.value = colorInput.value;

function updateColor() {
    textInput.value = colorInput.value;
    document.getElementById('theme').setAttribute('content', colorInput.value);
    document.body.style.backgroundColor = colorInput.value;
    document.documentElement.style.setProperty('--theme', colorInput.value);
}
