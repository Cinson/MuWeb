<?php
require 'check_login.php';

//新闻编辑按钮点击后取出相对应的数据
$action = $_GET['action'];
if ($action == 'edit') {
	$sid = $_GET['sid'];
	$sql="select * from $database.news where id = $sid ";
	$result = mysql_query($sql,$conn);
	$row = mysql_fetch_array($result);
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script> 
<script type="text/javascript" src="/js/ueditor/ueditor.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/ueditor/themes/default/css/ueditor.css">

<form action="action.php" method="post" name="Form1" onSubmit="return check()">
<TABLE border="1" cellspacing="1" width="100%" cellpadding="3" style="border-collapse: collapse;border:0px solid  #A5CF7A" bordercolor="#E2E2E2" bordercolorlight="#E2E2E2" bordercolordark="#E2E2E2" align="center" bgcolor="#F5F5F5">
<tr>
	<?php if (empty($sid)) $type = 'none' ?>
	<input type="hidden" value="<?php echo $sid ?>" name="sid">
	<td width="100px" align="left" valign="middle">新闻ID：</td>
	<td><input name="" type="text" id="id" size="50"  class="inputclass inputtitle" value="<?php echo $sid ?> " disabled="true" /></td>
</tr>
<tr>
	<td width="100px" align="left" valign="middle">新闻标题：</td>
	<td><input type="text" name="title" size="100" value="<?php echo $row['title'] ?>" /></td> 
</tr>
<tr>
	<td height="30" align="right" valign="middle">新闻分类：</td>
	<td valign="middle" class="huise_font">
		<select name="type">  
			<option value ="热门">热门</option>  
			<option value ="活动">活动</option>
			<option value ="公告">公告</option> 
			<option value ="新闻">新闻</option> 
			<option value ="攻略">攻略</option> 
		</select> 
	</td>
</tr>
<tr>
	<td height="30" align="right" valign="middle">新闻排序：</td>
	<td><input type="text" name="sort" size="10" value="<?php echo $row['sort'] ?>" />(数值越大，排序越前)</td>
</tr>
<tr>
	<td height="30" align="right" valign="middle">是否头条：</td>
	<td><input type="text" name="is_toutiao" size="10" value="0" />(默认填0,1表示头条)</td>
</tr>
<tr>
	<td colspan="2">
	<script type="text/plain" id="content" name="content" >
	<?php 
		echo $content = htmlspecialchars_decode($row['content']);
	?>
	</script>

    <script type="text/javascript">
      var editor = new UE.ui.Editor();
      editor.render("content");
    </script>
	</td>
</tr>	
<tr>
    <td height="50" colspan="2" align="center" valign="middle">
		<INPUT type="hidden" value="news_add" name="go"> 
        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
    </td>
</tr>

</table>
</form>