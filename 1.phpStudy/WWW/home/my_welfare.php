<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';

?>

<script language="javascript">
lm=new Array();
<?php
$query  = "select * from $database.game_list as gl,$database.server as s where gl.gid = s.gid   order by server_id desc ";
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
var lmcount=<?php echo $j ?>;
</script>
		<div class="fl user-right">

	<div class="side-bg"></div>
        <div class="main">
        	<div class="content">            
            	<div class="user-form">
                	<div class="user-head2"><h2>新手福利</h2></div>                   
                    <form id="pay_form" name="myform" action="../vip.php?action=welfare" method="post">
                    <input type="hidden" name="mimacode" value="<?php echo $_SESSION['sscode'] ?>">
                    <input type="text" name="server_id" id="server_id" value="" style="display: none;">
					<input type="text" name="game_id" id="game_id" value="" style="display: none;">
                    <ul class="user-form-ul">
                    	<li>
                            <span>选择游戏：</span>
                            <div class="ui-select" id="SelectGame">
                            	<h3>选择游戏</h3>
                                <div class="ui-select-list">
                                	<p>选择游戏</p>
                                    <div class="items">  
                                        <?php 
											$query="select DISTINCT(gid),game_name,game_img_2 from $database.game_list where  is_recom = '1' order by id desc";
											$result = mysql_query($query,$conn);
											while($row = mysql_fetch_array($result)){	
										?>
                                        <a href="javascript:void(0);" onclick="focusserver('<?php echo $row['game_name']?>','<?php echo $row['gid']?>','100')"><?php echo $row['game_name']?></a>
										<?php } ?>                                  	
                                    </div>
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
                        </li>
                        <li id="youid">
                            <span>请选择礼包：</span>
                            <select name="package" id="package" >
                            <option selected="selected" value="">======请选择======</option>
                            <option value="welfare">新手福利</option>
                            </select>
                      	</li>
                        <li class="bar">
                            <span>&nbsp;</span>
                            <button type="button" class="b-submit" onclick="welfare();">免费领取</button>           
                        </li>        
                    </form>
                    <div class="in-tip">
                    	<h1>温馨提示：</h1>
                        <p> 领取新手福利前请注意：首先你必须在游戏里有角色，然后领取新手福利前必须先从游戏里下线，否则可能会成白领哦~_~</p>
                    </div>
                </div>
                <!--end user-forem-->
            </div>
        </div>
    </div>
</div></div>
</div>

<script type="text/javascript">

$(document).ready(function() {		
	$(".ui-select h3").click(function(e){
		e.stopPropagation();
		$('.ui-select-list').hide();
		$(this).parent().find(".ui-select-list").toggle();
	});
}).click(function(e){
	$('.ui-select-list').hide();
});
</script>