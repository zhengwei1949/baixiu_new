<?php
header('content-type:text/html;charset=utf-8');
//1.接收cate_id
$id = $_GET['id'];
//2.连接mysql(引入mysql.php文件)
include_once "../include/mysql.php";
//3. 编写SQL
$sql = "select * from ali_cate where cate_id = $id";
//4.执行SQL
$res = mysql_query($sql);
$cate_info = mysql_fetch_assoc($res);
print_r($cate_info);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
          <form action="modifycate.php" method="post">
            <input type="hidden" name="id" value="<?=$cate_info['cate_id']?>">
            <h2>修改新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input value="<?= $cate_info['cate_name']; ?>" id="name"  class="form-control" name="name" type="text">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input value="<?= $cate_info['cate_slug'] ?>" id="slug" value="<?= $cate_info['cate_slug'] ?>" class="form-control" name="slug" type="text" >
            </div>
            <div class="form-group">
              <label for="slug">图标</label>
              <input value="<?= $cate_info['cate_class'] ?>" id="slug"  class="form-control" name="icon" type="text" >
            </div>
            <div class="form-group">
              <label for="slug">分类状态</label>
              <input id="slug"  name="status" type="radio" value="1" <?= $cate_info['cate_state'] == 1 ? 'checked' : '' ?>>启用
              <input id="slug"  name="status" type="radio" value="2" <?= $cate_info['cate_state'] == 2 ? 'checked' : '' ?>>禁用
            </div>
            <div class="form-group">
              <label for="slug">是否显示</label>
              <input id="slug"  name="show" type="radio" value="1" <?= $cate_info['cate_show'] == 1 ? 'checked' : '' ?>>显示
              <input id="slug"  name="show" type="radio" value="2" <?= $cate_info['cate_show'] == 2 ? 'checked' : '' ?>>隐藏
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">添加</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php include "../include/aside.php"; ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>