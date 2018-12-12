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
            $query="SELECT u.users_id,u.ad,u.soyad,u.email,u.telefon,u.parola ,i.ilan_id,parent_user_id,i.ilan_tip,
       i.nereden,i.nereye,i.plaka,i.birlikte,i.kisi_sayisi FROM users u,ilanlar i WHERE u.users_id=i.parent_user_id ";

            $stmt=$this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

}






