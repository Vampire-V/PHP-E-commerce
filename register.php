<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?PHP include ('header/header.php')?>
</head>
<body>

<?PHP include ('slide.php'); ?>

<?PHP include ('menu.php') ?>
<div class="container" style="margin-top:30px">
<form action="backend/register.php" name="register" method="post" >
  <div class="form-group">
    <label for="email">อีเมลล์:</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="password">รหัส:</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="form-group">
    <label for="conpassword">ยืนยันรหัส:</label>
    <input type="password" class="form-control" name="conpassword" id="conpassword">
  </div>
  <div class="form-group">
    <label for="fname">ชื่อ:</label>
    <input type="text" class="form-control" name="fname" id="fname">
  </div>
  <div class="form-group">
    <label for="lname">นามสกุล:</label>
    <input type="text" class="form-control" name="lname" id="lname">
  </div>
  <div class="form-group">
    <label for="lname">ที่อยู่:</label>
    <input type="text" class="form-control" name="address" id="address">
  </div>
  <div class="form-group">
    <label for="lname">เบอร์โทร:</label>
    <input type="text" class="form-control" name="tel" id="tel">
  </div>

  <button type="submit" class="btn btn-primary btn-sm">ลงทะเบียน</button>
</form> 
</div>
<br>
<?PHP include ('footer/footer.php')?>
</body>
</html>
