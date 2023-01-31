<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style/form.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Login</title>
</head>
<body class="d-flex">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex justify-content-center col-12"
         style="margin-top: 10vh;">
        <form class="form p-5 text-center border col-5"
              action="../controller/logInController.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control h-25 rounded-5 text-center" id="username"
                       aria-describedby="emailHelp" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control h-25 rounded-5 text-center" id="password" name="pass">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="formLogIn">Log In</button>
            <?php if (isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (isset($_SESSION['errors']['blank'])) {
                        echo $_SESSION['errors']['blank'];
                    } elseif (isset($_SESSION['errors']['invalidPass'])) {
                        echo $_SESSION['errors']['invalidPass'];
                    } ?>
                </div>
            <?php } ?>
        </form>
    </div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<?php unset($_SESSION['errors']) ?>
</body>
</html>