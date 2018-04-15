<?php
session_start();
error_reporting(E_ALL^E_NOTICE^E_WARNING);
require_once ("include/SnsNetwork.php");
include 'action.php';


// .-----------------------------------------------------------------------------------
// | 下面的代码是钻石兑换元宝
// .-----------------------------------------------------------------------------------

//兑换元宝开始
$action = htmlspecialchars($_GET['action']);
if ($action == 'yb') {	
    $openid = $_SESSION['username']; 
    $rmb = round(htmlspecialchars($_POST['change_yb']));
	$server_id = htmlspecialchars($_POST['server_id']);
	$game_id= htmlspecialchars($_POST['game_id']);

	$a = $_SESSION['sscode'];
	$sscode = mt_rand(0,1000000);
	$_SESSION['sscode'] = $sscode;
	
	
	if($_POST['mimacode'] == $a ){
		//判断是否选择游戏
		if (empty($server_id)){
			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo "<script>alert('请选择游戏');location.href='javascript:history.back()';</script>";
			exit();
		}
		//判断输入数字是否合法
		if (!is_numeric( $rmb )){
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script>alert('输入的参数不合法');location.href='javascript:history.back()';</script>";
				exit();
		}
		//判断输入数字是否合法
		if ($rmb <= 0  ){
			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo "<script>alert('请输入正确的兑换数量');location.href='javascript:history.back()';</script>";
			exit();
		}
		$sql="SELECT rmb,id FROM $database.user WHERE username = '$openid' and rmb > 0 and rmb >= $rmb";
		$result=mysql_query($sql,$conn);
		$row=mysql_fetch_array($result);
		if (empty($row)){
			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo "<script>alert('要兑换的钻石不能大于现有数量');location.href='javascript:history.back()';</script>";
			exit();
		}
		
		//查询server表的相关信息
		$sql_sid = "select pay_api_url,pay_api_key,awardset from $database.game_list where gid = '$game_id'";
		$result_sid = mysql_query($sql_sid,$conn);
		$row_sid    = mysql_fetch_array($result_sid);		
		$pay_api_url = $row_sid['pay_api_url'];
		$pay_api_key = $row_sid['pay_api_key'];
		$awardset = $row_sid['awardset'];
		//Give id为满足某些游戏加入用户ID做识别
		$uid=$row['id']+$pintaimainid;
		
		
		//判断输入正确后开始判断游戏
		if ($row['rmb'] > 0 && $rmb > 0 && $row['rmb'] >= $rmb)
		{
			$payGold = 0;
			$bl = 0;
			$fl = 0;
			$ratioArray = explode("$$",$awardset);			
			for($index=0;$index<count($ratioArray);$index++) 
			{ 
				$al = explode(":",$ratioArray[$index]);
				if($index == 0)
				{
					$bl  = $al[1];
				}	
				else if((int)$rmb >= (int)$al[0]) 
				{
					$fl = $al[1];
				}
			} 
			$awardset=(int)$awardset;
			$payGold = (int)($rmb * $awardset);
				
			$time = time();
			
			//生成订单
			$sql="INSERT INTO  $database.exchange_log (username, rmb, order_yb, game_id, server_id, STATUS )VALUES('${openid}',${rmb},${payGold},${game_id},${server_id},1 )"; 
			
			mysql_query($sql,$conn);
			$result=mysql_query( "SELECT LAST_INSERT_ID();", $conn);
			$row = mysql_fetch_array($result);
			$order = $row[0]."_".$platform;
			
			$pfopenid = "${openid}${platform}";
			
			$sign = md5("${pfopenid}${time}${uid}${platform}${server_id}${payGold}${order}${pay_api_key}");
			
			$url = "${pay_api_url}?sid=${server_id}&uid=${uid}&gid=${game_id}&pf=${platform}&user=${pfopenid}&time=${time}&gold=${payGold}&order=${order}&sign=${sign}";
			$C['recharge_key'] = "bb74afdf84a84a1c6ff3b5bb05b93eae";
			$data = array(
			'passport'	=> $openid,
			'sid'		=> $server_id,
			'money'		=> $payGold,
			'billno'	=> $order,
			'time'		=> $time,
			'key'		=> $C['recharge_key']
		);
		$data['sign'] = md5(http_build_query($data));
		unset($data['key']);
		$url =  $pay_api_url.'/pay?' . http_build_query($data);
			//die($url);
			//$ret = SnsNetwork::makeRequest($url,array(),'get');
			//$retmsg=htmlspecialchars($ret['msg']);
			$recharge_result  = file_get_contents($url);
			$recharge_result = json_decode($recharge_result, true);
			//exit($recharge_result["status"]."ff".$url);
			if($recharge_result["status"]==1)
			{
				
				// 扣钻石
				$sql="update $database.user set  rmb = rmb-'$rmb' where username ='$openid'"; 
				mysql_query($sql,$conn);
				
				// 更新 订单状态
				$sql="update  $database.exchange_log set STATUS =2 where order_id =$order"; 
				mysql_query($sql,$conn);
				
				
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script>alert('兑换成功！');location.href='/home/my_exchange.php';</script>";
			}
			else
			{
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script>alert('兑换失败！');location.href='/home/my_exchange.php';</script>";
			}
		}
		else
		{
			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo "<script>alert('您的钻石不够了,赶快去充值吧！');location.href='/home/pay.php';</script>";
		}
	}else{
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "请不要刷新本页面或重复提交表单！";
	}
}


// .-----------------------------------------------------------------------------------
// | 下面的代码是新手福利元宝$uid   $_SESSION['username']

// .-----------------------------------------------------------------------------------

// 福利开始
 
if ($action == 'welfare') {	
 
	$server_id = htmlspecialchars($_POST['server_id']);
	$game_id= htmlspecialchars($_POST['game_id']);
	// echo $server_id."hxl".$game_id;
	
	if ( $game_id == "" || $server_id == "") {
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('亲，你游戏和区服都不选择，枉费我准备这么多礼物送你~_~');window.history.go(-1);</script>"; 
		exit();
	}
 
////////////////////////查是否领过了	
	$sql="SELECT * FROM $database.welfare WHERE user_name = '".$_SESSION['username']."' and gid=".$game_id." and game_server_id=".$server_id.";";
	$result=mysql_query($sql,$conn);
	$row=mysql_fetch_array($result);
	if (!empty($row)) {
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('亲，你已经领过这款游戏的新手福利了~_~');window.history.go(-1);</script>"; 
		exit();		
	}
////////////////////////查福利是多少钱
 
	$sql_sid="SELECT welfare,pay_api_url,pay_api_key FROM $database.game_list WHERE gid=".$game_id.";";
	$result_sid=mysql_query($sql_sid,$conn);
	$row_sid=mysql_fetch_array($result_sid);	
	$payGold=$row_sid['welfare'];
	$pay_api_url = $row_sid['pay_api_url'];
	$pay_api_key = $row_sid['pay_api_key'];	
	
	if (empty($payGold)) {
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('亲，本款游戏暂无新手福利，请联系平台客服~_~');window.history.go(-1);</script>"; 
		exit();		
	}	
	
 
//////echo $payGold.$pay_api_key.$pay_api_url;	
//发元宝
 	//Give id为满足某些游戏加入用户ID做识别
	$uid = $uid+$pintaimainid;		
	$username =  $_SESSION['username'];
	$openid =  $_SESSION['username'];


	
	if ($username != "" and $payGold != "" and $server_id != "" and $game_id != "")
	{

 
		$pfopenid = "${username}${platform}";
		
			$time = time();
			$order = $time;
			$sign = md5("${pfopenid}${time}${uid}${platform}${server_id}${payGold}${order}${pay_api_key}");
			
			$url = "${pay_api_url}?sid=${server_id}&uid=${uid}&gid=${game_id}&pf=${platform}&user=${pfopenid}&time=${time}&gold=${payGold}&order=${order}&sign=${sign}";
			
			//die($url);
			// $ret = SnsNetwork::makeRequest($url,array(),'get');
			$C['recharge_key'] = "bb74afdf84a84a1c6ff3b5bb05b93eae";
			$data = array(
			'passport'	=> $openid,
			'sid'		=> $server_id,
			'money'		=> $payGold,
			'billno'	=> $order,
			'time'		=> $time,
			'key'		=> $C['recharge_key']
		);
		$data['sign'] = md5(http_build_query($data));
		unset($data['key']);
		$url =  $pay_api_url.'/pay?' . http_build_query($data);
			//die($url);
			//$ret = SnsNetwork::makeRequest($url,array(),'get');
			//$retmsg=htmlspecialchars($ret['msg']);
			$recharge_result  = file_get_contents($url);
			$recharge_result = json_decode($recharge_result, true);
			//exit($recharge_result["status"]."ff".$url);
			if($recharge_result["status"]==1)

			{
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
				echo "<script>alert('恭喜你获得 ".$payGold." 游戏币，快进游戏看看吧！');location.href='javascript:history.back()';</script>";
				$sql = "insert into $database.welfare( user_name, gid, game_server_id, status, log_time) values('$username','$game_id','$server_id','',now())";
				//die($sql);
				$result = mysql_query($sql,$conn);					
				
			}
			else 
			{
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
				echo "<script>alert('发送失败');location.href='javascript:history.back()';</script>";
			}
	 	
	 }else{
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		echo "<script>alert('获得信息不完整！');location.href='javascript:history.back()';</script>"; 
	 }
			
}


?>
