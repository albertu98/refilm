<?php
    include_once "Film.php";
    include_once "User.php";

    class Review
    {
        private $idReview;
        private $film;
        private $user;
        private $stars;
        private $reviewText;
        private $reviewTime;

        /**
         * @param $idFilm
         * @param $idUser
         * @param $stars
         * @param $reviewText
         */
        public function __construct($idFilm, $idUser, $stars, $reviewText)
        {
            $this->film = $idFilm;
            $this->user = $idUser;
            $this->stars = $stars;
            $this->reviewText = $reviewText;
            $this->reviewTime = new DateTime();
        }

        /**
         * @return mixed
         */
        public function getIdReview()
        {
            return $this->idReview;
        }

        /**
         * @param mixed $idReview
         */
        public function setIdReview($idReview)
        {
            $this->idReview = $idReview;
        }

        /**
         * @return mixed
         */
        public function getFilm()
        {
            return $this->film;
        }

        /**
         * @param mixed $film
         */
        public function setFilm($film)
        {
            $this->film = $film;
        }

        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * @param mixed $user
         */
        public function setUser($user)
        {
            $this->user = $user;
        }

        /**
         * @return mixed
         */
        public function getStars()
        {
            return $this->stars;
        }

        /**
         * @param mixed $stars
         */
        public function setStars($stars)
        {
            $this->stars = $stars;
        }

        /**
         * @return mixed
         */
        public function getReviewText()
        {
            if (!$this->reviewText) {
                return "";
            }
            return $this->reviewText;
        }

        /**
         * @param mixed $reviewText
         */
        public function setReviewText($reviewText)
        {
            $this->reviewText = $reviewText;
        }

        /**
         * @return DateTime
         */
        public function getReviewTime()
        {
            return $this->reviewTime;
        }

        /**
         * @param DateTime $reviewTime
         */
        public function setReviewTime($reviewTime)
        {
            $this->reviewTime = $reviewTime;
        }


    }