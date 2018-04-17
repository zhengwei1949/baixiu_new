<?php
header('Content-type:image/png');
//1. 创建验证码
//定义字符串，验证码中的所有字符都要从该字符串中产生
$str = '2345678abcdefhjkmnpqrstuvwxyz';
//要产生一个四位的验证码，每次产生一个
//获取字符串长度
$len = strlen($str);
//定义验证码变量
$code = '';
for($i = 0; $i < 4; $i++){
    $code .= $str[rand(0, $len-1)];
}

//将验证码保存在session当中
session_start();
$_SESSION['code'] = $code;

//2. 绘制验证码
//① 创建画布
$img = imagecreatetruecolor(100, 40);
//② 创建画笔
$green = imagecolorallocate($img, 0, 255, 0);
//③ 填充画布颜色
imagefill($img, 0, 0, $green);
//④ 绘制验证码
for($i = 0; $i < 4; $i++){
    imagettftext(
        $img,  //画布资源
        rand(15, 25), //字体大小，像素级别
        rand(-30,30), //字体的倾斜角度
        10 + $i * 20, //绘制文字的起始x点
        30, //绘制文字的起始y点
        imagecolorallocate($img, rand(0,255), rand(0,100), rand(0,255)), //绘制文字的颜色
        'msyh.ttf', //绘制文字所使用的字形（c:/windows/fonts）
        $code[$i]  //绘制的文字
    );
}

//⑤ 显示
imagepng($img);
//⑥ 销毁画布资源
imagedestroy($img);
















