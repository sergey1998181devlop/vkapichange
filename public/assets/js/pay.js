window['denylistedDomainsHashedValueListForGpayButtonWithCardInfo'] = [-718583466, -651407173, 1501053020, 1270931793];
window['whitelistedDomainsHashedValueListForGpayButtonWithCardInfo'] = [1432838318];
window['denylistedMerchentIdsHashedValueListForGpayButtonWithCardInfo'] = [1260893, 211376492];
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "ReadyToPayAdditionalBrowsers"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "EnableDynamicGpayButton"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "DisableNativeReadyToPayCheckForPaymentHandler"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "DisablePaymentRequest"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "EnablePaymentRequest"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "EnableLoadPaymentDataTimeout"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "EnableOfferCallback"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "EnablePaymentMethodCallback"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "UseCanMakePaymentResultFromPayjs"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var a = this || self;
var b = ["google", "payments", "api", "UseCanMakePaymentForFallbackOnMobile"]
    , c = window || a;
b[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + b[0]);
for (var d; b.length && (d = b.shift()); )
    b.length ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = !0;
(function() {
        /*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
        var k, n, aa = function(a) {
            var b = 0;
            return function() {
                return b < a.length ? {
                    done: !1,
                    value: a[b++]
                } : {
                    done: !0
                }
            }
        }, ba = "function" == typeof Object.defineProperties ? Object.defineProperty : function(a, b, c) {
            if (a == Array.prototype || a == Object.prototype)
                return a;
            a[b] = c.value;
            return a
        }
            , ca = function(a) {
            a = ["object" == typeof globalThis && globalThis, a, "object" == typeof window && window, "object" == typeof self && self, "object" == typeof global && global];
            for (var b = 0; b < a.length; ++b) {
                var c = a[b];
                if (c && c.Math == Math)
                    return c
            }
            throw Error("Cannot find global object");
        }, p = ca(this), da = "function" === typeof Symbol && "symbol" === typeof Symbol("x"), q = {}, ea = {}, t = function(a, b) {
            var c = ea[b];
            if (null == c)
                return a[b];
            c = a[c];
            return void 0 !== c ? c : a[b]
        }, u = function(a, b, c) {
            if (b)
                a: {
                    var d = a.split(".");
                    a = 1 === d.length;
                    var e = d[0];
                    e = !a && e in q ? q : p;
                    for (var f = 0; f < d.length - 1; f++) {
                        var g = d[f];
                        if (!(g in e))
                            break a;
                        e = e[g]
                    }
                    d = d[d.length - 1];
                    c = da && "es6" === c ? e[d] : null;
                    b = b(c);
                    null != b && (a ? ba(q, d, {
                        configurable: !0,
                        writable: !0,
                        value: b
                    }) : b !== c && (void 0 === ea[d] && (a = 1E9 * Math.random() >>> 0,
                        ea[d] = da ? p.Symbol(d) : "$jscp$" + a + "$" + d),
                        ba(e, ea[d], {
                            configurable: !0,
                            writable: !0,
                            value: b
                        })))
                }
        };
        u("Symbol", function(a) {
            if (a)
                return a;
            var b = function(f, g) {
                this.dc = f;
                ba(this, "description", {
                    configurable: !0,
                    writable: !0,
                    value: g
                })
            };
            b.prototype.toString = function() {
                return this.dc
            }
            ;
            var c = "jscomp_symbol_" + (1E9 * Math.random() >>> 0) + "_"
                , d = 0
                , e = function(f) {
                if (this instanceof e)
                    throw new TypeError("Symbol is not a constructor");
                return new b(c + (f || "") + "_" + d++,f)
            };
            return e
        }, "es6");
        u("Symbol.iterator", function(a) {
            if (a)
                return a;
            a = (0,
                q.Symbol)("Symbol.iterator");
            for (var b = "Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "), c = 0; c < b.length; c++) {
                var d = p[b[c]];
                "function" === typeof d && "function" != typeof d.prototype[a] && ba(d.prototype, a, {
                    configurable: !0,
                    writable: !0,
                    value: function() {
                        return fa(aa(this))
                    }
                })
            }
            return a
        }, "es6");
        var fa = function(a) {
            a = {
                next: a
            };
            a[t(q.Symbol, "iterator")] = function() {
                return this
            }
            ;
            return a
        }, ha = function(a) {
            var b = "undefined" != typeof q.Symbol && t(q.Symbol, "iterator") && a[t(q.Symbol, "iterator")];
            return b ? b.call(a) : {
                next: aa(a)
            }
        }, ia = function(a) {
            if (!(a instanceof Array)) {
                a = ha(a);
                for (var b, c = []; !(b = a.next()).done; )
                    c.push(b.value);
                a = c
            }
            return a
        }, ja = "function" == typeof Object.create ? Object.create : function(a) {
            var b = function() {};
            b.prototype = a;
            return new b
        }
            , ka;
        if (da && "function" == typeof Object.setPrototypeOf)
            ka = Object.setPrototypeOf;
        else {
            var ma;
            a: {
                var na = {
                    a: !0
                }
                    , oa = {};
                try {
                    oa.__proto__ = na;
                    ma = oa.a;
                    break a
                } catch (a) {}
                ma = !1
            }
            ka = ma ? function(a, b) {
                    a.__proto__ = b;
                    if (a.__proto__ !== b)
                        throw new TypeError(a + " is not extensible");
                    return a
                }
                : null
        }
        var pa = ka
            , qa = function(a, b) {
            a.prototype = ja(b.prototype);
            a.prototype.constructor = a;
            if (pa)
                pa(a, b);
            else
                for (var c in b)
                    if ("prototype" != c)
                        if (Object.defineProperties) {
                            var d = Object.getOwnPropertyDescriptor(b, c);
                            d && Object.defineProperty(a, c, d)
                        } else
                            a[c] = b[c];
            a.ua = b.prototype
        }
            , ra = function(a, b) {
            a instanceof String && (a += "");
            var c = 0
                , d = !1
                , e = {
                next: function() {
                    if (!d && c < a.length) {
                        var f = c++;
                        return {
                            value: b(f, a[f]),
                            done: !1
                        }
                    }
                    d = !0;
                    return {
                        done: !0,
                        value: void 0
                    }
                }
            };
            e[t(q.Symbol, "iterator")] = function() {
                return e
            }
            ;
            return e
        };
        u("Array.prototype.keys", function(a) {
            return a ? a : function() {
                return ra(this, function(b) {
                    return b
                })
            }
        }, "es6");
        u("Array.from", function(a) {
            return a ? a : function(b, c, d) {
                c = null != c ? c : function(h) {
                    return h
                }
                ;
                var e = []
                    , f = "undefined" != typeof q.Symbol && t(q.Symbol, "iterator") && b[t(q.Symbol, "iterator")];
                if ("function" == typeof f) {
                    b = f.call(b);
                    for (var g = 0; !(f = b.next()).done; )
                        e.push(c.call(d, f.value, g++))
                } else
                    for (f = b.length,
                             g = 0; g < f; g++)
                        e.push(c.call(d, b[g], g));
                return e
            }
        }, "es6");
        u("Array.prototype.values", function(a) {
            return a ? a : function() {
                return ra(this, function(b, c) {
                    return c
                })
            }
        }, "es8");
        u("Object.values", function(a) {
            return a ? a : function(b) {
                var c = [], d;
                for (d in b)
                    Object.prototype.hasOwnProperty.call(b, d) && c.push(b[d]);
                return c
            }
        }, "es8");
        u("Object.is", function(a) {
            return a ? a : function(b, c) {
                return b === c ? 0 !== b || 1 / b === 1 / c : b !== b && c !== c
            }
        }, "es6");
        u("Array.prototype.includes", function(a) {
            return a ? a : function(b, c) {
                var d = this;
                d instanceof String && (d = String(d));
                var e = d.length;
                c = c || 0;
                for (0 > c && (c = Math.max(c + e, 0)); c < e; c++) {
                    var f = d[c];
                    if (f === b || t(Object, "is").call(Object, f, b))
                        return !0
                }
                return !1
            }
        }, "es7");
        u("String.prototype.includes", function(a) {
            return a ? a : function(b, c) {
                if (null == this)
                    throw new TypeError("The 'this' value for String.prototype.includes must not be null or undefined");
                if (b instanceof RegExp)
                    throw new TypeError("First argument to String.prototype.includes must not be a regular expression");
                return -1 !== (this + "").indexOf(b, c || 0)
            }
        }, "es6");
        var sa = da && "function" == typeof t(Object, "assign") ? t(Object, "assign") : function(a, b) {
                for (var c = 1; c < arguments.length; c++) {
                    var d = arguments[c];
                    if (d)
                        for (var e in d)
                            Object.prototype.hasOwnProperty.call(d, e) && (a[e] = d[e])
                }
                return a
            }
        ;
        u("Object.assign", function(a) {
            return a || sa
        }, "es6");
        u("Promise", function(a) {
            function b() {
                this.W = null
            }
            function c(g) {
                return g instanceof e ? g : new e(function(h) {
                        h(g)
                    }
                )
            }
            if (a)
                return a;
            b.prototype.Jb = function(g) {
                if (null == this.W) {
                    this.W = [];
                    var h = this;
                    this.Kb(function() {
                        h.rc()
                    })
                }
                this.W.push(g)
            }
            ;
            var d = p.setTimeout;
            b.prototype.Kb = function(g) {
                d(g, 0)
            }
            ;
            b.prototype.rc = function() {
                for (; this.W && this.W.length; ) {
                    var g = this.W;
                    this.W = [];
                    for (var h = 0; h < g.length; ++h) {
                        var l = g[h];
                        g[h] = null;
                        try {
                            l()
                        } catch (m) {
                            this.lc(m)
                        }
                    }
                }
                this.W = null
            }
            ;
            b.prototype.lc = function(g) {
                this.Kb(function() {
                    throw g;
                })
            }
            ;
            var e = function(g) {
                this.ta = 0;
                this.aa = void 0;
                this.sa = [];
                this.Sb = !1;
                var h = this.kb();
                try {
                    g(h.resolve, h.reject)
                } catch (l) {
                    h.reject(l)
                }
            };
            e.prototype.kb = function() {
                function g(m) {
                    return function(r) {
                        l || (l = !0,
                            m.call(h, r))
                    }
                }
                var h = this
                    , l = !1;
                return {
                    resolve: g(this.Gc),
                    reject: g(this.yb)
                }
            }
            ;
            e.prototype.Gc = function(g) {
                if (g === this)
                    this.yb(new TypeError("A Promise cannot resolve to itself"));
                else if (g instanceof e)
                    this.Jc(g);
                else {
                    a: switch (typeof g) {
                        case "object":
                            var h = null != g;
                            break a;
                        case "function":
                            h = !0;
                            break a;
                        default:
                            h = !1
                    }
                    h ? this.Fc(g) : this.Qb(g)
                }
            }
            ;
            e.prototype.Fc = function(g) {
                var h = void 0;
                try {
                    h = g.then
                } catch (l) {
                    this.yb(l);
                    return
                }
                "function" == typeof h ? this.Kc(h, g) : this.Qb(g)
            }
            ;
            e.prototype.yb = function(g) {
                this.cc(2, g)
            }
            ;
            e.prototype.Qb = function(g) {
                this.cc(1, g)
            }
            ;
            e.prototype.cc = function(g, h) {
                if (0 != this.ta)
                    throw Error("Cannot settle(" + g + ", " + h + "): Promise already settled in state" + this.ta);
                this.ta = g;
                this.aa = h;
                2 === this.ta && this.Hc();
                this.sc()
            }
            ;
            e.prototype.Hc = function() {
                var g = this;
                d(function() {
                    if (g.yc()) {
                        var h = p.console;
                        "undefined" !== typeof h && h.error(g.aa)
                    }
                }, 1)
            }
            ;
            e.prototype.yc = function() {
                if (this.Sb)
                    return !1;
                var g = p.CustomEvent
                    , h = p.Event
                    , l = p.dispatchEvent;
                if ("undefined" === typeof l)
                    return !0;
                "function" === typeof g ? g = new g("unhandledrejection",{
                    cancelable: !0
                }) : "function" === typeof h ? g = new h("unhandledrejection",{
                    cancelable: !0
                }) : (g = p.document.createEvent("CustomEvent"),
                    g.initCustomEvent("unhandledrejection", !1, !0, g));
                g.promise = this;
                g.reason = this.aa;
                return l(g)
            }
            ;
            e.prototype.sc = function() {
                if (null != this.sa) {
                    for (var g = 0; g < this.sa.length; ++g)
                        f.Jb(this.sa[g]);
                    this.sa = null
                }
            }
            ;
            var f = new b;
            e.prototype.Jc = function(g) {
                var h = this.kb();
                g.Va(h.resolve, h.reject)
            }
            ;
            e.prototype.Kc = function(g, h) {
                var l = this.kb();
                try {
                    g.call(h, l.resolve, l.reject)
                } catch (m) {
                    l.reject(m)
                }
            }
            ;
            e.prototype.then = function(g, h) {
                function l(y, H) {
                    return "function" == typeof y ? function(la) {
                            try {
                                m(y(la))
                            } catch (T) {
                                r(T)
                            }
                        }
                        : H
                }
                var m, r, K = new e(function(y, H) {
                        m = y;
                        r = H
                    }
                );
                this.Va(l(g, m), l(h, r));
                return K
            }
            ;
            e.prototype.catch = function(g) {
                return this.then(void 0, g)
            }
            ;
            e.prototype.Va = function(g, h) {
                function l() {
                    switch (m.ta) {
                        case 1:
                            g(m.aa);
                            break;
                        case 2:
                            h(m.aa);
                            break;
                        default:
                            throw Error("Unexpected state: " + m.ta);
                    }
                }
                var m = this;
                null == this.sa ? f.Jb(l) : this.sa.push(l);
                this.Sb = !0
            }
            ;
            e.resolve = c;
            e.reject = function(g) {
                return new e(function(h, l) {
                        l(g)
                    }
                )
            }
            ;
            e.race = function(g) {
                return new e(function(h, l) {
                        for (var m = ha(g), r = m.next(); !r.done; r = m.next())
                            c(r.value).Va(h, l)
                    }
                )
            }
            ;
            e.all = function(g) {
                var h = ha(g)
                    , l = h.next();
                return l.done ? c([]) : new e(function(m, r) {
                        function K(la) {
                            return function(T) {
                                y[la] = T;
                                H--;
                                0 == H && m(y)
                            }
                        }
                        var y = []
                            , H = 0;
                        do
                            y.push(void 0),
                                H++,
                                c(l.value).Va(K(y.length - 1), r),
                                l = h.next();
                        while (!l.done)
                    }
                )
            }
            ;
            return e
        }, "es6");
        var v = this || self
            , ta = function(a, b) {
            a = a.split(".");
            var c = window || v;
            a[0]in c || "undefined" == typeof c.execScript || c.execScript("var " + a[0]);
            for (var d; a.length && (d = a.shift()); )
                a.length || void 0 === b ? c = c[d] && c[d] !== Object.prototype[d] ? c[d] : c[d] = {} : c[d] = b
        }
            , ua = function() {}
            , w = function(a) {
            var b = typeof a;
            return "object" != b ? b : a ? Array.isArray(a) ? "array" : b : "null"
        }
            , va = function(a) {
            var b = w(a);
            return "array" == b || "object" == b && "number" == typeof a.length
        }
            , wa = function(a) {
            var b = typeof a;
            return "object" == b && null != a || "function" == b
        }
            , xa = function(a, b, c) {
            return a.call.apply(a.bind, arguments)
        }
            , ya = function(a, b, c) {
            if (!a)
                throw Error();
            if (2 < arguments.length) {
                var d = Array.prototype.slice.call(arguments, 2);
                return function() {
                    var e = Array.prototype.slice.call(arguments);
                    Array.prototype.unshift.apply(e, d);
                    return a.apply(b, e)
                }
            }
            return function() {
                return a.apply(b, arguments)
            }
        }
            , za = function(a, b, c) {
            za = Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? xa : ya;
            return za.apply(null, arguments)
        }
            , Aa = function(a, b) {
            function c() {}
            c.prototype = b.prototype;
            a.ua = b.prototype;
            a.prototype = new c;
            a.prototype.constructor = a;
            a.wd = function(d, e, f) {
                for (var g = Array(arguments.length - 2), h = 2; h < arguments.length; h++)
                    g[h - 2] = arguments[h];
                return b.prototype[e].apply(d, g)
            }
        }
            , Ba = function(a) {
            return a
        };
        function Ca(a) {
            if (Error.captureStackTrace)
                Error.captureStackTrace(this, Ca);
            else {
                var b = Error().stack;
                b && (this.stack = b)
            }
            a && (this.message = String(a))
        }
        Aa(Ca, Error);
        Ca.prototype.name = "CustomError";
        var Da = function(a, b) {
            a = a.split("%s");
            for (var c = "", d = a.length - 1, e = 0; e < d; e++)
                c += a[e] + (e < b.length ? b[e] : "%s");
            Ca.call(this, c + a[d])
        };
        Aa(Da, Ca);
        Da.prototype.name = "AssertionError";
        var Ea = function(a, b, c, d) {
            var e = "Assertion failed";
            if (c) {
                e += ": " + c;
                var f = d
            } else
                a && (e += ": " + a,
                    f = b);
            throw new Da("" + e,f || []);
        }
            , x = function(a, b, c) {
            a || Ea("", null, b, Array.prototype.slice.call(arguments, 2));
            return a
        }
            , Fa = function(a, b) {
            throw new Da("Failure" + (a ? ": " + a : ""),Array.prototype.slice.call(arguments, 1));
        }
            , Ga = function(a, b, c) {
            "number" !== typeof a && Ea("Expected number but got %s: %s.", [w(a), a], b, Array.prototype.slice.call(arguments, 2));
            return a
        }
            , Ha = function(a, b, c) {
            "string" !== typeof a && Ea("Expected string but got %s: %s.", [w(a), a], b, Array.prototype.slice.call(arguments, 2))
        }
            , Ia = function(a, b, c) {
            wa(a) || Ea("Expected object but got %s: %s.", [w(a), a], b, Array.prototype.slice.call(arguments, 2))
        };
        var z = function(a, b) {
            this.Db = a === Ja && b || "";
            this.ic = Ka
        };
        z.prototype.Ea = !0;
        z.prototype.Ca = function() {
            return this.Db
        }
        ;
        z.prototype.toString = function() {
            return "Const{" + this.Db + "}"
        }
        ;
        var A = function(a) {
            if (a instanceof z && a.constructor === z && a.ic === Ka)
                return a.Db;
            Fa("expected object of type Const, got '" + a + "'");
            return "type_error:Const"
        }
            , B = function(a) {
            return new z(Ja,a)
        }
            , Ka = {}
            , Ja = {};
        var La = {
            ec: "PAYMENT_AUTHORIZATION",
            fc: "SHIPPING_ADDRESS",
            hc: "SHIPPING_OPTION",
            rd: "UNKNOWN_INTENT"
        }
            , Ma = {
            Rc: "CANARY",
            ad: "LOCAL",
            jd: "PREPROD",
            kd: "PRODUCTION",
            ld: "SANDBOX",
            od: "TEST",
            pd: "TIN"
        }
            , Na = {
            Sc: "CARD",
            qd: "TOKENIZED_CARD",
            td: "UPI"
        }
            , Oa = {
            Uc: "CRYPTOGRAM_3DS",
            fd: "PAN_ONLY"
        }
            , Pa = {
            Xc: "ESTIMATED",
            Zc: "FINAL",
            cd: "NOT_CURRENTLY_KNOWN"
        }
            , Qa = {
            SHORT: "short",
            bd: "long",
            hd: "plain",
            Qc: "buy",
            Wc: "donate",
            Pc: "book",
            Tc: "checkout",
            ed: "order",
            gd: "pay",
            nd: "subscribe"
        }
            , Ra = {
            Vc: "default",
            Oc: "black",
            ud: "white"
        }
            , Sa = {
            md: "static",
            Yc: "fill"
        }
            , Ta = {
            buy: {
                en: 152,
                ar: 189,
                bg: 163,
                ca: 182,
                cs: 192,
                da: 154,
                de: 183,
                el: 178,
                es: 183,
                et: 147,
                fi: 148,
                fr: 183,
                hr: 157,
                id: 186,
                it: 182,
                ja: 148,
                ko: 137,
                ms: 186,
                nl: 167,
                no: 158,
                pl: 182,
                pt: 193,
                ru: 206,
                sk: 157,
                sl: 211,
                sr: 146,
                sv: 154,
                th: 146,
                tr: 161,
                uk: 207,
                zh: 156
            },
            book: {
                ar: 205,
                bg: 233,
                ca: 187,
                cs: 213,
                da: 162,
                de: 176,
                el: 180,
                en: 161,
                es: 188,
                et: 186,
                fi: 152,
                fr: 197,
                hr: 198,
                id: 195,
                it: 178,
                ja: 150,
                ko: 150,
                ms: 211,
                nl: 178,
                no: 195,
                pl: 221,
                pt: 208,
                ru: 265,
                sk: 206,
                sl: 266,
                sr: 196,
                sv: 161,
                th: 150,
                tr: 238,
                uk: 248,
                zh: 158
            },
            checkout: {
                ar: 245,
                bg: 200,
                ca: 268,
                cs: 175,
                da: 162,
                de: 188,
                el: 286,
                en: 201,
                es: 188,
                et: 171,
                fi: 158,
                fr: 170,
                hr: 166,
                id: 226,
                it: 256,
                ja: 150,
                ko: 150,
                ms: 291,
                nl: 178,
                no: 230,
                pl: 187,
                pt: 271,
                ru: 283,
                sk: 176,
                sl: 313,
                sr: 153,
                sv: 172,
                th: 168,
                tr: 195,
                uk: 216,
                zh: 158
            },
            donate: {
                ar: 205,
                bg: 205,
                ca: 162,
                cs: 212,
                da: 171,
                de: 186,
                el: 163,
                en: 180,
                es: 165,
                et: 150,
                fi: 171,
                fr: 225,
                hr: 182,
                id: 237,
                it: 157,
                ja: 167,
                ko: 150,
                ms: 201,
                nl: 187,
                no: 171,
                pl: 252,
                pt: 175,
                ru: 342,
                sk: 178,
                sl: 242,
                sr: 171,
                sv: 181,
                th: 158,
                tr: 181,
                uk: 256,
                zh: 158
            },
            order: {
                ar: 198,
                bg: 195,
                ca: 247,
                cs: 198,
                da: 166,
                de: 190,
                el: 208,
                en: 170,
                es: 157,
                et: 150,
                fi: 150,
                fr: 226,
                hr: 201,
                id: 195,
                it: 171,
                ja: 150,
                ko: 150,
                ms: 195,
                nl: 192,
                no: 171,
                pl: 190,
                pt: 177,
                ru: 207,
                sk: 190,
                sl: 240,
                sr: 165,
                sv: 176,
                th: 151,
                tr: 188,
                uk: 216,
                zh: 158
            },
            pay: {
                ar: 202,
                bg: 200,
                ca: 160,
                cs: 183,
                da: 162,
                de: 188,
                el: 185,
                en: 150,
                es: 162,
                et: 150,
                fi: 158,
                fr: 170,
                hr: 172,
                id: 192,
                it: 155,
                ja: 150,
                ko: 150,
                ms: 192,
                nl: 178,
                no: 162,
                pl: 187,
                pt: 182,
                ru: 213,
                sk: 176,
                sl: 225,
                sr: 153,
                sv: 172,
                th: 168,
                tr: 150,
                uk: 216,
                zh: 158
            },
            subscribe: {
                ar: 221,
                bg: 217,
                ca: 226,
                cs: 201,
                da: 192,
                de: 208,
                el: 180,
                en: 202,
                es: 206,
                et: 150,
                fi: 150,
                fr: 206,
                hr: 178,
                id: 260,
                it: 190,
                ja: 150,
                ko: 150,
                ms: 216,
                nl: 208,
                no: 192,
                pl: 221,
                pt: 196,
                ru: 243,
                sk: 193,
                sl: 333,
                sr: 217,
                sv: 228,
                th: 213,
                tr: 173,
                uk: 305,
                zh: 158
            }
        }
            , Ua = B('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" direction="ltr" height="36px" width="130px"><style>@import url(//fonts.googleapis.com/css?family=Google+Sans:500)</style><line x1="2" y1="10.5" x2="2" y2="29.5" style="stroke: #d9d9d9; stroke-width:2"></line><image x="11" y="6" width="37.5" height="29" preserveAspectRatio="none" xlink:href="https://www.gstatic.com/images/icons/material/system/1x/payment_grey600_36dp.png"></image><text x="52" y="25.5" class="small" style="font: 15px \'Google Sans\', sans-serif; fill: #5F6368">\u2022\u2022\u2022\u2022\u2022\u2022</text></svg>')
            , Va = B('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" direction="ltr" height="36px" width="130px"><style>@import url(//fonts.googleapis.com/css?family=Google+Sans:500)</style><line x1="2" y1="10.5" x2="2" y2="29.5" style="stroke: #5F6368; stroke-width:2"></line><image x="11" y="6" width="37.5" height="29" preserveAspectRatio="none" xlink:href="https://www.gstatic.com/images/icons/material/system/1x/payment_white_36dp.png"></image><text x="52" y="25.5" class="small" style="font: 15px \'Google Sans\', sans-serif; fill: #FFFFFF">\u2022\u2022\u2022\u2022\u2022\u2022</text></svg>')
            , Wa = B('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" direction="ltr" viewBox="0 0 130 36"><style>@import url(//fonts.googleapis.com/css?family=Google+Sans:500)</style><line x1="8" y1="7" x2="8" y2="26" style="stroke: #d9d9d9; stroke-width:2"></line><image x="16" y="2.5" width="37.5" height="29" preserveAspectRatio="none" xlink:href="https://www.gstatic.com/images/icons/material/system/1x/payment_grey600_36dp.png"></image><text x="57" y="22" class="small" style="font: 15px \'Google Sans\', sans-serif; fill: #5f6368">\u2022\u2022\u2022\u2022\u2022\u2022</text></svg>')
            , Xa = B('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" direction="ltr" viewBox="0 0 130 36"><style>@import url(//fonts.googleapis.com/css?family=Google+Sans:500)</style><line x1="8" y1="7" x2="8" y2="26" style="stroke: #5f6368; stroke-width:2"></line><image x="16" y="2.5" width="37.5" height="29" preserveAspectRatio="none" xlink:href="https://www.gstatic.com/images/icons/material/system/1x/payment_white_36dp.png"></image><text x="57" y="22" class="small" style="font: 15px \'Google Sans\', sans-serif; fill: #fff">\u2022\u2022\u2022\u2022\u2022\u2022</text></svg>');
        function Ya(a, b) {
            b = void 0 === b ? document : b;
            var c = document.createElement("style");
            c.type = "text/css";
            c.textContent = a;
            if (b instanceof HTMLDocument)
                document.head.appendChild(c);
            else if (b instanceof ShadowRoot)
                b.appendChild(c);
            else
                throw Error("Parameter 'buttonRootNode' should be either document or a shadowroot.");
        }
        ;/*

Math.uuid.js (v1.4)
http://www.broofa.com
mailto:robert@broofa.com
Copyright (c) 2010 Robert Kieffer
Dual licensed under the MIT and GPL licenses.
*/
        var Za = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".split("");
        function $a(a) {
            for (var b = Array(36), c = 0, d, e = 0; 36 > e; e++)
                8 == e || 13 == e || 18 == e || 23 == e ? b[e] = "-" : 14 == e ? b[e] = "4" : (2 >= c && (c = 33554432 + 16777216 * Math.random() | 0),
                    d = c & 15,
                    c >>= 4,
                    b[e] = Za[19 == e ? d & 3 | 8 : d]);
            return b.join("") + "." + a
        }
        function ab(a) {
            for (var b = 1; b < arguments.length; b++)
                a = bb(a, arguments[b]);
            return a
        }
        function bb(a, b) {
            if ("object" !== typeof b || null === b)
                return a;
            for (var c in b)
                b.hasOwnProperty(c) && void 0 !== b[c] && (null == b[c] ? a[c] = null : null == a[c] || "object" !== typeof a[c] || "object" !== typeof b[c] || Array.isArray(b[c]) || Array.isArray(a[c]) ? a[c] = b[c] : bb(a[c], b[c]));
            return a
        }
        function cb(a) {
            var b = 0, c;
            if (0 == a.length)
                return b;
            for (c = 0; c < a.length; c++) {
                var d = a.charCodeAt(c);
                b = (b << 5) - b + d;
                b &= b
            }
            return b
        }
        function C(a) {
            console.error("DEVELOPER_ERROR in " + a.ga + ": " + a.errorMessage)
        }
        ;var db = Array.prototype.indexOf ? function(a, b) {
                    x(null != a.length);
                    return Array.prototype.indexOf.call(a, b, void 0)
                }
                : function(a, b) {
                    if ("string" === typeof a)
                        return "string" !== typeof b || 1 != b.length ? -1 : a.indexOf(b, 0);
                    for (var c = 0; c < a.length; c++)
                        if (c in a && a[c] === b)
                            return c;
                    return -1
                }
        ;
        var eb = /&/g
            , fb = /</g
            , gb = />/g
            , hb = /"/g
            , ib = /'/g
            , jb = /\x00/g
            , kb = /[\x00&<>"']/
            , D = function(a, b) {
            return -1 != a.indexOf(b)
        };
        var E;
        a: {
            var lb = v.navigator;
            if (lb) {
                var mb = lb.userAgent;
                if (mb) {
                    E = mb;
                    break a
                }
            }
            E = ""
        }
        ;function nb(a, b) {
            for (var c in a)
                if (b.call(void 0, a[c], c, a))
                    return !0;
            return !1
        }
        var ob = "constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" ");
        function pb(a, b) {
            for (var c, d, e = 1; e < arguments.length; e++) {
                d = arguments[e];
                for (c in d)
                    a[c] = d[c];
                for (var f = 0; f < ob.length; f++)
                    c = ob[f],
                    Object.prototype.hasOwnProperty.call(d, c) && (a[c] = d[c])
            }
        }
        ;var qb, rb = function() {
            if (void 0 === qb) {
                var a = null
                    , b = v.trustedTypes;
                if (b && b.createPolicy)
                    try {
                        a = b.createPolicy("goog#html", {
                            createHTML: Ba,
                            createScript: Ba,
                            createScriptURL: Ba
                        })
                    } catch (c) {
                        v.console && v.console.error(c.message)
                    }
                qb = a
            }
            return qb
        };
        var tb = function(a, b) {
            this.wb = b === sb ? a : ""
        };
        k = tb.prototype;
        k.Ea = !0;
        k.Ca = function() {
            return this.wb.toString()
        }
        ;
        k.ob = !0;
        k.Ba = function() {
            return 1
        }
        ;
        k.toString = function() {
            return this.wb + ""
        }
        ;
        var ub = function(a) {
            if (a instanceof tb && a.constructor === tb)
                return a.wb;
            Fa("expected object of type TrustedResourceUrl, got '" + a + "' of type " + w(a));
            return "type_error:TrustedResourceUrl"
        }
            , yb = function(a, b) {
            var c = A(a);
            if (!vb.test(c))
                throw Error("Invalid TrustedResourceUrl format: " + c);
            a = c.replace(wb, function(d, e) {
                if (!Object.prototype.hasOwnProperty.call(b, e))
                    throw Error('Found marker, "' + e + '", in format string, "' + c + '", but no valid label mapping found in args: ' + JSON.stringify(b));
                d = b[e];
                return d instanceof z ? A(d) : encodeURIComponent(String(d))
            });
            return xb(a)
        }
            , wb = /%{(\w+)}/g
            , vb = RegExp("^((https:)?//[0-9a-z.:[\\]-]+/|/[^/\\\\]|[^:/\\\\%]+/|[^:/\\\\%]*[?#]|about:blank#)", "i")
            , sb = {}
            , xb = function(a) {
            var b = rb();
            a = b ? b.createScriptURL(a) : a;
            return new tb(a,sb)
        };
        var Ab = function(a, b) {
            this.vb = b === zb ? a : ""
        };
        k = Ab.prototype;
        k.Ea = !0;
        k.Ca = function() {
            return this.vb.toString()
        }
        ;
        k.ob = !0;
        k.Ba = function() {
            return 1
        }
        ;
        k.toString = function() {
            return this.vb.toString()
        }
        ;
        var Bb = function(a) {
            if (a instanceof Ab && a.constructor === Ab)
                return a.vb;
            Fa("expected object of type SafeUrl, got '" + a + "' of type " + w(a));
            return "type_error:SafeUrl"
        }
            , Cb = /^(?:(?:https?|mailto|ftp):|[^:/?#]*(?:[/?#]|$))/i
            , zb = {};
        var Db = {}
            , F = function(a, b, c) {
            this.ub = c === Db ? a : "";
            this.qc = b;
            this.Ea = this.ob = !0
        };
        F.prototype.Ba = function() {
            return this.qc
        }
        ;
        F.prototype.Ca = function() {
            return this.ub.toString()
        }
        ;
        F.prototype.toString = function() {
            return this.ub.toString()
        }
        ;
        var Eb = function(a) {
            if (a instanceof F && a.constructor === F)
                return a.ub;
            Fa("expected object of type SafeHtml, got '" + a + "' of type " + w(a));
            return "type_error:SafeHtml"
        }
            , Gb = function(a) {
            if (a instanceof F)
                return a;
            var b = "object" == typeof a
                , c = null;
            b && a.ob && (c = a.Ba());
            a = b && a.Ea ? a.Ca() : String(a);
            kb.test(a) && (-1 != a.indexOf("&") && (a = a.replace(eb, "&amp;")),
            -1 != a.indexOf("<") && (a = a.replace(fb, "&lt;")),
            -1 != a.indexOf(">") && (a = a.replace(gb, "&gt;")),
            -1 != a.indexOf('"') && (a = a.replace(hb, "&quot;")),
            -1 != a.indexOf("'") && (a = a.replace(ib, "&#39;")),
            -1 != a.indexOf("\x00") && (a = a.replace(jb, "&#0;")));
            return Fb(a, c)
        }
            , Ib = function(a) {
            var b = Gb(Hb)
                , c = b.Ba()
                , d = []
                , e = function(f) {
                Array.isArray(f) ? f.forEach(e) : (f = Gb(f),
                    d.push(Eb(f).toString()),
                    f = f.Ba(),
                    0 == c ? c = f : 0 != f && c != f && (c = null))
            };
            a.forEach(e);
            return Fb(d.join(Eb(b).toString()), c)
        }
            , Jb = function(a) {
            return Ib(Array.prototype.slice.call(arguments))
        }
            , Fb = function(a, b) {
            var c = rb();
            a = c ? c.createHTML(a) : a;
            return new F(a,b,Db)
        }
            , Hb = new F(v.trustedTypes && v.trustedTypes.emptyHTML || "",0,Db)
            , Kb = Fb("<br>", 0);
        var Lb = {
            MATH: !0,
            SCRIPT: !0,
            STYLE: !0,
            SVG: !0,
            TEMPLATE: !0
        }
            , Mb = function(a) {
            var b = !1, c;
            return function() {
                b || (c = a(),
                    b = !0);
                return c
            }
        }(function() {
            if ("undefined" === typeof document)
                return !1;
            var a = document.createElement("div")
                , b = document.createElement("div");
            b.appendChild(document.createElement("div"));
            a.appendChild(b);
            if (!a.firstChild)
                return !1;
            b = a.firstChild.firstChild;
            a.innerHTML = Eb(Hb);
            return !b.parentElement
        })
            , Nb = function(a, b) {
            if (a.tagName && Lb[a.tagName.toUpperCase()])
                throw Error("goog.dom.safe.setInnerHtml cannot be used to set content of " + a.tagName + ".");
            if (Mb())
                for (; a.lastChild; )
                    a.removeChild(a.lastChild);
            a.innerHTML = Eb(b)
        }
            , Ob = function(a, b) {
            a: {
                try {
                    var c = a && a.ownerDocument
                        , d = c && (c.defaultView || c.parentWindow);
                    d = d || v;
                    if (d.Element && d.Location) {
                        var e = d;
                        break a
                    }
                } catch (g) {}
                e = null
            }
            if (e && "undefined" != typeof e.HTMLIFrameElement && (!a || !(a instanceof e.HTMLIFrameElement) && (a instanceof e.Location || a instanceof e.Element))) {
                if (wa(a))
                    try {
                        var f = a.constructor.displayName || a.constructor.name || Object.prototype.toString.call(a)
                    } catch (g) {
                        f = "<object could not be stringified>"
                    }
                else
                    f = void 0 === a ? "undefined" : null === a ? "null" : typeof a;
                Fa("Argument is not a %s (or a non-Element, non-Location mock); got: %s", "HTMLIFrameElement", f)
            }
            a.src = ub(b).toString()
        }
            , Pb = function(a, b, c, d) {
            a instanceof Ab || a instanceof Ab || (a = "object" == typeof a && a.Ea ? a.Ca() : String(a),
            x(Cb.test(a), "%s does not match the safe URL pattern", a) || (a = "about:invalid#zClosurez"),
                a = new Ab(a,zb));
            b = b || v;
            c = c instanceof z ? A(c) : c || "";
            return void 0 !== d ? b.open(Bb(a), c, d) : b.open(Bb(a), c)
        };
        var Qb = function() {
            return "transition".replace(/\-([a-z])/g, function(a, b) {
                return b.toUpperCase()
            })
        }
            , Rb = function(a) {
            return a.replace(RegExp("(^|[\\s]+)([a-z])", "g"), function(b, c, d) {
                return c + d.toUpperCase()
            })
        };
        var Sb = function(a) {
            Sb[" "](a);
            return a
        };
        Sb[" "] = ua;
        var Tb = D(E, "Trident") || D(E, "MSIE")
            , Ub = D(E, "Gecko") && !(D(E.toLowerCase(), "webkit") && !D(E, "Edge")) && !(D(E, "Trident") || D(E, "MSIE")) && !D(E, "Edge")
            , Vb = D(E.toLowerCase(), "webkit") && !D(E, "Edge");
        var Wb = function(a) {
            var b = Array.prototype.map.call(arguments, A).join("")
                , c = B("Constant HTML string, that gets turned into a Node later, so it will be automatically balanced.");
            Ha(A(c), "must provide justification");
            x(!/^[\s\xa0]*$/.test(A(c)), "must provide non-empty justification");
            b = Fb(b, null);
            c = document;
            var d = "DIV";
            "application/xhtml+xml" === c.contentType && (d = d.toLowerCase());
            d = c.createElement(d);
            Tb ? (Nb(d, Jb(Kb, b)),
                d.removeChild(x(d.firstChild))) : Nb(d, b);
            if (1 == d.childNodes.length)
                b = d.removeChild(x(d.firstChild));
            else
                for (b = c.createDocumentFragment(); d.firstChild; )
                    b.appendChild(d.firstChild);
            return b
        };
        var Xb = function(a, b) {
            this.mc = a[t(q.Symbol, "iterator")]();
            this.vc = b;
            this.xc = 0
        };
        Xb.prototype[t(q.Symbol, "iterator")] = function() {
            return this
        }
        ;
        Xb.prototype.next = function() {
            var a = this.mc.next();
            return {
                value: a.done ? void 0 : this.vc.call(void 0, a.value, this.xc++),
                done: a.done
            }
        }
        ;
        var Yb = function(a, b) {
            return new Xb(a,b)
        };
        var Zb = "StopIteration"in v ? v.StopIteration : {
            message: "StopIteration",
            stack: ""
        }
            , G = function() {};
        G.prototype.next = function() {
            return G.prototype.ra.call(this)
        }
        ;
        G.prototype.ra = function() {
            throw Zb;
        }
        ;
        G.prototype.ma = function() {
            return this
        }
        ;
        var ac = function(a) {
            if (a instanceof I || a instanceof J || a instanceof L)
                return a;
            if ("function" == typeof a.next)
                return new I(function() {
                        return $b(a)
                    }
                );
            if ("function" == typeof a[t(q.Symbol, "iterator")])
                return new I(function() {
                        return a[t(q.Symbol, "iterator")]()
                    }
                );
            if ("function" == typeof a.ma)
                return new I(function() {
                        return $b(a.ma())
                    }
                );
            throw Error("Not an iterator or iterable.");
        }
            , $b = function(a) {
            if (!(a instanceof G))
                return a;
            var b = !1;
            return {
                next: function() {
                    for (var c; !b; )
                        try {
                            c = a.ra();
                            break
                        } catch (d) {
                            if (d !== Zb)
                                throw d;
                            b = !0
                        }
                    return {
                        value: c,
                        done: b
                    }
                }
            }
        }
            , I = function(a) {
            this.lb = a
        };
        I.prototype.ma = function() {
            return new J(this.lb())
        }
        ;
        I.prototype[t(q.Symbol, "iterator")] = function() {
            return new L(this.lb())
        }
        ;
        I.prototype.Gb = function() {
            return new L(this.lb())
        }
        ;
        var J = function(a) {
            this.Fa = a
        };
        qa(J, G);
        J.prototype.ra = function() {
            var a = this.Fa.next();
            if (a.done)
                throw Zb;
            return a.value
        }
        ;
        J.prototype.next = function() {
            return J.prototype.ra.call(this)
        }
        ;
        J.prototype[t(q.Symbol, "iterator")] = function() {
            return new L(this.Fa)
        }
        ;
        J.prototype.Gb = function() {
            return new L(this.Fa)
        }
        ;
        var L = function(a) {
            I.call(this, function() {
                return a
            });
            this.Fa = a
        };
        qa(L, I);
        L.prototype.next = function() {
            return this.Fa.next()
        }
        ;
        var bc = function(a, b) {
            this.L = {};
            this.s = [];
            this.Qa = this.size = 0;
            var c = arguments.length;
            if (1 < c) {
                if (c % 2)
                    throw Error("Uneven number of arguments");
                for (var d = 0; d < c; d += 2)
                    this.set(arguments[d], arguments[d + 1])
            } else
                a && this.addAll(a)
        };
        k = bc.prototype;
        k.O = function() {
            cc(this);
            for (var a = [], b = 0; b < this.s.length; b++)
                a.push(this.L[this.s[b]]);
            return a
        }
        ;
        k.Z = function() {
            cc(this);
            return this.s.concat()
        }
        ;
        k.ya = function(a) {
            return this.has(a)
        }
        ;
        k.has = function(a) {
            return dc(this.L, a)
        }
        ;
        k.clear = function() {
            this.L = {};
            this.Qa = this.size = this.s.length = 0
        }
        ;
        k.remove = function(a) {
            return this.delete(a)
        }
        ;
        k.delete = function(a) {
            return dc(this.L, a) ? (delete this.L[a],
                --this.size,
                this.Qa++,
            this.s.length > 2 * this.size && cc(this),
                !0) : !1
        }
        ;
        var cc = function(a) {
            if (a.size != a.s.length) {
                for (var b = 0, c = 0; b < a.s.length; ) {
                    var d = a.s[b];
                    dc(a.L, d) && (a.s[c++] = d);
                    b++
                }
                a.s.length = c
            }
            if (a.size != a.s.length) {
                var e = {};
                for (c = b = 0; b < a.s.length; )
                    d = a.s[b],
                    dc(e, d) || (a.s[c++] = d,
                        e[d] = 1),
                        b++;
                a.s.length = c
            }
        };
        k = bc.prototype;
        k.get = function(a, b) {
            return dc(this.L, a) ? this.L[a] : b
        }
        ;
        k.set = function(a, b) {
            dc(this.L, a) || (this.size += 1,
                this.s.push(a),
                this.Qa++);
            this.L[a] = b
        }
        ;
        k.addAll = function(a) {
            if (a instanceof bc)
                for (var b = a.Z(), c = 0; c < b.length; c++)
                    this.set(b[c], a.get(b[c]));
            else
                for (b in a)
                    this.set(b, a[b])
        }
        ;
        k.forEach = function(a, b) {
            for (var c = this.Z(), d = 0; d < c.length; d++) {
                var e = c[d]
                    , f = this.get(e);
                a.call(b, f, e, this)
            }
        }
        ;
        k.clone = function() {
            return new bc(this)
        }
        ;
        k.keys = function() {
            return ac(this.ma(!0)).Gb()
        }
        ;
        k.values = function() {
            return ac(this.ma(!1)).Gb()
        }
        ;
        k.entries = function() {
            var a = this;
            return Yb(t(this, "keys").call(this), function(b) {
                return [b, a.get(b)]
            })
        }
        ;
        k.ma = function(a) {
            cc(this);
            var b = 0
                , c = this.Qa
                , d = this
                , e = new G;
            e.ra = function() {
                if (c != d.Qa)
                    throw Error("The map has changed since the iterator was created");
                if (b >= d.s.length)
                    throw Zb;
                var f = d.s[b++];
                return a ? f : d.L[f]
            }
            ;
            e.next = e.ra.bind(e);
            return e
        }
        ;
        var dc = function(a, b) {
            return Object.prototype.hasOwnProperty.call(a, b)
        };
        var ec = function(a) {
            if (a.O && "function" == typeof a.O)
                return a.O();
            if ("undefined" !== typeof Map && a instanceof Map || "undefined" !== typeof Set && a instanceof Set)
                return t(Array, "from").call(Array, t(a, "values").call(a));
            if ("string" === typeof a)
                return a.split("");
            if (va(a)) {
                for (var b = [], c = a.length, d = 0; d < c; d++)
                    b.push(a[d]);
                return b
            }
            b = [];
            c = 0;
            for (d in a)
                b[c++] = a[d];
            return b
        }
            , fc = function(a) {
            if (a.Z && "function" == typeof a.Z)
                return a.Z();
            if (!a.O || "function" != typeof a.O) {
                if ("undefined" !== typeof Map && a instanceof Map)
                    return t(Array, "from").call(Array, t(a, "keys").call(a));
                if (!("undefined" !== typeof Set && a instanceof Set)) {
                    if (va(a) || "string" === typeof a) {
                        var b = [];
                        a = a.length;
                        for (var c = 0; c < a; c++)
                            b.push(c);
                        return b
                    }
                    b = [];
                    c = 0;
                    for (var d in a)
                        b[c++] = d;
                    return b
                }
            }
        }
            , gc = function(a, b, c) {
            if (a.forEach && "function" == typeof a.forEach)
                a.forEach(b, c);
            else if (va(a) || "string" === typeof a)
                Array.prototype.forEach.call(a, b, c);
            else
                for (var d = fc(a), e = ec(a), f = e.length, g = 0; g < f; g++)
                    b.call(c, e[g], d && d[g], a)
        };
        var hc = RegExp("^(?:([^:/?#.]+):)?(?://(?:([^\\\\/?#]*)@)?([^\\\\/?#]*?)(?::([0-9]+))?(?=[\\\\/?#]|$))?([^?#]+)?(?:\\?([^#]*))?(?:#([\\s\\S]*))?$")
            , ic = function(a) {
            var b = a.match(hc);
            a = b[1];
            var c = b[3];
            b = b[4];
            var d = "";
            a && (d += a + ":");
            c && (d = d + "//" + c,
            b && (d += ":" + b));
            return d
        }
            , jc = function(a, b) {
            if (a) {
                a = a.split("&");
                for (var c = 0; c < a.length; c++) {
                    var d = a[c].indexOf("=")
                        , e = null;
                    if (0 <= d) {
                        var f = a[c].substring(0, d);
                        e = a[c].substring(d + 1)
                    } else
                        f = a[c];
                    b(f, e ? decodeURIComponent(e.replace(/\+/g, " ")) : "")
                }
            }
        };
        var M = function(a) {
            this.S = this.la = this.ba = "";
            this.h = null;
            this.N = this.P = "";
            this.G = this.uc = !1;
            if (a instanceof M) {
                this.G = a.G;
                kc(this, a.ba);
                var b = a.la;
                N(this);
                this.la = b;
                b = a.S;
                N(this);
                this.S = b;
                lc(this, a.h);
                b = a.P;
                N(this);
                this.P = b;
                mc(this, a.I.clone());
                a = a.N;
                N(this);
                this.N = a
            } else
                a && (b = String(a).match(hc)) ? (this.G = !1,
                    kc(this, b[1] || "", !0),
                    a = b[2] || "",
                    N(this),
                    this.la = nc(a),
                    a = b[3] || "",
                    N(this),
                    this.S = nc(a, !0),
                    lc(this, b[4]),
                    a = b[5] || "",
                    N(this),
                    this.P = nc(a, !0),
                    mc(this, b[6] || "", !0),
                    a = b[7] || "",
                    N(this),
                    this.N = nc(a)) : (this.G = !1,
                    this.I = new O(null,this.G))
        };
        M.prototype.toString = function() {
            var a = []
                , b = this.ba;
            b && a.push(oc(b, pc, !0), ":");
            var c = this.S;
            if (c || "file" == b)
                a.push("//"),
                (b = this.la) && a.push(oc(b, pc, !0), "@"),
                    a.push(encodeURIComponent(String(c)).replace(/%25([0-9a-fA-F]{2})/g, "%$1")),
                    c = this.h,
                null != c && a.push(":", String(c));
            if (c = this.P)
                this.S && "/" != c.charAt(0) && a.push("/"),
                    a.push(oc(c, "/" == c.charAt(0) ? qc : rc, !0));
            (c = this.I.toString()) && a.push("?", c);
            (c = this.N) && a.push("#", oc(c, sc));
            return a.join("")
        }
        ;
        M.prototype.resolve = function(a) {
            var b = this.clone()
                , c = !!a.ba;
            c ? kc(b, a.ba) : c = !!a.la;
            if (c) {
                var d = a.la;
                N(b);
                b.la = d
            } else
                c = !!a.S;
            c ? (d = a.S,
                N(b),
                b.S = d) : c = null != a.h;
            d = a.P;
            if (c)
                lc(b, a.h);
            else if (c = !!a.P) {
                if ("/" != d.charAt(0))
                    if (this.S && !this.P)
                        d = "/" + d;
                    else {
                        var e = b.P.lastIndexOf("/");
                        -1 != e && (d = b.P.substr(0, e + 1) + d)
                    }
                e = d;
                if (".." == e || "." == e)
                    d = "";
                else if (D(e, "./") || D(e, "/.")) {
                    d = 0 == e.lastIndexOf("/", 0);
                    e = e.split("/");
                    for (var f = [], g = 0; g < e.length; ) {
                        var h = e[g++];
                        "." == h ? d && g == e.length && f.push("") : ".." == h ? ((1 < f.length || 1 == f.length && "" != f[0]) && f.pop(),
                        d && g == e.length && f.push("")) : (f.push(h),
                            d = !0)
                    }
                    d = f.join("/")
                } else
                    d = e
            }
            c ? (N(b),
                b.P = d) : c = "" !== a.I.toString();
            c ? mc(b, a.I.clone()) : c = !!a.N;
            c && (a = a.N,
                N(b),
                b.N = a);
            return b
        }
        ;
        M.prototype.clone = function() {
            return new M(this)
        }
        ;
        var kc = function(a, b, c) {
            N(a);
            a.ba = c ? nc(b, !0) : b;
            a.ba && (a.ba = a.ba.replace(/:$/, ""))
        }
            , lc = function(a, b) {
            N(a);
            if (b) {
                b = Number(b);
                if (isNaN(b) || 0 > b)
                    throw Error("Bad port number " + b);
                a.h = b
            } else
                a.h = null
        }
            , mc = function(a, b, c) {
            N(a);
            b instanceof O ? (a.I = b,
                a.I.Bb(a.G)) : (c || (b = oc(b, tc)),
                a.I = new O(b,a.G))
        };
        M.prototype.getQuery = function() {
            return this.I.toString()
        }
        ;
        var uc = function(a, b, c) {
            N(a);
            a.I.set(b, c)
        };
        M.prototype.removeParameter = function(a) {
            N(this);
            this.I.remove(a);
            return this
        }
        ;
        var N = function(a) {
            if (a.uc)
                throw Error("Tried to modify a read-only Uri");
        };
        M.prototype.Bb = function(a) {
            this.G = a;
            this.I && this.I.Bb(a)
        }
        ;
        var nc = function(a, b) {
            return a ? b ? decodeURI(a.replace(/%25/g, "%2525")) : decodeURIComponent(a) : ""
        }
            , oc = function(a, b, c) {
            return "string" === typeof a ? (a = encodeURI(a).replace(b, vc),
            c && (a = a.replace(/%25([0-9a-fA-F]{2})/g, "%$1")),
                a) : null
        }
            , vc = function(a) {
            a = a.charCodeAt(0);
            return "%" + (a >> 4 & 15).toString(16) + (a & 15).toString(16)
        }
            , pc = /[#\/\?@]/g
            , rc = /[#\?:]/g
            , qc = /[#\?]/g
            , tc = /[#\?@]/g
            , sc = /#/g
            , O = function(a, b) {
            this.A = this.j = null;
            this.D = a || null;
            this.G = !!b
        }
            , P = function(a) {
            a.j || (a.j = new bc,
                a.A = 0,
            a.D && jc(a.D, function(b, c) {
                a.add(decodeURIComponent(b.replace(/\+/g, " ")), c)
            }))
        };
        k = O.prototype;
        k.add = function(a, b) {
            P(this);
            this.D = null;
            a = wc(this, a);
            var c = this.j.get(a);
            c || this.j.set(a, c = []);
            c.push(b);
            this.A = Ga(this.A) + 1;
            return this
        }
        ;
        k.remove = function(a) {
            P(this);
            a = wc(this, a);
            return this.j.ya(a) ? (this.D = null,
                this.A = Ga(this.A) - this.j.get(a).length,
                this.j.remove(a)) : !1
        }
        ;
        k.clear = function() {
            this.j = this.D = null;
            this.A = 0
        }
        ;
        k.ya = function(a) {
            P(this);
            a = wc(this, a);
            return this.j.ya(a)
        }
        ;
        k.forEach = function(a, b) {
            P(this);
            this.j.forEach(function(c, d) {
                c.forEach(function(e) {
                    a.call(b, e, d, this)
                }, this)
            }, this)
        }
        ;
        k.Z = function() {
            P(this);
            for (var a = this.j.O(), b = this.j.Z(), c = [], d = 0; d < b.length; d++)
                for (var e = a[d], f = 0; f < e.length; f++)
                    c.push(b[d]);
            return c
        }
        ;
        k.O = function(a) {
            P(this);
            var b = [];
            if ("string" === typeof a)
                this.ya(a) && (b = b.concat(this.j.get(wc(this, a))));
            else {
                a = this.j.O();
                for (var c = 0; c < a.length; c++)
                    b = b.concat(a[c])
            }
            return b
        }
        ;
        k.set = function(a, b) {
            P(this);
            this.D = null;
            a = wc(this, a);
            this.ya(a) && (this.A = Ga(this.A) - this.j.get(a).length);
            this.j.set(a, [b]);
            this.A = Ga(this.A) + 1;
            return this
        }
        ;
        k.get = function(a, b) {
            if (!a)
                return b;
            a = this.O(a);
            return 0 < a.length ? String(a[0]) : b
        }
        ;
        k.toString = function() {
            if (this.D)
                return this.D;
            if (!this.j)
                return "";
            for (var a = [], b = this.j.Z(), c = 0; c < b.length; c++) {
                var d = b[c]
                    , e = encodeURIComponent(String(d));
                d = this.O(d);
                for (var f = 0; f < d.length; f++) {
                    var g = e;
                    "" !== d[f] && (g += "=" + encodeURIComponent(String(d[f])));
                    a.push(g)
                }
            }
            return this.D = a.join("&")
        }
        ;
        k.clone = function() {
            var a = new O;
            a.D = this.D;
            this.j && (a.j = this.j.clone(),
                a.A = this.A);
            return a
        }
        ;
        var wc = function(a, b) {
            b = String(b);
            a.G && (b = b.toLowerCase());
            return b
        };
        O.prototype.Bb = function(a) {
            a && !this.G && (P(this),
                this.D = null,
                this.j.forEach(function(b, c) {
                    var d = c.toLowerCase();
                    if (c != d && (this.remove(c),
                        this.remove(d),
                    0 < b.length)) {
                        this.D = null;
                        c = this.j;
                        var e = c.set;
                        d = wc(this, d);
                        var f = b.length;
                        if (0 < f) {
                            for (var g = Array(f), h = 0; h < f; h++)
                                g[h] = b[h];
                            f = g
                        } else
                            f = [];
                        e.call(c, d, f);
                        this.A = Ga(this.A) + b.length
                    }
                }, this));
            this.G = a
        }
        ;
        O.prototype.extend = function(a) {
            for (var b = 0; b < arguments.length; b++)
                gc(arguments[b], function(c, d) {
                    this.add(d, c)
                }, this)
        }
        ;
        var xc = []
            , yc = []
            , zc = []
            , Ac = window.location.hostname
            , Bc = window.whitelistedDomainsHashedValueListForGpayButtonWithCardInfo || []
            , Cc = window.denylistedDomainsHashedValueListForGpayButtonWithCardInfo || []
            , Dc = window.denylistedMerchentIdsHashedValueListForGpayButtonWithCardInfo || [];
        function Ec(a) {
            t(zc, "includes").call(zc, a.buttonRootNode || document) || (Ya("\n  .gpay-card-info-container {\n    padding: 0;\n    position: relative;\n    min-width: 240px;\n    height: 40px;\n    min-height: 40px;\n    border-radius: 4px;\n    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 1px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;\n    cursor: pointer;\n    border: 0px;\n  }\n\n  .gpay-card-info-container.black,\n  .gpay-card-info-animation-container.black {\n    background-color: #000;\n    box-shadow: none;\n  }\n\n  .gpay-card-info-container.white,\n  .gpay-card-info-animation-container.white {\n    background-color: #fff;\n  }\n\n  .gpay-card-info-container.black.active {\n    background-color: #5f6368;\n  }\n\n  .gpay-card-info-container.black.hover,\n  .gpay-card-info-animation-container.black.hover {\n    background-color: #3c4043;\n  }\n\n  .gpay-card-info-container.white.active {\n    background-color: #fff;\n  }\n\n  .gpay-card-info-container.white.focus {\n    box-shadow: #e8e8e8 0 1px 1px 0, #e8e8e8 0 1px 3px;\n  }\n\n  .gpay-card-info-container.white.hover,\n  .gpay-card-info-animation-container.white.hover {\n    background-color: #f8f8f8;\n  }\n\n  .gpay-card-info-iframe {\n    border: 0;\n    display: block;\n    height: 40px;\n    margin: auto;\n    max-width: 100%;\n    width: 240px;\n  }\n\n  .gpay-card-info-container-fill .gpay-card-info-iframe{\n    position: absolute;\n    top: 0;\n    height: 100%;\n    width: 100%;\n  }\n\n  .gpay-card-info-container-fill,\n    .gpay-card-info-container-fill > .gpay-card-info-container{\n    width: 100%;\n    height: inherit;\n  }\n\n  .gpay-card-info-container-fill .gpay-card-info-placeholder-container{\n    align-items: center;\n    justify-content: center;\n    width: 100%;\n    padding-top: 3px;\n    box-sizing: border-box;\n    overflow: hidden;\n  }\n\n  .gpay-card-info-container-fill .gpay-card-info-placeholder-svg-container{\n    position: relative;\n    width: 60%;\n    height: inherit;\n    max-height: 80%;\n    margin-right: -20%;\n  }\n\n  .gpay-card-info-container-fill .gpay-card-info-placeholder-svg-container > svg {\n    position: absolute;\n    left: 0;\n    height: 100%;\n    max-width: 100%;\n  }\n", a.buttonRootNode),
                Ya('\n  .gpay-card-info-animation-container {\n    display: flex;\n    width:100%;\n    position: absolute;\n    z-index: 100;\n    height: 40px;\n    border-radius: 4px;\n  }\n\n  .gpay-card-info-placeholder-container {\n    display: flex;\n    width: 240px;\n    height: 100%;\n    margin: auto;\n  }\n\n  .gpay-card-info-animated-progress-bar-container {\n    display: flex;\n    box-sizing: border-box;\n    position: absolute;\n    width: 100%;\n  }\n\n  .gpay-card-info-animated-progress-bar {\n    border-radius: 4px 4px 0px 0px;\n    animation-duration: 0.5s;\n    animation-fill-mode: forwards;\n    animation-iteration-count: 1;\n    animation-name: gpayProgressFill;\n    animation-timing-function: cubic-bezier(0.97, 0.33, 1, 1);\n    background: #caccce;\n    width: 100%;\n    height: 3px;\n    max-height: 3px;\n  }\n\n  .gpay-card-info-animated-progress-bar-indicator {\n    border-radius: 4px 4px 0px 0px;\n    max-width: 20px;\n    min-width: 20px;\n    height: 3px;\n    max-height: 3px;\n    background: linear-gradient(to right, #caccce 30%, #acaeaf 60%);\n    animation-delay: 0.5s;\n    animation-duration: 1.7s;\n    animation-fill-mode: forwards;\n    animation-iteration-count: infinite;\n    animation-name: gpayPlaceHolderShimmer;\n  }\n\n  .gpay-card-info-iframe-fade-in {\n    animation-fill-mode: forwards;\n    animation-duration: 0.6s;\n    animation-name: gpayIframeFadeIn;\n  }\n\n  .gpay-card-info-animation-container-fade-out {\n    animation-fill-mode: forwards;\n    animation-duration: 0.6s;\n    animation-name: gpayPlaceHolderFadeOut;\n  }\n\n  .gpay-card-info-animation-gpay-logo {\n    margin: 13px 7px 0px  39px;\n    background-origin: content-box;\n    background-position: center center;\n    background-repeat: no-repeat;\n    background-size: contain;\n    height: 17px;\n    max-height: 17px;\n    max-width: 41px;\n    min-width: 41px;\n  }\n\n  .gpay-card-info-animation-gpay-logo.black {\n    background-image: url("https://www.gstatic.com/instantbuy/svg/dark_gpay.svg");\n  }\n\n  .gpay-card-info-animation-gpay-logo.white {\n    background-image: url("https://www.gstatic.com/instantbuy/svg/light_gpay.svg");\n  }\n\n  @keyframes gpayPlaceHolderShimmer{\n    0% {\n      margin-left: 0px;\n    }\n    100% {\n      margin-left: calc(100% - 20px);\n    }\n  }\n\n  @keyframes gpayIframeFadeIn {\n    from {\n        opacity: 0;\n    }\n    to {\n        opacity: 1;\n    }\n  }\n\n  @keyframes gpayPlaceHolderFadeOut {\n    from {\n        opacity: 1;\n    }\n\n    to {\n        opacity: 0;\n    }\n  }\n\n  @keyframes gpayProgressFill {\n    from {\n      width: 0;\n    }\n    to {\n      width: 100%;\n    }\n  }\n\n  .gpay-card-info-container-fill .gpay-card-info-animation-container{\n    top: 0;\n    width: 100%;\n    height: 100%;\n  }\n\n  .gpay-card-info-container-fill .gpay-card-info-animation-gpay-logo{\n    background-position: right;\n    margin: 0 0 0 0;\n    max-width: none;\n    width: 25%;\n    height:inherit;\n    max-height: 50%;\n  }\n', a.buttonRootNode),
                zc.push(a.buttonRootNode || document));
            var b = Fc(a)
                , c = "white" == a.buttonColor ? "white" : "black"
                , d = document.createElement("button");
            Gc(d);
            d.setAttribute("class", (-1658203989 === cb(Ac) ? "gpay-button" : "") + " gpay-card-info-container " + b);
            var e = document.createElement("div");
            e.setAttribute("class", "gpay-card-info-animation-container " + c);
            b = document.createElement("div");
            b.setAttribute("class", "gpay-card-info-placeholder-container");
            var f = document.createElement("div");
            f.setAttribute("class", "gpay-card-info-animation-gpay-logo " + c);
            var g = Wb("white" == a.buttonColor ? Ua : Va);
            c = document.createElement("div");
            c.setAttribute("class", "gpay-card-info-animated-progress-bar-container");
            var h = document.createElement("div");
            h.setAttribute("class", "gpay-card-info-animated-progress-bar");
            var l = document.createElement("div");
            l.setAttribute("class", "gpay-card-info-animated-progress-bar-indicator");
            h.appendChild(l);
            b.appendChild(f);
            "fill" !== a.buttonSizeMode ? b.appendChild(g) : (f = Wb("white" == a.buttonColor ? Wa : Xa),
                g = document.createElement("div"),
                g.appendChild(f),
                g.setAttribute("class", "gpay-card-info-placeholder-svg-container"),
                b.appendChild(g));
            c.appendChild(h);
            e.appendChild(b);
            e.appendChild(c);
            Hc(e);
            d.appendChild(e);
            var m = document.createElement("iframe");
            m.setAttribute("class", "gpay-card-info-iframe");
            m.setAttribute("scrolling", "no");
            b = new M("https://pay.google.com/gp/p/generate_gpay_btn_img");
            uc(b, "buttonColor", a.buttonColor);
            uc(b, "browserLocale", Ic(a.buttonLocale));
            uc(b, "buttonSizeMode", a.buttonSizeMode);
            void 0 !== a.allowedPaymentMethods && uc(b, "allowedPaymentMethods", JSON.stringify(a.allowedPaymentMethods));
            m.setAttribute("src", b.toString());
            m.onload = function() {
                m.classList.add("gpay-card-info-iframe-fade-in");
                e.classList.add("gpay-card-info-animation-container-fade-out")
            }
            ;
            a.onClick && d.addEventListener("click", a.onClick);
            Hc(d);
            d.appendChild(m);
            b = document.createElement("div");
            "fill" === a.buttonSizeMode && b.setAttribute("class", "gpay-card-info-container-fill");
            b.appendChild(d);
            return b
        }
        function Hc(a) {
            ["mouseover", "mouseout"].map(function(b) {
                a.addEventListener(b, function(c) {
                    a.classList.toggle("hover", "mouseover" == c.type);
                    var d = document.querySelector(".gpay-card-info-animation-container");
                    null !== d && d.classList.toggle("hover", "mouseover" == c.type)
                })
            });
            ["mousedown", "mouseup", "mouseout"].map(function(b) {
                a.addEventListener(b, function(c) {
                    a.classList.toggle("active", "mousedown" == c.type)
                })
            });
            ["focus", "blur"].map(function(b) {
                a.addEventListener(b, function(c) {
                    a.classList.toggle("focus", "focus" == c.type)
                })
            })
        }
        function Gc(a) {
            a.setAttribute("type", "button");
            a.setAttribute("aria-label", "Google Pay")
        }
        function Fc(a) {
            var b = "white";
            "white" !== a.buttonColor && (b = "black");
            var c = a.buttonType || "buy";
            "buy" === a.buttonType ? c = "buy long" : "plain" === a.buttonType && (c = "plain short");
            return b + " " + c + " " + Ic(a.buttonLocale)
        }
        function Ic(a, b) {
            var c = (navigator.language || navigator.Ad || "en").substring(0, 2)
                , d = (a || c).substring(0, 2);
            if (d in Ta.buy)
                return d;
            d !== c && (void 0 === b ? 0 : b) && C({
                ga: "createButton",
                errorMessage: 'Button locale "' + a + '" is not supported, falling back to browser locale.'
            });
            return c in Ta.buy ? c : "en"
        }
        ;var Jc = function() {
            this.Nc = Q.contentWindow
        };
        Jc.prototype.postMessage = function(a, b) {
            this.Nc.postMessage(a, b)
        }
        ;
        var Kc = {
            sd: 0,
            $c: 1,
            ec: 2,
            fc: 3,
            hc: 4,
            dd: 5
        }
            , Q = null
            , Lc = null
            , R = null
            , Mc = null
            , Nc = Date.now()
            , Oc = null
            , Pc = !1
            , Qc = []
            , Sc = function() {
            Rc({}, 11, ["canMakePaymentForPaymentHandlerResponse"], function() {})
        }
            , Rc = function(a, b, c, d) {
            function e(f) {
                var g;
                a: {
                    for (g = 0; g < c.length; g++)
                        if (f.data[c[g]]) {
                            g = !0;
                            break a
                        }
                    g = !1
                }
                g && (d(f),
                    window.removeEventListener("message", e))
            }
            window.addEventListener("message", e);
            a = t(Object, "assign").call(Object, {
                eventType: b
            }, a);
            S(a)
        }
            , S = function(a) {
            if (Pc && Lc) {
                a = t(Object, "assign").call(Object, {
                    buyFlowActivityMode: Oc,
                    googleTransactionId: Mc,
                    originTimeMs: Nc
                }, a);
                if ("CANARY" == R)
                    var b = "https://ibfe-canary.corp.google.com";
                else
                    b = "https://pay",
                        "SANDBOX" == R ? b += ".sandbox" : "PREPROD" == R && (b += "-preprod.sandbox"),
                        b += ".google.com";
                Lc.postMessage(a, b)
            } else
                Qc.push(a)
        }
            , Tc = function() {
            Pc = !0;
            Qc.forEach(function(a) {
                S(a)
            });
            Qc.length = 0
        };
        (function() {
                if (!Q) {
                    var a = window.gpayInitParams || {};
                    R = a.environment || "PRODUCTION";
                    Q = document.createElement("iframe");
                    Ob(Q, yb(B(("CANARY" == R ? "https://ibfe-canary.corp" : "https://pay") + ("PREPROD" == R ? "-preprod.sandbox" : "SANDBOX" == R ? ".sandbox" : "") + ".google.com/gp/p/ui/payframe?origin=%{windowOrigin}&mid=%{merchantId}"), {
                        windowOrigin: window.location.origin,
                        merchantId: a.merchantInfo && a.merchantInfo.merchantId || ""
                    }));
                    S({
                        eventType: 15,
                        clientLatencyStartMs: Date.now()
                    });
                    Sc();
                    Q.height = "0";
                    Q.width = "0";
                    Q.style.display = "none";
                    Q.style.visibility = "hidden";
                    Q.setAttribute("allowpaymentrequest", !0);
                    Q.onload = function() {
                        Lc = new Jc;
                        S({
                            eventType: 17,
                            clientLatencyStartMs: Date.now()
                        });
                        S({
                            eventType: 16,
                            clientLatencyStartMs: Date.now()
                        });
                        Tc()
                    }
                    ;
                    document.body ? document.body.appendChild(Q) : document.addEventListener("DOMContentLoaded", function() {
                        document.body.appendChild(Q)
                    })
                }
            }
        )();
        var Uc = function() {}
            , Vc = function(a, b) {
            return new q.Promise(function(c, d) {
                    setTimeout(function() {
                        d({
                            reason: "OTHER_ERROR",
                            intent: a,
                            message: "REQUEST_TIMEOUT"
                        })
                    }, b)
                }
            )
        }
            , Wc = function(a, b) {
            return {
                error: {
                    reason: a.reason || "OTHER_ERROR",
                    intent: a.intent || b,
                    message: a.message
                }
            }
        }
            , Xc = function(a, b, c) {
            C({
                ga: "loadPaymentData",
                errorMessage: "An error occurred in call back, please try to avoid this by setting structured error in callback response"
            });
            a && S({
                eventType: b,
                merchantCallbackInfo: {
                    callbackTrigger: c || 0
                }
            })
        };
        Uc.prototype.Vb = function(a, b) {
            null === b.error && (console.warn("Please remove null fields in callback returns."),
                delete b.error);
            return {
                modifiers: [{
                    supportedMethods: ["https://google.com/pay"],
                    data: b
                }]
            }
        }
        ;
        Uc.prototype.Za = function(a, b) {
            return {
                type: a,
                data: b
            }
        }
        ;
        var Yc = function(a, b, c, d) {
            return q.Promise.resolve(q.Promise.race([Vc("PAYMENT_AUTHORIZATION", c), b.onPaymentAuthorized(a)])).then(function(e) {
                return d("paymentAuthorizationResponse", e)
            }, function(e) {
                Xc("REQUEST_TIMEOUT" === e.message, 27, 2);
                return d("paymentAuthorizationResponse", Wc(e, "PAYMENT_AUTHORIZATION"))
            })
        }
            , Zc = function(a, b, c, d) {
            return q.Promise.resolve(q.Promise.race([Vc(a.callbackTrigger in La ? La[a.callbackTrigger] : "UNKNOWN_INTENT", c), b.onPaymentDataChanged(a)])).then(function(e) {
                return d("paymentDataCallbackResponse", e)
            }, function(e) {
                Xc("REQUEST_TIMEOUT" === e.message, 26, Kc[a.callbackTrigger]);
                return d("paymentDataCallbackResponse", Wc(e, a.callbackTrigger || "UNKNOWN_INTENT"))
            })
        };
        var ad = function() {
            var a = window.document
                , b = this;
            this.Pb = a;
            this.T = a.createElement("gpay-graypane");
            $c(this.T, {
                "z-index": 2147483647,
                display: "none",
                position: "fixed",
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
                "background-color": "rgba(32, 33, 36, .6)"
            });
            this.bb = null;
            this.T.addEventListener("click", function() {
                if (b.bb)
                    try {
                        b.bb.focus()
                    } catch (c) {}
            })
        };
        ad.prototype.show = function(a) {
            this.bb = a || null;
            this.Pb.body.appendChild(this.T);
            $c(this.T, {
                display: "block",
                opacity: 0
            });
            return bd(this.T, {
                opacity: 1
            })
        }
        ;
        var cd = function(a) {
            a.bb = null;
            a.T.parentElement && bd(a.T, {
                opacity: 0
            }).then(function() {
                $c(a.T, {
                    display: "none"
                });
                a.Pb.body.removeChild(a.T)
            })
        };
        function $c(a, b) {
            for (var c in b)
                a.style.setProperty(c, b[c].toString(), "important")
        }
        function bd(a, b) {
            var c = a.ownerDocument.defaultView
                , d = a.style.transition || "";
            return (new q.Promise(function(e) {
                    c.setTimeout(function() {
                        c.setTimeout(e, 300);
                        $c(a, t(Object, "assign").call(Object, {
                            transition: "transform 300ms ease-out, opacity 300ms ease-out"
                        }, b))
                    })
                }
            )).then(function() {
                $c(a, t(Object, "assign").call(Object, {
                    transition: d
                }, b))
            })
        }
        ;var dd = function(a) {
            this.u = a;
            this.sb = this.tb = this.B = this.ha = null;
            this.ka = 3E4
        };
        k = dd.prototype;
        k.xb = function(a) {
            this.B = a
        }
        ;
        k.Ha = function(a) {
            this.ha = a
        }
        ;
        k.F = function(a) {
            var b = ed(a);
            return new q.Promise(function(c) {
                    (void 0 != b.hasEnrolledInstrument ? b.hasEnrolledInstrument() : b.canMakePayment()).then(function(d) {
                        window.sessionStorage.setItem("google.payments.api.storage.isreadytopay.result", d.toString());
                        var e = {
                            result: d
                        };
                        2 <= a.apiVersion && a.existingPaymentMethodRequired && (e.paymentMethodPresent = d);
                        c(e)
                    }).catch(function() {
                        window.sessionStorage.getItem("google.payments.api.storage.isreadytopay.result") ? c({
                            result: "true" == window.sessionStorage.getItem("google.payments.api.storage.isreadytopay.result")
                        }) : c({
                            result: !1
                        })
                    })
                }
            )
        }
        ;
        k.R = function(a) {
            ed(a, this.u, a.transactionInfo.currencyCode, a.transactionInfo.totalPrice)
        }
        ;
        k.V = function(a) {
            fd(this, a)
        }
        ;
        var ed = function(a, b, c, d) {
            var e = {};
            a && (e = JSON.parse(JSON.stringify(a)));
            e.apiVersion || (e.apiVersion = 1);
            e.swg && (e.allowedPaymentMethods = ["CARD"]);
            b && "TEST" == b && (e.environment = b);
            return new PaymentRequest([{
                supportedMethods: ["https://google.com/pay"],
                data: e
            }],{
                total: {
                    label: "Estimated Total Price",
                    amount: {
                        currency: c || "USD",
                        value: d || "0"
                    }
                }
            })
        }
            , fd = function(a, b) {
            b = ed(b, a.u, b.transactionInfo && b.transactionInfo.currencyCode || void 0, b.transactionInfo && b.transactionInfo.totalPrice || void 0);
            b.onpaymentmethodchange = function(c) {
                var d = new Uc;
                d = c.methodDetails.callbackTrigger ? Zc(c.methodDetails, a.B, a.ka, d.Vb) : Yc(c.methodDetails, a.B, a.ka, d.Vb);
                c.updateWith(d)
            }
            ;
            a.ha(b.show().then(function(c) {
                google.payments.api.LogInternally && console.log("payment response", c);
                c.complete("success");
                return c.details.statusCode ? (google.payments.api.LogInternally && console.log("status code", c.details.statusCode),
                    {
                        error: c.details
                    }) : c.details
            }).catch(function(c) {
                google.payments.api.LogInternally && console.log("payment response with err", c);
                c.statusCode = "CANCELED";
                throw c;
            }))
        };
        var gd = ["SHIPPING_ADDRESS", "SHIPPING_OPTION"];
        function hd(a) {
            if (2 <= a.apiVersion) {
                var b = id(a);
                if (b && 1 == b.length && "CRYPTOGRAM_3DS" == b[0])
                    return !0
            }
            return 1 == a.allowedPaymentMethods.length && "TOKENIZED_CARD" == a.allowedPaymentMethods[0]
        }
        function jd(a, b) {
            return 2 <= a.apiVersion && (a = id(a)) && t(a, "includes").call(a, b) ? !0 : !1
        }
        function kd() {
            var a = window.location.hostname
                , b = a.length - 11;
            return 0 <= b && a.indexOf(".google.com", b) == b || void 0 === window.isSecureContext ? null : window.isSecureContext ? null : "Google Pay APIs should be called in secure context!"
        }
        function ld(a) {
            if (a.environment && !(n = t(Object, "values").call(Object, Ma),
                t(n, "includes")).call(n, a.environment))
                throw Error("Parameter environment in PaymentsClientOptions can optionally be set to PRODUCTION, otherwise it defaults to TEST.");
        }
        function md(a) {
            if (!a)
                return "isReadyToPayRequest must be set!";
            if (nd(a))
                return "UPI not supported";
            if (2 <= a.apiVersion) {
                if (!("apiVersionMinor"in a))
                    return "apiVersionMinor must be set!";
                if (!a.allowedPaymentMethods || !Array.isArray(a.allowedPaymentMethods) || 0 == a.allowedPaymentMethods.length)
                    return "for v2 allowedPaymentMethods must be set to an array containing a list of accepted payment methods";
                for (var b = 0; b < a.allowedPaymentMethods.length; b++) {
                    var c = a.allowedPaymentMethods[b];
                    if ("CARD" == c.type) {
                        if (!c.parameters)
                            return "Field parameters must be setup in each allowedPaymentMethod";
                        var d = c.parameters.allowedCardNetworks;
                        if (!d || !Array.isArray(d) || 0 == d.length)
                            return "allowedCardNetworks must be setup in parameters for type CARD";
                        c = c.parameters.allowedAuthMethods;
                        if (!c || !Array.isArray(c) || 0 == c.length || !c.every(od))
                            return "allowedAuthMethods must be setup in parameters for type 'CARD'  and must contain 'CRYPTOGRAM_3DS' and/or 'PAN_ONLY'"
                    }
                }
            } else if (!a.allowedPaymentMethods || !Array.isArray(a.allowedPaymentMethods) || 0 == a.allowedPaymentMethods.length || !a.allowedPaymentMethods.every(pd))
                return "allowedPaymentMethods must be set to an array containing 'CARD' and/or 'TOKENIZED_CARD'!";
            return null
        }
        function pd(a) {
            return (n = t(Object, "values").call(Object, Na),
                t(n, "includes")).call(n, a)
        }
        function od(a) {
            return (n = t(Object, "values").call(Object, Oa),
                t(n, "includes")).call(n, a)
        }
        function qd(a) {
            if (!a)
                return "paymentDataRequest must be set!";
            if (nd(a))
                return "UPI not supported";
            if (a.swg)
                return (a = a.swg) ? a.skuId && a.publicationId ? null : "Both skuId and publicationId must be provided" : "Swg parameters must be provided";
            if (a.transactionInfo)
                if (a.transactionInfo.currencyCode) {
                    if (!a.transactionInfo.totalPriceStatus || !(n = t(Object, "values").call(Object, Pa),
                        t(n, "includes")).call(n, a.transactionInfo.totalPriceStatus))
                        return "totalPriceStatus in transactionInfo must be set to one of NOT_CURRENTLY_KNOWN, ESTIMATED or FINAL!";
                    if ("NOT_CURRENTLY_KNOWN" !== a.transactionInfo.totalPriceStatus && !a.transactionInfo.totalPrice)
                        return "totalPrice in transactionInfo must be set when totalPriceStatus is ESTIMATED or FINAL!"
                } else
                    return "currencyCode in transactionInfo must be set!";
            else
                return "transactionInfo must be set!";
            var b = nd(a);
            if (b) {
                if (!b.parameters)
                    return "parameters must be set in allowedPaymentMethod!";
                b = b.parameters;
                if (b.payeeVpa)
                    if (b.payeeName)
                        if (b.referenceUrl) {
                            if (!b.mcc)
                                return "mcc in allowedPaymentMethod parameters must be set!";
                            if (!b.transactionReferenceId)
                                return "transactionReferenceId in allowedPaymentMethod parameters must be set!"
                        } else
                            return "referenceUrl in allowedPaymentMethod parameters must be set!";
                    else
                        return "payeeName in allowedPaymentMethod parameters must be set!";
                else
                    return "payeeVpa in allowedPaymentMethod parameters must be set!";
                if ("INR" !== a.transactionInfo.currencyCode)
                    return "currencyCode in transactionInfo must be set to INR!";
                if ("FINAL" !== a.transactionInfo.totalPriceStatus)
                    return "totalPriceStatus in transactionInfo must be set to FINAL!";
                if (!a.transactionInfo.transactionNote)
                    return "transactionNote in transactionInfo must be set!"
            }
            return null
        }
        function nd(a) {
            return 2 > a.apiVersion || !a.allowedPaymentMethods ? null : rd(a, "UPI")
        }
        function sd(a, b) {
            if (a.callbackIntents && !b)
                return "paymentDataCallbacks must be set";
            if (t(a.callbackIntents, "includes").call(a.callbackIntents, "PAYMENT_AUTHORIZATION") !== !!b.onPaymentAuthorized)
                return "Both PAYMENT_AUTHORIZATION intent and onPaymentAuthorized must be set";
            var c = gd.slice();
            google.payments.api.EnableOfferCallback && c.push("OFFER");
            google.payments.api.EnablePaymentMethodCallback && c.push("PAYMENT_METHOD");
            return !!c.filter(function(d) {
                return t(a.callbackIntents, "includes").call(a.callbackIntents, d)
            }).length !== !!b.onPaymentDataChanged ? "onPaymentDataChanged callback must be set if any of " + (c + " callback intent is set.") : null
        }
        function id(a) {
            return a.allowedPaymentMethods && (a = rd(a, "CARD")) && a.parameters ? a.parameters.allowedAuthMethods : null
        }
        function rd(a, b) {
            for (var c = 0; c < a.allowedPaymentMethods.length; c++) {
                var d = a.allowedPaymentMethods[c];
                if (d.type == b)
                    return d
            }
            return null
        }
        ;var ud = function(a, b) {
            var c = td.transition;
            if (!c) {
                var d = Qb();
                c = d;
                void 0 === a.style[d] && (d = (Vb ? "Webkit" : Ub ? "Moz" : Tb ? "ms" : null) + Rb(d),
                void 0 !== a.style[d] && (c = d));
                td.transition = c
            }
            c && (a.style[c] = b)
        }
            , td = {};
        var vd = function(a, b) {
            Array.isArray(b) || (b = [b]);
            x(0 < b.length, "At least one Css3Property should be specified.");
            b = b.map(function(c) {
                if ("string" === typeof c)
                    return c;
                Ia(c, "Expected css3 property to be an object.");
                var d = c.Cc + " " + c.duration + "s " + c.timing + " " + c.delay + "s";
                x(c.Cc && "number" === typeof c.duration && c.timing && "number" === typeof c.delay, "Unexpected css3 property value: %s", d);
                return d
            });
            ud(a, b.join(","))
        };
        var wd = function() {
            this.Wa = this.Wa;
            this.ab = this.ab
        };
        wd.prototype.Wa = !1;
        wd.prototype.dispose = function() {
            this.Wa || (this.Wa = !0,
                this.za())
        }
        ;
        wd.prototype.za = function() {
            if (this.ab)
                for (; this.ab.length; )
                    this.ab.shift()()
        }
        ;
        var xd = function(a, b) {
            this.type = a;
            this.currentTarget = this.target = b;
            this.defaultPrevented = this.Ka = !1
        };
        xd.prototype.stopPropagation = function() {
            this.Ka = !0
        }
        ;
        xd.prototype.preventDefault = function() {
            this.defaultPrevented = !0
        }
        ;
        var yd = Object.freeze || function(a) {
                return a
            }
        ;
        var zd = function() {
            if (!v.addEventListener || !Object.defineProperty)
                return !1;
            var a = !1
                , b = Object.defineProperty({}, "passive", {
                get: function() {
                    a = !0
                }
            });
            try {
                v.addEventListener("test", ua, b),
                    v.removeEventListener("test", ua, b)
            } catch (c) {}
            return a
        }();
        var Bd = function(a, b) {
            xd.call(this, a ? a.type : "");
            this.relatedTarget = this.currentTarget = this.target = null;
            this.button = this.screenY = this.screenX = this.clientY = this.clientX = this.offsetY = this.offsetX = 0;
            this.key = "";
            this.charCode = this.keyCode = 0;
            this.metaKey = this.shiftKey = this.altKey = this.ctrlKey = !1;
            this.state = null;
            this.pointerId = 0;
            this.pointerType = "";
            this.Aa = null;
            if (a) {
                var c = this.type = a.type
                    , d = a.changedTouches && a.changedTouches.length ? a.changedTouches[0] : null;
                this.target = a.target || a.srcElement;
                this.currentTarget = b;
                if (b = a.relatedTarget) {
                    if (Ub) {
                        a: {
                            try {
                                Sb(b.nodeName);
                                var e = !0;
                                break a
                            } catch (f) {}
                            e = !1
                        }
                        e || (b = null)
                    }
                } else
                    "mouseover" == c ? b = a.fromElement : "mouseout" == c && (b = a.toElement);
                this.relatedTarget = b;
                d ? (this.clientX = void 0 !== d.clientX ? d.clientX : d.pageX,
                    this.clientY = void 0 !== d.clientY ? d.clientY : d.pageY,
                    this.screenX = d.screenX || 0,
                    this.screenY = d.screenY || 0) : (this.offsetX = Vb || void 0 !== a.offsetX ? a.offsetX : a.layerX,
                    this.offsetY = Vb || void 0 !== a.offsetY ? a.offsetY : a.layerY,
                    this.clientX = void 0 !== a.clientX ? a.clientX : a.pageX,
                    this.clientY = void 0 !== a.clientY ? a.clientY : a.pageY,
                    this.screenX = a.screenX || 0,
                    this.screenY = a.screenY || 0);
                this.button = a.button;
                this.keyCode = a.keyCode || 0;
                this.key = a.key || "";
                this.charCode = a.charCode || ("keypress" == c ? a.keyCode : 0);
                this.ctrlKey = a.ctrlKey;
                this.altKey = a.altKey;
                this.shiftKey = a.shiftKey;
                this.metaKey = a.metaKey;
                this.pointerId = a.pointerId || 0;
                this.pointerType = "string" === typeof a.pointerType ? a.pointerType : Ad[a.pointerType] || "";
                this.state = a.state;
                this.Aa = a;
                a.defaultPrevented && Bd.ua.preventDefault.call(this)
            }
        };
        Aa(Bd, xd);
        var Ad = yd({
            2: "touch",
            3: "pen",
            4: "mouse"
        });
        Bd.prototype.stopPropagation = function() {
            Bd.ua.stopPropagation.call(this);
            this.Aa.stopPropagation ? this.Aa.stopPropagation() : this.Aa.cancelBubble = !0
        }
        ;
        Bd.prototype.preventDefault = function() {
            Bd.ua.preventDefault.call(this);
            var a = this.Aa;
            a.preventDefault ? a.preventDefault() : a.returnValue = !1
        }
        ;
        var Cd = "closure_listenable_" + (1E6 * Math.random() | 0);
        var Dd = 0;
        var Ed = function(a, b, c, d, e) {
            this.listener = a;
            this.cb = null;
            this.src = b;
            this.type = c;
            this.capture = !!d;
            this.Xa = e;
            this.key = ++Dd;
            this.La = this.Ua = !1
        }
            , Fd = function(a) {
            a.La = !0;
            a.listener = null;
            a.cb = null;
            a.src = null;
            a.Xa = null
        };
        var Gd = function(a) {
            this.src = a;
            this.v = {};
            this.Pa = 0
        };
        Gd.prototype.add = function(a, b, c, d, e) {
            var f = a.toString();
            a = this.v[f];
            a || (a = this.v[f] = [],
                this.Pa++);
            var g = Hd(a, b, d, e);
            -1 < g ? (b = a[g],
            c || (b.Ua = !1)) : (b = new Ed(b,this.src,f,!!d,e),
                b.Ua = c,
                a.push(b));
            return b
        }
        ;
        Gd.prototype.remove = function(a, b, c, d) {
            a = a.toString();
            if (!(a in this.v))
                return !1;
            var e = this.v[a];
            b = Hd(e, b, c, d);
            return -1 < b ? (Fd(e[b]),
                x(null != e.length),
                Array.prototype.splice.call(e, b, 1),
            0 == e.length && (delete this.v[a],
                this.Pa--),
                !0) : !1
        }
        ;
        var Id = function(a, b) {
            var c = b.type;
            if (c in a.v) {
                var d = a.v[c], e = db(d, b), f;
                if (f = 0 <= e)
                    x(null != d.length),
                        Array.prototype.splice.call(d, e, 1);
                f && (Fd(b),
                0 == a.v[c].length && (delete a.v[c],
                    a.Pa--))
            }
        };
        Gd.prototype.mb = function(a, b, c, d) {
            a = this.v[a.toString()];
            var e = -1;
            a && (e = Hd(a, b, c, d));
            return -1 < e ? a[e] : null
        }
        ;
        Gd.prototype.hasListener = function(a, b) {
            var c = void 0 !== a
                , d = c ? a.toString() : ""
                , e = void 0 !== b;
            return nb(this.v, function(f) {
                for (var g = 0; g < f.length; ++g)
                    if (!(c && f[g].type != d || e && f[g].capture != b))
                        return !0;
                return !1
            })
        }
        ;
        var Hd = function(a, b, c, d) {
            for (var e = 0; e < a.length; ++e) {
                var f = a[e];
                if (!f.La && f.listener == b && f.capture == !!c && f.Xa == d)
                    return e
            }
            return -1
        };
        var Jd = "closure_lm_" + (1E6 * Math.random() | 0)
            , Kd = {}
            , Ld = 0
            , Nd = function(a, b, c, d, e) {
            if (d && d.once)
                Md(a, b, c, d, e);
            else if (Array.isArray(b))
                for (var f = 0; f < b.length; f++)
                    Nd(a, b[f], c, d, e);
            else
                c = Od(c),
                    a && a[Cd] ? (d = wa(d) ? !!d.capture : !!d,
                        Pd(a),
                        a.K.add(String(b), c, !1, d, e)) : Qd(a, b, c, !1, d, e)
        }
            , Qd = function(a, b, c, d, e, f) {
            if (!b)
                throw Error("Invalid event type");
            var g = wa(e) ? !!e.capture : !!e
                , h = Rd(a);
            h || (a[Jd] = h = new Gd(a));
            c = h.add(b, c, d, g, f);
            if (!c.cb) {
                d = Sd();
                c.cb = d;
                d.src = a;
                d.listener = c;
                if (a.addEventListener)
                    zd || (e = g),
                    void 0 === e && (e = !1),
                        a.addEventListener(b.toString(), d, e);
                else if (a.attachEvent)
                    a.attachEvent(Td(b.toString()), d);
                else if (a.addListener && a.removeListener)
                    x("change" === b, "MediaQueryList only has a change event"),
                        a.addListener(d);
                else
                    throw Error("addEventListener and attachEvent are unavailable.");
                Ld++
            }
        }
            , Sd = function() {
            var a = Ud
                , b = function(c) {
                return a.call(b.src, b.listener, c)
            };
            return b
        }
            , Md = function(a, b, c, d, e) {
            if (Array.isArray(b))
                for (var f = 0; f < b.length; f++)
                    Md(a, b[f], c, d, e);
            else
                c = Od(c),
                    a && a[Cd] ? a.K.add(String(b), c, !0, wa(d) ? !!d.capture : !!d, e) : Qd(a, b, c, !0, d, e)
        }
            , Vd = function(a, b, c, d, e) {
            if (Array.isArray(b))
                for (var f = 0; f < b.length; f++)
                    Vd(a, b[f], c, d, e);
            else
                d = wa(d) ? !!d.capture : !!d,
                    c = Od(c),
                    a && a[Cd] ? a.K.remove(String(b), c, d, e) : a && (a = Rd(a)) && (b = a.mb(b, c, d, e)) && Wd(b)
        }
            , Wd = function(a) {
            if ("number" !== typeof a && a && !a.La) {
                var b = a.src;
                if (b && b[Cd])
                    Id(b.K, a);
                else {
                    var c = a.type
                        , d = a.cb;
                    b.removeEventListener ? b.removeEventListener(c, d, a.capture) : b.detachEvent ? b.detachEvent(Td(c), d) : b.addListener && b.removeListener && b.removeListener(d);
                    Ld--;
                    (c = Rd(b)) ? (Id(c, a),
                    0 == c.Pa && (c.src = null,
                        b[Jd] = null)) : Fd(a)
                }
            }
        }
            , Td = function(a) {
            return a in Kd ? Kd[a] : Kd[a] = "on" + a
        }
            , Ud = function(a, b) {
            if (a.La)
                a = !0;
            else {
                b = new Bd(b,this);
                var c = a.listener
                    , d = a.Xa || a.src;
                a.Ua && Wd(a);
                a = c.call(d, b)
            }
            return a
        }
            , Rd = function(a) {
            a = a[Jd];
            return a instanceof Gd ? a : null
        }
            , Xd = "__closure_events_fn_" + (1E9 * Math.random() >>> 0)
            , Od = function(a) {
            x(a, "Listener can not be null.");
            if ("function" === typeof a)
                return a;
            x(a.handleEvent, "An object listener must have handleEvent method.");
            a[Xd] || (a[Xd] = function(b) {
                    return a.handleEvent(b)
                }
            );
            return a[Xd]
        };
        var U = function() {
            wd.call(this);
            this.K = new Gd(this);
            this.jc = this;
            this.rb = null
        };
        Aa(U, wd);
        U.prototype[Cd] = !0;
        U.prototype.addEventListener = function(a, b, c, d) {
            Nd(this, a, b, c, d)
        }
        ;
        U.prototype.removeEventListener = function(a, b, c, d) {
            Vd(this, a, b, c, d)
        }
        ;
        U.prototype.dispatchEvent = function(a) {
            Pd(this);
            var b = this.rb;
            if (b) {
                var c = [];
                for (var d = 1; b; b = b.rb)
                    c.push(b),
                        x(1E3 > ++d, "infinite loop")
            }
            b = this.jc;
            d = a.type || a;
            if ("string" === typeof a)
                a = new xd(a,b);
            else if (a instanceof xd)
                a.target = a.target || b;
            else {
                var e = a;
                a = new xd(d,b);
                pb(a, e)
            }
            e = !0;
            if (c)
                for (var f = c.length - 1; !a.Ka && 0 <= f; f--) {
                    var g = a.currentTarget = c[f];
                    e = Yd(g, d, !0, a) && e
                }
            a.Ka || (g = a.currentTarget = b,
                e = Yd(g, d, !0, a) && e,
            a.Ka || (e = Yd(g, d, !1, a) && e));
            if (c)
                for (f = 0; !a.Ka && f < c.length; f++)
                    g = a.currentTarget = c[f],
                        e = Yd(g, d, !1, a) && e;
            return e
        }
        ;
        U.prototype.za = function() {
            U.ua.za.call(this);
            if (this.K) {
                var a = this.K, b = 0, c;
                for (c in a.v) {
                    for (var d = a.v[c], e = 0; e < d.length; e++)
                        ++b,
                            Fd(d[e]);
                    delete a.v[c];
                    a.Pa--
                }
            }
            this.rb = null
        }
        ;
        var Yd = function(a, b, c, d) {
            b = a.K.v[String(b)];
            if (!b)
                return !0;
            b = b.concat();
            for (var e = !0, f = 0; f < b.length; ++f) {
                var g = b[f];
                if (g && !g.La && g.capture == c) {
                    var h = g.listener
                        , l = g.Xa || g.src;
                    g.Ua && Id(a.K, g);
                    e = !1 !== h.call(l, d) && e
                }
            }
            return e && !d.defaultPrevented
        };
        U.prototype.mb = function(a, b, c, d) {
            return this.K.mb(String(a), b, c, d)
        }
        ;
        U.prototype.hasListener = function(a, b) {
            return this.K.hasListener(void 0 !== a ? String(a) : void 0, b)
        }
        ;
        var Pd = function(a) {
            x(a.K, "Event target is not initialized. Did you call the superclass (goog.events.EventTarget) constructor?")
        };
        var Zd = function(a, b) {
            U.call(this);
            this.Ya = a || 1;
            this.Oa = b || v;
            this.Mb = za(this.Mc, this);
            this.Tb = Date.now()
        };
        Aa(Zd, U);
        k = Zd.prototype;
        k.enabled = !1;
        k.M = null;
        k.setInterval = function(a) {
            this.Ya = a;
            this.M && this.enabled ? (this.stop(),
                this.start()) : this.M && this.stop()
        }
        ;
        k.Mc = function() {
            if (this.enabled) {
                var a = Date.now() - this.Tb;
                0 < a && a < .8 * this.Ya ? this.M = this.Oa.setTimeout(this.Mb, this.Ya - a) : (this.M && (this.Oa.clearTimeout(this.M),
                    this.M = null),
                    this.dispatchEvent("tick"),
                this.enabled && (this.stop(),
                    this.start()))
            }
        }
        ;
        k.start = function() {
            this.enabled = !0;
            this.M || (this.M = this.Oa.setTimeout(this.Mb, this.Ya),
                this.Tb = Date.now())
        }
        ;
        k.stop = function() {
            this.enabled = !1;
            this.M && (this.Oa.clearTimeout(this.M),
                this.M = null)
        }
        ;
        k.za = function() {
            Zd.ua.za.call(this);
            this.stop();
            delete this.Oa
        }
        ;
        /*

 Copyright 2017 The Web Activities Authors. All Rights Reserved.

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS-IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
*/
        var $d = function(a, b, c, d, e, f) {
            this.code = a;
            this.data = "ok" == a ? b : null;
            this.mode = c;
            this.origin = d;
            this.qb = e;
            this.Ic = f;
            this.ok = "ok" == a;
            this.error = "failed" == a ? Error(String(b) || "") : null
        };
        function ae(a) {
            var b = a.indexOf("#");
            return -1 == b ? a : a.substring(0, b)
        }
        function be(a) {
            return a ? (/^[?#]/.test(a) ? a.slice(1) : a).split("&").reduce(function(b, c) {
                var d = c.split("=");
                c = decodeURIComponent(d[0] || "");
                d = decodeURIComponent(d[1] || "");
                c && (b[c] = d);
                return b
            }, {}) : {}
        }
        function ce(a) {
            var b = {
                requestId: a.requestId,
                returnUrl: a.bc,
                args: a.kc
            };
            void 0 !== a.origin && (b.origin = a.origin);
            void 0 !== a.qb && (b.originVerified = a.qb);
            return JSON.stringify(b)
        }
        function de(a, b, c) {
            if (b.ok)
                c(b);
            else {
                var d;
                if (!(d = b.error)) {
                    d = null;
                    if ("function" == typeof a.DOMException) {
                        a = a.DOMException;
                        try {
                            d = new a("AbortError","AbortError")
                        } catch (e) {}
                    }
                    d || (d = Error("AbortError"),
                        d.name = "AbortError",
                        d.code = 20)
                }
                a = d;
                a.vd = b;
                c(q.Promise.reject(a))
            }
        }
        function ee(a) {
            a = a.navigator;
            return /Trident|MSIE|IEMobile/i.test(a && a.userAgent)
        }
        function fe(a) {
            setTimeout(function() {
                throw a;
            })
        }
        var V = function(a, b, c) {
            this.g = a;
            this.Eb = b;
            this.C = c;
            this.Ec = !0;
            this.Fb = null;
            this.Hb = !1;
            this.Y = this.$a = this.$ = this.h = null;
            this.Lb = this.tc.bind(this)
        };
        V.prototype.connect = function(a) {
            if (this.$)
                throw Error("already connected");
            this.$ = a;
            this.g.addEventListener("message", this.Lb)
        }
        ;
        V.prototype.disconnect = function() {
            if (this.$ && (this.$ = null,
            this.h && (ge(this.h),
                this.h = null),
                this.g.removeEventListener("message", this.Lb),
                this.Y)) {
                for (var a in this.Y) {
                    var b = this.Y[a];
                    b.port1 && ge(b.port1);
                    b.port2 && ge(b.port2)
                }
                this.Y = null
            }
        }
        ;
        V.prototype.isConnected = function() {
            return null != this.C
        }
        ;
        var he = function(a) {
            a.$ && !a.Fb && (a.Fb = "function" == typeof a.Eb ? a.Eb() : a.Eb);
            return a.Fb
        }
            , ie = function(a) {
            if (null == a.C)
                throw Error("not connected");
            return a.C
        }
            , le = function(a, b) {
            var c = null;
            a.Hb && "function" == typeof a.g.MessageChannel && (c = new a.g.MessageChannel);
            c ? (je(a, "start", b, [c.port2]),
                ke(a, c.port1)) : je(a, "start", b)
        }
            , je = function(a, b, c, d) {
            c = {
                sentinel: "__ACTIVITIES__",
                cmd: b,
                payload: c || null
            };
            if (a.h)
                a.h.postMessage(c, d || void 0);
            else {
                var e = he(a);
                if (!e)
                    throw Error("not connected");
                a = "connect" == b ? null != a.C ? a.C : "*" : ie(a);
                e.postMessage(c, a, d || void 0)
            }
        };
        V.prototype.customMessage = function(a) {
            je(this, "msg", a)
        }
        ;
        var me = function(a, b) {
            a.Y || (a.Y = {});
            var c = a.Y[b];
            if (!c) {
                var d;
                c = new q.Promise(function(e) {
                        d = e
                    }
                );
                c = {
                    port1: null,
                    port2: null,
                    ac: d,
                    promise: c
                };
                a.Y[b] = c
            }
            return c
        }
            , ke = function(a, b) {
            a.h && ge(a.h);
            a.h = b;
            a.h.onmessage = function(c) {
                var d = c.data
                    , e = d && d.cmd;
                d = d && d.payload || null;
                e && a.qa(e, d, c)
            }
        };
        V.prototype.tc = function(a) {
            if (!this.Ec || he(this) == a.source) {
                var b = a.data;
                if (b && "__ACTIVITIES__" == b.sentinel) {
                    var c = b.cmd;
                    if (!this.h || "connect" == c || "start" == c) {
                        var d = a.origin;
                        b = b.payload || null;
                        null == this.C && "start" == c && (this.C = d);
                        null == this.C && a.source && he(this) == a.source && (this.C = d);
                        d == this.C && this.qa(c, b, a)
                    }
                }
            }
        }
        ;
        V.prototype.qa = function(a, b, c) {
            "connect" == a ? (this.h && (ge(this.h),
                this.h = null),
                this.Hb = b && b.acceptsChannel || !1,
                this.$(a, b)) : "start" == a ? ((c = c.ports && c.ports[0]) && ke(this, c),
                this.$(a, b)) : "msg" == a ? null != this.$a && null != b && this.$a(b) : "cnget" == a ? (b = b.name || "",
                a = me(this, b),
            a.port1 || (c = new this.g.MessageChannel,
                a.port1 = c.port1,
                a.port2 = c.port2,
                a.ac(a.port1)),
            a.port2 && (je(this, "cnset", {
                name: b
            }, [a.port2]),
                a.port2 = null)) : "cnset" == a ? (a = c.ports[0],
                b = me(this, b.name),
                b.port1 = a,
                b.ac(a)) : this.$(a, b)
        }
        ;
        function ge(a) {
            try {
                a.close()
            } catch (b) {}
        }
        var ne = function(a, b, c) {
            var d = this;
            this.Da = a;
            this.gb = b;
            this.Sa = c || null;
            this.g = this.Da.ownerDocument.defaultView;
            this.C = ic(ub(b).toString());
            this.xa = null;
            this.jb = new q.Promise(function(e) {
                    d.xa = e
                }
            );
            this.eb = null;
            new q.Promise(function(e) {
                    d.eb = e
                }
            );
            this.J = null;
            this.fb = new q.Promise(function(e) {
                    d.J = e
                }
            );
            this.$b = this.Wb = null;
            this.m = new V(this.g,function() {
                    return d.Da.contentWindow
                }
                ,this.C)
        };
        k = ne.prototype;
        k.connect = function() {
            var a = this.Da;
            if ("isConnected"in a)
                a = a.isConnected;
            else {
                var b = a.ownerDocument && a.ownerDocument.documentElement;
                a = b && b.contains(a) || !1
            }
            if (!a)
                throw Error("iframe must be in DOM");
            this.m.connect(this.qa.bind(this));
            Ob(this.Da, this.gb);
            return this.jb
        }
        ;
        k.disconnect = function() {
            this.m.disconnect()
        }
        ;
        k.Ra = function() {
            return this.fb
        }
        ;
        k.nb = function() {
            return this.Da.contentWindow || null
        }
        ;
        k.message = function(a) {
            this.m.customMessage(a)
        }
        ;
        k.onMessage = function(a) {
            this.m.$a = a
        }
        ;
        k.qa = function(a, b) {
            "connect" == a ? (le(this.m, this.Sa),
                this.xa()) : "result" == a ? this.J && (a = b.code,
                b = new $d(a,"failed" == a ? Error(b.data || "") : b.data,"iframe",ie(this.m),!0,!0),
                de(this.g, b, this.J),
                this.J = null,
                je(this.m, "close"),
                this.disconnect()) : "ready" == a ? this.eb && (this.eb(),
                this.eb = null) : "resize" == a && (this.$b = b.height,
            this.Wb && this.Wb(this.$b))
        }
        ;
        var oe = function(a, b, c, d, e, f) {
            var g = this
                , h = d && A(d);
            if (!h || "_blank" != h && "_top" != h && "_" == h[0])
                throw Error('The only allowed targets are "_blank", "_top" and name targets');
            this.g = a;
            this.Dc = b;
            this.gb = c;
            this.Ac = d;
            this.Sa = e || null;
            this.ia = f || {};
            this.xa = null;
            this.jb = new q.Promise(function(l) {
                    g.xa = l
                }
            );
            this.J = null;
            this.fb = new q.Promise(function(l) {
                    g.J = l
                }
            );
            this.m = this.U = this.ea = null
        };
        k = oe.prototype;
        k.open = function() {
            return pe(this)
        }
        ;
        k.disconnect = function() {
            this.U && (this.U.stop(),
                this.U = null);
            this.m && (this.m.disconnect(),
                this.m = null);
            if (this.ea) {
                try {
                    this.ea.close()
                } catch (a) {}
                this.ea = null
            }
            this.J = null
        }
        ;
        k.nb = function() {
            return this.ea
        }
        ;
        k.Ra = function() {
            return this.fb
        }
        ;
        k.message = function(a) {
            this.m.customMessage(a)
        }
        ;
        k.onMessage = function(a) {
            this.m.$a = a
        }
        ;
        var pe = function(a) {
            var b = qe(a)
                , c = a.gb;
            if (!a.ia.yd) {
                var d = ce({
                    requestId: a.Dc,
                    bc: a.ia.bc || ae(a.g.location.href),
                    kc: a.Sa
                });
                c = c + (-1 == c.indexOf("#") ? "#" : "&") + encodeURIComponent("__WA__") + "=" + encodeURIComponent(d)
            }
            d = a.Ac;
            "_top" != A(d) && ee(a.g) && (d = B("_top"));
            try {
                var e = Pb(c, a.g, d, b)
            } catch (f) {}
            if (!e && "_top" != A(d) && !a.ia.xd) {
                d = B("_top");
                try {
                    e = Pb(c, a.g, d)
                } catch (f) {}
            }
            e ? (a.ea = e,
            "_top" != A(d) && re(a)) : se(a, Error("failed to open window"));
            return a.fb.catch(function() {})
        }
            , qe = function(a) {
            var b = a.g.screen
                , c = b.availWidth || b.width
                , d = b.availHeight || b.height
                , e = a.g == a.g.top;
            var f = a.g.navigator;
            f = /Edge/i.test(f && f.userAgent);
            c = Math.max(c - (e && a.g.outerWidth > a.g.innerWidth ? Math.min(100, a.g.outerWidth - a.g.innerWidth) : f ? 100 : 0), .5 * c);
            var g = Math.max(d - (e && a.g.outerHeight > a.g.innerHeight ? Math.min(100, a.g.outerHeight - a.g.innerHeight) : f ? 100 : 0), .5 * d);
            d = Math.floor(Math.min(600, .9 * c));
            e = Math.floor(Math.min(600, .9 * g));
            a.ia.width && (d = Math.min(a.ia.width, c));
            a.ia.height && (e = Math.min(a.ia.height, g));
            a = Math.floor((b.width - d) / 2);
            b = Math.floor((b.height - e) / 2);
            c = {
                height: e,
                width: d,
                resizable: "yes",
                scrollbars: "yes"
            };
            f || (c.left = a,
                c.top = b);
            f = "";
            for (var h in c)
                f && (f += ","),
                    f += h + "=" + c[h];
            return f
        }
            , re = function(a) {
            a.U = new Zd(500);
            a.U.addEventListener("tick", function() {
                te(a, !0)
            });
            a.U.start();
            a.m = new V(a.g,a.ea,null);
            a.m.connect(a.qa.bind(a))
        }
            , te = function(a, b) {
            if (!a.ea || a.ea.closed)
                a.U && (a.U.stop(),
                    a.U = null),
                    a.g.setTimeout(function() {
                        try {
                            a.aa("canceled", null)
                        } catch (c) {
                            se(a, c)
                        }
                    }, b ? 3E3 : 0)
        }
            , se = function(a, b) {
            a.J && a.J(q.Promise.reject(b));
            a.disconnect()
        };
        oe.prototype.aa = function(a, b) {
            if (this.J) {
                var c = this.m.isConnected();
                a = new $d(a,b,"popup",c ? ie(this.m) : ic(this.gb),c,c);
                de(this.g, a, this.J);
                this.J = null
            }
            this.m && je(this.m, "close");
            this.disconnect()
        }
        ;
        oe.prototype.qa = function(a, b) {
            var c = this;
            "connect" == a ? (le(this.m, this.Sa),
                this.xa()) : "result" == a ? (a = b.code,
                this.aa(a, "failed" == a ? Error(b.data || "") : b.data)) : "check" == a && this.g.setTimeout(function() {
                return te(c)
            }, 200)
        }
        ;
        var ue = function(a, b, c, d, e) {
            this.g = a;
            this.oc = b;
            this.pc = c;
            this.C = d;
            this.Lc = e
        };
        ue.prototype.Ra = function() {
            var a = this
                , b = new $d(this.oc,this.pc,"redirect",this.C,this.Lc,!1);
            return new q.Promise(function(c) {
                    de(a.g, b, c)
                }
            )
        }
        ;
        var ve = function() {
            var a = window
                , b = this;
            this.version = "1.23";
            this.g = a;
            this.N = a.location.hash;
            this.zb = {};
            this.Ab = {};
            this.Yb = null;
            new q.Promise(function(c) {
                    b.Yb = c
                }
            )
        }
            , we = function(a, b, c) {
            var d = new ne(a,b,c);
            return d.connect().then(function() {
                return d
            })
        };
        ve.prototype.open = function(a, b, c, d, e) {
            return {
                zd: xe(this, a, b, c, d, e).nb()
            }
        }
        ;
        var ye = function(a, b, c, d, e) {
            var f = xe(a, "GPAY", b, c, d, e);
            return f.jb.then(function() {
                return f
            })
        };
        ve.prototype.Ha = function(a, b) {
            var c = this.zb[a];
            c || (c = [],
                this.zb[a] = c);
            c.push(b);
            c = this.Ab[a];
            if (!c && this.N) {
                try {
                    var d = this.g
                        , e = be(this.N).__WA_RES__;
                    if (e) {
                        var f = JSON.parse(e);
                        if (f && f.requestId == a) {
                            var g = d.location.hash;
                            if (g) {
                                var h = encodeURIComponent("__WA_RES__") + "=";
                                e = -1;
                                do
                                    if (e = g.indexOf(h, e),
                                    -1 != e) {
                                        var l = 0 < e ? g.substring(e - 1, e) : "";
                                        if ("" == l || "?" == l || "#" == l || "&" == l) {
                                            var m = g.indexOf("&", e + 1);
                                            -1 == m && (m = g.length);
                                            g = g.substring(0, e) + g.substring(m + 1)
                                        } else
                                            e++
                                    }
                                while (-1 != e && e < g.length)
                            }
                            var r = g;
                            r = r || "";
                            if (r != d.location.hash && d.history && d.history.replaceState)
                                try {
                                    d.history.replaceState(d.history.state, "", r)
                                } catch (T) {}
                            var K = f.code
                                , y = f.data
                                , H = f.origin
                                , la = d.document.referrer && ic(d.document.referrer);
                            c = new ue(d,K,y,H,H == la)
                        } else
                            c = null
                    } else
                        c = null
                } catch (T) {
                    fe(T),
                        this.Yb(T)
                }
                c && (this.Ab[a] = c)
            }
            (a = c) && ze(a, b)
        }
        ;
        var xe = function(a, b, c, d, e, f) {
            var g = new oe(a.g,b,c,d,e,f);
            g.open().then(function() {
                Ae(a, b, g)
            });
            return g
        }
            , ze = function(a, b) {
            q.Promise.resolve().then(function() {
                b(a)
            })
        }
            , Ae = function(a, b, c) {
            var d = a.zb[b];
            d && d.forEach(function(e) {
                ze(c, e)
            });
            a.Ab[b] = c
        };
        var W = function(a, b, c, d) {
            this.u = a;
            this.hb = b || !1;
            this.Ib = c || new ve;
            this.Rb = new ad;
            this.Ja = this.ha = null;
            this.Cb = !1;
            this.Ob = this.h = null;
            this.Zb = d || null;
            this.sb = this.tb = this.B = this.Ma = null;
            this.ka = 3E4;
            this.hb && (Ya("\n.google-payments-dialog {\n    animation: none 0s ease 0s 1 normal none running;\n    background: none 0 0 / auto repeat scroll padding-box border-box #fff;\n    background-blend-mode: normal;\n    border: 0 none #333;\n    border-radius: 8px 8px 0 0;\n    border-collapse: separate;\n    bottom: 0;\n    box-shadow: #808080 0 3px 0 0, #808080 0 0 22px;\n    box-sizing: border-box;\n    letter-spacing: normal;\n    max-height: 100%;\n    overflow: visible;\n    position: fixed;\n    width: 100%;\n    z-index: 2147483647;\n    -webkit-appearance: none;\n    left: 0;\n}\n@media (min-width: 480px) {\n  .google-payments-dialog {\n    width: 480px !important;\n    left: -240px !important;\n    margin-left: calc(100vw - 100vw / 2) !important;\n  }\n}\n.google-payments-dialogContainer {\n  background-color: rgba(0,0,0,0.26);\n  bottom: 0;\n  height: 100%;\n  left: 0;\n  position: absolute;\n  right: 0;\n}\n.iframeContainer {\n  -webkit-overflow-scrolling: touch;\n}\n"),
                Ya("\n.google-payments-dialogCenter {\n  animation: none 0s ease 0s 1 normal none running;\n  background-blend-mode: normal;\n  background: none 0 0 / auto repeat scroll padding-box border-box #fff;\n  border-collapse: separate;\n  border-radius: 8px;\n  border: 0px none #333;\n  bottom: auto;\n  box-shadow: #808080 0 0 22px;\n  box-sizing: border-box;\n  left: -240px;\n  letter-spacing: normal;\n  margin-left: calc(100vw - 100vw / 2) !important;\n  max-height: 90%;\n  overflow: visible;\n  position: absolute;\n  top: 100%;\n  transform: scale(0.8);\n  width: 480px;\n  z-index: 2147483647;\n  -webkit-appearance: none;\n}\n@media (min-height: 667px) {\n  .google-payments-dialogCenter {\n    max-height: 600px;\n  }\n}\n.google-payments-activeContainer {\n  top: 50%;\n  transform: scale(1.0) translateY(-50%);\n}\n"))
        };
        W.prototype.Ha = function(a) {
            this.ha || (this.ha = a,
                this.Ib.Ha("GPAY", this.zc.bind(this)))
        }
        ;
        W.prototype.zc = function(a) {
            var b = this;
            cd(this.Rb);
            this.ha(a.Ra().then(function(c) {
                if ("TIN" != b.u && c.origin != Be(b))
                    throw Error("channel mismatch");
                var d = c.data;
                if (d.redirectEncryptedCallbackData)
                    return Oc = 3,
                        Ce(b, d.redirectEncryptedCallbackData).then(function(e) {
                            var f = t(Object, "assign").call(Object, {}, d);
                            delete f.redirectEncryptedCallbackData;
                            return t(Object, "assign").call(Object, f, e)
                        });
                if (!c.qb || !c.Ic)
                    throw Error("channel mismatch");
                return d
            }, function(c) {
                var d = c.message;
                c = c.message;
                try {
                    c = JSON.parse(d.substring(7))
                } catch (e) {}
                c.statusCode && -1 == ["DEVELOPER_ERROR", "MERCHANT_ACCOUNT_ERROR"].indexOf(c.statusCode) && (c = {
                    statusCode: "CANCELED"
                });
                "AbortError" == c && (c = {
                    statusCode: "CANCELED"
                });
                return q.Promise.reject(c)
            }))
        }
        ;
        var Ce = function(a, b) {
            return new q.Promise(function(c, d) {
                    var e = De(a)
                        , f = new XMLHttpRequest;
                    f.open("POST", e, !0);
                    "withCredentials"in f && (f.withCredentials = !0);
                    f.onreadystatechange = function() {
                        if (!(2 > f.readyState))
                            if (100 > f.status || 599 < f.status)
                                f.onreadystatechange = null,
                                    d(Error("Unknown HTTP status " + f.status));
                            else if (4 == f.readyState)
                                try {
                                    c(JSON.parse(f.responseText))
                                } catch (g) {
                                    d(g)
                                }
                    }
                    ;
                    f.onerror = function() {
                        d(Error("Network failure"))
                    }
                    ;
                    f.onabort = function() {
                        d(Error("Request aborted"))
                    }
                    ;
                    f.send(b)
                }
            )
        };
        W.prototype.F = function(a) {
            var b = this;
            return new q.Promise(function(c, d) {
                    if (hd(a))
                        c({
                            result: !1
                        });
                    else {
                        var e = window.navigator.userAgent
                            , f = 0 < e.indexOf("OPA/") && 0 < e.indexOf("AppleWebKit")
                            , g = 0 < e.indexOf("FxiOS")
                            , h = 0 < e.indexOf("Instagram")
                            , l = 0 < e.indexOf("FB_IAB")
                            , m = 0 < e.indexOf("AndroidMapsWebView");
                        if ((0 < e.indexOf("GSA/") && 0 < e.indexOf("Safari") || f || g || h || l || m) && !b.hb)
                            c({
                                result: !1
                            });
                        else {
                            g = !1;
                            if (google.payments.api.ReadyToPayAdditionalBrowsers) {
                                if (0 < e.indexOf("UCMini")) {
                                    c({
                                        result: !1
                                    });
                                    return
                                }
                                g = 0 < e.indexOf("OPT") || 0 < e.indexOf("UCBrowser")
                            }
                            var r = 0 < e.indexOf("Chrome") || 0 < e.indexOf("Firefox") || 0 < e.indexOf("Safari") || g || f;
                            r && 2 <= a.apiVersion && a.existingPaymentMethodRequired ? (a.environment = b.u,
                                Rc(a, 6, ["isReadyToPayResponse", "isReadyToPayError"], function(K) {
                                    var y = {
                                        result: r
                                    };
                                    a.existingPaymentMethodRequired && (K.data.isReadyToPayError ? d({
                                        statusCode: "DEVELOPER_ERROR",
                                        statusMessage: "Ready to pay error. Cause : " + K.data.isReadyToPayError
                                    }) : y.paymentMethodPresent = "READY_TO_PAY" == K.data.isReadyToPayResponse);
                                    c(y)
                                })) : c({
                                result: r
                            })
                        }
                    }
                }
            )
        }
        ;
        W.prototype.R = function(a) {
            if (this.hb) {
                this.wa(a);
                var b = Ee(this, a)
                    , c = Fe(this, b.container, b.iframe, a);
                this.Ja = {
                    container: b.container,
                    iframe: b.iframe,
                    request: a,
                    dataPromise: c
                }
            }
        }
        ;
        W.prototype.V = function(a) {
            var b = this;
            a.swg || a.apiVersion || (a.apiVersion = 1);
            if (a.forceRedirect && this.B)
                throw Error("Callback is not supported in redirect mode");
            a.environment = this.u;
            this.wa(a);
            if (this.hb) {
                Oc = 1;
                if (this.Ja) {
                    var c = this.Ja;
                    var d = this.Ja.dataPromise;
                    this.Ja = null
                } else
                    c = Ee(this, a),
                        d = Fe(this, c.container, c.iframe, a);
                Ge(this, c.container, c.iframe, a);
                history.pushState({}, "", window.location.href);
                var e = function(f) {
                    f.preventDefault();
                    f = c;
                    f.container.parentNode && (b.Ob(q.Promise.reject({
                        errorCode: "CANCELED"
                    })),
                        He(f.container, f.iframe),
                    b.h && b.h.disconnect());
                    window.removeEventListener("popstate", e)
                };
                window.addEventListener("popstate", e);
                a = new q.Promise(function(f) {
                        b.Ob = f
                    }
                );
                this.ha(q.Promise.race([d, a]))
            } else
                return Oc = a.forceRedirect ? 3 : 2,
                    ye(this.Ib, "TIN" == this.u ? "/ui/pay" : Be(this) + "/gp/p/ui/pay", a.forceRedirect ? B("_top") : B("gp-js-popup"), a, Ie(a)).then(function(f) {
                        var g = new Uc;
                        b.Rb.show(f && f.nb());
                        f.onMessage(function(h) {
                            "partialPaymentDataCallback" == h.type ? b.tb = Zc(h.data, b.B, b.ka, g.Za).then(function(l) {
                                return f.message(l)
                            }) : "fullPaymentDataCallback" == h.type && (b.sb = Yc(h.data, b.B, b.ka, g.Za).then(function(l) {
                                f.message(l)
                            }))
                        })
                    })
        }
        ;
        var Ie = function(a) {
            var b = {
                width: 600,
                height: 600
            };
            a.forceRedirect || a.swg || (b.disableRedirectFallback = !0);
            return b
        };
        W.prototype.xb = function(a) {
            this.B = a
        }
        ;
        var Be = function(a) {
            return "LOCAL" == a.u ? "" : "https://" + ("PREPROD" == a.u ? "pay-preprod.sandbox" : "SANDBOX" == a.u ? "pay.sandbox" : "CANARY" == a.u ? "ibfe-canary.corp" : "pay") + ".google.com"
        }
            , De = function(a) {
            var b = Be(a) + "/gp/p/apis/buyflow/process";
            a.Zb && (b += "?rk=" + encodeURIComponent(a.Zb));
            return b
        }
            , Je = function(a, b) {
            var c = window.location.origin
                , d = B("https://pay.google.com/gp/p/ui/pay?origin=%{origin}&coordination_token=%{coordinationToken}");
            if ("CANARY" == a)
                d = B("https://ibfe-canary.corp.google.com/gp/p/ui/pay?origin=%{origin}&coordination_token=%{coordinationToken}");
            else if ("SANDBOX" == a || "PREPROD" == a)
                d = B("https://pay" + ("PREPROD" == a ? "-preprod" : "") + ".sandbox.google.com/gp/p/ui/pay?origin=%{origin}&coordination_token=%{coordinationToken}");
            return yb(d, {
                coordinationToken: void 0 === b ? "" : b,
                origin: c
            })
        }
            , He = function(a, b) {
            Ke(b, "all 250ms ease 0s");
            b.height = "0px";
            setTimeout(function() {
                a.parentNode && a.parentNode.removeChild(a)
            }, 250)
        }
            , Ee = function(a, b) {
            b = b.i && b.i.renderContainerCenter ? "google-payments-dialogCenter" : "google-payments-dialog";
            var c = document.createElement("div");
            c.classList.add("google-payments-dialogContainer");
            var d = document.createElement("div");
            d.classList.add("iframeContainer");
            var e = document.createElement("iframe");
            e.classList.add(b);
            e.setAttribute("frameborder", "0");
            e.setAttribute("scrolling", "no");
            d.appendChild(e);
            c.appendChild(d);
            document.body.appendChild(c);
            b = {
                container: c,
                iframe: e
            };
            c = b.iframe;
            d = b.container;
            d.addEventListener("click", za(a.nc, a, b));
            d.style.display = "none";
            c.style.display = "none";
            c.height = "0px";
            Ke(c, "all 250ms ease 0s");
            a.Cb = !1;
            return b
        };
        W.prototype.nc = function(a) {
            a.container.parentNode && history.back()
        }
        ;
        var Ge = function(a, b, c, d) {
            b.style.display = "block";
            c.style.display = "block";
            setTimeout(function() {
                c.height = "280px";
                d.i && d.i.renderContainerCenter && c.classList.add("google-payments-activeContainer");
                setTimeout(function() {
                    a.Cb = !0;
                    a.Ma && (Ke(c, a.Ma.transition),
                        c.height = a.Ma.height,
                        a.Ma = null)
                }, 250)
            }, 1)
        }
            , Ke = function(a, b) {
            vd(a, b);
            a.style.setProperty("-webkit-transition", b)
        }
            , Fe = function(a, b, c, d) {
            d.swg || d.apiVersion || (d.apiVersion = 1);
            var e = "";
            d.i && d.i.coordinationToken && (e = d.i.coordinationToken);
            d.environment = a.u;
            var f;
            e = Je(a.u, e);
            return we(c, e, d).then(function(g) {
                a.h = g;
                var h = new Uc;
                g.onMessage(function(l) {
                    "partialPaymentDataCallback" == l.type ? a.tb = Zc(l.data, a.B, a.ka, h.Za).then(function(m) {
                        return g.message(m)
                    }) : "fullPaymentDataCallback" == l.type ? a.sb = Yc(l.data, a.B, a.ka, h.Za).then(function(m) {
                        return g.message(m)
                    }) : "resize" == l.type && (a.Cb ? (f || (f = Date.now()),
                        Date.now() < f + 250 ? Ke(c, l.transition + ", height 250ms") : Ke(c, l.transition),
                        c.height = l.height) : a.Ma = {
                        height: l.height,
                        transition: l.transition
                    })
                });
                return g.Ra()
            }).then(function(g) {
                He(b, c);
                history.back();
                return g.data
            }, function(g) {
                He(b, c);
                history.back();
                return q.Promise.reject(g)
            })
        };
        W.prototype.wa = function(a) {
            var b = {
                startTimeMs: Date.now()
            };
            a.i = a.i ? t(Object, "assign").call(Object, b, a.i) : b
        }
        ;
        var Le = "actions.google.com amp-actions.sandbox.google.com amp-actions-staging.sandbox.google.com amp-actions-autopush.sandbox.google.com payments.developers.google.com payments.google.com".split(" "), Y = function(a, b, c, d) {
            this.pb = b;
            ld(a);
            this.Ub = null;
            this.u = a.environment || "TEST";
            Me || (Me = -1 != Le.indexOf(window.location.hostname) && a.i && a.i.googleTransactionId ? a.i.googleTransactionId : $a(this.u));
            this.H = a;
            this.Nb = a.merchantInfo && a.merchantInfo.merchantId ? a.merchantInfo.merchantId : "";
            a.paymentDataCallback && (a.paymentDataCallbacks = {
                onPaymentDataChanged: a.paymentDataCallback
            });
            this.B = null;
            this.l = new Ne(a,c);
            this.fa = new W(this.u,c,d,a.i && a.i.redirectKey);
            this.na = 5;
            this.X = null;
            b = this.l.mode;
            this.pa = 5 === b || 4 === b ? new dd(this.u) : this.fa;
            a.paymentDataCallbacks && (this.B = a.paymentDataCallbacks,
                this.pa.xb(a.paymentDataCallbacks),
                this.fa.xb(a.paymentDataCallbacks));
            this.fa.Ha(this.Xb.bind(this));
            this.pa.Ha(this.Xb.bind(this));
            Oc = b;
            Mc = Me;
            S({
                eventType: 9,
                clientLatencyStartMs: Date.now(),
                buyFlowActivityReason: this.l.o,
                softwareInfo: X(this)
            });
            window.addEventListener("message", function(e) {
                -1 != Le.indexOf(window.location.hostname) && "logPaymentData" === e.data.name && S(e.data.data)
            })
        }, Me, X = function(a) {
            return a.H.merchantInfo && a.H.merchantInfo.softwareInfo ? a.H.merchantInfo.softwareInfo : null
        };
        Y.prototype.F = function(a) {
            var b = this;
            if (a) {
                var c = {};
                this.H.environment && (c.environment = this.H.environment);
                this.H.merchantInfo && (c.merchantInfo = this.H.merchantInfo);
                this.H.i && (c.i = this.H.i);
                a = t(Object, "assign").call(Object, {}, c, a);
                this.Nb = a.merchantInfo && a.merchantInfo.merchantId ? a.merchantInfo.merchantId : ""
            }
            var d = Date.now()
                , e = [].concat(ia(this.l.o));
            S({
                eventType: 12,
                clientLatencyStartMs: d,
                buyFlowActivityReason: e,
                softwareInfo: X(this)
            });
            var f = kd() || md(a);
            if (f)
                return new q.Promise(function(m, r) {
                        C({
                            ga: "isReadyToPay",
                            errorMessage: f
                        });
                        S({
                            eventType: 0,
                            buyFlowActivityReason: e,
                            error: 2,
                            softwareInfo: X(b)
                        });
                        r({
                            statusCode: "DEVELOPER_ERROR",
                            statusMessage: f
                        })
                    }
                );
            var g = [].concat(ia(this.l.o))
                , h = Oe(this, a, g);
            if (a.activityModeRequired) {
                var l = null;
                return Pe.then(function(m) {
                    l = m;
                    return h
                }, function() {
                    l = !1;
                    return h
                }).then(function(m) {
                    l || (g.push(40),
                    5 === b.l.mode && (b.l.mode = 2));
                    m.activityMode = b.l.mode;
                    Qe(b, d, m, g, a);
                    return m
                }).catch(function(m) {
                    Re(b, m, g, a);
                    throw m;
                })
            }
            return h.then(function(m) {
                Qe(b, d, m, g, a);
                return m
            }).catch(function(m) {
                Re(b, m, g, a);
                throw m;
            })
        }
        ;
        var Qe = function(a, b, c, d, e) {
            S({
                eventType: 0,
                clientLatencyStartMs: b,
                isReadyToPayApiResponse: c,
                buyFlowActivityReason: d,
                softwareInfo: X(a),
                isReadyToPayRequest: e
            })
        }
            , Re = function(a, b, c, d) {
            b.statusCode ? (b = b.statusCode,
                b = "INTERNAL_ERROR" == b ? 1 : "DEVELOPER_ERROR" == b ? 2 : "MERCHANT_ACCOUNT_ERROR" == b ? 4 : "UNSUPPORTED_API_VERSION" == b ? 5 : "BUYER_CANCEL" == b ? 6 : 0) : b = 1;
            S({
                eventType: 0,
                buyFlowActivityReason: c,
                error: b,
                softwareInfo: X(a),
                isReadyToPayRequest: d
            })
        }
            , Oe = function(a, b, c) {
            if (google.payments.api.DisableNativeReadyToPayCheckForPaymentHandler ? 4 === a.l.mode && !Se(b) : a.l.Na && !Se(b)) {
                if (2 <= b.apiVersion)
                    return Te(a, b, c);
                var d = a.fa.F(b)
                    , e = a.pa.F(b);
                if (hd(b) && !a.l.va)
                    return c.push(6),
                        e;
                c.push(7);
                return e.then(function() {
                    return d
                })
            }
            return a.fa.F(b)
        }
            , Te = function(a, b, c) {
            var d = q.Promise.resolve({
                result: !1
            });
            b.existingPaymentMethodRequired && (d = q.Promise.resolve({
                result: !1,
                paymentMethodPresent: !1
            }));
            var e = d;
            if (jd(b, "CRYPTOGRAM_3DS")) {
                e = JSON.parse(JSON.stringify(b));
                for (var f = 0; f < e.allowedPaymentMethods.length; f++)
                    "CARD" == e.allowedPaymentMethods[f].type && (e.allowedPaymentMethods[f].parameters.allowedAuthMethods = ["CRYPTOGRAM_3DS"]);
                c.push(8);
                e = a.pa.F(e)
            }
            var g = d;
            jd(b, "PAN_ONLY") && (c.push(9),
                g = a.fa.F(b));
            return a.l.va ? (c.push(99),
                e.then(function() {
                    return g
                })) : e.then(function(h) {
                return 1 == (h && h.result) ? h : g
            })
        };
        k = Y.prototype;
        k.R = function(a) {
            var b = kd() || qd(a);
            b ? C({
                ga: "prefetchPaymentData",
                errorMessage: b
            }) : (this.wa(a),
                this.l.Na && !Se(a) ? this.pa.R(a) : this.fa.R(a))
        }
        ;
        k.Ga = function() {}
        ;
        k.V = function(a) {
            var b = this
                , c = [].concat(ia(this.l.o))
                , d = function() {
                return S({
                    eventType: 5,
                    buyFlowActivityReason: c.length ? c : [99],
                    softwareInfo: X(b),
                    buttonInfo: b.X
                })
            }
                , e = kd() || qd(a);
            this.na = a && a.swg ? 6 : 5;
            Oc = this.l.mode;
            if (e)
                this.pb(new q.Promise(function(l, m) {
                        S({
                            eventType: 1,
                            error: 2,
                            buyFlowMode: b.na,
                            softwareInfo: X(b),
                            buttonInfo: b.X
                        });
                        C({
                            ga: "loadPaymentData",
                            errorMessage: e
                        });
                        m({
                            statusCode: "DEVELOPER_ERROR",
                            statusMessage: e
                        })
                    }
                )),
                    d();
            else {
                if (this.B || a.callbackIntents) {
                    var f = sd(a, this.B);
                    if (f) {
                        this.pb(new q.Promise(function(l, m) {
                                S({
                                    eventType: 1,
                                    error: 2,
                                    buyFlowMode: b.na,
                                    softwareInfo: X(b),
                                    buttonInfo: b.X
                                });
                                C({
                                    ga: "loadPaymentData",
                                    errorMessage: f
                                });
                                m({
                                    statusCode: "DEVELOPER_ERROR",
                                    statusMessage: f
                                })
                            }
                        ));
                        d();
                        return
                    }
                }
                this.Ub = Date.now();
                var g = Ue(this.l, a, c)
                    , h = 5 === g || 4 === g ? this.pa : this.fa;
                g !== this.l.mode && (Oc = g);
                this.wa(a);
                d();
                h.V(a)
            }
        }
        ;
        k.oa = function(a) {
            a = void 0 === a ? {} : a;
            var b = 0
                , c = 0;
            switch (a.buttonType) {
                case "short":
                    b = 1;
                    break;
                case "long":
                    b = 2;
                    break;
                case "plain":
                    b = 3;
                    break;
                case "buy":
                    b = 4;
                    break;
                case "donate":
                    b = 5;
                    break;
                case "book":
                    b = 6;
                    break;
                case "checkout":
                    b = 7;
                    break;
                case "order":
                    b = 8;
                    break;
                case "pay":
                    b = 9;
                    break;
                case "subscribe":
                    b = 10
            }
            switch (a.buttonSizeMode) {
                case "static":
                    c = 1;
                    break;
                case "fill":
                    c = 2
            }
            var d = void 0 === a.buttonRootNode ? 0 : 3;
            a.buttonRootNode instanceof ShadowRoot ? d = 1 : a.buttonRootNode instanceof HTMLDocument && (d = 2);
            this.X = {
                buttonType: b,
                buttonSizeMode: c,
                buttonRootNode: d
            };
            c = this.Nb;
            a = void 0 === a ? {} : a;
            (n = t(Object, "values").call(Object, Qa),
                t(n, "includes")).call(n, a.buttonType) || (a.buttonType = "long");
            (n = t(Object, "values").call(Object, Sa),
                t(n, "includes")).call(n, a.buttonSizeMode) || (a.buttonSizeMode = "static");
            b = a;
            c = c && t(Dc, "includes").call(Dc, cb(c));
            d = t(Bc, "includes").call(Bc, cb(Ac));
            var e = t(Cc, "includes").call(Cc, cb(Ac));
            if (!(google.payments.api.EnableDynamicGpayButtonForTesting || google.payments.api.EnableDynamicGpayButton || d) || c || e || "long" !== b.buttonType && "buy" !== b.buttonType) {
                var f = a;
                b = Ic(f.buttonLocale, !0);
                c = f.buttonRootNode || document;
                t(xc, "includes").call(xc, c) || (Ya("\n.gpay-button {\n  background-origin: content-box;\n  background-position: center center;\n  background-repeat: no-repeat;\n  background-size: contain;\n  border: 0px;\n  border-radius: 4px;\n  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 1px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;\n  cursor: pointer;\n  height: 40px;\n  min-height: 40px;\n  padding: 12px 24px 10px;\n  width: 240px;\n}\n\n.gpay-button.black {\n  background-color: #000;\n  box-shadow: none;\n}\n\n.gpay-button.white {\n  background-color: #fff;\n}\n\n.gpay-button.short, .gpay-button.plain {\n  min-width: 90px;\n  width: 160px;\n}\n\n.gpay-button.black.short, .gpay-button.black.plain {\n  background-image: url(https://www.gstatic.com/instantbuy/svg/dark_gpay.svg);\n}\n\n.gpay-button.white.short, .gpay-button.white.plain {\n  background-image: url(https://www.gstatic.com/instantbuy/svg/light_gpay.svg);\n}\n\n.gpay-button.black.active {\n  background-color: #5f6368;\n}\n\n.gpay-button.black.hover {\n  background-color: #3c4043;\n}\n\n.gpay-button.white.active {\n  background-color: #fff;\n}\n\n.gpay-button.white.focus {\n  box-shadow: #e8e8e8 0 1px 1px 0, #e8e8e8 0 1px 3px;\n}\n\n.gpay-button.white.hover {\n  background-color: #f8f8f8;\n}\n\n.gpay-button-fill, .gpay-button-fill > .gpay-button.white, .gpay-button-fill > .gpay-button.black {\n  width: 100%;\n  height: inherit;\n}\n\n.gpay-button-fill > .gpay-button.white,\n  .gpay-button-fill > .gpay-button.black {\n    padding: 12px 15% 10px;\n}\n\n.gpay-button.donate, .gpay-button.book,\n.gpay-button.checkout,\n.gpay-button.subscribe, .gpay-button.pay,\n.gpay-button.order {\n    padding: 9px 24px;\n}\n\n.gpay-button-fill > .gpay-button.donate,\n.gpay-button-fill > .gpay-button.book,\n.gpay-button-fill > .gpay-button.checkout,\n.gpay-button-fill > .gpay-button.order,\n.gpay-button-fill > .gpay-button.pay,\n.gpay-button-fill > .gpay-button.subscribe {\n    padding: 9px 15%;\n}\n\n", c),
                    xc.push(c),
                    yc.push([]));
                d = xc.indexOf(c);
                e = b + "_" + f.buttonType;
                t(yc[d], "includes").call(yc[d], e) || (f = f.buttonType,
                    Ya(f && "short" != f && "plain" != f ? "long" == f || "buy" == f ? "\n    .gpay-button.long." + b + ", .gpay-button.buy." + b + " {\n      min-width: " + Ta.buy[b] + "px;\n    }\n\n    .gpay-button.white.long." + b + ", .gpay-button.white.buy." + b + " {\n      background-image: url(https://www.gstatic.com/instantbuy/svg/light/" + b + ".svg);\n    }\n\n    .gpay-button.black.long." + b + ", .gpay-button.black.buy." + b + " {\n      background-image: url(https://www.gstatic.com/instantbuy/svg/dark/" + b + ".svg);\n    }" : "\n    .gpay-button.white." + f + "." + b + " {\n      background-image: url(https://www.gstatic.com/instantbuy/svg/light/" + f + "/" + b + ".svg);\n    }\n\n    .gpay-button.black." + f + "." + b + " {\n      background-image: url(https://www.gstatic.com/instantbuy/svg/dark/" + f + "/" + b + ".svg);\n    }\n\n    .gpay-button." + f + "." + b + " {\n      min-width: " + Ta[f][b] + "px;\n    }\n  " : "", c),
                    yc[d].push(e));
                b = document.createElement("button");
                Gc(b);
                (n = t(Object, "values").call(Object, Ra),
                    t(n, "includes")).call(n, a.buttonColor) || (a.buttonColor = "default");
                "default" == a.buttonColor && (a.buttonColor = "black");
                c = Fc(a);
                b.setAttribute("class", "gpay-button " + c);
                Hc(b);
                if (a.onClick)
                    b.addEventListener("click", a.onClick);
                else
                    throw Error("Parameter 'onClick' must be set.");
                c = document.createElement("div");
                "fill" === a.buttonSizeMode && c.setAttribute("class", "gpay-button-fill");
                c.appendChild(b);
                a = c
            } else
                a = Ec(a);
            S({
                eventType: 2,
                clientLatencyStartMs: Date.now(),
                buyFlowActivityReason: this.l.o,
                softwareInfo: X(this),
                buttonInfo: this.X
            });
            return a
        }
        ;
        k.Xb = function(a) {
            var b = this;
            a = a.then(function(c) {
                google.payments.api.LogInternally && console.log("payment data", c);
                if (c.error) {
                    var d = Error();
                    d.statusCode = c.error.statusCode;
                    d.statusMessage = c.error.statusMessage;
                    C({
                        ga: "loadPaymentData",
                        errorMessage: d.statusMessage
                    });
                    throw d;
                }
                return c
            });
            a.then(function(c) {
                google.payments.api.LogInternally && console.log("payment data resolve to ", c);
                S({
                    eventType: 1,
                    clientLatencyStartMs: b.Ub,
                    buyFlowMode: b.na,
                    buyFlowActivityReason: b.l.o,
                    softwareInfo: X(b),
                    buttonInfo: b.X
                })
            }).catch(function(c) {
                google.payments.api.LogInternally && console.log("payment data has error", c);
                c.errorCode ? S({
                    eventType: 1,
                    error: c.errorCode,
                    buyFlowMode: b.na,
                    buyFlowActivityReason: b.l.o,
                    softwareInfo: X(b),
                    buttonInfo: b.X
                }) : S({
                    eventType: 1,
                    error: 6,
                    buyFlowMode: b.na,
                    buyFlowActivityReason: b.l.o,
                    softwareInfo: X(b),
                    buttonInfo: b.X
                })
            });
            this.pb(a)
        }
        ;
        k.wa = function(a) {
            var b = {
                googleTransactionId: Me,
                usingPayJs: !0
            };
            a.i = a.i ? t(Object, "assign").call(Object, b, a.i) : b;
            a.i.firstPartyMerchantIdentifier && delete a.i.firstPartyMerchantIdentifier;
            this.H.i && this.H.i.firstPartyMerchantIdentifier && (a.i.firstPartyMerchantIdentifier = this.H.i.firstPartyMerchantIdentifier)
        }
        ;
        Y.prototype.createButton = Y.prototype.oa;
        Y.prototype.loadPaymentData = Y.prototype.V;
        Y.prototype.notifyAvailableOffers = Y.prototype.Ga;
        Y.prototype.prefetchPaymentData = Y.prototype.R;
        Y.prototype.isReadyToPay = Y.prototype.F;
        var Pe = null
            , Ve = null
            , Ne = function(a, b) {
            b = void 0 === b ? !1 : b;
            this.ib = a;
            this.o = [];
            null != window.navigator.userAgent.match(/Android|iPhone|iPad|iPod|BlackBerry|IEMobile/i) ? (this.o.push(37),
                a = !1) : (a = window.navigator.userAgent.match(/Chrome\/([0-9]+)\./i),
                "PaymentRequest"in window && null != a && 70 <= Number(a[1]) && "Google Inc." == window.navigator.vendor ? (this.o.push(98),
                this.ib.paymentDataCallbacks && this.o.push(97),
                    a = !0) : (this.o.push(36),
                    a = !1));
            this.va = a;
            this.Na = We(this);
            this.mode = 2;
            b ? (this.o = [38],
                this.mode = 1) : this.Na && this.va ? this.mode = 5 : this.Na && (this.mode = 4);
            this.ib.paymentDataCallbacks && this.o.push(1)
        }
            , Se = function(a) {
            return !0 === (a.i && a.i.disableNative)
        }
            , Ue = function(a, b, c) {
            return 2 === a.mode || 1 === a.mode ? a.mode : Se(b) ? (c.push(3),
                2) : !Ve && (a.va || google.payments.api.UseCanMakePaymentForFallbackOnMobile && a.Na) ? (c.push(40),
                2) : a.va && b.swg ? (c.push(5),
                2) : a.mode
        }
            , We = function(a) {
            if (!window.PaymentRequest)
                return a.o.push(41),
                    !1;
            var b = -1 !== window.navigator.userAgent.indexOf("OPT/")
                , c = -1 !== window.navigator.userAgent.indexOf("SamsungBrowser/");
            if (-1 !== window.navigator.userAgent.indexOf("OPR/") || b || c)
                return a.o.push(35),
                    !1;
            if (a.va)
                return !0;
            if (google.payments.api.DisablePaymentRequest && !google.payments.api.EnablePaymentRequest)
                return a.o.push(3),
                    !1;
            b = window.navigator.userAgent.match(/Android/i);
            c = window.navigator.userAgent.match(/Chrome\/([0-9]+)\./i);
            if (!(null != b && "PaymentRequest"in window && "Google Inc." == window.navigator.vendor && null != c && 59 <= Number(c[1])))
                return a.o.push(34),
                    !1;
            if (!a.ib.paymentDataCallbacks)
                return !0;
            if (92 > Number(c[1]))
                return !1;
            a.o.push(96);
            return google.payments.api.EnableDynamicUpdateForClank ? !0 : (a.o.push(42),
                !1)
        };
        ta("google.payments.api.PaymentsAsyncClient", Y);
        Y.prototype.isReadyToPay = Y.prototype.F;
        Y.prototype.prefetchPaymentData = Y.prototype.R;
        Y.prototype.loadPaymentData = Y.prototype.V;
        Y.prototype.createButton = Y.prototype.oa;
        Y.prototype.notifyAvailableOffers = Y.prototype.Ga;
        var Z = function(a, b) {
            a = void 0 === a ? {} : a;
            this.wc = ab({}, window.gpayMerchantIdFromUrl ? {
                merchantInfo: {
                    merchantId: window.gpayMerchantIdFromUrl
                }
            } : {}, window.gpayInitParams, a);
            this.Ta = new Y(this.wc,this.Bc.bind(this),b);
            this.Ia = null
        };
        k = Z.prototype;
        k.Bc = function(a) {
            this.Ia(a)
        }
        ;
        k.F = function(a) {
            return this.Ta.F(a)
        }
        ;
        k.R = function(a) {
            this.Ta.R(a)
        }
        ;
        k.Ga = function() {}
        ;
        k.V = function(a) {
            var b = this;
            google.payments.api.EnablePwgTestExperiment && console.log("ZOMBIEMONKEYATEMYBRAIN");
            return (new q.Promise(function(c) {
                    if (b.Ia)
                        throw Error("This method can only be called one at a time.");
                    b.Ia = c;
                    b.Ta.V(a)
                }
            )).then(function(c) {
                b.Ia = null;
                return c
            }, function(c) {
                b.Ia = null;
                throw c;
            })
        }
        ;
        k.oa = function(a) {
            a = void 0 === a ? {} : a;
            return this.Ta.oa(a)
        }
        ;
        Z.prototype.createButton = Z.prototype.oa;
        Z.prototype.loadPaymentData = Z.prototype.V;
        Z.prototype.notifyAvailableOffers = Z.prototype.Ga;
        Z.prototype.prefetchPaymentData = Z.prototype.R;
        Z.prototype.isReadyToPay = Z.prototype.F;
        ta("google.payments.api.PaymentsClient", Z);
        Z.prototype.isReadyToPay = Z.prototype.F;
        Z.prototype.prefetchPaymentData = Z.prototype.R;
        Z.prototype.loadPaymentData = Z.prototype.V;
        Z.prototype.createButton = Z.prototype.oa;
        Z.prototype.notifyAvailableOffers = Z.prototype.Ga;
        google.payments.api.UseCanMakePaymentResultFromPayjs && (Pe = (new PaymentRequest([{
            supportedMethods: ["https://google.com/pay"],
            data: {
                apiVersion: 2,
                apiVersionMinor: 0,
                allowedPaymentMethods: [{
                    type: "CARD",
                    parameters: {
                        allowedAuthMethods: ["PAN_ONLY", "CRYPTOGRAM_3DS"],
                        allowedCardNetworks: ["VISA", "MASTERCARD"]
                    }
                }]
            }
        }],{
            total: {
                label: "Estimated Total Price",
                amount: {
                    currency: "USD",
                    value: "10"
                }
            }
        })).canMakePayment(),
            Pe.then(function(a) {
                return Ve = a
            }).catch(function() {
                return Ve = !1
            }));
    }
).call(this);
