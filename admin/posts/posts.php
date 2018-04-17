<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <script src="../../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
<?php 
include_once '../include/checksession.php';
//接收分类id(所有分类为0)和状态值(所有状态为0)
$cateid = isset($_GET['cateid']) ? $_GET['cateid'] : 0;
$state = isset($_GET['state']) ? $_GET['state'] : 0;

//判断接收的分类id和状态值来拼接SQL语句中的where条件
$where = "";
if ($cateid != 0) {
  $where .= "cate_id=$cateid and ";
}
if ($state != 0) {
  $where .= "post_state=$state and ";
}
$where .= "1";
include_once '../include/mysql.php';
//定义当前页号和每页显示数量
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$pagesize = 3;
$start = ($pageno - 1) * $pagesize;
$sql = "SELECT post_id,post_title,user_nickname,cate_name,post_updtime,post_state FROM ali_post p
 JOIN ali_user u ON p.post_author=u.user_id
 JOIN ali_cate c ON p.post_cateid=c.cate_id
 where $where
 limit $start,$pagesize";
//$where 有4种情况
// cateid=0并且state=0   $where = "1"
// cateid!=0 state=0    $where = "cate_id=1 and 1"
// cateid=0  state!=0   $where = "post_state=1 and 1"
// cateid!=0  state!=0  $where = "cate_id=1 and post_state=1 and 1";

$res = mysql_query($sql);

//查询cate表，获取所有分类数据，显示到分类下拉菜单中
$sql = "select * from ali_cate";
$cate_res = mysql_query($sql);
?>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include_once '../include/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.html" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form action="posts.php" method="get" class="form-inline">
          <select name="cateid" class="form-control input-sm">
            <option value="0">所有分类</option>
            <?php while ($row = mysql_fetch_assoc($cate_res)) : ?>
                <option value="<?= $row['cate_id']; ?>"><?= $row['cate_name']; ?></option>
            <?php endwhile; ?>
          </select>
          <select name="state" class="form-control input-sm">
            <option value="0">所有状态</option>
            <option value="2">草稿</option>
            <option value="1">已发布</option>
          </select>
          <input type="submit" class="btn btn-default btn-sm" value="筛选">
        </form>
<?php 
//计算分页导航条
//1. 计算总条数
$sql = "SELECT count(post_id) num FROM ali_post p
 JOIN ali_user u ON p.post_author=u.user_id
 JOIN ali_cate c ON p.post_cateid=c.cate_id
 where $where";
$count_res = mysql_query($sql);
$count_arr = mysql_fetch_assoc($count_res);
$count = $count_arr['num'];
//2. 计算总页数
$pages = ceil($count / $pagesize);
//echo $pages;
$prev = $pageno - 1;
$next = $pageno + 1;
?>
<ul class="pagination pagination-sm pull-right">
  <li><a href="posts.php?cateid=<?= $cateid ?>&state=<?= $state ?>&pageno=1">首页</a></li>
  <li><a href="posts.php?cateid=<?= $cateid ?>&state=<?= $state ?>&pageno=<?= $prev; ?>">上一页</a></li>
  <?php for ($i = 1; $i <= $pages; $i++) : ?>
  <li><a href="posts.php?cateid=<?= $cateid ?>&state=<?= $state ?>&pageno=<?= $i; ?>"><?= $i; ?></a></li>
  <?php endfor; ?>
  <li><a href="posts.php?cateid=<?= $cateid ?>&state=<?= $state ?>&pageno=<?= $next; ?>">下一页</a></li>
  <li><a href="posts.php?cateid=<?= $cateid ?>&state=<?= $state ?>&pageno=<?= $pages; ?>">尾页</a></li>
</ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysql_fetch_assoc($res)) : ?>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td><?= $row['post_title']; ?></td>
            <td><?= $row['user_nickname']; ?></td>
            <td><?= $row['cate_name']; ?></td>
            <td class="text-center"><?= date('Y/m/d', $row['post_updtime']); ?></td>
            <td class="text-center"><?= $row['post_state']; ?></td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" data="<?= $row['post_id']; ?>" class="delpost btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="aside">
    <?php include_once '../include/aside.php'; ?>
  </div>

  <script src="../../assets/vendors/jquery/jquery.js"></script>
  <script src="../../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script type="text/javascript">
  $('.delpost').click(function(){
	  //转存当前的删除按钮
	  _this = $(this);
	  //获取当前行的post_id
	  var id = $(this).attr('data');
	  $.post('delpost.php', {id:id}, function(msg){
		    if(msg == 2){
		        alert('删除文章失败');
			} else {
			    _this.parent().parent().remove();
			    alert('删除文章成功');
		    }
	  })
  })
  </script>
</body>
</html>






