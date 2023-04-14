<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$userid=1;
?>

<?php

    $product_id = $_GET['product_id'];
    //if (confirm("确认购买?")) {
    //window.location = "buyfood.php?product_id=" + product_id;
    //从card表中查找card_id和remain_sum
    $sqla = "select card_id,remain_sum from card where s_id={$userid}";
    $resa = mysqli_query($dbc, $sqla);
    $resulta = mysqli_fetch_array($resa);

    //从food中查找food所有信息
    $sqlb="SELECT * FROM food where product_id={$product_id}";
    $resb=mysqli_query($dbc, $sqlb);
    $result=mysqli_fetch_array($resb);

    //购买后需要将卡内的余额进行修改
    $tem = $resulta['remain_sum'] - $result['price'];

    $cardid=$resulta['card_id'];
    $pname=$result['product_name'];
    $price=$result['price'];
    $sj=$result['shangjia'];


    //插入账单信息
    $sqlc = "INSERT INTO bill VALUES (NULL,'{$cardid}','{$userid}',NOW(),'{$pname}','{$price}','{$sj}','{$tem}')";
    mysqli_query($dbc, $sqlc);
    mysqli_close($dbc);
    header("Location:order.php");
//}
?>