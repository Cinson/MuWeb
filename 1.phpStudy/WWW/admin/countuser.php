<?php
require 'check_login.php';
 date_default_timezone_set('Asia/Shanghai');	
 
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户统计</title>
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
                    <th>查询当天用户数据 ：</th>
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
				$.get("action.php?action=seluser&date="+$("#date_1").val(),null,function(msg){
					$("#datatable").html(msg);					
				});
			});
				
            </script>

 
 
 

 
        <br />
		<?php
			  
			   $query="SELECT count(*) FROM $database.user WHERE `reg_date` like '".date("Y-m-d",time())."%';";
				$result = mysql_query($query,$conn);
				$rowtotle = mysql_fetch_array($result);
				$totle=$rowtotle[0];
		
		?>
		<div id="datatable"> 
        <table class="data_list">
		今天共有   <?php echo $totle?>  位用户注册本平台
			<thead>
                <tr>
                    
                    <td width="10%">ID</td>
                    <td width="10%">用户名</td>
                    <td >注册时间</td>
                    <td>上次登陆时间</td>
                    <td width="10%">注册IP</td>
					<td width="5%">积分</td>
					<td width="5%">平台钻石</td>
					<td width="10%">推广人</td>
                </tr>
        	</thead>
            <tbody>
			<?php
               

			   $query="SELECT * FROM $database.user WHERE reg_date like '".date("Y-m-d",time())."%' ORDER BY id DESC";
   
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];

        
            ?> 
                <tr>    
                   
                    <td><?php echo $id ?> </td>
                    <td><?php echo $row['username'] ?></td>
					<td><?php echo $row['reg_date'] ?></td>
					<td><?php echo $row['last_time'] ?></td>
					<td><?php echo $row['reg_ip'] ?></td>
					<td><?php echo $row['jifen'] ?></td>
					<td><?php echo $row['rmb'] ?></td>
					<td><?php echo $row['tg_name'] ?></td>
					
					
                </tr>
   			<?php } ?>
            </tbody>
 		 </table>
		 </div>
    </div>
</body>
</html>