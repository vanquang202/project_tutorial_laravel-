function uploadFile(url, formData, key) {
    $.ajax({
        url: url,
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        success: function (data) {
            if (data.status) {
                location.reload();
                return false;
            } else {
                if (data.errors) {
                    var html = data.errors.image
                        .map(function (error) {
                            return `
                        <p class="text-danger">${error}</p>
                    `;
                        })
                        .join("");
                } else {
                    var html = `
                        <p class="text-danger">Không thể cập nhật ảnh </p>
                `;
                }
                $(".form-error-" + key).html(html);
                toastr.error("Không cập nhật được ảnh !");
            }
        },
    });
}

$(".file-upload-change").on("change", function () {
    var course_id = $(this).data("id");
    var image_old = $(this).data("image_old");
    var key = $(this).data("key");
    $(".form-error-" + key).html(``);
    var formData = new FormData();
    formData.append("image", $(this)[0].files[0]);
    formData.append("image_old", image_old);
    formData.append("_token", _token);
    uploadFile(
        "https://api.laravel.org/api/update-image-course/" + course_id,
        formData,
        key
    );
});
$("#upload-file").on("change", function () {
    var course_id = $(this).data("id");
    var formData = new FormData();
    formData.append("image", $(this)[0].files[0]);
    formData.append("_token", _token);
    uploadFile(
        "https://api.laravel.org/api/upload-image-course/" + course_id,
        formData,
        -1
    );
});
