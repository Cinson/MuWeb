<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';

?>	 
<script type="text/javascript"> 
     var clipboardswfdata;
     var setcopy_gettext = function(){
         clipboardswfdata = document.getElementById('test_text').value;
         //alert(clipboardswfdata);
         window.document.clipboardswf.SetVariable('str', clipboardswfdata);
     }
     var floatwin = function(){
         alert('复制成功！');
         //document.getElementById('clipinner').style.display = 'none';
     }
 </script>

		<div class="fl user-right">

	<div class="side-bg"></div>
        <div class="main">
        	<div class="content">            
            	<div class="user-form">
                	<div class="user-head2"><h2>我要推广</h2></div>
                    <div class="content" id="spread">
					<?php
					$sql_pt = "SELECT * FROM pintai WHERE id=".$hxlpintai_id.";";
$result_pt = mysql_query($sql_pt,$conn);
$row_pt   = mysql_fetch_array($result_pt);

$platform = $row_pt['platform']; 
$site_name = $row_pt['site_name'];   
$web_site = $row_pt['web_site'];   
$Bei_No = $row_pt['bei_no']; 
$pay_url = $row_pt['pay_url'];  
$qq = $row_pt['qq'];
$qqqun = $row_pt['qqqun'];
$tjdm = $row_pt['tjdm'];
$qdm = $row_pt['qdm']; 
				?>	
					<br>
					<textarea class="user-token-qaa" rows="15" cols="100">【双线BGP】【<?php echo $site_name ?>】【本站最新游戏强烈推荐】
介绍：皇图、魔域世界、梦幻修仙2、勇者之塔、开天屠龙、三国志、武尊、问仙、盛世三国、圣剑神域、乱舞江山、空冥决、凡人修真2、全民奇迹、大主宰等等。
最新最好玩的页游手游平台，公平合理安全绿色无毒。给你不一样的平台，不一样的游戏，不一样的精彩。拿你的脾气，来战我的任性“屌丝也疯狂”
充值累积，更有IPhone想送。玩出豪礼想送，玩出激情碰撞，要玩就玩本平台游戏。
您还在玩“那种坑爹的垃圾服吗？您是否怕了卡顿？您是否还在害怕GM跑路？
来玩本平台游戏，一个账户通用所有游戏“更多游戏和详情，请访问本站”。
在线客服：<?php echo $qq ?>

玩家群①：<?php echo $qqqun ?>

快速访问：<?php echo "http://".$web_site."/tg.php?tid=".$uid; ?>
					</textarea>
					</div>
					<ul class="sc-list">
					<li ><a href="#"  class="listItem" onclick="alert('当前浏览器不支持 请手动复制标题栏内容');"><em>复制标题</em></a></li>
        <li ><a href="#"  class="listItem" onclick="alert('当前浏览器不支持 请手动复制内容栏内容');"><em>复制内容</em></a></li>
		 <li class="the-new"><a  href="my_extension.php" class="listItem" target="_blank"><em>推广资源站</em></a></li></ul>
	
		
		 	   <div class="in-tip">
                    	<h1>温馨提示：</h1>
                        <div id="gameExcInfo">复制内容到QQ群或者推广资源中的论坛推广  </br>
						每有一个推广链接注册的用户你将获得一个推广数 还有100平台币奖励  </br>
						注意：相同IP通过平台推广链接注册只获得推广数 没有平台币奖励    </br>
                        如有浏览器提示不支持复制内容和标题的，请手动复制标题和内容，推广人可以自己修改标题和内容，快速访问地址不可修改，否则无法自动领取平台币						
                    </div>
		
		 
		 		
		 
		 
		 
		 
    </div>
	
	
	
	
	
                </div>
                <script type="text/javascript">toPwdCheck();</script>
                <!--end user-forem-->
				 
				
				
            </div>
        </div>
    </div>
</div></div>