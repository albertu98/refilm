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
    <title>Sign up</title>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex justify-content-center col-12 overflow-auto" style="height: 90vh; margin-top: 10vh;">
        <form class="form border p-5 text-center col-5" action="../controller/signUpController.php" method="post">
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nom Complet</label>
                    <input type="text" class="form-control rounded-5 text-center" id="fullName"
                           aria-describedby="emailHelp" name="fullName">
                </div>
                <div class="mb-3">
                    <label for="birthDate" class="form-label">Data de naixement</label>
                    <input type="date" class="form-control rounded-5 text-center" id="birthDate"
                           aria-describedby="emailHelp"
                           name="birthDate">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-5 text-center" id="email"
                       aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control rounded-5 text-center" id="username"
                       aria-describedby="emailHelp" name="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-5 text-center" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="formSignUp">Sign Up</button>
            <?php if (isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (isset($_SESSION['errors']['pass'])) {
                        echo $_SESSION['errors']['pass'];
                    } elseif (isset($_SESSION['errors']['userExists'])) {
                        echo $_SESSION['errors']['userExists'];
                    } elseif (isset($_SESSION['errors']['emailExists'])) {
                        echo $_SESSION['errors']['emailExists'];
                    } elseif (isset($_SESSION['errors']['blank'])) {
                        echo $_SESSION['errors']['blank'];
                    } ?>
                </div>
            <?php } ?>
    </div>
    </form>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
<?php unset($_SESSION['errors']) ?>
</html>
