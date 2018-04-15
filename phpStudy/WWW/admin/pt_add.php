<?php
require 'check_login.php';

		
//新闻编辑按钮点击后取出相对应的数据

 

 
 
 
 
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>游戏列表</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<div class="main">
        <form action="action.php" method="post" name="Form1" onSubmit="return check()">
            <input type="hidden" value="<?php echo $sid ?>" name="sid">
            <table class="tab_form">
                 
                <tr>
                    <th>平台ID：</th>
                    <td><input name="platform" type="text" id="id" size="50"  class="inputclass inputtitle" value="<?php echo $platform; ?>" disabled="true" /></td>
                </tr>	
                <tr>
                    <th>平台名字：</th>
                    <td><input type="text" name="site_name" size="50" value="<?php echo $site_name; ?>" /></td> 
                </tr>
                <tr>
                    <th>网站域名：</th>
                    <td><input type="text" name="web_site" size="50" value="<?php echo $web_site; ?>" /></td> 
                </tr>	
                <tr>
                    <th>备案号：</th>
                    <td><input type="text" name="Bei_No" size="50" value="<?php echo $Bei_No; ?>" /></td> 
                </tr>				
                <tr>
                    <th>充值平台地址：</th>
                    <td><input type="text" name="pay_url" size="50" value="<?php echo $pay_url; ?>" /></td> 
                </tr>	
                <tr>
                    <th>GM客服QQ：</th>
                    <td><input type="text" name="qq" size="50" value="<?php echo $qq; ?>" /></td> 
                </tr>	
                <tr>
                    <th>GM客服QQ群：</th>
                    <td><input type="text" name="qqqun" size="50" value="<?php echo $qqqun; ?>" /></td> 
                </tr>	
                <tr>
                    <th>Q群链接</th>
                    <td><input type="text" name="qdm" size="50" value="<?php echo $qdm; ?>" /></td> 
                </tr>	
                <tr>
                    <th>网站logo</th>
                    <td><input type="text" name="logo_pic" size="50" value="<?php echo $logo_pic; ?>" /></td> 
                </tr>
                <tr>
                    <th>后台帐号：</th>
                    <td><input name="supname" type="text" id="id" size="50"  class="inputclass inputtitle" value="<?php echo $supname; ?>" disabled="true" /></td>
                </tr>	
                <tr>
                    <th>后台密码：</th>
                     <td><input type="text" name="suppass" size="50" value="<?php echo $suppass; ?>" /></td> 
                </tr>	
                <tr>
                    <th>关键字：</th>
                     <td><input type="text" name="guanjianzi" size="50" value="<?php echo $guanjianzi; ?>" />用于SEO，请用英文逗号分隔</td> 
                </tr>	
                <tr>
                    <th>网站描述：</th>
                     <td><input type="text" name="miaoxu" size="50" value="<?php echo $miaoxu; ?>" />用于SEO，网站描述</td> 
                </tr>	









				
                <tr>
                    <td height="50" colspan="2" align="center" valign="middle">
                        <INPUT type="hidden" value="pintai" name="go"> 系统配置文件，请谨慎修改，不懂请联系技术QQ：79117112
                        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
                    </td>
                </tr>            
            </table>
        </form>
    </div>
</body>
</html>