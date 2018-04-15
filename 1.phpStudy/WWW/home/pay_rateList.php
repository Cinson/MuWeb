<div id="tab_140">                                    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="180">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>充值钻石可以到左侧在线商城购买装备</td>						
                <td>兑换游戏比例1钻石=10W元宝</td>
            </tr>
            
        </tbody>
    </table>
    <a id="pay_submit" href='<?php echo $pay_zhanhunurl ?>' target='_blank'>111</a>	
</div>
<div id="tab_130">
    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1:1000 金币</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>
    <a id="pay_submit" href='<?php echo $pay_longzhuurl ?>' target='_blank'></a>	
</div>
<div id="tab_120">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">一次性兑换钻石(1:1000元宝)</th>
              <th width="130">奖励数量</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1-99</td>						
                <td>20%</td>
            </tr>
            <tr class="paytitle">
                <td>100-199</td>						
                <td>25%</td>
            </tr>
            <tr class="paytitle">
                <td>200-299</td>						
                <td>30%</td>
            </tr>
            <tr class="paytitle">
                <td>300-499</td>						
                <td>45%</td>
            </tr>
            <tr class="paytitle">
                <td>500-799</td>						
                <td>60%</td>
            </tr>
            <tr class="paytitle">
                <td>800-999</td>						
                <td>80%</td>
            </tr>
            <tr class="paytitle">
                <td>1000-1999</td>						
                <td>100%</td>
            </tr>
            <tr class="paytitle">
                <td>2000-4999</td>						
                <td>150%</td>
            </tr>
            <tr class="paytitle">
                <td>5000-10000</td>						
                <td>200%</td>
            </tr>
        </tbody>
    </table>	
    <a id="pay_submit" href='<?php echo $pay_zhanhunurl  ?>' target='_blank'></a>	
</div>

<div id="tab_110">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">一次性兑换钻石(1:1000元宝)</th>
              <th width="130">奖励数量</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>50-99</td>						
                <td>20%</td>
            </tr>
            <tr class="paytitle">
                <td>100-199</td>						
                <td>25%</td>
            </tr>
            <tr class="paytitle">
                <td>200-299</td>						
                <td>30%</td>
            </tr>
            <tr class="paytitle">
                <td>300-799</td>						
                <td>40%</td>
            </tr>
            <tr class="paytitle">
                <td>500-999</td>						
                <td>60%</td>
            </tr>
            <tr class="paytitle">
                <td>1000-1999</td>						
                <td>80%</td>
            </tr>
            <tr class="paytitle">
                <td>2000-4999</td>						
                <td>100%</td>
            </tr>
            <tr class="paytitle">
                <td>5000以上</td>						
                <td>140%</td>
            </tr>
        </tbody>
    </table>	
    <a  id="pay_submit" href='<?php echo $pay_zhanlongurl ?>' target='_blank'></a>			
</div>

<div id="tab_99">
    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1：1000</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>	
    <a  id="pay_submit" href='<?php echo $zhongshenurl ?>' target='_blank'></a>
</div>

<div id="tab_88">
    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1：100积分</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>
    <a  id="pay_submit" href='<?php echo $qixongurl ?>' target='_blank'></a>
</div>
<div id="tab_77">		
    <font style="font-size:15px;color:#FF0033;font-weight:bold;">⊙大天使之歌⊙请选择服务器后，前往充值平台！充值后,自动兑换到游戏账号！</font>
    <form method="post" action="../action?action=dts_pay" target="_blank" onsubmit="return pay(this)" style="margin-top:15px;">
        选择服务器：<select name="server_id">
            <option value="">服务器</option>
            <?php
            $sql_server="select * from $database.server where gid='77' order by id desc";
            $result=mysql_query($sql_server,$conn);
            while($row_server=mysql_fetch_array($result))
            {
            echo"<option value='$row_server[server_id]'>$row_server[server_id]区</option>";
            }
            ?>								
            </select>
            <input  type="submit" value="大天使充值" />
    </form>
    <br />
    <br />游戏内开启自动返利活动，请查看“超级返钻”(1:1000元宝)
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">VIP等级</th>
              <th width="130">累计充值</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>VIP2 : </td>						
                <td>50 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP3 : </td>						
                <td>100 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP4 : </td>						
                <td>200 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP5 : </td>						
                <td>300 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP6 : </td>						
                <td>500 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP7 : </td>						
                <td>750 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP8 : </td>						
                <td>1000 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP9 : </td>						
                <td>1200 元</td>
            </tr>
            <tr class="paytitle">
                <td>VIP10 : </td>						
                <td>1500 元</td>
            </tr>
        </tbody>
    </table>						
</div>

<div id="tab_66">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1：1000</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>
    <a  id="pay_submit" href='<?php echo $pay_sanguourl ?>' target='_blank'></a>	
</div>

<div id="tab_55">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">一次性兑换钻石</th>
              <th width="130">奖励数量</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1-49</td>						
                <td>20%</td>
            </tr>
            <tr class="paytitle">
                <td>50-99</td>						
                <td>50%</td>
            </tr>
            <tr class="paytitle">
                <td>100-199</td>						
                <td>100%</td>
            </tr>
            <tr class="paytitle">
                <td>200-299</td>						
                <td>150%</td>
            </tr>
            <tr class="paytitle">
                <td>300-499</td>						
                <td>200%</td>
            </tr>
            <tr class="paytitle">
                <td>500-799</td>						
                <td>250%</td>
            </tr>
            <tr class="paytitle">
                <td>800-999</td>						
                <td>300%</td>
            </tr>
            <tr class="paytitle">
                <td>1000-1999</td>						
                <td>400%</td>
            </tr>
        </tbody>
    </table>
    <a  id="pay_submit" href='<?php echo $pay_shenhunurl ?>' target='_blank'></a>				
</div>


<div id="tab_44">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">一次性兑换钻石</th>
              <th width="130">奖励数量</th>
            </tr>
        </thead>
        <tbody>
        <li><a href='../news_4.html' target='_blank'>点击查询充值礼包奖励</a></li>
            <tr class="paytitle">
                <td>1-99</td>						
                <td>20%</td>
            </tr>
            <tr class="paytitle">
                <td>100-199</td>						
                <td>25%</td>
            </tr>
            <tr class="paytitle">
                <td>200-299</td>						
                <td>30%</td>
            </tr>
            <tr class="paytitle">
                <td>300-499</td>						
                <td>45%</td>
            </tr>
            <tr class="paytitle">
                <td>500-799</td>						
                <td>60%</td>
            </tr>
            <tr class="paytitle">
                <td>800-999</td>						
                <td>80%</td>
            </tr>
            <tr class="paytitle">
                <td>1000-1999</td>						
                <td>100%</td>
            </tr>
            <tr class="paytitle">
                <td>2000-4999</td>						
                <td>150%</td>
            </tr>
            <tr class="paytitle">
                <td>5000-10000</td>						
                <td>200%</td>
            </tr>
        </tbody>
    </table>	
    <a  id="pay_submit" href='<?php echo $pay_9xianurl ?>' target='_blank'></a>
</div>

<div id="tab_33">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">一次性兑换钻石</th>
              <th width="130">奖励数量(首次兑换游戏内额外送200%元宝)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1-99</td>						
                <td>20%</td>
            </tr>
            <tr class="paytitle">
                <td>100-199</td>						
                <td>25%</td>
            </tr>
            <tr class="paytitle">
                <td>200-299</td>						
                <td>30%</td>
            </tr>
            <tr class="paytitle">
                <td>300-499</td>						
                <td>45%</td>
            </tr>
            <tr class="paytitle">
                <td>500-799</td>						
                <td>60%</td>
            </tr>
            <tr class="paytitle">
                <td>800-999</td>						
                <td>80%</td>
            </tr>
            <tr class="paytitle">
                <td>1000-1999</td>						
                <td>100%</td>
            </tr>
            <tr class="paytitle">
                <td>2000-4999</td>						
                <td>150%</td>
            </tr>
            <tr class="paytitle">
                <td>5000-10000</td>						
                <td>200%</td>
            </tr>
        </tbody>
    </table>	
    <a  id="pay_submit" href='<?php echo $pay_xianjianurl ?>' target='_blank'></a>
</div>

<div id="tab_22">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1：1000</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>
    <a  id="pay_submit" href='<?php echo $pay_sanguourl ?>' target='_blank'></a>	
</div>

<div id="tab_11">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1：1000</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>
    <a  id="pay_submit" href='<?php echo $zhongshenurl ?>' target='_blank'></a>	
</div>

 <div id="tab_160">    
    <table class="tab-dataList">
        <thead>						
            <tr class="paytitle">
              <th width="130">充值比例</th>
              <th width="130">奖励</th>
            </tr>
        </thead>
        <tbody>
            <tr class="paytitle">
                <td>1：10000积分</td>						
                <td></td>
            </tr>
            
        </tbody>
    </table>	
    <a  id="pay_submit" href='<?php echo $pay_wuzunurl ?>' target='_blank'></a>
</div>