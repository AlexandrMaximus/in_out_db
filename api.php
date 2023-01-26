<?php
//Вывод всех деталей в таблицу//
function getAlldetails($db) {
	$sql = "SELECT * FROM details;

	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['detail_id']] = $row;
	}

	return $result;
}

//Вывод всех материалов в таблицу//
function getAllMaterials($db) {
	$sql = "SELECT * FROM materials;

	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['material_id']] = $row;
	}

	return $result;
}



//Вывод всех заготовок  в таблицу//
function getAllForms($db) {
	$sql = "SELECT * FROM forms;

	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['form_id']] = $row;
	}

	return $result;
}

//Вывод всех размеров  в таблицу//
function getAllSizes($db) {
	$sql = "SELECT * FROM sizes;

	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['size_id']] = $row;
	}

	return $result;
}
/*

/*

//Вывод всех заказов//
function getAllorders($db) {
	$sql = "SELECT * FROM orders;
			
	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['order_id']] = $row;
	}

	return $result;
}



//Вывод всех статусов производства детали//
function getAllProductionStatus($db) {
	$sql = "SELECT * FROM production_status;

	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['production_status_id']] = $row;
	}

	return $result;
}

//Вывод деталей по продукту//
function getDetailsByProduct($db, $product) {
	$product = $_GET['product'];
	$sql = "SELECT *	FROM details

				WHERE details.product = :product";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':product', $_GET['product'], PDO::PARAM_STR);

	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['detail_id']] = $row;
	}

	return $result;

   //$row = $stmt->fetch(PDO::FETCH_ASSOC);
   //return $row;

}



//Вывод детали на странице редактирования//
function getDetailById($db, $detail_id) {
   $sql = "SELECT * FROM details 
            WHERE detail_id = :detail_id";
   $stmt = $db->prepare($sql);
   $stmt->bindValue('detail_id', $detail_id, PDO::PARAM_INT);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   return $row;
}

//Сохранение измененнной детали в базу//
function saveDetail($db, $detail_name, $detail_id) {
   $sql = " UPDATE details
            SET detail_name = :detail_name
            WHERE detail_id = :detail_id
   ";

   $stmt = $db->prepare($sql);
   $stmt->bindValue(':detail_name', $detail_name, PDO::PARAM_STR);
   $stmt->bindValue(':detail_id', $detail_id, PDO::PARAM_INT);

   $stmt->execute();
}

*/

//--Добавление новых деталей в базу//



function addNewDetail($db, $detail_name, $material, $form, $size, $height, $mass) {
   $sql = " INSERT INTO details(detail_name, material, form, size, height, mass)
            VALUES (:detail_name, :material, :form, :size, :height, :mass)
            
   ";

   $stmt = $db->prepare($sql);
   $stmt->bindValue(':detail_name', $detail_name);
   $stmt->bindValue(':material', $material);
   $stmt->bindValue(':form', $form);
   $stmt->bindValue(':size', $size);
   $stmt->bindValue(':height', $height);
   $stmt->bindValue(':mass', $mass);

   $stmt->execute();
}

