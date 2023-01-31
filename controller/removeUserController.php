<?php
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/UserService.php";


    $id = $_GET['idUser'];

    if ($id == 1) {
        $_SESSION['errors']['admin'] = "No es pot eliminar l'administrador.";
        header("Location: ../view/admin.php");
        exit();
    }

    UserService::removeUserById($id);
    $_SESSION['users'] = UserService::getAllUsers();

    header("Location: ../view/admin.php");
    exit();
