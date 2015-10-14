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
                                overlayOpacity: 0.25,
                                displayPreview : true,
                                displaySize : true,

                                onSelect : updateForm
                            });
                        };
                        reader.readAsDataURL(file[0]);
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        imagePreview.html("");
                        return false;
                    }
                });

                var selectionExists;
                // Update form inputs
                function updateForm(crop) {
                    $('input#x').val(crop.selectionX);
                    $('input#y').val(crop.selectionY);
                    $('input#width').val(crop.selectionWidth);
                    $('input#height').val(crop.selectionHeight);

                    selectionExists = crop.selectionExists();
                };

                // Validate form data
                function validateForm() {
                    if (selectionExists)
                        return true;

                    alert('Please make a selection first!');

                    return false;
                };
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

    (function ($) {
        $.imageCrop = function (object, customOptions) {
            // Rather than requiring a lengthy amount of arguments, pass the
            // plug-in options in an object literal that can be extended over
            // the plug-in's defaults
            var defaultOptions = {
                allowMove: true,
                allowResize: true,
                allowSelect: true,
                aspectRatio: 0,
                displayPreview: false,
                displaySizeHint: false,
                minSelect: [0, 0],
                minSize: [0, 0],
                maxSize: [0, 0],
                outlineOpacity: 0.5,
                overlayOpacity: 0.5,
                previewBoundary: 90,
                previewFadeOnBlur: 1,
                previewFadeOnFocus: 0.35,
                selectionPosition: [0, 0],
                selectionWidth: 0,
                selectionHeight: 0,

                // Plug-in's event handlers
                onChange: function () {
                },
                onSelect: function () {
                }
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
                  position: 'relative',
                  display  :  'inline-block',
                  marginBottom: 5,
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
                  opacity: options.overlayOpacity,
                  position: 'absolute'
              })
              .width($image.width())
              .height($image.height())
              .insertAfter($image);

            // Initialize a trigger layer and place it above the overlay layer
            var $trigger = $('<div />')
              .css({
                  backgroundColor: '#000000',
                  opacity: 0,
                  position: 'absolute'
              })
              .width($image.width())
              .height($image.height())
              .insertAfter($overlay);

            // Initialize an outline layer and place it above the trigger layer
            var $outline = $('<div id="image-crop-outline" />')
              .css({
                  opacity: options.outlineOpacity,
                  position: 'absolute'
              })
              .insertAfter($trigger);

            // Initialize a selection layer and place it above the outline layer
            var $selection = $('<div />')
              .css({
                  background: 'url(' + $image.attr('src') + ') no-repeat',
                  position: 'absolute'
              })
              .insertAfter($outline);

            // Initialize a background layer of size hint and place it above the
            // selection layer
            var $sizeHintBackground = $('<div id="image-crop-size-hint-background" />')
              .css({
                  opacity: 0.35,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a foreground layer of size hint and place it above the
            // background layer
            var $sizeHintForeground = $('<span id="image-crop-size-hint-foreground" />')
              .css({
                  position: 'absolute'
              })
              .insertAfter($sizeHintBackground);

            // Initialize a north/west resize handler and place it above the
            // selection layer
            var $nwResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-nw-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a north resize handler and place it above the selection
            // layer
            var $nResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-n-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a north/east resize handler and place it above the
            // selection layer
            var $neResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-ne-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize an west resize handler and place it above the selection
            // layer
            var $wResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-w-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize an east resize handler and place it above the selection
            // layer
            var $eResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-e-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a south/west resize handler and place it above the
            // selection layer
            var $swResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-sw-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a south resize handler and place it above the selection
            // layer
            var $sResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-s-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a south/east resize handler and place it above the
            // selection layer
            var $seResizeHandler = $('<div class="image-crop-resize-handler" id="image-crop-se-resize-handler" />')
              .css({
                  opacity: 0.5,
                  position: 'absolute'
              })
              .insertAfter($selection);

            // Initialize a preview holder and place it after the outline layer
            var $previewHolder = $('<div id="image-crop-preview-holder" />')
              .css({
                  opacity: options.previewFadeOnBlur,
                  overflow: 'hidden',
                  position: 'absolute'
              })
              .insertAfter($outline);

            // Initialize a preview image and append it to the preview holder
            var $preview = $('<img alt="Crop preview" id="image-crop-preview" />')
              .css({
                  position: 'absolute'
              })
              .attr('src', $image.attr('src'))
              .appendTo($previewHolder);

            // Initialize global variables
            var resizeHorizontally = true,
              resizeVertically = true,
              selectionExists,
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

            if (options.allowMove)
            // Bind an event handler to the 'mousedown' event of the selection layer
                $selection.mousedown(pickSelection);

            if (options.allowResize)
            // Bind an event handler to the 'mousedown' event of the resize handlers
                $('div.image-crop-resize-handler').mousedown(pickResizeHandler);

            // Merge current options with the custom option
            function setOptions(customOptions) {
                options = $.extend(options, customOptions);
            };

            // Get the current offset of an element
            function getElementOffset(object) {
                var offset = $(object).offset();

                return [offset.left, offset.top];
            };

            // Get the current mouse position relative to the image position
            function getMousePosition(event) {
                var imageOffset = getElementOffset($image);

                var x = event.pageX - imageOffset[0],
                  y = event.pageY - imageOffset[1];

                x = (x < 0) ? 0 : (x > $image.width()) ? $image.width() : x;
                y = (y < 0) ? 0 : (y > $image.height()) ? $image.height() : y;

                return [x, y];
            };

            // Return an object containing information about the plug-in state
            function getCropData() {
                return {
                    selectionX: options.selectionPosition[0],
                    selectionY: options.selectionPosition[1],
                    selectionWidth: options.selectionWidth,
                    selectionHeight: options.selectionHeight,

                    selectionExists: function () {
                        return selectionExists;
                    }
                };
            };

            // Update the overlay layer
            function updateOverlayLayer() {
                $overlay.css({
                    display: selectionExists ? 'block' : 'none'
                });
            };

            // Update the trigger layer
            function updateTriggerLayer() {
                $trigger.css({
                    cursor: options.allowSelect ? 'crosshair' : 'default'
                });
            };

            // Update the selection
            function updateSelection() {
                // Update the outline layer
                $outline.css({
                    cursor: 'default',
                    display: selectionExists ? 'block' : 'none',
                    left: options.selectionPosition[0],
                    top: options.selectionPosition[1]
                })
                  .width(options.selectionWidth)
                  .height(options.selectionHeight);

                // Update the selection layer
                $selection.css({
                    backgroundPosition: ( -options.selectionPosition[0] - 1) + 'px ' + ( -options.selectionPosition[1] - 1) + 'px',
                    cursor: options.allowMove ? 'move' : 'default',
                    display: selectionExists ? 'block' : 'none',
                    left: options.selectionPosition[0] + 1,
                    top: options.selectionPosition[1] + 1
                })
                  .width((options.selectionWidth - 2 > 0) ? (options.selectionWidth - 2) : 0)
                  .height((options.selectionHeight - 2 > 0) ? (options.selectionHeight - 2) : 0);
            };

            // Update the size hint
            function updateSizeHint(action) {
                switch (action) {
                    case 'fade-out' :
                        // Fade out the size hint
                        $sizeHintBackground.fadeOut('slow');
                        $sizeHintForeground.fadeOut('slow');

                        break;
                    default :
                        var display = (selectionExists && options.displaySize) ? 'block' : 'none';

                        // Update the foreground layer
                        $sizeHintForeground.css({
                            cursor: 'default',
                            display: display,
                            left: options.selectionPosition[0] + 4,
                            top: options.selectionPosition[1] + 4
                        })
                          .html(options.selectionWidth + 'x' + options.selectionHeight);

                        // Update the background layer
                        $sizeHintBackground.css({
                            cursor: 'default',
                            display: display,
                            left: options.selectionPosition[0] + 1,
                            top: options.selectionPosition[1] + 1
                        })
                          .width($sizeHintForeground.width() + 6)
                          .height($sizeHintForeground.height() + 6);
                }
            };

            // Update the resize handlers
            function updateResizeHandlers(action) {
                switch (action) {
                    case 'hide-all' :
                        $('.image-crop-resize-handler').each(function () {
                            $(this).css({
                                display: 'none'
                            });
                        });

                        break;
                    default :
                        var display = (selectionExists && options.allowResize) ? 'block' : 'none';

                        $nwResizeHandler.css({
                            cursor: 'nw-resize',
                            display: display,
                            left: options.selectionPosition[0] - Math.round($nwResizeHandler.width() / 2),
                            top: options.selectionPosition[1] - Math.round($nwResizeHandler.height() / 2)
                        });

                        $nResizeHandler.css({
                            cursor: 'n-resize',
                            display: display,
                            left: options.selectionPosition[0] + Math.round(options.selectionWidth / 2 - $neResizeHandler.width() / 2) - 1,
                            top: options.selectionPosition[1] - Math.round($neResizeHandler.height() / 2)
                        });

                        $neResizeHandler.css({
                            cursor: 'ne-resize',
                            display: display,
                            left: options.selectionPosition[0] + options.selectionWidth - Math.round($neResizeHandler.width() / 2) - 1,
                            top: options.selectionPosition[1] - Math.round($neResizeHandler.height() / 2)
                        });

                        $wResizeHandler.css({
                            cursor: 'w-resize',
                            display: display,
                            left: options.selectionPosition[0] - Math.round($neResizeHandler.width() / 2),
                            top: options.selectionPosition[1] + Math.round(options.selectionHeight / 2 - $neResizeHandler.height() / 2) - 1
                        });

                        $eResizeHandler.css({
                            cursor: 'e-resize',
                            display: display,
                            left: options.selectionPosition[0] + options.selectionWidth - Math.round($neResizeHandler.width() / 2) - 1,
                            top: options.selectionPosition[1] + Math.round(options.selectionHeight / 2 - $neResizeHandler.height() / 2) - 1
                        });

                        $swResizeHandler.css({
                            cursor: 'sw-resize',
                            display: display,
                            left: options.selectionPosition[0] - Math.round($swResizeHandler.width() / 2),
                            top: options.selectionPosition[1] + options.selectionHeight - Math.round($swResizeHandler.height() / 2) - 1
                        });

                        $sResizeHandler.css({
                            cursor: 's-resize',
                            display: display,
                            left: options.selectionPosition[0] + Math.round(options.selectionWidth / 2 - $seResizeHandler.width() / 2) - 1,
                            top: options.selectionPosition[1] + options.selectionHeight - Math.round($seResizeHandler.height() / 2) - 1
                        });

                        $seResizeHandler.css({
                            cursor: 'se-resize',
                            display: display,
                            left: options.selectionPosition[0] + options.selectionWidth - Math.round($seResizeHandler.width() / 2) - 1,
                            top: options.selectionPosition[1] + options.selectionHeight - Math.round($seResizeHandler.height() / 2) - 1
                        });
                }
            };

            // Update the preview
            function updatePreview(action) {
                switch (action) {
                    case 'focus' :
                        // Fade in the preview holder layer
                        $previewHolder.stop()
                          .animate({
                              opacity: options.previewFadeOnFocus
                          });

                        break;
                    case 'blur' :
                        // Fade out the preview holder layer
                        $previewHolder.stop()
                          .animate({
                              opacity: options.previewFadeOnBlur
                          });

                        break;
                    case 'hide' :
                        // Hide the preview holder layer
                        $previewHolder.css({
                            display: 'none'
                        });

                        break;
                    default :
                        var display = (selectionExists && options.displayPreview) ? 'block' : 'none';

                        // Update the preview holder layer
                        $previewHolder.css({
                            display: display,
                            left: options.selectionPosition[0],
                            top: options.selectionPosition[1] + options.selectionHeight + 10
                        });

                        // Update the preview size
                        if (options.selectionWidth > options.selectionHeight) {
                            if (options.selectionWidth && options.selectionHeight) {
                                // Update the preview image size
                                $preview.width(Math.round($image.width() * options.previewBoundary / options.selectionWidth));
                                $preview.height(Math.round($image.height() * $preview.width() / $image.width()));

                                // Update the preview holder layer size
                                $previewHolder.width(options.previewBoundary)
                                  .height(Math.round(options.selectionHeight * $preview.height() / $image.height()));
                            }
                        } else {
                            if (options.selectionWidth && options.selectionHeight) {
                                // Update the preview image size
                                $preview.height(Math.round($image.height() * options.previewBoundary / options.selectionHeight));
                                $preview.width(Math.round($image.width() * $preview.height() / $image.height()));

                                // Update the preview holder layer size
                                $previewHolder.width(Math.round(options.selectionWidth * $preview.width() / $image.width()))
                                  .height(options.previewBoundary);
                            }
                        }

                        // Update the preview image position
                        $preview.css({
                            left: -Math.round(options.selectionPosition[0] * $preview.width() / $image.width()),
                            top: -Math.round(options.selectionPosition[1] * $preview.height() / $image.height())
                        });
                }
            };

            // Update the cursor type
            function updateCursor(cursorType) {
                $trigger.css({
                    cursor: cursorType
                });

                $outline.css({
                    cursor: cursorType
                });

                $selection.css({
                    cursor: cursorType
                });

                $sizeHintBackground.css({
                    cursor: cursorType
                });

                $sizeHintForeground.css({
                    cursor: cursorType
                });
            };

            // Update the plug-in interface
            function updateInterface(sender) {
                switch (sender) {
                    case 'setSelection' :
                        updateOverlayLayer();
                        updateSelection();
                        updateResizeHandlers('hide-all');
                        updatePreview('hide');

                        break;
                    case 'pickSelection' :
                        updateResizeHandlers('hide-all');

                        break;
                    case 'pickResizeHandler' :
                        updateSizeHint();
                        updateResizeHandlers('hide-all');

                        break;
                    case 'resizeSelection' :
                        updateSelection();
                        updateSizeHint();
                        updateResizeHandlers('hide-all');
                        updatePreview();
                        updateCursor('crosshair');

                        break;
                    case 'moveSelection' :
                        updateSelection();
                        updateResizeHandlers('hide-all');
                        updatePreview();
                        updateCursor('move');

                        break;
                    case 'releaseSelection' :
                        updateTriggerLayer();
                        updateOverlayLayer();
                        updateSelection();
                        updateSizeHint('fade-out');
                        updateResizeHandlers();
                        updatePreview();

                        break;
                    default :
                        updateTriggerLayer();
                        updateOverlayLayer();
                        updateSelection();
                        updateResizeHandlers();
                        updatePreview();
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

                // If display preview option is enabled
                if (options.displayPreview) {
                    // Bind an event handler to the 'mouseenter' event of the preview
                    // holder
                    $previewHolder.mouseenter(function () {
                        updatePreview('focus');
                    });

                    // Bind an event handler to the 'mouseleave' event of the preview
                    // holder
                    $previewHolder.mouseleave(function () {
                        updatePreview('blur');
                    });
                }

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

            // Pick the current selection
            function pickSelection(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                // Bind an event handler to the 'mousemove' event
                $(document).mousemove(moveSelection);

                // Bind an event handler to the 'mouseup' event
                $(document).mouseup(releaseSelection);

                var mousePosition = getMousePosition(event);

                // Get the selection offset relative to the mouse position
                selectionOffset[0] = mousePosition[0] - options.selectionPosition[0];
                selectionOffset[1] = mousePosition[1] - options.selectionPosition[1];

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('pickSelection');
            };

            // Pick one of the resize handlers
            function pickResizeHandler(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                switch (event.target.id) {
                    case 'image-crop-nw-resize-handler' :
                        selectionOrigin[0] += options.selectionWidth;
                        selectionOrigin[1] += options.selectionHeight;
                        options.selectionPosition[0] = selectionOrigin[0] - options.selectionWidth;
                        options.selectionPosition[1] = selectionOrigin[1] - options.selectionHeight;

                        break;
                    case 'image-crop-n-resize-handler' :
                        selectionOrigin[1] += options.selectionHeight;
                        options.selectionPosition[1] = selectionOrigin[1] - options.selectionHeight;

                        resizeHorizontally = false;

                        break;
                    case 'image-crop-ne-resize-handler' :
                        selectionOrigin[1] += options.selectionHeight;
                        options.selectionPosition[1] = selectionOrigin[1] - options.selectionHeight;

                        break;
                    case 'image-crop-w-resize-handler' :
                        selectionOrigin[0] += options.selectionWidth;
                        options.selectionPosition[0] = selectionOrigin[0] - options.selectionWidth;

                        resizeVertically = false;

                        break;
                    case 'image-crop-e-resize-handler' :
                        resizeVertically = false;

                        break;
                    case 'image-crop-sw-resize-handler' :
                        selectionOrigin[0] += options.selectionWidth;
                        options.selectionPosition[0] = selectionOrigin[0] - options.selectionWidth;

                        break;
                    case 'image-crop-s-resize-handler' :
                        resizeHorizontally = false;

                        break;
                }

                // Bind an event handler to the 'mousemove' event
                $(document).mousemove(resizeSelection);

                // Bind an event handler to the 'mouseup' event
                $(document).mouseup(releaseSelection);

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('pickResizeHandler');
            };

            // Resize the current selection
            function resizeSelection(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                var mousePosition = getMousePosition(event);

                // Get the selection size
                var height = mousePosition[1] - selectionOrigin[1],
                  width = mousePosition[0] - selectionOrigin[0];

                // If the selection size is smaller than the minimum size set it
                // accordingly
                if (Math.abs(width) < options.minSize[0])
                    width = (width >= 0) ? options.minSize[0] : -options.minSize[0];

                if (Math.abs(height) < options.minSize[1])
                    height = (height >= 0) ? options.minSize[1] : -options.minSize[1];

                // Test if the selection size exceeds the image bounds
                if (selectionOrigin[0] + width < 0 || selectionOrigin[0] + width > $image.width())
                    width = -width;

                if (selectionOrigin[1] + height < 0 || selectionOrigin[1] + height > $image.height())
                    height = -height;

                if (options.maxSize[0] > options.minSize[0] &&
                  options.maxSize[1] > options.minSize[1]) {
                    // Test if the selection size is bigger than the maximum size
                    if (Math.abs(width) > options.maxSize[0])
                        width = (width >= 0) ? options.maxSize[0] : -options.maxSize[0];

                    if (Math.abs(height) > options.maxSize[1])
                        height = (height >= 0) ? options.maxSize[1] : -options.maxSize[1];
                }

                // Set the selection size
                if (resizeHorizontally)
                    options.selectionWidth = width;

                if (resizeVertically)
                    options.selectionHeight = height;

                // If any aspect ratio is specified
                if (options.aspectRatio) {
                    // Calculate the new width and height
                    if ((width > 0 && height > 0) || (width < 0 && height < 0))
                        if (resizeHorizontally)
                            height = Math.round(width / options.aspectRatio);
                        else
                            width = Math.round(height * options.aspectRatio);
                    else if (resizeHorizontally)
                        height = -Math.round(width / options.aspectRatio);
                    else
                        width = -Math.round(height * options.aspectRatio);

                    // Test if the new size exceeds the image bounds
                    if (selectionOrigin[0] + width > $image.width()) {
                        width = $image.width() - selectionOrigin[0];
                        height = (height > 0) ? Math.round(width / options.aspectRatio) : -Math.round(width / options.aspectRatio);
                    }

                    if (selectionOrigin[1] + height < 0) {
                        height = -selectionOrigin[1];
                        width = (width > 0) ? -Math.round(height * options.aspectRatio) : Math.round(height * options.aspectRatio);
                    }

                    if (selectionOrigin[1] + height > $image.height()) {
                        height = $image.height() - selectionOrigin[1];
                        width = (width > 0) ? Math.round(height * options.aspectRatio) : -Math.round(height * options.aspectRatio);
                    }

                    // Set the selection size
                    options.selectionWidth = width;
                    options.selectionHeight = height;
                }

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

                // Trigger the 'onChange' event when the selection is changed
                options.onChange(getCropData());

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('resizeSelection');
            };

            // Move the current selection
            function moveSelection(event) {
                // Prevent the default action of the event
                event.preventDefault();

                // Prevent the event from being notified
                event.stopPropagation();

                var mousePosition = getMousePosition(event);

                // Set the selection position on the x-axis relative to the bounds
                // of the image
                if (mousePosition[0] - selectionOffset[0] > 0)
                    if (mousePosition[0] - selectionOffset[0] + options.selectionWidth < $image.width())
                        options.selectionPosition[0] = mousePosition[0] - selectionOffset[0];
                    else
                        options.selectionPosition[0] = $image.width() - options.selectionWidth;
                else
                    options.selectionPosition[0] = 0;

                // Set the selection position on the y-axis relative to the bounds
                // of the image
                if (mousePosition[1] - selectionOffset[1] > 0)
                    if (mousePosition[1] - selectionOffset[1] + options.selectionHeight < $image.height())
                        options.selectionPosition[1] = mousePosition[1] - selectionOffset[1];
                    else
                        options.selectionPosition[1] = $image.height() - options.selectionHeight;
                else
                    options.selectionPosition[1] = 0;

                // Trigger the 'onChange' event when the selection is changed
                options.onChange(getCropData());

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('moveSelection');
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

                // Reset the resize constraints
                resizeHorizontally = true;
                resizeVertically = true;

                // Verify if the selection size is bigger than the minimum accepted
                // and set the selection existence accordingly
                if (options.selectionWidth > options.minSelect[0] &&
                  options.selectionHeight > options.minSelect[1])
                    selectionExists = true;
                else
                    selectionExists = false;

                // Trigger the 'onSelect' event when the selection is made
                options.onSelect(getCropData());

                // If the selection doesn't exist
                if (!selectionExists) {
                    // Unbind the event handler to the 'mouseenter' event of the
                    // preview
                    $previewHolder.unbind('mouseenter');

                    // Unbind the event handler to the 'mouseleave' event of the
                    // preview
                    $previewHolder.unbind('mouseleave');
                }

                // Update only the needed elements of the plug-in interface
                // by specifying the sender of the current call
                updateInterface('releaseSelection');
            };
        };

        $.fn.imageCrop = function (customOptions) {
            //Iterate over each object
            this.each(function () {
                var currentObject = this,
                  image = new Image();

                // And attach imageCrop when the object is loaded
                image.onload = function () {
                    $.imageCrop(currentObject, customOptions);
                };

                // Reset the src because cached images don't fire load sometimes
                image.src = currentObject.src;
            });

            // Unless the plug-in is returning an intrinsic value, always have the
            // function return the 'this' keyword to maintain chainability
            return this;
        };
    })(jQuery);
});