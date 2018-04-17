<?php
//1. 接收user_id
$id = $_POST['id'];
//2. 链接数据库
include_once '../include/mysql.php';
//3. 编写SQL语句并执行
$sql = "delete from ali_user where user_id=$id";
mysql_query($sql);
//4. 获取影响行数
$num = mysql_affected_rows($link);
//5. 根据影响行数返回值
if($num > 0){
    echo 1;
} else {
    echo 2;
}