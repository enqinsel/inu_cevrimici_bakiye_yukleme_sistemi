<?php
date_default_timezone_set('Etc/GMT-3');
//error_reporting(0);
$host="localhost";
$user='root';
$pass='1234';
$data='inukart';
try {
    $baglan = new PDO("mysql:host={$host};dbname={$data}", $user, $pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $baglan->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
} catch (PDOException $e) {
    die('Hata Kodu:001'.$e->getMessage());
}
?>