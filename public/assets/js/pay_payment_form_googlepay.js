(self.webpackChunkunitpay = self.webpackChunkunitpay || []).push([[7209], {
    50008: function(e) {
        function t(n) {
            return "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? (e.exports = t = function(e) {
                return typeof e
            }
                ,
                e.exports.default = e.exports,
                e.exports.__esModule = !0) : (e.exports = t = function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
                ,
                e.exports.default = e.exports,
                e.exports.__esModule = !0),
                t(n)
        }
        e.exports = t,
            e.exports.default = e.exports,
            e.exports.__esModule = !0
    },
    25631: function(e, t, n) {
        "use strict";
        n(72197)
    },
    72197: function(e, t, n) {
        var o = n(50008);
        n.g.googlePay = function() {
            var e, t = {
                apiVersion: 2,
                apiVersionMinor: 0,
                allowedPaymentMethods: [{
                    type: "CARD",
                    parameters: {
                        allowedAuthMethods: ["PAN_ONLY", "CRYPTOGRAM_3DS"],
                        allowedCardNetworks: ["MASTERCARD", "VISA"],
                        assuranceDetailsRequired: !0
                    },
                    tokenizationSpecification: {
                        type: "PAYMENT_GATEWAY",
                        parameters: {
                            gateway: "unitpay",
                            gatewayMerchantId: "BCR2DN6T3OQ2ROCL"
                        }
                    }
                }]
            }, n = document.querySelector('form[name="payment_googlepay"]'), a = n.querySelector(".googlepay-data"), r = function() {
                $(n).find(".form-errors-container").hide().html("")
            }, i = function(e) {
                "string" == typeof e.message && function(e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "form-errors";
                    r();
                    var o = $("<div>").addClass(t).html($("<div>").addClass("alert alert-warning").html(e));
                    $(n).find(".form-errors-container").show().html(o)
                }(e.message)
            }, s = function(e) {
                return new Promise((function(n) {
                        (function(e) {
                                return new Promise((function(n, r) {
                                        if ("object" === o(e) && "object" === o(e.paymentMethodData) && "object" === o(e.paymentMethodData.tokenizationData) && "string" == typeof e.paymentMethodData.tokenizationData.token) {
                                            var i = e.paymentMethodData.tokenizationData.token;
                                            a.value = JSON.stringify({
                                                token: btoa(i),
                                                gateway: t.allowedPaymentMethods[0].tokenizationSpecification.parameters.gateway
                                            }),
                                                n({})
                                        } else
                                            r({
                                                message: "Undefined token"
                                            })
                                    }
                                ))
                            }
                        )(e).then((function() {
                                n({
                                    transactionState: "SUCCESS"
                                })
                            }
                        )).catch((function(e) {
                                n({
                                    transactionState: "ERROR",
                                    error: {
                                        reason: "PAYMENT_DATA_INVALID",
                                        message: o("string" === e.message) ? e.message : "Undefined error",
                                        intent: "PAYMENT_AUTHORIZATION"
                                    }
                                })
                            }
                        ))
                    }
                ))
            }, c = function() {
                var t, n = ("object" === ("undefined" == typeof google ? "undefined" : o(google)) && "object" === o(google.payments) && "object" === o(google.payments.api) && (t = google.payments.api),
                    t);
                n && (e = new n.PaymentsClient({
                    environment: "PRODUCTION",
                    paymentDataCallbacks: {
                        onPaymentAuthorized: s
                    }
                }))
            }, l = function() {
                try {
                    e.loadPaymentData(function() {
                        var e;
                        try {
                            e = JSON.parse(a.value)
                        } catch (e) {
                            throw "Invalid payment data"
                        }
                        var n = t;
                        if (void 0 === e || void 0 === e.merchant || void 0 === e.transaction)
                            throw "Invalid payment data";
                        return n.merchantInfo = e.merchant,
                            n.transactionInfo = e.transaction,
                            n.callbackIntents = ["PAYMENT_AUTHORIZATION"],
                            n
                    }()).then((function(e) {
                            document.querySelectorAll(".googlepay-button").forEach((function(e) {
                                    e.innerHTML = "waiting..."
                                }
                            )),
                                n.submit()
                        }
                    )).catch((function(e) {
                            console.error(e),
                                i(e)
                        }
                    ))
                } catch (e) {
                    console.error(e),
                        i(e)
                }
            };
            this.init = function() {
                c(),
                    e ? e.isReadyToPay(t).then((function(t) {
                            var n, o;
                            t.result ? (n = e.createButton({
                                onClick: l,
                                buttonColor: "black",
                                buttonType: "short",
                                buttonSizeMode: "fill"
                            }),
                                o = !1,
                                document.querySelectorAll(".googlepay-button").length ? (document.querySelectorAll(".googlepay-button").forEach((function(e) {
                                        var t = e.parentElement;
                                        t && (t.offsetWidth > 0 && t.offsetHeight > 0 || location.hostname.startsWith("widget")) && !e.getElementsByClassName(n.className).length && (e.appendChild(n),
                                            o = !0)
                                    }
                                )),
                                o || i({
                                    message: "Undefined button element"
                                })) : i({
                                    message: "Undefined button block"
                                })) : i({
                                message: "You cannot pay from your device"
                            })
                        }
                    )).catch((function(e) {
                            console.error(e),
                                i(e)
                        }
                    )) : i({
                        message: "Undefined client"
                    })
            }
        }
    }
}, function(e) {
    "use strict";
    var t;
    t = 25631,
        e(e.s = t)
}
]);
