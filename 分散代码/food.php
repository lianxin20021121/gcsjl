
<?php ob_start();?>
<?php
     error_reporting(E_ERROR);
     ini_set("display_errors","Off");
    header("Content-type:text/html;charset=utf8");
    echo '
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Library Management System</title>
        </head>
        <style type="text/css">
         body{
    background-image: url(a.webp);
    }
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
        <body>
            <div class="header">
                <h1>欢迎来到线上订餐～</h1>
               </div>
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
                    </tr>';
 
                    // 引入配置信息
                	require "dbConfig.php";
                	
                	// 连接mysql
                	$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
                	
                	// 编码设置
                	mysqli_set_charset($link,'utf8');
                	$sql = "SELECT * FROM food";
                	$result = mysqli_query($link, $sql);
                	// 解析结果集,$row为所有数据，$foodNum为餐品的数目
                	$foodNum = mysqli_num_rows($result);
                	    
                	for($i=0; $i<$foodNum; $i++){
                	    $row = mysqli_fetch_assoc($result);
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
                	// 5. 释放结果集
                	mysqli_free_result($result);
                	mysqli_close($link);
                	header("Content-type:text/html;charset=utf8");
                	echo '
                 </table>
            </div>
            <script type="text/javascript">
                function buy (product_id) {
                    if (confirm("确认购买?")){
                        window.location = "buyfood.php?product_id=" + product_id;
                    }
                }
            </script>
        </body>
    </html>
                
    ';
   ob_end_flush();
?>
