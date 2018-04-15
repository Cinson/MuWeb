<?php
session_start();

//判断是否已登录
if(!$_SESSION['username'])
{
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>"; 
	echo "<script>alert('您还没有登录呢，请登录后再试！')</script>";
	exit("<script> location.href='../index.php';</script>");
}

?>