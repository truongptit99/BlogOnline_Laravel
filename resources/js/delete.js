$('.btn-delete').click(function (e) {
    e.preventDefault();
    $('#form-delete').attr('action', $(this).attr('href'));
    if (confirm('Are you sure to want to delete?')) {
        $('#form-delete').submit();
    }
});
