<?php 
header('content-type:text/html;charset=utf8');
//1.接收表单数据
$name = $_POST['name'];
$slug = $_POST['slug'];
$icon = $_POST['icon'];
$status = $_POST['status'];
$show = $_POST['show'];

include_once "../include/mysql.php";

//3. 编写SQL语句并执行
$sql = "insert into ali_cate values(null,'$name','$slug','$icon','$status','$show')";
mysql_query($sql);

//4.获取影响行数
$num = mysql_affected_rows($link);
if($num > 0){
    echo '添加成功';
    header('refresh:2;url=categories.php');
}else{
    echo '添加新分类失败';
    header('refresh:2;url=addcate.php');
}
?>