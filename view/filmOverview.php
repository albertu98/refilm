<?php
    include_once "../model/Review.php";
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
    <link rel="stylesheet" href="style/form.css">
    <style>
        .row::-webkit-scrollbar {
            display: none;
        }
    </style>
    <title>Home</title>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex justify-content-center col-12 overflow-auto" style="height: 90vh; margin-top: 10vh;">
        <div class="film d-flex col-12">
            <div class="left col-3">
                <img src="uploads/films/<?php echo $_SESSION['film']->getImgFile() ?>"
                     style="width: 250px; height: 350px;"
                     alt="img">
            </div>
            <div class="right text-center col-9">
                <h2> <?php echo $_SESSION['film']->getName() . "(" . $_SESSION['film']->getLaunchDate() . ")"; ?></h2>
                <div>

                </div>
                <a class="btn btn-primary"
                   href="../controller/reviewController.php?idFilm=<?php echo $_SESSION['film']->getIdFilm() ?>">Valora</a>
            </div>
        </div>
        <div class="allReviews d-flex flex-column col-10 mt-5">
            <?php foreach ($_SESSION['reviews'] as $review) { ?>
                <div class="review border-top pt-5">
                    <div class="top d-flex justify-content-between align-items-center">
                        <div>
                            <h4>@<?php echo $review->getUser()->getUsername() ?></h4>
                            <h7><?php echo $review->getReviewTime()->format('d-m-Y / H:i:s') ?></h7>
                        </div>
                        <img src="uploads/users/<?php echo $review->getUser()->getProfileImg() ?>" alt=""
                             width="92px">
                        <div class="d-flex justify-content-center">
                            <h4 id="numStars"><?php echo $review->getStars() ?>/5</h4>
                            <img src="style/assets/star_fill.svg" alt="" height="26" style="fill: yellow;">
                        </div>
                    </div>
                    <div class="bottom-text mt-5">
                        <p><?php echo $review->getReviewText() ?></p>
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


