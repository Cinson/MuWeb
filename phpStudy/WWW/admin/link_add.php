<?php
require 'check_login.php';

//新闻编辑按钮点击后取出相对应的数据
$action = $_GET['action'];
if ($action == 'edit') {
	$sid = $_GET['sid'];
	$sql="select * from $database.link where id = $sid ";
	$result = mysql_query($sql,$conn);
	$row = mysql_fetch_array($result);
}
?>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script> 
<script type="text/javascript" src="/js/ueditor/ueditor.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/ueditor/themes/default/css/ueditor.css">

<form action="action.php?go=link_add" method="post" name="Form1" onSubmit="return check()">
<TABLE border="1" cellspacing="1" width="100%" cellpadding="3" style="border-collapse: collapse;border:0px solid  #A5CF7A" bordercolor="#E2E2E2" bordercolorlight="#E2E2E2" bordercolordark="#E2E2E2" align="center" bgcolor="#F5F5F5">
<tr>
	<input type="hidden" value="<?php echo $sid ?>" name="sid">
	<td width="100px" align="left" valign="middle">网 站 ID：</td>
	<td><input name="sid" type="text" id="id" size="50"  class="inputclass inputtitle" value="<?php echo $sid ?>" disabled="true" /></td>
</tr>
<tr>
	<td width="100px" align="left" valign="middle">网站名称：</td>
	<td><input type="text" name="link_name" size="50" value="<?php echo $row['link_name'] ?>" /></td> 
</tr>

<tr>
	<td width="100px" align="left" valign="middle">链接url：</td>
	<td><input type="text" name="link_url" size="50" value="<?php echo $row['link_url'] ?>" /></td> 
</tr>

<tr>
	<td height="30" align="right" valign="middle">网站Banner：</td>
	<td><input type="text" name="link_img" size="50" value="<?php echo $row['link_img'] ?>" /> 只允许输入图片地址.禁止输入JS代码</td>
</tr>
<tr>
	<td height="30" align="right" valign="middle">是否显示：</td>
	<td><input type="text" name="isshow" size="10" value="<?php echo $row['isshow'] ?>" />(1为显示,0为不显示)</td>
</tr>
<tr>
	<td height="30" align="right" valign="middle">图片预览：</td>
	<td><img src="<?php echo $row['link_img'] ?>"/></td>
</tr>	
<tr>
    <td height="50" colspan="2" align="center" valign="middle">
		<INPUT type="hidden" value="link_add" name="go"> 
        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
    </td>
</tr>

</table>
</form>