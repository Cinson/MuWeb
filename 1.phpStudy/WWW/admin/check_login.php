<?php
session_start();
require '../config.php';

//判断是否已登录
if($_SESSION['supname'] !== $supname)
{
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>"; 
	exit("<script> alert('请登陆后使用！');location.href='index.php';</script>");
}

?>