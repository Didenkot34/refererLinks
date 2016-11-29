/**
 * Work whit tracking links
 */
(function () {
    'use strict';
    $(document).ready(function () {

        var toGoogle = $('#error').data('google');

        $(document).on("click", ".tracking-link", saveTrackingLink);

        if (toGoogle) {
            setTimeout(redirectToGoogle, 5000);
        }

        function saveTrackingLink(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax(href)
                .done(function (data) {
                    redirectToErrorOrSuccessPAge(data.error, data.id);
                })
                .fail(function () {
                    console.log('error');
                });
        }

        function redirectToGoogle() {
            $(location).attr('href', 'http://www.google.com');
        }

        function redirectToErrorOrSuccessPAge(isError, clicksId) {
            if (isError) {
                $(location).attr('href', 'http://www.local.dev/error/' + clicksId);
            } else {
                $(location).attr('href', 'http://www.local.dev/success/' + clicksId);
            }
        }

    });

})();