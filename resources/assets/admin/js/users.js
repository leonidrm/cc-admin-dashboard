(function ($) {
    $('.select2').select2();
    $('.status-toggle').bootstrapToggle({
        on: "Active",
        off: "Inactive"
    });
    $('.confirmed-toggle').bootstrapToggle({
        on: "Confirmed",
        off: "Not Confirmed"
    });
})(jQuery);
