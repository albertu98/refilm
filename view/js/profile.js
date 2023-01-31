"use strict";
$(function () {

    $("#showDiv-1").children().hide();
    $("#showDiv-2").children().hide();
    $("#showDiv-3").children().hide();


    $("#general").click(function () {
        $("#alert").hide();
        $("#showDiv-2, #showDiv-3").children().hide();
        $("#showDiv-1").children().fadeToggle();
    })

    $("#pass").click(function () {
        $("#alert").hide();
        $("#showDiv-1,#showDiv-3").children().hide();
        $("#showDiv-2").children().fadeToggle();
    })

    $("#photo").click(function () {
        $("#alert").hide();
        $("#showDiv-1,#showDiv-2").children().hide();
        $("#showDiv-3").children().fadeToggle();
    })
});




