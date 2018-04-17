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
  <?php 
  include_once "../include/checksession.php";
  //1.连接数据库
  @mysql_connect('localhost','root','root') or die('数据库服务器连接失败');
  @mysql_query('set names utf8');
  @mysql_query('use alishow');

  //2.编写SQL语句并执行
  //查询ali_cate表中的所有的数据
  $sql = "select * from ali_cate";
  $res = mysql_query($sql);//获取数据库资源
  var_dump($res);
  ?>
  <div class="main">
    <?php 
    include "../include/nav.php";
    ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>名称</th>
                <th>Slug(别名)</th>
                <th>图标</th>
                <th>是否启用</th>
                <th>是否显示</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
             <?php while ($row = mysql_fetch_assoc($res)) : ?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td><?= $row['cate_name']; ?></td>
                <td><?= $row['cate_slug']; ?></td>
                <td><?= $row['cate_class']; ?></td>
                <td><?= $row['cate_state'] == 1 ? '启用' : '禁用'; ?></td>
                <td><?= $row['cate_show'] == 1 ? '显示' : '隐藏'; ?></td>
                <td class="text-center">
                  <a href="editcate.php?id=<?= $row['cate_id'] ?>" class="btn btn-info btn-xs">编辑</a>
                  <a href="delcate.php?id=<?=$row['cate_id']?>" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php 
  include_once "../include/aside.php";
  ?>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
