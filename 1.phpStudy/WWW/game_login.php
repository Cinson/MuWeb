<?php
require 'action.php';
require 'check_login.php';
$openid = $_SESSION['username'];


	$gid = htmlspecialchars($_GET['gid']);
	$server_id = htmlspecialchars($_GET['server_id']);
	$line = htmlspecialchars($_GET['line']);
	
	$result = mysql_query("select * from $database.game_list where gid = '$gid' ",$conn);
	$row = mysql_fetch_array($result);
	$login_api_url = $row['login_api_url'];
	$login_api_key = $row['login_api_key'];
	/*$server_ip = $row['dx'];
	$port = $row['port'];
	$res_url = $row['res_url'];
	*/
	$results = mysql_query("select * from $database.server where server_id = '$server_id' and gid = '$gid' ",$conn);
	$rows = mysql_fetch_array($results);

	
	
	date_default_timezone_set('Asia/Shanghai');
	if (time()< strtotime($rows['start_time']) ){
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('服务器暂未开启！');location.href='javascript:history.back()';</script>";
	}else{
		$time = time();
		$pfopenid = "${openid}${platform}";
		//uid+
		$uid=$uid+$pintaimainid;
		$sign = md5("${pfopenid}${time}${uid}${platform}${server_id}${login_api_key}");
		
		$ip = getIP();
		//记录登录记录
		$sql = "REPLACE INTO server_login_log (username,gid,server_id,login_time,login_ip) VALUES('${openid}', ${gid}, ${server_id}, FROM_UNIXTIME( UNIX_TIMESTAMP()),'${ip}'); ";

		mysql_query($sql);
	
		$url = "${login_api_url}?sid=${server_id}&uid=${uid}&gid=${gid}&pf=${platform}&user=${pfopenid}&time=${time}&sign=${sign}";
		
		$C['login_key'] = "e47b3de8b37d81140ac57f3dd93172e2";

		$data = array(
			'passport'	=> $openid,
			'sid'		=> $server_id,
			'time'		=> $time,
			'key'		=> $C['login_key']
		);
		//ksort($data);
		$data['sign'] = md5(http_build_query($data));
		unset($data['key']);
    	
		$url ="${login_api_url}". '/login?' . http_build_query($data);
 
		
	}











?>

<!doctype html>
<html lang="zh">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $openid."-".$site_name."用户";?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="/css/web_play.css">
</head>

 
<base target="_blank">
<body scroll="no" style="background:#000;">
</div>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/w_header.js"></script>
<script src="/js/ZeroClipboard.js"></script>
<iframe src="<?php echo $url; ?>"  id='mainFrame' name='mainFrame' scrolling='no' width='100%' height='95%' frameborder='0'></iframe>
</body>
</html>