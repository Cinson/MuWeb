<?php
require 'check_login.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TABLE border="1" cellspacing="1" width="100%" cellpadding="3" style="border-collapse: collapse;border:0px solid  #A5CF7A" bordercolor="#E2E2E2" bordercolorlight="#E2E2E2" bordercolordark="#E2E2E2" align="center" bgcolor="#F5F5F5">

	<tr bgcolor="#F1F1F1" style="color:#CC3300;" class="tabletr">
	<td height="25" width="10%" align="center" valign="middle">ID</td>
    <td height="25" width="60%" align="center" valign="middle">新闻标题</td>
    <td width="10%" align="center" valign="middle">新闻分类</td>
	<td width="10%" align="center" valign="middle">添加时间</td>
	<td width="10%" align="center" valign="middle">操作</td>
	</tr>

	<?php
		$query="select * from $database.news ";
		$result = mysql_query($query,$conn);
		while($row = mysql_fetch_array($result)){	
		$id = $row['id'];
		$title = $row['title'];
		$content = $row['content'];
		$type = $row['type'];
		$time = $row['time'];

	?>  

 
  <tr onmouseover="this.className='mouseon'" onmouseout="this.className='';" class="tabletr">    
    <td align="center" valign="middle"><?php echo $id ?></td>
    <td align="center" valign="middle"><?php echo $title ?></td>
    <td align="center" valign="middle"><?php echo $type ?></td>
	<td align="center" valign="middle"><?php echo $time ?></td>
    <td align="center"><a href="news_add.php?action=edit&sid=<?php echo $id ?>" style="color:#1b10f5;" target="_self">编辑</a>|<a href="action.php?action=del_news&sid=<?php echo $id ?>" style="color:#1b10f5;" target="_self">删除</a></td>
  </tr>
   <?php } ?>
  </table>
<br/>
<br/>
<br/>

</body>
</html>