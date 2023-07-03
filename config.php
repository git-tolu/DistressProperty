<?php
class Database {

        private $duser="uptechng_distress";
        private $dsn="mysql:host=localhost; dbname=uptechng_distress";
        private $pass="2023@Mypass";

        public $conn;

        public function __construct(){
           try {
            $this->conn=new PDO($this->dsn, $this->duser, $this->pass);
           } catch (PDOException $e) {
            echo "ERROR: " .$e->getMessage();
           }

           return $this->conn;
        }

                //  protect users data from hackers
    public function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
