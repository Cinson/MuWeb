<?php
require '../check_login.php';
require '../top.php';

?>
<div class="bannerTitle">
	<div class="row"><h1>用户中心</h1></div>
</div>
<div class="column">
	<div class="side-bg"></div>
	<div class="row">
    	<?php require "left.php" ?>
        <div class="main">
        	<div class="content">
            	<div class="user-form">
                	<div class="user-head2"><h2>我要充值</h2></div>
                    <div class="user-form-ul">
                    	<p style="margin-bottom:10px; ">亲，你冲值到我们的游戏平台后，可以获得游戏平台的钻石，然后在兑换中心兑换成平台各游戏的游戏币哦</p>
                    	<a href="<?php echo $pay_url ?>" target="_blank" class="b-submit">立即充值</a>
                    </div>
                    
                </div>         
            	
            </div>
        </div>
    </div>
</div>