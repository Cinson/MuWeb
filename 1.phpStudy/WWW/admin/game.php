<?php
require 'check_login.php';
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>游戏列表</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<div class="main">
		<table class="data_list">
    		<thead>
                <tr>
                    <td width="5%">ID</td>
                    <td width="8%">游戏ID</td>
                    <td>游戏名称</td>
                    <td width="13%">游戏类型</td>
                    <td width="8%">是否推荐</td>
                    <td width="8%">是否运营</td>                    
                    <td width="10%">操作</td>
                </tr>
        	</thead>
            <tbody>

			<?php
                $query="select * from $database.game_list ";
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];
                $gid = $row['gid'];
                $game_name = $row['game_name'];
                $is_recom = $row['is_recom'];
                $is_online = $row['is_online'];
                $type = $row['game_type'];
        
            ?> 
                <tr>    
                    <td><?php echo $id ?></td>
                    <td><?php echo $gid ?></td>
                    <td><?php echo $game_name ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php if($is_recom == 1) echo '√'; else echo '×'; ?></td>
                    <td><?php if($is_online == 1) echo '√'; else echo '×'; ?></td>                    
                    <td class="op_link"><a href="game_add.php?action=edit&sid=<?php echo $id ?>" target="_self">编辑</a><span></span><a href="action.php?action=del_game&sid=<?php echo $id ?>" target="_self">删除</a></td>
                </tr>
            <?php } ?>
            </tbody>
  		</table>
    </div>
</body>
</html>