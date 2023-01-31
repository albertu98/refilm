<?php

?>
    <nav class="navbar d-flex flex-column justify-content-start border-end vh-100" style="width: 20vw;">
        <div class="top border-bottom">
            <h2 style="font-size: 4vmin;"><?php echo $_SESSION['nav'] ?></h2>
        </div>
        <style>
            .links:hover {
                font-size: 3.5vmin;
                color: #2e2eb2;
                transition: 0.7s;
            }
        </style>
        <div class="menu d-flex flex-column align-items-center">
            <a class="links" href="../controller/homeController.php"
               style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Home</a>
            <?php if (!isset($_SESSION['userLog'])) { ?>
                <a class="links" href="../controller/logInController.php "
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Login</a>
                <a class="links" href="../controller/signUpController.php"
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Sign up</a>
            <?php } elseif ($_SESSION['userLog']->getUsername() == 'admin') { ?>
                <a class="links" href="../controller/profileController.php "
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Perfil</a>
                <a class="links" href="../controller/filmsController.php"
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Pel·lícules</a>
                <a class="links" href="../controller/adminController.php"
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Gestió</a>
                <a class="links" href="../controller/logOutController.php"
                   style="color: #b40b0b; text-decoration: none; padding: 2.5vmin;">Log Out</a>
            <?php } else { ?>
                <a class="links" href="../controller/profileController.php "
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Perfil</a>
                <a class="links" href="../controller/filmsController.php"
                   style="color: #142d4c; text-decoration: none; padding: 2.5vmin;">Pel·licules</a>
                <a class="links" href="../controller/logOutController.php"
                   style="color: #b40b0b; text-decoration: none; padding: 2.5vmin;">Log Out</a>
            <?php } ?>
        </div>
    </nav>
<?php ?>