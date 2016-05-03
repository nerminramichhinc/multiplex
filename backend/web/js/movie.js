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
