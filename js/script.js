// Delete task
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
// Check task
    $(".check-box").click(function (e) {
        const id = $(this).attr('data-todo-id');

        $.post('app/check.php',
            {
                id: id
            },
            (data) => {
                if (data !== 'error') {
                    const h2 = $(this).next();
                    console.log(data);
                    if (Number(data) === 1) {
                        h2.removeClass('checked');
                    } else {
                        h2.addClass('checked');
                    }
                }
            }
        );
    });
});