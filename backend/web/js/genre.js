$(document).off("click", "#add-new-genre");
$(document).on('click', '#add-new-genre', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#add-genre-modal").modal("show");

        $("#add-genre-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".delete-genre");
$(document).on('click', '.delete-genre', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#delete-genre-modal").modal("show");

        $("#delete-genre-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".update-genre");
$(document).on('click', '.update-genre', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#update-genre-modal").modal("show");

        $("#update-genre-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});