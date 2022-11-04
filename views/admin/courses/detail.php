<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-3">
                    <div class="text-center">
                        <h3>Chi tiết khóa học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around">
                    <div class="col-4">
                        <div class="preview_img p-3">
                            <a class="my-image-links" data-gall="gallery01" href="<?= $dir_img.$courses_detail['image_course'] ?>"><img id="image_course_preview" src="<?= $dir_img.$courses_detail['image_course'] ?>" alt="your image" /></a>
                        </div>
                    </div>
                    <div class="p-3 col-8">
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Tên khóa học</label>
                            <div class="form-control">
                                <?= $courses_detail['name_course'] ?> 
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Đơn giá</label>
                            <div class="form-control">
                                <?= $courses_detail['price_course'] ?> 
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Đánh giá ( <span class="Stars" style="--rating: <?= $courses_detail['star_course'] * 5 ?> " aria-label="Rating of this product is 2.3 out of 5."></span> )</label>
                            <div class="form-control">
                                <?= $courses_detail['star_course'] ?> 
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Số lượng đánh giá</label>
                            <div class="form-control">
                                <?= $courses_detail['rate_course'] ?> 
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Mô tả khóa học</label>
                            <div class="form-control">
                                <?= $courses_detail['description_course'] ?> 
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Trích dẫn</label>
                            <div class="form-control">
                                <?= $courses_detail['quote'] ?> 
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="<?= COURSES ?>" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    @charset "UTF-8";
    :root {
        --star-size: 15px;
        --star-color: #fff;
        --star-background: #fc0;
    }

    .Stars {
        --percent: calc(var(--rating) / 5 * 100%);
        display: inline-block;
        font-size: var(--star-size);
        font-family: Times;
        line-height: 1;
    }
    .Stars::before {
        content: "★★★★★";
        letter-spacing: 3px;
        background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        Validator({
            form: "#form-1",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
            Validator.isRequired("#name_course", "Vui lòng nhập tên khóa học"),
            Validator.isRequired("#price_course", "Vui lòng nhập giá khóa học"),
            Validator.isRequired(
                "#description_course",
                "Vui lòng nhập mô tả khóa học"
            ),
            Validator.isRequired("#quote", "Vui lòng nhập trích dẫn"),
            Validator.isRequired("#image_course", "Vui lòng chọn ảnh"),
            ],
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_course_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
   
</script>
