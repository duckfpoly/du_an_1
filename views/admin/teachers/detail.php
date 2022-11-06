<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-3">
                    <div class="text-center">
                        <h3>Chi tiết giảng viên</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="col-4">
                        <div class="preview_img p-3">
                            <a class="my-image-links" data-gall="gallery01" href="<?= $dir_img.$teacher_detail['image_teacher'] ?>"><img id="image_course_preview" src="<?= $dir_img.$teacher_detail['image_teacher'] ?>" alt="your image" /></a>
                        </div>
                    </div>
                    <div class="p-3 col-8">
                        <div class="form-group mb-3">
                            <label for="name_teacher" class="form-label">Tên giảng viên</label>
                            <div class="form-control">
                                <?= $teacher_detail['name_teacher'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email_teacher" class="form-label">Email</label>
                            <div class="form-control">
                                <?= $teacher_detail['email_teacher'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_teacher" class="form-label">Số điện thoại</label>
                            <div class="form-control">
                                <?= $teacher_detail['phone_teacher'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="about_teacher" class="form-label">Giới thiệu</label>
                            <div class="form-control">
                                <?= $teacher_detail['about_teacher'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="scope_teacher" class="form-label">Kỹ năng</label>
                            <div class="form-control">
                                <?= $teacher_detail['scope_teacher'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role" class="form-label">Chức vụ</label>
                            <div class="form-control">
                                <?= $teacher_detail['role'] == 0 ? "Giảng viên" : "" ?>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="<?= TEACHERS ?>" class="btn btn-secondary">Quay lại</a>
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
