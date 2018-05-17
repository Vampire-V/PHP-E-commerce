<?php
    include ('CheckSession.php');
    include ('../conn/connect.php');
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
	echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
	unset($_SESSION['formid']);
	if ($_POST) { 
		$order_fullname = mysqli_real_escape_string($conn,$_POST['order_fullname']);
		$order_address = mysqli_real_escape_string($conn,$_POST['order_address']);
		$order_phone = mysqli_real_escape_string($conn,$_POST['order_phone']);
		$billstatus = 'ยังไม่ชำระเงิน';

		$meSql = "INSERT INTO orders (order_date, order_fullname, order_address, order_phone, cus_id, status) VALUES (NOW(),'{$order_fullname}','{$order_address}','{$order_phone}','{$userID}','{$billstatus}') ";
		$meQeury = mysqli_query($conn,$meSql);
		if ($meQeury) {
			$order_id = mysqli_insert_id($conn);
			for ($i = 0; $i < count($_POST['qty']); $i++) {
				$order_detail_quantity = mysqli_real_escape_string($conn,$_POST['qty'][$i]);
				$order_detail_price = mysqli_real_escape_string($conn,$_POST['pro_price'][$i]);
				$product_id = mysqli_real_escape_string($conn,$_POST['pro_id'][$i]);
				$lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id) ";
				$lineSql .= "VALUES (";
				$lineSql .= "'{$order_detail_quantity}',";
				$lineSql .= "'{$order_detail_price}',";
				$lineSql .= "'{$product_id}',";
				$lineSql .= "'{$order_id}'";
				$lineSql .= ") ";
				mysqli_query($conn,$lineSql);
			}
			mysqli_close($conn);
			unset($_SESSION['cart']);
			unset($_SESSION['qty']);
			header('location:http://localhost/medee/listorders.php?a=order');
		}else{
			mysqli_close($conn);
			header('location:http://localhost/medee/error.php?a=orderfail');
		}
	}
}
?>