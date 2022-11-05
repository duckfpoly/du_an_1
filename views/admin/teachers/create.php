<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Thêm giảng viên</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="col-3 mb-5">
                        <div class="preview_img border">
                            <a class="my-image-links" data-gall="gallery01" id="preview_img" href="https://lzd-img-global.slatic.net/g/shop/48483780466e40d1b21bc23a570034be.png_1200x1200q80.jpg_.webp"><img id="image_course_preview" src="https://lzd-img-global.slatic.net/g/shop/48483780466e40d1b21bc23a570034be.png_1200x1200q80.jpg_.webp" alt="your image" /></a>
                        </div>
                    </div>
                    <div class="p-3 col-8 ">
                        <form action="<?= COURSES ?>/store" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name_teacher" class="form-label">Tên giảng viên</label>
                                <input type="text" name="name_teacher" id="name_teacher" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="email_teacher" class="form-label">Email</label>
                                    <input type="text" name="email_teacher" id="email_teacher" class="form-control">
                                    <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="phone_teacher" class="form-label">Số điện thoại</label>
                                <input type="number" name="phone_teacher" id="phone_teacher" class="form-control" min="0">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="password_teacher" class="form-label">Mật khẩu</label>
                                <input type="number" name="password_teacher" id="password_teacher" class="form-control" min="0">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="image_teacher" class="form-label">Ảnh</label>
                                <input type="file" name="image_teacher" id="image_teacher" class="form-control" onchange="readURL(this);">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="about_teacher" class="form-label">Giới thiệu</label>
                                <input type="text" name="about_teacher" id="about_teacher" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="scope_teacher" class="form-label">Kỹ năng</label>
                                <input type="text" name="scope_teacher" id="scope_teacher" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= COURSES ?>" class="btn btn-secondary">Quay lại</a>
                                <button class="btn btn-success" name="create_course" type="submit">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        Validator({
            form: "#form-1",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
                Validator.isRequired("#name_course", "Vui lòng nhập tên giảng viên"),
                Validator.isRequired("#price_course", "Vui lòng nhập ảnh giảng viên"),
                Validator.isRequired("#description_course","Vui lòng nhập mô tả khóa học"),
                Validator.isRequired("#quote", "Vui lòng nhập trích dẫn"),
                Validator.isRequired("#image_course", "Vui lòng chọn ảnh"),
                Validator.isRequired("#id_category", "Vui lòng chọn danh mục"),
            ],
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image_course_preview").attr("src", e.target.result);
                $("#preview_img").attr("href", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>