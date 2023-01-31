<?php

    class Director
    {
        private $idDirector;
        private $fullName;
        private $birthDate;
        private $country;

        /**
         * @param $fullName
         * @param $birthDate
         * @param $country
         */
        public function __construct($fullName, $birthDate, $country)
        {
            $this->fullName = $fullName;
            $date = DateTime::createFromFormat("Y-m-d", $birthDate);
            $this->birthDate = $date;
            $this->country = $country;
        }

        /**
         * @return mixed
         */
        public function getIdDirector()
        {
            return $this->idDirector;
        }

        /**
         * @param mixed $idDirector
         */
        public function setIdDirector($idDirector)
        {
            $this->idDirector = $idDirector;
        }

        /**
         * @return mixed
         */
        public function getFullName()
        {
            return $this->fullName;
        }

        /**
         * @param mixed $fullName
         */
        public function setFullName($fullName)
        {
            $this->fullName = $fullName;
        }

        /**
         * @return DateTime|false
         */
        public function getBirthDate()
        {
            return $this->birthDate;
        }

        /**
         * @param DateTime|false $birthDate
         */
        public function setBirthDate($birthDate)
        {
            $this->birthDate = $birthDate;
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

    }