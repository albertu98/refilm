<?php
    include_once "../model/User.php";
    include_once "../model/Film.php";
    include_once "../model/Director.php";
    include_once "../model/Review.php";
    if (session_status() === PHP_SESSION_NONE) session_start();
    include_once "../model/services/ReviewService.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="js/search.js"></script>
    <title>Home</title>
    <style>
        .row::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier; overflow: hidden;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center">
    <?php include_once "../template/title.php" ?>
    <div class="functions d-flex justify-content-between align-items-center position-fixed col-10"
         style="margin-top: 5vh; height: 10vh;">
        <?php if ($_SESSION['userLog']->getUsername() === 'admin') { ?>
            <div class="add p-5">
                <a href="../controller/addFilmController.php">+Afegir</a>
            </div>
        <?php } ?>
        <div class="search p-5">
            <input type="search" id="searchInput" onkeyup="searchFilms()" placeholder="Buscar...">
        </div>
    </div>

    <div class="row col-12 overflow-auto"
         id="row"
         style="height: 90vh; margin-top: 15vh">
        <div class="p-5 d-flex flex-wrap justify-content-around" style="width: 80vw">
            <?php foreach ($_SESSION['films'] as $film) { ?>
                <div class="card border m-2" id="card" style="width: 18rem;">
                    <img class="card-img-top p-3 rounded" width="200px" height="350px"
                         src="uploads/films/<?php echo $film->getImgFile(); ?>"
                         alt="...">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title-film"><?php echo $film->getName(); ?></h3>
                        <h5 class="card-title"><?php echo $film->getLaunchDate(); ?></h5>
                        <h5 class="card-title"><?php echo $film->getDirector()->getFullName(); ?></h5>
                        <div class="d-flex justify-content-center">
                            <h4><?php echo $film->getAvgStars(); ?>/5</h4>
                            <img src="style/assets/star_fill.svg" alt="" height="26" style="fill: yellow;">
                        </div>
                        <a href="../controller/filmOverviewController.php?id=<?php echo $film->getIdFilm(); ?>"
                           class="btn btn-primary" id="btn-card">Valora</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>
