<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Thêm học viên</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="col-3 mb-5">
                        <div class="preview_img border">
                            <a class="my-image-links" data-gall="gallery01" id="preview_img" href="https://lzd-img-global.slatic.net/g/shop/48483780466e40d1b21bc23a570034be.png_1200x1200q80.jpg_.webp"><img id="image_course_preview" src="https://lzd-img-global.slatic.net/g/shop/48483780466e40d1b21bc23a570034be.png_1200x1200q80.jpg_.webp" alt="your image" /></a>
                        </div>
                    </div>
                    <div class="p-3 col-8 ">
                        <form action="<?= STUDENTS ?>/store" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name_student" class="form-label">Tên học viên</label>
                                <input type="text" name="name_student" id="name_student" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="email_student" class="form-label">Email</label>
                                    <input type="email" name="email_student" id="email_student" class="form-control">
                                    <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="phone_student" class="form-label">Số điện thoại</label>
                                <input type="number" name="phone_student" id="phone_student" class="form-control" min="0">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="password_student" class="form-label">Mật khẩu</label>
                                <input type="password" name="password_student" id="password_student" class="form-control" min="0">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group">
                                <label for="image_student" class="form-label">Ảnh</label>
                                <input type="file" name="image_student" id="image_student" class="form-control" onchange="readURL(this);">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= STUDENTS ?>" class="btn btn-secondary">Quay lại</a>
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
                Validator.isRequired("#name_student", "Vui lòng nhập tên học viên"),
                Validator.isRequired("#email_student", "Vui lòng nhập email học viên"),
                Validator.isRequired("#phone_student", "Vui lòng nhập số điện thoại học viên"),
                Validator.isRequired("#password_student", "Vui lòng nhập mật khẩu học viên"),
                Validator.isRequired("#image_student", "Vui lòng chọn ảnh học viên"),
                Validator.isEmail('#email_student'),
                Validator.isPhone('#phone_student'),
                Validator.minLength('#password_student', 8),
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