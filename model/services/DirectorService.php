<?php
    include_once "Conex.php";

    class DirectorService
    {
        public static function addDirector($director)
        {
            $sql = "INSERT INTO `director` (`id_director`, `full_name`, `birth_date`, `country`) VALUES (NULL, :full_name, :birth_date, :country)";
            $arr = array(
                'full_name' => $director->getFullName(),
                'birth_date' => $director->getBirthDate()->format('Y-m-d'),
                'country' => $director->getCountry()
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function getAllDirectors()
        {
            $sql = "SELECT * FROM `director`;";

            $con = new Conex();
            $result = $con->queryDataBase($sql, array())->fetchAll();

            $arrayDirectors = array();

            foreach ($result as $director) {

                $d = new Director($director['full_name'], $director['birth_date'], $director['country']);
                $d->setIdDirector($director['id_director']);
                $arrayDirectors[] = $d;
            }
            return $arrayDirectors;
        }

        public static function getDirectorById($id)
        {

            $sql = "SELECT * FROM `director` WHERE `id_director`=:id;";

            $arr = array(
                'id' => $id
            );

            $con = new Conex();
            $director = $con->queryDataBase($sql, $arr)->fetch();
            $d = new Director($director['full_name'], $director['birth_date'], $director['country']);
            $d->setIdDirector($director['id_director']);
            return $d;
        }

        public static function getDirectorByName($username)
        {

            $sql = "SELECT * FROM `users` WHERE `user_name`=:username;";

            $arr = array(
                'username' => $username
            );

            $con = new Conex();
            $result = $con->queryDataBase($sql, $arr)->fetch();
            $u = new User($result['full_name'], $result['user_name'], $result['email'], $result['birth_date'], $result['pass']);
            $u->setIdUser($result['id_user']);
            return $u;
        }

        public static function checkExistsName($name)
        {
            $sql = "SELECT `full_name` FROM `director`";

            $con = new Conex();
            $result = $con->queryDataBase($sql, array())->fetch();

            foreach ($result as $user) {
                if ($user['user_name'] == $username) {
                    return true;
                }
            }
            return false;
        }

    }