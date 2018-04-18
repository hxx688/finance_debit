!
function(e, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.wangEditor = t()
} (this,
function() {
    "use strict";
    function e(e) {
        var t = void 0;
        return t = document.createElement("div"),
        t.innerHTML = e,
        t.children
    }
    function t(e) {
        return !! e && (e instanceof HTMLCollection || e instanceof NodeList)
    }
    function n(e) {
        var n = document.querySelectorAll(e);
        return t(n) ? n: [n]
    }
    function i(o) {
        if (o) {
            if (o instanceof i) return o;
            this.selector = o;
            var A = [];
            1 === o.nodeType ? A = [o] : t(o) ? A = o: "string" == typeof o && (o = o.replace("/\n/mg", "").trim(), A = 0 === o.indexOf("<") ? e(o) : n(o));
            var r = A.length;
            if (!r) return this;
            var c = void 0;
            for (c = 0; c < r; c++) this[c] = A[c];
            this.length = r
        }
    }
    function o(e) {
        return new i(e)
    }
    function A(e, t) {
        var n = void 0;
        for (n in e) if (e.hasOwnProperty(n) && !1 === t.call(e, n, e[n])) break
    }
    function r(e, t) {
        var n = void 0,
        i = void 0,
        o = e.length || 0;
        for (n = 0; n < o && (i = e[n], !1 !== t.call(e, i, n)); n++);
    }
    function c(e) {
        return e + Math.random().toString().slice(2)
    }
    function a(e) {
        return null == e ? "": e.replace(/</gm, "&lt;").replace(/>/gm, "&gt;").replace(/"/gm, "&quot;")
    }
    function s(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-bold"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function l(e, t) {
        var n = this,
        i = e.editor;
        this.menu = e,
        this.opt = t;
        var A = o('<div class="w-e-droplist"></div>'),
        r = t.$title,
        c = void 0;
        r && (c = r.html(), c = P(i, c), r.html(c), r.addClass("w-e-dp-title"), A.append(r));
        var a = t.list || [],
        s = t.type || "list",
        l = t.onClick || j,
        d = o('<ul class="' + ("list" === s ? "w-e-list": "w-e-block") + '"></ul>');
        A.append(d),
        a.forEach(function(e) {
            var t = e.$elem,
            A = t.html();
            A = P(i, A),
            t.html(A);
            var r = e.value,
            c = o('<li class="w-e-item"></li>');
            t && (c.append(t), d.append(c), t.on("click",
            function(e) {
                l(r),
                n.hideTimeoutId = setTimeout(function() {
                    n.hide()
                },
                0)
            }))
        }),
        A.on("mouseleave",
        function(e) {
            n.hideTimeoutId = setTimeout(function() {
                n.hide()
            },
            0)
        }),
        this.$container = A,
        this._rendered = !1,
        this._show = !1
    }
    function d(e) {
        var t = this;
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-header"><i/></div>'),
        this.type = "droplist",
        this._active = !1,
        this.droplist = new l(this, {
            width: 100,
            $title: o("<p>设置标题</p>"),
            type: "list",
            list: [{
                $elem: o("<h1>H1</h1>"),
                value: "<h1>"
            },
            {
                $elem: o("<h2>H2</h2>"),
                value: "<h2>"
            },
            {
                $elem: o("<h3>H3</h3>"),
                value: "<h3>"
            },
            {
                $elem: o("<h4>H4</h4>"),
                value: "<h4>"
            },
            {
                $elem: o("<h5>H5</h5>"),
                value: "<h5>"
            },
            {
                $elem: o("<p>正文</p>"),
                value: "<p>"
            }],
            onClick: function(e) {
                t._command(e)
            }
        })
    }
    function u(e, t) {
        this.menu = e,
        this.opt = t
    }
    function h(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-link"><i/></div>'),
        this.type = "panel",
        this._active = !1
    }
    function p(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-italic"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function f(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-redo"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function g(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-strikethrough"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function m(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-underline"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function w(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-undo"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function v(e) {
        var t = this;
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-list2"><i/></div>'),
        this.type = "droplist",
        this._active = !1,
        this.droplist = new l(this, {
            width: 120,
            $title: o("<p>设置列表</p>"),
            type: "list",
            list: [{
                $elem: o('<span><i class="w-e-icon-list-numbered"></i> 有序列表</span>'),
                value: "insertOrderedList"
            },
            {
                $elem: o('<span><i class="w-e-icon-list2"></i> 无序列表</span>'),
                value: "insertUnorderedList"
            }],
            onClick: function(e) {
                t._command(e)
            }
        })
    }
    function b(e) {
        var t = this;
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-paragraph-left"><i/></div>'),
        this.type = "droplist",
        this._active = !1,
        this.droplist = new l(this, {
            width: 100,
            $title: o("<p>对齐方式</p>"),
            type: "list",
            list: [{
                $elem: o('<span><i class="w-e-icon-paragraph-left"></i> 靠左</span>'),
                value: "justifyLeft"
            },
            {
                $elem: o('<span><i class="w-e-icon-paragraph-center"></i> 居中</span>'),
                value: "justifyCenter"
            },
            {
                $elem: o('<span><i class="w-e-icon-paragraph-right"></i> 靠右</span>'),
                value: "justifyRight"
            }],
            onClick: function(e) {
                t._command(e)
            }
        })
    }
    function E(e) {
        var t = this;
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-pencil2"><i/></div>'),
        this.type = "droplist",
        this._active = !1,
        this.droplist = new l(this, {
            width: 120,
            $title: o("<p>文字颜色</p>"),
            type: "inline-block",
            list: [{
                $elem: o('<i style="color:#000000;" class="w-e-icon-pencil2"></i>'),
                value: "#000000"
            },
            {
                $elem: o('<i style="color:#eeece0;" class="w-e-icon-pencil2"></i>'),
                value: "#eeece0"
            },
            {
                $elem: o('<i style="color:#1c487f;" class="w-e-icon-pencil2"></i>'),
                value: "#1c487f"
            },
            {
                $elem: o('<i style="color:#4d80bf;" class="w-e-icon-pencil2"></i>'),
                value: "#4d80bf"
            },
            {
                $elem: o('<i style="color:#c24f4a;" class="w-e-icon-pencil2"></i>'),
                value: "#c24f4a"
            },
            {
                $elem: o('<i style="color:#8baa4a;" class="w-e-icon-pencil2"></i>'),
                value: "#8baa4a"
            },
            {
                $elem: o('<i style="color:#7b5ba1;" class="w-e-icon-pencil2"></i>'),
                value: "#7b5ba1"
            },
            {
                $elem: o('<i style="color:#46acc8;" class="w-e-icon-pencil2"></i>'),
                value: "#46acc8"
            },
            {
                $elem: o('<i style="color:#f9963b;" class="w-e-icon-pencil2"></i>'),
                value: "#f9963b"
            },
            {
                $elem: o('<i style="color:#ffffff;" class="w-e-icon-pencil2"></i>'),
                value: "#ffffff"
            }],
            onClick: function(e) {
                t._command(e)
            }
        })
    }
    function y(e) {
        var t = this;
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-paint-brush"><i/></div>'),
        this.type = "droplist",
        this._active = !1,
        this.droplist = new l(this, {
            width: 120,
            $title: o("<p>背景色</p>"),
            type: "inline-block",
            list: [{
                $elem: o('<i style="color:#000000;" class="w-e-icon-paint-brush"></i>'),
                value: "#000000"
            },
            {
                $elem: o('<i style="color:#eeece0;" class="w-e-icon-paint-brush"></i>'),
                value: "#eeece0"
            },
            {
                $elem: o('<i style="color:#1c487f;" class="w-e-icon-paint-brush"></i>'),
                value: "#1c487f"
            },
            {
                $elem: o('<i style="color:#4d80bf;" class="w-e-icon-paint-brush"></i>'),
                value: "#4d80bf"
            },
            {
                $elem: o('<i style="color:#c24f4a;" class="w-e-icon-paint-brush"></i>'),
                value: "#c24f4a"
            },
            {
                $elem: o('<i style="color:#8baa4a;" class="w-e-icon-paint-brush"></i>'),
                value: "#8baa4a"
            },
            {
                $elem: o('<i style="color:#7b5ba1;" class="w-e-icon-paint-brush"></i>'),
                value: "#7b5ba1"
            },
            {
                $elem: o('<i style="color:#46acc8;" class="w-e-icon-paint-brush"></i>'),
                value: "#46acc8"
            },
            {
                $elem: o('<i style="color:#f9963b;" class="w-e-icon-paint-brush"></i>'),
                value: "#f9963b"
            },
            {
                $elem: o('<i style="color:#ffffff;" class="w-e-icon-paint-brush"></i>'),
                value: "#ffffff"
            }],
            onClick: function(e) {
                t._command(e)
            }
        })
    }
    function B(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-quotes-left"><i/>\n        </div>'),
        this.type = "click",
        this._active = !1
    }
    function C(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-terminal"><i/>\n        </div>'),
        this.type = "panel",
        this._active = !1
    }
    function x(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu">\n            <i class="w-e-icon-happy"><i/>\n        </div>'),
        this.type = "panel",
        this._active = !1
    }
    function I(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-table2"><i/></div>'),
        this.type = "panel",
        this._active = !1
    }
    function Q(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-play"><i/></div>'),
        this.type = "panel",
        this._active = !1
    }
    function D(e) {
        this.editor = e,
        this.$elem = o('<div class="w-e-menu"><i class="w-e-icon-image"><i/></div>'),
        this.type = "panel",
        this._active = !1
    }
    function M(e) {
        this.editor = e,
        this.menus = {}
    }
    function k(e) {
        var t = e.clipboardData || e.originalEvent && e.originalEvent.clipboardData,
        n = void 0;
        return n = null == t ? window.clipboardData && window.clipboardData.getData("text") : t.getData("text/plain"),
        a(n)
    }
    function U(e) {
        var t = e.clipboardData || e.originalEvent && e.originalEvent.clipboardData,
        n = void 0,
        i = void 0;
        if (null == t ? n = window.clipboardData && window.clipboardData.getData("text") : (n = t.getData("text/plain"), i = t.getData("text/html")), !i && n && (i = "<p>" + a(n) + "</p>"), i) {
            var o = i.split("</html>");
            return 2 === o.length && (i = o[0]),
            i = i.replace(/<(meta|script|link).+?>/gim, ""),
            i = i.replace(/\s?(class|style)=('|").+?('|")/gim, "")
        }
    }
    function _(e) {
        var t = [];
        if (k(e)) return t;
        var n = e.clipboardData || e.originalEvent && e.originalEvent.clipboardData || {},
        i = n.items;
        return i ? (A(i,
        function(e, n) {
            var i = n.type;
            /image/i.test(i) && t.push(n.getAsFile())
        }), t) : t
    }
    function S(e) {
        this.editor = e
    }
    function R(e) {
        this.editor = e
    }
    function F(e) {
        this.editor = e,
        this._currentRange = null
    }
    function N(e) {
        this.editor = e,
        this._time = 0,
        this._isShow = !1,
        this._isRender = !1,
        this._timeoutId = 0,
        this.$textContainer = e.$textContainerElem,
        this.$bar = o('<div class="w-e-progress"></div>')
    }
    function T(e) {
        this.editor = e
    }
    function H(e, t) {
        if (null == e) throw new Error("错误：初始化编辑器时候未传入任何参数，请查阅文档");
        this.id = "wangEditor-" + O++,
        this.toolbarSelector = e,
        this.textSelector = t,
        this.customConfig = {}
    }
    i.prototype = {
        constructor: i,
        forEach: function(e) {
            var t = void 0;
            for (t = 0; t < this.length; t++) {
                var n = this[t];
                if (!1 === e.call(n, n, t)) break
            }
            return this
        },
        get: function(e) {
            var t = this.length;
            return e >= t && (e %= t),
            o(this[e])
        },
        first: function() {
            return this.get(0)
        },
        last: function() {
            var e = this.length;
            return this.get(e - 1)
        },
        on: function(e, t, n) {
            n || (n = t, t = null);
            var i = [];
            return i = e.split(/\s+/),
            this.forEach(function(e) {
                i.forEach(function(i) {
                    if (i) return t ? void e.addEventListener(i,
                    function(e) {
                        var i = e.target;
                        i.matches(t) && n.call(i, e)
                    },
                    !1) : void e.addEventListener(i, n, !1)
                })
            })
        },
        off: function(e, t) {
            return this.forEach(function(n) {
                n.removeEventListener(e, t, !1)
            })
        },
        attr: function(e, t) {
            return null == t ? this[0].getAttribute(e) : this.forEach(function(n) {
                n.setAttribute(e, t)
            })
        },
        addClass: function(e) {
            return e ? this.forEach(function(t) {
                var n = void 0;
                t.className ? (n = t.className.split(/\s/), n = n.filter(function(e) {
                    return !! e.trim()
                }), n.indexOf(e) < 0 && n.push(e), t.className = n.join(" ")) : t.className = e
            }) : this
        },
        removeClass: function(e) {
            return e ? this.forEach(function(t) {
                var n = void 0;
                t.className && (n = t.className.split(/\s/), n = n.filter(function(t) {
                    return ! (! (t = t.trim()) || t === e)
                }), t.className = n.join(" "))
            }) : this
        },
        css: function(e, t) {
            var n = e + ":" + t + ";";
            return this.forEach(function(t) {
                var i = (t.getAttribute("style") || "").trim(),
                o = void 0,
                A = [];
                i ? (o = i.split(";"), o.forEach(function(e) {
                    var t = e.split(":").map(function(e) {
                        return e.trim()
                    });
                    2 === t.length && A.push(t[0] + ":" + t[1])
                }), A = A.map(function(t) {
                    return 0 === t.indexOf(e) ? n: t
                }), A.indexOf(n) < 0 && A.push(n), t.setAttribute("style", A.join("; "))) : t.setAttribute("style", n)
            })
        },
        show: function() {
            return this.css("display", "block")
        },
        hide: function() {
            return this.css("display", "none")
        },
        children: function() {
            var e = this[0];
            return e ? o(e.children) : null
        },
        append: function(e) {
            return this.forEach(function(t) {
                e.forEach(function(e) {
                    t.appendChild(e)
                })
            })
        },
        remove: function() {
            return this.forEach(function(e) {
                if (e.remove) e.remove();
                else {
                    var t = e.parentElement;
                    t && t.removeChild(e)
                }
            })
        },
        isContain: function(e) {
            var t = this[0],
            n = e[0];
            return t.contains(n)
        },
        getSizeData: function() {
            return this[0].getBoundingClientRect()
        },
        getNodeName: function() {
            return this[0].nodeName
        },
        find: function(e) {
            return o(this[0].querySelectorAll(e))
        },
        text: function(e) {
            return e ? this.forEach(function(t) {
                t.innerHTML = e
            }) : this[0].innerHTML.replace(/<.*?>/g,
            function() {
                return ""
            })
        },
        html: function(e) {
            var t = this[0];
            return null == e ? t.innerHTML: (t.innerHTML = e, this)
        },
        val: function() {
            return this[0].value.trim()
        },
        focus: function() {
            return this.forEach(function(e) {
                e.focus()
            })
        },
        parent: function() {
            return o(this[0].parentElement)
        },
        parentUntil: function(e, t) {
            var n = document.querySelectorAll(e),
            i = n.length;
            if (!i) return null;
            var A = t || this[0];
            if ("BODY" === A.nodeName) return null;
            var r = A.parentElement,
            c = void 0;
            for (c = 0; c < i; c++) if (r === n[c]) return o(r);
            return this.parentUntil(e, r)
        },
        equal: function(e) {
            return 1 === e.nodeType ? this[0] === e: this[0] === e[0]
        },
        insertBefore: function(e) {
            var t = o(e),
            n = t[0];
            return n ? this.forEach(function(e) {
                n.parentNode.insertBefore(e, n)
            }) : this
        },
        insertAfter: function(e) {
            var t = o(e),
            n = t[0];
            return n ? this.forEach(function(e) {
                var t = n.parentNode;
                t.lastChild === n ? t.appendChild(e) : t.insertBefore(e, n.nextSibling)
            }) : this
        }
    };
    var Y = {
        menus: ["head", "bold", "italic", "underline", "strikeThrough", "foreColor", "backColor", "link", "list", "justify", "quote", "emoticon", "image", "table", "video", "code", "undo", "redo"],
        zIndex: 1e4,
        debug: !1,
        showLinkImg: !0,
        uploadImgMaxSize: 5242880,
        uploadImgShowBase64: !1,
        uploadFileName: "",
        uploadImgParams: {
            token: "abcdef12345"
        },
        uploadImgHeaders: {},
        withCredentials: !1,
        uploadImgTimeout: 5e3,
        uploadImgHooks: {
            before: function(e, t, n) {},
            success: function(e, t, n) {},
            fail: function(e, t, n) {},
            error: function(e, t) {},
            timeout: function(e, t) {}
        }
    },
    L = {
        _ua: navigator.userAgent,
        isWebkit: function() {
            return /webkit/i.test(this._ua)
        },
        isIE: function() {
            return "ActiveXObject" in window
        }
    };
    s.prototype = {
        constructor: s,
        onClick: function(e) {
            var t = this.editor,
            n = t.selection.isSelectionEmpty();
            n && t.selection.createEmptyRange(),
            t.cmd.do("bold"),
            n && (t.selection.collapseRange(), t.selection.restoreSelection())
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem;
            t.cmd.queryCommandState("bold") ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    };
    var P = function(e, t) {
        var n = e.config.langArgs || [],
        i = t;
        return n.forEach(function(e) {
            var t = e.reg,
            n = e.val;
            t.test(i) && (i = i.replace(t,
            function() {
                return n
            }))
        }),
        i
    },
    j = function() {};
    l.prototype = {
        constructor: l,
        show: function() {
            this.hideTimeoutId && clearTimeout(this.hideTimeoutId);
            var e = this.menu,
            t = e.$elem,
            n = this.$container;
            if (!this._show) {
                if (this._rendered) n.show();
                else {
                    var i = t.getSizeData().height || 0,
                    o = this.opt.width || 100;
                    n.css("margin-top", i + "px").css("width", o + "px"),
                    t.append(n),
                    this._rendered = !0
                }
                this._show = !0
            }
        },
        hide: function() {
            this.showTimeoutId && clearTimeout(this.showTimeoutId);
            var e = this.$container;
            this._show && (e.hide(), this._show = !1)
        }
    },
    d.prototype = {
        constructor: d,
        _command: function(e) {
            this.editor.cmd.do("formatBlock", e)
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem,
            i = /^h/i,
            o = t.cmd.queryCommandValue("formatBlock");
            i.test(o) ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    };
    var z = function() {},
    $ = [];
    u.prototype = {
        constructor: u,
        show: function() {
            var e = this,
            t = this.menu;
            if (! ($.indexOf(t) >= 0)) {
                var n = t.editor,
                i = o("body"),
                A = n.$textContainerElem,
                r = this.opt,
                c = o('<div class="w-e-panel-container"></div>'),
                a = r.width || 300;
                c.css("width", a + "px").css("margin-left", (0 - a) / 2 + "px");
                var s = o('<i class="w-e-icon-close w-e-panel-close"></i>');
                c.append(s),
                s.on("click",
                function() {
                    e.hide()
                });
                var l = o('<ul class="w-e-panel-tab-title"></ul>'),
                d = o('<div class="w-e-panel-tab-content"></div>');
                c.append(l).append(d);
                var u = r.height;
                u && d.css("height", u + "px").css("overflow-y", "auto");
                var h = r.tabs || [],
                p = [],
                f = [];
                h.forEach(function(e, t) {
                    if (e) {
                        var i = e.title || "",
                        A = e.tpl || "";
                        i = P(n, i),
                        A = P(n, A);
                        var r = o('<li class="w-e-item">' + i + "</li>");
                        l.append(r);
                        var c = o(A);
                        d.append(c),
                        r._index = t,
                        p.push(r),
                        f.push(c),
                        0 === t ? (r._active = !0, r.addClass("w-e-active")) : c.hide(),
                        r.on("click",
                        function(e) {
                            r._active || (p.forEach(function(e) {
                                e._active = !1,
                                e.removeClass("w-e-active")
                            }), f.forEach(function(e) {
                                e.hide()
                            }), r._active = !0, r.addClass("w-e-active"), c.show())
                        })
                    }
                }),
                c.on("click",
                function(e) {
                    e.stopPropagation()
                }),
                i.on("click",
                function(t) {
                    e.hide()
                }),
                A.append(c),
                h.forEach(function(t, n) {
                    if (t) { (t.events || []).forEach(function(t) {
                            var i = t.selector,
                            o = t.type,
                            A = t.fn || z;
                            f[n].find(i).on(o,
                            function(t) {
                                t.stopPropagation(),
                                A(t) && e.hide()
                            })
                        })
                    }
                });
                var g = c.find("input[type=text],textarea");
                g.length && g.get(0).focus(),
                this.$container = c,
                this._hideOtherPanels(),
                $.push(t)
            }
        },
        hide: function() {
            var e = this.menu,
            t = this.$container;
            t && t.remove(),
            $ = $.filter(function(t) {
                return t !== e
            })
        },
        _hideOtherPanels: function() {
            $.length && $.forEach(function(e) {
                var t = e.panel || {};
                t.hide && t.hide()
            })
        }
    },
    h.prototype = {
        constructor: h,
        onClick: function(e) {
            var t = this.editor,
            n = void 0;
            if (this._active) {
                if (! (n = t.selection.getSelectionContainerElem())) return;
                t.selection.createRangeByElem(n),
                t.selection.restoreSelection(),
                this._createPanel(n.text(), n.attr("href"))
            } else t.selection.isSelectionEmpty() ? this._createPanel("", "") : this._createPanel(t.selection.getSelectionText(), "")
        },
        _createPanel: function(e, t) {
            var n = this,
            i = c("input-link"),
            A = c("input-text"),
            r = c("btn-ok"),
            a = c("btn-del"),
            s = this._active ? "inline-block": "none",
            l = new u(this, {
                width: 300,
                tabs: [{
                    title: "链接",
                    tpl: '<div>\n                            <input id="' + A + '" type="text" class="block" value="' + e + '" placeholder="链接文字"/></td>\n                            <input id="' + i + '" type="text" class="block" value="' + t + '" placeholder="http://..."/></td>\n                            <div class="w-e-button-container">\n                                <button id="' + r + '" class="right">插入</button>\n                                <button id="' + a + '" class="gray right" style="display:' + s + '">删除链接</button>\n                            </div>\n                        </div>',
                    events: [{
                        selector: "#" + r,
                        type: "click",
                        fn: function() {
                            var e = o("#" + i),
                            t = o("#" + A),
                            r = e.val(),
                            c = t.val();
                            return n._insertLink(c, r),
                            !0
                        }
                    },
                    {
                        selector: "#" + a,
                        type: "click",
                        fn: function() {
                            return n._delLink(),
                            !0
                        }
                    }]
                }]
            });
            l.show(),
            this.panel = l
        },
        _delLink: function() {
            if (this._active) {
                var e = this.editor;
                if (e.selection.getSelectionContainerElem()) {
                    var t = e.selection.getSelectionText();
                    e.cmd.do("insertHTML", "<span>" + t + "</span>")
                }
            }
        },
        _insertLink: function(e, t) {
            if (e && t) {
                this.editor.cmd.do("insertHTML", '<a href="' + t + '" target="_blank">' + e + "</a>")
            }
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem,
            i = t.selection.getSelectionContainerElem();
            i && ("A" === i.getNodeName() ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active")))
        }
    },
    p.prototype = {
        constructor: p,
        onClick: function(e) {
            var t = this.editor,
            n = t.selection.isSelectionEmpty();
            n && t.selection.createEmptyRange(),
            t.cmd.do("italic"),
            n && (t.selection.collapseRange(), t.selection.restoreSelection())
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem;
            t.cmd.queryCommandState("italic") ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    },
    f.prototype = {
        constructor: f,
        onClick: function(e) {
            this.editor.cmd.do("redo")
        }
    },
    g.prototype = {
        constructor: g,
        onClick: function(e) {
            var t = this.editor,
            n = t.selection.isSelectionEmpty();
            n && t.selection.createEmptyRange(),
            t.cmd.do("strikeThrough"),
            n && (t.selection.collapseRange(), t.selection.restoreSelection())
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem;
            t.cmd.queryCommandState("strikeThrough") ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    },
    m.prototype = {
        constructor: m,
        onClick: function(e) {
            var t = this.editor,
            n = t.selection.isSelectionEmpty();
            n && t.selection.createEmptyRange(),
            t.cmd.do("underline"),
            n && (t.selection.collapseRange(), t.selection.restoreSelection())
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem;
            t.cmd.queryCommandState("underline") ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    },
    w.prototype = {
        constructor: w,
        onClick: function(e) {
            this.editor.cmd.do("undo")
        }
    },
    v.prototype = {
        constructor: v,
        _command: function(e) {
            var t = this.editor,
            n = t.$textElem;
            if (t.selection.restoreSelection(), !t.cmd.queryCommandState(e)) {
                t.cmd.do(e);
                var i = t.selection.getSelectionContainerElem();
                if ("LI" === i.getNodeName() && (i = i.parent()), !1 !== /^ol|ul$/i.test(i.getNodeName()) && !i.equal(n)) {
                    var o = i.parent();
                    o.equal(n) || (i.insertAfter(o), o.remove())
                }
            }
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem;
            t.cmd.queryCommandState("insertUnOrderedList") || t.cmd.queryCommandState("insertOrderedList") ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    },
    b.prototype = {
        constructor: b,
        _command: function(e) {
            this.editor.cmd.do(e)
        }
    },
    E.prototype = {
        constructor: E,
        _command: function(e) {
            this.editor.cmd.do("foreColor", e)
        }
    },
    y.prototype = {
        constructor: y,
        _command: function(e) {
            this.editor.cmd.do("backColor", e)
        }
    },
    B.prototype = {
        constructor: B,
        onClick: function(e) {
            this.editor.cmd.do("formatBlock", "<BLOCKQUOTE>")
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem,
            i = /^BLOCKQUOTE$/i,
            o = t.cmd.queryCommandValue("formatBlock");
            i.test(o) ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    },
    C.prototype = {
        constructor: C,
        onClick: function(e) {
            var t = this.editor,
            n = t.selection.getSelectionStartElem(),
            i = t.selection.getSelectionEndElem(),
            A = t.selection.isSelectionEmpty(),
            r = t.selection.getSelectionText(),
            c = void 0;
            return n.equal(i) ? A ? void(this._active ? this._createPanel(n.html()) : this._createPanel()) : (c = o("<code>" + r + "</code>"), t.cmd.do("insertElem", c), t.selection.createRangeByElem(c, !1), void t.selection.restoreSelection()) : void t.selection.restoreSelection()
        },
        _createPanel: function(e) {
            var t = this;
            e = e || "";
            var n = e ? "edit": "new",
            i = c("texxt"),
            A = c("btn"),
            r = new u(this, {
                width: 500,
                tabs: [{
                    title: "插入代码",
                    tpl: '<div>\n                        <textarea id="' + i + '" style="height:145px;;">' + e + '</textarea>\n                        <div class="w-e-button-container">\n                            <button id="' + A + '" class="right">插入</button>\n                        </div>\n                    <div>',
                    events: [{
                        selector: "#" + A,
                        type: "click",
                        fn: function() {
                            var e = o("#" + i),
                            A = e.val() || e.html();
                            return A = a(A),
                            "new" === n ? t._insertCode(A) : t._updateCode(A),
                            !0
                        }
                    }]
                }]
            });
            r.show(),
            this.panel = r
        },
        _insertCode: function(e) {
            this.editor.cmd.do("insertHTML", "<pre><code>" + e + "</code></pre><p><br></p>")
        },
        _updateCode: function(e) {
            var t = this.editor,
            n = t.selection.getSelectionContainerElem();
            n && (n.html(e), t.selection.restoreSelection())
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem,
            i = t.selection.getSelectionContainerElem();
            if (i) {
                var o = i.parent();
                "CODE" === i.getNodeName() && "PRE" === o.getNodeName() ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
            }
        }
    },
    x.prototype = {
        constructor: x,
        onClick: function() {
            this._createPanel()
        },
        _createPanel: function() {
            var e = this,
            t = "";
            "😀 😃 😄 😁 😆 😅 😂  😊 😇 🙂 🙃 😉 😌 😍 😘 😗 😙 😚 😋 😜 😝 😛 🤑 🤗 🤓 😎 😏 😒 😞 😔 😟 😕 🙁  😣 😖 😫 😩 😤 😠 😡 😶 😐 😑 😯 😦 😧 😮 😲 😵 😳 😱 😨 😰 😢 😥 😭 😓 😪 😴 🙄 🤔 😬 🤐".split(/\s/).forEach(function(e) {
                e && (t += '<span class="w-e-item">' + e + "</span>")
            });
            var n = "";
            "🙌 👏 👋 👍 👎 👊 ✊ ️👌 ✋ 👐 💪 🙏 ️👆 👇 👈 👉 🖕 🖐 🤘 🖖".split(/\s/).forEach(function(e) {
                e && (n += '<span class="w-e-item">' + e + "</span>")
            });
            var i = new u(this, {
                width: 300,
                height: 200,
                tabs: [{
                    title: "表情",
                    tpl: '<div class="w-e-emoticon-container">' + t + "</div>",
                    events: [{
                        selector: "span.w-e-item",
                        type: "click",
                        fn: function(t) {
                            var n = t.target;
                            return e._insert(n.innerHTML),
                            !0
                        }
                    }]
                },
                {
                    title: "手势",
                    tpl: '<div class="w-e-emoticon-container">' + n + "</div>",
                    events: [{
                        selector: "span.w-e-item",
                        type: "click",
                        fn: function(t) {
                            var n = t.target;
                            return e._insert(n.innerHTML),
                            !0
                        }
                    }]
                }]
            });
            i.show(),
            this.panel = i
        },
        _insert: function(e) {
            this.editor.cmd.do("insertHTML", "<span>" + e + "</span>")
        }
    },
    I.prototype = {
        constructor: I,
        onClick: function() {
            this._active ? this._createEditPanel() : this._createInsertPanel()
        },
        _createInsertPanel: function() {
            var e = this,
            t = c("btn"),
            n = c("row"),
            i = c("col"),
            A = new u(this, {
                width: 250,
                tabs: [{
                    title: "插入表格",
                    tpl: '<div>\n                        <p style="text-align:left; padding:5px 0;">\n                            创建\n                            <input id="' + n + '" type="text" value="5" style="width:40px;text-align:center;"/>\n                            行\n                            <input id="' + i + '" type="text" value="5" style="width:40px;text-align:center;"/>\n                            列的表格\n                        </p>\n                        <div class="w-e-button-container">\n                            <button id="' + t + '" class="right">插入</button>\n                        </div>\n                    </div>',
                    events: [{
                        selector: "#" + t,
                        type: "click",
                        fn: function() {
                            var t = parseInt(o("#" + n).val()),
                            A = parseInt(o("#" + i).val());
                            return t && A && t > 0 && A > 0 && e._insert(t, A),
                            !0
                        }
                    }]
                }]
            });
            A.show(),
            this.panel = A
        },
        _insert: function(e, t) {
            var n = void 0,
            i = void 0,
            o = '<table border="0" width="100%" cellpadding="0" cellspacing="0">';
            for (n = 0; n < e; n++) {
                if (o += "<tr>", 0 === n) for (i = 0; i < t; i++) o += "<th>&nbsp;</th>";
                else for (i = 0; i < t; i++) o += "<td>&nbsp;</td>";
                o += "</tr>"
            }
            o += "</table><p><br></p>";
            var A = this.editor;
            A.cmd.do("insertHTML", o),
            A.cmd.do("enableObjectResizing", !1),
            A.cmd.do("enableInlineTableEditing", !1)
        },
        _createEditPanel: function() {
            var e = this,
            t = c("add-row"),
            n = c("add-col"),
            i = c("del-row"),
            o = c("del-col"),
            A = c("del-table");
            new u(this, {
                width: 320,
                tabs: [{
                    title: "编辑表格",
                    tpl: '<div>\n                        <div class="w-e-button-container" style="border-bottom:1px solid #f1f1f1;padding-bottom:5px;margin-bottom:5px;">\n                            <button id="' + t + '" class="left">增加行</button>\n                            <button id="' + i + '" class="red left">删除行</button>\n                            <button id="' + n + '" class="left">增加列</button>\n                            <button id="' + o + '" class="red left">删除列</button>\n                        </div>\n                        <div class="w-e-button-container">\n                            <button id="' + A + '" class="gray left">删除表格</button>\n                        </dv>\n                    </div>',
                    events: [{
                        selector: "#" + t,
                        type: "click",
                        fn: function() {
                            return e._addRow(),
                            !0
                        }
                    },
                    {
                        selector: "#" + n,
                        type: "click",
                        fn: function() {
                            return e._addCol(),
                            !0
                        }
                    },
                    {
                        selector: "#" + i,
                        type: "click",
                        fn: function() {
                            return e._delRow(),
                            !0
                        }
                    },
                    {
                        selector: "#" + o,
                        type: "click",
                        fn: function() {
                            return e._delCol(),
                            !0
                        }
                    },
                    {
                        selector: "#" + A,
                        type: "click",
                        fn: function() {
                            return e._delTable(),
                            !0
                        }
                    }]
                }]
            }).show()
        },
        _getLocationData: function() {
            var e = {},
            t = this.editor,
            n = t.selection.getSelectionContainerElem();
            if (n) {
                var i = n.getNodeName();
                if ("TD" === i || "TH" === i) {
                    var o = n.parent(),
                    A = o.children(),
                    r = A.length;
                    A.forEach(function(t, i) {
                        if (t === n[0]) return e.td = {
                            index: i,
                            elem: t,
                            length: r
                        },
                        !1
                    });
                    var c = o.parent(),
                    a = c.children(),
                    s = a.length;
                    return a.forEach(function(t, n) {
                        if (t === o[0]) return e.tr = {
                            index: n,
                            elem: t,
                            length: s
                        },
                        !1
                    }),
                    e
                }
            }
        },
        _addRow: function() {
            var e = this._getLocationData();
            if (e) {
                var t = e.tr,
                n = o(t.elem),
                i = e.td,
                A = i.length,
                r = document.createElement("tr"),
                c = "",
                a = void 0;
                for (a = 0; a < A; a++) c += "<td>&nbsp;</td>";
                r.innerHTML = c,
                o(r).insertAfter(n)
            }
        },
        _addCol: function() {
            var e = this._getLocationData();
            if (e) {
                var t = e.tr,
                n = e.td,
                i = n.index;
                o(t.elem).parent().children().forEach(function(e) {
                    var t = o(e),
                    n = t.children(),
                    A = n.get(i),
                    r = A.getNodeName().toLowerCase();
                    o(document.createElement(r)).insertAfter(A)
                })
            }
        },
        _delRow: function() {
            var e = this._getLocationData();
            if (e) {
                o(e.tr.elem).remove()
            }
        },
        _delCol: function() {
            var e = this._getLocationData();
            if (e) {
                var t = e.tr,
                n = e.td,
                i = n.index;
                o(t.elem).parent().children().forEach(function(e) {
                    o(e).children().get(i).remove()
                })
            }
        },
        _delTable: function() {
            var e = this.editor,
            t = e.selection.getSelectionContainerElem();
            if (t) {
                var n = t.parentUntil("table");
                n && n.remove()
            }
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem,
            i = t.selection.getSelectionContainerElem();
            if (i) {
                var o = i.getNodeName();
                "TD" === o || "TH" === o ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
            }
        }
    },
    Q.prototype = {
        constructor: Q,
        onClick: function() {
            this._createPanel()
        },
        _createPanel: function() {
            var e = this,
            t = c("text-val"),
            n = c("btn"),
            i = new u(this, {
                width: 350,
                tabs: [{
                    title: "插入视频",
                    tpl: '<div>\n                        <input id="' + t + '" type="text" class="block" placeholder="格式如：<iframe src=... ></iframe>"/>\n                        <div class="w-e-button-container">\n                            <button id="' + n + '" class="right">插入</button>\n                        </div>\n                    </div>',
                    events: [{
                        selector: "#" + n,
                        type: "click",
                        fn: function() {
                            var n = o("#" + t),
                            i = n.val().trim();
                            return i && e._insert(i),
                            !0
                        }
                    }]
                }]
            });
            i.show(),
            this.panel = i
        },
        _insert: function(e) {
            this.editor.cmd.do("insertHTML", e + "<p><br></p>")
        }
    },
    D.prototype = {
        constructor: D,
        onClick: function() {
            this._active ? this._createEditPanel() : this._createInsertPanel()
        },
        _createEditPanel: function() {
            var e = this.editor,
            t = c("width-30"),
            n = c("width-50"),
            i = c("width-100"),
            o = c("del-btn"),
            A = [{
                title: "编辑图片",
                tpl: '<div>\n                    <div class="w-e-button-container" style="border-bottom:1px solid #f1f1f1;padding-bottom:5px;margin-bottom:5px;">\n                        <span style="float:left;font-size:14px;margin:4px 5px 0 5px;color:#333;">最大宽度：</span>\n                        <button id="' + t + '" class="left">30%</button>\n                        <button id="' + n + '" class="left">50%</button>\n                        <button id="' + i + '" class="left">100%</button>\n                    </div>\n                    <div class="w-e-button-container">\n                        <button id="' + o + '" class="gray left">删除图片</button>\n                    </dv>\n                </div>',
                events: [{
                    selector: "#" + t,
                    type: "click",
                    fn: function() {
                        var t = e._selectedImg;
                        return t && t.css("max-width", "30%"),
                        !0
                    }
                },
                {
                    selector: "#" + n,
                    type: "click",
                    fn: function() {
                        var t = e._selectedImg;
                        return t && t.css("max-width", "50%"),
                        !0
                    }
                },
                {
                    selector: "#" + i,
                    type: "click",
                    fn: function() {
                        var t = e._selectedImg;
                        return t && t.css("max-width", "100%"),
                        !0
                    }
                },
                {
                    selector: "#" + o,
                    type: "click",
                    fn: function() {
                        var t = e._selectedImg;
                        return t && t.remove(),
                        !0
                    }
                }]
            }],
            r = new u(this, {
                width: 300,
                tabs: A
            });
            r.show(),
            this.panel = r
        },
        _createInsertPanel: function() {
            var e = this.editor,
            t = e.uploadImg,
            n = e.config,
            i = c("up-trigger"),
            A = c("up-file"),
            r = c("link-url"),
            a = c("link-btn"),
            s = [{
                title: "上传图片",
                tpl: '<div class="w-e-up-img-container">\n                    <div id="' + i + '" class="w-e-up-btn">\n                        <i class="w-e-icon-upload2"></i>\n                    </div>\n                    <div style="display:none;">\n                        <input id="' + A + '" type="file" multiple="multiple" accept="image/jpg,image/jpeg,image/png,image/gif,image/bmp"/>\n                    </div>\n                </div>',
                events: [{
                    selector: "#" + i,
                    type: "click",
                    fn: function() {
                        var e = o("#" + A),
                        t = e[0];
                        if (!t) return ! 0;
                        t.click()
                    }
                },
                {
                    selector: "#" + A,
                    type: "change",
                    fn: function() {
                        var e = o("#" + A),
                        n = e[0];
                        if (!n) return ! 0;
                        var i = n.files;
                        return i.length && t.uploadImg(i),
                        !0
                    }
                }]
            },
            {
                title: "网络图片",
                tpl: '<div>\n                    <input id="' + r + '" type="text" class="block" placeholder="图片链接"/></td>\n                    <div class="w-e-button-container">\n                        <button id="' + a + '" class="right">插入</button>\n                    </div>\n                </div>',
                events: [{
                    selector: "#" + a,
                    type: "click",
                    fn: function() {
                        var e = o("#" + r),
                        n = e.val().trim();
                        return n && t.insertLinkImg(n),
                        !0
                    }
                }]
            }],
            l = []; (n.uploadImgShowBase64 || n.uploadImgServer || n.customUploadImg) && window.FileReader && l.push(s[0]),
            n.showLinkImg && l.push(s[1]);
            var d = new u(this, {
                width: 300,
                tabs: l
            });
            d.show(),
            this.panel = d
        },
        tryChangeActive: function(e) {
            var t = this.editor,
            n = this.$elem;
            t._selectedImg ? (this._active = !0, n.addClass("w-e-active")) : (this._active = !1, n.removeClass("w-e-active"))
        }
    };
    var J = {};
    J.bold = s,
    J.head = d,
    J.link = h,
    J.italic = p,
    J.redo = f,
    J.strikeThrough = g,
    J.underline = m,
    J.undo = w,
    J.list = v,
    J.justify = b,
    J.foreColor = E,
    J.backColor = y,
    J.quote = B,
    J.code = C,
    J.emoticon = x,
    J.table = I,
    J.video = Q,
    J.image = D,
    M.prototype = {
        constructor: M,
        init: function() {
            var e = this,
            t = this.editor; ((t.config || {}).menus || []).forEach(function(n) {
                var i = J[n];
                i && "function" == typeof i && (e.menus[n] = new i(t))
            }),
            this._addToToolbar(),
            this._bindEvent()
        },
        _addToToolbar: function() {
            var e = this.editor,
            t = e.$toolbarElem,
            n = this.menus,
            i = e.config,
            o = i.zIndex + 1;
            A(n,
            function(e, n) {
                var i = n.$elem;
                i && (i.css("z-index", o), t.append(i))
            })
        },
        _bindEvent: function() {
            var e = this.menus,
            t = this.editor;
            A(e,
            function(e, n) {
                var i = n.type;
                if (i) {
                    var o = n.$elem,
                    A = n.droplist;
                    n.panel;
                    "click" === i && n.onClick && o.on("click",
                    function(e) {
                        null != t.selection.getRange() && n.onClick(e)
                    }),
                    "droplist" === i && A && o.on("mouseenter",
                    function(e) {
                        null != t.selection.getRange() && (A.showTimeoutId = setTimeout(function() {
                            A.show()
                        },
                        200))
                    }).on("mouseleave",
                    function(e) {
                        A.hideTimeoutId = setTimeout(function() {
                            A.hide()
                        },
                        0)
                    }),
                    "panel" === i && n.onClick && o.on("click",
                    function(e) {
                        e.stopPropagation(),
                        null != t.selection.getRange() && n.onClick(e)
                    })
                }
            })
        },
        changeActive: function() {
            A(this.menus,
            function(e, t) {
                t.tryChangeActive && setTimeout(function() {
                    t.tryChangeActive()
                },
                100)
            })
        }
    },
    S.prototype = {
        constructor: S,
        init: function() {
            this._bindEvent()
        },
        clear: function() {
            this.html("<p><br></p>")
        },
        html: function(e) {
            var t = this.editor,
            n = t.$textElem;
            if (null == e) return n.html();
            n.html(e),
            t.initSelection()
        },
        text: function(e) {
            var t = this.editor,
            n = t.$textElem;
            if (null == e) return n.text();
            n.text("<p>" + e + "</p>"),
            t.initSelection()
        },
        append: function(e) {
            var t = this.editor;
            t.$textElem.append(o(e)),
            t.initSelection()
        },
        _bindEvent: function() {
            this._saveRangeRealTime(),
            this._enterKeyHandle(),
            this._clearHandle(),
            this._pasteHandle(),
            this._tabHandle(),
            this._imgHandle()
        },
        _saveRangeRealTime: function() {
            function e(e) {
                t.selection.saveRange(),
                t.menus.changeActive()
            }
            var t = this.editor,
            n = t.$textElem;
            n.on("keyup", e),
            n.on("mousedown",
            function(t) {
                n.on("mouseleave", e)
            }),
            n.on("mouseup",
            function(t) {
                e(),
                n.off("mouseleave", e)
            })
        },
        _enterKeyHandle: function() {
            function e(e) {
                var t = n.selection.getSelectionContainerElem();
                if (t.parent().equal(i) && ("P" !== t.getNodeName() && !t.text())) {
                    var A = o("<p><br></p>");
                    A.insertBefore(t),
                    n.selection.createRangeByElem(A, !0),
                    n.selection.restoreSelection(),
                    t.remove()
                }
            }
            function t(e) {
                var t = n.selection.getSelectionContainerElem();
                if (t) {
                    var i = t.parent(),
                    o = t.getNodeName(),
                    A = i.getNodeName();
                    if ("CODE" === o && "PRE" === A && n.cmd.queryCommandSupported("insertHTML")) {
                        var r = n.selection.getRange().startOffset;
                        n.cmd.do("insertHTML", "\n"),
                        n.selection.saveRange(),
                        n.selection.getRange().startOffset === r && n.cmd.do("insertHTML", "\n"),
                        e.preventDefault()
                    }
                }
            }
            var n = this.editor,
            i = n.$textElem;
            i.on("keyup",
            function(t) {
                13 === t.keyCode && e(t)
            }),
            i.on("keydown",
            function(e) {
                13 === e.keyCode && t(e)
            })
        },
        _clearHandle: function() {
            var e = this.editor,
            t = e.$textElem;
            t.on("keydown",
            function(e) {
                if (8 === e.keyCode) {
                    return "<p><br></p>" === t.html().toLowerCase().trim() ? void e.preventDefault() : void 0
                }
            }),
            t.on("keyup",
            function(n) {
                if (8 === n.keyCode) {
                    var i = void 0,
                    A = t.html().toLowerCase().trim();
                    A && "<br>" !== A || (i = o("<p><br/></p>"), t.html(""), t.append(i), e.selection.createRangeByElem(i, !1, !0), e.selection.restoreSelection())
                }
            })
        },
        _pasteHandle: function() {
            var e = this.editor,
            t = e.$textElem;
            t.on("paste",
            function(n) {
                if (!L.isIE()) {
                    n.preventDefault();
                    var i = U(n),
                    o = k(n);
                    o = o.replace(/\n/gm, "<br>");
                    var A = e.selection.getSelectionContainerElem();
                    if (A) {
                        var r = A.getNodeName();
                        if ("CODE" !== r && "PRE" !== r && "TD" !== r && "TH" !== r) if ("DIV" === r || "<p><br></p>" === t.html()) {
                            if (!i) return;
                            try {
                                e.cmd.do("insertHTML", i)
                            } catch(t) {
                                e.cmd.do("insertHTML", "<p>" + o + "</p>")
                            }
                        } else {
                            if (!o) return;
                            e.cmd.do("insertHTML", "<p>" + o + "</p>")
                        }
                    }
                }
            }),
            t.on("paste",
            function(t) {
                t.preventDefault();
                var n = _(t);
                if (n && n.length) {
                    var i = e.selection.getSelectionContainerElem();
                    if (i) {
                        var o = i.getNodeName();
                        if ("CODE" !== o && "PRE" !== o) {
                            e.uploadImg.uploadImg(n)
                        }
                    }
                }
            })
        },
        _tabHandle: function() {
            var e = this.editor;
            e.$textElem.on("keydown",
            function(t) {
                if (9 === t.keyCode && e.cmd.queryCommandSupported("insertHTML")) {
                    var n = e.selection.getSelectionContainerElem();
                    if (n) {
                        var i = n.parent(),
                        o = n.getNodeName(),
                        A = i.getNodeName();
                        "CODE" === o && "PRE" === A ? e.cmd.do("insertHTML", "    ") : e.cmd.do("insertHTML", "&nbsp;&nbsp;&nbsp;&nbsp;"),
                        t.preventDefault()
                    }
                }
            })
        },
        _imgHandle: function() {
            var e = this.editor,
            t = e.$textElem;
            t.on("click", "img",
            function(n) {
                var i = this,
                A = o(i);
                t.find("img").removeClass("w-e-selected"),
                A.addClass("w-e-selected"),
                e._selectedImg = A,
                e.selection.createRangeByElem(A)
            }),
            t.on("click  keyup",
            function(n) {
                n.target.matches("img") || (t.find("img").removeClass("w-e-selected"), e._selectedImg = null)
            })
        }
    },
    R.prototype = {
        constructor: R,
        do: function(e, t) {
            var n = this.editor;
            if (n.selection.getRange()) {
                n.selection.restoreSelection();
                var i = "_" + e;
                this[i] ? this[i](t) : this._execCommand(e, t),
                n.menus.changeActive(),
                n.selection.saveRange(),
                n.selection.restoreSelection(),
                n.change && n.change()
            }
        },
        _insertHTML: function(e) {
            var t = this.editor,
            n = t.selection.getRange();
            if (!/^<.+>$/.test(e) && !L.isWebkit()) throw new Error("执行 insertHTML 命令时传入的参数必须是 html 格式");
            this.queryCommandSupported("insertHTML") ? this._execCommand("insertHTML", e) : n.insertNode ? (n.deleteContents(), n.insertNode(o(e)[0])) : n.pasteHTML && n.pasteHTML(e)
        },
        _insertElem: function(e) {
            var t = this.editor,
            n = t.selection.getRange();
            n.insertNode && (n.deleteContents(), n.insertNode(e[0]))
        },
        _execCommand: function(e, t) {
            document.execCommand(e, !1, t)
        },
        queryCommandValue: function(e) {
            return document.queryCommandValue(e)
        },
        queryCommandState: function(e) {
            return document.queryCommandState(e)
        },
        queryCommandSupported: function(e) {
            return document.queryCommandSupported(e)
        }
    },
    F.prototype = {
        constructor: F,
        getRange: function() {
            return this._currentRange
        },
        saveRange: function(e) {
            if (e) return void(this._currentRange = e);
            var t = window.getSelection();
            if (0 !== t.rangeCount) {
                var n = t.getRangeAt(0),
                i = this.getSelectionContainerElem(n);
                if (i) {
                    this.editor.$textElem.isContain(i) && (this._currentRange = n)
                }
            }
        },
        collapseRange: function(e) {
            null == e && (e = !1);
            var t = this._currentRange;
            t && t.collapse(e)
        },
        getSelectionText: function() {
            return this._currentRange ? this._currentRange.toString() : ""
        },
        getSelectionContainerElem: function(e) {
            e = e || this._currentRange;
            var t = void 0;
            if (e) return t = e.commonAncestorContainer,
            o(1 === t.nodeType ? t: t.parentNode)
        },
        getSelectionStartElem: function(e) {
            e = e || this._currentRange;
            var t = void 0;
            if (e) return t = e.startContainer,
            o(1 === t.nodeType ? t: t.parentNode)
        },
        getSelectionEndElem: function(e) {
            e = e || this._currentRange;
            var t = void 0;
            if (e) return t = e.endContainer,
            o(1 === t.nodeType ? t: t.parentNode)
        },
        isSelectionEmpty: function() {
            var e = this._currentRange;
            return ! (!e || !e.startContainer || e.startContainer !== e.endContainer || e.startOffset !== e.endOffset)
        },
        restoreSelection: function() {
            var e = window.getSelection();
            e.removeAllRanges(),
            e.addRange(this._currentRange)
        },
        createEmptyRange: function() {
            var e = this.editor,
            t = this.getRange(),
            n = void 0;
            if (t && this.isSelectionEmpty()) try {
                L.isWebkit() ? (e.cmd.do("insertHTML", "&#8203;"), t.setEnd(t.endContainer, t.endOffset + 1), this.saveRange(t)) : (n = o("<strong>&#8203;</strong>"), e.cmd.do("insertElem", n), this.createRangeByElem(n, !0))
            } catch(e) {}
        },
        createRangeByElem: function(e, t, n) {
            if (e.length) {
                var i = e[0],
                o = document.createRange();
                n ? o.selectNodeContents(i) : o.selectNode(i),
                "boolean" == typeof t && o.collapse(t),
                this.saveRange(o)
            }
        }
    },
    N.prototype = {
        constructor: N,
        show: function(e) {
            var t = this;
            if (!this._isShow) {
                this._isShow = !0;
                var n = this.$bar;
                if (this._isRender) this._isRender = !0;
                else {
                    this.$textContainer.append(n)
                }
                Date.now() - this._time > 100 && e <= 1 && (n.css("width", 100 * e + "%"), this._time = Date.now());
                var i = this._timeoutId;
                i && clearTimeout(i),
                i = setTimeout(function() {
                    t._hide()
                },
                500)
            }
        },
        _hide: function() {
            this.$bar.remove(),
            this._time = 0,
            this._isShow = !1,
            this._isRender = !1
        }
    };
    var G = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?
    function(e) {
        return typeof e
    }: function(e) {
        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
    };
    T.prototype = {
        constructor: T,
        _alert: function(e, t) {
            var n = this.editor,
            i = n.config.debug,
            o = n.config.customAlert;
            if (i) throw new Error("wangEditor: " + (t || e));
            o && "function" == typeof o ? o(e) : alert(e)
        },
        insertLinkImg: function(e) {
            var t = this;
            if (e) {
                var n = this.editor,
                i = document.createElement("img");
                i.onload = function() {
                    i = null,
                    n.cmd.do("insertHTML", '<img src="' + e + '" style="max-width:100%;"/>')
                },
                i.onerror = function() {
                    i = null,
                    t._alert("插入图片错误", 'wangEditor: 插入图片出错，图片链接是 "' + e + '"，下载该链接失败')
                },
                i.onabort = function() {
                    i = null
                },
                i.src = e
            }
        },
        uploadImg: function(e) {
            var t = this;
            if (e && e.length) {
                var n = this.editor,
                i = n.config,
                o = i.uploadImgMaxSize,
                c = o / 1e3 / 1e3,
                a = i.uploadImgMaxLength || 1e4,
                s = i.uploadImgServer,
                l = i.uploadImgShowBase64,
                d = i.uploadFileName || "",
                u = i.uploadImgParams || {},
                h = i.uploadImgHeaders || {},
                p = i.uploadImgHooks || {},
                f = i.uploadImgTimeout || 3e3,
                g = i.withCredentials;
                null == g && (g = !1);
                var m = i.customUploadImg,
                w = [],
                v = [];
                if (r(e,
                function(e) {
                    var t = e.name,
                    n = e.size;
                    if (t && n) return ! 1 === /\.(jpg|jpeg|png|bmp|gif)$/i.test(t) ? void v.push("【" + t + "】不是图片") : o < n ? void v.push("【" + t + "】大于 " + c + "M") : void w.push(e)
                }), v.length) return void this._alert("图片验证未通过: \n" + v.join("\n"));
                if (w.length > a) return void this._alert("一次最多上传" + a + "张图片");
                if (m && "function" == typeof m) return void m(w, this.insertLinkImg.bind(this));
                var b = new FormData;
                if (r(w,
                function(e) {
                    var t = d || e.name;
                    b.append(t, e)
                }), s && "string" == typeof s) {
                    var E = s.split("#");
                    s = E[0];
                    var y = E[1] || "";
                    A(u,
                    function(e, t) {
                        t = encodeURIComponent(t),
                        s.indexOf("?") > 0 ? s += "&": s += "?",
                        s = s + e + "=" + t,
                        b.append(e, t)
                    }),
                    y && (s += "#" + y);
                    var B = new XMLHttpRequest;
                    return B.open("POST", s),
                    B.timeout = f,
                    B.ontimeout = function() {
                        p.timeout && "function" == typeof p.timeout && p.timeout(B, n),
                        t._alert("上传图片超时")
                    },
                    B.upload && (B.upload.onprogress = function(e) {
                        var t = void 0,
                        i = new N(n);
                        e.lengthComputable && (t = e.loaded / e.total, i.show(t))
                    }),
                    B.onreadystatechange = function() {
                        var e = void 0;
                        if (4 === B.readyState) {
                            if (B.status < 200 || B.status >= 300) return p.error && "function" == typeof p.error && p.error(B, n),
                            void t._alert("上传图片发生错误", "上传图片发生错误，服务器返回状态是 " + B.status);
                            if (e = B.responseText, "object" !== (void 0 === e ? "undefined": G(e))) try {
                                e = JSON.parse(e)
                            } catch(i) {
                                return p.fail && "function" == typeof p.fail && p.fail(B, n, e),
                                void t._alert("上传图片失败", "上传图片返回结果错误，返回结果是: " + e)
                            }
                            if (p.customInsert || "0" == e.errno) {
                                if (p.customInsert && "function" == typeof p.customInsert) p.customInsert(t.insertLinkImg.bind(t), e, n);
                                else { 
                                        t.insertLinkImg(e.data)
                                }
                                p.success && "function" == typeof p.success && p.success(B, n, e)
                            } else p.fail && "function" == typeof p.fail && p.fail(B, n, e),
                            t._alert("上传图片失败", "上传图片返回结果错误，返回结果 errno=" + e.errno)
                        }
                    },
                    p.before && "function" == typeof p.before && p.before(B, n, w),
                    A(h,
                    function(e, t) {
                        B.setRequestHeader(e, t)
                    }),
                    B.withCredentials = g,
                    void B.send(b)
                }
                l && r(e,
                function(e) {
                    var n = t,
                    i = new FileReader;
                    i.readAsDataURL(e),
                    i.onload = function() {
                        n.insertLinkImg(this.result)
                    }
                })
            }
        }
    };
    var O = 1;
    H.prototype = {
        constructor: H,
        _initConfig: function() {
            var e = {};
            this.config = Object.assign(e, Y, this.customConfig);
            var t = this.config.lang || {},
            n = [];
            A(t,
            function(e, t) {
                n.push({
                    reg: new RegExp(e, "img"),
                    val: t
                })
            }),
            this.config.langArgs = n
        },
        _initDom: function() {
            var e = this,
            t = this.toolbarSelector,
            n = o(t),
            i = this.textSelector,
            A = this.config,
            r = A.zIndex,
            c = void 0,
            a = void 0,
            s = void 0,
            l = void 0;
            null == i ? (c = o("<div></div>"), a = o("<div></div>"), l = n.children(), n.append(c).append(a), c.css("background-color", "#f1f1f1").css("border", "1px solid #ccc"), a.css("border", "1px solid #ccc").css("border-top", "none").css("height", "300px")) : (c = n, a = o(i), l = a.children()),
            s = o("<div></div>"),
            s.attr("contenteditable", "true").css("width", "100%").css("height", "100%"),
            l && l.length ? s.append(l) : s.append(o("<p><br></p>")),
            a.append(s),
            c.addClass("w-e-toolbar"),
            a.addClass("w-e-text-container"),
            a.css("z-index", r),
            s.addClass("w-e-text"),
            this.$toolbarElem = c,
            this.$textContainerElem = a,
            this.$textElem = s,
            a.on("click keyup",
            function() {
                e.change && e.change()
            }),
            c.on("click",
            function() {
                this.change && this.change()
            })
        },
        _initCommand: function() {
            this.cmd = new R(this)
        },
        _initSelectionAPI: function() {
            this.selection = new F(this)
        },
        _initUploadImg: function() {
            this.uploadImg = new T(this)
        },
        _initMenus: function() {
            this.menus = new M(this),
            this.menus.init()
        },
        _initText: function() {
            this.txt = new S(this),
            this.txt.init()
        },
        initSelection: function(e) {
            var t = this.$textElem,
            n = t.children();
            if (!n.length) return t.append(o("<p><br></p>")),
            void this.initSelection();
            var i = n.last();
            if (e) {
                var A = i.html().toLowerCase(),
                r = i.getNodeName();
                if ("<br>" !== A && "<br/>" !== A || "P" !== r) return t.append(o("<p><br></p>")),
                void this.initSelection()
            }
            this.selection.createRangeByElem(i, !1, !0),
            this.selection.restoreSelection()
        },
        _bindEvent: function() {
            var e = 0,
            t = this.txt.html(),
            n = this.config,
            i = n.onchange;
            i && "function" == typeof i && (this.change = function() {
                var n = this.txt.html();
                n.length !== t.length && (e && clearTimeout(e), e = setTimeout(function() {
                    i(n),
                    t = n
                },
                200))
            })
        },
        create: function() {
            this._initConfig(),
            this._initDom(),
            this._initCommand(),
            this._initSelectionAPI(),
            this._initText(),
            this._initMenus(),
            this._initUploadImg(),
            this.initSelection(!0),
            this._bindEvent()
        }
    };
    try {
        document
    } catch(e) {
        throw new Error("请在浏览器环境下运行")
    } !
    function() {
        "function" != typeof Object.assign && (Object.assign = function(e, t) {
            if (null == e) throw new TypeError("Cannot convert undefined or null to object");
            for (var n = Object(e), i = 1; i < arguments.length; i++) {
                var o = arguments[i];
                if (null != o) for (var A in o) Object.prototype.hasOwnProperty.call(o, A) && (n[A] = o[A])
            }
            return n
        }),
        Element.prototype.matches || (Element.prototype.matches = Element.prototype.matchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector || Element.prototype.oMatchesSelector || Element.prototype.webkitMatchesSelector ||
        function(e) {
            for (var t = (this.document || this.ownerDocument).querySelectorAll(e), n = t.length; --n >= 0 && t.item(n) !== this;);
            return n > -1
        })
    } ();
    var W = document.createElement("style");
    return W.type = "text/css",
    W.innerHTML = '.w-e-toolbar,.w-e-text-container,.w-e-menu-panel {  padding: 0;  margin: 0;  box-sizing: border-box;}.w-e-toolbar *,.w-e-text-container *,.w-e-menu-panel * {  padding: 0;  margin: 0;  box-sizing: border-box;}.w-e-clear-fix:after {  content: "";  display: table;  clear: both;}.w-e-toolbar .w-e-droplist {  position: absolute;  left: 0;  top: 0;  background-color: #fff;  border: 1px solid #f1f1f1;  border-right-color: #ccc;  border-bottom-color: #ccc;}.w-e-toolbar .w-e-droplist .w-e-dp-title {  text-align: center;  color: #999;  line-height: 2;  border-bottom: 1px solid #f1f1f1;  font-size: 13px;}.w-e-toolbar .w-e-droplist ul.w-e-list {  list-style: none;  line-height: 1;}.w-e-toolbar .w-e-droplist ul.w-e-list li.w-e-item {  color: #333;  padding: 5px 0;}.w-e-toolbar .w-e-droplist ul.w-e-list li.w-e-item:hover {  background-color: #f1f1f1;}.w-e-toolbar .w-e-droplist ul.w-e-block {  list-style: none;  text-align: left;  padding: 5px;}.w-e-toolbar .w-e-droplist ul.w-e-block li.w-e-item {  display: inline-block;  *display: inline;  *zoom: 1;  padding: 3px 5px;}.w-e-toolbar .w-e-droplist ul.w-e-block li.w-e-item:hover {  background-color: #f1f1f1;}@font-face {  font-family: \'icomoon\';  src: url(data:application/x-font-woff;charset=utf-8;base64,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) format(\'truetype\');  font-weight: normal;  font-style: normal;}[class^="w-e-icon-"],[class*=" w-e-icon-"] {  /* use !important to prevent issues with browser extensions that change fonts */  font-family: \'icomoon\' !important;  speak: none;  font-style: normal;  font-weight: normal;  font-variant: normal;  text-transform: none;  line-height: 1;  /* Better Font Rendering =========== */  -webkit-font-smoothing: antialiased;  -moz-osx-font-smoothing: grayscale;}.w-e-icon-close:before {  content: "\\f00d";}.w-e-icon-upload2:before {  content: "\\e9c6";}.w-e-icon-trash-o:before {  content: "\\f014";}.w-e-icon-header:before {  content: "\\f1dc";}.w-e-icon-pencil2:before {  content: "\\e906";}.w-e-icon-paint-brush:before {  content: "\\f1fc";}.w-e-icon-image:before {  content: "\\e90d";}.w-e-icon-play:before {  content: "\\e912";}.w-e-icon-location:before {  content: "\\e947";}.w-e-icon-undo:before {  content: "\\e965";}.w-e-icon-redo:before {  content: "\\e966";}.w-e-icon-quotes-left:before {  content: "\\e977";}.w-e-icon-list-numbered:before {  content: "\\e9b9";}.w-e-icon-list2:before {  content: "\\e9bb";}.w-e-icon-link:before {  content: "\\e9cb";}.w-e-icon-happy:before {  content: "\\e9df";}.w-e-icon-bold:before {  content: "\\ea62";}.w-e-icon-underline:before {  content: "\\ea63";}.w-e-icon-italic:before {  content: "\\ea64";}.w-e-icon-strikethrough:before {  content: "\\ea65";}.w-e-icon-table2:before {  content: "\\ea71";}.w-e-icon-paragraph-left:before {  content: "\\ea77";}.w-e-icon-paragraph-center:before {  content: "\\ea78";}.w-e-icon-paragraph-right:before {  content: "\\ea79";}.w-e-icon-terminal:before {  content: "\\f120";}.w-e-icon-page-break:before {  content: "\\ea68";}.w-e-icon-cancel-circle:before {  content: "\\ea0d";}.w-e-toolbar {  display: -webkit-box;  display: -ms-flexbox;  display: flex;  padding: 0 5px;  /* 单个菜单 */}.w-e-toolbar .w-e-menu {  position: relative;  text-align: center;  padding: 5px 10px;  cursor: pointer;}.w-e-toolbar .w-e-menu i {  color: #999;}.w-e-toolbar .w-e-menu:hover i {  color: #333;}.w-e-toolbar .w-e-active i {  color: #1e88e5;}.w-e-toolbar .w-e-active:hover i {  color: #1e88e5;}.w-e-text-container .w-e-panel-container {  position: absolute;  top: 0;  left: 50%;  border: 1px solid #ccc;  border-top: 0;  box-shadow: 1px 1px 2px #ccc;  color: #333;  background-color: #fff;  /* 为 emotion panel 定制的样式 */  /* 上传图片的 panel 定制样式 */}.w-e-text-container .w-e-panel-container .w-e-panel-close {  position: absolute;  right: 0;  top: 0;  padding: 5px;  margin: 2px 5px 0 0;  cursor: pointer;  color: #999;}.w-e-text-container .w-e-panel-container .w-e-panel-close:hover {  color: #333;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-title {  list-style: none;  display: -webkit-box;  display: -ms-flexbox;  display: flex;  font-size: 14px;  margin: 2px 10px 0 10px;  border-bottom: 1px solid #f1f1f1;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-title .w-e-item {  padding: 3px 5px;  color: #999;  cursor: pointer;  margin: 0 3px;  position: relative;  top: 1px;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-title .w-e-active {  color: #333;  border-bottom: 1px solid #333;  cursor: default;  font-weight: 700;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content {  padding: 10px 15px 10px 15px;  font-size: 16px;  /* 输入框的样式 */  /* 按钮的样式 */}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content input:focus,.w-e-text-container .w-e-panel-container .w-e-panel-tab-content textarea:focus,.w-e-text-container .w-e-panel-container .w-e-panel-tab-content button:focus {  outline: none;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content textarea {  width: 100%;  border: 1px solid #ccc;  padding: 5px;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content textarea:focus {  border-color: #1e88e5;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content input[type=text] {  border: none;  border-bottom: 1px solid #ccc;  font-size: 14px;  height: 20px;  color: #333;  text-align: left;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content input[type=text].small {  width: 30px;  text-align: center;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content input[type=text].block {  display: block;  width: 100%;  margin: 10px 0;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content input[type=text]:focus {  border-bottom: 2px solid #1e88e5;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container button {  font-size: 14px;  color: #1e88e5;  border: none;  padding: 5px 10px;  background-color: #fff;  cursor: pointer;  border-radius: 3px;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container button.left {  float: left;  margin-right: 10px;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container button.right {  float: right;  margin-left: 10px;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container button.gray {  color: #999;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container button.red {  color: #c24f4a;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container button:hover {  background-color: #f1f1f1;}.w-e-text-container .w-e-panel-container .w-e-panel-tab-content .w-e-button-container:after {  content: "";  display: table;  clear: both;}.w-e-text-container .w-e-panel-container .w-e-emoticon-container .w-e-item {  cursor: pointer;  font-size: 18px;  padding: 0 3px;  display: inline-block;  *display: inline;  *zoom: 1;}.w-e-text-container .w-e-panel-container .w-e-up-img-container {  text-align: center;}.w-e-text-container .w-e-panel-container .w-e-up-img-container .w-e-up-btn {  display: inline-block;  *display: inline;  *zoom: 1;  color: #999;  cursor: pointer;  font-size: 60px;  line-height: 1;}.w-e-text-container .w-e-panel-container .w-e-up-img-container .w-e-up-btn:hover {  color: #333;}.w-e-text-container {  position: relative;}.w-e-text-container .w-e-progress {  position: absolute;  background-color: #1e88e5;  bottom: 0;  left: 0;  height: 1px;}.w-e-text {  padding: 0 10px;  overflow-y: scroll;}.w-e-text p,.w-e-text h1,.w-e-text h2,.w-e-text h3,.w-e-text h4,.w-e-text h5,.w-e-text table,.w-e-text pre {  margin: 10px 0;  line-height: 1.5;}.w-e-text ul,.w-e-text ol {  margin: 10px 0 10px 20px;}.w-e-text blockquote {  display: block;  border-left: 8px solid #d0e5f2;  padding: 5px 10px;  margin: 10px 0;  line-height: 1.4;  font-size: 100%;  background-color: #f1f1f1;}.w-e-text code {  display: inline-block;  *display: inline;  *zoom: 1;  background-color: #f1f1f1;  border-radius: 3px;  padding: 3px 5px;  margin: 0 3px;}.w-e-text pre code {  display: block;}.w-e-text table {  border-top: 1px solid #ccc;  border-left: 1px solid #ccc;}.w-e-text table td,.w-e-text table th {  border-bottom: 1px solid #ccc;  border-right: 1px solid #ccc;  padding: 3px 5px;}.w-e-text table th {  border-bottom: 2px solid #ccc;  text-align: center;}.w-e-text:focus {  outline: none;}.w-e-text img {  cursor: pointer;}.w-e-text img:hover {  box-shadow: 0 0 5px #333;}.w-e-text img.w-e-selected {  border: 2px solid #1e88e5;}.w-e-text img.w-e-selected:hover {  box-shadow: none;}',
    document.getElementsByTagName("HEAD").item(0).appendChild(W),
    window.wangEditor || H
});
//# sourceMappingURL=wangEditor.min.js.map
