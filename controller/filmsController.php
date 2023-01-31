<?php
    include_once "../model/Film.php";
    include_once "../model/Director.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/DirectorService.php";
    include_once "../model/services/FilmService.php";

    $_SESSION['nav'] = "Pel·lícules";

    $_SESSION['films'] = FilmService::getAllFilms();

    header("Location: ../view/films.php");
    exit();