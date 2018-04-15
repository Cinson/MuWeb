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
		$sql="SELECT rmb FROM $database.user WHERE username = '$openid' and rmb > 0 and rmb >= $rmb";
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
			
			$sign = md5("${pfopenid}${time}${platform}${server_id}${payGold}${order}${pay_api_key}");
			
			$url = "${pay_api_url}?sid=${server_id}&userid=${uid}&gid=${game_id}&pf=${platform}&user=${pfopenid}&time=${time}&gold=${payGold}&order=${order}&sign=${sign}";
			
			//die($url);
			$ret = SnsNetwork::makeRequest($url,array(),'get');
			$retmsg=htmlspecialchars($ret['msg']);
			echo $retmsg;
			if($ret["result"]==true)
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
// | 下面的代码是钻石兑换元宝
// .-----------------------------------------------------------------------------------

//兑换元宝开始
 
if ($action == 'welfare') {	
 			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo "<script>alert('请找平台GM的 QQ号领取');window.history.go(-1);</script>";    
}


?>
