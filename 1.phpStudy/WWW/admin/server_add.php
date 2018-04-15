<?php
require 'check_login.php';

$query="select * from $database.game_list ";
$gamelist = mysql_query($query,$conn);

//编辑
$action = $_GET['action'];
if ($action == 'edit') {
	$sid = $_GET['sid'];
	$sql="select * from $database.server where id = $sid ";
	$result = mysql_query($sql,$conn);
	$row = mysql_fetch_array($result);
}
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>服务器列表</title>
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
        <form action="action.php" method="post" name="Form1" onSubmit="return check()">
        	<input type="hidden" value="<?php echo $sid ?>" name="sid">
            <table class="tab_form">
                <tr>
                    <th>序列号：</th>
                    <td><input name="sid" type="text" id="id" size="50"  class="inputclass inputtitle" value="<?php echo $sid ?>" disabled="true" /></td>
                </tr>
            	<tr>
                    <th>选择游戏：</th>
                    <td>
                        <select name="gid">
                          <?php while($gamerow = mysql_fetch_array($gamelist)){ ?>
                            <option value ="<?php echo $gamerow['gid'] ?>" <?php if($row['gid']==$gamerow['gid']) echo "selected" ?> ><?php echo $gamerow['game_name'] ?></option>
                          <?php } ?>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <th>服务器ID：</th>
                    <td><input type="text" name="server_id" size="50" value="<?php echo $row['server_id'] ?>" /></td> 
                </tr>
                <tr>
                    <th>服务器名称：</th>
                    <td><input type="text" name="server_name" size="50" value="<?php echo $row['server_name'] ?>" /></td> 
                </tr>
                <tr>
                    <th>游戏登录地址及端口：</th>
                    <td><input type="text" name="login_url" size="50" value="<?php echo $row['login_url'] ?>" />例如：127.0.0.1:32001</td> 
                </tr>
                <tr>
                    <th>游戏资源地址：</th>
                    <td><input type="text" name="res_url" size="50" value="<?php echo $row['res_url'] ?>" />例如：http://127.0.0.1/res/ *需要结尾加'/'</td> 
                </tr>
                <tr>
                    <th>开服时间：</th>
                    <td><input type="text" id="date_1" name="start_time" size="20" value="<?php echo $row['start_time'] ?>" /></td> 
                </tr>
                <tr>
                    <th>状态：</th>
                    <td>
                    <label><input type="checkbox" name="zuixin" value="1" <?php if($row['zuixin']==1) echo "checked=checked;" ?> />是否最新</label>&nbsp;&nbsp;
                    </td> 
                </tr>
                <tr>
                    <td colspan="2" align="center" valign="middle">
                        <INPUT type="hidden" value="server_add" name="go"> 
                        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
                    </td>
                </tr>            
            </table>
            <script type="text/javascript">
            $(function(){
                $("#date_1").datetimepicker();
            });
            </script>
        </form>
    </div>
</body>
</html>