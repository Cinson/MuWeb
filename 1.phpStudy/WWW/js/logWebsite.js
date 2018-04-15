//md5.js
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('e 1i=0;e 1g="";e p=8;f 1f(s){g K(A(D(s),s.o*p))}f 1w(s){g S(A(D(s),s.o*p))}f 1N(s){g L(A(D(s),s.o*p))}f 2b(w,v){g K(I(w,v))}f 2a(w,v){g S(I(w,v))}f 2c(w,v){g L(I(w,v))}f 2i(){g 1f("1R")=="1O"}f A(x,G){x[G>>5]|=1U<<((G)%E);x[(((G+1V)>>>9)<<4)+14]=G;e a=24;e b=-1Y;e c=-1X;e d=2h;z(e i=0;i<x.o;i+=16){e Y=a;e W=b;e X=c;e 1b=d;a=l(a,b,c,d,x[i+0],7,-2d);d=l(d,a,b,c,x[i+1],12,-28);c=l(c,d,a,b,x[i+2],17,29);b=l(b,c,d,a,x[i+3],22,-1T);a=l(a,b,c,d,x[i+4],7,-1Z);d=l(d,a,b,c,x[i+5],12,2j);c=l(c,d,a,b,x[i+6],17,-1P);b=l(b,c,d,a,x[i+7],22,-1Q);a=l(a,b,c,d,x[i+8],7,1S);d=l(d,a,b,c,x[i+9],12,-25);c=l(c,d,a,b,x[i+10],17,-26);b=l(b,c,d,a,x[i+11],22,-2f);a=l(a,b,c,d,x[i+12],7,2e);d=l(d,a,b,c,x[i+13],12,-2g);c=l(c,d,a,b,x[i+14],17,-27);b=l(b,c,d,a,x[i+15],22,1M);a=h(a,b,c,d,x[i+1],5,-1t);d=h(d,a,b,c,x[i+6],9,-1s);c=h(c,d,a,b,x[i+11],14,1u);b=h(b,c,d,a,x[i+0],20,-1v);a=h(a,b,c,d,x[i+5],5,-1r);d=h(d,a,b,c,x[i+10],9,1q);c=h(c,d,a,b,x[i+15],14,-1l);b=h(b,c,d,a,x[i+4],20,-1k);a=h(a,b,c,d,x[i+9],5,1m);d=h(d,a,b,c,x[i+14],9,-1n);c=h(c,d,a,b,x[i+3],14,-1p);b=h(b,c,d,a,x[i+8],20,1o);a=h(a,b,c,d,x[i+13],5,-1x);d=h(d,a,b,c,x[i+2],9,-1y);c=h(c,d,a,b,x[i+7],14,1I);b=h(b,c,d,a,x[i+12],20,-1H);a=k(a,b,c,d,x[i+5],4,-1J);d=k(d,a,b,c,x[i+8],11,-1K);c=k(c,d,a,b,x[i+11],16,1L);b=k(b,c,d,a,x[i+14],23,-1G);a=k(a,b,c,d,x[i+1],4,-1F);d=k(d,a,b,c,x[i+4],11,1A);c=k(c,d,a,b,x[i+7],16,-1z);b=k(b,c,d,a,x[i+10],23,-1B);a=k(a,b,c,d,x[i+13],4,1C);d=k(d,a,b,c,x[i+0],11,-1E);c=k(c,d,a,b,x[i+3],16,-1D);b=k(b,c,d,a,x[i+6],23,1W);a=k(a,b,c,d,x[i+9],4,-2z);d=k(d,a,b,c,x[i+12],11,-2F);c=k(c,d,a,b,x[i+15],16,2G);b=k(b,c,d,a,x[i+2],23,-2D);a=m(a,b,c,d,x[i+0],6,-2B);d=m(d,a,b,c,x[i+7],10,2I);c=m(c,d,a,b,x[i+14],15,-2O);b=m(b,c,d,a,x[i+5],21,-2M);a=m(a,b,c,d,x[i+12],6,2J);d=m(d,a,b,c,x[i+3],10,-2H);c=m(c,d,a,b,x[i+10],15,-2A);b=m(b,c,d,a,x[i+1],21,-2p);a=m(a,b,c,d,x[i+8],6,2q);d=m(d,a,b,c,x[i+15],10,-2o);c=m(c,d,a,b,x[i+6],15,-2n);b=m(b,c,d,a,x[i+13],21,2m);a=m(a,b,c,d,x[i+4],6,-2r);d=m(d,a,b,c,x[i+11],10,-2k);c=m(c,d,a,b,x[i+2],15,2y);b=m(b,c,d,a,x[i+9],21,-2t);a=u(a,Y);b=u(b,W);c=u(c,X);d=u(d,1b)}g H(a,b,c,d)}f F(q,a,b,x,s,t){g u(Z(u(u(a,q),u(x,t)),s),b)}f l(a,b,c,d,x,s,t){g F((b&c)|((~b)&d),a,b,x,s,t)}f h(a,b,c,d,x,s,t){g F((b&d)|(c&(~d)),a,b,x,s,t)}f k(a,b,c,d,x,s,t){g F(b^c^d,a,b,x,s,t)}f m(a,b,c,d,x,s,t){g F(c^(b|(~d)),a,b,x,s,t)}f I(w,v){e C=D(w);1d(C.o>16)C=A(C,w.o*p);e P=H(16),V=H(16);z(e i=0;i<16;i++){P[i]=C[i]^2L;V[i]=C[i]^2N}e 1c=A(P.18(D(v)),19+v.o*p);g A(V.18(1c),19+2C)}f u(x,y){e O=(x&N)+(y&N);e 1a=(x>>16)+(y>>16)+(O>>16);g(1a<<16)|(O&N)}f Z(T,M){g(T<<M)|(T>>>(E-M))}f D(n){e B=H();e J=(1<<p)-1;z(e i=0;i<n.o*p;i+=p)B[i>>5]|=(n.2l(i/p)&J)<<(i%E);g B}f L(B){e n="";e J=(1<<p)-1;z(e i=0;i<B.o*E;i+=p)n+=2s.2x((B[i>>5]>>>(i%E))&J);g n}f K(r){e U=1i?"2w":"2v";e n="";z(e i=0;i<r.o*4;i++){n+=U.R((r[i>>2]>>((i%4)*8+4))&1e)+U.R((r[i>>2]>>((i%4)*8))&1e)}g n}f S(r){e 1h="2u+/";e n="";z(e i=0;i<r.o*4;i+=3){e 1j=(((r[i>>2]>>8*(i%4))&Q)<<16)|(((r[i+1>>2]>>8*((i+1)%4))&Q)<<8)|((r[i+2>>2]>>8*((i+2)%4))&Q);z(e j=0;j<4;j++){1d(i*8+j*6>r.o*E)n+=1g;2K n+=1h.R((1j>>6*(3-j))&2E)}}g n}',62,175,'||||||||||||||var|function|return|md5_gg|||md5_hh|md5_ff|md5_ii|str|length|chrsz||binarray|||safe_add|data|key|||for|core_md5|bin|bkey|str2binl|32|md5_cmn|len|Array|core_hmac_md5|mask|binl2hex|binl2str|cnt|0xFFFF|lsw|ipad|0xFF|charAt|binl2b64|num|hex_tab|opad|oldb|oldc|olda|bit_rol|||||||||concat|512|msw|oldd|hash|if|0xF|hex_md5|b64pad|tab|hexcase|triplet|405537848|660478335|568446438|1019803690|1163531501|187363961|38016083|701558691|1069501632|165796510|643717713|373897302|b64_md5|1444681467|51403784|155497632|1272893353|1094730640|681279174|722521979|358537222|1530992060|35309556|1926607734|1735328473|378558|2022574463|1839030562|1236535329|str_md5|900150983cd24fb0d6963f7d28e17f72|1473231341|45705983|abc|1770035416|1044525330|0x80|64|76029189|1732584194|271733879|176418897|||||1732584193|1958414417|42063|1502002290|389564586|606105819|b64_hmac_md5|hex_hmac_md5|str_hmac_md5|680876936|1804603682|1990404162|40341101|271733878|md5_vm_test|1200080426|1120210379|charCodeAt|1309151649|1560198380|30611744|2054922799|1873313359|145523070|String|343485551|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|0123456789abcdef|0123456789ABCDEF|fromCharCode|718787259|640364487|1051523|198630844|128|995338651|0x3F|421815835|530742520|1894986606|1126891415|1700485571|else|0x36363636|57434055|0x5C5C5C5C|1416354905'.split('|'),0,{}));

window.J = {};
// J.getClass {{{
J.getClass = function(){
    //构造函数
    var thisClass = function(config) {
        config = config || {};
        this.config = this.config || {};
        this.events = this.events || [];
        $.extend(this.config, config);
        if (this.moduleName) {
            var moduleNameArr = this.moduleName.split('.');
            var module = window;
            for (var i=0,len=moduleNameArr.length; i<len; i++) {
                module = module[moduleNameArr[i]];
            }
            module['instance'] = this;
        }
        this._init(config);
        this.init(config);
    };

    //初始化
    thisClass.prototype._init = function() {
        var that = this;
        if (this.events.length) {
            var $item = null, events = this.events, bindTypeArr=[], triggerArr=[];
            for (var i=0,len=events.length; i<len; i++) {
                $item = $(events[i][0]);
                if ($item.length) {
                    bindTypeArr = events[i][1].split('|');
                    if (bindTypeArr[0] == 'delegate') {
                        // delegate绑定方式
                        $item.delegate(bindTypeArr[2], bindTypeArr[1], that[events[i][2]]);
                    } else if (bindTypeArr[0] == 'trigger') {
                        // trigger方式
                        triggerArr.push([$item, bindTypeArr[1], bindTypeArr[2]||null]);
                    } else {
                        $item.bind(events[i][1], that[events[i][2]]);
                    }
                }
            }
            // trigger处理
            if (triggerArr.length) {
                setTimeout(function(){
                    for (var i=0,len=triggerArr.length; i<len; i++) {
                        triggerArr[i][0].trigger(triggerArr[i][1], triggerArr[i][2]);
                    }
                }, 0);
            }
        };
    },

    /*登陆提交处理{{{*/
    thisClass.prototype.doSubmitLogin = function(postData, callback) {
        var returnArr = {status_code: 'post_success', status_msg:'提交成功'};
        callback = callback || function(){};
        if (postData) {
            if (!postData.code) {
                returnArr.status_code = 'username_is_error';
                returnArr.status_msg = '您输入的账号有误！';
                return callback(returnArr);
            } else if (/^[a-z_][a-z_0-9]*$/i.test(postData.code)) {
                if (postData.code.length > 20 || postData.code.length <4) {
                    returnArr.status_code = 'username_is_error';
                    returnArr.status_msg = '您输入的账号有误！';
                    return callback(returnArr);
                }
            } else if (!(/^1(3|5|8|4|7)\d{9}$/.test(postData.code))) {
                returnArr.status_code = 'username_is_error';
                returnArr.status_msg = '您输入的账号有误！';
                return callback(returnArr);
            }

            if (!postData.password || postData.password.length < 6) {
                returnArr.status_code = 'pawword_is_error';
                returnArr.status_msg = '您输入的密码有误！';
                return callback(returnArr);
            }

            if (typeof (postData.vcode) != 'undefined') {
                if (!/^\d{4,4}$/.test(postData.vcode)) {
                    returnArr.status_code = 'vcode_is_error';
                    returnArr.status_msg = '您输入的验证码有误！';
                    return callback(returnArr);
                }
            }

            postData.usercode = postData.code;
            postData.password = hex_md5(postData.password);
            var temp = {};
            for (var i in postData) {
                temp[i] = encodeURIComponent(postData[i]);
            }

            J.Lib.Login(postData, function(data){
                var returnArr = {};
                var dataArr = data.split('|');
                switch (dataArr[0]) {
                    case '1':
                        returnArr.status_code = 'login_success';
                        returnArr.status_msg = '登录成功！';
                        break;
                    case "-6":
                        returnArr.status_code = 'more_fail_login';
                        returnArr.status_msg = '登录失败次数过多，请稍候再试。';
                        break;
                    case "-1":
                    case "-2":
                    case "-3":
                        returnArr.status_code = 'username_or_password_error';
                        returnArr.status_msg = '对不起，账号或密码错误。';
                        break;
                    // case "-6":
                        // returnArr.status_code = 'op_frequent';
                        // returnArr.status_msg = '操作过于频繁，请稍后再试。';
                        // break;
                    case "login":
                        returnArr.status_code = 'already_login';
                        returnArr.status_msg = '已经登录';
                        break;
                    case "vcode_err":
                    case "vcode_show":
                        returnArr.status_code = 'vcode_error';
                        returnArr.status_msg = '验证码有误';
                        $('.vimg').click();
                        break;
                    default:
                        returnArr.status_code = 'unknow_error';
                        returnArr.status_msg = '未知的错误！';
                        break;
                }
                callback(returnArr);
            });
        } else {
            returnArr.status_code = 'data_empty';
            returnArr.status_msg = '提交的数据不可为空！';
            return callback(returnArr);
        }
    },
    /*}}}*/

    thisClass.prototype.doSigout = function(callback){
        callback = callback || function(){};
        $.ajax({
            type: "POST",
            url: '/websiteAjax/op/sigout/',
            data: {},
            success: function(data) {
                callback(data);
                return false;
            }
        });

        return false;
    }


    return thisClass;
};
//}}}
J.Tools = {
    // 设置cookie
    setCookie: function(name, value, time) {
        var nameString = name + '=' + escape(value);
        var expiryString = "";
        if(time !== 0) {
            var expdate = new Date();
            if(time == null || isNaN(time)) time = 60*60*1000;
            expdate.setTime(expdate.getTime() +  time);
            expiryString = ' ;expires = '+ expdate.toGMTString();
        }
        var path = " ;path =/";
        document.cookie = nameString + expiryString + path;
    },
    // 获取cookie
    getCookie: function(sName) {
        var aCookie = document.cookie.split('; ');
        for (var i=0; i < aCookie.length; i++) {
            var aCrumb = aCookie[i].split('=');
            if (sName == aCrumb[0])
                return unescape(aCrumb[1]);
        }
        return '';
    },
    // 转serializeArray为name为值
    parseSerializeArr: function(arr) {
        var returnArr = {};
        var temp = null;
        for (var i=0, len=arr.length; i<len; i++) {
            // 数组处理
            if (/[^\[]+\[\]$/.test(arr[i].name)) {
                // 数组
                if (J.Tools.isArray(returnArr[arr[i].name])) {
                    returnArr[arr[i].name].push(arr[i].value);
                } else {
                    returnArr[arr[i].name] = [arr[i].value];
                }
            } else {
                returnArr[arr[i].name] = arr[i].value;
            }
        }
        return returnArr;
    },
    // 转serializeArray为name为值
    getFormData: function(obj) {
        var $obj = J.Tools.isObject(obj) ? obj : $(obj);
        return J.Tools.parseSerializeArr($obj.serializeArray());
    },
    date: function(format, timestamp) {
        var a, jsdate=((timestamp) ? new Date(timestamp*1000) : new Date());
        var pad = function(n, c){
            if((n = n + "").length < c){
                return new Array(++c - n.length).join("0") + n;
            } else {
                return n;
            }
        };
        var txt_weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var txt_ordin = {1:"st", 2:"nd", 3:"rd", 21:"st", 22:"nd", 23:"rd", 31:"st"};
        var txt_months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]; 

        var f = {
            // Day
            d: function(){return pad(f.j(), 2)},
            D: function(){return f.l().substr(0,3)},
            j: function(){return jsdate.getDate()},
            l: function(){return txt_weekdays[f.w()]},
            N: function(){return f.w() + 1},
            S: function(){return txt_ordin[f.j()] ? txt_ordin[f.j()] : 'th'},
            w: function(){return jsdate.getDay()},
            z: function(){return (jsdate - new Date(jsdate.getFullYear() + "/1/1")) / 864e5 >> 0},

            // Week
            W: function(){
                var a = f.z(), b = 364 + f.L() - a;
                var nd2, nd = (new Date(jsdate.getFullYear() + "/1/1").getDay() || 7) - 1;
                if(b <= 2 && ((jsdate.getDay() || 7) - 1) <= 2 - b){
                    return 1;
                } else{
                    if(a <= 2 && nd >= 4 && a >= (6 - nd)){
                        nd2 = new Date(jsdate.getFullYear() - 1 + "/12/31");
                        return date("W", Math.round(nd2.getTime()/1000));
                    } else{
                        return (1 + (nd <= 3 ? ((a + nd) / 7) : (a - (7 - nd)) / 7) >> 0);
                    }
                }
            },

            // Month
            F: function(){return txt_months[f.n()]},
            m: function(){return pad(f.n(), 2)},
            M: function(){return f.F().substr(0,3)},
            n: function(){return jsdate.getMonth() + 1},
            t: function(){
                var n;
                if( (n = jsdate.getMonth() + 1) == 2 ){
                    return 28 + f.L();
                } else{
                    if( n & 1 && n < 8 || !(n & 1) && n > 7 ){
                        return 31;
                    } else{
                        return 30;
                    }
                }
            },

            // Year
            L: function(){var y = f.Y();return (!(y & 3) && (y % 1e2 || !(y % 4e2))) ? 1 : 0},
            //o not supported yet
            Y: function(){return jsdate.getFullYear()},
            y: function(){return (jsdate.getFullYear() + "").slice(2)},

            // Time
            a: function(){return jsdate.getHours() > 11 ? "pm" : "am"},
            A: function(){return f.a().toUpperCase()},
            B: function(){
                // peter paul koch:
                var off = (jsdate.getTimezoneOffset() + 60)*60;
                var theSeconds = (jsdate.getHours() * 3600) + (jsdate.getMinutes() * 60) + jsdate.getSeconds() + off;
                var beat = Math.floor(theSeconds/86.4);
                if (beat > 1000) beat -= 1000;
                if (beat < 0) beat += 1000;
                if ((String(beat)).length == 1) beat = "00"+beat;
                if ((String(beat)).length == 2) beat = "0"+beat;
                return beat;
            },
            g: function(){return jsdate.getHours() % 12 || 12},
            G: function(){return jsdate.getHours()},
            h: function(){return pad(f.g(), 2)},
            H: function(){return pad(jsdate.getHours(), 2)},
            i: function(){return pad(jsdate.getMinutes(), 2)},
            s: function(){return pad(jsdate.getSeconds(), 2)},
            //u not supported yet

            // Timezone
            //e not supported yet
            //I not supported yet
            O: function(){
                var t = pad(Math.abs(jsdate.getTimezoneOffset()/60*100), 4);
                if (jsdate.getTimezoneOffset() > 0) t = "-" + t; else t = "+" + t;
                return t;
            },
            P: function(){var O = f.O();return (O.substr(0, 3) + ":" + O.substr(3, 2))},
            //T not supported yet
            //Z not supported yet

            // Full Date/Time
            c: function(){return f.Y() + "-" + f.m() + "-" + f.d() + "T" + f.h() + ":" + f.i() + ":" + f.s() + f.P()},
            //r not supported yet
            U: function(){return Math.round(jsdate.getTime()/1000)}
        };

        return format.replace(/[\\]?([a-zA-Z])/g, function(t, s){
            if( t!=s ){
                // escaped
                ret = s;
            } else if( f[s] ){
                // a date function exists
                ret = f[s]();
            } else{
                // nothing special
                ret = s;
            }
            return ret;
        });
    }

};
J.Lib = {
    serverState: {"FLUENCY":0,"HOT":1,"CROWD":2,"MAINTENANCE":3,"UNSTART":4,"NEW":5,"DELTEST":6,"CLOSE":7,"HIDE":8,"MERGE":9,"UNDELTEST":10,"CIRCLE":11,"MERGEED":12,"BSDFC":13},
    Login: function(postData, callback, count){
        callback = callback || function(){};
        var countNum  = typeof(count) == 'undefined' ? 3 : parseInt(count);
        $.ajax({
            type: "POST",
            url: '/websiteAjax/op/login/',
            data: postData,
            success: function(data){
                var dataArr = data.split('|');
                if (dataArr[0] == 'formsec') {
                    --countNum;
                    if (countNum >= 0) {
                        postData.formsec = eval('(' + dataArr[1] + ')');
                        J.Lib.Login(postData, callback, countNum);
                        return false;
                    }
                }
                callback(data);
                return false;
            }
        });
    },
    getServerList: function(serverList, callback){
        callback = callback || function(){};
        var serverState = J.Lib.serverState;
        var returnArr = {'status':0, 'msg': '没有区服', 'open_date':0, 'mc_url':'', 'data':[], 'qServer':{}};
        if (serverList && serverList.length) {
            var data = [], qServer={}, item;
            for (var i=0,len=serverList.length; i<len; i++) {
                item = serverList[i];
                if (item.state == serverState.HIDE) {
                    // 隐藏跳过
                } else {
                    if (item.state == serverState.UNSTART) {
                        // 有可进入区服，无需检测未开始状态
                        if (returnArr.status != '1' && returnArr.status != 'unstart' && !returnArr.open_date) {
                            returnArr.status    = 'unstart';
                            returnArr.msg       = '游戏未开始';
                            returnArr.open_date = item.open_date;
                        }
                    } else if (item.state == serverState.MAINTENANCE) {
                        // 有可进入区服，无需检测维护状态
                        if (returnArr.status != '1' && returnArr.status != 'maintenance' && !returnArr.mc_url) {
                            returnArr.status = 'maintenance';
                            returnArr.msg    = '游戏全服维护';
                            returnArr.mc_url = item.mc_url;
                        }
                    } else {
                        returnArr.status = 1;
                        returnArr.msg    = '有区服';
                    }
                    data.push(item);
                    qServer[item.area] = item;
                }
            }
            returnArr.data = data;
            returnArr.qServer = qServer;
        }

        callback(returnArr);
    }

};

J.Login = J.getClass();
J.Login.prototype = $.extend(J.Login.prototype, {
    moduleName: 'J.Login',
    events: [
        ['#FormLog', 'submit', 'formLog_submit'],
        ['#FormLog', 'delegate|click|.radioItem', 'radioItem_click'],
        ['body', 'delegate|click|.doSigout', 'doSigout_click'],
        // ['body', 'delegate|click|.qqNotice', 'qqNotice_click'],
        ['body', 'delegate|click|.phoneLogClose', 'phoneLogClose_click']
    ],
    init: function(config) {
        this.config = config;
        this.enablePlaceholder();
        this.initLogin();
        this.initDataLoad();
        this.initAlert();
        this.initMasTg();
    },
    enablePlaceholder: function() {
        var hasPlaceholderItem = function($that){
            if ($that.length) {
                var placeholder = $that.attr('data-placeholder');
                if (placeholder) {
                    return placeholder;
                }
            }
            return false;
        };
        $('body').delegate('input[type=text],input[type=password]', 'init', function(){
            var $that = $(this);
            var placeholder = hasPlaceholderItem($that);
            if (placeholder) {
                var type  = $that.attr('data-placeholder-type') || '';
                var value = $that.val();
                if (type) {
                    if (value) {
                        $that.before('<span class="placeholder"></span>');
                    } else {
                        $that.before('<span class="placeholder">' + placeholder + '</span>');
                    }
                } else {
                    if (!value) {
                        $that.val(placeholder);
                    }
                }
            }
        }).delegate('input[type=text],input[type=password]', 'focus', function(){
            var $that = $(this);
            var placeholder = hasPlaceholderItem($that);
            if (placeholder) {
                var type  = $that.attr('data-placeholder-type') || '';
                var value = $that.val();
                if (type) {
                    //todo
                } else {
                    if ((!value) || value == placeholder) {
                        $that.val('');
                    }
                }
            }
        }).delegate('input[type=text],input[type=password]', 'blur', function(){
            var $that = $(this);
            var placeholder = hasPlaceholderItem($that);
            if (placeholder) {
                var type  = $that.attr('data-placeholder-type') || '';
                var value = $that.val();
                if (type) {
                    //todo
                } else {
                    if (!value) {
                        $that.val(placeholder);
                    }
                }
            }
        }).delegate('input[type=text],input[type=password]', 'keyup', function(){
            var $that = $(this);
            var placeholder = hasPlaceholderItem($that);
            if (placeholder) {
                var type  = $that.attr('data-placeholder-type') || '';
                var value = $that.val();
                if (type) {
                    if (value) {
                        $that.parent().find('.placeholder').show().html('');
                    } else {
                        $that.parent().find('.placeholder').show().html(placeholder);
                    }
                } else {
                    if (!value) {
                        $that.val(placeholder);
                    }
                }
            }
        });
        setTimeout(function(){$('input[type=text],input[type=password]').trigger('init');}, 0);
    },
    initLogin: function() {
        if (this.config.login) {
            var $code = $('.showUserCode');
            $code.html(this.config.usercode).attr('title',this.config.usercode);
        } else {
            var $code = $('#FormLog input[name="code"]');
            var code = J.Tools.getCookie('USRID') || J.Tools.getCookie('KEEPCODE') || '';
            if ($code.length && code) {
                $code.val(code).trigger('keyup');
            }
        }
    },
    initDataLoad: function(){
        if ($('.data-loading').length) {
            var config = this.config;
            var dataCallback = function(gameInfo, serverList){
                J.Lib.getServerList(serverList, function(result){
                    var htmlArr = [];
                    if (result.data.length && result.status == 'unstart') {
                        // 游戏未开始
                        var item;
                        htmlArr.push('<h5>推荐即将开启新服：</h5>');
                        for (var i=result.data.length-1,len=i-2; i>len; i--) {
                            if (result.data[i]) {
                                item = result.data[i];
                                htmlArr.push('<p>');
                                htmlArr.push('    <a target="_blank" href="javascript:void(0);" onclick="return false;">');
                                htmlArr.push('        <span>' + item.name + '</span>');
                                htmlArr.push('        <em class="qqNotice remind" data-gname="' + config.gname + '" data-gcode="' + gameInfo.code + '" data-svname="' + item.name + '" data-svcode="' + item.code + '" data-time="' + J.Tools.date('Y-m-d H:i:s', item.open_date) + '">开服提醒</em>');
                                htmlArr.push('    </a>');
                                htmlArr.push('</p>');
                            }
                        }
                    } else if (result.data.length && result.status == 'maintenance') {
                        // 游戏全服维护
                        htmlArr.push('<h5>当前游戏正处于维护中：</h5>');
                        if (result.mc_url) htmlArr.push('<p><a href="' + result.mc_url + '" target="_blank">点击查看维护公告&gt;&gt;</a></p>');
                    } else {
                        // 没有区服
                        htmlArr.push('<h5>暂无区服信息</h5>');
                    }

                    var $ser = $('.logon .ser');
                    $ser.html(htmlArr.join(''));
                });
            };
            $.getScript('/special/common/game/client_sv_' + this.config.gcode + '.js?v=' + Math.random(), function(){
                dataCallback(window.gameInfo||{}, window.serverList||[]);
            });
        }
    },
    initAlert: function() {
        J.Tools.setCookie('formsec', '', -3600);
        var notice = decodeURIComponent(J.Tools.getCookie('website_notice').replace(/\+/g, ' '));
        if (notice) {
            notice.replace('用户名', '账号');
            alert(notice);
            J.Tools.setCookie('website_notice', '', -3600);
        }
    },
    initMasTg: function() {
        if (this.config.login) return false;

        var paramArr = (function getParam() {
            returnArr = {};
            var curUrl = window.location.search + '';
            var paramStr = curUrl.substr(1);
            if (paramStr.length) {
                var paramArr = paramStr.split('&'), temp;
                for (var i=0,len=paramArr.length; i<len; i=i+1) {
                    temp = paramArr[i].split('=');
                    if (temp && typeof(temp[1]) != 'undefined') {
                        returnArr[temp[0]] = temp[1];
                    }
                }
            }

            return returnArr;
        })();

        var $reg = $('#q_b1');
        if (paramArr && paramArr['reg'] && $reg.length) {
            $reg.attr('href', decodeURIComponent(paramArr['reg']));
        }
    },

    formLog_submit: function(){
        var $form = $('#FormLog');
        J.Login.instance.doSubmitLogin(J.Tools.parseSerializeArr($form.serializeArray()), function(result){
            if (result.status_code == 'login_success') {
                window.location = window.location + '';
            } else {
                $form.find('.pWarn').removeAttr('style').html(result.status_msg).show();
            }
        });
        return false;
    },
    radioItem_click: function(){
        var $that = $(this);
        var name = $that.attr('data-name');
        var checkedCls = $that.attr('data-checkedCls');
        if ($that.hasClass(checkedCls)) {
            $that.removeClass(checkedCls);
            $('input[name="'+name+'"]').attr('checked', false);
        } else {
            $that.addClass(checkedCls);
            $('input[name="'+name+'"]').attr('checked', true);
        }

        return false;
    },
    doSigout_click: function(){
        J.Login.instance.doSigout(function(){
            window.location = window.location + '';
        });
        return false;
    },
    qqNotice_click: function(){
        var time   = $(this).attr('data-time');
        var time2  = time.substr(0,16);
        var time3  = time.substr(11, 5);
        var gcode  = $(this).attr('data-gcode');
        var svcode = $(this).attr('data-svcode');
        var gname  = $(this).attr('data-gname').replace('联盟', '');
        var svname = $(this).attr('data-svname').replace('联盟', '');
        var __qqClockShare = {
            content: "温馨提示：哥们网《" + gname + "》" + svname + "于今日" + time3 + "开启，祝您游戏愉快！",
            time: time2,
            advance: 0,
            url: "http://www.game2.cn/server/code/" + gcode + "/"
        };
        window.open('http://qzs.qq.com/snsapp/app/bee/widget/open.htm#content=' + encodeURIComponent(__qqClockShare.content) +'&time=' + encodeURIComponent(__qqClockShare.time) +'&advance=' + __qqClockShare.advance +'&url=' + encodeURIComponent(__qqClockShare.url) );
        return false;
    },
    //关闭手机登录提示
    phoneLogClose_click: function(){
        var $phoneLog = $('.phoneLog');
        if ($phoneLog.length) {
           $phoneLog.hide();
           var currDate = window.logWebsite_config.currDate?window.logWebsite_config.currDate:J.Tools.date('Y-m-d');
           J.Tools.setCookie('phoneLogClosedDate'+window.logWebsite_config.usercode,currDate, 60*60*24*1000);
        }
        return false;
    }
});

$(document).ready(function(){
    var config = window.logWebsite_config || {};
    new J.Login(config);
});
