<?php 
namespace hpromero\ApiEjercicio1;
   
    class DBconn {

        public $dbname = 'icb0006_uf4_pr01';
        private $serverName = 'localhost';
        private $userName = 'root';
        private $password = 'root';
        public $conn = FALSE;
    
        public function connect(){
            try{
                $this->conn = new PDO('mysql:host='.$this->serverName.';dbname='.$this->dbname,$this->userName,$this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               // echo "conectado<br>";
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }
    
        public function disconnect(){
            $this->conn = NULL;
           // echo "Desconectado";
        }   
    
        
        public function insert($date, $company, $qty){
        try{
            $stmt = $this->conn->prepare("INSERT INTO orders (date, company, qty) VALUES ('". $date . "', '". $company . "', " .$qty. ");"); 
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e){
            //echo "Insert failed: " . $e->getMessage();
        }
    }









}


?>