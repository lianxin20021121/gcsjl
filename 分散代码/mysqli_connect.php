<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','schoolcard');

$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not to connect to Mysql:'.mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8');   /**修改数据库连接字符集为 utf8**/
?>
