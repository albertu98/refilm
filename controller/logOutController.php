<?php
    if (session_status() === PHP_SESSION_NONE) session_start();

    unset($_SESSION['userLog']);

    header('Location: ../view/home.php');
    exit();