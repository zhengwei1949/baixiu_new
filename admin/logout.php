<?php
//1. 清除所有的session
session_start();
session_destroy();
//2. 跳转回login.html页面
header('location:login.html');