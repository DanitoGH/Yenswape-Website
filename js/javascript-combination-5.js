!function(e, t) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
        if (!e.document)
            throw new Error("jQuery requires a window with a document");
        return t(e)
    }
    : t(e)
}("undefined" != typeof window ? window : this, function(e, t) {
    "use strict";
    var n = []
      , r = e.document
      , i = Object.getPrototypeOf
      , o = n.slice
      , a = n.concat
      , s = n.push
      , u = n.indexOf
      , l = {}
      , c = l.toString
      , f = l.hasOwnProperty
      , p = f.toString
      , d = p.call(Object)
      , h = {}
      , g = function e(t) {
        return "function" == typeof t && "number" != typeof t.nodeType
    }
      , y = function e(t) {
        return null != t && t === t.window
    }
      , v = {
        type: !0,
        src: !0,
        noModule: !0
    };
    function m(e, t, n) {
        var i, o = (t = t || r).createElement("script");
        if (o.text = e,
        n)
            for (i in v)
                n[i] && (o[i] = n[i]);
        t.head.appendChild(o).parentNode.removeChild(o)
    }
    function x(e) {
        return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? l[c.call(e)] || "object" : typeof e
    }
    var b = "3.3.1"
      , w = function(e, t) {
        return new w.fn.init(e,t)
    }
      , T = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
    w.fn = w.prototype = {
        jquery: "3.3.1",
        constructor: w,
        length: 0,
        toArray: function() {
            return o.call(this)
        },
        get: function(e) {
            return null == e ? o.call(this) : e < 0 ? this[e + this.length] : this[e]
        },
        pushStack: function(e) {
            var t = w.merge(this.constructor(), e);
            return t.prevObject = this,
            t
        },
        each: function(e) {
            return w.each(this, e)
        },
        map: function(e) {
            return this.pushStack(w.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        slice: function() {
            return this.pushStack(o.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(e) {
            var t = this.length
              , n = +e + (e < 0 ? t : 0);
            return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor()
        },
        push: s,
        sort: n.sort,
        splice: n.splice
    },
    w.extend = w.fn.extend = function() {
        var e, t, n, r, i, o, a = arguments[0] || {}, s = 1, u = arguments.length, l = !1;
        for ("boolean" == typeof a && (l = a,
        a = arguments[s] || {},
        s++),
        "object" == typeof a || g(a) || (a = {}),
        s === u && (a = this,
        s--); s < u; s++)
            if (null != (e = arguments[s]))
                for (t in e)
                    n = a[t],
                    a !== (r = e[t]) && (l && r && (w.isPlainObject(r) || (i = Array.isArray(r))) ? (i ? (i = !1,
                    o = n && Array.isArray(n) ? n : []) : o = n && w.isPlainObject(n) ? n : {},
                    a[t] = w.extend(l, o, r)) : void 0 !== r && (a[t] = r));
        return a
    }
    ,
    w.extend({
        expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(e) {
            throw new Error(e)
        },
        noop: function() {},
        isPlainObject: function(e) {
            var t, n;
            return !(!e || "[object Object]" !== c.call(e)) && (!(t = i(e)) || "function" == typeof (n = f.call(t, "constructor") && t.constructor) && p.call(n) === d)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e)
                return !1;
            return !0
        },
        globalEval: function(e) {
            m(e)
        },
        each: function(e, t) {
            var n, r = 0;
            if (C(e)) {
                for (n = e.length; r < n; r++)
                    if (!1 === t.call(e[r], r, e[r]))
                        break
            } else
                for (r in e)
                    if (!1 === t.call(e[r], r, e[r]))
                        break;
            return e
        },
        trim: function(e) {
            return null == e ? "" : (e + "").replace(T, "")
        },
        makeArray: function(e, t) {
            var n = t || [];
            return null != e && (C(Object(e)) ? w.merge(n, "string" == typeof e ? [e] : e) : s.call(n, e)),
            n
        },
        inArray: function(e, t, n) {
            return null == t ? -1 : u.call(t, e, n)
        },
        merge: function(e, t) {
            for (var n = +t.length, r = 0, i = e.length; r < n; r++)
                e[i++] = t[r];
            return e.length = i,
            e
        },
        grep: function(e, t, n) {
            for (var r, i = [], o = 0, a = e.length, s = !n; o < a; o++)
                (r = !t(e[o], o)) !== s && i.push(e[o]);
            return i
        },
        map: function(e, t, n) {
            var r, i, o = 0, s = [];
            if (C(e))
                for (r = e.length; o < r; o++)
                    null != (i = t(e[o], o, n)) && s.push(i);
            else
                for (o in e)
                    null != (i = t(e[o], o, n)) && s.push(i);
            return a.apply([], s)
        },
        guid: 1,
        support: h
    }),
    "function" == typeof Symbol && (w.fn[Symbol.iterator] = n[Symbol.iterator]),
    w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(e, t) {
        l["[object " + t + "]"] = t.toLowerCase()
    });
    function C(e) {
        var t = !!e && "length"in e && e.length
          , n = x(e);
        return !g(e) && !y(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e)
    }
    var E = function(e) {
        var t, n, r, i, o, a, s, u, l, c, f, p, d, h, g, y, v, m, x, b = "sizzle" + 1 * new Date, w = e.document, T = 0, C = 0, E = ae(), k = ae(), S = ae(), D = function(e, t) {
            return e === t && (f = !0),
            0
        }, N = {}.hasOwnProperty, A = [], j = A.pop, q = A.push, L = A.push, H = A.slice, O = function(e, t) {
            for (var n = 0, r = e.length; n < r; n++)
                if (e[n] === t)
                    return n;
            return -1
        }, P = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", M = "[\\x20\\t\\r\\n\\f]", R = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+", I = "\\[" + M + "*(" + R + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + R + "))|)" + M + "*\\]", W = ":(" + R + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + I + ")*)|.*)\\)|)", $ = new RegExp(M + "+","g"), B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$","g"), F = new RegExp("^" + M + "*," + M + "*"), _ = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"), z = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]","g"), X = new RegExp(W), U = new RegExp("^" + R + "$"), V = {
            ID: new RegExp("^#(" + R + ")"),
            CLASS: new RegExp("^\\.(" + R + ")"),
            TAG: new RegExp("^(" + R + "|[*])"),
            ATTR: new RegExp("^" + I),
            PSEUDO: new RegExp("^" + W),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)","i"),
            bool: new RegExp("^(?:" + P + ")$","i"),
            needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)","i")
        }, G = /^(?:input|select|textarea|button)$/i, Y = /^h\d$/i, Q = /^[^{]+\{\s*\[native \w/, J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, K = /[+~]/, Z = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)","ig"), ee = function(e, t, n) {
            var r = "0x" + t - 65536;
            return r !== r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
        }, te = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, ne = function(e, t) {
            return t ? "\0" === e ? "\ufffd" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
        }, re = function() {
            p()
        }, ie = me(function(e) {
            return !0 === e.disabled && ("form"in e || "label"in e)
        }, {
            dir: "parentNode",
            next: "legend"
        });
        try {
            L.apply(A = H.call(w.childNodes), w.childNodes),
            A[w.childNodes.length].nodeType
        } catch (e) {
            L = {
                apply: A.length ? function(e, t) {
                    q.apply(e, H.call(t))
                }
                : function(e, t) {
                    var n = e.length
                      , r = 0;
                    while (e[n++] = t[r++])
                        ;
                    e.length = n - 1
                }
            }
        }
        function oe(e, t, r, i) {
            var o, s, l, c, f, h, v, m = t && t.ownerDocument, T = t ? t.nodeType : 9;
            if (r = r || [],
            "string" != typeof e || !e || 1 !== T && 9 !== T && 11 !== T)
                return r;
            if (!i && ((t ? t.ownerDocument || t : w) !== d && p(t),
            t = t || d,
            g)) {
                if (11 !== T && (f = J.exec(e)))
                    if (o = f[1]) {
                        if (9 === T) {
                            if (!(l = t.getElementById(o)))
                                return r;
                            if (l.id === o)
                                return r.push(l),
                                r
                        } else if (m && (l = m.getElementById(o)) && x(t, l) && l.id === o)
                            return r.push(l),
                            r
                    } else {
                        if (f[2])
                            return L.apply(r, t.getElementsByTagName(e)),
                            r;
                        if ((o = f[3]) && n.getElementsByClassName && t.getElementsByClassName)
                            return L.apply(r, t.getElementsByClassName(o)),
                            r
                    }
                if (n.qsa && !S[e + " "] && (!y || !y.test(e))) {
                    if (1 !== T)
                        m = t,
                        v = e;
                    else if ("object" !== t.nodeName.toLowerCase()) {
                        (c = t.getAttribute("id")) ? c = c.replace(te, ne) : t.setAttribute("id", c = b),
                        s = (h = a(e)).length;
                        while (s--)
                            h[s] = "#" + c + " " + ve(h[s]);
                        v = h.join(","),
                        m = K.test(e) && ge(t.parentNode) || t
                    }
                    if (v)
                        try {
                            return L.apply(r, m.querySelectorAll(v)),
                            r
                        } catch (e) {} finally {
                            c === b && t.removeAttribute("id")
                        }
                }
            }
            return u(e.replace(B, "$1"), t, r, i)
        }
        function ae() {
            var e = [];
            function t(n, i) {
                return e.push(n + " ") > r.cacheLength && delete t[e.shift()],
                t[n + " "] = i
            }
            return t
        }
        function se(e) {
            return e[b] = !0,
            e
        }
        function ue(e) {
            var t = d.createElement("fieldset");
            try {
                return !!e(t)
            } catch (e) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t),
                t = null
            }
        }
        function le(e, t) {
            var n = e.split("|")
              , i = n.length;
            while (i--)
                r.attrHandle[n[i]] = t
        }
        function ce(e, t) {
            var n = t && e
              , r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
            if (r)
                return r;
            if (n)
                while (n = n.nextSibling)
                    if (n === t)
                        return -1;
            return e ? 1 : -1
        }
        function fe(e) {
            return function(t) {
                return "input" === t.nodeName.toLowerCase() && t.type === e
            }
        }
        function pe(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e
            }
        }
        function de(e) {
            return function(t) {
                return "form"in t ? t.parentNode && !1 === t.disabled ? "label"in t ? "label"in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && ie(t) === e : t.disabled === e : "label"in t && t.disabled === e
            }
        }
        function he(e) {
            return se(function(t) {
                return t = +t,
                se(function(n, r) {
                    var i, o = e([], n.length, t), a = o.length;
                    while (a--)
                        n[i = o[a]] && (n[i] = !(r[i] = n[i]))
                })
            })
        }
        function ge(e) {
            return e && "undefined" != typeof e.getElementsByTagName && e
        }
        n = oe.support = {},
        o = oe.isXML = function(e) {
            var t = e && (e.ownerDocument || e).documentElement;
            return !!t && "HTML" !== t.nodeName
        }
        ,
        p = oe.setDocument = function(e) {
            var t, i, a = e ? e.ownerDocument || e : w;
            return a !== d && 9 === a.nodeType && a.documentElement ? (d = a,
            h = d.documentElement,
            g = !o(d),
            w !== d && (i = d.defaultView) && i.top !== i && (i.addEventListener ? i.addEventListener("unload", re, !1) : i.attachEvent && i.attachEvent("onunload", re)),
            n.attributes = ue(function(e) {
                return e.className = "i",
                !e.getAttribute("className")
            }),
            n.getElementsByTagName = ue(function(e) {
                return e.appendChild(d.createComment("")),
                !e.getElementsByTagName("*").length
            }),
            n.getElementsByClassName = Q.test(d.getElementsByClassName),
            n.getById = ue(function(e) {
                return h.appendChild(e).id = b,
                !d.getElementsByName || !d.getElementsByName(b).length
            }),
            n.getById ? (r.filter.ID = function(e) {
                var t = e.replace(Z, ee);
                return function(e) {
                    return e.getAttribute("id") === t
                }
            }
            ,
            r.find.ID = function(e, t) {
                if ("undefined" != typeof t.getElementById && g) {
                    var n = t.getElementById(e);
                    return n ? [n] : []
                }
            }
            ) : (r.filter.ID = function(e) {
                var t = e.replace(Z, ee);
                return function(e) {
                    var n = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
                    return n && n.value === t
                }
            }
            ,
            r.find.ID = function(e, t) {
                if ("undefined" != typeof t.getElementById && g) {
                    var n, r, i, o = t.getElementById(e);
                    if (o) {
                        if ((n = o.getAttributeNode("id")) && n.value === e)
                            return [o];
                        i = t.getElementsByName(e),
                        r = 0;
                        while (o = i[r++])
                            if ((n = o.getAttributeNode("id")) && n.value === e)
                                return [o]
                    }
                    return []
                }
            }
            ),
            r.find.TAG = n.getElementsByTagName ? function(e, t) {
                return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
            }
            : function(e, t) {
                var n, r = [], i = 0, o = t.getElementsByTagName(e);
                if ("*" === e) {
                    while (n = o[i++])
                        1 === n.nodeType && r.push(n);
                    return r
                }
                return o
            }
            ,
            r.find.CLASS = n.getElementsByClassName && function(e, t) {
                if ("undefined" != typeof t.getElementsByClassName && g)
                    return t.getElementsByClassName(e)
            }
            ,
            v = [],
            y = [],
            (n.qsa = Q.test(d.querySelectorAll)) && (ue(function(e) {
                h.appendChild(e).innerHTML = "<a id='" + b + "'></a><select id='" + b + "-\r\\' msallowcapture=''><option selected=''></option></select>",
                e.querySelectorAll("[msallowcapture^='']").length && y.push("[*^$]=" + M + "*(?:''|\"\")"),
                e.querySelectorAll("[selected]").length || y.push("\\[" + M + "*(?:value|" + P + ")"),
                e.querySelectorAll("[id~=" + b + "-]").length || y.push("~="),
                e.querySelectorAll(":checked").length || y.push(":checked"),
                e.querySelectorAll("a#" + b + "+*").length || y.push(".#.+[+~]")
            }),
            ue(function(e) {
                e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                var t = d.createElement("input");
                t.setAttribute("type", "hidden"),
                e.appendChild(t).setAttribute("name", "D"),
                e.querySelectorAll("[name=d]").length && y.push("name" + M + "*[*^$|!~]?="),
                2 !== e.querySelectorAll(":enabled").length && y.push(":enabled", ":disabled"),
                h.appendChild(e).disabled = !0,
                2 !== e.querySelectorAll(":disabled").length && y.push(":enabled", ":disabled"),
                e.querySelectorAll("*,:x"),
                y.push(",.*:")
            })),
            (n.matchesSelector = Q.test(m = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && ue(function(e) {
                n.disconnectedMatch = m.call(e, "*"),
                m.call(e, "[s!='']:x"),
                v.push("!=", W)
            }),
            y = y.length && new RegExp(y.join("|")),
            v = v.length && new RegExp(v.join("|")),
            t = Q.test(h.compareDocumentPosition),
            x = t || Q.test(h.contains) ? function(e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e
                  , r = t && t.parentNode;
                return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
            }
            : function(e, t) {
                if (t)
                    while (t = t.parentNode)
                        if (t === e)
                            return !0;
                return !1
            }
            ,
            D = t ? function(e, t) {
                if (e === t)
                    return f = !0,
                    0;
                var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return r || (1 & (r = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === r ? e === d || e.ownerDocument === w && x(w, e) ? -1 : t === d || t.ownerDocument === w && x(w, t) ? 1 : c ? O(c, e) - O(c, t) : 0 : 4 & r ? -1 : 1)
            }
            : function(e, t) {
                if (e === t)
                    return f = !0,
                    0;
                var n, r = 0, i = e.parentNode, o = t.parentNode, a = [e], s = [t];
                if (!i || !o)
                    return e === d ? -1 : t === d ? 1 : i ? -1 : o ? 1 : c ? O(c, e) - O(c, t) : 0;
                if (i === o)
                    return ce(e, t);
                n = e;
                while (n = n.parentNode)
                    a.unshift(n);
                n = t;
                while (n = n.parentNode)
                    s.unshift(n);
                while (a[r] === s[r])
                    r++;
                return r ? ce(a[r], s[r]) : a[r] === w ? -1 : s[r] === w ? 1 : 0
            }
            ,
            d) : d
        }
        ,
        oe.matches = function(e, t) {
            return oe(e, null, null, t)
        }
        ,
        oe.matchesSelector = function(e, t) {
            if ((e.ownerDocument || e) !== d && p(e),
            t = t.replace(z, "='$1']"),
            n.matchesSelector && g && !S[t + " "] && (!v || !v.test(t)) && (!y || !y.test(t)))
                try {
                    var r = m.call(e, t);
                    if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType)
                        return r
                } catch (e) {}
            return oe(t, d, null, [e]).length > 0
        }
        ,
        oe.contains = function(e, t) {
            return (e.ownerDocument || e) !== d && p(e),
            x(e, t)
        }
        ,
        oe.attr = function(e, t) {
            (e.ownerDocument || e) !== d && p(e);
            var i = r.attrHandle[t.toLowerCase()]
              , o = i && N.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !g) : void 0;
            return void 0 !== o ? o : n.attributes || !g ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null
        }
        ,
        oe.escape = function(e) {
            return (e + "").replace(te, ne)
        }
        ,
        oe.error = function(e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }
        ,
        oe.uniqueSort = function(e) {
            var t, r = [], i = 0, o = 0;
            if (f = !n.detectDuplicates,
            c = !n.sortStable && e.slice(0),
            e.sort(D),
            f) {
                while (t = e[o++])
                    t === e[o] && (i = r.push(o));
                while (i--)
                    e.splice(r[i], 1)
            }
            return c = null,
            e
        }
        ,
        i = oe.getText = function(e) {
            var t, n = "", r = 0, o = e.nodeType;
            if (o) {
                if (1 === o || 9 === o || 11 === o) {
                    if ("string" == typeof e.textContent)
                        return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling)
                        n += i(e)
                } else if (3 === o || 4 === o)
                    return e.nodeValue
            } else
                while (t = e[r++])
                    n += i(t);
            return n
        }
        ,
        (r = oe.selectors = {
            cacheLength: 50,
            createPseudo: se,
            match: V,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(e) {
                    return e[1] = e[1].replace(Z, ee),
                    e[3] = (e[3] || e[4] || e[5] || "").replace(Z, ee),
                    "~=" === e[2] && (e[3] = " " + e[3] + " "),
                    e.slice(0, 4)
                },
                CHILD: function(e) {
                    return e[1] = e[1].toLowerCase(),
                    "nth" === e[1].slice(0, 3) ? (e[3] || oe.error(e[0]),
                    e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])),
                    e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && oe.error(e[0]),
                    e
                },
                PSEUDO: function(e) {
                    var t, n = !e[6] && e[2];
                    return V.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && X.test(n) && (t = a(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t),
                    e[2] = n.slice(0, t)),
                    e.slice(0, 3))
                }
            },
            filter: {
                TAG: function(e) {
                    var t = e.replace(Z, ee).toLowerCase();
                    return "*" === e ? function() {
                        return !0
                    }
                    : function(e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                },
                CLASS: function(e) {
                    var t = E[e + " "];
                    return t || (t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) && E(e, function(e) {
                        return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "")
                    })
                },
                ATTR: function(e, t, n) {
                    return function(r) {
                        var i = oe.attr(r, e);
                        return null == i ? "!=" === t : !t || (i += "",
                        "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i.replace($, " ") + " ").indexOf(n) > -1 : "|=" === t && (i === n || i.slice(0, n.length + 1) === n + "-"))
                    }
                },
                CHILD: function(e, t, n, r, i) {
                    var o = "nth" !== e.slice(0, 3)
                      , a = "last" !== e.slice(-4)
                      , s = "of-type" === t;
                    return 1 === r && 0 === i ? function(e) {
                        return !!e.parentNode
                    }
                    : function(t, n, u) {
                        var l, c, f, p, d, h, g = o !== a ? "nextSibling" : "previousSibling", y = t.parentNode, v = s && t.nodeName.toLowerCase(), m = !u && !s, x = !1;
                        if (y) {
                            if (o) {
                                while (g) {
                                    p = t;
                                    while (p = p[g])
                                        if (s ? p.nodeName.toLowerCase() === v : 1 === p.nodeType)
                                            return !1;
                                    h = g = "only" === e && !h && "nextSibling"
                                }
                                return !0
                            }
                            if (h = [a ? y.firstChild : y.lastChild],
                            a && m) {
                                x = (d = (l = (c = (f = (p = y)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === T && l[1]) && l[2],
                                p = d && y.childNodes[d];
                                while (p = ++d && p && p[g] || (x = d = 0) || h.pop())
                                    if (1 === p.nodeType && ++x && p === t) {
                                        c[e] = [T, d, x];
                                        break
                                    }
                            } else if (m && (x = d = (l = (c = (f = (p = t)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === T && l[1]),
                            !1 === x)
                                while (p = ++d && p && p[g] || (x = d = 0) || h.pop())
                                    if ((s ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) && ++x && (m && ((c = (f = p[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] = [T, x]),
                                    p === t))
                                        break;
                            return (x -= i) === r || x % r == 0 && x / r >= 0
                        }
                    }
                },
                PSEUDO: function(e, t) {
                    var n, i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || oe.error("unsupported pseudo: " + e);
                    return i[b] ? i(t) : i.length > 1 ? (n = [e, e, "", t],
                    r.setFilters.hasOwnProperty(e.toLowerCase()) ? se(function(e, n) {
                        var r, o = i(e, t), a = o.length;
                        while (a--)
                            e[r = O(e, o[a])] = !(n[r] = o[a])
                    }) : function(e) {
                        return i(e, 0, n)
                    }
                    ) : i
                }
            },
            pseudos: {
                not: se(function(e) {
                    var t = []
                      , n = []
                      , r = s(e.replace(B, "$1"));
                    return r[b] ? se(function(e, t, n, i) {
                        var o, a = r(e, null, i, []), s = e.length;
                        while (s--)
                            (o = a[s]) && (e[s] = !(t[s] = o))
                    }) : function(e, i, o) {
                        return t[0] = e,
                        r(t, null, o, n),
                        t[0] = null,
                        !n.pop()
                    }
                }),
                has: se(function(e) {
                    return function(t) {
                        return oe(e, t).length > 0
                    }
                }),
                contains: se(function(e) {
                    return e = e.replace(Z, ee),
                    function(t) {
                        return (t.textContent || t.innerText || i(t)).indexOf(e) > -1
                    }
                }),
                lang: se(function(e) {
                    return U.test(e || "") || oe.error("unsupported lang: " + e),
                    e = e.replace(Z, ee).toLowerCase(),
                    function(t) {
                        var n;
                        do {
                            if (n = g ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))
                                return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                        } while ((t = t.parentNode) && 1 === t.nodeType);return !1
                    }
                }),
                target: function(t) {
                    var n = e.location && e.location.hash;
                    return n && n.slice(1) === t.id
                },
                root: function(e) {
                    return e === h
                },
                focus: function(e) {
                    return e === d.activeElement && (!d.hasFocus || d.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                },
                enabled: de(!1),
                disabled: de(!0),
                checked: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                },
                selected: function(e) {
                    return e.parentNode && e.parentNode.selectedIndex,
                    !0 === e.selected
                },
                empty: function(e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                        if (e.nodeType < 6)
                            return !1;
                    return !0
                },
                parent: function(e) {
                    return !r.pseudos.empty(e)
                },
                header: function(e) {
                    return Y.test(e.nodeName)
                },
                input: function(e) {
                    return G.test(e.nodeName)
                },
                button: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                },
                text: function(e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                },
                first: he(function() {
                    return [0]
                }),
                last: he(function(e, t) {
                    return [t - 1]
                }),
                eq: he(function(e, t, n) {
                    return [n < 0 ? n + t : n]
                }),
                even: he(function(e, t) {
                    for (var n = 0; n < t; n += 2)
                        e.push(n);
                    return e
                }),
                odd: he(function(e, t) {
                    for (var n = 1; n < t; n += 2)
                        e.push(n);
                    return e
                }),
                lt: he(function(e, t, n) {
                    for (var r = n < 0 ? n + t : n; --r >= 0; )
                        e.push(r);
                    return e
                }),
                gt: he(function(e, t, n) {
                    for (var r = n < 0 ? n + t : n; ++r < t; )
                        e.push(r);
                    return e
                })
            }
        }).pseudos.nth = r.pseudos.eq;
        for (t in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        })
            r.pseudos[t] = fe(t);
        for (t in {
            submit: !0,
            reset: !0
        })
            r.pseudos[t] = pe(t);
        function ye() {}
        ye.prototype = r.filters = r.pseudos,
        r.setFilters = new ye,
        a = oe.tokenize = function(e, t) {
            var n, i, o, a, s, u, l, c = k[e + " "];
            if (c)
                return t ? 0 : c.slice(0);
            s = e,
            u = [],
            l = r.preFilter;
            while (s) {
                n && !(i = F.exec(s)) || (i && (s = s.slice(i[0].length) || s),
                u.push(o = [])),
                n = !1,
                (i = _.exec(s)) && (n = i.shift(),
                o.push({
                    value: n,
                    type: i[0].replace(B, " ")
                }),
                s = s.slice(n.length));
                for (a in r.filter)
                    !(i = V[a].exec(s)) || l[a] && !(i = l[a](i)) || (n = i.shift(),
                    o.push({
                        value: n,
                        type: a,
                        matches: i
                    }),
                    s = s.slice(n.length));
                if (!n)
                    break
            }
            return t ? s.length : s ? oe.error(e) : k(e, u).slice(0)
        }
        ;
        function ve(e) {
            for (var t = 0, n = e.length, r = ""; t < n; t++)
                r += e[t].value;
            return r
        }
        function me(e, t, n) {
            var r = t.dir
              , i = t.next
              , o = i || r
              , a = n && "parentNode" === o
              , s = C++;
            return t.first ? function(t, n, i) {
                while (t = t[r])
                    if (1 === t.nodeType || a)
                        return e(t, n, i);
                return !1
            }
            : function(t, n, u) {
                var l, c, f, p = [T, s];
                if (u) {
                    while (t = t[r])
                        if ((1 === t.nodeType || a) && e(t, n, u))
                            return !0
                } else
                    while (t = t[r])
                        if (1 === t.nodeType || a)
                            if (f = t[b] || (t[b] = {}),
                            c = f[t.uniqueID] || (f[t.uniqueID] = {}),
                            i && i === t.nodeName.toLowerCase())
                                t = t[r] || t;
                            else {
                                if ((l = c[o]) && l[0] === T && l[1] === s)
                                    return p[2] = l[2];
                                if (c[o] = p,
                                p[2] = e(t, n, u))
                                    return !0
                            }
                return !1
            }
        }
        function xe(e) {
            return e.length > 1 ? function(t, n, r) {
                var i = e.length;
                while (i--)
                    if (!e[i](t, n, r))
                        return !1;
                return !0
            }
            : e[0]
        }
        function be(e, t, n) {
            for (var r = 0, i = t.length; r < i; r++)
                oe(e, t[r], n);
            return n
        }
        function we(e, t, n, r, i) {
            for (var o, a = [], s = 0, u = e.length, l = null != t; s < u; s++)
                (o = e[s]) && (n && !n(o, r, i) || (a.push(o),
                l && t.push(s)));
            return a
        }
        function Te(e, t, n, r, i, o) {
            return r && !r[b] && (r = Te(r)),
            i && !i[b] && (i = Te(i, o)),
            se(function(o, a, s, u) {
                var l, c, f, p = [], d = [], h = a.length, g = o || be(t || "*", s.nodeType ? [s] : s, []), y = !e || !o && t ? g : we(g, p, e, s, u), v = n ? i || (o ? e : h || r) ? [] : a : y;
                if (n && n(y, v, s, u),
                r) {
                    l = we(v, d),
                    r(l, [], s, u),
                    c = l.length;
                    while (c--)
                        (f = l[c]) && (v[d[c]] = !(y[d[c]] = f))
                }
                if (o) {
                    if (i || e) {
                        if (i) {
                            l = [],
                            c = v.length;
                            while (c--)
                                (f = v[c]) && l.push(y[c] = f);
                            i(null, v = [], l, u)
                        }
                        c = v.length;
                        while (c--)
                            (f = v[c]) && (l = i ? O(o, f) : p[c]) > -1 && (o[l] = !(a[l] = f))
                    }
                } else
                    v = we(v === a ? v.splice(h, v.length) : v),
                    i ? i(null, a, v, u) : L.apply(a, v)
            })
        }
        function Ce(e) {
            for (var t, n, i, o = e.length, a = r.relative[e[0].type], s = a || r.relative[" "], u = a ? 1 : 0, c = me(function(e) {
                return e === t
            }, s, !0), f = me(function(e) {
                return O(t, e) > -1
            }, s, !0), p = [function(e, n, r) {
                var i = !a && (r || n !== l) || ((t = n).nodeType ? c(e, n, r) : f(e, n, r));
                return t = null,
                i
            }
            ]; u < o; u++)
                if (n = r.relative[e[u].type])
                    p = [me(xe(p), n)];
                else {
                    if ((n = r.filter[e[u].type].apply(null, e[u].matches))[b]) {
                        for (i = ++u; i < o; i++)
                            if (r.relative[e[i].type])
                                break;
                        return Te(u > 1 && xe(p), u > 1 && ve(e.slice(0, u - 1).concat({
                            value: " " === e[u - 2].type ? "*" : ""
                        })).replace(B, "$1"), n, u < i && Ce(e.slice(u, i)), i < o && Ce(e = e.slice(i)), i < o && ve(e))
                    }
                    p.push(n)
                }
            return xe(p)
        }
        function Ee(e, t) {
            var n = t.length > 0
              , i = e.length > 0
              , o = function(o, a, s, u, c) {
                var f, h, y, v = 0, m = "0", x = o && [], b = [], w = l, C = o || i && r.find.TAG("*", c), E = T += null == w ? 1 : Math.random() || .1, k = C.length;
                for (c && (l = a === d || a || c); m !== k && null != (f = C[m]); m++) {
                    if (i && f) {
                        h = 0,
                        a || f.ownerDocument === d || (p(f),
                        s = !g);
                        while (y = e[h++])
                            if (y(f, a || d, s)) {
                                u.push(f);
                                break
                            }
                        c && (T = E)
                    }
                    n && ((f = !y && f) && v--,
                    o && x.push(f))
                }
                if (v += m,
                n && m !== v) {
                    h = 0;
                    while (y = t[h++])
                        y(x, b, a, s);
                    if (o) {
                        if (v > 0)
                            while (m--)
                                x[m] || b[m] || (b[m] = j.call(u));
                        b = we(b)
                    }
                    L.apply(u, b),
                    c && !o && b.length > 0 && v + t.length > 1 && oe.uniqueSort(u)
                }
                return c && (T = E,
                l = w),
                x
            };
            return n ? se(o) : o
        }
        return s = oe.compile = function(e, t) {
            var n, r = [], i = [], o = S[e + " "];
            if (!o) {
                t || (t = a(e)),
                n = t.length;
                while (n--)
                    (o = Ce(t[n]))[b] ? r.push(o) : i.push(o);
                (o = S(e, Ee(i, r))).selector = e
            }
            return o
        }
        ,
        u = oe.select = function(e, t, n, i) {
            var o, u, l, c, f, p = "function" == typeof e && e, d = !i && a(e = p.selector || e);
            if (n = n || [],
            1 === d.length) {
                if ((u = d[0] = d[0].slice(0)).length > 2 && "ID" === (l = u[0]).type && 9 === t.nodeType && g && r.relative[u[1].type]) {
                    if (!(t = (r.find.ID(l.matches[0].replace(Z, ee), t) || [])[0]))
                        return n;
                    p && (t = t.parentNode),
                    e = e.slice(u.shift().value.length)
                }
                o = V.needsContext.test(e) ? 0 : u.length;
                while (o--) {
                    if (l = u[o],
                    r.relative[c = l.type])
                        break;
                    if ((f = r.find[c]) && (i = f(l.matches[0].replace(Z, ee), K.test(u[0].type) && ge(t.parentNode) || t))) {
                        if (u.splice(o, 1),
                        !(e = i.length && ve(u)))
                            return L.apply(n, i),
                            n;
                        break
                    }
                }
            }
            return (p || s(e, d))(i, t, !g, n, !t || K.test(e) && ge(t.parentNode) || t),
            n
        }
        ,
        n.sortStable = b.split("").sort(D).join("") === b,
        n.detectDuplicates = !!f,
        p(),
        n.sortDetached = ue(function(e) {
            return 1 & e.compareDocumentPosition(d.createElement("fieldset"))
        }),
        ue(function(e) {
            return e.innerHTML = "<a href='#'></a>",
            "#" === e.firstChild.getAttribute("href")
        }) || le("type|href|height|width", function(e, t, n) {
            if (!n)
                return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }),
        n.attributes && ue(function(e) {
            return e.innerHTML = "<input/>",
            e.firstChild.setAttribute("value", ""),
            "" === e.firstChild.getAttribute("value")
        }) || le("value", function(e, t, n) {
            if (!n && "input" === e.nodeName.toLowerCase())
                return e.defaultValue
        }),
        ue(function(e) {
            return null == e.getAttribute("disabled")
        }) || le(P, function(e, t, n) {
            var r;
            if (!n)
                return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
        }),
        oe
    }(e);
    w.find = E,
    w.expr = E.selectors,
    w.expr[":"] = w.expr.pseudos,
    w.uniqueSort = w.unique = E.uniqueSort,
    w.text = E.getText,
    w.isXMLDoc = E.isXML,
    w.contains = E.contains,
    w.escapeSelector = E.escape;
    var k = function(e, t, n) {
        var r = []
          , i = void 0 !== n;
        while ((e = e[t]) && 9 !== e.nodeType)
            if (1 === e.nodeType) {
                if (i && w(e).is(n))
                    break;
                r.push(e)
            }
        return r
    }
      , S = function(e, t) {
        for (var n = []; e; e = e.nextSibling)
            1 === e.nodeType && e !== t && n.push(e);
        return n
    }
      , D = w.expr.match.needsContext;
    function N(e, t) {
        return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
    }
    var A = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
    function j(e, t, n) {
        return g(t) ? w.grep(e, function(e, r) {
            return !!t.call(e, r, e) !== n
        }) : t.nodeType ? w.grep(e, function(e) {
            return e === t !== n
        }) : "string" != typeof t ? w.grep(e, function(e) {
            return u.call(t, e) > -1 !== n
        }) : w.filter(t, e, n)
    }
    w.filter = function(e, t, n) {
        var r = t[0];
        return n && (e = ":not(" + e + ")"),
        1 === t.length && 1 === r.nodeType ? w.find.matchesSelector(r, e) ? [r] : [] : w.find.matches(e, w.grep(t, function(e) {
            return 1 === e.nodeType
        }))
    }
    ,
    w.fn.extend({
        find: function(e) {
            var t, n, r = this.length, i = this;
            if ("string" != typeof e)
                return this.pushStack(w(e).filter(function() {
                    for (t = 0; t < r; t++)
                        if (w.contains(i[t], this))
                            return !0
                }));
            for (n = this.pushStack([]),
            t = 0; t < r; t++)
                w.find(e, i[t], n);
            return r > 1 ? w.uniqueSort(n) : n
        },
        filter: function(e) {
            return this.pushStack(j(this, e || [], !1))
        },
        not: function(e) {
            return this.pushStack(j(this, e || [], !0))
        },
        is: function(e) {
            return !!j(this, "string" == typeof e && D.test(e) ? w(e) : e || [], !1).length
        }
    });
    var q, L = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
    (w.fn.init = function(e, t, n) {
        var i, o;
        if (!e)
            return this;
        if (n = n || q,
        "string" == typeof e) {
            if (!(i = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : L.exec(e)) || !i[1] && t)
                return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
            if (i[1]) {
                if (t = t instanceof w ? t[0] : t,
                w.merge(this, w.parseHTML(i[1], t && t.nodeType ? t.ownerDocument || t : r, !0)),
                A.test(i[1]) && w.isPlainObject(t))
                    for (i in t)
                        g(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
                return this
            }
            return (o = r.getElementById(i[2])) && (this[0] = o,
            this.length = 1),
            this
        }
        return e.nodeType ? (this[0] = e,
        this.length = 1,
        this) : g(e) ? void 0 !== n.ready ? n.ready(e) : e(w) : w.makeArray(e, this)
    }
    ).prototype = w.fn,
    q = w(r);
    var H = /^(?:parents|prev(?:Until|All))/
      , O = {
        children: !0,
        contents: !0,
        next: !0,
        prev: !0
    };
    w.fn.extend({
        has: function(e) {
            var t = w(e, this)
              , n = t.length;
            return this.filter(function() {
                for (var e = 0; e < n; e++)
                    if (w.contains(this, t[e]))
                        return !0
            })
        },
        closest: function(e, t) {
            var n, r = 0, i = this.length, o = [], a = "string" != typeof e && w(e);
            if (!D.test(e))
                for (; r < i; r++)
                    for (n = this[r]; n && n !== t; n = n.parentNode)
                        if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && w.find.matchesSelector(n, e))) {
                            o.push(n);
                            break
                        }
            return this.pushStack(o.length > 1 ? w.uniqueSort(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? u.call(w(e), this[0]) : u.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            return this.pushStack(w.uniqueSort(w.merge(this.get(), w(e, t))))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    });
    function P(e, t) {
        while ((e = e[t]) && 1 !== e.nodeType)
            ;
        return e
    }
    w.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return k(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return k(e, "parentNode", n)
        },
        next: function(e) {
            return P(e, "nextSibling")
        },
        prev: function(e) {
            return P(e, "previousSibling")
        },
        nextAll: function(e) {
            return k(e, "nextSibling")
        },
        prevAll: function(e) {
            return k(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return k(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return k(e, "previousSibling", n)
        },
        siblings: function(e) {
            return S((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return S(e.firstChild)
        },
        contents: function(e) {
            return N(e, "iframe") ? e.contentDocument : (N(e, "template") && (e = e.content || e),
            w.merge([], e.childNodes))
        }
    }, function(e, t) {
        w.fn[e] = function(n, r) {
            var i = w.map(this, t, n);
            return "Until" !== e.slice(-5) && (r = n),
            r && "string" == typeof r && (i = w.filter(r, i)),
            this.length > 1 && (O[e] || w.uniqueSort(i),
            H.test(e) && i.reverse()),
            this.pushStack(i)
        }
    });
    var M = /[^\x20\t\r\n\f]+/g;
    function R(e) {
        var t = {};
        return w.each(e.match(M) || [], function(e, n) {
            t[n] = !0
        }),
        t
    }
    w.Callbacks = function(e) {
        e = "string" == typeof e ? R(e) : w.extend({}, e);
        var t, n, r, i, o = [], a = [], s = -1, u = function() {
            for (i = i || e.once,
            r = t = !0; a.length; s = -1) {
                n = a.shift();
                while (++s < o.length)
                    !1 === o[s].apply(n[0], n[1]) && e.stopOnFalse && (s = o.length,
                    n = !1)
            }
            e.memory || (n = !1),
            t = !1,
            i && (o = n ? [] : "")
        }, l = {
            add: function() {
                return o && (n && !t && (s = o.length - 1,
                a.push(n)),
                function t(n) {
                    w.each(n, function(n, r) {
                        g(r) ? e.unique && l.has(r) || o.push(r) : r && r.length && "string" !== x(r) && t(r)
                    })
                }(arguments),
                n && !t && u()),
                this
            },
            remove: function() {
                return w.each(arguments, function(e, t) {
                    var n;
                    while ((n = w.inArray(t, o, n)) > -1)
                        o.splice(n, 1),
                        n <= s && s--
                }),
                this
            },
            has: function(e) {
                return e ? w.inArray(e, o) > -1 : o.length > 0
            },
            empty: function() {
                return o && (o = []),
                this
            },
            disable: function() {
                return i = a = [],
                o = n = "",
                this
            },
            disabled: function() {
                return !o
            },
            lock: function() {
                return i = a = [],
                n || t || (o = n = ""),
                this
            },
            locked: function() {
                return !!i
            },
            fireWith: function(e, n) {
                return i || (n = [e, (n = n || []).slice ? n.slice() : n],
                a.push(n),
                t || u()),
                this
            },
            fire: function() {
                return l.fireWith(this, arguments),
                this
            },
            fired: function() {
                return !!r
            }
        };
        return l
    }
    ;
    function I(e) {
        return e
    }
    function W(e) {
        throw e
    }
    function $(e, t, n, r) {
        var i;
        try {
            e && g(i = e.promise) ? i.call(e).done(t).fail(n) : e && g(i = e.then) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r))
        } catch (e) {
            n.apply(void 0, [e])
        }
    }
    w.extend({
        Deferred: function(t) {
            var n = [["notify", "progress", w.Callbacks("memory"), w.Callbacks("memory"), 2], ["resolve", "done", w.Callbacks("once memory"), w.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", w.Callbacks("once memory"), w.Callbacks("once memory"), 1, "rejected"]]
              , r = "pending"
              , i = {
                state: function() {
                    return r
                },
                always: function() {
                    return o.done(arguments).fail(arguments),
                    this
                },
                "catch": function(e) {
                    return i.then(null, e)
                },
                pipe: function() {
                    var e = arguments;
                    return w.Deferred(function(t) {
                        w.each(n, function(n, r) {
                            var i = g(e[r[4]]) && e[r[4]];
                            o[r[1]](function() {
                                var e = i && i.apply(this, arguments);
                                e && g(e.promise) ? e.promise().progress(t.notify).done(t.resolve).fail(t.reject) : t[r[0] + "With"](this, i ? [e] : arguments)
                            })
                        }),
                        e = null
                    }).promise()
                },
                then: function(t, r, i) {
                    var o = 0;
                    function a(t, n, r, i) {
                        return function() {
                            var s = this
                              , u = arguments
                              , l = function() {
                                var e, l;
                                if (!(t < o)) {
                                    if ((e = r.apply(s, u)) === n.promise())
                                        throw new TypeError("Thenable self-resolution");
                                    l = e && ("object" == typeof e || "function" == typeof e) && e.then,
                                    g(l) ? i ? l.call(e, a(o, n, I, i), a(o, n, W, i)) : (o++,
                                    l.call(e, a(o, n, I, i), a(o, n, W, i), a(o, n, I, n.notifyWith))) : (r !== I && (s = void 0,
                                    u = [e]),
                                    (i || n.resolveWith)(s, u))
                                }
                            }
                              , c = i ? l : function() {
                                try {
                                    l()
                                } catch (e) {
                                    w.Deferred.exceptionHook && w.Deferred.exceptionHook(e, c.stackTrace),
                                    t + 1 >= o && (r !== W && (s = void 0,
                                    u = [e]),
                                    n.rejectWith(s, u))
                                }
                            }
                            ;
                            t ? c() : (w.Deferred.getStackHook && (c.stackTrace = w.Deferred.getStackHook()),
                            e.setTimeout(c))
                        }
                    }
                    return w.Deferred(function(e) {
                        n[0][3].add(a(0, e, g(i) ? i : I, e.notifyWith)),
                        n[1][3].add(a(0, e, g(t) ? t : I)),
                        n[2][3].add(a(0, e, g(r) ? r : W))
                    }).promise()
                },
                promise: function(e) {
                    return null != e ? w.extend(e, i) : i
                }
            }
              , o = {};
            return w.each(n, function(e, t) {
                var a = t[2]
                  , s = t[5];
                i[t[1]] = a.add,
                s && a.add(function() {
                    r = s
                }, n[3 - e][2].disable, n[3 - e][3].disable, n[0][2].lock, n[0][3].lock),
                a.add(t[3].fire),
                o[t[0]] = function() {
                    return o[t[0] + "With"](this === o ? void 0 : this, arguments),
                    this
                }
                ,
                o[t[0] + "With"] = a.fireWith
            }),
            i.promise(o),
            t && t.call(o, o),
            o
        },
        when: function(e) {
            var t = arguments.length
              , n = t
              , r = Array(n)
              , i = o.call(arguments)
              , a = w.Deferred()
              , s = function(e) {
                return function(n) {
                    r[e] = this,
                    i[e] = arguments.length > 1 ? o.call(arguments) : n,
                    --t || a.resolveWith(r, i)
                }
            };
            if (t <= 1 && ($(e, a.done(s(n)).resolve, a.reject, !t),
            "pending" === a.state() || g(i[n] && i[n].then)))
                return a.then();
            while (n--)
                $(i[n], s(n), a.reject);
            return a.promise()
        }
    });
    var B = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
    w.Deferred.exceptionHook = function(t, n) {
        e.console && e.console.warn && t && B.test(t.name) && e.console.warn("jQuery.Deferred exception: " + t.message, t.stack, n)
    }
    ,
    w.readyException = function(t) {
        e.setTimeout(function() {
            throw t
        })
    }
    ;
    var F = w.Deferred();
    w.fn.ready = function(e) {
        return F.then(e)["catch"](function(e) {
            w.readyException(e)
        }),
        this
    }
    ,
    w.extend({
        isReady: !1,
        readyWait: 1,
        ready: function(e) {
            (!0 === e ? --w.readyWait : w.isReady) || (w.isReady = !0,
            !0 !== e && --w.readyWait > 0 || F.resolveWith(r, [w]))
        }
    }),
    w.ready.then = F.then;
    function _() {
        r.removeEventListener("DOMContentLoaded", _),
        e.removeEventListener("load", _),
        w.ready()
    }
    "complete" === r.readyState || "loading" !== r.readyState && !r.documentElement.doScroll ? e.setTimeout(w.ready) : (r.addEventListener("DOMContentLoaded", _),
    e.addEventListener("load", _));
    var z = function(e, t, n, r, i, o, a) {
        var s = 0
          , u = e.length
          , l = null == n;
        if ("object" === x(n)) {
            i = !0;
            for (s in n)
                z(e, t, s, n[s], !0, o, a)
        } else if (void 0 !== r && (i = !0,
        g(r) || (a = !0),
        l && (a ? (t.call(e, r),
        t = null) : (l = t,
        t = function(e, t, n) {
            return l.call(w(e), n)
        }
        )),
        t))
            for (; s < u; s++)
                t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
        return i ? e : l ? t.call(e) : u ? t(e[0], n) : o
    }
      , X = /^-ms-/
      , U = /-([a-z])/g;
    function V(e, t) {
        return t.toUpperCase()
    }
    function G(e) {
        return e.replace(X, "ms-").replace(U, V)
    }
    var Y = function(e) {
        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
    };
    function Q() {
        this.expando = w.expando + Q.uid++
    }
    Q.uid = 1,
    Q.prototype = {
        cache: function(e) {
            var t = e[this.expando];
            return t || (t = {},
            Y(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                value: t,
                configurable: !0
            }))),
            t
        },
        set: function(e, t, n) {
            var r, i = this.cache(e);
            if ("string" == typeof t)
                i[G(t)] = n;
            else
                for (r in t)
                    i[G(r)] = t[r];
            return i
        },
        get: function(e, t) {
            return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][G(t)]
        },
        access: function(e, t, n) {
            return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n),
            void 0 !== n ? n : t)
        },
        remove: function(e, t) {
            var n, r = e[this.expando];
            if (void 0 !== r) {
                if (void 0 !== t) {
                    n = (t = Array.isArray(t) ? t.map(G) : (t = G(t))in r ? [t] : t.match(M) || []).length;
                    while (n--)
                        delete r[t[n]]
                }
                (void 0 === t || w.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
            }
        },
        hasData: function(e) {
            var t = e[this.expando];
            return void 0 !== t && !w.isEmptyObject(t)
        }
    };
    var J = new Q
      , K = new Q
      , Z = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/
      , ee = /[A-Z]/g;
    function te(e) {
        return "true" === e || "false" !== e && ("null" === e ? null : e === +e + "" ? +e : Z.test(e) ? JSON.parse(e) : e)
    }
    function ne(e, t, n) {
        var r;
        if (void 0 === n && 1 === e.nodeType)
            if (r = "data-" + t.replace(ee, "-$&").toLowerCase(),
            "string" == typeof (n = e.getAttribute(r))) {
                try {
                    n = te(n)
                } catch (e) {}
                K.set(e, t, n)
            } else
                n = void 0;
        return n
    }
    w.extend({
        hasData: function(e) {
            return K.hasData(e) || J.hasData(e)
        },
        data: function(e, t, n) {
            return K.access(e, t, n)
        },
        removeData: function(e, t) {
            K.remove(e, t)
        },
        _data: function(e, t, n) {
            return J.access(e, t, n)
        },
        _removeData: function(e, t) {
            J.remove(e, t)
        }
    }),
    w.fn.extend({
        data: function(e, t) {
            var n, r, i, o = this[0], a = o && o.attributes;
            if (void 0 === e) {
                if (this.length && (i = K.get(o),
                1 === o.nodeType && !J.get(o, "hasDataAttrs"))) {
                    n = a.length;
                    while (n--)
                        a[n] && 0 === (r = a[n].name).indexOf("data-") && (r = G(r.slice(5)),
                        ne(o, r, i[r]));
                    J.set(o, "hasDataAttrs", !0)
                }
                return i
            }
            return "object" == typeof e ? this.each(function() {
                K.set(this, e)
            }) : z(this, function(t) {
                var n;
                if (o && void 0 === t) {
                    if (void 0 !== (n = K.get(o, e)))
                        return n;
                    if (void 0 !== (n = ne(o, e)))
                        return n
                } else
                    this.each(function() {
                        K.set(this, e, t)
                    })
            }, null, t, arguments.length > 1, null, !0)
        },
        removeData: function(e) {
            return this.each(function() {
                K.remove(this, e)
            })
        }
    }),
    w.extend({
        queue: function(e, t, n) {
            var r;
            if (e)
                return t = (t || "fx") + "queue",
                r = J.get(e, t),
                n && (!r || Array.isArray(n) ? r = J.access(e, t, w.makeArray(n)) : r.push(n)),
                r || []
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = w.queue(e, t)
              , r = n.length
              , i = n.shift()
              , o = w._queueHooks(e, t)
              , a = function() {
                w.dequeue(e, t)
            };
            "inprogress" === i && (i = n.shift(),
            r--),
            i && ("fx" === t && n.unshift("inprogress"),
            delete o.stop,
            i.call(e, a, o)),
            !r && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return J.get(e, n) || J.access(e, n, {
                empty: w.Callbacks("once memory").add(function() {
                    J.remove(e, [t + "queue", n])
                })
            })
        }
    }),
    w.fn.extend({
        queue: function(e, t) {
            var n = 2;
            return "string" != typeof e && (t = e,
            e = "fx",
            n--),
            arguments.length < n ? w.queue(this[0], e) : void 0 === t ? this : this.each(function() {
                var n = w.queue(this, e, t);
                w._queueHooks(this, e),
                "fx" === e && "inprogress" !== n[0] && w.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                w.dequeue(this, e)
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, t) {
            var n, r = 1, i = w.Deferred(), o = this, a = this.length, s = function() {
                --r || i.resolveWith(o, [o])
            };
            "string" != typeof e && (t = e,
            e = void 0),
            e = e || "fx";
            while (a--)
                (n = J.get(o[a], e + "queueHooks")) && n.empty && (r++,
                n.empty.add(s));
            return s(),
            i.promise(t)
        }
    });
    var re = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source
      , ie = new RegExp("^(?:([+-])=|)(" + re + ")([a-z%]*)$","i")
      , oe = ["Top", "Right", "Bottom", "Left"]
      , ae = function(e, t) {
        return "none" === (e = t || e).style.display || "" === e.style.display && w.contains(e.ownerDocument, e) && "none" === w.css(e, "display")
    }
      , se = function(e, t, n, r) {
        var i, o, a = {};
        for (o in t)
            a[o] = e.style[o],
            e.style[o] = t[o];
        i = n.apply(e, r || []);
        for (o in t)
            e.style[o] = a[o];
        return i
    };
    function ue(e, t, n, r) {
        var i, o, a = 20, s = r ? function() {
            return r.cur()
        }
        : function() {
            return w.css(e, t, "")
        }
        , u = s(), l = n && n[3] || (w.cssNumber[t] ? "" : "px"), c = (w.cssNumber[t] || "px" !== l && +u) && ie.exec(w.css(e, t));
        if (c && c[3] !== l) {
            u /= 2,
            l = l || c[3],
            c = +u || 1;
            while (a--)
                w.style(e, t, c + l),
                (1 - o) * (1 - (o = s() / u || .5)) <= 0 && (a = 0),
                c /= o;
            c *= 2,
            w.style(e, t, c + l),
            n = n || []
        }
        return n && (c = +c || +u || 0,
        i = n[1] ? c + (n[1] + 1) * n[2] : +n[2],
        r && (r.unit = l,
        r.start = c,
        r.end = i)),
        i
    }
    var le = {};
    function ce(e) {
        var t, n = e.ownerDocument, r = e.nodeName, i = le[r];
        return i || (t = n.body.appendChild(n.createElement(r)),
        i = w.css(t, "display"),
        t.parentNode.removeChild(t),
        "none" === i && (i = "block"),
        le[r] = i,
        i)
    }
    function fe(e, t) {
        for (var n, r, i = [], o = 0, a = e.length; o < a; o++)
            (r = e[o]).style && (n = r.style.display,
            t ? ("none" === n && (i[o] = J.get(r, "display") || null,
            i[o] || (r.style.display = "")),
            "" === r.style.display && ae(r) && (i[o] = ce(r))) : "none" !== n && (i[o] = "none",
            J.set(r, "display", n)));
        for (o = 0; o < a; o++)
            null != i[o] && (e[o].style.display = i[o]);
        return e
    }
    w.fn.extend({
        show: function() {
            return fe(this, !0)
        },
        hide: function() {
            return fe(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                ae(this) ? w(this).show() : w(this).hide()
            })
        }
    });
    var pe = /^(?:checkbox|radio)$/i
      , de = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i
      , he = /^$|^module$|\/(?:java|ecma)script/i
      , ge = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        thead: [1, "<table>", "</table>"],
        col: [2, "<table><colgroup>", "</colgroup></table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: [0, "", ""]
    };
    ge.optgroup = ge.option,
    ge.tbody = ge.tfoot = ge.colgroup = ge.caption = ge.thead,
    ge.th = ge.td;
    function ye(e, t) {
        var n;
        return n = "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t || "*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll(t || "*") : [],
        void 0 === t || t && N(e, t) ? w.merge([e], n) : n
    }
    function ve(e, t) {
        for (var n = 0, r = e.length; n < r; n++)
            J.set(e[n], "globalEval", !t || J.get(t[n], "globalEval"))
    }
    var me = /<|&#?\w+;/;
    function xe(e, t, n, r, i) {
        for (var o, a, s, u, l, c, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++)
            if ((o = e[d]) || 0 === o)
                if ("object" === x(o))
                    w.merge(p, o.nodeType ? [o] : o);
                else if (me.test(o)) {
                    a = a || f.appendChild(t.createElement("div")),
                    s = (de.exec(o) || ["", ""])[1].toLowerCase(),
                    u = ge[s] || ge._default,
                    a.innerHTML = u[1] + w.htmlPrefilter(o) + u[2],
                    c = u[0];
                    while (c--)
                        a = a.lastChild;
                    w.merge(p, a.childNodes),
                    (a = f.firstChild).textContent = ""
                } else
                    p.push(t.createTextNode(o));
        f.textContent = "",
        d = 0;
        while (o = p[d++])
            if (r && w.inArray(o, r) > -1)
                i && i.push(o);
            else if (l = w.contains(o.ownerDocument, o),
            a = ye(f.appendChild(o), "script"),
            l && ve(a),
            n) {
                c = 0;
                while (o = a[c++])
                    he.test(o.type || "") && n.push(o)
            }
        return f
    }
    !function() {
        var e = r.createDocumentFragment().appendChild(r.createElement("div"))
          , t = r.createElement("input");
        t.setAttribute("type", "radio"),
        t.setAttribute("checked", "checked"),
        t.setAttribute("name", "t"),
        e.appendChild(t),
        h.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked,
        e.innerHTML = "<textarea>x</textarea>",
        h.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue
    }();
    var be = r.documentElement
      , we = /^key/
      , Te = /^(?:mouse|pointer|contextmenu|drag|drop)|click/
      , Ce = /^([^.]*)(?:\.(.+)|)/;
    function Ee() {
        return !0
    }
    function ke() {
        return !1
    }
    function Se() {
        try {
            return r.activeElement
        } catch (e) {}
    }
    function De(e, t, n, r, i, o) {
        var a, s;
        if ("object" == typeof t) {
            "string" != typeof n && (r = r || n,
            n = void 0);
            for (s in t)
                De(e, s, n, r, t[s], o);
            return e
        }
        if (null == r && null == i ? (i = n,
        r = n = void 0) : null == i && ("string" == typeof n ? (i = r,
        r = void 0) : (i = r,
        r = n,
        n = void 0)),
        !1 === i)
            i = ke;
        else if (!i)
            return e;
        return 1 === o && (a = i,
        (i = function(e) {
            return w().off(e),
            a.apply(this, arguments)
        }
        ).guid = a.guid || (a.guid = w.guid++)),
        e.each(function() {
            w.event.add(this, t, i, r, n)
        })
    }
    w.event = {
        global: {},
        add: function(e, t, n, r, i) {
            var o, a, s, u, l, c, f, p, d, h, g, y = J.get(e);
            if (y) {
                n.handler && (n = (o = n).handler,
                i = o.selector),
                i && w.find.matchesSelector(be, i),
                n.guid || (n.guid = w.guid++),
                (u = y.events) || (u = y.events = {}),
                (a = y.handle) || (a = y.handle = function(t) {
                    return "undefined" != typeof w && w.event.triggered !== t.type ? w.event.dispatch.apply(e, arguments) : void 0
                }
                ),
                l = (t = (t || "").match(M) || [""]).length;
                while (l--)
                    d = g = (s = Ce.exec(t[l]) || [])[1],
                    h = (s[2] || "").split(".").sort(),
                    d && (f = w.event.special[d] || {},
                    d = (i ? f.delegateType : f.bindType) || d,
                    f = w.event.special[d] || {},
                    c = w.extend({
                        type: d,
                        origType: g,
                        data: r,
                        handler: n,
                        guid: n.guid,
                        selector: i,
                        needsContext: i && w.expr.match.needsContext.test(i),
                        namespace: h.join(".")
                    }, o),
                    (p = u[d]) || ((p = u[d] = []).delegateCount = 0,
                    f.setup && !1 !== f.setup.call(e, r, h, a) || e.addEventListener && e.addEventListener(d, a)),
                    f.add && (f.add.call(e, c),
                    c.handler.guid || (c.handler.guid = n.guid)),
                    i ? p.splice(p.delegateCount++, 0, c) : p.push(c),
                    w.event.global[d] = !0)
            }
        },
        remove: function(e, t, n, r, i) {
            var o, a, s, u, l, c, f, p, d, h, g, y = J.hasData(e) && J.get(e);
            if (y && (u = y.events)) {
                l = (t = (t || "").match(M) || [""]).length;
                while (l--)
                    if (s = Ce.exec(t[l]) || [],
                    d = g = s[1],
                    h = (s[2] || "").split(".").sort(),
                    d) {
                        f = w.event.special[d] || {},
                        p = u[d = (r ? f.delegateType : f.bindType) || d] || [],
                        s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"),
                        a = o = p.length;
                        while (o--)
                            c = p[o],
                            !i && g !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (p.splice(o, 1),
                            c.selector && p.delegateCount--,
                            f.remove && f.remove.call(e, c));
                        a && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, y.handle) || w.removeEvent(e, d, y.handle),
                        delete u[d])
                    } else
                        for (d in u)
                            w.event.remove(e, d + t[l], n, r, !0);
                w.isEmptyObject(u) && J.remove(e, "handle events")
            }
        },
        dispatch: function(e) {
            var t = w.event.fix(e), n, r, i, o, a, s, u = new Array(arguments.length), l = (J.get(this, "events") || {})[t.type] || [], c = w.event.special[t.type] || {};
            for (u[0] = t,
            n = 1; n < arguments.length; n++)
                u[n] = arguments[n];
            if (t.delegateTarget = this,
            !c.preDispatch || !1 !== c.preDispatch.call(this, t)) {
                s = w.event.handlers.call(this, t, l),
                n = 0;
                while ((o = s[n++]) && !t.isPropagationStopped()) {
                    t.currentTarget = o.elem,
                    r = 0;
                    while ((a = o.handlers[r++]) && !t.isImmediatePropagationStopped())
                        t.rnamespace && !t.rnamespace.test(a.namespace) || (t.handleObj = a,
                        t.data = a.data,
                        void 0 !== (i = ((w.event.special[a.origType] || {}).handle || a.handler).apply(o.elem, u)) && !1 === (t.result = i) && (t.preventDefault(),
                        t.stopPropagation()))
                }
                return c.postDispatch && c.postDispatch.call(this, t),
                t.result
            }
        },
        handlers: function(e, t) {
            var n, r, i, o, a, s = [], u = t.delegateCount, l = e.target;
            if (u && l.nodeType && !("click" === e.type && e.button >= 1))
                for (; l !== this; l = l.parentNode || this)
                    if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
                        for (o = [],
                        a = {},
                        n = 0; n < u; n++)
                            void 0 === a[i = (r = t[n]).selector + " "] && (a[i] = r.needsContext ? w(i, this).index(l) > -1 : w.find(i, this, null, [l]).length),
                            a[i] && o.push(r);
                        o.length && s.push({
                            elem: l,
                            handlers: o
                        })
                    }
            return l = this,
            u < t.length && s.push({
                elem: l,
                handlers: t.slice(u)
            }),
            s
        },
        addProp: function(e, t) {
            Object.defineProperty(w.Event.prototype, e, {
                enumerable: !0,
                configurable: !0,
                get: g(t) ? function() {
                    if (this.originalEvent)
                        return t(this.originalEvent)
                }
                : function() {
                    if (this.originalEvent)
                        return this.originalEvent[e]
                }
                ,
                set: function(t) {
                    Object.defineProperty(this, e, {
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                        value: t
                    })
                }
            })
        },
        fix: function(e) {
            return e[w.expando] ? e : new w.Event(e)
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== Se() && this.focus)
                        return this.focus(),
                        !1
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    if (this === Se() && this.blur)
                        return this.blur(),
                        !1
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    if ("checkbox" === this.type && this.click && N(this, "input"))
                        return this.click(),
                        !1
                },
                _default: function(e) {
                    return N(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                }
            }
        }
    },
    w.removeEvent = function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n)
    }
    ,
    w.Event = function(e, t) {
        if (!(this instanceof w.Event))
            return new w.Event(e,t);
        e && e.type ? (this.originalEvent = e,
        this.type = e.type,
        this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? Ee : ke,
        this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target,
        this.currentTarget = e.currentTarget,
        this.relatedTarget = e.relatedTarget) : this.type = e,
        t && w.extend(this, t),
        this.timeStamp = e && e.timeStamp || Date.now(),
        this[w.expando] = !0
    }
    ,
    w.Event.prototype = {
        constructor: w.Event,
        isDefaultPrevented: ke,
        isPropagationStopped: ke,
        isImmediatePropagationStopped: ke,
        isSimulated: !1,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = Ee,
            e && !this.isSimulated && e.preventDefault()
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = Ee,
            e && !this.isSimulated && e.stopPropagation()
        },
        stopImmediatePropagation: function() {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = Ee,
            e && !this.isSimulated && e.stopImmediatePropagation(),
            this.stopPropagation()
        }
    },
    w.each({
        altKey: !0,
        bubbles: !0,
        cancelable: !0,
        changedTouches: !0,
        ctrlKey: !0,
        detail: !0,
        eventPhase: !0,
        metaKey: !0,
        pageX: !0,
        pageY: !0,
        shiftKey: !0,
        view: !0,
        "char": !0,
        charCode: !0,
        key: !0,
        keyCode: !0,
        button: !0,
        buttons: !0,
        clientX: !0,
        clientY: !0,
        offsetX: !0,
        offsetY: !0,
        pointerId: !0,
        pointerType: !0,
        screenX: !0,
        screenY: !0,
        targetTouches: !0,
        toElement: !0,
        touches: !0,
        which: function(e) {
            var t = e.button;
            return null == e.which && we.test(e.type) ? null != e.charCode ? e.charCode : e.keyCode : !e.which && void 0 !== t && Te.test(e.type) ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : e.which
        }
    }, w.event.addProp),
    w.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function(e, t) {
        w.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, r = this, i = e.relatedTarget, o = e.handleObj;
                return i && (i === r || w.contains(r, i)) || (e.type = o.origType,
                n = o.handler.apply(this, arguments),
                e.type = t),
                n
            }
        }
    }),
    w.fn.extend({
        on: function(e, t, n, r) {
            return De(this, e, t, n, r)
        },
        one: function(e, t, n, r) {
            return De(this, e, t, n, r, 1)
        },
        off: function(e, t, n) {
            var r, i;
            if (e && e.preventDefault && e.handleObj)
                return r = e.handleObj,
                w(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler),
                this;
            if ("object" == typeof e) {
                for (i in e)
                    this.off(i, t, e[i]);
                return this
            }
            return !1 !== t && "function" != typeof t || (n = t,
            t = void 0),
            !1 === n && (n = ke),
            this.each(function() {
                w.event.remove(this, e, n, t)
            })
        }
    });
    var Ne = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi
      , Ae = /<script|<style|<link/i
      , je = /checked\s*(?:[^=]|=\s*.checked.)/i
      , qe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
    function Le(e, t) {
        return N(e, "table") && N(11 !== t.nodeType ? t : t.firstChild, "tr") ? w(e).children("tbody")[0] || e : e
    }
    function He(e) {
        return e.type = (null !== e.getAttribute("type")) + "/" + e.type,
        e
    }
    function Oe(e) {
        return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"),
        e
    }
    function Pe(e, t) {
        var n, r, i, o, a, s, u, l;
        if (1 === t.nodeType) {
            if (J.hasData(e) && (o = J.access(e),
            a = J.set(t, o),
            l = o.events)) {
                delete a.handle,
                a.events = {};
                for (i in l)
                    for (n = 0,
                    r = l[i].length; n < r; n++)
                        w.event.add(t, i, l[i][n])
            }
            K.hasData(e) && (s = K.access(e),
            u = w.extend({}, s),
            K.set(t, u))
        }
    }
    function Me(e, t) {
        var n = t.nodeName.toLowerCase();
        "input" === n && pe.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
    }
    function Re(e, t, n, r) {
        t = a.apply([], t);
        var i, o, s, u, l, c, f = 0, p = e.length, d = p - 1, y = t[0], v = g(y);
        if (v || p > 1 && "string" == typeof y && !h.checkClone && je.test(y))
            return e.each(function(i) {
                var o = e.eq(i);
                v && (t[0] = y.call(this, i, o.html())),
                Re(o, t, n, r)
            });
        if (p && (i = xe(t, e[0].ownerDocument, !1, e, r),
        o = i.firstChild,
        1 === i.childNodes.length && (i = o),
        o || r)) {
            for (u = (s = w.map(ye(i, "script"), He)).length; f < p; f++)
                l = i,
                f !== d && (l = w.clone(l, !0, !0),
                u && w.merge(s, ye(l, "script"))),
                n.call(e[f], l, f);
            if (u)
                for (c = s[s.length - 1].ownerDocument,
                w.map(s, Oe),
                f = 0; f < u; f++)
                    l = s[f],
                    he.test(l.type || "") && !J.access(l, "globalEval") && w.contains(c, l) && (l.src && "module" !== (l.type || "").toLowerCase() ? w._evalUrl && w._evalUrl(l.src) : m(l.textContent.replace(qe, ""), c, l))
        }
        return e
    }
    function Ie(e, t, n) {
        for (var r, i = t ? w.filter(t, e) : e, o = 0; null != (r = i[o]); o++)
            n || 1 !== r.nodeType || w.cleanData(ye(r)),
            r.parentNode && (n && w.contains(r.ownerDocument, r) && ve(ye(r, "script")),
            r.parentNode.removeChild(r));
        return e
    }
    w.extend({
        htmlPrefilter: function(e) {
            return e.replace(Ne, "<$1></$2>")
        },
        clone: function(e, t, n) {
            var r, i, o, a, s = e.cloneNode(!0), u = w.contains(e.ownerDocument, e);
            if (!(h.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || w.isXMLDoc(e)))
                for (a = ye(s),
                r = 0,
                i = (o = ye(e)).length; r < i; r++)
                    Me(o[r], a[r]);
            if (t)
                if (n)
                    for (o = o || ye(e),
                    a = a || ye(s),
                    r = 0,
                    i = o.length; r < i; r++)
                        Pe(o[r], a[r]);
                else
                    Pe(e, s);
            return (a = ye(s, "script")).length > 0 && ve(a, !u && ye(e, "script")),
            s
        },
        cleanData: function(e) {
            for (var t, n, r, i = w.event.special, o = 0; void 0 !== (n = e[o]); o++)
                if (Y(n)) {
                    if (t = n[J.expando]) {
                        if (t.events)
                            for (r in t.events)
                                i[r] ? w.event.remove(n, r) : w.removeEvent(n, r, t.handle);
                        n[J.expando] = void 0
                    }
                    n[K.expando] && (n[K.expando] = void 0)
                }
        }
    }),
    w.fn.extend({
        detach: function(e) {
            return Ie(this, e, !0)
        },
        remove: function(e) {
            return Ie(this, e)
        },
        text: function(e) {
            return z(this, function(e) {
                return void 0 === e ? w.text(this) : this.empty().each(function() {
                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                })
            }, null, e, arguments.length)
        },
        append: function() {
            return Re(this, arguments, function(e) {
                1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Le(this, e).appendChild(e)
            })
        },
        prepend: function() {
            return Re(this, arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = Le(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return Re(this, arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return Re(this, arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++)
                1 === e.nodeType && (w.cleanData(ye(e, !1)),
                e.textContent = "");
            return this
        },
        clone: function(e, t) {
            return e = null != e && e,
            t = null == t ? e : t,
            this.map(function() {
                return w.clone(this, e, t)
            })
        },
        html: function(e) {
            return z(this, function(e) {
                var t = this[0] || {}
                  , n = 0
                  , r = this.length;
                if (void 0 === e && 1 === t.nodeType)
                    return t.innerHTML;
                if ("string" == typeof e && !Ae.test(e) && !ge[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
                    e = w.htmlPrefilter(e);
                    try {
                        for (; n < r; n++)
                            1 === (t = this[n] || {}).nodeType && (w.cleanData(ye(t, !1)),
                            t.innerHTML = e);
                        t = 0
                    } catch (e) {}
                }
                t && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var e = [];
            return Re(this, arguments, function(t) {
                var n = this.parentNode;
                w.inArray(this, e) < 0 && (w.cleanData(ye(this)),
                n && n.replaceChild(t, this))
            }, e)
        }
    }),
    w.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        w.fn[e] = function(e) {
            for (var n, r = [], i = w(e), o = i.length - 1, a = 0; a <= o; a++)
                n = a === o ? this : this.clone(!0),
                w(i[a])[t](n),
                s.apply(r, n.get());
            return this.pushStack(r)
        }
    });
    var We = new RegExp("^(" + re + ")(?!px)[a-z%]+$","i")
      , $e = function(t) {
        var n = t.ownerDocument.defaultView;
        return n && n.opener || (n = e),
        n.getComputedStyle(t)
    }
      , Be = new RegExp(oe.join("|"),"i");
    !function() {
        function t() {
            if (c) {
                l.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",
                c.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",
                be.appendChild(l).appendChild(c);
                var t = e.getComputedStyle(c);
                i = "1%" !== t.top,
                u = 12 === n(t.marginLeft),
                c.style.right = "60%",
                s = 36 === n(t.right),
                o = 36 === n(t.width),
                c.style.position = "absolute",
                a = 36 === c.offsetWidth || "absolute",
                be.removeChild(l),
                c = null
            }
        }
        function n(e) {
            return Math.round(parseFloat(e))
        }
        var i, o, a, s, u, l = r.createElement("div"), c = r.createElement("div");
        c.style && (c.style.backgroundClip = "content-box",
        c.cloneNode(!0).style.backgroundClip = "",
        h.clearCloneStyle = "content-box" === c.style.backgroundClip,
        w.extend(h, {
            boxSizingReliable: function() {
                return t(),
                o
            },
            pixelBoxStyles: function() {
                return t(),
                s
            },
            pixelPosition: function() {
                return t(),
                i
            },
            reliableMarginLeft: function() {
                return t(),
                u
            },
            scrollboxSize: function() {
                return t(),
                a
            }
        }))
    }();
    function Fe(e, t, n) {
        var r, i, o, a, s = e.style;
        return (n = n || $e(e)) && ("" !== (a = n.getPropertyValue(t) || n[t]) || w.contains(e.ownerDocument, e) || (a = w.style(e, t)),
        !h.pixelBoxStyles() && We.test(a) && Be.test(t) && (r = s.width,
        i = s.minWidth,
        o = s.maxWidth,
        s.minWidth = s.maxWidth = s.width = a,
        a = n.width,
        s.width = r,
        s.minWidth = i,
        s.maxWidth = o)),
        void 0 !== a ? a + "" : a
    }
    function _e(e, t) {
        return {
            get: function() {
                if (!e())
                    return (this.get = t).apply(this, arguments);
                delete this.get
            }
        }
    }
    var ze = /^(none|table(?!-c[ea]).+)/
      , Xe = /^--/
      , Ue = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }
      , Ve = {
        letterSpacing: "0",
        fontWeight: "400"
    }
      , Ge = ["Webkit", "Moz", "ms"]
      , Ye = r.createElement("div").style;
    function Qe(e) {
        if (e in Ye)
            return e;
        var t = e[0].toUpperCase() + e.slice(1)
          , n = Ge.length;
        while (n--)
            if ((e = Ge[n] + t)in Ye)
                return e
    }
    function Je(e) {
        var t = w.cssProps[e];
        return t || (t = w.cssProps[e] = Qe(e) || e),
        t
    }
    function Ke(e, t, n) {
        var r = ie.exec(t);
        return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t
    }
    function Ze(e, t, n, r, i, o) {
        var a = "width" === t ? 1 : 0
          , s = 0
          , u = 0;
        if (n === (r ? "border" : "content"))
            return 0;
        for (; a < 4; a += 2)
            "margin" === n && (u += w.css(e, n + oe[a], !0, i)),
            r ? ("content" === n && (u -= w.css(e, "padding" + oe[a], !0, i)),
            "margin" !== n && (u -= w.css(e, "border" + oe[a] + "Width", !0, i))) : (u += w.css(e, "padding" + oe[a], !0, i),
            "padding" !== n ? u += w.css(e, "border" + oe[a] + "Width", !0, i) : s += w.css(e, "border" + oe[a] + "Width", !0, i));
        return !r && o >= 0 && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - s - .5))),
        u
    }
    function et(e, t, n) {
        var r = $e(e)
          , i = Fe(e, t, r)
          , o = "border-box" === w.css(e, "boxSizing", !1, r)
          , a = o;
        if (We.test(i)) {
            if (!n)
                return i;
            i = "auto"
        }
        return a = a && (h.boxSizingReliable() || i === e.style[t]),
        ("auto" === i || !parseFloat(i) && "inline" === w.css(e, "display", !1, r)) && (i = e["offset" + t[0].toUpperCase() + t.slice(1)],
        a = !0),
        (i = parseFloat(i) || 0) + Ze(e, t, n || (o ? "border" : "content"), a, r, i) + "px"
    }
    w.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Fe(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {},
        style: function(e, t, n, r) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var i, o, a, s = G(t), u = Xe.test(t), l = e.style;
                if (u || (t = Je(s)),
                a = w.cssHooks[t] || w.cssHooks[s],
                void 0 === n)
                    return a && "get"in a && void 0 !== (i = a.get(e, !1, r)) ? i : l[t];
                "string" == (o = typeof n) && (i = ie.exec(n)) && i[1] && (n = ue(e, t, i),
                o = "number"),
                null != n && n === n && ("number" === o && (n += i && i[3] || (w.cssNumber[s] ? "" : "px")),
                h.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"),
                a && "set"in a && void 0 === (n = a.set(e, n, r)) || (u ? l.setProperty(t, n) : l[t] = n))
            }
        },
        css: function(e, t, n, r) {
            var i, o, a, s = G(t);
            return Xe.test(t) || (t = Je(s)),
            (a = w.cssHooks[t] || w.cssHooks[s]) && "get"in a && (i = a.get(e, !0, n)),
            void 0 === i && (i = Fe(e, t, r)),
            "normal" === i && t in Ve && (i = Ve[t]),
            "" === n || n ? (o = parseFloat(i),
            !0 === n || isFinite(o) ? o || 0 : i) : i
        }
    }),
    w.each(["height", "width"], function(e, t) {
        w.cssHooks[t] = {
            get: function(e, n, r) {
                if (n)
                    return !ze.test(w.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? et(e, t, r) : se(e, Ue, function() {
                        return et(e, t, r)
                    })
            },
            set: function(e, n, r) {
                var i, o = $e(e), a = "border-box" === w.css(e, "boxSizing", !1, o), s = r && Ze(e, t, r, a, o);
                return a && h.scrollboxSize() === o.position && (s -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(o[t]) - Ze(e, t, "border", !1, o) - .5)),
                s && (i = ie.exec(n)) && "px" !== (i[3] || "px") && (e.style[t] = n,
                n = w.css(e, t)),
                Ke(e, n, s)
            }
        }
    }),
    w.cssHooks.marginLeft = _e(h.reliableMarginLeft, function(e, t) {
        if (t)
            return (parseFloat(Fe(e, "marginLeft")) || e.getBoundingClientRect().left - se(e, {
                marginLeft: 0
            }, function() {
                return e.getBoundingClientRect().left
            })) + "px"
    }),
    w.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        w.cssHooks[e + t] = {
            expand: function(n) {
                for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++)
                    i[e + oe[r] + t] = o[r] || o[r - 2] || o[0];
                return i
            }
        },
        "margin" !== e && (w.cssHooks[e + t].set = Ke)
    }),
    w.fn.extend({
        css: function(e, t) {
            return z(this, function(e, t, n) {
                var r, i, o = {}, a = 0;
                if (Array.isArray(t)) {
                    for (r = $e(e),
                    i = t.length; a < i; a++)
                        o[t[a]] = w.css(e, t[a], !1, r);
                    return o
                }
                return void 0 !== n ? w.style(e, t, n) : w.css(e, t)
            }, e, t, arguments.length > 1)
        }
    });
    function tt(e, t, n, r, i) {
        return new tt.prototype.init(e,t,n,r,i)
    }
    w.Tween = tt,
    tt.prototype = {
        constructor: tt,
        init: function(e, t, n, r, i, o) {
            this.elem = e,
            this.prop = n,
            this.easing = i || w.easing._default,
            this.options = t,
            this.start = this.now = this.cur(),
            this.end = r,
            this.unit = o || (w.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = tt.propHooks[this.prop];
            return e && e.get ? e.get(this) : tt.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = tt.propHooks[this.prop];
            return this.options.duration ? this.pos = t = w.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e,
            this.now = (this.end - this.start) * t + this.start,
            this.options.step && this.options.step.call(this.elem, this.now, this),
            n && n.set ? n.set(this) : tt.propHooks._default.set(this),
            this
        }
    },
    tt.prototype.init.prototype = tt.prototype,
    tt.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = w.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0
            },
            set: function(e) {
                w.fx.step[e.prop] ? w.fx.step[e.prop](e) : 1 !== e.elem.nodeType || null == e.elem.style[w.cssProps[e.prop]] && !w.cssHooks[e.prop] ? e.elem[e.prop] = e.now : w.style(e.elem, e.prop, e.now + e.unit)
            }
        }
    },
    tt.propHooks.scrollTop = tt.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    },
    w.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        },
        _default: "swing"
    },
    w.fx = tt.prototype.init,
    w.fx.step = {};
    var nt, rt, it = /^(?:toggle|show|hide)$/, ot = /queueHooks$/;
    function at() {
        rt && (!1 === r.hidden && e.requestAnimationFrame ? e.requestAnimationFrame(at) : e.setTimeout(at, w.fx.interval),
        w.fx.tick())
    }
    function st() {
        return e.setTimeout(function() {
            nt = void 0
        }),
        nt = Date.now()
    }
    function ut(e, t) {
        var n, r = 0, i = {
            height: e
        };
        for (t = t ? 1 : 0; r < 4; r += 2 - t)
            i["margin" + (n = oe[r])] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e),
        i
    }
    function lt(e, t, n) {
        for (var r, i = (pt.tweeners[t] || []).concat(pt.tweeners["*"]), o = 0, a = i.length; o < a; o++)
            if (r = i[o].call(n, t, e))
                return r
    }
    function ct(e, t, n) {
        var r, i, o, a, s, u, l, c, f = "width"in t || "height"in t, p = this, d = {}, h = e.style, g = e.nodeType && ae(e), y = J.get(e, "fxshow");
        n.queue || (null == (a = w._queueHooks(e, "fx")).unqueued && (a.unqueued = 0,
        s = a.empty.fire,
        a.empty.fire = function() {
            a.unqueued || s()
        }
        ),
        a.unqueued++,
        p.always(function() {
            p.always(function() {
                a.unqueued--,
                w.queue(e, "fx").length || a.empty.fire()
            })
        }));
        for (r in t)
            if (i = t[r],
            it.test(i)) {
                if (delete t[r],
                o = o || "toggle" === i,
                i === (g ? "hide" : "show")) {
                    if ("show" !== i || !y || void 0 === y[r])
                        continue;
                    g = !0
                }
                d[r] = y && y[r] || w.style(e, r)
            }
        if ((u = !w.isEmptyObject(t)) || !w.isEmptyObject(d)) {
            f && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY],
            null == (l = y && y.display) && (l = J.get(e, "display")),
            "none" === (c = w.css(e, "display")) && (l ? c = l : (fe([e], !0),
            l = e.style.display || l,
            c = w.css(e, "display"),
            fe([e]))),
            ("inline" === c || "inline-block" === c && null != l) && "none" === w.css(e, "float") && (u || (p.done(function() {
                h.display = l
            }),
            null == l && (c = h.display,
            l = "none" === c ? "" : c)),
            h.display = "inline-block")),
            n.overflow && (h.overflow = "hidden",
            p.always(function() {
                h.overflow = n.overflow[0],
                h.overflowX = n.overflow[1],
                h.overflowY = n.overflow[2]
            })),
            u = !1;
            for (r in d)
                u || (y ? "hidden"in y && (g = y.hidden) : y = J.access(e, "fxshow", {
                    display: l
                }),
                o && (y.hidden = !g),
                g && fe([e], !0),
                p.done(function() {
                    g || fe([e]),
                    J.remove(e, "fxshow");
                    for (r in d)
                        w.style(e, r, d[r])
                })),
                u = lt(g ? y[r] : 0, r, p),
                r in y || (y[r] = u.start,
                g && (u.end = u.start,
                u.start = 0))
        }
    }
    function ft(e, t) {
        var n, r, i, o, a;
        for (n in e)
            if (r = G(n),
            i = t[r],
            o = e[n],
            Array.isArray(o) && (i = o[1],
            o = e[n] = o[0]),
            n !== r && (e[r] = o,
            delete e[n]),
            (a = w.cssHooks[r]) && "expand"in a) {
                o = a.expand(o),
                delete e[r];
                for (n in o)
                    n in e || (e[n] = o[n],
                    t[n] = i)
            } else
                t[r] = i
    }
    function pt(e, t, n) {
        var r, i, o = 0, a = pt.prefilters.length, s = w.Deferred().always(function() {
            delete u.elem
        }), u = function() {
            if (i)
                return !1;
            for (var t = nt || st(), n = Math.max(0, l.startTime + l.duration - t), r = 1 - (n / l.duration || 0), o = 0, a = l.tweens.length; o < a; o++)
                l.tweens[o].run(r);
            return s.notifyWith(e, [l, r, n]),
            r < 1 && a ? n : (a || s.notifyWith(e, [l, 1, 0]),
            s.resolveWith(e, [l]),
            !1)
        }, l = s.promise({
            elem: e,
            props: w.extend({}, t),
            opts: w.extend(!0, {
                specialEasing: {},
                easing: w.easing._default
            }, n),
            originalProperties: t,
            originalOptions: n,
            startTime: nt || st(),
            duration: n.duration,
            tweens: [],
            createTween: function(t, n) {
                var r = w.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
                return l.tweens.push(r),
                r
            },
            stop: function(t) {
                var n = 0
                  , r = t ? l.tweens.length : 0;
                if (i)
                    return this;
                for (i = !0; n < r; n++)
                    l.tweens[n].run(1);
                return t ? (s.notifyWith(e, [l, 1, 0]),
                s.resolveWith(e, [l, t])) : s.rejectWith(e, [l, t]),
                this
            }
        }), c = l.props;
        for (ft(c, l.opts.specialEasing); o < a; o++)
            if (r = pt.prefilters[o].call(l, e, c, l.opts))
                return g(r.stop) && (w._queueHooks(l.elem, l.opts.queue).stop = r.stop.bind(r)),
                r;
        return w.map(c, lt, l),
        g(l.opts.start) && l.opts.start.call(e, l),
        l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always),
        w.fx.timer(w.extend(u, {
            elem: e,
            anim: l,
            queue: l.opts.queue
        })),
        l
    }
    w.Animation = w.extend(pt, {
        tweeners: {
            "*": [function(e, t) {
                var n = this.createTween(e, t);
                return ue(n.elem, e, ie.exec(t), n),
                n
            }
            ]
        },
        tweener: function(e, t) {
            g(e) ? (t = e,
            e = ["*"]) : e = e.match(M);
            for (var n, r = 0, i = e.length; r < i; r++)
                n = e[r],
                pt.tweeners[n] = pt.tweeners[n] || [],
                pt.tweeners[n].unshift(t)
        },
        prefilters: [ct],
        prefilter: function(e, t) {
            t ? pt.prefilters.unshift(e) : pt.prefilters.push(e)
        }
    }),
    w.speed = function(e, t, n) {
        var r = e && "object" == typeof e ? w.extend({}, e) : {
            complete: n || !n && t || g(e) && e,
            duration: e,
            easing: n && t || t && !g(t) && t
        };
        return w.fx.off ? r.duration = 0 : "number" != typeof r.duration && (r.duration in w.fx.speeds ? r.duration = w.fx.speeds[r.duration] : r.duration = w.fx.speeds._default),
        null != r.queue && !0 !== r.queue || (r.queue = "fx"),
        r.old = r.complete,
        r.complete = function() {
            g(r.old) && r.old.call(this),
            r.queue && w.dequeue(this, r.queue)
        }
        ,
        r
    }
    ,
    w.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(ae).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = w.isEmptyObject(e)
              , o = w.speed(t, n, r)
              , a = function() {
                var t = pt(this, w.extend({}, e), o);
                (i || J.get(this, "finish")) && t.stop(!0)
            };
            return a.finish = a,
            i || !1 === o.queue ? this.each(a) : this.queue(o.queue, a)
        },
        stop: function(e, t, n) {
            var r = function(e) {
                var t = e.stop;
                delete e.stop,
                t(n)
            };
            return "string" != typeof e && (n = t,
            t = e,
            e = void 0),
            t && !1 !== e && this.queue(e || "fx", []),
            this.each(function() {
                var t = !0
                  , i = null != e && e + "queueHooks"
                  , o = w.timers
                  , a = J.get(this);
                if (i)
                    a[i] && a[i].stop && r(a[i]);
                else
                    for (i in a)
                        a[i] && a[i].stop && ot.test(i) && r(a[i]);
                for (i = o.length; i--; )
                    o[i].elem !== this || null != e && o[i].queue !== e || (o[i].anim.stop(n),
                    t = !1,
                    o.splice(i, 1));
                !t && n || w.dequeue(this, e)
            })
        },
        finish: function(e) {
            return !1 !== e && (e = e || "fx"),
            this.each(function() {
                var t, n = J.get(this), r = n[e + "queue"], i = n[e + "queueHooks"], o = w.timers, a = r ? r.length : 0;
                for (n.finish = !0,
                w.queue(this, e, []),
                i && i.stop && i.stop.call(this, !0),
                t = o.length; t--; )
                    o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0),
                    o.splice(t, 1));
                for (t = 0; t < a; t++)
                    r[t] && r[t].finish && r[t].finish.call(this);
                delete n.finish
            })
        }
    }),
    w.each(["toggle", "show", "hide"], function(e, t) {
        var n = w.fn[t];
        w.fn[t] = function(e, r, i) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(ut(t, !0), e, r, i)
        }
    }),
    w.each({
        slideDown: ut("show"),
        slideUp: ut("hide"),
        slideToggle: ut("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        w.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }),
    w.timers = [],
    w.fx.tick = function() {
        var e, t = 0, n = w.timers;
        for (nt = Date.now(); t < n.length; t++)
            (e = n[t])() || n[t] !== e || n.splice(t--, 1);
        n.length || w.fx.stop(),
        nt = void 0
    }
    ,
    w.fx.timer = function(e) {
        w.timers.push(e),
        w.fx.start()
    }
    ,
    w.fx.interval = 13,
    w.fx.start = function() {
        rt || (rt = !0,
        at())
    }
    ,
    w.fx.stop = function() {
        rt = null
    }
    ,
    w.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    },
    w.fn.delay = function(t, n) {
        return t = w.fx ? w.fx.speeds[t] || t : t,
        n = n || "fx",
        this.queue(n, function(n, r) {
            var i = e.setTimeout(n, t);
            r.stop = function() {
                e.clearTimeout(i)
            }
        })
    }
    ,
    function() {
        var e = r.createElement("input")
          , t = r.createElement("select").appendChild(r.createElement("option"));
        e.type = "checkbox",
        h.checkOn = "" !== e.value,
        h.optSelected = t.selected,
        (e = r.createElement("input")).value = "t",
        e.type = "radio",
        h.radioValue = "t" === e.value
    }();
    var dt, ht = w.expr.attrHandle;
    w.fn.extend({
        attr: function(e, t) {
            return z(this, w.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                w.removeAttr(this, e)
            })
        }
    }),
    w.extend({
        attr: function(e, t, n) {
            var r, i, o = e.nodeType;
            if (3 !== o && 8 !== o && 2 !== o)
                return "undefined" == typeof e.getAttribute ? w.prop(e, t, n) : (1 === o && w.isXMLDoc(e) || (i = w.attrHooks[t.toLowerCase()] || (w.expr.match.bool.test(t) ? dt : void 0)),
                void 0 !== n ? null === n ? void w.removeAttr(e, t) : i && "set"in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""),
                n) : i && "get"in i && null !== (r = i.get(e, t)) ? r : null == (r = w.find.attr(e, t)) ? void 0 : r)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!h.radioValue && "radio" === t && N(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t),
                        n && (e.value = n),
                        t
                    }
                }
            }
        },
        removeAttr: function(e, t) {
            var n, r = 0, i = t && t.match(M);
            if (i && 1 === e.nodeType)
                while (n = i[r++])
                    e.removeAttribute(n)
        }
    }),
    dt = {
        set: function(e, t, n) {
            return !1 === t ? w.removeAttr(e, n) : e.setAttribute(n, n),
            n
        }
    },
    w.each(w.expr.match.bool.source.match(/\w+/g), function(e, t) {
        var n = ht[t] || w.find.attr;
        ht[t] = function(e, t, r) {
            var i, o, a = t.toLowerCase();
            return r || (o = ht[a],
            ht[a] = i,
            i = null != n(e, t, r) ? a : null,
            ht[a] = o),
            i
        }
    });
    var gt = /^(?:input|select|textarea|button)$/i
      , yt = /^(?:a|area)$/i;
    w.fn.extend({
        prop: function(e, t) {
            return z(this, w.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return this.each(function() {
                delete this[w.propFix[e] || e]
            })
        }
    }),
    w.extend({
        prop: function(e, t, n) {
            var r, i, o = e.nodeType;
            if (3 !== o && 8 !== o && 2 !== o)
                return 1 === o && w.isXMLDoc(e) || (t = w.propFix[t] || t,
                i = w.propHooks[t]),
                void 0 !== n ? i && "set"in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get"in i && null !== (r = i.get(e, t)) ? r : e[t]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = w.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : gt.test(e.nodeName) || yt.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        },
        propFix: {
            "for": "htmlFor",
            "class": "className"
        }
    }),
    h.optSelected || (w.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex,
            null
        },
        set: function(e) {
            var t = e.parentNode;
            t && (t.selectedIndex,
            t.parentNode && t.parentNode.selectedIndex)
        }
    }),
    w.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        w.propFix[this.toLowerCase()] = this
    });
    function vt(e) {
        return (e.match(M) || []).join(" ")
    }
    function mt(e) {
        return e.getAttribute && e.getAttribute("class") || ""
    }
    function xt(e) {
        return Array.isArray(e) ? e : "string" == typeof e ? e.match(M) || [] : []
    }
    w.fn.extend({
        addClass: function(e) {
            var t, n, r, i, o, a, s, u = 0;
            if (g(e))
                return this.each(function(t) {
                    w(this).addClass(e.call(this, t, mt(this)))
                });
            if ((t = xt(e)).length)
                while (n = this[u++])
                    if (i = mt(n),
                    r = 1 === n.nodeType && " " + vt(i) + " ") {
                        a = 0;
                        while (o = t[a++])
                            r.indexOf(" " + o + " ") < 0 && (r += o + " ");
                        i !== (s = vt(r)) && n.setAttribute("class", s)
                    }
            return this
        },
        removeClass: function(e) {
            var t, n, r, i, o, a, s, u = 0;
            if (g(e))
                return this.each(function(t) {
                    w(this).removeClass(e.call(this, t, mt(this)))
                });
            if (!arguments.length)
                return this.attr("class", "");
            if ((t = xt(e)).length)
                while (n = this[u++])
                    if (i = mt(n),
                    r = 1 === n.nodeType && " " + vt(i) + " ") {
                        a = 0;
                        while (o = t[a++])
                            while (r.indexOf(" " + o + " ") > -1)
                                r = r.replace(" " + o + " ", " ");
                        i !== (s = vt(r)) && n.setAttribute("class", s)
                    }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e
              , r = "string" === n || Array.isArray(e);
            return "boolean" == typeof t && r ? t ? this.addClass(e) : this.removeClass(e) : g(e) ? this.each(function(n) {
                w(this).toggleClass(e.call(this, n, mt(this), t), t)
            }) : this.each(function() {
                var t, i, o, a;
                if (r) {
                    i = 0,
                    o = w(this),
                    a = xt(e);
                    while (t = a[i++])
                        o.hasClass(t) ? o.removeClass(t) : o.addClass(t)
                } else
                    void 0 !== e && "boolean" !== n || ((t = mt(this)) && J.set(this, "__className__", t),
                    this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : J.get(this, "__className__") || ""))
            })
        },
        hasClass: function(e) {
            var t, n, r = 0;
            t = " " + e + " ";
            while (n = this[r++])
                if (1 === n.nodeType && (" " + vt(mt(n)) + " ").indexOf(t) > -1)
                    return !0;
            return !1
        }
    });
    var bt = /\r/g;
    w.fn.extend({
        val: function(e) {
            var t, n, r, i = this[0];
            {
                if (arguments.length)
                    return r = g(e),
                    this.each(function(n) {
                        var i;
                        1 === this.nodeType && (null == (i = r ? e.call(this, n, w(this).val()) : e) ? i = "" : "number" == typeof i ? i += "" : Array.isArray(i) && (i = w.map(i, function(e) {
                            return null == e ? "" : e + ""
                        })),
                        (t = w.valHooks[this.type] || w.valHooks[this.nodeName.toLowerCase()]) && "set"in t && void 0 !== t.set(this, i, "value") || (this.value = i))
                    });
                if (i)
                    return (t = w.valHooks[i.type] || w.valHooks[i.nodeName.toLowerCase()]) && "get"in t && void 0 !== (n = t.get(i, "value")) ? n : "string" == typeof (n = i.value) ? n.replace(bt, "") : null == n ? "" : n
            }
        }
    }),
    w.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = w.find.attr(e, "value");
                    return null != t ? t : vt(w.text(e))
                }
            },
            select: {
                get: function(e) {
                    var t, n, r, i = e.options, o = e.selectedIndex, a = "select-one" === e.type, s = a ? null : [], u = a ? o + 1 : i.length;
                    for (r = o < 0 ? u : a ? o : 0; r < u; r++)
                        if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !N(n.parentNode, "optgroup"))) {
                            if (t = w(n).val(),
                            a)
                                return t;
                            s.push(t)
                        }
                    return s
                },
                set: function(e, t) {
                    var n, r, i = e.options, o = w.makeArray(t), a = i.length;
                    while (a--)
                        ((r = i[a]).selected = w.inArray(w.valHooks.option.get(r), o) > -1) && (n = !0);
                    return n || (e.selectedIndex = -1),
                    o
                }
            }
        }
    }),
    w.each(["radio", "checkbox"], function() {
        w.valHooks[this] = {
            set: function(e, t) {
                if (Array.isArray(t))
                    return e.checked = w.inArray(w(e).val(), t) > -1
            }
        },
        h.checkOn || (w.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        }
        )
    }),
    h.focusin = "onfocusin"in e;
    var wt = /^(?:focusinfocus|focusoutblur)$/
      , Tt = function(e) {
        e.stopPropagation()
    };
    w.extend(w.event, {
        trigger: function(t, n, i, o) {
            var a, s, u, l, c, p, d, h, v = [i || r], m = f.call(t, "type") ? t.type : t, x = f.call(t, "namespace") ? t.namespace.split(".") : [];
            if (s = h = u = i = i || r,
            3 !== i.nodeType && 8 !== i.nodeType && !wt.test(m + w.event.triggered) && (m.indexOf(".") > -1 && (m = (x = m.split(".")).shift(),
            x.sort()),
            c = m.indexOf(":") < 0 && "on" + m,
            t = t[w.expando] ? t : new w.Event(m,"object" == typeof t && t),
            t.isTrigger = o ? 2 : 3,
            t.namespace = x.join("."),
            t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + x.join("\\.(?:.*\\.|)") + "(\\.|$)") : null,
            t.result = void 0,
            t.target || (t.target = i),
            n = null == n ? [t] : w.makeArray(n, [t]),
            d = w.event.special[m] || {},
            o || !d.trigger || !1 !== d.trigger.apply(i, n))) {
                if (!o && !d.noBubble && !y(i)) {
                    for (l = d.delegateType || m,
                    wt.test(l + m) || (s = s.parentNode); s; s = s.parentNode)
                        v.push(s),
                        u = s;
                    u === (i.ownerDocument || r) && v.push(u.defaultView || u.parentWindow || e)
                }
                a = 0;
                while ((s = v[a++]) && !t.isPropagationStopped())
                    h = s,
                    t.type = a > 1 ? l : d.bindType || m,
                    (p = (J.get(s, "events") || {})[t.type] && J.get(s, "handle")) && p.apply(s, n),
                    (p = c && s[c]) && p.apply && Y(s) && (t.result = p.apply(s, n),
                    !1 === t.result && t.preventDefault());
                return t.type = m,
                o || t.isDefaultPrevented() || d._default && !1 !== d._default.apply(v.pop(), n) || !Y(i) || c && g(i[m]) && !y(i) && ((u = i[c]) && (i[c] = null),
                w.event.triggered = m,
                t.isPropagationStopped() && h.addEventListener(m, Tt),
                i[m](),
                t.isPropagationStopped() && h.removeEventListener(m, Tt),
                w.event.triggered = void 0,
                u && (i[c] = u)),
                t.result
            }
        },
        simulate: function(e, t, n) {
            var r = w.extend(new w.Event, n, {
                type: e,
                isSimulated: !0
            });
            w.event.trigger(r, null, t)
        }
    }),
    w.fn.extend({
        trigger: function(e, t) {
            return this.each(function() {
                w.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, t) {
            var n = this[0];
            if (n)
                return w.event.trigger(e, t, n, !0)
        }
    }),
    h.focusin || w.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var n = function(e) {
            w.event.simulate(t, e.target, w.event.fix(e))
        };
        w.event.special[t] = {
            setup: function() {
                var r = this.ownerDocument || this
                  , i = J.access(r, t);
                i || r.addEventListener(e, n, !0),
                J.access(r, t, (i || 0) + 1)
            },
            teardown: function() {
                var r = this.ownerDocument || this
                  , i = J.access(r, t) - 1;
                i ? J.access(r, t, i) : (r.removeEventListener(e, n, !0),
                J.remove(r, t))
            }
        }
    });
    var Ct = e.location
      , Et = Date.now()
      , kt = /\?/;
    w.parseXML = function(t) {
        var n;
        if (!t || "string" != typeof t)
            return null;
        try {
            n = (new e.DOMParser).parseFromString(t, "text/xml")
        } catch (e) {
            n = void 0
        }
        return n && !n.getElementsByTagName("parsererror").length || w.error("Invalid XML: " + t),
        n
    }
    ;
    var St = /\[\]$/
      , Dt = /\r?\n/g
      , Nt = /^(?:submit|button|image|reset|file)$/i
      , At = /^(?:input|select|textarea|keygen)/i;
    function jt(e, t, n, r) {
        var i;
        if (Array.isArray(t))
            w.each(t, function(t, i) {
                n || St.test(e) ? r(e, i) : jt(e + "[" + ("object" == typeof i && null != i ? t : "") + "]", i, n, r)
            });
        else if (n || "object" !== x(t))
            r(e, t);
        else
            for (i in t)
                jt(e + "[" + i + "]", t[i], n, r)
    }
    w.param = function(e, t) {
        var n, r = [], i = function(e, t) {
            var n = g(t) ? t() : t;
            r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
        };
        if (Array.isArray(e) || e.jquery && !w.isPlainObject(e))
            w.each(e, function() {
                i(this.name, this.value)
            });
        else
            for (n in e)
                jt(n, e[n], t, i);
        return r.join("&")
    }
    ,
    w.fn.extend({
        serialize: function() {
            return w.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = w.prop(this, "elements");
                return e ? w.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !w(this).is(":disabled") && At.test(this.nodeName) && !Nt.test(e) && (this.checked || !pe.test(e))
            }).map(function(e, t) {
                var n = w(this).val();
                return null == n ? null : Array.isArray(n) ? w.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(Dt, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(Dt, "\r\n")
                }
            }).get()
        }
    });
    var qt = /%20/g
      , Lt = /#.*$/
      , Ht = /([?&])_=[^&]*/
      , Ot = /^(.*?):[ \t]*([^\r\n]*)$/gm
      , Pt = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/
      , Mt = /^(?:GET|HEAD)$/
      , Rt = /^\/\//
      , It = {}
      , Wt = {}
      , $t = "*/".concat("*")
      , Bt = r.createElement("a");
    Bt.href = Ct.href;
    function Ft(e) {
        return function(t, n) {
            "string" != typeof t && (n = t,
            t = "*");
            var r, i = 0, o = t.toLowerCase().match(M) || [];
            if (g(n))
                while (r = o[i++])
                    "+" === r[0] ? (r = r.slice(1) || "*",
                    (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
        }
    }
    function _t(e, t, n, r) {
        var i = {}
          , o = e === Wt;
        function a(s) {
            var u;
            return i[s] = !0,
            w.each(e[s] || [], function(e, s) {
                var l = s(t, n, r);
                return "string" != typeof l || o || i[l] ? o ? !(u = l) : void 0 : (t.dataTypes.unshift(l),
                a(l),
                !1)
            }),
            u
        }
        return a(t.dataTypes[0]) || !i["*"] && a("*")
    }
    function zt(e, t) {
        var n, r, i = w.ajaxSettings.flatOptions || {};
        for (n in t)
            void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
        return r && w.extend(!0, e, r),
        e
    }
    function Xt(e, t, n) {
        var r, i, o, a, s = e.contents, u = e.dataTypes;
        while ("*" === u[0])
            u.shift(),
            void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
        if (r)
            for (i in s)
                if (s[i] && s[i].test(r)) {
                    u.unshift(i);
                    break
                }
        if (u[0]in n)
            o = u[0];
        else {
            for (i in n) {
                if (!u[0] || e.converters[i + " " + u[0]]) {
                    o = i;
                    break
                }
                a || (a = i)
            }
            o = o || a
        }
        if (o)
            return o !== u[0] && u.unshift(o),
            n[o]
    }
    function Ut(e, t, n, r) {
        var i, o, a, s, u, l = {}, c = e.dataTypes.slice();
        if (c[1])
            for (a in e.converters)
                l[a.toLowerCase()] = e.converters[a];
        o = c.shift();
        while (o)
            if (e.responseFields[o] && (n[e.responseFields[o]] = t),
            !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)),
            u = o,
            o = c.shift())
                if ("*" === o)
                    o = u;
                else if ("*" !== u && u !== o) {
                    if (!(a = l[u + " " + o] || l["* " + o]))
                        for (i in l)
                            if ((s = i.split(" "))[1] === o && (a = l[u + " " + s[0]] || l["* " + s[0]])) {
                                !0 === a ? a = l[i] : !0 !== l[i] && (o = s[0],
                                c.unshift(s[1]));
                                break
                            }
                    if (!0 !== a)
                        if (a && e["throws"])
                            t = a(t);
                        else
                            try {
                                t = a(t)
                            } catch (e) {
                                return {
                                    state: "parsererror",
                                    error: a ? e : "No conversion from " + u + " to " + o
                                }
                            }
                }
        return {
            state: "success",
            data: t
        }
    }
    w.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Ct.href,
            type: "GET",
            isLocal: Pt.test(Ct.protocol),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": $t,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /\bxml\b/,
                html: /\bhtml/,
                json: /\bjson\b/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": JSON.parse,
                "text xml": w.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? zt(zt(e, w.ajaxSettings), t) : zt(w.ajaxSettings, e)
        },
        ajaxPrefilter: Ft(It),
        ajaxTransport: Ft(Wt),
        ajax: function(t, n) {
            "object" == typeof t && (n = t,
            t = void 0),
            n = n || {};
            var i, o, a, s, u, l, c, f, p, d, h = w.ajaxSetup({}, n), g = h.context || h, y = h.context && (g.nodeType || g.jquery) ? w(g) : w.event, v = w.Deferred(), m = w.Callbacks("once memory"), x = h.statusCode || {}, b = {}, T = {}, C = "canceled", E = {
                readyState: 0,
                getResponseHeader: function(e) {
                    var t;
                    if (c) {
                        if (!s) {
                            s = {};
                            while (t = Ot.exec(a))
                                s[t[1].toLowerCase()] = t[2]
                        }
                        t = s[e.toLowerCase()]
                    }
                    return null == t ? null : t
                },
                getAllResponseHeaders: function() {
                    return c ? a : null
                },
                setRequestHeader: function(e, t) {
                    return null == c && (e = T[e.toLowerCase()] = T[e.toLowerCase()] || e,
                    b[e] = t),
                    this
                },
                overrideMimeType: function(e) {
                    return null == c && (h.mimeType = e),
                    this
                },
                statusCode: function(e) {
                    var t;
                    if (e)
                        if (c)
                            E.always(e[E.status]);
                        else
                            for (t in e)
                                x[t] = [x[t], e[t]];
                    return this
                },
                abort: function(e) {
                    var t = e || C;
                    return i && i.abort(t),
                    k(0, t),
                    this
                }
            };
            if (v.promise(E),
            h.url = ((t || h.url || Ct.href) + "").replace(Rt, Ct.protocol + "//"),
            h.type = n.method || n.type || h.method || h.type,
            h.dataTypes = (h.dataType || "*").toLowerCase().match(M) || [""],
            null == h.crossDomain) {
                l = r.createElement("a");
                try {
                    l.href = h.url,
                    l.href = l.href,
                    h.crossDomain = Bt.protocol + "//" + Bt.host != l.protocol + "//" + l.host
                } catch (e) {
                    h.crossDomain = !0
                }
            }
            if (h.data && h.processData && "string" != typeof h.data && (h.data = w.param(h.data, h.traditional)),
            _t(It, h, n, E),
            c)
                return E;
            (f = w.event && h.global) && 0 == w.active++ && w.event.trigger("ajaxStart"),
            h.type = h.type.toUpperCase(),
            h.hasContent = !Mt.test(h.type),
            o = h.url.replace(Lt, ""),
            h.hasContent ? h.data && h.processData && 0 === (h.contentType || "").indexOf("application/x-www-form-urlencoded") && (h.data = h.data.replace(qt, "+")) : (d = h.url.slice(o.length),
            h.data && (h.processData || "string" == typeof h.data) && (o += (kt.test(o) ? "&" : "?") + h.data,
            delete h.data),
            !1 === h.cache && (o = o.replace(Ht, "$1"),
            d = (kt.test(o) ? "&" : "?") + "_=" + Et++ + d),
            h.url = o + d),
            h.ifModified && (w.lastModified[o] && E.setRequestHeader("If-Modified-Since", w.lastModified[o]),
            w.etag[o] && E.setRequestHeader("If-None-Match", w.etag[o])),
            (h.data && h.hasContent && !1 !== h.contentType || n.contentType) && E.setRequestHeader("Content-Type", h.contentType),
            E.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + $t + "; q=0.01" : "") : h.accepts["*"]);
            for (p in h.headers)
                E.setRequestHeader(p, h.headers[p]);
            if (h.beforeSend && (!1 === h.beforeSend.call(g, E, h) || c))
                return E.abort();
            if (C = "abort",
            m.add(h.complete),
            E.done(h.success),
            E.fail(h.error),
            i = _t(Wt, h, n, E)) {
                if (E.readyState = 1,
                f && y.trigger("ajaxSend", [E, h]),
                c)
                    return E;
                h.async && h.timeout > 0 && (u = e.setTimeout(function() {
                    E.abort("timeout")
                }, h.timeout));
                try {
                    c = !1,
                    i.send(b, k)
                } catch (e) {
                    if (c)
                        throw e;
                    k(-1, e)
                }
            } else
                k(-1, "No Transport");
            function k(t, n, r, s) {
                var l, p, d, b, T, C = n;
                c || (c = !0,
                u && e.clearTimeout(u),
                i = void 0,
                a = s || "",
                E.readyState = t > 0 ? 4 : 0,
                l = t >= 200 && t < 300 || 304 === t,
                r && (b = Xt(h, E, r)),
                b = Ut(h, b, E, l),
                l ? (h.ifModified && ((T = E.getResponseHeader("Last-Modified")) && (w.lastModified[o] = T),
                (T = E.getResponseHeader("etag")) && (w.etag[o] = T)),
                204 === t || "HEAD" === h.type ? C = "nocontent" : 304 === t ? C = "notmodified" : (C = b.state,
                p = b.data,
                l = !(d = b.error))) : (d = C,
                !t && C || (C = "error",
                t < 0 && (t = 0))),
                E.status = t,
                E.statusText = (n || C) + "",
                l ? v.resolveWith(g, [p, C, E]) : v.rejectWith(g, [E, C, d]),
                E.statusCode(x),
                x = void 0,
                f && y.trigger(l ? "ajaxSuccess" : "ajaxError", [E, h, l ? p : d]),
                m.fireWith(g, [E, C]),
                f && (y.trigger("ajaxComplete", [E, h]),
                --w.active || w.event.trigger("ajaxStop")))
            }
            return E
        },
        getJSON: function(e, t, n) {
            return w.get(e, t, n, "json")
        },
        getScript: function(e, t) {
            return w.get(e, void 0, t, "script")
        }
    }),
    w.each(["get", "post"], function(e, t) {
        w[t] = function(e, n, r, i) {
            return g(n) && (i = i || r,
            r = n,
            n = void 0),
            w.ajax(w.extend({
                url: e,
                type: t,
                dataType: i,
                data: n,
                success: r
            }, w.isPlainObject(e) && e))
        }
    }),
    w._evalUrl = function(e) {
        return w.ajax({
            url: e,
            type: "GET",
            dataType: "script",
            cache: !0,
            async: !1,
            global: !1,
            "throws": !0
        })
    }
    ,
    w.fn.extend({
        wrapAll: function(e) {
            var t;
            return this[0] && (g(e) && (e = e.call(this[0])),
            t = w(e, this[0].ownerDocument).eq(0).clone(!0),
            this[0].parentNode && t.insertBefore(this[0]),
            t.map(function() {
                var e = this;
                while (e.firstElementChild)
                    e = e.firstElementChild;
                return e
            }).append(this)),
            this
        },
        wrapInner: function(e) {
            return g(e) ? this.each(function(t) {
                w(this).wrapInner(e.call(this, t))
            }) : this.each(function() {
                var t = w(this)
                  , n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        },
        wrap: function(e) {
            var t = g(e);
            return this.each(function(n) {
                w(this).wrapAll(t ? e.call(this, n) : e)
            })
        },
        unwrap: function(e) {
            return this.parent(e).not("body").each(function() {
                w(this).replaceWith(this.childNodes)
            }),
            this
        }
    }),
    w.expr.pseudos.hidden = function(e) {
        return !w.expr.pseudos.visible(e)
    }
    ,
    w.expr.pseudos.visible = function(e) {
        return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
    }
    ,
    w.ajaxSettings.xhr = function() {
        try {
            return new e.XMLHttpRequest
        } catch (e) {}
    }
    ;
    var Vt = {
        0: 200,
        1223: 204
    }
      , Gt = w.ajaxSettings.xhr();
    h.cors = !!Gt && "withCredentials"in Gt,
    h.ajax = Gt = !!Gt,
    w.ajaxTransport(function(t) {
        var n, r;
        if (h.cors || Gt && !t.crossDomain)
            return {
                send: function(i, o) {
                    var a, s = t.xhr();
                    if (s.open(t.type, t.url, t.async, t.username, t.password),
                    t.xhrFields)
                        for (a in t.xhrFields)
                            s[a] = t.xhrFields[a];
                    t.mimeType && s.overrideMimeType && s.overrideMimeType(t.mimeType),
                    t.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
                    for (a in i)
                        s.setRequestHeader(a, i[a]);
                    n = function(e) {
                        return function() {
                            n && (n = r = s.onload = s.onerror = s.onabort = s.ontimeout = s.onreadystatechange = null,
                            "abort" === e ? s.abort() : "error" === e ? "number" != typeof s.status ? o(0, "error") : o(s.status, s.statusText) : o(Vt[s.status] || s.status, s.statusText, "text" !== (s.responseType || "text") || "string" != typeof s.responseText ? {
                                binary: s.response
                            } : {
                                text: s.responseText
                            }, s.getAllResponseHeaders()))
                        }
                    }
                    ,
                    s.onload = n(),
                    r = s.onerror = s.ontimeout = n("error"),
                    void 0 !== s.onabort ? s.onabort = r : s.onreadystatechange = function() {
                        4 === s.readyState && e.setTimeout(function() {
                            n && r()
                        })
                    }
                    ,
                    n = n("abort");
                    try {
                        s.send(t.hasContent && t.data || null)
                    } catch (e) {
                        if (n)
                            throw e
                    }
                },
                abort: function() {
                    n && n()
                }
            }
    }),
    w.ajaxPrefilter(function(e) {
        e.crossDomain && (e.contents.script = !1)
    }),
    w.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /\b(?:java|ecma)script\b/
        },
        converters: {
            "text script": function(e) {
                return w.globalEval(e),
                e
            }
        }
    }),
    w.ajaxPrefilter("script", function(e) {
        void 0 === e.cache && (e.cache = !1),
        e.crossDomain && (e.type = "GET")
    }),
    w.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var t, n;
            return {
                send: function(i, o) {
                    t = w("<script>").prop({
                        charset: e.scriptCharset,
                        src: e.url
                    }).on("load error", n = function(e) {
                        t.remove(),
                        n = null,
                        e && o("error" === e.type ? 404 : 200, e.type)
                    }
                    ),
                    r.head.appendChild(t[0])
                },
                abort: function() {
                    n && n()
                }
            }
        }
    });
    var Yt = []
      , Qt = /(=)\?(?=&|$)|\?\?/;
    w.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Yt.pop() || w.expando + "_" + Et++;
            return this[e] = !0,
            e
        }
    }),
    w.ajaxPrefilter("json jsonp", function(t, n, r) {
        var i, o, a, s = !1 !== t.jsonp && (Qt.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Qt.test(t.data) && "data");
        if (s || "jsonp" === t.dataTypes[0])
            return i = t.jsonpCallback = g(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback,
            s ? t[s] = t[s].replace(Qt, "$1" + i) : !1 !== t.jsonp && (t.url += (kt.test(t.url) ? "&" : "?") + t.jsonp + "=" + i),
            t.converters["script json"] = function() {
                return a || w.error(i + " was not called"),
                a[0]
            }
            ,
            t.dataTypes[0] = "json",
            o = e[i],
            e[i] = function() {
                a = arguments
            }
            ,
            r.always(function() {
                void 0 === o ? w(e).removeProp(i) : e[i] = o,
                t[i] && (t.jsonpCallback = n.jsonpCallback,
                Yt.push(i)),
                a && g(o) && o(a[0]),
                a = o = void 0
            }),
            "script"
    }),
    h.createHTMLDocument = function() {
        var e = r.implementation.createHTMLDocument("").body;
        return e.innerHTML = "<form></form><form></form>",
        2 === e.childNodes.length
    }(),
    w.parseHTML = function(e, t, n) {
        if ("string" != typeof e)
            return [];
        "boolean" == typeof t && (n = t,
        t = !1);
        var i, o, a;
        return t || (h.createHTMLDocument ? ((i = (t = r.implementation.createHTMLDocument("")).createElement("base")).href = r.location.href,
        t.head.appendChild(i)) : t = r),
        o = A.exec(e),
        a = !n && [],
        o ? [t.createElement(o[1])] : (o = xe([e], t, a),
        a && a.length && w(a).remove(),
        w.merge([], o.childNodes))
    }
    ,
    w.fn.load = function(e, t, n) {
        var r, i, o, a = this, s = e.indexOf(" ");
        return s > -1 && (r = vt(e.slice(s)),
        e = e.slice(0, s)),
        g(t) ? (n = t,
        t = void 0) : t && "object" == typeof t && (i = "POST"),
        a.length > 0 && w.ajax({
            url: e,
            type: i || "GET",
            dataType: "html",
            data: t
        }).done(function(e) {
            o = arguments,
            a.html(r ? w("<div>").append(w.parseHTML(e)).find(r) : e)
        }).always(n && function(e, t) {
            a.each(function() {
                n.apply(this, o || [e.responseText, t, e])
            })
        }
        ),
        this
    }
    ,
    w.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        w.fn[t] = function(e) {
            return this.on(t, e)
        }
    }),
    w.expr.pseudos.animated = function(e) {
        return w.grep(w.timers, function(t) {
            return e === t.elem
        }).length
    }
    ,
    w.offset = {
        setOffset: function(e, t, n) {
            var r, i, o, a, s, u, l, c = w.css(e, "position"), f = w(e), p = {};
            "static" === c && (e.style.position = "relative"),
            s = f.offset(),
            o = w.css(e, "top"),
            u = w.css(e, "left"),
            (l = ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1) ? (a = (r = f.position()).top,
            i = r.left) : (a = parseFloat(o) || 0,
            i = parseFloat(u) || 0),
            g(t) && (t = t.call(e, n, w.extend({}, s))),
            null != t.top && (p.top = t.top - s.top + a),
            null != t.left && (p.left = t.left - s.left + i),
            "using"in t ? t.using.call(e, p) : f.css(p)
        }
    },
    w.fn.extend({
        offset: function(e) {
            if (arguments.length)
                return void 0 === e ? this : this.each(function(t) {
                    w.offset.setOffset(this, e, t)
                });
            var t, n, r = this[0];
            if (r)
                return r.getClientRects().length ? (t = r.getBoundingClientRect(),
                n = r.ownerDocument.defaultView,
                {
                    top: t.top + n.pageYOffset,
                    left: t.left + n.pageXOffset
                }) : {
                    top: 0,
                    left: 0
                }
        },
        position: function() {
            if (this[0]) {
                var e, t, n, r = this[0], i = {
                    top: 0,
                    left: 0
                };
                if ("fixed" === w.css(r, "position"))
                    t = r.getBoundingClientRect();
                else {
                    t = this.offset(),
                    n = r.ownerDocument,
                    e = r.offsetParent || n.documentElement;
                    while (e && (e === n.body || e === n.documentElement) && "static" === w.css(e, "position"))
                        e = e.parentNode;
                    e && e !== r && 1 === e.nodeType && ((i = w(e).offset()).top += w.css(e, "borderTopWidth", !0),
                    i.left += w.css(e, "borderLeftWidth", !0))
                }
                return {
                    top: t.top - i.top - w.css(r, "marginTop", !0),
                    left: t.left - i.left - w.css(r, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent;
                while (e && "static" === w.css(e, "position"))
                    e = e.offsetParent;
                return e || be
            })
        }
    }),
    w.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, t) {
        var n = "pageYOffset" === t;
        w.fn[e] = function(r) {
            return z(this, function(e, r, i) {
                var o;
                if (y(e) ? o = e : 9 === e.nodeType && (o = e.defaultView),
                void 0 === i)
                    return o ? o[t] : e[r];
                o ? o.scrollTo(n ? o.pageXOffset : i, n ? i : o.pageYOffset) : e[r] = i
            }, e, r, arguments.length)
        }
    }),
    w.each(["top", "left"], function(e, t) {
        w.cssHooks[t] = _e(h.pixelPosition, function(e, n) {
            if (n)
                return n = Fe(e, t),
                We.test(n) ? w(e).position()[t] + "px" : n
        })
    }),
    w.each({
        Height: "height",
        Width: "width"
    }, function(e, t) {
        w.each({
            padding: "inner" + e,
            content: t,
            "": "outer" + e
        }, function(n, r) {
            w.fn[r] = function(i, o) {
                var a = arguments.length && (n || "boolean" != typeof i)
                  , s = n || (!0 === i || !0 === o ? "margin" : "border");
                return z(this, function(t, n, i) {
                    var o;
                    return y(t) ? 0 === r.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement,
                    Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? w.css(t, n, s) : w.style(t, n, i, s)
                }, t, a ? i : void 0, a)
            }
        })
    }),
    w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function(e, t) {
        w.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }),
    w.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        }
    }),
    w.fn.extend({
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, r) {
            return this.on(t, e, n, r)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    }),
    w.proxy = function(e, t) {
        var n, r, i;
        if ("string" == typeof t && (n = e[t],
        t = e,
        e = n),
        g(e))
            return r = o.call(arguments, 2),
            i = function() {
                return e.apply(t || this, r.concat(o.call(arguments)))
            }
            ,
            i.guid = e.guid = e.guid || w.guid++,
            i
    }
    ,
    w.holdReady = function(e) {
        e ? w.readyWait++ : w.ready(!0)
    }
    ,
    w.isArray = Array.isArray,
    w.parseJSON = JSON.parse,
    w.nodeName = N,
    w.isFunction = g,
    w.isWindow = y,
    w.camelCase = G,
    w.type = x,
    w.now = Date.now,
    w.isNumeric = function(e) {
        var t = w.type(e);
        return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
    }
    ,
    "function" == typeof define && define.amd && define("jquery", [], function() {
        return w
    });
    var Jt = e.jQuery
      , Kt = e.$;
    return w.noConflict = function(t) {
        return e.$ === w && (e.$ = Kt),
        t && e.jQuery === w && (e.jQuery = Jt),
        w
    }
    ,
    t || (e.jQuery = e.$ = w),
    w
});
if ("undefined" == typeof jQuery) {
    var jQuery;
    jQuery = "function" == typeof require ? $ = require("jquery") : $
}
jQuery.easing.jswing = jQuery.easing.swing,
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(a, b, c, d, e) {
        return jQuery.easing[jQuery.easing.def](a, b, c, d, e)
    },
    easeInQuad: function(a, b, c, d, e) {
        return d * (b /= e) * b + c
    },
    easeOutQuad: function(a, b, c, d, e) {
        return -d * (b /= e) * (b - 2) + c
    },
    easeInOutQuad: function(a, b, c, d, e) {
        return (b /= e / 2) < 1 ? d / 2 * b * b + c : -d / 2 * (--b * (b - 2) - 1) + c
    },
    easeInCubic: function(a, b, c, d, e) {
        return d * (b /= e) * b * b + c
    },
    easeOutCubic: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b + 1) + c
    },
    easeInOutCubic: function(a, b, c, d, e) {
        return (b /= e / 2) < 1 ? d / 2 * b * b * b + c : d / 2 * ((b -= 2) * b * b + 2) + c
    },
    easeInQuart: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b + c
    },
    easeOutQuart: function(a, b, c, d, e) {
        return -d * ((b = b / e - 1) * b * b * b - 1) + c
    },
    easeInOutQuart: function(a, b, c, d, e) {
        return (b /= e / 2) < 1 ? d / 2 * b * b * b * b + c : -d / 2 * ((b -= 2) * b * b * b - 2) + c
    },
    easeInQuint: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b * b + c
    },
    easeOutQuint: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b * b * b + 1) + c
    },
    easeInOutQuint: function(a, b, c, d, e) {
        return (b /= e / 2) < 1 ? d / 2 * b * b * b * b * b + c : d / 2 * ((b -= 2) * b * b * b * b + 2) + c
    },
    easeInSine: function(a, b, c, d, e) {
        return -d * Math.cos(b / e * (Math.PI / 2)) + d + c
    },
    easeOutSine: function(a, b, c, d, e) {
        return d * Math.sin(b / e * (Math.PI / 2)) + c
    },
    easeInOutSine: function(a, b, c, d, e) {
        return -d / 2 * (Math.cos(Math.PI * b / e) - 1) + c
    },
    easeInExpo: function(a, b, c, d, e) {
        return 0 == b ? c : d * Math.pow(2, 10 * (b / e - 1)) + c
    },
    easeOutExpo: function(a, b, c, d, e) {
        return b == e ? c + d : d * (-Math.pow(2, -10 * b / e) + 1) + c
    },
    easeInOutExpo: function(a, b, c, d, e) {
        return 0 == b ? c : b == e ? c + d : (b /= e / 2) < 1 ? d / 2 * Math.pow(2, 10 * (b - 1)) + c : d / 2 * (-Math.pow(2, -10 * --b) + 2) + c
    },
    easeInCirc: function(a, b, c, d, e) {
        return -d * (Math.sqrt(1 - (b /= e) * b) - 1) + c
    },
    easeOutCirc: function(a, b, c, d, e) {
        return d * Math.sqrt(1 - (b = b / e - 1) * b) + c
    },
    easeInOutCirc: function(a, b, c, d, e) {
        return (b /= e / 2) < 1 ? -d / 2 * (Math.sqrt(1 - b * b) - 1) + c : d / 2 * (Math.sqrt(1 - (b -= 2) * b) + 1) + c
    },
    easeInElastic: function(a, b, c, d, e) {
        var f = 1.70158
          , g = 0
          , h = d;
        if (0 == b)
            return c;
        if (1 == (b /= e))
            return c + d;
        if (g || (g = .3 * e),
        h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else
            var f = g / (2 * Math.PI) * Math.asin(d / h);
        return -(h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * (2 * Math.PI) / g)) + c
    },
    easeOutElastic: function(a, b, c, d, e) {
        var f = 1.70158
          , g = 0
          , h = d;
        if (0 == b)
            return c;
        if (1 == (b /= e))
            return c + d;
        if (g || (g = .3 * e),
        h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else
            var f = g / (2 * Math.PI) * Math.asin(d / h);
        return h * Math.pow(2, -10 * b) * Math.sin((b * e - f) * (2 * Math.PI) / g) + d + c
    },
    easeInOutElastic: function(a, b, c, d, e) {
        var f = 1.70158
          , g = 0
          , h = d;
        if (0 == b)
            return c;
        if (2 == (b /= e / 2))
            return c + d;
        if (g || (g = e * (.3 * 1.5)),
        h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else
            var f = g / (2 * Math.PI) * Math.asin(d / h);
        return b < 1 ? -.5 * (h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * (2 * Math.PI) / g)) + c : h * Math.pow(2, -10 * (b -= 1)) * Math.sin((b * e - f) * (2 * Math.PI) / g) * .5 + d + c
    },
    easeInBack: function(a, b, c, d, e, f) {
        return void 0 == f && (f = 1.70158),
        d * (b /= e) * b * ((f + 1) * b - f) + c
    },
    easeOutBack: function(a, b, c, d, e, f) {
        return void 0 == f && (f = 1.70158),
        d * ((b = b / e - 1) * b * ((f + 1) * b + f) + 1) + c
    },
    easeInOutBack: function(a, b, c, d, e, f) {
        return void 0 == f && (f = 1.70158),
        (b /= e / 2) < 1 ? d / 2 * (b * b * (((f *= 1.525) + 1) * b - f)) + c : d / 2 * ((b -= 2) * b * (((f *= 1.525) + 1) * b + f) + 2) + c
    },
    easeInBounce: function(a, b, c, d, e) {
        return d - jQuery.easing.easeOutBounce(a, e - b, 0, d, e) + c
    },
    easeOutBounce: function(a, b, c, d, e) {
        return (b /= e) < 1 / 2.75 ? d * (7.5625 * b * b) + c : b < 2 / 2.75 ? d * (7.5625 * (b -= 1.5 / 2.75) * b + .75) + c : b < 2.5 / 2.75 ? d * (7.5625 * (b -= 2.25 / 2.75) * b + .9375) + c : d * (7.5625 * (b -= 2.625 / 2.75) * b + .984375) + c
    },
    easeInOutBounce: function(a, b, c, d, e) {
        return b < e / 2 ? .5 * jQuery.easing.easeInBounce(a, 2 * b, 0, d, e) + c : .5 * jQuery.easing.easeOutBounce(a, 2 * b - e, 0, d, e) + .5 * d + c
    }
}),
jQuery.extend(jQuery.easing, {
    easeInOutMaterial: function(a, b, c, d, e) {
        return (b /= e / 2) < 1 ? d / 2 * b * b + c : d / 4 * ((b -= 2) * b * b + 2) + c
    }
}),
jQuery.Velocity ? console.log("Velocity is already loaded. You may be needlessly importing Velocity again; note that Materialize includes Velocity.") : (!function(a) {
    function b(a) {
        var b = a.length
          , d = c.type(a);
        return "function" !== d && !c.isWindow(a) && (!(1 !== a.nodeType || !b) || ("array" === d || 0 === b || "number" == typeof b && b > 0 && b - 1 in a))
    }
    if (!a.jQuery) {
        var c = function(a, b) {
            return new c.fn.init(a,b)
        };
        c.isWindow = function(a) {
            return null != a && a == a.window
        }
        ,
        c.type = function(a) {
            return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? e[g.call(a)] || "object" : typeof a
        }
        ,
        c.isArray = Array.isArray || function(a) {
            return "array" === c.type(a)
        }
        ,
        c.isPlainObject = function(a) {
            var b;
            if (!a || "object" !== c.type(a) || a.nodeType || c.isWindow(a))
                return !1;
            try {
                if (a.constructor && !f.call(a, "constructor") && !f.call(a.constructor.prototype, "isPrototypeOf"))
                    return !1
            } catch (d) {
                return !1
            }
            for (b in a)
                ;
            return void 0 === b || f.call(a, b)
        }
        ,
        c.each = function(a, c, d) {
            var e, f = 0, g = a.length, h = b(a);
            if (d) {
                if (h)
                    for (; g > f && (e = c.apply(a[f], d),
                    e !== !1); f++)
                        ;
                else
                    for (f in a)
                        if (e = c.apply(a[f], d),
                        e === !1)
                            break
            } else if (h)
                for (; g > f && (e = c.call(a[f], f, a[f]),
                e !== !1); f++)
                    ;
            else
                for (f in a)
                    if (e = c.call(a[f], f, a[f]),
                    e === !1)
                        break;
            return a
        }
        ,
        c.data = function(a, b, e) {
            if (void 0 === e) {
                var f = a[c.expando]
                  , g = f && d[f];
                if (void 0 === b)
                    return g;
                if (g && b in g)
                    return g[b]
            } else if (void 0 !== b) {
                var f = a[c.expando] || (a[c.expando] = ++c.uuid);
                return d[f] = d[f] || {},
                d[f][b] = e,
                e
            }
        }
        ,
        c.removeData = function(a, b) {
            var e = a[c.expando]
              , f = e && d[e];
            f && c.each(b, function(a, b) {
                delete f[b]
            })
        }
        ,
        c.extend = function() {
            var a, b, d, e, f, g, h = arguments[0] || {}, i = 1, j = arguments.length, k = !1;
            for ("boolean" == typeof h && (k = h,
            h = arguments[i] || {},
            i++),
            "object" != typeof h && "function" !== c.type(h) && (h = {}),
            i === j && (h = this,
            i--); j > i; i++)
                if (null != (f = arguments[i]))
                    for (e in f)
                        a = h[e],
                        d = f[e],
                        h !== d && (k && d && (c.isPlainObject(d) || (b = c.isArray(d))) ? (b ? (b = !1,
                        g = a && c.isArray(a) ? a : []) : g = a && c.isPlainObject(a) ? a : {},
                        h[e] = c.extend(k, g, d)) : void 0 !== d && (h[e] = d));
            return h
        }
        ,
        c.queue = function(a, d, e) {
            function f(a, c) {
                var d = c || [];
                return null != a && (b(Object(a)) ? !function(a, b) {
                    for (var c = +b.length, d = 0, e = a.length; c > d; )
                        a[e++] = b[d++];
                    if (c !== c)
                        for (; void 0 !== b[d]; )
                            a[e++] = b[d++];
                    return a.length = e,
                    a
                }(d, "string" == typeof a ? [a] : a) : [].push.call(d, a)),
                d
            }
            if (a) {
                d = (d || "fx") + "queue";
                var g = c.data(a, d);
                return e ? (!g || c.isArray(e) ? g = c.data(a, d, f(e)) : g.push(e),
                g) : g || []
            }
        }
        ,
        c.dequeue = function(a, b) {
            c.each(a.nodeType ? [a] : a, function(a, d) {
                b = b || "fx";
                var e = c.queue(d, b)
                  , f = e.shift();
                "inprogress" === f && (f = e.shift()),
                f && ("fx" === b && e.unshift("inprogress"),
                f.call(d, function() {
                    c.dequeue(d, b)
                }))
            })
        }
        ,
        c.fn = c.prototype = {
            init: function(a) {
                if (a.nodeType)
                    return this[0] = a,
                    this;
                throw new Error("Not a DOM node.")
            },
            offset: function() {
                var b = this[0].getBoundingClientRect ? this[0].getBoundingClientRect() : {
                    top: 0,
                    left: 0
                };
                return {
                    top: b.top + (a.pageYOffset || document.scrollTop || 0) - (document.clientTop || 0),
                    left: b.left + (a.pageXOffset || document.scrollLeft || 0) - (document.clientLeft || 0)
                }
            },
            position: function() {
                function a() {
                    for (var a = this.offsetParent || document; a && "html" === !a.nodeType.toLowerCase && "static" === a.style.position; )
                        a = a.offsetParent;
                    return a || document
                }
                var b = this[0]
                  , a = a.apply(b)
                  , d = this.offset()
                  , e = /^(?:body|html)$/i.test(a.nodeName) ? {
                    top: 0,
                    left: 0
                } : c(a).offset();
                return d.top -= parseFloat(b.style.marginTop) || 0,
                d.left -= parseFloat(b.style.marginLeft) || 0,
                a.style && (e.top += parseFloat(a.style.borderTopWidth) || 0,
                e.left += parseFloat(a.style.borderLeftWidth) || 0),
                {
                    top: d.top - e.top,
                    left: d.left - e.left
                }
            }
        };
        var d = {};
        c.expando = "velocity" + (new Date).getTime(),
        c.uuid = 0;
        for (var e = {}, f = e.hasOwnProperty, g = e.toString, h = "Boolean Number String Function Array Date RegExp Object Error".split(" "), i = 0; i < h.length; i++)
            e["[object " + h[i] + "]"] = h[i].toLowerCase();
        c.fn.init.prototype = c.fn,
        a.Velocity = {
            Utilities: c
        }
    }
}(window),
function(a) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = a() : "function" == typeof define && define.amd ? define(a) : a()
}(function() {
    return function(a, b, c, d) {
        function e(a) {
            for (var b = -1, c = a ? a.length : 0, d = []; ++b < c; ) {
                var e = a[b];
                e && d.push(e)
            }
            return d
        }
        function f(a) {
            return p.isWrapped(a) ? a = [].slice.call(a) : p.isNode(a) && (a = [a]),
            a
        }
        function g(a) {
            var b = m.data(a, "velocity");
            return null === b ? d : b
        }
        function h(a) {
            return function(b) {
                return Math.round(b * a) * (1 / a)
            }
        }
        function i(a, c, d, e) {
            function f(a, b) {
                return 1 - 3 * b + 3 * a
            }
            function g(a, b) {
                return 3 * b - 6 * a
            }
            function h(a) {
                return 3 * a
            }
            function i(a, b, c) {
                return ((f(b, c) * a + g(b, c)) * a + h(b)) * a
            }
            function j(a, b, c) {
                return 3 * f(b, c) * a * a + 2 * g(b, c) * a + h(b)
            }
            function k(b, c) {
                for (var e = 0; p > e; ++e) {
                    var f = j(c, a, d);
                    if (0 === f)
                        return c;
                    var g = i(c, a, d) - b;
                    c -= g / f
                }
                return c
            }
            function l() {
                for (var b = 0; t > b; ++b)
                    x[b] = i(b * u, a, d)
            }
            function m(b, c, e) {
                var f, g, h = 0;
                do
                    g = c + (e - c) / 2,
                    f = i(g, a, d) - b,
                    f > 0 ? e = g : c = g;
                while (Math.abs(f) > r && ++h < s);return g
            }
            function n(b) {
                for (var c = 0, e = 1, f = t - 1; e != f && x[e] <= b; ++e)
                    c += u;
                --e;
                var g = (b - x[e]) / (x[e + 1] - x[e])
                  , h = c + g * u
                  , i = j(h, a, d);
                return i >= q ? k(b, h) : 0 == i ? h : m(b, c, c + u)
            }
            function o() {
                y = !0,
                (a != c || d != e) && l()
            }
            var p = 4
              , q = .001
              , r = 1e-7
              , s = 10
              , t = 11
              , u = 1 / (t - 1)
              , v = "Float32Array"in b;
            if (4 !== arguments.length)
                return !1;
            for (var w = 0; 4 > w; ++w)
                if ("number" != typeof arguments[w] || isNaN(arguments[w]) || !isFinite(arguments[w]))
                    return !1;
            a = Math.min(a, 1),
            d = Math.min(d, 1),
            a = Math.max(a, 0),
            d = Math.max(d, 0);
            var x = v ? new Float32Array(t) : new Array(t)
              , y = !1
              , z = function(b) {
                return y || o(),
                a === c && d === e ? b : 0 === b ? 0 : 1 === b ? 1 : i(n(b), c, e)
            };
            z.getControlPoints = function() {
                return [{
                    x: a,
                    y: c
                }, {
                    x: d,
                    y: e
                }]
            }
            ;
            var A = "generateBezier(" + [a, c, d, e] + ")";
            return z.toString = function() {
                return A
            }
            ,
            z
        }
        function j(a, b) {
            var c = a;
            return p.isString(a) ? t.Easings[a] || (c = !1) : c = p.isArray(a) && 1 === a.length ? h.apply(null, a) : p.isArray(a) && 2 === a.length ? u.apply(null, a.concat([b])) : !(!p.isArray(a) || 4 !== a.length) && i.apply(null, a),
            c === !1 && (c = t.Easings[t.defaults.easing] ? t.defaults.easing : s),
            c
        }
        function k(a) {
            if (a) {
                var b = (new Date).getTime()
                  , c = t.State.calls.length;
                c > 1e4 && (t.State.calls = e(t.State.calls));
                for (var f = 0; c > f; f++)
                    if (t.State.calls[f]) {
                        var h = t.State.calls[f]
                          , i = h[0]
                          , j = h[2]
                          , n = h[3]
                          , o = !!n
                          , q = null;
                        n || (n = t.State.calls[f][3] = b - 16);
                        for (var r = Math.min((b - n) / j.duration, 1), s = 0, u = i.length; u > s; s++) {
                            var w = i[s]
                              , y = w.element;
                            if (g(y)) {
                                var z = !1;
                                if (j.display !== d && null !== j.display && "none" !== j.display) {
                                    if ("flex" === j.display) {
                                        var A = ["-webkit-box", "-moz-box", "-ms-flexbox", "-webkit-flex"];
                                        m.each(A, function(a, b) {
                                            v.setPropertyValue(y, "display", b)
                                        })
                                    }
                                    v.setPropertyValue(y, "display", j.display)
                                }
                                j.visibility !== d && "hidden" !== j.visibility && v.setPropertyValue(y, "visibility", j.visibility);
                                for (var B in w)
                                    if ("element" !== B) {
                                        var C, D = w[B], E = p.isString(D.easing) ? t.Easings[D.easing] : D.easing;
                                        if (1 === r)
                                            C = D.endValue;
                                        else {
                                            var F = D.endValue - D.startValue;
                                            if (C = D.startValue + F * E(r, j, F),
                                            !o && C === D.currentValue)
                                                continue
                                        }
                                        if (D.currentValue = C,
                                        "tween" === B)
                                            q = C;
                                        else {
                                            if (v.Hooks.registered[B]) {
                                                var G = v.Hooks.getRoot(B)
                                                  , H = g(y).rootPropertyValueCache[G];
                                                H && (D.rootPropertyValue = H)
                                            }
                                            var I = v.setPropertyValue(y, B, D.currentValue + (0 === parseFloat(C) ? "" : D.unitType), D.rootPropertyValue, D.scrollData);
                                            v.Hooks.registered[B] && (g(y).rootPropertyValueCache[G] = v.Normalizations.registered[G] ? v.Normalizations.registered[G]("extract", null, I[1]) : I[1]),
                                            "transform" === I[0] && (z = !0)
                                        }
                                    }
                                j.mobileHA && g(y).transformCache.translate3d === d && (g(y).transformCache.translate3d = "(0px, 0px, 0px)",
                                z = !0),
                                z && v.flushTransformCache(y)
                            }
                        }
                        j.display !== d && "none" !== j.display && (t.State.calls[f][2].display = !1),
                        j.visibility !== d && "hidden" !== j.visibility && (t.State.calls[f][2].visibility = !1),
                        j.progress && j.progress.call(h[1], h[1], r, Math.max(0, n + j.duration - b), n, q),
                        1 === r && l(f)
                    }
            }
            t.State.isTicking && x(k)
        }
        function l(a, b) {
            if (!t.State.calls[a])
                return !1;
            for (var c = t.State.calls[a][0], e = t.State.calls[a][1], f = t.State.calls[a][2], h = t.State.calls[a][4], i = !1, j = 0, k = c.length; k > j; j++) {
                var l = c[j].element;
                if (b || f.loop || ("none" === f.display && v.setPropertyValue(l, "display", f.display),
                "hidden" === f.visibility && v.setPropertyValue(l, "visibility", f.visibility)),
                f.loop !== !0 && (m.queue(l)[1] === d || !/\.velocityQueueEntryFlag/i.test(m.queue(l)[1])) && g(l)) {
                    g(l).isAnimating = !1,
                    g(l).rootPropertyValueCache = {};
                    var n = !1;
                    m.each(v.Lists.transforms3D, function(a, b) {
                        var c = /^scale/.test(b) ? 1 : 0
                          , e = g(l).transformCache[b];
                        g(l).transformCache[b] !== d && new RegExp("^\\(" + c + "[^.]").test(e) && (n = !0,
                        delete g(l).transformCache[b])
                    }),
                    f.mobileHA && (n = !0,
                    delete g(l).transformCache.translate3d),
                    n && v.flushTransformCache(l),
                    v.Values.removeClass(l, "velocity-animating")
                }
                if (!b && f.complete && !f.loop && j === k - 1)
                    try {
                        f.complete.call(e, e)
                    } catch (o) {
                        setTimeout(function() {
                            throw o
                        }, 1)
                    }
                h && f.loop !== !0 && h(e),
                g(l) && f.loop === !0 && !b && (m.each(g(l).tweensContainer, function(a, b) {
                    /^rotate/.test(a) && 360 === parseFloat(b.endValue) && (b.endValue = 0,
                    b.startValue = 360),
                    /^backgroundPosition/.test(a) && 100 === parseFloat(b.endValue) && "%" === b.unitType && (b.endValue = 0,
                    b.startValue = 100)
                }),
                t(l, "reverse", {
                    loop: !0,
                    delay: f.delay
                })),
                f.queue !== !1 && m.dequeue(l, f.queue)
            }
            t.State.calls[a] = !1;
            for (var p = 0, q = t.State.calls.length; q > p; p++)
                if (t.State.calls[p] !== !1) {
                    i = !0;
                    break
                }
            i === !1 && (t.State.isTicking = !1,
            delete t.State.calls,
            t.State.calls = [])
        }
        var m, n = function() {
            if (c.documentMode)
                return c.documentMode;
            for (var a = 7; a > 4; a--) {
                var b = c.createElement("div");
                if (b.innerHTML = "<!--[if IE " + a + "]><span></span><![endif]-->",
                b.getElementsByTagName("span").length)
                    return b = null,
                    a
            }
            return d
        }(), o = function() {
            var a = 0;
            return b.webkitRequestAnimationFrame || b.mozRequestAnimationFrame || function(b) {
                var c, d = (new Date).getTime();
                return c = Math.max(0, 16 - (d - a)),
                a = d + c,
                setTimeout(function() {
                    b(d + c)
                }, c)
            }
        }(), p = {
            isString: function(a) {
                return "string" == typeof a
            },
            isArray: Array.isArray || function(a) {
                return "[object Array]" === Object.prototype.toString.call(a)
            }
            ,
            isFunction: function(a) {
                return "[object Function]" === Object.prototype.toString.call(a)
            },
            isNode: function(a) {
                return a && a.nodeType
            },
            isNodeList: function(a) {
                return "object" == typeof a && /^\[object (HTMLCollection|NodeList|Object)\]$/.test(Object.prototype.toString.call(a)) && a.length !== d && (0 === a.length || "object" == typeof a[0] && a[0].nodeType > 0)
            },
            isWrapped: function(a) {
                return a && (a.jquery || b.Zepto && b.Zepto.zepto.isZ(a))
            },
            isSVG: function(a) {
                return b.SVGElement && a instanceof b.SVGElement
            },
            isEmptyObject: function(a) {
                for (var b in a)
                    return !1;
                return !0
            }
        }, q = !1;
        if (a.fn && a.fn.jquery ? (m = a,
        q = !0) : m = b.Velocity.Utilities,
        8 >= n && !q)
            throw new Error("Velocity: IE8 and below require jQuery to be loaded before Velocity.");
        if (7 >= n)
            return void (jQuery.fn.velocity = jQuery.fn.animate);
        var r = 400
          , s = "swing"
          , t = {
            State: {
                isMobile: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
                isAndroid: /Android/i.test(navigator.userAgent),
                isGingerbread: /Android 2\.3\.[3-7]/i.test(navigator.userAgent),
                isChrome: b.chrome,
                isFirefox: /Firefox/i.test(navigator.userAgent),
                prefixElement: c.createElement("div"),
                prefixMatches: {},
                scrollAnchor: null,
                scrollPropertyLeft: null,
                scrollPropertyTop: null,
                isTicking: !1,
                calls: []
            },
            CSS: {},
            Utilities: m,
            Redirects: {},
            Easings: {},
            Promise: b.Promise,
            defaults: {
                queue: "",
                duration: r,
                easing: s,
                begin: d,
                complete: d,
                progress: d,
                display: d,
                visibility: d,
                loop: !1,
                delay: !1,
                mobileHA: !0,
                _cacheValues: !0
            },
            init: function(a) {
                m.data(a, "velocity", {
                    isSVG: p.isSVG(a),
                    isAnimating: !1,
                    computedStyle: null,
                    tweensContainer: null,
                    rootPropertyValueCache: {},
                    transformCache: {}
                })
            },
            hook: null,
            mock: !1,
            version: {
                major: 1,
                minor: 2,
                patch: 2
            },
            debug: !1
        };
        b.pageYOffset !== d ? (t.State.scrollAnchor = b,
        t.State.scrollPropertyLeft = "pageXOffset",
        t.State.scrollPropertyTop = "pageYOffset") : (t.State.scrollAnchor = c.documentElement || c.body.parentNode || c.body,
        t.State.scrollPropertyLeft = "scrollLeft",
        t.State.scrollPropertyTop = "scrollTop");
        var u = function() {
            function a(a) {
                return -a.tension * a.x - a.friction * a.v
            }
            function b(b, c, d) {
                var e = {
                    x: b.x + d.dx * c,
                    v: b.v + d.dv * c,
                    tension: b.tension,
                    friction: b.friction
                };
                return {
                    dx: e.v,
                    dv: a(e)
                }
            }
            function c(c, d) {
                var e = {
                    dx: c.v,
                    dv: a(c)
                }
                  , f = b(c, .5 * d, e)
                  , g = b(c, .5 * d, f)
                  , h = b(c, d, g)
                  , i = 1 / 6 * (e.dx + 2 * (f.dx + g.dx) + h.dx)
                  , j = 1 / 6 * (e.dv + 2 * (f.dv + g.dv) + h.dv);
                return c.x = c.x + i * d,
                c.v = c.v + j * d,
                c
            }
            return function d(a, b, e) {
                var f, g, h, i = {
                    x: -1,
                    v: 0,
                    tension: null,
                    friction: null
                }, j = [0], k = 0, l = 1e-4, m = .016;
                for (a = parseFloat(a) || 500,
                b = parseFloat(b) || 20,
                e = e || null,
                i.tension = a,
                i.friction = b,
                f = null !== e,
                f ? (k = d(a, b),
                g = k / e * m) : g = m; h = c(h || i, g),
                j.push(1 + h.x),
                k += 16,
                Math.abs(h.x) > l && Math.abs(h.v) > l; )
                    ;
                return f ? function(a) {
                    return j[a * (j.length - 1) | 0]
                }
                : k
            }
        }();
        t.Easings = {
            linear: function(a) {
                return a
            },
            swing: function(a) {
                return .5 - Math.cos(a * Math.PI) / 2
            },
            spring: function(a) {
                return 1 - Math.cos(4.5 * a * Math.PI) * Math.exp(6 * -a)
            }
        },
        m.each([["ease", [.25, .1, .25, 1]], ["ease-in", [.42, 0, 1, 1]], ["ease-out", [0, 0, .58, 1]], ["ease-in-out", [.42, 0, .58, 1]], ["easeInSine", [.47, 0, .745, .715]], ["easeOutSine", [.39, .575, .565, 1]], ["easeInOutSine", [.445, .05, .55, .95]], ["easeInQuad", [.55, .085, .68, .53]], ["easeOutQuad", [.25, .46, .45, .94]], ["easeInOutQuad", [.455, .03, .515, .955]], ["easeInCubic", [.55, .055, .675, .19]], ["easeOutCubic", [.215, .61, .355, 1]], ["easeInOutCubic", [.645, .045, .355, 1]], ["easeInQuart", [.895, .03, .685, .22]], ["easeOutQuart", [.165, .84, .44, 1]], ["easeInOutQuart", [.77, 0, .175, 1]], ["easeInQuint", [.755, .05, .855, .06]], ["easeOutQuint", [.23, 1, .32, 1]], ["easeInOutQuint", [.86, 0, .07, 1]], ["easeInExpo", [.95, .05, .795, .035]], ["easeOutExpo", [.19, 1, .22, 1]], ["easeInOutExpo", [1, 0, 0, 1]], ["easeInCirc", [.6, .04, .98, .335]], ["easeOutCirc", [.075, .82, .165, 1]], ["easeInOutCirc", [.785, .135, .15, .86]]], function(a, b) {
            t.Easings[b[0]] = i.apply(null, b[1])
        });
        var v = t.CSS = {
            RegEx: {
                isHex: /^#([A-f\d]{3}){1,2}$/i,
                valueUnwrap: /^[A-z]+\((.*)\)$/i,
                wrappedValueAlreadyExtracted: /[0-9.]+ [0-9.]+ [0-9.]+( [0-9.]+)?/,
                valueSplit: /([A-z]+\(.+\))|(([A-z0-9#-.]+?)(?=\s|$))/gi
            },
            Lists: {
                colors: ["fill", "stroke", "stopColor", "color", "backgroundColor", "borderColor", "borderTopColor", "borderRightColor", "borderBottomColor", "borderLeftColor", "outlineColor"],
                transformsBase: ["translateX", "translateY", "scale", "scaleX", "scaleY", "skewX", "skewY", "rotateZ"],
                transforms3D: ["transformPerspective", "translateZ", "scaleZ", "rotateX", "rotateY"]
            },
            Hooks: {
                templates: {
                    textShadow: ["Color X Y Blur", "black 0px 0px 0px"],
                    boxShadow: ["Color X Y Blur Spread", "black 0px 0px 0px 0px"],
                    clip: ["Top Right Bottom Left", "0px 0px 0px 0px"],
                    backgroundPosition: ["X Y", "0% 0%"],
                    transformOrigin: ["X Y Z", "50% 50% 0px"],
                    perspectiveOrigin: ["X Y", "50% 50%"]
                },
                registered: {},
                register: function() {
                    for (var a = 0; a < v.Lists.colors.length; a++) {
                        var b = "color" === v.Lists.colors[a] ? "0 0 0 1" : "255 255 255 1";
                        v.Hooks.templates[v.Lists.colors[a]] = ["Red Green Blue Alpha", b]
                    }
                    var c, d, e;
                    if (n)
                        for (c in v.Hooks.templates) {
                            d = v.Hooks.templates[c],
                            e = d[0].split(" ");
                            var f = d[1].match(v.RegEx.valueSplit);
                            "Color" === e[0] && (e.push(e.shift()),
                            f.push(f.shift()),
                            v.Hooks.templates[c] = [e.join(" "), f.join(" ")])
                        }
                    for (c in v.Hooks.templates) {
                        d = v.Hooks.templates[c],
                        e = d[0].split(" ");
                        for (var a in e) {
                            var g = c + e[a]
                              , h = a;
                            v.Hooks.registered[g] = [c, h]
                        }
                    }
                },
                getRoot: function(a) {
                    var b = v.Hooks.registered[a];
                    return b ? b[0] : a
                },
                cleanRootPropertyValue: function(a, b) {
                    return v.RegEx.valueUnwrap.test(b) && (b = b.match(v.RegEx.valueUnwrap)[1]),
                    v.Values.isCSSNullValue(b) && (b = v.Hooks.templates[a][1]),
                    b
                },
                extractValue: function(a, b) {
                    var c = v.Hooks.registered[a];
                    if (c) {
                        var d = c[0]
                          , e = c[1];
                        return b = v.Hooks.cleanRootPropertyValue(d, b),
                        b.toString().match(v.RegEx.valueSplit)[e]
                    }
                    return b
                },
                injectValue: function(a, b, c) {
                    var d = v.Hooks.registered[a];
                    if (d) {
                        var e, f, g = d[0], h = d[1];
                        return c = v.Hooks.cleanRootPropertyValue(g, c),
                        e = c.toString().match(v.RegEx.valueSplit),
                        e[h] = b,
                        f = e.join(" ")
                    }
                    return c
                }
            },
            Normalizations: {
                registered: {
                    clip: function(a, b, c) {
                        switch (a) {
                        case "name":
                            return "clip";
                        case "extract":
                            var d;
                            return v.RegEx.wrappedValueAlreadyExtracted.test(c) ? d = c : (d = c.toString().match(v.RegEx.valueUnwrap),
                            d = d ? d[1].replace(/,(\s+)?/g, " ") : c),
                            d;
                        case "inject":
                            return "rect(" + c + ")"
                        }
                    },
                    blur: function(a, b, c) {
                        switch (a) {
                        case "name":
                            return t.State.isFirefox ? "filter" : "-webkit-filter";
                        case "extract":
                            var d = parseFloat(c);
                            if (!d && 0 !== d) {
                                var e = c.toString().match(/blur\(([0-9]+[A-z]+)\)/i);
                                d = e ? e[1] : 0
                            }
                            return d;
                        case "inject":
                            return parseFloat(c) ? "blur(" + c + ")" : "none"
                        }
                    },
                    opacity: function(a, b, c) {
                        if (8 >= n)
                            switch (a) {
                            case "name":
                                return "filter";
                            case "extract":
                                var d = c.toString().match(/alpha\(opacity=(.*)\)/i);
                                return c = d ? d[1] / 100 : 1;
                            case "inject":
                                return b.style.zoom = 1,
                                parseFloat(c) >= 1 ? "" : "alpha(opacity=" + parseInt(100 * parseFloat(c), 10) + ")"
                            }
                        else
                            switch (a) {
                            case "name":
                                return "opacity";
                            case "extract":
                                return c;
                            case "inject":
                                return c
                            }
                    }
                },
                register: function() {
                    9 >= n || t.State.isGingerbread || (v.Lists.transformsBase = v.Lists.transformsBase.concat(v.Lists.transforms3D));
                    for (var a = 0; a < v.Lists.transformsBase.length; a++)
                        !function() {
                            var b = v.Lists.transformsBase[a];
                            v.Normalizations.registered[b] = function(a, c, e) {
                                switch (a) {
                                case "name":
                                    return "transform";
                                case "extract":
                                    return g(c) === d || g(c).transformCache[b] === d ? /^scale/i.test(b) ? 1 : 0 : g(c).transformCache[b].replace(/[()]/g, "");
                                case "inject":
                                    var f = !1;
                                    switch (b.substr(0, b.length - 1)) {
                                    case "translate":
                                        f = !/(%|px|em|rem|vw|vh|\d)$/i.test(e);
                                        break;
                                    case "scal":
                                    case "scale":
                                        t.State.isAndroid && g(c).transformCache[b] === d && 1 > e && (e = 1),
                                        f = !/(\d)$/i.test(e);
                                        break;
                                    case "skew":
                                        f = !/(deg|\d)$/i.test(e);
                                        break;
                                    case "rotate":
                                        f = !/(deg|\d)$/i.test(e)
                                    }
                                    return f || (g(c).transformCache[b] = "(" + e + ")"),
                                    g(c).transformCache[b]
                                }
                            }
                        }();
                    for (var a = 0; a < v.Lists.colors.length; a++)
                        !function() {
                            var b = v.Lists.colors[a];
                            v.Normalizations.registered[b] = function(a, c, e) {
                                switch (a) {
                                case "name":
                                    return b;
                                case "extract":
                                    var f;
                                    if (v.RegEx.wrappedValueAlreadyExtracted.test(e))
                                        f = e;
                                    else {
                                        var g, h = {
                                            black: "rgb(0, 0, 0)",
                                            blue: "rgb(0, 0, 255)",
                                            gray: "rgb(128, 128, 128)",
                                            green: "rgb(0, 128, 0)",
                                            red: "rgb(255, 0, 0)",
                                            white: "rgb(255, 255, 255)"
                                        };
                                        /^[A-z]+$/i.test(e) ? g = h[e] !== d ? h[e] : h.black : v.RegEx.isHex.test(e) ? g = "rgb(" + v.Values.hexToRgb(e).join(" ") + ")" : /^rgba?\(/i.test(e) || (g = h.black),
                                        f = (g || e).toString().match(v.RegEx.valueUnwrap)[1].replace(/,(\s+)?/g, " ")
                                    }
                                    return 8 >= n || 3 !== f.split(" ").length || (f += " 1"),
                                    f;
                                case "inject":
                                    return 8 >= n ? 4 === e.split(" ").length && (e = e.split(/\s+/).slice(0, 3).join(" ")) : 3 === e.split(" ").length && (e += " 1"),
                                    (8 >= n ? "rgb" : "rgba") + "(" + e.replace(/\s+/g, ",").replace(/\.(\d)+(?=,)/g, "") + ")"
                                }
                            }
                        }()
                }
            },
            Names: {
                camelCase: function(a) {
                    return a.replace(/-(\w)/g, function(a, b) {
                        return b.toUpperCase()
                    })
                },
                SVGAttribute: function(a) {
                    var b = "width|height|x|y|cx|cy|r|rx|ry|x1|x2|y1|y2";
                    return (n || t.State.isAndroid && !t.State.isChrome) && (b += "|transform"),
                    new RegExp("^(" + b + ")$","i").test(a)
                },
                prefixCheck: function(a) {
                    if (t.State.prefixMatches[a])
                        return [t.State.prefixMatches[a], !0];
                    for (var b = ["", "Webkit", "Moz", "ms", "O"], c = 0, d = b.length; d > c; c++) {
                        var e;
                        if (e = 0 === c ? a : b[c] + a.replace(/^\w/, function(a) {
                            return a.toUpperCase()
                        }),
                        p.isString(t.State.prefixElement.style[e]))
                            return t.State.prefixMatches[a] = e,
                            [e, !0]
                    }
                    return [a, !1]
                }
            },
            Values: {
                hexToRgb: function(a) {
                    var b, c = /^#?([a-f\d])([a-f\d])([a-f\d])$/i, d = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i;
                    return a = a.replace(c, function(a, b, c, d) {
                        return b + b + c + c + d + d
                    }),
                    b = d.exec(a),
                    b ? [parseInt(b[1], 16), parseInt(b[2], 16), parseInt(b[3], 16)] : [0, 0, 0]
                },
                isCSSNullValue: function(a) {
                    return 0 == a || /^(none|auto|transparent|(rgba\(0, ?0, ?0, ?0\)))$/i.test(a)
                },
                getUnitType: function(a) {
                    return /^(rotate|skew)/i.test(a) ? "deg" : /(^(scale|scaleX|scaleY|scaleZ|alpha|flexGrow|flexHeight|zIndex|fontWeight)$)|((opacity|red|green|blue|alpha)$)/i.test(a) ? "" : "px"
                },
                getDisplayType: function(a) {
                    var b = a && a.tagName.toString().toLowerCase();
                    return /^(b|big|i|small|tt|abbr|acronym|cite|code|dfn|em|kbd|strong|samp|var|a|bdo|br|img|map|object|q|script|span|sub|sup|button|input|label|select|textarea)$/i.test(b) ? "inline" : /^(li)$/i.test(b) ? "list-item" : /^(tr)$/i.test(b) ? "table-row" : /^(table)$/i.test(b) ? "table" : /^(tbody)$/i.test(b) ? "table-row-group" : "block"
                },
                addClass: function(a, b) {
                    a.classList ? a.classList.add(b) : a.className += (a.className.length ? " " : "") + b
                },
                removeClass: function(a, b) {
                    a.classList ? a.classList.remove(b) : a.className = a.className.toString().replace(new RegExp("(^|\\s)" + b.split(" ").join("|") + "(\\s|$)","gi"), " ")
                }
            },
            getPropertyValue: function(a, c, e, f) {
                function h(a, c) {
                    function e() {
                        j && v.setPropertyValue(a, "display", "none")
                    }
                    var i = 0;
                    if (8 >= n)
                        i = m.css(a, c);
                    else {
                        var j = !1;
                        if (/^(width|height)$/.test(c) && 0 === v.getPropertyValue(a, "display") && (j = !0,
                        v.setPropertyValue(a, "display", v.Values.getDisplayType(a))),
                        !f) {
                            if ("height" === c && "border-box" !== v.getPropertyValue(a, "boxSizing").toString().toLowerCase()) {
                                var k = a.offsetHeight - (parseFloat(v.getPropertyValue(a, "borderTopWidth")) || 0) - (parseFloat(v.getPropertyValue(a, "borderBottomWidth")) || 0) - (parseFloat(v.getPropertyValue(a, "paddingTop")) || 0) - (parseFloat(v.getPropertyValue(a, "paddingBottom")) || 0);
                                return e(),
                                k
                            }
                            if ("width" === c && "border-box" !== v.getPropertyValue(a, "boxSizing").toString().toLowerCase()) {
                                var l = a.offsetWidth - (parseFloat(v.getPropertyValue(a, "borderLeftWidth")) || 0) - (parseFloat(v.getPropertyValue(a, "borderRightWidth")) || 0) - (parseFloat(v.getPropertyValue(a, "paddingLeft")) || 0) - (parseFloat(v.getPropertyValue(a, "paddingRight")) || 0);
                                return e(),
                                l
                            }
                        }
                        var o;
                        o = g(a) === d ? b.getComputedStyle(a, null) : g(a).computedStyle ? g(a).computedStyle : g(a).computedStyle = b.getComputedStyle(a, null),
                        "borderColor" === c && (c = "borderTopColor"),
                        i = 9 === n && "filter" === c ? o.getPropertyValue(c) : o[c],
                        ("" === i || null === i) && (i = a.style[c]),
                        e()
                    }
                    if ("auto" === i && /^(top|right|bottom|left)$/i.test(c)) {
                        var p = h(a, "position");
                        ("fixed" === p || "absolute" === p && /top|left/i.test(c)) && (i = m(a).position()[c] + "px")
                    }
                    return i
                }
                var i;
                if (v.Hooks.registered[c]) {
                    var j = c
                      , k = v.Hooks.getRoot(j);
                    e === d && (e = v.getPropertyValue(a, v.Names.prefixCheck(k)[0])),
                    v.Normalizations.registered[k] && (e = v.Normalizations.registered[k]("extract", a, e)),
                    i = v.Hooks.extractValue(j, e)
                } else if (v.Normalizations.registered[c]) {
                    var l, o;
                    l = v.Normalizations.registered[c]("name", a),
                    "transform" !== l && (o = h(a, v.Names.prefixCheck(l)[0]),
                    v.Values.isCSSNullValue(o) && v.Hooks.templates[c] && (o = v.Hooks.templates[c][1])),
                    i = v.Normalizations.registered[c]("extract", a, o)
                }
                if (!/^[\d-]/.test(i))
                    if (g(a) && g(a).isSVG && v.Names.SVGAttribute(c))
                        if (/^(height|width)$/i.test(c))
                            try {
                                i = a.getBBox()[c]
                            } catch (p) {
                                i = 0
                            }
                        else
                            i = a.getAttribute(c);
                    else
                        i = h(a, v.Names.prefixCheck(c)[0]);
                return v.Values.isCSSNullValue(i) && (i = 0),
                t.debug >= 2 && console.log("Get " + c + ": " + i),
                i
            },
            setPropertyValue: function(a, c, d, e, f) {
                var h = c;
                if ("scroll" === c)
                    f.container ? f.container["scroll" + f.direction] = d : "Left" === f.direction ? b.scrollTo(d, f.alternateValue) : b.scrollTo(f.alternateValue, d);
                else if (v.Normalizations.registered[c] && "transform" === v.Normalizations.registered[c]("name", a))
                    v.Normalizations.registered[c]("inject", a, d),
                    h = "transform",
                    d = g(a).transformCache[c];
                else {
                    if (v.Hooks.registered[c]) {
                        var i = c
                          , j = v.Hooks.getRoot(c);
                        e = e || v.getPropertyValue(a, j),
                        d = v.Hooks.injectValue(i, d, e),
                        c = j
                    }
                    if (v.Normalizations.registered[c] && (d = v.Normalizations.registered[c]("inject", a, d),
                    c = v.Normalizations.registered[c]("name", a)),
                    h = v.Names.prefixCheck(c)[0],
                    8 >= n)
                        try {
                            a.style[h] = d
                        } catch (k) {
                            t.debug && console.log("Browser does not support [" + d + "] for [" + h + "]")
                        }
                    else
                        g(a) && g(a).isSVG && v.Names.SVGAttribute(c) ? a.setAttribute(c, d) : a.style[h] = d;
                    t.debug >= 2 && console.log("Set " + c + " (" + h + "): " + d)
                }
                return [h, d]
            },
            flushTransformCache: function(a) {
                function b(b) {
                    return parseFloat(v.getPropertyValue(a, b))
                }
                var c = "";
                if ((n || t.State.isAndroid && !t.State.isChrome) && g(a).isSVG) {
                    var d = {
                        translate: [b("translateX"), b("translateY")],
                        skewX: [b("skewX")],
                        skewY: [b("skewY")],
                        scale: 1 !== b("scale") ? [b("scale"), b("scale")] : [b("scaleX"), b("scaleY")],
                        rotate: [b("rotateZ"), 0, 0]
                    };
                    m.each(g(a).transformCache, function(a) {
                        /^translate/i.test(a) ? a = "translate" : /^scale/i.test(a) ? a = "scale" : /^rotate/i.test(a) && (a = "rotate"),
                        d[a] && (c += a + "(" + d[a].join(" ") + ") ",
                        delete d[a])
                    })
                } else {
                    var e, f;
                    m.each(g(a).transformCache, function(b) {
                        return e = g(a).transformCache[b],
                        "transformPerspective" === b ? (f = e,
                        !0) : (9 === n && "rotateZ" === b && (b = "rotate"),
                        void (c += b + e + " "))
                    }),
                    f && (c = "perspective" + f + " " + c)
                }
                v.setPropertyValue(a, "transform", c)
            }
        };
        v.Hooks.register(),
        v.Normalizations.register(),
        t.hook = function(a, b, c) {
            var e = d;
            return a = f(a),
            m.each(a, function(a, f) {
                if (g(f) === d && t.init(f),
                c === d)
                    e === d && (e = t.CSS.getPropertyValue(f, b));
                else {
                    var h = t.CSS.setPropertyValue(f, b, c);
                    "transform" === h[0] && t.CSS.flushTransformCache(f),
                    e = h
                }
            }),
            e
        }
        ;
        var w = function() {
            function a() {
                return h ? B.promise || null : i
            }
            function e() {
                function a(a) {
                    function l(a, b) {
                        var c = d
                          , e = d
                          , g = d;
                        return p.isArray(a) ? (c = a[0],
                        !p.isArray(a[1]) && /^[\d-]/.test(a[1]) || p.isFunction(a[1]) || v.RegEx.isHex.test(a[1]) ? g = a[1] : (p.isString(a[1]) && !v.RegEx.isHex.test(a[1]) || p.isArray(a[1])) && (e = b ? a[1] : j(a[1], h.duration),
                        a[2] !== d && (g = a[2]))) : c = a,
                        b || (e = e || h.easing),
                        p.isFunction(c) && (c = c.call(f, y, x)),
                        p.isFunction(g) && (g = g.call(f, y, x)),
                        [c || 0, e, g]
                    }
                    function n(a, b) {
                        var c, d;
                        return d = (b || "0").toString().toLowerCase().replace(/[%A-z]+$/, function(a) {
                            return c = a,
                            ""
                        }),
                        c || (c = v.Values.getUnitType(a)),
                        [d, c]
                    }
                    function r() {
                        var a = {
                            myParent: f.parentNode || c.body,
                            position: v.getPropertyValue(f, "position"),
                            fontSize: v.getPropertyValue(f, "fontSize")
                        }
                          , d = a.position === I.lastPosition && a.myParent === I.lastParent
                          , e = a.fontSize === I.lastFontSize;
                        I.lastParent = a.myParent,
                        I.lastPosition = a.position,
                        I.lastFontSize = a.fontSize;
                        var h = 100
                          , i = {};
                        if (e && d)
                            i.emToPx = I.lastEmToPx,
                            i.percentToPxWidth = I.lastPercentToPxWidth,
                            i.percentToPxHeight = I.lastPercentToPxHeight;
                        else {
                            var j = g(f).isSVG ? c.createElementNS("http://www.w3.org/2000/svg", "rect") : c.createElement("div");
                            t.init(j),
                            a.myParent.appendChild(j),
                            m.each(["overflow", "overflowX", "overflowY"], function(a, b) {
                                t.CSS.setPropertyValue(j, b, "hidden")
                            }),
                            t.CSS.setPropertyValue(j, "position", a.position),
                            t.CSS.setPropertyValue(j, "fontSize", a.fontSize),
                            t.CSS.setPropertyValue(j, "boxSizing", "content-box"),
                            m.each(["minWidth", "maxWidth", "width", "minHeight", "maxHeight", "height"], function(a, b) {
                                t.CSS.setPropertyValue(j, b, h + "%")
                            }),
                            t.CSS.setPropertyValue(j, "paddingLeft", h + "em"),
                            i.percentToPxWidth = I.lastPercentToPxWidth = (parseFloat(v.getPropertyValue(j, "width", null, !0)) || 1) / h,
                            i.percentToPxHeight = I.lastPercentToPxHeight = (parseFloat(v.getPropertyValue(j, "height", null, !0)) || 1) / h,
                            i.emToPx = I.lastEmToPx = (parseFloat(v.getPropertyValue(j, "paddingLeft")) || 1) / h,
                            a.myParent.removeChild(j)
                        }
                        return null === I.remToPx && (I.remToPx = parseFloat(v.getPropertyValue(c.body, "fontSize")) || 16),
                        null === I.vwToPx && (I.vwToPx = parseFloat(b.innerWidth) / 100,
                        I.vhToPx = parseFloat(b.innerHeight) / 100),
                        i.remToPx = I.remToPx,
                        i.vwToPx = I.vwToPx,
                        i.vhToPx = I.vhToPx,
                        t.debug >= 1 && console.log("Unit ratios: " + JSON.stringify(i), f),
                        i
                    }
                    if (h.begin && 0 === y)
                        try {
                            h.begin.call(o, o)
                        } catch (u) {
                            setTimeout(function() {
                                throw u
                            }, 1)
                        }
                    if ("scroll" === C) {
                        var w, z, A, D = /^x$/i.test(h.axis) ? "Left" : "Top", E = parseFloat(h.offset) || 0;
                        h.container ? p.isWrapped(h.container) || p.isNode(h.container) ? (h.container = h.container[0] || h.container,
                        w = h.container["scroll" + D],
                        A = w + m(f).position()[D.toLowerCase()] + E) : h.container = null : (w = t.State.scrollAnchor[t.State["scrollProperty" + D]],
                        z = t.State.scrollAnchor[t.State["scrollProperty" + ("Left" === D ? "Top" : "Left")]],
                        A = m(f).offset()[D.toLowerCase()] + E),
                        i = {
                            scroll: {
                                rootPropertyValue: !1,
                                startValue: w,
                                currentValue: w,
                                endValue: A,
                                unitType: "",
                                easing: h.easing,
                                scrollData: {
                                    container: h.container,
                                    direction: D,
                                    alternateValue: z
                                }
                            },
                            element: f
                        },
                        t.debug && console.log("tweensContainer (scroll): ", i.scroll, f)
                    } else if ("reverse" === C) {
                        if (!g(f).tweensContainer)
                            return void m.dequeue(f, h.queue);
                        "none" === g(f).opts.display && (g(f).opts.display = "auto"),
                        "hidden" === g(f).opts.visibility && (g(f).opts.visibility = "visible"),
                        g(f).opts.loop = !1,
                        g(f).opts.begin = null,
                        g(f).opts.complete = null,
                        s.easing || delete h.easing,
                        s.duration || delete h.duration,
                        h = m.extend({}, g(f).opts, h);
                        var F = m.extend(!0, {}, g(f).tweensContainer);
                        for (var G in F)
                            if ("element" !== G) {
                                var H = F[G].startValue;
                                F[G].startValue = F[G].currentValue = F[G].endValue,
                                F[G].endValue = H,
                                p.isEmptyObject(s) || (F[G].easing = h.easing),
                                t.debug && console.log("reverse tweensContainer (" + G + "): " + JSON.stringify(F[G]), f)
                            }
                        i = F
                    } else if ("start" === C) {
                        var F;
                        g(f).tweensContainer && g(f).isAnimating === !0 && (F = g(f).tweensContainer),
                        m.each(q, function(a, b) {
                            if (RegExp("^" + v.Lists.colors.join("$|^") + "$").test(a)) {
                                var c = l(b, !0)
                                  , e = c[0]
                                  , f = c[1]
                                  , g = c[2];
                                if (v.RegEx.isHex.test(e)) {
                                    for (var h = ["Red", "Green", "Blue"], i = v.Values.hexToRgb(e), j = g ? v.Values.hexToRgb(g) : d, k = 0; k < h.length; k++) {
                                        var m = [i[k]];
                                        f && m.push(f),
                                        j !== d && m.push(j[k]),
                                        q[a + h[k]] = m
                                    }
                                    delete q[a]
                                }
                            }
                        });
                        for (var K in q) {
                            var L = l(q[K])
                              , M = L[0]
                              , N = L[1]
                              , O = L[2];
                            K = v.Names.camelCase(K);
                            var P = v.Hooks.getRoot(K)
                              , Q = !1;
                            if (g(f).isSVG || "tween" === P || v.Names.prefixCheck(P)[1] !== !1 || v.Normalizations.registered[P] !== d) {
                                (h.display !== d && null !== h.display && "none" !== h.display || h.visibility !== d && "hidden" !== h.visibility) && /opacity|filter/.test(K) && !O && 0 !== M && (O = 0),
                                h._cacheValues && F && F[K] ? (O === d && (O = F[K].endValue + F[K].unitType),
                                Q = g(f).rootPropertyValueCache[P]) : v.Hooks.registered[K] ? O === d ? (Q = v.getPropertyValue(f, P),
                                O = v.getPropertyValue(f, K, Q)) : Q = v.Hooks.templates[P][1] : O === d && (O = v.getPropertyValue(f, K));
                                var R, S, T, U = !1;
                                if (R = n(K, O),
                                O = R[0],
                                T = R[1],
                                R = n(K, M),
                                M = R[0].replace(/^([+-\/*])=/, function(a, b) {
                                    return U = b,
                                    ""
                                }),
                                S = R[1],
                                O = parseFloat(O) || 0,
                                M = parseFloat(M) || 0,
                                "%" === S && (/^(fontSize|lineHeight)$/.test(K) ? (M /= 100,
                                S = "em") : /^scale/.test(K) ? (M /= 100,
                                S = "") : /(Red|Green|Blue)$/i.test(K) && (M = M / 100 * 255,
                                S = "")),
                                /[\/*]/.test(U))
                                    S = T;
                                else if (T !== S && 0 !== O)
                                    if (0 === M)
                                        S = T;
                                    else {
                                        e = e || r();
                                        var V = /margin|padding|left|right|width|text|word|letter/i.test(K) || /X$/.test(K) || "x" === K ? "x" : "y";
                                        switch (T) {
                                        case "%":
                                            O *= "x" === V ? e.percentToPxWidth : e.percentToPxHeight;
                                            break;
                                        case "px":
                                            break;
                                        default:
                                            O *= e[T + "ToPx"]
                                        }
                                        switch (S) {
                                        case "%":
                                            O *= 1 / ("x" === V ? e.percentToPxWidth : e.percentToPxHeight);
                                            break;
                                        case "px":
                                            break;
                                        default:
                                            O *= 1 / e[S + "ToPx"]
                                        }
                                    }
                                switch (U) {
                                case "+":
                                    M = O + M;
                                    break;
                                case "-":
                                    M = O - M;
                                    break;
                                case "*":
                                    M = O * M;
                                    break;
                                case "/":
                                    M = O / M
                                }
                                i[K] = {
                                    rootPropertyValue: Q,
                                    startValue: O,
                                    currentValue: O,
                                    endValue: M,
                                    unitType: S,
                                    easing: N
                                },
                                t.debug && console.log("tweensContainer (" + K + "): " + JSON.stringify(i[K]), f)
                            } else
                                t.debug && console.log("Skipping [" + P + "] due to a lack of browser support.")
                        }
                        i.element = f
                    }
                    i.element && (v.Values.addClass(f, "velocity-animating"),
                    J.push(i),
                    "" === h.queue && (g(f).tweensContainer = i,
                    g(f).opts = h),
                    g(f).isAnimating = !0,
                    y === x - 1 ? (t.State.calls.push([J, o, h, null, B.resolver]),
                    t.State.isTicking === !1 && (t.State.isTicking = !0,
                    k())) : y++)
                }
                var e, f = this, h = m.extend({}, t.defaults, s), i = {};
                switch (g(f) === d && t.init(f),
                parseFloat(h.delay) && h.queue !== !1 && m.queue(f, h.queue, function(a) {
                    t.velocityQueueEntryFlag = !0,
                    g(f).delayTimer = {
                        setTimeout: setTimeout(a, parseFloat(h.delay)),
                        next: a
                    }
                }),
                h.duration.toString().toLowerCase()) {
                case "fast":
                    h.duration = 200;
                    break;
                case "normal":
                    h.duration = r;
                    break;
                case "slow":
                    h.duration = 600;
                    break;
                default:
                    h.duration = parseFloat(h.duration) || 1
                }
                t.mock !== !1 && (t.mock === !0 ? h.duration = h.delay = 1 : (h.duration *= parseFloat(t.mock) || 1,
                h.delay *= parseFloat(t.mock) || 1)),
                h.easing = j(h.easing, h.duration),
                h.begin && !p.isFunction(h.begin) && (h.begin = null),
                h.progress && !p.isFunction(h.progress) && (h.progress = null),
                h.complete && !p.isFunction(h.complete) && (h.complete = null),
                h.display !== d && null !== h.display && (h.display = h.display.toString().toLowerCase(),
                "auto" === h.display && (h.display = t.CSS.Values.getDisplayType(f))),
                h.visibility !== d && null !== h.visibility && (h.visibility = h.visibility.toString().toLowerCase()),
                h.mobileHA = h.mobileHA && t.State.isMobile && !t.State.isGingerbread,
                h.queue === !1 ? h.delay ? setTimeout(a, h.delay) : a() : m.queue(f, h.queue, function(b, c) {
                    return c === !0 ? (B.promise && B.resolver(o),
                    !0) : (t.velocityQueueEntryFlag = !0,
                    void a(b))
                }),
                "" !== h.queue && "fx" !== h.queue || "inprogress" === m.queue(f)[0] || m.dequeue(f)
            }
            var h, i, n, o, q, s, u = arguments[0] && (arguments[0].p || m.isPlainObject(arguments[0].properties) && !arguments[0].properties.names || p.isString(arguments[0].properties));
            if (p.isWrapped(this) ? (h = !1,
            n = 0,
            o = this,
            i = this) : (h = !0,
            n = 1,
            o = u ? arguments[0].elements || arguments[0].e : arguments[0]),
            o = f(o)) {
                u ? (q = arguments[0].properties || arguments[0].p,
                s = arguments[0].options || arguments[0].o) : (q = arguments[n],
                s = arguments[n + 1]);
                var x = o.length
                  , y = 0;
                if (!/^(stop|finish)$/i.test(q) && !m.isPlainObject(s)) {
                    var z = n + 1;
                    s = {};
                    for (var A = z; A < arguments.length; A++)
                        p.isArray(arguments[A]) || !/^(fast|normal|slow)$/i.test(arguments[A]) && !/^\d/.test(arguments[A]) ? p.isString(arguments[A]) || p.isArray(arguments[A]) ? s.easing = arguments[A] : p.isFunction(arguments[A]) && (s.complete = arguments[A]) : s.duration = arguments[A]
                }
                var B = {
                    promise: null,
                    resolver: null,
                    rejecter: null
                };
                h && t.Promise && (B.promise = new t.Promise(function(a, b) {
                    B.resolver = a,
                    B.rejecter = b
                }
                ));
                var C;
                switch (q) {
                case "scroll":
                    C = "scroll";
                    break;
                case "reverse":
                    C = "reverse";
                    break;
                case "finish":
                case "stop":
                    m.each(o, function(a, b) {
                        g(b) && g(b).delayTimer && (clearTimeout(g(b).delayTimer.setTimeout),
                        g(b).delayTimer.next && g(b).delayTimer.next(),
                        delete g(b).delayTimer)
                    });
                    var D = [];
                    return m.each(t.State.calls, function(a, b) {
                        b && m.each(b[1], function(c, e) {
                            var f = s === d ? "" : s;
                            return f !== !0 && b[2].queue !== f && (s !== d || b[2].queue !== !1) || void m.each(o, function(c, d) {
                                d === e && ((s === !0 || p.isString(s)) && (m.each(m.queue(d, p.isString(s) ? s : ""), function(a, b) {
                                    p.isFunction(b) && b(null, !0)
                                }),
                                m.queue(d, p.isString(s) ? s : "", [])),
                                "stop" === q ? (g(d) && g(d).tweensContainer && f !== !1 && m.each(g(d).tweensContainer, function(a, b) {
                                    b.endValue = b.currentValue
                                }),
                                D.push(a)) : "finish" === q && (b[2].duration = 1))
                            })
                        })
                    }),
                    "stop" === q && (m.each(D, function(a, b) {
                        l(b, !0)
                    }),
                    B.promise && B.resolver(o)),
                    a();
                default:
                    if (!m.isPlainObject(q) || p.isEmptyObject(q)) {
                        if (p.isString(q) && t.Redirects[q]) {
                            var E = m.extend({}, s)
                              , F = E.duration
                              , G = E.delay || 0;
                            return E.backwards === !0 && (o = m.extend(!0, [], o).reverse()),
                            m.each(o, function(a, b) {
                                parseFloat(E.stagger) ? E.delay = G + parseFloat(E.stagger) * a : p.isFunction(E.stagger) && (E.delay = G + E.stagger.call(b, a, x)),
                                E.drag && (E.duration = parseFloat(F) || (/^(callout|transition)/.test(q) ? 1e3 : r),
                                E.duration = Math.max(E.duration * (E.backwards ? 1 - a / x : (a + 1) / x), .75 * E.duration, 200)),
                                t.Redirects[q].call(b, b, E || {}, a, x, o, B.promise ? B : d)
                            }),
                            a()
                        }
                        var H = "Velocity: First argument (" + q + ") was not a property map, a known action, or a registered redirect. Aborting.";
                        return B.promise ? B.rejecter(new Error(H)) : console.log(H),
                        a()
                    }
                    C = "start"
                }
                var I = {
                    lastParent: null,
                    lastPosition: null,
                    lastFontSize: null,
                    lastPercentToPxWidth: null,
                    lastPercentToPxHeight: null,
                    lastEmToPx: null,
                    remToPx: null,
                    vwToPx: null,
                    vhToPx: null
                }
                  , J = [];
                m.each(o, function(a, b) {
                    p.isNode(b) && e.call(b)
                });
                var K, E = m.extend({}, t.defaults, s);
                if (E.loop = parseInt(E.loop),
                K = 2 * E.loop - 1,
                E.loop)
                    for (var L = 0; K > L; L++) {
                        var M = {
                            delay: E.delay,
                            progress: E.progress
                        };
                        L === K - 1 && (M.display = E.display,
                        M.visibility = E.visibility,
                        M.complete = E.complete),
                        w(o, "reverse", M)
                    }
                return a()
            }
        };
        t = m.extend(w, t),
        t.animate = w;
        var x = b.requestAnimationFrame || o;
        return t.State.isMobile || c.hidden === d || c.addEventListener("visibilitychange", function() {
            c.hidden ? (x = function(a) {
                return setTimeout(function() {
                    a(!0)
                }, 16)
            }
            ,
            k()) : x = b.requestAnimationFrame || o
        }),
        a.Velocity = t,
        a !== b && (a.fn.velocity = w,
        a.fn.velocity.defaults = t.defaults),
        m.each(["Down", "Up"], function(a, b) {
            t.Redirects["slide" + b] = function(a, c, e, f, g, h) {
                var i = m.extend({}, c)
                  , j = i.begin
                  , k = i.complete
                  , l = {
                    height: "",
                    marginTop: "",
                    marginBottom: "",
                    paddingTop: "",
                    paddingBottom: ""
                }
                  , n = {};
                i.display === d && (i.display = "Down" === b ? "inline" === t.CSS.Values.getDisplayType(a) ? "inline-block" : "block" : "none"),
                i.begin = function() {
                    j && j.call(g, g);
                    for (var c in l) {
                        n[c] = a.style[c];
                        var d = t.CSS.getPropertyValue(a, c);
                        l[c] = "Down" === b ? [d, 0] : [0, d]
                    }
                    n.overflow = a.style.overflow,
                    a.style.overflow = "hidden"
                }
                ,
                i.complete = function() {
                    for (var b in n)
                        a.style[b] = n[b];
                    k && k.call(g, g),
                    h && h.resolver(g)
                }
                ,
                t(a, l, i)
            }
        }),
        m.each(["In", "Out"], function(a, b) {
            t.Redirects["fade" + b] = function(a, c, e, f, g, h) {
                var i = m.extend({}, c)
                  , j = {
                    opacity: "In" === b ? 1 : 0
                }
                  , k = i.complete;
                i.complete = e !== f - 1 ? i.begin = null : function() {
                    k && k.call(g, g),
                    h && h.resolver(g)
                }
                ,
                i.display === d && (i.display = "In" === b ? "auto" : "none"),
                t(this, j, i)
            }
        }),
        t
    }(window.jQuery || window.Zepto || window, window, document)
})),
!function(a, b, c, d) {
    "use strict";
    function e(a, b, c) {
        return setTimeout(k(a, c), b)
    }
    function f(a, b, c) {
        return !!Array.isArray(a) && (g(a, c[b], c),
        !0)
    }
    function g(a, b, c) {
        var e;
        if (a)
            if (a.forEach)
                a.forEach(b, c);
            else if (a.length !== d)
                for (e = 0; e < a.length; )
                    b.call(c, a[e], e, a),
                    e++;
            else
                for (e in a)
                    a.hasOwnProperty(e) && b.call(c, a[e], e, a)
    }
    function h(a, b, c) {
        for (var e = Object.keys(b), f = 0; f < e.length; )
            (!c || c && a[e[f]] === d) && (a[e[f]] = b[e[f]]),
            f++;
        return a
    }
    function i(a, b) {
        return h(a, b, !0)
    }
    function j(a, b, c) {
        var d, e = b.prototype;
        d = a.prototype = Object.create(e),
        d.constructor = a,
        d._super = e,
        c && h(d, c)
    }
    function k(a, b) {
        return function() {
            return a.apply(b, arguments)
        }
    }
    function l(a, b) {
        return typeof a == ka ? a.apply(b ? b[0] || d : d, b) : a
    }
    function m(a, b) {
        return a === d ? b : a
    }
    function n(a, b, c) {
        g(r(b), function(b) {
            a.addEventListener(b, c, !1)
        })
    }
    function o(a, b, c) {
        g(r(b), function(b) {
            a.removeEventListener(b, c, !1)
        })
    }
    function p(a, b) {
        for (; a; ) {
            if (a == b)
                return !0;
            a = a.parentNode
        }
        return !1
    }
    function q(a, b) {
        return a.indexOf(b) > -1
    }
    function r(a) {
        return a.trim().split(/\s+/g)
    }
    function s(a, b, c) {
        if (a.indexOf && !c)
            return a.indexOf(b);
        for (var d = 0; d < a.length; ) {
            if (c && a[d][c] == b || !c && a[d] === b)
                return d;
            d++
        }
        return -1
    }
    function t(a) {
        return Array.prototype.slice.call(a, 0)
    }
    function u(a, b, c) {
        for (var d = [], e = [], f = 0; f < a.length; ) {
            var g = b ? a[f][b] : a[f];
            s(e, g) < 0 && d.push(a[f]),
            e[f] = g,
            f++
        }
        return c && (d = b ? d.sort(function(a, c) {
            return a[b] > c[b]
        }) : d.sort()),
        d
    }
    function v(a, b) {
        for (var c, e, f = b[0].toUpperCase() + b.slice(1), g = 0; g < ia.length; ) {
            if (c = ia[g],
            e = c ? c + f : b,
            e in a)
                return e;
            g++
        }
        return d
    }
    function w() {
        return oa++
    }
    function x(a) {
        var b = a.ownerDocument;
        return b.defaultView || b.parentWindow
    }
    function y(a, b) {
        var c = this;
        this.manager = a,
        this.callback = b,
        this.element = a.element,
        this.target = a.options.inputTarget,
        this.domHandler = function(b) {
            l(a.options.enable, [a]) && c.handler(b)
        }
        ,
        this.init()
    }
    function z(a) {
        var b, c = a.options.inputClass;
        return new (b = c ? c : ra ? N : sa ? Q : qa ? S : M)(a,A)
    }
    function A(a, b, c) {
        var d = c.pointers.length
          , e = c.changedPointers.length
          , f = b & ya && 0 === d - e
          , g = b & (Aa | Ba) && 0 === d - e;
        c.isFirst = !!f,
        c.isFinal = !!g,
        f && (a.session = {}),
        c.eventType = b,
        B(a, c),
        a.emit("hammer.input", c),
        a.recognize(c),
        a.session.prevInput = c
    }
    function B(a, b) {
        var c = a.session
          , d = b.pointers
          , e = d.length;
        c.firstInput || (c.firstInput = E(b)),
        e > 1 && !c.firstMultiple ? c.firstMultiple = E(b) : 1 === e && (c.firstMultiple = !1);
        var f = c.firstInput
          , g = c.firstMultiple
          , h = g ? g.center : f.center
          , i = b.center = F(d);
        b.timeStamp = na(),
        b.deltaTime = b.timeStamp - f.timeStamp,
        b.angle = J(h, i),
        b.distance = I(h, i),
        C(c, b),
        b.offsetDirection = H(b.deltaX, b.deltaY),
        b.scale = g ? L(g.pointers, d) : 1,
        b.rotation = g ? K(g.pointers, d) : 0,
        D(c, b);
        var j = a.element;
        p(b.srcEvent.target, j) && (j = b.srcEvent.target),
        b.target = j
    }
    function C(a, b) {
        var c = b.center
          , d = a.offsetDelta || {}
          , e = a.prevDelta || {}
          , f = a.prevInput || {};
        (b.eventType === ya || f.eventType === Aa) && (e = a.prevDelta = {
            x: f.deltaX || 0,
            y: f.deltaY || 0
        },
        d = a.offsetDelta = {
            x: c.x,
            y: c.y
        }),
        b.deltaX = e.x + (c.x - d.x),
        b.deltaY = e.y + (c.y - d.y)
    }
    function D(a, b) {
        var c, e, f, g, h = a.lastInterval || b, i = b.timeStamp - h.timeStamp;
        if (b.eventType != Ba && (i > xa || h.velocity === d)) {
            var j = h.deltaX - b.deltaX
              , k = h.deltaY - b.deltaY
              , l = G(i, j, k);
            e = l.x,
            f = l.y,
            c = ma(l.x) > ma(l.y) ? l.x : l.y,
            g = H(j, k),
            a.lastInterval = b
        } else
            c = h.velocity,
            e = h.velocityX,
            f = h.velocityY,
            g = h.direction;
        b.velocity = c,
        b.velocityX = e,
        b.velocityY = f,
        b.direction = g
    }
    function E(a) {
        for (var b = [], c = 0; c < a.pointers.length; )
            b[c] = {
                clientX: la(a.pointers[c].clientX),
                clientY: la(a.pointers[c].clientY)
            },
            c++;
        return {
            timeStamp: na(),
            pointers: b,
            center: F(b),
            deltaX: a.deltaX,
            deltaY: a.deltaY
        }
    }
    function F(a) {
        var b = a.length;
        if (1 === b)
            return {
                x: la(a[0].clientX),
                y: la(a[0].clientY)
            };
        for (var c = 0, d = 0, e = 0; b > e; )
            c += a[e].clientX,
            d += a[e].clientY,
            e++;
        return {
            x: la(c / b),
            y: la(d / b)
        }
    }
    function G(a, b, c) {
        return {
            x: b / a || 0,
            y: c / a || 0
        }
    }
    function H(a, b) {
        return a === b ? Ca : ma(a) >= ma(b) ? a > 0 ? Da : Ea : b > 0 ? Fa : Ga
    }
    function I(a, b, c) {
        c || (c = Ka);
        var d = b[c[0]] - a[c[0]]
          , e = b[c[1]] - a[c[1]];
        return Math.sqrt(d * d + e * e)
    }
    function J(a, b, c) {
        c || (c = Ka);
        var d = b[c[0]] - a[c[0]]
          , e = b[c[1]] - a[c[1]];
        return 180 * Math.atan2(e, d) / Math.PI
    }
    function K(a, b) {
        return J(b[1], b[0], La) - J(a[1], a[0], La)
    }
    function L(a, b) {
        return I(b[0], b[1], La) / I(a[0], a[1], La)
    }
    function M() {
        this.evEl = Na,
        this.evWin = Oa,
        this.allow = !0,
        this.pressed = !1,
        y.apply(this, arguments)
    }
    function N() {
        this.evEl = Ra,
        this.evWin = Sa,
        y.apply(this, arguments),
        this.store = this.manager.session.pointerEvents = []
    }
    function O() {
        this.evTarget = Ua,
        this.evWin = Va,
        this.started = !1,
        y.apply(this, arguments)
    }
    function P(a, b) {
        var c = t(a.touches)
          , d = t(a.changedTouches);
        return b & (Aa | Ba) && (c = u(c.concat(d), "identifier", !0)),
        [c, d]
    }
    function Q() {
        this.evTarget = Xa,
        this.targetIds = {},
        y.apply(this, arguments)
    }
    function R(a, b) {
        var c = t(a.touches)
          , d = this.targetIds;
        if (b & (ya | za) && 1 === c.length)
            return d[c[0].identifier] = !0,
            [c, c];
        var e, f, g = t(a.changedTouches), h = [], i = this.target;
        if (f = c.filter(function(a) {
            return p(a.target, i)
        }),
        b === ya)
            for (e = 0; e < f.length; )
                d[f[e].identifier] = !0,
                e++;
        for (e = 0; e < g.length; )
            d[g[e].identifier] && h.push(g[e]),
            b & (Aa | Ba) && delete d[g[e].identifier],
            e++;
        return h.length ? [u(f.concat(h), "identifier", !0), h] : void 0
    }
    function S() {
        y.apply(this, arguments);
        var a = k(this.handler, this);
        this.touch = new Q(this.manager,a),
        this.mouse = new M(this.manager,a)
    }
    function T(a, b) {
        this.manager = a,
        this.set(b)
    }
    function U(a) {
        if (q(a, bb))
            return bb;
        var b = q(a, cb)
          , c = q(a, db);
        return b && c ? cb + " " + db : b || c ? b ? cb : db : q(a, ab) ? ab : _a
    }
    function V(a) {
        this.id = w(),
        this.manager = null,
        this.options = i(a || {}, this.defaults),
        this.options.enable = m(this.options.enable, !0),
        this.state = eb,
        this.simultaneous = {},
        this.requireFail = []
    }
    function W(a) {
        return a & jb ? "cancel" : a & hb ? "end" : a & gb ? "move" : a & fb ? "start" : ""
    }
    function X(a) {
        return a == Ga ? "down" : a == Fa ? "up" : a == Da ? "left" : a == Ea ? "right" : ""
    }
    function Y(a, b) {
        var c = b.manager;
        return c ? c.get(a) : a
    }
    function Z() {
        V.apply(this, arguments)
    }
    function $() {
        Z.apply(this, arguments),
        this.pX = null,
        this.pY = null
    }
    function _() {
        Z.apply(this, arguments)
    }
    function aa() {
        V.apply(this, arguments),
        this._timer = null,
        this._input = null
    }
    function ba() {
        Z.apply(this, arguments)
    }
    function ca() {
        Z.apply(this, arguments)
    }
    function da() {
        V.apply(this, arguments),
        this.pTime = !1,
        this.pCenter = !1,
        this._timer = null,
        this._input = null,
        this.count = 0
    }
    function ea(a, b) {
        return b = b || {},
        b.recognizers = m(b.recognizers, ea.defaults.preset),
        new fa(a,b)
    }
    function fa(a, b) {
        b = b || {},
        this.options = i(b, ea.defaults),
        this.options.inputTarget = this.options.inputTarget || a,
        this.handlers = {},
        this.session = {},
        this.recognizers = [],
        this.element = a,
        this.input = z(this),
        this.touchAction = new T(this,this.options.touchAction),
        ga(this, !0),
        g(b.recognizers, function(a) {
            var b = this.add(new a[0](a[1]));
            a[2] && b.recognizeWith(a[2]),
            a[3] && b.requireFailure(a[3])
        }, this)
    }
    function ga(a, b) {
        var c = a.element;
        g(a.options.cssProps, function(a, d) {
            c.style[v(c.style, d)] = b ? a : ""
        })
    }
    function ha(a, c) {
        var d = b.createEvent("Event");
        d.initEvent(a, !0, !0),
        d.gesture = c,
        c.target.dispatchEvent(d)
    }
    var ia = ["", "webkit", "moz", "MS", "ms", "o"]
      , ja = b.createElement("div")
      , ka = "function"
      , la = Math.round
      , ma = Math.abs
      , na = Date.now
      , oa = 1
      , pa = /mobile|tablet|ip(ad|hone|od)|android/i
      , qa = "ontouchstart"in a
      , ra = v(a, "PointerEvent") !== d
      , sa = qa && pa.test(navigator.userAgent)
      , ta = "touch"
      , ua = "pen"
      , va = "mouse"
      , wa = "kinect"
      , xa = 25
      , ya = 1
      , za = 2
      , Aa = 4
      , Ba = 8
      , Ca = 1
      , Da = 2
      , Ea = 4
      , Fa = 8
      , Ga = 16
      , Ha = Da | Ea
      , Ia = Fa | Ga
      , Ja = Ha | Ia
      , Ka = ["x", "y"]
      , La = ["clientX", "clientY"];
    y.prototype = {
        handler: function() {},
        init: function() {
            this.evEl && n(this.element, this.evEl, this.domHandler),
            this.evTarget && n(this.target, this.evTarget, this.domHandler),
            this.evWin && n(x(this.element), this.evWin, this.domHandler)
        },
        destroy: function() {
            this.evEl && o(this.element, this.evEl, this.domHandler),
            this.evTarget && o(this.target, this.evTarget, this.domHandler),
            this.evWin && o(x(this.element), this.evWin, this.domHandler)
        }
    };
    var Ma = {
        mousedown: ya,
        mousemove: za,
        mouseup: Aa
    }
      , Na = "mousedown"
      , Oa = "mousemove mouseup";
    j(M, y, {
        handler: function(a) {
            var b = Ma[a.type];
            b & ya && 0 === a.button && (this.pressed = !0),
            b & za && 1 !== a.which && (b = Aa),
            this.pressed && this.allow && (b & Aa && (this.pressed = !1),
            this.callback(this.manager, b, {
                pointers: [a],
                changedPointers: [a],
                pointerType: va,
                srcEvent: a
            }))
        }
    });
    var Pa = {
        pointerdown: ya,
        pointermove: za,
        pointerup: Aa,
        pointercancel: Ba,
        pointerout: Ba
    }
      , Qa = {
        2: ta,
        3: ua,
        4: va,
        5: wa
    }
      , Ra = "pointerdown"
      , Sa = "pointermove pointerup pointercancel";
    a.MSPointerEvent && (Ra = "MSPointerDown",
    Sa = "MSPointerMove MSPointerUp MSPointerCancel"),
    j(N, y, {
        handler: function(a) {
            var b = this.store
              , c = !1
              , d = a.type.toLowerCase().replace("ms", "")
              , e = Pa[d]
              , f = Qa[a.pointerType] || a.pointerType
              , g = f == ta
              , h = s(b, a.pointerId, "pointerId");
            e & ya && (0 === a.button || g) ? 0 > h && (b.push(a),
            h = b.length - 1) : e & (Aa | Ba) && (c = !0),
            0 > h || (b[h] = a,
            this.callback(this.manager, e, {
                pointers: b,
                changedPointers: [a],
                pointerType: f,
                srcEvent: a
            }),
            c && b.splice(h, 1))
        }
    });
    var Ta = {
        touchstart: ya,
        touchmove: za,
        touchend: Aa,
        touchcancel: Ba
    }
      , Ua = "touchstart"
      , Va = "touchstart touchmove touchend touchcancel";
    j(O, y, {
        handler: function(a) {
            var b = Ta[a.type];
            if (b === ya && (this.started = !0),
            this.started) {
                var c = P.call(this, a, b);
                b & (Aa | Ba) && 0 === c[0].length - c[1].length && (this.started = !1),
                this.callback(this.manager, b, {
                    pointers: c[0],
                    changedPointers: c[1],
                    pointerType: ta,
                    srcEvent: a
                })
            }
        }
    });
    var Wa = {
        touchstart: ya,
        touchmove: za,
        touchend: Aa,
        touchcancel: Ba
    }
      , Xa = "touchstart touchmove touchend touchcancel";
    j(Q, y, {
        handler: function(a) {
            var b = Wa[a.type]
              , c = R.call(this, a, b);
            c && this.callback(this.manager, b, {
                pointers: c[0],
                changedPointers: c[1],
                pointerType: ta,
                srcEvent: a
            })
        }
    }),
    j(S, y, {
        handler: function(a, b, c) {
            var d = c.pointerType == ta
              , e = c.pointerType == va;
            if (d)
                this.mouse.allow = !1;
            else if (e && !this.mouse.allow)
                return;
            b & (Aa | Ba) && (this.mouse.allow = !0),
            this.callback(a, b, c)
        },
        destroy: function() {
            this.touch.destroy(),
            this.mouse.destroy()
        }
    });
    var Ya = v(ja.style, "touchAction")
      , Za = Ya !== d
      , $a = "compute"
      , _a = "auto"
      , ab = "manipulation"
      , bb = "none"
      , cb = "pan-x"
      , db = "pan-y";
    T.prototype = {
        set: function(a) {
            a == $a && (a = this.compute()),
            Za && (this.manager.element.style[Ya] = a),
            this.actions = a.toLowerCase().trim()
        },
        update: function() {
            this.set(this.manager.options.touchAction)
        },
        compute: function() {
            var a = [];
            return g(this.manager.recognizers, function(b) {
                l(b.options.enable, [b]) && (a = a.concat(b.getTouchAction()))
            }),
            U(a.join(" "))
        },
        preventDefaults: function(a) {
            if (!Za) {
                var b = a.srcEvent
                  , c = a.offsetDirection;
                if (this.manager.session.prevented)
                    return void b.preventDefault();
                var d = this.actions
                  , e = q(d, bb)
                  , f = q(d, db)
                  , g = q(d, cb);
                return e || f && c & Ha || g && c & Ia ? this.preventSrc(b) : void 0
            }
        },
        preventSrc: function(a) {
            this.manager.session.prevented = !0,
            a.preventDefault()
        }
    };
    var eb = 1
      , fb = 2
      , gb = 4
      , hb = 8
      , ib = hb
      , jb = 16
      , kb = 32;
    V.prototype = {
        defaults: {},
        set: function(a) {
            return h(this.options, a),
            this.manager && this.manager.touchAction.update(),
            this
        },
        recognizeWith: function(a) {
            if (f(a, "recognizeWith", this))
                return this;
            var b = this.simultaneous;
            return a = Y(a, this),
            b[a.id] || (b[a.id] = a,
            a.recognizeWith(this)),
            this
        },
        dropRecognizeWith: function(a) {
            return f(a, "dropRecognizeWith", this) ? this : (a = Y(a, this),
            delete this.simultaneous[a.id],
            this)
        },
        requireFailure: function(a) {
            if (f(a, "requireFailure", this))
                return this;
            var b = this.requireFail;
            return a = Y(a, this),
            -1 === s(b, a) && (b.push(a),
            a.requireFailure(this)),
            this
        },
        dropRequireFailure: function(a) {
            if (f(a, "dropRequireFailure", this))
                return this;
            a = Y(a, this);
            var b = s(this.requireFail, a);
            return b > -1 && this.requireFail.splice(b, 1),
            this
        },
        hasRequireFailures: function() {
            return this.requireFail.length > 0
        },
        canRecognizeWith: function(a) {
            return !!this.simultaneous[a.id]
        },
        emit: function(a) {
            function b(b) {
                c.manager.emit(c.options.event + (b ? W(d) : ""), a)
            }
            var c = this
              , d = this.state;
            hb > d && b(!0),
            b(),
            d >= hb && b(!0)
        },
        tryEmit: function(a) {
            return this.canEmit() ? this.emit(a) : void (this.state = kb)
        },
        canEmit: function() {
            for (var a = 0; a < this.requireFail.length; ) {
                if (!(this.requireFail[a].state & (kb | eb)))
                    return !1;
                a++
            }
            return !0
        },
        recognize: function(a) {
            var b = h({}, a);
            return l(this.options.enable, [this, b]) ? (this.state & (ib | jb | kb) && (this.state = eb),
            this.state = this.process(b),
            void (this.state & (fb | gb | hb | jb) && this.tryEmit(b))) : (this.reset(),
            void (this.state = kb))
        },
        process: function() {},
        getTouchAction: function() {},
        reset: function() {}
    },
    j(Z, V, {
        defaults: {
            pointers: 1
        },
        attrTest: function(a) {
            var b = this.options.pointers;
            return 0 === b || a.pointers.length === b
        },
        process: function(a) {
            var b = this.state
              , c = a.eventType
              , d = b & (fb | gb)
              , e = this.attrTest(a);
            return d && (c & Ba || !e) ? b | jb : d || e ? c & Aa ? b | hb : b & fb ? b | gb : fb : kb
        }
    }),
    j($, Z, {
        defaults: {
            event: "pan",
            threshold: 10,
            pointers: 1,
            direction: Ja
        },
        getTouchAction: function() {
            var a = this.options.direction
              , b = [];
            return a & Ha && b.push(db),
            a & Ia && b.push(cb),
            b
        },
        directionTest: function(a) {
            var b = this.options
              , c = !0
              , d = a.distance
              , e = a.direction
              , f = a.deltaX
              , g = a.deltaY;
            return e & b.direction || (b.direction & Ha ? (e = 0 === f ? Ca : 0 > f ? Da : Ea,
            c = f != this.pX,
            d = Math.abs(a.deltaX)) : (e = 0 === g ? Ca : 0 > g ? Fa : Ga,
            c = g != this.pY,
            d = Math.abs(a.deltaY))),
            a.direction = e,
            c && d > b.threshold && e & b.direction
        },
        attrTest: function(a) {
            return Z.prototype.attrTest.call(this, a) && (this.state & fb || !(this.state & fb) && this.directionTest(a))
        },
        emit: function(a) {
            this.pX = a.deltaX,
            this.pY = a.deltaY;
            var b = X(a.direction);
            b && this.manager.emit(this.options.event + b, a),
            this._super.emit.call(this, a)
        }
    }),
    j(_, Z, {
        defaults: {
            event: "pinch",
            threshold: 0,
            pointers: 2
        },
        getTouchAction: function() {
            return [bb]
        },
        attrTest: function(a) {
            return this._super.attrTest.call(this, a) && (Math.abs(a.scale - 1) > this.options.threshold || this.state & fb)
        },
        emit: function(a) {
            if (this._super.emit.call(this, a),
            1 !== a.scale) {
                var b = a.scale < 1 ? "in" : "out";
                this.manager.emit(this.options.event + b, a)
            }
        }
    }),
    j(aa, V, {
        defaults: {
            event: "press",
            pointers: 1,
            time: 500,
            threshold: 5
        },
        getTouchAction: function() {
            return [_a]
        },
        process: function(a) {
            var b = this.options
              , c = a.pointers.length === b.pointers
              , d = a.distance < b.threshold
              , f = a.deltaTime > b.time;
            if (this._input = a,
            !d || !c || a.eventType & (Aa | Ba) && !f)
                this.reset();
            else if (a.eventType & ya)
                this.reset(),
                this._timer = e(function() {
                    this.state = ib,
                    this.tryEmit()
                }, b.time, this);
            else if (a.eventType & Aa)
                return ib;
            return kb
        },
        reset: function() {
            clearTimeout(this._timer)
        },
        emit: function(a) {
            this.state === ib && (a && a.eventType & Aa ? this.manager.emit(this.options.event + "up", a) : (this._input.timeStamp = na(),
            this.manager.emit(this.options.event, this._input)))
        }
    }),
    j(ba, Z, {
        defaults: {
            event: "rotate",
            threshold: 0,
            pointers: 2
        },
        getTouchAction: function() {
            return [bb]
        },
        attrTest: function(a) {
            return this._super.attrTest.call(this, a) && (Math.abs(a.rotation) > this.options.threshold || this.state & fb)
        }
    }),
    j(ca, Z, {
        defaults: {
            event: "swipe",
            threshold: 10,
            velocity: .65,
            direction: Ha | Ia,
            pointers: 1
        },
        getTouchAction: function() {
            return $.prototype.getTouchAction.call(this)
        },
        attrTest: function(a) {
            var b, c = this.options.direction;
            return c & (Ha | Ia) ? b = a.velocity : c & Ha ? b = a.velocityX : c & Ia && (b = a.velocityY),
            this._super.attrTest.call(this, a) && c & a.direction && a.distance > this.options.threshold && ma(b) > this.options.velocity && a.eventType & Aa
        },
        emit: function(a) {
            var b = X(a.direction);
            b && this.manager.emit(this.options.event + b, a),
            this.manager.emit(this.options.event, a)
        }
    }),
    j(da, V, {
        defaults: {
            event: "tap",
            pointers: 1,
            taps: 1,
            interval: 300,
            time: 250,
            threshold: 2,
            posThreshold: 10
        },
        getTouchAction: function() {
            return [ab]
        },
        process: function(a) {
            var b = this.options
              , c = a.pointers.length === b.pointers
              , d = a.distance < b.threshold
              , f = a.deltaTime < b.time;
            if (this.reset(),
            a.eventType & ya && 0 === this.count)
                return this.failTimeout();
            if (d && f && c) {
                if (a.eventType != Aa)
                    return this.failTimeout();
                var g = !this.pTime || a.timeStamp - this.pTime < b.interval
                  , h = !this.pCenter || I(this.pCenter, a.center) < b.posThreshold;
                this.pTime = a.timeStamp,
                this.pCenter = a.center,
                h && g ? this.count += 1 : this.count = 1,
                this._input = a;
                var i = this.count % b.taps;
                if (0 === i)
                    return this.hasRequireFailures() ? (this._timer = e(function() {
                        this.state = ib,
                        this.tryEmit()
                    }, b.interval, this),
                    fb) : ib
            }
            return kb
        },
        failTimeout: function() {
            return this._timer = e(function() {
                this.state = kb
            }, this.options.interval, this),
            kb
        },
        reset: function() {
            clearTimeout(this._timer)
        },
        emit: function() {
            this.state == ib && (this._input.tapCount = this.count,
            this.manager.emit(this.options.event, this._input))
        }
    }),
    ea.VERSION = "2.0.4",
    ea.defaults = {
        domEvents: !1,
        touchAction: $a,
        enable: !0,
        inputTarget: null,
        inputClass: null,
        preset: [[ba, {
            enable: !1
        }], [_, {
            enable: !1
        }, ["rotate"]], [ca, {
            direction: Ha
        }], [$, {
            direction: Ha
        }, ["swipe"]], [da], [da, {
            event: "doubletap",
            taps: 2
        }, ["tap"]], [aa]],
        cssProps: {
            userSelect: "default",
            touchSelect: "none",
            touchCallout: "none",
            contentZooming: "none",
            userDrag: "none",
            tapHighlightColor: "rgba(0,0,0,0)"
        }
    };
    var lb = 1
      , mb = 2;
    fa.prototype = {
        set: function(a) {
            return h(this.options, a),
            a.touchAction && this.touchAction.update(),
            a.inputTarget && (this.input.destroy(),
            this.input.target = a.inputTarget,
            this.input.init()),
            this
        },
        stop: function(a) {
            this.session.stopped = a ? mb : lb
        },
        recognize: function(a) {
            var b = this.session;
            if (!b.stopped) {
                this.touchAction.preventDefaults(a);
                var c, d = this.recognizers, e = b.curRecognizer;
                (!e || e && e.state & ib) && (e = b.curRecognizer = null);
                for (var f = 0; f < d.length; )
                    c = d[f],
                    b.stopped === mb || e && c != e && !c.canRecognizeWith(e) ? c.reset() : c.recognize(a),
                    !e && c.state & (fb | gb | hb) && (e = b.curRecognizer = c),
                    f++
            }
        },
        get: function(a) {
            if (a instanceof V)
                return a;
            for (var b = this.recognizers, c = 0; c < b.length; c++)
                if (b[c].options.event == a)
                    return b[c];
            return null
        },
        add: function(a) {
            if (f(a, "add", this))
                return this;
            var b = this.get(a.options.event);
            return b && this.remove(b),
            this.recognizers.push(a),
            a.manager = this,
            this.touchAction.update(),
            a
        },
        remove: function(a) {
            if (f(a, "remove", this))
                return this;
            var b = this.recognizers;
            return a = this.get(a),
            b.splice(s(b, a), 1),
            this.touchAction.update(),
            this
        },
        on: function(a, b) {
            var c = this.handlers;
            return g(r(a), function(a) {
                c[a] = c[a] || [],
                c[a].push(b)
            }),
            this
        },
        off: function(a, b) {
            var c = this.handlers;
            return g(r(a), function(a) {
                b ? c[a].splice(s(c[a], b), 1) : delete c[a]
            }),
            this
        },
        emit: function(a, b) {
            this.options.domEvents && ha(a, b);
            var c = this.handlers[a] && this.handlers[a].slice();
            if (c && c.length) {
                b.type = a,
                b.preventDefault = function() {
                    b.srcEvent.preventDefault()
                }
                ;
                for (var d = 0; d < c.length; )
                    c[d](b),
                    d++
            }
        },
        destroy: function() {
            this.element && ga(this, !1),
            this.handlers = {},
            this.session = {},
            this.input.destroy(),
            this.element = null
        }
    },
    h(ea, {
        INPUT_START: ya,
        INPUT_MOVE: za,
        INPUT_END: Aa,
        INPUT_CANCEL: Ba,
        STATE_POSSIBLE: eb,
        STATE_BEGAN: fb,
        STATE_CHANGED: gb,
        STATE_ENDED: hb,
        STATE_RECOGNIZED: ib,
        STATE_CANCELLED: jb,
        STATE_FAILED: kb,
        DIRECTION_NONE: Ca,
        DIRECTION_LEFT: Da,
        DIRECTION_RIGHT: Ea,
        DIRECTION_UP: Fa,
        DIRECTION_DOWN: Ga,
        DIRECTION_HORIZONTAL: Ha,
        DIRECTION_VERTICAL: Ia,
        DIRECTION_ALL: Ja,
        Manager: fa,
        Input: y,
        TouchAction: T,
        TouchInput: Q,
        MouseInput: M,
        PointerEventInput: N,
        TouchMouseInput: S,
        SingleTouchInput: O,
        Recognizer: V,
        AttrRecognizer: Z,
        Tap: da,
        Pan: $,
        Swipe: ca,
        Pinch: _,
        Rotate: ba,
        Press: aa,
        on: n,
        off: o,
        each: g,
        merge: i,
        extend: h,
        inherit: j,
        bindFn: k,
        prefixed: v
    }),
    typeof define == ka && define.amd ? define(function() {
        return ea
    }) : "undefined" != typeof module && module.exports ? module.exports = ea : a[c] = ea
}(window, document, "Hammer"),
function(a) {
    "function" == typeof define && define.amd ? define(["jquery", "hammerjs"], a) : "object" == typeof exports ? a(require("jquery"), require("hammerjs")) : a(jQuery, Hammer)
}(function(a, b) {
    function c(c, d) {
        var e = a(c);
        e.data("hammer") || e.data("hammer", new b(e[0],d))
    }
    a.fn.hammer = function(a) {
        return this.each(function() {
            c(this, a)
        })
    }
    ,
    b.Manager.prototype.emit = function(b) {
        return function(c, d) {
            b.call(this, c, d),
            a(this.element).trigger({
                type: c,
                gesture: d
            })
        }
    }(b.Manager.prototype.emit)
}),
function(a) {
    a.Package ? Materialize = {} : a.Materialize = {}
}(window),
function(a) {
    for (var b = 0, c = ["webkit", "moz"], d = a.requestAnimationFrame, e = a.cancelAnimationFrame, f = c.length; --f >= 0 && !d; )
        d = a[c[f] + "RequestAnimationFrame"],
        e = a[c[f] + "CancelRequestAnimationFrame"];
    d && e || (d = function(a) {
        var c = +Date.now()
          , d = Math.max(b + 16, c);
        return setTimeout(function() {
            a(b = d)
        }, d - c)
    }
    ,
    e = clearTimeout),
    a.requestAnimationFrame = d,
    a.cancelAnimationFrame = e
}(window),
Materialize.objectSelectorString = function(a) {
    var b = a.prop("tagName") || ""
      , c = a.attr("id") || ""
      , d = a.attr("class") || "";
    return (b + c + d).replace(/\s/g, "")
}
,
Materialize.guid = function() {
    function a() {
        return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1)
    }
    return function() {
        return a() + a() + "-" + a() + "-" + a() + "-" + a() + "-" + a() + a() + a()
    }
}(),
Materialize.escapeHash = function(a) {
    return a.replace(/(:|\.|\[|\]|,|=)/g, "\\$1")
}
,
Materialize.elementOrParentIsFixed = function(a) {
    var b = $(a)
      , c = b.add(b.parents())
      , d = !1;
    return c.each(function() {
        if ("fixed" === $(this).css("position"))
            return d = !0,
            !1
    }),
    d
}
;
var getTime = Date.now || function() {
    return (new Date).getTime()
}
;
Materialize.throttle = function(a, b, c) {
    var d, e, f, g = null, h = 0;
    c || (c = {});
    var i = function() {
        h = c.leading === !1 ? 0 : getTime(),
        g = null,
        f = a.apply(d, e),
        d = e = null
    };
    return function() {
        var j = getTime();
        h || c.leading !== !1 || (h = j);
        var k = b - (j - h);
        return d = this,
        e = arguments,
        k <= 0 ? (clearTimeout(g),
        g = null,
        h = j,
        f = a.apply(d, e),
        d = e = null) : g || c.trailing === !1 || (g = setTimeout(i, k)),
        f
    }
}
;
var Vel;
Vel = jQuery ? jQuery.Velocity : $ ? $.Velocity : Velocity,
function(a) {
    a.fn.collapsible = function(b, c) {
        var d = {
            accordion: void 0,
            onOpen: void 0,
            onClose: void 0
        }
          , e = b;
        return b = a.extend(d, b),
        this.each(function() {
            function d(b) {
                m = l.find("> li > .collapsible-header"),
                b.hasClass("active") ? b.parent().addClass("active") : b.parent().removeClass("active"),
                b.parent().hasClass("active") ? b.siblings(".collapsible-body").stop(!0, !1).slideDown({
                    duration: 350,
                    easing: "easeOutQuart",
                    queue: !1,
                    complete: function() {
                        a(this).css("height", "")
                    }
                }) : b.siblings(".collapsible-body").stop(!0, !1).slideUp({
                    duration: 350,
                    easing: "easeOutQuart",
                    queue: !1,
                    complete: function() {
                        a(this).css("height", "")
                    }
                }),
                m.not(b).removeClass("active").parent().removeClass("active"),
                m.not(b).parent().children(".collapsible-body").stop(!0, !1).each(function() {
                    a(this).is(":visible") && a(this).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function() {
                            a(this).css("height", ""),
                            h(a(this).siblings(".collapsible-header"))
                        }
                    })
                })
            }
            function f(b) {
                b.hasClass("active") ? b.parent().addClass("active") : b.parent().removeClass("active"),
                b.parent().hasClass("active") ? b.siblings(".collapsible-body").stop(!0, !1).slideDown({
                    duration: 350,
                    easing: "easeOutQuart",
                    queue: !1,
                    complete: function() {
                        a(this).css("height", "")
                    }
                }) : b.siblings(".collapsible-body").stop(!0, !1).slideUp({
                    duration: 350,
                    easing: "easeOutQuart",
                    queue: !1,
                    complete: function() {
                        a(this).css("height", "")
                    }
                })
            }
            function g(a, c) {
                c || a.toggleClass("active"),
                b.accordion || "accordion" === n || void 0 === n ? d(a) : f(a),
                h(a)
            }
            function h(a) {
                a.hasClass("active") ? "function" == typeof b.onOpen && b.onOpen.call(this, a.parent()) : "function" == typeof b.onClose && b.onClose.call(this, a.parent())
            }
            function i(a) {
                var b = j(a);
                return b.length > 0
            }
            function j(a) {
                return a.closest("li > .collapsible-header")
            }
            function k() {
                l.off("click.collapse", "> li > .collapsible-header")
            }
            var l = a(this)
              , m = a(this).find("> li > .collapsible-header")
              , n = l.data("collapsible");
            if ("destroy" === e)
                return void k();
            if (c >= 0 && c < m.length) {
                var o = m.eq(c);
                return void (o.length && ("open" === e || "close" === e && o.hasClass("active")) && g(o))
            }
            k(),
            l.on("click.collapse", "> li > .collapsible-header", function(b) {
                var c = a(b.target);
                i(c) && (c = j(c)),
                g(c)
            }),
            b.accordion || "accordion" === n || void 0 === n ? g(m.filter(".active").first(), !0) : m.filter(".active").each(function() {
                g(a(this), !0)
            })
        })
    }
    ,
    a(document).ready(function() {
        a(".collapsible").collapsible()
    })
}(jQuery),
function(a) {
    a.fn.scrollTo = function(b) {
        return a(this).scrollTop(a(this).scrollTop() - a(this).offset().top + a(b).offset().top),
        this
    }
    ,
    a.fn.dropdown = function(b) {
        var c = {
            inDuration: 300,
            outDuration: 225,
            constrainWidth: !0,
            hover: !1,
            gutter: 0,
            belowOrigin: !1,
            alignment: "left",
            stopPropagation: !1
        };
        return "open" === b ? (this.each(function() {
            a(this).trigger("open")
        }),
        !1) : "close" === b ? (this.each(function() {
            a(this).trigger("close")
        }),
        !1) : void this.each(function() {
            function d() {
                void 0 !== g.data("induration") && (h.inDuration = g.data("induration")),
                void 0 !== g.data("outduration") && (h.outDuration = g.data("outduration")),
                void 0 !== g.data("constrainwidth") && (h.constrainWidth = g.data("constrainwidth")),
                void 0 !== g.data("hover") && (h.hover = g.data("hover")),
                void 0 !== g.data("gutter") && (h.gutter = g.data("gutter")),
                void 0 !== g.data("beloworigin") && (h.belowOrigin = g.data("beloworigin")),
                void 0 !== g.data("alignment") && (h.alignment = g.data("alignment")),
                void 0 !== g.data("stoppropagation") && (h.stopPropagation = g.data("stoppropagation"))
            }
            function e(b) {
                "focus" === b && (i = !0),
                d(),
                j.addClass("active"),
                g.addClass("active"),
                h.constrainWidth === !0 ? j.css("width", g.outerWidth()) : j.css("white-space", "nowrap");
                var c = window.innerHeight
                  , e = g.innerHeight()
                  , k = g.offset().left
                  , l = g.offset().top - a(window).scrollTop()
                  , m = h.alignment
                  , n = 0
                  , o = 0
                  , p = 0;
                h.belowOrigin === !0 && (p = e);
                var q = 0
                  , r = 0
                  , s = g.parent();
                if (s.is("body") || (s[0].scrollHeight > s[0].clientHeight && (q = s[0].scrollTop),
                s[0].scrollWidth > s[0].clientWidth && (r = s[0].scrollLeft)),
                k + j.innerWidth() > a(window).width() ? m = "right" : k - j.innerWidth() + g.innerWidth() < 0 && (m = "left"),
                l + j.innerHeight() > c)
                    if (l + e - j.innerHeight() < 0) {
                        var t = c - l - p;
                        j.css("max-height", t)
                    } else
                        p || (p += e),
                        p -= j.innerHeight();
                if ("left" === m)
                    n = h.gutter,
                    o = g.position().left + n;
                else if ("right" === m) {
                    var u = g.position().left + g.outerWidth() - j.outerWidth();
                    n = -h.gutter,
                    o = u + n
                }
                j.css({
                    position: "absolute",
                    top: g.position().top + p + q,
                    left: o + r
                }),
                j.stop(!0, !0).css("opacity", 0).slideDown({
                    queue: !1,
                    duration: h.inDuration,
                    easing: "easeOutCubic",
                    complete: function() {
                        a(this).css("height", "")
                    }
                }).animate({
                    opacity: 1
                }, {
                    queue: !1,
                    duration: h.inDuration,
                    easing: "easeOutSine"
                }),
                setTimeout(function() {
                    a(document).bind("click." + j.attr("id"), function(b) {
                        f(),
                        a(document).unbind("click." + j.attr("id"))
                    })
                }, 0)
            }
            function f() {
                i = !1,
                j.fadeOut(h.outDuration),
                j.removeClass("active"),
                g.removeClass("active"),
                a(document).unbind("click." + j.attr("id")),
                setTimeout(function() {
                    j.css("max-height", "")
                }, h.outDuration)
            }
            var g = a(this)
              , h = a.extend({}, c, b)
              , i = !1
              , j = a("#" + g.attr("data-activates"));
            if (d(),
            g.after(j),
            h.hover) {
                var k = !1;
                g.unbind("click." + g.attr("id")),
                g.on("mouseenter", function(a) {
                    k === !1 && (e(),
                    k = !0)
                }),
                g.on("mouseleave", function(b) {
                    var c = b.toElement || b.relatedTarget;
                    a(c).closest(".dropdown-content").is(j) || (j.stop(!0, !0),
                    f(),
                    k = !1)
                }),
                j.on("mouseleave", function(b) {
                    var c = b.toElement || b.relatedTarget;
                    a(c).closest(".dropdown-button").is(g) || (j.stop(!0, !0),
                    f(),
                    k = !1)
                })
            } else
                g.unbind("click." + g.attr("id")),
                g.bind("click." + g.attr("id"), function(b) {
                    i || (g[0] != b.currentTarget || g.hasClass("active") || 0 !== a(b.target).closest(".dropdown-content").length ? g.hasClass("active") && (f(),
                    a(document).unbind("click." + j.attr("id"))) : (b.preventDefault(),
                    h.stopPropagation && b.stopPropagation(),
                    e("click")))
                });
            g.on("open", function(a, b) {
                e(b)
            }),
            g.on("close", f)
        })
    }
    ,
    a(document).ready(function() {
        a(".dropdown-button").dropdown()
    })
}(jQuery),
function(a) {
    var b = 0
      , c = 0
      , d = function() {
        return c++,
        "materialize-modal-overlay-" + c
    }
      , e = {
        init: function(c) {
            var e = {
                opacity: .5,
                inDuration: 350,
                outDuration: 250,
                ready: void 0,
                complete: void 0,
                dismissible: !0,
                startingTop: "4%",
                endingTop: "10%"
            };
            return c = a.extend(e, c),
            this.each(function() {
                var e = a(this)
                  , f = a(this).attr("id") || "#" + a(this).data("target")
                  , g = function() {
                    var d = e.data("overlay-id")
                      , f = a("#" + d);
                    e.removeClass("open"),
                    a("body").css({
                        overflow: "",
                        width: ""
                    }),
                    e.find(".modal-close").off("click.close"),
                    a(document).off("keyup.modal" + d),
                    f.velocity({
                        opacity: 0
                    }, {
                        duration: c.outDuration,
                        queue: !1,
                        ease: "easeOutQuart"
                    });
                    var g = {
                        duration: c.outDuration,
                        queue: !1,
                        ease: "easeOutCubic",
                        complete: function() {
                            a(this).css({
                                display: "none"
                            }),
                            "function" == typeof c.complete && c.complete.call(this, e),
                            f.remove(),
                            b--
                        }
                    };
                    e.hasClass("bottom-sheet") ? e.velocity({
                        bottom: "-100%",
                        opacity: 0
                    }, g) : e.velocity({
                        top: c.startingTop,
                        opacity: 0,
                        scaleX: .7
                    }, g)
                }
                  , h = function(f) {
                    var h = a("body")
                      , i = h.innerWidth();
                    if (h.css("overflow", "hidden"),
                    h.width(i),
                    !e.hasClass("open")) {
                        var j = d()
                          , k = a('<div class="modal-overlay"></div>');
                        lStack = ++b,
                        k.attr("id", j).css("z-index", 1e3 + 2 * lStack),
                        e.data("overlay-id", j).css("z-index", 1e3 + 2 * lStack + 1),
                        e.addClass("open"),
                        a("body").append(k),
                        c.dismissible && (k.click(function() {
                            g()
                        }),
                        a(document).on("keyup.modal" + j, function(a) {
                            27 === a.keyCode && g()
                        })),
                        e.find(".modal-close").on("click.close", function(a) {
                            g()
                        }),
                        k.css({
                            display: "block",
                            opacity: 0
                        }),
                        e.css({
                            display: "block",
                            opacity: 0
                        }),
                        k.velocity({
                            opacity: c.opacity
                        }, {
                            duration: c.inDuration,
                            queue: !1,
                            ease: "easeOutCubic"
                        }),
                        e.data("associated-overlay", k[0]);
                        var l = {
                            duration: c.inDuration,
                            queue: !1,
                            ease: "easeOutCubic",
                            complete: function() {
                                "function" == typeof c.ready && c.ready.call(this, e, f)
                            }
                        };
                        e.hasClass("bottom-sheet") ? e.velocity({
                            bottom: "0",
                            opacity: 1
                        }, l) : (a.Velocity.hook(e, "scaleX", .7),
                        e.css({
                            top: c.startingTop
                        }),
                        e.velocity({
                            top: c.endingTop,
                            opacity: 1,
                            scaleX: "1"
                        }, l))
                    }
                };
                a(document).off("click.modalTrigger", 'a[href="#' + f + '"], [data-target="' + f + '"]'),
                a(this).off("openModal"),
                a(this).off("closeModal"),
                a(document).on("click.modalTrigger", 'a[href="#' + f + '"], [data-target="' + f + '"]', function(b) {
                    c.startingTop = (a(this).offset().top - a(window).scrollTop()) / 1.15,
                    h(a(this)),
                    b.preventDefault()
                }),
                a(this).on("openModal", function() {
                    a(this).attr("href") || "#" + a(this).data("target");
                    h()
                }),
                a(this).on("closeModal", function() {
                    g()
                })
            })
        },
        open: function() {
            a(this).trigger("openModal")
        },
        close: function() {
            a(this).trigger("closeModal")
        }
    };
    a.fn.modal = function(b) {
        return e[b] ? e[b].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof b && b ? void a.error("Method " + b + " does not exist on jQuery.modal") : e.init.apply(this, arguments)
    }
}(jQuery),
function(a) {
    a.fn.materialbox = function() {
        return this.each(function() {
            function b() {
                f = !1;
                var b = i.parent(".material-placeholder")
                  , d = (window.innerWidth,
                window.innerHeight,
                i.data("width"))
                  , g = i.data("height");
                i.velocity("stop", !0),
                a("#materialbox-overlay").velocity("stop", !0),
                a(".materialbox-caption").velocity("stop", !0),
                a("#materialbox-overlay").velocity({
                    opacity: 0
                }, {
                    duration: h,
                    queue: !1,
                    easing: "easeOutQuad",
                    complete: function() {
                        e = !1,
                        a(this).remove()
                    }
                }),
                i.velocity({
                    width: d,
                    height: g,
                    left: 0,
                    top: 0
                }, {
                    duration: h,
                    queue: !1,
                    easing: "easeOutQuad",
                    complete: function() {
                        b.css({
                            height: "",
                            width: "",
                            position: "",
                            top: "",
                            left: ""
                        }),
                        i.removeAttr("style"),
                        i.attr("style", k),
                        i.removeClass("active"),
                        f = !0,
                        c && c.css("overflow", "")
                    }
                }),
                a(".materialbox-caption").velocity({
                    opacity: 0
                }, {
                    duration: h,
                    queue: !1,
                    easing: "easeOutQuad",
                    complete: function() {
                        a(this).remove()
                    }
                })
            }
            if (!a(this).hasClass("initialized")) {
                a(this).addClass("initialized");
                var c, d, e = !1, f = !0, g = 275, h = 200, i = a(this), j = a("<div></div>").addClass("material-placeholder"), k = i.attr("style");
                i.wrap(j),
                i.on("click", function() {
                    var h = i.parent(".material-placeholder")
                      , j = window.innerWidth
                      , k = window.innerHeight
                      , l = i.width()
                      , m = i.height();
                    if (f === !1)
                        return b(),
                        !1;
                    if (e && f === !0)
                        return b(),
                        !1;
                    f = !1,
                    i.addClass("active"),
                    e = !0,
                    h.css({
                        width: h[0].getBoundingClientRect().width,
                        height: h[0].getBoundingClientRect().height,
                        position: "relative",
                        top: 0,
                        left: 0
                    }),
                    c = void 0,
                    d = h[0].parentNode;
                    for (; null !== d && !a(d).is(document); ) {
                        var n = a(d);
                        "visible" !== n.css("overflow") && (n.css("overflow", "visible"),
                        c = void 0 === c ? n : c.add(n)),
                        d = d.parentNode
                    }
                    i.css({
                        position: "absolute",
                        "z-index": 1e3,
                        "will-change": "left, top, width, height"
                    }).data("width", l).data("height", m);
                    var o = a('<div id="materialbox-overlay"></div>').css({
                        opacity: 0
                    }).click(function() {
                        f === !0 && b()
                    });
                    i.before(o);
                    var p = o[0].getBoundingClientRect();
                    if (o.css({
                        width: j,
                        height: k,
                        left: -1 * p.left,
                        top: -1 * p.top
                    }),
                    o.velocity({
                        opacity: 1
                    }, {
                        duration: g,
                        queue: !1,
                        easing: "easeOutQuad"
                    }),
                    "" !== i.data("caption")) {
                        var q = a('<div class="materialbox-caption"></div>');
                        q.text(i.data("caption")),
                        a("body").append(q),
                        q.css({
                            display: "inline"
                        }),
                        q.velocity({
                            opacity: 1
                        }, {
                            duration: g,
                            queue: !1,
                            easing: "easeOutQuad"
                        })
                    }
                    var r = 0
                      , s = l / j
                      , t = m / k
                      , u = 0
                      , v = 0;
                    s > t ? (r = m / l,
                    u = .9 * j,
                    v = .9 * j * r) : (r = l / m,
                    u = .9 * k * r,
                    v = .9 * k),
                    i.hasClass("responsive-img") ? i.velocity({
                        "max-width": u,
                        width: l
                    }, {
                        duration: 0,
                        queue: !1,
                        complete: function() {
                            i.css({
                                left: 0,
                                top: 0
                            }).velocity({
                                height: v,
                                width: u,
                                left: a(document).scrollLeft() + j / 2 - i.parent(".material-placeholder").offset().left - u / 2,
                                top: a(document).scrollTop() + k / 2 - i.parent(".material-placeholder").offset().top - v / 2
                            }, {
                                duration: g,
                                queue: !1,
                                easing: "easeOutQuad",
                                complete: function() {
                                    f = !0
                                }
                            })
                        }
                    }) : i.css("left", 0).css("top", 0).velocity({
                        height: v,
                        width: u,
                        left: a(document).scrollLeft() + j / 2 - i.parent(".material-placeholder").offset().left - u / 2,
                        top: a(document).scrollTop() + k / 2 - i.parent(".material-placeholder").offset().top - v / 2
                    }, {
                        duration: g,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function() {
                            f = !0
                        }
                    })
                }),
                a(window).scroll(function() {
                    e && b()
                }),
                a(document).keyup(function(a) {
                    27 === a.keyCode && f === !0 && e && b()
                })
            }
        })
    }
    ,
    a(document).ready(function() {
        a(".materialboxed").materialbox()
    })
}(jQuery),
function(a) {
    a.fn.parallax = function() {
        var b = a(window).width();
        return this.each(function(c) {
            function d(c) {
                var d;
                d = b < 601 ? e.height() > 0 ? e.height() : e.children("img").height() : e.height() > 0 ? e.height() : 500;
                var f = e.children("img").first()
                  , g = f.height()
                  , h = g - d
                  , i = e.offset().top + d
                  , j = e.offset().top
                  , k = a(window).scrollTop()
                  , l = window.innerHeight
                  , m = k + l
                  , n = (m - j) / (d + l)
                  , o = Math.round(h * n);
                c && f.css("display", "block"),
                i > k && j < k + l && f.css("transform", "translate3D(-50%," + o + "px, 0)")
            }
            var e = a(this);
            e.addClass("parallax"),
            e.children("img").one("load", function() {
                d(!0)
            }).each(function() {
                this.complete && a(this).trigger("load")
            }),
            a(window).scroll(function() {
                b = a(window).width(),
                d(!1)
            }),
            a(window).resize(function() {
                b = a(window).width(),
                d(!1)
            })
        })
    }
}(jQuery),
function(a) {
    var b = {
        init: function(b) {
            var c = {
                onShow: null,
                swipeable: !1,
                responsiveThreshold: 1 / 0
            };
            b = a.extend(c, b);
            var d = Materialize.objectSelectorString(a(this));
            return this.each(function(c) {
                var e, f, g, h, i, j = d + c, k = a(this), l = a(window).width(), m = k.find("li.tab a"), n = k.width(), o = a(), p = Math.max(n, k[0].scrollWidth) / m.length, q = prev_index = 0, r = !1, s = 300, t = function(a) {
                    return Math.ceil(n - a.position().left - a.outerWidth() - k.scrollLeft())
                }, u = function(a) {
                    return Math.floor(a.position().left + k.scrollLeft())
                }, v = function(a) {
                    q - a >= 0 ? (h.velocity({
                        right: t(e)
                    }, {
                        duration: s,
                        queue: !1,
                        easing: "easeOutQuad"
                    }),
                    h.velocity({
                        left: u(e)
                    }, {
                        duration: s,
                        queue: !1,
                        easing: "easeOutQuad",
                        delay: 90
                    })) : (h.velocity({
                        left: u(e)
                    }, {
                        duration: s,
                        queue: !1,
                        easing: "easeOutQuad"
                    }),
                    h.velocity({
                        right: t(e)
                    }, {
                        duration: s,
                        queue: !1,
                        easing: "easeOutQuad",
                        delay: 90
                    }))
                };
                b.swipeable && l > b.responsiveThreshold && (b.swipeable = !1),
                e = a(m.filter('[href="' + location.hash + '"]')),
                0 === e.length && (e = a(this).find("li.tab a.active").first()),
                0 === e.length && (e = a(this).find("li.tab a").first()),
                e.addClass("active"),
                q = m.index(e),
                q < 0 && (q = 0),
                void 0 !== e[0] && (f = a(e[0].hash),
                f.addClass("active")),
                k.find(".indicator").length || k.append('<div class="indicator"></div>'),
                h = k.find(".indicator"),
                k.append(h),
                k.is(":visible") && setTimeout(function() {
                    h.css({
                        right: t(e)
                    }),
                    h.css({
                        left: u(e)
                    })
                }, 0),
                a(window).off("resize.tabs-" + j).on("resize.tabs-" + j, function() {
                    n = k.width(),
                    p = Math.max(n, k[0].scrollWidth) / m.length,
                    q < 0 && (q = 0),
                    0 !== p && 0 !== n && (h.css({
                        right: t(e)
                    }),
                    h.css({
                        left: u(e)
                    }))
                }),
                b.swipeable ? (m.each(function() {
                    var b = a(Materialize.escapeHash(this.hash));
                    b.addClass("carousel-item"),
                    o = o.add(b)
                }),
                g = o.wrapAll('<div class="tabs-content carousel"></div>'),
                o.css("display", ""),
                a(".tabs-content.carousel").carousel({
                    fullWidth: !0,
                    noWrap: !0,
                    onCycleTo: function(a) {
                        if (!r) {
                            var b = q;
                            q = g.index(a),
                            e = m.eq(q),
                            v(b)
                        }
                    }
                })) : m.not(e).each(function() {
                    a(Materialize.escapeHash(this.hash)).hide()
                }),
                k.off("click.tabs").on("click.tabs", "a", function(c) {
                    if (a(this).parent().hasClass("disabled"))
                        return void c.preventDefault();
                    if (!a(this).attr("target")) {
                        r = !0,
                        n = k.width(),
                        p = Math.max(n, k[0].scrollWidth) / m.length,
                        e.removeClass("active");
                        var d = f;
                        e = a(this),
                        f = a(Materialize.escapeHash(this.hash)),
                        m = k.find("li.tab a");
                        e.position();
                        e.addClass("active"),
                        prev_index = q,
                        q = m.index(a(this)),
                        q < 0 && (q = 0),
                        b.swipeable ? o.length && o.carousel("set", q) : (void 0 !== f && (f.show(),
                        f.addClass("active"),
                        "function" == typeof b.onShow && b.onShow.call(this, f)),
                        void 0 === d || d.is(f) || (d.hide(),
                        d.removeClass("active"))),
                        i = setTimeout(function() {
                            r = !1
                        }, s),
                        v(prev_index),
                        c.preventDefault()
                    }
                })
            })
        },
        select_tab: function(a) {
            this.find('a[href="#' + a + '"]').trigger("click")
        }
    };
    a.fn.tabs = function(c) {
        return b[c] ? b[c].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof c && c ? void a.error("Method " + c + " does not exist on jQuery.tabs") : b.init.apply(this, arguments)
    }
    ,
    a(document).ready(function() {
        a("ul.tabs").tabs()
    })
}(jQuery),
function(a) {
    a.fn.tooltip = function(c) {
        var d = 5
          , e = {
            delay: 350,
            tooltip: "",
            position: "bottom",
            html: !1
        };
        return "remove" === c ? (this.each(function() {
            a("#" + a(this).attr("data-tooltip-id")).remove(),
            a(this).off("mouseenter.tooltip mouseleave.tooltip")
        }),
        !1) : (c = a.extend(e, c),
        this.each(function() {
            var e = Materialize.guid()
              , f = a(this);
            f.attr("data-tooltip-id") && a("#" + f.attr("data-tooltip-id")).remove(),
            f.attr("data-tooltip-id", e);
            var g, h, i, j, k, l, m = function() {
                g = f.attr("data-html") ? "true" === f.attr("data-html") : c.html,
                h = f.attr("data-delay"),
                h = void 0 === h || "" === h ? c.delay : h,
                i = f.attr("data-position"),
                i = void 0 === i || "" === i ? c.position : i,
                j = f.attr("data-tooltip"),
                j = void 0 === j || "" === j ? c.tooltip : j
            };
            m();
            var n = function() {
                var b = a('<div class="material-tooltip"></div>');
                return j = g ? a("<span></span>").html(j) : a("<span></span>").text(j),
                b.append(j).appendTo(a("body")).attr("id", e),
                l = a('<div class="backdrop"></div>'),
                l.appendTo(b),
                b
            };
            k = n(),
            f.off("mouseenter.tooltip mouseleave.tooltip");
            var o, p = !1;
            f.on({
                "mouseenter.tooltip": function(a) {
                    var c = function() {
                        m(),
                        p = !0,
                        k.velocity("stop"),
                        l.velocity("stop"),
                        k.css({
                            visibility: "visible",
                            left: "0px",
                            top: "0px"
                        });
                        var a, c, e, g = f.outerWidth(), h = f.outerHeight(), j = k.outerHeight(), n = k.outerWidth(), o = "0px", q = "0px", r = l[0].offsetWidth, s = l[0].offsetHeight, t = 8, u = 8, v = 0;
                        "top" === i ? (a = f.offset().top - j - d,
                        c = f.offset().left + g / 2 - n / 2,
                        e = b(c, a, n, j),
                        o = "-10px",
                        l.css({
                            bottom: 0,
                            left: 0,
                            borderRadius: "14px 14px 0 0",
                            transformOrigin: "50% 100%",
                            marginTop: j,
                            marginLeft: n / 2 - r / 2
                        })) : "left" === i ? (a = f.offset().top + h / 2 - j / 2,
                        c = f.offset().left - n - d,
                        e = b(c, a, n, j),
                        q = "-10px",
                        l.css({
                            top: "-7px",
                            right: 0,
                            width: "14px",
                            height: "14px",
                            borderRadius: "14px 0 0 14px",
                            transformOrigin: "95% 50%",
                            marginTop: j / 2,
                            marginLeft: n
                        })) : "right" === i ? (a = f.offset().top + h / 2 - j / 2,
                        c = f.offset().left + g + d,
                        e = b(c, a, n, j),
                        q = "+10px",
                        l.css({
                            top: "-7px",
                            left: 0,
                            width: "14px",
                            height: "14px",
                            borderRadius: "0 14px 14px 0",
                            transformOrigin: "5% 50%",
                            marginTop: j / 2,
                            marginLeft: "0px"
                        })) : (a = f.offset().top + f.outerHeight() + d,
                        c = f.offset().left + g / 2 - n / 2,
                        e = b(c, a, n, j),
                        o = "+10px",
                        l.css({
                            top: 0,
                            left: 0,
                            marginLeft: n / 2 - r / 2
                        })),
                        k.css({
                            top: e.y,
                            left: e.x
                        }),
                        t = Math.SQRT2 * n / parseInt(r),
                        u = Math.SQRT2 * j / parseInt(s),
                        v = Math.max(t, u),
                        k.velocity({
                            translateY: o,
                            translateX: q
                        }, {
                            duration: 350,
                            queue: !1
                        }).velocity({
                            opacity: 1
                        }, {
                            duration: 300,
                            delay: 50,
                            queue: !1
                        }),
                        l.css({
                            visibility: "visible"
                        }).velocity({
                            opacity: 1
                        }, {
                            duration: 55,
                            delay: 0,
                            queue: !1
                        }).velocity({
                            scaleX: v,
                            scaleY: v
                        }, {
                            duration: 300,
                            delay: 0,
                            queue: !1,
                            easing: "easeInOutQuad"
                        })
                    };
                    o = setTimeout(c, h)
                },
                "mouseleave.tooltip": function() {
                    p = !1,
                    clearTimeout(o),
                    setTimeout(function() {
                        p !== !0 && (k.velocity({
                            opacity: 0,
                            translateY: 0,
                            translateX: 0
                        }, {
                            duration: 225,
                            queue: !1
                        }),
                        l.velocity({
                            opacity: 0,
                            scaleX: 1,
                            scaleY: 1
                        }, {
                            duration: 225,
                            queue: !1,
                            complete: function() {
                                l.css({
                                    visibility: "hidden"
                                }),
                                k.css({
                                    visibility: "hidden"
                                }),
                                p = !1
                            }
                        }))
                    }, 225)
                }
            })
        }))
    }
    ;
    var b = function(b, c, d, e) {
        var f = b
          , g = c;
        return f < 0 ? f = 4 : f + d > window.innerWidth && (f -= f + d - window.innerWidth),
        g < 0 ? g = 4 : g + e > window.innerHeight + a(window).scrollTop && (g -= g + e - window.innerHeight),
        {
            x: f,
            y: g
        }
    };
    a(document).ready(function() {
        a(".tooltipped").tooltip()
    })
}(jQuery),
function(a) {
    "use strict";
    function b(a) {
        return null !== a && a === a.window
    }
    function c(a) {
        return b(a) ? a : 9 === a.nodeType && a.defaultView
    }
    function d(a) {
        var b, d, e = {
            top: 0,
            left: 0
        }, f = a && a.ownerDocument;
        return b = f.documentElement,
        "undefined" != typeof a.getBoundingClientRect && (e = a.getBoundingClientRect()),
        d = c(f),
        {
            top: e.top + d.pageYOffset - b.clientTop,
            left: e.left + d.pageXOffset - b.clientLeft
        }
    }
    function e(a) {
        var b = "";
        for (var c in a)
            a.hasOwnProperty(c) && (b += c + ":" + a[c] + ";");
        return b
    }
    function f(a) {
        if (k.allowEvent(a) === !1)
            return null;
        for (var b = null, c = a.target || a.srcElement; null !== c.parentElement; ) {
            if (!(c instanceof SVGElement || c.className.indexOf("waves-effect") === -1)) {
                b = c;
                break
            }
            if (c.classList.contains("waves-effect")) {
                b = c;
                break
            }
            c = c.parentElement
        }
        return b
    }
    function g(b) {
        var c = f(b);
        null !== c && (j.show(b, c),
        "ontouchstart"in a && (c.addEventListener("touchend", j.hide, !1),
        c.addEventListener("touchcancel", j.hide, !1)),
        c.addEventListener("mouseup", j.hide, !1),
        c.addEventListener("mouseleave", j.hide, !1))
    }
    var h = h || {}
      , i = document.querySelectorAll.bind(document)
      , j = {
        duration: 750,
        show: function(a, b) {
            if (2 === a.button)
                return !1;
            var c = b || this
              , f = document.createElement("div");
            f.className = "waves-ripple",
            c.appendChild(f);
            var g = d(c)
              , h = a.pageY - g.top
              , i = a.pageX - g.left
              , k = "scale(" + c.clientWidth / 100 * 10 + ")";
            "touches"in a && (h = a.touches[0].pageY - g.top,
            i = a.touches[0].pageX - g.left),
            f.setAttribute("data-hold", Date.now()),
            f.setAttribute("data-scale", k),
            f.setAttribute("data-x", i),
            f.setAttribute("data-y", h);
            var l = {
                top: h + "px",
                left: i + "px"
            };
            f.className = f.className + " waves-notransition",
            f.setAttribute("style", e(l)),
            f.className = f.className.replace("waves-notransition", ""),
            l["-webkit-transform"] = k,
            l["-moz-transform"] = k,
            l["-ms-transform"] = k,
            l["-o-transform"] = k,
            l.transform = k,
            l.opacity = "1",
            l["-webkit-transition-duration"] = j.duration + "ms",
            l["-moz-transition-duration"] = j.duration + "ms",
            l["-o-transition-duration"] = j.duration + "ms",
            l["transition-duration"] = j.duration + "ms",
            l["-webkit-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)",
            l["-moz-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)",
            l["-o-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)",
            l["transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)",
            f.setAttribute("style", e(l))
        },
        hide: function(a) {
            k.touchup(a);
            var b = this
              , c = (1.4 * b.clientWidth,
            null)
              , d = b.getElementsByClassName("waves-ripple");
            if (!(d.length > 0))
                return !1;
            c = d[d.length - 1];
            var f = c.getAttribute("data-x")
              , g = c.getAttribute("data-y")
              , h = c.getAttribute("data-scale")
              , i = Date.now() - Number(c.getAttribute("data-hold"))
              , l = 350 - i;
            l < 0 && (l = 0),
            setTimeout(function() {
                var a = {
                    top: g + "px",
                    left: f + "px",
                    opacity: "0",
                    "-webkit-transition-duration": j.duration + "ms",
                    "-moz-transition-duration": j.duration + "ms",
                    "-o-transition-duration": j.duration + "ms",
                    "transition-duration": j.duration + "ms",
                    "-webkit-transform": h,
                    "-moz-transform": h,
                    "-ms-transform": h,
                    "-o-transform": h,
                    transform: h
                };
                c.setAttribute("style", e(a)),
                setTimeout(function() {
                    try {
                        b.removeChild(c)
                    } catch (a) {
                        return !1
                    }
                }, j.duration)
            }, l)
        },
        wrapInput: function(a) {
            for (var b = 0; b < a.length; b++) {
                var c = a[b];
                if ("input" === c.tagName.toLowerCase()) {
                    var d = c.parentNode;
                    if ("i" === d.tagName.toLowerCase() && d.className.indexOf("waves-effect") !== -1)
                        continue;
                    var e = document.createElement("i");
                    e.className = c.className + " waves-input-wrapper";
                    var f = c.getAttribute("style");
                    f || (f = ""),
                    e.setAttribute("style", f),
                    c.className = "waves-button-input",
                    c.removeAttribute("style"),
                    d.replaceChild(e, c),
                    e.appendChild(c)
                }
            }
        }
    }
      , k = {
        touches: 0,
        allowEvent: function(a) {
            var b = !0;
            return "touchstart" === a.type ? k.touches += 1 : "touchend" === a.type || "touchcancel" === a.type ? setTimeout(function() {
                k.touches > 0 && (k.touches -= 1)
            }, 500) : "mousedown" === a.type && k.touches > 0 && (b = !1),
            b
        },
        touchup: function(a) {
            k.allowEvent(a)
        }
    };
    h.displayEffect = function(b) {
        b = b || {},
        "duration"in b && (j.duration = b.duration),
        j.wrapInput(i(".waves-effect")),
        "ontouchstart"in a && document.body.addEventListener("touchstart", g, !1),
        document.body.addEventListener("mousedown", g, !1)
    }
    ,
    h.attach = function(b) {
        "input" === b.tagName.toLowerCase() && (j.wrapInput([b]),
        b = b.parentElement),
        "ontouchstart"in a && b.addEventListener("touchstart", g, !1),
        b.addEventListener("mousedown", g, !1)
    }
    ,
    a.Waves = h,
    document.addEventListener("DOMContentLoaded", function() {
        h.displayEffect()
    }, !1)
}(window),
Materialize.toast = function(a, b, c, d) {
    function e(a) {
        var b = document.createElement("div");
        if (b.classList.add("toast"),
        c)
            for (var e = c.split(" "), f = 0, g = e.length; f < g; f++)
                b.classList.add(e[f]);
        ("object" == typeof HTMLElement ? a instanceof HTMLElement : a && "object" == typeof a && null !== a && 1 === a.nodeType && "string" == typeof a.nodeName) ? b.appendChild(a) : a instanceof jQuery ? b.appendChild(a[0]) : b.innerHTML = a;
        var h = new Hammer(b,{
            prevent_default: !1
        });
        return h.on("pan", function(a) {
            var c = a.deltaX
              , d = 80;
            b.classList.contains("panning") || b.classList.add("panning");
            var e = 1 - Math.abs(c / d);
            e < 0 && (e = 0),
            Vel(b, {
                left: c,
                opacity: e
            }, {
                duration: 50,
                queue: !1,
                easing: "easeOutQuad"
            })
        }),
        h.on("panend", function(a) {
            var c = a.deltaX
              , e = 80;
            Math.abs(c) > e ? Vel(b, {
                marginTop: "-40px"
            }, {
                duration: 375,
                easing: "easeOutExpo",
                queue: !1,
                complete: function() {
                    "function" == typeof d && d(),
                    b.parentNode.removeChild(b)
                }
            }) : (b.classList.remove("panning"),
            Vel(b, {
                left: 0,
                opacity: 1
            }, {
                duration: 300,
                easing: "easeOutExpo",
                queue: !1
            }))
        }),
        b
    }
    c = c || "";
    var f = document.getElementById("toast-container");
    null === f && (f = document.createElement("div"),
    f.id = "toast-container",
    document.body.appendChild(f));
    var g = e(a);
    a && f.appendChild(g),
    g.style.opacity = 0,
    Vel(g, {
        translateY: "-35px",
        opacity: 1
    }, {
        duration: 300,
        easing: "easeOutCubic",
        queue: !1
    });
    var h, i = b;
    null != i && (h = setInterval(function() {
        null === g.parentNode && window.clearInterval(h),
        g.classList.contains("panning") || (i -= 20),
        i <= 0 && (Vel(g, {
            opacity: 0,
            marginTop: "-40px"
        }, {
            duration: 375,
            easing: "easeOutExpo",
            queue: !1,
            complete: function() {
                "function" == typeof d && d(),
                this[0].parentNode.removeChild(this[0])
            }
        }),
        window.clearInterval(h))
    }, 20))
}
,
function(a) {
    var b = {
        init: function(b) {
            var c = {
                menuWidth: 300,
                edge: "left",
                closeOnClick: !1,
                draggable: !0
            };
            b = a.extend(c, b),
            a(this).each(function() {
                var c = a(this)
                  , d = c.attr("data-activates")
                  , e = a("#" + d);
                300 != b.menuWidth && e.css("width", b.menuWidth);
                var f = a('.drag-target[data-sidenav="' + d + '"]');
                b.draggable ? (f.length && f.remove(),
                f = a('<div class="drag-target"></div>').attr("data-sidenav", d),
                a("body").append(f)) : f = a(),
                "left" == b.edge ? (e.css("transform", "translateX(-100%)"),
                f.css({
                    left: 0
                })) : (e.addClass("right-aligned").css("transform", "translateX(100%)"),
                f.css({
                    right: 0
                })),
                e.hasClass("fixed") && window.innerWidth > 992 && e.css("transform", "translateX(0)"),
                e.hasClass("fixed") && a(window).resize(function() {
                    window.innerWidth > 992 ? 0 !== a("#sidenav-overlay").length && i ? g(!0) : e.css("transform", "translateX(0%)") : i === !1 && ("left" === b.edge ? e.css("transform", "translateX(-100%)") : e.css("transform", "translateX(100%)"))
                }),
                b.closeOnClick === !0 && e.on("click.itemclick", "a:not(.collapsible-header)", function() {
                    g()
                });
                var g = function(c) {
                    h = !1,
                    i = !1,
                    a("body").css({
                        overflow: "",
                        width: ""
                    }),
                    a("#sidenav-overlay").velocity({
                        opacity: 0
                    }, {
                        duration: 200,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function() {
                            a(this).remove()
                        }
                    }),
                    "left" === b.edge ? (f.css({
                        width: "",
                        right: "",
                        left: "0"
                    }),
                    e.velocity({
                        translateX: "-100%"
                    }, {
                        duration: 200,
                        queue: !1,
                        easing: "easeOutCubic",
                        complete: function() {
                            c === !0 && (e.removeAttr("style"),
                            e.css("width", b.menuWidth))
                        }
                    })) : (f.css({
                        width: "",
                        right: "0",
                        left: ""
                    }),
                    e.velocity({
                        translateX: "100%"
                    }, {
                        duration: 200,
                        queue: !1,
                        easing: "easeOutCubic",
                        complete: function() {
                            c === !0 && (e.removeAttr("style"),
                            e.css("width", b.menuWidth))
                        }
                    }))
                }
                  , h = !1
                  , i = !1;
                b.draggable && (f.on("click", function() {
                    i && g()
                }),
                f.hammer({
                    prevent_default: !1
                }).bind("pan", function(c) {
                    if ("touch" == c.gesture.pointerType) {
                        var d = (c.gesture.direction,
                        c.gesture.center.x)
                          , f = (c.gesture.center.y,
                        c.gesture.velocityX,
                        a("body"))
                          , h = a("#sidenav-overlay")
                          , j = f.innerWidth();
                        if (f.css("overflow", "hidden"),
                        f.width(j),
                        0 === h.length && (h = a('<div id="sidenav-overlay"></div>'),
                        h.css("opacity", 0).click(function() {
                            g()
                        }),
                        a("body").append(h)),
                        "left" === b.edge && (d > b.menuWidth ? d = b.menuWidth : d < 0 && (d = 0)),
                        "left" === b.edge)
                            d < b.menuWidth / 2 ? i = !1 : d >= b.menuWidth / 2 && (i = !0),
                            e.css("transform", "translateX(" + (d - b.menuWidth) + "px)");
                        else {
                            d < window.innerWidth - b.menuWidth / 2 ? i = !0 : d >= window.innerWidth - b.menuWidth / 2 && (i = !1);
                            var k = d - b.menuWidth / 2;
                            k < 0 && (k = 0),
                            e.css("transform", "translateX(" + k + "px)")
                        }
                        var l;
                        "left" === b.edge ? (l = d / b.menuWidth,
                        h.velocity({
                            opacity: l
                        }, {
                            duration: 10,
                            queue: !1,
                            easing: "easeOutQuad"
                        })) : (l = Math.abs((d - window.innerWidth) / b.menuWidth),
                        h.velocity({
                            opacity: l
                        }, {
                            duration: 10,
                            queue: !1,
                            easing: "easeOutQuad"
                        }))
                    }
                }).bind("panend", function(c) {
                    if ("touch" == c.gesture.pointerType) {
                        var d = a("#sidenav-overlay")
                          , g = c.gesture.velocityX
                          , j = c.gesture.center.x
                          , k = j - b.menuWidth
                          , l = j - b.menuWidth / 2;
                        k > 0 && (k = 0),
                        l < 0 && (l = 0),
                        h = !1,
                        "left" === b.edge ? i && g <= .3 || g < -.5 ? (0 !== k && e.velocity({
                            translateX: [0, k]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        d.velocity({
                            opacity: 1
                        }, {
                            duration: 50,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        f.css({
                            width: "50%",
                            right: 0,
                            left: ""
                        }),
                        i = !0) : (!i || g > .3) && (a("body").css({
                            overflow: "",
                            width: ""
                        }),
                        e.velocity({
                            translateX: [-1 * b.menuWidth - 10, k]
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        d.velocity({
                            opacity: 0
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function() {
                                a(this).remove()
                            }
                        }),
                        f.css({
                            width: "10px",
                            right: "",
                            left: 0
                        })) : i && g >= -.3 || g > .5 ? (0 !== l && e.velocity({
                            translateX: [0, l]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        d.velocity({
                            opacity: 1
                        }, {
                            duration: 50,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        f.css({
                            width: "50%",
                            right: "",
                            left: 0
                        }),
                        i = !0) : (!i || g < -.3) && (a("body").css({
                            overflow: "",
                            width: ""
                        }),
                        e.velocity({
                            translateX: [b.menuWidth + 10, l]
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        d.velocity({
                            opacity: 0
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function() {
                                a(this).remove()
                            }
                        }),
                        f.css({
                            width: "10px",
                            right: 0,
                            left: ""
                        }))
                    }
                })),
                c.off("click.sidenav").on("click.sidenav", function() {
                    if (i === !0)
                        i = !1,
                        h = !1,
                        g();
                    else {
                        var c = a("body")
                          , d = a('<div id="sidenav-overlay"></div>')
                          , j = c.innerWidth();
                        c.css("overflow", "hidden"),
                        c.width(j),
                        a("body").append(f),
                        "left" === b.edge ? (f.css({
                            width: "50%",
                            right: 0,
                            left: ""
                        }),
                        e.velocity({
                            translateX: [0, -1 * b.menuWidth]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        })) : (f.css({
                            width: "50%",
                            right: "",
                            left: 0
                        }),
                        e.velocity({
                            translateX: [0, b.menuWidth]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        })),
                        d.css("opacity", 0).click(function() {
                            i = !1,
                            h = !1,
                            g(),
                            d.velocity({
                                opacity: 0
                            }, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad",
                                complete: function() {
                                    a(this).remove()
                                }
                            })
                        }),
                        a("body").append(d),
                        d.velocity({
                            opacity: 1
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function() {
                                i = !0,
                                h = !1
                            }
                        })
                    }
                    return !1
                })
            })
        },
        destroy: function() {
            var b = a("#sidenav-overlay")
              , c = a('.drag-target[data-sidenav="' + a(this).attr("data-activates") + '"]');
            b.trigger("click"),
            c.remove(),
            a(this).off("click"),
            b.remove()
        },
        show: function() {
            this.trigger("click")
        },
        hide: function() {
            a("#sidenav-overlay").trigger("click")
        }
    };
    a.fn.sideNav = function(c) {
        return b[c] ? b[c].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof c && c ? void a.error("Method " + c + " does not exist on jQuery.sideNav") : b.init.apply(this, arguments)
    }
}(jQuery),
function(a) {
    function b(b, c, d, e) {
        var g = a();
        return a.each(f, function(a, f) {
            if (f.height() > 0) {
                var h = f.offset().top
                  , i = f.offset().left
                  , j = i + f.width()
                  , k = h + f.height()
                  , l = !(i > c || j < e || h > d || k < b);
                l && g.push(f)
            }
        }),
        g
    }
    function c(c) {
        ++i;
        var d = e.scrollTop()
          , f = e.scrollLeft()
          , h = f + e.width()
          , k = d + e.height()
          , l = b(d + j.top + c || 200, h + j.right, k + j.bottom, f + j.left);
        a.each(l, function(a, b) {
            var c = b.data("scrollSpy:ticks");
            "number" != typeof c && b.triggerHandler("scrollSpy:enter"),
            b.data("scrollSpy:ticks", i)
        }),
        a.each(g, function(a, b) {
            var c = b.data("scrollSpy:ticks");
            "number" == typeof c && c !== i && (b.triggerHandler("scrollSpy:exit"),
            b.data("scrollSpy:ticks", null))
        }),
        g = l
    }
    function d() {
        e.trigger("scrollSpy:winSize")
    }
    var e = a(window)
      , f = []
      , g = []
      , h = !1
      , i = 0
      , j = {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
    };
    a.scrollSpy = function(b, d) {
        var g = {
            throttle: 100,
            scrollOffset: 200
        };
        d = a.extend(g, d);
        var i = [];
        b = a(b),
        b.each(function(b, c) {
            f.push(a(c)),
            a(c).data("scrollSpy:id", b),
            a('a[href="#' + a(c).attr("id") + '"]').click(function(b) {
                b.preventDefault();
                var c = a(Materialize.escapeHash(this.hash)).offset().top + 1;
                a("html, body").animate({
                    scrollTop: c - d.scrollOffset
                }, {
                    duration: 400,
                    queue: !1,
                    easing: "easeOutCubic"
                })
            })
        }),
        j.top = d.offsetTop || 0,
        j.right = d.offsetRight || 0,
        j.bottom = d.offsetBottom || 0,
        j.left = d.offsetLeft || 0;
        var k = Materialize.throttle(function() {
            c(d.scrollOffset)
        }, d.throttle || 100)
          , l = function() {
            a(document).ready(k)
        };
        return h || (e.on("scroll", l),
        e.on("resize", l),
        h = !0),
        setTimeout(l, 0),
        b.on("scrollSpy:enter", function() {
            i = a.grep(i, function(a) {
                return 0 != a.height()
            });
            var b = a(this);
            i[0] ? (a('a[href="#' + i[0].attr("id") + '"]').removeClass("active"),
            b.data("scrollSpy:id") < i[0].data("scrollSpy:id") ? i.unshift(a(this)) : i.push(a(this))) : i.push(a(this)),
            a('a[href="#' + i[0].attr("id") + '"]').addClass("active")
        }),
        b.on("scrollSpy:exit", function() {
            if (i = a.grep(i, function(a) {
                return 0 != a.height()
            }),
            i[0]) {
                a('a[href="#' + i[0].attr("id") + '"]').removeClass("active");
                var b = a(this);
                i = a.grep(i, function(a) {
                    return a.attr("id") != b.attr("id")
                }),
                i[0] && a('a[href="#' + i[0].attr("id") + '"]').addClass("active")
            }
        }),
        b
    }
    ,
    a.winSizeSpy = function(b) {
        return a.winSizeSpy = function() {
            return e
        }
        ,
        b = b || {
            throttle: 100
        },
        e.on("resize", Materialize.throttle(d, b.throttle || 100))
    }
    ,
    a.fn.scrollSpy = function(b) {
        return a.scrollSpy(a(this), b)
    }
}(jQuery),
function(a) {
    a(document).ready(function() {
        function b(b) {
            var c = b.css("font-family")
              , d = b.css("font-size")
              , f = b.css("line-height");
            d && e.css("font-size", d),
            c && e.css("font-family", c),
            f && e.css("line-height", f),
            "off" === b.attr("wrap") && e.css("overflow-wrap", "normal").css("white-space", "pre"),
            e.text(b.val() + "\n");
            var g = e.html().replace(/\n/g, "<br>");
            e.html(g),
            b.is(":visible") ? e.css("width", b.width()) : e.css("width", a(window).width() / 2),
            b.data("original-height") <= e.height() ? b.css("height", e.height()) : b.val().length < b.data("previous-length") && b.css("height", b.data("original-height")),
            b.data("previous-length", b.val().length)
        }
        Materialize.updateTextFields = function() {
            var b = "input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], textarea";
            a(b).each(function(b, c) {
                var d = a(this);
                a(c).val().length > 0 || c.autofocus || void 0 !== d.attr("placeholder") ? d.siblings("label").addClass("active") : a(c)[0].validity ? d.siblings("label").toggleClass("active", a(c)[0].validity.badInput === !0) : d.siblings("label").removeClass("active")
            })
        }
        ;
        var c = "input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], textarea";
        a(document).on("change", c, function() {
            0 === a(this).val().length && void 0 === a(this).attr("placeholder") || a(this).siblings("label").addClass("active"),
            validate_field(a(this))
        }),
        a(document).ready(function() {
            Materialize.updateTextFields()
        }),
        a(document).on("reset", function(b) {
            var d = a(b.target);
            d.is("form") && (d.find(c).removeClass("valid").removeClass("invalid"),
            d.find(c).each(function() {
                "" === a(this).attr("value") && a(this).siblings("label").removeClass("active")
            }),
            d.find("select.initialized").each(function() {
                var a = d.find("option[selected]").text();
                d.siblings("input.select-dropdown").val(a)
            }))
        }),
        a(document).on("focus", c, function() {
            a(this).siblings("label, .prefix").addClass("active")
        }),
        a(document).on("blur", c, function() {
            var b = a(this)
              , c = ".prefix";
            0 === b.val().length && b[0].validity.badInput !== !0 && void 0 === b.attr("placeholder") && (c += ", label"),
            b.siblings(c).removeClass("active"),
            validate_field(b)
        }),
        window.validate_field = function(a) {
            var b = void 0 !== a.attr("data-length")
              , c = parseInt(a.attr("data-length"))
              , d = a.val().length;
            0 === a.val().length && a[0].validity.badInput === !1 ? a.hasClass("validate") && (a.removeClass("valid"),
            a.removeClass("invalid")) : a.hasClass("validate") && (a.is(":valid") && b && d <= c || a.is(":valid") && !b ? (a.removeClass("invalid"),
            a.addClass("valid")) : (a.removeClass("valid"),
            a.addClass("invalid")))
        }
        ;
        var d = "input[type=radio], input[type=checkbox]";
        a(document).on("keyup.radio", d, function(b) {
            if (9 === b.which) {
                a(this).addClass("tabbed");
                var c = a(this);
                return void c.one("blur", function(b) {
                    a(this).removeClass("tabbed")
                })
            }
        });
        var e = a(".hiddendiv").first();
        e.length || (e = a('<div class="hiddendiv common"></div>'),
        a("body").append(e));
        var f = ".materialize-textarea";
        a(f).each(function() {
            var b = a(this);
            b.data("original-height", b.height()),
            b.data("previous-length", b.val().length)
        }),
        a("body").on("keyup keydown autoresize", f, function() {
            b(a(this))
        }),
        a(document).on("change", '.file-field input[type="file"]', function() {
            for (var b = a(this).closest(".file-field"), c = b.find("input.file-path"), d = a(this)[0].files, e = [], f = 0; f < d.length; f++)
                e.push(d[f].name);
            c.val(e.join(", ")),
            c.trigger("change")
        });
        var g = "input[type=range]"
          , h = !1;
        a(g).each(function() {
            var b = a('<span class="thumb"><span class="value"></span></span>');
            a(this).after(b)
        });
        var i = function(a) {
            var b = parseInt(a.parent().css("padding-left"))
              , c = -7 + b + "px";
            a.velocity({
                height: "30px",
                width: "30px",
                top: "-30px",
                marginLeft: c
            }, {
                duration: 300,
                easing: "easeOutExpo"
            })
        }
          , j = function(a) {
            var b = a.width() - 15
              , c = parseFloat(a.attr("max"))
              , d = parseFloat(a.attr("min"))
              , e = (parseFloat(a.val()) - d) / (c - d);
            return e * b
        }
          , k = ".range-field";
        a(document).on("change", g, function(b) {
            var c = a(this).siblings(".thumb");
            c.find(".value").html(a(this).val()),
            c.hasClass("active") || i(c);
            var d = j(a(this));
            c.addClass("active").css("left", d)
        }),
        a(document).on("mousedown touchstart", g, function(b) {
            var c = a(this).siblings(".thumb");
            if (c.length <= 0 && (c = a('<span class="thumb"><span class="value"></span></span>'),
            a(this).after(c)),
            c.find(".value").html(a(this).val()),
            h = !0,
            a(this).addClass("active"),
            c.hasClass("active") || i(c),
            "input" !== b.type) {
                var d = j(a(this));
                c.addClass("active").css("left", d)
            }
        }),
        a(document).on("mouseup touchend", k, function() {
            h = !1,
            a(this).removeClass("active")
        }),
        a(document).on("input mousemove touchmove", k, function(b) {
            var c = a(this).children(".thumb")
              , d = a(this).find(g);
            if (h) {
                c.hasClass("active") || i(c);
                var e = j(d);
                c.addClass("active").css("left", e),
                c.find(".value").html(c.siblings(g).val())
            }
        }),
        a(document).on("mouseout touchleave", k, function() {
            if (!h) {
                var b = a(this).children(".thumb")
                  , c = parseInt(a(this).css("padding-left"))
                  , d = 7 + c + "px";
                b.hasClass("active") && b.velocity({
                    height: "0",
                    width: "0",
                    top: "10px",
                    marginLeft: d
                }, {
                    duration: 100
                }),
                b.removeClass("active")
            }
        }),
        a.fn.autocomplete = function(b) {
            var c = {
                data: {},
                limit: 1 / 0,
                onAutocomplete: null,
                minLength: 1
            };
            return b = a.extend(c, b),
            this.each(function() {
                var c, d = a(this), e = b.data, f = 0, g = -1, h = d.closest(".input-field");
                if (!a.isEmptyObject(e)) {
                    var i, j = a('<ul class="autocomplete-content dropdown-content"></ul>');
                    h.length ? (i = h.children(".autocomplete-content.dropdown-content").first(),
                    i.length || h.append(j)) : (i = d.next(".autocomplete-content.dropdown-content"),
                    i.length || d.after(j)),
                    i.length && (j = i);
                    var k = function(a, b) {
                        var c = b.find("img")
                          , d = b.text().toLowerCase().indexOf("" + a.toLowerCase())
                          , e = d + a.length - 1
                          , f = b.text().slice(0, d)
                          , g = b.text().slice(d, e + 1)
                          , h = b.text().slice(e + 1);
                        b.html("<span>" + f + "<span class='highlight'>" + g + "</span>" + h + "</span>"),
                        c.length && b.prepend(c)
                    }
                      , l = function() {
                        g = -1,
                        j.find(".active").removeClass("active")
                    }
                      , m = function() {
                        j.empty(),
                        l(),
                        c = void 0
                    };
                    d.off("blur.autocomplete").on("blur.autocomplete", function() {
                        m()
                    }),
                    d.off("keyup.autocomplete focus.autocomplete").on("keyup.autocomplete focus.autocomplete", function(g) {
                        f = 0;
                        var h = d.val().toLowerCase();
                        if (13 !== g.which && 38 !== g.which && 40 !== g.which) {
                            if (c !== h && (m(),
                            h.length >= b.minLength))
                                for (var i in e)
                                    if (e.hasOwnProperty(i) && i.toLowerCase().indexOf(h) !== -1 && i.toLowerCase() !== h) {
                                        if (f >= b.limit)
                                            break;
                                        var l = a("<li></li>");
                                        e[i] ? l.append('<img src="' + e[i] + '" class="right circle"><span>' + i + "</span>") : l.append("<span>" + i + "</span>"),
                                        j.append(l),
                                        k(h, l),
                                        f++
                                    }
                            c = h
                        }
                    }),
                    d.off("keydown.autocomplete").on("keydown.autocomplete", function(a) {
                        var b, c = a.which, d = j.children("li").length, e = j.children(".active").first();
                        return 13 === c && g >= 0 ? (b = j.children("li").eq(g),
                        void (b.length && (b.trigger("mousedown.autocomplete"),
                        a.preventDefault()))) : void (38 !== c && 40 !== c || (a.preventDefault(),
                        38 === c && g > 0 && g--,
                        40 === c && g < d - 1 && g++,
                        e.removeClass("active"),
                        g >= 0 && j.children("li").eq(g).addClass("active")))
                    }),
                    j.on("mousedown.autocomplete touchstart.autocomplete", "li", function() {
                        var c = a(this).text().trim();
                        d.val(c),
                        d.trigger("change"),
                        m(),
                        "function" == typeof b.onAutocomplete && b.onAutocomplete.call(this, c)
                    })
                }
            })
        }
    }),
    a.fn.material_select = function(b) {
        function c(a, b, c) {
            var e = a.indexOf(b)
              , f = e === -1;
            return f ? a.push(b) : a.splice(e, 1),
            c.siblings("ul.dropdown-content").find("li:not(.optgroup)").eq(b).toggleClass("active"),
            c.find("option").eq(b).prop("selected", f),
            d(a, c),
            f
        }
        function d(a, b) {
            for (var c = "", d = 0, e = a.length; d < e; d++) {
                var f = b.find("option").eq(a[d]).text();
                c += 0 === d ? f : ", " + f
            }
            "" === c && (c = b.find("option:disabled").eq(0).text()),
            b.siblings("input.select-dropdown").val(c)
        }
        a(this).each(function() {
            var d = a(this);
            if (!d.hasClass("browser-default")) {
                var e = !!d.attr("multiple")
                  , f = d.data("select-id");
                if (f && (d.parent().find("span.caret").remove(),
                d.parent().find("input").remove(),
                d.unwrap(),
                a("ul#select-options-" + f).remove()),
                "destroy" === b)
                    return void d.data("select-id", null).removeClass("initialized");
                var g = Materialize.guid();
                d.data("select-id", g);
                var h = a('<div class="select-wrapper"></div>');
                h.addClass(d.attr("class"));
                var i = a('<ul id="select-options-' + g + '" class="dropdown-content select-dropdown ' + (e ? "multiple-select-dropdown" : "") + '"></ul>')
                  , j = d.children("option, optgroup")
                  , k = []
                  , l = !1
                  , m = d.find("option:selected").html() || d.find("option:first").html() || ""
                  , n = function(b, c, d) {
                    var f = c.is(":disabled") ? "disabled " : ""
                      , g = "optgroup-option" === d ? "optgroup-option " : ""
                      , h = e ? '<input type="checkbox"' + f + "/><label></label>" : ""
                      , j = c.data("icon")
                      , k = c.attr("class");
                    if (j) {
                        var l = "";
                        return k && (l = ' class="' + k + '"'),
                        i.append(a('<li class="' + f + g + '"><img alt="" src="' + j + '"' + l + "><span>" + h + c.html() + "</span></li>")),
                        !0
                    }
                    i.append(a('<li class="' + f + g + '"><span>' + h + c.html() + "</span></li>"))
                };
                j.length && j.each(function() {
                    if (a(this).is("option"))
                        e ? n(d, a(this), "multiple") : n(d, a(this));
                    else if (a(this).is("optgroup")) {
                        var b = a(this).children("option");
                        i.append(a('<li class="optgroup"><span>' + a(this).attr("label") + "</span></li>")),
                        b.each(function() {
                            n(d, a(this), "optgroup-option")
                        })
                    }
                }),
                i.find("li:not(.optgroup)").each(function(f) {
                    a(this).click(function(g) {
                        if (!a(this).hasClass("disabled") && !a(this).hasClass("optgroup")) {
                            var h = !0;
                            e ? (a('input[type="checkbox"]', this).prop("checked", function(a, b) {
                                return !b
                            }),
                            h = c(k, f, d),
                            q.trigger("focus")) : (i.find("li").removeClass("active"),
                            a(this).toggleClass("active"),
                            q.val(a(this).text())),
                            r(i, a(this)),
                            d.find("option").eq(f).prop("selected", h),
                            d.trigger("change"),
                            "undefined" != typeof b && b()
                        }
                        g.stopPropagation()
                    })
                }),
                d.wrap(h);
                var o = a('<span class="caret">&#9660;</span>');
                d.is(":disabled") && o.addClass("disabled");
                var p = m.replace(/"/g, "&quot;")
                  , q = a('<input type="text" class="select-dropdown" readonly="true" ' + (d.is(":disabled") ? "disabled" : "") + ' data-activates="select-options-' + g + '" value="' + p + '"/>');
                d.before(q),
                q.before(o),
                q.after(i),
                d.is(":disabled") || q.dropdown({
                    hover: !1
                }),
                d.attr("tabindex") && a(q[0]).attr("tabindex", d.attr("tabindex")),
                d.addClass("initialized"),
                q.on({
                    focus: function() {
                        if (a("ul.select-dropdown").not(i[0]).is(":visible") && a("input.select-dropdown").trigger("close"),
                        !i.is(":visible")) {
                            a(this).trigger("open", ["focus"]);
                            var b = a(this).val();
                            e && b.indexOf(",") >= 0 && (b = b.split(",")[0]);
                            var c = i.find("li").filter(function() {
                                return a(this).text().toLowerCase() === b.toLowerCase()
                            })[0];
                            r(i, c, !0)
                        }
                    },
                    click: function(a) {
                        a.stopPropagation()
                    }
                }),
                q.on("blur", function() {
                    e || a(this).trigger("close"),
                    i.find("li.selected").removeClass("selected")
                }),
                i.hover(function() {
                    l = !0
                }, function() {
                    l = !1
                }),
                a(window).on({
                    click: function() {
                        e && (l || q.trigger("close"))
                    }
                }),
                e && d.find("option:selected:not(:disabled)").each(function() {
                    var b = a(this).index();
                    c(k, b, d),
                    i.find("li").eq(b).find(":checkbox").prop("checked", !0)
                });
                var r = function(b, c, d) {
                    if (c) {
                        b.find("li.selected").removeClass("selected");
                        var f = a(c);
                        f.addClass("selected"),
                        e && !d || i.scrollTo(f)
                    }
                }
                  , s = []
                  , t = function(b) {
                    if (9 == b.which)
                        return void q.trigger("close");
                    if (40 == b.which && !i.is(":visible"))
                        return void q.trigger("open");
                    if (13 != b.which || i.is(":visible")) {
                        b.preventDefault();
                        var c = String.fromCharCode(b.which).toLowerCase()
                          , d = [9, 13, 27, 38, 40];
                        if (c && d.indexOf(b.which) === -1) {
                            s.push(c);
                            var f = s.join("")
                              , g = i.find("li").filter(function() {
                                return 0 === a(this).text().toLowerCase().indexOf(f)
                            })[0];
                            g && r(i, g)
                        }
                        if (13 == b.which) {
                            var h = i.find("li.selected:not(.disabled)")[0];
                            h && (a(h).trigger("click"),
                            e || q.trigger("close"))
                        }
                        40 == b.which && (g = i.find("li.selected").length ? i.find("li.selected").next("li:not(.disabled)")[0] : i.find("li:not(.disabled)")[0],
                        r(i, g)),
                        27 == b.which && q.trigger("close"),
                        38 == b.which && (g = i.find("li.selected").prev("li:not(.disabled)")[0],
                        g && r(i, g)),
                        setTimeout(function() {
                            s = []
                        }, 1e3)
                    }
                };
                q.on("keydown", t)
            }
        })
    }
}(jQuery),
function(a) {
    var b = {
        init: function(b) {
            var c = {
                indicators: !0,
                height: 280,
                transition: 500,
                interval: 6e3
            };
            return b = a.extend(c, b),
            this.each(function() {
                function c(a, b) {
                    a.hasClass("center-align") ? a.velocity({
                        opacity: 0,
                        translateY: -100
                    }, {
                        duration: b,
                        queue: !1
                    }) : a.hasClass("right-align") ? a.velocity({
                        opacity: 0,
                        translateX: 100
                    }, {
                        duration: b,
                        queue: !1
                    }) : a.hasClass("left-align") && a.velocity({
                        opacity: 0,
                        translateX: -100
                    }, {
                        duration: b,
                        queue: !1
                    })
                }
                function d(a) {
                    a >= j.length ? a = 0 : a < 0 && (a = j.length - 1),
                    k = i.find(".active").index(),
                    k != a && (e = j.eq(k),
                    $caption = e.find(".caption"),
                    e.removeClass("active"),
                    e.velocity({
                        opacity: 0
                    }, {
                        duration: b.transition,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function() {
                            j.not(".active").velocity({
                                opacity: 0,
                                translateX: 0,
                                translateY: 0
                            }, {
                                duration: 0,
                                queue: !1
                            })
                        }
                    }),
                    c($caption, b.transition),
                    b.indicators && f.eq(k).removeClass("active"),
                    j.eq(a).velocity({
                        opacity: 1
                    }, {
                        duration: b.transition,
                        queue: !1,
                        easing: "easeOutQuad"
                    }),
                    j.eq(a).find(".caption").velocity({
                        opacity: 1,
                        translateX: 0,
                        translateY: 0
                    }, {
                        duration: b.transition,
                        delay: b.transition,
                        queue: !1,
                        easing: "easeOutQuad"
                    }),
                    j.eq(a).addClass("active"),
                    b.indicators && f.eq(a).addClass("active"))
                }
                var e, f, g, h = a(this), i = h.find("ul.slides").first(), j = i.find("> li"), k = i.find(".active").index();
                k != -1 && (e = j.eq(k)),
                h.hasClass("fullscreen") || (b.indicators ? h.height(b.height + 40) : h.height(b.height),
                i.height(b.height)),
                j.find(".caption").each(function() {
                    c(a(this), 0)
                }),
                j.find("img").each(function() {
                    var b = "data:image/gif;base64,R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";
                    a(this).attr("src") !== b && (a(this).css("background-image", "url(" + a(this).attr("src") + ")"),
                    a(this).attr("src", b))
                }),
                b.indicators && (f = a('<ul class="indicators"></ul>'),
                j.each(function(c) {
                    var e = a('<li class="indicator-item"></li>');
                    e.click(function() {
                        var c = i.parent()
                          , e = c.find(a(this)).index();
                        d(e),
                        clearInterval(g),
                        g = setInterval(function() {
                            k = i.find(".active").index(),
                            j.length == k + 1 ? k = 0 : k += 1,
                            d(k)
                        }, b.transition + b.interval)
                    }),
                    f.append(e)
                }),
                h.append(f),
                f = h.find("ul.indicators").find("li.indicator-item")),
                e ? e.show() : (j.first().addClass("active").velocity({
                    opacity: 1
                }, {
                    duration: b.transition,
                    queue: !1,
                    easing: "easeOutQuad"
                }),
                k = 0,
                e = j.eq(k),
                b.indicators && f.eq(k).addClass("active")),
                e.find("img").each(function() {
                    e.find(".caption").velocity({
                        opacity: 1,
                        translateX: 0,
                        translateY: 0
                    }, {
                        duration: b.transition,
                        queue: !1,
                        easing: "easeOutQuad"
                    })
                }),
                g = setInterval(function() {
                    k = i.find(".active").index(),
                    d(k + 1)
                }, b.transition + b.interval);
                var l = !1
                  , m = !1
                  , n = !1;
                h.hammer({
                    prevent_default: !1
                }).bind("pan", function(a) {
                    if ("touch" === a.gesture.pointerType) {
                        clearInterval(g);
                        var b = a.gesture.direction
                          , c = a.gesture.deltaX
                          , d = a.gesture.velocityX
                          , e = a.gesture.velocityY;
                        $curr_slide = i.find(".active"),
                        Math.abs(d) > Math.abs(e) && $curr_slide.velocity({
                            translateX: c
                        }, {
                            duration: 50,
                            queue: !1,
                            easing: "easeOutQuad"
                        }),
                        4 === b && (c > h.innerWidth() / 2 || d < -.65) ? n = !0 : 2 === b && (c < -1 * h.innerWidth() / 2 || d > .65) && (m = !0);
                        var f;
                        m && (f = $curr_slide.next(),
                        0 === f.length && (f = j.first()),
                        f.velocity({
                            opacity: 1
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        })),
                        n && (f = $curr_slide.prev(),
                        0 === f.length && (f = j.last()),
                        f.velocity({
                            opacity: 1
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }))
                    }
                }).bind("panend", function(a) {
                    "touch" === a.gesture.pointerType && ($curr_slide = i.find(".active"),
                    l = !1,
                    curr_index = i.find(".active").index(),
                    !n && !m || j.length <= 1 ? $curr_slide.velocity({
                        translateX: 0
                    }, {
                        duration: 300,
                        queue: !1,
                        easing: "easeOutQuad"
                    }) : m ? (d(curr_index + 1),
                    $curr_slide.velocity({
                        translateX: -1 * h.innerWidth()
                    }, {
                        duration: 300,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function() {
                            $curr_slide.velocity({
                                opacity: 0,
                                translateX: 0
                            }, {
                                duration: 0,
                                queue: !1
                            })
                        }
                    })) : n && (d(curr_index - 1),
                    $curr_slide.velocity({
                        translateX: h.innerWidth()
                    }, {
                        duration: 300,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function() {
                            $curr_slide.velocity({
                                opacity: 0,
                                translateX: 0
                            }, {
                                duration: 0,
                                queue: !1
                            })
                        }
                    })),
                    m = !1,
                    n = !1,
                    clearInterval(g),
                    g = setInterval(function() {
                        k = i.find(".active").index(),
                        j.length == k + 1 ? k = 0 : k += 1,
                        d(k)
                    }, b.transition + b.interval))
                }),
                h.on("Pause", function() {
                    clearInterval(g)
                }),
                h.on("sliderStart", function() {
                    clearInterval(g),
                    g = setInterval(function() {
                        k = i.find(".active").index(),
                        j.length == k + 1 ? k = 0 : k += 1,
                        d(k)
                    }, b.transition + b.interval)
                }),
                h.on("sliderNext", function() {
                    k = i.find(".active").index(),
                    d(k + 1)
                }),
                h.on("sliderPrev", function() {
                    k = i.find(".active").index(),
                    d(k - 1)
                })
            })
        },
        pause: function() {
            a(this).trigger("sliderPause")
        },
        start: function() {
            a(this).trigger("sliderStart")
        },
        next: function() {
            a(this).trigger("sliderNext")
        },
        prev: function() {
            a(this).trigger("sliderPrev")
        }
    };
    a.fn.slider = function(c) {
        return b[c] ? b[c].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof c && c ? void a.error("Method " + c + " does not exist on jQuery.tooltip") : b.init.apply(this, arguments)
    }
}(jQuery),
function(a) {
    a(document).ready(function() {
        a(document).on("click.card", ".card", function(b) {
            a(this).find("> .card-reveal").length && (a(b.target).is(a(".card-reveal .card-title")) || a(b.target).is(a(".card-reveal .card-title i")) ? a(this).find(".card-reveal").velocity({
                translateY: 0
            }, {
                duration: 225,
                queue: !1,
                easing: "easeInOutQuad",
                complete: function() {
                    a(this).css({
                        display: "none"
                    })
                }
            }) : (a(b.target).is(a(".card .activator")) || a(b.target).is(a(".card .activator i"))) && (a(b.target).closest(".card").css("overflow", "hidden"),
            a(this).find(".card-reveal").css({
                display: "block"
            }).velocity("stop", !1).velocity({
                translateY: "-100%"
            }, {
                duration: 300,
                queue: !1,
                easing: "easeInOutQuad"
            })))
        })
    })
}(jQuery),
function(a) {
    var b = {
        data: [],
        placeholder: "",
        secondaryPlaceholder: "",
        autocompleteOptions: {}
    };
    a(document).ready(function() {
        a(document).on("click", ".chip .close", function(b) {
            var c = a(this).closest(".chips");
            c.attr("data-initialized") || a(this).closest(".chip").remove()
        })
    }),
    a.fn.material_chip = function(c) {
        var d = this;
        if (this.$el = a(this),
        this.$document = a(document),
        this.SELS = {
            CHIPS: ".chips",
            CHIP: ".chip",
            INPUT: "input",
            DELETE: ".material-icons",
            SELECTED_CHIP: ".selected"
        },
        "data" === c)
            return this.$el.data("chips");
        var e = a.extend({}, b, c);
        d.hasAutocomplete = !a.isEmptyObject(e.autocompleteOptions.data),
        this.init = function() {
            var b = 0;
            d.$el.each(function() {
                var c = a(this)
                  , f = Materialize.guid();
                d.chipId = f,
                e.data && e.data instanceof Array || (e.data = []),
                c.data("chips", e.data),
                c.attr("data-index", b),
                c.attr("data-initialized", !0),
                c.hasClass(d.SELS.CHIPS) || c.addClass("chips"),
                d.chips(c, f),
                b++
            })
        }
        ,
        this.handleEvents = function() {
            var b = d.SELS;
            d.$document.off("click.chips-focus", b.CHIPS).on("click.chips-focus", b.CHIPS, function(c) {
                a(c.target).find(b.INPUT).focus()
            }),
            d.$document.off("click.chips-select", b.CHIP).on("click.chips-select", b.CHIP, function(c) {
                var e = a(c.target);
                if (e.length) {
                    var f = e.hasClass("selected")
                      , g = e.closest(b.CHIPS);
                    a(b.CHIP).removeClass("selected"),
                    f || d.selectChip(e.index(), g)
                }
            }),
            d.$document.off("keydown.chips").on("keydown.chips", function(c) {
                if (!a(c.target).is("input, textarea")) {
                    var e, f = d.$document.find(b.CHIP + b.SELECTED_CHIP), g = f.closest(b.CHIPS), h = f.siblings(b.CHIP).length;
                    if (f.length)
                        if (8 === c.which || 46 === c.which) {
                            c.preventDefault(),
                            e = f.index(),
                            d.deleteChip(e, g);
                            var i = null;
                            e + 1 < h ? i = e : e !== h && e + 1 !== h || (i = h - 1),
                            i < 0 && (i = null),
                            null !== i && d.selectChip(i, g),
                            h || g.find("input").focus()
                        } else if (37 === c.which) {
                            if (e = f.index() - 1,
                            e < 0)
                                return;
                            a(b.CHIP).removeClass("selected"),
                            d.selectChip(e, g)
                        } else if (39 === c.which) {
                            if (e = f.index() + 1,
                            a(b.CHIP).removeClass("selected"),
                            e > h)
                                return void g.find("input").focus();
                            d.selectChip(e, g)
                        }
                }
            }),
            d.$document.off("focusin.chips", b.CHIPS + " " + b.INPUT).on("focusin.chips", b.CHIPS + " " + b.INPUT, function(c) {
                var d = a(c.target).closest(b.CHIPS);
                d.addClass("focus"),
                d.siblings("label, .prefix").addClass("active"),
                a(b.CHIP).removeClass("selected")
            }),
            d.$document.off("focusout.chips", b.CHIPS + " " + b.INPUT).on("focusout.chips", b.CHIPS + " " + b.INPUT, function(c) {
                var d = a(c.target).closest(b.CHIPS);
                d.removeClass("focus"),
                d.data("chips").length || d.siblings("label").removeClass("active"),
                d.siblings(".prefix").removeClass("active")
            }),
            d.$document.off("keydown.chips-add", b.CHIPS + " " + b.INPUT).on("keydown.chips-add", b.CHIPS + " " + b.INPUT, function(c) {
                var e = a(c.target)
                  , f = e.closest(b.CHIPS)
                  , g = f.children(b.CHIP).length;
                if (13 === c.which) {
                    if (d.hasAutocomplete && f.find(".autocomplete-content.dropdown-content").length && f.find(".autocomplete-content.dropdown-content").children().length)
                        return;
                    return c.preventDefault(),
                    d.addChip({
                        tag: e.val()
                    }, f),
                    void e.val("")
                }
                if ((8 === c.keyCode || 37 === c.keyCode) && "" === e.val() && g)
                    return c.preventDefault(),
                    d.selectChip(g - 1, f),
                    void e.blur()
            }),
            d.$document.off("click.chips-delete", b.CHIPS + " " + b.DELETE).on("click.chips-delete", b.CHIPS + " " + b.DELETE, function(c) {
                var e = a(c.target)
                  , f = e.closest(b.CHIPS)
                  , g = e.closest(b.CHIP);
                c.stopPropagation(),
                d.deleteChip(g.index(), f),
                f.find("input").focus()
            })
        }
        ,
        this.chips = function(b, c) {
            b.empty(),
            b.data("chips").forEach(function(a) {
                b.append(d.renderChip(a))
            }),
            b.append(a('<input id="' + c + '" class="input" placeholder="">')),
            d.setPlaceholder(b);
            var f = b.next("label");
            f.length && (f.attr("for", c),
            b.data("chips").length && f.addClass("active"));
            var g = a("#" + c);
            d.hasAutocomplete && (e.autocompleteOptions.onAutocomplete = function(a) {
                d.addChip({
                    tag: a
                }, b),
                g.val(""),
                g.focus()
            }
            ,
            g.autocomplete(e.autocompleteOptions))
        }
        ,
        this.renderChip = function(b) {
            if (b.tag) {
                var c = a('<div class="chip"></div>');
                return c.text(b.tag),
                c.append(a('<i class="material-icons close">close</i>')),
                c
            }
        }
        ,
        this.setPlaceholder = function(a) {
            a.data("chips").length && e.placeholder ? a.find("input").prop("placeholder", e.placeholder) : !a.data("chips").length && e.secondaryPlaceholder && a.find("input").prop("placeholder", e.secondaryPlaceholder)
        }
        ,
        this.isValid = function(a, b) {
            for (var c = a.data("chips"), d = !1, e = 0; e < c.length; e++)
                if (c[e].tag === b.tag)
                    return void (d = !0);
            return "" !== b.tag && !d
        }
        ,
        this.addChip = function(a, b) {
            if (d.isValid(b, a)) {
                for (var c = d.renderChip(a), e = [], f = b.data("chips"), g = 0; g < f.length; g++)
                    e.push(f[g]);
                e.push(a),
                b.data("chips", e),
                c.insertBefore(b.find("input")),
                b.trigger("chip.add", a),
                d.setPlaceholder(b)
            }
        }
        ,
        this.deleteChip = function(a, b) {
            var c = b.data("chips")[a];
            b.find(".chip").eq(a).remove();
            for (var e = [], f = b.data("chips"), g = 0; g < f.length; g++)
                g !== a && e.push(f[g]);
            b.data("chips", e),
            b.trigger("chip.delete", c),
            d.setPlaceholder(b)
        }
        ,
        this.selectChip = function(a, b) {
            var c = b.find(".chip").eq(a);
            c && !1 === c.hasClass("selected") && (c.addClass("selected"),
            b.trigger("chip.select", b.data("chips")[a]))
        }
        ,
        this.getChipsElement = function(a, b) {
            return b.eq(a)
        }
        ,
        this.init(),
        this.handleEvents()
    }
}(jQuery),
function(a) {
    a.fn.pushpin = function(b) {
        var c = {
            top: 0,
            bottom: 1 / 0,
            offset: 0
        };
        return "remove" === b ? (this.each(function() {
            (id = a(this).data("pushpin-id")) && (a(window).off("scroll." + id),
            a(this).removeData("pushpin-id").removeClass("pin-top pinned pin-bottom").removeAttr("style"))
        }),
        !1) : (b = a.extend(c, b),
        $index = 0,
        this.each(function() {
            function c(a) {
                a.removeClass("pin-top"),
                a.removeClass("pinned"),
                a.removeClass("pin-bottom")
            }
            function d(d, e) {
                d.each(function() {
                    b.top <= e && b.bottom >= e && !a(this).hasClass("pinned") && (c(a(this)),
                    a(this).css("top", b.offset),
                    a(this).addClass("pinned")),
                    e < b.top && !a(this).hasClass("pin-top") && (c(a(this)),
                    a(this).css("top", 0),
                    a(this).addClass("pin-top")),
                    e > b.bottom && !a(this).hasClass("pin-bottom") && (c(a(this)),
                    a(this).addClass("pin-bottom"),
                    a(this).css("top", b.bottom - g))
                })
            }
            var e = Materialize.guid()
              , f = a(this)
              , g = a(this).offset().top;
            a(this).data("pushpin-id", e),
            d(f, a(window).scrollTop()),
            a(window).on("scroll." + e, function() {
                var c = a(window).scrollTop() + b.offset;
                d(f, c)
            })
        }))
    }
}(jQuery),
function(a) {
    a(document).ready(function() {
        a.fn.reverse = [].reverse,
        a(document).on("mouseenter.fixedActionBtn", ".fixed-action-btn:not(.click-to-toggle):not(.toolbar)", function(c) {
            var d = a(this);
            b(d)
        }),
        a(document).on("mouseleave.fixedActionBtn", ".fixed-action-btn:not(.click-to-toggle):not(.toolbar)", function(b) {
            var d = a(this);
            c(d)
        }),
        a(document).on("click.fabClickToggle", ".fixed-action-btn.click-to-toggle > a", function(d) {
            var e = a(this)
              , f = e.parent();
            f.hasClass("active") ? c(f) : b(f)
        }),
        a(document).on("click.fabToolbar", ".fixed-action-btn.toolbar > a", function(b) {
            var c = a(this)
              , e = c.parent();
            d(e)
        })
    }),
    a.fn.extend({
        openFAB: function() {
            b(a(this))
        },
        closeFAB: function() {
            c(a(this))
        },
        openToolbar: function() {
            d(a(this))
        },
        closeToolbar: function() {
            e(a(this))
        }
    });
    var b = function(b) {
        var c = b;
        if (c.hasClass("active") === !1) {
            var d, e, f = c.hasClass("horizontal");
            f === !0 ? e = 40 : d = 40,
            c.addClass("active"),
            c.find("ul .btn-floating").velocity({
                scaleY: ".4",
                scaleX: ".4",
                translateY: d + "px",
                translateX: e + "px"
            }, {
                duration: 0
            });
            var g = 0;
            c.find("ul .btn-floating").reverse().each(function() {
                a(this).velocity({
                    opacity: "1",
                    scaleX: "1",
                    scaleY: "1",
                    translateY: "0",
                    translateX: "0"
                }, {
                    duration: 80,
                    delay: g
                }),
                g += 40
            })
        }
    }
      , c = function(a) {
        var b, c, d = a, e = d.hasClass("horizontal");
        e === !0 ? c = 40 : b = 40,
        d.removeClass("active");
        d.find("ul .btn-floating").velocity("stop", !0),
        d.find("ul .btn-floating").velocity({
            opacity: "0",
            scaleX: ".4",
            scaleY: ".4",
            translateY: b + "px",
            translateX: c + "px"
        }, {
            duration: 80
        })
    }
      , d = function(b) {
        if ("true" !== b.attr("data-open")) {
            var c, d, f, g = window.innerWidth, h = window.innerHeight, i = b[0].getBoundingClientRect(), j = b.find("> a").first(), k = b.find("> ul").first(), l = a('<div class="fab-backdrop"></div>'), m = j.css("background-color");
            j.append(l),
            c = i.left - g / 2 + i.width / 2,
            d = h - i.bottom,
            f = g / l.width(),
            b.attr("data-origin-bottom", i.bottom),
            b.attr("data-origin-left", i.left),
            b.attr("data-origin-width", i.width),
            b.addClass("active"),
            b.attr("data-open", !0),
            b.css({
                "text-align": "center",
                width: "100%",
                bottom: 0,
                left: 0,
                transform: "translateX(" + c + "px)",
                transition: "none"
            }),
            j.css({
                transform: "translateY(" + -d + "px)",
                transition: "none"
            }),
            l.css({
                "background-color": m
            }),
            setTimeout(function() {
                b.css({
                    transform: "",
                    transition: "transform .2s cubic-bezier(0.550, 0.085, 0.680, 0.530), background-color 0s linear .2s"
                }),
                j.css({
                    overflow: "visible",
                    transform: "",
                    transition: "transform .2s"
                }),
                setTimeout(function() {
                    b.css({
                        overflow: "hidden",
                        "background-color": m
                    }),
                    l.css({
                        transform: "scale(" + f + ")",
                        transition: "transform .2s cubic-bezier(0.550, 0.055, 0.675, 0.190)"
                    }),
                    k.find("> li > a").css({
                        opacity: 1
                    }),
                    a(window).on("scroll.fabToolbarClose", function() {
                        e(b),
                        a(window).off("scroll.fabToolbarClose"),
                        a(document).off("click.fabToolbarClose")
                    }),
                    a(document).on("click.fabToolbarClose", function(c) {
                        a(c.target).closest(k).length || (e(b),
                        a(window).off("scroll.fabToolbarClose"),
                        a(document).off("click.fabToolbarClose"))
                    })
                }, 100)
            }, 0)
        }
    }
      , e = function(a) {
        if ("true" === a.attr("data-open")) {
            var b, c, d, e = window.innerWidth, f = window.innerHeight, g = a.attr("data-origin-width"), h = a.attr("data-origin-bottom"), i = a.attr("data-origin-left"), j = a.find("> .btn-floating").first(), k = a.find("> ul").first(), l = a.find(".fab-backdrop"), m = j.css("background-color");
            b = i - e / 2 + g / 2,
            c = f - h,
            d = e / l.width(),
            a.removeClass("active"),
            a.attr("data-open", !1),
            a.css({
                "background-color": "transparent",
                transition: "none"
            }),
            j.css({
                transition: "none"
            }),
            l.css({
                transform: "scale(0)",
                "background-color": m
            }),
            k.find("> li > a").css({
                opacity: ""
            }),
            setTimeout(function() {
                l.remove(),
                a.css({
                    "text-align": "",
                    width: "",
                    bottom: "",
                    left: "",
                    overflow: "",
                    "background-color": "",
                    transform: "translate3d(" + -b + "px,0,0)"
                }),
                j.css({
                    overflow: "",
                    transform: "translate3d(0," + c + "px,0)"
                }),
                setTimeout(function() {
                    a.css({
                        transform: "translate3d(0,0,0)",
                        transition: "transform .2s"
                    }),
                    j.css({
                        transform: "translate3d(0,0,0)",
                        transition: "transform .2s cubic-bezier(0.550, 0.055, 0.675, 0.190)"
                    })
                }, 20)
            }, 200)
        }
    }
}(jQuery),
function(a) {
    Materialize.fadeInImage = function(b) {
        var c;
        if ("string" == typeof b)
            c = a(b);
        else {
            if ("object" != typeof b)
                return;
            c = b
        }
        c.css({
            opacity: 0
        }),
        a(c).velocity({
            opacity: 1
        }, {
            duration: 650,
            queue: !1,
            easing: "easeOutSine"
        }),
        a(c).velocity({
            opacity: 1
        }, {
            duration: 1300,
            queue: !1,
            easing: "swing",
            step: function(b, c) {
                c.start = 100;
                var d = b / 100
                  , e = 150 - (100 - b) / 1.75;
                e < 100 && (e = 100),
                b >= 0 && a(this).css({
                    "-webkit-filter": "grayscale(" + d + ")brightness(" + e + "%)",
                    filter: "grayscale(" + d + ")brightness(" + e + "%)"
                })
            }
        })
    }
    ,
    Materialize.showStaggeredList = function(b) {
        var c;
        if ("string" == typeof b)
            c = a(b);
        else {
            if ("object" != typeof b)
                return;
            c = b
        }
        var d = 0;
        c.find("li").velocity({
            translateX: "-100px"
        }, {
            duration: 0
        }),
        c.find("li").each(function() {
            a(this).velocity({
                opacity: "1",
                translateX: "0"
            }, {
                duration: 800,
                delay: d,
                easing: [60, 10]
            }),
            d += 120
        })
    }
    ,
    a(document).ready(function() {
        var b = !1
          , c = !1;
        a(".dismissable").each(function() {
            a(this).hammer({
                prevent_default: !1
            }).bind("pan", function(d) {
                if ("touch" === d.gesture.pointerType) {
                    var e = a(this)
                      , f = d.gesture.direction
                      , g = d.gesture.deltaX
                      , h = d.gesture.velocityX;
                    e.velocity({
                        translateX: g
                    }, {
                        duration: 50,
                        queue: !1,
                        easing: "easeOutQuad"
                    }),
                    4 === f && (g > e.innerWidth() / 2 || h < -.75) && (b = !0),
                    2 === f && (g < -1 * e.innerWidth() / 2 || h > .75) && (c = !0)
                }
            }).bind("panend", function(d) {
                if (Math.abs(d.gesture.deltaX) < a(this).innerWidth() / 2 && (c = !1,
                b = !1),
                "touch" === d.gesture.pointerType) {
                    var e = a(this);
                    if (b || c) {
                        var f;
                        f = b ? e.innerWidth() : -1 * e.innerWidth(),
                        e.velocity({
                            translateX: f
                        }, {
                            duration: 100,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function() {
                                e.css("border", "none"),
                                e.velocity({
                                    height: 0,
                                    padding: 0
                                }, {
                                    duration: 200,
                                    queue: !1,
                                    easing: "easeOutQuad",
                                    complete: function() {
                                        e.remove()
                                    }
                                })
                            }
                        })
                    } else
                        e.velocity({
                            translateX: 0
                        }, {
                            duration: 100,
                            queue: !1,
                            easing: "easeOutQuad"
                        });
                    b = !1,
                    c = !1
                }
            })
        })
    })
}(jQuery),
function(a) {
    var b = !1;
    Materialize.scrollFire = function(a) {
        var c = function() {
            for (var b = window.pageYOffset + window.innerHeight, c = 0; c < a.length; c++) {
                var d = a[c]
                  , e = d.selector
                  , f = d.offset
                  , g = d.callback
                  , h = document.querySelector(e);
                if (null !== h) {
                    var i = h.getBoundingClientRect().top + window.pageYOffset;
                    if (b > i + f && d.done !== !0) {
                        if ("function" == typeof g)
                            g.call(this, h);
                        else if ("string" == typeof g) {
                            var j = new Function(g);
                            j(h)
                        }
                        d.done = !0
                    }
                }
            }
        }
          , d = Materialize.throttle(function() {
            c()
        }, a.throttle || 100);
        b || (window.addEventListener("scroll", d),
        window.addEventListener("resize", d),
        b = !0),
        setTimeout(d, 0)
    }
}(jQuery),
function(a) {
    "function" == typeof define && define.amd ? define("picker", ["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : this.Picker = a(jQuery)
}(function(a) {
    function b(f, g, i, l) {
        function m() {
            return b._.node("div", b._.node("div", b._.node("div", b._.node("div", y.component.nodes(t.open), v.box), v.wrap), v.frame), v.holder)
        }
        function n() {
            w.data(g, y).addClass(v.input).attr("tabindex", -1).val(w.data("value") ? y.get("select", u.format) : f.value),
            u.editable || w.on("focus." + t.id + " click." + t.id, function(a) {
                a.preventDefault(),
                y.$root.eq(0).focus()
            }).on("keydown." + t.id, q),
            e(f, {
                haspopup: !0,
                expanded: !1,
                readonly: !1,
                owns: f.id + "_root"
            })
        }
        function o() {
            y.$root.on({
                keydown: q,
                focusin: function(a) {
                    y.$root.removeClass(v.focused),
                    a.stopPropagation()
                },
                "mousedown click": function(b) {
                    var c = b.target;
                    c != y.$root.children()[0] && (b.stopPropagation(),
                    "mousedown" != b.type || a(c).is("input, select, textarea, button, option") || (b.preventDefault(),
                    y.$root.eq(0).focus()))
                }
            }).on({
                focus: function() {
                    w.addClass(v.target)
                },
                blur: function() {
                    w.removeClass(v.target)
                }
            }).on("focus.toOpen", r).on("click", "[data-pick], [data-nav], [data-clear], [data-close]", function() {
                var b = a(this)
                  , c = b.data()
                  , d = b.hasClass(v.navDisabled) || b.hasClass(v.disabled)
                  , e = h();
                e = e && (e.type || e.href),
                (d || e && !a.contains(y.$root[0], e)) && y.$root.eq(0).focus(),
                !d && c.nav ? y.set("highlight", y.component.item.highlight, {
                    nav: c.nav
                }) : !d && "pick"in c ? y.set("select", c.pick) : c.clear ? y.clear().close(!0) : c.close && y.close(!0)
            }),
            e(y.$root[0], "hidden", !0)
        }
        function p() {
            var b;
            u.hiddenName === !0 ? (b = f.name,
            f.name = "") : (b = ["string" == typeof u.hiddenPrefix ? u.hiddenPrefix : "", "string" == typeof u.hiddenSuffix ? u.hiddenSuffix : "_submit"],
            b = b[0] + f.name + b[1]),
            y._hidden = a('<input type=hidden name="' + b + '"' + (w.data("value") || f.value ? ' value="' + y.get("select", u.formatSubmit) + '"' : "") + ">")[0],
            w.on("change." + t.id, function() {
                y._hidden.value = f.value ? y.get("select", u.formatSubmit) : ""
            }),
            u.container ? a(u.container).append(y._hidden) : w.after(y._hidden)
        }
        function q(a) {
            var b = a.keyCode
              , c = /^(8|46)$/.test(b);
            return 27 == b ? (y.close(),
            !1) : void ((32 == b || c || !t.open && y.component.key[b]) && (a.preventDefault(),
            a.stopPropagation(),
            c ? y.clear().close() : y.open()))
        }
        function r(a) {
            a.stopPropagation(),
            "focus" == a.type && y.$root.addClass(v.focused),
            y.open()
        }
        if (!f)
            return b;
        var s = !1
          , t = {
            id: f.id || "P" + Math.abs(~~(Math.random() * new Date))
        }
          , u = i ? a.extend(!0, {}, i.defaults, l) : l || {}
          , v = a.extend({}, b.klasses(), u.klass)
          , w = a(f)
          , x = function() {
            return this.start()
        }
          , y = x.prototype = {
            constructor: x,
            $node: w,
            start: function() {
                return t && t.start ? y : (t.methods = {},
                t.start = !0,
                t.open = !1,
                t.type = f.type,
                f.autofocus = f == h(),
                f.readOnly = !u.editable,
                f.id = f.id || t.id,
                "text" != f.type && (f.type = "text"),
                y.component = new i(y,u),
                y.$root = a(b._.node("div", m(), v.picker, 'id="' + f.id + '_root" tabindex="0"')),
                o(),
                u.formatSubmit && p(),
                n(),
                u.container ? a(u.container).append(y.$root) : w.after(y.$root),
                y.on({
                    start: y.component.onStart,
                    render: y.component.onRender,
                    stop: y.component.onStop,
                    open: y.component.onOpen,
                    close: y.component.onClose,
                    set: y.component.onSet
                }).on({
                    start: u.onStart,
                    render: u.onRender,
                    stop: u.onStop,
                    open: u.onOpen,
                    close: u.onClose,
                    set: u.onSet
                }),
                s = c(y.$root.children()[0]),
                f.autofocus && y.open(),
                y.trigger("start").trigger("render"))
            },
            render: function(a) {
                return a ? y.$root.html(m()) : y.$root.find("." + v.box).html(y.component.nodes(t.open)),
                y.trigger("render")
            },
            stop: function() {
                return t.start ? (y.close(),
                y._hidden && y._hidden.parentNode.removeChild(y._hidden),
                y.$root.remove(),
                w.removeClass(v.input).removeData(g),
                setTimeout(function() {
                    w.off("." + t.id)
                }, 0),
                f.type = t.type,
                f.readOnly = !1,
                y.trigger("stop"),
                t.methods = {},
                t.start = !1,
                y) : y
            },
            open: function(c) {
                return t.open ? y : (w.addClass(v.active),
                e(f, "expanded", !0),
                setTimeout(function() {
                    y.$root.addClass(v.opened),
                    e(y.$root[0], "hidden", !1)
                }, 0),
                c !== !1 && (t.open = !0,
                s && k.css("overflow", "hidden").css("padding-right", "+=" + d()),
                y.$root.eq(0).focus(),
                j.on("click." + t.id + " focusin." + t.id, function(a) {
                    var b = a.target;
                    b != f && b != document && 3 != a.which && y.close(b === y.$root.children()[0])
                }).on("keydown." + t.id, function(c) {
                    var d = c.keyCode
                      , e = y.component.key[d]
                      , f = c.target;
                    27 == d ? y.close(!0) : f != y.$root[0] || !e && 13 != d ? a.contains(y.$root[0], f) && 13 == d && (c.preventDefault(),
                    f.click()) : (c.preventDefault(),
                    e ? b._.trigger(y.component.key.go, y, [b._.trigger(e)]) : y.$root.find("." + v.highlighted).hasClass(v.disabled) || y.set("select", y.component.item.highlight).close())
                })),
                y.trigger("open"))
            },
            close: function(a) {
                return a && (y.$root.off("focus.toOpen").eq(0).focus(),
                setTimeout(function() {
                    y.$root.on("focus.toOpen", r)
                }, 0)),
                w.removeClass(v.active),
                e(f, "expanded", !1),
                setTimeout(function() {
                    y.$root.removeClass(v.opened + " " + v.focused),
                    e(y.$root[0], "hidden", !0)
                }, 0),
                t.open ? (t.open = !1,
                s && k.css("overflow", "").css("padding-right", "-=" + d()),
                j.off("." + t.id),
                y.trigger("close")) : y
            },
            clear: function(a) {
                return y.set("clear", null, a)
            },
            set: function(b, c, d) {
                var e, f, g = a.isPlainObject(b), h = g ? b : {};
                if (d = g && a.isPlainObject(c) ? c : d || {},
                b) {
                    g || (h[b] = c);
                    for (e in h)
                        f = h[e],
                        e in y.component.item && (void 0 === f && (f = null),
                        y.component.set(e, f, d)),
                        "select" != e && "clear" != e || w.val("clear" == e ? "" : y.get(e, u.format)).trigger("change");
                    y.render()
                }
                return d.muted ? y : y.trigger("set", h)
            },
            get: function(a, c) {
                if (a = a || "value",
                null != t[a])
                    return t[a];
                if ("valueSubmit" == a) {
                    if (y._hidden)
                        return y._hidden.value;
                    a = "value"
                }
                if ("value" == a)
                    return f.value;
                if (a in y.component.item) {
                    if ("string" == typeof c) {
                        var d = y.component.get(a);
                        return d ? b._.trigger(y.component.formats.toString, y.component, [c, d]) : ""
                    }
                    return y.component.get(a)
                }
            },
            on: function(b, c, d) {
                var e, f, g = a.isPlainObject(b), h = g ? b : {};
                if (b) {
                    g || (h[b] = c);
                    for (e in h)
                        f = h[e],
                        d && (e = "_" + e),
                        t.methods[e] = t.methods[e] || [],
                        t.methods[e].push(f)
                }
                return y
            },
            off: function() {
                var a, b, c = arguments;
                for (a = 0,
                namesCount = c.length; a < namesCount; a += 1)
                    b = c[a],
                    b in t.methods && delete t.methods[b];
                return y
            },
            trigger: function(a, c) {
                var d = function(a) {
                    var d = t.methods[a];
                    d && d.map(function(a) {
                        b._.trigger(a, y, [c])
                    })
                };
                return d("_" + a),
                d(a),
                y
            }
        };
        return new x
    }
    function c(a) {
        var b, c = "position";
        return a.currentStyle ? b = a.currentStyle[c] : window.getComputedStyle && (b = getComputedStyle(a)[c]),
        "fixed" == b
    }
    function d() {
        if (k.height() <= i.height())
            return 0;
        var b = a('<div style="visibility:hidden;width:100px" />').appendTo("body")
          , c = b[0].offsetWidth;
        b.css("overflow", "scroll");
        var d = a('<div style="width:100%" />').appendTo(b)
          , e = d[0].offsetWidth;
        return b.remove(),
        c - e
    }
    function e(b, c, d) {
        if (a.isPlainObject(c))
            for (var e in c)
                f(b, e, c[e]);
        else
            f(b, c, d)
    }
    function f(a, b, c) {
        a.setAttribute(("role" == b ? "" : "aria-") + b, c)
    }
    function g(b, c) {
        a.isPlainObject(b) || (b = {
            attribute: c
        }),
        c = "";
        for (var d in b) {
            var e = ("role" == d ? "" : "aria-") + d
              , f = b[d];
            c += null == f ? "" : e + '="' + b[d] + '"'
        }
        return c
    }
    function h() {
        try {
            return document.activeElement
        } catch (a) {}
    }
    var i = a(window)
      , j = a(document)
      , k = a(document.documentElement);
    return b.klasses = function(a) {
        return a = a || "picker",
        {
            picker: a,
            opened: a + "--opened",
            focused: a + "--focused",
            input: a + "__input",
            active: a + "__input--active",
            target: a + "__input--target",
            holder: a + "__holder",
            frame: a + "__frame",
            wrap: a + "__wrap",
            box: a + "__box"
        }
    }
    ,
    b._ = {
        group: function(a) {
            for (var c, d = "", e = b._.trigger(a.min, a); e <= b._.trigger(a.max, a, [e]); e += a.i)
                c = b._.trigger(a.item, a, [e]),
                d += b._.node(a.node, c[0], c[1], c[2]);
            return d
        },
        node: function(b, c, d, e) {
            return c ? (c = a.isArray(c) ? c.join("") : c,
            d = d ? ' class="' + d + '"' : "",
            e = e ? " " + e : "",
            "<" + b + d + e + ">" + c + "</" + b + ">") : ""
        },
        lead: function(a) {
            return (a < 10 ? "0" : "") + a
        },
        trigger: function(a, b, c) {
            return "function" == typeof a ? a.apply(b, c || []) : a
        },
        digits: function(a) {
            return /\d/.test(a[1]) ? 2 : 1
        },
        isDate: function(a) {
            return {}.toString.call(a).indexOf("Date") > -1 && this.isInteger(a.getDate())
        },
        isInteger: function(a) {
            return {}.toString.call(a).indexOf("Number") > -1 && a % 1 === 0
        },
        ariaAttr: g
    },
    b.extend = function(c, d) {
        a.fn[c] = function(e, f) {
            var g = this.data(c);
            return "picker" == e ? g : g && "string" == typeof e ? b._.trigger(g[e], g, [f]) : this.each(function() {
                var f = a(this);
                f.data(c) || new b(this,c,d,e)
            })
        }
        ,
        a.fn[c].defaults = d.defaults
    }
    ,
    b
}),
function(a) {
    "function" == typeof define && define.amd ? define(["picker", "jquery"], a) : "object" == typeof exports ? module.exports = a(require("./picker.js"), require("jquery")) : a(Picker, jQuery)
}(function(a, b) {
    function c(a, b) {
        var c = this
          , d = a.$node[0]
          , e = d.value
          , f = a.$node.data("value")
          , g = f || e
          , h = f ? b.formatSubmit : b.format
          , i = function() {
            return d.currentStyle ? "rtl" == d.currentStyle.direction : "rtl" == getComputedStyle(a.$root[0]).direction
        };
        c.settings = b,
        c.$node = a.$node,
        c.queue = {
            min: "measure create",
            max: "measure create",
            now: "now create",
            select: "parse create validate",
            highlight: "parse navigate create validate",
            view: "parse create validate viewset",
            disable: "deactivate",
            enable: "activate"
        },
        c.item = {},
        c.item.clear = null,
        c.item.disable = (b.disable || []).slice(0),
        c.item.enable = -function(a) {
            return a[0] === !0 ? a.shift() : -1
        }(c.item.disable),
        c.set("min", b.min).set("max", b.max).set("now"),
        g ? c.set("select", g, {
            format: h
        }) : c.set("select", null).set("highlight", c.item.now),
        c.key = {
            40: 7,
            38: -7,
            39: function() {
                return i() ? -1 : 1
            },
            37: function() {
                return i() ? 1 : -1
            },
            go: function(a) {
                var b = c.item.highlight
                  , d = new Date(b.year,b.month,b.date + a);
                c.set("highlight", d, {
                    interval: a
                }),
                this.render()
            }
        },
        a.on("render", function() {
            a.$root.find("." + b.klass.selectMonth).on("change", function() {
                var c = this.value;
                c && (a.set("highlight", [a.get("view").year, c, a.get("highlight").date]),
                a.$root.find("." + b.klass.selectMonth).trigger("focus"))
            }),
            a.$root.find("." + b.klass.selectYear).on("change", function() {
                var c = this.value;
                c && (a.set("highlight", [c, a.get("view").month, a.get("highlight").date]),
                a.$root.find("." + b.klass.selectYear).trigger("focus"))
            })
        }, 1).on("open", function() {
            var d = "";
            c.disabled(c.get("now")) && (d = ":not(." + b.klass.buttonToday + ")"),
            a.$root.find("button" + d + ", select").attr("disabled", !1)
        }, 1).on("close", function() {
            a.$root.find("button, select").attr("disabled", !0)
        }, 1)
    }
    var d = 7
      , e = 6
      , f = a._;
    c.prototype.set = function(a, b, c) {
        var d = this
          , e = d.item;
        return null === b ? ("clear" == a && (a = "select"),
        e[a] = b,
        d) : (e["enable" == a ? "disable" : "flip" == a ? "enable" : a] = d.queue[a].split(" ").map(function(e) {
            return b = d[e](a, b, c)
        }).pop(),
        "select" == a ? d.set("highlight", e.select, c) : "highlight" == a ? d.set("view", e.highlight, c) : a.match(/^(flip|min|max|disable|enable)$/) && (e.select && d.disabled(e.select) && d.set("select", e.select, c),
        e.highlight && d.disabled(e.highlight) && d.set("highlight", e.highlight, c)),
        d)
    }
    ,
    c.prototype.get = function(a) {
        return this.item[a]
    }
    ,
    c.prototype.create = function(a, c, d) {
        var e, g = this;
        return c = void 0 === c ? a : c,
        c == -(1 / 0) || c == 1 / 0 ? e = c : b.isPlainObject(c) && f.isInteger(c.pick) ? c = c.obj : b.isArray(c) ? (c = new Date(c[0],c[1],c[2]),
        c = f.isDate(c) ? c : g.create().obj) : c = f.isInteger(c) || f.isDate(c) ? g.normalize(new Date(c), d) : g.now(a, c, d),
        {
            year: e || c.getFullYear(),
            month: e || c.getMonth(),
            date: e || c.getDate(),
            day: e || c.getDay(),
            obj: e || c,
            pick: e || c.getTime()
        }
    }
    ,
    c.prototype.createRange = function(a, c) {
        var d = this
          , e = function(a) {
            return a === !0 || b.isArray(a) || f.isDate(a) ? d.create(a) : a
        };
        return f.isInteger(a) || (a = e(a)),
        f.isInteger(c) || (c = e(c)),
        f.isInteger(a) && b.isPlainObject(c) ? a = [c.year, c.month, c.date + a] : f.isInteger(c) && b.isPlainObject(a) && (c = [a.year, a.month, a.date + c]),
        {
            from: e(a),
            to: e(c)
        }
    }
    ,
    c.prototype.withinRange = function(a, b) {
        return a = this.createRange(a.from, a.to),
        b.pick >= a.from.pick && b.pick <= a.to.pick
    }
    ,
    c.prototype.overlapRanges = function(a, b) {
        var c = this;
        return a = c.createRange(a.from, a.to),
        b = c.createRange(b.from, b.to),
        c.withinRange(a, b.from) || c.withinRange(a, b.to) || c.withinRange(b, a.from) || c.withinRange(b, a.to)
    }
    ,
    c.prototype.now = function(a, b, c) {
        return b = new Date,
        c && c.rel && b.setDate(b.getDate() + c.rel),
        this.normalize(b, c)
    }
    ,
    c.prototype.navigate = function(a, c, d) {
        var e, f, g, h, i = b.isArray(c), j = b.isPlainObject(c), k = this.item.view;
        if (i || j) {
            for (j ? (f = c.year,
            g = c.month,
            h = c.date) : (f = +c[0],
            g = +c[1],
            h = +c[2]),
            d && d.nav && k && k.month !== g && (f = k.year,
            g = k.month),
            e = new Date(f,g + (d && d.nav ? d.nav : 0),1),
            f = e.getFullYear(),
            g = e.getMonth(); new Date(f,g,h).getMonth() !== g; )
                h -= 1;
            c = [f, g, h]
        }
        return c
    }
    ,
    c.prototype.normalize = function(a) {
        return a.setHours(0, 0, 0, 0),
        a
    }
    ,
    c.prototype.measure = function(a, b) {
        var c = this;
        return b ? "string" == typeof b ? b = c.parse(a, b) : f.isInteger(b) && (b = c.now(a, b, {
            rel: b
        })) : b = "min" == a ? -(1 / 0) : 1 / 0,
        b
    }
    ,
    c.prototype.viewset = function(a, b) {
        return this.create([b.year, b.month, 1])
    }
    ,
    c.prototype.validate = function(a, c, d) {
        var e, g, h, i, j = this, k = c, l = d && d.interval ? d.interval : 1, m = j.item.enable === -1, n = j.item.min, o = j.item.max, p = m && j.item.disable.filter(function(a) {
            if (b.isArray(a)) {
                var d = j.create(a).pick;
                d < c.pick ? e = !0 : d > c.pick && (g = !0)
            }
            return f.isInteger(a)
        }).length;
        if ((!d || !d.nav) && (!m && j.disabled(c) || m && j.disabled(c) && (p || e || g) || !m && (c.pick <= n.pick || c.pick >= o.pick)))
            for (m && !p && (!g && l > 0 || !e && l < 0) && (l *= -1); j.disabled(c) && (Math.abs(l) > 1 && (c.month < k.month || c.month > k.month) && (c = k,
            l = l > 0 ? 1 : -1),
            c.pick <= n.pick ? (h = !0,
            l = 1,
            c = j.create([n.year, n.month, n.date + (c.pick === n.pick ? 0 : -1)])) : c.pick >= o.pick && (i = !0,
            l = -1,
            c = j.create([o.year, o.month, o.date + (c.pick === o.pick ? 0 : 1)])),
            !h || !i); )
                c = j.create([c.year, c.month, c.date + l]);
        return c
    }
    ,
    c.prototype.disabled = function(a) {
        var c = this
          , d = c.item.disable.filter(function(d) {
            return f.isInteger(d) ? a.day === (c.settings.firstDay ? d : d - 1) % 7 : b.isArray(d) || f.isDate(d) ? a.pick === c.create(d).pick : b.isPlainObject(d) ? c.withinRange(d, a) : void 0
        });
        return d = d.length && !d.filter(function(a) {
            return b.isArray(a) && "inverted" == a[3] || b.isPlainObject(a) && a.inverted
        }).length,
        c.item.enable === -1 ? !d : d || a.pick < c.item.min.pick || a.pick > c.item.max.pick
    }
    ,
    c.prototype.parse = function(a, b, c) {
        var d = this
          , e = {};
        return b && "string" == typeof b ? (c && c.format || (c = c || {},
        c.format = d.settings.format),
        d.formats.toArray(c.format).map(function(a) {
            var c = d.formats[a]
              , g = c ? f.trigger(c, d, [b, e]) : a.replace(/^!/, "").length;
            c && (e[a] = b.substr(0, g)),
            b = b.substr(g)
        }),
        [e.yyyy || e.yy, +(e.mm || e.m) - 1, e.dd || e.d]) : b
    }
    ,
    c.prototype.formats = function() {
        function a(a, b, c) {
            var d = a.match(/\w+/)[0];
            return c.mm || c.m || (c.m = b.indexOf(d) + 1),
            d.length
        }
        function b(a) {
            return a.match(/\w+/)[0].length
        }
        return {
            d: function(a, b) {
                return a ? f.digits(a) : b.date
            },
            dd: function(a, b) {
                return a ? 2 : f.lead(b.date)
            },
            ddd: function(a, c) {
                return a ? b(a) : this.settings.weekdaysShort[c.day]
            },
            dddd: function(a, c) {
                return a ? b(a) : this.settings.weekdaysFull[c.day]
            },
            m: function(a, b) {
                return a ? f.digits(a) : b.month + 1
            },
            mm: function(a, b) {
                return a ? 2 : f.lead(b.month + 1)
            },
            mmm: function(b, c) {
                var d = this.settings.monthsShort;
                return b ? a(b, d, c) : d[c.month]
            },
            mmmm: function(b, c) {
                var d = this.settings.monthsFull;
                return b ? a(b, d, c) : d[c.month]
            },
            yy: function(a, b) {
                return a ? 2 : ("" + b.year).slice(2)
            },
            yyyy: function(a, b) {
                return a ? 4 : b.year
            },
            toArray: function(a) {
                return a.split(/(d{1,4}|m{1,4}|y{4}|yy|!.)/g)
            },
            toString: function(a, b) {
                var c = this;
                return c.formats.toArray(a).map(function(a) {
                    return f.trigger(c.formats[a], c, [0, b]) || a.replace(/^!/, "")
                }).join("")
            }
        }
    }(),
    c.prototype.isDateExact = function(a, c) {
        var d = this;
        return f.isInteger(a) && f.isInteger(c) || "boolean" == typeof a && "boolean" == typeof c ? a === c : (f.isDate(a) || b.isArray(a)) && (f.isDate(c) || b.isArray(c)) ? d.create(a).pick === d.create(c).pick : !(!b.isPlainObject(a) || !b.isPlainObject(c)) && (d.isDateExact(a.from, c.from) && d.isDateExact(a.to, c.to))
    }
    ,
    c.prototype.isDateOverlap = function(a, c) {
        var d = this
          , e = d.settings.firstDay ? 1 : 0;
        return f.isInteger(a) && (f.isDate(c) || b.isArray(c)) ? (a = a % 7 + e,
        a === d.create(c).day + 1) : f.isInteger(c) && (f.isDate(a) || b.isArray(a)) ? (c = c % 7 + e,
        c === d.create(a).day + 1) : !(!b.isPlainObject(a) || !b.isPlainObject(c)) && d.overlapRanges(a, c)
    }
    ,
    c.prototype.flipEnable = function(a) {
        var b = this.item;
        b.enable = a || (b.enable == -1 ? 1 : -1)
    }
    ,
    c.prototype.deactivate = function(a, c) {
        var d = this
          , e = d.item.disable.slice(0);
        return "flip" == c ? d.flipEnable() : c === !1 ? (d.flipEnable(1),
        e = []) : c === !0 ? (d.flipEnable(-1),
        e = []) : c.map(function(a) {
            for (var c, g = 0; g < e.length; g += 1)
                if (d.isDateExact(a, e[g])) {
                    c = !0;
                    break
                }
            c || (f.isInteger(a) || f.isDate(a) || b.isArray(a) || b.isPlainObject(a) && a.from && a.to) && e.push(a)
        }),
        e
    }
    ,
    c.prototype.activate = function(a, c) {
        var d = this
          , e = d.item.disable
          , g = e.length;
        return "flip" == c ? d.flipEnable() : c === !0 ? (d.flipEnable(1),
        e = []) : c === !1 ? (d.flipEnable(-1),
        e = []) : c.map(function(a) {
            var c, h, i, j;
            for (i = 0; i < g; i += 1) {
                if (h = e[i],
                d.isDateExact(h, a)) {
                    c = e[i] = null,
                    j = !0;
                    break
                }
                if (d.isDateOverlap(h, a)) {
                    b.isPlainObject(a) ? (a.inverted = !0,
                    c = a) : b.isArray(a) ? (c = a,
                    c[3] || c.push("inverted")) : f.isDate(a) && (c = [a.getFullYear(), a.getMonth(), a.getDate(), "inverted"]);
                    break
                }
            }
            if (c)
                for (i = 0; i < g; i += 1)
                    if (d.isDateExact(e[i], a)) {
                        e[i] = null;
                        break
                    }
            if (j)
                for (i = 0; i < g; i += 1)
                    if (d.isDateOverlap(e[i], a)) {
                        e[i] = null;
                        break
                    }
            c && e.push(c)
        }),
        e.filter(function(a) {
            return null != a
        })
    }
    ,
    c.prototype.nodes = function(a) {
        var b = this
          , c = b.settings
          , g = b.item
          , h = g.now
          , i = g.select
          , j = g.highlight
          , k = g.view
          , l = g.disable
          , m = g.min
          , n = g.max
          , o = function(a, b) {
            return c.firstDay && (a.push(a.shift()),
            b.push(b.shift())),
            f.node("thead", f.node("tr", f.group({
                min: 0,
                max: d - 1,
                i: 1,
                node: "th",
                item: function(d) {
                    return [a[d], c.klass.weekdays, 'scope=col title="' + b[d] + '"']
                }
            })))
        }((c.showWeekdaysFull ? c.weekdaysFull : c.weekdaysLetter).slice(0), c.weekdaysFull.slice(0))
          , p = function(a) {
            return f.node("div", " ", c.klass["nav" + (a ? "Next" : "Prev")] + (a && k.year >= n.year && k.month >= n.month || !a && k.year <= m.year && k.month <= m.month ? " " + c.klass.navDisabled : ""), "data-nav=" + (a || -1) + " " + f.ariaAttr({
                role: "button",
                controls: b.$node[0].id + "_table"
            }) + ' title="' + (a ? c.labelMonthNext : c.labelMonthPrev) + '"')
        }
          , q = function(d) {
            var e = c.showMonthsShort ? c.monthsShort : c.monthsFull;
            return "short_months" == d && (e = c.monthsShort),
            c.selectMonths && void 0 == d ? f.node("select", f.group({
                min: 0,
                max: 11,
                i: 1,
                node: "option",
                item: function(a) {
                    return [e[a], 0, "value=" + a + (k.month == a ? " selected" : "") + (k.year == m.year && a < m.month || k.year == n.year && a > n.month ? " disabled" : "")]
                }
            }), c.klass.selectMonth + " browser-default", (a ? "" : "disabled") + " " + f.ariaAttr({
                controls: b.$node[0].id + "_table"
            }) + ' title="' + c.labelMonthSelect + '"') : "short_months" == d ? null != i ? f.node("div", e[i.month]) : f.node("div", e[k.month]) : f.node("div", e[k.month], c.klass.month)
        }
          , r = function(d) {
            var e = k.year
              , g = c.selectYears === !0 ? 5 : ~~(c.selectYears / 2);
            if (g) {
                var h = m.year
                  , i = n.year
                  , j = e - g
                  , l = e + g;
                if (h > j && (l += h - j,
                j = h),
                i < l) {
                    var o = j - h
                      , p = l - i;
                    j -= o > p ? p : o,
                    l = i
                }
                if (c.selectYears && void 0 == d)
                    return f.node("select", f.group({
                        min: j,
                        max: l,
                        i: 1,
                        node: "option",
                        item: function(a) {
                            return [a, 0, "value=" + a + (e == a ? " selected" : "")]
                        }
                    }), c.klass.selectYear + " browser-default", (a ? "" : "disabled") + " " + f.ariaAttr({
                        controls: b.$node[0].id + "_table"
                    }) + ' title="' + c.labelYearSelect + '"')
            }
            return "raw" == d ? f.node("div", e) : f.node("div", e, c.klass.year)
        };
        return createDayLabel = function() {
            return null != i ? f.node("div", i.date) : f.node("div", h.date)
        }
        ,
        createWeekdayLabel = function() {
            var a;
            a = null != i ? i.day : h.day;
            var b = c.weekdaysFull[a];
            return b
        }
        ,
        f.node("div", f.node("div", createWeekdayLabel(), "picker__weekday-display") + f.node("div", q("short_months"), c.klass.month_display) + f.node("div", createDayLabel(), c.klass.day_display) + f.node("div", r("raw"), c.klass.year_display), c.klass.date_display) + f.node("div", f.node("div", (c.selectYears ? q() + r() : q() + r()) + p() + p(1), c.klass.header) + f.node("table", o + f.node("tbody", f.group({
            min: 0,
            max: e - 1,
            i: 1,
            node: "tr",
            item: function(a) {
                var e = c.firstDay && 0 === b.create([k.year, k.month, 1]).day ? -7 : 0;
                return [f.group({
                    min: d * a - k.day + e + 1,
                    max: function() {
                        return this.min + d - 1
                    },
                    i: 1,
                    node: "td",
                    item: function(a) {
                        a = b.create([k.year, k.month, a + (c.firstDay ? 1 : 0)]);
                        var d = i && i.pick == a.pick
                          , e = j && j.pick == a.pick
                          , g = l && b.disabled(a) || a.pick < m.pick || a.pick > n.pick
                          , o = f.trigger(b.formats.toString, b, [c.format, a]);
                        return [f.node("div", a.date, function(b) {
                            return b.push(k.month == a.month ? c.klass.infocus : c.klass.outfocus),
                            h.pick == a.pick && b.push(c.klass.now),
                            d && b.push(c.klass.selected),
                            e && b.push(c.klass.highlighted),
                            g && b.push(c.klass.disabled),
                            b.join(" ")
                        }([c.klass.day]), "data-pick=" + a.pick + " " + f.ariaAttr({
                            role: "gridcell",
                            label: o,
                            selected: !(!d || b.$node.val() !== o) || null,
                            activedescendant: !!e || null,
                            disabled: !!g || null
                        })), "", f.ariaAttr({
                            role: "presentation"
                        })]
                    }
                })]
            }
        })), c.klass.table, 'id="' + b.$node[0].id + '_table" ' + f.ariaAttr({
            role: "grid",
            controls: b.$node[0].id,
            readonly: !0
        })), c.klass.calendar_container) + f.node("div", f.node("button", c.today, "btn-flat picker__today", "type=button data-pick=" + h.pick + (a && !b.disabled(h) ? "" : " disabled") + " " + f.ariaAttr({
            controls: b.$node[0].id
        })) + f.node("button", c.clear, "btn-flat picker__clear", "type=button data-clear=1" + (a ? "" : " disabled") + " " + f.ariaAttr({
            controls: b.$node[0].id
        })) + f.node("button", c.close, "btn-flat picker__close", "type=button data-close=true " + (a ? "" : " disabled") + " " + f.ariaAttr({
            controls: b.$node[0].id
        })), c.klass.footer)
    }
    ,
    c.defaults = function(a) {
        return {
            labelMonthNext: "Next month",
            labelMonthPrev: "Previous month",
            labelMonthSelect: "Select a month",
            labelYearSelect: "Select a year",
            monthsFull: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            weekdaysFull: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            weekdaysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            weekdaysLetter: ["S", "M", "T", "W", "T", "F", "S"],
            today: "Today",
            clear: "Clear",
            close: "Close",
            format: "d mmmm, yyyy",
            klass: {
                table: a + "table",
                header: a + "header",
                date_display: a + "date-display",
                day_display: a + "day-display",
                month_display: a + "month-display",
                year_display: a + "year-display",
                calendar_container: a + "calendar-container",
                navPrev: a + "nav--prev",
                navNext: a + "nav--next",
                navDisabled: a + "nav--disabled",
                month: a + "month",
                year: a + "year",
                selectMonth: a + "select--month",
                selectYear: a + "select--year",
                weekdays: a + "weekday",
                day: a + "day",
                disabled: a + "day--disabled",
                selected: a + "day--selected",
                highlighted: a + "day--highlighted",
                now: a + "day--today",
                infocus: a + "day--infocus",
                outfocus: a + "day--outfocus",
                footer: a + "footer",
                buttonClear: a + "button--clear",
                buttonToday: a + "button--today",
                buttonClose: a + "button--close"
            }
        }
    }(a.klasses().picker + "__"),
    a.extend("pickadate", c)
}),
function(a) {
    function b() {
        var b = +a(this).attr("data-length")
          , c = +a(this).val().length
          , d = c <= b;
        a(this).parent().find('span[class="character-counter"]').html(c + "/" + b),
        e(d, a(this))
    }
    function c(b) {
        var c = b.parent().find('span[class="character-counter"]');
        c.length || (c = a("<span/>").addClass("character-counter").css("float", "right").css("font-size", "12px").css("height", 1),
        b.parent().append(c))
    }
    function d() {
        a(this).parent().find('span[class="character-counter"]').html("")
    }
    function e(a, b) {
        var c = b.hasClass("invalid");
        a && c ? b.removeClass("invalid") : a || c || (b.removeClass("valid"),
        b.addClass("invalid"))
    }
    a.fn.characterCounter = function() {
        return this.each(function() {
            var e = a(this)
              , f = e.parent().find('span[class="character-counter"]');
            if (!f.length) {
                var g = void 0 !== e.attr("data-length");
                g && (e.on("input", b),
                e.on("focus", b),
                e.on("blur", d),
                c(e))
            }
        })
    }
    ,
    a(document).ready(function() {
        a("input, textarea").characterCounter()
    })
}(jQuery),
function(a) {
    var b = {
        init: function(b) {
            var c = {
                duration: 200,
                dist: -100,
                shift: 0,
                padding: 0,
                fullWidth: !1,
                indicators: !1,
                noWrap: !1,
                onCycleTo: null
            };
            b = a.extend(c, b);
            var d = Materialize.objectSelectorString(a(this));
            return this.each(function(c) {
                function e() {
                    "undefined" != typeof window.ontouchstart && (O[0].addEventListener("touchstart", n),
                    O[0].addEventListener("touchmove", o),
                    O[0].addEventListener("touchend", p)),
                    O[0].addEventListener("mousedown", n),
                    O[0].addEventListener("mousemove", o),
                    O[0].addEventListener("mouseup", p),
                    O[0].addEventListener("mouseleave", p),
                    O[0].addEventListener("click", l)
                }
                function f(a) {
                    return a.targetTouches && a.targetTouches.length >= 1 ? a.targetTouches[0].clientX : a.clientX
                }
                function g(a) {
                    return a.targetTouches && a.targetTouches.length >= 1 ? a.targetTouches[0].clientY : a.clientY
                }
                function h(a) {
                    return a >= x ? a % x : a < 0 ? h(x + a % x) : a
                }
                function i(c) {
                    E = !0,
                    O.hasClass("scrolling") || O.addClass("scrolling"),
                    null != N && window.clearTimeout(N),
                    N = window.setTimeout(function() {
                        E = !1,
                        O.removeClass("scrolling")
                    }, b.duration);
                    var d, e, f, g, i, j, k, l = u;
                    if (t = "number" == typeof c ? c : t,
                    u = Math.floor((t + w / 2) / w),
                    f = t - u * w,
                    g = f < 0 ? 1 : -1,
                    i = -g * f * 2 / w,
                    e = x >> 1,
                    b.fullWidth ? k = "translateX(0)" : (k = "translateX(" + (O[0].clientWidth - r) / 2 + "px) ",
                    k += "translateY(" + (O[0].clientHeight - s) / 2 + "px)"),
                    P) {
                        var m = u % x
                          , n = M.find(".indicator-item.active");
                        n.index() !== m && (n.removeClass("active"),
                        M.find(".indicator-item").eq(m).addClass("active"))
                    }
                    for ((!b.noWrap || u >= 0 && u < x) && (j = q[h(u)],
                    a(j).hasClass("active") || (O.find(".carousel-item").removeClass("active"),
                    a(j).addClass("active")),
                    j.style[F] = k + " translateX(" + -f / 2 + "px) translateX(" + g * b.shift * i * d + "px) translateZ(" + b.dist * i + "px)",
                    j.style.zIndex = 0,
                    b.fullWidth ? tweenedOpacity = 1 : tweenedOpacity = 1 - .2 * i,
                    j.style.opacity = tweenedOpacity,
                    j.style.display = "block"),
                    d = 1; d <= e; ++d)
                        b.fullWidth ? (zTranslation = b.dist,
                        tweenedOpacity = d === e && f < 0 ? 1 - i : 1) : (zTranslation = b.dist * (2 * d + i * g),
                        tweenedOpacity = 1 - .2 * (2 * d + i * g)),
                        (!b.noWrap || u + d < x) && (j = q[h(u + d)],
                        j.style[F] = k + " translateX(" + (b.shift + (w * d - f) / 2) + "px) translateZ(" + zTranslation + "px)",
                        j.style.zIndex = -d,
                        j.style.opacity = tweenedOpacity,
                        j.style.display = "block"),
                        b.fullWidth ? (zTranslation = b.dist,
                        tweenedOpacity = d === e && f > 0 ? 1 - i : 1) : (zTranslation = b.dist * (2 * d - i * g),
                        tweenedOpacity = 1 - .2 * (2 * d - i * g)),
                        (!b.noWrap || u - d >= 0) && (j = q[h(u - d)],
                        j.style[F] = k + " translateX(" + (-b.shift + (-w * d - f) / 2) + "px) translateZ(" + zTranslation + "px)",
                        j.style.zIndex = -d,
                        j.style.opacity = tweenedOpacity,
                        j.style.display = "block");
                    if ((!b.noWrap || u >= 0 && u < x) && (j = q[h(u)],
                    j.style[F] = k + " translateX(" + -f / 2 + "px) translateX(" + g * b.shift * i + "px) translateZ(" + b.dist * i + "px)",
                    j.style.zIndex = 0,
                    b.fullWidth ? tweenedOpacity = 1 : tweenedOpacity = 1 - .2 * i,
                    j.style.opacity = tweenedOpacity,
                    j.style.display = "block"),
                    l !== u && "function" == typeof b.onCycleTo) {
                        var o = O.find(".carousel-item").eq(h(u));
                        b.onCycleTo.call(this, o, J)
                    }
                }
                function j() {
                    var a, b, c, d;
                    a = Date.now(),
                    b = a - H,
                    H = a,
                    c = t - G,
                    G = t,
                    d = 1e3 * c / (1 + b),
                    D = .8 * d + .2 * D
                }
                function k() {
                    var a, c;
                    B && (a = Date.now() - H,
                    c = B * Math.exp(-a / b.duration),
                    c > 2 || c < -2 ? (i(C - c),
                    requestAnimationFrame(k)) : i(C))
                }
                function l(c) {
                    if (J)
                        return c.preventDefault(),
                        c.stopPropagation(),
                        !1;
                    if (!b.fullWidth) {
                        var d = a(c.target).closest(".carousel-item").index()
                          , e = u % x - d;
                        0 !== e && (c.preventDefault(),
                        c.stopPropagation()),
                        m(d)
                    }
                }
                function m(a) {
                    var c = u % x - a;
                    b.noWrap || (c < 0 ? Math.abs(c + x) < Math.abs(c) && (c += x) : c > 0 && Math.abs(c - x) < c && (c -= x)),
                    c < 0 ? O.trigger("carouselNext", [Math.abs(c)]) : c > 0 && O.trigger("carouselPrev", [c])
                }
                function n(a) {
                    a.preventDefault(),
                    v = !0,
                    J = !1,
                    K = !1,
                    z = f(a),
                    A = g(a),
                    D = B = 0,
                    G = t,
                    H = Date.now(),
                    clearInterval(I),
                    I = setInterval(j, 100)
                }
                function o(a) {
                    var b, c, d;
                    if (v)
                        if (b = f(a),
                        y = g(a),
                        c = z - b,
                        d = Math.abs(A - y),
                        d < 30 && !K)
                            (c > 2 || c < -2) && (J = !0,
                            z = b,
                            i(t + c));
                        else {
                            if (J)
                                return a.preventDefault(),
                                a.stopPropagation(),
                                !1;
                            K = !0
                        }
                    if (J)
                        return a.preventDefault(),
                        a.stopPropagation(),
                        !1
                }
                function p(a) {
                    if (v)
                        return v = !1,
                        clearInterval(I),
                        C = t,
                        (D > 10 || D < -10) && (B = .9 * D,
                        C = t + B),
                        C = Math.round(C / w) * w,
                        b.noWrap && (C >= w * (x - 1) ? C = w * (x - 1) : C < 0 && (C = 0)),
                        B = C - t,
                        H = Date.now(),
                        requestAnimationFrame(k),
                        J && (a.preventDefault(),
                        a.stopPropagation()),
                        !1
                }
                var q, r, s, t, u, v, w, x, z, A, B, C, D, E, F, G, H, I, J, K, L = d + c, M = a('<ul class="indicators"></ul>'), N = null, O = a(this), P = O.attr("data-indicators") || b.indicators, Q = function() {
                    var b = O.find(".carousel-item img").first();
                    if (b.length)
                        b.prop("complete") ? O.css("height", b.height()) : b.on("load", function() {
                            O.css("height", a(this).height())
                        });
                    else {
                        var c = O.find(".carousel-item").first().height();
                        O.css("height", c)
                    }
                };
                return b.fullWidth && (b.dist = 0,
                Q(),
                P && O.find(".carousel-fixed-item").addClass("with-indicators")),
                O.hasClass("initialized") ? (a(window).trigger("resize"),
                a(this).trigger("carouselNext", [1e-6]),
                !0) : (O.addClass("initialized"),
                v = !1,
                t = C = 0,
                q = [],
                r = O.find(".carousel-item").first().innerWidth(),
                s = O.find(".carousel-item").first().innerHeight(),
                w = 2 * r + b.padding,
                O.find(".carousel-item").each(function(b) {
                    if (q.push(a(this)[0]),
                    P) {
                        var c = a('<li class="indicator-item"></li>');
                        0 === b && c.addClass("active"),
                        c.click(function(b) {
                            b.stopPropagation();
                            var c = a(this).index();
                            m(c)
                        }),
                        M.append(c)
                    }
                }),
                P && O.append(M),
                x = q.length,
                F = "transform",
                ["webkit", "Moz", "O", "ms"].every(function(a) {
                    var b = a + "Transform";
                    return "undefined" == typeof document.body.style[b] || (F = b,
                    !1)
                }),
                a(window).off("resize.carousel-" + L).on("resize.carousel-" + L, function() {
                    b.fullWidth ? (r = O.find(".carousel-item").first().innerWidth(),
                    s = O.find(".carousel-item").first().innerHeight(),
                    w = 2 * r + b.padding,
                    t = 2 * u * r,
                    C = t) : i()
                }),
                e(),
                i(t),
                a(this).on("carouselNext", function(a, b) {
                    void 0 === b && (b = 1),
                    C = w * Math.round(t / w) + w * b,
                    t !== C && (B = C - t,
                    H = Date.now(),
                    requestAnimationFrame(k))
                }),
                a(this).on("carouselPrev", function(a, b) {
                    void 0 === b && (b = 1),
                    C = w * Math.round(t / w) - w * b,
                    t !== C && (B = C - t,
                    H = Date.now(),
                    requestAnimationFrame(k))
                }),
                void a(this).on("carouselSet", function(a, b) {
                    void 0 === b && (b = 0),
                    m(b)
                }))
            })
        },
        next: function(b) {
            a(this).trigger("carouselNext", [b])
        },
        prev: function(b) {
            a(this).trigger("carouselPrev", [b])
        },
        set: function(b) {
            a(this).trigger("carouselSet", [b])
        }
    };
    a.fn.carousel = function(c) {
        return b[c] ? b[c].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof c && c ? void a.error("Method " + c + " does not exist on jQuery.carousel") : b.init.apply(this, arguments)
    }
}(jQuery),
function(a) {
    var b = {
        init: function(b) {
            return this.each(function() {
                var c = a("#" + a(this).attr("data-activates"))
                  , d = (a("body"),
                a(this))
                  , e = d.parent(".tap-target-wrapper")
                  , f = e.find(".tap-target-wave")
                  , g = e.find(".tap-target-origin")
                  , h = d.find(".tap-target-content");
                e.length || (e = d.wrap(a('<div class="tap-target-wrapper"></div>')).parent()),
                h.length || (h = a('<div class="tap-target-content"></div>'),
                d.append(h)),
                f.length || (f = a('<div class="tap-target-wave"></div>'),
                g.length || (g = c.clone(!0, !0),
                g.addClass("tap-target-origin"),
                g.removeAttr("id"),
                g.removeAttr("style"),
                f.append(g)),
                e.append(f));
                var i = function() {
                    e.is(".open") || (e.addClass("open"),
                    setTimeout(function() {
                        g.off("click.tapTarget").on("click.tapTarget", function(a) {
                            j(),
                            g.off("click.tapTarget")
                        }),
                        a(document).off("click.tapTarget").on("click.tapTarget", function(b) {
                            j(),
                            a(document).off("click.tapTarget")
                        });
                        var b = Materialize.throttle(function() {
                            k()
                        }, 200);
                        a(window).off("resize.tapTarget").on("resize.tapTarget", b)
                    }, 0))
                }
                  , j = function() {
                    e.is(".open") && (e.removeClass("open"),
                    g.off("click.tapTarget"),
                    a(document).off("click.tapTarget"),
                    a(window).off("resize.tapTarget"))
                }
                  , k = function() {
                    var b = "fixed" === c.css("position");
                    if (!b)
                        for (var g = c.parents(), i = 0; i < g.length && !(b = "fixed" == a(g[i]).css("position")); i++)
                            ;
                    var j = c.outerWidth()
                      , k = c.outerHeight()
                      , l = b ? c.offset().top - a(document).scrollTop() : c.offset().top
                      , m = b ? c.offset().left - a(document).scrollLeft() : c.offset().left
                      , n = a(window).width()
                      , o = a(window).height()
                      , p = n / 2
                      , q = o / 2
                      , r = m <= p
                      , s = m > p
                      , t = l <= q
                      , u = l > q
                      , v = m >= .25 * n && m <= .75 * n
                      , w = d.outerWidth()
                      , x = d.outerHeight()
                      , y = l + k / 2 - x / 2
                      , z = m + j / 2 - w / 2
                      , A = b ? "fixed" : "absolute"
                      , B = v ? w : w / 2 + j
                      , C = x / 2
                      , D = t ? x / 2 : 0
                      , E = 0
                      , F = r && !v ? w / 2 - j : 0
                      , G = 0
                      , H = j
                      , I = u ? "bottom" : "top"
                      , J = j > k ? 2 * j : 2 * j
                      , K = J
                      , L = x / 2 - K / 2
                      , M = w / 2 - J / 2
                      , N = {};
                    N.top = t ? y : "",
                    N.right = s ? n - z - w : "",
                    N.bottom = u ? o - y - x : "",
                    N.left = r ? z : "",
                    N.position = A,
                    e.css(N),
                    h.css({
                        width: B,
                        height: C,
                        top: D,
                        right: G,
                        bottom: E,
                        left: F,
                        padding: H,
                        verticalAlign: I
                    }),
                    f.css({
                        top: L,
                        left: M,
                        width: J,
                        height: K
                    })
                };
                "open" == b && (k(),
                i()),
                "close" == b && j()
            })
        },
        open: function() {},
        close: function() {}
    };
    a.fn.tapTarget = function(c) {
        return b[c] || "object" == typeof c ? b.init.apply(this, arguments) : void a.error("Method " + c + " does not exist on jQuery.tap-target")
    }
}(jQuery);
$(document).ready(function() {
    $(function() {
        var data = {
            "Ashanti": null,
            "Brong Ahafo": null,
            "Central": null,
            "Eastern": null,
            "Greater Accra": null,
            "Northern Region": null,
            "Upper East": null,
            "Upper West": null,
            "Volta Region": null,
            "Western Region": null,
            "Abeka La Paz": null,
            "Accra Central": null,
            "Abelemkpe": null,
            "Ablorh Adjei": null,
            "Abokobi": null,
            "Aborfu": null,
            "Abossey Okai": null,
            "Accra new Town": null,
            "Achimota": null,
            "Adabraka": null,
            "Adenta": null,
            "Adjankote": null,
            "Adjiriganor": null,
            "Agbogba": null,
            "Agbogbloshie": null,
            "Akatsi Abor": null,
            "Akweteman": null,
            "Alajo": null,
            "Apenkwa": null,
            "Ashaley Botwe": null,
            "Avenor": null,
            "Awoshie": null,
            "Ashongman Estates": null,
            "Asylum Down": null,
            "Banana Inn": null,
            "Bubuashie": null,
            "Bukom": null,
            "Burma Camp": null,
            "Cantonments": null,
            "Carprice": null,
            "Chantang": null,
            "Chorkor": null,
            "Circle": null,
            "Dansoman": null,
            "Darkuman": null,
            "Dome": null,
            "Dzorwulu": null,
            "Dansoman": null,
            "Darkuman": null,
            "Dome": null,
            "Dzorwulu": null,
            "East Legon": null,
            "East Legon (Okponglo)": null,
            "Gbawe": null,
            "Haatso": null,
            "Kanda Estate": null,
            "Kaneshie": null,
            "Kantamanto": null,
            "Kokomlemle": null,
            "Korle Gonno": null,
            "Korle-Bu": null,
            "Kotobabi": null,
            "Kwabenya": null,
            "Kasoa": null,
            "Kwashieman": null,
            "La-Aborm": null,
            "Labone": null,
            "Lashibi": null,
            "Legon": null,
            "Lartebiokorshie": null,
            "Mallam": null,
            "Mallam Atta": null,
            "Mamobi": null,
            "Mamprobi": null,
            "Madina": null,
            "Mataheko": null,
            "McCarthy Hill": null,
            "New Achimota": null,
            "New Fadama": null,
            "New Ashongman": null,
            "New Aplaku Mandela": null,
            "North Mamprobi": null,
            "New Weija": null,
            "Nii Boi Town": null,
            "Nima": null,
            "North Kaneshie": null,
            "North Legon": null,
            "North Ridge": null,
            "Nungua": null,
            "Nungua East": null,
            "Nungua Old Town": null,
            "Nungua-Zongo": null,
            "Odorkor": null,
            "Osu": null,
            "Osu Ako-Adjei": null,
            "Oyarifa": null,
            "Pokuase": null,
            "Ridge": null,
            "Roman Ridge": null,
            "Ringway Estates": null,
            "Ridge": null,
            "Sakaman": null,
            "Shiashie": null,
            "South La": null,
            "South Odorkor": null,
            "Spintex": null,
            "Sukura": null,
            "T/Junction": null,
            "Taifa": null,
            "Tantra Hill": null,
            "Tesano": null,
            "Teshie New Town": null,
            "Teshie Old Town": null,
            "Teshie-Nungua Estates": null,
            "Trassacco Valley Estates": null,
            "West Legon": null,
            "Adum": null,
            "Ayeduase": null,
            "Aboabo": null,
            "Ahinsan": null,
            "Ahodwo": null,
            "Amakom": null,
            "Anloga": null,
            "Anwomaso": null,
            "Apatrapa": null,
            "Asafo": null,
            "Asawasi": null,
            "Ashanti New Town": null,
            "Asokwa": null,
            "Atonsu-Agogo": null,
            "Ayigya": null,
            "Asokore Mampong": null,
            "Bantama": null,
            "Boadi": null,
            "Bomso": null,
            "Breman": null,
            "Buokrom": null,
            "Buokrom Estate": null,
            "Daban": null,
            "Dakwadwom": null,
            "Dichemso": null,
            "Dompoase": null,
            "Edwenase": null,
            "Gyinyasi": null,
            "Kaase": null,
            "Kejetia": null,
            "Kumasi Metropolitan": null,
            "Esreso": null,
            "Aputuogya": null,
            "Feyiase": null,
            "Kokoben": null,
            "Kwadaso Nsuom": null,
            "Manhyia": null,
            "Mbrom": null,
            "Moshie Zongo": null,
            "New Suame": null,
            "New Tafo": null,
            "Nhyiaeso": null,
            "Nsenie": null,
            "Nyankyerenease": null,
            "Oforikrom": null,
            "Old Tafo": null,
            "Pankrono": null,
            "Patase": null,
            "Santasi": null,
            "Sawaba": null,
            "Sokoban": null,
            "Suame": null,
            "KNUST": null,
            "Tarkwa Maakro": null,
            "Anaji": null,
            "Adiembra": null,
            "Apremdo": null,
            "Assakae": null,
            "Beach Road": null,
            "Butumagyebu": null,
            "Chapel Hill": null,
            "Effia": null,
            "Effia Nkwanta": null,
            "Essipon": null,
            "Kojokrom": null,
            "Kwesimintsim": null,
            "Market Circle": null,
            "Mpintsin": null,
            "New Takoradi": null,
            "Ntankoful": null,
            "Pipe Ano": null,
            "Sekondi": null,
            "Sekondi(Township)": null,
            "Tanokrom": null,
            "Takoradi": null,
            "Adansi North": null,
            "Adansi South": null,
            "Atwima Nwabiagya": null,
            "Afigya-Kwabre": null,
            "Ahafo Ano North": null,
            "Amansie West": null,
            "Ahafo Ano South": null,
            "Amansie West": null,
            "Asante Akim Central Municipal": null,
            "Asante Akim North": null,
            "Asante Akim South": null,
            "Asokore Mampong Municipal": null,
            "Atwima Kwanwoma": null,
            "Atwima Mponua": null,
            "Bekwai Municipal": null,
            "Bosome Freho": null,
            "Bosomtwe": null,
            "Ejisu-Juaben Municipal": null,
            "Ejura/Sekyedumase": null,
            "Kwabre East": null,
            "Kumawu": null,
            "Mampong Municipal": null,
            "Obuasi Municipal": null,
            "Offinso North": null,
            "Offinso South Municipal": null,
            "Sekyere Central": null,
            "Sekyere East": null,
            "Sekyere South": null,
            "Asunafo South": null,
            "Asutifi": null,
            "Asutifi South": null,
            "Asunafo North Municipal": null,
            "Atebubu-Amantin Municipal": null,
            "Berekum Municipal": null,
            "Dormaa Municipal": null,
            "Dormaa East": null,
            "Jaman North": null,
            "Jaman South": null,
            "Kintampo North Municipal": null,
            "Kintampo South": null,
            "Nkoranza North": null,
            "Nkoranza South": null,
            "Pru": null,
            "Sunyani Municipal": null,
            "Sunyani West": null,
            "Sene West": null,
            "Techiman Municipal": null,
            "Tain": null,
            "Tano North": null,
            "Tano South": null,
            "Techiman North": null,
            "Wenchi Municipal": null,
            "Agona West Municipal": null,
            "Awutu-Senya-East": null,
            "Abura": null,
            "Asebu": null,
            "Asikuma Odoben": null,
            "Abirem Municipal": null,
            "Assin North Municipal": null,
            "Assin South": null,
            "Awutu-Senya": null,
            "Kwamankese": null,
            "Agona East": null,
            "Ajumako": null,
            "Enyan": null,
            "Essiam": null,
            "Brakwa": null,
            "Cape Coast Metropolitan": null,
            "Effutu Municipal": null,
            "Ekumfi": null,
            "Gomoa  East": null,
            "Gomoa  West": null,
            "Komenda": null,
            "Edina": null,
            "Eguafo": null,
            "Twifo-Ati Mokwa": null,
            "Twifo": null,
            "Heman": null,
            "Lower Denkyira": null,
            "Upper Denkyira East": null,
            "Upper Denkyira West": null,
            "Akropong": null,
            "Akuapim South": null,
            "Afram Plains South": null,
            "Akuapim North": null,
            "Akuapim South Municipal": null,
            "Akyemansa": null,
            "Ahafo Ano North": null,
            "Asuogyaman": null,
            "Atiwa": null,
            "Ayensuano": null,
            "Ahafo Ano South": null,
            "Birim North": null,
            "Birim South": null,
            "Birim Central Municipal": null,
            "Denkyembour": null,
            "East Akim Municipal": null,
            "Fanteakwa": null,
            "Koforidua": null,
            "Kwaebibirem": null,
            "Kwahu East": null,
            "Kwahu North": null,
            "Kwahu South": null,
            "Kwahu West Municipal": null,
            "New-Juaben Municipal": null,
            "Suhum/Kraboa/Coaltar": null,
            "Upper Manya Krobo": null,
            "Upper West Akim": null,
            "Yilo Krobo": null,
            "Ada West": null,
            "Adenta Municipal": null,
            "Adjiriganno": null,
            "Afienya": null,
            "Ashaiman Municipal": null,
            "Dangme East": null,
            "Dangme West": null,
            "Ga Central": null,
            "Ga West  Municipal": null,
            "Ga East  Municipal": null,
            "Ga South Municipal": null,
            "Kpone Katamanso": null,
            "La Dade-Kotopon": null,
            "La-Nkwantanang-Madina": null,
            "Ledzokuku-Krowor": null,
            "Ningo/Prampam": null,
            "Oyibi": null,
            "Tema": null,
            "Tema Metropolitan": null,
            "Bole": null,
            "Chereponi": null,
            "East Gonja": null,
            "Kpandai": null,
            "North Gonja": null,
            "Sagnarigu": null,
            "Sawla-Tuna-Kalba": null,
            "Savelugu/Nanton": null,
            "Tolon": null,
            "Tamale Metropolitan": null,
            "West Mamprusi": null,
            "Yendi Municipal": null,
            "Bawku Municipal": null,
            "Bawku West": null,
            "Bongo": null,
            "Builsa": null,
            "Bolgatanga Municipal": null,
            "Biakoye": null,
            "Garu-Tempane": null,
            "Kassena Nankana East": null,
            "Kassena Nankana West": null,
            "Pusiga": null,
            "Talensi": null,
            "Nkwanta North": null,
            "Nkwanta South": null,
            "North Dayi": null,
            "North Tongu": null,
            "South Dayi": null,
            "South Tongu": null,
            "Jirapa": null,
            "Lawra": null,
            "Wa Municipal": null,
            "Akatsi North": null,
            "Akatsi South": null,
            "Biakoye": null,
            "Central Tongu": null,
            "Denu": null,
            "Ho West": null,
            "Ho Municipal": null,
            "Hohoe Municipal": null,
            "Keta Municipal": null,
            "Ketu South Municipal": null,
            "Kpando Municipal": null,
            "Ketu North": null,
            "Krachi East": null,
            "Krachi West": null,
            "Nkwanta North": null,
            "Nkwanta South": null,
            "North Dayi": null,
            "North Tongu": null,
            "South Dayi": null,
            "South Tongu": null,
            "Ahanta West": null,
            "Anhwiaso": null,
            "Aowin": null,
            "Suaman": null,
            "Bia": null,
            "Bibiani": null,
            "Bekwai": null,
            "Ellembele": null,
            "Jomoro": null,
            "Juaboso": null,
            "Wassa East": null,
            "Nzema East Municipal": null,
            "Prestea-Huni Valley": null,
            "Shama": null,
            "Suaman": null,
            "Sekondi Takoradi Metro.": null,
            "Sefwi-Wiawso": null,
            "Tarkwa Nsuaem Municipal": null,
            "Wasa Amenfi East": null,
            "Wasa Amenfi West": null
        }
        $('input.autocomplete').autocomplete({
            data,
            limit: 2,
            onAutocomplete: function(val) {
                if (Ashanti.includes(val)) {
                    $("#region").val("Ashanti")
                } else if (Greater_Accra.includes(val)) {
                    $("#region").val("Greater Accra")
                } else if (Western.includes(val)) {
                    $("#region").val("Western")
                } else if (Brong_ahafo.includes(val)) {
                    $("#region").val("Brong Ahafo")
                } else if (central.includes(val)) {
                    $("#region").val("Central")
                } else if (Northern.includes(val)) {
                    $("#region").val("Northern")
                } else if (Eastern.includes(val)) {
                    $("#region").val("Eastern")
                } else if (Upper_east.includes(val)) {
                    $("#region").val("Upper East")
                } else if (Upper_west.includes(val)) {
                    $("#region").val("Upper West")
                } else if (Volta.includes(val)) {
                    $("#region").val("Volta")
                }
            },
            minLength: 2,
        });
        $('input.search-auto').autocomplete({
            data,
            limit: 2,
            onAutocomplete: function(val) {
                console.log("Search:" + val)
                var pc_items = $('#items-search').val();
                var pc_locations = $('#location-search').val();
                if (pc_items != '' || pc_locations != '') {
                    $("form#search_form").submit()
                } else {
                    $("form#mob_form").submit()
                }
            },
            minLength: 2,
        })
    });
    $('#show_all_min_exp_span').click(function() {
        $('#minimum_exp_div_wrapper').removeClass('visiblity-off');
        $(this).hide()
    });
    $('#show_all_max_exp_span').click(function() {
        $('#maximum_exp_div_wrapper').removeClass('visiblity-off');
        $(this).hide()
    });
    $('#show_less_min_exp_span').click(function() {
        $('#show_all_min_exp_span').show();
        $('#minimum_exp_div_wrapper').addClass('visiblity-off')
    });
    $('#show_less_max_exp_span').click(function() {
        $('#show_all_max_exp_span').show();
        $('#maximum_exp_div_wrapper').addClass('visiblity-off')
    });
    $('#car_type_show_more').click(function() {
        $('#car_type_show_more_wrapper').removeClass('visiblity-off');
        $(this).hide()
    });
    $('#car_type_show_less').click(function() {
        $('#car_type_show_more').show();
        $('#car_type_show_more_wrapper').addClass('visiblity-off')
    });
    function formatMoney(id) {
        return $('#' + id).divide()
    }
    if (sessionStorage.getItem('page_tracker') !== location.pathname) {
        sessionStorage.setItem("filters", JSON.stringify([]));
        sessionStorage.removeItem("price_filters");
        sessionStorage.removeItem("year_filters");
        sessionStorage.removeItem("millage_filters")
    }
    var filter_items = [];
    if (filter_items.length < 1 && JSON.parse(sessionStorage.getItem('filters')) !== null) {
        filter_items = JSON.parse(sessionStorage.getItem('filters'));
        for (i = 0; i < filter_items.length; i++) {
            $('#' + filter_items[i]).attr('checked', 'checked')
        }
    }
    function loadPricefilters() {
        try {
            var price_filters = JSON.parse(sessionStorage.getItem('price_filters'));
            if (price_filters && price_filters.length > 0) {
                document.getElementById('price_min').value = price_filters[0];
                document.getElementById('price_max').value = price_filters[1]
            } else {
                $('.price_filter_clear_btn').attr('disabled', 'disabled')
            }
        } catch (e) {}
    }
    function loadYearfilters() {
        try {
            var year_filters = JSON.parse(sessionStorage.getItem('year_filters'));
            if (year_filters && year_filters.length > 0) {
                document.getElementById('year_min').value = year_filters[0];
                document.getElementById('year_max').value = year_filters[1]
            } else {
                $('.year_filter_clear_btn').attr('disabled', 'disabled')
            }
        } catch (e) {}
    }
    function loadMillagefilters() {
        try {
            var millage_filters = JSON.parse(sessionStorage.getItem('millage_filters'));
            if (millage_filters && millage_filters.length > 0) {
                document.getElementById('millage_min').value = millage_filters[0];
                document.getElementById('millage_max').value = millage_filters[1]
            } else {
                $('.millage_filter_clear_btn').attr('disabled', 'disabled')
            }
        } catch (e) {}
    }
    loadPricefilters();
    loadMillagefilters();
    loadYearfilters();
    function _input_processor() {
        var saved_filters = JSON.parse(sessionStorage.getItem('filters'));
        var price_filters = JSON.parse(sessionStorage.getItem('price_filters'));
        var year_filters = JSON.parse(sessionStorage.getItem('year_filters'));
        var millage_filters = JSON.parse(sessionStorage.getItem('millage_filters'));
        sessionStorage.setItem("page_tracker", location.pathname);
        var post_categ = [];
        var job_type = [];
        var min_exp = [];
        var max_exp = [];
        var bathroom = [];
        var bedroom = [];
        var broker_fee = [];
        var car_types = [];
        var car_condit = [];
        var transm = [];
        var item_counter = 0;
        if (saved_filters && saved_filters.length > 0) {
            for (i = 0; i < saved_filters.length; i++) {
                item_counter++;
                var text_only = saved_filters[i].replace(/[^A-Za-z]/gi, "");
                var value = saved_filters[i].replace(/[^0-9]/gi, "");
                if (text_only === 'postcat') {
                    post_categ.push(value)
                } else if (text_only === 'jobtype') {
                    job_type.push(value)
                } else if (text_only === 'minexp') {
                    min_exp.push(value)
                } else if (text_only === 'maxexp') {
                    max_exp.push(value)
                } else if (text_only === 'bathroom') {
                    bathroom.push(value)
                } else if (text_only === 'bedroom') {
                    bedroom.push(value)
                } else if (text_only === 'brokerfee') {
                    broker_fee.push(value)
                } else if (text_only === 'cartype') {
                    car_types.push(value)
                } else if (text_only === 'cond') {
                    car_condit.push(value)
                } else if (text_only === 'trans') {
                    transm.push(value)
                }
                if (item_counter === saved_filters.length) {
                    var price_min = price_filters ? price_filters[0] : 0;
                    var price_max = price_filters ? price_filters[1] : 0;
                    var page_tracker = sessionStorage.getItem('page_tracker');
                    if (page_tracker === '/property/apartments-for-rent' || page_tracker === '/property/apartments-for-sale') {
                        bathroom.sort(function(a, b) {
                            return a - b
                        });
                        bedroom.sort(function(a, b) {
                            return a - b
                        });
                        broker_fee.sort(function(a, b) {
                            return a - b
                        });
                        var bathroom = JSON.stringify(bathroom).replace(/[^0-9,]/gi, "") ? bathroom : 0;
                        var bedroom = JSON.stringify(bedroom).replace(/[^0-9,]/gi, "") ? bedroom : 0;
                        var broker_fee = JSON.stringify(broker_fee).replace(/[^0-9,]/gi, "") ? broker_fee : 0;
                        if (price_min != undefined && price_min > 0) {
                            window.location.href = location.origin + location.pathname + '?min_price=' + price_min + '&max_price=' + price_max + '&bedrooms=' + bedroom + '&bathroom=' + bathroom + '&broker_fee=' + broker_fee
                        } else {
                            window.location.href = location.origin + location.pathname + '?bedrooms=' + bedroom + '&bathroom=' + bathroom + '&broker_fee=' + broker_fee
                        }
                    } else if (page_tracker === '/jobs-services/offered-jobs' || page_tracker === '/jobs-services/seeking-work') {
                        post_categ.sort(function(a, b) {
                            return a - b
                        });
                        job_type.sort(function(a, b) {
                            return a - b
                        });
                        min_exp.sort(function(a, b) {
                            return a - b
                        });
                        max_exp.sort(function(a, b) {
                            return a - b
                        });
                        var post_categ = JSON.stringify(post_categ).replace(/[^0-9,]/gi, "") ? post_categ : 0;
                        var job_type = JSON.stringify(job_type).replace(/[^0-9,]/gi, "") ? job_type : 0;
                        var min_exp = JSON.stringify(min_exp).replace(/[^0-9,]/gi, "") ? min_exp : 0;
                        var max_exp = JSON.stringify(max_exp).replace(/[^0-9,]/gi, "") ? max_exp : 0;
                        if (price_min != undefined && price_min > 0) {
                            window.location.href = location.origin + location.pathname + '?min_price=' + price_min + '&max_price=' + price_max + '&post_categ=' + post_categ + '&job_type=' + job_type + '&min_exp=' + min_exp + '&max_exp=' + max_exp
                        } else {
                            window.location.href = location.origin + location.pathname + '?post_categ=' + post_categ + '&job_type=' + job_type + '&min_exp=' + min_exp + '&max_exp=' + max_exp
                        }
                    } else if (page_tracker === '/vehicles/cars') {
                        var year_min = year_filters ? year_filters[0] : 0;
                        var year_max = year_filters ? year_filters[1] : 0;
                        var millage_min = millage_filters ? millage_filters[0] : 0;
                        var millage_max = millage_filters ? millage_filters[1] : 0;
                        car_types.sort(function(a, b) {
                            return a - b
                        });
                        car_condit.sort(function(a, b) {
                            return a - b
                        });
                        transm.sort(function(a, b) {
                            return a - b
                        });
                        var car_types = JSON.stringify(car_types).replace(/[^0-9,]/gi, "") ? car_types : 0;
                        var car_condit = JSON.stringify(car_condit).replace(/[^0-9,]/gi, "") ? car_condit : 0;
                        var transm = JSON.stringify(transm).replace(/[^0-9,]/gi, "") ? transm : 0;
                        if (price_min != undefined && price_max > 0 && millage_min < 1 && year_min < 1) {
                            window.location.href = location.origin + location.pathname + '?min_price=' + price_min + '&max_price=' + price_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else if (year_max > 0 && millage_min < 1 && price_min < 1) {
                            window.location.href = location.origin + location.pathname + '?min_y=' + year_min + '&max_y=' + year_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else if (millage_max > 0 && year_max < 1 && price_min < 1) {
                            window.location.href = location.origin + location.pathname + '?min_mil=' + millage_min + '&max_mil=' + millage_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else if (price_min > 0 && year_max > 0 && millage_min < 1) {
                            window.location.href = location.origin + location.pathname + '?min_price=' + price_min + '&max_price=' + price_max + '&min_y=' + year_min + '&max_y=' + year_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else if (price_min > 0 && millage_max > 0 && year_min < 1) {
                            window.location.href = location.origin + location.pathname + '?min_price=' + price_min + '&max_price=' + price_max + '&min_mil=' + millage_min + '&max_mil=' + millage_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else if (year_max > 0 && millage_max > 0 && price_min < 1) {
                            window.location.href = location.origin + location.pathname + '?min_y=' + year_min + '&max_y=' + year_max + '&min_mil=' + millage_min + '&max_mil=' + millage_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else if (price_min > 0 && year_max > 0 && millage_max > 0) {
                            window.location.href = location.origin + location.pathname + '?min_price=' + price_min + '&max_price=' + price_max + '&min_y=' + year_min + '&max_y=' + year_max + '&min_mil=' + millage_min + '&max_mil=' + millage_max + '&car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        } else {
                            window.location.href = location.origin + location.pathname + '?car_type=' + car_types + '&condit=' + car_condit + '&transm=' + transm
                        }
                    }
                }
            }
        } else {
            if (price_filters != null && year_filters == null && millage_filters == null) {
                window.location.href = location.origin + location.pathname + '?min_price=' + price_filters[0] + '&max_price=' + price_filters[1]
            } else if (price_filters == null && year_filters != null && millage_filters == null) {
                window.location.href = location.origin + location.pathname + '?min_y=' + year_filters[0] + '&max_y=' + year_filters[1]
            } else if (price_filters == null && year_filters == null && millage_filters != null) {
                window.location.href = location.origin + location.pathname + '?min_mil=' + millage_filters[0] + '&max_mil=' + millage_filters[1]
            } else if (price_filters != null && year_filters != null && millage_filters == null) {
                window.location.href = location.origin + location.pathname + '?min_price=' + price_filters[0] + '&max_price=' + price_filters[1] + '&min_y=' + year_filters[0] + '&max_y=' + year_filters[1]
            } else if (price_filters != null && year_filters == null && millage_filters != null) {
                window.location.href = location.origin + location.pathname + '?min_price=' + price_filters[0] + '&max_price=' + price_filters[1] + '&min_mil=' + millage_filters[0] + '&max_mil=' + millage_filters[1]
            } else if (price_filters == null && year_filters != null && millage_filters != null) {
                window.location.href = location.origin + location.pathname + '?min_y=' + year_filters[0] + '&max_y=' + year_filters[1] + '&min_mil=' + millage_filters[0] + '&max_mil=' + millage_filters[1]
            } else if (price_filters != null && year_filters != null && millage_filters != null) {
                window.location.href = location.origin + location.pathname + '?min_price=' + price_filters[0] + '&max_price=' + price_filters[1] + '&min_y=' + year_filters[0] + '&max_y=' + year_filters[1] + '&min_mil=' + millage_filters[0] + '&max_mil=' + millage_filters[1]
            } else {
                window.location.href = location.origin + location.pathname
            }
        }
    }
    $('.price_filter_btn').click(function() {
        var price_min = Number(document.getElementById('price_min').value);
        var price_max = Number(document.getElementById('price_max').value);
        if (price_min > 0 && price_min < price_max && price_max > 0 && price_max > price_min) {
            sessionStorage.setItem("price_filters", JSON.stringify([price_min, price_max]));
            _input_processor()
        } else {
            Materialize.toast("Invalid input!", 2000)
        }
    });
    $('.price_filter_clear_btn').click(function() {
        sessionStorage.removeItem("price_filters");
        _input_processor()
    });
    $('.year_filter_btn').click(function() {
        var year_min = Number(document.getElementById('year_min').value);
        var year_max = Number(document.getElementById('year_max').value);
        if (year_min > 0 && year_min < year_max && year_max > 0 && year_max > year_min) {
            sessionStorage.setItem("year_filters", JSON.stringify([year_min, year_max]));
            _input_processor()
        } else {
            Materialize.toast("Invalid input!", 2000)
        }
    });
    $('.year_filter_clear_btn').click(function() {
        sessionStorage.removeItem("year_filters");
        _input_processor()
    });
    $('.millage_filter_btn').click(function() {
        var millage_min = Number(document.getElementById('millage_min').value);
        var millage_max = Number(document.getElementById('millage_max').value);
        if (millage_min > 0 && millage_min < millage_max && millage_max > 0 && millage_max > millage_min) {
            sessionStorage.setItem("millage_filters", JSON.stringify([millage_min, millage_max]));
            _input_processor()
        } else {
            Materialize.toast("Invalid input!", 2000)
        }
    });
    $('.millage_filter_clear_btn').click(function() {
        sessionStorage.removeItem("millage_filters");
        _input_processor()
    });
    document.body.addEventListener('click', function(e) {
        if (e.srcElement.type === 'checkbox' && e.srcElement.id !== "remember_me") {
            if ($('#' + e.srcElement.id).is(":checked")) {
                if (!filter_items.includes(e.srcElement.id)) {
                    filter_items.push(e.srcElement.id)
                    sessionStorage.setItem("filters", JSON.stringify(filter_items))
                }
                _input_processor()
            } else {
                var index = filter_items.indexOf(e.srcElement.id);
                if (index > -1) {
                    filter_items.splice(index, 1);
                    sessionStorage.setItem("filters", JSON.stringify(filter_items));
                    _input_processor()
                }
            }
        }
    });
    function removeFilters(item_array) {
        for (i = 0; i < item_array.length; i++) {
            var index = filter_items.indexOf(item_array[i]);
            if (index > -1) {
                filter_items.splice(index, 1);
                sessionStorage.setItem("filters", JSON.stringify(filter_items))
            }
        }
        _input_processor()
    }
    $('.close-car_types-chip').click(function() {
        var car_types = ['car_type_1', 'car_type_2', 'car_type_3', 'car_type_4', 'car_type_5', 'car_type_6', 'car_type_7'];
        removeFilters(car_types)
    })
    $('.close-condition-chip').click(function() {
        var conditions = ['cond_1', 'cond_2'];
        removeFilters(conditions)
    })
    $('.close-transmisson-chip').click(function() {
        var transm = ['trans_1', 'trans_2', 'trans_3', 'trans_4'];
        removeFilters(transm)
    })
    $('.close-bedroom-chip').click(function() {
        var bedroom = ['bedroom_1', 'bedroom_2', 'bedroom_3', 'bedroom_4', 'bedroom_5'];
        removeFilters(bedroom)
    })
    $('.close-bathroom-chip').click(function() {
        var bathroom = ['bathroom_1', 'bathroom_2', 'bathroom_3', 'bathroom_4', 'bathroom_5'];
        removeFilters(bathroom)
    })
    $('.close-broker_fee-chip').click(function() {
        var broker_fee = ['broker_fee_1', 'broker_fee_2'];
        removeFilters(broker_fee)
    })
    $('.close-post-category-chip').click(function() {
        var post_category = ['post_cat_1', 'post_cat_2'];
        removeFilters(post_category)
    })
    $('.close-job-type-chip').click(function() {
        var job_types = ['job_type_1', 'job_type_2', 'job_type_3', 'job_type_4'];
        removeFilters(job_types)
    })
    $('.close-minimum-exp-chip').click(function() {
        var min_exp = ['min_exp_1', 'min_exp_2', 'min_exp_3', 'min_exp_4', 'min_exp_5'];
        removeFilters(min_exp)
    })
    $('.close-maximum-exp-chip').click(function() {
        var max_exp = ['max_exp_1', 'max_exp_2', 'max_exp_3', 'max_exp_4', 'max_exp_5'];
        removeFilters(max_exp)
    })
    $('.reset-filters-chip').click(function() {
        sessionStorage.setItem("filters", JSON.stringify([]));
        _input_processor()
    })
    $('.search-btn' || keycode == 13).click(function() {
        var items = $('#items-search').val();
        var locations = $('#location-search').val();
        if (items.length >= 2) {
            $("form#search_form").submit()
        } else {
            Materialize.toast("Please enter a keyword!", 3000)
        }
    });
    $(".mobi_search" || keycode == 13).click(function() {
        var mob_items = $('#mob_items').val();
        var mob_locations = $('#mob_location').val();
        if (mob_items.length >= 2) {
            $("form#mob_form").submit()
        } else {
            Materialize.toast("Please enter a keyword!", 3000)
        }
    });
    $(".main_mobile_sch" || keycode == 13).click(function() {
        var main_mob_item = $('.mob_main_item').val();
        if (main_mob_item.length >= 2) {
            $("form#mobile_main_form").submit()
        } else {
            Materialize.toast("Please enter a keyword!", 3000)
        }
    });
    $(".copy-number").click(function() {
        var aux = document.createElement("input");
        aux.setAttribute("value", $("#contact-owner").val());
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
        Materialize.toast("Copied!", 3000);
        $('.close_account_model').modal('close')
    });
    $('.tabs').click(function() {
        if ($('.tabs .tab').find($("my_ads"))) {
            setTimeout(function() {
                mason_grid("#my_ads", ".shop-mason-item")
            }, 100)
        }
    })
    $("#new_device,#approved_ads,#unread_chats,#general_notif").change(function() {
        $('#notification_btn').removeAttr('disabled')
    });
    $('#account_delete').attr('disabled', 'disabled');
    $("#notification_btn").click(function() {
        var device_notif = '';
        var approved_ads_notif = '';
        var unread_chats_notif = '';
        var gene_alerts_notif = '';
        var current_user = escapehtml($("#user_id_").val());
        var not_btn_innertxt = document.getElementById('notif-btn_interhtml');
        if ($("#new_device").is(":checked")) {
            device_notif = 1
        } else {
            device_notif = 0
        }
        if ($("#approved_ads").is(":checked")) {
            approved_ads_notif = 1
        } else {
            approved_ads_notif = 0
        }
        if ($("#unread_chats").is(":checked")) {
            unread_chats_notif = 1
        } else {
            unread_chats_notif = 0
        }
        if ($("#general_notif").is(":checked")) {
            gene_alerts_notif = 1
        } else {
            gene_alerts_notif = 0
        }
        $('#notification_btn').attr('disabled', 'disabled');
        not_btn_innertxt.innerHTML = 'Saving... ';
        $("#notifications_spinner").addClass("fa-spin fa-spinner");
        $.ajax({
            url: "../change-notifications",
            timeout: 200000,
            type: "POST",
            data: {
                device_notif: device_notif,
                approved_ads_notif: approved_ads_notif,
                unread_chats_notif: unread_chats_notif,
                gene_alerts_notif: gene_alerts_notif,
                id: current_user
            },
            success: function(data) {
                if (data == 'Saved' || data == 'Updated') {
                    $('#notification_btn').removeAttr('disabled');
                    not_btn_innertxt.innerHTML = 'Saved';
                    $("#notifications_spinner").removeClass("fa-spin fa-spinner");
                    location.reload()
                } else {
                    $('#notification_btn').removeAttr('disabled');
                    not_btn_innertxt.innerHTML = ' Save Changes';
                    $("#notifications_spinner").removeClass("fa-spin fa-spinner");
                    Materialize.toast("Unknown error has occurred, please try again!", 6000)
                }
            },
            error: function(data) {
                Materialize.toast("Unknown error has occurred, please try again!", 6000);
                $('#notification_btn').removeAttr('disabled');
                not_btn_innertxt.innerHTML = ' Save Changes';
                $("#notifications_spinner").removeClass("fa-spin fa-spinner")
            }
        })
    });
    if ($('#lineChart').length) {
        $.ajax({
            url: "../get-views",
            timeout: 200000,
            type: "POST",
            data: {},
            success: function(data) {
                var _data = data;
                var data_ = _data.split("\\");
                var ctx = document.getElementById("lineChart");
                var lineChart = new Chart(ctx,{
                    type: 'line',
                    data: {
                        labels: ["Today", "This week", "This  Month", "This  Year"],
                        datasets: [{
                            label: "Ad Views",
                            backgroundColor: "rgba(3, 88, 106, 0.3)",
                            borderColor: "rgba(3, 88, 106, 0.70)",
                            pointBorderColor: "rgba(3, 88, 106, 0.70)",
                            pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "rgba(151,187,205,1)",
                            pointBorderWidth: 1,
                            data: [data_[0], data_[1], data_[2], data_[3]]
                        }]
                    },
                })
            },
            error: function(data) {}
        })
    }
    if ($('#mybarChart').length) {
        $.ajax({
            url: "../get-likes",
            timeout: 200000,
            type: "POST",
            data: {},
            success: function(data) {
                var _data = data;
                var data_ = _data.split("\\");
                var ctx = document.getElementById("mybarChart");
                var mybarChart = new Chart(ctx,{
                    type: 'bar',
                    data: {
                        labels: ["Today", "This week", "This Month", "This Year"],
                        datasets: [{
                            label: 'Ad Likes',
                            backgroundColor: ["#9B59B6", "#26B99A", "#3498DB", "#73879C"],
                            data: [data_[0], data_[1], data_[2], data_[3]]
                        }]
                    },
                    options: {
                        responsive: !0,
                        legend: !1,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: !0
                                }
                            }]
                        }
                    }
                })
            },
            error: function(data) {}
        })
    }
    if ($('#pieChart').length) {
        $.ajax({
            url: "../listing-type",
            timeout: 200000,
            type: "POST",
            data: {},
            success: function(data) {
                var _data = data;
                var items = _data.split("\\");
                var ctx = document.getElementById("pieChart");
                var data = {
                    datasets: [{
                        data: [items[0], items[1], items[2], items[3], items[4], items[5]],
                        backgroundColor: ["#9B59B6", "#546E7A", "#4CAF50", "#26B99A", "#FFA000", "#3498DB"],
                        label: 'My dataset'
                    }],
                    labels: ["Selling ads", "Swapping ads", " Swap or Sell", "Renting ads", "Job Offers", "Job Seeking ads"]
                };
                var pieChart = new Chart(ctx,{
                    data: data,
                    type: 'pie',
                    otpions: {
                        legend: !1
                    }
                })
            },
            error: function(data) {}
        })
    }
    $("#personal").change(function() {
        $("#account_value-hidden").val("personal");
        $('#change_account_type-btn').removeAttr('disabled')
    });
    $("#business").change(function() {
        $("#account_value-hidden").val("business");
        $('#change_account_type-btn').removeAttr('disabled')
    });
    var account_type = $("#account_value-hidden").val();
    if (account_type != undefined) {
        $('#notification_btn').attr('disabled', 'disabled');
        $('#change_account_type-btn').attr('disabled', 'disabled');
        if (account_type == 'personal') {
            $(".business-info_div").addClass("bussines_hidden")
        } else if (account_type == 'business') {
            $(".business-info_div").removeClass("bussines_hidden")
        }
    }
    $("#change_account_type-btn").click(function() {
        var account_type = $("#account_value-hidden").val();
        var current_user = $("#user_id_").val();
        $('#change_account_type-btn').attr('disabled', 'disabled');
        $("#accounttype_spinner").addClass("fa-spin fa-spinner");
        $.ajax({
            url: "../change-account",
            timeout: 200000,
            type: "POST",
            data: {
                user_id: current_user,
                account_type: account_type
            },
            success: function(data) {
                if (data == 'Saved' || data == 'Updated') {
                    $('#change_account_type-btn').removeAttr('disabled');
                    $("#accounttype_spinner").removeClass("fa-spin fa-spinner");
                    location.reload()
                } else {
                    $('#change_account_type-btn').removeAttr('disabled');
                    $("#accounttype_spinner").removeClass("fa-spin fa-spinner");
                    Materialize.toast("Unknown error has occurred, please try again!", 6000)
                }
            },
            error: function(data) {
                Materialize.toast(data, 3000, 'rounded');
                ('#change_account_type-btn').removeAttr('disabled');
                $("#accounttype_spinner").removeClass("fa-spin fa-spinner");
                Materialize.toast("Unknown error has occurred, please try again!", 6000)
            }
        })
    });
    $("#submit_busi-btn").click(function() {
        var business_name = escapehtml($('#busi-name').val());
        var business_location = escapehtml($('#busi-locat').val());
        var working_days = escapehtml($('#work-days').val());
        var working_hours = escapehtml($('#work-hours').val());
        var contact_1 = escapehtml($('#busi-contact-1').val());
        var contact_2 = escapehtml($('#busi-contact-2').val());
        var email_add = escapehtml($('#busi_email').val());
        var banner_img = $("#banner_image").prop("files")[0];
        var image_path = escapehtml($("#busi-img_path").val());
        var about_us = escapehtml($('#about-us').val());
        var _user_id = escapehtml($("#user_id_").val());
        var submiting_info_ = document.getElementById('submiting_info_');
        var busi_errors = document.getElementById('busi-errors');
        if (business_name == '' || business_name == !1) {
            busi_errors.innerHTML = 'Please enter your business name!'
        } else if (business_name.length < 4) {
            busi_errors.innerHTML = 'Sorry, your business name is too short!'
        } else if (business_name.length > 21) {
            busi_errors.innerHTML = 'Sorry, your business name is too long!'
        } else if (business_location == '' || business_location == !1) {
            busi_errors.innerHTML = 'Please enter the current location of your business!'
        } else if (business_location.length < 5 || business_location.length > 80) {
            busi_errors.innerHTML = 'Sorry, your business location is too short or too long!'
        } else if (working_days == '' || working_days == null) {
            busi_errors.innerHTML = 'Please select a valid working days!'
        } else if (working_hours == '' || working_hours == null) {
            busi_errors.innerHTML = 'Please select a valid working hours!'
        } else if (isNaN(contact_1) || contact_1 == !1 || contact_1.length < 10 || contact_1.length > 13) {
            busi_errors.innerHTML = 'Please enter a valid contact number!'
        } else if (contact_2 != !1 && contact_2.length < 10 || contact_2.length > 13) {
            busi_errors.innerHTML = 'Sorry, your other contact number is invalid!'
        } else if (email_add != !1 && !(email_add.indexOf("@") > -1 && email_add.indexOf(".") > -1)) {
            busi_errors.innerHTML = 'Please enter a valid email address!'
        } else if (banner_img == null && image_path == null || image_path == !1 || image_path == '') {
            busi_errors.innerHTML = 'Please upload your custom business banner image!'
        } else if (about_us == !1) {
            busi_errors.innerHTML = 'Please write a brief description your business!'
        } else if (about_us.length < 10) {
            busi_errors.innerHTML = 'Sorry, your business description it too short!'
        } else if (about_us.length > 250) {
            busi_errors.innerHTML = 'Sorry, your business description it too long!'
        } else {
            $('#submit_busi-btn').attr('disabled', 'disabled');
            $("#business_spinner").addClass("fa-spin fa-spinner");
            submiting_info_.innerHTML = 'Please wait...';
            var form_data = new FormData();
            form_data.append("business_name", business_name);
            form_data.append("business_location", business_location);
            form_data.append("working_days", working_days);
            form_data.append("working_hours", working_hours);
            form_data.append("contact_1", contact_1);
            form_data.append("contact_2", contact_2);
            form_data.append("email_add", email_add);
            form_data.append("banner_img", banner_img);
            form_data.append("about_us", about_us);
            form_data.append("id", _user_id);
            $.ajax({
                url: "../business-info",
                timeout: 200000,
                dataType: 'script',
                cache: !1,
                contentType: !1,
                processData: !1,
                type: "POST",
                data: form_data,
                success: function(data) {
                    if (data == 'Saved' || data == 'Updated') {
                        $("#business_spinner").removeClass("fa-spin fa-spinner");
                        $('#submit_busi-btn').removeAttr('disabled');
                        location.reload()
                    } else {
                        submiting_info_.innerHTML = 'Update info';
                        $("#business_spinner").removeClass("fa-spin fa-spinner");
                        $('#submit_busi-btn').removeAttr('disabled');
                        Materialize.toast("Unknown error has occurred, please try again!", 6000)
                    }
                },
                error: function(data) {
                    submiting_info_.innerHTML = 'Update info';
                    $("#business_spinner").removeClass("fa-spin fa-spinner");
                    $('#submit_busi-btn').removeAttr('disabled');
                    Materialize.toast("Unknown error has occurred, please try again!", 6000)
                }
            })
        }
    });
    var post_ad_page = $("#upload").val();
    if (post_ad_page != undefined) {
        load_json_data('make');
        function load_json_data(id, parent_id) {
            var selection = '';
            $.getJSON('../js/make.json', function(data) {
                selection += '<option value="">Select ' + id + '</option>';
                $.each(data, function(key, value) {
                    if (id == 'make') {
                        if (value.parent_id == '0') {
                            selection += '<option value="' + value.id + '">' + value.name + '</option>'
                        }
                    } else {
                        if (value.parent_id == parent_id) {
                            selection += '<option value="' + value.name + '">' + value.name + '</option>'
                        }
                    }
                });
                $('#' + id).html(selection)
            })
        }
        $(document).on('change', '#make', function() {
            var make_idd = $(this).val();
            if (make_idd != '') {
                load_json_data('model', make_idd)
            }
        })
    }
    $('#make').change(function() {
        var makes = $('#make').val();
        if (makes == 1) {
            $('#hidden_make').val("Acura")
        } else if (makes == 2) {
            $('#hidden_make').val("Audi")
        } else if (makes == 3) {
            $('#hidden_make').val("BMW")
        } else if (makes == 4) {
            $('#hidden_make').val("Buick")
        } else if (makes == 5) {
            $('#hidden_make').val("Cadillac")
        } else if (makes == 8) {
            $('#hidden_make').val("Chevrolet")
        } else if (makes == 9) {
            $('#hidden_make').val("Chrysler")
        } else if (makes == 10) {
            $('#hidden_make').val("Dodge")
        } else if (makes == 11) {
            $('#hidden_make').val("FIAT")
        } else if (makes == 12) {
            $('#hidden_make').val("Ford")
        } else if (makes == 13) {
            $('#hidden_make').val("Genesis")
        } else if (makes == 14) {
            $('#hidden_make').val("GMC")
        } else if (makes == 15) {
            $('#hidden_make').val("Honda")
        } else if (makes == 16) {
            $('#hidden_make').val("Hyundai")
        } else if (makes == 17) {
            $('#hidden_make').val("Infiniti")
        } else if (makes == 18) {
            $('#hidden_make').val("Jaguar")
        } else if (makes == 19) {
            $('#hidden_make').val("Jeep")
        } else if (makes == 20) {
            $('#hidden_make').val("Kia")
        } else if (makes == 21) {
            $('#hidden_make').val("Land Rover")
        } else if (makes == 22) {
            $('#hidden_make').val("LEXUS")
        } else if (makes == 23) {
            $('#hidden_make').val("Lincoln")
        } else if (makes == 24) {
            $('#hidden_make').val("Mazda")
        } else if (makes == 25) {
            $('#hidden_make').val("Mercedes-Benz")
        } else if (makes == 26) {
            $('#hidden_make').val("MINI")
        } else if (makes == 27) {
            $('#hidden_make').val("Mitsubishi")
        } else if (makes == 28) {
            $('#hidden_make').val("Nissan")
        } else if (makes == 29) {
            $('#hidden_make').val("Porsche")
        } else if (makes == 30) {
            $('#hidden_make').val("Ram")
        } else if (makes == 31) {
            $('#hidden_make').val("Scion")
        } else if (makes == 32) {
            $('#hidden_make').val("Smart")
        } else if (makes == 33) {
            $('#hidden_make').val("Subaru")
        } else if (makes == 34) {
            $('#hidden_make').val("Tesla")
        } else if (makes == 35) {
            $('#hidden_make').val("Toyota")
        } else if (makes == 36) {
            $('#hidden_make').val("Volkswagen")
        } else if (makes == 37) {
            $('#hidden_make').val("Volvo")
        }
    });
    var poster_id = $("#_poster_id").val();
    if (poster_id != undefined) {
        load_json_data('make_update');
        function load_json_data(id, parent_id) {
            var make = $("#hidd_make").val();
            var html_code = '';
            $.getJSON('../js/make.json', function(data) {
                html_code += '<option value="">' + make + '</option>';
                $.each(data, function(key, value) {
                    if (id == 'make_update') {
                        if (value.parent_id == '0') {
                            html_code += '<option value="' + value.id + '">' + value.name + '</option>'
                        }
                    } else {
                        if (value.parent_id == parent_id) {
                            html_code += '<option value="' + value.name + '">' + value.name + '</option>'
                        }
                    }
                });
                $('#' + id).html(html_code)
            })
        }
        $(document).on('change', '#make_update', function() {
            var make_id = $(this).val();
            if (make_id != '') {
                load_json_data('model_update', make_id)
            }
        })
    }
    $('#make_update').change(function() {
        var makes = $('#make_update').val();
        if (makes == 1) {
            $('#hidd_make_update').val("Acura")
        } else if (makes == 2) {
            $('#hidd_make_update').val("Audi")
        } else if (makes == 3) {
            $('#hidd_make_update').val("BMW")
        } else if (makes == 4) {
            $('#hidd_make_update').val("Buick")
        } else if (makes == 5) {
            $('#hidd_make_update').val("Cadillac")
        } else if (makes == 8) {
            $('#hidd_make_update').val("Chevrolet")
        } else if (makes == 9) {
            $('#hidd_make_update').val("Chrysler")
        } else if (makes == 10) {
            $('#hidd_make_update').val("Dodge")
        } else if (makes == 11) {
            $('#hidd_make_update').val("FIAT")
        } else if (makes == 12) {
            $('#hidd_make_update').val("Ford")
        } else if (makes == 13) {
            $('#hidd_make_update').val("Genesis")
        } else if (makes == 14) {
            $('#hidd_make_update').val("GMC")
        } else if (makes == 15) {
            $('#hidd_make_update').val("Honda")
        } else if (makes == 16) {
            $('#hidd_make_update').val("Hyundai")
        } else if (makes == 17) {
            $('#hidd_make_update').val("Infiniti")
        } else if (makes == 18) {
            $('#hidd_make_update').val("Jaguar")
        } else if (makes == 19) {
            $('#hidd_make_update').val("Jeep")
        } else if (makes == 20) {
            $('#hidd_make_update').val("Kia")
        } else if (makes == 21) {
            $('#hidd_make_update').val("Land Rover")
        } else if (makes == 22) {
            $('#hidd_make_update').val("LEXUS")
        } else if (makes == 23) {
            $('#hidd_make_update').val("Lincoln")
        } else if (makes == 24) {
            $('#hidd_make_update').val("Mazda")
        } else if (makes == 25) {
            $('#hidd_make_update').val("Mercedes-Benz")
        } else if (makes == 26) {
            $('#hidd_make_update').val("MINI")
        } else if (makes == 27) {
            $('#hidd_make_update').val("Mitsubishi")
        } else if (makes == 28) {
            $('#hidd_make_update').val("Nissan")
        } else if (makes == 29) {
            $('#hidd_make_update').val("Porsche")
        } else if (makes == 30) {
            $('#hidd_make_update').val("Ram")
        } else if (makes == 31) {
            $('#hidd_make_update').val("Scion")
        } else if (makes == 32) {
            $('#hidd_make_update').val("Smart")
        } else if (makes == 33) {
            $('#hidd_make_update').val("Subaru")
        } else if (makes == 34) {
            $('#hidd_make_update').val("Tesla")
        } else if (makes == 35) {
            $('#hidd_make_update').val("Toyota")
        } else if (makes == 36) {
            $('#hidd_make_update').val("Volkswagen")
        } else if (makes == 37) {
            $('#hidd_make_update').val("Volvo")
        }
    });
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || !1;
            var links = this.el.find('.link');
            links.on('click', {
                el: this.el,
                multiple: this.multiple
            }, this.dropdown)
        }
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this),
            $next = $this.next();
            $next.slideToggle();
            $this.parent().toggleClass('open');
            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open')
            }
        }
        ;
        var accordion = new Accordion($('#accordion'))
    });
    var catego = document.querySelectorAll(".categ h5");
    var category_selection = document.getElementById('category_selection');
    var subcategory_selection = document.getElementById('subcategory_selection');
    $(".cat").click(function() {
        let cat = category_selection.innerHTML = this.innerHTML
    });
    $(".sub").click(function() {
        let subcat = subcategory_selection.innerHTML = this.innerHTML
    });
    let Ashanti = ["kumasi", "Adum", "Ayeduase", "Aboabo", "Ahinsan", "Ahodwo", "Amakom", "Anloga", "Anwomaso", "Apatrapa", "Asafo", "Asawasi", "Ashanti New Town", "Asokwa", "Atonsu-Agogo", "Ayigya", "Asokore Mampong", "Bantama", "Boadi", "Bomso", "Breman", "Buokrom", "Buokrom Estate", "Daban", "Dakwadwom", "Dichemso", "Dompoase", "Edwenase", "Gyinyasi", "Kaase", "Kejetia", "Kumasi Metropolitan", "Kokoben", "Kwadaso Nsuom", "Manhyia", "Mbrom", "Esreso", "Aputuogya", "Feyiase", "Moshie Zongo", "New Suame", "New Tafo", "Nhyiaeso", "Nsenie", "Nyankyerenease", "Oforikrom", "Old Tafo", "Pankrono", "Patase", "Santasi", "Sawaba", "Sokoban", "Suame", "KNUST", "Tarkwa Maakro", "Adansi North", "Adansi South", "Atwima Nwabiagya", "Afigya-Kwabre", "Ahafo Ano North", "Amansie West", "Ahafo Ano South", "Amansie West", "Asante Akim Central Municipal", "Asante Akim North", "Asante Akim South", "Asokore Mampong Municipal", "Atwima Kwanwoma", "Atwima Mponua", "Bekwai Municipal", "Bosome Freho", "Bosomtwe", "Ejisu-Juaben Municipal", "Ejura/Sekyedumase", "Kwabre East", "Kumawu", "Mampong Municipal", "Obuasi Municipal", "Offinso North", "Offinso South Municipal", "Sekyere Central", "Sekyere East", "Sekyere South"];
    let Greater_Accra = ["Accra", "Abeka La Paz", "Accra Central", "Abelemkpe", "Ablorh Adjei", "Abokobi", "Aborfu", "Abossey Okai", "Accra new Town", "Achimota", "Adabraka", "Adenta", "Adjankote", "Adjiriganor", "Agbogba", "Agbogbloshie", "Akatsi Abor", "Akweteman", "Alajo", "Apenkwa", "Ashaley Botwe", "Avenor", "Awoshie", "Ashongman Estates", "Asylum Down", "Banana Inn", "Bubuashie", "Bukom", "Burma Camp", "Cantonments", "Carprice", "Chantang", "Chorkor", "Circle", "Dansoman", "Darkuman", "Dome", "Dzorwulu", "Dansoman", "Darkuman", "Dome", "Dzorwulu", "East Legon", "East Legon (Okponglo)", "Gbawe", "Haatso", "Kanda Estate", "Kaneshie", "Kantamanto", "Kokomlemle", "Korle Gonno", "Korle-Bu", "Kotobabi", "Kwabenya", "Kwashieman", "La-Aborm", "Labone", "Lashibi", "Legon", "Lartebiokorshie", "Mallam", "Mallam Atta", "Mamobi", "Mamprobi", "Madina", "Mataheko", "McCarthy Hill", "New Achimota", "New Fadama", "New Ashongman", "New Aplaku Mandela", "North Mamprobi", "New Weija", "Nii Boi Town", "Nima", "North Kaneshie", "North Legon", "North Ridge", "Nungua", "Nungua East", "Nungua Old Town", "Nungua-Zongo", "Odorkor", "Osu", "Osu Ako-Adjei", "Oyarifa", "Pokuase", "Ridge", "Roman Ridge", "Ringway Estates", "Ridge", "Sakaman", "Shiashie", "South La", "South Odorkor", "Spintex", "Sukura", "T/Junction", "Taifa", "Tantra Hill", "Tesano", "Teshie New Town", "Teshie Old Town", "Teshie-Nungua Estates", "Trassacco Valley Estates", "West Legon", "Ada West", "Adenta Municipal", "Adjiriganno", "Afienya", "Ashaiman Municipal", "Dangme East", "Dangme West", "Ga Central", "Ga West  Municipal", "Ga East  Municipal", "Ga South Municipal", "Kpone Katamanso", "La Dade-Kotopon", "La-Nkwantanang-Madina", "Ledzokuku-Krowor", "Ningo/Prampam", "Oyibi", "Tema", "Tema Metropolitan"];
    let Western = ["Anaji", "Adiembra", "Apremdo", "Assakae", "Beach Road", "Butumagyebu", "Chapel Hill", "Effia", "Effia Nkwanta", "Essipon", "Kojokrom", "Kwesimintsim", "Market Circle", "Mpintsin", "New Takoradi", "Ntankoful", "Pipe Ano", "Sekondi", "Sekondi(Township)", "Tanokrom", "Takoradi", "Ahanta West", "Anhwiaso", "Aowin", "Suaman", "Bia", "Bibiani", "Bekwai", "Ellembele", "Jomoro", "Juaboso", "Wassa East", "Nzema East Municipal", "Prestea-Huni Valley", "Shama", "Suaman", "Sekondi Takoradi Metro.", "Sefwi-Wiawso", "Tarkwa Nsuaem Municipal", "Wasa Amenfi East", "Wasa Amenfi West"];
    let Brong_ahafo = ["Asunafo South", "Asutifi", "Asutifi South", "Asunafo North Municipal", "Atebubu-Amantin Municipal", "Berekum Municipal", "Dormaa Municipal", "Dormaa East", "Jaman North", "Jaman South", "Kintampo North Municipal", "Kintampo South", "Nkoranza North", "Nkoranza South", "Pru", "Sunyani Municipal", "Sunyani West", "Sene West", "Techiman Municipal", "Tain", "Tano North", "Tano South", "Techiman North", "Wenchi Municipal"];
    let central = ["Agona West Municipal", "Awutu-Senya-East", "Abura", "Asebu", "Asikuma Odoben", "Abirem Municipal", "Assin North Municipal", "Assin South", "Awutu-Senya", "Kwamankese", "Agona East", "Ajumako", "Enyan", "Essiam", "Brakwa", "Cape Coast Metropolitan", "Effutu Municipal", "Ekumfi", "Gomoa  East", "Gomoa  West", "Komenda", "Edina", "Eguafo", "Twifo-Ati Mokwa", "Twifo", "Heman", "Lower Denkyira", "Upper Denkyira East", "Upper Denkyira West", "Kasoa"];
    let Eastern = ["Akropong", "Akuapim South", "Afram Plains South", "Akuapim North", "Akuapim South Municipal", "Akyemansa", "Ahafo Ano North", "Asuogyaman", "Atiwa", "Ayensuano", "Ahafo Ano South", "Birim North", "Birim South", "Birim Central Municipal", "Denkyembour", "East Akim Municipal", "Fanteakwa", "Koforidua", "Kwaebibirem", "Kwahu East", "Kwahu North", "Kwahu South", "Kwahu West Municipal", "New-Juaben Municipal", "Suhum/Kraboa/Coaltar", "Upper Manya Krobo", "Upper West Akim", "Yilo Krobo"];
    let Northern = ["Bole", "Chereponi", "East Gonja", "Kpandai", "North Gonja", "Sagnarigu", "Sawla-Tuna-Kalba", "Savelugu/Nanton", "Tolon", "Tamale Metropolitan", "West Mamprusi", "Yendi Municipal"];
    let Upper_east = ["Bawku Municipal", "Bawku West", "Bongo", "Builsa", "Bolgatanga Municipal", "Biakoye", "Garu-Tempane", "Kassena Nankana East", "Kassena Nankana West", "Pusiga", "Talensi", "Nkwanta North", "Nkwanta South", "North Dayi", "North Tongu", "South Dayi", "South Tongu"];
    let Upper_west = ["Jirapa", "Lawra", "Wa Municipal"];
    let Volta = ["Akatsi North", "Akatsi South", "Biakoye", "Central Tongu", "Denu", "Ho West", "Ho Municipal", "Hohoe Municipal", "Keta Municipal", "Ketu South Municipal", "Kpando Municipal", "Ketu North", "Krachi East", "Krachi West", "Nkwanta North", "Nkwanta South", "North Dayi", "North Tongu", "South Dayi", "South Tongu"];
    $(".antiques").click(function() {
        if ($('.antiques').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.antiques').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.antiques').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.antiques').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".art").click(function() {
        if ($('.art').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.art').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.art').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.art').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".baby").click(function() {
        if ($('.baby').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.baby').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.baby').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.baby').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".books").click(function() {
        if ($('.books').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.books').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.books').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.books').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".clothing").click(function() {
        if ($('.clothing').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.clothing').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.clothing').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.clothing').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".computers").click(function() {
        if ($('.computers').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.computers').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.computers').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.computers').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".crafts").click(function() {
        if ($('.crafts').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.crafts').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.crafts').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.crafts').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".electronics").click(function() {
        if ($('.electronics').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.electronics').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.electronics').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.electronics').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".health_beauty").click(function() {
        if ($('.health_beauty').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.health_beauty').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.health_beauty').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.health_beauty').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".home_garden").click(function() {
        if ($('.home_garden').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.home_garden').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.home_garden').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.home_garden').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".jewelry").click(function() {
        if ($('.jewelry').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.jewelry').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.jewelry').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.jewelry').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".movies").click(function() {
        if ($('.movies').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.pet_animals,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.movies').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.movies').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.movies').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".pet_animals").click(function() {
        if ($('.pet_animals').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.shoes,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.pet_animals').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.pet_animals').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.pet_animals').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".shoes").click(function() {
        if ($('.shoes').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.sport_fitness,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.shoes').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.shoes').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.shoes').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".sport_fitness").click(function() {
        if ($('.sport_fitness').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.toys,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.sport_fitness').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.sport_fitness').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.sport_fitness').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".toys").click(function() {
        if ($('.toys').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.vehicles,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.toys').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.toys').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.toys').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".vehicles").click(function() {
        if ($('.vehicles').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.toys,.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.vehicles').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.vehicles').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.vehicles').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $(".video_games").click(function() {
        if ($('.video_games').find($(".fa")).hasClass('fa-plus-circle')) {
            $('.antiques,.art,.baby,.books,.clothing,.computers,.crafts,.electronics,.health_beauty,.home_garden,.jewelry,.movies,.pet_animals,.shoes,.sport_fitness,.vehicles,.vehicles').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            $('.video_games').find($(".fa")).removeClass('fa-plus-circle').addClass('fa-minus-circle')
        } else if ($('.video_games').find($(".fa")).hasClass('fa-minus-circle')) {
            $('.video_games').find($(".fa")).removeClass('fa-minus-circle').addClass('fa-plus-circle')
        }
    });
    $("#next_1").click(function() {
        var title = $("#title").val();
        var listing_type = $("#listing-type").val();
        var category = $("#category").val();
        var main_cat = $("#main_cat").val();
        var sub_cat = $("#sub_cat").val();
        if (main_cat == 'Health and Beauty') {
            $("#main_cat").val('health-beauty')
        } else if (main_cat == 'Home and Garden') {
            $("#main_cat").val('home-garden')
        } else if (main_cat == 'Pets and Animals') {
            $("#main_cat").val('pets-animals')
        } else if (main_cat == 'Sports and Fitness') {
            $("#main_cat").val('sports-fitness')
        } else if (main_cat == 'Jobs and Services') {
            $("#main_cat").val('jobs-services')
        }
        if (sub_cat == 'Classes and Courses') {
            $("#sub_cat").val('classes-courses')
        } else if (sub_cat == 'Seeking Work') {
            $("#sub_cat").val('seeking-work')
        } else if (sub_cat == 'Offered Jobs') {
            $("#sub_cat").val('offered-jobs')
        } else if (sub_cat == 'Apartments for Rent') {
            $("#sub_cat").val('apartments-for-rent')
        } else if (sub_cat == 'Apartments for Sale') {
            $("#sub_cat").val('apartments-for-sale')
        } else if (sub_cat == 'Commercial Property') {
            $("#sub_cat").val('commercial-property')
        } else if (sub_cat == 'New Developments') {
            $("#sub_cat").val('new-developments')
        } else if (sub_cat == 'Office and Shops') {
            $("#sub_cat").val('office-shops')
        }
        var city = $("#city").val();
        var region = $("#region").val();
        var images = $(".ssi-imgToUpload").val();
        var price_label = document.getElementById('for-price');
        var title_error = document.getElementById('title_error');
        var category_error = document.getElementById('category_error');
        var listing_type_error = document.getElementById('listing-type_error');
        var location_error = document.getElementById('location_error');
        var images_error = document.getElementById('images_error');
        if (images == null) {
            images_error.innerHTML = 'Please select at least 1 photo!'
        } else if (title == '' || title.length < 6 || title == null || title == undefined || title == !1) {
            title_error.innerHTML = 'Title should be at least 6 characters long!'
        } else if (title.length > 45) {
            title_error.innerHTML = 'Sorry, your ad title is too long!'
        } else if (category == '') {
            category_error.innerHTML = 'Please select your ad category!'
        } else if (listing_type == null || listing_type == 'select') {
            listing_type_error.innerHTML = 'Please select your ad listing type!'
        } else if (city == '') {
            location_error.innerHTML = 'Please enter your ad location!'
        } else if (region == '') {
            city = $("#city").val("");
            location_error.innerHTML = "Sorry, your city or town doesn't exist on our database, plz try again!"
        } else {
            if ($("#sub_cat").val() == "apartments-for-rent" || $("#sub_cat").val() == "seeking-work" || $("#sub_cat").val() == "offered-jobs") {
                $('.wishlist-holder,.item_conditon_div_wrapper').css('display', 'none')
            } else {
                $('.wishlist-holder,.item_conditon_div_wrapper').css('display', 'block')
            }
            if (listing_type == 'Sell' || listing_type == 'Rent' || listing_type == 'Job_Offer' || listing_type == 'Job_Seeking') {
                $(".wishlist-holder").css('display', 'none');
                price_label.innerHTML = 'Price*'
            } else {
                price_label.innerHTML = 'Value*';
                $(".wishlist-holder").css('display', 'block')
            }
            if ($("#main_cat").val() == 'Vehicles' && $("#sub_cat").val() == 'Cars') {
                $('.vehicle-cars').css('display', 'block')
            } else if ($("#main_cat").val() == 'Vehicles' && $("#sub_cat").val() == 'Motorcycles') {
                $('.vehicle-motocycles').css('display', 'block')
            } else if ($("#main_cat").val() == 'jobs-services' && $("#sub_cat").val() == 'seeking-work' || $("#sub_cat").val() == 'offered-jobs') {
                if ($("#sub_cat").val() == 'seeking-work') {
                    $('.deadline_wrapper').css('display', 'none')
                } else {
                    $('.deadline_wrapper').css('display', 'block')
                }
                $('.jobs-services').css('display', 'block')
            } else if ($("#main_cat").val() == 'Property' && $("#sub_cat").val() == 'apartments-for-rent' || $("#sub_cat").val() == 'apartments-for-sale') {
                $('.property').css('display', 'block')
            } else {
                $('.final-step').css('display', 'block')
            }
            $('#form-2').modal('open')
        }
    });
    $("#cars_continue").click(function() {
        var make = $("#hidden_make").val();
        var model = $("#model").val();
        var year = $("#year").val();
        var trans_type = $("#transmission-type").val();
        var car_type = $("#car-type").val();
        var miles = $("#millage").val();
        var make_error = document.getElementById('make_error');
        var model_error = document.getElementById('model_error');
        var year_error = document.getElementById('year_error');
        var transm_error = document.getElementById('transm_error');
        var car_type_error = document.getElementById('car_type_error');
        var millage_error = document.getElementById('millage_error');
        if (make == '' || make == 'Select make') {
            animate('#cars_continue', 'shake');
            $('#make_error').addClass('errors-3');
            make_error.innerHTML = 'Please select car make from below!'
        } else if (model == '' || model == 'Select model') {
            animate('#cars_continue', 'shake');
            $('#model_error').addClass('errors-3');
            model_error.innerHTML = 'Please select car model from below!'
        } else if (year == null || year == 'Select') {
            animate('#cars_continue', 'shake');
            $('#year_error').addClass('errors-3');
            year_error.innerHTML = 'Please select year from below!'
        } else if (trans_type == null || trans_type == 'Select') {
            animate('#cars_continue', 'shake');
            $('#transm_error').addClass('errors-3');
            transm_error.innerHTML = 'Please select transmission type from bellow!'
        } else if (car_type == null || car_type == 'Select') {
            animate('#cars_continue', 'shake');
            $('#car_type_error').addClass('errors-3');
            car_type_error.innerHTML = 'Please select car type from bellow!'
        } else if (miles == '' || miles == '   ' || miles == !1) {
            animate('#cars_continue', 'shake');
            millage_error.innerHTML = 'Please enter car millage!'
        } else if (miles == 0) {
            animate('#cars_continue', 'shake');
            millage_error.innerHTML = 'Please enter a valid number!'
        } else {
            animate('.vehicle-cars', 'slideOutLeft');
            setTimeout(function() {
                $('.vehicle-cars').css('display', 'none');
                animate('.final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.final-step').css('display', 'block')
            }, 1000)
        }
    });
    $('#salary_from').keyup(function() {
        var number = $(this).val().replace(/[^0-9,]/gi, "");
        $('#salary_from').val(number)
    })
    $('#salary_to').keyup(function() {
        var number = $(this).val().replace(/[^0-9,]/gi, "");
        $('#salary_to').val(number)
    })
    formatMoney('salary_from');
    formatMoney('salary_to');
    $("#jobs_continue").click(function() {
        var employer = document.getElementById('employer').value;
        var job_expiry_date = document.getElementById('job_expiry_date').value;
        var job_type = document.getElementById('job_type').value;
        var qualification = document.getElementById('qualification').value;
        var min_experience = document.getElementById('min_experience').value;
        var max_experience = document.getElementById('max_experience').value;
        var salary_from = Number(document.getElementById('salary_from').value);
        var salary_to = Number(document.getElementById('salary_to').value);
        if (employer == !1 || employer.length < 3 || employer.length > 50 || employer == null) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid employer name!", 4000, 'rounded')
        } else if (job_type == undefined || job_type == 'null' || job_type.length < 5) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid job type!", 4000, 'rounded')
        } else if (qualification == undefined || qualification == 'null' || qualification.length < 3) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Please select a valid qualification!", 4000, 'rounded')
        } else if (min_experience == undefined || min_experience == 'null' || min_experience.length < 1) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid minimum experience!", 4000, 'rounded')
        } else if (max_experience == undefined || max_experience == 'null' || max_experience.length < 1) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid maximum experience!", 4000, 'rounded')
        } else if (salary_from < 1 || salary_from > salary_to || salary_to < 1 || salary_to < salary_from || salary_to == salary_from) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid salary input!", 4000, 'rounded')
        } else {
            animate('.jobs-services', 'slideOutLeft');
            setTimeout(function() {
                $('.jobs-services').css('display', 'none');
                animate('.final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.final-step').css('display', 'block')
            }, 1000)
        }
    });
    $('.property_btn').click(function() {
        var surface_size = document.getElementById('surface_size').value;
        var bedrooms = document.getElementById('bedrooms').value;
        var bathrooms = document.getElementById('bathrooms').value;
        var broker_fee = document.getElementById('broker_fee').value;
        if (surface_size === !1 || surface_size.length < 1) {
            animate('.property_btn', 'shake');
            Materialize.toast("Please enter a valid surface size!", 4000, 'rounded')
        } else if (bedrooms === 'null' || bedrooms === null) {
            animate('.property_btn', 'shake');
            Materialize.toast("Invalid selection!", 4000, 'rounded')
        } else if (bathrooms === 'null' || bathrooms === null) {
            animate('.property_btn', 'shake');
            Materialize.toast("Invalid selection!", 4000, 'rounded')
        } else if (broker_fee === 'null' || broker_fee === null) {
            animate('.property_btn', 'shake');
            Materialize.toast("Invalid selection!", 4000, 'rounded')
        } else {
            animate('.property', 'slideOutLeft');
            setTimeout(function() {
                $('.property').css('display', 'none');
                animate('.final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.final-step').css('display', 'block')
            }, 1000)
        }
    })
    $(".moto_btn").click(function() {
        var moto_makes = $("#motorcycle-make").val();
        var moto_error = document.getElementById('moto_error');
        if (moto_makes == '' || moto_makes == 'select' || moto_makes == null) {
            animate('.moto_btn', 'shake');
            moto_error.innerHTML = 'Please select motorcycle make from list above!'
        } else {
            animate('.vehicle-motocycles', 'slideOutLeft');
            setTimeout(function() {
                $('.vehicle-motocycles').css('display', 'none');
                animate('.final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.final-step').css('display', 'block')
            }, 1000)
        }
    });
    $("#update_cont").click(function() {
        var title = $("#title").val();
        var listing_type = $("#listing-type").val();
        var category = $("#category").val();
        var city = $("#city").val();
        var region = $("#region").val();
        var main_cat = $("#main_cat").val();
        var sub_cat = $("#sub_cat").val();
        if (main_cat == 'Health and Beauty') {
            $("#main_cat").val('health-beauty')
        } else if (main_cat == 'Home and Garden') {
            $("#main_cat").val('home-garden')
        } else if (main_cat == 'Pets and Animals') {
            $("#main_cat").val('pets-animals')
        } else if (main_cat == 'Sports and Fitness') {
            $("#main_cat").val('sports-fitness')
        } else if (main_cat == 'Jobs and Services') {
            $("#main_cat").val('jobs-services')
        }
        if (sub_cat == 'Classes and Courses') {
            $("#sub_cat").val('classes-courses')
        } else if (sub_cat == 'Seeking Work') {
            $("#sub_cat").val('seeking-work')
        } else if (sub_cat == 'Offered Jobs') {
            $("#sub_cat").val('offered-jobs')
        } else if (sub_cat == 'Apartments for Rent') {
            $("#sub_cat").val('apartments-for-rent')
        } else if (sub_cat == 'Apartments for Sale') {
            $("#sub_cat").val('apartments-for-sale')
        } else if (sub_cat == 'Commercial Property') {
            $("#sub_cat").val('commercial-property')
        } else if (sub_cat == 'New Developments') {
            $("#sub_cat").val('new-developments')
        } else if (sub_cat == 'Office and Shops') {
            $("#sub_cat").val('office-shops')
        }
        var image_1 = $("#hidden_img1").val();
        var update1_img = $(".update1_img").prop("files")[0];
        var price_label = document.getElementById('for-price');
        var title_error = document.getElementById('title_error');
        var category_error = document.getElementById('category_error');
        var listing_type_error = document.getElementById('listing-type_error');
        var location_error = document.getElementById('location_error');
        var images_error = document.getElementById('images_error');
        if (image_1 == undefined && update1_img == undefined) {
            images_error.innerHTML = 'Please select at least 1 photo!'
        } else if (title == '' || title.length < 6) {
            title_error.innerHTML = 'Title should be at least 6 characters long!'
        } else if (title.length > 45) {
            title_error.innerHTML = 'Sorry, your ad title is too long!'
        } else if (category == '') {
            category_error.innerHTML = 'Please select your ad category!'
        } else if (listing_type == null || listing_type == 'select') {
            listing_type_error.innerHTML = 'Please select your ad listing type!'
        } else if (city == '') {
            location_error.innerHTML = 'Please enter your ad location!'
        } else if (region == '') {
            city = $("#city").val("");
            location_error.innerHTML = "Your city or town doesn't exist own our database, plz try again!"
        } else {
            if ($("#sub_cat").val() == "apartments-for-rent" || $("#sub_cat").val() == "seeking-work" || $("#sub_cat").val() == "offered-jobs") {
                $('.wishlist-holder,.item_conditon_div_wrapper').css('display', 'none')
            } else {
                $('.wishlist-holder,.item_conditon_div_wrapper').css('display', 'block')
            }
            if (listing_type == 'Sell' || listing_type == 'Rent' || listing_type == 'Job_Offer' || listing_type == 'Job_Seeking') {
                $(".wishlist-holder").css('display', 'none');
                price_label.innerHTML = 'Price*'
            } else {
                price_label.innerHTML = 'Value*';
                $(".wishlist-holder").css('display', 'block')
            }
            if ($("#main_cat").val() == 'Vehicles' && $("#sub_cat").val() == 'Cars') {
                $('.update-jobs-services,.update-property,.update-vehicle-motocycles,.update-final-step').css('display', 'none');
                $('.update-vehicle-cars').css('display', 'block')
            } else if ($("#main_cat").val() == 'Vehicles' && $("#sub_cat").val() == 'Motorcycles') {
                $('.update-jobs-services,.update-property,.update-vehicle-cars,.update-final-step').css('display', 'none');
                $('.update-vehicle-motocycles').css('display', 'block')
            } else if ($("#main_cat").val() == 'jobs-services' && $("#sub_cat").val() == 'seeking-work' || $("#sub_cat").val() == 'offered-jobs') {
                if ($("#sub_cat").val() == 'seeking-work') {
                    $('.deadline_wrapper').css('display', 'none')
                } else {
                    $('.deadline_wrapper').css('display', 'block')
                }
                $('.update-property,.update-vehicle-motocycles,.update-vehicle-motocycles,.update-vehicle-cars,.update-final-step').css('display', 'none');
                $('.update-jobs-services').css('display', 'block')
            } else if ($("#main_cat").val() == 'Property' && $("#sub_cat").val() == 'apartments-for-rent' || $("#sub_cat").val() == 'apartments-for-sale') {
                $('.update-jobs-services,.update-vehicle-motocycles,.update-vehicle-motocycles,.update-vehicle-cars,.update-final-step').css('display', 'none');
                $('.update-property').css('display', 'block')
            } else {
                $('.update-jobs-services,.update-vehicle-motocycles,.update-vehicle-motocycles,.update-vehicle-cars').css('display', 'none');
                $('.update-final-step').css('display', 'block')
            }
            $('#form-2').modal('open')
        }
    });
    $("#carsUpdate_cont").click(function() {
        var make_update = $("#hidd_make_update").val();
        var make_new = $("#hidd_make").val();
        var model = $("#model_update").val();
        var year = $("#year_update").val();
        var trans_type = $("#transmission-type_update").val();
        var car_type = $("#car-type_update").val();
        var miles = $("#millage_update").val();
        var up_make_error = document.getElementById('up_make_error');
        var up_model_error = document.getElementById('up_model_error');
        var up_year_error = document.getElementById('up_year_error');
        var up_transm_error = document.getElementById('up_transm_error');
        var up_car_type_error = document.getElementById('up_car_type_error');
        var up_millage_error = document.getElementById('up_millage_error');
        if (make_update == '' && make_new == '') {
            animate('#carsUpdate_cont', 'shake');
            $('#up_make_error').addClass('errors-3');
            up_make_error.innerHTML = 'Please select car make from below!'
        } else if (model == '' || model == 'Select model') {
            animate('#carsUpdate_cont', 'shake');
            $('#up_model_error').addClass('errors-3');
            up_model_error.innerHTML = 'Please select car model from below!'
        } else if (year == null || year == 'Select') {
            animate('#carsUpdate_cont', 'shake');
            $('#up_year_error').addClass('errors-3');
            up_year_error.innerHTML = 'Please select year from below!'
        } else if (trans_type == null || trans_type == 'Select') {
            animate('#carsUpdate_cont', 'shake');
            $('#up_transm_error').addClass('errors-3');
            up_transm_error.innerHTML = 'Please select transmission type from bellow!'
        } else if (car_type == null || car_type == 'Select') {
            animate('#carsUpdate_cont', 'shake');
            $('#up_car_type_error').addClass('errors-3');
            up_car_type_error.innerHTML = 'Please select car type from bellow!'
        } else if (miles == '' || miles == '   ') {
            animate('#carsUpdate_cont', 'shake');
            up_millage_error.innerHTML = 'Please enter a car millage!'
        } else if (miles == 0) {
            animate('#carsUpdate_cont', 'shake');
            up_millage_error.innerHTML = 'Please enter a valid number!'
        } else {
            animate('.update-vehicle-cars', 'slideOutLeft');
            setTimeout(function() {
                $('.update-vehicle-cars').css('display', 'none');
                animate('.update-final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.update-final-step').css('display', 'block')
            }, 1000)
        }
    });
    $("#updat_jobs_continue").click(function() {
        var employer = document.getElementById('up_employer').value;
        var job_expiry_date = document.getElementById('up_job_expiry_date').value;
        var job_type = document.getElementById('up_job_type').value;
        var qualification = document.getElementById('up_qualification').value;
        var min_experience = document.getElementById('up_min_experience').value;
        var max_experience = document.getElementById('up_max_experience').value;
        var salary_from = Number(document.getElementById('up_salary_from').value);
        var salary_to = Number(document.getElementById('up_salary_to').value);
        if (employer == !1 || employer.length < 3 || employer.length > 50 || employer == null) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid employer name!", 4000, 'rounded')
        } else if (job_type == undefined || job_type == 'null' || job_type.length < 5) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid job type!", 4000, 'rounded')
        } else if (qualification == undefined || qualification == 'null' || qualification.length < 3) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Please select a valid qualification!", 4000, 'rounded')
        } else if (min_experience == undefined || min_experience == 'null' || min_experience.length < 1) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid minimum experience!", 4000, 'rounded')
        } else if (max_experience == undefined || max_experience == 'null' || max_experience.length < 1) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid maximum experience!", 4000, 'rounded')
        } else if (salary_from < 1 || salary_from > salary_to || salary_to < 1 || salary_to < salary_from || salary_to == salary_from) {
            animate('.jobs_btn', 'shake');
            Materialize.toast("Invalid salary input!", 4000, 'rounded')
        } else {
            animate('.update-jobs-services', 'slideOutLeft');
            setTimeout(function() {
                $('.update-jobs-services').css('display', 'none');
                animate('.update-final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.update-final-step').css('display', 'block')
            }, 1000)
        }
    });
    $('#upda_property_btn').click(function() {
        var surface_size = document.getElementById('up_surface_size').value;
        var bedrooms = document.getElementById('up_bedrooms').value;
        var bathrooms = document.getElementById('up_bathrooms').value;
        var broker_fee = document.getElementById('up_broker_fee').value;
        if (surface_size === !1 || surface_size.length < 1) {
            animate('#upda_property_btn', 'shake');
            Materialize.toast("Please enter a valid surface size!", 4000, 'rounded')
        } else if (bedrooms === 'null' || bedrooms === null) {
            animate('#upda_property_btn', 'shake');
            Materialize.toast("Invalid selection!", 4000, 'rounded')
        } else if (bathrooms === 'null' || bathrooms === null) {
            animate('#upda_property_btn', 'shake');
            Materialize.toast("Invalid selection!", 4000, 'rounded')
        } else if (broker_fee === 'null' || broker_fee === null) {
            animate('#upda_property_btn', 'shake');
            Materialize.toast("Invalid selection!", 4000, 'rounded')
        } else {
            animate('.update-property', 'slideOutLeft');
            setTimeout(function() {
                $('.update-property').css('display', 'none');
                animate('.update-final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.update-final-step').css('display', 'block')
            }, 1000)
        }
    })
    $(".Up_moto_btn").click(function() {
        var moto_makes = $("#up_motorcycle-make").val();
        var moto_error = document.getElementById('up_moto_error');
        if (moto_makes == '' || moto_makes == 'select' || moto_makes == null) {
            animate('.moto_btn', 'shake');
            moto_error.innerHTML = 'Please select motorcycle make from list above!'
        } else {
            animate('.update-vehicle-motocycles', 'slideOutLeft');
            setTimeout(function() {
                $('.update-vehicle-motocycles').css('display', 'none');
                animate('.update-final-step', 'slideInRight')
            }, 1000);
            setTimeout(function() {
                $('.update-final-step').css('display', 'block')
            }, 1000)
        }
    });
    $("#recover_acc").click(function() {
        $('#login_mod').modal('close');
        $('#recover_mod').modal('open')
    });
    $("#register,.register_").click(function() {
        $('#login_mod').modal('close');
        $('#register_mod').removeClass("login_modal");
        $('#register_mod').addClass("register1_modal");
        $('.button-collapse').sideNav('hide');
        $('#register_mod').modal('open')
    });
    $(".close_account_model").click(function() {
        let user_mob = document.getElementById('reg_mobile').value;
        if (user_mob.length == 10) {
            swal({
                title: "WARNING",
                text: "Your registration progress will be lost!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                cancelButtonText: "CANCEL",
                closeOnConfirm: !0,
                closeOnCancel: !0
            }, function(isConfirm) {
                if (isConfirm) {
                    $('#register_mod').modal('close');
                    window.location.href = '/';
                    return !0
                }
            })
        } else {
            $('#register_mod').modal('close')
        }
    });
    $('#resend').click(function() {
        $('#register_mod').removeClass("register2_modal");
        $('#register_title').removeClass("register_title");
        $('#pin-sent').html('');
        $('#register_mod').addClass("register1_modal")
    });
    $("#rec_login,.sign_in,.mob-swap").click(function() {
        $('#register_mod').modal('close');
        $('.button-collapse').sideNav('hide');
        $('#login_mod').modal('open')
    });
    $(".exit_ownerbumber").click(function() {
        $('#contact_info').modal('close')
    });
    $(".exit_report").click(function() {
        $('#report_ad').modal('close')
    });
    $(".ad_post_modal").click(function() {
        $('#form-2').modal('close')
    });
    $(".exit_filters").click(function() {
        $('#filter_mod').modal('close')
    });
    $("#category").click(function() {
        $('#maincat_model').modal('open')
    });
    $(".sub").click(function() {
        let cat = category_selection.innerHTML;
        let subcat = subcategory_selection.innerHTML;
        $("#main_cat").val(cat);
        $("#sub_cat").val(subcat);
        $("#category").val(cat + " --> " + subcat);
        Materialize.updateTextFields();
        if (subcat == "Offered Jobs") {
            $("#listing-type").prepend("<option selected value='Job_Offer'>Offering a job</option>");
            $('#swap_or_sell_option,#sell_option,#swap_option,#rent_option,#job_seeking_option').attr('disabled', 'disabled')
        } else if (subcat == "Seeking Work") {
            $("#listing-type").prepend("<option selected value='Job_Seeking'>Looking for a job</option>");
            $('#swap_or_sell_option,#sell_option,#swap_option,#rent_option,#job_offere_option').attr('disabled', 'disabled')
        } else if (subcat == "Apartments for Rent") {
            $("#listing-type").prepend("<option selected value='Rent'>Rent</option>");
            $('#swap_or_sell_option,#sell_option,#swap_option,#job_seeking_option,#job_offere_option').attr('disabled', 'disabled')
        } else {
            $('#job_seeking_option,#job_offere_option,#rent_option').attr('disabled', 'disabled')
        }
        $('#submodal1').modal('close')
    });
    $(".home").click(function() {
        window.location.href = '/'
    });
    $(".name_holder,.welcome_holder,.fullname_holder").click(function() {
        window.location.href = '/user-account'
    });
    $(".name_holder").click(function() {
        window.location.href = '/user-account'
    });
    $(".chat").click(function() {
        var open_chat = $("#user_loggedin").val();
        if (open_chat > 0) {
            window.location.href = '/ad-chat'
        } else {
            $("#chat_clicked").val(1);
            $('.button-collapse').sideNav('hide');
            $('#login_mod').modal('open')
        }
    });
    $(".post_ad").click(function() {
        var open_chat = $("#user_loggedin").val();
        if (open_chat > 0) {
            window.location.href = '/post-ad'
        } else {
            $("#swap_clicked").val(1);
            $('.button-collapse').sideNav('hide');
            $('#login_mod').modal('open')
        }
    });
    $(".exit_main").click(function() {
        $('#maincat_model').modal('close')
    });
    $(".exit_sub").click(function() {
        $('#submodal1').modal('close')
    });
    $("#1").click(function() {
        $("#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6,#sub_hidden_7").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_1").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#2").click(function() {
        $("#sub_hidden_1,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6,#sub_hidden_7").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_2").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#3").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6,#sub_hidden_7").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_3").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#4").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_5,#sub_hidden_6,#sub_hidden_7").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_4").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#5").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_6,#sub_hidden_7").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_5").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#6").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_7").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_6").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#7").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_7").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#8").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_8").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#9").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_9").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#10").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_11,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_10").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#11").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_12,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_11").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#12").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_13").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_12").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#13").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_13").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#14").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_13,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_14").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#15").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_13,#sub_hidden_14,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_15").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#16").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_13,#sub_hidden_14,#sub_hidden_15,#sub_hidden_17,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_16").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#17").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_13,#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_18,#sub_hidden_19").hide();
        $("#sub_hidden_17").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#18").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_13,#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_19").hide();
        $("#sub_hidden_18").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $("#19").click(function() {
        $("#sub_hidden_1,#sub_hidden_2,#sub_hidden_3,#sub_hidden_4,#sub_hidden_5,#sub_hidden_6").hide();
        $("#sub_hidden_7,#sub_hidden_8,#sub_hidden_9,#sub_hidden_10,#sub_hidden_11,#sub_hidden_12").hide();
        $("#sub_hidden_13,#sub_hidden_14,#sub_hidden_15,#sub_hidden_16,#sub_hidden_17,#sub_hidden_18").hide();
        $("#sub_hidden_19").show();
        $('#maincat_model').modal('close');
        $('#submodal1').modal('open')
    });
    $(".arrow-div").click(function() {
        $(".chat-hidden").removeClass("hide-on-large-only");
        $(".chat-hidden").addClass("hide-on-med-and-down");
        $(".chats_box").removeClass("hide")
    });
    $('#resend').click(function() {
        animate('.register', 'slideOutRight');
        setTimeout(function() {
            $('.register').css('display', 'none');
            animate('.pin_sender', 'slideInLeft')
        }, 1000);
        setTimeout(function() {
            $('.pin_sender').css('display', 'block')
        }, 1000);
        return !1
    });
    function animate(element, animation) {
        $(element).addClass('animated ' + animation);
        var wait = setTimeout(function() {
            $(element).removeClass('animated ' + animation)
        }, 1000)
    }
    $(".file1_class").change(function() {
        if ($(".file1_class").val() != null) {
            var file = document.getElementById("file1_id").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#file1_img').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
    });
    $(".file2_class").change(function() {
        if ($(".file2_class").val() != null) {
            var file = document.getElementById("file2_id").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#file2_img').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
    });
    $(".file3_class").change(function() {
        if ($(".file3_class").val() != null) {
            var file = document.getElementById("file3_id").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#file3_img').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
    });
    $(".file4_class").change(function() {
        if ($(".file4_class").val() != null) {
            var file = document.getElementById("file4_id").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#file4_img').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
    });
    $(".file5_class").change(function() {
        if ($(".file5_class").val() != null) {
            var file = document.getElementById("file5_id").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#file5_img').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
    });
    $(".file6_class").change(function() {
        if ($(".file6_class").val() != null) {
            var file = document.getElementById("file6_id").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#file6_img').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
    });
    function LetterOnly(input) {
        var regex = /[^A-Za-z \n\r\t]/gi;
        input.value = input.value.replace(regex, "")
    }
    $("#mobile").keyup(function() {
        var mobile = document.getElementById('mobile');
        var regex = /[^0-9]/gi;
        mobile.value = mobile.value.replace(regex, "")
    });
    $("#pin").keyup(function() {
        var pin = document.getElementById('pin');
        var regex = /[^0-9]/gi;
        pin.value = pin.value.replace(regex, "")
    });
    $("#mob_register").keyup(function() {
        var mob_register = document.getElementById('mob_register');
        var regex = /[^0-9]/gi;
        mob_register.value = mob_register.value.replace(regex, "")
    });
    $("#reg_mobile").keyup(function() {
        var reg_mobile = document.getElementById('reg_mobile');
        var regex = /[^0-9]/gi;
        reg_mobile.value = reg_mobile.value.replace(regex, "")
    });
    $("#reg_pin").keyup(function() {
        var reg_pin = document.getElementById('reg_pin');
        var regex = /[^0-9]/gi;
        reg_pin.value = reg_pin.value.replace(regex, "")
    });
    $("#recover_mobile").keyup(function() {
        var recover_mobile = document.getElementById('recover_mobile');
        var regex = /[^0-9]/gi;
        recover_mobile.value = recover_mobile.value.replace(regex, "")
    });
    $("#price").divide();
    $("#millage").divide();
    $('#millage').keyup(function() {
        var numbers = /[^0-9,]/gi;
        var number = $('#millage').val().replace(numbers, "");
        $('#millage').val(number)
    });
    $('#price').keyup(function() {
        var numbers = /[^0-9,]/gi;
        var number = $('#price').val().replace(numbers, "");
        $('#price').val(number)
    });
    function escapehtml(text) {
        try {
            return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;")
        } catch (e) {}
    }
    function mason_grid(wrapper, seletor) {
        var $grid = $(wrapper).masonry({
            itemSelector: seletor,
            columnWidth: seletor,
            percentPosition: !0
        });
        $grid.imagesLoaded().progress(function() {
            $grid.masonry('reloadItems');
            $grid.masonry('layout')
        })
    }
    var _ownerid = $('#owner_id').val();
    var _chat_ad_id = $('#chat_ad-id').val();
    var _chat_session_id = $('#session_id').val();
    var chat_buyer_id = $('#buyer_id').val();
    var details_ad_owner = $('#user_id').val();
    var conversation = document.getElementById('conversation');
    var message = document.getElementById('message');
    var sender = document.getElementById('sender-id');
    $(".sender_btn").click(function() {
        var _message = escapehtml($('#message').val());
        var date = new Date();
        var hour = date.getHours();
        var minutes = date.getMinutes();
        var time = "" + hour + ":" + minutes;
        if (_message == null || _message == undefined || _message == !1) {
            Materialize.toast("Can't send empty message!", 3000, 'rounded')
        } else if (_message.length < 2) {
            Materialize.toast("Message too short!", 3000, 'rounded')
        } else {
            _message = escapehtml(_message);
            conversation.innerHTML += "<div class=\"talk-bubble_b tri-left right-top\"><div class=\"talktext\"><p><span class=\"chat_messag\">" + _message + " " + time + "</span> <span class=\"chat_timestamp\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i></span></p></div></div>";
            _message.value = "";
            $.ajax({
                url: "../chat",
                timeout: 200000,
                type: "POST",
                data: {
                    ownerid: _ownerid,
                    ad_id: _chat_ad_id,
                    message: _message,
                    session: _chat_session_id,
                    buyer: chat_buyer_id,
                    time: time
                },
                success: function(data) {
                    message.value = "";
                    $.ajax({
                        url: "../unread_chats",
                        timeout: 200000,
                        type: "POST",
                        data: {
                            ownerid: _ownerid,
                            session: _chat_session_id,
                            buyer: chat_buyer_id,
                            ad_id: _chat_ad_id
                        },
                        success: function(data) {},
                        error: function(data) {
                            Materialize.toast("Slow network detected!", 3000)
                        }
                    })
                },
                error: function(data) {
                    Materialize.toast("Slow network detected!", 3000)
                }
            })
        }
    });
    $('#pic').change(function() {
        var img = '';
        var date = new Date();
        var hour = date.getHours();
        var minutes = date.getMinutes();
        var time = "" + hour + ":" + minutes;
        if ($("#pic").val() != null) {
            img += "<div class=\"talk-bubble_b\"><div class=\"talktext\"><p><span class=\"chat_img\"><img  id=\"photo\" src=\"\"  alt=\"\" width=\"150\"  height=\"150\"/></span> <span class=\"chatimg_timestamp\">19:50pm</span></p></div></div>";
            var file = document.getElementById("pic").files[0];
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#photo').attr('src', e.target.result)
            }
            if (file) {
                reader.readAsDataURL(file)
            } else {}
        }
        conversation.innerHTML += img;
        var _photo = $("#pic").prop("files")[0];
        var form_data = new FormData();
        form_data.append("file", _photo);
        form_data.append("ownerid", _ownerid);
        form_data.append("ad_id", _chat_ad_id);
        form_data.append("session", _chat_session_id);
        form_data.append("buyer_id", chat_buyer_id);
        form_data.append("time", time);
        $.ajax({
            url: "../photo",
            timeout: 200000,
            dataType: 'script',
            cache: !1,
            contentType: !1,
            processData: !1,
            type: "POST",
            data: form_data,
            success: function(data) {},
            error: function(data) {}
        })
    });
    function getChats() {
        if (_chat_ad_id != '' || _chat_ad_id != null && _ownerid != '' || _ownerid != null && _chat_session_id != '' || _chat_session_id != null && sender.value != null || sender.value != '') {
            $.ajax({
                url: "../get-chat",
                timeout: 200000,
                type: "POST",
                data: {
                    ad_id: _chat_ad_id,
                    owner: _ownerid,
                    session: _chat_session_id
                },
                success: function(data) {
                    var output = "";
                    var _data = data;
                    _data = _data.split("\n");
                    var rl = _data.length;
                    var item = "";
                    for (var i = 0; i < rl; i++) {
                        item = _data[i].split("\\");
                        if (item[1] != undefined) {
                            if (item[1] == sender.value) {
                                if (item[4] == '' && item[5] != null || item[5] != '') {
                                    if (item[6] == 0) {
                                        output += "<div class=\"talk-bubble_b-img-div\"><div class=\"talktext\"><p><span class=\"chat_img\"><img class='talk-bubble_b-img' id=\"photo\" src=\"../images/user-submitted/thumb/xs/" + item[5] + "\" alt=\"\"/></span> <span class=\"chatimg_timestamp\"><span style=\"margin-right:5px;\">" + item[7] + "</span><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span></p></div></div>"
                                    } else {
                                        output += "<div class=\"talk-bubble_b-img-div\"><div class=\"talktext\"><p><span class=\"chat_img\"><img class='talk-bubble_a-img' id=\"photo\" src=\"../images/user-submitted/thumb/xs/" + item[5] + "\" alt=\"\"></span><span class=\"chatimg_timestamp\" style=\"font-size:10px; padding-top:140px; color:#1e88e5;\"><span style=\"color:gray; font-size:11px;\"><span style=\"margin-right:5px;\">" + item[7] + "</span></span>  <i class=\"fa fa-check\" aria-hidden=\"true\"></i><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span></p></div></div>"
                                    }
                                } else {
                                    if (item[6] == 0) {
                                        output += "<div class=\"talk-bubble_b tri-left right-top\"><div class=\"talktext\"><p><span class=\"chat_messag\">" + item[4] + "</span> <span class=\"chat_timestamp\"><span style=\"margin-right:5px;\">" + item[7] + "</span><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span></p></div></div>"
                                    } else {
                                        output += "<div class=\"talk-bubble_b tri-left right-top\"><div class=\"talktext\"><p><span class=\"chat_messag\">" + item[4] + "</span> <span class=\"chat_timestamp\" style=\"font-size:10px; color:#1e88e5;\"><span style=\"font-size:10px; padding-right:10px;\"><span style=\"margin-right:5px;\">" + item[7] + "</span></span><i class=\"fa fa-check\" aria-hidden=\"true\"></i><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span></p></div></div>"
                                    }
                                }
                            } else if (item[2] == sender.value && item[3] == chat_buyer_id) {
                                if (item[4] == '' && item[5] != null || item[5] != '') {
                                    output += "<div class=\"talk-bubble_a-img-div\"><div class=\"talktext\"><p><span class=\"chat_img\"><img class='talk-bubble_a-img'  src=\"../images/user-submitted/thumb/xs/" + item[5] + "\"  alt=\"\"></span> <span class=\"chatimg_timestamp\"><span><span style=\"margin-right:5px;\">" + item[7] + "</span></span></span></p></div></div>"
                                } else {
                                    output += "<div class=\"left-align talk-bubble_a tri-right left-top\"><div class=\"left-align talktext\"><p><span class=\"chat_messag\">" + item[4] + "</span><span class=\"chat_timestamp\"><span style=\"margin-right:5px;\">" + item[7] + "</span></span></p></div></div>"
                                }
                            } else if (item[3] == sender.value) {
                                if (item[4] == '' && item[5] != null || item[5] != '') {
                                    output += "<div class=\"talk-bubble_a-img-div\"><div class=\"talktext\"><p><span class=\"chat_img\"><img  class'talk-bubble_a-img' src=\"../images/user-submitted/thumb/xs/" + item[5] + "\"  alt=\"\"></span> <span class=\"chatimg_timestamp\"  style=\"padding-top:140px; font-size:10px;><span style=\"margin-right:5px;\">" + item[7] + "</span></span></p></div></div>"
                                } else {
                                    output += "<div class=\"left-align talk-bubble_a tri-right left-top\"><div class=\"left-align talktext\"><p><span class=\"chat_messag\">" + item[4] + "</span><span class=\"chat_timestamp\"><span style=\"margin-right:5px;\">" + item[7] + "</span></span></p></div></div>"
                                }
                            }
                        }
                    }
                    conversation.innerHTML = output
                },
                error: function(data) {
                    Materialize.toast(data, 3000, 'rounded')
                }
            })
        }
    }
    if (_chat_session_id == undefined || isNaN(_chat_session_id) || _chat_session_id == '') {} else {
        setInterval(function() {
            getChats()
        }, 1000)
    }
    var _userid = $('#user_id').val();
    var _ad_poster_id = $('#ad_poster-id').val();
    var _ad_id = $('#ad_id').val();
    if (_ad_poster_id == _userid) {
        $('.chat_btn').attr('disabled', 'disabled')
    }
    $('.chat_btn').click(function() {
        if (_userid > 0 && _userid != '' && _ad_id != '' && _ad_id != undefined) {
            $.ajax({
                url: "../chat-log",
                timeout: 200000,
                type: "POST",
                data: {
                    user: _userid,
                    ad_id: _ad_id,
                    owner: _ad_poster_id
                },
                success: function(data) {
                    if (data == 'success') {
                        window.location.href = '/ad-chat'
                    } else if (data == 'exist') {
                        window.location.href = '/ad-chat';
                        return !0
                    }
                },
                error: function(data) {
                    swal("Error", "Unknown error has occurred, please try again!", "warning");
                    return !1
                }
            })
        } else {
            $("#chat_clicked").val(1);
            $('#login_mod').modal('open')
        }
    });
    $('.call_btn').click(function() {
        if (_userid > 0) {
            Materialize.toast("Please wait...", 1000);
            $("#call_spinner").removeClass("fa-phone");
            $("#call_spinner").addClass("fa-spin fa-spinner");
            $('.call_btn').attr('disabled', 'disabled');
            $.ajax({
                url: "../get-mobile",
                timeout: 200000,
                type: "POST",
                data: {
                    poster_id: _ad_poster_id,
                    custom_id: _ad_id
                },
                success: function(data) {
                    if ($(window).width() < 950) {
                        document.getElementById('call_owner_btn').href = 'tel:' + data;
                        $("#call_spinner").removeClass("fa-spin fa-spinner").addClass("fa-phone")
                    } else {
                        $("#contact-owner").val(data);
                        $("#call_spinner").removeClass("fa-spin fa-spinner").addClass("fa-phone");
                        $('#contact_info').modal('open')
                    }
                    $('.call_btn').removeAttr('disabled')
                },
                error: function(data) {
                    $("#call_spinner").removeClass("fa-spin fa-spinner");
                    $("#call_spinner").addClass("fa-phone");
                    $('.call_btn').removeAttr('disabled');
                    Materialize.toast("Unknown error has occurred, please try again!", 6000)
                }
            })
        } else {
            $('#login_mod').modal('open')
        }
    });
    var likes = document.getElementById('ad_like');
    var mob_likes = document.getElementById('mob_likes');
    var likes_count = document.getElementById('likes_count');
    var mob_likes_count = document.getElementById('mob_likes_count');
    var details = $('#details_hidden').val();
    if (details != undefined) {
        $.ajax({
            url: "../all-likes",
            timeout: 200000,
            type: "POST",
            data: {
                ad_id: _ad_id
            },
            success: function(data) {
                if (data == 1) {
                    if (mob_likes != null) {
                        mob_likes.innerHTML = ' Unlike this ad'
                    } else if (likes_count != null) {
                        likes.innerHTML = ' Unlike this ad'
                    }
                } else {
                    if (mob_likes != null) {
                        mob_likes.innerHTML = ' Like this ad'
                    } else if (likes_count != null) {
                        likes.innerHTML = ' Like this ad'
                    }
                }
            },
            error: function(data) {
                swal("Error", "Unknown error has occurred, please try again!", "warning")
            }
        })
    }
    $('.like').click(function() {
        if (_ad_id > 0) {
            $.ajax({
                url: "../ad-like",
                timeout: 200000,
                type: "POST",
                data: {
                    ad_id: _ad_id,
                    poster: _ad_poster_id
                },
                success: function(data) {
                    if (data == 'success') {
                        $.ajax({
                            url: "../likes-counter",
                            type: "POST",
                            data: {
                                ad_id: _ad_id
                            },
                            success: function(data) {
                                if (mob_likes != null) {
                                    mob_likes_count.innerHTML = data
                                } else if (likes_count != null) {
                                    likes_count.innerHTML = data
                                }
                            },
                            error: function(data) {
                                Materialize.toast("Unknown error has occurred, please try again!", 6000);
                                return !1
                            }
                        });
                        if (mob_likes != null) {
                            mob_likes.innerHTML = ' Unlike this ad';
                            Materialize.toast('Like has been saved', 4000)
                        } else if (likes_count != null) {
                            likes.innerHTML = ' Unlike this ad';
                            Materialize.toast('Like has been saved', 4000)
                        }
                    } else if (data == 'exist') {
                        $.ajax({
                            url: "../likes-counter",
                            timeout: 200000,
                            type: "POST",
                            data: {
                                ad_id: _ad_id
                            },
                            success: function(data) {
                                if (mob_likes != null) {
                                    mob_likes_count.innerHTML = data
                                } else if (likes_count != null) {
                                    likes_count.innerHTML = data
                                }
                            },
                            error: function(data) {
                                swal("Error", "Unknown error has occurred, please try again!", "warning");
                                return !1
                            }
                        });
                        if (mob_likes != null) {
                            mob_likes.innerHTML = ' Like this ad';
                            Materialize.toast('Ad has been unliked', 4000)
                        } else if (likes_count != null) {
                            likes.innerHTML = ' Like this ad';
                            Materialize.toast('Ad has been unliked', 4000)
                        }
                    } else if (data == 'error') {
                        $('#login_mod').modal('open')
                    } else {
                        swal("Error", "Unknown error has occurred, please try again!", "warning");
                        return !1
                    }
                },
                error: function(data) {
                    swal("Error", "Unknown error has occurred, please try again!", "warning");
                    return !1
                }
            })
        }
    });
    $('.contact_us-btn').click(function() {
        var name_error = document.getElementById('name-error');
        var mobile_error = document.getElementById('mobile-error');
        var email_error = document.getElementById('email-error');
        var comment_error = document.getElementById('message-error');
        var full_name = $('#full_name').val();
        var email = $('#email').val();
        var mobile_numb = $('#mobile-numb').val();
        var message = $('#contact-message').val();
        if (full_name == '' || full_name == !1) {
            name_error.innerHTML = 'Please enter your name!';
            $('#name-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else if (!isNaN(full_name) || full_name.length < 3 || full_name.length > 30) {
            name_error.innerHTML = 'Please enter a valid name!';
            $('#name-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else if (email != '' && !(email.indexOf("@") > -1 && email.indexOf(".") > -1)) {
            email_error.innerHTML = 'Please enter a valid email!';
            $('#email-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else if (mobile_numb == '' && email == '') {
            mobile_error.innerHTML = 'Please enter your mobile number!';
            $('#mobile-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else if (mobile_numb != '' && mobile_numb.length < 10 || mobile_numb.length > 10 || isNaN(mobile_numb)) {
            mobile_error.innerHTML = 'Please enter a valid mobile number!';
            $('#mobile-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else if (message == '' && !isNaN(message) && message == !1) {
            comment_error.innerHTML = 'Please enter your message!';
            $('#message-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else if (!isNaN(message) || message.length < 5 || message.length > 512) {
            comment_error.innerHTML = 'Please enter a valid message!';
            $('#message-error').addClass('errors-3');
            animate('.contact_us-btn', 'shake')
        } else {
            $.ajax({
                url: "../contact-us",
                timeout: 200000,
                type: "POST",
                data: {
                    fullname: full_name,
                    mobile: mobile_numb,
                    email: email,
                    message: message
                },
                success: function(data) {
                    if (data == 'error-1') {
                        name_error.innerHTML = 'Please enter a valid name!';
                        $('#name-error').addClass('errors-3');
                        animate('.contact_us-btn', 'shake')
                    } else if (data == 'error-2') {
                        mobile_error.innerHTML = 'Please enter a valid mobile number!';
                        $('#mobile-error').addClass('errors-3');
                        animate('.contact_us-btn', 'shake')
                    } else if (data == 'error-3') {
                        email_error.innerHTML = 'Please enter a valid email!';
                        $('#email-error').addClass('errors-3');
                        animate('.contact_us-btn', 'shake')
                    } else if (data == 'error-4') {
                        mobile_error.innerHTML = 'Enter a mobile number!';
                        $('#mobile-error').addClass('errors-3');
                        animate('.contact_us-btn', 'shake')
                    } else if (data == 'error-5') {
                        comment_error.innerHTML = 'Please enter a valid message!';
                        $('#message-error').addClass('errors-3');
                        animate('.contact_us-btn', 'shake')
                    } else if (data == 'success') {
                        name_error.innerHTML = '';
                        mobile_error.innerHTML = '';
                        email_error.innerHTML = '';
                        comment_error.innerHTML = '';
                        swal("Congratulations", "Your message has been sent successfully.", "success")
                    } else {
                        Materialize.toast(data, 5000, 'rounded')
                    }
                },
                error: function(data) {
                    swal("Error", "Unknown error has occurred, please try again!", "warning");
                    return !1
                }
            })
        }
    });
    $('.report').click(function() {
        if (_userid != undefined && _userid != "" && _userid > 0) {
            $('#report_ad').modal('open')
        } else {
            $('#login_mod').modal('open')
        }
    });
    $('.send-report_btn').click(function() {
        if (_userid != undefined && _userid != "" && _userid > 0) {
            var reason_error = document.getElementById('reason-error');
            var comment_error = document.getElementById('comments-error');
            var reason = $('#report_reason').val();
            var user_id = $('#user_id').val();
            var comment = $('#comment').val();
            if (reason == null || reason == '') {
                reason_error.innerHTML = 'Please select your complaint reason!';
                $('#reason-error').addClass('errors-3')
            } else if (comment == null || comment == '') {
                comment_error.innerHTML = 'Please give a brief comment about the ad!';
                $('#comments-error').addClass('errors-3')
            } else {
                $.ajax({
                    url: "../report",
                    timeout: 200000,
                    type: "POST",
                    data: {
                        user_id: user_id,
                        ad_id: _ad_id,
                        reason: reason,
                        massage: comment
                    },
                    success: function(data) {
                        if (data == 'success') {
                            reason_error.innerHTML = '';
                            comment_error.innerHTML = '';
                            $('#report_ad').modal('close');
                            swal("Congratulations", "Your report has been sent successfully.", "success")
                        } else {
                            Materialize.toast(data, 3000, 'rounded');
                            $('#report_ad').modal('close')
                        }
                    },
                    error: function(data) {
                        swal("Error", "Unknown error has occurred, please try again!", "warning");
                        return !1
                    }
                })
            }
        } else {
            $('#login_mod').modal('open')
        }
    });
    $("#swap-now-btn").click(function() {
        $("#swap_clicked").val(1)
    });
    $('.apply_filters').click(function() {
        $("form#filt_form").submit()
    });
    $("#login").click(function() {
        var mobile = escapehtml($("#mobile").val());
        var pin = escapehtml($("#pin").val());
        var swap_now_clicked = $("#swap_clicked").val();
        var chat_clicked = $("#chat_clicked").val();
        if (swap_now_clicked == 1) {
            $("#chat_clicked").val(0);
            $("#call_clicked").val(0)
        } else if (chat_clicked == 1) {
            $("#swap_clicked").val(0)
        } else if (call_clicked == 1) {
            $("#swap_clicked").val(0);
            $("#chat_clicked").val(0)
        }
        var mob_error = document.getElementById('mobile_error');
        var pin_error = document.getElementById('pin_error');
        if (mobile == '' || mobile == null) {
            mob_error.innerHTML = 'Please enter your mobile number!';
            animate('#login', 'shake')
        } else if (mobile != '' && mobile.length < 10 || mobile.length > 10) {
            mob_error.innerHTML = 'Invalid mobile number!';
            animate('#login', 'shake')
        } else if (pin == '' || pin == null) {
            pin_error.innerHTML = 'Please enter pin code!';
            mob_error.innerHTML = '';
            animate('#login', 'shake')
        } else if (pin != '' && pin.length < 6 || pin.length > 6) {
            pin_error.innerHTML = 'Invalid pin code!';
            mob_error.innerHTML = '';
            animate('#login', 'shake')
        } else {
            pin_error.innerHTML = '';
            mob_error.innerHTML = '';
            if ($("#remember_me").is(":checked")) {
                var remember_me = !0;
                var data = {
                    mobile: mobile,
                    pin: pin,
                    remember_me: remember_me
                }
            } else {
                var data = {
                    mobile: mobile,
                    pin: pin
                }
            }
            $("#login_spinner").addClass("fa-spin fa-spinner");
            $.ajax({
                url: "../login",
                timeout: 200000,
                type: "POST",
                data: data,
                success: function(data) {
                    $("#login_spinner").removeClass("fa-spin fa-spinner");
                    if (data != 'Welcome') {
                        pin_error.innerHTML = data;
                        animate('#login', 'shake')
                    } else if (data == 'Welcome') {
                        if (swap_now_clicked == 1) {
                            window.location.href = '/post-ad';
                            return !0
                        } else if (chat_clicked == 1) {
                            window.location.href = '/ad-chat';
                            return !0
                        } else {
                            $('#login_mod').modal('close');
                            location.reload()
                        }
                    }
                },
                error: function(data) {
                    $("#login_spinner").removeClass("fa-spin fa-spinner");
                    animate('#login', 'shake');
                    swal("Error", "Unknown error has occurred, please try again!", "warning")
                }
            })
        }
    });
    $(".send-pinbtn").click(function() {
        var number_filter = /[^0-9]/gi;
        var mobile = $("#mob_register").val().replace(number_filter, "");
        $("#reg_mobile").val(mobile);
        Materialize.updateTextFields();
        var mob_error = document.getElementById('pin_sender-error');
        if (mobile == '') {
            mob_error.innerHTML = 'Mobile text field is empty!';
            animate('.send-pinbtn', 'shake')
        } else if (mobile != '' && mobile.length < 10 || mobile.length > 10) {
            mob_error.innerHTML = 'Invalid mobile number!';
            $("#spinner").removeClass("fa-spin fa-spinner");
            animate('.send-pinbtn', 'shake')
        } else {
            $('.send-pinbtn').attr('disabled', 'disabled');
            data_ = '';
            _data = '';
            $.ajax({
                url: "../pinsender",
                timeout: 200000,
                type: "POST",
                data: {
                    mobile: mobile
                },
                success: function(data) {
                    $('.send-pinbtn').removeAttr('disabled');
                    data_ = data;
                    var _data = data_.split("\\");
                    if (_data[0] == 'success') {
                        $('#register_mod').removeClass("register1_modal");
                        $('#register_title').addClass("register_title");
                        $('#register_mod').addClass("register2_modal");
                        $('#pin-sent').html(_data[1]);
                        animate('.pin_sender', 'slideOutLeft');
                        setTimeout(function() {
                            $('.pin_sender').css('display', 'none');
                            animate('.register', 'slideInRight')
                        }, 1000);
                        setTimeout(function() {
                            $('.register').css('display', 'block')
                        }, 1000);
                        mob_error.innerHTML = "";
                        $("#register-spinner").removeClass("fa-spin fa-spinner");
                        return !1
                    } else {
                        mob_error.innerHTML = data;
                        animate('.send-pinbtn', 'shake');
                        $('.send-pinbtn').removeAttr('disabled');
                        $("#register-spinner").removeClass("fa-spin fa-spinner")
                    }
                },
                error: function(data) {
                    animate('.send-pinbtn', 'shake');
                    $('.send-pinbtn').removeAttr('disabled');
                    $("#register-spinner").removeClass("fa-spin fa-spinner");
                    swal("Error", "Unknown error has occurred, please try again!", "warning")
                }
            })
        }
    });
    $('.facebook_login').click(function() {
        Login()
    });
    $(".register-btn").click(function() {
        var alphabets_filter = /[^A-Za-z]/gi;
        var number_filter = /[^0-9]/gi;
        var fname = escapehtml($("#first_name").val().replace(alphabets_filter, ""));
        var lname = escapehtml($("#last_name").val().replace(alphabets_filter, ""));
        var mobile = escapehtml($("#reg_mobile").val().replace(number_filter, ""));
        var pin = escapehtml($("#reg_pin").val().replace(number_filter, ""));
        var fname_error = document.getElementById('fname-error');
        var lname_error = document.getElementById('lname-error');
        var mobil_error = document.getElementById('remob-error');
        var Pin_error = document.getElementById('repin-error');
        if (fname == '') {
            fname_error.innerHTML = 'Firstname is empty!';
            animate('.register-btn', 'shake')
        } else if (fname != '' && fname.length < 3 || fname.length > 12) {
            fname_error.innerHTML = 'Firstname is too short or too long!';
            animate('.register-btn', 'shake')
        } else if (lname == '') {
            lname_error.innerHTML = 'Lastname is empty!';
            fname_error.innerHTML = '';
            animate('.register-btn', 'shake')
        } else if (lname != '' && lname.length < 3 || lname.length > 12) {
            lname_error.innerHTML = 'Lastname is too short or long!';
            fname_error.innerHTML = '';
            animate('.register-btn', 'shake')
        } else if (mobile == '') {
            mobil_error.innerHTML = 'Mobile text field is empty!';
            lname_error.innerHTML = '';
            animate('.register-btn', 'shake')
        } else if (mobile != '' && mobile.length < 10 || mobile.length > 10) {
            mobil_error.innerHTML = 'Invalid mobile number!';
            lname_error.innerHTML = '';
            animate('.register-btn', 'shake')
        } else if (pin == '') {
            Pin_error.innerHTML = 'Pin code text field is empty';
            mobil_error.innerHTML = ''
        } else if (pin != '' && pin.length < 6 || pin.length > 6) {
            Pin_error.innerHTML = 'Invalid pin code!';
            mobil_error.innerHTML = '';
            animate('.register-btn', 'shake')
        } else {
            $("#register-spinner").addClass("fa-spin fa-spinner");
            $('.register-btn').attr('disabled', 'disabled');
            fname_error.innerHTML = '';
            lname_error.innerHTML = '';
            Pin_error.innerHTML = '';
            mobil_error.innerHTML = '';
            $.ajax({
                url: "../register",
                timeout: 200000,
                type: "POST",
                data: {
                    fname: fname,
                    lname: lname,
                    mobile: mobile,
                    pin: pin
                },
                success: function(data) {
                    $("#register-spinner").removeClass("fa-spin fa-spinner");
                    $('.register-btn').removeAttr('disabled');
                    if (data == 'Please check your pin code or mobile number!') {
                        Pin_error.innerHTML = 'Please check your pin code or mobile number!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'first_error1') {
                        fname_error.innerHTML = 'Firstname is empty!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'first_error2') {
                        fname_error.innerHTML = 'Firstname too short or too long!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'last_error1') {
                        lname_error.innerHTML = 'Lastname is empty!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'last_error2') {
                        lname_error.innerHTML = 'Lastname is too short or long!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'mobile_error1') {
                        mobil_error.innerHTML = 'Mobile text field is empty!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'mobile_error2') {
                        mobil_error.innerHTML = 'Invalid mobile number!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'pin_error1') {
                        Pin_error.innerHTML = 'Pin code text field is empty';
                        animate('.register-btn', 'shake')
                    } else if (data == 'pin_error2') {
                        Pin_error.innerHTML = 'Invalid pin code!';
                        animate('.register-btn', 'shake')
                    } else if (data == 'Success') {
                        $('#register_mod').modal('close');
                        location.reload()
                    } else {
                        Materialize.toast(data, 6000)
                    }
                },
                error: function(data) {
                    $("#register-spinner").removeClass("fa-spin fa-spinner");
                    $('.register-btn').removeAttr('disabled');
                    animate('.register-btn', 'shake');
                    swal("Error", "Unknown error has occurred, please try again!", "warning")
                }
            })
        }
    });
    $(".recover-btn").click(function() {
        var number_filter = /[^0-9]/gi;
        var mobile = $("#recover_mobile").val().replace(number_filter, "");
        var recoverpin_error = document.getElementById('recoverpin-error');
        if (mobile == '') {
            recoverpin_error.innerHTML = 'Please enter mobile number!';
            animate('.recover-btn', 'shake')
        } else if (mobile != '' && mobile.length < 10 || mobile.length > 10) {
            recoverpin_error.innerHTML = 'Invalid mobile number!';
            animate('.recover-btn', 'shake')
        } else {
            $("#pin-rec_spinner").addClass("fa-spin fa-spinner");
            $('.recover-btn').attr('disabled', 'disabled');
            $.ajax({
                url: "../recover-pin",
                timeout: 200000,
                type: "POST",
                data: {
                    mobile: mobile
                },
                success: function(data) {
                    recoverpin_error.innerHTML = '';
                    $("#pin-rec_spinner").removeClass("fa-spin fa-spinner");
                    $('.recover-btn').removeAttr('disabled');
                    if (data == '<br />New pin has been sent to your phone.') {
                        recoverpin_error.innerHTML = data;
                        $('#recoverpin-error').addClass('recover_success');
                        setTimeout(function() {
                            $('#recover_mod').modal('close');
                            $('#login_mod').modal('open')
                        }, 3000)
                    } else {
                        recoverpin_error.innerHTML = data;
                        recoverpin_error.css('color', 'green');
                        animate('.recover-btn', 'shake')
                    }
                },
                error: function(data) {
                    $("#pin-rec_spinner").removeClass("fa-spin fa-spinner");
                    $('.recover-btn').removeAttr('disabled');
                    animate('.recover-btn', 'shake');
                    swal("Error", "Unknown error has occurred, please try again!", "warning")
                }
            })
        }
    });
    function UploadImage() {
        $("#upload").click()
    }
    $(".post_ad-btn").click(function() {
        var string = /[^A-Za-z]/gi;
        var number = /[^0-9]/gi;
        var wislist_error = document.getElementById('wislist');
        var item_cond_error = document.getElementById('item_cond-error');
        var descrip_error = document.getElementById('descrip_error');
        var price_error = document.getElementById('price_error');
        var name_error = document.getElementById('name_error');
        var mobile_error = document.getElementById('mobile-error');
        var post_ad_span = document.getElementById('post_ad_span');
        var title = escapehtml($("#title").val());
        var main_cat = escapehtml($("#main_cat").val());
        var sub_cat = escapehtml($("#sub_cat").val());
        var listing_type = escapehtml($("#listing-type").val());
        var city = escapehtml($("#city").val());
        var region = escapehtml($("#region").val());
        var make = $("#hidden_make").val();
        var model = $("#model").val();
        var year = $("#year").val() ? Number($("#year").val()) : 0;
        var trans_type = $("#transmission-type").val();
        var car_type = $("#car-type").val();
        var millage = $("#millage").val() ? Number($("#millage").val()) : 0;
        var employer = $("#employer").val();
        var job_expiry_date = $("#job_expiry_date").val();
        var job_type = $("#job_type").val();
        var qualification = $("#qualification").val();
        var min_experience = $("#min_experience").val() ? Number($("#min_experience").val()) : 0;
        var max_experience = $("#max_experience").val() ? Number($("#max_experience").val()) : 0;
        var salary_from = Number($("#salary_from").val());
        var salary_to = Number($("#salary_to").val());
        var surface_size = $("#surface_size").val();
        var bedrooms = $("#bedrooms").val() ? Number($("#bedrooms").val()) : 0;
        var bathrooms = $("#bathrooms").val() ? Number($("#bathrooms").val()) : 0;
        var broker_fee = $("#broker_fee").val();
        var moto_make = $("#motorcycle-make").val();
        var wishlist = $("#wishlist").val();
        var item_cond = escapehtml($("#item-condition").val());
        var description = escapehtml($("#description").val());
        var price = escapehtml($("#price").val());
        var poster_name = escapehtml($("#poster-name").val());
        var poster_mobile = escapehtml($("#poster-mobile").val());
        var code = escapehtml($("#unique_code").val());
        if ($("#negotiation").is(":checked")) {
            var negotiable = 'Negotiable'
        } else {
            var negotiable = ''
        }
        var post_errors = "";
        if (wishlist == '' || wishlist == !1 || wishlist.length < 2) {
            if (listing_type == 'Job_Offer') {} else if (listing_type == 'Rent') {} else if (listing_type == 'Sell') {} else if (listing_type == 'Job_Seeking') {} else {
                document.getElementById('wishlist').focus();
                wislist_error.innerHTML = "Please enter the items you want to trade yours for!";
                post_errors = "wishlist error";
                $("#wishlist").val("")
            }
        } else {
            post_errors = ""
        }
        if (item_cond === undefined && listing_type !== 'Job_Offer' && listing_type !== 'Job_Seeking' && listing_type !== 'Rent') {
            item_cond_error.innerHTML = "Please select the current state of your item from above!";
            document.getElementById('item-condition').focus()
            animate('.post_ad-btn', 'shake')
        } else if (description == "" || description == null || description == !1) {
            item_cond_error.innerHTML = "";
            descrip_error.innerHTML = "Please write a detailed description of your ad!";
            document.getElementById('description').focus()
            animate('.post_ad-btn', 'shake')
        } else if (description.length < 6 || description.length > 500) {
            descrip_error.innerHTML = "";
            descrip_error.innerHTML = "Please your ad description shouldn't be less than 6 or greater than 500 characters!";
            animate('.post_ad-btn', 'shake')
        } else if (price < 1 || price == '' || price == null || price == !1) {
            price_error.innerHTML = "Please give your ad a valid price or value!";
            document.getElementById('price').focus()
            animate('.post_ad-btn', 'shake')
        } else if (poster_name == '' || poster_name.length < 3 || poster_name.length > 24) {
            price_error.innerHTML = "";
            name_error.innerHTML = "Please your given name may be too short or too long!";
            document.getElementById('poster-name').focus()
            animate('.post_ad-btn', 'shake')
        } else if (poster_mobile == '' || poster_mobile == null || poster_mobile.length < 10 || poster_mobile.length > 10) {
            price_error.innerHTML = "";
            mobile_error.innerHTML = "Please enter a valid mobile number!";
            document.getElementById('poster-mobile').focus()
            animate('.post_ad-btn', 'shake')
        } else {
            var condition = item_cond ? item_cond : 'none';
            if (post_errors == "") {
                wislist_error.innerHTML = "";
                post_ad_span.innerHTML = "Posting ad...";

                $("#post-ad_spinner").addClass("fa-spin fa-spinner");
                $('.post_ad-btn').attr('disabled', 'disabled');
                setTimeout(function() {
                    $.ajax({
                        url: "image-upload",
                        timeout: 200000,
                        type: "POST",
                        data: {
                            title: title,
                            unique: code,
                            poster_mobile: poster_mobile
                        },
                        success: function(data) {
                            UploadImage()
                            console.log("image-upload sucess: " + JSON.stringify(data))
                        },
                        error: function(data) {
                            post_ad_span.innerHTML = "Post ad";
                            $("#post-ad_spinner").removeClass("fa-spin fa-spinner");
                            $('.post_ad-btn').removeAttr('disabled');
                            $('#form-2').modal('close');
                            swal("Ad posting timeout!", "Please try again!", "warning")
                        }
                    })
                }, 2000);

                UploadAdInfo_1();

                function UploadAdInfo_1() {
                    $.ajax({
                        url: "../post-ad",
                        timeout: 200000,
                        type: "POST",
                        data: {
                            title: title,
                            main_cat: main_cat,
                            subcategory: sub_cat,
                            employer,
                            job_expiry_date,
                            job_type,
                            qualification,
                            min_experience,
                            max_experience,
                            salary_from,
                            salary_to,
                            surface_size,
                            bedrooms,
                            bathrooms,
                            broker_fee,
                            listing_type: listing_type,
                            city_town: city,
                            region: region,
                            make: make,
                            model: model,
                            year: year,
                            transmission: trans_type,
                            car_type: car_type,
                            miles: millage,
                            moto_make: moto_make,
                            wishes: wishlist,
                            condition: condition,
                            description: description,
                            value: price,
                            negotiable: negotiable,
                            poster_name: poster_name,
                            poster_mobile: poster_mobile,
                            code: code
                        },
                        success: function(data) {
                            var data = data;
                            var new_number = data.replace(number, "");
                            if (new_number == data) {} else {
                                post_ad_span.innerHTML = "Post ad";
                                $("#post-ad_spinner").removeClass("fa-spin fa-spinner");
                                $('.post_ad-btn').removeAttr('disabled');
                                $('#form-2').modal('close');
                                swal("Ad posting timed out!", "Please try again!", "warning")
                            }
                        },
                        error: function(data) {
                            $post_ad_span.innerHTML = "Post ad";
                            $("#post-ad_spinner").removeClass("fa-spin fa-spinner");
                            $('.post_ad-btn').removeAttr('disabled');
                            $('#form-2').modal('close');
                            swal("Ad posting timeout!", "Please try again!", "warning")
                        }
                    })
                }
            }
        }
    });
    $(".update_ad-btn").click(function() {
        var string = /[^A-Za-z]/gi;
        var number = /[^0-9]/gi;
        var up_wislist_error = document.getElementById('up_wislist');
        var up_item_cond_error = document.getElementById('up_item_cond-error');
        var up_descrip_error = document.getElementById('up_descrip_error');
        var up_price_error = document.getElementById('up_price_error');
        var up_name_error = document.getElementById('up_name_error');
        var up_mobile_error = document.getElementById('up_mobile-error');
        var update_text = document.getElementById('update_btn-txt');
        var title = $("#title").val();
        var listing_type = $("#listing-type").val();
        var city = $("#city").val();
        var region = $("#region").val();
        let main_cat_ = document.getElementById('main_cat').value.toLowerCase();
        let sub_cat_ = document.getElementById('sub_cat').value.toLowerCase();
        if (main_cat_ != 'vehicles' && sub_cat_ != 'cars') {
            $("#hidd_make").val("");
            $("#model_update").val("");
            $("#hidd_make_update").val("");
            $("#year_update").val("");
            $("#transmission-type_update").val("");
            $("#car-type_update").val("");
            $("#millage_update").val("")
        }
        if (main_cat_ != 'vehicles' && sub_cat_ != 'motorcycles') {
            $("#up_motorcycle-make").val(" ")
        }
        var image_1 = $("#hidden_img1").val();
        var image_2 = $("#hidden_img2").val();
        var image_3 = $("#hidden_img3").val();
        var image_4 = $("#hidden_img4").val();
        var image_5 = $("#hidden_img5").val();
        var image_6 = $("#hidden_img6").val();
        var update1_img = $(".update1_img").prop("files")[0];
        var update2_img = $(".update2_img").prop("files")[0];
        var update3_img = $(".update3_img").prop("files")[0];
        var update4_img = $(".update4_img").prop("files")[0];
        var update5_img = $(".update5_img").prop("files")[0];
        var update6_img = $(".update6_img").prop("files")[0];
        var img1_id = $("#img1_id").val();
        var img2_id = $("#img2_id").val();
        var img3_id = $("#img3_id").val();
        var img4_id = $("#img4_id").val();
        var img5_id = $("#img5_id").val();
        var img6_id = $("#img6_id").val();
        var make_new = $("#hidd_make").val();
        var model = $("#model_update").val();
        var make = $("#hidd_make_update").val();
        var year = $("#year_update").val() ? Number($("#year").val()) : 0;
        var miles = $("#millage_update").val() ? Number($("#millage").val()) : 0;
        var trans_type = $("#transmission-type_update").val();
        var car_type = $("#car-type_update").val();
        var moto_make = $("#up_motorcycle-make").val();
        var wishlist = $("#up_wishlist").val();
        var item_cond = $("#up_item-condition").val();
        var description = $("#up_description").val();
        var employer = $("#up_employer").val();
        var job_expiry_date = $("#up_job_expiry_date").val();
        var job_type = $("#up_job_type").val();
        var qualification = $("#up_qualification").val();
        var min_experience = $("#up_min_experience").val() ? Number($("#up_min_experience").val()) : 0;
        var max_experience = $("#up_max_experience").val() ? Number($("#up_max_experience").val()) : 0;
        var salary_from = Number($("#up_salary_from").val());
        var salary_to = Number($("#up_salary_to").val());
        var surface_size = Number($("#up_surface_size").val()) ? Number($("#up_surface_size").val()) : 0;
        var bedrooms = $("#up_bedrooms").val() ? Number($("#up_bedrooms").val()) : 0;
        var bathrooms = $("#up_bathrooms").val() ? Number($("#up_bathrooms").val()) : 0;
        var broker_fee = $("#up_broker_fee").val();
        var price = $("#up_price").val();
        var poster_name = $("#up_poster-name").val();
        var poster_mobile = $("#up_poster-mobile").val();
        var ad_id = $("#ad_id").val();
        var poster_id = $("#_poster_id").val();
        if ($("#up_negotiation").is(":checked")) {
            var negotiable = 'Negotiable'
        } else {
            var negotiable = ""
        }
        var form_data = new FormData();
        form_data.append("image1", image_1);
        form_data.append("image2", image_2);
        form_data.append("image3", image_3);
        form_data.append("image4", image_4);
        form_data.append("image5", image_5);
        form_data.append("image6", image_6);
        form_data.append("update1_img", update1_img);
        form_data.append("update2_img", update2_img);
        form_data.append("update3_img", update3_img);
        form_data.append("update4_img", update4_img);
        form_data.append("update5_img", update5_img);
        form_data.append("update6_img", update6_img);
        form_data.append("img1_id", img1_id);
        form_data.append("img2_id", img2_id);
        form_data.append("img3_id", img3_id);
        form_data.append("img4_id", img4_id);
        form_data.append("img5_id", img5_id);
        form_data.append("img6_id", img6_id);
        form_data.append("title", title);
        form_data.append("main_cat", main_cat_);
        form_data.append("subcategory", sub_cat_);
        form_data.append("listing_type", listing_type);
        form_data.append("city_town", city);
        form_data.append("region", region);
        form_data.append("make", make);
        form_data.append("make_new", make_new);
        form_data.append("model", model);
        form_data.append("year", year);
        form_data.append("transmission", trans_type);
        form_data.append("car_type", car_type);
        form_data.append("miles", miles);
        form_data.append("moto_make", moto_make);
        form_data.append("employer", employer);
        form_data.append("job_expiry_date", job_expiry_date);
        form_data.append("job_type", job_type);
        form_data.append("qualification", qualification);
        form_data.append("min_experience", min_experience);
        form_data.append("max_experience", max_experience);
        form_data.append("salary_from", salary_from);
        form_data.append("salary_to", salary_to);
        form_data.append("surface_size", surface_size);
        form_data.append("bedrooms", bedrooms);
        form_data.append("bathrooms", bathrooms);
        form_data.append("broker_fee", broker_fee);
        form_data.append("wishes", wishlist);
        form_data.append("condition", item_cond);
        form_data.append("description", description);
        form_data.append("value", price);
        form_data.append("negotiable", negotiable);
        form_data.append("poster_name", poster_name);
        form_data.append("poster_mobile", poster_mobile);
        form_data.append("ad_id", ad_id);
        form_data.append("poster_id", poster_id);
        if (listing_type != 'Sell' && listing_type !== 'Rent' && listing_type !== 'Job_Offer' && listing_type !== 'Job_Seeking') {
            if (wishlist == '' || wishlist.length < 2) {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please enter the items you want to trade yours for!", 3000)
            } else if (item_cond == null || item_cond == '' || item_cond == 'select') {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please select the current state of your item from above!", 3000)
            } else if (description == '' || description == null) {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please write a detailed description of your ad!", 3000)
            } else if (description.length < 6 || description.length > 500) {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please your ad description shouldn't be less than 6 or greater than 550 characters!", 3000)
            } else if (price < 1 || price == '' || price == null) {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please give your ad a valid price or value!", 3000)
            } else if (poster_name == '' || poster_name.length < 3 || poster_name.length > 24) {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please your given name may be too short or too long!", 3000)
            } else if (poster_mobile == '' || poster_mobile == null || poster_mobile.length < 10 || poster_mobile.length > 10) {
                animate('.update_ad-btn', 'shake');
                Materialize.toast("Please enter a valid mobile number!", 3000)
            } else {
                update_text.innerHTML = 'Saving Update';
                $("#update-ad_spinner").addClass("fa-spin fa-spinner");
                $('.update_ad-btn').attr('disabled', 'disabled');
                $.ajax({
                    url: "../save-update",
                    timeout: 200000,
                    dataType: 'script',
                    cache: !1,
                    contentType: !1,
                    processData: !1,
                    type: "POST",
                    data: form_data,
                    success: function(data) {
                        if (data == 'Success') {
                            setTimeout(function() {
                                $("#update-ad_spinner").removeClass("fa-spin fa-spinner");
                                $('.update_ad-btn').removeAttr('disabled');
                                $('#form-2').modal('close');
                                window.location.href = '/user-account';
                                return !0
                            }, 20000)
                        } else {
                            swal("Error", data, "error");
                            $("#update-ad_spinner").removeClass("fa-spin fa-spinner");
                            $('.update_ad-btn').removeAttr('disabled')
                        }
                    },
                    error: function(data) {
                        swal("Error", "Database connection timeout, please try again!", "warning");
                        $("#update-ad_spinner").removeClass("fa-spin fa-spinner");
                        $('.update_ad-btn').removeAttr('disabled')
                    }
                })
            }
        } else {
            if (item_cond == null || item_cond == '' || item_cond == 'select') {
                animate('.update_ad-btn', 'shake');
                up_item_cond_error.innerHTML = "Please select the current state of your item from above!"
            } else if (description == '' || description == null) {
                animate('.update_ad-btn', 'shake');
                up_descrip_error.innerHTML = "Please write a detailed description of your ad!"
            } else if (description.length < 6 || description.length > 500) {
                animate('.update_ad-btn', 'shake');
                up_descrip_error.innerHTML = "Please your ad description shouldn't be less than 6 or greater than 550 characters!"
            } else if (price < 1 || price == '' || price == null) {
                animate('.update_ad-btn', 'shake');
                up_price_error.innerHTML = "Please give your ad a valid price or value!"
            } else if (poster_name == '' || poster_name.length < 3 || poster_name.length > 24) {
                animate('.update_ad-btn', 'shake');
                up_name_error.innerHTML = "Please your given name may be too short or too long!"
            } else if (poster_mobile == '' || poster_mobile == null || poster_mobile.length < 10 || poster_mobile.length > 10) {
                animate('.update_ad-btn', 'shake');
                up_mobile_error.innerHTML = "Please enter a valid mobile number!"
            } else {
                up_wislist_error.innerHTML = '';
                up_descrip_error.innerHTML = '';
                up_price_error.innerHTML = '';
                up_name_error.innerHTML = '';
                up_mobile_error.innerHTML = '';
                update_text.innerHTML = 'Saving Update';
                $("#update-ad_spinner").addClass("fa-spin fa-spinner");
                $('.update_ad-btn').attr('disabled', 'disabled');
                $.ajax({
                    url: "../save-update",
                    timeout: 200000,
                    dataType: 'script',
                    cache: !1,
                    contentType: !1,
                    processData: !1,
                    type: "POST",
                    data: form_data,
                    success: function(data) {
                        if (data == 'Success') {
                            setTimeout(function() {
                                $("#update-ad_spinner").removeClass("fa-spin fa-spinner");
                                $('.update_ad-btn').removeAttr('disabled');
                                $('#form-2').modal('close');
                                window.location.href = '/user-account';
                                return !0
                            }, 20000)
                        } else {
                            console.log(data)
                            $("#update-ad_spinner").removeClass("fa-spin fa-spinner");
                            $('.update_ad-btn').removeAttr('disabled')
                        }
                    },
                    error: function(data) {
                        $("#update-ad_spinner").removeClass("fa-spin fa-spinner");
                        $('.update_ad-btn').removeAttr('disabled');
                        swal("Error", "Unknown error has occurred, please try again!", "warning")
                    }
                })
            }
        }
    });
    $('#update_info-btn').attr('disabled', 'disabled');
    $("#first_name,#last_name,#user_mobile,#user_email").keyup(function() {
        $('#update_info-btn').removeAttr('disabled')
    });
    $("#update_info-btn").click(function() {
        var string = /[^A-Za-z" "]/gi;
        var number = /[^0-9]/gi;
        var fname = $("#user_first_name").val();
        var lname = $("#user_last_name").val();
        var mobile = $("#user_mobile").val();
        var email = $("#user_email").val();
        var fname = fname.replace(string, "");
        var lname = lname.replace(string, "");
        var mobile = mobile.replace(number, "");
        if (isNaN(fname) && fname != null && fname != '' && fname != undefined) {
            if (!(fname.length < 3)) {
                if (!(fname.length > 12)) {
                    if (isNaN(lname) && lname != null && lname != '' && lname != undefined) {
                        if (!(lname.length < 3)) {
                            if (!(lname.length > 20)) {
                                if (!isNaN(mobile) && mobile != null && mobile != '' && mobile != undefined) {
                                    if (!(mobile.length < 10)) {
                                        if (!(mobile.length > 10)) {
                                            $.ajax({
                                                url: "../update-userinfo",
                                                timeout: 200000,
                                                type: "POST",
                                                data: {
                                                    fname: fname,
                                                    lname: lname,
                                                    mobile: mobile,
                                                    email: email
                                                },
                                                success: function(data) {
                                                    if (data == 'done') {
                                                        Materialize.toast("Update has been saved successfully", 2000);
                                                        setTimeout(function() {
                                                            location.reload()
                                                        }, 3000)
                                                    } else {
                                                        swal("Error", "Unknown error has occurred, please try again!", "warning")
                                                    }
                                                },
                                                error: function(data) {
                                                    swal("Error", "Unknown error has occurred, please try again!", "warning")
                                                }
                                            })
                                        } else {
                                            Materialize.toast("Invalid mobile number!", 4000)
                                        }
                                    } else {
                                        Materialize.toast("Invalid mobile number!", 4000)
                                    }
                                } else {
                                    Materialize.toast("Invalid mobile number!", 4000)
                                }
                            } else {
                                Materialize.toast("Your Lastname is too long!", 4000)
                            }
                        } else {
                            Materialize.toast("Your Lastname too short!", 4000)
                        }
                    } else {
                        Materialize.toast("Invalid entry!", 4000)
                    }
                } else {
                    Materialize.toast("Your Firstname is too long!", 4000)
                }
            } else {
                Materialize.toast("Your Firstname too short!", 4000)
            }
        } else {
            Materialize.toast("Invalid entry!", 4000)
        }
    });
    $("#account_delete").click(function() {
        swal({
            title: "!!! WARNING !!!",
            text: "Do you really want to delete your account ?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, I do",
            cancelButtonText: "No,cancel",
            closeOnConfirm: !1,
            closeOnCancel: !0
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "../delete-user",
                    timeout: 200000,
                    type: "POST",
                    data: {},
                    success: function(data) {
                        if (data == 'deleted') {
                            location.reload()
                        } else {
                            swal("Error", "Unknown error has occurred, please try again!", "warning")
                        }
                    },
                    error: function(data) {
                        swal("Error", "Unknown error has occurred, please try again!", "warning");
                        return !1
                    }
                })
            } else {
                return !0
            }
        })
    });
    $("#logout,#mob-logout").click(function() {
        $.ajax({
            url: "../logout",
            timeout: 200000,
            type: "POST",
            data: {},
            success: function(data) {
                if (data == 'success') {
                    location.reload()
                } else {
                    swal("Error", "Unknown error has occurred, please try again!", "warning")
                }
            },
            error: function(data) {
                swal("Error", "Unknown error has occurred, please try again!", "warning");
                return !1
            }
        })
    })
});
!function(e, t, n) {
    "use strict";
    !function o(e, t, n) {
        function a(s, l) {
            if (!t[s]) {
                if (!e[s]) {
                    var i = "function" == typeof require && require;
                    if (!l && i)
                        return i(s, !0);
                    if (r)
                        return r(s, !0);
                    var u = new Error("Cannot find module '" + s + "'");
                    throw u.code = "MODULE_NOT_FOUND",
                    u
                }
                var c = t[s] = {
                    exports: {}
                };
                e[s][0].call(c.exports, function(t) {
                    var n = e[s][1][t];
                    return a(n ? n : t)
                }, c, c.exports, o, e, t, n)
            }
            return t[s].exports
        }
        for (var r = "function" == typeof require && require, s = 0; s < n.length; s++)
            a(n[s]);
        return a
    }({
        1: [function(o, a, r) {
            function s(e) {
                return e && e.__esModule ? e : {
                    "default": e
                }
            }
            Object.defineProperty(r, "__esModule", {
                value: !0
            });
            var l, i, u, c, d = o("./modules/handle-dom"), f = o("./modules/utils"), p = o("./modules/handle-swal-dom"), m = o("./modules/handle-click"), v = o("./modules/handle-key"), y = s(v), b = o("./modules/default-params"), h = s(b), g = o("./modules/set-params"), w = s(g);
            r["default"] = u = c = function() {
                function o(e) {
                    var t = a;
                    return t[e] === n ? h["default"][e] : t[e]
                }
                var a = arguments[0];
                if ((0,
                d.addClass)(t.body, "stop-scrolling"),
                (0,
                p.resetInput)(),
                a === n)
                    return (0,
                    f.logStr)("SweetAlert expects at least 1 attribute!"),
                    !1;
                var r = (0,
                f.extend)({}, h["default"]);
                switch (typeof a) {
                case "string":
                    r.title = a,
                    r.text = arguments[1] || "",
                    r.type = arguments[2] || "";
                    break;
                case "object":
                    if (a.title === n)
                        return (0,
                        f.logStr)('Missing "title" argument!'),
                        !1;
                    r.title = a.title;
                    for (var s in h["default"])
                        r[s] = o(s);
                    r.confirmButtonText = r.showCancelButton ? "Confirm" : h["default"].confirmButtonText,
                    r.confirmButtonText = o("confirmButtonText"),
                    r.doneFunction = arguments[1] || null;
                    break;
                default:
                    return (0,
                    f.logStr)('Unexpected type of argument! Expected "string" or "object", got ' + typeof a),
                    !1
                }
                (0,
                w["default"])(r),
                (0,
                p.fixVerticalPosition)(),
                (0,
                p.openModal)(arguments[1]);
                for (var u = (0,
                p.getModal)(), v = u.querySelectorAll("button"), b = ["onclick", "onmouseover", "onmouseout", "onmousedown", "onmouseup", "onfocus"], g = function(e) {
                    return (0,
                    m.handleButton)(e, r, u)
                }, C = 0; C < v.length; C++)
                    for (var S = 0; S < b.length; S++) {
                        var x = b[S];
                        v[C][x] = g
                    }
                (0,
                p.getOverlay)().onclick = g,
                l = e.onkeydown;
                var k = function(e) {
                    return (0,
                    y["default"])(e, r, u)
                };
                e.onkeydown = k,
                e.onfocus = function() {
                    setTimeout(function() {
                        i !== n && (i.focus(),
                        i = n)
                    }, 0)
                }
                ,
                c.enableButtons()
            }
            ,
            u.setDefaults = c.setDefaults = function(e) {
                if (!e)
                    throw new Error("userParams is required");
                if ("object" != typeof e)
                    throw new Error("userParams has to be a object");
                (0,
                f.extend)(h["default"], e)
            }
            ,
            u.close = c.close = function() {
                var o = (0,
                p.getModal)();
                (0,
                d.fadeOut)((0,
                p.getOverlay)(), 5),
                (0,
                d.fadeOut)(o, 5),
                (0,
                d.removeClass)(o, "showSweetAlert"),
                (0,
                d.addClass)(o, "hideSweetAlert"),
                (0,
                d.removeClass)(o, "visible");
                var a = o.querySelector(".sa-icon.sa-success");
                (0,
                d.removeClass)(a, "animate"),
                (0,
                d.removeClass)(a.querySelector(".sa-tip"), "animateSuccessTip"),
                (0,
                d.removeClass)(a.querySelector(".sa-long"), "animateSuccessLong");
                var r = o.querySelector(".sa-icon.sa-error");
                (0,
                d.removeClass)(r, "animateErrorIcon"),
                (0,
                d.removeClass)(r.querySelector(".sa-x-mark"), "animateXMark");
                var s = o.querySelector(".sa-icon.sa-warning");
                return (0,
                d.removeClass)(s, "pulseWarning"),
                (0,
                d.removeClass)(s.querySelector(".sa-body"), "pulseWarningIns"),
                (0,
                d.removeClass)(s.querySelector(".sa-dot"), "pulseWarningIns"),
                setTimeout(function() {
                    var e = o.getAttribute("data-custom-class");
                    (0,
                    d.removeClass)(o, e)
                }, 300),
                (0,
                d.removeClass)(t.body, "stop-scrolling"),
                e.onkeydown = l,
                e.previousActiveElement && e.previousActiveElement.focus(),
                i = n,
                clearTimeout(o.timeout),
                !0
            }
            ,
            u.showInputError = c.showInputError = function(e) {
                var t = (0,
                p.getModal)()
                  , n = t.querySelector(".sa-input-error");
                (0,
                d.addClass)(n, "show");
                var o = t.querySelector(".sa-error-container");
                (0,
                d.addClass)(o, "show"),
                o.querySelector("p").innerHTML = e,
                setTimeout(function() {
                    u.enableButtons()
                }, 1),
                t.querySelector("input").focus()
            }
            ,
            u.resetInputError = c.resetInputError = function(e) {
                if (e && 13 === e.keyCode)
                    return !1;
                var t = (0,
                p.getModal)()
                  , n = t.querySelector(".sa-input-error");
                (0,
                d.removeClass)(n, "show");
                var o = t.querySelector(".sa-error-container");
                (0,
                d.removeClass)(o, "show")
            }
            ,
            u.disableButtons = c.disableButtons = function(e) {
                var t = (0,
                p.getModal)()
                  , n = t.querySelector("button.confirm")
                  , o = t.querySelector("button.cancel");
                n.disabled = !0,
                o.disabled = !0
            }
            ,
            u.enableButtons = c.enableButtons = function(e) {
                var t = (0,
                p.getModal)()
                  , n = t.querySelector("button.confirm")
                  , o = t.querySelector("button.cancel");
                n.disabled = !1,
                o.disabled = !1
            }
            ,
            "undefined" != typeof e ? e.sweetAlert = e.swal = u : (0,
            f.logStr)("SweetAlert is a frontend module!"),
            a.exports = r["default"]
        }
        , {
            "./modules/default-params": 2,
            "./modules/handle-click": 3,
            "./modules/handle-dom": 4,
            "./modules/handle-key": 5,
            "./modules/handle-swal-dom": 6,
            "./modules/set-params": 8,
            "./modules/utils": 9
        }],
        2: [function(e, t, n) {
            Object.defineProperty(n, "__esModule", {
                value: !0
            });
            var o = {
                title: "",
                text: "",
                type: null,
                allowOutsideClick: !1,
                showConfirmButton: !0,
                showCancelButton: !1,
                closeOnConfirm: !0,
                closeOnCancel: !0,
                confirmButtonText: "OK",
                confirmButtonColor: "#8CD4F5",
                cancelButtonText: "Cancel",
                imageUrl: null,
                imageSize: null,
                timer: null,
                customClass: "",
                html: !1,
                animation: !0,
                allowEscapeKey: !0,
                inputType: "text",
                inputPlaceholder: "",
                inputValue: "",
                showLoaderOnConfirm: !1
            };
            n["default"] = o,
            t.exports = n["default"]
        }
        , {}],
        3: [function(t, n, o) {
            Object.defineProperty(o, "__esModule", {
                value: !0
            });
            var a = t("./utils")
              , r = (t("./handle-swal-dom"),
            t("./handle-dom"))
              , s = function(t, n, o) {
                function s(e) {
                    m && n.confirmButtonColor && (p.style.backgroundColor = e)
                }
                var u, c, d, f = t || e.event, p = f.target || f.srcElement, m = -1 !== p.className.indexOf("confirm"), v = -1 !== p.className.indexOf("sweet-overlay"), y = (0,
                r.hasClass)(o, "visible"), b = n.doneFunction && "true" === o.getAttribute("data-has-done-function");
                switch (m && n.confirmButtonColor && (u = n.confirmButtonColor,
                c = (0,
                a.colorLuminance)(u, -.04),
                d = (0,
                a.colorLuminance)(u, -.14)),
                f.type) {
                case "mouseover":
                    s(c);
                    break;
                case "mouseout":
                    s(u);
                    break;
                case "mousedown":
                    s(d);
                    break;
                case "mouseup":
                    s(c);
                    break;
                case "focus":
                    var h = o.querySelector("button.confirm")
                      , g = o.querySelector("button.cancel");
                    m ? g.style.boxShadow = "none" : h.style.boxShadow = "none";
                    break;
                case "click":
                    var w = o === p
                      , C = (0,
                    r.isDescendant)(o, p);
                    if (!w && !C && y && !n.allowOutsideClick)
                        break;
                    m && b && y ? l(o, n) : b && y || v ? i(o, n) : (0,
                    r.isDescendant)(o, p) && "BUTTON" === p.tagName && sweetAlert.close()
                }
            }
              , l = function(e, t) {
                var n = !0;
                (0,
                r.hasClass)(e, "show-input") && (n = e.querySelector("input").value,
                n || (n = "")),
                t.doneFunction(n),
                t.closeOnConfirm && sweetAlert.close(),
                t.showLoaderOnConfirm && sweetAlert.disableButtons()
            }
              , i = function(e, t) {
                var n = String(t.doneFunction).replace(/\s/g, "")
                  , o = "function(" === n.substring(0, 9) && ")" !== n.substring(9, 10);
                o && t.doneFunction(!1),
                t.closeOnCancel && sweetAlert.close()
            };
            o["default"] = {
                handleButton: s,
                handleConfirm: l,
                handleCancel: i
            },
            n.exports = o["default"]
        }
        , {
            "./handle-dom": 4,
            "./handle-swal-dom": 6,
            "./utils": 9
        }],
        4: [function(n, o, a) {
            Object.defineProperty(a, "__esModule", {
                value: !0
            });
            var r = function(e, t) {
                return new RegExp(" " + t + " ").test(" " + e.className + " ")
            }
              , s = function(e, t) {
                r(e, t) || (e.className += " " + t)
            }
              , l = function(e, t) {
                var n = " " + e.className.replace(/[\t\r\n]/g, " ") + " ";
                if (r(e, t)) {
                    for (; n.indexOf(" " + t + " ") >= 0; )
                        n = n.replace(" " + t + " ", " ");
                    e.className = n.replace(/^\s+|\s+$/g, "")
                }
            }
              , i = function(e) {
                var n = t.createElement("div");
                return n.appendChild(t.createTextNode(e)),
                n.innerHTML
            }
              , u = function(e) {
                e.style.opacity = "",
                e.style.display = "block"
            }
              , c = function(e) {
                if (e && !e.length)
                    return u(e);
                for (var t = 0; t < e.length; ++t)
                    u(e[t])
            }
              , d = function(e) {
                e.style.opacity = "",
                e.style.display = "none"
            }
              , f = function(e) {
                if (e && !e.length)
                    return d(e);
                for (var t = 0; t < e.length; ++t)
                    d(e[t])
            }
              , p = function(e, t) {
                for (var n = t.parentNode; null !== n; ) {
                    if (n === e)
                        return !0;
                    n = n.parentNode
                }
                return !1
            }
              , m = function(e) {
                e.style.left = "-9999px",
                e.style.display = "block";
                var t, n = e.clientHeight;
                return t = "undefined" != typeof getComputedStyle ? parseInt(getComputedStyle(e).getPropertyValue("padding-top"), 10) : parseInt(e.currentStyle.padding),
                e.style.left = "",
                e.style.display = "none",
                "-" + parseInt((n + t) / 2) + "px"
            }
              , v = function(e, t) {
                if (+e.style.opacity < 1) {
                    t = t || 16,
                    e.style.opacity = 0,
                    e.style.display = "block";
                    var n = +new Date
                      , o = function a() {
                        e.style.opacity = +e.style.opacity + (new Date - n) / 100,
                        n = +new Date,
                        +e.style.opacity < 1 && setTimeout(a, t)
                    };
                    o()
                }
                e.style.display = "block"
            }
              , y = function(e, t) {
                t = t || 16,
                e.style.opacity = 1;
                var n = +new Date
                  , o = function a() {
                    e.style.opacity = +e.style.opacity - (new Date - n) / 100,
                    n = +new Date,
                    +e.style.opacity > 0 ? setTimeout(a, t) : e.style.display = "none"
                };
                o()
            }
              , b = function(n) {
                if ("function" == typeof MouseEvent) {
                    var o = new MouseEvent("click",{
                        view: e,
                        bubbles: !1,
                        cancelable: !0
                    });
                    n.dispatchEvent(o)
                } else if (t.createEvent) {
                    var a = t.createEvent("MouseEvents");
                    a.initEvent("click", !1, !1),
                    n.dispatchEvent(a)
                } else
                    t.createEventObject ? n.fireEvent("onclick") : "function" == typeof n.onclick && n.onclick()
            }
              , h = function(t) {
                "function" == typeof t.stopPropagation ? (t.stopPropagation(),
                t.preventDefault()) : e.event && e.event.hasOwnProperty("cancelBubble") && (e.event.cancelBubble = !0)
            };
            a.hasClass = r,
            a.addClass = s,
            a.removeClass = l,
            a.escapeHtml = i,
            a._show = u,
            a.show = c,
            a._hide = d,
            a.hide = f,
            a.isDescendant = p,
            a.getTopMargin = m,
            a.fadeIn = v,
            a.fadeOut = y,
            a.fireClick = b,
            a.stopEventPropagation = h
        }
        , {}],
        5: [function(t, o, a) {
            Object.defineProperty(a, "__esModule", {
                value: !0
            });
            var r = t("./handle-dom")
              , s = t("./handle-swal-dom")
              , l = function(t, o, a) {
                var l = t || e.event
                  , i = l.keyCode || l.which
                  , u = a.querySelector("button.confirm")
                  , c = a.querySelector("button.cancel")
                  , d = a.querySelectorAll("button[tabindex]");
                if (-1 !== [9, 13, 32, 27].indexOf(i)) {
                    for (var f = l.target || l.srcElement, p = -1, m = 0; m < d.length; m++)
                        if (f === d[m]) {
                            p = m;
                            break
                        }
                    9 === i ? (f = -1 === p ? u : p === d.length - 1 ? d[0] : d[p + 1],
                    (0,
                    r.stopEventPropagation)(l),
                    f.focus(),
                    o.confirmButtonColor && (0,
                    s.setFocusStyle)(f, o.confirmButtonColor)) : 13 === i ? ("INPUT" === f.tagName && (f = u,
                    u.focus()),
                    f = -1 === p ? u : n) : 27 === i && o.allowEscapeKey === !0 ? (f = c,
                    (0,
                    r.fireClick)(f, l)) : f = n
                }
            };
            a["default"] = l,
            o.exports = a["default"]
        }
        , {
            "./handle-dom": 4,
            "./handle-swal-dom": 6
        }],
        6: [function(n, o, a) {
            function r(e) {
                return e && e.__esModule ? e : {
                    "default": e
                }
            }
            Object.defineProperty(a, "__esModule", {
                value: !0
            });
            var s = n("./utils")
              , l = n("./handle-dom")
              , i = n("./default-params")
              , u = r(i)
              , c = n("./injected-html")
              , d = r(c)
              , f = ".sweet-alert"
              , p = ".sweet-overlay"
              , m = function() {
                var e = t.createElement("div");
                for (e.innerHTML = d["default"]; e.firstChild; )
                    t.body.appendChild(e.firstChild)
            }
              , v = function x() {
                var e = t.querySelector(f);
                return e || (m(),
                e = x()),
                e
            }
              , y = function() {
                var e = v();
                return e ? e.querySelector("input") : void 0
            }
              , b = function() {
                return t.querySelector(p)
            }
              , h = function(e, t) {
                var n = (0,
                s.hexToRgb)(t);
                e.style.boxShadow = "0 0 2px rgba(" + n + ", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"
            }
              , g = function(n) {
                var o = v();
                (0,
                l.fadeIn)(b(), 10),
                (0,
                l.show)(o),
                (0,
                l.addClass)(o, "showSweetAlert"),
                (0,
                l.removeClass)(o, "hideSweetAlert"),
                e.previousActiveElement = t.activeElement;
                var a = o.querySelector("button.confirm");
                a.focus(),
                setTimeout(function() {
                    (0,
                    l.addClass)(o, "visible")
                }, 500);
                var r = o.getAttribute("data-timer");
                if ("null" !== r && "" !== r) {
                    var s = n;
                    o.timeout = setTimeout(function() {
                        var e = (s || null) && "true" === o.getAttribute("data-has-done-function");
                        e ? s(null) : sweetAlert.close()
                    }, r)
                }
            }
              , w = function() {
                var e = v()
                  , t = y();
                (0,
                l.removeClass)(e, "show-input"),
                t.value = u["default"].inputValue,
                t.setAttribute("type", u["default"].inputType),
                t.setAttribute("placeholder", u["default"].inputPlaceholder),
                C()
            }
              , C = function(e) {
                if (e && 13 === e.keyCode)
                    return !1;
                var t = v()
                  , n = t.querySelector(".sa-input-error");
                (0,
                l.removeClass)(n, "show");
                var o = t.querySelector(".sa-error-container");
                (0,
                l.removeClass)(o, "show")
            }
              , S = function() {
                var e = v();
                e.style.marginTop = (0,
                l.getTopMargin)(v())
            };
            a.sweetAlertInitialize = m,
            a.getModal = v,
            a.getOverlay = b,
            a.getInput = y,
            a.setFocusStyle = h,
            a.openModal = g,
            a.resetInput = w,
            a.resetInputError = C,
            a.fixVerticalPosition = S
        }
        , {
            "./default-params": 2,
            "./handle-dom": 4,
            "./injected-html": 7,
            "./utils": 9
        }],
        7: [function(e, t, n) {
            Object.defineProperty(n, "__esModule", {
                value: !0
            });
            var o = '<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <div class="sa-confirm-button-container">\n        <button class="confirm" tabIndex="1">OK</button><div class="la-ball-fall">\n          <div></div>\n          <div></div>\n          <div></div>\n        </div>\n      </div>\n    </div></div>';
            n["default"] = o,
            t.exports = n["default"]
        }
        , {}],
        8: [function(e, t, o) {
            Object.defineProperty(o, "__esModule", {
                value: !0
            });
            var a = e("./utils")
              , r = e("./handle-swal-dom")
              , s = e("./handle-dom")
              , l = ["error", "warning", "info", "success", "input", "prompt"]
              , i = function(e) {
                var t = (0,
                r.getModal)()
                  , o = t.querySelector("h2")
                  , i = t.querySelector("p")
                  , u = t.querySelector("button.cancel")
                  , c = t.querySelector("button.confirm");
                if (o.innerHTML = e.html ? e.title : (0,
                s.escapeHtml)(e.title).split("\n").join("<br>"),
                i.innerHTML = e.html ? e.text : (0,
                s.escapeHtml)(e.text || "").split("\n").join("<br>"),
                e.text && (0,
                s.show)(i),
                e.customClass)
                    (0,
                    s.addClass)(t, e.customClass),
                    t.setAttribute("data-custom-class", e.customClass);
                else {
                    var d = t.getAttribute("data-custom-class");
                    (0,
                    s.removeClass)(t, d),
                    t.setAttribute("data-custom-class", "")
                }
                if ((0,
                s.hide)(t.querySelectorAll(".sa-icon")),
                e.type && !(0,
                a.isIE8)()) {
                    var f = function() {
                        for (var o = !1, a = 0; a < l.length; a++)
                            if (e.type === l[a]) {
                                o = !0;
                                break
                            }
                        if (!o)
                            return logStr("Unknown alert type: " + e.type),
                            {
                                v: !1
                            };
                        var i = ["success", "error", "warning", "info"]
                          , u = n;
                        -1 !== i.indexOf(e.type) && (u = t.querySelector(".sa-icon.sa-" + e.type),
                        (0,
                        s.show)(u));
                        var c = (0,
                        r.getInput)();
                        switch (e.type) {
                        case "success":
                            (0,
                            s.addClass)(u, "animate"),
                            (0,
                            s.addClass)(u.querySelector(".sa-tip"), "animateSuccessTip"),
                            (0,
                            s.addClass)(u.querySelector(".sa-long"), "animateSuccessLong");
                            break;
                        case "error":
                            (0,
                            s.addClass)(u, "animateErrorIcon"),
                            (0,
                            s.addClass)(u.querySelector(".sa-x-mark"), "animateXMark");
                            break;
                        case "warning":
                            (0,
                            s.addClass)(u, "pulseWarning"),
                            (0,
                            s.addClass)(u.querySelector(".sa-body"), "pulseWarningIns"),
                            (0,
                            s.addClass)(u.querySelector(".sa-dot"), "pulseWarningIns");
                            break;
                        case "input":
                        case "prompt":
                            c.setAttribute("type", e.inputType),
                            c.value = e.inputValue,
                            c.setAttribute("placeholder", e.inputPlaceholder),
                            (0,
                            s.addClass)(t, "show-input"),
                            setTimeout(function() {
                                c.focus(),
                                c.addEventListener("keyup", swal.resetInputError)
                            }, 400)
                        }
                    }();
                    if ("object" == typeof f)
                        return f.v
                }
                if (e.imageUrl) {
                    var p = t.querySelector(".sa-icon.sa-custom");
                    p.style.backgroundImage = "url(" + e.imageUrl + ")",
                    (0,
                    s.show)(p);
                    var m = 80
                      , v = 80;
                    if (e.imageSize) {
                        var y = e.imageSize.toString().split("x")
                          , b = y[0]
                          , h = y[1];
                        b && h ? (m = b,
                        v = h) : logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got " + e.imageSize)
                    }
                    p.setAttribute("style", p.getAttribute("style") + "width:" + m + "px; height:" + v + "px")
                }
                t.setAttribute("data-has-cancel-button", e.showCancelButton),
                e.showCancelButton ? u.style.display = "inline-block" : (0,
                s.hide)(u),
                t.setAttribute("data-has-confirm-button", e.showConfirmButton),
                e.showConfirmButton ? c.style.display = "inline-block" : (0,
                s.hide)(c),
                e.cancelButtonText && (u.innerHTML = (0,
                s.escapeHtml)(e.cancelButtonText)),
                e.confirmButtonText && (c.innerHTML = (0,
                s.escapeHtml)(e.confirmButtonText)),
                e.confirmButtonColor && (c.style.backgroundColor = e.confirmButtonColor,
                c.style.borderLeftColor = e.confirmLoadingButtonColor,
                c.style.borderRightColor = e.confirmLoadingButtonColor,
                (0,
                r.setFocusStyle)(c, e.confirmButtonColor)),
                t.setAttribute("data-allow-outside-click", e.allowOutsideClick);
                var g = !!e.doneFunction;
                t.setAttribute("data-has-done-function", g),
                e.animation ? "string" == typeof e.animation ? t.setAttribute("data-animation", e.animation) : t.setAttribute("data-animation", "pop") : t.setAttribute("data-animation", "none"),
                t.setAttribute("data-timer", e.timer)
            };
            o["default"] = i,
            t.exports = o["default"]
        }
        , {
            "./handle-dom": 4,
            "./handle-swal-dom": 6,
            "./utils": 9
        }],
        9: [function(t, n, o) {
            Object.defineProperty(o, "__esModule", {
                value: !0
            });
            var a = function(e, t) {
                for (var n in t)
                    t.hasOwnProperty(n) && (e[n] = t[n]);
                return e
            }
              , r = function(e) {
                var t = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);
                return t ? parseInt(t[1], 16) + ", " + parseInt(t[2], 16) + ", " + parseInt(t[3], 16) : null
            }
              , s = function() {
                return e.attachEvent && !e.addEventListener
            }
              , l = function(t) {
                "undefined" != typeof e && e.console && e.console.log("SweetAlert: " + t)
            }
              , i = function(e, t) {
                e = String(e).replace(/[^0-9a-f]/gi, ""),
                e.length < 6 && (e = e[0] + e[0] + e[1] + e[1] + e[2] + e[2]),
                t = t || 0;
                var n, o, a = "#";
                for (o = 0; 3 > o; o++)
                    n = parseInt(e.substr(2 * o, 2), 16),
                    n = Math.round(Math.min(Math.max(0, n + n * t), 255)).toString(16),
                    a += ("00" + n).substr(n.length);
                return a
            };
            o.extend = a,
            o.hexToRgb = r,
            o.isIE8 = s,
            o.logStr = l,
            o.colorLuminance = i
        }
        , {}]
    }, {}, [1]),
    "function" == typeof define && define.amd ? define(function() {
        return sweetAlert
    }) : "undefined" != typeof module && module.exports && (module.exports = sweetAlert)
}(window, document);
!function(i) {
    var e = {
        delimiter: ",",
        divideThousand: !0,
        delimiterRegExp: /[\.\,\s]/g
    }
      , n = i.fn.val;
    i.fn.val = function(i) {
        var e = this.data("divided");
        return "undefined" == typeof i ? e ? e.value : n.call(this) : e ? n.call(this, i).change() : n.call(this, i)
    }
    ,
    i.fn.divide = function(n) {
        function t(i) {
            return !i.is("input, textarea")
        }
        function a(i) {
            return !isNaN(i)
        }
        function d(i) {
            if (i = i.replace(options.delimiterRegExp, ""),
            !a(i) && i.length > 0)
                return console.warn(i + " is not a number"),
                -1;
            for (var e = "", n = i.length; n > 3; ) {
                if (4 == i.length) {
                    e = (options.divideThousand ? options.delimiter : "") + i.substring(1),
                    n = 1;
                    break
                }
                n -= 3,
                e = options.delimiter + i.substring(n, n + 3) + e
            }
            return i.substring(0, n) + e
        }
        return options = i.extend({}, e, n),
        this.each(function() {
            var e = i(this);
            !t(e) && e.data("divided") && e.unbind(".divide")
        }),
        this.each(function() {
            var e = i(this);
            if (t(e)) {
                var n = d(e.text());
                return void (n != -1 && e.text(n))
            }
            e.bind("input.divide change.divide", function() {
                var i = this.value.replace(options.delimiterRegExp, "")
                  , n = d(i)
                  , t = e.data("divided");
                if (n != -1) {
                    if (!t) {
                        t = {};
                        var a = e.attr("name");
                        void 0 != a ? (e.attr("name", ""),
                        e.parent().append("<input type='hidden' name='" + a + "'>"),
                        t.name = a) : t.name = null
                    }
                    t.value = i,
                    this.value = n,
                    e.data("divided", t),
                    t.name && e.parent().children("input[name=" + t.name + "]").val(i)
                }
            }),
            e.change()
        }),
        this
    }
}(jQuery)
$('.login_modal,.report_modal,.mobile_filter,.results_modal').modal({
    dismissible: !0,
    opacity: .7
});
$('.register_user,.maincat_model,.category_submodal,.upload_form').modal({
    dismissible: !1,
    opacity: .7
});
$(".button-collapse").sideNav();
$('select').material_select();
