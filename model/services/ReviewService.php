<?php
    include_once "Conex.php";


    class ReviewService
    {

        public static function addReview($review)
        {
            $sql = "INSERT INTO `reviews` (`id_review`, `film`, `user`, `stars`, `review_text`, `review_time`) VALUES (NULL, :id_film, :id_user, :stars, :review_text, :date)";

            $arr = array(
                'id_film' => $review->getFilm(),
                'id_user' => $review->getUser(),
                'stars' => $review->getStars(),
                'review_text' => $review->getReviewText(),
                'date' => $review->getReviewTime()->format('Y-m-d H:i:s')
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function getAvgStarsFilm($idFilm)
        {
            $sql = "SELECT AVG(`stars`) FROM `reviews` WHERE `film`= :id;";

            $arr = array(
                'id' => $idFilm
            );

            $con = new Conex();
            $result = $con->queryDataBase($sql, $arr)->fetch();
            return $result[0];
        }

        public static function getReviewsByFilm($film)
        {
            $sql = "SELECT * FROM `reviews` INNER JOIN `users` ON reviews.user = users.id_user  WHERE `film`=:id_film  ";

            $arr = array(
                'id_film' => $film->getIdFilm(),
            );

            $con = new Conex();
            $reviews = $con->queryDataBase($sql, $arr)->fetchAll();

            $arrayReviews = array();
            foreach ($reviews as $review) {

                $u = UserService::getUserById($review['user']);

                $r = new Review($review['film'], $u, $review['stars'], $review['review_text']);
                $r->setReviewTime(DateTime::createFromFormat('Y-m-d H:i:s', $review['review_time']));

                $arrayReviews[] = $r;
            }
            return $arrayReviews;
        }

        public static function getAllFilmsByAvgStars()
        {
            $sql = "SELECT film,AVG(stars) FROM `reviews` GROUP BY film ORDER BY AVG(stars) DESC";
            $con = new Conex();
            $films = $con->queryDataBase($sql, array())->fetchAll();


            $arrayFilms = array();

            foreach ($films as $film) {

                $f = FilmService::getFilmById($film['film']);

                $filmAvgStar = array($f, round($film['AVG(stars)'], 2));

                $arrayFilms[] = $filmAvgStar;
            }

            $arrayFilms = array_slice($arrayFilms, 0, 3);

            return $arrayFilms;
        }

    }