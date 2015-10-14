var $input = $('<div class="modal-body"><input type="text" class="form-control" placeholder="Message"></div>');
$(document).on("click", ".js-msgGroup", function () {
    $(".js-msgGroup, .js-newMsg").addClass("hide"), $(".js-conversation").removeClass("hide"), $(".modal-title").html('<a href="#" class="js-gotoMsgs">Back</a>'), $input.insertBefore(".js-modalBody")
}), $(function () {
    function o() {
        return $(window).width() - ($('[data-toggle="popover"]').offset().left + $('[data-toggle="popover"]').outerWidth())
    }

    $(window).on("resize", function () {
        var t = $('[data-toggle="popover"]').data("bs.popover");
        t && (t.options.viewport.padding = o())
    }), $('[data-toggle="popover"]').popover({
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content p-x-0"></div></div>',
        title: "",
        html: !0,
        trigger: "manual",
        placement: "bottom",
        viewport: {selector: "body", padding: o()},
        content: function () {
            var o = $(".app-navbar .navbar-nav:last-child").clone();
            return '<div class="nav nav-stacked" style="width: 200px">' + o.html() + "</div>"
        }
    }), $('[data-toggle="popover"]').on("click", function (o) {
        o.stopPropagation(), $('[data-toggle="popover"]').data("bs.popover").tip().hasClass("in") ? ($('[data-toggle="popover"]').popover("hide"), $(document).off("click.app.popover")) : ($('[data-toggle="popover"]').popover("show"), setTimeout(function () {
            $(document).one("click.app.popover", function () {
                $('[data-toggle="popover"]').popover("hide")
            })
        }, 1))
    })
}), $(document).on("click", ".js-gotoMsgs", function () {
    $input.remove(), $(".js-conversation").addClass("hide"), $(".js-msgGroup, .js-newMsg").removeClass("hide"), $(".modal-title").html("Messages")
}), $(document).on("click", "[data-action=growl]", function (o) {
    o.preventDefault(), $("#app-growl").append('<div class="alert alert-dark alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><p>Click the x on the upper right to dismiss this little thing. Or click growl again to show more growls.</p></div>')
}), $(document).on("focus", '[data-action="grow"]', function () {
    $(window).width() > 1e3 && $(this).animate({width: 300})
}), $(document).on("blur", '[data-action="grow"]', function () {
    if ($(window).width() > 1e3) {
        $(this).animate({width: 180})
    }
}), $(function () {
    function o() {
        $(window).scrollTop() > $(window).height() ? $(".docs-top").fadeIn() : $(".docs-top").fadeOut()
    }

    $(".docs-top").length && (o(), $(window).on("scroll", o))
}), $(function () {
    function o() {
        i.width() > 768 ? e() : t()
    }

    function t() {
        i.off("resize.theme.nav"), i.off("scroll.theme.nav"), n.css({position: "", left: "", top: ""})
    }

    function e() {
        function o() {
            e.containerTop = $(".docs-content").offset().top - 40, e.containerRight = $(".docs-content").offset().left + $(".docs-content").width() + 45, t()
        }

        function t() {
            var o = i.scrollTop(), t = Math.max(o - e.containerTop, 0);
            return t ? void n.css({
                position: "fixed",
                left: e.containerRight,
                top: 40
            }) : ($(n.find("li")[1]).addClass("active"), n.css({position: "", left: "", top: ""}))
        }

        var e = {};
        o(), $(window).on("resize.theme.nav", o).on("scroll.theme.nav", t), $("body").scrollspy({
            target: "#markdown-toc",
            selector: "li > a"
        }), setTimeout(function () {
            $("body").scrollspy("refresh")
        }, 1e3)
    }

    var n = $("#markdown-toc"), i = $(window);
    n[0] && (o(), i.on("resize", o))
});


//script for handling image preview and ajax functionality
//for chops post

$('document').ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var files = [];
    $(function () {
        $("#file").change(function () {
            if (typeof(FileReader) !== "undefined") {
                var imagePreview = $("#imagePreview");
                imagePreview.html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = $("<img />");
                            img.attr("style", "height:150px;width: 150px");
                            img.attr("src", e.target.result);
                            img.addClass("imagePreview");
                            imagePreview.append(img);
                            img.imageCrop({
                                overlayOpacity : 0.25
                            });
                        };
                        reader.readAsDataURL(file[0]);
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        imagePreview.html("");
                        return false;
                    }
                });
            }

            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                files.push($(this).get(0).files[i].name);
            }
            $("input[name=file]").val(files);
        });
    });


    /*
     * Image cropper plugin
     */
    (function($) {
        $.imageCrop = function(object, customOptions) {
            // Rather than requiring a lengthy amount of arguments, pass the
            // plug-in options in an object literal that can be extended over
            // the plug-in's defaults
            var defaultOptions = {
                allowMove : true,
                allowResize : true,
                allowSelect : true,
                minSelect : [0, 0],
                outlineOpacity : 0.5,
                overlayOpacity : 0.5,
                selectionPosition : [0, 0],
                selectionWidth : 0,
                selectionHeight : 0
            };

            // Set options to default
            var options = defaultOptions;

            // And merge them with the custom options
            setOptions(customOptions);

            // Initialize the image layer
            var $image = $(object);

            // Initialize an image holder
            var $holder = $('<div />')
              .css({
                  position : 'relative',
                  display  : 'inline-block',
                  marginBottom : 5,
                  marginRight: 5
              })
              .width($image.width()+10)
              .height($image.height()+15);

            // Wrap the holder around the image
            $image.wrap($holder)
              .css({
                  position : 'absolute'
              });

            // Initialize an overlay layer and place it above the image
            var $overlay = $('<div id="image-crop-overlay" />')
              .css({
                  opacity : options.overlayOpacity,
                  position : 'absolute'
              })
              .width($image.width())
              .height($image.height())
              .insertAfter($image);

            // Initialize a trigger layer and place it above the overlay layer
            var $trigger = $('<div />')
              .css({
                  backgroundColor : '#000000',
                  opacity : 0,
                  position : 'absolute'
              })
              .width($image.width())
              .height($image.height())
              .insertAfter($overlay);

            // Initialize an outline layer and place it above the trigger layer
            var $outline = $('<div id="image-crop-outline" />')
              .css({
                  opacity : options.outlineOpacity,
                  position : 'absolute'
              })
              .insertAfter($trigger);

            // Initialize a selection layer and place it above the outline layer
            var $selection = $('<div />')
              .css({
                  background : 'url(' + $image.attr('src') + ') no-repeat',
                  position : 'absolute'
              })
              .insertAfter($outline);

            // Initialize global variables
            var selectionExists,
              selectionOffset = [0, 0],
              selectionOrigin = [0, 0];

            // Verify if the selection size is bigger than the minimum accepted
            // and set the selection existence accordingly
            if (options.selectionWidth > options.minSelect[0] &&
              options.selectionHeight > options.minSelect[1])
                selectionExists = true;
            else
                selectionExists = false;

            // Call the 'updateInterface' function for the first time to
            // initialize the plug-in interface
            updateInterface();

            if (options.allowSelect)
            // Bind an event handler to the 'mousedown' event of the trigger layer
                $trigger.mousedown(setSelection);

            // Merge current options with the custom option
            function setOptions(customOptions) {
                options = $.extend(options, customOptions);
            }

            // Get the current offset of an element
            function getElementOffset(object) {
                var offset = $(object).offset();

                return [offset.left, offset.top];
            }

            // Get the current mouse position relative to the image position
            function getMousePosition(event) {
                var imageOffset = getElementOffset($image);

                var x = event.pageX - imageOffset[0],
                  y = event.pageY - imageOffset[1];

                x = (x < 0) ? 0 : (x > $image.width()) ? $image.width() : x;
                y = (y < 0) ? 0 : (y > $image.height()) ? $image.height() : y;

                return [x, y];
            }

            // Update the overlay layer
            function updateOverlayLayer() {
                $overlay.css({
                    display : selectionExists ? 'inline' : 'none'
                });
            }

            // Update the trigger layer
            function updateTriggerLayer() {
                $trigger.css({
                    cursor : options.allowSelect ? 'crosshair' : 'default'
                });
            };

            // Update the selection
            function updateSelection() {
                // Update the outline layer
                $outline.css({
                    cursor : 'default',
                    display : selectionExists ? '' : 'none',
                    left : options.selectionPosition[0],
                    top : options.selectionPosition[1]
                })
                  .width(options.selectionWidth)
                  .height(options.selectionHeight);

                // Update the selection layer
                $selection.css({
                    backgroundPosition : ( - options.selectionPosition[0] - 1) + 'px ' + ( - options.selectionPosition[1] - 1) + 'px',
                    cursor : options.allowMove ? 'move' : 'default',
                    display : selectionExists ? 'inline' : 'none',
                    left : options.selectionPosition[0] + 1,
                    top : options.selectionPosition[1] + 1
                })
                  .width((options.selectionWidth - 2 > 0) ? (options.selectionWidth - 2) : 0)
                  .height((options.selectionHeight - 2 > 0) ? (options.selectionHeight - 2) : 0);
            };

            // Update the cursor type
            function updateCursor(cursorType) {
                $trigger.css({
                    cursor : cursorType
                });

                $outline.css({
                    cursor : cursorType
                });

                $selection.css({
                    cursor : cursorType
                });
            };

            // Update the plug-in's interface
            function updateInterface(sender) {
                switch (sender) {
                    case 'setSelection' :
                        updateOverlayLayer();
                        updateSelection();

                        break;
                    case 'resizeSelection' :
                        updateSelection();
                        updateCursor('crosshair');

                        break;
                    case 'releaseSelection' :
                        updateTriggerLayer();
                        updateOverlayLayer();
                        updateSelection();

                        break;
                    default :
                        updateTriggerLayer();
                        updateOverlayLayer();
                        updateSelection();
                }
            };

            // Set a new selection
            function setSelection(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                // Bind an event handler to the 'mousemove' event
                $(document).mousemove(resizeSelection);

                // Bind an event handler to the 'mouseup' event
                $(document).mouseup(releaseSelection);

                // Notify that a selection exists
                selectionExists = true;

                // Reset the selection size
                options.selectionWidth = 0;
                options.selectionHeight = 0;

                // Get the selection origin
                selectionOrigin = getMousePosition(event);

                // And set its position
                options.selectionPosition[0] = selectionOrigin[0];
                options.selectionPosition[1] = selectionOrigin[1];

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('setSelection');
            };

            // Resize the current selection
            function resizeSelection(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                var mousePosition = getMousePosition(event);

                // Get the selection size
                options.selectionWidth = mousePosition[0] - selectionOrigin[0];
                options.selectionHeight = mousePosition[1] - selectionOrigin[1];

                if (options.selectionWidth < 0) {
                    options.selectionWidth = Math.abs(options.selectionWidth);
                    options.selectionPosition[0] = selectionOrigin[0] - options.selectionWidth;
                } else
                    options.selectionPosition[0] = selectionOrigin[0];

                if (options.selectionHeight < 0) {
                    options.selectionHeight = Math.abs(options.selectionHeight);
                    options.selectionPosition[1] = selectionOrigin[1] - options.selectionHeight;
                } else
                    options.selectionPosition[1] = selectionOrigin[1];

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('resizeSelection');
            };

            // Release the current selection
            function releaseSelection(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                // Unbind the event handler to the 'mousemove' event
                $(document).unbind('mousemove');

                // Unbind the event handler to the 'mouseup' event
                $(document).unbind('mouseup');

                // Update the selection origin
                selectionOrigin[0] = options.selectionPosition[0];
                selectionOrigin[1] = options.selectionPosition[1];

                // Verify if the selection size is bigger than the minimum accepted
                // and set the selection existence accordingly
                if (options.selectionWidth > options.minSelect[0] &&
                  options.selectionHeight > options.minSelect[1])
                    selectionExists = true;
                else
                    selectionExists = false;

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('releaseSelection');
            };
        };

        $.fn.imageCrop = function(customOptions) {
            //Iterate over each object
            this.each(function() {
                var currentObject = this,
                  image = new Image();

                // And attach imageCrop when the object is loaded
                image.onload = function() {
                    $.imageCrop(currentObject, customOptions);
                };

                // Reset the src because cached images don't fire load sometimes
                image.src = currentObject.src;
            });

            // Unless the plug-in is returning an intrinsic value, always have the
            // function return the 'this' keyword to maintain chainability
            return this;
        };
    }) (jQuery);

});