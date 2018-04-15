var P8_Marquee;
(function($){

P8_Marquee = function(options){

this.options = {
	container: $(options.container),
	content: $(options.content),
	direction: options.direction || 'up',
	play_timeout: options.play_timeout || 1,
	stop_timeout: options.stop_timeout || 0,
	scroll: options.scroll || 0
};

this.container = $(this.options.container);
this.content = $(this.options.content);
this.direction = this.options.direction;

var c_width = this.container.width(),
	c_height = this.container.height(),
	width = this.content.width(),
	height = this.content.height();
switch(this.direction){
case 'up': case 'down': if(height < c_height) return;
case 'left': case 'right': if(width < c_width) return;
}

this._content = this.content.clone(true).attr('id', '').insertAfter(this.content);
this.interval = null;
this.counter = 0;
this.offset = 0;
this.playing = false;
this._timeout = null;

var _this = this;

this.container.mouseover(function(){
	_this.stop();
});

this.container.mouseout(function(){
	_this.play();
});


this.stop = function(){
	clearInterval(this.interval);
	if(this._timeout) clearTimeout(this._timeout);
};

this.play = function(){
	if(this.interval) clearInterval(this.interval);
	this.interval = setInterval(function(){ _this._play(); }, this.options.play_timeout);
};

this._play = function(){
	if(this.options.scroll && this.options.stop_timeout){
		if(this.counter == this.options.scroll){
			this.counter = 0;
			
			this.stop();
			this._timeout = setTimeout(function(){ _this.play(); }, this.options.stop_timeout);
			return;
		}
		
		this.counter++;
	}
	
	var e = this.container.get(0);
	
	switch(this.direction){
		case 'up':
			if(e.scrollTop >= this.content.height())
				e.scrollTop = 1;
			else
				e.scrollTop++;
		break;
		
		case 'down':
			if(e.scrollTop == 0)
				e.scrollTop = this.content.height() +1;
			else
				e.scrollTop--;
		break;
		
		case 'left':
			if(e.scrollLeft >= this.content.width())
				e.scrollLeft = 1;
			else
				e.scrollLeft++;
		break;
		
		case 'right':
			if(e.scrollLeft == 0)
				e.scrollLeft = this.content.width() +1;
			else
				e.scrollLeft--;
		break;
	}
};

this.container.get(0).scrollTop = this.direction == 'up' ? 0 : this.content.height();
this.container.get(0).scrollLeft = this.direction == 'left' ? 0 : this.content.width();

this.play();

};

})(jQuery);




$(document).ready(function(){
	$('#slider_index .slider-index').empty();
	for(var i=1;i<=$('#slider .slider-item').length;i++){
		$('#slider_index .slider-index').append('<span class="slider-index-item">'+i+'</span>');
	}
	$('#slider_index .slider-index-item:eq(0),#slider .slider-item:eq(0)').addClass('active');
	var focusTimer,focusidx=0;
	$('#slider_index .slider-index-item').on('click',function(){
		focusidx = $('#slider_index .slider-index-item').index(this);
		$('#slider .slider-item').fadeOut('slow').removeClass('active');
		$("#slider .slider-item:eq("+focusidx+")").fadeIn('slow').addClass('active');
		$('#slider_index .slider-index-item').removeClass('active');
		$(this).addClass('active');
	});
	$('#slider .slider-item a,#slider_index .slider-index-item').on('mouseenter',function(){
		clearTimeout(focusTimer);
	}).on('mouseleave',function(){
		focusTimer = setInterval(showNextFocus, 5000 );
	});
	var showNextFocus=function(){
		focusidx = (focusidx + 1)% $('#slider_index .slider-index-item').length;
		$('#slider_index .slider-index-item:eq('+focusidx+')').click();
	};
	focusTimer = setInterval(showNextFocus, 5000 );
});

//登录
function tologin()
{
	if ($("#user_name").val()=="")
	{
		$("#user_name").focus();
		$("#LoginShowTip").text("请输入账号");
		return false;  
	}
	if ($("#user_pwd").val()=="")
	{
		$("#user_pwd").focus();
		$("#LoginShowTip").text("请输入密码");
		return false;
	}else
	{
		//document.myform.submit();
		$.ajax({ 
			type: "POST",  
			url: "action.php", 
			data: "user_name="+$("#user_name").val()+"&user_pwd="+$("#user_pwd").val()+"&go="+$("#go").val(),  
			success: function(msg){ 
				if(msg == "true"){
					location.href='index.php';
				}else{
					$("#LoginShowTip").show().text(msg); 
				}
			} 
		}); 
	}
}
var regCheckName = true;
function toRegCheck()
{
	var tip = $("#userRegister .col-tip");
	$("#reg_account").blur(function(){
		var jn= $("#reg_account");
		if(jn.val().length<1){		 
			tip.text("×请输入用户名");
		}else if(jn.val().length>0 & jn.val().length < 6) {
			tip.text("×用户名长度必须大于等于6位");
		}else {
			tip.text("");
			
			$.ajax({ 
			type: "POST",  
			url: "action.php", 
			data: "reg_account="+jn.val()+"&go=checkname",  
			success: function(msg){ 
				if(msg == "true"){
					tip.text("√用户名可以使用");
					regCheckName = true;
				}else{
					tip.text("×此用户名已经被注册！");
					regCheckName = false;
				}
			} 
		}); 
		}
	});	
	$("#reg_password").blur(function(){
		var jn= $("#reg_password");
		if(jn.val().length<1){		 
			tip.text("×请输入密码");
		}else if(jn.val().length>0 & jn.val().length < 6) {
			tip.text("×密码长度必须大于等于6位");
		}else {
			tip.text("");
		}
	});	
	$("#reg_rpassword").blur(function(){
		var jn= $("#reg_rpassword");		
		if ($("#reg_password").val()!=jn.val())
			tip.text("×密码与确认密码不一致");
		else
			tip.text("");
			
		if(jn.val().length<1)	 
			tip.text("×请输入确认密码");
		
	});	
}
function toreg()
{
	var tip = $("#userRegister .col-tip");
	if ($("#reg_account").val()=="")
    {
		$("#reg_account").focus();
		tip.text("×请输入用户名");
		return false;  
    }
	if ($("#reg_account").val().length < 6)
    {
		$("#reg_account").focus();
		tip.text("×用户名长度必须大于等于6位");
		return false;  
    }	
	if(!regCheckName){
		tip.text("×此用户名已经被注册！");
		return false;  
	}
	if ($("#reg_password").val()=="")
    {
		$("#reg_password").focus();
		tip.text("×请输入密码");
		return false;  
    }
	if ($("#reg_password").val().length < 6)
    {
		$("#reg_password").focus();
		tip.text("×密码长度必须大于等于6位");
		return false;  
    }
	if ($("#reg_rpassword").val()=="")
    {
		$("#reg_rpassword").focus();
		tip.text("×请输入确认密码");
		return false;  
    }
	if ($("#reg_rpassword").val().length < 6)
    {
		$("#reg_rpassword").focus();
		tip.text("×确认密码长度必须大于等于6位");
		return false;  
    }
	if ($("#reg_password").val()!=$("#reg_rpassword").val())
    {
		$("#reg_rpassword").focus();
		tip.text("×密码与确认密码不一致");
		return false;  
    }else
	{
	  document.myRegister.submit();
	}
}

function toPwdCheck()
{
	$("#password").blur(function(){
		var jn= $("#password");
		if(jn.val().length<1){		 
			jn.next().addClass("p-error").text("×请输入原密码");
		}else{
			jn.next().removeClass("p-error").text("");
		}
	});	
	$("#new_psw").blur(function(){
		var jn= $("#new_psw");
		if(jn.val().length<1){		 
			jn.next().addClass("p-error").text("×请输入新密码");
		}else if(jn.val().length>0 & jn.val().length < 6) {
			jn.next().addClass("p-error").text("×密码长度必须大于等于6位");
		}else {
			jn.next().removeClass("p-error").text("");
		}
	});	
	$("#conf_psw").blur(function(){
		var jn= $("#conf_psw");		
		if ($("#new_psw").val()!=jn.val())
			jn.next().addClass("p-error").text("×密码与确认密码不一致");
		else
			jn.next().removeClass("p-error").text("");
			
		if(jn.val().length<1)	 
			jn.next().addClass("p-error").text("×请输入确认密码");
		
	});	
}

//修改密码
function changepsw()
{
	if ($("#password").val()=="")
    {
      $("#password").focus().next().addClass("p-error").text("×请输入原密码");
      return false;  
    }
	if ($("#new_psw").val()=="")
    {
      $("#new_psw").focus().next().addClass("p-error").text("×请输入新密码");
      return false;  
	}
	if ($("#conf_psw").val()=="")
    {
      $("#conf_psw").focus().next().addClass("p-error").text("×请输入确认密码");
      return false;
	}
	if ($("#new_psw").val()!=$("#conf_psw").val())
    {
      $("#conf_psw").focus().next().addClass("p-error").text("×密码与确认密码不一致");
      return false; 
    }else
	{
	  document.myform.submit();
	}
}



$(function(){
	var timeout = null;
	$('#all_game_hover').mouseover(function(){
		clearTimeout(timeout);
		$('#all_game_div').show();
	}).mouseout(function(){
		timeout = setTimeout(function(){ $('#all_game_div').hide(); }, 300);
	});
	
	$('#all_game_div').mouseover(function(){
		clearTimeout(timeout);
		$('#all_game_div').show();
	}).mouseout(function(){
		$('#all_game_div').hide();
	});
});


$(function(){
	var timeout = null;
	$('#all_game_hover1').mouseover(function(){
		clearTimeout(timeout);
		$('#all_game_div1').show();
	}).mouseout(function(){
		timeout = setTimeout(function(){ $('#all_game_div1').hide(); }, 300);
	});
	
	$('#all_game_div1').mouseover(function(){
		clearTimeout(timeout);
		$('#all_game_div1').show();
	}).mouseout(function(){
		$('#all_game_div1').hide();
	});
});


$(function(){
	var timeout = null;
	$('#all_game_hover2').mouseover(function(){
		clearTimeout(timeout);
		$('#all_game_div2').show();
	}).mouseout(function(){
		timeout = setTimeout(function(){ $('#all_game_div2').hide(); }, 300);
	});
	
	$('#all_game_div2').mouseover(function(){
		clearTimeout(timeout);
		$('#all_game_div2').show();
	}).mouseout(function(){
		$('#all_game_div2').hide();
	});
	/* aron.2015.07.20 */
	/*
	$(".user-login").click(function(){loginToggle("SHOW");});
	$("#userLoginClose").click(function(){loginToggle("CLOSE");});
	$("#bgMask").click(function(){loginToggle("CLOSE");});
	
	*/
	$("#openRegisterWin").click(function(){registerToggle("SHOW");});
	$(".user-reg").click(function(){registerToggle("SHOW");});
	$("#userRegisterClose").click(function(){registerToggle("CLOSE");});
	//$("#bgMask").click(function(){registerToggle("CLOSE");});
	//$("#openLoginWin").click(function(){registerToggle("CLOSE","login");});
	
	$("#navKfKey").click(function(){kfToggle("SHOW");});
	$("#navKfClose").click(function(){kfToggle("CLOSE");});
});
	
	$("#pg_1").mouseover(function(){
		$(".pg1").show();
		$(".pg2").hide();
		$("#pg_1").addClass("pg_on");
		$("#pg_2").removeClass("pg_on");
	});
	$("#pg_2").mouseover(function(){
		$(".pg2").show();
		$(".pg1").hide();
		$("#pg_2").addClass("pg_on");
		$("#pg_1").removeClass("pg_on");
	});
//显示登陆窗口
function loginToggle(action, next){
	if(action == "SHOW"){
		$("#bgMask").css({"opacity":"0","display":"block"}).animate({
			opacity: 0.8
		}, 300, function () {
			$("#userLgoin").animate({top: 0 + 'px'}, 500, function () {});
		});
	}else{
		$("#userLgoin").animate({top:'-400px'}, 300, function () {
			if(next == "reg") $("#userRegister").animate({top: 0 + 'px'}, 500, function () {});
			else $("#bgMask").css({"opacity":"0.8","display":"block"}).animate({opacity: 0}, 300, function () {$("#bgMask").css("display","none");});
			
		});		
	}
}
//显示注册窗口
function registerToggle(action, next){
	if(action == "show"){
		$("#bgMask").css({"opacity":"0","display":"block"}).animate({
			opacity: 0.8
		}, 300, function () {
			$("#userRegister").animate({top: 0 + 'px'}, 500, function () {});
		});
	}else{
		$("#userRegister").animate({top:'-500px'}, 300, function () {
			if(next == "login") $("#userLgoin").animate({top: 0 + 'px'}, 500, function () {});
			else $("#bgMask").css({"opacity":"0.8","display":"block"}).animate({opacity: 0}, 300, function () {$("#bgMask").css("display","none");});
		});		
	}
}
//显示客服
function kfToggle(action){
	if(action == "SHOW"){
		$("#bgMask").css({"opacity":"0","display":"block"}).animate({
			opacity: 0.9
		}, 300, function () {
			$("#navKf").css({"opacity":"0","display":"block"}).animate({opacity: 1}, 500, function () {});
		});
	}else{
		$("#navKf").animate({opacity: 0}, 300, function () {
			$("#bgMask").animate({opacity: 0}, 300, function () {$("#navKf").css("display","none");$("#bgMask").css("display","none");});
		});		
	}
}
function addFav(){ // 加入收藏夹
if (document.all) {
window.external.addFavorite(window.location.href, document.title);
} else if (window.sidebar) {
window.sidebar.addPanel(document.title, window.location.href, "");
}
}


function setHomepage(){ // 设置首页
if (document.all) {
document.body.style.behavior = 'url(#default#homepage)';
document.body.setHomePage(window.location.href);
} else if (window.sidebar) {
if(window.netscape) {
try {
netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
}
catch (e) {
alert('此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为’true’,双击即可。');
}
var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
prefs.setCharPref('browser.startup.homepage', window.location.href);
}
}
}


$(function(){
	$(".hot_game li").hover(function(){
		$(this).find(".btn_over").show();
	},function(){
		$(this).find(".btn_over").hide();
	});
		
});



function SPnav(sel,callback){
	var	nav = sel.nav,tab = sel.tab,con =sel.con,act=sel.act || 'mouseenter mouseleave';
	var type = sel.type || 'normal';
	var classname = sel.classname || 'hover';
	var timer;
	if(type=='arrow'){
		nav.on(act,function(event){
			var i = nav.index(this);
			var w = tab.width();
			if(event.type != "mouseleave"){
				timer = setTimeout(function(){
					tab.animate({left:i*w+"px"},150,function(){
						slidEvent(i,classname,this);
					});
				},150);
			}
			if(event.type == "mouseleave"){
				clearTimeout(timer);
			}
		});
	}
	if(type=='unique'){
		con.hide().eq(0).show();
		if(con.length>1){
			for(var i=0,html='';i<con.length;i++){
				html+="<span></span>";
			}
			nav.html(html);
			nav = nav.children();
			nav.first().addClass(classname);
			nav.on(act,function(event){
				if(event.type != "mouseleave"){
					var i = nav.index(this);
					slidEvent(i,classname);
				}
			});
		}
	}
	if(type=='normal'){
		nav.on(act,function(event){
			if(event.type != "mouseleave"){
				var i = nav.index(this);
				slidEvent(i,classname,this);
			}			
			if(event.type == "mouseleave"){
				con || nav.removeClass(classname);
			}
		});
	}
	function slidEvent(i,className,_this) {
		nav.removeClass(className).eq(i).addClass(className);
		con && con.hide().eq(i).show();
		if(callback){ return callback(_this)}
	}
}



SPnav({nav:$('#card')});
SPnav({nav:$('.rec-game .pic')});
	