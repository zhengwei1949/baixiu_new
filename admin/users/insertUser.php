<?php 
// print_r($_POST);
//1.收集表单数据
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
//这块如果不加密，到时候存到数据库中的密码是明文的，有一天数据库被“脱裤”就完了
$password = md5($_POST['password']);

//2. 连接数据库
include "../include/mysql.php";

//3.编写SQL语句并执行
$sql = "insert into ali_user values(null,'$email','$slug','$nickname','$password','',1)";
mysql_query($sql);

//4. 获取影响行数
$num = mysql_affected_rows($link);

//5.根据$num返回的数量
if ($num > 0) {
    echo 1;
} else {
    echo 2;
}