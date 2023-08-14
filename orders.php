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
      <div id="content">
          <div class="container-fluid">
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>


          </div>
      </div>
<!----------------------------------------------------------------->
      <table class="table table-bordered">
         <tr>
            <!--<th>Изделие</th>-->
            <th>Номер заказа</th>
            <th>Служебная записка</th>
            <th>Заказчик</th>
            <th>Продукция</th>
            <th>Количество</th>
            <th>Срок поставки</th>
            <th>Трудозатраты на единицу продукции</th>
            <th>Трудозатраты общие</th>
            <th>Себестоимость единицы</th>
            <th>Себестоимость всего</th>

         </tr>
         <!----------------------------------------------------------------->
         <?php
              $orders = getAllorders($db);
            ?>
         <!----------------------------------------------------------------->
         <?php foreach ($orders as $order) { ?>

            <tr>
               <td><a href="edit_order.php?order_id=<?php echo $order['order_id']; ?>"><?php echo $order['order_name']; ?></a></td>
               <td><?php echo $order['memo']; ?></td>
               <td><?php echo $order['client']; ?></td>
               <td><a href=""><?php echo $order['prod_name']; ?></a></td>
               <td><?php echo $order['prod_quan']; ?></td>
               <td><?php echo $order['delivery_time']; ?></td>
               <td><?php echo $order['unit_labor']; ?></td>
               <td><?php echo $order['labor']; ?></td>
               <td><?php echo $order['unit_self_cost']; ?></td>
               <td><?php echo $order['self_cost']; ?></td>
               <td><a href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Изменить</a></td>
            </tr>
         <?php } ?>
      </table>
<!----------------------------------------------------------------->
<!----------------------------------------------------------------->
       <!--Добавление деталей в базу-->
<!----------------------------------------------------------------->
      <button id="addButton" class="btn btn-primary">Добавить заказ</button>
                <form action="post_orders.php" method="POST" role="form" style="display: none; margin-bottom: 20px;">
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите номер заказа</label>
                     <input type="text" class="form-control" id="order_name" name="order_name" placeholder="Введите номер заказа">
                  </div>

<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите номер служебной записки</label>
                     <input type="text" class="form-control" id="memo" name="memo" placeholder="Введите номер служебной записки">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите заказчика</label>
                     <input type="text" class="form-control" id="client" name="client" placeholder="Введите заказчика">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите продукцию</label>
                     <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Введите продукцию">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите количество продукции</label>
                     <input type="number" class="form-control" id="prod_quan" name="prod_quan" placeholder="Введите количество продукции">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите дату поставки</label>
                     <input type="date" class="form-control" id="delivery_time" name="delivery_time" placeholder="Введите дату поставки">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите трудозатраты на ед.продукции</label>
                     <input type="number" class="form-control" id="unit_labor" name="unit_labor" placeholder="Введите трудозатраты на ед.продукции">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите трудозатраты на заказ</label>
                     <input type="number" class="form-control" id="labor" name="labor" placeholder="Введите трудозатраты на заказ">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите себестоимость ед.продукции</label>
                     <input type="number" class="form-control" id="unit_self_cost" name="unit_self_cost" placeholder="Введите себестоимость ед.продукции">
                  </div>
<!----------------------------------------------------------------->
                  <div class="form-group">
                     <label for="">Введите себестоимость заказа</label>
                     <input type="number" class="form-control" id="self_cost" name="self_cost" placeholder="Введите себестоимость заказа">
                  </div>
<!----------------------------------------------------------------->
                  <button type="submit" class="btn btn-default">Добавить</button>
<!----------------------------------------------------------------->


<!----------------------------------------------------------------->

                </form>

      <footer>

      </footer>
        <!--СКРИПТ СОКРЫТИЯ ФОРМЫ-->
        <script>
          $("#addButton").click(function(){
            $("form").slideDown();
          });

        </script>
   </body>
</html>








































