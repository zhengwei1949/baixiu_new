  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <script src="../../assets/vendors/nprogress/nprogress.js"></script>
  <script src="../../assets/vendors/jquery/jquery.js"></script>
  <script type="text/javascript" src="../../assets/layer/layer.js"></script>
  <div class="col-md-4">
  <?php 
  //1. 获取user_id
  $id = $_GET['id'];
  //2. 链接数据库
  include_once '../include/mysql.php';
  //3. 拼接SQL语句并执行
  $sql = "select * from ali_user where user_id=$id";
  $res = mysql_query($sql);
  //4. 从资源中获取数据
  $user_info = mysql_fetch_assoc($res);
  ?>
<form id="mainForm">
  <h2>编辑用户</h2>
  <input type="hidden" name="id" value="<?=$user_info['user_id'];?>" />
  <div class="form-group">
    <label for="email">邮箱</label>
    <input id="email" value="<?=$user_info['user_email'];?>" class="form-control" name="email" type="email">
  </div>
  <div class="form-group">
    <label for="slug">别名</label>
    <input id="slug" value="<?=$user_info['user_slug'];?>" class="form-control" name="slug" type="text" placeholder="slug">
  </div>
  <div class="form-group">
    <label for="nickname">昵称</label>
    <input id="nickname" value="<?=$user_info['user_nickname'];?>" class="form-control" name="nickname" type="text" placeholder="昵称">
  </div>
  <div class="form-group">
    <label for="password">密码</label>
    <input id="password" value="<?=$user_info['user_pwd'];?>" class="form-control" name="password" type="text" placeholder="密码">
  </div>
  <div class="form-group">
    <input type="button" class="btn btn-primary" value="修改">
  </div>
</form>
</div>
<script src="../../assets/vendors/bootstrap/js/bootstrap.js"></script>
<script>NProgress.done()</script>
<script type="text/javascript">

$('.btn-primary').click(function(){
	//1. 获取from对象
	var fm = $('#mainForm')[0];
	//2. 实例化FormData对象
	var fd = new FormData(fm);
	//3. 调用$.ajax将数据发送到后台PHP程序
	$.ajax({
	    url: 'modifyuser.php',
	    type: 'post',
		data: fd,
		contentType:false,
		processData:false,
		success:function(msg){
		    if(msg == 1){
		        alert('修改成功');
			} else {
			    alert('修改失败');
			}
			var index = parent.layer.getFrameIndex(window.name);
			parent.layer.close(index);
			parent.location.reload();
	    }
    });
})
</script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  