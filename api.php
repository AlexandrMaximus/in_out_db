<?php

error_reporting(E_ALL);
ini_set('display_errors', 100);
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
		$result[$row['material']] = $row;
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
		$result[$row['form']] = $row;
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
		$result[$row['size']] = $row;
	}

	return $result;
}
/*
//Вывод всех заказов в таблицу//

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
*/

function getAllorders($db) {
	$sql = "SELECT order_id, order_name, memo, client, prod_name, prod_quan, delivery_time, unit_labor, prod_quan * unit_labor as labor, unit_self_cost, prod_quan * unit_self_cost as self_cost FROM orders;

	";
	$result = array();

	$stmt = $db->prepare($sql);

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['order_id']] = $row;
	}

	return $result;
}

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



*/
//Вывод заказа на странице редактирования//
function getOrderById($db, $order_id) {
   $sql = "SELECT * FROM orders
            WHERE order_id = :order_id";
   $stmt = $db->prepare($sql);
   $stmt->bindValue('order_id', $order_id, PDO::PARAM_INT);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   return $row;
}

/*
//Сохранение измененнного номера заказа в базу//
try{
	function saveOrderName($db, $order_name, $order_id) {
	   $sql = "UPDATE orders
	   			SET order_name = :order_name
	   			WHERE order_id = :order_id;
	   			";
	   $stmt = $db->prepare($sql);
	   $stmt->bindValue(':order_name', $order_name);
	   $stmt->bindValue(':order_id', $order_id);
	   $stmt->execute();
		}
	}
catch (PDOException $e)
     {
      echo $e->getMessage();
     }
*/
/*
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


/*
function addNewDetail($db, $detail_name, $materialId, $formId, $sizeId, $height, $mass) {
   $sql = " INSERT INTO details(detail_name, material_id, form_id, size_id, height, mass)
            VALUES (:detail_name, :material_id, :form_id, :size_id, :height, :mass)
            
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

*/