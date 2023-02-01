<?php
    $user = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host=localhost;dbname=in_out_db2", $user, $password);

    } catch (Exception $e){
        echo $e->getMessage();
    }