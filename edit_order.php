<?php

try{
    $user = "root";
    $password = "";


    $conn = new PDO("mysql:host=localhost;dbname=in_out_db2", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }

catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
   }


?>




<!DOCTYPE html>
<html>
<!----------------------------------------------------------------->
   <?php include 'head.php';?>
<!----------------------------------------------------------------->
   <body>
      <style>
      html, body {
      height: 50%;
      padding-top: 52px;
      }
      </style>
<!----------------------------------------------------------------->
      <?php include 'header.php';?>
<!----------------------------------------------------------------->
<!----------------------------------------------------------------->
<!--ПОЛУЧЕНИЕ ДАННЫХ ПО ID-->
<!----------------------------------------------------------------->
      <div id="content">
          <div class="container-fluid">
            <?php

            if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["order_id"]))
              {
                $order_id = $_GET["order_id"];
                $sql = "SELECT * FROM orders WHERE order_id = :order_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":order_id", $order_id);
                // выполняем выражение и получаем заказ по id
                $stmt->execute();
                if($stmt->rowCount() > 0){
                  foreach ($stmt as $row) {
                     $order_name = $row["order_name"];
                     $memo = $row["memo"];
                     $client = $row["client"];
                     $prod_name = $row["prod_name"];
                     $prod_quan = $row["prod_quan"];
                     $delivery_time = $row["delivery_time"];
                     $unit_labor = $row["unit_labor"];
                     $labor = $row["labor"];
                     $unit_self_cost = $row["unit_self_cost"];
                     $self_cost = $row["self_cost"];
                  }
                  echo "<h3>Обновление данных заказа</h3>
                         <form method='post'>
                             <input type='hidden' name='order_id' value='$order_id' />
                             <p>Номер заказа:
                             <input type='text' name='order_name' value='$order_name' /></p>
                             <p>номер служебной записки:
                             <input type='text' name='memo' value='$memo' /></p>
                             <p>заказчик:
                             <input type='text' name='client' value='$client' /></p>
                             <p>продукция:
                             <input type='text' name='prod_name' value='$prod_name' /></p>
                             <p>количество продукции:
                             <input type='number' name='prod_quan' value='$prod_quan' /></p>
                             <p>дата поставки:
                             <input type='date' name='delivery_time' value='$delivery_time' /></p>
                             <p>трудозатраты на единицу:
                             <input type='number' name='unit_labor' value='$unit_labor' /></p>
                             <p>трудозатраты общие:
                             <input type='number' name='labor' value='$labor' /></p>
                             <p>себестоимость за единицу:
                             <input type='number' name='unit_self_cost' value='$unit_self_cost' /></p>
                             <p>себестоимость общая:
                             <input type='number' name='self_cost' value='$self_cost' /></p>
                             <input type='submit' value='Сохранить' />
                         </form>";
               }
             else{
                 echo "Заказ не найден";
                  }
               }

            elseif (isset($_POST["order_id"]) && isset($_POST["order_name"]) && isset($_POST["memo"]) && isset($_POST["client"]) && isset($_POST["prod_name"]) && isset($_POST["prod_quan"]) && isset($_POST["delivery_time"]) && isset($_POST["unit_labor"]) && isset($_POST["labor"]) && isset($_POST["unit_self_cost"]) && isset($_POST["self_cost"]))
            {

                $sql = "UPDATE orders SET order_name = :order_name, memo = :memo, client = :client, prod_name = :prod_name, prod_quan = :prod_quan, delivery_time = :delivery_time, unit_labor = :unit_labor, labor = :labor, unit_self_cost = :unit_self_cost, self_cost = :self_cost WHERE order_id = :order_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":order_id", $_POST["order_id"]);
                $stmt->bindValue(":order_name", $_POST["order_name"]);
                $stmt->bindValue(":memo", $_POST["memo"]);
                $stmt->bindValue(":client", $_POST["client"]);
                $stmt->bindValue(":prod_name", $_POST["prod_name"]);
                $stmt->bindValue(":prod_quan", $_POST["prod_quan"]);
                $stmt->bindValue(":delivery_time", $_POST["delivery_time"]);
                $stmt->bindValue(":unit_labor", $_POST["unit_labor"]);
                $stmt->bindValue(":labor", $_POST["labor"]);
                $stmt->bindValue(":unit_self_cost", $_POST["unit_self_cost"]);
                $stmt->bindValue(":self_cost", $_POST["self_cost"]);


                $stmt->execute();
                header("Location: orders.php");
            }
            else{
                echo "Некорректные данные";
                  }

            ?>


<!----------------------------------------------------------------->

      <footer>

      </footer>

   </body>
</html>








































