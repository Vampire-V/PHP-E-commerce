<?PHP  
  include ('backend/CheckSession.php');
  include ('conn/connect.php');
  ($userID) ? $strSQL = "SELECT * FROM orders WHERE cus_id=$userID " :  1;

    $objQuery = $conn->query($strSQL);
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Website Example</title>
    <?PHP include ('header/header.php')?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <style>
      tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
      }
    </style>
</head>

<body>

    <?PHP include ('menu.php');?>
    <div class="container" style="margin-top:70px">
  <h2>ออร์เดอที่สั่ง</h2>  
<table class="table table-hover" id="example" data-page-length="3" data-order="[[ 1, &quot;asc&quot; ]]">
    <thead>
      <tr>
        <th>ชื่อ</th>
        <th>ที่อยู่</th>
        <th>วันที่สั่ง</th>
        <th>สถานะ</th>
        <th></th>
      </tr>
    </thead>
    <?PHP 
    if ($objQuery->num_rows > 0) {?>
    <tbody>
    <?PHP  while($row = $objQuery->fetch_assoc()) {?>
      <tr>
        <td><?PHP echo $row['order_fullname'];?></td>
        <td><?PHP echo $row['order_address'];?></td>
        <td><?PHP echo $row['order_date'];?></td>
        <td><?PHP echo $row['status'];?></td>
        <?PHP if($row['status']=="รออนุมัติ"){
          ?>
          <td><a class="btn btn-success" type="submit" href="payment.php?order_id=<?php echo $row['order_id']; ?>" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>ดูรายการ</a></td>
          <?PHP
        } else{?>
        <td><a class="btn btn-primary" type="submit" href="payment.php?order_id=<?php echo $row['order_id']; ?>" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>ชำระเงิน  </a></td>
        <?PHP } ?>
      </tr>
    <?PHP }
     } else {
     ?>
        <div class="alert alert-info">
  <strong>ไม่มีรายการสั่งซื้อ!</strong> รายการว่าง.
</div>
    <?PHP }?>
    </tbody>
  </table>
</div>


    <?PHP  $conn->close();
    include ('footer/footer.php');
    ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#example').DataTable({
                "lengthMenu": [
                    [3, 5, 7, -1],
                    [3, 5, 7, "All"]
                ]
            });
      });
    </script>
</body>
</html>