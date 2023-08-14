<?php
error_reporting(E_ALL);
ini_set('display_errors', 100);

try{
    $user = "root";
    $password = "";


    $db = new PDO("mysql:host=localhost;dbname=in_out_db2", $user, $password);



    $order_name = $_POST['order_name'];
    $order_id = $_POST['order_id'];

    $sql = "UPDATE orders
    SET order_name = :order_name
    WHERE order_id = :order_id;
               ";
    $stmt = $db->prepare($sql);


    $stmt->execute(['order_name' => $_POST['order_name'], 'order_id' => $_POST['order_id'],]);

}


catch (PDOException $e)
{
  echo $e->getMessage();
}

?>

