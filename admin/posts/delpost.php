<?php
//1. 接收前台传递的post_id
$id = $_POST['id'];
//2. 链接Mysql服务器
include_once '../include/mysql.php';
//3. 编写SQL语句
$sql = "delete from ali_post where post_id=$id";
mysql_query($sql);
//4. 获取影响行数
$num = mysql_affected_rows($link);
if($num > 0){
    echo 1;
} else {
    echo 2;
}