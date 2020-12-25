<?php 

    class Admin
    {
        private $tableName = "admins";
        private $connection;

        
        public function __construct($conn )
        {
            $this->connection = $conn;
        }

        public function Register($username, $email, $password, $password_confirm)
        {
            
            $username = htmlspecialchars(strip_tags($username));
            $email = htmlspecialchars(strip_tags($email));
            $password = htmlspecialchars(strip_tags(md5($password)));
            $password_confirm = htmlspecialchars(strip_tags(md5($password_confirm)));

            $query = "INSERT INTO {$this->tableName} (username,email,password,password_confirm) VALUES (:username,:email,:password,:password_confirm)";

            $result = $this->connection->prepare($query);
            $result->bindParam(":username", $username, PDO::PARAM_STR);
            $result->bindParam(":email", $email, PDO::PARAM_STR);
            $result->bindParam(":password", $password, PDO::PARAM_STR);
            $result->bindParam(":password_confirm", $password_confirm, PDO::PARAM_STR);

            if($result->execute())
            {
                return true;
            }

            return false;

        }

        public function login ( $email , $password ) {

            $email = htmlspecialchars(strip_tags($email));
            $password = htmlspecialchars(strip_tags(md5($password)));

            $query = "SELECT  email, password  FROM {$this->tableName} WHERE email=:email AND password=:password";

            $res = $this->connection->prepare($query);
            $res->bindParam(':email',$email , PDO::PARAM_STR);
            $res->bindParam(':password',$password , PDO::PARAM_STR);

            if($res->execute()) {

                return $res->fetchAll();

            }

            return false ;

        }
    }

?>