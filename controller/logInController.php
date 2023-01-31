<?php
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/UserService.php";
    include_once "../config.php";
    include_once "../functions/userCheckFunctions.php";

    if (!isset($_POST['formLogIn'])) {
        $_SESSION['nav'] = "Log In";
        header("Location: ../view/logIn.php");
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['pass'];

    if (checkBlank($username) || checkBlank($password)) {
        $_SESSION['errors']['blank'] = "Hi ha camps en blanc";
        header("Location: ../view/logIn.php");
        exit();
    }
    if (!UserService::checkExistsUsername($username)) {
        $_SESSION['errors']['invalidPass'] = 'Dades incorrectes!';
        header("Location: ../view/logIn.php");
        exit();
    }

    $pepper = hash_hmac("sha256", $password, getPepper());

    $u = UserService::getUserByUsername($username);

    $passwordDB = $u->getPassword();

    if (password_verify($pepper, $passwordDB)) {
        $_SESSION['userLog'] = $u;
        header("Location: ../controller/homeController.php");
    } else {
        $_SESSION['errors']['invalidPass'] = 'Dades incorrectes!';
        header("Location: ../view/logIn.php");
    }
    exit();










