<!DOCTYPE html>
<html>
   <?php include 'head.php';?>
   <body>
      <style>
        html, body {
        height: 50%;
        padding-top: 52px;
        }
      </style>
      <?php include 'header.php';?>

      <div id="content">
          <div class="container-fluid">
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>


          </div>
      </div>

       <table class="table table-bordered">
         <tr>
            <!--<th>Изделие</th>-->
            <th>Наименование детали</th>
            <th>Материал</th>
            <th>Заготовка</th>
            <th>Размер</th>
            <th>Высота (длина)</th>
            <th>Масса единицы</th>

         </tr>
         <?php
              $details = getAlldetails($db);
            ?>
         <?php foreach ($details as $detail) { ?>
            <tr>

               <td><?php echo $detail['detail_name']; ?></td>
               <td><?php echo $detail['material']; ?></td>
               <td><?php echo $detail['form']; ?></td>
               <td><?php echo $detail['size']; ?></td>
               <td><?php echo $detail['height']; ?></td>
               <td><?php echo $detail['mass']; ?></td>
            </tr>
         <?php } ?>
       </table>
       <!--Добавление деталей в базу-->

       <button id="addButton" class="btn btn-primary">Добавить деталь</button>
                <form action="addNewDetail" method="POST" role="form" style="display: none; margin-bottom: 20px;">
                  <div class="form-group">
                     <label for="">Введите наименование детали</label>
                     <input type="text" class="form-control" id="detail_name" name="detail_name" placeholder="Введите наименование детали">
                  </div>

                  <div class="form-group">
                     <label for="">Введите материал</label>
                     <input type="text" class="form-control" id="material" name="material" placeholder="Введите материал">
                  </div>
                  <div class="form-group">
                     <label for="">Введите тип заготовки</label>
                     <input type="text" class="form-control" id="form" name="form" placeholder="Введите тип заготовки">
                  </div>

                  <div class="form-group">
                     <label for="">Введите сечение/размер</label>
                     <input type="text" class="form-control" id="size" name="size" placeholder="Введите сечение/размер">
                  </div>

                  <div class="form-group">
                     <label for="">Введите длину заготовки</label>
                     <input type="text" class="form-control" id="height" name="height" placeholder="Введите длину заготовки">
                  </div>

                  <div class="form-group">
                     <label for="">Введите массу</label>
                     <input type="text" class="form-control" id="weight" name="weight" placeholder="Введите массу">
                  </div>

                  <button type="submit" class="btn btn-default">Добавить</button>
               </form>

                <?php
                  if(isset($_POST['detail_name']) && $_POST['detail_name'] !='')
                  {
                    $detail_name = $_POST['detail_name'];
                    $material = $_POST['material'];
                    $form = $_POST['form'];
                    $size = $_POST['size'];
                    $height = $_POST['height'];
                    $mass = $_POST['mass'];
                    addNewDetail($db, $detail_name, $material, $form, $size, $height, $mass);
                  }

                ?>
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
