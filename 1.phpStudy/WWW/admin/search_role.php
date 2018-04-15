<?php
require 'check_login.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TABLE border="1" cellspacing="1" width="100%" cellpadding="2" style="margin-top:2px;border-collapse: collapse;border:1px solid Silver" bordercolor="#E2E2E2" bordercolorlight="#E2E2E2" bordercolordark="#E2E2E2" align="center" >
  <tr>	
	<form action="" method="post" name="Form1" onSubmit="return check()">

    <td width="12%" height="30" align="right" valign="middle">玩家平台账号：</td>
    <td width="8%" valign="middle" class="huise_font">
	<input name="user_name" type="text" id="gamename" size="15"  class="inputclass inputtitle" value="" /></td>

	<td>
	<input type="hidden" value="report" name="go" /> 
    <input type="submit" class="btn80_1" name="Submit" id="submit" value="查询" />
	</td>
	</form>
  </tr>
   <tr onmouseover="this.className='mouseon'" onmouseout="this.className='';">    
    <td height="25" align="center" valign="middle"  colspan="14">角色信息查询</td>
  <tr bgcolor="#F1F1F1" style="color:#CC3300;" class="tabletr">
  <td height="22" width="4%" align="center" valign="middle">用户名</td>
    <td height="22" width="4%" align="center" valign="middle">密码</td>
    <td width="8%" align="center" valign="middle">注册IP</td>
	<td width="8%" align="center" valign="middle">最后登录IP</td>
    <td width="8%" align="center" valign="middle">注册时间</td>
	<td width="8%" align="center" valign="middle">最后登录时间</td>
	<td width="8%" align="center" valign="middle">钻石数量</td>
  </tr>

	<?php
		if (($_POST['go']=='report') && (!empty($_POST['user_name'])))
		{
			$user_name = htmlspecialchars($_POST['user_name']);
			$query="select * from $database.user  where username = '$user_name'";
			$result = mysql_query($query,$conn);
			while($row = mysql_fetch_array($result)){	
	?>  

 
  <tr onmouseover="this.className='mouseon'" onmouseout="this.className='';" class="tabletr">    
    <td align="center" valign="middle"><?php echo $row['username'] ?></td>
    <td align="center" valign="middle"><?php echo $row['pass'] ?></td>
    <td align="center" valign="middle"><a href="action.php?action=blockip&ip=<?php echo $row['reg_ip'] ?>" target="_blank"><?php echo $reg_ip ?></a></td>
    <td align="center" valign="middle"><a href="action.php?action=blockip&ip=<?php echo $row['last_ip'] ?>" target="_blank"><?php echo $last_ip ?></a></td>
	<td align="center" valign="middle"><?php echo $row['reg_date'] ?></td>
    <td align="center" valign="middle"><?php echo $row['last_time'] ?></td>
    <td align="center" valign="middle"><?php echo $row['rmb'] ?></td>
  </tr>
   <?php } } ?>
  </table>
<br/>
<br/>
<br/>


</body>
</html>