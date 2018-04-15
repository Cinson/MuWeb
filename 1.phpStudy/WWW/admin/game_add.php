<?php
require 'check_login.php';

		
//新闻编辑按钮点击后取出相对应的数据
$action = $_GET['action'];
if ($action == 'edit') {
	$sid = $_GET['sid'];
	$sql="select * from $database.game_list where id = $sid ";
	$result = mysql_query($sql,$conn);
	$row = mysql_fetch_array($result);
}
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
                    <th>序列号：</th>
                    <td><input name="sid" type="text" id="id" size="50"  class="inputclass inputtitle" value="<?php echo $sid ?>" disabled="true" /></td>
                </tr>
                <tr>
                    <th>游戏ID：</th>
                    <td><input type="text" name="gid" size="50" value="<?php echo $row['gid'] ?>" /></td> 
                </tr>
                <tr>
                    <th>游戏名称：</th>
                    <td><input type="text" name="game_name" size="50" value="<?php echo $row['game_name'] ?>" /></td> 
                </tr>
                
                <tr>
                    <th>游戏标签：</th>
                    <td><input type="text" name="game_tag" size="50" value="<?php echo $row['game_tag'] ?>" /> </td>
                </tr>
                <tr>
                    <th>游戏类型：</th>
                    <td>
                    <label><input type="radio" name="game_type" value="角色扮演" <?php if($row['game_type']=="角色扮演") echo "checked=checked;" ?> />角色扮演</label>
                    <label><input type="radio" name="game_type" value="战争策略" <?php if($row['game_type']=="战争策略") echo "checked=checked;" ?> />战争策略</label>
                    <label><input type="radio" name="game_type" value="武侠经典" <?php if($row['game_type']=="武侠经典") echo "checked=checked;" ?> />武侠经典</label>
                    <label><input type="radio" name="game_type" value="热血PK" <?php if($row['game_type']=="热血PK") echo "checked=checked;" ?> />热血PK</label>
                    </td>
                </tr>
                
                <tr>
                    <th>Icon图标：</th>
                    <td><input type="text" name="game_img_1" size="50" value="<?php echo $row['game_img_1'] ?>" />*小图30*30</td>
                </tr>
                <tr>
                    <th>Banner大图：</th>
                    <td><input type="text" name="game_img_2" size="50" value="<?php echo $row['game_img_2'] ?>" />*横幅1900*340必须用相对地址</td>
                </tr>
                <tr>
                    <th>游戏精品图：</th>
                    <td><input type="text" name="game_img_3" size="50" value="<?php echo $row['game_img_3'] ?>" />201*216</td>
                </tr>
                <tr>
                    <th>下部基本图：</th>
                    <td><input type="text" name="game_img_4" size="50" value="<?php echo $row['game_img_4'] ?>" />203*123限PNG右空</td>
                </tr>
                <tr>
                    <th>开服图：</th>
                    <td><input type="text" name="game_img_5" size="50" value="<?php echo $row['game_img_5'] ?>" />91*55限PNG</td>
                </tr>				
                <tr>
                    <th>推荐Flash：</th>
                    <td><input type="text" name="game_img_6" size="50" value="<?php echo $row['game_img_6'] ?>" />300*355限Flash</td>
                </tr>				
                <tr>
                    <th>游戏中心图：</th>
                    <td><input type="text" name="game_img_7" size="50" value="<?php echo $row['game_img_7'] ?>" />400*280 </td>
                </tr>	
                <tr>
                    <th>单页地址：</th>
                    <td><input type="text" name="danye" size="50" value="<?php echo $row['danye'] ?>" />游戏单页(正常情况请留空)</td>
                </tr>					
                <tr>
                    <th>状态：</th>
                    <td>
                    <label><input type="checkbox" name="is_recom" value="1" <?php if($row['is_recom']==1) echo "checked=checked;" ?> />推荐</label>&nbsp;&nbsp;
                    <label><input type="checkbox" name="is_online" value="1" <?php if($row['is_online']==1) echo "checked=checked;" ?> />运营中</label> 
                    </td> 
                </tr>
                <tr>
                    <th>兑换比例：</th>
                    <td><input type="text" name="awardset"     size="50" value="<?php echo $row['awardset'] ?>" /></td>
                </tr>
                <tr>
                    <th>新手福利：</th>
                    <td><input type="text" name="welfare" disabled="true"    size="50" value="<?php echo $row['welfare'] ?>" /></td>
                </tr>				
                <tr>
                    <th>登陆器地址：</th>
                    <td><input type="text" name="dlq" size="50" value="<?php echo $row['dlq'] ?>" /></td>
                </tr>
                <tr>
                    <th>充值APIURL：</th>
                    <td><input type="text" name="pay_api_url" size="50" value="<?php echo $row['pay_api_url'] ?>" />*这里由技术设置，不可乱动</td>
                </tr>
                <tr>
                    <th>充值APIKey：</th>
                    <td><input type="text" name="pay_api_key" size="50" value="<?php echo $row['pay_api_key'] ?>" />*这里由技术设置，不可乱动</td>
                </tr>
                 <tr>
                    <th>登录APIURL：</th>
                    <td><input type="text" name="login_api_url" size="50" value="<?php echo $row['login_api_url'] ?>" />*这里由技术设置，不可乱动</td>
                </tr>
                <tr>
                    <th>登录APIKey：</th>
                    <td><input type="text" name="login_api_key" size="50" value="<?php echo $row['login_api_key'] ?>" />*这里由技术设置，不可乱动</td>
                </tr>
                 <tr>
                    <th>充值地址：</th>
                    <td><input type="text" name="pay_url" size="50" value="<?php echo $row['pay_url'] ?>" /></td>
                </tr>
                 <tr>
                    <th>QQ：</th>
                    <td><input type="text" name="qq" size="50" value="<?php echo $row['qq'] ?>" /></td>
                </tr>
                <tr>
                    <th>QQ群：</th>
                    <td><input type="text" name="qqq" size="50" value="<?php echo $row['qqq'] ?>" /></td>
                </tr>
                
                <tr>
                    <th>充值说明：</th>
                    <td><textarea type="text" name="pay_content" cols="50" rows="8"><?php echo $row['pay_content'] ?></textarea></td>
                </tr>
                <tr>
                    <th>游戏介绍：</th>
                    <td><textarea type="text" name="game_jianjie" cols="50" rows="8"><?php echo $row['game_jianjie'] ?></textarea></td>
                </tr>
                <tr>
                    <th>推广语：</th>
                    <td><textarea type="text" name="tg_content" cols="50" rows="8"><?php echo $row['tg_content'] ?></textarea></td>
                </tr>					
                <tr>
                    <td height="50" colspan="2" align="center" valign="middle">
                        <INPUT type="hidden" value="game_add" name="go"> GM除*号处不要动外，别的自已根据个平台实际填写
                        <input type="submit" class="btn80_1" name="Submit" id="submit" style="height:30px;width:100px;" value="确认提交" />
                    </td>
                </tr>            
            </table>
        </form>
    </div>
</body>
</html>