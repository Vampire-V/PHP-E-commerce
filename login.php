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
    <br>
<div class="container" style="margin-top:30px">
<form action="backend/login.php" method="post" name="login">
  <div class="form-group">
    <label for="email">อีเมลล์:</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="password">พาสเวิด:</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">ล็อคอิน</button>
</form> 
</div>
<br>
<?PHP include ('footer/footer.php')?>
</body>
</html>
