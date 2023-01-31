<?php
    include_once "../model/User.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/UserService.php";
    include_once "../config.php";
    include_once "../functions/userCheckFunctions.php";

    if (!isset($_POST['formProfilePass']) && !isset($_POST['formProfilePhoto'])) {
        $_SESSION['nav'] = "Perfil";
        header("Location: ../view/profile.php");
        exit();
    }

    if (isset($_POST['formProfilePass'])) {

        $password = $_POST['pass'];
        $newPassword = $_POST['newPass'];

        if (!checkPasswordLen($newPassword)) {
            $_SESSION['errors']['pass'] = 'Contrasenya curta!';
            header("Location: ../view/profile.php");
            exit();
        }

        $pepper = hash_hmac("sha256", $password, getPepper());

        $passwordDB = $_SESSION['userLog']->getPassword();

        if (password_verify($pepper, $passwordDB)) {

            UserService::changePassword($_SESSION['userLog'], hashPassword($newPassword));

            $_SESSION['errors']['passSuccessful'] = 'Contrasenya canviada!';
        } else {
            $_SESSION['errors']['invalidPass'] = 'Contrasenya incorrecte!';
        }
        header("Location: ../view/profile.php");
        exit();
    } elseif (isset($_POST['formProfilePhoto'])) {

        $photo = $_FILES['photo'];
        $imgArr = explode('/', $photo['type']);

        if (empty($photo['full_path'])) {
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

        $target_dir = "../view/uploads/users/";
        $target_file = $target_dir . basename($_SESSION['userLog']->getUsername() . "." . $imgArr[1]);
        $_SESSION['userLog']->setProfileImg($_SESSION['userLog']->getUsername() . "." . $imgArr[1]);
        $result = move_uploaded_file($photo['tmp_name'], $target_file);

        UserService::addProfileImg($_SESSION['userLog']);

        header("Location: ../view/profile.php");
        exit();
    }








