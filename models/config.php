<?php 

    class DataBase 
    {
        protected $host = "localhost";
        protected $db = "admin01";
        protected $user = "root";
        protected $pass = "" ;
        protected $conn ;

        public function getConnection()
        {
            $this->conn = null;

            try
            {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->pass);
                $this->conn->exec('set names utf8');
                
            }
            catch(PDOException $ex)
            {
                echo "couldnot connect to database : ".$ex->getMessage();
            }
            return $this->conn;

        }
    }


?>