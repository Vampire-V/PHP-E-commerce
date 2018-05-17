<?PHP 
    include ('CheckSession.php');
    include ('../conn/connect.php');

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cus_id = $_REQUEST["cus_id"];

    $strSQL = "UPDATE Customer SET cus_fname = '".trim($fname)."' 
    ,cus_lname = '".trim($lname)."',cus_address = '".trim($address)."'
    ,cus_email = '".trim($email)."',cus_password = '".trim($password)."' WHERE cus_id = '".$cus_id."' ";

    $strSQL2 = "SELECT * FROM Customer WHERE cus_id = '".mysqli_real_escape_string($conn,$cus_id)."' ";

    $objQuery = mysqli_query($conn,$strSQL);

    
	$objQuery2 = mysqli_query($conn,$strSQL2);
    $objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);

    $_SESSION["Name"] = $objResult2["cus_fname"];
    session_write_close();

    header("location: http://localhost/medee/index.php");
	
	mysqli_close($conn);

?>