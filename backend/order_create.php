<?PHP 
include ('../conn/connect.php');
include ('CheckSession.php');

 $name = $_POST["nameproduct"];
 $detail = $_POST["detail"];
 $size = $_POST["size"];
 $favcolor = $_POST["favcolor"];
 $pattern = $_POST["pattern"];
 $patterncolor = $_POST["patterncolor"];
 $quty = $_POST["quty"];
 $price = $_POST["price"];
 echo $price;
        $order_fullname = mysqli_real_escape_string($conn,$_POST['order_fullname']);
		$order_address = mysqli_real_escape_string($conn,$_POST['order_address']);
		$order_phone = mysqli_real_escape_string($conn,$_POST['order_phone']);
		$billstatus = 'ยังไม่ชำระเงิน';

		$meSql = "INSERT INTO orders (order_date, order_fullname, order_address, order_phone, cus_id, status) VALUES (NOW(),'{$order_fullname}','{$order_address}','{$order_phone}','{$userID}','{$billstatus}') ";
		$meQeury = mysqli_query($conn,$meSql);
        if ($meQeury) {
			$order_id = mysqli_insert_id($conn);
				$lineSql = "INSERT INTO order_cus (name, detail, size, favcolor, pattern,  patterncolor, quty, order_id, price) ";
				$lineSql .= "VALUES (";
                $lineSql .= "'$name',";
				$lineSql .= "'$detail',";
				$lineSql .= "'$size',";
                $lineSql .= "'$favcolor',";
                $lineSql .= "'$pattern',";
                $lineSql .= "'$patterncolor',";
                $lineSql .= "'$quty',";
                $lineSql .= "'$order_id',";
                $lineSql .= "'$price'";
                $lineSql .= ") ";
                echo $lineSql;
                mysqli_query($conn,$lineSql);
			mysqli_close($conn);
			header('location:http://localhost/medee/listorders.php?a=order');
		}else{
			mysqli_close($conn);
			header('location:http://localhost/medee/error.php?a=orderfail');
		}
?>