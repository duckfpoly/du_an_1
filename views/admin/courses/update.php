<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-3">
                    <div class="text-center">
                        <h3>Sửa khóa học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="col-4 border mb-5">
                        <div class="preview_img p-3">
                            <a class="my-image-links" id="preview_img" data-gall="gallery01" href="<?= $dir_img.$courses_update['image_course'] ?>"><img id="image_course_preview" src="<?= $dir_img.$courses_update['image_course'] ?>" alt="your image" /></a>
                        </div>
                    </div>
                    <div class="p-3 col-8">
                        <form action="<?= COURSES ?>/edit/<?= $courses_update['id'] ?>" method="post" id="form-1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="statuscourse" class="form-label">
                                    Trạng thái
                                </label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_course" id="statusCourse1" value="0" <?= $courses_update['status_course'] == 0 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusCourse1">
                                            Mở
                                        </label>
                                    </div>
                                    &emsp;&emsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_course" id="statusCourse2" value="1" <?= $courses_update['status_course'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="statusCourse2">
                                            Khóa
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="old_image_course"    value="<?= $courses_update['image_course'] ?>">
                            <input type="hidden" name="created_at"          value="<?= $courses_update['created_at'] ?>">
                            <div class="form-group mb-3">
                                <label for="name_course" class="form-label">Tên khóa học</label>
                                <input type="text" name="name_course" id="name_course" class="form-control" value="<?= $courses_update['name_course'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price_course" class="form-label">Giá khóa học</label>
                                <input type="text" name="price_course" id="price_course" class="form-control" value="<?= $courses_update['price_course'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image_course" class="form-label">Ảnh</label>
                                <input type="file" name="image_course" id="image_course" class="form-control" onchange="readURL(this);">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description_course" class="form-label">Mô tả khóa học</label>
                                <input type="text" name="description_course" id="description_course" class="form-control" value="<?= $courses_update['description_course'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="quote" class="form-label">Trích dẫn khóa học</label>
                                <input type="text" name="quote" id="quote" class="form-control" value="<?= $courses_update['quote'] ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="id_category" class="form-label">Danh mục</label>
                                <select name="id_category" id="id_category" class="form-control">
                                    <?php foreach($category_read as $key => $values): ?>
                                        <option <?= $courses_update['id_category'] == $values['id'] ? "selected" : "" ?> value="<?= $values['id'] ?>"><?= $values['name_category'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= COURSES ?>" class="btn btn-secondary">Quay lại</a>
                                <button class="btn btn-success" type="submit">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .form-group.invalid .form-control{
        border-color: #f33a58;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
        form: '#form-1',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name_course', 'Vui lòng nhập tên khóa học'),
                Validator.isRequired('#price_course', 'Vui lòng nhập giá khóa học'),
                Validator.isRequired('#description_course', 'Vui lòng nhập mô tả khóa học'),
                Validator.isRequired('#quote', 'Vui lòng nhập trích dẫn'),
            ]
        })
    });

</script>
