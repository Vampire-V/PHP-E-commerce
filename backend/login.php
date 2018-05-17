<?PHP 
session_start();
include ('../conn/connect.php');

$email = $_POST["email"];
$password = $_POST["password"];

$strSQL = "SELECT * FROM Customer WHERE cus_email = '".mysqli_real_escape_string($conn,$email)."' 
	and cus_password = '".mysqli_real_escape_string($conn,$password)."'";
	$objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
			// header("location: http://localhost/medee/login.php");
	}
	else
	{

			$_SESSION["UserID"] = $objResult["cus_id"];
            $_SESSION["Status"] = $objResult["status"];
            $_SESSION["Name"] = $objResult["cus_fname"];
			session_write_close();
			if($objResult["status"] == "1")
			{
				// header("location: http://localhost/medee/addmin/addmin.php");
				header("location: http://localhost/medee/index.php");
			}
			else
			{
				header("location: http://localhost/medee/index.php");
			}
	}
	mysqli_close($conn);
?>