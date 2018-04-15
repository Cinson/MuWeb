<?php
require 'check_login.php';
 date_default_timezone_set('Asia/Shanghai');	
 
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>游戏统计表</title>
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
 


            <table class="tab_form">

                <tr>
                    <th>查询当天游戏数据 ：</th>
                    <td><input type="text" id="date_1" name="start_time" size="20" value="<?php echo  date('Y-m-d',time()); ?>" /></td> 
                </tr>
                <tr>
                    <td colspan="2" align="center" valign="middle">
                        <INPUT type="hidden" value="server_add" name="go"> 
                        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认查询" />
                    </td>
                </tr>            
            </table>
            <script type="text/javascript">
            $(function(){
                $("#date_1").datepicker();
            });
			
			$('#submit').click(function(){

				$.get("action.php?action=selgamelog&date="+$("#date_1").val(),null,function(msg){
					$("#datatable").html(msg);					
				});
			});
				
            </script>

 
 
 

 
        <br />
		<?php
			  
			   $query="SELECT count(*) FROM $database.server_login_log WHERE `login_time` like '".date("Y-m-d",time())."%';";
				$result = mysql_query($query,$conn);
				$rowtotle = mysql_fetch_array($result);
				$totle=$rowtotle[0];
		
		?>
		<div id="datatable"> 
        <table class="data_list">
		今天共有   <?php echo $totle?>  人次 在本平台进入了游戏
			<thead>
                <tr>
                    
 
                    <td width="10%">用户名</td>
                    <td >游戏</td>
                    <td>服务器ID</td>
                    <td width="10%">进入时IP</td>
					<td width="10%">进入时间</td>
 
                </tr>
        	</thead>
            <tbody>
			<?php
               

			   $query="SELECT a.* ,b.game_name FROM server_login_log a,game_list b  WHERE  a.gid = b.gid AND a.login_time like '".date("Y-m-d",time())."%' ORDER BY id DESC";
   
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];

        
            ?> 
                <tr>    
                   
 
                    <td><?php echo $row['username'] ?></td>
					<td><?php echo $row['game_name'] ?></td>
					<td><?php echo $row['server_id'] ?></td>
					<td><?php echo $row['login_ip'] ?></td>
					<td><?php echo $row['login_time'] ?></td>
 
                </tr>
   			<?php } ?>
            </tbody>
 		 </table>
		 </div>
    </div>
</body>
</html>