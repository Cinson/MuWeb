<?php

//====================================================
//		FileName: index.php
//		Summary:  程序入口文件
//====================================================
header("Content-type: text/html; charset=utf-8");
@session_start();
error_reporting(E_ALL^E_NOTICE^E_WARNING);
/*
//引入类库及公共方法
@define("CORE",dirname(__FILE__)."/"); 	    //根目录
require_once("lib/cfg.class.php");          //配置类
require_once("lib/mysql.class.php");        //数据类
require_once("lib/smarty.class.php");       //模版类
require_once('lib/json.class.php');		    //JSON类
require_once("lib/func.class.php");         //核心类
require_once("lib/image.class.php");        //图片类
require_once("lib/page.class.php");         //分页类


//操作值
$action=empty($_GET['action'])?'':trim($_GET['action']); 	 //get action值
$do=empty($_GET['do'])?'':trim($_GET['do']);			 	 //get do值
$id=empty($_GET['id'])?'':intval($_GET['id']);				 //get id值
*/


include 'config.php';

//获得Ip方法	
$ip = getIP();
function getIP()
{
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
 
    return $realip;
}

//黑名单拦截
$query ="select id from $database.blockip where isban='1' and  ip = '$ip'";
$result=mysql_query($query,$conn);
$row=mysql_fetch_array($result);
if(!empty($row))
{
	echo "您的IP拒绝访问本站！";
	exit;
} 
//修改头像
if ($_POST['go']=='touxiang')
{
	$username = $_SESSION['username'];
	$touxiang = stripslashes(trim($_POST['touxiang']));
	$query1="select * from  $database.`user` set touxiang = '$touxiang' where username = '$username'";
	$result1=mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
	if ($password == $row1['pass'])
	{
		$query = "update  $database.`user` set touxiang = '$touxiang' where username = '$username'";
		mysql_query($query);
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('修改成功');location.href='javascript:history.back()';</script>";
	}else{
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('修改失败');location.href='javascript:history.back()';</script>";
	}
}
//用户登录
if ($_POST['go']=="login")
{
	$username = stripslashes(trim($_POST['user_name']));
	$password = stripslashes(trim($_POST['user_pwd']));
	$query = "select * from $database.`user` where username = '$username' and pass = '$password'";
	$result=mysql_query($query,$conn);
	$rowresult=mysql_fetch_array($result);
	$rows =mysql_num_rows($result);

	$jifen = $rowresult['jifen'];
	if($rows >= 1)
	{
		////////////////////每天登陆加一积分
		$lasttime=date("Y-m-d",strtotime($rowresult['last_time']));
		$nowtime=date("Y-m-d",time());
		if ( $lasttime!=$nowtime ) {
			$jifen = $jifen+1;
		}
		//echo $lasttime.$nowtime;
		
		$_SESSION['username'] = $username;
		$rs = mysql_query("update $database.user set last_ip='$ip',last_time = now(),jifen = $jifen where username='$username' ",$conn);
		/*echo "<script>location.href='index';</script>";*/
        echo "true";
	}
	else{
		/*echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('用户名或密码错误');location.href='javascript:history.back()';</script>";*/
		 echo "用户名或密码错误!";
	 }
}


//用户注册
if ($_POST['go']=='reg')
{
	$reg_username = stripslashes(trim($_POST['reg_account']));
	$reg_password = stripslashes(trim($_POST['reg_password']));	
	$tg_id = stripslashes(trim($_GET['tid']));
	if (empty($tg_id)){     //如果没有设置推广 则把ID设置为0
		$tg_id = 0;
	}
	$query="select reg_ip,last_ip,username from $database.user where id=$tg_id" ; //获取推广ID 的注册IP、最近登录IP、推广人的username
	$result = mysql_query($query,$conn);
	$row = mysql_fetch_array($result);
	$tg_name = $row['username'];
	if ($ip == $row['reg_ip'] or $ip == $row['last_ip']) { //如果IP有一个相同，则再次把推广ID设置为0
		$tg_id = 0;
	}
	
	$query = "select * from $database.`user` where username = '$reg_username'";
	$result=mysql_query($query,$conn);
	$rows =mysql_num_rows($result);
	if($rows >= 1)
	{
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('此用户名已经被注册');location.href='reg.php';</script>";
		exit;
	}
	else{
		$query = "insert into $database.user (username,pass,reg_ip,reg_date,last_ip,last_time,jifen,tg_name,rmb,tid) values ('$reg_username','$reg_password','$ip',now(),'$ip',now(),1,'$tg_name',$rmb_reg,$tg_id) ";
		mysql_query($query,$conn);
		$query="UPDATE $database.user SET jifen=jifen+1 WHERE id=$tg_id";
		mysql_query($query,$conn);
		$_SESSION['username'] = $reg_username ;
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('注册成功');location.href='index.php';</script>";
	}
}


//检测用户名
if ($_POST['go']=='checkname')
{
	$reg_username = stripslashes(trim($_POST['reg_account']));
	
	$query = "select * from $database.`user` where username = '$reg_username'";
	$result=mysql_query($query,$conn);
	$rows =mysql_num_rows($result);
	if($rows >= 1)
	{
		echo "false";
		exit;
	}
	else{
		echo "true";
	}
}

//修改密码
if ($_POST['go']=='change_pwd')
{
	$username = $_SESSION['username'];
	$password = stripslashes(trim($_POST['password']));
	$new_psw = stripslashes(trim($_POST['new_psw']));
	$new_psw = stripslashes(trim($_POST['new_psw']));
	$query1="select * from  $database.`user` where username = '$username'";
	$result1=mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
	if ($password == $row1['pass'])
	{
		$query = "update  $database.`user` set pass = '$new_psw' where username = '$username'";
		mysql_query($query);
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('修改成功');location.href='javascript:history.back()';</script>";
	}else{
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('修改失败');location.href='javascript:history.back()';</script>";
	}
}

//查询用户的基本信息
$query="select * from $database.user where username = '".$_SESSION['username']."'";
$result = mysql_query($query,$conn) ;
$row = mysql_fetch_array($result);
$reg_ip = $row['reg_ip'];
$last_ip = $row['last_ip'];
$last_time = $row['last_time'];
$jifen = $row['jifen'];
$rmb_user = $row['rmb'];
$rmb_dts = $row['rmb_dts'];
$uid = $row['id'];
$touxiang = $row['touxiang'];
$tuiguang = $row['tuiguang'];


////////////判断用户是否有头像，有则显示，无则显示默认

$userimgfile = $_SERVER['DOCUMENT_ROOT']."/home/upload/php_avatar2_".$_SESSION['username'].".jpg";
 
if(is_file($userimgfile))
{
	$userimgfile = "/home/upload/php_avatar2_".$_SESSION['username'].".jpg"; 
}
else
{
	$userimgfile = "/home/upload/user.jpg"; 
}

//Home页面退出
$action = htmlspecialchars($_GET['action']);
if ($action == 'logout')   
{ 
	unset($_SESSION);
	session_destroy();
	echo "<script>location.href='index.php';</script>";
}

//Home页面退出
$action = htmlspecialchars($_GET['action']);
if ($action == 'logout_dlq')   
{ 
	unset($_SESSION);
	session_destroy();
	echo "<script>location.href='../dlq/dlq_index.php';</script>";
}
?>