<?PHP 
// order_create form
      include ('backend/CheckSession.php');
      include ('conn/connect.php');

      $sql = "SELECT * FROM orders WHERE status='รออนุมัติ' ORDER BY cus_id ASC";
      $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Website Example</title>
    <?PHP include ('header/header.php')?>
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
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
        <h4>รายการรออนุมัติ</h4>
        <table class="table table-hover" id="example" data-page-length="3" data-order="[[ 1, &quot;asc&quot; ]]">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>วันที่สั่ง</th>
                    <th>ชื่อ</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                $r = $result->num_rows;
                if ($r > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td scope="row">
                            <?PHP echo $row['order_id'];?>
                        </td>
                        <td>
                            <?PHP echo $row['order_date'];?>
                        </td>
                        <td>
                            <?PHP echo $row['order_fullname'];?>
                        </td>
                        <td>
                            <?PHP echo $row['order_address'];?>
                        </td>
                        <td>
                            <?PHP echo $row['order_phone'];?>
                        </td>
                        <td>
                            <?PHP echo $row['status'];?>
                        </td>

                        <td>
                            <a class="btn btn-success" type="submit" href="payment.php?order_id=<?PHP echo $row['order_id'];?>" role="button">
                                <span class="glyphicon glyphicon-trash"></span>ตกลง</a>
                        </td>
                    </tr>
                    <?PHP
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>
    <?PHP  
    $conn->close();
    include ('footer/footer.php');
    ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable({
                "lengthMenu": [
                    [3, 5, 7, -1],
                    [3, 5, 7, "All"]
                ]
            });
} );
    </script>
</body>
</html>