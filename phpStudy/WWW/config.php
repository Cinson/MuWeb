<?php
//date_default_timezone_set('Asia/Shanghai');
if(is_file($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php')){
    require_once($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php');
	//echo $_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php';
	
} 
require_once "/lib/mysql.class.php";




// 注意文件路径
$hxlpintai_id=1;  //平台信息在数据库的ID
$pintaimainid= 20000;

$dailiqq = "";
$rmb_reg =0; 
$protocol = '<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id=\'cnzz_stat_icon_1256594488\'%3E%3C/span%3E%3Cscript src=\'" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256594488%26show%3Dpic\' type=\'text/javascript\'%3E%3C/script%3E"));</script>';
//CNZZ
//数据库配置信息
$db_server="localhost";
$db_name="root";
$db_password="root";
$database="web_wan";


$conn = mysql_connect($db_server,$db_name,$db_password) or die("could not connect mysql");
mysql_select_db($database,$conn);
mysql_query("SET NAMES utf8"); 

/*
$conn = mysqli_connect( 
 $db_server, // The host to connect to 连接MySQL地址 
 $db_name,  //The user to connect as 连接MySQL用户名  
 $db_password, //The password to use 连接MySQL密码 
 $database);  // The default database to query 连接数据库名称  
 
if (!$conn) { 
  printf("Can't connect to MySQL Server. Errorcode: %s ", mysqli_connect_error()); 
  exit; 
}
*/

//取出平台相关信息
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
$supname = $row_pt['supname'];       
$suppass = $row_pt['suppass'];  
$qdm = $row_pt['qdm'];
$logo_pic = $row_pt['logo_pic'];  
$guanjianzi = $row_pt['guanjianzi'];  	
$miaoxu = $row_pt['miaoxu']; 	
$dlq = "http://127.0.0.1/dlq.zip";
?>
