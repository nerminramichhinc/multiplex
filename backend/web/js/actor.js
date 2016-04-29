$(document).off("click", "#add-new-actor");
$(document).on('click', '#add-new-actor', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#add-actor").modal("show");

        $("#add-actor").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".delete-actor");
$(document).on('click', '.delete-actor', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#delete-actor-modal").modal("show");

        $("#delete-actor-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".update-actor");
$(document).on('click', '.update-actor', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#update-actor-modal").modal("show");

        $("#update-actor-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});