<?PHP
          include ('backend/CheckSession.php');
          include ('conn/connect.php');
          $sql = "SELECT * FROM Customer ORDER BY cus_id ASC";
          $objQuery = $conn->query($sql);
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
    <h4>สมาชิก</h4>
    <table class="table table-hover" id="example" data-page-length="3" data-order="[[ 1, &quot;asc&quot; ]]">
        <thead>
          <tr>
            <th>เมลล์</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>สถานะ</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?PHP
    $r = $objQuery->num_rows;
    if ($r > 0) {
         while($row = $objQuery->fetch_assoc()) {
             ?>
            <tr>
              <td>
                <?PHP echo $row['cus_email'];?>
              </td>
              <td>
                <?PHP echo $row['cus_fname'];?>
              </td>
              <td>
                <?PHP echo $row['cus_lname'];?>
              </td>
              <td>
                <?PHP echo $r = ($row['status']==1) ? 'แอดมิน':'ลูกค้า';?>
              </td>
              <td>
                <a href="profile.php?cus_id=<?PHP echo $row['cus_id'];?>" type="button" class="btn btn-primary btn-lg">แก้ไข</a>
                <a href="profile.php?delete_id=<?PHP echo $row['cus_id'];?>" type="button" class="btn btn-danger btn-lg">ลบ</a>
              </td>

            </tr>
            <?PHP }
     } else {
     ?>
            <div class="alert alert-warning">
              <strong>ไม่มีสมาชิก</strong> สมาชิกเป็น : 0
            </div>
            <?PHP }?>
        </tbody>
      </table>
    </div>
    <?PHP  
    $conn->close();
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