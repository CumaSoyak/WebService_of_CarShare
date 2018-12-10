<?php
class Database
{
    private $host='localhost';
    private $db_name='araba';
    private $username='root';
    private $parola='';
    private $conn;
    public function  connect(){
        $this->conn=null;
        try{

            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
                $this->username,$this->parola);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo 'Hatalı baglanma'.$e->getMessage();
        }

    return $this->conn;
    }

}