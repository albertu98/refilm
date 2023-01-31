<?php
    include_once "Conex.php";

    class InitService
    {
        public static function dropTables()
        {
            $sql = "DROP TABLE IF EXISTS `refilm`.`reviews`;
            DROP TABLE IF EXISTS `refilm`.`films`;
            DROP TABLE IF EXISTS `refilm`.`director`;
            DROP TABLE IF EXISTS `refilm`.`users`;
            ";
            $con = new Conex();
            $con->queryDataBase($sql, array());
        }

        public static function createTables()
        {
            $sql = "CREATE TABLE `refilm`.`users` (`id_user` INT NOT NULL AUTO_INCREMENT , `user_name` VARCHAR(25) NOT NULL , `email` VARCHAR(100) NOT NULL, `full_name` VARCHAR(100) NOT NULL , `birth_date` DATE NOT NULL , `pass` VARCHAR(100) NOT NULL , `created_at` DATETIME NOT NULL , `modified_at` DATETIME NOT NULL , `profile_img` VARCHAR(100) NULL, `token` VARCHAR(100) NULL, `verified` BOOLEAN NULL, PRIMARY KEY (`id_user`)) ENGINE = InnoDB;
            CREATE TABLE `refilm`.`director` (`id_director` INT NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(100) NOT NULL , `birth_date` DATE NOT NULL , `country` VARCHAR(25) NOT NULL , PRIMARY KEY (`id_director`)) ENGINE = InnoDB;
            CREATE TABLE `refilm`.`films` (`id_film` INT NOT NULL AUTO_INCREMENT , `director` INT NOT NULL , `name` VARCHAR(25) NOT NULL , `launch_year` SMALLINT NOT NULL , `duration` INT NOT NULL , `film_genre` VARCHAR(25) NOT NULL , `country` VARCHAR(25) NOT NULL, `film_img` VARCHAR(100) NOT NULL, PRIMARY KEY (`id_film`)) ENGINE = InnoDB;
            CREATE TABLE `refilm`.`reviews` (`id_review` INT NOT NULL AUTO_INCREMENT , `film` INT NOT NULL , `user` INT NOT NULL , `stars` FLOAT(5) NOT NULL , `review_text` VARCHAR(1000) NOT NULL , `review_time` DATETIME NOT NULL, PRIMARY KEY (`id_review`)) ENGINE = InnoDB;";
            $con = new Conex();
            $con->queryDataBase($sql, array());
        }

        public static function addForeignKeys()
        {
            $sql = "ALTER TABLE `reviews` ADD FOREIGN KEY (`user`) REFERENCES `users`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
            ALTER TABLE `films` ADD FOREIGN KEY (`director`) REFERENCES `director`(`id_director`) ON DELETE RESTRICT ON UPDATE RESTRICT;
            ALTER TABLE `reviews` ADD FOREIGN KEY (`film`) REFERENCES `films`(`id_film`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
            $con = new Conex();
            $con->queryDataBase($sql, array());
        }


        public static function addAdmin()
        {
            $sql = "INSERT INTO `users` (`id_user`, `user_name`, `email`, `full_name`, `birth_date`, `pass`, `created_at` , `modified_at`,`verified`) VALUES (NULL, 'admin', 'admin@admin.cat', 'admin', '0001-01-01', :pass, '0001-01-01','0001-01-01','1')";

            $password_hashed = hashPassword('admin');

            $arr = array(
                'pass' => $password_hashed
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function addCustomDirectors()
        {

            $sql = "INSERT INTO `director` (`id_director`, `full_name`, `birth_date`, `country`) VALUES (NULL, 'Francis Ford Coppola', '1939-04-07', 'USA');
            INSERT INTO `director` (`id_director`, `full_name`, `birth_date`, `country`) VALUES (NULL, 'Steven Spielberg', '1946-12-18', 'USA');
            INSERT INTO `director` (`id_director`, `full_name`, `birth_date`, `country`) VALUES (NULL, 'Quentin Tarantino', '1963-03-27', 'USA')";

            $con = new Conex();
            $con->queryDataBase($sql, array());
        }

        public static function addCustomFilms()
        {
            $sql = "INSERT INTO `films` (`id_film`, `director`, `name`, `launch_year`, `duration`, `film_genre`, `country`,`film_img`) VALUES (NULL, '1', 'The Godfather', '1972', '175', 'Crime', 'USA','the_godfather_1972_img.jpg');
            INSERT INTO `films` (`id_film`, `director`, `name`, `launch_year`, `duration`, `film_genre`, `country`,`film_img`) VALUES (NULL, '2', 'Jurassic Park', '1993', '127', 'Science-fiction', 'USA','jurassic_park_1993_img.jpg');
            INSERT INTO `films` (`id_film`, `director`, `name`, `launch_year`, `duration`, `film_genre`, `country`,`film_img`) VALUES (NULL, '2', 'Catch Me If You Can', '2002', '141', 'Comedy-drama', 'USA','catch_me_if_you_can_2002_img.jpg');
            INSERT INTO `films` (`id_film`, `director`, `name`, `launch_year`, `duration`, `film_genre`, `country`,`film_img`) VALUES (NULL, '3', 'Inglorious Basterds', '2009', '153', 'War', 'USA','inglorious_basterds_2009_img.jpg');
            INSERT INTO `films` (`id_film`, `director`, `name`, `launch_year`, `duration`, `film_genre`, `country`,`film_img`) VALUES (NULL, '3', 'Kill Bill', '2003', '111', 'Martial Arts', 'USA','kill_bill_2003_img.jpg')";
            $con = new Conex();
            $con->queryDataBase($sql, array());
        }
    }