<?php
    include_once "Conex.php";
    include_once "ReviewService.php";

    class FilmService
    {
        public static function addFilm($film)
        {
            $sql = "INSERT INTO `films` (`id_film`, `director`, `name`, `launch_year`, `duration`, `film_genre`, `country`,`film_img`) VALUES (NULL, :director, :name, :launch_date, :duration, :film_genre, :country,:film_img)";
            $arr = array(
                'director' => $film->getDirector(),
                'name' => $film->getName(),
                'launch_date' => $film->getLaunchDate(),
                'duration' => $film->getDuration(),
                'film_genre' => $film->getGenre(),
                'country' => $film->getCountry(),
                'film_img' => $film->getImgFile()
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function getAllFilms()
        {
            $sql = "SELECT * FROM `films`;";

            $con = new Conex();
            $result = $con->queryDataBase($sql, array())->fetchAll();

            $arrayFilms = array();

            foreach ($result as $film) {

                $d = DirectorService::getDirectorById($film['director']);

                $f = new Film($film['name'], $d, $film['launch_year'], $film['duration'], $film['film_genre'], $film['country']);
                $f->setIdFilm($film['id_film']);
                $f->setImgFile($film['film_img']);
                $f->setAvgStars(ReviewService::getAvgStarsFilm($film['id_film']));
                $arrayFilms[] = $f;
            }

            return $arrayFilms;
        }

        public static function getFilmById($id)
        {
            $sql = "SELECT * FROM `films` WHERE `id_film`=:id;";

            $arr = array(
                'id' => $id
            );

            $con = new Conex();
            $film = $con->queryDataBase($sql, $arr)->fetch();

            $d = DirectorService::getDirectorById($film['director']);

            $f = new Film($film['name'], $d, $film['launch_year'], $film['duration'], $film['film_genre'], $film['country']);
            $f->setIdFilm($film['id_film']);
            $f->setImgFile($film['film_img']);

            return $f;
        }


    }