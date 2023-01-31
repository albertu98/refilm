<?php
    include_once "../model/Director.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/DirectorService.php";

    if (!isset($_POST['formAddDirector'])) {
        header("Location: ../view/addDirector.php");
        exit();
    }

    $name = $_POST['nameDirector'];
    $date = $_POST['dateDirector'];
    $country = $_POST['countryDirector'];

    $d = new Director($name, $date, $country);

    DirectorService::addDirector($d);

    header("Location: addFilmController.php");