<?php
    include_once "Director.php";

    class Film
    {
        private $idFilm;
        private $name;
        private $director;
        private $launchDate;
        private $duration;
        private $genre;
        private $country;
        private $imgFile;
        private $avgStars;

        /**
         * @param $name
         * @param $director
         * @param $launchDate
         * @param $duration
         * @param $genre
         * @param $country
         */
        public function __construct($name, $idDirector, $launchDate, $duration, $genre, $country)
        {
            $this->name = $name;
            $this->director = $idDirector;
            $this->launchDate = $launchDate;
            $this->duration = $duration;
            $this->genre = $genre;
            $this->country = $country;
        }

        /**
         * @return mixed
         */
        public function getIdFilm()
        {
            return $this->idFilm;
        }

        /**
         * @param mixed $idFilm
         */
        public function setIdFilm($idFilm)
        {
            $this->idFilm = $idFilm;
        }

        /**
         * @return mixed
         */


        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getDirector()
        {
            return $this->director;
        }

        /**
         * @param mixed $director
         */
        public function setDirector($director)
        {
            $this->director = $director;
        }

        /**
         * @return mixed
         */
        public function getLaunchDate()
        {
            return $this->launchDate;
        }

        /**
         * @param mixed $launchDate
         */
        public function setLaunchDate($launchDate)
        {
            $this->launchDate = $launchDate;
        }

        /**
         * @return mixed
         */
        public function getDuration()
        {
            return $this->duration;
        }

        /**
         * @param mixed $duration
         */
        public function setDuration($duration)
        {
            $this->duration = $duration;
        }

        /**
         * @return mixed
         */
        public function getGenre()
        {
            return $this->genre;
        }

        /**
         * @param mixed $genre
         */
        public function setGenre($genre)
        {
            $this->genre = $genre;
        }

        /**
         * @return mixed
         */
        public function getCountry()
        {
            return $this->country;
        }

        /**
         * @param mixed $country
         */
        public function setCountry($country)
        {
            $this->country = $country;
        }

        /**
         * @return mixed
         */
        public function getImgFile()
        {
            return $this->imgFile;
        }

        /**
         * @param mixed $imgFile
         */
        public function setImgFile($imgFile)
        {
            $this->imgFile = $imgFile;
        }


        public function toStringImg()
        {
            $nameStr = str_replace(" ", "_", strtolower($this->name));
            return $nameStr . "_" . $this->launchDate . "_img";
        }

        /**
         * @return mixed
         */
        public function getAvgStars()
        {
            return $this->avgStars;
        }

        /**
         * @param mixed $avgStars
         */
        public function setAvgStars($avgStars)
        {
            if (!$avgStars) {
                $avgStars = 0;
            }
            $this->avgStars = round($avgStars, 2);
        }


    }