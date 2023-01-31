<?php
    include_once "../model/User.php";
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
    <link rel="stylesheet" href="style/profile.css">
    <link rel="script" href="https://code.jquery.com/jquery-3.6.1.min.js">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="js/profile.js"></script>
    <title>Home</title>
    <style>
        .row::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier; overflow: hidden;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex justify-content-between col-12 overflow-auto"
         style="height: 90vh; margin-top: 10vh;">
        <div class="left col-4">
            <div class="d-flex justify-content-center">
                <img src="uploads/users/<?php echo (!$_SESSION['userLog']->getProfileImg()) ? ('default.jpeg') : $_SESSION['userLog']->getProfileImg() ?>"
                     alt=""
                     style="width=200px; height:200px; border-radius: 50%;">
            </div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h5 class="mt-3"><?php echo $_SESSION['userLog']->getFullName(); ?></h5>
                <h6 class="mt-3">@<?php echo $_SESSION['userLog']->getUsername(); ?></h6>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <button id="general" class="btn btn-primary btn-profile mt-3" onclick="" type="button">General
                    </button>
                    <button id="pass" class="btn btn-primary btn-profile mt-3" type="button">Canviar password</button>
                    <button id="photo" class="btn btn-primary btn-profile mt-3" type="button">Foto de perfil</button>
                </div>

            </div>
        </div>
        <?php if (isset($_SESSION['errors'])) { ?>
            <div class="alert alert-danger" id="alert" role="alert">
                <?php if (isset($_SESSION['errors']['blank'])) {
                    echo $_SESSION['errors']['blank'];
                } elseif (isset($_SESSION['errors']['invalidPass'])) {
                    echo $_SESSION['errors']['invalidPass'];
                } elseif (isset($_SESSION['errors']['passSuccessful'])) {
                    echo $_SESSION['errors']['passSuccessful'];
                } elseif (isset($_SESSION['errors']['photo'])) {
                    echo $_SESSION['errors']['photo'];
                } ?>
            </div>
        <?php } ?>
        <div class="right d-flex justify-content-center align-items-center col-8">
            <div id="showDiv-1" class="d-flex flex-column justify-content-center">
                <ul class="text-center" style="list-style: none;">
                    <li>Email:</li>
                    <li><?php echo $_SESSION['userLog']->getEmail(); ?></li>
                    <li>Data de naixement:</li>
                    <li><?php echo $_SESSION['userLog']->getBirthDate()->format('d-m-Y'); ?></li>
                    <li>Primer registre:</li>
                    <li><?php echo $_SESSION['userLog']->getCreatedAt()->format('d-m-Y'); ?></li>
                </ul>
            </div>
            <div id="showDiv-2">
                <form id="form" class="form form-profile text-center"
                      action="../controller/profileController.php"
                      method="post">
                    <div class="mb-3">
                        <label for="formPass" class="form-label">Password</label>
                        <input class="form-control" type="password" id="formPass" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="formPass" class="form-label">Nou Password</label>
                        <input class="form-control" type="password" id="formPass" name="newPass">
                    </div>
                    <button type="submit" class="btn btn-primary" name="formProfilePass">Afegir
                    </button>
                </form>
            </div>
            <div id="showDiv-3">
                <form id="form" class="form form-profile text-center"
                      action="../controller/profileController.php"
                      method="post"
                      enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto de perfil</label>
                        <input class="form-control" type="file" id="formFile" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary" name="formProfilePhoto">Afegir</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php unset($_SESSION['errors']) ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>
