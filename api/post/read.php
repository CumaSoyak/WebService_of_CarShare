<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//başlat databesi

$database = new Database();
$db = $database->connect();

$post = new Post($db);

//sorgulama kısmı

$result = $post->read();
$num = $result->rowCount();

if ($num > 0) {
    $pos_arr = array();
    $pos_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'ad' => $ad,
            'soyad' => $soyad,
            'email' => $email,
            'telefon' => $telefon,
            'parola' => $parola,
            'users_id' => array(
                array(
                    'ilan_id' => $ilan_id,
                    'ilan_tip' => $ilan_tip,
                    'nereden' => $nereden,
                    'nereye' => $nereye,
                    'plaka' => $plaka,
                    'birlikte' => $birlikte,
                    'kisi_sayisi' => $kisi_sayisi,
                    'esya_tipi' => $esya_tipi,
                    'tarih' => $tarih
                )
            )
        );
        array_push($pos_arr['data'], $post_item);
    }
echo json_encode($pos_arr);
}
else
    {
        echo json_encode(
            array('message'=>'No Posts Found')
        );

    }