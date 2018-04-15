<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';

?>

		<div class="fl user-right">
				
                <div class="user-title">
					我的游戏<span class="common-title-ico"></span>
				</div>  <?php
					$sql="SELECT a.* ,b.game_name,c.server_name,b.game_img FROM  $database.server_login_log a ,game_list b ,server c where  a.gid = b.gid and (a.server_id=c.server_id AND a.gid=c.gid) and a.username = '".$_SESSION['username']."' order by login_time desc limit 3 ";
					$result = mysql_query($sql,$conn);
					$game = array();
					$server = array();			
					while($row1 = mysql_fetch_array($result)){
						$game[$row1["gid"]] = array($row1["gid"],$row1["game_name"],$row1["game_img"]);
						if( !$server[$row1["gid"]] ) $server[$row1["gid"]] = array();
						array_push($server[$row1["gid"]],array($row1["server_id"],$row1["server_name"]));
					}
					?>   	<?php foreach ($game as $ig){ ?>
                            	<?php foreach ($server[$ig[0]] as $is){ ?>
				<div class="user-mygame" id="user-mygame">
		<div class="user-mygame-list ">
                        <a class="fl user-mygame-imglink" href="../server_list.php?gid=<?php echo $ig[0] ?>" target="_blank" title="<?php echo $ig[1] ?>" >
                            <img width="230" height="170" src="<?php echo $ig[2] ?>" alt="<?php echo $ig[1] ?>"/>
                        </a>
                        <div class="user-mygame-detail fl">
                            <p class="user-mygame-link">
                                <a class="user-mygame-site a9c" target="_blank" title="领取礼包" href="../home/my_welfare.php">领取礼包</a>
                                <a class="user-mygame-name" target="_blank" title="<?php echo count($game) ?>官网"
                                   href="../server_list.php?gid=<?php echo $ig[0] ?>" ><?php echo $ig[1] ?></a>
                            </p>                            
                            <p class="user-mygame-slist">
                            	<span>玩过的服：</span>
                                                                <a class="btn" target="_blank" title="<?php echo $ig[1] ?><?php echo $is[1] ?>"
                                   href="../game_login.php?gid=<?php echo $ig[0] ?>&server_id=<?php echo $is[0] ?>&line=dx">
<?php echo $row1['game_name'] ?><?php echo $is[1] ?>
                                </a>
                                                            </p>
                            <p class="user-mygame-btn">
                            	<a href="../server_list.php?gid=<?php echo $ig[0] ?>" target="_blank" class="btn-mygame btn-mygame-web" title="进入官网">进入官网</a>
                            	<a href="../game_login.php?gid=<?php echo $ig[0] ?>&server_id=<?php echo $is[0] ?>&line=dx" target="_blank" class="btn-mygame btn-mygame-bbs" title="进入游戏" >进入游戏</a>
                            </p>
                        </div>
                    </div>
                    </div>

					<?php }} ?> 

	        </div>
		</div>
	</div>

</div>
