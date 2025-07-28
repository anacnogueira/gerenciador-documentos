$(document).ready(function () {
    $("#price, #price_string").inputmask("decimal", {
        alias: "numeric",
        groupSeparator: ".", // Thousands separator
        autoGroup: true,
        digits: 2, // Number of decimal places
        radixPoint: ",", // Decimal separator
        digitsOptional: false,
        allowMinus: false,
        placeholder: "0", // Optional placeholder text
    });
});
