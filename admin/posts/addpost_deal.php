<?php
header('Content-type:text/html;charset=utf-8');
//1. 接收表单数据
$title = $_POST['title'];
$content = $_POST['content'];
$slug = $_POST['slug'];
$category = $_POST['category'];
//strtotime能够将字符串类型的时间转换为时间戳
$created = strtotime($_POST['created']);
$status = $_POST['status'];

//2. 手动补充表单中没有的数据
$desc = substr($content, 0, 300);
session_start();
$author = $_SESSION['id']; 
$updtime = $created;
$click = rand(300, 800);
$good = rand(200, 300);
$bad = rand(5, 200);

//3. 如果有文件上传，则执行上传并保存上传文件的路径
$upfile_path = "";
if($_FILES['feature']['error'] == 0){
    $ext = strrchr($_FILES['feature']['name'], '.');
    $upfile_path = '../../uploads/'.time().$ext;
    move_uploaded_file($_FILES['feature']['tmp_name'], $upfile_path);
}

//4. 链接Mysql服务器,编写SQL语句并执行
include_once '../include/mysql.php';
$sql = "insert into ali_post values(null, '$title', '$slug', '$desc','$content', $author, 
$category, '$upfile_path', $created, $updtime, $click, $good, $bad, '$status')";
echo $sql;
mysql_query($sql);

//5. 获取影响行数，根据影响行数进行跳转
$num = mysql_affected_rows($link);
if($num > 0){
    echo "添加新文章成功";
    header('Refresh:2;url=posts.php');
} else {
    echo "添加新文章失败";
    header('Refresh:2;url=addpost.php');
}









