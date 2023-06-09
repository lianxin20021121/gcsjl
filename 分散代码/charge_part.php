<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
//$clid=$_GET['id'];
$clid=1;

$sqlb="select card_id,s_id,remain_sum from card where s_id={$clid}";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
$sqly="select card_id,s_id,remain_sum from card where s_id={$clid}";
$resy=mysqli_query($dbc,$sqly);
$name=mysqli_fetch_row($resy);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>校园卡管理系统 || 充值</title>
    <style>
        body{
            background-image:url('http://inews.gtimg.com/newsapp_ls/0/11535311052/0');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;color:navajowhite;font-size: 34px;padding-top: 2%;font-family: 华文楷体"><strong>银行卡充值</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="charge_part.php?" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">校园卡号</span><input value="<?php echo $resultb['card_id']; ?>" name="ncard_id" type="text" placeholder="请输入校园卡号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">学号</span><input value="<?php echo $resultb['s_id']; ?>" name="ns_id" type="text" placeholder="请输入学号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">余额</span><input value="<?php echo $resultb['remain_sum']; ?>" name="nre_sum" type="text" placeholder="当前余额" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">银行</span>
            <select name="nresult" id="yw_result" class="form-control" value="<?php echo $resultb['nresult']; ?>">
                <!-- check bookStatus in ('normal','outdated','broken','lost','others'), -->
                <option value="normal">中国农业银行</option>
                <option value="outdated">中国建设银行</option>
                <option value="broken">中国银行</option>
                <!--<option value="lost">丢失</option>
                <option value="others">其他</option>-->
            </select></div><br/>
        <div class="input-group"><span  class="input-group-addon">银行卡号</span><input name="nbank_id" type="text" placeholder="请输入银行卡号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">充值金额</span><input name="ncharge" type="text" placeholder="请输入充值金额" class="form-control"></div><br/>
        <label><input type="submit" value="确认充值" class="btn btn-default"></label>&nbsp &nbsp
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $c_id=$_GET['ncard_id'];
    $nsid = $_POST["ns_id"];
    $nresum = $_POST["nre_sum"];
    $ncharg=$_POST["ncharge"];
    $nbankid=$_POST["nbank_id"];
    $tem=$resultb['remain_sum']+$ncharg;

    $sqla="update card set remain_sum='{$tem}' where s_id='{$nsid}';";
    $resa=mysqli_query($dbc,$sqla);
    $sqld="insert into chargerecord VALUES(NULL,'{$c_id}',NOW(),'{$nbankid}','{$ncharg}','{$tem}') ";
    $resd=mysqli_query($dbc,$sqld);
    if (mysqli_query($dbc, $sqla)) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sqla . "<br>" . mysqli_error($dbc);
    }
    if($resa==1&&$resd==1)
    {

        echo "<script>alert('充值成功！')</script>";
        echo "<script>window.location.href='charge_part.php'</script>";
    }
    else
    {
        echo "<script>alert('充值失败！请重新尝试或联系管理员！');</script>";
    }
}
?>
</body>
</html>
