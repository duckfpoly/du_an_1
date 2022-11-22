<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Sửa khoá học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="p-3 col-8 ">
                        <form action="<?= BILLS ?>/edit/<?= $bill_detail['id'] ?>" method="post" id="form-1" enctype="multipart/form-data">
                            <input type="hidden" name="id_bill" id="id_bill" value="<?= $bill_detail['id'] ?>">
                            <div class="form-group">
                                <label for="statuscourse" class="form-label">
                                    Trạng thái
                                </label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="statusCourse1" value="0" <?php echo $bill_detail['status'] == 0 ? 'checked':'' ?>/>
                                        <label class="form-check-label" for="statusCourse1">
                                            Đã thanh toán
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="statusCourse2" value="1" <?= $bill_detail['status'] == 1 ? "checked" : "" ?>/>
                                        <label class="form-check-label" for="statusCourse2">
                                            Chưa thanh toán
                                        </label>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mt-5">
                                <a href="<?= BILLS ?>" class="btn btn-secondary">Quay lại</a>
                                <button class="btn btn-success" name="create_course" type="submit">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <script>
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
</script> -->