<?php
    include_once "../model/Review.php";
    include_once "../model/Film.php";
    include_once "../model/Director.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/ReviewService.php";
    include_once "../model/services/DirectorService.php";
    include_once "../model/services/FilmService.php";

    if (session_status() === PHP_SESSION_NONE) session_start();


    $_SESSION['nav'] = "Home";

    $_SESSION['topFilms'] = ReviewService::getAllFilmsByAvgStars();

    $_SESSION['allFilms'] = FilmService::getAllFilms();


    header("Location: ../view/home.php");
    exit();