<?php
    include_once "../model/Film.php";
    include_once "../model/Director.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/DirectorService.php";
    include_once "../model/services/FilmService.php";

    if (!isset($_POST['formAddFilm'])) {
        $_SESSION['directors'] = DirectorService::getAllDirectors();
        header("Location: ../view/addFilm.php");
        exit();
    }

    $name = $_POST['name'];
    $idDirector = $_POST['director'];
    $launchDate = $_POST['launchDate'];
    $duration = $_POST['duration'];
    $genre = $_POST['genre'];
    $country = $_POST['country'];
    $photo = $_FILES['photo'];

    $imgArr = explode('/', $photo['type']);


    if (empty($photo['full_path']) || !($imgArr[0] == 'image')) {
        $_SESSION['errors']['photo'] = "Format d'imatge incorrecte!";
        header("Location: ../view/profile.php");
        exit();
    }

    $check = getimagesize($photo['tmp_name']);

    if (!($check['mime'] == 'image/jpeg' || $check['mime'] == 'image/jpg')) {

        $_SESSION['errors']['photo'] = "Format d'imatge incorrecte!";
        header("Location: ../view/profile.php");
        exit();
    }

    $f = new Film($name, $idDirector, $launchDate, $duration, $genre, $country);

    $target_dir = "../view/uploads/films/";
    $target_file = $target_dir . basename($f->toStringImg() . "." . $imgArr[1]);
    $f->setImgFile($f->toStringImg() . "." . $imgArr[1]);
    $result = move_uploaded_file($photo['tmp_name'], $target_file);

    FilmService::addFilm($f);

    header("Location: ../controller/filmsController.php");
    exit();