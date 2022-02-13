$('.btn-toggle').click(function () {
    $(this).find('.btn').toggleClass('active');

    if ($(this).find('.btn-primary').length > 0) {
        $(this).find('.btn').toggleClass('btn-primary');
    }

    $(this).find('.btn').toggleClass('btn-default');

});
$('.btn-toggle .btn').click(function () {
    var user_id = $(this).attr('id'), is_active;
    if (!$(this).hasClass('active')) {
        if ($(this).html() == "ON") {
            is_active = 1;
        } else {
            is_active = 0;
        }
    } else {
        if ($(this).html() == "ON") {
            is_active = 0;
        } else {
            is_active = 1;
        }
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin/users/activeOrDeactive',
        data: {
            'user_id': user_id,
            'is_active': is_active,
        },
        type: 'post',
        success: function () {
            console.log('Update user successfully!');
        }
    });
});
