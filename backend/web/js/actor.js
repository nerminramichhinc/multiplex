$(document).off("click", "#add-new-actor");
$(document).on('click', '#add-new-actor', function(e) {
    e.preventDefault();
    var self = this;
    var url = $(this).data("url");

    $.get(url, {}, '', 'html').done(function(result) {
        $("body").append(result);

        $("#add-actor-modal").modal("show");

        $("#add-actor-modal").on("hidden.bs.modal", function() {
            $(this).remove();
    });
    });
});