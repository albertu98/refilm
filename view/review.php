<?php
    include_once "../model/User.php";
    include_once "../model/Film.php";
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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"/>
    <link rel="stylesheet" href="style/form.css">
    <script src="js/search.js"></script>
    <title>Home</title>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex justify-content-evenly col-12 overflow-auto" style="height: 90vh; margin-top: 10vh;">
        <div class="left col-3">
            <img src="uploads/films/<?php echo $_SESSION['film']->getImgFile() ?>" alt="img"
                 style="width: 250px; height: 350px;">
        </div>
        <form class="p-5 text-center col-5"
              action="../controller/reviewController.php" method="post">
            <h2> <?php echo $_SESSION['film']->getName() . "(" . $_SESSION['film']->getLaunchDate() . ")"; ?></h2>
            <label for="reviewText" class="form-label">Opinió</label>
            <textarea class="form-control" id="reviewText" name="reviewText" aria-label="With textarea"></textarea>
            <div class="radio d-flex justify-content-center mt-3">
                <input type="range" class="form-range" onchange="showStars()" min="0" max="5" step="0.5" id="stars"
                       name="stars">
            </div>
            <div class="d-flex justify-content-center">
                <h4 id="numStars">2.5/5</h4>
                <img src="style/assets/star_fill.svg" alt="" height="26" style="fill: yellow;">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="formReview">Publica</button>
            <input type="hidden"
                   value="<?php echo $_SESSION['film']->getIdFilm(); ?>" name="idFilm">
        </form>
        <?php if (isset($_SESSION['errors'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php if (isset($_SESSION['errors']['user'])) {
                    echo $_SESSION['errors']['user'];
                } ?>
            </div>
        <?php } ?>
    </div>
</main>
</body>
<?php unset($_SESSION['errors']) ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>

