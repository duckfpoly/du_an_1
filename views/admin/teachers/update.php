<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Sửa giảng viên</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="col-3 mb-5">
                        <div class="preview_img border">
                            <a class="my-image-links" data-gall="gallery01" href="<?= $dir_img.$teacher_detail['image_teacher'] ?>"><img id="image_course_preview" src="<?= $dir_img.$teacher_detail['image_teacher'] ?>" alt="your image" /></a>
                        </div>
                    </div>
                    <div class="p-3 col-8 ">
                        <form action="<?= TEACHERS ?>/edit/<?= $teacher_detail['id'] ?>" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="statuscourse" class="form-label">
                                    Trạng thái
                                </label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_teacher" id="statusCourse1" value="0" <?= $teacher_detail['status_teacher'] == 0 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusCourse1">
                                            Mở
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_teacher" id="statusCourse2" value="1" <?= $teacher_detail['status_teacher'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusCourse2">
                                            Khóa
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="old_image_teacher"    value="<?= $teacher_detail['image_teacher'] ?>">
                            <input type="hidden" name="created_at"           value="<?= $teacher_detail['created_at'] ?>">
                            <div class="form-group">
                                <label for="name_teacher" class="form-label">Tên giảng viên</label>
                                <input type="text" name="name_teacher" id="name_teacher" class="form-control" value="<?= $teacher_detail['name_teacher'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="email_teacher" class="form-label">Email</label>
                                <input type="email" name="email_teacher" id="email_teacher" class="form-control" value="<?= $teacher_detail['email_teacher'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="phone_teacher" class="form-label">Số điện thoại</label>
                                <input type="number" name="phone_teacher" id="phone_teacher" class="form-control" min="0" value="<?= $teacher_detail['phone_teacher'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="password_teacher" class="form-label">Mật khẩu</label>
                                <input type="password" name="password_teacher" id="password_teacher" class="form-control" value="<?= $teacher_detail['password_teacher'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="image_teacher" class="form-label">Ảnh</label>
                                <input type="file" name="image_teacher" id="image_teacher" class="form-control" onchange="readURL(this);" >
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="about_teacher" class="form-label">Giới thiệu</label>
                                <input type="text" name="about_teacher" id="about_teacher" class="form-control" value="<?= $teacher_detail['about_teacher'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="scope_teacher" class="form-label">Kỹ năng</label>
                                <input type="text" name="scope_teacher" id="scope_teacher" class="form-control" value="<?= $teacher_detail['scope_teacher'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= TEACHERS ?>" class="btn btn-secondary">Quay lại</a>
                                <button class="btn btn-success" name="create_course" type="submit">Sửa</button>
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
                Validator.isRequired("#name_teacher", "Vui lòng nhập tên giảng viên"),
                Validator.isRequired("#email_teacher", "Vui lòng nhập email giảng viên"),
                Validator.isRequired("#phone_teacher", "Vui lòng nhập số điện thoại giảng viên"),
                Validator.isRequired("#password_teacher", "Vui lòng nhập mật khẩu giảng viên"),
                Validator.isRequired("#about_teacher", "Vui lòng nhập giới thiệu giảng viên"),
                Validator.isRequired("#scope_teacher", "Vui lòng nhập kỹ năng giảng viên"),
                Validator.isEmail('#email_teacher'),
                Validator.isPhone('#phone_teacher'),
                Validator.minLength('#password_teacher', 8),
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