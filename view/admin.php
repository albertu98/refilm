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
    <title>Home</title>
</head>
<body class="d-flex" style="background: #ececec; font-family: Courier;">
<?php include_once "../template/nav.php" ?>
<main class="content d-flex justify-content-center col-10">
    <?php include_once "../template/title.php" ?>
    <div class="row d-flex col-12 overflow-auto" style="margin-top: 10vh;">
        <div class="d-flex justify-content-center">
            <table class="table table-striped">
                <tr style="height: 5vh; text-align: center;">
                    <th>ID</th>
                    <th>Usuari</th>
                    <th>Nom</th>
                    <th>Primer Registre</th>
                    <th>Verificat</th>
                    <th>Eliminar</th>
                </tr>
                <?php foreach ($_SESSION['users'] as $user) { ?>
                    <tr style="text-align: center">
                        <th><?php echo $user->getIdUser() ?></th>
                        <th><?php echo $user->getUsername() ?></th>
                        <th><?php echo $user->getFullName() ?></th>
                        <th><?php echo $user->getCreatedAt()->format('d-m-Y H:i:s') ?></th>
                        <th style="text-align: center"><?php if ($user->getVerified()) { ?>
                                <img src="style/assets/verified.svg" width="24px">
                            <?php } else { ?>
                                <img src="style/assets/unverified.svg" width="24px">
                            <?php } ?>
                        </th>
                        <?php if ($user->getIdUser() == 1) { ?>
                            <th>
                                <button type="button" class="btn" data-bs-container="body"
                                        data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
                                    <img src="style/assets/delete.svg" width="24px" alt="">
                                </button>
                            </th>
                        <?php } else { ?>
                            <th><a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                   href="../controller/removeUserController.php?idUser=<?php echo $user->getIdUser() ?>">
                                    <img src="style/assets/delete.svg" width="24px" alt="">
                                </a>
                            </th>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Gestió</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Eliminar usuari?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="../controller/removeUserController.php?idUser=<?php echo $user->getIdUser() ?>">
                                                <button type="button" class="btn btn-danger">
                                                    Eliminar
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</main>
</body>
<?php unset($_SESSION['errors']) ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>

