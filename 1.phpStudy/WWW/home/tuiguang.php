<?php
require '../check_login.php';
require '../top.php';
require 'tuiguang_top.php';

	$tuiguang = stripslashes(trim($_POST['tuiguang']));
	$query1="select * from $database.`user` set tuiguang = '$tuiguang' where username = '$username'";
	$result1=mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
 	if (0 < $row1['tuiguang'])
	{
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>"; 
	echo "<script>alert('您还不是推广员，请申请后再登陆推广系统！')</script>";
	exit("<script> location.href='../index.php';</script>");
}
?>
		<div class="user-content cf">
			<div class="fl user-left">
				<ul class="user-menu" >
	<div class="fl user-right">
				
                <div class="user-title">
					我的账号<span class="common-title-ico"></span>
				</div>
			             <?php
				$tgname =$_SESSION['username'];
$sql="SELECT COUNT(*) AS count FROM $database.user where tg_name = '$tgname'"; 
$result=mysql_fetch_array(mysql_query($sql)); 
$rowNum=$result['count']; 

			
				?> <ul class="user-secure-panel">
						<div class="user-wallow" id="user-wallow">
					<h3>规则：通过推广地址注册的账号，所充值的金额，10%是给你的报酬！例：下线充值100元，给你10元！</h3>
							  <div class="user-wallow-tr user-wallow-tr-first">
        				<div class="user-wallow-td user-wallow-td-left">推广人数：</div>
				        <div class="user-wallow-td"><?php echo $rowNum; ?></div>
				    </div>
				    <div class="user-wallow-tr">
				        <div class="user-wallow-td user-wallow-td-left">推广地址：</div>
				        <div class="user-wallow-td"><?php echo "http://".$web_site."/tg.php?tid=".$uid; ?> </div>
				    </div>
                    				</div>

	<div class="side-bg"></div>
        <div class="main">
        	<div class="content">            
            	<div class="user-form">
                	<div class="user-head2"><h2>推广记录</h2></div>
                    <table class="tab-dataList">
                        <thead>						
                            <tr> 
                              <th>推广的玩家</th>
							  <th>查看充值</th>
							     </tr>
                        </thead>
                        <tbody>
                        <?php
                        $username = $_SESSION['username'];
						$sql="SELECT * FROM  $database.user WHERE tg_name = '$username' ";
                        $result = mysql_query($sql,$conn);
                        while ($row = mysql_fetch_array($result)){
                        ?>
                            <tr> 
                                <td><?php echo $row['username'] ?></td>
								 <td><?php echo $row['server_name'] ?></td>
                            </tr>
                        <?php
                        $username = $_SESSION['username'];
						$sql="SELECT * FROM  $database.user WHERE tg_name = '$username' ";
                        $result = mysql_query($sql,$conn);
                        while ($row = mysql_fetch_array($result)){
                        ?>
                            <tr> 

                               
                            </tr>
                        <?php } }?>
                        </tbody>
                      </table>
                </div>
                <!--end user-forem-->
            </div>
        </div>
    </div>
</div></div>