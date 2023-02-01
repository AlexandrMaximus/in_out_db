<?php


try{
    $user = "root";
    $password = "";


    $db = new PDO("mysql:host=localhost;dbname=in_out_db2", $user, $password);

    $detail_name = $_POST['detail_name'];
    $material = $_POST['material'];
    $form = $_POST['form'];
    $size = $_POST['size'];
    $height = $_POST['height'];
    $mass = $_POST['mass'];

    if (empty($_POST['detail_name'])) exit('поле не заполнено');
    if (empty($_POST['material'])) exit('поле не заполнено');
    if (empty($_POST['form'])) exit('поле не заполнено');
    if (empty($_POST['size'])) exit('поле не заполнено');
    if (empty($_POST['height'])) exit('поле не заполнено');
    if (empty($_POST['mass'])) exit('поле не заполнено');

    $sql = "INSERT INTO details (detail_name, material, form, size, height, mass) VALUES  ('$detail_name', '$material', '$form', '$size', '$height', '$mass')";

     $stmt = $db->prepare($sql);
     $stmt->execute(['detail_name' => $_POST['detail_name'], 'material' => $_POST['material'], 'form' => $_POST['form'], 'size' => $_POST['size'], 'height' => $_POST['height'], 'mass' => $_POST['mass'],]);

     header("Location: details.php");
}
catch (PDOException $e)
{
  echo $e->getMessage();
}

?>