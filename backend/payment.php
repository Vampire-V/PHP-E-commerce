<?PHP 
//check file กำลังทำ
    include ('../conn/connect.php');
    date_default_timezone_set('Asia/Bangkok'); 
    echo $_FILES['image1']['name'][0]; 

    $orderID = $_POST['orderid'];

    $upload = array();

        foreach ($_FILES['image1']['name'] as $key => $value) {
            if (move_uploaded_file($_FILES['image1']['tmp_name'][$key],"../image/payments/".date("Ymd_His").'-'.$value)) {
                $upload[] = array(
                    'name'=>'image'.'/'.'payments'.'/'.date("Ymd_His").'-'.$value,
                    'file'=>'image'.'/'.'payments'.'/'.date("Ymd_His").'-'.$value
                );
            }
        }
    
        $imgJson = json_encode($upload);
        $imgArray = json_decode($imgJson,true);
       
        $strSQL = "UPDATE orders SET  order_payment ='".$imgArray[0]["name"]."',status='รออนุมัติ' WHERE order_id='".$orderID."'";
        $objQuery = mysqli_query($conn,$strSQL);
        
        header("location:http://localhost/medee/payment.php?order_id=$orderID");
   
    
    ?>