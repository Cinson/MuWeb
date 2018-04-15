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
                	<div class="user-head2"><h2>充值记录</h2><cite>(含充值赠送及后台补发)</cite></div>
                    <table class="tab-dataList">
                        <thead>						
                            <tr>
                              <th width="25%">充值金额(人民币)</th>
                              <th width="25%">充值数量(钻石)</th>
                              <th width="20%">充值类型</th>
                              <th>操作时间</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
                            $username = $_SESSION['username'];
                            $result = mysql_query("select * from $database.pay_log where pay_username = '$username'",$conn);
                            while ($row = mysql_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['pay_rmb'] ?></td>						
                                <td><?php echo $row['pay_zuanshi'] ?></td>
                                <td><?php echo $row['pay_type'] ?></td>
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