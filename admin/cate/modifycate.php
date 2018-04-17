<?php 
header('content-type:text/html;charset=utf-8');
//1.接收表单数据
$id = $_POST['id'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$icon = $_POST['icon'];
$status = $_POST['status'];
$show = $_POST['show'];
//2. 连接mysql数据库
include "../include/mysql.php";
//3.编写SQL语句
$sql = "update ali_cate set cate_name='$name',cate_slug='$slug',cate_class='$icon',cate_state=$status,cate_show=$show where cate_id=$id;";
// echo $sql;

//4. 执行修改
mysql_query($sql);

//5. 获取影响行数
$num = mysql_affected_rows($link);

if ($num > 0) {
    echo "修改成功";
    header('refresh:2;url=categories.php');
} else {
    echo "修改成功";
    header("refresh:2;url=editcate.php?id=$id");
}
?>
