<?php 
header('content-type:text/html;charset=utf-8');
//1. 收集表单数据
$text = $_POST['text'];
$link1 = $_POST['link'];

//2. 文件上传
$upfile_path = '';
if($_FILES['image']['error'] == 0){
    $ext = strrchr($_FILES['image']['name'],'.');
    $upfile_path = '../../uploads/'.time().rand(100,999).$ext;
    move_uploaded_file($_FILES['image']['tmp_name'],$upfile_path); 
}

//3.连接mysql服务器
include_once "../include/mysql.php";
$sql = "insert into ali_pic(pic_id,pic_path,pic_txt,pic_link) values(null,'$upfile_path','$text','$link1')";
mysql_query($sql);
//4.获取影响函数
$num = mysql_affected_rows($link);
if($num > 0){
    echo "添加新轮播图片成功";
}else{
    echo '添加新轮播图片失败';
}
header('refresh:2;url=slides.php');