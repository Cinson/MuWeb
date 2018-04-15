<?php
session_start();

require '../config.php';
require '../include/SnsNetwork.php';


//后台登录
if ($_POST['go']=='login')
{
	$username = stripslashes(trim($_POST['username']));
	$password = stripslashes(trim($_POST['password']));
	{
	 if (empty($username))
	 {
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('请填写用户名！');location.href='javascript:history.back()';</script>";
	 }
	 if (empty($password))
	 {
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('请填写密码！');location.href='javascript:history.back()';</script>";
	 }
	 if ($username == $supname && $password == $suppass)
	 {
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		$_SESSION['supname'] = $username;
		if($_SESSION['supname'] == $supname) {
			echo "<script>location.href='left.php'</script>";
		}

	 }
	 else{
	 	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('用户名或密码错误');location.href='javascript:history.back()';</script>";
	 }
	}
}


//添加新闻
if ($_POST['go']=='news_add' && $_POST['sid']=='')
{
	$title = stripslashes(trim($_POST['title']));
	$type = stripslashes(trim($_POST['type']));
	$sort = stripslashes(trim($_POST['sort']));
	$is_toutiao = stripslashes(trim($_POST['is_toutiao']));
	$content =  htmlspecialchars(stripslashes($_POST['content']));
	
	if (isset($title))
	{
		$sql = "insert into $dabatabase.news(title, content, type, sort, is_toutiao, time) values('$title','$content','$type','$sort','$is_toutiao',now())";
		$result = mysql_query($sql,$conn);
	 	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('添加成功');location.href='news.php';</script>";
	 }

}


//添加平台系统信息
if ($_POST['go']=='pintai')
{
 
	//$platform =  htmlspecialchars(stripslashes($_POST['platform'])); 
	$site_name =  htmlspecialchars(stripslashes($_POST['site_name']));
	$web_site =  htmlspecialchars(stripslashes($_POST['web_site']));	
	$Bei_No =  htmlspecialchars(stripslashes($_POST['Bei_No']));	
	$pay_url =  htmlspecialchars(stripslashes($_POST['pay_url']));	
	$qq =  htmlspecialchars(stripslashes($_POST['qq']));	
	$qqqun =  htmlspecialchars(stripslashes($_POST['qqqun']));	
	$qdm =  htmlspecialchars(stripslashes($_POST['qdm']));	
	$logo_pic =  htmlspecialchars(stripslashes($_POST['logo_pic']));	
	//$supname =  htmlspecialchars(stripslashes($_POST['supname']));	
	$suppass =  htmlspecialchars(stripslashes($_POST['suppass']));	
	$guanjianzi =  htmlspecialchars(stripslashes($_POST['guanjianzi']));	
	$miaoxu =  htmlspecialchars(stripslashes($_POST['miaoxu']));	
	
	
	if (isset($qq))
	{
		$sql = "UPDATE pintai SET `site_name`='".$site_name."',`web_site`='".$web_site."',`Bei_No`='".$Bei_No."',`pay_url`='".$pay_url."',`qq`='".$qq."',`qqqun`='".$qqqun."',`qdm`='".$qdm."',`logo_pic`='".$logo_pic."',`suppass`='".$suppass."',`guanjianzi`='".$guanjianzi."',`miaoxu`='".$miaoxu."' WHERE `id`=".$hxlpintai_id.";";
		$result = mysql_query($sql,$conn);
		 
	 	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('添加成功'); location.href='javascript:history.back()'</script>";
	 }

}



//删除新闻
$action = $_GET['action'];
if ($action == 'del_news') 
{
	$sid = $_GET['sid'];
	$sql = "delete from $database.news where id = $sid";
	$result = mysql_query($sql,$conn);
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('删除成功');location.href='news.php';</script>";
}
//后台把IP加入黑名单
$action = $_GET['action'];
if ($action == 'blockip') 
{
	$user_ip = $_GET['ip'];
	$sql="insert into $database.blockip (`ip`,`isban`) value ('$user_ip','1')";
	$result = mysql_query($sql,$conn);
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('添加成功');window.close(); </script>";
}

//后台reset密码
$action = $_GET['action'];
if ($action == 'reset_pass') 
{
	$username = $_GET['username'];
	$sql="update $database.user set pass = md5('baidu9900123') where username = '$username' ";
	$result = mysql_query($sql,$conn);
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('密码已重置为baidu9900123,请玩家赶快去修改密码');window.close(); </script>";
}


//后台修改新闻
if (($_POST['go']=='news_add') && (!empty($_POST['sid'])) )
{       $sid = $_POST["sid"];
		$title = stripslashes(trim($_POST['title']));
		$type = stripslashes(trim($_POST['type']));
		$sort = stripslashes(trim($_POST['sort']));
		$content = stripslashes(trim($_POST['content']));
		$is_toutiao = stripslashes(trim($_POST['is_toutiao']));
		$query="update $database.news set title='$title' ,content = '$content',type='$type', sort='$sort', is_toutiao='$is_toutiao'  where id=$sid";
		$result=mysql_query($query,$conn);
		if ($result){
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑成功,请刷新页面收再次查看！');location.href='javascript:history.back()';</script>";
			}
		else{
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑失败,请检查填写内容');location.href='javascript:history.back()';</script>";
			}
}


//添加广告
if ($_GET['go']=='link_add' && $_POST['sid']=='')
{
	$link_name = htmlspecialchars(trim($_POST['link_name']));
	$link_img = htmlspecialchars(trim($_POST['link_img']));
	$link_url = htmlspecialchars(trim($_POST['link_url']));
	$isshow = htmlspecialchars(trim($_POST['isshow']));
	
	if (isset($link_name))
	{
		$sql = "INSERT link SET `link_name`='".$link_name."',`link_url`='".$link_url."',`link_img`='".$link_img."',`isshow`=".$isshow.";";
		

		
		$result = mysql_query($sql,$conn);
	 	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('添加成功');location.href='link.php';</script>";
	 }

}

//删除广告
$action = $_GET['action'];
if ($action == 'del_link') 
{
	$sid = $_GET['sid'];
	$sql = "delete from $database.link where id = $sid";
	$result = mysql_query($sql,$conn);
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('删除成功');location.href='link.php';</script>";
}

//后台修改广告
if (($_POST['go']=='link_add') && (!empty($_POST['sid'])) )
{       $sid = $_POST["sid"];
		$link_name = htmlspecialchars(trim($_POST['link_name']));
		$link_img = htmlspecialchars(trim($_POST['link_img']));
		$isshow = htmlspecialchars(trim($_POST['isshow']));
		$query="update $database.link set link_name='$link_name' ,link_img = '$link_img',isshow='$isshow' where id=$sid";
		$result=mysql_query($query,$conn);
		if ($result){
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑成功,请刷新页面收再次查看！');location.href='javascript:history.back()';</script>";
			}
		else{
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑失败,请检查填写内容');location.href='javascript:history.back()';</script>";
			}
}
//补发元宝
if ($_POST['go']=='send_money')
{
	$game_id = htmlspecialchars($_POST['game_list']);
	$server_id = htmlspecialchars($_POST['server_id']);
	$username = htmlspecialchars($_POST['username']);
	$payGold = htmlspecialchars($_POST['send_rmb']);
	///////////////give user id 
	$sql="SELECT rmb,id FROM $database.user WHERE username = '$username'";
	$result=mysql_query($sql,$conn);
	$row=mysql_fetch_array($result);	
		//Give id为满足某些游戏加入用户ID做识别
	$uid=$row['id']+$pintaimainid;	
	
	
	if ($username != "" and $payGold != "" and $server_id != "" and $game_id != "")
	{

		
		$sql_sid = "select pay_api_url,pay_api_key,awardset from $database.game_list where gid = '$game_id'";
		$result_sid = mysql_query($sql_sid,$conn);
		$row_sid    = mysql_fetch_array($result_sid);		
		$pay_api_url = $row_sid['pay_api_url'];
		$pay_api_key = $row_sid['pay_api_key'];
		
		
		$pfopenid = "${username}${platform}";
		
			$time = time();
			$order = $time;
			$sign = md5("${pfopenid}${time}${uid}${platform}${server_id}${payGold}${order}${pay_api_key}");
			
			$url = "${pay_api_url}?sid=${server_id}&uid=${uid}&gid=${game_id}&pf=${platform}&user=${pfopenid}&time=${time}&gold=${payGold}&order=${order}&sign=${sign}";
			
			//die($url);
			$ret = SnsNetwork::makeRequest($url,array(),'get');
			$retmsg=$ret['msg'];
			if($ret["result"]==true &&( $ret["msg"] == true ||trim($ret["msg"]) == 'ok' || $ret['msg']=="1")) //原文件是直接发到游戏里

			{
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
				echo "<script>alert('发送成功');location.href='send_money.php';</script>";
				$sql = "insert into $database.send_log( username, send_rmb, send_time, game_id, server_id,status,sendmsg) values('$username','$payGold',now(),$game_id,$server_id,1,'$retmsg')";
				//die($sql);
				$result = mysql_query($sql,$conn);					
				
			}
			else 
			{
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
				echo "<script>alert('发送失败');location.href='send_money.php';</script>";
			}
	 	
	 }else{
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('请填写正确信息！');location.href='javascript:history.back()';</script>"; 
	 }

}

//添加游戏
if ($_POST['go']=='game_add' && $_POST['sid']=='')
{
	$game_name = htmlspecialchars(trim($_POST['game_name']));
	$gid = htmlspecialchars(trim($_POST['gid']));
	$is_recom = htmlspecialchars(trim($_POST['is_recom']));
	$game_tag = htmlspecialchars(trim($_POST['game_tag']));
	$game_type = htmlspecialchars(trim($_POST['game_type']));	
	$is_online = htmlspecialchars(trim($_POST['is_online']));
	
	$game_img_1 = htmlspecialchars(trim($_POST['game_img_1']));
	$game_img_2 = htmlspecialchars(trim($_POST['game_img_2']));
	$game_img_3 = htmlspecialchars(trim($_POST['game_img_3']));
	$game_img_4 = htmlspecialchars(trim($_POST['game_img_4']));
	$game_img_5 = htmlspecialchars(trim($_POST['game_img_5']));
	$game_img_6 = htmlspecialchars(trim($_POST['game_img_6']));	
	$game_img_7 = htmlspecialchars(trim($_POST['game_img_7']));		
	
	$awardset = htmlspecialchars(trim($_POST['awardset']));
	$welfare = htmlspecialchars(trim($_POST['welfare']));
	$dlq = htmlspecialchars(trim($_POST['dlq']));
	$pay_api_url = htmlspecialchars(trim($_POST['pay_api_url']));
	$pay_api_key = htmlspecialchars(trim($_POST['pay_api_key']));
	$login_api_url = htmlspecialchars(trim($_POST['login_api_url']));
	$login_api_key = htmlspecialchars(trim($_POST['login_api_key']));
	
	$pay_url = htmlspecialchars(trim($_POST['pay_url']));
	$qq = htmlspecialchars(trim($_POST['qq']));
	$qqq = htmlspecialchars(trim($_POST['qqq']));
	
	$pay_content = htmlspecialchars(trim($_POST['pay_content']));
	
	$game_jianjie = htmlspecialchars(trim($_POST['game_jianjie']));
	$tg_content = htmlspecialchars(trim($_POST['tg_content']));	
	
	if (isset($game_name))
	{
		$sql = "insert into $database.game_list ( gid, game_name, is_recom,game_tag, game_type, is_online, game_img_1, game_img_2,game_img_3, game_img_4,game_img_5, game_img_6, game_img_7, dlq, welfare,awardset,
		pay_api_url,pay_api_key,login_api_url,login_api_key,pay_url,qq,qqq,pay_content,game_jianjie,tg_content) 
		values('$gid','$game_name','$is_recom','$game_tag','$game_type','$is_online','$game_img_1','$game_img_2','$game_img_3','$game_img_4','$game_img_5','$game_img_6','$game_img_7','$dlq','welfare','awardset','$pay_api_url','$pay_api_key','$login_api_url','$login_api_key','$pay_url','$qq','$qqq','$pay_content','$game_jianjie','$tg_content')";
		$result = mysql_query($sql,$conn);
	 	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('添加成功');location.href='game.php';</script>";
	 }

}

//修改游戏
if (($_POST['go']=='game_add') && (!empty($_POST['sid'])) )	
{    
	
		$sid = $_POST["sid"];
		$game_name = htmlspecialchars(trim($_POST['game_name']));
		
		$gid = htmlspecialchars(trim($_POST['gid']));
		$is_recom = htmlspecialchars(trim($_POST['is_recom']));
		$game_tag = htmlspecialchars(trim($_POST['game_tag']));
		$game_type = htmlspecialchars(trim($_POST['game_type']));	
		$is_online = htmlspecialchars(trim($_POST['is_online']));
		
		$game_img_1 = htmlspecialchars(trim($_POST['game_img_1']));
		$game_img_2 = htmlspecialchars(trim($_POST['game_img_2']));
		$game_img_3 = htmlspecialchars(trim($_POST['game_img_3']));
		$game_img_4 = htmlspecialchars(trim($_POST['game_img_4']));
		$game_img_5 = htmlspecialchars(trim($_POST['game_img_5']));
		$game_img_6 = htmlspecialchars(trim($_POST['game_img_6']));	
		$game_img_7 = htmlspecialchars(trim($_POST['game_img_7']));			
		
		$awardset = htmlspecialchars(trim($_POST['awardset']));
		$welfare = htmlspecialchars(trim($_POST['welfare']));
		$dlq = htmlspecialchars(trim($_POST['dlq']));
		$pay_api_url = htmlspecialchars(trim($_POST['pay_api_url']));
		$pay_api_key = htmlspecialchars(trim($_POST['pay_api_key']));
		$login_api_url = htmlspecialchars(trim($_POST['login_api_url']));
		$login_api_key = htmlspecialchars(trim($_POST['login_api_key']));
		
		$pay_url = htmlspecialchars(trim($_POST['pay_url']));
		$qq = htmlspecialchars(trim($_POST['qq']));
		$qqq = htmlspecialchars(trim($_POST['qqq']));
		
		$pay_content = htmlspecialchars(trim($_POST['pay_content']));
	
		$game_jianjie = htmlspecialchars(trim($_POST['game_jianjie']));
		$tg_content = htmlspecialchars(trim($_POST['tg_content']));	
				
		$sql="update $database.game_list set gid='$gid' ,game_name = '$game_name',is_recom='$is_recom', game_tag='$game_tag', game_type='$game_type', is_online='$is_online', game_img_1='$game_img_1', game_img_2='$game_img_2', game_img_3='$game_img_3', game_img_4='$game_img_4',game_img_5='$game_img_5',game_img_6='$game_img_6',game_img_7='$game_img_7',dlq='$dlq',welfare='$welfare',awardset='$awardset',pay_api_url='$pay_api_url',pay_api_key='$pay_api_key',login_api_url='$login_api_url',login_api_key='$login_api_key',pay_url='$pay_url', qq='$qq',qqq='$qqq',pay_content='$pay_content', game_jianjie='$game_jianjie', tg_content='$tg_content'  where id=$sid";
	
		$result = mysql_query($sql,$conn);
		if ($result){
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑成功,请刷新页面收再次查看！');location.href='game.php';</script>";
		}
		else{
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑失败,请检查填写内容');location.href='javascript:history.back()';</script>";
		}
}
//删除游戏
$action = $_GET['action'];
if ($action == 'del_game') 
{
	$sid = $_GET['sid'];
	$sql = "delete from $database.game_list where id = $sid";
	$result = mysql_query($sql,$conn);
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('删除成功');location.href='game.php';</script>";
}

//添加服务器
if ($_POST['go']=='server_add' && $_POST['sid']=='')
{	
	$gid = htmlspecialchars(trim($_POST['gid']));
	$server_id = htmlspecialchars(trim($_POST['server_id']));
	$server_name = htmlspecialchars(trim($_POST['server_name']));
	$start_time = htmlspecialchars(trim($_POST['start_time']));	
	$zuixin = htmlspecialchars(trim($_POST['zuixin']));	
	$login_url = htmlspecialchars(trim($_POST['login_url']));	
	$res_url = htmlspecialchars(trim($_POST['res_url']));	

	if (isset($server_name))
	{
		$sql = "insert into $database.server (gid, server_id, server_name,start_time) values('$gid','$server_id','$server_name','$start_time','$zuixin','$login_url','$res_url')";
		$result = mysql_query($sql,$conn);
	 	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('添加成功');location.href='server.php';</script>";
	 }
}
//修改服务器
if ($_POST['go']=='server_add' && !empty($_POST['sid']))
{
	$sid = $_POST["sid"];
	$gid = htmlspecialchars(trim($_POST['gid']));
	$server_id = htmlspecialchars(trim($_POST['server_id']));
	$server_name = htmlspecialchars(trim($_POST['server_name']));
	$start_time = htmlspecialchars(trim($_POST['start_time']));	
	$zuixin = htmlspecialchars(trim($_POST['zuixin']));	
	$login_url = htmlspecialchars(trim($_POST['login_url']));	
	$res_url = htmlspecialchars(trim($_POST['res_url']));	

	$sql="update $database.server set gid='$gid' ,server_id = '$server_id',server_name='$server_name', start_time='$start_time', zuixin='$zuixin', login_url='$login_url', res_url='$res_url' where id=$sid";
	$result = mysql_query($sql,$conn);
	if ($result){
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('编辑成功,请刷新页面收再次查看！');location.href='server.php';</script>";
	}
	else{
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('编辑失败,请检查填写内容');location.href='javascript:history.back()';</script>";
	}	
	
}
//删除服务器
$action = $_GET['action'];
if ($action == 'del_server') 
{
	$sid = $_GET['sid'];
	$sql = "delete from $database.server where id = $sid";
	$result = mysql_query($sql,$conn);
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('删除成功');location.href='server.php';</script>";
}
//修改游戏
if (($_POST['go']=='user_add') && (!empty($_POST['sid'])) )	
{    
	
		$sid = $_POST["sid"];
		$pass = htmlspecialchars(trim($_POST['pass']));
				
				
		$sql="update $database.user set pass = '$pass' where id=$sid";
	
		$result = mysql_query($sql,$conn);
		if ($result){
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑成功,请刷新页面收再次查看！');location.href='user.php';</script>";
		}
		else{
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
			echo "<script>alert('编辑失败,请检查填写内容');location.href='javascript:history.back()';</script>";
		}
}

//判断是否已登录，否则跳转到登录页面
if (empty($_SESSION['supname']))
{
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<script>alert('请先登录');location.href='index.php';</script>";
} 

$action = $_GET['action'];
if ($action == 'logout') 
{ 
	unset($_SESSION);
	session_destroy();
	echo "<script>location.href='index.php';</script>";
}
//////////////////////////////////////////////////后台更新用户注册数据
if ($action == 'seluser') {
	$dangqian = htmlspecialchars(trim($_GET['date']));
	$query="SELECT count(*) FROM $database.user WHERE `reg_date` like '".$dangqian."%';";
	$result = mysql_query($query,$conn);
	$rowtotle = mysql_fetch_array($result);
	$totle=$rowtotle[0];
	echo "
        <table class='data_list'>
		".$dangqian." 共有    ".$totle."  位用户注册本平台
			<thead>
                <tr>
                    
                    <td width='10%'>ID</td>
                    <td width='10%'>用户名</td>
                    <td >注册时间</td>
                    <td>上次登陆时间</td>
                    <td width='10%'>注册IP</td>
					<td width='5%'>积分</td>
					<td width='5%'>平台钻石</td>
					<td width='10%'>推广人</td>
                </tr>
        	</thead>
            <tbody>
";
               

			   $query="SELECT * FROM $database.user WHERE reg_date like '".$dangqian."%' ORDER BY id DESC";
   
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];

        echo " <tr>    
                   
                    <td>".$id."  </td>
                    <td>".$row['username']." </td>
					<td>".$row['reg_date']." </td>
					<td>".$row['last_time']." </td>
					<td>".$row['reg_ip']." </td>
					<td>".$row['jifen']." </td>
					<td>".$row['rmb']." </td>
					<td>".$row['tg_name']." </td>
					
					
                </tr>";
				
				}			
 echo "
            </tbody>
 		 </table>	";
	

}

//////////////////////////////////////////////////后台更新用户游戏数据
if ($action == 'selgamelog') {
	
	$dangqian = htmlspecialchars(trim($_GET['date']));
 
	$query="SELECT count(*) FROM $database.server_login_log WHERE `login_time` like '".$dangqian."%';";

	$result = mysql_query($query,$conn);
	$rowtotle = mysql_fetch_array($result);
	$totle=$rowtotle[0];
	echo "
        <table class='data_list'>
		".$dangqian." 共有    ".$totle."  人次在本平台游戏
			<thead>
                <tr>
                    <td width='10%'>用户名</td>
                    <td >游戏</td>
                    <td>服务器ID</td>
                    <td width='10%'>进入IP</td>
					<td width='15%'>进入时间</td>

                </tr>
        	</thead>
            <tbody>
";
 
			   $query="SELECT a.* ,b.game_name FROM server_login_log a,game_list b  WHERE  a.gid = b.gid AND a.login_time like '".$dangqian."%' ORDER BY b.id DESC";
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
                $id = $row['id'];

        echo " <tr>    

                    <td>".$row['username']." </td>
					<td>".$row['game_name']." </td>
					<td>".$row['server_id']." </td>
					<td>".$row['login_ip']." </td>
					<td>".$row['login_time']." </td>

                </tr>";
				
				}			
 echo "
            </tbody>
 		 </table>	";
	
 
}



?>