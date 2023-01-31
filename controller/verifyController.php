<?php
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/UserService.php";

    $user = UserService::getUserById($_GET['idUser']);

    if ($user->getToken() == $_GET['token']) {
        UserService::verifyUser($user);
        header('Location: ../view/home.php');
        exit();
    }