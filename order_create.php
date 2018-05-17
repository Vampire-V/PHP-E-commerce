<?PHP 
// order_create form
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


    <?PHP include ('menu.php');?>
    <div class="container" style="margin-top:40px">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br />
                <h4 align="center"> ฟอร์มสั่งทำสินค้า </h4>
                <hr>
                <form action="order_createlist.php" method="POST" name="order_create" class="form-horizontal" id="order_create">
                
                    <div class="form-group">
                        <div class="col-sm-12">
                            <p> ชื่อสินค้า</p>
                            <input type="text" name="nameproduct" class="form-control" required placeholder="ชื่อสินค้า" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <p> รายละเอียดสินค้า </p>
                            <textarea name="detail" class="form-control" rows="3" required placeholder="รายละเอียดสินค้า"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="size">ขนาด</label>
                            <select class="form-control" name="size" id="size">
                                <option value="S">S ราคา 100</option>
                                <option value="M">M ราคา 150</option>
                                <option value="L">L ราคา 200</option>
                                <option value="XL">XL ราคา 250</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-3">
                            <label for="favcolor">สีสินค้า</label>
                            <input type="color" class="form-control" id="favcolor" name="favcolor" value="#ff0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="pattern">ลายสินค้า</label>
                            <select class="form-control" name="pattern" id="pattern">
                                <option value="A">A ราคา 100</option>
                                <option value="B">B ราคา 200</option>
                                <option value="C">C ราคา 300</option>
                                <option value="D">D ราคา 400</option>
                            </select>
                        </div>
                        <div class="col-sm-3 info">
                            <label for="patterncolor">สีลาย</label>
                            <input type="color" class="form-control" id="patterncolor" name="patterncolor" value="#ff0000">
                        </div>
                        <div class="col-sm-3">
                            <p> จำนวน (สินค้า) </p>
                            <input type="number" name="quty" class="form-control" required placeholder="จำนวน" />
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="btnadd"> + สั่งทำ </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?PHP  
    mysqli_close($conn);
    include ('footer/footer.php');
    ?>
</body>

</html>