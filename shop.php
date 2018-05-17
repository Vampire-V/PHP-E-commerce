<?PHP  

  include ('backend/CheckSession.php');
  include ('conn/connect.php');

    $strSQL = "SELECT * FROM Products ORDER BY pro_id ASC ";
    $objQuery = mysqli_query($conn,$strSQL);
    if(!$objQuery){
        echo $objCon->connect_error;
        exit();
    }

    
?>
<?PHP include ('backend/cartbackend.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Website Example</title>
    <?PHP include ('header/header.php')?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
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
    <?PHP include ('slide.php'); ?>
    

    <div class="container" style="margin-top:30px">
        <?PHP include ('cartmenu.php');?>

        <br>
        <table cellspacing="3" cellpadding="3" border="0">
            <tbody>
                <tr>
                    <td>ราคาต่ำสุด:</td>
                    <td>
                        <input id="min" name="min" type="text" value="0" min="0" max="100000">
                    </td>
                </tr>
                <tr>
                    <td>ราคาสูงสุด:</td>
                    <td>
                        <input id="max" name="max" type="text" value="1000" min="0" max="100000">
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-hover" id="example" data-page-length="3" data-order="[[ 1, &quot;asc&quot; ]]">
            <thead>
                <tr>
                    <th>สินค้า</th>
                    <th>ราคา</th>
                    <th>รายละเอียด</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?PHP
while($objResult = mysqli_fetch_array($objQuery)){ ?>
                        <tr>
                            <td scope="row">
                                <img class="setimgcart" src="<?php echo $objResult['pro_img1'];?>" border="0">&nbsp;&nbsp;
                                <?php echo $objResult['pro_name'];?>
                            </td>
                            <td>
                                <?php echo $objResult['pro_price'];?></td>
                            <td>
                                <?php echo $objResult['pro_detail'];?>
                            </td>
                            <td>
                                <a href="backend/updatecart.php?itemId=<?php echo $objResult['pro_id'];?>" style="margin-top:5px;" class="btn btn-primary">+ Buy</a>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>หาสินค้า</th>
                        <th>หาราคา</th>
                        <th>รายละเอียด</th>
                    </tr>
                </tfoot>
        </table>
    </div>
    <?PHP  mysqli_close($conn);
    include ('footer/footer.php');
    ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        /* Custom filtering function which will search data in column four between two values */

        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = parseInt($('#min').val(), 10);
                var max = parseInt($('#max').val(), 10);
                var price = parseFloat(data[1]) || 0; // use data for the price column

                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && price <= max) ||
                    (min <= price && isNaN(max)) ||
                    (min <= price && price <= max)) {
                    return true;
                }
                return false;
            }
        );


        $(document).ready(function () {
            // DataTable
            var table = $('#example').DataTable({
                "lengthMenu": [
                    [3, 5, 7, -1],
                    [3, 5, 7, "All"]
                ]
            });

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup(function () {
                table.draw();
            });

        });
    </script>
</body>


</html>