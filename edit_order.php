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
                             <input type='submit' value='Сохранить' />
                         </form>";
    }
    else{
        echo "Пользователь не найден";
    }
}



            ?>


<!----------------------------------------------------------------->

      <footer>

      </footer>

   </body>
</html>








































