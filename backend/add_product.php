<?PHP
    include ('../conn/connect.php');
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $quty = $_POST['quty'];
    date_default_timezone_set('Asia/Bangkok');



    $upload = array();
    if (!empty($_FILES['image1']['name'])) {
        foreach ($_FILES['image1']['name'] as $key => $value) {
            if (move_uploaded_file($_FILES['image1']['tmp_name'][$key],"../image/".date("Ymd_His").'-'.$value)) {
                $upload[] = array(
                    'name'=>'image'.'/'.date("Ymd_His").'-'.$value,
                    'file'=>'image'.'/'.date("Ymd_His").'-'.$value
                );
            }
        }
    }
    $imgJson = json_encode($upload);

    $imgArray = json_decode($imgJson,true);
   
    $strSQL = "INSERT INTO Products (pro_name,pro_detail,pro_price,pro_num,pro_type,pro_img1,pro_img2,pro_img3) VALUES
     ('".$name."','".$detail."','".$price."','".$quty."','".$type."','".$imgArray[0]["name"]."','".$imgArray[1]["name"]."','".$imgArray[2]["name"]."')";
    $objQuery = mysqli_query($conn,$strSQL);
    
    echo "Register Completed!<br>";		

// echo date("Ymd_His");
// echo json_encode($upload);
// [{"name":"Cart-PHP","file":"image\Cart-PHP"},
// {"name":"index.html","file":"image\index.html"},
// {"name":"testShopping Cart.html","file":"image\testShopping Cart.html"}]
    ?>