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
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>
            <?php
               $order_id = $_GET['order_id'];
               $order = getOrderById($db, $order_id);
            ?>


      <footer>

      </footer>

   </body>
</html>

