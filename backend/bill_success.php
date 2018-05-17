<?PHP 
//check file กำลังทำ
    include ('../conn/connect.php');
    date_default_timezone_set('Asia/Bangkok');

  $orderID = $_GET['order_id'];
  $check = $_GET['check'];
  $sta = '';
    if ($check=='รออนุมัติ') {
        $st='อนุมัติ';
    } elseif ($check=='อนุมัติ') {
        $st='ส่งของแล้ว';
    } elseif ($check=='ส่งของแล้ว') {
        $st='ถึงลูกค้าแล้ว';
    }
    
        $strSQL = "UPDATE orders SET status='".$st."' WHERE order_id='".$orderID."'";
        $objQuery = mysqli_query($conn,$strSQL);
        
        header("location:http://localhost/medee/payment.php?order_id=$orderID");
    ?>