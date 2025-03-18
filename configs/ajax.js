
$(document).ready(function () {
    $("#contactForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: "POST",
            url: "sendmail.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("[data-form-alert]").removeAttr("hidden"); // Show success message
                    $("[data-form-alert-danger]").attr("hidden", "hidden"); // Hide error message
                    $("#contactForm")[0].reset(); // Reset form
                } else {
                    $("[data-form-alert-danger]").removeAttr("hidden"); // Show error message
                    $("[data-form-alert]").attr("hidden", "hidden"); // Hide success message
                }
            },
            error: function () {
                $("[data-form-alert-danger]").removeAttr("hidden"); // Show error on AJAX failure
                $("[data-form-alert]").attr("hidden", "hidden"); // Hide success message
            }
        });
    });
});
