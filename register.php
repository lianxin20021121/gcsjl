<?php

header('content-type:text/html;charset=utf-8');
//注册页面
require 'login_db_connect.php';//连接数据库

//判断表单是否提交,用户名密码是否提交
if (isset($_POST['username'])&&isset($_POST['pwd'])){//登录表单已提交
    //获取用户输入的用户名密码
    $user=$_POST["username"];
    $pwd=$_POST["pwd"];
    //判断提交账号密码是否为空
    if ($user=='' || $pwd==''){
        exit('账号或密码不能为空');
    }else {
        $sql="insert into user(username,password) values ('$user','$pwd');";//添加账户sql语句
        $select="select username from user where username='$user'";
        $result=mysqli_query($con, $select);//执行sql语句
        $row=mysqli_num_rows($result);//返回记录数
        if(!$row){//记录数不存在则说明该账户没有被注册过
            if (mysqli_query($con,$sql)){//查询insert语句是否成功执行，成功将返回 TRUE。如果失败，则返回 FALSE。
                //跳转登录页面
                echo "<script>alert('注册成功，请登录');location='login.php'</script>";
            }else{//失败则重新跳转注册页面
                echo "<script>alert('注册失败，请重新注册');location='regsiter.php'</script>";
            }
        }else{//存在记录数则说明注册的用户已存在
            echo "<script>alert('该用户已经存在，请直接登录');location='login.php'</script>";
        }
    }
}


require 'register.html';

?>
