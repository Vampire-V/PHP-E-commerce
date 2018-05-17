<?PHP 
include ('backend/CheckSession.php');
include ('conn/connect.php');

 $_POST["nameproduct"].'<br>';
 $_POST["detail"].'<br>';
 $_POST["size"].'<br>';
 $_POST["favcolor"].'<br>';
 $_POST["pattern"].'<br>';
 $_POST["patterncolor"].'<br>';
 $_POST["quty"].'<br>';
$pricesize = 0;
$pricepattern=0;
if($_POST["size"]=="S"){
    $pricesize=100;
} elseif ($_POST["size"]=="M") {
    $pricesize=150;
} elseif ($_POST["size"]=="L") {
    $pricesize=200;
} elseif ($_POST["size"]=="XL") {
    $pricesize=250;
}

if ($_POST["pattern"]=="A") {
    $pricepattern=100;
} elseif ($_POST["pattern"]=="B") {
    $pricepattern=200;
} elseif ($_POST["pattern"]=="C") {
    $pricepattern=300;
} elseif ($_POST["pattern"]=="D") {
    $pricepattern=400;
} 
$price = ($pricesize+$pricepattern)*$_POST["quty"];
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
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>My First Bootstrap 4 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <?PHP include ('menu.php');?>
    <div class="container" style="margin-top:30px">
        <h3>รายการสั่งทำ</h3>
        <form action="backend/order_create.php" method="post">
        <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อนามสกุล" style="width: 300px;" name="order_fullname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">ที่อยู่</label>
                        <textarea class="form-control" rows="3" style="width: 500px;" name="order_address" id="order_address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="order_phone" placeholder="ใส่เบอร์โทรศัพท์ที่สามารถติดต่อได้" style="width: 300px;"
                            name="order_phone">
                    </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ชื่อสินค้า</th>
                        <th>รายละเอียด</th>
                        <th>ขนาด</th>
                        <th>สีสินค้า</th>
                        <th>ลาย</th>
                        <th>สีลาย</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?PHP echo $_POST["nameproduct"];?>
                            <input type="hidden" name="nameproduct" value="<?php echo $_POST["nameproduct"]; ?>" />
                        </td>
                        <td>
                            <?PHP echo $_POST["detail"];?>
                            <input type="hidden" name="detail" value="<?php echo $_POST["detail"]; ?>" />
                        </td>
                        <td>
                            <?PHP echo $_POST["size"];?>
                            <input type="hidden" name="size" value="<?php echo $_POST["size"]; ?>" />
                        </td>
                        <td style="background-color:<?PHP echo $_POST["favcolor"];?>;">
                            <?PHP echo $_POST["favcolor"];?>
                            <input type="hidden" name="favcolor" value="<?php echo $_POST["favcolor"]; ?>" />
                        </td>
                        <td>
                            <?PHP echo $_POST["pattern"];?>
                            <input type="hidden" name="pattern" value="<?php echo $_POST["pattern"]; ?>" />
                        </td>
                        <td style="background-color:<?PHP echo $_POST["patterncolor"];?>;">
                            <?PHP echo $_POST["patterncolor"];?>
                            <input type="hidden" name="patterncolor" value="<?php echo $_POST["patterncolor"]; ?>" />
                        </td>
                        <td>
                            <?PHP echo $_POST["quty"];?>
                            <input type="hidden" name="quty" value="<?php echo $_POST["quty"]; ?>" />
                        </td>
                        <td>
                            <?PHP echo number_format($price,2);?> บาท
                            <input type="hidden" name="price" value="<?php echo $price; ?>" /></td>
                    </tr>

                    <tr>
                        <td colspan="8" style="text-align: right;">
                            <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>" />
                            <a href="index.php" type="button" class="btn btn-danger btn-lg">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary btn-lg">บันทึกการสั่งซื้อสินค้า</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <?PHP  
    mysqli_close($conn);
    include ('footer/footer.php');
    ?>
</body>

</html>