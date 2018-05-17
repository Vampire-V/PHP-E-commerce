<?PHP include ('backend/CheckSession.php');?>
<?PHP include ('backend/cartbackend.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Website Example</title>
    <?PHP include ('header/header.php')?>
</head>

<body>


    <!-- Static navbar -->
    <?PHP include ('menu.php');?>

    <div class="container" style="margin-top:70px">
        <div class="row">
            <?PHP include ('cartmenu.php');?>

            <div class="col-sm-8">


                <h3>ตะกร้าสินค้าของฉัน</h3>
                <!-- Main component for a primary marketing message or call to action -->
                <?php
            if ($action == 'removed')
            {
                echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
            }

            if ($meCount == 0)
            {
                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
            } else
            {
                ?>
                    <form action="backend/updatecart.php" method="post" name="fromupdate">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>จำนวน</th>
                                    <th>ราคาต่อหน่วย</th>
                                    <th>จำนวนเงิน</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $total_price = 0;
                            $num = 0;
                            while ($meResult = mysqli_fetch_assoc($meQuery))
                            {
                                $key = array_search($meResult['pro_id'], $_SESSION['cart']);
                                $total_price = $total_price + ($meResult['pro_price'] * $_SESSION['qty'][$key]);
                                ?>
                                    <tr>
                                        <td>
                                            <img class="setimgcart" src="<?php echo $meResult['pro_img1'];?>" border="0">
                                        </td>
                                        <td>
                                            <?php echo $meResult['pro_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $meResult['pro_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $meResult['pro_detail']; ?>
                                        </td>
                                        <td>
                                            <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
                                            <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                                        </td>
                                        <td>
                                            <?php echo number_format($meResult['pro_price'],2); ?>
                                        </td>
                                        <td>
                                            <?php echo number_format(($meResult['pro_price'] * $_SESSION['qty'][$key]),2); ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-lg" href="backend/removecart.php?itemId=<?php echo $meResult['pro_id']; ?>" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                ลบทิ้ง</a>
                                        </td>
                                    </tr>
                                    <?php
                                $num++;
                            }
                            ?>
                                        <tr>
                                            <td colspan="8" style="text-align: right;">
                                                <h4>จำนวนเงินรวมทั้งหมด
                                                    <?php echo number_format($total_price,2); ?> บาท</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" style="text-align: right;">
                                                <button type="submit" class="btn btn-info btn-lg">คำนวณราคาสินค้าใหม่</button>
                                                <a href="order.php" type="button" class="btn btn-primary btn-lg">สั่งซื้อสินค้า</a>
                                            </td>
                                        </tr>
                            </tbody>
                        </table>
                    </form>
                    <?php
            }
            ?>

            </div>
        </div>
    </div>
    <?php mysqli_close($conn);?>
    <?PHP include ('footer/footer.php'); ?>


</body>

</html>