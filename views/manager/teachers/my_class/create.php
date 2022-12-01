<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Danh sách lớp đã tạo</h5>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <section class="container-fluid py-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <div class="card-header pb-0">
                                            <div class="text-center">
                                                <h3>Thêm lớp học</h3>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="p-3">
                                                <form action="<?= CLASS_TEACHER ?>/store" method="post" id="form-1" enctype="multipart/form-data">
                                                    <div class="form-group ">
                                                        <label for="name_class" class="form-label">Tên lớp học</label>
                                                        <input type="text" name="name_class" id="name_class" class="form-control">
                                                        <div class="form-message text-danger mt-1"></div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="id_category" class="form-label">Khóa học</label>
                                                        <select name="id_category" id="id_category" class="form-control bg-dark">
                                                            <option disabled selected value="">Chọn khóa học</option>
                                                            <?php foreach($courses_read as $key => $values): ?>
                                                                <option value="<?= $values['id'] ?>"><?= $values['name_course'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="form-message text-danger mt-1"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="time_learn" class="form-label">
                                                            Thời gian học
                                                        </label>
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="" type="radio" name="time_learn" id="statusCourse1" value="0" required>
                                                                <label class="" for="statusCourse1">
                                                                    7h30 - 11h30
                                                                </label>
                                                            </div>
                                                            &emsp;&emsp;
                                                            <div class="form-check">
                                                                <input class="" type="radio" name="time_learn" id="statusCourse2" value="1" required>
                                                                <label class="" for="statusCourse2">
                                                                    14h - 18h
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="time_start" class="form-label">Khai giảng</label>
                                                        <input type="date" name="time_start" min="<?= date("Y-m-d") ?>" id="time_start" class="form-control" required>
                                                        <div class="form-message text-danger mt-1"></div>
                                                    </div>
                                                    <div class="mt-5">
                                                        <a href="<?= CLASS_TEACHER ?>" class="btn btn-secondary">Quay lại</a>
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
                                        Validator.isRequired("#name_class", "Vui lòng nhập tên lớp học"),
                                        Validator.isRequired("#id_category", "Vui lòng chọn khóa học"),
                                        Validator.isRequired("#time_start", "Vui lòng chọn ngày khai giảng"),
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
