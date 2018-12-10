<?php
class Post{
    private $conn;
    private $table='ilanlar';

    //Post özellikler

        public $ilan_id;
        public $ilan_tip;
        public $nereden;
        public $nereye;
        public $plaka;
        public $birlikte;
        public $kisi_sayisi;
        public $esya_tipi;
        public $tarih;
        public $saat;
        public $aciklama;


        public function __construct($db){
            $this->conn=$db;

        }
        //Get Posts
        public function read(){
            $query="SELECT ilan_id,ilan_tip,nereden,nereye,plaka,birlikte,kisi_sayisi,esya_tipi,tarih,saat,aciklama FROM  ilanlar";

            $stmt=$this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

}






