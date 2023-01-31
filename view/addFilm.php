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
    <div class="functions d-flex justify-content-between align-items-center position-fixed col-10"
         style="margin-top: 5vh; height: 10vh;">
        <div class="add p-5">
            <a href="../controller/addDirectorController.php">+Afegir director</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center col-12 overflow-auto" style="height: 90vh; margin-top: 10vh;">
        <form class="form border p-5 text-center col-5"
              action="../controller/addFilmController.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control rounded-5 text-center" id="name"
                       aria-describedby="emailHelp" name="name">
            </div>
            <select class="form-select mt-3 mb-3" aria-label="Default select example" name="director">
                <option selected>Director</option>
                <?php foreach ($_SESSION['directors'] as $director) { ?>
                    <option value="<?php echo $director->getIdDirector(); ?>"><?php echo $director->getFullName(); ?></option>
                <?php } ?>
            </select>
            <div class="d-flex justify-content-center">
                <div class="mb-3">
                    <label for="launchDate" class="form-label">Any</label>
                    <input type="number" min="1900" max="2022" class="form-control rounded-5 text-center"
                           id="username"
                           aria-describedby="emailHelp" name="launchDate">
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duració (min)</label>
                    <input type="number" class="form-control  rounded-5 text-center" id="duration"
                           aria-describedby="emailHelp" name="duration">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="mb-3">
                    <label for="genre" class="form-label">Gènere</label>
                    <input type="text" class="form-control rounded-5 text-center" id="username"
                           aria-describedby="emailHelp" name="genre">
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">País</label>
                    <input type="text" class="form-control rounded-5 text-center" id="username"
                           aria-describedby="emailHelp" name="country">
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Cartell</label>
                <input class="form-control" type="file" id="formFile" name="photo">
            </div>
            <button type="submit" class="btn btn-primary" name="formAddFilm">Afegir</button>
        </form>
    </div>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>

