<?PHP  
include ('backend/CheckSession.php');
include ('conn/connect.php');
isset($_REQUEST['cus_id']) ? $cus_id = $_REQUEST['cus_id'] : $cus_id = $_SESSION['UserID'];
isset($_REQUEST['delete_id']) ? $delete_id = $_REQUEST['delete_id'] : $delete_id = '';
$strSQL = "SELECT * FROM Customer WHERE cus_id = '".$cus_id."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

// Delete record
if ($delete_id) {
  $delete = "DELETE FROM Customer WHERE cus_id=".$delete_id;
  mysqli_query($conn,$delete);
  header("location:http://localhost/medee/list_cus.php");
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?PHP include ('header/header.php')?>
</head>

<body>


  <?PHP include ('menu.php') ?>
  <div class="container" style="margin-top:70px">
    <h2>แก้ไขข้อมูลส่วนตัว</h2>

    <div class="table-responsive-sm"></div>
    <form name="edit-profile" method="post" action="backend/save_profile.php">
      <br>
      <table class="table">
        <tbody>

          <tr>
            <td>&nbsp;ชื่อ</td>
            <td>
              <input name="fname" type="text" id="fname" value="<?php echo $objResult['cus_fname'];?>">
            </td>
          </tr>
          <tr>
            <td>&nbsp;นามสกุล</td>
            <td>
              <input name="lname" type="text" id="lname" value="<?php echo $objResult['cus_lname'];?>">
            </td>
          </tr>
          <tr>
            <td>&nbsp;ที่อยู่</td>
            <td>
              <input name="address" type="text" id="address" value="<?php echo $objResult['cus_address'];?>">
            </td>
          </tr>
          <tr>
            <td>&nbsp;อีเมลล์</td>
            <td>
              <input name="email" type="email" id="email" value="<?php echo $objResult['cus_email'];?>">
            </td>
          </tr>
          <tr>
            <td> &nbsp;รหัสผ่าน</td>
            <td>
              <input name="password" type="text" id="password" value="<?php echo $objResult['cus_password'];?>">
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <input class="btn btn-primary" type="submit" name="Submit" value="แก้ไข">
      <input type="hidden" name="cus_id" value="<?PHP echo $cus_id; ?>">
    </form>
  </div>
  <br>

  <?PHP 
$conn->close();
include ('footer/footer.php');
    
?>
</body>

</html>