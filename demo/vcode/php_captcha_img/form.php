<?php
header('content-type:text/html;charset=utf-8');
if (isset($_POST['authcode'])) {
  session_start();
  //strtolower方法将用户的输入全部转换为小写，再比较
  if (strtolower($_POST['authcode']) == $_SESSION['authcode']) {
    echo '<font color="#00c">输入正确</font>';
  } else {
    echo '<font color="#c00"><b>输入错误</b></font>';
  }
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>确认验证码</title>
</head>
<body>
<form method="post" action="./form.php">
  <p>验证码图片：<img id="captcha_img" border="1" src="./captcha_img.php?r=<?php echo rand() ?>" width="200px" height="200px" alt="">
    <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./captcha_img.php?r='+Math.random()">看不清，换一个</a>
  </p>
  <p>请输入图片中的内容：<input type="text" name="authcode" value=""></p>
  <p><input type="submit" value="提交" style="padding:6px 20px;"></p>
</form>
</body>
</html>
