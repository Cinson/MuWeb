<?php
require '../action.php';
require '../check_login.php';
require 'home_top.php';
?>

		<div class="fl user-right">
				  <form action="../action.php" method="post" name="Form1" onSubmit="return check()">
            <input type="hidden" value="<?php echo $touxiang ?>" name="touxiang">
                <div class="user-title">
修改头像<span class="common-title-ico"></span>	<button type="submit" name="Submit" id="submit" class="b-submit">确认提交</button>
				</div>
      
        <div class="form-group">
                                            <div class="col-lg-6">
					<label><input type="radio" name="touxiang" value="../images/tx1.jpg" <?php if($row['touxiang']=="../images/tx1.jpg") echo "checked=checked;" ?> /><img src="../images/tx1.jpg"  width="120" height="120"></label>
					<label><input type="radio" name="touxiang" value="../images/tx2.jpg" <?php if($row['touxiang']=="../images/tx2.jpg") echo "checked=checked;" ?> /><img src="../images/tx2.jpg" width="120" height="120"></label>
					<label><input type="radio" name="touxiang" value="../images/tx3.jpg" <?php if($row['touxiang']=="../images/tx3.jpg") echo "checked=checked;" ?> /><img src="../images/tx3.jpg" width="120" height="120"></label>    
					<label><input type="radio" name="touxiang" value="../images/tx4.jpg" <?php if($row['touxiang']=="../images/tx4.jpg") echo "checked=checked;" ?> /><img src="../images/tx4.jpg" width="120" height="120"></label>    
					<label><input type="radio" name="touxiang" value="../images/tx5.jpg" <?php if($row['touxiang']=="../images/tx5.jpg") echo "checked=checked;" ?> /><img src="../images/tx5.jpg" width="120" height="120"></label>    <p>             
					<label><input type="radio" name="touxiang" value="../images/tx6.jpg" <?php if($row['touxiang']=="../images/tx6.jpg") echo "checked=checked;" ?> /><img src="../images/tx6.jpg" width="120" height="120"></label>        
					<label><input type="radio" name="touxiang" value="../images/tx7.jpg" <?php if($row['touxiang']=="../images/tx7.jpg") echo "checked=checked;" ?> /><img src="../images/tx7.jpg" width="120" height="120"></label>       
					<label><input type="radio" name="touxiang" value="../images/tx8.jpg" <?php if($row['touxiang']=="../images/tx8.jpg") echo "checked=checked;" ?> /><img src="../images/tx8.jpg" width="120" height="120"></label>       
					<label><input type="radio" name="touxiang" value="../images/tx9.jpg" <?php if($row['touxiang']=="../images/tx9.jpg") echo "checked=checked;" ?> /><img src="../images/tx9.jpg" width="120" height="120"></label>           
					<label><input type="radio" name="touxiang" value="../images/tx10.jpg" <?php if($row['touxiang']=="../images/tx10.jpg") echo "checked=checked;" ?> /><img src="../images/tx10.jpg" width="120" height="120"></label>  <p>       
					<label><input type="radio" name="touxiang" value="../images/tx11.jpg" <?php if($row['touxiang']=="../images/tx11.jpg") echo "checked=checked;" ?> /><img src="../images/tx11.jpg" width="120" height="120"></label>       
					<label><input type="radio" name="touxiang" value="../images/tx12.jpg" <?php if($row['touxiang']=="../images/tx12.jpg") echo "checked=checked;" ?> /><img src="../images/tx12.jpg" width="120" height="120"></label>      
					<label><input type="radio" name="touxiang" value="../images/tx13.jpg" <?php if($row['touxiang']=="../images/tx13.jpg") echo "checked=checked;" ?> /><img src="../images/tx13.jpg" width="120" height="120"></label>       
					<label><input type="radio" name="touxiang" value="../images/tx14.jpg" <?php if($row['touxiang']=="../images/tx14.jpg") echo "checked=checked;" ?> /><img src="../images/tx14.jpg" width="120" height="120"></label>           
					<label><input type="radio" name="touxiang" value="../images/tx15.jpg" <?php if($row['touxiang']=="../images/tx15.jpg") echo "checked=checked;" ?> /><img src="../images/tx15.jpg" width="120" height="120"></label>   					
                        <INPUT type="hidden" value="touxiang" name="go">
											
					</div>   </div>   </div>
                                          </div></div>