<?php
require 'action.php';
$tg_id =$_GET['tid'];
$query="select reg_ip,last_ip,username from $database.user where id=$tg_id" ; //获取推广ID 的注册IP、最近登录IP、推广人的username
	$result = mysql_query($query,$conn);
	$rowtg = mysql_fetch_array($result);
	$tg_name = $rowtg['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<title><?php echo $site_name ?></title>
<meta name="keywords" content="<?php echo $guanjianzi; ?>">
<meta name="description" content="<?php echo $miaoxu; ?>">
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<script language="javascript" type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/index.js"></script>
<link rel="stylesheet" type="text/css" href="../css/global.css"/>
<link href="../css/rxhw_main.css" rel="stylesheet" type="text/css"/>
    <link  type="text/css" rel="stylesheet" href="../css/login.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.mir.js"></script>
    <script type="text/javascript" src="../js/jquery.home.js"></script>

</head>
<body>

<div id="bgMask"></div>
<?php
if (!isset($_SESSION['username'])){
?>
 
<div id="userRegister">
	<h3>注册帐号</h3>
    <form method="post" action="action.php?tid=<?php echo $_GET['tid']?$_GET['tid']:0;?>" name="myRegister" id="myRegister" class="loginform">
        <input type="hidden" value="reg" name="go"> 
        <div class="col-tip"></div>
        <p class="col-name"><input type="text" name="reg_account" id="reg_account" size="20" tabindex="10" placeholder="用户名" /></p>
        <p class="col-pwd"><input type="password" name="reg_password" id="reg_password" size="20" tabindex="11" placeholder="密码" /></p>
        <p class="col-pwd"><input type="password" name="reg_rpassword" id="reg_rpassword" size="20" tabindex="12" placeholder="确认密码" /></p>
		<p class="col-name">推 荐 人：<input type="text" name="tg_id" id="tg_id" size="20" tabindex="10" disabled="true" value="<?php echo $tg_id; ?>" /></p>

        <p class="col-opt">
            <input name="zhuce" id="zhuce" checked="checked" value="" type="checkbox"> 我已经阅读并同意《用户注册协议》
        </p>
        <p class="col-submit">
            <button type="button" class="btn-submit" onclick="return toreg();" tabindex="13" >注册</button>
        </p>
    	<a href="javascript:void(0);" id="userRegisterClose" class="layerClose" title="关闭"></a>
    </form>
    <script type="text/javascript">
	toRegCheck();
	</script>
</div>
<?php } ?>
