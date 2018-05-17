<?php
      include ('backend/CheckSession.php');
      include ('conn/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Website Example</title>
    <?PHP include ('header/header.php')?>
</head>
<body>
<?PHP include ('menu.php') ?>

<div class="container" style="margin-top:40px">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"> <br />
      <h4 align="center"> ฟอร์มเพิ่มสินค้า </h4>
      <hr>
      <form action="backend/add_product.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
            <textarea name="detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6">
            <p> ราคา (บาท) </p>
            <input type="number"  name="price" class="form-control" required placeholder="ราคา" />
            </div>
            <div class="col-sm-6">
                <p>ชนิดสินค้า</p>
                <input type="text" name="type" class="form-control" required placeholder="ชนิดสินค้า">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-3">
            <p> จำนวน (สินค้า) </p>
            <input type="number"  name="quty" class="form-control" required placeholder="จำนวน" />
          </div>
          <div class="col-sm-8 info">
            <p> ภาพสินค้า (อัพโหลด 3 รูป) </p>
            <input type="file" name="image1[]" class="form-control" require multiple />
          </div>

        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มสินค้า </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?PHP include ('footer/footer.php');
    mysqli_close($conn);
?>
</body>
</html>