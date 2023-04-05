<?php
    class Equipe{

       
        private $conn;

        private $db_table = "Equipe";

        private $id;
        private $nome;
        private $email;
        private $idade;
        private $trabalho;
        private $data_criacao;

        public function __construct($db){
            $this->conn = $db;
        }

        public function setValues($ar){
            $this->nome = $ar['nome'];
            $this->email = $ar['email'];
            $this->idade = $ar['idade'];
            $this->trabalho = $ar['trabalho'];
            $this->data_criacao = $ar['data_criacao'];
        }

        public function getProperty($index){
            return $this->{$index};
        }

        public function setID($id){      
            $this->id = $id;
        }

        public function getEquipe(){
            $sqlQuery = "SELECT id, nome, email, idade, trabalho, data_criacao FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute(); 
            return $stmt;
        } 

        public function createEquipe(){ 
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        email = :email, 
                        idade = :idade, 
                        trabalho = :trabalho, 
                        data_criacao = :data_criacao";
        
            $stmt = $this->conn->prepare($sqlQuery); 

            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->bindParam(":trabalho", $this->trabalho);
            $stmt->bindParam(":data_criacao", $this->data_criacao);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        public function getSingleEquipe(){ 
            $sqlQuery = "SELECT
                        id, 
                        nome, 
                        email, 
                        idade, 
                        trabalho, 
                        data_criacao
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
             
            $this->nome = $dataRow['nome'];
            $this->email = $dataRow['email'];
            $this->idade = $dataRow['idade'];
            $this->trabalho = $dataRow['trabalho'];
            $this->data_criacao = $dataRow['data_criacao'];
        }        

        public function updateEquipe(){ 
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        email = :email, 
                        idade = :idade, 
                        trabalho = :trabalho, 
                        data_criacao = :data_criacao
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery); 

            $stmt->bindParam(":nome", $this->nome); 
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->bindParam(":trabalho", $this->trabalho);
            $stmt->bindParam(":data_criacao", $this->data_criacao);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){  
               return true;
            }
            return false;
        }

        function deleteEquipe(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>

