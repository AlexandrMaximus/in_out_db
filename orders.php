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
               <td><?php echo $order['order_name']; ?></td>
               <td><?php echo $order['memo']; ?></td>
               <td><?php echo $order['client']; ?></td>
               <td><?php echo $order['prod_name']; ?></td>
               <td><?php echo $order['prod_quan']; ?></td>
               <td><?php echo $order['delivery_time']; ?></td>
               <td><?php echo $order['unit_labor']; ?></td>
               <td><?php echo $order['labor']; ?></td>
               <td><?php echo $order['unit_self_cost']; ?></td>
               <td><?php echo $order['self-cost']; ?></td>
            </tr>
         <?php } ?>
      </table>
<!----------------------------------------------------------------->

   </body>
</html>








































