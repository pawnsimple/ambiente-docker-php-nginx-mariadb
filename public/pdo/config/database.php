<?php 
    class Database {
        private $host = "mariadb"; 
        private $database_name = "database";  
        private $username = "user"; 
        private $password = "password";

        public $conn;

 
        public function getConnection(){    
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "sem conexão: " . $exception->getMessage();
            }
            return $this->conn; 
        }
    }  
    
?>