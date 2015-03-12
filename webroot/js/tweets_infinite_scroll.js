(function ($) {
    $(document).ready(function () {
        $(".tweets-list").jscroll({
            'loadingHtml': '<li><i class="fa fa-spinner fa-pulse"></i></li>',
            'nextSelector': '.jscroll-next',
            'callback': function () {
                if ($(".jscroll-loading").length) {
                    $(".jscroll-loading").remove();
                }
            }
        });
    });
})(jQuery);