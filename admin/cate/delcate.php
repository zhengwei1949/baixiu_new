<?php 
header('content-type:text/html;charset=utf-8');
//1.接收cate_id
$id = $_GET['id'];
// echo $id;
//2.连接mysql数据库
include_once "../include/mysql.php";
//3.拼接SQL语句
$sql = "delete from ali_cate where cate_id = $id";
//4.执行SQL
mysql_query($sql);
//5.获取影响行数
$num = mysql_affected_rows($link);
//6.判断影响行数，如果大于0，说明有数据删除
if($num > 0){
    echo "删除成功";
}else{
    echo "删除失败";
}
header('refresh:2;url=categories.php');
?>