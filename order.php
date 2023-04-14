<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Library Management System</title>
</head>
<body>
<style type="text/css">
/*    body{
        background-image: url(a.webp);
    }*/
    .wrapper {width: 1100px;margin: 20px auto;}
    h2 {text-align: center;}

    .HOME {margin-bottom: 20px;}
    .HOME a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}

    td {text-align: center;}

    .header
    {
        padding: 10px;
        text-align: center;

        color: black;
    }
</style>
<h1 style="text-align: center;color:antiquewhite"><strong>欢迎来到线上订餐～</strong></h1>
<div class="wrapper">

    <div class="HOME">
        <a href="../Controller/page.html">主页面</a>
    </div>

<table width="1160" border="1">
    <tr>
        <th>序号</th>
        <th>食品名称</th>
        <th>商家</th>
        <th>价格</th>
    </tr>
    <?php
    $sql = "SELECT * FROM food";
    $result = mysqli_query($dbc, $sql);
    //$foodNum = mysqli_num_rows($result);
    foreach($result as $row){
        echo "<tr>";
        echo "<td>{$row['product_id']}</td>";
        echo "<td>{$row['product_name']}</td>";
        echo "<td>{$row['shangjia']}</td>";
        echo "<td>{$row['price']}</td>";

        echo "<td>
                               <a href='javascript:buy({$row['product_id']})'>购买</a>
                               
                              </td>";
        echo "</tr>";
    }



    ?>

</table>
</div>

<script type="text/javascript">
    function buy (product_id) {
        if (confirm("确认购买?")){

            window.location = "orderinfo.php?product_id=" + product_id;
       }
    }
</script>

</body>
</html>
