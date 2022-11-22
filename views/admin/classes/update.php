<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Sửa lớp học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3">
                        <form action="<?= CLASSES ?>/edit/<?= $update_class['id'] ?>" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="time_learn" class="form-label">
                                    Trạng thái lớp học
                                </label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_class" id="statusClass1" value="0" <?= $update_class['status_class'] == 0 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusClass1">
                                            Mở
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_class" id="statusClass2" value="1" <?= $update_class['status_class'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusClass2">
                                            Đóng
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="name_class" class="form-label">Tên lớp học</label>
                                <input type="text" name="name_class" id="name_class" class="form-control" value="<?= $update_class['name_class'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="id_category" class="form-label">Khóa học</label>
                                <select name="id_category" id="id_category" class="form-control">
                                    <?php foreach($courses_read as $key => $values): ?>
                                        <option <?= $update_class['name_course'] == $values['name_course'] ? "selected" : "" ?>  value="<?= $values['id'] ?>"><?= $values['name_course'] ?></option>
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
                                        <input class="form-check-input" type="radio" name="time_learn" id="statusCourse1" value="0" <?= $update_class['time_learn'] == 0 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusCourse1">
                                            2 - 4 - 6
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="time_learn" id="statusCourse2" value="1" <?= $update_class['time_learn'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusCourse2">
                                            3 - 5 - 7
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="time_start" class="form-label">Thời gian bắt đầu</label>
                                <input type="date" name="time_start" id="time_start" class="form-control" value="<?= $update_class['time_start'] ?>" required>
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= CLASSES ?>" class="btn btn-secondary">Quay lại</a>
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
    var lenght = 1;
    load_more(".item_students", "#loadMoreStd", "#loadLessStd", lenght);
    load_less(".item_students", "#loadLessStd", "#loadMoreStd", lenght);
    document.addEventListener("DOMContentLoaded", function () {
        Validator({
            form: "#form-1",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
                Validator.isRequired("#name_class", "Vui lòng nhập tên lớp học"),
                Validator.isRequired("#id_category", "Vui lòng chọn khóa học"),
            ],
        });
    });
</script>