<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';

?>
<script type="text/javascript" src="../js/pay.js"></script>
<script language="javascript">
lm=new Array();
<?php
$query  = "select gl.gid,server_id,server_name from $database.game_list as gl,$database.server as s where gl.gid = s.gid  and gl.is_recom = '1' order by server_id desc ";
$result = mysql_query($query,$conn);
$i = 1;
$j = mysql_num_rows($result);
while ($i <= $j) {
	while ($row = mysql_fetch_array($result)){
		echo "lm[{$i}] = new Array('{$row[server_id]}','{$row[server_name]}','{$row[gid]}');";	
		$i++;
	}
}
?>
var lmcount= <?php echo $j ?>;
var allRmb = <?php echo $rmb_user ?>;
var gameInfoArray = new Array();
<?php
$query  = "select gid,game_name,pay_content,awardset from $database.game_list where is_recom = '1' order by id desc";
$result = mysql_query($query,$conn);
$j = mysql_num_rows($result);
$i = 1;
while ($i <= $j) {
	while ($row = mysql_fetch_array($result)){
		echo "gameInfoArray[{$row[gid]}] = new Array('{$row[gid]}','{$row[game_name]}','".preg_replace("/[\r\n]+/", "<br />", $row["pay_content"])."','{$row[awardset]}');";	
		$i++;
	}
}
?>
$(document).ready(function() {	
	var html='';
	var arr = new Array("first","", "second", "third") 
	for(var item in gameInfoArray) {
		//document.write(gameInfoArray[item]+"<br />");
		html+="<a href=\"javascript:void(0);\" onclick=\"focusserver('"+gameInfoArray[item][1]+"','"+gameInfoArray[item][0]+"','100')\">"+gameInfoArray[item][1]+"</a>";
	}
	$("#SelectGame .items").html(html);
	$("#SelectGame h3").click(function(e){
		e.stopPropagation();		
		$('#SelectServer .ui-select-list').hide();
		$('#SelectGame .ui-select-list').toggle();
	});
	$("#SelectServer h3").click(function(e){
		e.stopPropagation();
		$('#SelectGame .ui-select-list').hide();
		$('#SelectServer .ui-select-list').toggle();
		if($(this).text() == "请选择服务器") $('#SelectServer .ui-select-list').show();
	});
});
</script>

		<div class="fl user-right">

	<div class="side-bg"></div>
        <div class="main">
        	<div class="content">            
            	<div class="user-form">
                	<div class="user-head2"><h2>游戏币兑换</h2></div>                   
                    <form id="pay_form" name="myform" action="../vip.php?action=yb" method="post">
                    <input type="hidden" name="mimacode" value="<?php echo $_SESSION['sscode'] ?>">
                    <input type="hidden" name="game_id" id="game_id" value="">
                    <input type="hidden" name="server_id" id="server_id" value="">
                    <ul class="user-form-ul">
                    	<li>
                            <span>选择游戏：</span>
                            <div class="ui-select" id="SelectGame">
                            	<h3>选择游戏</h3>
                                <div class="ui-select-list">
                                	<p>选择游戏</p>
                                    <div class="items"></div>
                                </div>
                            </div>
                            <div class="ui-select" id="SelectServer" style="display:none;">
                            	<h3>请选择服务器</h3>
                                <div class="ui-select-list">
                                	<p>请选择服务器</p>
                                    <div class="items">  
                                    </div>
                                </div>
                            </div>
                            <i id="GameTip"></i>                          
                        </li>
                        <li id="youid">
                            <span>您的账号：</span><input disabled="disabled" class="t-input-show" value="<?php echo $_SESSION['username'] ?>" />
                        </li>
                        <li id="youpintb">
                            <span>平台币余额：</span><input disabled="disabled" class="t-input-show" value="<?php echo $rmb_user ?> 钻石" />
                        </li>
                        <li id="czzh2">
                            <span>兑换数量：</span>
                            <input class="t-input" name="change_yb" type="text" value="" oncopy="return false;" onpaste="return false;" oncut="return false;" id="txt_checkingPhone" onkeyup="checkRate(this.id)">
                            <i></i>
                        </li>
                        <li>
                            <span>&nbsp;</span>
                            <p>对应<i>元宝</i> 数量：<em id="exChangeNum">0</em> <em id="exChangeTip">[兑换比例1:10]</em></p>           
                        </li> 
                        <li class="bar">
                            <span>&nbsp;</span>
                            <button type="button" class="b-submit" onclick="pay();" id="submit_button">提交</button>          
                        </li> 
                    </ul>       
                    </form>
                    <div class="in-tip">
                    	<h1>温馨提示：</h1>
                        <div id="gameExcInfo">将本钻石兑换成游戏币时，请务必确保游戏里已经建立了角色，然后请先从游戏里下线后再兑换，以免造成不必要的损失</div>                        
                    </div>
                </div>
                <!--end user-forem-->
            </div>
        </div>
    </div>
</div></div>
</div>
