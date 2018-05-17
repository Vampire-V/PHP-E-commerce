<?php
 include ('CheckSession.php');
 
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
 
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
    $_SESSION['qty'][] = array();
}

$key = array_search($itemId, $_SESSION['cart']);
$_SESSION['qty'][$key] = "";
$_SESSION['cart'] = array_diff($_SESSION['cart'], array($itemId));
$_SESSION['qty'] = array_filter($_SESSION['qty']);
var_dump($_SESSION['qty']);

header("location:http://localhost/medee/cart.php?a=remove");
?>