<?php
    include_once "model/services/InitService.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "config.php";


    unset($_SESSION['userLog']);
    unset($_SESSION['nav']);
    unset($_SESSION['errors']);
    unset($_SESSION['topFilms']);
    unset($_SESSION['allFilms']);

    InitService::dropTables();

    InitService::createTables();

    InitService::addForeignKeys();

    InitService::addAdmin();

    InitService::addCustomDirectors();

    InitService::addCustomFilms();

    header("Location: controller/homeController.php");
    exit;
