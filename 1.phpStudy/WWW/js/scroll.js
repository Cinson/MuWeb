suspendcode="<div id='lovexin1' style='width: 290px; height: 184px; z-index: 10; left: 10px; top: 450px; position: absolute; text-align: right;'><img src='images/ad/close.gif' onclick='javascript:window.hide()' width='100' height='14' border='0' alt='关闭对联广告' /><a href='http://wpa.qq.com/msgrd?v=3&uin=6298569&site=qq&menu=yes' target='_blank'><img src='images/ad/left1.png' width='290' height='170' border='0' /></a></div>"
document.write(suspendcode);

suspendcode="<div id='lovexin2' style='width: 290px; height: 184px; z-index: 10; right: 10px; top: 450px; position: absolute; text-align: right;'><img src='images/ad/close.gif' onclick='javascript:window.hide()' width='100' height='14' border='0' alt='关闭对联广告' /><a href='http://wpa.qq.com/msgrd?v=3&uin=6298569&site=qq&menu=yes' target='_blank'><img src='images/ad/left1.png' width='290' height='170' border='0' /></a></div>"
document.write(suspendcode);

//flash格式调用方法
//<EMBED src='flash.swf' quality=high  WIDTH=100 HEIGHT=300 TYPE='application/x-shockwave-flash' id=ad wmode=opaque></EMBED>

lastScrollY=0;
function heartBeat(){
diffY=document.body.scrollTop;
percent=.3*(diffY-lastScrollY);
if(percent>0)percent=Math.ceil(percent);
else percent=Math.floor(percent);
document.all.lovexin1.style.pixelTop+=percent;
document.all.lovexin2.style.pixelTop+=percent;
lastScrollY=lastScrollY+percent;
}
function hide()
{
lovexin1.style.visibility="hidden"; 
lovexin2.style.visibility="hidden";
}
window.setInterval("heartBeat()",1);
