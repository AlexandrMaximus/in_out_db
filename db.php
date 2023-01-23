<?php
    $user = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host=localhost;dbname=in_out_db", $user, $password);

    } catch (Exception $e){
        echo $e->getMessage();
    }