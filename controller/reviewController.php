<?php
    include_once "../model/User.php";
    include_once "../model/Film.php";
    include_once "../model/Director.php";
    include_once "../model/Review.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/DirectorService.php";
    include_once "../model/services/FilmService.php";
    include_once "../model/services/ReviewService.php";

    if (!isset($_POST['formReview'])) {

        $f = FilmService::getFilmById($_GET['idFilm']);

        $_SESSION['film'] = $f;
        header("Location: ../view/review.php");
        exit();
    }

    if (!isset($_SESSION['userLog'])) {
        $_SESSION['errors']['user'] = "Inicia sessió per valorar.";
        header("Location: ../view/review.php");
        exit();
    }

    $filmReview = FilmService::getFilmById($_POST['idFilm']);

    $text = $_POST['reviewText'];
    $stars = $_POST['stars'];

    $review = new Review($filmReview->getIdFilm(), $_SESSION['userLog']->getIdUser(), $stars, $text);

    ReviewService::addReview($review);

    header("Location: filmsController.php");
    exit();

