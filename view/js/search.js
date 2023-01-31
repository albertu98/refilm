"use strict";

function searchFilms() {
    let input, filter, allCard, allDiv, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    allCard = document.getElementsByClassName('card');
    allDiv = document.getElementsByClassName('card-title-film');
    for (i = 0; i < allDiv.length; i++) {
        txtValue = allDiv[i].textContent || allDiv[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            allCard[i].style.display = "";
        } else {
            allCard[i].style.display = "none";
        }
    }
}

function showStars() {
    let range, numStars;
    range = document.getElementById('stars');
    numStars = document.getElementById('numStars');
    numStars.innerText = range.value + "/5"
}