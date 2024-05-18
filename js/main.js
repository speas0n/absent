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


    });
