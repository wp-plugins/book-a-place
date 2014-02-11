(function ($) {
    "use strict";
    $(function () {

        if($('#book-a-place-scheme').length == 0) return;

        $.blockUI.defaults.message = '<p style="margin: 0;">' + bap_object.loc_strings.please_wait + '</p>';

        var scheme_id = $('#scheme').data('scheme-id'),
            event_id = $('#scheme').data('event-id'),
            checkoutSubmitHandler = function () {

                var checkoutFirstName = $('#checkout-first-name'),
                    checkoutLastName = $('#checkout-last-name'),
                    checkoutEmail = $('#checkout-email'),
                    checkoutPhone = $('#checkout-phone'),
                    checkoutNotes = $('#checkout-notes');

                if (checkoutFirstName.val().length == 0) {
                    checkoutFirstName.parents(".field").addClass('error')
                } else {
                    checkoutFirstName.parents(".field").removeClass('error')
                }

                if (checkoutLastName.val().length == 0) {
                    checkoutLastName.parents(".field").addClass('error')
                } else {
                    checkoutLastName.parents(".field").removeClass('error')
                }

                if (checkoutEmail.val().length == 0 || !validateEmail(checkoutEmail.val())) {
                    checkoutEmail.parents(".field").addClass('error')
                } else {
                    checkoutEmail.parents(".field").removeClass('error')
                }

                if (checkoutPhone.val().length == 0 || !validatePhone(checkoutPhone.val())) {
                    checkoutPhone.parents(".field").addClass('error')
                } else {
                    checkoutPhone.parents(".field").removeClass('error')
                }

                if (checkoutFirstName.val().length == 0 ||
                    checkoutLastName.val().length == 0 ||
                    checkoutEmail.val().length == 0 || !validateEmail(checkoutEmail.val()) ||
                    checkoutPhone.val().length == 0 || !validatePhone(checkoutPhone.val())) {

                    return false;
                }

                var dialog = this,
                    data = {
                        action: 'checkout',
                        first_name: checkoutFirstName.val(),
                        last_name: checkoutLastName.val(),
                        email: checkoutEmail.val(),
                        phone: checkoutPhone.val(),
                        notes: checkoutNotes.val(),
                        scheme_id: scheme_id,
                        event_id: event_id
                    };

                $(dialog).dialog("close");
                $.blockUI();

                $.post(bap_object.ajaxurl, data, function (response) {
                    refreshSchemeAndCartCallback(response);
                    $.unblockUI();
                });
            },
            addCountdown = function() {
                var cartExpirationTime = $('#cart-expiration-time'),
                    time = new Date().getTime(),
                    ts = Math.floor(time / 1000);

                cartExpirationTime.attr('data-time', ts + cartExpirationTime.data("time-left") );

                $('#bap-countdown-container').show();

                $(".kkcount-down").kkcountdown({
                    dayText : 'day ',
                    daysText : 'days ',
                    hoursText : ':',
                    minutesText : ':',
                    secondsText : false,
                    displayZeroDays : false,
                    oneDayClass : 'one-day',
                    callback : function () {
                        $('#bap-countdown-container').hide();
                        refreshScheme();
                        refreshCart();
                    }
                });
            };

        setInterval(refreshScheme, 5000)
        //setInterval(refreshCart, 5000)

        addCellEventHandlers();

        addCountdown();

        $(document).tooltip({
            tooltipClass : 'bap-tooltip',
            items: '.scheme-cell',
            position: {
                my: "left top+5"
            },
            content: function () {
                return $('#tooltip-scheme-place-' + $(this).data('place-id')).html();
            }
        });


        $("#cart-checkout").button();


        var bapCartFormDialogButtonsObj = {};
        bapCartFormDialogButtonsObj[bap_object.loc_strings.checkout] = checkoutSubmitHandler;
        bapCartFormDialogButtonsObj[bap_object.loc_strings.cancel] = function () {
            $(this).dialog("close");
        };
        $("#bap-cart-form-dialog").dialog({
            dialogClass: "bap-dialog",
            autoOpen: false,
            height: 500,
            width: 500,
            modal: true,
            buttons: bapCartFormDialogButtonsObj
        });


        var schemeWarningMessageButtonsObj = {};
        schemeWarningMessageButtonsObj[bap_object.loc_strings.ok] = function () {
            $(this).dialog("close");
        };
        $("#scheme-warning-message").dialog({
            autoOpen: false,
            modal: true,
            buttons: schemeWarningMessageButtonsObj
        });


        $("#cart-checkout").click(function (e) {
            e.preventDefault();

            $("#bap-cart-form-dialog").dialog("open");

            return false;
        });


        function refreshScheme() {

            if (!bookAPLaceEventBookingOpen) {
                return;
            }

            var data = {
                action: 'refresh_scheme',
                scheme_id: scheme_id,
                event_id: event_id
            };

            $.post(bap_object.ajaxurl, data, function (response) {
                $('#scheme-container').empty().append(response);
                if (!bookAPLaceEventBookingOpen) {
                    $('#shopping-cart-container').empty();
                    $('#shopping-cart-controls-container').empty();
                }
            });

        }

        function refreshCart() {

            var data = {
                action: 'refresh_cart'
            };

            $.post(bap_object.ajaxurl, data, function (response) {
                $('#shopping-cart-container').empty().append(response);
            });

        }

        function refreshSchemeAndCartCallback(response) {
            $('#scheme-container').replaceWith($(response).find('#scheme-container'));
            $('#shopping-cart-container').replaceWith($(response).find('#shopping-cart-container'));
            addCountdown();
        }

        function addCellEventHandlers() {
            $(document).on('mouseenter', '.scheme-place-available', function () {

                var self = $(this),
                    placeId = self.data('place-id'),
                    isCellSelected = self.toggleClass('scheme-cell-selected').hasClass('scheme-cell-selected');

                toggleAllCellsOfPlace(placeId, isCellSelected);

            });

            $(document).on('mouseleave', '.scheme-place-available', function () {

                var self = $(this),
                    placeId = self.data('place-id'),
                    isCellSelected = self.toggleClass('scheme-cell-selected').hasClass('scheme-cell-selected');

                toggleAllCellsOfPlace(placeId, isCellSelected);

            });

            $(document).on('click', '.scheme-place-available', function () {

                $.blockUI();

                var data = {
                    action: 'add_to_cart',
                    scheme_id: scheme_id,
                    event_id: event_id,
                    place_id: $(this).data('place-id')
                };

                $.post(bap_object.ajaxurl, data, function (response) {
                    if (response == '0') {
                        refreshScheme();
                        $.unblockUI({
                            onUnblock: function() {
                                $("#scheme-warning-message").dialog('open');
                            }
                        });
                    } else {
                        refreshSchemeAndCartCallback(response);
                        $.unblockUI();
                    }
                });

                return false;

            });

            $(document).on('click', '.delete_from_cart', function () {

                $.blockUI();

                var data = {
                    action: 'delete_from_cart',
                    scheme_id: scheme_id,
                    event_id: event_id,
                    place_id: $(this).data('place-id')
                };

                $.post(bap_object.ajaxurl, data, function (response) {
                    refreshSchemeAndCartCallback(response);
                    $.unblockUI();
                });

                return false;

            });
        }

        function toggleAllCellsOfPlace(placeId, isCellsOfPlaceSelected) {
            $(".scheme-place-" + placeId).each(function () {
                var cell = $(this);
                if (isCellsOfPlaceSelected) {
                    cell.addClass('scheme-cell-selected');
                } else {
                    cell.removeClass('scheme-cell-selected');
                }
            });
        }

        function validateEmail(email) {
            var pattern = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/;
            return pattern.test(email);
        }

        function validatePhone(phone) {
            var pattern = /^\d+$/;
            return pattern.test(phone);
        }

    });
}(jQuery));