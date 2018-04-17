<?php
//1. 接收表单数据
$id = $_POST['id'];
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$password = md5($_POST['password']);

//2. 链接Mysql
include_once '../include/mysql.php';

//3. 拼接SQL语句并执行
$sql = "update ali_user set user_email='$email',user_slug='$slug',user_nickname='$nickname',
user_pwd='$password' where user_id=$id";
mysql_query($sql);

//4. 获取影响行数
$num = mysql_affected_rows($link);
if($num > 0){
    echo 1;
} else {
    echo 2;
}