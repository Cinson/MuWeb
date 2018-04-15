<?php
require 'check_login.php';


?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>服务器列表</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<div class="main">
		<table class="data_list">
			<thead>
                <tr>
                    <td width="5%">ID</td>
                    <td width="10%">游戏</td>
                    <td width="10%">服务器ID</td>
                    <td width="10%">服务器名称</td>
                    <td width="10%">端口IP</td>
                    <td width="10%">资源地址</td>
                    <td width="13%">开服时间</td>
                    <td width="5%">设置最新</td>
                    <td width="10%">操作</td>
                </tr>
        	</thead>
            <tbody>
			<?php
                $query="SELECT a.*,b.game_name FROM $database.`server` a LEFT JOIN $database.`game_list` b ON a.gid = b.gid";
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];
                $gid = $row['gid'];
                $server_id = $row['server_id'];
                $server_name = $row['server_name'];
                $login_url = $row['login_url'];
                $res_url = $row['res_url'];
				$game_name = $row['game_name'];
                $start_time = $row['start_time'];
                $zuixin = $row['zuixin'];

            ?> 
                <tr>    
                    <td><?php echo $id ?></td>
                    <td><?php echo $game_name ?> </td>
                    <td><?php echo $server_id ?></td>
                    <td><?php echo $server_name ?></td>
                    <td><?php echo $login_url ?></td>
                    <td><?php echo $res_url ?></td>
                    <td><?php echo $start_time ?></td>
                    <td><?php if($zuixin == 1) echo '√'; else echo '×'; ?></td>                    
                    <td class="op_link"><a href="server_add.php?action=edit&sid=<?php echo $id ?>" target="_self">编辑</a><span></span><a href="action.php?action=del_server&sid=<?php echo $id ?>" target="_self">删除</a></td>
                </tr>
   			<?php } ?>
            </tbody>
 		 </table>
	</div>
</body>
</html>