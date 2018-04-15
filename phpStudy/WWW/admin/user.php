<?php
require 'check_login.php';

if ($_POST['go']=='report') {
	$username = htmlspecialchars($_POST['username']);
	
	$sql="select * from $database.user where username='".$username."' ";
	$result = mysql_query($sql,$conn);
	$row = mysql_fetch_array($result);
}
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户查询</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script> 
<script type="text/javascript" src="/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-datepicker.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link rel="stylesheet" type="text/css" href="/js/ueditor/themes/default/css/ueditor.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
</head>

<body>
	<div class="main">
        <form action="" method="post" name="myform">
        	<input type="hidden" value="report" name="go">
            <table class="tab_form">
                <tr>
                    <th>用户名：</th>
                    <td>
                    	<input type="text" name="username" size="50" value="<?php echo $row['username'] ?>" />
                    	<input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="查找" />
                    </td> 
                </tr>               
            </table>
        </form>
        <form action="action.php" method="post" name="myform2" style="margin-top:10px;">
        	<input type="hidden" value="<?php echo $row['id'] ?>" name="sid">
            <table class="tab_form">
                <tr>
                    <th>密码：</th>
                    <td><input type="text" name="pass" size="50" value="<?php echo $row['pass'] ?>" /></td>                    	
                </tr> 
                <tr>
                	<th>注册IP：</th>
                    <td><input type="text" name="reg_ip" disabled size="50" value="<?php echo $row['reg_ip'] ?>" /></td> 
                </tr>
                <tr>
                    <th>注册时间：</th>
                    <td><input type="text" name="reg_date" disabled size="50" value="<?php echo $row['reg_date'] ?>" /></td> 
                </tr>
                <tr>
                    <th>最后登录IP：</th>
                    <td><input type="text" name="last_ip" disabled size="50" value="<?php echo $row['last_ip'] ?>" /></td> 
                </tr>
                <tr>
                    <th>最后登录时间：</th>
                    <td><input type="text" name="last_time" disabled size="50" value="<?php echo $row['last_time'] ?>" /></td> 
                </tr>
                <tr>
                    <th>积分：</th>
                    <td><input type="text" name="jifen" disabled size="50" value="<?php echo $row['jifen'] ?>" /></td> 
                </tr>
                <tr>
                    <th>钻石：</th>
                    <td><input type="text" name="rmb" disabled size="50" value="<?php echo $row['rmb'] ?>" /></td> 
                </tr>
                <tr>
                    <th>推广帐号：</th>
                    <td><input type="text" name="tg_name" disabled size="50" value="<?php echo $row['tg_name'] ?>" /></td> 
                </tr>
                <tr>
                	<td></td>
                    <td valign="middle">
                        <INPUT type="hidden" value="user_add" name="go"> 
                        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
                    </td>
                </tr>              
            </table>
        </form>
    </div>
</body>
</html>