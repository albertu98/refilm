<?php
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/UserService.php";
    include_once "../model/services/MailService.php";
    include_once "../config.php";
    include_once "../functions/userCheckFunctions.php";

    if (!isset($_POST['formSignUp'])) {
        $_SESSION['nav'] = "Sign Up";
        header("Location: ../view/signUp.php");
        exit();
    }

    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['birthDate'];

    if (checkBlank($fullName) || checkBlank($username) || checkBlank($email) || checkBlank($password) || checkBlank($date)) {
        $_SESSION['errors']['blank'] = "Hi ha camps en blanc";
        header("Location: ../view/signUp.php");
        exit();
    }

    if (UserService::checkExistsEmail($email)) {
        $_SESSION['errors']['emailExists'] = "L'email ja existeix.";
        header("Location: ../view/signUp.php");
        exit();
    }

    if (UserService::checkExistsUsername($username)) {
        $_SESSION['errors']['userExists'] = 'Usuari existent';
        header("Location: ../view/signUp.php");
        exit();
    }

    if (!checkPasswordLen($password)) {
        $_SESSION['errors']['pass'] = 'Contrasenya incorrecte (llargada de 5 a 16 caràcters)';
        header("Location: ../view/signUp.php");
        exit();
    }


    $pepper = hash_hmac("sha256", $password, getPepper());
    $password_hashed = password_hash($pepper, PASSWORD_BCRYPT);

    $user = new User($fullName, $username, $email, $date, $password_hashed);

    $user->setToken(bin2hex(random_bytes(30)));

    UserService::addUser($user);

    $user = UserService::getUserByUsername($username);

    MailService::sendVerificationEmail($user);

    header("Location: ../view/home.php");
    exit();