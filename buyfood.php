<?php ob_start();?>
<?php
error_reporting(E_ERROR);
ini_set("display_errors","Off");
session_start();
$s_id='';
if(isset($_SESSION['s_id'])){
    $s_id=$_SESSION['s_id'];
}
?>
<?php
// 处理删除操作的页面
require "dbconfig.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
mysqli_set_charset($link,'utf8');
//  获取传递的餐时编号
$product_id = $_GET['product_id'];
$sql1 = mysqli_query($link, "SELECT * FROM food where product_id='$product_id'");  //根据餐时编号找对应信息
$data1=mysqli_fetch_assoc($sql1);

$product_name=$data1['product_name']; //餐时名称
$price=$data1['price']; //价格
$shangjia=$data1['shangjia']; //所购买的商家
$date=date('y-m-d h:i:s'); //当前时间

//获取用户信息
$card_id='20021121';

//生成账单编号
$num=1000;
$sql2=mysqli_query($link,"SELECT * FROM bill");
$billnum = mysqli_num_rows($sql2);
$num=$num+$billnum;

//插入账单信息
$sql = "INSERT INTO bill VALUES ('$num','$card_id','$date','$product_name','$price','$shangjia','5')";
mysqli_query($link, $sql);
mysqli_close($link);
header("Location:food.php");

ob_end_flush();
?>