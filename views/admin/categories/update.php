<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Sửa danh mục</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3">
                        <form action="<?= CATEGORIES ?>/edit/<?= $update_category['id'] ?>" method="post" id="form-1" >
                            <div class="form-group">
                                <label for="statuscourse" class="form-label">
                                    Trạng thái
                                </label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status1" value="0" <?= $update_category['status'] == 0 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="status1">
                                            Mở
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status2" value="1" <?= $update_category['status'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="status2">
                                            Khóa
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="" class="form-label">Tên danh mục</label>
                                <input type="text" name="name_category" id="name_category" class="form-control" value="<?= $update_category['name_category'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= CATEGORIES ?>" class="btn btn-secondary">Quay lại</a>
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
            Validator.isRequired("#name_category", "Vui lòng nhập tên danh mục"),
            ],
        });
    });
    
</script>