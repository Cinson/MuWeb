function getQueryString(e) {
    var t = new RegExp("(^|&)" + e + "=([^&]*)(&|$)", "i"),
        a = window.location.search.substr(1).match(t);
    return null != a ? unescape(a[2]) : null
}
document.domain = "2144.cn";
var webGameObj = webGameObj || {};
webGameObj.focusFun = function() {
    var e = $("#w-focusimg"),
        t = e.find("li"),
        a = e.find("i"),
        n = t.length - 1,
        s = 5e3,
        i = 0,
        r = 0,
        o = function() {
            t.eq(i).stop().animate({
                opacity: "hide",
                "z-index": 0
            }, 500, function() {
                $(this).hide()
            }), t.eq(r).stop().animate({
                opacity: "show",
                "z-index": 1
            }, 500, function() {
                $(this).show()
            }), a.eq(r).addClass("cur").siblings().removeClass("cur")
        },
        f = function() {
            r = r == n ? 0 : ++r, i = r ? r - 1 : n, o()
        };
    handl = setInterval(f, s), t.hide().css("z-index", 0), t.eq(0).show().css("z-index", 1), e.hover(function() {
        clearInterval(handl)
    }, function() {
        handl = setInterval(f, s)
    }), a.click(function() {
        var e = $(this).index();
        t.hide().css("z-index", 0), i = e ? e - 1 : n, r = e, o()
    })
}, webGameObj.pageShow = function() {
    var e = arguments[0],
        t = 0;
    if ("[object Object]" === Object.prototype.toString.call(e) && "undefine" != typeof e.ele && "" !== e.ele && "undefine" != typeof e.data) return t = Math.ceil(e.data.length / e.page), $(e.ele).html("<i>1</i>/" + t + '<a target="_self" href="#" class="w-kftabL">&lt;</a><a target="_self" href="#" class="w-kftabR">&gt;</a>'), t
}, webGameObj.getDatas = function() {
    var e = arguments[0],
        t = 0,
        a = 0,
        n = e.data,
        s = n.length;
    if ("[object Object]" === Object.prototype.toString.call(e)) return t = e.page * e.index, a = t + e.page, a > s && (a = s), n.slice(t, a)
}, webGameObj.jjkf = function() {
    var e = arguments.callee,
        t = function(e) {
            for (var t = "", a = 0, n = e.length, s = ""; n > a; a++) {
                var s = e[a].r ? "w-red" : "",
                    i = e[a].ne ? '<i class="w-icon"></i>' : "",
                    r = e[a].hot ? '<i class="w-icoh"></i>' : "";
                t += a ? '<div class="w-jjkftit ' + s + '"><span class="w-jjkf0">' + e[a].d + '</span><span class="w-jjkf1">' + e[a].t + '</span><span class="w-jjkf2">' + i + r + e[a].n + '</span><span class="w-jjkf3">' + e[a].f + '</span></div><div class="w-jjkfcons hidden"><a href="' + e[a].x + '" class="w-jjkfgw"><span><img src="' + e[a].i + '" alt="' + e[a].n + '"></span><em>' + e[a].d + "&nbsp;" + e[a].t + "<br>" + e[a].f + '</em></a><a href="' + e[a].x + '" class="w-jjkftx">开服提醒</a></div>' : '<div class="w-jjkftit ' + s + ' hidden"><span class="w-jjkf0">' + e[a].d + '</span><span class="w-jjkf1">' + e[a].t + '</span><span class="w-jjkf2">' + i + r + e[a].n + '</span><span class="w-jjkf3">' + e[a].f + '</span></div><div class="w-jjkfcons"><a href="' + e[a].x + '" class="w-jjkfgw"><span><img src="' + e[a].i + '" alt="' + e[a].n + '"></span><em>' + e[a].d + "&nbsp;" + e[a].t + "<br>" + e[a].f + '</em></a><a href="' + e[a].x + '" class="w-jjkftx">开服提醒</a></div>'
            }
            return t
        };
    e.onlypage = 10, $.ajax({
        url: "http://web.2144.cn/userApi/Server/1/",
        type: "post",
        async: !1,
        dataType: "jsonp",
        success: function(a) {
            e.datas = a, e.pages = webGameObj.pageShow({
                data: e.datas,
                ele: "#jjkfbtns",
                page: e.onlypage
            }), $("#jjkfbtns").delegate(".w-kftabL", "click", function() {
                if (1 == e.pages) return !1;
                var a = $("#jjkfbtns i"),
                    n = a.text() - 1,
                    s = e.pages - 1,
                    i = [];
                return n = n ? --n : s, a.text(n + 1), i = webGameObj.getDatas({
                    index: n,
                    page: e.onlypage,
                    data: e.datas
                }), $("#jjkfcons").html(t(i)), !1
            }).delegate(".w-kftabR", "click", function() {
                if (1 == e.pages) return !1;
                var a = $("#jjkfbtns i"),
                    n = a.text() - 1,
                    s = e.pages - 1,
                    i = [];
                return n = s > n ? ++n : 0, a.text(n + 1), i = webGameObj.getDatas({
                    index: n,
                    page: e.onlypage,
                    data: e.datas
                }), $("#jjkfcons").html(t(i)), !1
            })
        }
    })
}, webGameObj.newkf = function() {
    var e = arguments.callee,
        t = {
            content: "",
            time: "",
            advance: 0,
            url: "",
            icon: ""
        },
        a = function(e) {
            var t = new Date;
            if ("明天" == e) var a = new Date(t.getTime() + 864e5);
            else var a = new Date;
            var n = a.getFullYear(),
                s = a.getMonth() + 1,
                i = a.getDate(),
                r = (a.getHours(), a.getMinutes(), n + "-");
            return 10 > s && (r += "0"), r += s + "-", 10 > i && (r += "0"), r += i + " "
        },
        n = function(e) {
            for (var t = "", a = 0, n = e.length, s = ""; n > a; a++) {
                var s = e[a].r ? "w-red" : "",
                    i = e[a].ne ? '<i class="w-icon"></i>' : "",
                    r = e[a].hot ? '<i class="w-icoh"></i>' : "";
                t += a ? '<div class="w-jjkftit ' + s + '"><span class="w-jjkf0">' + e[a].d + '</span><span class="w-jjkf1">' + e[a].t + '</span><span class="w-jjkf2">' + i + r + e[a].n + '</span><span class="w-jjkf3">' + e[a].f + '</span></div><div class="w-jjkfcons hidden"><a href="' + e[a].x + '" class="w-jjkfgw"><span><img src="' + e[a].i + '" alt="' + e[a].n + '"></span><em>' + e[a].d + "&nbsp;" + e[a].t + "<br>" + e[a].f + '</em></a><a href="' + e[a].x + '" class="w-goplay">开始游戏</a></div>' : '<div class="w-jjkftit ' + s + ' hidden"><span class="w-jjkf0">' + e[a].d + '</span><span class="w-jjkf1">' + e[a].t + '</span><span class="w-jjkf2">' + i + r + e[a].n + '</span><span class="w-jjkf3">' + e[a].f + '</span></div><div class="w-jjkfcons"><a href="' + e[a].x + '" class="w-jjkfgw"><span><img src="' + e[a].i + '" alt="' + e[a].n + '"></span><em>' + e[a].d + "&nbsp;" + e[a].t + "<br>" + e[a].f + '</em></a><a href="' + e[a].x + '" class="w-goplay">开始游戏</a></div>'
            }
            return t
        };
    e.onlypage = 10, $.ajax({
        url: "http://web.2144.cn/userApi/Server/2/",
        type: "post",
        async: !1,
        dataType: "jsonp",
        success: function(t) {
            e.datas = t, e.pages = webGameObj.pageShow({
                data: e.datas,
                ele: "#newkfbtns",
                page: e.onlypage
            }), $("#newkfbtns").delegate(".w-kftabL", "click", function() {
                if (1 == e.pages) return !1;
                var t = $("#newkfbtns i"),
                    a = t.text() - 1,
                    s = e.pages - 1,
                    i = [];
                return a = a ? --a : s, t.text(a + 1), i = webGameObj.getDatas({
                    index: a,
                    page: e.onlypage,
                    data: e.datas
                }), $("#newkfcons").html(n(i)), !1
            }).delegate(".w-kftabR", "click", function() {
                if (1 == e.pages) return !1;
                var t = $("#newkfbtns i"),
                    a = t.text() - 1,
                    s = e.pages - 1,
                    i = [];
                return a = s > a ? ++a : 0, t.text(a + 1), i = webGameObj.getDatas({
                    index: a,
                    page: e.onlypage,
                    data: e.datas
                }), $("#newkfcons").html(n(i)), !1
            })
        }
    }), $("#jjkfcons").delegate(".w-jjkftx", "click", function() {
        var e = $(this).prev().attr("href"),
            n = $(this).prev().find("img").attr("alt"),
            s = $(this).parent().prev().find(".w-jjkf3").text(),
            i = $(this).parent().prev().find(".w-jjkf0").text(),
            r = $(this).parent().prev().find(".w-jjkf1").text();
        return t.content = "2144网页游戏提醒您：《" + n + "》" + s + "正在开启，点击进入游戏！", t.url = e, t.time = a(i) + r, window.open("http://qzs.qq.com/snsapp/app/bee/widget/open.htm#content=" + encodeURIComponent(t.content) + "&time=" + encodeURIComponent(t.time) + "&advance=" + t.advance + "&url=" + encodeURIComponent(t.url)), !1
    })
}, webGameObj.notices = function() {
    {
        var e = $("#w-notices"),
            t = e.height(),
            a = function() {
                var a = e.find("li").eq(0);
                a.animate({
                    "margin-top": "-" + t + "px"
                }, 300, function() {
                    a.appendTo(e).css("margin-top", 0)
                })
            };
        setInterval(a, 3e3)
    }
}, webGameObj.lazyLoad = function() {
    function e() {
        w = "BackCompat" == c.compatMode ? l : c.documentElement
    }
    function t() {
        for (var e = c.getElementsByTagName(d), t = 0, a = e.length; a > t; t++)"object" == typeof e[t] && e[t].getAttribute(p) && r.push(e[t]);
        for (var s = 0, f = r.length; f > s; s++) {
            var l = r[s],
                w = n(l);
            if (i[w]) i[w].push(s);
            else {
                var j = [];
                j[0] = s, i[w] = j, o++
            }
        }
    }
    function a() {
        if (o) {
            var e = l.scrollTop;
            0 == e && (e = c.documentElement.scrollTop);
            var t = window.MessageEvent && !document.getBoxObjectFor ? e : e,
                n = t + w.clientHeight;
            if (f == n) return void setTimeout(a, 200);
            f = n;
            var s = w.clientHeight + j,
                d = s + t,
                u = 0;
            for (var h in i) if (d > h) {
                for (var g = i[h], b = g.length, m = 0; b > m; m++) r[g[m]].src = r[g[m]].getAttribute(p), r[g[m]].removeAttribute(p), u++;
                delete i[h], o--
            }
            setTimeout(a, 200)
        }
    }
    function n(e) {
        if (1 != arguments.length || null == e) return null;
        for (var t = e.offsetTop, a = e.offsetParent; null !== a;) t += a.offsetTop, a = a.offsetParent;
        return t
    }
    function s() {
        e(), t(), a()
    }
    var i = {},
        r = [],
        o = 0,
        f = -1,
        c = document,
        l = c.body,
        w = null,
        d = "img",
        p = "a",
        j = 50;
    return {
        init: s
    }
}(), $("#w-tjyxbox").append('<a target="_self" class="w-leftbtn" href="#"></a><a target="_self" class="w-rightbtn" href="#"></a>'), $("#w-wjfcbox").append('<a target="_self" class="w-leftbtn" href="#"></a><a target="_self" class="w-rightbtn" href="#"></a>'), $("#w-tjyxbox").hover(function() {
    $(this).find(".w-leftbtn").show(), $(this).find(".w-rightbtn").show()
}, function() {
    $(this).find(".w-leftbtn").hide(), $(this).find(".w-rightbtn").hide()
}), $("#w-tjyxbox").delegate(".w-leftbtn", "click", function() {
    var e = $(window).width(),
        t = 1200 > e ? 2 : 3,
        a = $("#w-tjyxbox"),
        n = $("#w-tjyxbox ul"),
        s = $("#w-tjyxbox li").width(),
        i = 0;
    return n.css("left", -t * s), n.stop().animate({
        left: 0
    }, 200, function() {
        for (; t > i; i++) a.find("li:last").prependTo(n)
    }), !1
}).delegate(".w-rightbtn", "click", function() {
    var e = $(window).width(),
        t = 1200 > e ? 2 : 3,
        a = $("#w-tjyxbox"),
        n = $("#w-tjyxbox ul"),
        s = $("#w-tjyxbox li").width(),
        i = 0;
    return n.stop().animate({
        left: -t * s
    }, 200, function() {
        for (; t > i; i++) a.find("li:first").appendTo(n);
        n.css("left", 0)
    }), !1
}), $("#w-wjfcbox").delegate(".w-leftbtn", "click", function() {
    var e = $(window).width(),
        t = 1200 > e ? 4 : 5,
        a = $("#w-wjfcbox"),
        n = $("#w-wjfcbox ul"),
        s = $("#w-wjfcbox li").width(),
        i = 0;
    return n.css("left", -t * s), n.stop().animate({
        left: 0
    }, 200, function() {
        for (; t > i; i++) a.find("li:last").prependTo(n)
    }), !1
}).delegate(".w-rightbtn", "click", function() {
    var e = $(window).width(),
        t = 1200 > e ? 4 : 5,
        a = $("#w-wjfcbox"),
        n = $("#w-wjfcbox ul"),
        s = $("#w-wjfcbox li").width(),
        i = 0;
    return n.stop().animate({
        left: -t * s
    }, 200, function() {
        for (; t > i; i++) a.find("li:first").appendTo(n);
        n.css("left", 0)
    }), !1
}), webGameObj.gbTabFun = function() {
    var e = $("#allGames"),
        t = [],
        a = function() {
            var a = [];
            e.find("li").each(function(e) {
                var t = [];
                a[e] = [], a[e].push($(this).find("h3").text()), $(this).find("a").each(function(e) {
                    var a = $(this);
                    t[e] = [], t[e].push(a.attr("v")), t[e].push(a.attr("href")), t[e].push(a.find("img").attr("a") ? a.find("img").attr("a") : a.find("img").attr("src")), t[e].push(a.find("img").attr("alt"))
                }), a[e].push(t)
            }), t = a
        },
        n = function(a) {
            for (var n = "", s = 0, i = t.length; i > s; s++) {
                var r = a[s][1],
                    o = r.length,
                    f = "",
                    c = 0;
                if (o) {
                    for (; o > c; c++) f += '<a href="' + r[c][1] + '"><img alt="' + r[c][3] + '" src="' + r[c][2] + '">' + r[c][3] + "</a>";
                    n += "<li><h3>" + a[s][0] + '</h3><div class="gcons"><p>' + f + "</p></div>"
                }
            }
            e.html(n)
        };
    a(), $("#selecthand").delegate("i", "click", function() {
        var e = "cur",
            a = $(this).text(),
            s = t,
            i = [],
            r = "",
            o = s.length,
            f = 0;
        if ($(this).addClass(e).siblings().removeClass(e), "不限" == a) i = s;
        else for (r = a.toLowerCase(); o > f; f++) {
            i[f] = [], i[f].push(s[f][0]);
            for (var c = [], l = 0, w = s[f][1], d = w.length; d > l; l++) - 1 != r.search(w[l][0]) && c.push(w[l]);
            i[f].push(c)
        }
        n(i)
    })
}, webGameObj.focusFun(), webGameObj.jjkf(), webGameObj.newkf(), webGameObj.notices(), webGameObj.lazyLoad.init(), webGameObj.gbTabFun(), $(".w-jjkflist").delegate(".w-jjkftit", "mouseover", function() {
    var e = $(this),
        t = e.next(),
        a = t.find("img");
    e.hide().siblings(".w-jjkftit").show(), e.siblings(".w-jjkfcons").hide(), t.show(), a.attr("v") && (a.attr("src", a.attr("v")), a.removeAttr("v"))
}), $("#w-bzzxtab").delegate("span", "click", function() {
    var e = $(this).index(),
        t = "cur";
    $(this).addClass(t).siblings().removeClass(t), $("#w-bzzxcon > p").eq(e).show().siblings().hide()
});
var IndexUrl = window.location;
if (IndexUrl = IndexUrl.toString(), location.search.indexOf("pos") > 0 && IndexUrl.indexOf("web.2144.cn/?pos=") > 0) {
    var pos = getQueryString("pos");
    webComObj.iframeshow(1, pos), webComObj.backShow()
}