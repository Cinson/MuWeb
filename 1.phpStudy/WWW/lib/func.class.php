<?php
//====================================================
//		FileName: func.class.php
//		Summary:  系统函数配置
//====================================================

if(!defined('CORE'))exit("error!"); 
//当前时区
date_default_timezone_set('asia/shanghai');


//提示信息
$lang_cn =array(
	"rabc_error"=>"<script>alert(\"权限不足!\");window.location=\"index.php?action=admin\";</script>",
	"rabc_is_login"=>"<script>window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_login_ok"=>"<script>window.location=\"index.php?action=admin\";</script>",
	"rabc_login_error"=>"<script>alert(\"用户密码错误!\");window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_logout"=>"<script>alert(\"安全退出!\");window.location=\"index.php?action=user&do=login\";</script>",
	"validate"=>"<script>alert(\"内容不全,返回填写!\");history.back(-1);</script>"
);
	
//进度条显示	
	function showjindu($msg){
		$tpl=<<<TPL
			<style>
				.ui-loading-wrap {
				margin-top:30%;
				display: -webkit-box;
				-webkit-box-pack: center;
				-webkit-box-align: center;
				text-align: center;
				height: 40px;
				}	


				.ui-loading {
				width: 20px;
				height: 20px;
				display: block;
				background: url(./img/loading_sprite.png);
				-webkit-background-size: auto 20px;
				}
				.ui-loading{ -webkit-animation: rotate 1s steps(12) infinite; 
				-o-animation: rotate 1s steps(12) infinite; 
				}

				@-webkit-keyframes rotate{from{ background-position: 0 0; }
					to{ background-position: -240px 0; }
				}
				@-webkit-keyframes rotate2{from{ background-position: 0 0; }
					to{ background-position: -444px 0; }
				}
				@-webkit-keyframes rotate3{0%{ -webkit-transform: rotate(0); }
				100%{ -webkit-transform: rotate(360deg); }
				}
				@-o-keyframes rotate{from{ background-position: 0 0; }
					to{ background-position: -240px 0; }
				}
				@-o-keyframes rotate2{from{ background-position: 0 0; }
					to{ background-position: -444px 0; }
				}
				@-o-keyframes rotate3{0%{ -webkit-transform: rotate(0); }
				100%{ -webkit-transform: rotate(360deg); }
				}			
			</style>
			
			<div class="ui-loading-wrap">
				<p> $msg </p>
				<i class="ui-loading"> </i>
			</div>
TPL;
		echo $tpl;		
		return true;
	}
//安全验证
function _RunMagicQuotes(&$svar){
	if(!get_magic_quotes_gpc())	{
		if( is_array($svar) ){
			foreach($svar as $_k => $_v) $svar[$_k] = _RunMagicQuotes($_v);
		}else{
			$svar = addslashes($svar);
		}
	}
	return $svar;
}

//SMARTY模版配置
function smarty_cfg($self){
	global $cfg;
	global $user_list;
	global $css;
	$self->template_dir='./tpl';
	$self->cache_dir='./tmp/cache';
	$self->compile_dir	='./tmp/compile';
	$self->assign('cfg',$cfg);
	$self->assign('user_list',$user_list);
	$self->assign('css',$css);
}

//安全过滤
foreach(Array('_GET','_POST','_COOKIE') as $_request){
	foreach($$_request as $_k => $_v) ${$_k} = _RunMagicQuotes($_v);
}

//dwz_ajax_succee
function success($msg,$url){
	$msg = $msg ? $msg : "操作成功!";
	$val = "<script>alert('".$msg."');window.location='".$url."';</script>";
	return $val;
}

//dwz_ajax_error
function error($msg,$url){
	$msg = $msg ? $msg : "操作错误!";
	$val = "<script>alert('".$msg."');javascript:history.back();</script>";
	return $val;
}


/*打印友好的数组形式*/
function dump($array){
	echo "<pre>";
	print_r($array);
	echo "<pre>";
}

//中文截取
function cnString($text, $length){
	if(strlen($text) <= $length){
		return $text;
	}
	$str = substr($text, 0, $length) . chr(0) ; 
	return $str;
}


//数组转化为select
function select($arr,$name,$self="",$cn_name="选择",$class="combox"){
	$slt .= "<select name=\"".$name."\" class=\"input ".$class."\" title=\"此项目必填\" validate=\"required:true\">";
	$slt .= "<option value=\"\" selected=\"selected\">".$cn_name."</option>";
	foreach($arr as $key=>$val){
		if($key==$self){
		$slt .= "    <option value=\"".$key."\" selected=\"selected\">".$val."</option>";
		}else{
		$slt .= "    <option value=\"".$key."\">".$val."</option>";
		}
	}
    $slt .= "</select>";
	return $slt;
}


//读取目录所有的文件名
function myreaddir($dir) {
	$handle=opendir($dir);
	$i=0;
	while($file=readdir($handle)){
		if ($file!="." && $file!=".." && !is_dir($file)){
		$list[$i]=$file;
		$i=$i+1;
		}
	}
	closedir($handle);
	rsort($list);
	return $list;
}

//验证内容
function Ifvalidate($arr){
	global $lang_cn;
	foreach($arr as $val){
		if(!$val){exit($lang_cn['validate']);}
	}
}

//arr=>json
function my_json_encode($phparr){
    if(function_exists("json_encode")){
      return json_encode($phparr);
    }else{
      require_once './include/json.php';
      $json = new Services_JSON;
      return $json->encode($phparr);
    }
}

//json=>arr
function json_to_array($web){
	$arr=array();
	foreach($web as $k=>$w){
	if(is_object($w)) $arr[$k]=json_to_array($w);  //判断类型是不是object
	else $arr[$k]=$w;
	}
	return $arr;
}

//数组转化为type循环th名称
function type_th($arr){
	foreach($arr as $key=>$val){
		$slt .= "<th>".$val."</th>\n";
	}
	return $slt;
}

//检测用户是否登录
function isLogin(){
	if(!empty($_SESSION['isLogin']))
		return 1;	
	else
		return 0;  
}


/* 
函数名称：inject_check() 
函数作用：检测提交的值是不是含有SQL注射的字符，防止注射，保护服务器安全 
参　　数：$StrFiltValue: 提交的变量 $i检查1＝GET 2＝POST 3=COOKIE	
if(is_array($StrFiltValue))
	{
		$StrFiltValue=implode($StrFiltValue);
	}  

返 回 值：返回检测结果，ture or false 
*/ 
function inject_check($StrFiltValue,$i=2){  
//get拦截规则
$getfilter = "\\<.+javascript:window\\[.{1}\\\\x|<.*=(&#\\d+?;?)+?>|<.*(data|src)=data:text\\/html.*>|\\b(alert\\(|confirm\\(|expression\\(|prompt\\(|benchmark\s*?\(.*\)|sleep\s*?\(.*\)|\\b(group_)?concat[\\s\\/\\*]*?\\([^\\)]+?\\)|\bcase[\s\/\*]*?when[\s\/\*]*?\([^\)]+?\)|load_file\s*?\\()|<[a-z]+?\\b[^>]*?\\bon([a-z]{4,})\s*?=|^\\+\\/v(8|9)|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)|UPDATE\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)@{0,2}(\\(.+\\)|\\s+?.+?\\s+?|(`|'|\").*?(`|'|\"))FROM(\\(.+\\)|\\s+?.+?|(`|'|\").*?(`|'|\"))|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
//post拦截规则
$postfilter = "<.*=(&#\\d+?;?)+?>|<.*data=data:text\\/html.*>|\\b(alert\\(|confirm\\(|expression\\(|prompt\\(|benchmark\s*?\(.*\)|sleep\s*?\(.*\)|\\b(group_)?concat[\\s\\/\\*]*?\\([^\\)]+?\\)|\bcase[\s\/\*]*?when[\s\/\*]*?\([^\)]+?\)|load_file\s*?\\()|<[^>]*?\\b(onerror|onmousemove|onload|onclick|onmouseover)\\b|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)|UPDATE\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)(\\(.+\\)|\\s+?.+?\\s+?|(`|'|\").*?(`|'|\"))FROM(\\(.+\\)|\\s+?.+?|(`|'|\").*?(`|'|\"))|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
//cookie拦截规则
$cookiefilter = "benchmark\s*?\(.*\)|sleep\s*?\(.*\)|load_file\s*?\\(|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)|UPDATE\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)@{0,2}(\\(.+\\)|\\s+?.+?\\s+?|(`|'|\").*?(`|'|\"))FROM(\\(.+\\)|\\s+?.+?|(`|'|\").*?(`|'|\"))|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";

	switch($i){
		case 1:
			if (preg_match("/".$getfilter."/is",$StrFiltValue)==1){        
				return false;
			}else{      
				return true;
			}
			break;
		case 2:
			if (preg_match("/".$postfilter."/is",$StrFiltValue)==1){        
				return false;
			}else{      
				return true;
			}
			break;		
		default:
			if (preg_match("/".$cookiefilter."/is",$StrFiltValue)==1){        
				return false;
			}else{      
				return true;
			}	
	}
}		

?>