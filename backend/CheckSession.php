<?PHP
header('Access-Control-Allow-Origin: *');
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $username = (isset($_SESSION['Name'])) ? $_SESSION['Name'] : '';
    $userID = (isset($_SESSION['UserID'])) ? $_SESSION['UserID'] : '';
    $Status = (isset($_SESSION['Status'])) ? $_SESSION['Status'] : '';
    // if (!$username) {
    //     echo "ไม่ได้ล็อคอิน";
    // header("location:http://localhost/medee/login.php");
    // }

    // exit();
} else {
    echo "ไม่ได้ล็อคอิน";
    header("location:http://localhost/medee/login.php");
    
}


    ?>