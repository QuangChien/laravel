$(document).ready(function() {
    $('#image-file').change(function(e) {
        $("#list_img_new").html('');
        $('#list_img_old').hide();
        for (let i = 0; i < e.target.files.length; i++) {
            let file = e.target.files[i];

            $("#list_img_new").append(`<div class="col-lg-6 col-md-6 col-sm-12">
                <img class="prd_img_detail" src="${URL.createObjectURL(file)}" alt="">
            </div>`);
        }
    });
});

//
