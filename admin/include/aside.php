  <div class="aside">
    <div class="profile">
      <img class="avatar" src="/uploads/avatar.jpg">
      <h3 class="name">管理员名字</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="/admin/index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="/admin/posts/posts.php">所有文章</a></li>
          <li><a href="/admin/posts/addpost.php">写文章</a></li>
          <li class="active"><a href="/admin/cate/categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="/admin/comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="/admin/users/users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.html">导航菜单</a></li>
          <li><a href="/admin/other/slides.php">图片轮播</a></li>
          <li><a href="settings.html">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>