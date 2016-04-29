$(document).off("click", "#add-new-movie");
$(document).on('click', '#add-new-movie', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#add-movie-modal").modal("show");

        $("#add-movie-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".delete-movie");
$(document).on('click', '.delete-movie', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#delete-movie-modal").modal("show");

        $("#delete-movie-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});

$(document).off("click", ".update-movie");
$(document).on('click', '.update-movie', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#update-movie-modal").modal("show");

        $("#update-movie-modal").on("hidden.bs.modal", function() {
            $(this).remove();
        });
    });
});