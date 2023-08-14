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
               $order_name = getOrderById($db, $order_id);
            ?>

<!----------------------------------------------------------------->
<!--ВЫВОД ДАННЫХ ПО id-->
<!----------------------------------------------------------------->
            <form action="save.php" method="POST">
               <input type="text" name="id" value="<?php echo $order_name['order_id']; ?>">
               <div class="form-group">
                  <label for="">Введите номер заказа</label>
                  <input type="text" class="form-control" id="order_name" name="order_name" value="<?php echo $order_name['order_name']; ?>">
               </div>
               <button type="submit" class="btn btn-default">Сохранить изменения</button>
            </form>
          </div>
      </div>
<!----------------------------------------------------------------->
<!----------------------------------------------------------------->

<!----------------------------------------------------------------->

      <footer>

      </footer>

   </body>
</html>








































