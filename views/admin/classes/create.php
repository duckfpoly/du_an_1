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
                        <form action="<?= CLASSES ?>/store" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="name_class" class="form-label">Tên lớp học</label>
                                <input type="text" name="name_class" id="name_class" class="form-control">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="id_category" class="form-label">Khóa học</label>
                                <select name="id_category" id="id_category" class="form-control">
                                    <option disabled selected value="">Chọn khóa học</option>
                                    <?php foreach($courses_read as $key => $values): ?>
                                        <option value="<?= $values['id'] ?>"><?= $values['name_course'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="id_teacher" class="form-label">Giảng viên</label>
                                <select name="id_teacher" id="id_teacher" class="form-control">
                                    <option disabled selected value="">Chọn giảng viên</option>
                                    <?php foreach($teacher_read as $key => $values): ?>
                                        <option value="<?= $values['id'] ?>"><?= $values['name_teacher'] ?></option>
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
                                        <input class="form-check-input" type="radio" name="time_learn" id="statusCourse1" value="0" required>
                                        <label class="form-check-label" for="statusCourse1">
                                            7h30 - 12h
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="time_learn" id="statusCourse2" value="1" required>
                                        <label class="form-check-label" for="statusCourse2">
                                            13h30 - 18h
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="time_start" class="form-label">Thời gian bắt đầu</label>
                                <input type="date" name="time_start" id="time_start" min="<?= date("Y-m-d") ?>" class="form-control" required>
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= CLASSES ?>" class="btn btn-secondary">Quay lại</a>
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
                Validator.isRequired("#id_teacher", "Vui lòng chọn giảng viên"),
            ],
        });
    });
</script>