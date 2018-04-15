<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';

?>
		<div class="fl user-right">
	<div class="side-bg"></div>
        <div class="main">
        	<div class="content">            
            	<div class="user-form">
                	<div class="user-head2"><h2>兑换记录</h2></div>
                    <table class="tab-dataList">
                        <thead>						
                            <tr class="paytitle"> 
                              <th>兑换游戏</th>
                               <th width="100">兑换区服</th>
                              <th>兑换数量</th>
                              <th>兑换元宝</th>
                              <th width="140">兑换时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $username = $_SESSION['username'];
						$sql="SELECT a.* ,b.game_name,c.server_name FROM  $database.exchange_log a ,game_list b ,SERVER c WHERE  a.game_id = b.gid AND (a.server_id=c.server_id AND a.game_id=c.gid) AND username = '$username' order by log_time desc";
                        $result = mysql_query($sql,$conn);
                        while ($row = mysql_fetch_array($result)){
                        ?>
                            <tr class="paytitle"> 
                                <td><?php echo $row['game_name'] ?></td>
                                <td><?php echo $row['server_name'] ?></td>
                                <td><?php echo $row['rmb'] ?></td>
                                <td><?php echo $row['order_yb'] ?></td>
                                <td><?php echo $row['log_time'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                </div>
                <!--end user-forem-->
            </div>
        </div>
    </div>
</div></div>