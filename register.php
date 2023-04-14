<?php

header('content-type:text/html;charset=utf-8');
//注册页面
require 'login_db_connect.php';//连接数据库

//判断表单是否提交,用户名密码是否提交
if (isset($_POST['userid'])&&isset($_POST['pwd'])){//登录表单已提交
    //获取用户输入的用户名密码
    $user=$_POST["userid"];
    $pwd=$_POST["pwd"];
    $username=$_POST["username"];
    $sex=$_POST["sex"];
    $academy=$_POST["academy"];
    $grade=$_POST["grade"];
   
  $result1=mysqli_query($con,"select * from students ");//执行sql语句
  //$card_num=$result['card_id'];
  $result_num=mysqli_num_rows($result1);
  $ccc=0+$result_num;
   // $ccc=$card_num+1;
    //判断提交账号密码是否为空
    if ($user=='' || $pwd==''){
        exit('账号或密码不能为空');
    }
    else {
        $sql="insert into students(s_id,password,s_name,sex,academy,grade,card_id,reset) values ('$user','$pwd','$username','$sex','$academy','$grade','$ccc',0);";
        //添加账户sql语句SS
        $select="select s_id from students where s_id='$user'";
        $result=mysqli_query($con, $select);//执行sql语句
        $row=mysqli_num_rows($result);//返回记录数
        if(!$row){//记录数不存在则说明该账户没有被注册过
            if (mysqli_query($con,$sql)){//查询insert语句是否成功执行，成功将返回 TRUE。如果失败，则返回 FALSE。
                //跳转登录页面
                echo "<script>alert('注册成功，请登录');location='./denglu.php'</script>";
            }else{//失败则重新跳转注册页面
                echo "<script>alert('注册失败，请重新注册');location='./register.php'</script>";
            }
        }else{//存在记录数则说明注册的用户已存在
            echo "<script>alert('该用户已经存在，请直接登录');location='./denglu.php'</script>";
        }
    }
}


require 'register.html';

?>
