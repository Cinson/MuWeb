<?php
require '../check_login.php';
require '../top.php';
require 'home_top.php';

?>	 
		<div class="fl user-right">
	<div class="side-bg"></div>
        <div class="main">
        	<div class="content">            
            	<div class="user-form">
                	<div class="user-head2"><h2>修改密码</h2></div>
                    <form class="find4_form" method="post" name="myform" id="myform" action="../action.php?action=change_pwd" >
                    	<input type="hidden" value="change_pwd" name="go">
                        <div class="op-tip">温馨提示：密码修改成功，请您用新密码重新登录！</div>
                        <ul class="user-form-ul">
                            <li>
                                <span>原始密码：</span><input  type="password" name="password" class="t-input" size="20" id="password" /><i></i>
                            </li>
                            <li>
                                <span>修改密码：</span><input type="password" name="new_psw" id="new_psw" class="t-input" size="20" ><i></i>
                            </li>
                            <li>
                                <span>确认密码：</span><input type="password" name="conf_psw" id="conf_psw" class="t-input" size="20"><i></i>
                            </li>
                            <li class="bar">
                                <span>&nbsp;</span>
                                <button type="submit" class="b-submit" onclick="return changepsw();" >确认提交</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <script type="text/javascript">toPwdCheck();</script>
                <!--end user-forem-->
            </div>
        </div>
    </div>
</div></div>

