$(".pull-right").click(function() {
    $("#alert-success").remove();
});

function actionDelete(event) {
    event.preventDefault();
    $("#alert-success").remove();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa không?',
        text: "Bạn sẽ không thể khôi phục lại!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Bạn đã xóa thành công!',
                        )
                    }
                },
                error: function() {
                    Swal.fire(
                        'Bạn không thể xóa quản trị viên!',
                    )
                }
            })

        }
    })
}

$(document).on('click', '#prd_delete', actionDelete);