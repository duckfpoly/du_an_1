<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Thêm học viên vào lớp học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3">
                        <form action="<?= CLASSES ?>/storeStudent/<?= $_GET['id'] ?>" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="id_student" class="form-label">Học viên</label>
                                <select name="id_student" id="id_student" class="form-control">
                                    <option disabled selected value="">Chọn học viên</option>
                                    <?php foreach($student_read as $key => $values): ?>
                                        <option value="<?= $values['id'] ?>">MHV: <?= $values['id'] ?>&emsp;|&emsp;<?= $values['name_student'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="date_sub" class="form-label">
                                    Ngày học
                                </label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="date_sub" id="statusCourse1" value="0" required>
                                        <label class="form-check-label" for="statusCourse1">
                                            2 - 4 - 6
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="date_sub" id="statusCourse2" value="1" required >
                                        <label class="form-check-label" for="statusCourse2">
                                            3 - 5 - 7
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time_sub" class="form-label">Ca học</label>
                                <select name="time_sub" id="time_sub" class="form-control">
                                    <option value="" disabled selected>Chọn ca học</option>
                                    <?php for ($i = 1; $i <= 6; $i++){?>
                                        <option value="<?= $i ?>">Ca <?= $i?></option>
                                    <?php } ?>
                                </select>
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= CLASSES ?>" class="btn btn-secondary">Quay lại</a>
                                <button class="btn btn-success" type="submit">Thêm</button>
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
                Validator.isRequired("#id_student", "Vui lòng chọn học viên"),
                Validator.isRequired("#time_sub", "Vui lòng chọn ca học"),
            ],
        });
    });
</script>