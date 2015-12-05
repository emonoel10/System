/*
 *  Document   : plugins.js
 *  Author     : Various
 *  Description: Jquery Plugins in one file for consistency
 */

/* Avoid `console` errors in browsers that lack a console */
(function() {
    var e;
    var t = function() {};
    var n = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"];
    var r = n.length;
    var i = window.console = window.console || {};
    while (r--) {
        e = n[r];
        if (!i[e]) {
            i[e] = t
        }
    }
})();

/*! http://mths.be/placeholder v2.0.7 by @mathias */
! function(e, t, n) {
    function i(e) {
        var t = {},
            i = /^jQuery\d+$/;
        return n.each(e.attributes, function(e, n) {
            n.specified && !i.test(n.name) && (t[n.name] = n.value)
        }), t
    }

    function r(e, t) {
        var i = this,
            r = n(i);
        if (i.value == r.attr("placeholder") && r.hasClass("placeholder"))
            if (r.data("placeholder-password")) {
                if (r = r.hide().next().show().attr("id", r.removeAttr("id").data("placeholder-id")), e === !0) return r[0].value = t;
                r.focus()
            } else i.value = "", r.removeClass("placeholder"), i == o() && i.select()
    }

    function a() {
        var e, t = this,
            a = n(t),
            o = this.id;
        if ("" == t.value) {
            if ("password" == t.type) {
                if (!a.data("placeholder-textinput")) {
                    try {
                        e = a.clone().attr({
                            type: "text"
                        })
                    } catch (s) {
                        e = n("<input>").attr(n.extend(i(this), {
                            type: "text"
                        }))
                    }
                    e.removeAttr("name").data({
                        "placeholder-password": a,
                        "placeholder-id": o
                    }).bind("focus.placeholder", r), a.data({
                        "placeholder-textinput": e,
                        "placeholder-id": o
                    }).before(e)
                }
                a = a.removeAttr("id").hide().prev().attr("id", o).show()
            }
            a.addClass("placeholder"), a[0].value = a.attr("placeholder")
        } else a.removeClass("placeholder")
    }

    function o() {
        try {
            return t.activeElement
        } catch (e) {}
    }
    var s, l, c = "placeholder" in t.createElement("input"),
        u = "placeholder" in t.createElement("textarea"),
        d = n.fn,
        h = n.valHooks,
        f = n.propHooks;
    c && u ? (l = d.placeholder = function() {
        return this
    }, l.input = l.textarea = !0) : (l = d.placeholder = function() {
        var e = this;
        return e.filter((c ? "textarea" : ":input") + "[placeholder]").not(".placeholder").bind({
            "focus.placeholder": r,
            "blur.placeholder": a
        }).data("placeholder-enabled", !0).trigger("blur.placeholder"), e
    }, l.input = c, l.textarea = u, s = {
        get: function(e) {
            var t = n(e),
                i = t.data("placeholder-password");
            return i ? i[0].value : t.data("placeholder-enabled") && t.hasClass("placeholder") ? "" : e.value
        },
        set: function(e, t) {
            var i = n(e),
                s = i.data("placeholder-password");
            return s ? s[0].value = t : i.data("placeholder-enabled") ? ("" == t ? (e.value = t, e != o() && a.call(e)) : i.hasClass("placeholder") ? r.call(e, !0, t) || (e.value = t) : e.value = t, i) : e.value = t
        }
    }, c || (h.input = s, f.value = s), u || (h.textarea = s, f.value = s), n(function() {
        n(t).delegate("form", "submit.placeholder", function() {
            var e = n(".placeholder", this).each(r);
            setTimeout(function() {
                e.each(a)
            }, 10)
        })
    }), n(e).bind("beforeunload.placeholder", function() {
        n(".placeholder").each(function() {
            this.value = ""
        })
    }))
}(this, document, jQuery);

/*!
 * Retina.js v1.1.0
 *
 * Copyright 2013 Imulus, LLC
 * Released under the MIT license
 *
 * Retina.js is an open source script that makes it easy to serve
 * high-resolution images to devices with retina displays.
 */
! function() {
    function t() {}

    function e(t, e) {
        this.path = t, "undefined" != typeof e && null !== e ? (this.at_2x_path = e, this.perform_check = !1) : (this.at_2x_path = t.replace(/\.\w+$/, function(t) {
            return "@2x" + t
        }), this.perform_check = !0)
    }

    function i(t) {
        this.el = t, this.path = new e(this.el.getAttribute("src"), this.el.getAttribute("data-at2x"));
        var i = this;
        this.path.check_2x_variant(function(t) {
            t && i.swap()
        })
    }
    var n = "undefined" == typeof exports ? window : exports,
        a = {
            check_mime_type: !0
        };
    n.Retina = t, t.configure = function(t) {
        null == t && (t = {});
        for (var e in t) a[e] = t[e]
    }, t.init = function(t) {
        null == t && (t = n);
        var e = t.onload || new Function;
        t.onload = function() {
            var t, n, a = document.getElementsByTagName("img"),
                h = [];
            for (t = 0; t < a.length; t++) n = a[t], h.push(new i(n));
            e()
        }
    }, t.isRetina = function() {
        var t = "(-webkit-min-device-pixel-ratio: 1.5),                      (min--moz-device-pixel-ratio: 1.5),                      (-o-min-device-pixel-ratio: 3/2),                      (min-resolution: 1.5dppx)";
        return n.devicePixelRatio > 1 ? !0 : n.matchMedia && n.matchMedia(t).matches ? !0 : !1
    }, n.RetinaImagePath = e, e.confirmed_paths = [], e.prototype.is_external = function() {
        return !(!this.path.match(/^https?\:/i) || this.path.match("//" + document.domain))
    }, e.prototype.check_2x_variant = function(t) {
        var i, n = this;
        return this.is_external() ? t(!1) : this.perform_check || "undefined" == typeof this.at_2x_path || null === this.at_2x_path ? this.at_2x_path in e.confirmed_paths ? t(!0) : (i = new XMLHttpRequest, i.open("HEAD", this.at_2x_path), i.onreadystatechange = function() {
            if (4 != i.readyState) return t(!1);
            if (i.status >= 200 && i.status <= 399) {
                if (a.check_mime_type) {
                    var h = i.getResponseHeader("Content-Type");
                    if (null == h || !h.match(/^image/i)) return t(!1)
                }
                return e.confirmed_paths.push(n.at_2x_path), t(!0)
            }
            return t(!1)
        }, i.send(), void 0) : t(!0)
    }, n.RetinaImage = i, i.prototype.swap = function(t) {
        function e() {
            i.el.complete ? $(i.el).is(":visible") && (i.el.setAttribute("width", i.el.offsetWidth), i.el.setAttribute("height", i.el.offsetHeight), i.el.setAttribute("src", t)) : setTimeout(e, 5)
        }
        "undefined" == typeof t && (t = this.path.at_2x_path);
        var i = this;
        e()
    }, t.isRetina() && t.init(n)
}();

/*!
 * jQuery Validation Plugin - v1.11.1 - 3/22/2013
 * https://github.com/jzaefferer/jquery-validation
 * Copyright (c) 2013 JΓ¶rn Zaefferer; Licensed MIT
 */
(function(t) {
    t.extend(t.fn, {
        validate: function(e) {
            if (!this.length) return e && e.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing."), void 0;
            var i = t.data(this[0], "validator");
            return i ? i : (this.attr("novalidate", "novalidate"), i = new t.validator(e, this[0]), t.data(this[0], "validator", i), i.settings.onsubmit && (this.validateDelegate(":submit", "click", function(e) {
                i.settings.submitHandler && (i.submitButton = e.target), t(e.target).hasClass("cancel") && (i.cancelSubmit = !0), void 0 !== t(e.target).attr("formnovalidate") && (i.cancelSubmit = !0)
            }), this.submit(function(e) {
                function s() {
                    var s;
                    return i.settings.submitHandler ? (i.submitButton && (s = t("<input type='hidden'/>").attr("name", i.submitButton.name).val(t(i.submitButton).val()).appendTo(i.currentForm)), i.settings.submitHandler.call(i, i.currentForm, e), i.submitButton && s.remove(), !1) : !0
                }
                return i.settings.debug && e.preventDefault(), i.cancelSubmit ? (i.cancelSubmit = !1, s()) : i.form() ? i.pendingRequest ? (i.formSubmitted = !0, !1) : s() : (i.focusInvalid(), !1)
            })), i)
        },
        valid: function() {
            if (t(this[0]).is("form")) return this.validate().form();
            var e = !0,
                i = t(this[0].form).validate();
            return this.each(function() {
                e = e && i.element(this)
            }), e
        },
        removeAttrs: function(e) {
            var i = {},
                s = this;
            return t.each(e.split(/\s/), function(t, e) {
                i[e] = s.attr(e), s.removeAttr(e)
            }), i
        },
        rules: function(e, i) {
            var s = this[0];
            if (e) {
                var r = t.data(s.form, "validator").settings,
                    n = r.rules,
                    a = t.validator.staticRules(s);
                switch (e) {
                    case "add":
                        t.extend(a, t.validator.normalizeRule(i)), delete a.messages, n[s.name] = a, i.messages && (r.messages[s.name] = t.extend(r.messages[s.name], i.messages));
                        break;
                    case "remove":
                        if (!i) return delete n[s.name], a;
                        var u = {};
                        return t.each(i.split(/\s/), function(t, e) {
                            u[e] = a[e], delete a[e]
                        }), u
                }
            }
            var o = t.validator.normalizeRules(t.extend({}, t.validator.classRules(s), t.validator.attributeRules(s), t.validator.dataRules(s), t.validator.staticRules(s)), s);
            if (o.required) {
                var l = o.required;
                delete o.required, o = t.extend({
                    required: l
                }, o)
            }
            return o
        }
    }), t.extend(t.expr[":"], {
        blank: function(e) {
            return !t.trim("" + t(e).val())
        },
        filled: function(e) {
            return !!t.trim("" + t(e).val())
        },
        unchecked: function(e) {
            return !t(e).prop("checked")
        }
    }), t.validator = function(e, i) {
        this.settings = t.extend(!0, {}, t.validator.defaults, e), this.currentForm = i, this.init()
    }, t.validator.format = function(e, i) {
        return 1 === arguments.length ? function() {
            var i = t.makeArray(arguments);
            return i.unshift(e), t.validator.format.apply(this, i)
        } : (arguments.length > 2 && i.constructor !== Array && (i = t.makeArray(arguments).slice(1)), i.constructor !== Array && (i = [i]), t.each(i, function(t, i) {
            e = e.replace(RegExp("\\{" + t + "\\}", "g"), function() {
                return i
            })
        }), e)
    }, t.extend(t.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusInvalid: !0,
            errorContainer: t([]),
            errorLabelContainer: t([]),
            onsubmit: !0,
            ignore: ":hidden",
            ignoreTitle: !1,
            onfocusin: function(t) {
                this.lastActive = t, this.settings.focusCleanup && !this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, t, this.settings.errorClass, this.settings.validClass), this.addWrapper(this.errorsFor(t)).hide())
            },
            onfocusout: function(t) {
                this.checkable(t) || !(t.name in this.submitted) && this.optional(t) || this.element(t)
            },
            onkeyup: function(t, e) {
                (9 !== e.which || "" !== this.elementValue(t)) && (t.name in this.submitted || t === this.lastElement) && this.element(t)
            },
            onclick: function(t) {
                t.name in this.submitted ? this.element(t) : t.parentNode.name in this.submitted && this.element(t.parentNode)
            },
            highlight: function(e, i, s) {
                "radio" === e.type ? this.findByName(e.name).addClass(i).removeClass(s) : t(e).addClass(i).removeClass(s)
            },
            unhighlight: function(e, i, s) {
                "radio" === e.type ? this.findByName(e.name).removeClass(i).addClass(s) : t(e).removeClass(i).addClass(s)
            }
        },
        setDefaults: function(e) {
            t.extend(t.validator.defaults, e)
        },
        messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            maxlength: t.validator.format("Please enter no more than {0} characters."),
            minlength: t.validator.format("Please enter at least {0} characters."),
            rangelength: t.validator.format("Please enter a value between {0} and {1} characters long."),
            range: t.validator.format("Please enter a value between {0} and {1}."),
            max: t.validator.format("Please enter a value less than or equal to {0}."),
            min: t.validator.format("Please enter a value greater than or equal to {0}.")
        },
        autoCreateRanges: !1,
        prototype: {
            init: function() {
                function e(e) {
                    var i = t.data(this[0].form, "validator"),
                        s = "on" + e.type.replace(/^validate/, "");
                    i.settings[s] && i.settings[s].call(i, this[0], e)
                }
                this.labelContainer = t(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || t(this.currentForm), this.containers = t(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset();
                var i = this.groups = {};
                t.each(this.settings.groups, function(e, s) {
                    "string" == typeof s && (s = s.split(/\s/)), t.each(s, function(t, s) {
                        i[s] = e
                    })
                });
                var s = this.settings.rules;
                t.each(s, function(e, i) {
                    s[e] = t.validator.normalizeRule(i)
                }), t(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ", "focusin focusout keyup", e).validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", e), this.settings.invalidHandler && t(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler)
            },
            form: function() {
                return this.checkForm(), t.extend(this.submitted, this.errorMap), this.invalid = t.extend({}, this.errorMap), this.valid() || t(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
            },
            checkForm: function() {
                this.prepareForm();
                for (var t = 0, e = this.currentElements = this.elements(); e[t]; t++) this.check(e[t]);
                return this.valid()
            },
            element: function(e) {
                e = this.validationTargetFor(this.clean(e)), this.lastElement = e, this.prepareElement(e), this.currentElements = t(e);
                var i = this.check(e) !== !1;
                return i ? delete this.invalid[e.name] : this.invalid[e.name] = !0, this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), i
            },
            showErrors: function(e) {
                if (e) {
                    t.extend(this.errorMap, e), this.errorList = [];
                    for (var i in e) this.errorList.push({
                        message: e[i],
                        element: this.findByName(i)[0]
                    });
                    this.successList = t.grep(this.successList, function(t) {
                        return !(t.name in e)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            },
            resetForm: function() {
                t.fn.resetForm && t(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue")
            },
            numberOfInvalids: function() {
                return this.objectLength(this.invalid)
            },
            objectLength: function(t) {
                var e = 0;
                for (var i in t) e++;
                return e
            },
            hideErrors: function() {
                this.addWrapper(this.toHide).hide()
            },
            valid: function() {
                return 0 === this.size()
            },
            size: function() {
                return this.errorList.length
            },
            focusInvalid: function() {
                if (this.settings.focusInvalid) try {
                    t(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                } catch (e) {}
            },
            findLastActive: function() {
                var e = this.lastActive;
                return e && 1 === t.grep(this.errorList, function(t) {
                    return t.element.name === e.name
                }).length && e
            },
            elements: function() {
                var e = this,
                    i = {};
                return t(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function() {
                    return !this.name && e.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in i || !e.objectLength(t(this).rules()) ? !1 : (i[this.name] = !0, !0)
                })
            },
            clean: function(e) {
                return t(e)[0]
            },
            errors: function() {
                var e = this.settings.errorClass.replace(" ", ".");
                return t(this.settings.errorElement + "." + e, this.errorContext)
            },
            reset: function() {
                this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = t([]), this.toHide = t([]), this.currentElements = t([])
            },
            prepareForm: function() {
                this.reset(), this.toHide = this.errors().add(this.containers)
            },
            prepareElement: function(t) {
                this.reset(), this.toHide = this.errorsFor(t)
            },
            elementValue: function(e) {
                var i = t(e).attr("type"),
                    s = t(e).val();
                return "radio" === i || "checkbox" === i ? t("input[name='" + t(e).attr("name") + "']:checked").val() : "string" == typeof s ? s.replace(/\r/g, "") : s
            },
            check: function(e) {
                e = this.validationTargetFor(this.clean(e));
                var i, s = t(e).rules(),
                    r = !1,
                    n = this.elementValue(e);
                for (var a in s) {
                    var u = {
                        method: a,
                        parameters: s[a]
                    };
                    try {
                        if (i = t.validator.methods[a].call(this, n, e, u.parameters), "dependency-mismatch" === i) {
                            r = !0;
                            continue
                        }
                        if (r = !1, "pending" === i) return this.toHide = this.toHide.not(this.errorsFor(e)), void 0;
                        if (!i) return this.formatAndAdd(e, u), !1
                    } catch (o) {
                        throw this.settings.debug && window.console && console.log("Exception occurred when checking element " + e.id + ", check the '" + u.method + "' method.", o), o
                    }
                }
                return r ? void 0 : (this.objectLength(s) && this.successList.push(e), !0)
            },
            customDataMessage: function(e, i) {
                return t(e).data("msg-" + i.toLowerCase()) || e.attributes && t(e).attr("data-msg-" + i.toLowerCase())
            },
            customMessage: function(t, e) {
                var i = this.settings.messages[t];
                return i && (i.constructor === String ? i : i[e])
            },
            findDefined: function() {
                for (var t = 0; arguments.length > t; t++)
                    if (void 0 !== arguments[t]) return arguments[t];
                return void 0
            },
            defaultMessage: function(e, i) {
                return this.findDefined(this.customMessage(e.name, i), this.customDataMessage(e, i), !this.settings.ignoreTitle && e.title || void 0, t.validator.messages[i], "<strong>Warning: No message defined for " + e.name + "</strong>")
            },
            formatAndAdd: function(e, i) {
                var s = this.defaultMessage(e, i.method),
                    r = /\$?\{(\d+)\}/g;
                "function" == typeof s ? s = s.call(this, i.parameters, e) : r.test(s) && (s = t.validator.format(s.replace(r, "{$1}"), i.parameters)), this.errorList.push({
                    message: s,
                    element: e
                }), this.errorMap[e.name] = s, this.submitted[e.name] = s
            },
            addWrapper: function(t) {
                return this.settings.wrapper && (t = t.add(t.parent(this.settings.wrapper))), t
            },
            defaultShowErrors: function() {
                var t, e;
                for (t = 0; this.errorList[t]; t++) {
                    var i = this.errorList[t];
                    this.settings.highlight && this.settings.highlight.call(this, i.element, this.settings.errorClass, this.settings.validClass), this.showLabel(i.element, i.message)
                }
                if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success)
                    for (t = 0; this.successList[t]; t++) this.showLabel(this.successList[t]);
                if (this.settings.unhighlight)
                    for (t = 0, e = this.validElements(); e[t]; t++) this.settings.unhighlight.call(this, e[t], this.settings.errorClass, this.settings.validClass);
                this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show()
            },
            validElements: function() {
                return this.currentElements.not(this.invalidElements())
            },
            invalidElements: function() {
                return t(this.errorList).map(function() {
                    return this.element
                })
            },
            showLabel: function(e, i) {
                var s = this.errorsFor(e);
                s.length ? (s.removeClass(this.settings.validClass).addClass(this.settings.errorClass), s.html(i)) : (s = t("<" + this.settings.errorElement + ">").attr("for", this.idOrName(e)).addClass(this.settings.errorClass).html(i || ""), this.settings.wrapper && (s = s.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.append(s).length || (this.settings.errorPlacement ? this.settings.errorPlacement(s, t(e)) : s.insertAfter(e))), !i && this.settings.success && (s.text(""), "string" == typeof this.settings.success ? s.addClass(this.settings.success) : this.settings.success(s, e)), this.toShow = this.toShow.add(s)
            },
            errorsFor: function(e) {
                var i = this.idOrName(e);
                return this.errors().filter(function() {
                    return t(this).attr("for") === i
                })
            },
            idOrName: function(t) {
                return this.groups[t.name] || (this.checkable(t) ? t.name : t.id || t.name)
            },
            validationTargetFor: function(t) {
                return this.checkable(t) && (t = this.findByName(t.name).not(this.settings.ignore)[0]), t
            },
            checkable: function(t) {
                return /radio|checkbox/i.test(t.type)
            },
            findByName: function(e) {
                return t(this.currentForm).find("[name='" + e + "']")
            },
            getLength: function(e, i) {
                switch (i.nodeName.toLowerCase()) {
                    case "select":
                        return t("option:selected", i).length;
                    case "input":
                        if (this.checkable(i)) return this.findByName(i.name).filter(":checked").length
                }
                return e.length
            },
            depend: function(t, e) {
                return this.dependTypes[typeof t] ? this.dependTypes[typeof t](t, e) : !0
            },
            dependTypes: {
                "boolean": function(t) {
                    return t
                },
                string: function(e, i) {
                    return !!t(e, i.form).length
                },
                "function": function(t, e) {
                    return t(e)
                }
            },
            optional: function(e) {
                var i = this.elementValue(e);
                return !t.validator.methods.required.call(this, i, e) && "dependency-mismatch"
            },
            startRequest: function(t) {
                this.pending[t.name] || (this.pendingRequest++, this.pending[t.name] = !0)
            },
            stopRequest: function(e, i) {
                this.pendingRequest--, 0 > this.pendingRequest && (this.pendingRequest = 0), delete this.pending[e.name], i && 0 === this.pendingRequest && this.formSubmitted && this.form() ? (t(this.currentForm).submit(), this.formSubmitted = !1) : !i && 0 === this.pendingRequest && this.formSubmitted && (t(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1)
            },
            previousValue: function(e) {
                return t.data(e, "previousValue") || t.data(e, "previousValue", {
                    old: null,
                    valid: !0,
                    message: this.defaultMessage(e, "remote")
                })
            }
        },
        classRuleSettings: {
            required: {
                required: !0
            },
            email: {
                email: !0
            },
            url: {
                url: !0
            },
            date: {
                date: !0
            },
            dateISO: {
                dateISO: !0
            },
            number: {
                number: !0
            },
            digits: {
                digits: !0
            },
            creditcard: {
                creditcard: !0
            }
        },
        addClassRules: function(e, i) {
            e.constructor === String ? this.classRuleSettings[e] = i : t.extend(this.classRuleSettings, e)
        },
        classRules: function(e) {
            var i = {},
                s = t(e).attr("class");
            return s && t.each(s.split(" "), function() {
                this in t.validator.classRuleSettings && t.extend(i, t.validator.classRuleSettings[this])
            }), i
        },
        attributeRules: function(e) {
            var i = {},
                s = t(e),
                r = s[0].getAttribute("type");
            for (var n in t.validator.methods) {
                var a;
                "required" === n ? (a = s.get(0).getAttribute(n), "" === a && (a = !0), a = !!a) : a = s.attr(n), /min|max/.test(n) && (null === r || /number|range|text/.test(r)) && (a = Number(a)), a ? i[n] = a : r === n && "range" !== r && (i[n] = !0)
            }
            return i.maxlength && /-1|2147483647|524288/.test(i.maxlength) && delete i.maxlength, i
        },
        dataRules: function(e) {
            var i, s, r = {},
                n = t(e);
            for (i in t.validator.methods) s = n.data("rule-" + i.toLowerCase()), void 0 !== s && (r[i] = s);
            return r
        },
        staticRules: function(e) {
            var i = {},
                s = t.data(e.form, "validator");
            return s.settings.rules && (i = t.validator.normalizeRule(s.settings.rules[e.name]) || {}), i
        },
        normalizeRules: function(e, i) {
            return t.each(e, function(s, r) {
                if (r === !1) return delete e[s], void 0;
                if (r.param || r.depends) {
                    var n = !0;
                    switch (typeof r.depends) {
                        case "string":
                            n = !!t(r.depends, i.form).length;
                            break;
                        case "function":
                            n = r.depends.call(i, i)
                    }
                    n ? e[s] = void 0 !== r.param ? r.param : !0 : delete e[s]
                }
            }), t.each(e, function(s, r) {
                e[s] = t.isFunction(r) ? r(i) : r
            }), t.each(["minlength", "maxlength"], function() {
                e[this] && (e[this] = Number(e[this]))
            }), t.each(["rangelength", "range"], function() {
                var i;
                e[this] && (t.isArray(e[this]) ? e[this] = [Number(e[this][0]), Number(e[this][1])] : "string" == typeof e[this] && (i = e[this].split(/[\s,]+/), e[this] = [Number(i[0]), Number(i[1])]))
            }), t.validator.autoCreateRanges && (e.min && e.max && (e.range = [e.min, e.max], delete e.min, delete e.max), e.minlength && e.maxlength && (e.rangelength = [e.minlength, e.maxlength], delete e.minlength, delete e.maxlength)), e
        },
        normalizeRule: function(e) {
            if ("string" == typeof e) {
                var i = {};
                t.each(e.split(/\s/), function() {
                    i[this] = !0
                }), e = i
            }
            return e
        },
        addMethod: function(e, i, s) {
            t.validator.methods[e] = i, t.validator.messages[e] = void 0 !== s ? s : t.validator.messages[e], 3 > i.length && t.validator.addClassRules(e, t.validator.normalizeRule(e))
        },
        methods: {
            required: function(e, i, s) {
                if (!this.depend(s, i)) return "dependency-mismatch";
                if ("select" === i.nodeName.toLowerCase()) {
                    var r = t(i).val();
                    return r && r.length > 0
                }
                return this.checkable(i) ? this.getLength(e, i) > 0 : t.trim(e).length > 0
            },
            email: function(t, e) {
                return this.optional(e) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(t)
            },
            url: function(t, e) {
                return this.optional(e) || /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(t)
            },
            date: function(t, e) {
                return this.optional(e) || !/Invalid|NaN/.test("" + new Date(t))
            },
            dateISO: function(t, e) {
                return this.optional(e) || /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/.test(t)
            },
            number: function(t, e) {
                return this.optional(e) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(t)
            },
            digits: function(t, e) {
                return this.optional(e) || /^\d+$/.test(t)
            },
            creditcard: function(t, e) {
                if (this.optional(e)) return "dependency-mismatch";
                if (/[^0-9 \-]+/.test(t)) return !1;
                var i = 0,
                    s = 0,
                    r = !1;
                t = t.replace(/\D/g, "");
                for (var n = t.length - 1; n >= 0; n--) {
                    var a = t.charAt(n);
                    s = parseInt(a, 10), r && (s *= 2) > 9 && (s -= 9), i += s, r = !r
                }
                return 0 === i % 10
            },
            minlength: function(e, i, s) {
                var r = t.isArray(e) ? e.length : this.getLength(t.trim(e), i);
                return this.optional(i) || r >= s
            },
            maxlength: function(e, i, s) {
                var r = t.isArray(e) ? e.length : this.getLength(t.trim(e), i);
                return this.optional(i) || s >= r
            },
            rangelength: function(e, i, s) {
                var r = t.isArray(e) ? e.length : this.getLength(t.trim(e), i);
                return this.optional(i) || r >= s[0] && s[1] >= r
            },
            min: function(t, e, i) {
                return this.optional(e) || t >= i
            },
            max: function(t, e, i) {
                return this.optional(e) || i >= t
            },
            range: function(t, e, i) {
                return this.optional(e) || t >= i[0] && i[1] >= t
            },
            equalTo: function(e, i, s) {
                var r = t(s);
                return this.settings.onfocusout && r.unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
                    t(i).valid()
                }), e === r.val()
            },
            remote: function(e, i, s) {
                if (this.optional(i)) return "dependency-mismatch";
                var r = this.previousValue(i);
                if (this.settings.messages[i.name] || (this.settings.messages[i.name] = {}), r.originalMessage = this.settings.messages[i.name].remote, this.settings.messages[i.name].remote = r.message, s = "string" == typeof s && {
                        url: s
                    } || s, r.old === e) return r.valid;
                r.old = e;
                var n = this;
                this.startRequest(i);
                var a = {};
                return a[i.name] = e, t.ajax(t.extend(!0, {
                    url: s,
                    mode: "abort",
                    port: "validate" + i.name,
                    dataType: "json",
                    data: a,
                    success: function(s) {
                        n.settings.messages[i.name].remote = r.originalMessage;
                        var a = s === !0 || "true" === s;
                        if (a) {
                            var u = n.formSubmitted;
                            n.prepareElement(i), n.formSubmitted = u, n.successList.push(i), delete n.invalid[i.name], n.showErrors()
                        } else {
                            var o = {},
                                l = s || n.defaultMessage(i, "remote");
                            o[i.name] = r.message = t.isFunction(l) ? l(e) : l, n.invalid[i.name] = !0, n.showErrors(o)
                        }
                        r.valid = a, n.stopRequest(i, a)
                    }
                }, s)), "pending"
            }
        }
    }), t.format = t.validator.format
})(jQuery),
function(t) {
    var e = {};
    if (t.ajaxPrefilter) t.ajaxPrefilter(function(t, i, s) {
        var r = t.port;
        "abort" === t.mode && (e[r] && e[r].abort(), e[r] = s)
    });
    else {
        var i = t.ajax;
        t.ajax = function(s) {
            var r = ("mode" in s ? s : t.ajaxSettings).mode,
                n = ("port" in s ? s : t.ajaxSettings).port;
            return "abort" === r ? (e[n] && e[n].abort(), e[n] = i.apply(this, arguments), e[n]) : i.apply(this, arguments)
        }
    }
}(jQuery),
function(t) {
    t.extend(t.fn, {
        validateDelegate: function(e, i, s) {
            return this.bind(i, function(i) {
                var r = t(i.target);
                return r.is(e) ? s.apply(r, arguments) : void 0
            })
        }
    })
}(jQuery);

/*!
 * jQuery countTo Plugin
 * https://github.com/mhuggins/jquery-countTo
 * Copyright (c) Matt Huggins; Licensed MIT
 */
! function(t) {
    function e(t, e) {
        return t.toFixed(e.decimals)
    }
    t.fn.countTo = function(e) {
        return e = e || {}, t(this).each(function() {
            function a() {
                s += l, c++, n(s), "function" == typeof o.onUpdate && o.onUpdate.call(f, s), c >= r && (i.removeData("countTo"), clearInterval(d.interval), s = o.to, "function" == typeof o.onComplete && o.onComplete.call(f, s))
            }

            function n(t) {
                var e = o.formatter.call(f, t, o);
                i.text(e)
            }
            var o = t.extend({}, t.fn.countTo.defaults, {
                    from: t(this).data("from"),
                    to: t(this).data("to"),
                    speed: t(this).data("speed"),
                    refreshInterval: t(this).data("refresh-interval"),
                    decimals: t(this).data("decimals")
                }, e),
                r = Math.ceil(o.speed / o.refreshInterval),
                l = (o.to - o.from) / r,
                f = this,
                i = t(this),
                c = 0,
                s = o.from,
                d = i.data("countTo") || {};
            i.data("countTo", d), d.interval && clearInterval(d.interval), d.interval = setInterval(a, o.refreshInterval), n(s)
        })
    }, t.fn.countTo.defaults = {
        from: 0,
        to: 0,
        speed: 1e3,
        refreshInterval: 100,
        decimals: 0,
        formatter: e,
        onUpdate: null,
        onComplete: null
    }
}(jQuery);

/*
 * jQuery.appear
 * https://github.com/bas2k/jquery.appear/
 * http://code.google.com/p/jquery-appear/
 * http://bas2k.ru/
 *
 * Copyright (c) 2009 Michael Hixson
 * Copyright (c) 2012-2014 Alexander Brovikov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 */
! function(e) {
    e.fn.appear = function(a, r) {
        var n = e.extend({
            data: void 0,
            one: !0,
            accX: 0,
            accY: 0
        }, r);
        return this.each(function() {
            var r = e(this);
            if (r.appeared = !1, !a) return void r.trigger("appear", n.data);
            var p = e(window),
                t = function() {
                    if (!r.is(":visible")) return void(r.appeared = !1);
                    var e = p.scrollLeft(),
                        a = p.scrollTop(),
                        t = r.offset(),
                        c = t.left,
                        i = t.top,
                        o = n.accX,
                        f = n.accY,
                        s = r.height(),
                        u = p.height(),
                        d = r.width(),
                        l = p.width();
                    i + s + f >= a && a + u + f >= i && c + d + o >= e && e + l + o >= c ? r.appeared || r.trigger("appear", n.data) : r.appeared = !1
                },
                c = function() {
                    if (r.appeared = !0, n.one) {
                        p.unbind("scroll", t);
                        var c = e.inArray(t, e.fn.appear.checks);
                        c >= 0 && e.fn.appear.checks.splice(c, 1)
                    }
                    a.apply(this, arguments)
                };
            n.one ? r.one("appear", n.data, c) : r.bind("appear", n.data, c), p.scroll(t), e.fn.appear.checks.push(t), t()
        })
    }, e.extend(e.fn.appear, {
        checks: [],
        timeout: null,
        checkAll: function() {
            var a = e.fn.appear.checks.length;
            if (a > 0)
                for (; a--;) e.fn.appear.checks[a]()
        },
        run: function() {
            e.fn.appear.timeout && clearTimeout(e.fn.appear.timeout), e.fn.appear.timeout = setTimeout(e.fn.appear.checkAll, 20)
        }
    }), e.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function(a, r) {
        var n = e.fn[r];
        n && (e.fn[r] = function() {
            var a = n.apply(this, arguments);
            return e.fn.appear.run(), a
        })
    })
}(jQuery);

/*!
 * Magnific Popup v0.9.9 by Dmitry Semenov
 *
 * http://bit.ly/magnific-popup#build=inline+image+ajax+iframe+gallery+retina+imagezoom+fastclick
 */
(function(a) {
    var b = "Close",
        c = "BeforeClose",
        d = "AfterClose",
        e = "BeforeAppend",
        f = "MarkupParse",
        g = "Open",
        h = "Change",
        i = "mfp",
        j = "." + i,
        k = "mfp-ready",
        l = "mfp-removing",
        m = "mfp-prevent-close",
        n, o = function() {},
        p = !!window.jQuery,
        q, r = a(window),
        s, t, u, v, w, x = function(a, b) {
            n.ev.on(i + a + j, b)
        },
        y = function(b, c, d, e) {
            var f = document.createElement("div");
            return f.className = "mfp-" + b, d && (f.innerHTML = d), e ? c && c.appendChild(f) : (f = a(f), c && f.appendTo(c)), f
        },
        z = function(b, c) {
            n.ev.triggerHandler(i + b, c), n.st.callbacks && (b = b.charAt(0).toLowerCase() + b.slice(1), n.st.callbacks[b] && n.st.callbacks[b].apply(n, a.isArray(c) ? c : [c]))
        },
        A = function(b) {
            if (b !== w || !n.currTemplate.closeBtn) n.currTemplate.closeBtn = a(n.st.closeMarkup.replace("%title%", n.st.tClose)), w = b;
            return n.currTemplate.closeBtn
        },
        B = function() {
            a.magnificPopup.instance || (n = new o, n.init(), a.magnificPopup.instance = n)
        },
        C = function() {
            var a = document.createElement("p").style,
                b = ["ms", "O", "Moz", "Webkit"];
            if (a.transition !== undefined) return !0;
            while (b.length)
                if (b.pop() + "Transition" in a) return !0;
            return !1
        };
    o.prototype = {
        constructor: o,
        init: function() {
            var b = navigator.appVersion;
            n.isIE7 = b.indexOf("MSIE 7.") !== -1, n.isIE8 = b.indexOf("MSIE 8.") !== -1, n.isLowIE = n.isIE7 || n.isIE8, n.isAndroid = /android/gi.test(b), n.isIOS = /iphone|ipad|ipod/gi.test(b), n.supportsTransition = C(), n.probablyMobile = n.isAndroid || n.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent), t = a(document), n.popupsCache = {}
        },
        open: function(b) {
            s || (s = a(document.body));
            var c;
            if (b.isObj === !1) {
                n.items = b.items.toArray(), n.index = 0;
                var d = b.items,
                    e;
                for (c = 0; c < d.length; c++) {
                    e = d[c], e.parsed && (e = e.el[0]);
                    if (e === b.el[0]) {
                        n.index = c;
                        break
                    }
                }
            } else n.items = a.isArray(b.items) ? b.items : [b.items], n.index = b.index || 0;
            if (n.isOpen) {
                n.updateItemHTML();
                return
            }
            n.types = [], v = "", b.mainEl && b.mainEl.length ? n.ev = b.mainEl.eq(0) : n.ev = t, b.key ? (n.popupsCache[b.key] || (n.popupsCache[b.key] = {}), n.currTemplate = n.popupsCache[b.key]) : n.currTemplate = {}, n.st = a.extend(!0, {}, a.magnificPopup.defaults, b), n.fixedContentPos = n.st.fixedContentPos === "auto" ? !n.probablyMobile : n.st.fixedContentPos, n.st.modal && (n.st.closeOnContentClick = !1, n.st.closeOnBgClick = !1, n.st.showCloseBtn = !1, n.st.enableEscapeKey = !1), n.bgOverlay || (n.bgOverlay = y("bg").on("click" + j, function() {
                n.close()
            }), n.wrap = y("wrap").attr("tabindex", -1).on("click" + j, function(a) {
                n._checkIfClose(a.target) && n.close()
            }), n.container = y("container", n.wrap)), n.contentContainer = y("content"), n.st.preloader && (n.preloader = y("preloader", n.container, n.st.tLoading));
            var h = a.magnificPopup.modules;
            for (c = 0; c < h.length; c++) {
                var i = h[c];
                i = i.charAt(0).toUpperCase() + i.slice(1), n["init" + i].call(n)
            }
            z("BeforeOpen"), n.st.showCloseBtn && (n.st.closeBtnInside ? (x(f, function(a, b, c, d) {
                c.close_replaceWith = A(d.type)
            }), v += " mfp-close-btn-in") : n.wrap.append(A())), n.st.alignTop && (v += " mfp-align-top"), n.fixedContentPos ? n.wrap.css({
                overflow: n.st.overflowY,
                overflowX: "hidden",
                overflowY: n.st.overflowY
            }) : n.wrap.css({
                top: r.scrollTop(),
                position: "absolute"
            }), (n.st.fixedBgPos === !1 || n.st.fixedBgPos === "auto" && !n.fixedContentPos) && n.bgOverlay.css({
                height: t.height(),
                position: "absolute"
            }), n.st.enableEscapeKey && t.on("keyup" + j, function(a) {
                a.keyCode === 27 && n.close()
            }), r.on("resize" + j, function() {
                n.updateSize()
            }), n.st.closeOnContentClick || (v += " mfp-auto-cursor"), v && n.wrap.addClass(v);
            var l = n.wH = r.height(),
                m = {};
            if (n.fixedContentPos && n._hasScrollBar(l)) {
                var o = n._getScrollbarSize();
                o && (m.marginRight = o)
            }
            n.fixedContentPos && (n.isIE7 ? a("body, html").css("overflow", "hidden") : m.overflow = "hidden");
            var p = n.st.mainClass;
            return n.isIE7 && (p += " mfp-ie7"), p && n._addClassToMFP(p), n.updateItemHTML(), z("BuildControls"), a("html").css(m), n.bgOverlay.add(n.wrap).prependTo(n.st.prependTo || s), n._lastFocusedEl = document.activeElement, setTimeout(function() {
                n.content ? (n._addClassToMFP(k), n._setFocus()) : n.bgOverlay.addClass(k), t.on("focusin" + j, n._onFocusIn)
            }, 16), n.isOpen = !0, n.updateSize(l), z(g), b
        },
        close: function() {
            if (!n.isOpen) return;
            z(c), n.isOpen = !1, n.st.removalDelay && !n.isLowIE && n.supportsTransition ? (n._addClassToMFP(l), setTimeout(function() {
                n._close()
            }, n.st.removalDelay)) : n._close()
        },
        _close: function() {
            z(b);
            var c = l + " " + k + " ";
            n.bgOverlay.detach(), n.wrap.detach(), n.container.empty(), n.st.mainClass && (c += n.st.mainClass + " "), n._removeClassFromMFP(c);
            if (n.fixedContentPos) {
                var e = {
                    marginRight: ""
                };
                n.isIE7 ? a("body, html").css("overflow", "") : e.overflow = "", a("html").css(e)
            }
            t.off("keyup" + j + " focusin" + j), n.ev.off(j), n.wrap.attr("class", "mfp-wrap").removeAttr("style"), n.bgOverlay.attr("class", "mfp-bg"), n.container.attr("class", "mfp-container"), n.st.showCloseBtn && (!n.st.closeBtnInside || n.currTemplate[n.currItem.type] === !0) && n.currTemplate.closeBtn && n.currTemplate.closeBtn.detach(), n._lastFocusedEl && a(n._lastFocusedEl).focus(), n.currItem = null, n.content = null, n.currTemplate = null, n.prevHeight = 0, z(d)
        },
        updateSize: function(a) {
            if (n.isIOS) {
                var b = document.documentElement.clientWidth / window.innerWidth,
                    c = window.innerHeight * b;
                n.wrap.css("height", c), n.wH = c
            } else n.wH = a || r.height();
            n.fixedContentPos || n.wrap.css("height", n.wH), z("Resize")
        },
        updateItemHTML: function() {
            var b = n.items[n.index];
            n.contentContainer.detach(), n.content && n.content.detach(), b.parsed || (b = n.parseEl(n.index));
            var c = b.type;
            z("BeforeChange", [n.currItem ? n.currItem.type : "", c]), n.currItem = b;
            if (!n.currTemplate[c]) {
                var d = n.st[c] ? n.st[c].markup : !1;
                z("FirstMarkupParse", d), d ? n.currTemplate[c] = a(d) : n.currTemplate[c] = !0
            }
            u && u !== b.type && n.container.removeClass("mfp-" + u + "-holder");
            var e = n["get" + c.charAt(0).toUpperCase() + c.slice(1)](b, n.currTemplate[c]);
            n.appendContent(e, c), b.preloaded = !0, z(h, b), u = b.type, n.container.prepend(n.contentContainer), z("AfterChange")
        },
        appendContent: function(a, b) {
            n.content = a, a ? n.st.showCloseBtn && n.st.closeBtnInside && n.currTemplate[b] === !0 ? n.content.find(".mfp-close").length || n.content.append(A()) : n.content = a : n.content = "", z(e), n.container.addClass("mfp-" + b + "-holder"), n.contentContainer.append(n.content)
        },
        parseEl: function(b) {
            var c = n.items[b],
                d;
            c.tagName ? c = {
                el: a(c)
            } : (d = c.type, c = {
                data: c,
                src: c.src
            });
            if (c.el) {
                var e = n.types;
                for (var f = 0; f < e.length; f++)
                    if (c.el.hasClass("mfp-" + e[f])) {
                        d = e[f];
                        break
                    }
                c.src = c.el.attr("data-mfp-src"), c.src || (c.src = c.el.attr("href"))
            }
            return c.type = d || n.st.type || "inline", c.index = b, c.parsed = !0, n.items[b] = c, z("ElementParse", c), n.items[b]
        },
        addGroup: function(a, b) {
            var c = function(c) {
                c.mfpEl = this, n._openClick(c, a, b)
            };
            b || (b = {});
            var d = "click.magnificPopup";
            b.mainEl = a, b.items ? (b.isObj = !0, a.off(d).on(d, c)) : (b.isObj = !1, b.delegate ? a.off(d).on(d, b.delegate, c) : (b.items = a, a.off(d).on(d, c)))
        },
        _openClick: function(b, c, d) {
            var e = d.midClick !== undefined ? d.midClick : a.magnificPopup.defaults.midClick;
            if (!e && (b.which === 2 || b.ctrlKey || b.metaKey)) return;
            var f = d.disableOn !== undefined ? d.disableOn : a.magnificPopup.defaults.disableOn;
            if (f)
                if (a.isFunction(f)) {
                    if (!f.call(n)) return !0
                } else if (r.width() < f) return !0;
            b.type && (b.preventDefault(), n.isOpen && b.stopPropagation()), d.el = a(b.mfpEl), d.delegate && (d.items = c.find(d.delegate)), n.open(d)
        },
        updateStatus: function(a, b) {
            if (n.preloader) {
                q !== a && n.container.removeClass("mfp-s-" + q), !b && a === "loading" && (b = n.st.tLoading);
                var c = {
                    status: a,
                    text: b
                };
                z("UpdateStatus", c), a = c.status, b = c.text, n.preloader.html(b), n.preloader.find("a").on("click", function(a) {
                    a.stopImmediatePropagation()
                }), n.container.addClass("mfp-s-" + a), q = a
            }
        },
        _checkIfClose: function(b) {
            if (a(b).hasClass(m)) return;
            var c = n.st.closeOnContentClick,
                d = n.st.closeOnBgClick;
            if (c && d) return !0;
            if (!n.content || a(b).hasClass("mfp-close") || n.preloader && b === n.preloader[0]) return !0;
            if (b !== n.content[0] && !a.contains(n.content[0], b)) {
                if (d && a.contains(document, b)) return !0
            } else if (c) return !0;
            return !1
        },
        _addClassToMFP: function(a) {
            n.bgOverlay.addClass(a), n.wrap.addClass(a)
        },
        _removeClassFromMFP: function(a) {
            this.bgOverlay.removeClass(a), n.wrap.removeClass(a)
        },
        _hasScrollBar: function(a) {
            return (n.isIE7 ? t.height() : document.body.scrollHeight) > (a || r.height())
        },
        _setFocus: function() {
            (n.st.focus ? n.content.find(n.st.focus).eq(0) : n.wrap).focus()
        },
        _onFocusIn: function(b) {
            if (b.target !== n.wrap[0] && !a.contains(n.wrap[0], b.target)) return n._setFocus(), !1
        },
        _parseMarkup: function(b, c, d) {
            var e;
            d.data && (c = a.extend(d.data, c)), z(f, [b, c, d]), a.each(c, function(a, c) {
                if (c === undefined || c === !1) return !0;
                e = a.split("_");
                if (e.length > 1) {
                    var d = b.find(j + "-" + e[0]);
                    if (d.length > 0) {
                        var f = e[1];
                        f === "replaceWith" ? d[0] !== c[0] && d.replaceWith(c) : f === "img" ? d.is("img") ? d.attr("src", c) : d.replaceWith('<img src="' + c + '" class="' + d.attr("class") + '" />') : d.attr(e[1], c)
                    }
                } else b.find(j + "-" + a).html(c)
            })
        },
        _getScrollbarSize: function() {
            if (n.scrollbarSize === undefined) {
                var a = document.createElement("div");
                a.id = "mfp-sbm", a.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;", document.body.appendChild(a), n.scrollbarSize = a.offsetWidth - a.clientWidth, document.body.removeChild(a)
            }
            return n.scrollbarSize
        }
    }, a.magnificPopup = {
        instance: null,
        proto: o.prototype,
        modules: [],
        open: function(b, c) {
            return B(), b ? b = a.extend(!0, {}, b) : b = {}, b.isObj = !0, b.index = c || 0, this.instance.open(b)
        },
        close: function() {
            return a.magnificPopup.instance && a.magnificPopup.instance.close()
        },
        registerModule: function(b, c) {
            c.options && (a.magnificPopup.defaults[b] = c.options), a.extend(this.proto, c.proto), this.modules.push(b)
        },
        defaults: {
            disableOn: 0,
            key: null,
            midClick: !1,
            mainClass: "",
            preloader: !0,
            focus: "",
            closeOnContentClick: !1,
            closeOnBgClick: !0,
            closeBtnInside: !0,
            showCloseBtn: !0,
            enableEscapeKey: !0,
            modal: !1,
            alignTop: !1,
            removalDelay: 0,
            prependTo: null,
            fixedContentPos: "auto",
            fixedBgPos: "auto",
            overflowY: "auto",
            closeMarkup: '<button title="%title%" type="button" class="mfp-close">&times;</button>',
            tClose: "Close (Esc)",
            tLoading: "Loading..."
        }
    }, a.fn.magnificPopup = function(b) {
        B();
        var c = a(this);
        if (typeof b == "string")
            if (b === "open") {
                var d, e = p ? c.data("magnificPopup") : c[0].magnificPopup,
                    f = parseInt(arguments[1], 10) || 0;
                e.items ? d = e.items[f] : (d = c, e.delegate && (d = d.find(e.delegate)), d = d.eq(f)), n._openClick({
                    mfpEl: d
                }, c, e)
            } else n.isOpen && n[b].apply(n, Array.prototype.slice.call(arguments, 1));
        else b = a.extend(!0, {}, b), p ? c.data("magnificPopup", b) : c[0].magnificPopup = b, n.addGroup(c, b);
        return c
    };
    var D = "inline",
        E, F, G, H = function() {
            G && (F.after(G.addClass(E)).detach(), G = null)
        };
    a.magnificPopup.registerModule(D, {
        options: {
            hiddenClass: "hide",
            markup: "",
            tNotFound: "Content not found"
        },
        proto: {
            initInline: function() {
                n.types.push(D), x(b + "." + D, function() {
                    H()
                })
            },
            getInline: function(b, c) {
                H();
                if (b.src) {
                    var d = n.st.inline,
                        e = a(b.src);
                    if (e.length) {
                        var f = e[0].parentNode;
                        f && f.tagName && (F || (E = d.hiddenClass, F = y(E), E = "mfp-" + E), G = e.after(F).detach().removeClass(E)), n.updateStatus("ready")
                    } else n.updateStatus("error", d.tNotFound), e = a("<div>");
                    return b.inlineElement = e, e
                }
                return n.updateStatus("ready"), n._parseMarkup(c, {}, b), c
            }
        }
    });
    var I = "ajax",
        J, K = function() {
            J && s.removeClass(J)
        },
        L = function() {
            K(), n.req && n.req.abort()
        };
    a.magnificPopup.registerModule(I, {
        options: {
            settings: null,
            cursor: "mfp-ajax-cur",
            tError: '<a href="%url%">The content</a> could not be loaded.'
        },
        proto: {
            initAjax: function() {
                n.types.push(I), J = n.st.ajax.cursor, x(b + "." + I, L), x("BeforeChange." + I, L)
            },
            getAjax: function(b) {
                J && s.addClass(J), n.updateStatus("loading");
                var c = a.extend({
                    url: b.src,
                    success: function(c, d, e) {
                        var f = {
                            data: c,
                            xhr: e
                        };
                        z("ParseAjax", f), n.appendContent(a(f.data), I), b.finished = !0, K(), n._setFocus(), setTimeout(function() {
                            n.wrap.addClass(k)
                        }, 16), n.updateStatus("ready"), z("AjaxContentAdded")
                    },
                    error: function() {
                        K(), b.finished = b.loadError = !0, n.updateStatus("error", n.st.ajax.tError.replace("%url%", b.src))
                    }
                }, n.st.ajax.settings);
                return n.req = a.ajax(c), ""
            }
        }
    });
    var M, N = function(b) {
        if (b.data && b.data.title !== undefined) return b.data.title;
        var c = n.st.image.titleSrc;
        if (c) {
            if (a.isFunction(c)) return c.call(n, b);
            if (b.el) return b.el.attr(c) || ""
        }
        return ""
    };
    a.magnificPopup.registerModule("image", {
        options: {
            markup: '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: !0,
            tError: '<a href="%url%">The image</a> could not be loaded.'
        },
        proto: {
            initImage: function() {
                var a = n.st.image,
                    c = ".image";
                n.types.push("image"), x(g + c, function() {
                    n.currItem.type === "image" && a.cursor && s.addClass(a.cursor)
                }), x(b + c, function() {
                    a.cursor && s.removeClass(a.cursor), r.off("resize" + j)
                }), x("Resize" + c, n.resizeImage), n.isLowIE && x("AfterChange", n.resizeImage)
            },
            resizeImage: function() {
                var a = n.currItem;
                if (!a || !a.img) return;
                if (n.st.image.verticalFit) {
                    var b = 0;
                    n.isLowIE && (b = parseInt(a.img.css("padding-top"), 10) + parseInt(a.img.css("padding-bottom"), 10)), a.img.css("max-height", n.wH - b)
                }
            },
            _onImageHasSize: function(a) {
                a.img && (a.hasSize = !0, M && clearInterval(M), a.isCheckingImgSize = !1, z("ImageHasSize", a), a.imgHidden && (n.content && n.content.removeClass("mfp-loading"), a.imgHidden = !1))
            },
            findImageSize: function(a) {
                var b = 0,
                    c = a.img[0],
                    d = function(e) {
                        M && clearInterval(M), M = setInterval(function() {
                            if (c.naturalWidth > 0) {
                                n._onImageHasSize(a);
                                return
                            }
                            b > 200 && clearInterval(M), b++, b === 3 ? d(10) : b === 40 ? d(50) : b === 100 && d(500)
                        }, e)
                    };
                d(1)
            },
            getImage: function(b, c) {
                var d = 0,
                    e = function() {
                        b && (b.img[0].complete ? (b.img.off(".mfploader"), b === n.currItem && (n._onImageHasSize(b), n.updateStatus("ready")), b.hasSize = !0, b.loaded = !0, z("ImageLoadComplete")) : (d++, d < 200 ? setTimeout(e, 100) : f()))
                    },
                    f = function() {
                        b && (b.img.off(".mfploader"), b === n.currItem && (n._onImageHasSize(b), n.updateStatus("error", g.tError.replace("%url%", b.src))), b.hasSize = !0, b.loaded = !0, b.loadError = !0)
                    },
                    g = n.st.image,
                    h = c.find(".mfp-img");
                if (h.length) {
                    var i = document.createElement("img");
                    i.className = "mfp-img", b.img = a(i).on("load.mfploader", e).on("error.mfploader", f), i.src = b.src, h.is("img") && (b.img = b.img.clone()), i = b.img[0], i.naturalWidth > 0 ? b.hasSize = !0 : i.width || (b.hasSize = !1)
                }
                return n._parseMarkup(c, {
                    title: N(b),
                    img_replaceWith: b.img
                }, b), n.resizeImage(), b.hasSize ? (M && clearInterval(M), b.loadError ? (c.addClass("mfp-loading"), n.updateStatus("error", g.tError.replace("%url%", b.src))) : (c.removeClass("mfp-loading"), n.updateStatus("ready")), c) : (n.updateStatus("loading"), b.loading = !0, b.hasSize || (b.imgHidden = !0, c.addClass("mfp-loading"), n.findImageSize(b)), c)
            }
        }
    });
    var O, P = function() {
        return O === undefined && (O = document.createElement("p").style.MozTransform !== undefined), O
    };
    a.magnificPopup.registerModule("zoom", {
        options: {
            enabled: !1,
            easing: "ease-in-out",
            duration: 300,
            opener: function(a) {
                return a.is("img") ? a : a.find("img")
            }
        },
        proto: {
            initZoom: function() {
                var a = n.st.zoom,
                    d = ".zoom",
                    e;
                if (!a.enabled || !n.supportsTransition) return;
                var f = a.duration,
                    g = function(b) {
                        var c = b.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),
                            d = "all " + a.duration / 1e3 + "s " + a.easing,
                            e = {
                                position: "fixed",
                                zIndex: 9999,
                                left: 0,
                                top: 0,
                                "-webkit-backface-visibility": "hidden"
                            },
                            f = "transition";
                        return e["-webkit-" + f] = e["-moz-" + f] = e["-o-" + f] = e[f] = d, c.css(e), c
                    },
                    h = function() {
                        n.content.css("visibility", "visible")
                    },
                    i, j;
                x("BuildControls" + d, function() {
                    if (n._allowZoom()) {
                        clearTimeout(i), n.content.css("visibility", "hidden"), e = n._getItemToZoom();
                        if (!e) {
                            h();
                            return
                        }
                        j = g(e), j.css(n._getOffset()), n.wrap.append(j), i = setTimeout(function() {
                            j.css(n._getOffset(!0)), i = setTimeout(function() {
                                h(), setTimeout(function() {
                                    j.remove(), e = j = null, z("ZoomAnimationEnded")
                                }, 16)
                            }, f)
                        }, 16)
                    }
                }), x(c + d, function() {
                    if (n._allowZoom()) {
                        clearTimeout(i), n.st.removalDelay = f;
                        if (!e) {
                            e = n._getItemToZoom();
                            if (!e) return;
                            j = g(e)
                        }
                        j.css(n._getOffset(!0)), n.wrap.append(j), n.content.css("visibility", "hidden"), setTimeout(function() {
                            j.css(n._getOffset())
                        }, 16)
                    }
                }), x(b + d, function() {
                    n._allowZoom() && (h(), j && j.remove(), e = null)
                })
            },
            _allowZoom: function() {
                return n.currItem.type === "image"
            },
            _getItemToZoom: function() {
                return n.currItem.hasSize ? n.currItem.img : !1
            },
            _getOffset: function(b) {
                var c;
                b ? c = n.currItem.img : c = n.st.zoom.opener(n.currItem.el || n.currItem);
                var d = c.offset(),
                    e = parseInt(c.css("padding-top"), 10),
                    f = parseInt(c.css("padding-bottom"), 10);
                d.top -= a(window).scrollTop() - e;
                var g = {
                    width: c.width(),
                    height: (p ? c.innerHeight() : c[0].offsetHeight) - f - e
                };
                return P() ? g["-moz-transform"] = g.transform = "translate(" + d.left + "px," + d.top + "px)" : (g.left = d.left, g.top = d.top), g
            }
        }
    });
    var Q = "iframe",
        R = "//about:blank",
        S = function(a) {
            if (n.currTemplate[Q]) {
                var b = n.currTemplate[Q].find("iframe");
                b.length && (a || (b[0].src = R), n.isIE8 && b.css("display", a ? "block" : "none"))
            }
        };
    a.magnificPopup.registerModule(Q, {
        options: {
            markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
            srcAction: "iframe_src",
            patterns: {
                youtube: {
                    index: "youtube.com",
                    id: "v=",
                    src: "//www.youtube.com/embed/%id%?autoplay=1"
                },
                vimeo: {
                    index: "vimeo.com/",
                    id: "/",
                    src: "//player.vimeo.com/video/%id%?autoplay=1"
                },
                gmaps: {
                    index: "//maps.google.",
                    src: "%id%&output=embed"
                }
            }
        },
        proto: {
            initIframe: function() {
                n.types.push(Q), x("BeforeChange", function(a, b, c) {
                    b !== c && (b === Q ? S() : c === Q && S(!0))
                }), x(b + "." + Q, function() {
                    S()
                })
            },
            getIframe: function(b, c) {
                var d = b.src,
                    e = n.st.iframe;
                a.each(e.patterns, function() {
                    if (d.indexOf(this.index) > -1) return this.id && (typeof this.id == "string" ? d = d.substr(d.lastIndexOf(this.id) + this.id.length, d.length) : d = this.id.call(this, d)), d = this.src.replace("%id%", d), !1
                });
                var f = {};
                return e.srcAction && (f[e.srcAction] = d), n._parseMarkup(c, f, b), n.updateStatus("ready"), c
            }
        }
    });
    var T = function(a) {
            var b = n.items.length;
            return a > b - 1 ? a - b : a < 0 ? b + a : a
        },
        U = function(a, b, c) {
            return a.replace(/%curr%/gi, b + 1).replace(/%total%/gi, c)
        };
    a.magnificPopup.registerModule("gallery", {
        options: {
            enabled: !1,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            preload: [0, 2],
            navigateByImgClick: !0,
            arrows: !0,
            tPrev: "Previous (Left arrow key)",
            tNext: "Next (Right arrow key)",
            tCounter: "%curr% of %total%"
        },
        proto: {
            initGallery: function() {
                var c = n.st.gallery,
                    d = ".mfp-gallery",
                    e = Boolean(a.fn.mfpFastClick);
                n.direction = !0;
                if (!c || !c.enabled) return !1;
                v += " mfp-gallery", x(g + d, function() {
                    c.navigateByImgClick && n.wrap.on("click" + d, ".mfp-img", function() {
                        if (n.items.length > 1) return n.next(), !1
                    }), t.on("keydown" + d, function(a) {
                        a.keyCode === 37 ? n.prev() : a.keyCode === 39 && n.next()
                    })
                }), x("UpdateStatus" + d, function(a, b) {
                    b.text && (b.text = U(b.text, n.currItem.index, n.items.length))
                }), x(f + d, function(a, b, d, e) {
                    var f = n.items.length;
                    d.counter = f > 1 ? U(c.tCounter, e.index, f) : ""
                }), x("BuildControls" + d, function() {
                    if (n.items.length > 1 && c.arrows && !n.arrowLeft) {
                        var b = c.arrowMarkup,
                            d = n.arrowLeft = a(b.replace(/%title%/gi, c.tPrev).replace(/%dir%/gi, "left")).addClass(m),
                            f = n.arrowRight = a(b.replace(/%title%/gi, c.tNext).replace(/%dir%/gi, "right")).addClass(m),
                            g = e ? "mfpFastClick" : "click";
                        d[g](function() {
                            n.prev()
                        }), f[g](function() {
                            n.next()
                        }), n.isIE7 && (y("b", d[0], !1, !0), y("a", d[0], !1, !0), y("b", f[0], !1, !0), y("a", f[0], !1, !0)), n.container.append(d.add(f))
                    }
                }), x(h + d, function() {
                    n._preloadTimeout && clearTimeout(n._preloadTimeout), n._preloadTimeout = setTimeout(function() {
                        n.preloadNearbyImages(), n._preloadTimeout = null
                    }, 16)
                }), x(b + d, function() {
                    t.off(d), n.wrap.off("click" + d), n.arrowLeft && e && n.arrowLeft.add(n.arrowRight).destroyMfpFastClick(), n.arrowRight = n.arrowLeft = null
                })
            },
            next: function() {
                n.direction = !0, n.index = T(n.index + 1), n.updateItemHTML()
            },
            prev: function() {
                n.direction = !1, n.index = T(n.index - 1), n.updateItemHTML()
            },
            goTo: function(a) {
                n.direction = a >= n.index, n.index = a, n.updateItemHTML()
            },
            preloadNearbyImages: function() {
                var a = n.st.gallery.preload,
                    b = Math.min(a[0], n.items.length),
                    c = Math.min(a[1], n.items.length),
                    d;
                for (d = 1; d <= (n.direction ? c : b); d++) n._preloadItem(n.index + d);
                for (d = 1; d <= (n.direction ? b : c); d++) n._preloadItem(n.index - d)
            },
            _preloadItem: function(b) {
                b = T(b);
                if (n.items[b].preloaded) return;
                var c = n.items[b];
                c.parsed || (c = n.parseEl(b)), z("LazyLoad", c), c.type === "image" && (c.img = a('<img class="mfp-img" />').on("load.mfploader", function() {
                    c.hasSize = !0
                }).on("error.mfploader", function() {
                    c.hasSize = !0, c.loadError = !0, z("LazyLoadError", c)
                }).attr("src", c.src)), c.preloaded = !0
            }
        }
    });
    var V = "retina";
    a.magnificPopup.registerModule(V, {
            options: {
                replaceSrc: function(a) {
                    return a.src.replace(/\.\w+$/, function(a) {
                        return "@2x" + a
                    })
                },
                ratio: 1
            },
            proto: {
                initRetina: function() {
                    if (window.devicePixelRatio > 1) {
                        var a = n.st.retina,
                            b = a.ratio;
                        b = isNaN(b) ? b() : b, b > 1 && (x("ImageHasSize." + V, function(a, c) {
                            c.img.css({
                                "max-width": c.img[0].naturalWidth / b,
                                width: "100%"
                            })
                        }), x("ElementParse." + V, function(c, d) {
                            d.src = a.replaceSrc(d, b)
                        }))
                    }
                }
            }
        }),
        function() {
            var b = 1e3,
                c = "ontouchstart" in window,
                d = function() {
                    r.off("touchmove" + f + " touchend" + f)
                },
                e = "mfpFastClick",
                f = "." + e;
            a.fn.mfpFastClick = function(e) {
                return a(this).each(function() {
                    var g = a(this),
                        h;
                    if (c) {
                        var i, j, k, l, m, n;
                        g.on("touchstart" + f, function(a) {
                            l = !1, n = 1, m = a.originalEvent ? a.originalEvent.touches[0] : a.touches[0], j = m.clientX, k = m.clientY, r.on("touchmove" + f, function(a) {
                                m = a.originalEvent ? a.originalEvent.touches : a.touches, n = m.length, m = m[0];
                                if (Math.abs(m.clientX - j) > 10 || Math.abs(m.clientY - k) > 10) l = !0, d()
                            }).on("touchend" + f, function(a) {
                                d();
                                if (l || n > 1) return;
                                h = !0, a.preventDefault(), clearTimeout(i), i = setTimeout(function() {
                                    h = !1
                                }, b), e()
                            })
                        })
                    }
                    g.on("click" + f, function() {
                        h || e()
                    })
                })
            }, a.fn.destroyMfpFastClick = function() {
                a(this).off("touchstart" + f + " click" + f), c && r.off("touchmove" + f + " touchend" + f)
            }
        }(), B()
})(window.jQuery || window.Zepto);


/*! iFrame Resizer (iframeSizer.min.js ) - v3.3.3 - 2015-09-23
 *  Desc: Force cross domain iframes to size to content.
 *  Requires: iframeResizer.contentWindow.min.js to be loaded into the target frame.
 *  Copyright: (c) 2015 David J. Bradshaw - dave@bradshaw.net
 *  License: MIT
 */

! function(a) {
    "use strict";

    function b(b, c, d) {
        "addEventListener" in a ? b.addEventListener(c, d, !1) : "attachEvent" in a && b.attachEvent("on" + c, d)
    }

    function c() {
        var b, c = ["moz", "webkit", "o", "ms"];
        for (b = 0; b < c.length && !M; b += 1) M = a[c[b] + "RequestAnimationFrame"];
        M || g("setup", "RequestAnimationFrame not supported")
    }

    function d(b) {
        var c = "Host page: " + b;
        return a.top !== a.self && (c = a.parentIFrame && a.parentIFrame.getId ? a.parentIFrame.getId() + ": " + b : "Nested host page: " + b), c
    }

    function e(a) {
        return J + "[" + d(a) + "]"
    }

    function f(a) {
        return O[a] ? O[a].log : F
    }

    function g(a, b) {
        j("log", a, b, f(a))
    }

    function h(a, b) {
        j("info", a, b, f(a))
    }

    function i(a, b) {
        j("warn", a, b, !0)
    }

    function j(b, c, d, f) {
        !0 === f && "object" == typeof a.console && console[b](e(c), d)
    }

    function k(b) {
        function c() {
            function a() {
                r(M), o(N)
            }
            e("Height"), e("Width"), s(a, M, "init")
        }

        function d() {
            var a = H.substr(K).split(":");
            return {
                iframe: O[a[0]].iframe,
                id: a[0],
                height: a[1],
                width: a[2],
                type: a[3]
            }
        }

        function e(a) {
            var b = Number(O[N]["max" + a]),
                c = Number(O[N]["min" + a]),
                d = a.toLowerCase(),
                e = Number(M[d]);
            g(N, "Checking " + d + " is in range " + c + "-" + b), c > e && (e = c, g(N, "Set " + d + " to min value")), e > b && (e = b, g(N, "Set " + d + " to max value")), M[d] = "" + e
        }

        function f() {
            function a() {
                function a() {
                    var a = 0,
                        b = !1;
                    for (g(N, "Checking connection is from allowed list of origins: " + d); a < d.length; a++)
                        if (d[a] === c) {
                            b = !0;
                            break
                        }
                    return b
                }

                function b() {
                    var a = O[N].remoteHost;
                    return g(N, "Checking connection is from: " + a), c === a
                }
                return d.constructor === Array ? a() : b()
            }
            var c = b.origin,
                d = O[N].checkOrigin;
            if (d && "" + c != "null" && !a()) throw new Error("Unexpected message received from: " + c + " for " + M.iframe.id + ". Message was: " + b.data + ". This error can be disabled by setting the checkOrigin: false option or by providing of array of trusted domains.");
            return !0
        }

        function j() {
            return J === ("" + H).substr(0, K) && H.substr(K).split(":")[0] in O
        }

        function k() {
            var a = M.type in {
                "true": 1,
                "false": 1,
                undefined: 1
            };
            return a && g(N, "Ignoring init message from meta parent page"), a
        }

        function v(a) {
            return H.substr(H.indexOf(":") + I + a)
        }

        function w(a) {
            g(N, "MessageCallback passed: {iframe: " + M.iframe.id + ", message: " + a + "}"), C("messageCallback", {
                iframe: M.iframe,
                message: JSON.parse(a)
            }), g(N, "--")
        }

        function x() {
            var a = !0;
            return null === M.iframe && (i(N, "IFrame (" + M.id + ") not found"), a = !1), a
        }

        function y(a) {
            var b = a.getBoundingClientRect();
            return n(N), {
                x: Math.floor(Number(b.left) + Number(L.x)),
                y: Math.floor(Number(b.top) + Number(L.y))
            }
        }

        function z(b) {
            function c() {
                L = h, A(), g(N, "--")
            }

            function d() {
                return {
                    x: Number(M.width) + f.x,
                    y: Number(M.height) + f.y
                }
            }

            function e() {
                a.parentIFrame ? a.parentIFrame["scrollTo" + (b ? "Offset" : "")](h.x, h.y) : i(N, "Unable to scroll to requested position, window.parentIFrame not found")
            }
            var f = b ? y(M.iframe) : {
                    x: 0,
                    y: 0
                },
                h = d();
            g(N, "Reposition requested from iFrame (offset x:" + f.x + " y:" + f.y + ")"), a.top !== a.self ? e() : c()
        }

        function A() {
            !1 !== C("scrollCallback", L) ? o(N) : p()
        }

        function B(b) {
            function c() {
                var a = y(h);
                g(N, "Moving to in page link (#" + e + ") at x: " + a.x + " y: " + a.y), L = {
                    x: a.x,
                    y: a.y
                }, A(), g(N, "--")
            }

            function d() {
                a.parentIFrame ? a.parentIFrame.moveToAnchor(e) : g(N, "In page link #" + e + " not found and window.parentIFrame not found")
            }
            var e = b.split("#")[1] || "",
                f = decodeURIComponent(e),
                h = document.getElementById(f) || document.getElementsByName(f)[0];
            h ? c() : a.top !== a.self ? d() : g(N, "In page link #" + e + " not found")
        }

        function C(a, b) {
            return l(N, a, b)
        }

        function D() {
            switch (O[N].firstRun && G(), M.type) {
                case "close":
                    m(M.iframe);
                    break;
                case "message":
                    w(v(6));
                    break;
                case "scrollTo":
                    z(!1);
                    break;
                case "scrollToOffset":
                    z(!0);
                    break;
                case "inPageLink":
                    B(v(9));
                    break;
                case "reset":
                    q(M);
                    break;
                case "init":
                    c(), C("initCallback", M.iframe), C("resizedCallback", M);
                    break;
                default:
                    c(), C("resizedCallback", M)
            }
        }

        function E(a) {
            var b = !0;
            return O[a] || (b = !1, i(M.type + " No settings for " + a + ". Message was: " + H)), b
        }

        function F() {
            for (var a in O) t("iFrame requested init", u(a), document.getElementById(a), a)
        }

        function G() {
            O[N].firstRun = !1
        }
        var H = b.data,
            M = {},
            N = null;
        "[iFrameResizerChild]Ready" === H ? F() : j() ? (M = d(), N = Q = M.id, !k() && E(N) && (g(N, "Received: " + H), x() && f() && D())) : h(N, "Ignored: " + H)
    }

    function l(a, b, c) {
        var d = null,
            e = null;
        if (O[a]) {
            if (d = O[a][b], "function" != typeof d) throw new TypeError(b + " on iFrame[" + a + "] is not a function");
            e = d(c)
        }
        return e
    }

    function m(a) {
        var b = a.id;
        g(b, "Removing iFrame: " + b), a.parentNode.removeChild(a), l(b, "closedCallback", b), g(b, "--"), delete O[b]
    }

    function n(b) {
        null === L && (L = {
            x: void 0 !== a.pageXOffset ? a.pageXOffset : document.documentElement.scrollLeft,
            y: void 0 !== a.pageYOffset ? a.pageYOffset : document.documentElement.scrollTop
        }, g(b, "Get page position: " + L.x + "," + L.y))
    }

    function o(b) {
        null !== L && (a.scrollTo(L.x, L.y), g(b, "Set page position: " + L.x + "," + L.y), p())
    }

    function p() {
        L = null
    }

    function q(a) {
        function b() {
            r(a), t("reset", "reset", a.iframe, a.id)
        }
        g(a.id, "Size reset requested by " + ("init" === a.type ? "host page" : "iFrame")), n(a.id), s(b, a, "reset")
    }

    function r(a) {
        function b(b) {
            a.iframe.style[b] = a[b] + "px", g(a.id, "IFrame (" + e + ") " + b + " set to " + a[b] + "px")
        }

        function c(b) {
            G || "0" !== a[b] || (G = !0, g(e, "Hidden iFrame detected, creating visibility listener"), x())
        }

        function d(a) {
            b(a), c(a)
        }
        var e = a.iframe.id;
        O[e] && (O[e].sizeHeight && d("height"), O[e].sizeWidth && d("width"))
    }

    function s(a, b, c) {
        c !== b.type && M ? (g(b.id, "Requesting animation frame"), M(a)) : a()
    }

    function t(a, b, c, d) {
        function e() {
            g(d, "[" + a + "] Sending msg to iframe[" + d + "] (" + b + ") targetOrigin: " + i), c.contentWindow.postMessage(J + b, i)
        }

        function f() {
            h(d, "[" + a + "] IFrame(" + d + ") not found"), O[d] && delete O[d]
        }
        d = d || c.id;
        var i = O[d].targetOrigin;
        c && "contentWindow" in c ? e() : f()
    }

    function u(a) {
        return a + ":" + O[a].bodyMarginV1 + ":" + O[a].sizeWidth + ":" + O[a].log + ":" + O[a].interval + ":" + O[a].enablePublicMethods + ":" + O[a].autoResize + ":" + O[a].bodyMargin + ":" + O[a].heightCalculationMethod + ":" + O[a].bodyBackground + ":" + O[a].bodyPadding + ":" + O[a].tolerance + ":" + O[a].inPageLinks + ":" + O[a].resizeFrom + ":" + O[a].widthCalculationMethod
    }

    function v(a, c) {
        function d() {
            function b(b) {
                1 / 0 !== O[w][b] && 0 !== O[w][b] && (a.style[b] = O[w][b] + "px", g(w, "Set " + b + " = " + O[w][b] + "px"))
            }

            function c(a) {
                if (O[w]["min" + a] > O[w]["max" + a]) throw new Error("Value for min" + a + " can not be greater than max" + a)
            }
            c("Height"), c("Width"), b("maxHeight"), b("minHeight"), b("maxWidth"), b("minWidth")
        }

        function e() {
            var a = c.id || R.id + E++;
            return null !== document.getElementById(a) && (a += E++), a
        }

        function f(b) {
            return Q = b, "" === b && (a.id = b = e(), F = (c || {}).log, Q = b, g(b, "Added missing iframe ID: " + b + " (" + a.src + ")")), b
        }

        function h() {
            g(w, "IFrame scrolling " + (O[w].scrolling ? "enabled" : "disabled") + " for " + w), a.style.overflow = !1 === O[w].scrolling ? "hidden" : "auto", a.scrolling = !1 === O[w].scrolling ? "no" : "yes"
        }

        function j() {
            ("number" == typeof O[w].bodyMargin || "0" === O[w].bodyMargin) && (O[w].bodyMarginV1 = O[w].bodyMargin, O[w].bodyMargin = "" + O[w].bodyMargin + "px")
        }

        function k() {
            var b = O[w].firstRun,
                c = O[w].heightCalculationMethod in N;
            !b && c && q({
                iframe: a,
                height: 0,
                width: 0,
                type: "init"
            })
        }

        function l() {
            Function.prototype.bind && (O[w].iframe.iFrameResizer = {
                close: m.bind(null, O[w].iframe),
                resize: t.bind(null, "Window resize", "resize", O[w].iframe),
                moveToAnchor: function(a) {
                    t("Move to anchor", "inPageLink:" + a, O[w].iframe, w)
                },
                sendMessage: function(a) {
                    a = JSON.stringify(a), t("Send Message", "message:" + a, O[w].iframe, w)
                }
            })
        }

        function n(c) {
            function d() {
                t("iFrame.onload", c, a), k()
            }
            b(a, "load", d), t("init", c, a)
        }

        function o(a) {
            if ("object" != typeof a) throw new TypeError("Options is not an object")
        }

        function p(a) {
            for (var b in R) R.hasOwnProperty(b) && (O[w][b] = a.hasOwnProperty(b) ? a[b] : R[b])
        }

        function r(a) {
            return "" === a || "file://" === a ? "*" : a
        }

        function s(b) {
            b = b || {}, O[w] = {
                firstRun: !0,
                iframe: a,
                remoteHost: a.src.split("/").slice(0, 3).join("/")
            }, o(b), p(b), O[w].targetOrigin = !0 === O[w].checkOrigin ? r(O[w].remoteHost) : "*"
        }

        function v() {
            return w in O && "iFrameResizer" in a
        }
        var w = f(a.id);
        v() ? i(w, "Ignored iFrame, already setup.") : (s(c), h(), d(), j(), n(u(w)), l())
    }

    function w(a, b) {
        null === P && (P = setTimeout(function() {
            P = null, a()
        }, b))
    }

    function x() {
        function b() {
            function a(a) {
                function b(b) {
                    return "0px" === O[a].iframe.style[b]
                }

                function c(a) {
                    return null !== a.offsetParent
                }
                c(O[a].iframe) && (b("height") || b("width")) && t("Visibility change", "resize", O[a].iframe, a)
            }
            for (var b in O) a(b)
        }

        function c(a) {
            g("window", "Mutation observed: " + a[0].target + " " + a[0].type), w(b, 16)
        }

        function d() {
            var a = document.querySelector("body"),
                b = {
                    attributes: !0,
                    attributeOldValue: !1,
                    characterData: !0,
                    characterDataOldValue: !1,
                    childList: !0,
                    subtree: !0
                },
                d = new e(c);
            d.observe(a, b)
        }
        var e = a.MutationObserver || a.WebKitMutationObserver;
        e && d()
    }

    function y(a) {
        function b() {
            A("Window " + a, "resize")
        }
        g("window", "Trigger event: " + a), w(b, 16)
    }

    function z() {
        function a() {
            A("Tab Visable", "resize")
        }
        "hidden" !== document.visibilityState && (g("document", "Trigger event: Visiblity change"), w(a, 16))
    }

    function A(a, b) {
        function c(a) {
            return "parent" === O[a].resizeFrom && O[a].autoResize && !O[a].firstRun
        }
        for (var d in O) c(d) && t(a, b, document.getElementById(d), d)
    }

    function B() {
        b(a, "message", k), b(a, "resize", function() {
            y("resize")
        }), b(document, "visibilitychange", z), b(document, "-webkit-visibilitychange", z), b(a, "focusin", function() {
            y("focus")
        }), b(a, "focus", function() {
            y("focus")
        })
    }

    function C() {
        function a(a, c) {
            if (c) {
                if (!c.tagName) throw new TypeError("Object is not a valid DOM element");
                if ("IFRAME" !== c.tagName.toUpperCase()) throw new TypeError("Expected <IFRAME> tag, found <" + c.tagName + ">");
                v(c, a), b.push(c)
            }
        }
        var b;
        return c(), B(),
            function(c, d) {
                switch (b = [], typeof d) {
                    case "undefined":
                    case "string":
                        Array.prototype.forEach.call(document.querySelectorAll(d || "iframe"), a.bind(void 0, c));
                        break;
                    case "object":
                        a(c, d);
                        break;
                    default:
                        throw new TypeError("Unexpected data type (" + typeof d + ")")
                }
                return b
            }
    }

    function D(a) {
        a.fn.iFrameResize = function(a) {
            return this.filter("iframe").each(function(b, c) {
                v(c, a)
            }).end()
        }
    }
    var E = 0,
        F = !1,
        G = !1,
        H = "message",
        I = H.length,
        J = "[iFrameSizer]",
        K = J.length,
        L = null,
        M = a.requestAnimationFrame,
        N = {
            max: 1,
            scroll: 1,
            bodyScroll: 1,
            documentElementScroll: 1
        },
        O = {},
        P = null,
        Q = "Host Page",
        R = {
            autoResize: !0,
            bodyBackground: null,
            bodyMargin: null,
            bodyMarginV1: 8,
            bodyPadding: null,
            checkOrigin: !0,
            inPageLinks: !1,
            enablePublicMethods: !0,
            heightCalculationMethod: "bodyOffset",
            id: "iFrameResizer",
            interval: 32,
            log: !1,
            maxHeight: 1 / 0,
            maxWidth: 1 / 0,
            minHeight: 0,
            minWidth: 0,
            resizeFrom: "parent",
            scrolling: !1,
            sizeHeight: !0,
            sizeWidth: !1,
            tolerance: 0,
            widthCalculationMethod: "scroll",
            closedCallback: function() {},
            initCallback: function() {},
            messageCallback: function() {
                i("MessageCallback function not defined")
            },
            resizedCallback: function() {},
            scrollCallback: function() {
                return !0
            }
        };
    a.jQuery && D(jQuery), "function" == typeof define && define.amd ? define([], C) : "object" == typeof module && "object" == typeof module.exports ? module.exports = C() : a.iFrameResize = a.iFrameResize || C()
}(window || {});
//# sourceMappingURL=iframeResizer.map

/*! iFrame Resizer (iframeSizer.contentWindow.min.js) - v3.3.3 - 2015-09-23
 *  Desc: Include this file in any page being loaded into an iframe
 *        to force the iframe to resize to the content size.
 *  Requires: iframeResizer.min.js on host page.
 *  Copyright: (c) 2015 David J. Bradshaw - dave@bradshaw.net
 *  License: MIT
 */

! function(a) {
    "use strict";

    function b(b, c, d) {
        "addEventListener" in a ? b.addEventListener(c, d, !1) : "attachEvent" in a && b.attachEvent("on" + c, d)
    }

    function c(b, c, d) {
        "removeEventListener" in a ? b.removeEventListener(c, d, !1) : "detachEvent" in a && b.detachEvent("on" + c, d)
    }

    function d(a) {
        return a.charAt(0).toUpperCase() + a.slice(1)
    }

    function e(a) {
        var b, c, d, e = null,
            f = 0,
            g = function() {
                f = Ea(), e = null, d = a.apply(b, c), e || (b = c = null)
            };
        return function() {
            var h = Ea();
            f || (f = h);
            var i = xa - (h - f);
            return b = this, c = arguments, 0 >= i || i > xa ? (e && (clearTimeout(e), e = null), f = h, d = a.apply(b, c), e || (b = c = null)) : e || (e = setTimeout(g, i)), d
        }
    }

    function f(a) {
        return ma + "[" + oa + "] " + a
    }

    function g(b) {
        la && "object" == typeof a.console && console.log(f(b))
    }

    function h(b) {
        "object" == typeof a.console && console.warn(f(b))
    }

    function i() {
        j(), g("Initialising iFrame (" + location.href + ")"), k(), n(), m("background", W), m("padding", $), A(), s(), t(), o(), C(), u(), ia = B(), N("init", "Init message from host page"), Da()
    }

    function j() {
        function a(a) {
            return "true" === a ? !0 : !1
        }
        var b = ha.substr(na).split(":");
        oa = b[0], X = void 0 !== b[1] ? Number(b[1]) : X, _ = void 0 !== b[2] ? a(b[2]) : _, la = void 0 !== b[3] ? a(b[3]) : la, ja = void 0 !== b[4] ? Number(b[4]) : ja, U = void 0 !== b[6] ? a(b[6]) : U, Y = b[7], fa = void 0 !== b[8] ? b[8] : fa, W = b[9], $ = b[10], ua = void 0 !== b[11] ? Number(b[11]) : ua, ia.enable = void 0 !== b[12] ? a(b[12]) : !1, qa = void 0 !== b[13] ? b[13] : qa, Aa = void 0 !== b[14] ? b[14] : Aa
    }

    function k() {
        function b() {
            var b = a.iFrameResizer;
            g("Reading data from page: " + JSON.stringify(b)), Ca = "messageCallback" in b ? b.messageCallback : Ca, Da = "readyCallback" in b ? b.readyCallback : Da, ta = "targetOrigin" in b ? b.targetOrigin : ta, fa = "heightCalculationMethod" in b ? b.heightCalculationMethod : fa, Aa = "widthCalculationMethod" in b ? b.widthCalculationMethod : Aa
        }
        "iFrameResizer" in a && Object === a.iFrameResizer.constructor && b(), g("TargetOrigin for parent set to: " + ta)
    }

    function l(a, b) {
        return -1 !== b.indexOf("-") && (h("Negative CSS value ignored for " + a), b = ""), b
    }

    function m(a, b) {
        void 0 !== b && "" !== b && "null" !== b && (document.body.style[a] = b, g("Body " + a + ' set to "' + b + '"'))
    }

    function n() {
        void 0 === Y && (Y = X + "px"), m("margin", l("margin", Y))
    }

    function o() {
        document.documentElement.style.height = "", document.body.style.height = "", g('HTML & body height set to "auto"')
    }

    function p(e) {
        function f() {
            N(e.eventName, e.eventType)
        }
        var h = {
            add: function(c) {
                b(a, c, f)
            },
            remove: function(b) {
                c(a, b, f)
            }
        };
        e.eventNames && Array.prototype.map ? (e.eventName = e.eventNames[0], e.eventNames.map(h[e.method])) : h[e.method](e.eventName), g(d(e.method) + " event listener: " + e.eventType)
    }

    function q(a) {
        p({
            method: a,
            eventType: "Animation Start",
            eventNames: ["animationstart", "webkitAnimationStart"]
        }), p({
            method: a,
            eventType: "Animation Iteration",
            eventNames: ["animationiteration", "webkitAnimationIteration"]
        }), p({
            method: a,
            eventType: "Animation End",
            eventNames: ["animationend", "webkitAnimationEnd"]
        }), p({
            method: a,
            eventType: "Input",
            eventName: "input"
        }), p({
            method: a,
            eventType: "Mouse Up",
            eventName: "mouseup"
        }), p({
            method: a,
            eventType: "Mouse Down",
            eventName: "mousedown"
        }), p({
            method: a,
            eventType: "Orientation Change",
            eventName: "orientationchange"
        }), p({
            method: a,
            eventType: "Touch Start",
            eventName: "touchstart"
        }), p({
            method: a,
            eventType: "Touch End",
            eventName: "touchend"
        }), p({
            method: a,
            eventType: "Touch Cancel",
            eventName: "touchcancel"
        }), p({
            method: a,
            eventType: "Print",
            eventName: ["afterprint", "beforeprint"]
        }), p({
            method: a,
            eventType: "Transition Start",
            eventNames: ["transitionstart", "webkitTransitionStart", "MSTransitionStart", "oTransitionStart", "otransitionstart"]
        }), p({
            method: a,
            eventType: "Transition Iteration",
            eventNames: ["transitioniteration", "webkitTransitionIteration", "MSTransitionIteration", "oTransitionIteration", "otransitioniteration"]
        }), p({
            method: a,
            eventType: "Transition End",
            eventNames: ["transitionend", "webkitTransitionEnd", "MSTransitionEnd", "oTransitionEnd", "otransitionend"]
        }), "child" === qa && p({
            method: a,
            eventType: "IFrame Resized",
            eventName: "resize"
        })
    }

    function r(a, b, c, d) {
        return b !== a && (a in c || (h(a + " is not a valid option for " + d + "CalculationMethod."), a = b), g(d + ' calculation method set to "' + a + '"')), a
    }

    function s() {
        fa = r(fa, ea, Fa, "height")
    }

    function t() {
        Aa = r(Aa, za, Ga, "width")
    }

    function u() {
        !0 === U ? (q("add"), F()) : g("Auto Resize disabled")
    }

    function v() {
        g("Disable outgoing messages"), ra = !1
    }

    function w() {
        g("Remove event listener: Message"), c(a, "message", S)
    }

    function x() {
        null !== Z && Z.disconnect()
    }

    function y() {
        q("remove"), x(), clearInterval(ka)
    }

    function z() {
        v(), w(), y()
    }

    function A() {
        var a = document.createElement("div");
        a.style.clear = "both", a.style.display = "block", document.body.appendChild(a)
    }

    function B() {
        function c() {
            return {
                x: void 0 !== a.pageXOffset ? a.pageXOffset : document.documentElement.scrollLeft,
                y: void 0 !== a.pageYOffset ? a.pageYOffset : document.documentElement.scrollTop
            }
        }

        function d(a) {
            var b = a.getBoundingClientRect(),
                d = c();
            return {
                x: parseInt(b.left, 10) + parseInt(d.x, 10),
                y: parseInt(b.top, 10) + parseInt(d.y, 10)
            }
        }

        function e(a) {
            function b(a) {
                var b = d(a);
                g("Moving to in page link (#" + c + ") at x: " + b.x + " y: " + b.y), R(b.y, b.x, "scrollToOffset")
            }
            var c = a.split("#")[1] || a,
                e = decodeURIComponent(c),
                f = document.getElementById(e) || document.getElementsByName(e)[0];
            void 0 !== f ? b(f) : (g("In page link (#" + c + ") not found in iFrame, so sending to parent"), R(0, 0, "inPageLink", "#" + c))
        }

        function f() {
            "" !== location.hash && "#" !== location.hash && e(location.href)
        }

        function i() {
            function a(a) {
                function c(a) {
                    a.preventDefault(), e(this.getAttribute("href"))
                }
                "#" !== a.getAttribute("href") && b(a, "click", c)
            }
            Array.prototype.forEach.call(document.querySelectorAll('a[href^="#"]'), a)
        }

        function j() {
            b(a, "hashchange", f)
        }

        function k() {
            setTimeout(f, ba)
        }

        function l() {
            Array.prototype.forEach && document.querySelectorAll ? (g("Setting up location.hash handlers"), i(), j(), k()) : h("In page linking not fully supported in this browser! (See README.md for IE8 workaround)")
        }
        return ia.enable ? l() : g("In page linking not enabled"), {
            findTarget: e
        }
    }

    function C() {
        g("Enable public methods"), Ba.parentIFrame = {
            autoResize: function(a) {
                return !0 === a && !1 === U ? (U = !0, u()) : !1 === a && !0 === U && (U = !1, y()), U
            },
            close: function() {
                R(0, 0, "close"), z()
            },
            getId: function() {
                return oa
            },
            moveToAnchor: function(a) {
                ia.findTarget(a)
            },
            reset: function() {
                Q("parentIFrame.reset")
            },
            scrollTo: function(a, b) {
                R(b, a, "scrollTo")
            },
            scrollToOffset: function(a, b) {
                R(b, a, "scrollToOffset")
            },
            sendMessage: function(a, b) {
                R(0, 0, "message", JSON.stringify(a), b)
            },
            setHeightCalculationMethod: function(a) {
                fa = a, s()
            },
            setWidthCalculationMethod: function(a) {
                Aa = a, t()
            },
            setTargetOrigin: function(a) {
                g("Set targetOrigin: " + a), ta = a
            },
            size: function(a, b) {
                var c = "" + (a ? a : "") + (b ? "," + b : "");
                N("size", "parentIFrame.size(" + c + ")", a, b)
            }
        }
    }

    function D() {
        0 !== ja && (g("setInterval: " + ja + "ms"), ka = setInterval(function() {
            N("interval", "setInterval: " + ja)
        }, Math.abs(ja)))
    }

    function E() {
        function b(a) {
            function b(a) {
                !1 === a.complete && (g("Attach listeners to " + a.src), a.addEventListener("load", f, !1), a.addEventListener("error", h, !1), k.push(a))
            }
            "attributes" === a.type && "src" === a.attributeName ? b(a.target) : "childList" === a.type && Array.prototype.forEach.call(a.target.querySelectorAll("img"), b)
        }

        function c(a) {
            k.splice(k.indexOf(a), 1)
        }

        function d(a) {
            g("Remove listeners from " + a.src), a.removeEventListener("load", f, !1), a.removeEventListener("error", h, !1), c(a)
        }

        function e(a, b, c) {
            d(a.target), N(b, c + ": " + a.target.src, void 0, void 0)
        }

        function f(a) {
            e(a, "imageLoad", "Image loaded")
        }

        function h(a) {
            e(a, "imageLoadFailed", "Image load failed")
        }

        function i(a) {
            N("mutationObserver", "mutationObserver: " + a[0].target + " " + a[0].type), a.forEach(b)
        }

        function j() {
            var a = document.querySelector("body"),
                b = {
                    attributes: !0,
                    attributeOldValue: !1,
                    characterData: !0,
                    characterDataOldValue: !1,
                    childList: !0,
                    subtree: !0
                };
            return m = new l(i), g("Create body MutationObserver"), m.observe(a, b), m
        }
        var k = [],
            l = a.MutationObserver || a.WebKitMutationObserver,
            m = j();
        return {
            disconnect: function() {
                "disconnect" in m && (g("Disconnect body MutationObserver"), m.disconnect(), k.forEach(d))
            }
        }
    }

    function F() {
        var b = 0 > ja;
        a.MutationObserver || a.WebKitMutationObserver ? b ? D() : Z = E() : (g("MutationObserver not supported in this browser!"), D())
    }

    function G(a) {
        function b(a) {
            var b = /^\d+(px)?$/i;
            if (b.test(a)) return parseInt(a, V);
            var d = c.style.left,
                e = c.runtimeStyle.left;
            return c.runtimeStyle.left = c.currentStyle.left, c.style.left = a || 0, a = c.style.pixelLeft, c.style.left = d, c.runtimeStyle.left = e, a
        }
        var c = document.body,
            d = 0;
        return "defaultView" in document && "getComputedStyle" in document.defaultView ? (d = document.defaultView.getComputedStyle(c, null), d = null !== d ? d[a] : 0) : d = b(c.currentStyle[a]), parseInt(d, V)
    }

    function H(a) {
        a > xa / 2 && (xa = 2 * a, g("Event throttle increased to " + xa + "ms"))
    }

    function I(a, b) {
        for (var c = b.length, e = 0, f = 0, h = d(a), i = Ea(), j = 0; c > j; j++) e = b[j].getBoundingClientRect()[a] + G("margin" + h), e > f && (f = e);
        return i = Ea() - i, g("Parsed " + c + " HTML elements"), g("Element position calculated in " + i + "ms"), H(i), f
    }

    function J(a) {
        return [a.bodyOffset(), a.bodyScroll(), a.documentElementOffset(), a.documentElementScroll()]
    }

    function K(a, b) {
        function c() {
            return h("No tagged elements (" + b + ") found on page"), da
        }
        var d = document.querySelectorAll("[" + b + "]");
        return 0 === d.length ? c() : I(a, d)
    }

    function L() {
        return document.querySelectorAll("body *")
    }

    function M(a, b, c, d) {
        function e() {
            da = l, ya = m, R(da, ya, a)
        }

        function f() {
            function a(a, b) {
                var c = Math.abs(a - b) <= ua;
                return !c
            }
            return l = void 0 !== c ? c : Fa[fa](), m = void 0 !== d ? d : Ga[Aa](), a(da, l) || _ && a(ya, m)
        }

        function h() {
            return !(a in {
                init: 1,
                interval: 1,
                size: 1
            })
        }

        function i() {
            return fa in pa || _ && Aa in pa
        }

        function j() {
            g("No change in size detected")
        }

        function k() {
            h() && i() ? Q(b) : a in {
                interval: 1
            } || j()
        }
        var l, m;
        f() || "init" === a ? (O(), e()) : k()
    }

    function N(a, b, c, d) {
        function e() {
            a in {
                reset: 1,
                resetPage: 1,
                init: 1
            } || g("Trigger event: " + b)
        }

        function f() {
            return va && a in aa
        }
        f() ? g("Trigger event cancelled: " + a) : (e(), Ha(a, b, c, d))
    }

    function O() {
        va || (va = !0, g("Trigger event lock on")), clearTimeout(wa), wa = setTimeout(function() {
            va = !1, g("Trigger event lock off"), g("--")
        }, ba)
    }

    function P(a) {
        da = Fa[fa](), ya = Ga[Aa](), R(da, ya, a)
    }

    function Q(a) {
        var b = fa;
        fa = ea, g("Reset trigger event: " + a), O(), P("reset"), fa = b
    }

    function R(a, b, c, d, e) {
        function f() {
            void 0 === e ? e = ta : g("Message targetOrigin: " + e)
        }

        function h() {
            var f = a + ":" + b,
                h = oa + ":" + f + ":" + c + (void 0 !== d ? ":" + d : "");
            g("Sending message to host page (" + h + ")"), sa.postMessage(ma + h, e)
        }!0 === ra && (f(), h())
    }

    function S(b) {
        function c() {
            return ma === ("" + b.data).substr(0, na)
        }

        function d() {
            ha = b.data, sa = b.source, i(), ca = !1, setTimeout(function() {
                ga = !1
            }, ba)
        }

        function e() {
            ga ? g("Page reset ignored by init") : (g("Page size reset by host page"), P("resetPage"))
        }

        function f() {
            N("resizeParent", "Parent window requested size check")
        }

        function j() {
            var a = l();
            ia.findTarget(a)
        }

        function k() {
            return b.data.split("]")[1].split(":")[0]
        }

        function l() {
            return b.data.substr(b.data.indexOf(":") + 1)
        }

        function m() {
            return "iFrameResize" in a
        }

        function n() {
            var a = l();
            g("MessageCallback called from parent: " + a), Ca(JSON.parse(a)), g(" --")
        }

        function o() {
            return b.data.split(":")[2] in {
                "true": 1,
                "false": 1
            }
        }

        function p() {
            switch (k()) {
                case "reset":
                    e();
                    break;
                case "resize":
                    f();
                    break;
                case "moveToAnchor":
                    j();
                    break;
                case "message":
                    n();
                    break;
                default:
                    m() || o() || h("Unexpected message (" + b.data + ")")
            }
        }

        function q() {
            !1 === ca ? p() : o() ? d() : g('Ignored message of type "' + k() + '". Received before initialization.')
        }
        c() && q()
    }

    function T() {
        "loading" !== document.readyState && a.parent.postMessage("[iFrameResizerChild]Ready", "*")
    }
    var U = !0,
        V = 10,
        W = "",
        X = 0,
        Y = "",
        Z = null,
        $ = "",
        _ = !1,
        aa = {
            resize: 1,
            click: 1
        },
        ba = 128,
        ca = !0,
        da = 1,
        ea = "bodyOffset",
        fa = ea,
        ga = !0,
        ha = "",
        ia = {},
        ja = 32,
        ka = null,
        la = !1,
        ma = "[iFrameSizer]",
        na = ma.length,
        oa = "",
        pa = {
            max: 1,
            min: 1,
            bodyScroll: 1,
            documentElementScroll: 1
        },
        qa = "child",
        ra = !0,
        sa = a.parent,
        ta = "*",
        ua = 0,
        va = !1,
        wa = null,
        xa = 16,
        ya = 1,
        za = "scroll",
        Aa = za,
        Ba = a,
        Ca = function() {
            h("MessageCallback function not defined")
        },
        Da = function() {},
        Ea = Date.now || function() {
            return (new Date).getTime()
        },
        Fa = {
            bodyOffset: function() {
                return document.body.offsetHeight + G("marginTop") + G("marginBottom")
            },
            offset: function() {
                return Fa.bodyOffset()
            },
            bodyScroll: function() {
                return document.body.scrollHeight
            },
            documentElementOffset: function() {
                return document.documentElement.offsetHeight
            },
            documentElementScroll: function() {
                return document.documentElement.scrollHeight
            },
            max: function() {
                return Math.max.apply(null, J(Fa))
            },
            min: function() {
                return Math.min.apply(null, J(Fa))
            },
            grow: function() {
                return Fa.max()
            },
            lowestElement: function() {
                return Math.max(Fa.bodyOffset(), I("bottom", L()))
            },
            taggedElement: function() {
                return K("bottom", "data-iframe-height")
            }
        },
        Ga = {
            bodyScroll: function() {
                return document.body.scrollWidth
            },
            bodyOffset: function() {
                return document.body.offsetWidth
            },
            documentElementScroll: function() {
                return document.documentElement.scrollWidth
            },
            documentElementOffset: function() {
                return document.documentElement.offsetWidth
            },
            scroll: function() {
                return Math.max(Ga.bodyScroll(), Ga.documentElementScroll())
            },
            max: function() {
                return Math.max.apply(null, J(Ga))
            },
            min: function() {
                return Math.min.apply(null, J(Ga))
            },
            leftMostElement: function() {
                return I("left", L())
            },
            taggedElement: function() {
                return K("left", "data-iframe-width")
            }
        },
        Ha = e(M);
    b(a, "message", S), T()
}(window || {});

/* =========================================================
 * bootstrap-datepicker.js
 * Repo: https://github.com/eternicode/bootstrap-datepicker/
 * Demo: http://eternicode.github.io/bootstrap-datepicker/
 * Docs: http://bootstrap-datepicker.readthedocs.org/
 * Forked from http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Started by Stefan Petre; improvements by Andrew Rowls + contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */
! function(t, e) {
    function i() {
        return new Date(Date.UTC.apply(Date, arguments))
    }

    function a() {
        var t = new Date;
        return i(t.getFullYear(), t.getMonth(), t.getDate())
    }

    function s(t) {
        return function() {
            return this[t].apply(this, arguments)
        }
    }

    function n(e, i) {
        function a(t, e) {
            return e.toLowerCase()
        }
        var s, n = t(e).data(),
            r = {},
            h = new RegExp("^" + i.toLowerCase() + "([A-Z])");
        i = new RegExp("^" + i.toLowerCase());
        for (var o in n) i.test(o) && (s = o.replace(h, a), r[s] = n[o]);
        return r
    }

    function r(e) {
        var i = {};
        if (f[e] || (e = e.split("-")[0], f[e])) {
            var a = f[e];
            return t.each(p, function(t, e) {
                e in a && (i[e] = a[e])
            }), i
        }
    }
    var h = t(window),
        o = function() {
            var e = {
                get: function(t) {
                    return this.slice(t)[0]
                },
                contains: function(t) {
                    for (var e = t && t.valueOf(), i = 0, a = this.length; a > i; i++)
                        if (this[i].valueOf() === e) return i;
                    return -1
                },
                remove: function(t) {
                    this.splice(t, 1)
                },
                replace: function(e) {
                    e && (t.isArray(e) || (e = [e]), this.clear(), this.push.apply(this, e))
                },
                clear: function() {
                    this.splice(0)
                },
                copy: function() {
                    var t = new o;
                    return t.replace(this), t
                }
            };
            return function() {
                var i = [];
                return i.push.apply(i, arguments), t.extend(i, e), i
            }
        }(),
        d = function(e, i) {
            this.dates = new o, this.viewDate = a(), this.focusDate = null, this._process_options(i), this.element = t(e), this.isInline = !1, this.isInput = this.element.is("input"), this.component = this.element.is(".date") ? this.element.find(".add-on, .input-group-addon, .btn") : !1, this.hasInput = this.component && this.element.find("input").length, this.component && 0 === this.component.length && (this.component = !1), this.picker = t(g.template), this._buildEvents(), this._attachEvents(), this.isInline ? this.picker.addClass("datepicker-inline").appendTo(this.element) : this.picker.addClass("datepicker-dropdown dropdown-menu"), this.o.rtl && this.picker.addClass("datepicker-rtl"), this.viewMode = this.o.startView, this.o.calendarWeeks && this.picker.find("tfoot th.today").attr("colspan", function(t, e) {
                return parseInt(e) + 1
            }), this._allow_update = !1, this.setStartDate(this._o.startDate), this.setEndDate(this._o.endDate), this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled), this.fillDow(), this.fillMonths(), this._allow_update = !0, this.update(), this.showMode(), this.isInline && this.show()
        };
    d.prototype = {
        constructor: d,
        _process_options: function(e) {
            this._o = t.extend({}, this._o, e);
            var i = this.o = t.extend({}, this._o),
                a = i.language;
            switch (f[a] || (a = a.split("-")[0], f[a] || (a = u.language)), i.language = a, i.startView) {
                case 2:
                case "decade":
                    i.startView = 2;
                    break;
                case 1:
                case "year":
                    i.startView = 1;
                    break;
                default:
                    i.startView = 0
            }
            switch (i.minViewMode) {
                case 1:
                case "months":
                    i.minViewMode = 1;
                    break;
                case 2:
                case "years":
                    i.minViewMode = 2;
                    break;
                default:
                    i.minViewMode = 0
            }
            i.startView = Math.max(i.startView, i.minViewMode), i.multidate !== !0 && (i.multidate = Number(i.multidate) || !1, i.multidate = i.multidate !== !1 ? Math.max(0, i.multidate) : 1), i.multidateSeparator = String(i.multidateSeparator), i.weekStart %= 7, i.weekEnd = (i.weekStart + 6) % 7;
            var s = g.parseFormat(i.format);
            i.startDate !== -1 / 0 && (i.startDate = i.startDate ? i.startDate instanceof Date ? this._local_to_utc(this._zero_time(i.startDate)) : g.parseDate(i.startDate, s, i.language) : -1 / 0), 1 / 0 !== i.endDate && (i.endDate = i.endDate ? i.endDate instanceof Date ? this._local_to_utc(this._zero_time(i.endDate)) : g.parseDate(i.endDate, s, i.language) : 1 / 0), i.daysOfWeekDisabled = i.daysOfWeekDisabled || [], t.isArray(i.daysOfWeekDisabled) || (i.daysOfWeekDisabled = i.daysOfWeekDisabled.split(/[,\s]*/)), i.daysOfWeekDisabled = t.map(i.daysOfWeekDisabled, function(t) {
                return parseInt(t, 10)
            });
            var n = String(i.orientation).toLowerCase().split(/\s+/g),
                r = i.orientation.toLowerCase();
            if (n = t.grep(n, function(t) {
                    return /^auto|left|right|top|bottom$/.test(t)
                }), i.orientation = {
                    x: "auto",
                    y: "auto"
                }, r && "auto" !== r)
                if (1 === n.length) switch (n[0]) {
                    case "top":
                    case "bottom":
                        i.orientation.y = n[0];
                        break;
                    case "left":
                    case "right":
                        i.orientation.x = n[0]
                } else r = t.grep(n, function(t) {
                    return /^left|right$/.test(t)
                }), i.orientation.x = r[0] || "auto", r = t.grep(n, function(t) {
                    return /^top|bottom$/.test(t)
                }), i.orientation.y = r[0] || "auto";
                else;
        },
        _events: [],
        _secondaryEvents: [],
        _applyEvents: function(t) {
            for (var i, a, s, n = 0; n < t.length; n++) i = t[n][0], 2 === t[n].length ? (a = e, s = t[n][1]) : 3 === t[n].length && (a = t[n][1], s = t[n][2]), i.on(s, a)
        },
        _unapplyEvents: function(t) {
            for (var i, a, s, n = 0; n < t.length; n++) i = t[n][0], 2 === t[n].length ? (s = e, a = t[n][1]) : 3 === t[n].length && (s = t[n][1], a = t[n][2]), i.off(a, s)
        },
        _buildEvents: function() {
            this.isInput ? this._events = [
                [this.element, {
                    focus: t.proxy(this.show, this),
                    keyup: t.proxy(function(e) {
                        -1 === t.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13, 9]) && this.update()
                    }, this),
                    keydown: t.proxy(this.keydown, this)
                }]
            ] : this.component && this.hasInput ? this._events = [
                [this.element.find("input"), {
                    focus: t.proxy(this.show, this),
                    keyup: t.proxy(function(e) {
                        -1 === t.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13, 9]) && this.update()
                    }, this),
                    keydown: t.proxy(this.keydown, this)
                }],
                [this.component, {
                    click: t.proxy(this.show, this)
                }]
            ] : this.element.is("div") ? this.isInline = !0 : this._events = [
                [this.element, {
                    click: t.proxy(this.show, this)
                }]
            ], this._events.push([this.element, "*", {
                blur: t.proxy(function(t) {
                    this._focused_from = t.target
                }, this)
            }], [this.element, {
                blur: t.proxy(function(t) {
                    this._focused_from = t.target
                }, this)
            }]), this._secondaryEvents = [
                [this.picker, {
                    click: t.proxy(this.click, this)
                }],
                [t(window), {
                    resize: t.proxy(this.place, this)
                }],
                [t(document), {
                    "mousedown touchstart": t.proxy(function(t) {
                        this.element.is(t.target) || this.element.find(t.target).length || this.picker.is(t.target) || this.picker.find(t.target).length || this.hide()
                    }, this)
                }]
            ]
        },
        _attachEvents: function() {
            this._detachEvents(), this._applyEvents(this._events)
        },
        _detachEvents: function() {
            this._unapplyEvents(this._events)
        },
        _attachSecondaryEvents: function() {
            this._detachSecondaryEvents(), this._applyEvents(this._secondaryEvents)
        },
        _detachSecondaryEvents: function() {
            this._unapplyEvents(this._secondaryEvents)
        },
        _trigger: function(e, i) {
            var a = i || this.dates.get(-1),
                s = this._utc_to_local(a);
            this.element.trigger({
                type: e,
                date: s,
                dates: t.map(this.dates, this._utc_to_local),
                format: t.proxy(function(t, e) {
                    0 === arguments.length ? (t = this.dates.length - 1, e = this.o.format) : "string" == typeof t && (e = t, t = this.dates.length - 1), e = e || this.o.format;
                    var i = this.dates.get(t);
                    return g.formatDate(i, e, this.o.language)
                }, this)
            })
        },
        show: function() {
            this.isInline || this.picker.appendTo("body"), this.picker.show(), this.place(), this._attachSecondaryEvents(), this._trigger("show")
        },
        hide: function() {
            this.isInline || this.picker.is(":visible") && (this.focusDate = null, this.picker.hide().detach(), this._detachSecondaryEvents(), this.viewMode = this.o.startView, this.showMode(), this.o.forceParse && (this.isInput && this.element.val() || this.hasInput && this.element.find("input").val()) && this.setValue(), this._trigger("hide"))
        },
        remove: function() {
            this.hide(), this._detachEvents(), this._detachSecondaryEvents(), this.picker.remove(), delete this.element.data().datepicker, this.isInput || delete this.element.data().date
        },
        _utc_to_local: function(t) {
            return t && new Date(t.getTime() + 6e4 * t.getTimezoneOffset())
        },
        _local_to_utc: function(t) {
            return t && new Date(t.getTime() - 6e4 * t.getTimezoneOffset())
        },
        _zero_time: function(t) {
            return t && new Date(t.getFullYear(), t.getMonth(), t.getDate())
        },
        _zero_utc_time: function(t) {
            return t && new Date(Date.UTC(t.getUTCFullYear(), t.getUTCMonth(), t.getUTCDate()))
        },
        getDates: function() {
            return t.map(this.dates, this._utc_to_local)
        },
        getUTCDates: function() {
            return t.map(this.dates, function(t) {
                return new Date(t)
            })
        },
        getDate: function() {
            return this._utc_to_local(this.getUTCDate())
        },
        getUTCDate: function() {
            return new Date(this.dates.get(-1))
        },
        setDates: function() {
            var e = t.isArray(arguments[0]) ? arguments[0] : arguments;
            this.update.apply(this, e), this._trigger("changeDate"), this.setValue()
        },
        setUTCDates: function() {
            var e = t.isArray(arguments[0]) ? arguments[0] : arguments;
            this.update.apply(this, t.map(e, this._utc_to_local)), this._trigger("changeDate"), this.setValue()
        },
        setDate: s("setDates"),
        setUTCDate: s("setUTCDates"),
        setValue: function() {
            var t = this.getFormattedDate();
            this.isInput ? this.element.val(t).change() : this.component && this.element.find("input").val(t).change()
        },
        getFormattedDate: function(i) {
            i === e && (i = this.o.format);
            var a = this.o.language;
            return t.map(this.dates, function(t) {
                return g.formatDate(t, i, a)
            }).join(this.o.multidateSeparator)
        },
        setStartDate: function(t) {
            this._process_options({
                startDate: t
            }), this.update(), this.updateNavArrows()
        },
        setEndDate: function(t) {
            this._process_options({
                endDate: t
            }), this.update(), this.updateNavArrows()
        },
        setDaysOfWeekDisabled: function(t) {
            this._process_options({
                daysOfWeekDisabled: t
            }), this.update(), this.updateNavArrows()
        },
        place: function() {
            if (!this.isInline) {
                var e = this.picker.outerWidth(),
                    i = this.picker.outerHeight(),
                    a = 10,
                    s = h.width(),
                    n = h.height(),
                    r = h.scrollTop(),
                    o = parseInt(this.element.parents().filter(function() {
                        return "auto" !== t(this).css("z-index")
                    }).first().css("z-index")) + 10,
                    d = this.component ? this.component.parent().offset() : this.element.offset(),
                    l = this.component ? this.component.outerHeight(!0) : this.element.outerHeight(!1),
                    c = this.component ? this.component.outerWidth(!0) : this.element.outerWidth(!1),
                    u = d.left,
                    p = d.top;
                this.picker.removeClass("datepicker-orient-top datepicker-orient-bottom datepicker-orient-right datepicker-orient-left"), "auto" !== this.o.orientation.x ? (this.picker.addClass("datepicker-orient-" + this.o.orientation.x), "right" === this.o.orientation.x && (u -= e - c)) : (this.picker.addClass("datepicker-orient-left"), d.left < 0 ? u -= d.left - a : d.left + e > s && (u = s - e - a));
                var f, g, v = this.o.orientation.y;
                "auto" === v && (f = -r + d.top - i, g = r + n - (d.top + l + i), v = Math.max(f, g) === g ? "top" : "bottom"), this.picker.addClass("datepicker-orient-" + v), "top" === v ? p += l : p -= i + parseInt(this.picker.css("padding-top")), this.picker.css({
                    top: p,
                    left: u,
                    zIndex: o
                })
            }
        },
        _allow_update: !0,
        update: function() {
            if (this._allow_update) {
                var e = this.dates.copy(),
                    i = [],
                    a = !1;
                arguments.length ? (t.each(arguments, t.proxy(function(t, e) {
                    e instanceof Date && (e = this._local_to_utc(e)), i.push(e)
                }, this)), a = !0) : (i = this.isInput ? this.element.val() : this.element.data("date") || this.element.find("input").val(), i = i && this.o.multidate ? i.split(this.o.multidateSeparator) : [i], delete this.element.data().date), i = t.map(i, t.proxy(function(t) {
                    return g.parseDate(t, this.o.format, this.o.language)
                }, this)), i = t.grep(i, t.proxy(function(t) {
                    return t < this.o.startDate || t > this.o.endDate || !t
                }, this), !0), this.dates.replace(i), this.dates.length ? this.viewDate = new Date(this.dates.get(-1)) : this.viewDate < this.o.startDate ? this.viewDate = new Date(this.o.startDate) : this.viewDate > this.o.endDate && (this.viewDate = new Date(this.o.endDate)), a ? this.setValue() : i.length && String(e) !== String(this.dates) && this._trigger("changeDate"), !this.dates.length && e.length && this._trigger("clearDate"), this.fill()
            }
        },
        fillDow: function() {
            var t = this.o.weekStart,
                e = "<tr>";
            if (this.o.calendarWeeks) {
                var i = '<th class="cw">&nbsp;</th>';
                e += i, this.picker.find(".datepicker-days thead tr:first-child").prepend(i)
            }
            for (; t < this.o.weekStart + 7;) e += '<th class="dow">' + f[this.o.language].daysMin[t++ % 7] + "</th>";
            e += "</tr>", this.picker.find(".datepicker-days thead").append(e)
        },
        fillMonths: function() {
            for (var t = "", e = 0; 12 > e;) t += '<span class="month">' + f[this.o.language].monthsShort[e++] + "</span>";
            this.picker.find(".datepicker-months td").html(t)
        },
        setRange: function(e) {
            e && e.length ? this.range = t.map(e, function(t) {
                return t.valueOf()
            }) : delete this.range, this.fill()
        },
        getClassNames: function(e) {
            var i = [],
                a = this.viewDate.getUTCFullYear(),
                s = this.viewDate.getUTCMonth(),
                n = new Date;
            return e.getUTCFullYear() < a || e.getUTCFullYear() === a && e.getUTCMonth() < s ? i.push("old") : (e.getUTCFullYear() > a || e.getUTCFullYear() === a && e.getUTCMonth() > s) && i.push("new"), this.focusDate && e.valueOf() === this.focusDate.valueOf() && i.push("focused"), this.o.todayHighlight && e.getUTCFullYear() === n.getFullYear() && e.getUTCMonth() === n.getMonth() && e.getUTCDate() === n.getDate() && i.push("today"), -1 !== this.dates.contains(e) && i.push("active"), (e.valueOf() < this.o.startDate || e.valueOf() > this.o.endDate || -1 !== t.inArray(e.getUTCDay(), this.o.daysOfWeekDisabled)) && i.push("disabled"), this.range && (e > this.range[0] && e < this.range[this.range.length - 1] && i.push("range"), -1 !== t.inArray(e.valueOf(), this.range) && i.push("selected")), i
        },
        fill: function() {
            var a, s = new Date(this.viewDate),
                n = s.getUTCFullYear(),
                r = s.getUTCMonth(),
                h = this.o.startDate !== -1 / 0 ? this.o.startDate.getUTCFullYear() : -1 / 0,
                o = this.o.startDate !== -1 / 0 ? this.o.startDate.getUTCMonth() : -1 / 0,
                d = 1 / 0 !== this.o.endDate ? this.o.endDate.getUTCFullYear() : 1 / 0,
                l = 1 / 0 !== this.o.endDate ? this.o.endDate.getUTCMonth() : 1 / 0,
                c = f[this.o.language].today || f.en.today || "",
                u = f[this.o.language].clear || f.en.clear || "";
            this.picker.find(".datepicker-days thead th.datepicker-switch").text(f[this.o.language].months[r] + " " + n), this.picker.find("tfoot th.today").text(c).toggle(this.o.todayBtn !== !1), this.picker.find("tfoot th.clear").text(u).toggle(this.o.clearBtn !== !1), this.updateNavArrows(), this.fillMonths();
            var p = i(n, r - 1, 28),
                v = g.getDaysInMonth(p.getUTCFullYear(), p.getUTCMonth());
            p.setUTCDate(v), p.setUTCDate(v - (p.getUTCDay() - this.o.weekStart + 7) % 7);
            var D = new Date(p);
            D.setUTCDate(D.getUTCDate() + 42), D = D.valueOf();
            for (var m, y = []; p.valueOf() < D;) {
                if (p.getUTCDay() === this.o.weekStart && (y.push("<tr>"), this.o.calendarWeeks)) {
                    var w = new Date(+p + (this.o.weekStart - p.getUTCDay() - 7) % 7 * 864e5),
                        k = new Date(Number(w) + (11 - w.getUTCDay()) % 7 * 864e5),
                        C = new Date(Number(C = i(k.getUTCFullYear(), 0, 1)) + (11 - C.getUTCDay()) % 7 * 864e5),
                        _ = (k - C) / 864e5 / 7 + 1;
                    y.push('<td class="cw">' + _ + "</td>")
                }
                if (m = this.getClassNames(p), m.push("day"), this.o.beforeShowDay !== t.noop) {
                    var T = this.o.beforeShowDay(this._utc_to_local(p));
                    T === e ? T = {} : "boolean" == typeof T ? T = {
                        enabled: T
                    } : "string" == typeof T && (T = {
                        classes: T
                    }), T.enabled === !1 && m.push("disabled"), T.classes && (m = m.concat(T.classes.split(/\s+/))), T.tooltip && (a = T.tooltip)
                }
                m = t.unique(m), y.push('<td class="' + m.join(" ") + '"' + (a ? ' title="' + a + '"' : "") + ">" + p.getUTCDate() + "</td>"), p.getUTCDay() === this.o.weekEnd && y.push("</tr>"), p.setUTCDate(p.getUTCDate() + 1)
            }
            this.picker.find(".datepicker-days tbody").empty().append(y.join(""));
            var b = this.picker.find(".datepicker-months").find("th:eq(1)").text(n).end().find("span").removeClass("active");
            t.each(this.dates, function(t, e) {
                e.getUTCFullYear() === n && b.eq(e.getUTCMonth()).addClass("active")
            }), (h > n || n > d) && b.addClass("disabled"), n === h && b.slice(0, o).addClass("disabled"), n === d && b.slice(l + 1).addClass("disabled"), y = "", n = 10 * parseInt(n / 10, 10);
            var U = this.picker.find(".datepicker-years").find("th:eq(1)").text(n + "-" + (n + 9)).end().find("td");
            n -= 1;
            for (var M, x = t.map(this.dates, function(t) {
                    return t.getUTCFullYear()
                }), S = -1; 11 > S; S++) M = ["year"], -1 === S ? M.push("old") : 10 === S && M.push("new"), -1 !== t.inArray(n, x) && M.push("active"), (h > n || n > d) && M.push("disabled"), y += '<span class="' + M.join(" ") + '">' + n + "</span>", n += 1;
            U.html(y)
        },
        updateNavArrows: function() {
            if (this._allow_update) {
                var t = new Date(this.viewDate),
                    e = t.getUTCFullYear(),
                    i = t.getUTCMonth();
                switch (this.viewMode) {
                    case 0:
                        this.picker.find(".prev").css(this.o.startDate !== -1 / 0 && e <= this.o.startDate.getUTCFullYear() && i <= this.o.startDate.getUTCMonth() ? {
                            visibility: "hidden"
                        } : {
                            visibility: "visible"
                        }), this.picker.find(".next").css(1 / 0 !== this.o.endDate && e >= this.o.endDate.getUTCFullYear() && i >= this.o.endDate.getUTCMonth() ? {
                            visibility: "hidden"
                        } : {
                            visibility: "visible"
                        });
                        break;
                    case 1:
                    case 2:
                        this.picker.find(".prev").css(this.o.startDate !== -1 / 0 && e <= this.o.startDate.getUTCFullYear() ? {
                            visibility: "hidden"
                        } : {
                            visibility: "visible"
                        }), this.picker.find(".next").css(1 / 0 !== this.o.endDate && e >= this.o.endDate.getUTCFullYear() ? {
                            visibility: "hidden"
                        } : {
                            visibility: "visible"
                        })
                }
            }
        },
        click: function(e) {
            e.preventDefault();
            var a, s, n, r = t(e.target).closest("span, td, th");
            if (1 === r.length) switch (r[0].nodeName.toLowerCase()) {
                case "th":
                    switch (r[0].className) {
                        case "datepicker-switch":
                            this.showMode(1);
                            break;
                        case "prev":
                        case "next":
                            var h = g.modes[this.viewMode].navStep * ("prev" === r[0].className ? -1 : 1);
                            switch (this.viewMode) {
                                case 0:
                                    this.viewDate = this.moveMonth(this.viewDate, h), this._trigger("changeMonth", this.viewDate);
                                    break;
                                case 1:
                                case 2:
                                    this.viewDate = this.moveYear(this.viewDate, h), 1 === this.viewMode && this._trigger("changeYear", this.viewDate)
                            }
                            this.fill();
                            break;
                        case "today":
                            var o = new Date;
                            o = i(o.getFullYear(), o.getMonth(), o.getDate(), 0, 0, 0), this.showMode(-2);
                            var d = "linked" === this.o.todayBtn ? null : "view";
                            this._setDate(o, d);
                            break;
                        case "clear":
                            var l;
                            this.isInput ? l = this.element : this.component && (l = this.element.find("input")), l && l.val("").change(), this.update(), this._trigger("changeDate"), this.o.autoclose && this.hide()
                    }
                    break;
                case "span":
                    r.is(".disabled") || (this.viewDate.setUTCDate(1), r.is(".month") ? (n = 1, s = r.parent().find("span").index(r), a = this.viewDate.getUTCFullYear(), this.viewDate.setUTCMonth(s), this._trigger("changeMonth", this.viewDate), 1 === this.o.minViewMode && this._setDate(i(a, s, n))) : (n = 1, s = 0, a = parseInt(r.text(), 10) || 0, this.viewDate.setUTCFullYear(a), this._trigger("changeYear", this.viewDate), 2 === this.o.minViewMode && this._setDate(i(a, s, n))), this.showMode(-1), this.fill());
                    break;
                case "td":
                    r.is(".day") && !r.is(".disabled") && (n = parseInt(r.text(), 10) || 1, a = this.viewDate.getUTCFullYear(), s = this.viewDate.getUTCMonth(), r.is(".old") ? 0 === s ? (s = 11, a -= 1) : s -= 1 : r.is(".new") && (11 === s ? (s = 0, a += 1) : s += 1), this._setDate(i(a, s, n)))
            }
            this.picker.is(":visible") && this._focused_from && t(this._focused_from).focus(), delete this._focused_from
        },
        _toggle_multidate: function(t) {
            var e = this.dates.contains(t);
            if (t ? -1 !== e ? this.dates.remove(e) : this.dates.push(t) : this.dates.clear(), "number" == typeof this.o.multidate)
                for (; this.dates.length > this.o.multidate;) this.dates.remove(0)
        },
        _setDate: function(t, e) {
            e && "date" !== e || this._toggle_multidate(t && new Date(t)), e && "view" !== e || (this.viewDate = t && new Date(t)), this.fill(), this.setValue(), this._trigger("changeDate");
            var i;
            this.isInput ? i = this.element : this.component && (i = this.element.find("input")), i && i.change(), !this.o.autoclose || e && "date" !== e || this.hide()
        },
        moveMonth: function(t, i) {
            if (!t) return e;
            if (!i) return t;
            var a, s, n = new Date(t.valueOf()),
                r = n.getUTCDate(),
                h = n.getUTCMonth(),
                o = Math.abs(i);
            if (i = i > 0 ? 1 : -1, 1 === o) s = -1 === i ? function() {
                return n.getUTCMonth() === h
            } : function() {
                return n.getUTCMonth() !== a
            }, a = h + i, n.setUTCMonth(a), (0 > a || a > 11) && (a = (a + 12) % 12);
            else {
                for (var d = 0; o > d; d++) n = this.moveMonth(n, i);
                a = n.getUTCMonth(), n.setUTCDate(r), s = function() {
                    return a !== n.getUTCMonth()
                }
            }
            for (; s();) n.setUTCDate(--r), n.setUTCMonth(a);
            return n
        },
        moveYear: function(t, e) {
            return this.moveMonth(t, 12 * e)
        },
        dateWithinRange: function(t) {
            return t >= this.o.startDate && t <= this.o.endDate
        },
        keydown: function(t) {
            if (this.picker.is(":not(:visible)")) return void(27 === t.keyCode && this.show());
            var e, i, s, n = !1,
                r = this.focusDate || this.viewDate;
            switch (t.keyCode) {
                case 27:
                    this.focusDate ? (this.focusDate = null, this.viewDate = this.dates.get(-1) || this.viewDate, this.fill()) : this.hide(), t.preventDefault();
                    break;
                case 37:
                case 39:
                    if (!this.o.keyboardNavigation) break;
                    e = 37 === t.keyCode ? -1 : 1, t.ctrlKey ? (i = this.moveYear(this.dates.get(-1) || a(), e), s = this.moveYear(r, e), this._trigger("changeYear", this.viewDate)) : t.shiftKey ? (i = this.moveMonth(this.dates.get(-1) || a(), e), s = this.moveMonth(r, e), this._trigger("changeMonth", this.viewDate)) : (i = new Date(this.dates.get(-1) || a()), i.setUTCDate(i.getUTCDate() + e), s = new Date(r), s.setUTCDate(r.getUTCDate() + e)), this.dateWithinRange(i) && (this.focusDate = this.viewDate = s, this.setValue(), this.fill(), t.preventDefault());
                    break;
                case 38:
                case 40:
                    if (!this.o.keyboardNavigation) break;
                    e = 38 === t.keyCode ? -1 : 1, t.ctrlKey ? (i = this.moveYear(this.dates.get(-1) || a(), e), s = this.moveYear(r, e), this._trigger("changeYear", this.viewDate)) : t.shiftKey ? (i = this.moveMonth(this.dates.get(-1) || a(), e), s = this.moveMonth(r, e), this._trigger("changeMonth", this.viewDate)) : (i = new Date(this.dates.get(-1) || a()), i.setUTCDate(i.getUTCDate() + 7 * e), s = new Date(r), s.setUTCDate(r.getUTCDate() + 7 * e)), this.dateWithinRange(i) && (this.focusDate = this.viewDate = s, this.setValue(), this.fill(), t.preventDefault());
                    break;
                case 32:
                    break;
                case 13:
                    r = this.focusDate || this.dates.get(-1) || this.viewDate, this._toggle_multidate(r), n = !0, this.focusDate = null, this.viewDate = this.dates.get(-1) || this.viewDate, this.setValue(), this.fill(), this.picker.is(":visible") && (t.preventDefault(), this.o.autoclose && this.hide());
                    break;
                case 9:
                    this.focusDate = null, this.viewDate = this.dates.get(-1) || this.viewDate, this.fill(), this.hide()
            }
            if (n) {
                this._trigger(this.dates.length ? "changeDate" : "clearDate");
                var h;
                this.isInput ? h = this.element : this.component && (h = this.element.find("input")), h && h.change()
            }
        },
        showMode: function(t) {
            t && (this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + t))), this.picker.find(">div").hide().filter(".datepicker-" + g.modes[this.viewMode].clsName).css("display", "block"), this.updateNavArrows()
        }
    };
    var l = function(e, i) {
        this.element = t(e), this.inputs = t.map(i.inputs, function(t) {
            return t.jquery ? t[0] : t
        }), delete i.inputs, t(this.inputs).datepicker(i).bind("changeDate", t.proxy(this.dateUpdated, this)), this.pickers = t.map(this.inputs, function(e) {
            return t(e).data("datepicker")
        }), this.updateDates()
    };
    l.prototype = {
        updateDates: function() {
            this.dates = t.map(this.pickers, function(t) {
                return t.getUTCDate()
            }), this.updateRanges()
        },
        updateRanges: function() {
            var e = t.map(this.dates, function(t) {
                return t.valueOf()
            });
            t.each(this.pickers, function(t, i) {
                i.setRange(e)
            })
        },
        dateUpdated: function(e) {
            if (!this.updating) {
                this.updating = !0;
                var i = t(e.target).data("datepicker"),
                    a = i.getUTCDate(),
                    s = t.inArray(e.target, this.inputs),
                    n = this.inputs.length;
                if (-1 !== s) {
                    if (t.each(this.pickers, function(t, e) {
                            e.getUTCDate() || e.setUTCDate(a)
                        }), a < this.dates[s])
                        for (; s >= 0 && a < this.dates[s];) this.pickers[s--].setUTCDate(a);
                    else if (a > this.dates[s])
                        for (; n > s && a > this.dates[s];) this.pickers[s++].setUTCDate(a);
                    this.updateDates(), delete this.updating
                }
            }
        },
        remove: function() {
            t.map(this.pickers, function(t) {
                t.remove()
            }), delete this.element.data().datepicker
        }
    };
    var c = t.fn.datepicker;
    t.fn.datepicker = function(i) {
        var a = Array.apply(null, arguments);
        a.shift();
        var s;
        return this.each(function() {
            var h = t(this),
                o = h.data("datepicker"),
                c = "object" == typeof i && i;
            if (!o) {
                var p = n(this, "date"),
                    f = t.extend({}, u, p, c),
                    g = r(f.language),
                    v = t.extend({}, u, g, p, c);
                if (h.is(".input-daterange") || v.inputs) {
                    var D = {
                        inputs: v.inputs || h.find("input").toArray()
                    };
                    h.data("datepicker", o = new l(this, t.extend(v, D)))
                } else h.data("datepicker", o = new d(this, v))
            }
            return "string" == typeof i && "function" == typeof o[i] && (s = o[i].apply(o, a), s !== e) ? !1 : void 0
        }), s !== e ? s : this
    };
    var u = t.fn.datepicker.defaults = {
            autoclose: !1,
            beforeShowDay: t.noop,
            calendarWeeks: !1,
            clearBtn: !1,
            daysOfWeekDisabled: [],
            endDate: 1 / 0,
            forceParse: !0,
            format: "mm/dd/yyyy",
            keyboardNavigation: !0,
            language: "en",
            minViewMode: 0,
            multidate: !1,
            multidateSeparator: ",",
            orientation: "auto",
            rtl: !1,
            startDate: -1 / 0,
            startView: 0,
            todayBtn: !1,
            todayHighlight: !1,
            weekStart: 0
        },
        p = t.fn.datepicker.locale_opts = ["format", "rtl", "weekStart"];
    t.fn.datepicker.Constructor = d;
    var f = t.fn.datepicker.dates = {
            en: {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                today: "Today",
                clear: "Clear"
            }
        },
        g = {
            modes: [{
                clsName: "days",
                navFnc: "Month",
                navStep: 1
            }, {
                clsName: "months",
                navFnc: "FullYear",
                navStep: 1
            }, {
                clsName: "years",
                navFnc: "FullYear",
                navStep: 10
            }],
            isLeapYear: function(t) {
                return t % 4 === 0 && t % 100 !== 0 || t % 400 === 0
            },
            getDaysInMonth: function(t, e) {
                return [31, g.isLeapYear(t) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][e]
            },
            validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
            nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
            parseFormat: function(t) {
                var e = t.replace(this.validParts, "\x00").split("\x00"),
                    i = t.match(this.validParts);
                if (!e || !e.length || !i || 0 === i.length) throw new Error("Invalid date format.");
                return {
                    separators: e,
                    parts: i
                }
            },
            parseDate: function(a, s, n) {
                function r() {
                    var t = this.slice(0, u[l].length),
                        e = u[l].slice(0, t.length);
                    return t === e
                }
                if (!a) return e;
                if (a instanceof Date) return a;
                "string" == typeof s && (s = g.parseFormat(s));
                var h, o, l, c = /([\-+]\d+)([dmwy])/,
                    u = a.match(/([\-+]\d+)([dmwy])/g);
                if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(a)) {
                    for (a = new Date, l = 0; l < u.length; l++) switch (h = c.exec(u[l]), o = parseInt(h[1]), h[2]) {
                        case "d":
                            a.setUTCDate(a.getUTCDate() + o);
                            break;
                        case "m":
                            a = d.prototype.moveMonth.call(d.prototype, a, o);
                            break;
                        case "w":
                            a.setUTCDate(a.getUTCDate() + 7 * o);
                            break;
                        case "y":
                            a = d.prototype.moveYear.call(d.prototype, a, o)
                    }
                    return i(a.getUTCFullYear(), a.getUTCMonth(), a.getUTCDate(), 0, 0, 0)
                }
                u = a && a.match(this.nonpunctuation) || [], a = new Date;
                var p, v, D = {},
                    m = ["yyyy", "yy", "M", "MM", "m", "mm", "d", "dd"],
                    y = {
                        yyyy: function(t, e) {
                            return t.setUTCFullYear(e)
                        },
                        yy: function(t, e) {
                            return t.setUTCFullYear(2e3 + e)
                        },
                        m: function(t, e) {
                            if (isNaN(t)) return t;
                            for (e -= 1; 0 > e;) e += 12;
                            for (e %= 12, t.setUTCMonth(e); t.getUTCMonth() !== e;) t.setUTCDate(t.getUTCDate() - 1);
                            return t
                        },
                        d: function(t, e) {
                            return t.setUTCDate(e)
                        }
                    };
                y.M = y.MM = y.mm = y.m, y.dd = y.d, a = i(a.getFullYear(), a.getMonth(), a.getDate(), 0, 0, 0);
                var w = s.parts.slice();
                if (u.length !== w.length && (w = t(w).filter(function(e, i) {
                        return -1 !== t.inArray(i, m)
                    }).toArray()), u.length === w.length) {
                    var k;
                    for (l = 0, k = w.length; k > l; l++) {
                        if (p = parseInt(u[l], 10), h = w[l], isNaN(p)) switch (h) {
                            case "MM":
                                v = t(f[n].months).filter(r), p = t.inArray(v[0], f[n].months) + 1;
                                break;
                            case "M":
                                v = t(f[n].monthsShort).filter(r), p = t.inArray(v[0], f[n].monthsShort) + 1
                        }
                        D[h] = p
                    }
                    var C, _;
                    for (l = 0; l < m.length; l++) _ = m[l], _ in D && !isNaN(D[_]) && (C = new Date(a), y[_](C, D[_]), isNaN(C) || (a = C))
                }
                return a
            },
            formatDate: function(e, i, a) {
                if (!e) return "";
                "string" == typeof i && (i = g.parseFormat(i));
                var s = {
                    d: e.getUTCDate(),
                    D: f[a].daysShort[e.getUTCDay()],
                    DD: f[a].days[e.getUTCDay()],
                    m: e.getUTCMonth() + 1,
                    M: f[a].monthsShort[e.getUTCMonth()],
                    MM: f[a].months[e.getUTCMonth()],
                    yy: e.getUTCFullYear().toString().substring(2),
                    yyyy: e.getUTCFullYear()
                };
                s.dd = (s.d < 10 ? "0" : "") + s.d, s.mm = (s.m < 10 ? "0" : "") + s.m, e = [];
                for (var n = t.extend([], i.separators), r = 0, h = i.parts.length; h >= r; r++) n.length && e.push(n.shift()), e.push(s[i.parts[r]]);
                return e.join("")
            },
            headTemplate: '<thead><tr><th class="prev">&laquo;</th><th colspan="5" class="datepicker-switch"></th><th class="next">&raquo;</th></tr></thead>',
            contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
            footTemplate: '<tfoot><tr><th colspan="7" class="today"></th></tr><tr><th colspan="7" class="clear"></th></tr></tfoot>'
        };
    g.template = '<div class="datepicker"><div class="datepicker-days"><table class=" table-condensed">' + g.headTemplate + "<tbody></tbody>" + g.footTemplate + '</table></div><div class="datepicker-months"><table class="table-condensed">' + g.headTemplate + g.contTemplate + g.footTemplate + '</table></div><div class="datepicker-years"><table class="table-condensed">' + g.headTemplate + g.contTemplate + g.footTemplate + "</table></div></div>", t.fn.datepicker.DPGlobal = g, t.fn.datepicker.noConflict = function() {
        return t.fn.datepicker = c, this
    }, t(document).on("focus.datepicker.data-api click.datepicker.data-api", '[data-provide="datepicker"]', function(e) {
        var i = t(this);
        i.data("datepicker") || (e.preventDefault(), i.datepicker("show"))
    }), t(function() {
        t('[data-provide="datepicker-inline"]').datepicker()
    })
}(window.jQuery);
/*! bootstrap-timepicker v0.2.5
 * http://jdewit.github.com/bootstrap-timepicker
 * Copyright (c) 2013 Joris de Wit
 * MIT License
 */
! function(a, b, c) {
    "use strict";
    var d = function(b, c) {
        this.widget = "", this.$element = a(b), this.defaultTime = c.defaultTime, this.disableFocus = c.disableFocus, this.disableMousewheel = c.disableMousewheel, this.isOpen = c.isOpen, this.minuteStep = c.minuteStep, this.modalBackdrop = c.modalBackdrop, this.secondStep = c.secondStep, this.showInputs = c.showInputs, this.showMeridian = c.showMeridian, this.showSeconds = c.showSeconds, this.template = c.template, this.appendWidgetTo = c.appendWidgetTo, this.showWidgetOnAddonClick = c.showWidgetOnAddonClick, this._init()
    };
    d.prototype = {
        constructor: d,
        _init: function() {
            var b = this;
            this.showWidgetOnAddonClick && (this.$element.parent().hasClass("input-group") || this.$element.parent().hasClass("input-group")) ? (this.$element.parent(".input-group").find(".input-group-addon, .input-group-btn").on({
                "click.timepicker": a.proxy(this.showWidget, this)
            }), this.$element.on({
                "focus.timepicker": a.proxy(this.highlightUnit, this),
                "click.timepicker": a.proxy(this.highlightUnit, this),
                "keydown.timepicker": a.proxy(this.elementKeydown, this),
                "blur.timepicker": a.proxy(this.blurElement, this),
                "mousewheel.timepicker DOMMouseScroll.timepicker": a.proxy(this.mousewheel, this)
            })) : this.template ? this.$element.on({
                "focus.timepicker": a.proxy(this.showWidget, this),
                "click.timepicker": a.proxy(this.showWidget, this),
                "blur.timepicker": a.proxy(this.blurElement, this),
                "mousewheel.timepicker DOMMouseScroll.timepicker": a.proxy(this.mousewheel, this)
            }) : this.$element.on({
                "focus.timepicker": a.proxy(this.highlightUnit, this),
                "click.timepicker": a.proxy(this.highlightUnit, this),
                "keydown.timepicker": a.proxy(this.elementKeydown, this),
                "blur.timepicker": a.proxy(this.blurElement, this),
                "mousewheel.timepicker DOMMouseScroll.timepicker": a.proxy(this.mousewheel, this)
            }), this.$widget = this.template !== !1 ? a(this.getTemplate()).prependTo(this.$element.parents(this.appendWidgetTo)).on("click", a.proxy(this.widgetClick, this)) : !1, this.showInputs && this.$widget !== !1 && this.$widget.find("input").each(function() {
                a(this).on({
                    "click.timepicker": function() {
                        a(this).select()
                    },
                    "keydown.timepicker": a.proxy(b.widgetKeydown, b),
                    "keyup.timepicker": a.proxy(b.widgetKeyup, b)
                })
            }), this.setDefaultTime(this.defaultTime)
        },
        blurElement: function() {
            this.highlightedUnit = null, this.updateFromElementVal()
        },
        clear: function() {
            this.hour = "", this.minute = "", this.second = "", this.meridian = "", this.$element.val("")
        },
        decrementHour: function() {
            if (this.showMeridian)
                if (1 === this.hour) this.hour = 12;
                else {
                    if (12 === this.hour) return this.hour--, this.toggleMeridian();
                    if (0 === this.hour) return this.hour = 11, this.toggleMeridian();
                    this.hour--
                } else this.hour <= 0 ? this.hour = 23 : this.hour--
        },
        decrementMinute: function(a) {
            var b;
            b = a ? this.minute - a : this.minute - this.minuteStep, 0 > b ? (this.decrementHour(), this.minute = b + 60) : this.minute = b
        },
        decrementSecond: function() {
            var a = this.second - this.secondStep;
            0 > a ? (this.decrementMinute(!0), this.second = a + 60) : this.second = a
        },
        elementKeydown: function(a) {
            switch (a.keyCode) {
                case 9:
                case 27:
                    this.updateFromElementVal();
                    break;
                case 37:
                    a.preventDefault(), this.highlightPrevUnit();
                    break;
                case 38:
                    switch (a.preventDefault(), this.highlightedUnit) {
                        case "hour":
                            this.incrementHour(), this.highlightHour();
                            break;
                        case "minute":
                            this.incrementMinute(), this.highlightMinute();
                            break;
                        case "second":
                            this.incrementSecond(), this.highlightSecond();
                            break;
                        case "meridian":
                            this.toggleMeridian(), this.highlightMeridian()
                    }
                    this.update();
                    break;
                case 39:
                    a.preventDefault(), this.highlightNextUnit();
                    break;
                case 40:
                    switch (a.preventDefault(), this.highlightedUnit) {
                        case "hour":
                            this.decrementHour(), this.highlightHour();
                            break;
                        case "minute":
                            this.decrementMinute(), this.highlightMinute();
                            break;
                        case "second":
                            this.decrementSecond(), this.highlightSecond();
                            break;
                        case "meridian":
                            this.toggleMeridian(), this.highlightMeridian()
                    }
                    this.update()
            }
        },
        getCursorPosition: function() {
            var a = this.$element.get(0);
            if ("selectionStart" in a) return a.selectionStart;
            if (c.selection) {
                a.focus();
                var b = c.selection.createRange(),
                    d = c.selection.createRange().text.length;
                return b.moveStart("character", -a.value.length), b.text.length - d
            }
        },
        getTemplate: function() {
            var a, b, c, d, e, f;
            switch (this.showInputs ? (b = '<input type="text" class="form-control bootstrap-timepicker-hour" maxlength="2"/>', c = '<input type="text" class="form-control bootstrap-timepicker-minute" maxlength="2"/>', d = '<input type="text" class="form-control bootstrap-timepicker-second" maxlength="2"/>', e = '<input type="text" class="form-control bootstrap-timepicker-meridian" maxlength="2"/>') : (b = '<span class="bootstrap-timepicker-hour"></span>', c = '<span class="bootstrap-timepicker-minute"></span>', d = '<span class="bootstrap-timepicker-second"></span>', e = '<span class="bootstrap-timepicker-meridian"></span>'), f = '<table><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-chevron-up"></i></a></td>' + (this.showSeconds ? '<td class="separator">&nbsp;</td><td><a href="#" data-action="incrementSecond"><i class="fa fa-chevron-up"></i></a></td>' : "") + (this.showMeridian ? '<td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-chevron-up"></i></a></td>' : "") + "</tr>" + "<tr>" + "<td>" + b + "</td> " + '<td class="separator">:</td>' + "<td>" + c + "</td> " + (this.showSeconds ? '<td class="separator">:</td><td>' + d + "</td>" : "") + (this.showMeridian ? '<td class="separator">&nbsp;</td><td>' + e + "</td>" : "") + "</tr>" + "<tr>" + '<td><a href="#" data-action="decrementHour"><i class="fa fa-chevron-down"></i></a></td>' + '<td class="separator"></td>' + '<td><a href="#" data-action="decrementMinute"><i class="fa fa-chevron-down"></i></a></td>' + (this.showSeconds ? '<td class="separator">&nbsp;</td><td><a href="#" data-action="decrementSecond"><i class="fa fa-chevron-down"></i></a></td>' : "") + (this.showMeridian ? '<td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-chevron-down"></i></a></td>' : "") + "</tr>" + "</table>", this.template) {
                case "modal":
                    a = '<div class="modal fade in" data-backdrop="' + (this.modalBackdrop ? "true" : "false") + '">' + '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">' + '<a href="#" class="close" data-dismiss="modal">×</a>' + "<h3>Pick Time</h3>" + "</div>" + '<div class="modal-content"><div class="bootstrap-timepicker-widget">' + f + "</div></div>" + '<div class="modal-footer">' + '<a href="#" class="btn btn-sm btn-primary" data-dismiss="modal">OK</a>' + "</div>" + "</div>" + "</div>" + "</div>";
                    break;
                case "dropdown":
                    a = '<div class="bootstrap-timepicker-widget dropdown-menu">' + f + "</div>"
            }
            return a
        },
        getTime: function() {
            return this.hour || this.minute || this.second ? this.hour + ":" + (1 === this.minute.toString().length ? "0" + this.minute : this.minute) + (this.showSeconds ? ":" + (1 === this.second.toString().length ? "0" + this.second : this.second) : "") + (this.showMeridian ? " " + this.meridian : "") : ""
        },
        hideWidget: function() {
            this.isOpen !== !1 && (this.$element.trigger({
                type: "hide.timepicker",
                time: {
                    value: this.getTime(),
                    hours: this.hour,
                    minutes: this.minute,
                    seconds: this.second,
                    meridian: this.meridian
                }
            }), "modal" === this.template && this.$widget.modal ? this.$widget.modal("hide") : this.$widget.removeClass("open"), a(c).off("mousedown.timepicker, touchend.timepicker"), this.isOpen = !1)
        },
        highlightUnit: function() {
            this.position = this.getCursorPosition(), this.position >= 0 && this.position <= 2 ? this.highlightHour() : this.position >= 3 && this.position <= 5 ? this.highlightMinute() : this.position >= 6 && this.position <= 8 ? this.showSeconds ? this.highlightSecond() : this.highlightMeridian() : this.position >= 9 && this.position <= 11 && this.highlightMeridian()
        },
        highlightNextUnit: function() {
            switch (this.highlightedUnit) {
                case "hour":
                    this.highlightMinute();
                    break;
                case "minute":
                    this.showSeconds ? this.highlightSecond() : this.showMeridian ? this.highlightMeridian() : this.highlightHour();
                    break;
                case "second":
                    this.showMeridian ? this.highlightMeridian() : this.highlightHour();
                    break;
                case "meridian":
                    this.highlightHour()
            }
        },
        highlightPrevUnit: function() {
            switch (this.highlightedUnit) {
                case "hour":
                    this.showMeridian ? this.highlightMeridian() : this.showSeconds ? this.highlightSecond() : this.highlightMinute();
                    break;
                case "minute":
                    this.highlightHour();
                    break;
                case "second":
                    this.highlightMinute();
                    break;
                case "meridian":
                    this.showSeconds ? this.highlightSecond() : this.highlightMinute()
            }
        },
        highlightHour: function() {
            var a = this.$element.get(0),
                b = this;
            this.highlightedUnit = "hour", a.setSelectionRange && setTimeout(function() {
                b.hour < 10 ? a.setSelectionRange(0, 1) : a.setSelectionRange(0, 2)
            }, 0)
        },
        highlightMinute: function() {
            var a = this.$element.get(0),
                b = this;
            this.highlightedUnit = "minute", a.setSelectionRange && setTimeout(function() {
                b.hour < 10 ? a.setSelectionRange(2, 4) : a.setSelectionRange(3, 5)
            }, 0)
        },
        highlightSecond: function() {
            var a = this.$element.get(0),
                b = this;
            this.highlightedUnit = "second", a.setSelectionRange && setTimeout(function() {
                b.hour < 10 ? a.setSelectionRange(5, 7) : a.setSelectionRange(6, 8)
            }, 0)
        },
        highlightMeridian: function() {
            var a = this.$element.get(0),
                b = this;
            this.highlightedUnit = "meridian", a.setSelectionRange && (this.showSeconds ? setTimeout(function() {
                b.hour < 10 ? a.setSelectionRange(8, 10) : a.setSelectionRange(9, 11)
            }, 0) : setTimeout(function() {
                b.hour < 10 ? a.setSelectionRange(5, 7) : a.setSelectionRange(6, 8)
            }, 0))
        },
        incrementHour: function() {
            if (this.showMeridian) {
                if (11 === this.hour) return this.hour++, this.toggleMeridian();
                12 === this.hour && (this.hour = 0)
            }
            return 23 === this.hour ? (this.hour = 0, void 0) : (this.hour++, void 0)
        },
        incrementMinute: function(a) {
            var b;
            b = a ? this.minute + a : this.minute + this.minuteStep - this.minute % this.minuteStep, b > 59 ? (this.incrementHour(), this.minute = b - 60) : this.minute = b
        },
        incrementSecond: function() {
            var a = this.second + this.secondStep - this.second % this.secondStep;
            a > 59 ? (this.incrementMinute(!0), this.second = a - 60) : this.second = a
        },
        mousewheel: function(b) {
            if (!this.disableMousewheel) {
                b.preventDefault(), b.stopPropagation();
                var c = b.originalEvent.wheelDelta || -b.originalEvent.detail,
                    d = null;
                switch ("mousewheel" === b.type ? d = -1 * b.originalEvent.wheelDelta : "DOMMouseScroll" === b.type && (d = 40 * b.originalEvent.detail), d && (b.preventDefault(), a(this).scrollTop(d + a(this).scrollTop())), this.highlightedUnit) {
                    case "minute":
                        c > 0 ? this.incrementMinute() : this.decrementMinute(), this.highlightMinute();
                        break;
                    case "second":
                        c > 0 ? this.incrementSecond() : this.decrementSecond(), this.highlightSecond();
                        break;
                    case "meridian":
                        this.toggleMeridian(), this.highlightMeridian();
                        break;
                    default:
                        c > 0 ? this.incrementHour() : this.decrementHour(), this.highlightHour()
                }
                return !1
            }
        },
        remove: function() {
            a("document").off(".timepicker"), this.$widget && this.$widget.remove(), delete this.$element.data().timepicker
        },
        setDefaultTime: function(a) {
            if (this.$element.val()) this.updateFromElementVal();
            else if ("current" === a) {
                var b = new Date,
                    c = b.getHours(),
                    d = b.getMinutes(),
                    e = b.getSeconds(),
                    f = "AM";
                0 !== e && (e = Math.ceil(b.getSeconds() / this.secondStep) * this.secondStep, 60 === e && (d += 1, e = 0)), 0 !== d && (d = Math.ceil(b.getMinutes() / this.minuteStep) * this.minuteStep, 60 === d && (c += 1, d = 0)), this.showMeridian && (0 === c ? c = 12 : c >= 12 ? (c > 12 && (c -= 12), f = "PM") : f = "AM"), this.hour = c, this.minute = d, this.second = e, this.meridian = f, this.update()
            } else a === !1 ? (this.hour = 0, this.minute = 0, this.second = 0, this.meridian = "AM") : this.setTime(a)
        },
        setTime: function(a, b) {
            if (!a) return this.clear(), void 0;
            var c, d, e, f, g;
            "object" == typeof a && a.getMonth ? (d = a.getHours(), e = a.getMinutes(), f = a.getSeconds(), this.showMeridian && (g = "AM", d > 12 && (g = "PM", d %= 12), 12 === d && (g = "PM"))) : (g = null !== a.match(/p/i) ? "PM" : "AM", a = a.replace(/[^0-9\:]/g, ""), c = a.split(":"), d = c[0] ? c[0].toString() : c.toString(), e = c[1] ? c[1].toString() : "", f = c[2] ? c[2].toString() : "", d.length > 4 && (f = d.substr(4, 2)), d.length > 2 && (e = d.substr(2, 2), d = d.substr(0, 2)), e.length > 2 && (f = e.substr(2, 2), e = e.substr(0, 2)), f.length > 2 && (f = f.substr(2, 2)), d = parseInt(d, 10), e = parseInt(e, 10), f = parseInt(f, 10), isNaN(d) && (d = 0), isNaN(e) && (e = 0), isNaN(f) && (f = 0), this.showMeridian ? 1 > d ? d = 1 : d > 12 && (d = 12) : (d >= 24 ? d = 23 : 0 > d && (d = 0), 13 > d && "PM" === g && (d += 12)), 0 > e ? e = 0 : e >= 60 && (e = 59), this.showSeconds && (isNaN(f) ? f = 0 : 0 > f ? f = 0 : f >= 60 && (f = 59))), this.hour = d, this.minute = e, this.second = f, this.meridian = g, this.update(b)
        },
        showWidget: function() {
            if (!this.isOpen && !this.$element.is(":disabled")) {
                var b = this;
                a(c).on("mousedown.timepicker, touchend.timepicker", function(c) {
                    0 === a(c.target).closest(".bootstrap-timepicker-widget").length && b.hideWidget()
                }), this.$element.trigger({
                    type: "show.timepicker",
                    time: {
                        value: this.getTime(),
                        hours: this.hour,
                        minutes: this.minute,
                        seconds: this.second,
                        meridian: this.meridian
                    }
                }), this.disableFocus && this.$element.blur(), this.hour || (this.defaultTime ? this.setDefaultTime(this.defaultTime) : this.setTime("0:0:0")), "modal" === this.template && this.$widget.modal ? this.$widget.modal("show").on("hidden", a.proxy(this.hideWidget, this)) : this.isOpen === !1 && this.$widget.addClass("open"), this.isOpen = !0
            }
        },
        toggleMeridian: function() {
            this.meridian = "AM" === this.meridian ? "PM" : "AM"
        },
        update: function(a) {
            this.updateElement(), a || this.updateWidget(), this.$element.trigger({
                type: "changeTime.timepicker",
                time: {
                    value: this.getTime(),
                    hours: this.hour,
                    minutes: this.minute,
                    seconds: this.second,
                    meridian: this.meridian
                }
            })
        },
        updateElement: function() {
            this.$element.val(this.getTime()).change()
        },
        updateFromElementVal: function() {
            this.setTime(this.$element.val())
        },
        updateWidget: function() {
            if (this.$widget !== !1) {
                var a = this.hour,
                    b = 1 === this.minute.toString().length ? "0" + this.minute : this.minute,
                    c = 1 === this.second.toString().length ? "0" + this.second : this.second;
                this.showInputs ? (this.$widget.find("input.bootstrap-timepicker-hour").val(a), this.$widget.find("input.bootstrap-timepicker-minute").val(b), this.showSeconds && this.$widget.find("input.bootstrap-timepicker-second").val(c), this.showMeridian && this.$widget.find("input.bootstrap-timepicker-meridian").val(this.meridian)) : (this.$widget.find("span.bootstrap-timepicker-hour").text(a), this.$widget.find("span.bootstrap-timepicker-minute").text(b), this.showSeconds && this.$widget.find("span.bootstrap-timepicker-second").text(c), this.showMeridian && this.$widget.find("span.bootstrap-timepicker-meridian").text(this.meridian))
            }
        },
        updateFromWidgetInputs: function() {
            if (this.$widget !== !1) {
                var a = this.$widget.find("input.bootstrap-timepicker-hour").val() + ":" + this.$widget.find("input.bootstrap-timepicker-minute").val() + (this.showSeconds ? ":" + this.$widget.find("input.bootstrap-timepicker-second").val() : "") + (this.showMeridian ? this.$widget.find("input.bootstrap-timepicker-meridian").val() : "");
                this.setTime(a, !0)
            }
        },
        widgetClick: function(b) {
            b.stopPropagation(), b.preventDefault();
            var c = a(b.target),
                d = c.closest("a").data("action");
            d && this[d](), this.update(), c.is("input") && c.get(0).setSelectionRange(0, 2)
        },
        widgetKeydown: function(b) {
            var c = a(b.target),
                d = c.attr("class").replace("bootstrap-timepicker-", "");
            switch (b.keyCode) {
                case 9:
                    if (this.showMeridian && "meridian" === d || this.showSeconds && "second" === d || !this.showMeridian && !this.showSeconds && "minute" === d) return this.hideWidget();
                    break;
                case 27:
                    this.hideWidget();
                    break;
                case 38:
                    switch (b.preventDefault(), d) {
                        case "hour":
                            this.incrementHour();
                            break;
                        case "minute":
                            this.incrementMinute();
                            break;
                        case "second":
                            this.incrementSecond();
                            break;
                        case "meridian":
                            this.toggleMeridian()
                    }
                    this.setTime(this.getTime()), c.get(0).setSelectionRange(0, 2);
                    break;
                case 40:
                    switch (b.preventDefault(), d) {
                        case "hour":
                            this.decrementHour();
                            break;
                        case "minute":
                            this.decrementMinute();
                            break;
                        case "second":
                            this.decrementSecond();
                            break;
                        case "meridian":
                            this.toggleMeridian()
                    }
                    this.setTime(this.getTime()), c.get(0).setSelectionRange(0, 2)
            }
        },
        widgetKeyup: function(a) {
            (65 === a.keyCode || 77 === a.keyCode || 80 === a.keyCode || 46 === a.keyCode || 8 === a.keyCode || a.keyCode >= 46 && a.keyCode <= 57) && this.updateFromWidgetInputs()
        }
    }, a.fn.timepicker = function(b) {
        var c = Array.apply(null, arguments);
        return c.shift(), this.each(function() {
            var e = a(this),
                f = e.data("timepicker"),
                g = "object" == typeof b && b;
            f || e.data("timepicker", f = new d(this, a.extend({}, a.fn.timepicker.defaults, g, a(this).data()))), "string" == typeof b && f[b].apply(f, c)
        })
    }, a.fn.timepicker.defaults = {
        defaultTime: "current",
        disableFocus: !1,
        disableMousewheel: !1,
        isOpen: !1,
        minuteStep: 15,
        modalBackdrop: !1,
        secondStep: 15,
        showSeconds: !1,
        showInputs: !0,
        showMeridian: !0,
        template: "dropdown",
        appendWidgetTo: ".bootstrap-timepicker",
        showWidgetOnAddonClick: !0
    }, a.fn.timepicker.Constructor = d
}(jQuery, window, document);
/* Chosen v1.2.0 | (c) 2011-2014 by Harvest | MIT License, https://github.com/harvesthq/chosen/blob/master/LICENSE.md */
! function() {
    var a, AbstractChosen, Chosen, SelectParser, b, c = {}.hasOwnProperty,
        d = function(a, b) {
            function d() {
                this.constructor = a
            }
            for (var e in b) c.call(b, e) && (a[e] = b[e]);
            return d.prototype = b.prototype, a.prototype = new d, a.__super__ = b.prototype, a
        };
    SelectParser = function() {
        function SelectParser() {
            this.options_index = 0, this.parsed = []
        }
        return SelectParser.prototype.add_node = function(a) {
            return "OPTGROUP" === a.nodeName.toUpperCase() ? this.add_group(a) : this.add_option(a)
        }, SelectParser.prototype.add_group = function(a) {
            var b, c, d, e, f, g;
            for (b = this.parsed.length, this.parsed.push({
                    array_index: b,
                    group: !0,
                    label: this.escapeExpression(a.label),
                    children: 0,
                    disabled: a.disabled
                }), f = a.childNodes, g = [], d = 0, e = f.length; e > d; d++) c = f[d], g.push(this.add_option(c, b, a.disabled));
            return g
        }, SelectParser.prototype.add_option = function(a, b, c) {
            return "OPTION" === a.nodeName.toUpperCase() ? ("" !== a.text ? (null != b && (this.parsed[b].children += 1), this.parsed.push({
                array_index: this.parsed.length,
                options_index: this.options_index,
                value: a.value,
                text: a.text,
                html: a.innerHTML,
                selected: a.selected,
                disabled: c === !0 ? c : a.disabled,
                group_array_index: b,
                classes: a.className,
                style: a.style.cssText
            })) : this.parsed.push({
                array_index: this.parsed.length,
                options_index: this.options_index,
                empty: !0
            }), this.options_index += 1) : void 0
        }, SelectParser.prototype.escapeExpression = function(a) {
            var b, c;
            return null == a || a === !1 ? "" : /[\&\<\>\"\'\`]/.test(a) ? (b = {
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#x27;",
                "`": "&#x60;"
            }, c = /&(?!\w+;)|[\<\>\"\'\`]/g, a.replace(c, function(a) {
                return b[a] || "&amp;"
            })) : a
        }, SelectParser
    }(), SelectParser.select_to_array = function(a) {
        var b, c, d, e, f;
        for (c = new SelectParser, f = a.childNodes, d = 0, e = f.length; e > d; d++) b = f[d], c.add_node(b);
        return c.parsed
    }, AbstractChosen = function() {
        function AbstractChosen(a, b) {
            this.form_field = a, this.options = null != b ? b : {}, AbstractChosen.browser_is_supported() && (this.is_multiple = this.form_field.multiple, this.set_default_text(), this.set_default_values(), this.setup(), this.set_up_html(), this.register_observers())
        }
        return AbstractChosen.prototype.set_default_values = function() {
            var a = this;
            return this.click_test_action = function(b) {
                return a.test_active_click(b)
            }, this.activate_action = function(b) {
                return a.activate_field(b)
            }, this.active_field = !1, this.mouse_on_container = !1, this.results_showing = !1, this.result_highlighted = null, this.allow_single_deselect = null != this.options.allow_single_deselect && null != this.form_field.options[0] && "" === this.form_field.options[0].text ? this.options.allow_single_deselect : !1, this.disable_search_threshold = this.options.disable_search_threshold || 0, this.disable_search = this.options.disable_search || !1, this.enable_split_word_search = null != this.options.enable_split_word_search ? this.options.enable_split_word_search : !0, this.group_search = null != this.options.group_search ? this.options.group_search : !0, this.search_contains = this.options.search_contains || !1, this.single_backstroke_delete = null != this.options.single_backstroke_delete ? this.options.single_backstroke_delete : !0, this.max_selected_options = this.options.max_selected_options || 1 / 0, this.inherit_select_classes = this.options.inherit_select_classes || !1, this.display_selected_options = null != this.options.display_selected_options ? this.options.display_selected_options : !0, this.display_disabled_options = null != this.options.display_disabled_options ? this.options.display_disabled_options : !0
        }, AbstractChosen.prototype.set_default_text = function() {
            return this.default_text = this.form_field.getAttribute("data-placeholder") ? this.form_field.getAttribute("data-placeholder") : this.is_multiple ? this.options.placeholder_text_multiple || this.options.placeholder_text || AbstractChosen.default_multiple_text : this.options.placeholder_text_single || this.options.placeholder_text || AbstractChosen.default_single_text, this.results_none_found = this.form_field.getAttribute("data-no_results_text") || this.options.no_results_text || AbstractChosen.default_no_result_text
        }, AbstractChosen.prototype.mouse_enter = function() {
            return this.mouse_on_container = !0
        }, AbstractChosen.prototype.mouse_leave = function() {
            return this.mouse_on_container = !1
        }, AbstractChosen.prototype.input_focus = function() {
            var a = this;
            if (this.is_multiple) {
                if (!this.active_field) return setTimeout(function() {
                    return a.container_mousedown()
                }, 50)
            } else if (!this.active_field) return this.activate_field()
        }, AbstractChosen.prototype.input_blur = function() {
            var a = this;
            return this.mouse_on_container ? void 0 : (this.active_field = !1, setTimeout(function() {
                return a.blur_test()
            }, 100))
        }, AbstractChosen.prototype.results_option_build = function(a) {
            var b, c, d, e, f;
            for (b = "", f = this.results_data, d = 0, e = f.length; e > d; d++) c = f[d], b += c.group ? this.result_add_group(c) : this.result_add_option(c), (null != a ? a.first : void 0) && (c.selected && this.is_multiple ? this.choice_build(c) : c.selected && !this.is_multiple && this.single_set_selected_text(c.text));
            return b
        }, AbstractChosen.prototype.result_add_option = function(a) {
            var b, c;
            return a.search_match ? this.include_option_in_results(a) ? (b = [], a.disabled || a.selected && this.is_multiple || b.push("active-result"), !a.disabled || a.selected && this.is_multiple || b.push("disabled-result"), a.selected && b.push("result-selected"), null != a.group_array_index && b.push("group-option"), "" !== a.classes && b.push(a.classes), c = document.createElement("li"), c.className = b.join(" "), c.style.cssText = a.style, c.setAttribute("data-option-array-index", a.array_index), c.innerHTML = a.search_text, this.outerHTML(c)) : "" : ""
        }, AbstractChosen.prototype.result_add_group = function(a) {
            var b;
            return a.search_match || a.group_match ? a.active_options > 0 ? (b = document.createElement("li"), b.className = "group-result", b.innerHTML = a.search_text, this.outerHTML(b)) : "" : ""
        }, AbstractChosen.prototype.results_update_field = function() {
            return this.set_default_text(), this.is_multiple || this.results_reset_cleanup(), this.result_clear_highlight(), this.results_build(), this.results_showing ? this.winnow_results() : void 0
        }, AbstractChosen.prototype.reset_single_select_options = function() {
            var a, b, c, d, e;
            for (d = this.results_data, e = [], b = 0, c = d.length; c > b; b++) a = d[b], a.selected ? e.push(a.selected = !1) : e.push(void 0);
            return e
        }, AbstractChosen.prototype.results_toggle = function() {
            return this.results_showing ? this.results_hide() : this.results_show()
        }, AbstractChosen.prototype.results_search = function() {
            return this.results_showing ? this.winnow_results() : this.results_show()
        }, AbstractChosen.prototype.winnow_results = function() {
            var a, b, c, d, e, f, g, h, i, j, k, l;
            for (this.no_results_clear(), d = 0, f = this.get_search_text(), a = f.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&"), i = new RegExp(a, "i"), c = this.get_search_regex(a), l = this.results_data, j = 0, k = l.length; k > j; j++) b = l[j], b.search_match = !1, e = null, this.include_option_in_results(b) && (b.group && (b.group_match = !1, b.active_options = 0), null != b.group_array_index && this.results_data[b.group_array_index] && (e = this.results_data[b.group_array_index], 0 === e.active_options && e.search_match && (d += 1), e.active_options += 1), (!b.group || this.group_search) && (b.search_text = b.group ? b.label : b.text, b.search_match = this.search_string_match(b.search_text, c), b.search_match && !b.group && (d += 1), b.search_match ? (f.length && (g = b.search_text.search(i), h = b.search_text.substr(0, g + f.length) + "</em>" + b.search_text.substr(g + f.length), b.search_text = h.substr(0, g) + "<em>" + h.substr(g)), null != e && (e.group_match = !0)) : null != b.group_array_index && this.results_data[b.group_array_index].search_match && (b.search_match = !0)));
            return this.result_clear_highlight(), 1 > d && f.length ? (this.update_results_content(""), this.no_results(f)) : (this.update_results_content(this.results_option_build()), this.winnow_results_set_highlight())
        }, AbstractChosen.prototype.get_search_regex = function(a) {
            var b;
            return b = this.search_contains ? "" : "^", new RegExp(b + a, "i")
        }, AbstractChosen.prototype.search_string_match = function(a, b) {
            var c, d, e, f;
            if (b.test(a)) return !0;
            if (this.enable_split_word_search && (a.indexOf(" ") >= 0 || 0 === a.indexOf("[")) && (d = a.replace(/\[|\]/g, "").split(" "), d.length))
                for (e = 0, f = d.length; f > e; e++)
                    if (c = d[e], b.test(c)) return !0
        }, AbstractChosen.prototype.choices_count = function() {
            var a, b, c, d;
            if (null != this.selected_option_count) return this.selected_option_count;
            for (this.selected_option_count = 0, d = this.form_field.options, b = 0, c = d.length; c > b; b++) a = d[b], a.selected && (this.selected_option_count += 1);
            return this.selected_option_count
        }, AbstractChosen.prototype.choices_click = function(a) {
            return a.preventDefault(), this.results_showing || this.is_disabled ? void 0 : this.results_show()
        }, AbstractChosen.prototype.keyup_checker = function(a) {
            var b, c;
            switch (b = null != (c = a.which) ? c : a.keyCode, this.search_field_scale(), b) {
                case 8:
                    if (this.is_multiple && this.backstroke_length < 1 && this.choices_count() > 0) return this.keydown_backstroke();
                    if (!this.pending_backstroke) return this.result_clear_highlight(), this.results_search();
                    break;
                case 13:
                    if (a.preventDefault(), this.results_showing) return this.result_select(a);
                    break;
                case 27:
                    return this.results_showing && this.results_hide(), !0;
                case 9:
                case 38:
                case 40:
                case 16:
                case 91:
                case 17:
                    break;
                default:
                    return this.results_search()
            }
        }, AbstractChosen.prototype.clipboard_event_checker = function() {
            var a = this;
            return setTimeout(function() {
                return a.results_search()
            }, 50)
        }, AbstractChosen.prototype.container_width = function() {
            return null != this.options.width ? this.options.width : "" + this.form_field.offsetWidth + "px"
        }, AbstractChosen.prototype.include_option_in_results = function(a) {
            return this.is_multiple && !this.display_selected_options && a.selected ? !1 : !this.display_disabled_options && a.disabled ? !1 : a.empty ? !1 : !0
        }, AbstractChosen.prototype.search_results_touchstart = function(a) {
            return this.touch_started = !0, this.search_results_mouseover(a)
        }, AbstractChosen.prototype.search_results_touchmove = function(a) {
            return this.touch_started = !1, this.search_results_mouseout(a)
        }, AbstractChosen.prototype.search_results_touchend = function(a) {
            return this.touch_started ? this.search_results_mouseup(a) : void 0
        }, AbstractChosen.prototype.outerHTML = function(a) {
            var b;
            return a.outerHTML ? a.outerHTML : (b = document.createElement("div"), b.appendChild(a), b.innerHTML)
        }, AbstractChosen.browser_is_supported = function() {
            return "Microsoft Internet Explorer" === window.navigator.appName ? document.documentMode >= 8 : /iP(od|hone)/i.test(window.navigator.userAgent) ? !1 : /Android/i.test(window.navigator.userAgent) && /Mobile/i.test(window.navigator.userAgent) ? !1 : !0
        }, AbstractChosen.default_multiple_text = "Select Some Options", AbstractChosen.default_single_text = "Select an Option", AbstractChosen.default_no_result_text = "No results match", AbstractChosen
    }(), a = jQuery, a.fn.extend({
        chosen: function(b) {
            return AbstractChosen.browser_is_supported() ? this.each(function() {
                var c, d;
                c = a(this), d = c.data("chosen"), "destroy" === b && d instanceof Chosen ? d.destroy() : d instanceof Chosen || c.data("chosen", new Chosen(this, b))
            }) : this
        }
    }), Chosen = function(c) {
        function Chosen() {
            return b = Chosen.__super__.constructor.apply(this, arguments)
        }
        return d(Chosen, c), Chosen.prototype.setup = function() {
            return this.form_field_jq = a(this.form_field), this.current_selectedIndex = this.form_field.selectedIndex, this.is_rtl = this.form_field_jq.hasClass("chosen-rtl")
        }, Chosen.prototype.set_up_html = function() {
            var b, c;
            return b = ["chosen-container"], b.push("chosen-container-" + (this.is_multiple ? "multi" : "single")), this.inherit_select_classes && this.form_field.className && b.push(this.form_field.className), this.is_rtl && b.push("chosen-rtl"), c = {
                "class": b.join(" "),
                style: "width: " + this.container_width() + ";",
                title: this.form_field.title
            }, this.form_field.id.length && (c.id = this.form_field.id.replace(/[^\w]/g, "_") + "_chosen"), this.container = a("<div />", c), this.is_multiple ? this.container.html('<ul class="chosen-choices"><li class="search-field"><input type="text" value="' + this.default_text + '" class="default" autocomplete="off" style="width:25px;" /></li></ul><div class="chosen-drop"><ul class="chosen-results"></ul></div>') : this.container.html('<a class="chosen-single chosen-default" tabindex="-1"><span>' + this.default_text + '</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" /></div><ul class="chosen-results"></ul></div>'), this.form_field_jq.hide().after(this.container), this.dropdown = this.container.find("div.chosen-drop").first(), this.search_field = this.container.find("input").first(), this.search_results = this.container.find("ul.chosen-results").first(), this.search_field_scale(), this.search_no_results = this.container.find("li.no-results").first(), this.is_multiple ? (this.search_choices = this.container.find("ul.chosen-choices").first(), this.search_container = this.container.find("li.search-field").first()) : (this.search_container = this.container.find("div.chosen-search").first(), this.selected_item = this.container.find(".chosen-single").first()), this.results_build(), this.set_tab_index(), this.set_label_behavior(), this.form_field_jq.trigger("chosen:ready", {
                chosen: this
            })
        }, Chosen.prototype.register_observers = function() {
            var a = this;
            return this.container.bind("touchstart.chosen", function(b) {
                a.container_mousedown(b)
            }), this.container.bind("touchend.chosen", function(b) {
                a.container_mouseup(b)
            }), this.container.bind("mousedown.chosen", function(b) {
                a.container_mousedown(b)
            }), this.container.bind("mouseup.chosen", function(b) {
                a.container_mouseup(b)
            }), this.container.bind("mouseenter.chosen", function(b) {
                a.mouse_enter(b)
            }), this.container.bind("mouseleave.chosen", function(b) {
                a.mouse_leave(b)
            }), this.search_results.bind("mouseup.chosen", function(b) {
                a.search_results_mouseup(b)
            }), this.search_results.bind("mouseover.chosen", function(b) {
                a.search_results_mouseover(b)
            }), this.search_results.bind("mouseout.chosen", function(b) {
                a.search_results_mouseout(b)
            }), this.search_results.bind("mousewheel.chosen DOMMouseScroll.chosen", function(b) {
                a.search_results_mousewheel(b)
            }), this.search_results.bind("touchstart.chosen", function(b) {
                a.search_results_touchstart(b)
            }), this.search_results.bind("touchmove.chosen", function(b) {
                a.search_results_touchmove(b)
            }), this.search_results.bind("touchend.chosen", function(b) {
                a.search_results_touchend(b)
            }), this.form_field_jq.bind("chosen:updated.chosen", function(b) {
                a.results_update_field(b)
            }), this.form_field_jq.bind("chosen:activate.chosen", function(b) {
                a.activate_field(b)
            }), this.form_field_jq.bind("chosen:open.chosen", function(b) {
                a.container_mousedown(b)
            }), this.form_field_jq.bind("chosen:close.chosen", function(b) {
                a.input_blur(b)
            }), this.search_field.bind("blur.chosen", function(b) {
                a.input_blur(b)
            }), this.search_field.bind("keyup.chosen", function(b) {
                a.keyup_checker(b)
            }), this.search_field.bind("keydown.chosen", function(b) {
                a.keydown_checker(b)
            }), this.search_field.bind("focus.chosen", function(b) {
                a.input_focus(b)
            }), this.search_field.bind("cut.chosen", function(b) {
                a.clipboard_event_checker(b)
            }), this.search_field.bind("paste.chosen", function(b) {
                a.clipboard_event_checker(b)
            }), this.is_multiple ? this.search_choices.bind("click.chosen", function(b) {
                a.choices_click(b)
            }) : this.container.bind("click.chosen", function(a) {
                a.preventDefault()
            })
        }, Chosen.prototype.destroy = function() {
            return a(this.container[0].ownerDocument).unbind("click.chosen", this.click_test_action), this.search_field[0].tabIndex && (this.form_field_jq[0].tabIndex = this.search_field[0].tabIndex), this.container.remove(), this.form_field_jq.removeData("chosen"), this.form_field_jq.show()
        }, Chosen.prototype.search_field_disabled = function() {
            return this.is_disabled = this.form_field_jq[0].disabled, this.is_disabled ? (this.container.addClass("chosen-disabled"), this.search_field[0].disabled = !0, this.is_multiple || this.selected_item.unbind("focus.chosen", this.activate_action), this.close_field()) : (this.container.removeClass("chosen-disabled"), this.search_field[0].disabled = !1, this.is_multiple ? void 0 : this.selected_item.bind("focus.chosen", this.activate_action))
        }, Chosen.prototype.container_mousedown = function(b) {
            return this.is_disabled || (b && "mousedown" === b.type && !this.results_showing && b.preventDefault(), null != b && a(b.target).hasClass("search-choice-close")) ? void 0 : (this.active_field ? this.is_multiple || !b || a(b.target)[0] !== this.selected_item[0] && !a(b.target).parents("a.chosen-single").length || (b.preventDefault(), this.results_toggle()) : (this.is_multiple && this.search_field.val(""), a(this.container[0].ownerDocument).bind("click.chosen", this.click_test_action), this.results_show()), this.activate_field())
        }, Chosen.prototype.container_mouseup = function(a) {
            return "ABBR" !== a.target.nodeName || this.is_disabled ? void 0 : this.results_reset(a)
        }, Chosen.prototype.search_results_mousewheel = function(a) {
            var b;
            return a.originalEvent && (b = a.originalEvent.deltaY || -a.originalEvent.wheelDelta || a.originalEvent.detail), null != b ? (a.preventDefault(), "DOMMouseScroll" === a.type && (b = 40 * b), this.search_results.scrollTop(b + this.search_results.scrollTop())) : void 0
        }, Chosen.prototype.blur_test = function() {
            return !this.active_field && this.container.hasClass("chosen-container-active") ? this.close_field() : void 0
        }, Chosen.prototype.close_field = function() {
            return a(this.container[0].ownerDocument).unbind("click.chosen", this.click_test_action), this.active_field = !1, this.results_hide(), this.container.removeClass("chosen-container-active"), this.clear_backstroke(), this.show_search_field_default(), this.search_field_scale()
        }, Chosen.prototype.activate_field = function() {
            return this.container.addClass("chosen-container-active"), this.active_field = !0, this.search_field.val(this.search_field.val()), this.search_field.focus()
        }, Chosen.prototype.test_active_click = function(b) {
            var c;
            return c = a(b.target).closest(".chosen-container"), c.length && this.container[0] === c[0] ? this.active_field = !0 : this.close_field()
        }, Chosen.prototype.results_build = function() {
            return this.parsing = !0, this.selected_option_count = null, this.results_data = SelectParser.select_to_array(this.form_field), this.is_multiple ? this.search_choices.find("li.search-choice").remove() : this.is_multiple || (this.single_set_selected_text(), this.disable_search || this.form_field.options.length <= this.disable_search_threshold ? (this.search_field[0].readOnly = !0, this.container.addClass("chosen-container-single-nosearch")) : (this.search_field[0].readOnly = !1, this.container.removeClass("chosen-container-single-nosearch"))), this.update_results_content(this.results_option_build({
                first: !0
            })), this.search_field_disabled(), this.show_search_field_default(), this.search_field_scale(), this.parsing = !1
        }, Chosen.prototype.result_do_highlight = function(a) {
            var b, c, d, e, f;
            if (a.length) {
                if (this.result_clear_highlight(), this.result_highlight = a, this.result_highlight.addClass("highlighted"), d = parseInt(this.search_results.css("maxHeight"), 10), f = this.search_results.scrollTop(), e = d + f, c = this.result_highlight.position().top + this.search_results.scrollTop(), b = c + this.result_highlight.outerHeight(), b >= e) return this.search_results.scrollTop(b - d > 0 ? b - d : 0);
                if (f > c) return this.search_results.scrollTop(c)
            }
        }, Chosen.prototype.result_clear_highlight = function() {
            return this.result_highlight && this.result_highlight.removeClass("highlighted"), this.result_highlight = null
        }, Chosen.prototype.results_show = function() {
            return this.is_multiple && this.max_selected_options <= this.choices_count() ? (this.form_field_jq.trigger("chosen:maxselected", {
                chosen: this
            }), !1) : (this.container.addClass("chosen-with-drop"), this.results_showing = !0, this.search_field.focus(), this.search_field.val(this.search_field.val()), this.winnow_results(), this.form_field_jq.trigger("chosen:showing_dropdown", {
                chosen: this
            }))
        }, Chosen.prototype.update_results_content = function(a) {
            return this.search_results.html(a)
        }, Chosen.prototype.results_hide = function() {
            return this.results_showing && (this.result_clear_highlight(), this.container.removeClass("chosen-with-drop"), this.form_field_jq.trigger("chosen:hiding_dropdown", {
                chosen: this
            })), this.results_showing = !1
        }, Chosen.prototype.set_tab_index = function() {
            var a;
            return this.form_field.tabIndex ? (a = this.form_field.tabIndex, this.form_field.tabIndex = -1, this.search_field[0].tabIndex = a) : void 0
        }, Chosen.prototype.set_label_behavior = function() {
            var b = this;
            return this.form_field_label = this.form_field_jq.parents("label"), !this.form_field_label.length && this.form_field.id.length && (this.form_field_label = a("label[for='" + this.form_field.id + "']")), this.form_field_label.length > 0 ? this.form_field_label.bind("click.chosen", function(a) {
                return b.is_multiple ? b.container_mousedown(a) : b.activate_field()
            }) : void 0
        }, Chosen.prototype.show_search_field_default = function() {
            return this.is_multiple && this.choices_count() < 1 && !this.active_field ? (this.search_field.val(this.default_text), this.search_field.addClass("default")) : (this.search_field.val(""), this.search_field.removeClass("default"))
        }, Chosen.prototype.search_results_mouseup = function(b) {
            var c;
            return c = a(b.target).hasClass("active-result") ? a(b.target) : a(b.target).parents(".active-result").first(), c.length ? (this.result_highlight = c, this.result_select(b), this.search_field.focus()) : void 0
        }, Chosen.prototype.search_results_mouseover = function(b) {
            var c;
            return c = a(b.target).hasClass("active-result") ? a(b.target) : a(b.target).parents(".active-result").first(), c ? this.result_do_highlight(c) : void 0
        }, Chosen.prototype.search_results_mouseout = function(b) {
            return a(b.target).hasClass("active-result") ? this.result_clear_highlight() : void 0
        }, Chosen.prototype.choice_build = function(b) {
            var c, d, e = this;
            return c = a("<li />", {
                "class": "search-choice"
            }).html("<span>" + b.html + "</span>"), b.disabled ? c.addClass("search-choice-disabled") : (d = a("<a />", {
                "class": "search-choice-close",
                "data-option-array-index": b.array_index
            }), d.bind("click.chosen", function(a) {
                return e.choice_destroy_link_click(a)
            }), c.append(d)), this.search_container.before(c)
        }, Chosen.prototype.choice_destroy_link_click = function(b) {
            return b.preventDefault(), b.stopPropagation(), this.is_disabled ? void 0 : this.choice_destroy(a(b.target))
        }, Chosen.prototype.choice_destroy = function(a) {
            return this.result_deselect(a[0].getAttribute("data-option-array-index")) ? (this.show_search_field_default(), this.is_multiple && this.choices_count() > 0 && this.search_field.val().length < 1 && this.results_hide(), a.parents("li").first().remove(), this.search_field_scale()) : void 0
        }, Chosen.prototype.results_reset = function() {
            return this.reset_single_select_options(), this.form_field.options[0].selected = !0, this.single_set_selected_text(), this.show_search_field_default(), this.results_reset_cleanup(), this.form_field_jq.trigger("change"), this.active_field ? this.results_hide() : void 0
        }, Chosen.prototype.results_reset_cleanup = function() {
            return this.current_selectedIndex = this.form_field.selectedIndex, this.selected_item.find("abbr").remove()
        }, Chosen.prototype.result_select = function(a) {
            var b, c;
            return this.result_highlight ? (b = this.result_highlight, this.result_clear_highlight(), this.is_multiple && this.max_selected_options <= this.choices_count() ? (this.form_field_jq.trigger("chosen:maxselected", {
                chosen: this
            }), !1) : (this.is_multiple ? b.removeClass("active-result") : this.reset_single_select_options(), c = this.results_data[b[0].getAttribute("data-option-array-index")], c.selected = !0, this.form_field.options[c.options_index].selected = !0, this.selected_option_count = null, this.is_multiple ? this.choice_build(c) : this.single_set_selected_text(c.text), (a.metaKey || a.ctrlKey) && this.is_multiple || this.results_hide(), this.search_field.val(""), (this.is_multiple || this.form_field.selectedIndex !== this.current_selectedIndex) && this.form_field_jq.trigger("change", {
                selected: this.form_field.options[c.options_index].value
            }), this.current_selectedIndex = this.form_field.selectedIndex, this.search_field_scale())) : void 0
        }, Chosen.prototype.single_set_selected_text = function(a) {
            return null == a && (a = this.default_text), a === this.default_text ? this.selected_item.addClass("chosen-default") : (this.single_deselect_control_build(), this.selected_item.removeClass("chosen-default")), this.selected_item.find("span").text(a)
        }, Chosen.prototype.result_deselect = function(a) {
            var b;
            return b = this.results_data[a], this.form_field.options[b.options_index].disabled ? !1 : (b.selected = !1, this.form_field.options[b.options_index].selected = !1, this.selected_option_count = null, this.result_clear_highlight(), this.results_showing && this.winnow_results(), this.form_field_jq.trigger("change", {
                deselected: this.form_field.options[b.options_index].value
            }), this.search_field_scale(), !0)
        }, Chosen.prototype.single_deselect_control_build = function() {
            return this.allow_single_deselect ? (this.selected_item.find("abbr").length || this.selected_item.find("span").first().after('<abbr class="search-choice-close"></abbr>'), this.selected_item.addClass("chosen-single-with-deselect")) : void 0
        }, Chosen.prototype.get_search_text = function() {
            return this.search_field.val() === this.default_text ? "" : a("<div/>").text(a.trim(this.search_field.val())).html()
        }, Chosen.prototype.winnow_results_set_highlight = function() {
            var a, b;
            return b = this.is_multiple ? [] : this.search_results.find(".result-selected.active-result"), a = b.length ? b.first() : this.search_results.find(".active-result").first(), null != a ? this.result_do_highlight(a) : void 0
        }, Chosen.prototype.no_results = function(b) {
            var c;
            return c = a('<li class="no-results">' + this.results_none_found + ' "<span></span>"</li>'), c.find("span").first().html(b), this.search_results.append(c), this.form_field_jq.trigger("chosen:no_results", {
                chosen: this
            })
        }, Chosen.prototype.no_results_clear = function() {
            return this.search_results.find(".no-results").remove()
        }, Chosen.prototype.keydown_arrow = function() {
            var a;
            return this.results_showing && this.result_highlight ? (a = this.result_highlight.nextAll("li.active-result").first()) ? this.result_do_highlight(a) : void 0 : this.results_show()
        }, Chosen.prototype.keyup_arrow = function() {
            var a;
            return this.results_showing || this.is_multiple ? this.result_highlight ? (a = this.result_highlight.prevAll("li.active-result"), a.length ? this.result_do_highlight(a.first()) : (this.choices_count() > 0 && this.results_hide(), this.result_clear_highlight())) : void 0 : this.results_show()
        }, Chosen.prototype.keydown_backstroke = function() {
            var a;
            return this.pending_backstroke ? (this.choice_destroy(this.pending_backstroke.find("a").first()), this.clear_backstroke()) : (a = this.search_container.siblings("li.search-choice").last(), a.length && !a.hasClass("search-choice-disabled") ? (this.pending_backstroke = a, this.single_backstroke_delete ? this.keydown_backstroke() : this.pending_backstroke.addClass("search-choice-focus")) : void 0)
        }, Chosen.prototype.clear_backstroke = function() {
            return this.pending_backstroke && this.pending_backstroke.removeClass("search-choice-focus"), this.pending_backstroke = null
        }, Chosen.prototype.keydown_checker = function(a) {
            var b, c;
            switch (b = null != (c = a.which) ? c : a.keyCode, this.search_field_scale(), 8 !== b && this.pending_backstroke && this.clear_backstroke(), b) {
                case 8:
                    this.backstroke_length = this.search_field.val().length;
                    break;
                case 9:
                    this.results_showing && !this.is_multiple && this.result_select(a), this.mouse_on_container = !1;
                    break;
                case 13:
                    this.results_showing && a.preventDefault();
                    break;
                case 32:
                    this.disable_search && a.preventDefault();
                    break;
                case 38:
                    a.preventDefault(), this.keyup_arrow();
                    break;
                case 40:
                    a.preventDefault(), this.keydown_arrow()
            }
        }, Chosen.prototype.search_field_scale = function() {
            var b, c, d, e, f, g, h, i, j;
            if (this.is_multiple) {
                for (d = 0, h = 0, f = "position:absolute; left: -1000px; top: -1000px; display:none;", g = ["font-size", "font-style", "font-weight", "font-family", "line-height", "text-transform", "letter-spacing"], i = 0, j = g.length; j > i; i++) e = g[i], f += e + ":" + this.search_field.css(e) + ";";
                return b = a("<div />", {
                    style: f
                }), b.text(this.search_field.val()), a("body").append(b), h = b.width() + 25, b.remove(), c = this.container.outerWidth(), h > c - 10 && (h = c - 10), this.search_field.css({
                    width: h + "px"
                })
            }
        }, Chosen
    }(AbstractChosen)
}.call(this);
