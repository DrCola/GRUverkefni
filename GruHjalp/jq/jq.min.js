/**
 * jQuery languidLoad
 * Author: Daniel Robinson
 * Based upon jquery Unveil - A very lightweight jQuery plugin to lazy load images - 
 * and Debounce - for throttling function calls
 * http://luis-almeida.github.com/unveil
 * http://lodash.com/docs/#debounce
 * Licensed under the MIT license.
 */

(function ($) {

    "use strict";

    $.fn.languidLoad = function (opts) {

        var defaults = {
            threshold: 300,
            throttle: 100,
            mode: "suffix",
            formats: {
                small: { pixelWidth: 0, format: "?width=490" },
                medium: { pixelWidth: 650, format: "?width=700" },
                large: { pixelWidth: 950, format: "?width=1000" },
            },
            isSrcSetEnabled: false,
            srcSetFormat: {
                formatString: "{0} 490w 1x, {0}?hd=true 490w 2x, {0}?hd=true 1000w 2x",
                fileFormat: ".jpg",
                urlRegex: /\{0\}/g,
                extRegex: /\{1\}/g
            },
            alwaysActive: true
        };

        var options = $.extend(true, defaults, opts);

        function isSrcsetImplemented() {
            var img = new Image();
            return 'srcset' in img;
        }

        var $w = $(window),
            srcsetSupported = options.isSrcSetEnabled && isSrcsetImplemented(),
            pixelRatio = (window.devicePixelRatio || 1),
            retina = pixelRatio > 1,
            attrib = retina ? "data-src-retina" : "data-src",
            th = options.threshold || 0,
            images = this,
            loaded,
            inview,
            source;

        var setAssetFormat = function (el, src, undefined) {
            if (src === null || src === 'undefined') return null;
            var format = "";

            $.each(options.formats, function (i, v) {
                if (el.offsetWidth >= v.pixelWidth) {
                    if ($(el).data("pixelWidth") === undefined || el.offsetWidth > $(el).data("pixelWidth")) $(el).data("pixelWidth", el.offsetWidth);
                }

                if ($(el).data("pixelWidth") >= v.pixelWidth) {
                    format = v.format;
                }
            });

            switch (options.mode) {
                case "format":
                    src = src.replace(".jpg", format + ".jpg");
                    src = src.replace(".png", format + ".png");
                    src = src.replace(".gif", format + ".gif");
                    return src;
                case "suffix":
                    return src.indexOf("?") != -1 ? src + format.replace("?", "&") : src + format;
                default:
                    return src;
            }
        };

        var setSrcSetAssetFormat = function (el, src) {
            if (src === null || src === 'undefined') return null;
            var url = options.srcSetFormat.urlRegex;
            var ext = options.srcSetFormat.extRegex;
            var fmt = options.srcSetFormat.fileFormat;
            var srcset = options.srcSetFormat.formatString.replace(url, src).replace(fmt, "").replace(ext, fmt);
            return srcset;
        };

        // http://lodash.com/docs/#debounce
        var throttle = function (func, wait, immediate) {
            var args,
                result,
                thisArg,
                timeoutId;

            function delayed() {
                timeoutId = null;
                if (!immediate) {
                    func.apply(thisArg, args);
                }
            }

            return function () {
                var isImmediate = immediate && !timeoutId;
                args = arguments;
                thisArg = this;

                clearTimeout(timeoutId);
                timeoutId = setTimeout(delayed, wait);

                if (isImmediate) {
                    result = func.apply(thisArg, args);
                }
                return result;
            };
        };

        this.one("error", function (undefined) {
            var self = $(this);
            source = this.getAttribute("data-fallback") || "";
            if (source != undefined && source != "") this.setAttribute("src", source);
            self.addClass('lanquid-error');
            images = images.not(this);

        }).on("languidLoad", function (undefined) {

            var self = $(this);
            if (self.hasClass("languid-error")) return;

            if (self.data("firstRun") === undefined) self.data("firstRun", true);

            source = this.getAttribute(attrib);
            source = source || this.getAttribute("data-src");
            if (source === null || source === 'undefined') return;

            source = setAssetFormat(this, source);

            if (srcsetSupported) {
                source = setSrcSetAssetFormat(this, source);
                this.setAttribute("srcset", source);
                images = images.not(self);
            } else {
                if (self.data("firstRun") || this.getAttribute("src") !== source) this.setAttribute("src", source);
            }

            self.addClass('lanquid-loaded');

        });

        function languidLoad() {

            inview = images.filter(function () {
                var $e = $(this),
                    wt = $w.scrollTop(),
                    wb = wt + $w.height(),
                    et = $e.offset().top,
                    eb = et + $e.height(),
                    el = $e.offset().left,
                    er = el + $e.width(),
                    wl = $w.scrollLeft(),
                    wr = $w.width() + $w.scrollLeft();

                return (eb >= wt - th) && (et <= wb + th)
                        && (el >= wl - th) && (er <= wr + th);
            });

            loaded = inview.trigger("languidLoad");
            if (options.alwaysActive === false) images = images.not(loaded);
        }

        var lazySet = throttle(languidLoad, options.throttle);

        $w.scroll(lazySet);
        $w.resize(lazySet);

        languidLoad();
        return this;

    };

}(jQuery));