$(document).ready(function () {
    $('.remove-to-do').click(function () {
        const id = $(this).attr('id');

        $.post("app/remove.php",
            {
                id: id
            },
            (data) => {
                if (data) {
                    $(this).parent().hide(600);
                }
            }
        );
    });
});