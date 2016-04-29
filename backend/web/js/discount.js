$(document).off("click", "#add-new-discount");
$(document).on('click', '#add-new-discount', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#add-discount-modal").modal("show");

        $("#add-discount-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".delete-discount");
$(document).on('click', '.delete-discount', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#delete-discount-modal").modal("show");

        $("#delete-discount-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".update-discount");
$(document).on('click', '.update-discount', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#update-discount-modal").modal("show");

        $("#update-discount-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});