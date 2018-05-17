<?php

include ('conn/connect.php');

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty']))
{
    $meQty = 0;
    foreach ( $_SESSION['qty'] as $meItem)
    {
        $meQty = $meQty + $meItem;
    }
    
} else
{
    $meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0)
{
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId)
    {
        $itemIds = $itemIds . $itemId . ",";
    }
    $inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM Products WHERE pro_id in ({$inputItems})";
    $meQuery = mysqli_query($conn,$meSql);
    $meCount = mysqli_num_rows($meQuery);
} else
{
    $meCount = 0;
}
?>