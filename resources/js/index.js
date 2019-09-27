$(document).ready(function () {
    $("[data-form='call_me']").on('click', () => {
        $("#call_me.form").slideDown();
        $(".over").fadeIn();
    });
    $("[data-form='calc_1']").on('click', () => {
        $("#calc_1.form").slideDown();
        $(".over").fadeIn();
    });
    $("[data-form='calc_2']").on('click', () => {
        $("#calc_2.form").slideDown();
        $(".over").fadeIn();
    });
    $("[data-form='calc_3']").on('click', () => {
        $("#calc_3.form").slideDown();
        $(".over").fadeIn();
    });
    $(".close").on('click', () => {
        $(".form").slideUp();
        $(".over").fadeOut();
    });
    $(".over").on('click', () => {
        $(".form").slideUp();
        $(".over").fadeOut();
    });
});