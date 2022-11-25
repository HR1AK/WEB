<?php
    $connect = new PDO("mysql:host=localhost; dbname=records;charset=utf8", username:"root", password:"");
    if(!$connect)
    {
        die('Error');
    }
?>