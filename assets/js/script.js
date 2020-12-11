$(document).ready(function () {
    $('.alert').fadeTo(7000, 0.00, function() {
        $(this).slideUp("slow", function() {
            $(this).remove();
        });
    });
    $('.post-content #post-edit').click(function() {
        $('.edit-post').slideDown("slow", function() {
            $(this).show();
        })
    });
})