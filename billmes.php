<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
//$clid=$_GET['id'];
$clid=1;
//$clid=$userid

$sqlb="select * from bill where s_id={$clid}";
$resb=mysqli_query($dbc,$sqlb);
//$resultb=mysqli_fetch_array($resb);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>校园卡管理系统 || 账单信息</title>
    <style>
        body{
            //background-image:url('http://inews.gtimg.com/newsapp_ls/0/11535311052/0');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;color:navajowhite;font-size: 34px;padding-top: 2%;font-family: 华文楷体"><strong>银行卡充值</strong></h1>
<table  width='100%' class="table table-hover">
    <tr>
        <th>账单编号</th>
        <th>校园卡号</th>
        <th>学号</th>
        <th>消费时间</th>
        <th>消费产品</th>
        <th>价格</th>
        <th>商家</th>
        <th>卡内余额</th>

    </tr>
<?php


    foreach($resb as $row){
        echo "<tr>";
        echo "<td>{$row['bill_num']}</td>";
        echo "<td>{$row['card_id']}</td>";
        echo "<td>{$row["s_id"]}</td>";
        echo "<td>{$row["consume_time"]}</td>";
        echo "<td>{$row["product_name"]}</td>";
        echo "<td>{$row["price"]}</td>";
        echo "<td>{$row['shangjia']}</td>";
        echo "<td>{$row['remaining_sum']}</td>";
        echo "</tr>";
    };

?>
</table>
</body>
</html>
