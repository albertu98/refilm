<?php
    include_once "../model/Review.php";
    include_once "../model/Film.php";
    include_once "../model/Director.php";
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/ReviewService.php";
    include_once "../model/services/UserService.php";
    include_once "../model/services/FilmService.php";
    include_once "../model/services/DirectorService.php";


    $f = FilmService::getFilmById($_GET['id']);

    $_SESSION['film'] = $f;

    $_SESSION['reviews'] = ReviewService::getReviewsByFilm($f);

    header('Location: ../view/filmOverview.php');
    exit();




