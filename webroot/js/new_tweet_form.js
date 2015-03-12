(function ($) {
    $(document).ready(function () {
        if (!$("#new_tweet textarea").length) {
            return;
        }

        var chars_left = 140;

        var uploadCharsLeft = function () {
            var new_tweet_length = $("#new_tweet textarea").val().length;
            chars_left = 140 - new_tweet_length;
            $("#chars-left-counter").text(chars_left);
        };

        uploadCharsLeft();

        $("#new_tweet textarea").on("focus", function () {
            $("#new_tweet").addClass("focused");
        }).on("blur", function () {
            if (!$(this).val()) {
                $("#new_tweet").removeClass("focused");
            }
        }).on("keydown", function (event) {
            uploadCharsLeft();
            if ((chars_left <= 0) && (event.keyCode != 8)) {
                event.preventDefault();
            }
        }).on("keyup", function () {
            uploadCharsLeft();
            if ($(this).val()) {
                $("#new_tweet").find("button[disabled]").removeAttr("disabled");
            } else {
                $("#new_tweet").find("button").attr("disabled", "disabled");
            }
        });
    });
})(jQuery);