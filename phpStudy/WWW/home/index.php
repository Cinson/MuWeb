<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';
?>

		<div class="fl user-right">
				
                <div class="user-title">
					我的账号及推广系统<span class="common-title-ico"></span>
				</div>
			             <?php
				$tgname =$_SESSION['username'];
$sql="SELECT COUNT(*) AS count FROM $database.user where tg_name = '$tgname'"; 
$result=mysql_fetch_array(mysql_query($sql)); 
$rowNum=$result['count']; 

			
				?> <ul class="user-secure-panel">
						<div class="user-wallow" id="user-wallow">
					<h3>本游戏加入推广员系统：可向管理员申请开通！</h3>
							  <div class="user-wallow-tr user-wallow-tr-first">
        				<div class="user-wallow-td user-wallow-td-left">推广人数：</div>
				        <div class="user-wallow-td"><?php echo $rowNum; ?></div>
				    </div>
				    <div class="user-wallow-tr">
				        <div class="user-wallow-td user-wallow-td-left">进入推广系统：</div>
				        <div class="user-wallow-td"><a href="tuiguang.php"  target="_blank">点我进入</a></div>
				    </div>
                    				</div>
				
			

	        </div>
		</div>
	</div>

</div>

