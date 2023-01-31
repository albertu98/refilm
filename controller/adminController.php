<?php
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/UserService.php";

    $_SESSION['nav'] = "Gestió";

    $_SESSION['users'] = UserService::getAllUsers();

    header("Location: ../view/admin.php");
    exit();