<?php
    include_once "../model/User.php";
    include_once "../model/Director.php";
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
    <title>Home</title>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex justify-content-center col-12 overflow-auto" style="height: 90vh; margin-top: 10vh;">
        <form class="p-5 text-center col-5"
              action="../controller/addDirectorController.php" method="post">
            <div class="mb-3">
                <label for="nameDirector" class="form-label">Nom</label>
                <input type="text" class="form-control h-25 rounded-5 text-center" id="nameDirector"
                       aria-describedby="emailHelp" name="nameDirector">
            </div>
            <div class="mb-3">
                <label for="dateDirector" class="form-label">Data de naixement</label>
                <input type="date" class="form-control h-25 rounded-5 text-center" id="dateDirector"
                       aria-describedby="emailHelp" name="dateDirector">
            </div>
            <div class="mb-3">
                <label for="countryDirector" class="form-label">País</label>
                <input type="text" class="form-control h-25 rounded-5 text-center" id="countryDirector"
                       aria-describedby="emailHelp" name="countryDirector">
            </div>
            <button type="submit" class="btn btn-primary" name="formAddDirector">Afegir</button>
        </form>
    </div>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>


