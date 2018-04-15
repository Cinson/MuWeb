<?php
require 'check_login.php';
require_once('../lib/page.class.php');

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
<title>补发元宝</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script> 
<script type="text/javascript" src="/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-datepicker.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link rel="stylesheet" type="text/css" href="/js/ueditor/themes/default/css/ueditor.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script language="JavaScript">
var onecount;
subcat=new Array(); 
<?php
	$sql="select * from $database.game_list as gl,$database.server as s where gl.gid = s.gid  and gl.is_online=1  order by server_id desc";
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
</head>

<body>
	<div class="main">
        <form action="action.php" method="post" name="myform">
            <table class="tab_form">
                <tr>
                    <th>选择游戏：</th>
                    <td>
                        <select name="game_list" id="game_list" onChange="changelocation(document.myform.game_list.options[document.myform.game_list.selectedIndex].value)" size="1">
                            <option value=''>请选择游戏</option>
                           <?php 
                            $sql = "select * from $database.game_list where is_online=1";
                            $result = mysql_query( $sql );
                            while($rows=mysql_fetch_array($result)){   
                            ?>
                            <option  value="<?php echo $rows['gid']; ?>"><?php echo $rows['game_name']; ?></option>
                          <?php } ?>
                        </select>
                        <select name="server_id" id="server_id">
                            <option value=''>请选择服务器</option>
                        </select>
                    </td>                    	
                </tr> 
                <tr>
                	<th>平台用户名：</th>
                    <td><input type="text" name="username" size="50" value="" /></td> 
                </tr>
                <tr>
                    <th>游戏币数量：</th>
                    <td><input type="text" name="send_rmb" size="50" value="" /></td> 
                </tr>              
                <tr>
                	<td></td>
                    <td valign="middle">
                        <INPUT type="hidden" value="send_money" name="go"> 
                        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
                    </td>
                </tr>              
            </table>
        </form>
        <br />
        <table class="data_list">
			<thead>
                <tr>
                    
                    <td width="20%">角色名</td>
                    <td width="20%">游戏名称</td>
                     <td >服务器名称</td>
                    <td>补发元宝数量</td>
                    <td width="20%">操作时间</td>
					 <td width="20%">操作结果</td>
                </tr>
        	</thead>
            <tbody>
			<?php
			
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.send_log;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];			
			
			
			
			
			
			
			
			
			
                $query="SELECT a.*,b.game_name,c.server_name FROM $database.send_log a,$database.game_list b,$database.server c  WHERE a.game_id = b.gid AND (a.server_id = c.server_id AND a.game_id = c.gid) ORDER BY id DESC LIMIT ".(($p-1)*20).",20;";
   
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];
                $username = $row['username'];
                $send_rmb = $row['send_rmb'];
                $send_time = $row['send_time'];
                $game_name = $row['game_name'];
                $server_name = $row['server_name'];
				 $sendmsg = $row['sendmsg'];
        
            ?> 
                <tr>    
                   
                    <td><?php echo $username ?> </td>
                    <td><?php echo $game_name ?></td>
                    <td><?php echo $server_name ?></td>
                    <td><?php echo $send_rmb ?></td>
                    <td><?php echo $send_time ?></td>
                    <td><?php echo $sendmsg ?></td>
                </tr>
   			<?php } ?>
            </tbody>
 		 </table>
				<div  class= "page_fen" >
				<?php  
						$page = array ('total' => $totle,
									'perpage' => 20,
									'page_name' => 'p',
									"url" => "/admin_5222wanke/send_money.php"
									);	
									 
						$page_fen= new page($page);
						echo $page_fen->show(3);
						?>
				</div>		 
    </div>
</body>
</html>