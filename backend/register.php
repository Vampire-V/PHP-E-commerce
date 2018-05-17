<?PHP 
include ('../conn/connect.php');

$email = $_POST["email"];
$password = $_POST["password"];
$conpassword = $_POST["conpassword"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$tel = $_POST["tel"];
//status = 2 = customer
$status = "2";

if(trim($email) == ""){
		echo "Please input email!";
		exit();	
	}
	
	if(trim($password) == ""){
		echo "Please input Password!";
		exit();	
	}	
		
	if($password!= $conpassword){
		echo "Password not Match!";
		exit();
	}
	
	if(trim($fname) == ""){
		echo "Please input Name!";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM Customer WHERE cus_email = '".trim($email)."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    if (!$objQuery) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult){
			echo "Username already exists!";
	} else{	

		$strSQL = "INSERT INTO Customer (cus_email,cus_password,cus_fname,cus_lname,cus_address,cus_tel,status) VALUES ('".$email."', 
		'".$password."','".$fname."','".$lname."','".$address."','".$tel."','".$status."')";
		$objQuery = mysqli_query($conn,$strSQL);
		
		echo "Register Completed!<br>";		
	
		header("location: http://localhost/medee/login.php");
		
	}

	mysqli_close($conn);
?>