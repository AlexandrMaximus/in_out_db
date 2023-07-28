<?php


try{
    $user = "root";
    $password = "";


    $db = new PDO("mysql:host=localhost;dbname=in_out_db2", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $order_name = $_POST['order_name'];
    $memo = $_POST['memo'];
    $client = $_POST['client'];
    $prod_name = $_POST['prod_name'];
    $prod_quan = $_POST['prod_quan'];
    $delivery_time = date('Y-m-d', strtotime($_POST['delivery_time']));
    $unit_labor = $_POST['unit_labor'];
    $labor = $_POST['labor'];
    $unit_self_cost = $_POST['unit_self_cost'];
    $self_cost = $_POST['self_cost'];

    if (empty($_POST['order_name'])) exit('поле order_name не заполнено');
    if (empty($_POST['memo'])) exit('поле memo не заполнено');
    if (empty($_POST['client'])) exit('поле client не заполнено');
    if (empty($_POST['prod_name'])) exit('поле prod_name не заполнено');
    if (empty($_POST['prod_quan'])) exit('поле prod_quan не заполнено');
    if (empty($_POST['delivery_time'])) exit('поле delivery_time не заполнено');
    if (empty($_POST['unit_labor'])) exit('поле unit_labor не заполнено');
    if (empty($_POST['labor'])) exit('поле labor не заполнено');
    if (empty($_POST['unit_self_cost'])) exit('поле unit_self_cost не заполнено');
    if (empty($_POST['self_cost'])) exit('поле self_cost не заполнено');

    $sql = "INSERT INTO orders (order_name, memo, client, prod_name, prod_quan, delivery_time, unit_labor, labor, unit_self_cost, self_cost) VALUES  ('$order_name', '$memo', '$client', '$prod_name', '$prod_quan', '$delivery_time', '$unit_labor', '$labor', '$unit_self_cost', '$self_cost')";

     $stmt = $db->prepare($sql);
     $stmt->execute(['order_name' => $_POST['order_name'], 'memo' => $_POST['memo'], 'client' => $_POST['client'], 'prod_name' => $_POST['prod_name'], 'prod_quan' => $_POST['prod_quan'], 'delivery_time' => $_POST['delivery_time'], 'unit_labor' => $_POST['unit_labor'], 'labor' => $_POST['labor'], 'unit_self_cost' => $_POST['unit_self_cost'], 'self_cost' => $_POST['self_cost'],]);

     header("Location: orders.php");
}
catch (PDOException $e)
{
  echo "PDO error :" . $e->getMessage();
}

?>