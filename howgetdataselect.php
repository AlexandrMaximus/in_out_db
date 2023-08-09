<?php
// Подключение к базе данных MySql
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
 
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Установка режима ошибок PDO на исключения
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
 
// Извлечение данных из таблицы
$sql = "SELECT id, name FROM MyGuests";
$stmt = $conn->prepare($sql); 
$stmt->execute();
 
// Вывод каждой строки
echo "<select>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
}
echo "</select>";
 
$conn = null;
?>
<?php include 'options.php';?>
 
Файл options.php - это файл PHP, который содержит код для извлечения данных из таблицы базы данных MySql и создания списка опций для выпадающего списка на HTML-странице.
 
Вот пример кода на PHP для извлечения данных из таблицы и создания списка опций:
 
<?php
// Подключение к базе данных MySql
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
 
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Установка режима ошибок PDO на исключения
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
 
// Извлечение данных из таблицы
$sql = "SELECT id, name FROM MyGuests";
$stmt = $conn->prepare($sql); 
$stmt->execute();
 
// Вывод каждой строки
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
}
 
$conn = null;
?>
Копировать
Вот пример кода на HTML для включения списка опций в HTML-страницу:
 
<select>
  <?php include 'options.php';?>
</select>