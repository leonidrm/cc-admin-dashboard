(function ($) {
    $('.select2').select2({
        placeholder: "Please select a company",
        allowClear: true
    });
    $('.status-toggle').bootstrapToggle({
        on: "Active",
        off: "Inactive"
    });
    $('.confirmed-toggle').bootstrapToggle({
        on: "Confirmed",
        off: "Not Confirmed"
    });
})(jQuery);
