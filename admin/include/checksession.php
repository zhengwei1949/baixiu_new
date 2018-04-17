<?php
session_start();
if (empty($_SESSION['id'])) {
    echo "您尚未登录，请登陆后再访问";
    header('Refresh:2;url=../login.html');
    die;
}