
function $(a) {
	return document.getElementById(a)
}

if (typeof deconcept == "undefined") {
	var deconcept = new Object()
}
if (typeof deconcept.util == "undefined") {
	deconcept.util = new Object()
}
if (typeof deconcept.SWFObjectUtil == "undefined") {
	deconcept.SWFObjectUtil = new Object()
}

deconcept.SWFObject = function(o, b, p, e, k, m, g, f, d, n, l) {
	if (!document.createElement || !document.getElementById) {
		return
	}
	this.DETECT_KEY = l ? l: "detectflash";
	this.skipDetect = true;
	this.params = new Object();
	this.variables = new Object();
	this.attributes = new Array();
	if (o) {
		this.setAttribute("swf", o)
	}
	if (b) {
		this.setAttribute("id", b)
	}
	if (p) {
		this.setAttribute("width", p)
	}
	if (e) {
		this.setAttribute("height", e)
	}
	if (k) {
		this.setAttribute("version", new deconcept.PlayerVersion(k.toString().split(".")))
	}
	this.installedVer = deconcept.SWFObjectUtil.getPlayerVersion(this.getAttribute("version"), g);
	if (m) {
		this.addParam("bgcolor", m)
	} else {
		this.addParam("wmode", "transparent")
	}
	var a = f ? f: "high";
	this.addParam("quality", a);
	this.setAttribute("useExpressInstall", g);
	this.setAttribute("doExpressInstall", false);
	var j = (d) ? d: window.location;
	this.setAttribute("xiRedirectUrl", j);
	this.setAttribute("redirectUrl", "");
	if (n) {
		this.setAttribute("redirectUrl", n)
	}
};


var EventUtil = new Object;
EventUtil.addEventHandler = function(b, c, a) {
	if (b.addEventListener) {
		b.addEventListener(c, a, false)
	} else {
		if (b.attachEvent) {
			b.attachEvent("on" + c, a)
		} else {
			b["on" + c] = a
		}
	}
};
EventUtil.removeEventHandler = function(b, c, a) {
	if (b.removeEventListener) {
		b.removeEventListener(c, a, false)
	} else {
		if (b.detachEvent) {
			b.detachEvent("on" + c, a)
		} else {
			b["on" + c] = null
		}
	}
};
ScrollCrossLeft = {
	interval: 0,
	count: 0,
	duration: 0,
	step: 0,
	srcObj: null,
	callback: null
};
ScrollCrossLeft.doit = function(h, e, k, j) {
	var f = ScrollCrossLeft;
	var a = g(f.count, e, k, j);
	h.style.marginLeft = a + "px";
	BigNews.currentBegin = a;
	f.count++;
	if (f.count == j) {
		clearInterval(f.interval);
		f.count = 0;
		h.style.marginLeft = e + k + "px";
		BigNews.currentBegin = e + k;
		f.callback()
	}
	function g(m, l, o, n) {
		return o * ((m = m / n - 1) * m * m + 1) + l
	}
};
ScrollCrossLeft2 = {
	interval: 0,
	count: 0,
	duration: 0,
	step: 0,
	srcObj: null,
	callback: null
};
ScrollCrossLeft2.doit_2 = function(g, a, j, h) {
	var e = ScrollCrossLeft2;
	g.style.marginLeft = f(e.count, a, j, h) + "px";
	e.count++;
	if (e.count == h) {
		clearInterval(e.interval);
		e.count = 0;
		g.style.marginLeft = a + j + "px";
		e.callback()
	}
	function f(l, k, n, m) {
		return n * ((l = l / m - 1) * l * l + 1) + k
	}
};
ScrollCrossLeft2.scroll = function(f, d, c, b, g, e) {
	var a = ScrollCrossLeft2;
	a.duration = e;
	a.callback = g;
	a.interval = setInterval(function() {
		a.doit_2(f, b, d * c, e)
	},
	10)
};
var B = BigNews = {
	current: 0,
	next: 0,
	scrollInterval: 0,
	autoScroller: 0,
	s: {},
	f: {},
	t: {},
	OnScrolling: false,
	preCss: "",
	currentBegin: 0
};
BigNews.turn = function(a, c) {
	if (a == BigNews.current) {
		return false
	}
	$("showDiv_" + a).style.zIndex++;
	if ($("bigpic_" + a).src == "./source/plugin/hsk_vcenter/include/gallery/images/img_default.gif") {
		try {
			setTimeout('$("bigpic_' + a + '").src = ScrollBigPic[' + a + "] ;", 50)
		} catch(b) {}
	}
	BigNews.fadeIn("showDiv_" + a, a, 50, c);
	BigNews.scroll(a, c)
};
BigNews.fadeIn = function(b, d, a, c) {
	try {
		clearInterval(BigNews.f.interval)
	} catch(h) {}
	var g = $(b);
	var f = 0;
	BigNews.f.interval = setInterval(function() {
		f += 20;
		g.style.filter = "alpha(opacity=" + f + ")";
		g.style.cssText = g.style.cssText.replace(/;-moz-opacity:.*?;/gi, "") + ";-moz-opacity:" + f * 0.01;
		g.style.cssText = g.style.cssText.replace(/;opacity:.*?;/gi, "") + ";opacity:" + f * 0.01;
		g.style.display = "block";
		if (f == 100) {
			for (var e = 0; e < c.totalcount; e++) {
				$("title_bg_" + e).style.cssText = "position:absolute;left:0;top:181px;float:none;width:688px;height:40px;background:#000;z-index:98;filter:alpha(opacity=40);opacity:0.4;z-index:98;filter:alpha(opacity=0);-moz-opacity:0;opacity:0";
				$("title_" + e).style.cssText = "position:absolute;left:10px;top:192px;font-size:14px;color:#fff;font-weight:normal;z-index:99;filter:alpha(opacity=0);-moz-opacity:0;opacity:0";
				BigNews.showTitles(d, c);
				$("showDiv_" + e).style.cssText = BigNews.preCss;
				if (e == d) {
					$("showDiv_" + e).style.display = "block"
				} else {
					$("showDiv_" + e).style.display = "none"
				}
				$("showDiv_" + d).style.zIndex = 0
			}
			BigNews.current = d;
			clearInterval(BigNews.f.interval)
		}
	},
	a)
};
BigNews.showTitles = function(b, a) {
	try {
		clearInterval(BigNews.t.interval)
	} catch(g) {}
	var f = $("title_" + b);
	var d = $("title_bg_" + b);
	var c = 0;
	BigNews.t.interval = setInterval(function() {
		c += 20;
		f.style.filter = "alpha(opacity=" + c + ")";
		f.style.cssText = f.style.cssText.replace(/;-moz-opacity:.*?;/gi, "") + ";-moz-opacity:" + c * 0.01;
		f.style.cssText = f.style.cssText.replace(/;opacity:.*?;/gi, "") + ";opacity:" + c * 0.01;
		d.style.filter = "alpha(opacity=" + c * 0.4 + ")";
		d.style.cssText = d.style.cssText.replace(/;-moz-opacity:.*?;/gi, "") + ";-moz-opacity:" + c * 0.01 * 0.4;
		d.style.cssText = d.style.cssText.replace(/;opacity:.*?;/gi, "") + ";opacity:" + c * 0.01 * 0.4;
		if (c == 100) {
			clearInterval(BigNews.t.interval)
		}
	},
	20)
};
BigNews.scroll = function(k, h) {
	var j = 0;
	var a = h.step;
	var g = 16;
	var n = BigNews;
	n.next = k;
	if (k != n.current && j > g / 8) {
		return
	}
	try {
		clearInterval(BigNews.s.interval)
	} catch(m) {}
	var d = $(h.hover).scrollLeft;
	var l = o * a + (n.current * a - d);
	BigNews.s.duration = g;
	BigNews.s.callback = c;
	var f = parseInt(BigNews.currentBegin);
	var o = k * a - f;
	BigNews.s.interval = setInterval(function() {
		BigNews.s.doit($(h.hover), f, o, g)
	},
	8);
	function c() {}
};
BigNews.auto = function(a) {
	clearInterval(BigNews.autoScroller);
	BigNews.autoScroller = setInterval(function() {
		BigNews.turn(BigNews.current == (a.totalcount - 1) ? 0 : BigNews.current + 1, a)
	},
	a.autotimeintval)
};
BigNews.pauseSwitch = function() {
	clearTimeout(BigNews.autoScroller)
};
BigNews.showNext = function(b, a) {
	if (b >= MovieRecom.totalcount - 1) {
		return false
	} else {
		BigNews.pauseSwitch();
		BigNews.turn(b + 1, a);
		BigNews.auto(a)
	}
};
BigNews.showPre = function(b, a) {
	if (b <= 0) {
		return false
	} else {
		BigNews.pauseSwitch();
		BigNews.turn(b - 1, a);
		BigNews.auto(a)
	}
};
BigNews.init = function(a) {
	BigNews.s = ScrollCrossLeft;
	BigNews.preCss = a.css;
	EventUtil.addEventHandler($(a.bigpic), "mouseover", new Function("BigNews.pauseSwitch();"));
	EventUtil.addEventHandler($(a.bigpic), "mouseout", new Function("BigNews.auto(" + a.objname + ");"));
	for (i = 0; i < a.totalcount; i++) {
		if (a.smallpic != null && a.smallpic != "") {
			EventUtil.addEventHandler($(a.smallpic + "_" + i), "mouseover", new Function("BigNews.pauseSwitch();BigNews.turn(" + i + "," + a.objname + ");return false;"));
			EventUtil.addEventHandler($(a.smallpic + "_" + i), "mouseout", new Function("BigNews.auto(" + a.objname + ");"))
		}
	}
	BigNews.showTitles(0, a);
	BigNews.auto(a)
};