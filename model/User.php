<?php

    class User
    {
        private $idUser;
        private $fullName;
        private $email;
        private $username;
        private $birthDate;
        private $password;
        private $createdAt;
        private $modifiedAt;
        private $profileImg;
        private $token;
        private $verified;

        /**
         * @param $fullName
         * @param $username
         * @param $birthDate
         * @param $password
         */
        public function __construct($fullName, $username, $email, $birthDate, $password)
        {
            $this->fullName = $fullName;
            $this->username = $username;
            $this->email = $email;
            $date = DateTime::createFromFormat('Y-m-d', $birthDate);
            $this->birthDate = $date;
            $this->password = $password;
            $this->createdAt = new DateTime();
            $this->modifiedAt = new DateTime();
            $this->profileImg = "";
            $this->token = "";
            $this->verified = false;
        }

        /**
         * @return mixed
         */
        public function getIdUser()
        {
            return $this->idUser;
        }

        /**
         * @param mixed $idUser
         */
        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;
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
         * @return mixed
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * @param mixed $username
         */
        public function setUsername($username)
        {
            $this->username = $username;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
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
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return DateTime
         */
        public function getCreatedAt()
        {
            return $this->createdAt;
        }

        /**
         * @param DateTime $createdAt
         */
        public function setCreatedAt($createdAt)
        {

            $this->createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $createdAt);
        }

        /**
         * @return DateTime
         */
        public function getModifiedAt()
        {
            return $this->modifiedAt;
        }

        /**
         * @param DateTime $modifiedAt
         */
        public function setModifiedAt($modifiedAt)
        {
            $this->modifiedAt = DateTime::createFromFormat('Y-m-d H:i:s', $modifiedAt);
        }

        /**
         * @return mixed
         */
        public function getProfileImg()
        {
            return $this->profileImg;
        }

        /**
         * @param mixed $profileImg
         */
        public function setProfileImg($profileImg)
        {
            $this->profileImg = $profileImg;
        }

        /**
         * @return mixed
         */
        public function getToken()
        {
            return $this->token;
        }

        /**
         * @param mixed $token
         */
        public function setToken($token)
        {
            $this->token = $token;
        }

        /**
         * @return false
         */
        public function getVerified(): bool
        {
            return $this->verified;
        }

        /**
         * @param false $verified
         */
        public function setVerified(bool $verified)
        {
            $this->verified = $verified;
        }


    }