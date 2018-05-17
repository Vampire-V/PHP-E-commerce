<?PHP  
  include ('backend/CheckSession.php');
  include ('conn/connect.php');
  $order_id = $_GET['order_id'];
  
//   ($order_id) ? $strSQL = "SELECT * FROM order_details WHERE order_id=$order_id " :  1;
  ($order_id) ? $strSQL = "SELECT * FROM order_details LEFT JOIN Products ON order_details.product_id = Products.pro_id WHERE order_details.order_id=$order_id" :  1;

    $objQuery = $conn->query($strSQL);
//สถานะ Order
    $result = $conn->query("SELECT * FROM orders WHERE order_id='".$order_id."'");
    if ($result->num_rows > 0) {
        // output data of each row
        while($status = $result->fetch_assoc()) {
           $check = $status['status'];
           $bill  = $status['order_payment'];
        }

    } else {
        echo "0 results";
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

    <script type="text/javascript">
        function ValidateExtension() {
            var allowedFiles = [".jpg", ".png", ".svg"];
            var fileUpload = document.getElementById("image1");
            var lblError = document.getElementById("lblError");
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
            if (!regex.test(fileUpload.value.toLowerCase())) {
                lblError.innerHTML = "โปรดอัปโหลดไฟล์ที่มีนามสกุล: " + allowedFiles.join(', ') +
                    " เท่านั้น  ";
                return false;
            }
            lblError.innerHTML = "";
            return true;
        }
    </script>
</head>

<body>

    <?PHP include ('menu.php');?>

    <div class="container" style="margin-top:70px">
        <center>
            <h2>บิลจ่ายเงิน</h2>
        </center>
        <div class="row">
            <div class="col">
                <h2>รหัสใบสั่งสินค้า :
                    <?PHP echo $order_id.'&nbsp;<br>สถานะ : '; echo $check;?>
                </h2>
            </div>
            <?PHP 
                if ($Status == 1) {
                    if ($check=='รออนุมัติ') {?>
                        <div class="col">
                <img src="<?PHP echo $bill; ?>" class="img-fluid" alt="บิลจ่ายเงิน" width="300" height="230"> </div>
            <div class="col">
                <a href="backend/bill_success.php?order_id=<?PHP echo $order_id; ?>&check=<?PHP echo $check; ?>" type="button" class="btn btn-primary btn-lg" >อนุมัติบิลจ่ายเงิน</a>
            </div>
                   <?PHP } elseif ($check=='อนุมัติ') {?>
                    <div class="col">
                <img src="<?PHP echo $bill; ?>" class="img-fluid" alt="บิลจ่ายเงิน" width="300" height="230"> </div>
            <div class="col">
                <a href="backend/bill_success.php?order_id=<?PHP echo $order_id; ?>&check=<?PHP echo $check; ?>" type="button" class="btn btn-primary btn-lg" >แจ้งส่งของ</a>
            </div>
                   <?PHP } elseif ($check=='ส่งของแล้ว') {?>
                    <div class="col">
                <img src="<?PHP echo $bill; ?>" class="img-fluid" alt="บิลจ่ายเงิน" width="300" height="230"> </div>
            <div class="col">
                <a>รอลูกค้ายืนยัน</a>
            </div>
                   <?PHP } ?>
            
            <?PHP
                } else{ ?>
                <div class="col"></div>
                <div class="col"></div>
                <?PHP
                }
            ?>

        </div>

        <br>

        <form action="backend/payment.php" method="post" name="fromupdate" id="formupdate" enctype="multipart/form-data" onsubmit="JavaScript:return checkupload();">
            <?PHP
                   $total_price = 0;
                   if ($objQuery->num_rows > 0) {
        ?>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                                // output data of each row
                                while($row = $objQuery->fetch_assoc()) {
                                    $total_price = $total_price + ($row['order_detail_price'] * $row['order_detail_quantity']); ?>

                            <tr>
                                <td>
                                    <img class="setimgcart" src="<?php echo $row['pro_img1'];?>" border="0">
                                </td>
                                <td>
                                    <?php echo $row['product_id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['pro_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['pro_detail']; ?>
                                </td>
                                <td>
                                    <?php echo $row['order_detail_quantity']; ?>
                                </td>
                                <td>
                                    <?php echo number_format($row['order_detail_price'],2); ?>
                                </td>
                                <td>
                                    <?php echo number_format(($row['order_detail_price'] * $row['order_detail_quantity']),2); ?>
                                </td>

                            </tr>

                            <?PHP 
                                }
                                ?>
                            <tr>
                                <td colspan="10" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด
                                        <?php echo number_format($total_price,2); ?> บาท</h4>
                                </td>
                            </tr>
                            <?PHP 
                            if ($check=="รออนุมัติ" || $check=="อนุมัติ") { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">
                                <?PHP if ($Status==1) {  ?>
                                        <a href="admin_check.php" type="button"  class="btn btn-primary btn-block">ออเดอร์</a>
                                        <?PHP } else {  ?>
                                            <a href="listorders.php" type="button" class="btn btn-primary btn-block">ออเดอร์</a>
                                        <?PHP } ?>
                                </td>
                            </tr>
                            <?PHP } else { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">
                                    <div class="col-sm-3 info">
                                        <p> อัพไฟล์โอนเงิน </p>
                                        <input type="file" name="image1[]" id="image1" class="form-control" require multiple />
                                        <input type="hidden" name="orderid" value="<?PHP echo $order_id;?>">
                                        <br/>
                                        <span id="lblError" style="color: red;"></span>
                                        <br/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <button type="submit" class="btn btn-info btn-lg" id="success" onclick="return ValidateExtension()">ยืนยันการชำระเงิน</button>
                                    <?PHP if ($Status==1) {  ?>
                                        <a href="admin_check.php" type="button" class="btn btn-primary btn-lg">ออเดอร์</a>
                                        <?PHP } else {  ?>
                                            <a href="listorders.php" type="button" class="btn btn-primary btn-lg">ออเดอร์</a>
                                        <?PHP } ?>
                                </td>
                            </tr>
                            <?PHP
                            }
                        ?>
                    </tbody>
                </table>

                <?PHP
                            } else {
                                ($order_id) ? $strSQL = "SELECT * FROM order_cus WHERE order_id=$order_id" :  1;
                                $objQuery = $conn->query($strSQL);
                            ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>รายละเอียด</th>
                                <th>ขนาด</th>
                                <th>สีสินค้า</th>
                                <th>ลาย</th>
                                <th>สีลาย</th>
                                <th>จำนวน</th>
                                <th>วันที่</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                                       while($row = $objQuery->fetch_assoc()) {
                                    $total_price = $row['price'];
                                        ?>
                                <tr>

                                    <td>
                                        <?php echo $row["id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['detail']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['size']; ?>
                                    </td>
                                    <td style="background-color:<?PHP echo $row['favcolor'];?>;">
                                        <?php echo $row['favcolor']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pattern']; ?>
                                    </td>
                                    <td style="background-color:<?PHP echo $row['patterncolor'];?>;">
                                        <?php echo $row['patterncolor']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['quty']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['datetime']; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['price'],2); ?>
                                    </td>
                                </tr>
                                <?PHP } ?>

                                <tr>
                                    <td colspan="10" style="text-align: right;">
                                        <h4>จำนวนเงินรวมทั้งหมด
                                            <?php echo number_format($total_price,2); ?> บาท</h4>
                                    </td>
                                </tr>
                                <?PHP 
                            if ($check=="รออนุมัติ") { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                    <?PHP if ($Status==1) {  ?>
                                        <a href="admin_check.php" type="button"  class="btn btn-primary btn-block">ออเดอร์</a>
                                        <?PHP } else {  ?>
                                            <a href="listorders.php" type="button" class="btn btn-primary btn-block">ออเดอร์</a>
                                        <?PHP } ?>
                                    </td>
                                </tr>
                                <?PHP } else { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        <div class="col-sm-3 info">
                                            <p> อัพไฟล์โอนเงิน </p>
                                            <input type="file" name="image1[]" id="image1" class="form-control" require multiple />
                                            <input type="hidden" name="orderid" value="<?PHP echo $order_id;?>">
                                            <br/>
                                            <span id="lblError" style="color: red;"></span>
                                            <br/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" style="text-align: right;">
                                        <button type="submit" class="btn btn-info btn-lg" id="success" onclick="return ValidateExtension()">ยืนยันการชำระเงิน</button>
                                        <?PHP if ($Status==1) { ?>
                                        <a href="admin_check.php" type="button" class="btn btn-primary btn-lg">ออเดอร์</a>
                                        <?PHP } else {   ?>
                                            <a href="listorders.php" type="button" class="btn btn-primary btn-lg">ออเดอร์</a>
                                        <?PHP } ?>
                                    </td>
                                </tr>
                                <?PHP
                            }
                        ?>
                        </tbody>
                    </table>
                    <?PHP } ?>
        </form>

    </div>


    <?PHP  $conn->close();
    include ('footer/footer.php');
    ?>
</body>

</html>