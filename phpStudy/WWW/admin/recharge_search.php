<?php
require 'check_login.php';
$_SESSION['username_search'] = '';

if ($_POST['go']=='report') {
	$game_id = htmlspecialchars($_POST['game_list']);
	$server_id = htmlspecialchars($_POST['server_id']);
	$username = htmlspecialchars($_POST['username']);
	$start_time = htmlspecialchars($_POST['start_time']);
	$end_time = htmlspecialchars($_POST['end_time']);
	$sql="select sum(rmb) from $database.exchange_log where 1  ";
	if($game_id) {
		$sql .= " and game_id = '$game_id'";
	};
	if($server_id) {
		$sql .= " and server_id = '$server_id'";
	};
	if($username) {
		$sql .= " and username = '$username'";
	};

	if($start_time) {
		$start_time = $start_time.' 00:00:00';
		$sql .= " and log_time >= '$start_time'";
	};
	if($end_time) {
		$end_time = $end_time.' 23:59:59';
		$sql .= " and log_time <= '$end_time'";
	};
	$result = mysql_query($sql,$conn);
	$row = mysql_fetch_array($result);
	$count_rmb = $row['sum(rmb)'];
}
?>
<script language="JavaScript">
var onecount;
subcat=new Array(); 
<?php
	$sql="select * from $database.game_list as gl,$database.server as s where gl.gid = s.gid   order by server_id desc";
	$result = mysql_query( $sql );
	$count=0;
	while($rows=mysql_fetch_assoc($result)){
	$gid=$rows['gid'];
	$server_id=$rows['server_id'];
?>
	subcat[<?php echo $count?>]=new Array("<?php echo $rows['server_name']?>","<?php echo $rows['gid']?>","<?php echo $rows['server_id']?>"); 
	<?php $count++; }?>
	onecount=<?php echo $count;?>;
	function changelocation(locationid){
		document.myform.server_id.length=1;
		var locationid=locationid;
		var i;
		for(i=0;i<onecount;i++){   
			if(subcat[i][1]==locationid){
				document.myform.server_id.options[document.myform.server_id.length]=new Option(subcat[i][0],subcat[i][2]);    }
			}
	}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<style type="text/css">
a{color:#007bc4/*#424242*/; text-decoration:none;}
a:hover{text-decoration:underline}
ol,ul{list-style:none}
table{border-collapse:collapse;border-spacing:0}
body{height:100%; font:12px/18px Tahoma, Helvetica, Arial, Verdana, "\5b8b\4f53", sans-serif; color:#51555C;}
img{border:none}
.demo{width:500px; margin:20px auto}
.demo h4{height:32px; line-height:32px; font-size:14px}
.demo h4 span{font-weight:500; font-size:12px}
.demo p{line-height:28px;}
input{width:108px; height:20px; line-height:20px; padding:2px; border:1px solid #d3d3d3}

.myDiv{ height:40px}
.myDiv ul{list-style:none; margin:0; padding:0; height:40px}
.myDiv ul li{ float:left; height:40px;line-height:40px;margin:0 5px 0 5px;}
#ui-datepicker-div {display:none;}
.button {font-size:14px;padding: .5em 2em .55em; }
.font_red {font-size:20px;color:red;}
</style>
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-datepicker.js"></script>
<script type="text/javascript">
$(function(){
	$("#date_1").datepicker();
	$("#date_2").datepicker({
	});
});
</script>
<div class="myDiv">
	<ul>
		<form action="" method="post" name="myform">
		<li>游戏名称：
			<select name="game_list" id="game_list" onChange="changelocation(document.myform.game_list.options[document.myform.game_list.selectedIndex].value)" size="1">
				<option value=''>请选择游戏</option>
			   <?php 
				$sql = "select * from $database.game_list";
				$result = mysql_query( $sql );
				while($rows=mysql_fetch_array($result)){   
				?>
				<option  value="<?php echo $rows['gid']; ?>"><?php echo $rows['game_name']; ?></option>
			  <?php } ?>
			</select>
		</li>
		<li>服务器：
			<select name="server_id" id="server_id">
				<option value=''>请选择服务器</option>
			</select>
		</li>
		<li>用户名：<input type="input" value="<?php echo $_SESSION['username_search'] ?>" name="username" size="10px" /></li>
		<li>开始时间：<input type="text" id="date_1" name="start_time" /></li>
		<li>结束时间：<input type="text" id="date_2" name="end_time" /></li>
		<input type="hidden" value="report" name="go" /> 
		<li><button type="submit" class="button" value="查询" >查询</button></li>
		<li>总金额：<span class="font_red"><span><?php if ($count_rmb) echo $count_rmb; else echo '0'?>元</span></li>

		</form>
</div>
<TABLE border="1" cellspacing="1" width="100%" cellpadding="2" style="margin-top:2px;border-collapse: collapse;border:1px solid Silver" bordercolor="#E2E2E2" bordercolorlight="#E2E2E2" bordercolordark="#E2E2E2" align="center" >		
	<tr onmouseover="this.className='mouseon'" onmouseout="this.className='';">    
	<tr bgcolor="#F1F1F1" style="color:#CC3300;" class="tabletr">
    <td height="8%" width="8%" align="center" valign="middle">用户名</td>
    <td width="8%" align="center" valign="middle">游戏名称</td>
    <td width="8%" align="center" valign="middle">区服ID</td>
	<td width="8%" align="center" valign="middle">兑换钻石数量</td>
	<td width="8%" align="center" valign="middle">兑换的元宝数量(个)</td>
	<td width="8%" align="center" valign="middle">操作时间</td>
	</tr>

	<?php
		if ($_POST['go']=='report') {
			$game_id = htmlspecialchars($_POST['game_list']);
			$server_id = htmlspecialchars($_POST['server_id']);
			$username = htmlspecialchars($_POST['username']);
			$start_time = htmlspecialchars($_POST['start_time']);
			$end_time = htmlspecialchars($_POST['end_time']);
			$sql="SELECT a.* ,b.game_name,c.server_name FROM  $database.exchange_log a ,game_list b ,SERVER c WHERE  a.game_id = b.gid AND (a.server_id=c.server_id AND a.game_id=c.gid) ";
			if($game_id) {
				$sql .= " and a.game_id = '$game_id'";
			};
			if($server_id) {
				$sql .= " and a.server_id = '$server_id'";
			};
			if($username) {
				$sql .= " and a.username = '$username'";
			};
			if($start_time) {
				$start_time = $start_time.' 00:00:00';
				$sql .= " and a.log_time >= '$start_time'";
			};
			if($end_time) {
				$end_time = $end_time.' 23:59:59';
				$sql .= " and a.log_time <= '$end_time'";
			};
			$_SESSION['username_search'] = $username;
			// echo $sql;
			$result = mysql_query($sql,$conn);
			while($row1 = mysql_fetch_array($result)){
	?>  

 
  <tr onmouseover="this.className='mouseon'" onmouseout="this.className='';" class="tabletr">    
    <td align="center" valign="middle"><?php echo $row1['username'] ?></td>
    <td align="center" valign="middle"><?php echo $row1['game_name'] ?></td>
    <td align="center" valign="middle"><?php echo $row1['server_name'] ?></td>
	<td align="center" valign="middle"><?php echo $row1['rmb'] ?></td>
	<td align="center" valign="middle"><?php echo $row1['order_yb'] ?></td>
	<td align="center" valign="middle"><?php echo $row1['log_time'] ?></td>

  </tr>
   <?php } }?>
  </table>
<br/>
<br/>
<br/>


</body>
</html>
