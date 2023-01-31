<?php
    include_once "Conex.php";

    class UserService
    {
        public static function addUser($user)
        {
            $sql = "INSERT INTO `users` (`id_user`, `user_name`, `email`, `full_name`, `birth_date`, `pass`, `created_at` , `modified_at`,`token`,`verified`) VALUES (NULL, :user_name, :email, :full_name, :birth_date, :pass, :createdAt,:modifiedAt,:token,:verified)";
            $arr = array(
                'user_name' => $user->getUsername(),
                'email' => $user->getEmail(),
                'full_name' => $user->getFullName(),
                'birth_date' => $user->getBirthDate()->format('Y-m-d'),
                'pass' => $user->getPassword(),
                'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
                'modifiedAt' => $user->getModifiedAt()->format('Y-m-d H:i:s'),
                'token' => $user->getToken(),
                'verified' => (+$user->getVerified())
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function verifyUser($user)
        {
            $sql = "UPDATE `users` SET `verified` = 1 WHERE `users`.`id_user` = :id";
            $arr = array(
                'id' => $user->getIdUser(),
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);

        }

        public static function removeUserById($idUser)
        {
            $sql = "DELETE FROM `users` WHERE `users`.`id_user` = :id_user";

            $arr = array(
                'id_user' => $idUser
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function getAllUsers()
        {
            $sql = "SELECT * FROM `users`;";

            $con = new Conex();
            $users = $con->queryDataBase($sql, array());

            $arrayUsers = array();

            foreach ($users as $user) {

                $u = new User($user['full_name'], $user['user_name'], $user['email'], $user['birth_date'], $user['pass']);
                $u->setIdUser($user['id_user']);
                $u->setModifiedAt($user['modified_at']);
                $u->setCreatedAt($user['created_at']);
                $u->setToken($user['token']);
                $u->setVerified($user['verified']);
                $u->setProfileImg($user['profile_img']);

                $arrayUsers[] = $u;
            }

            return $arrayUsers;

        }

        public static function getUserById($id)
        {
            $sql = "SELECT * FROM `users` WHERE `id_user`=:id;";

            $arr = array(
                'id' => $id
            );

            $con = new Conex();
            $result = $con->queryDataBase($sql, $arr)->fetch();

            $u = new User($result['full_name'], $result['user_name'], $result['email'], $result['birth_date'], $result['pass']);
            $u->setIdUser($result['id_user']);
            $u->setModifiedAt($result['modified_at']);
            $u->setCreatedAt($result['created_at']);
            $u->setToken($result['token']);
            $u->setVerified($result['verified']);
            $u->setProfileImg($result['profile_img']);
            return $u;
        }

        public static function getUserByUsername($username)
        {

            $sql = "SELECT * FROM `users` WHERE `user_name`=:username;";

            $arr = array(
                'username' => $username
            );

            $con = new Conex();
            $result = $con->queryDataBase($sql, $arr)->fetch();
            $u = new User($result['full_name'], $result['user_name'], $result['email'], $result['birth_date'], $result['pass']);
            $u->setIdUser($result['id_user']);
            $u->setModifiedAt($result['modified_at']);
            $u->setCreatedAt($result['created_at']);
            $u->setToken($result['token']);
            $u->setVerified($result['verified']);
            $u->setProfileImg($result['profile_img']);
            return $u;
        }

        public static function checkExistsUsername($username)
        {
            $sql = "SELECT `user_name` FROM `users`";

            $con = new Conex();
            $result = $con->queryDataBase($sql, array())->fetchAll();

            foreach ($result as $user) {
                if ($user['user_name'] == $username) {
                    return true;
                }
            }
            return false;
        }

        public static function checkExistsEmail($email)
        {
            $sql = "SELECT `email` FROM `users`";

            $con = new Conex();
            $result = $con->queryDataBase($sql, array())->fetchAll();
            foreach ($result as $user) {

                if ($user['email'] == $email) {
                    return true;
                }
            }
            return false;
        }

        public static function addProfileImg($user)
        {
            $sql = "UPDATE `users` SET `profile_img` = :profile_img WHERE `users`.`id_user` = :id;";
            $arr = array(
                'id' => $user->getIdUser(),
                'profile_img' => $user->getProfileImg()
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);
        }

        public static function changePassword($user, $newPass)
        {
            $sql = "UPDATE `users` SET `pass` = :newPass WHERE `users`.`id_user` = :id";
            $arr = array(
                'id' => $user->getIdUser(),
                'newPass' => $newPass
            );
            $con = new Conex();
            $con->queryDataBase($sql, $arr);

        }


    }