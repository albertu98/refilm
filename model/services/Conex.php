<?php

    class Conex
    {
        private $host;
        private $db;
        private $dsn;
        private $user;
        private $pass;
        public $conexio;

        public function __construct()
        {
            $this->host = 'mysql';
            $this->db = "refilm";
            $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
            $this->user = 'hector';
            $this->pass = "123456";
        }

        public function openConnection()
        {
            try {
                $this->conexio = new PDO($this->dsn, $this->user, $this->pass);
                return $this->conexio;
            } catch (PDOException $ex) {
                echo "Error: " . $ex;
                return null;
            }
        }

        public function closeConnection()
        {
            try {
                $this->conexio = null;
                return $this->conexio;
            } catch (PDOException $ex) {
                echo "Error: " . $ex;
                return null;
            }
        }

        public function queryDataBase($sql, $params)
        {

            $this->openConnection();
            try {
                $this->statement = $this->conexio->prepare($sql);
                $this->statement->execute($params);
                $result = $this->statement;
                $this->closeConnection();
                return $result;
            } catch (Exception $ex) {
                $this->error = $ex->getMessage();
                echo $ex->getMessage();
                $this->closeConnection();
                return null;
            }

        }


    }