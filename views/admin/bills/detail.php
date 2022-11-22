<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4"> 
                <div class="card-header pb-3">
                    <div class="text-center">
                        <h3>Chi tiết hoá đơn</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 d-flex justify-content-around flex-wrap">
                    <div class="p-3 col-8">
                        <div class="form-group mb-3">
                            <label for="order_date" class="form-label">Ngày đặt</label>
                            <div class="form-control">
                                <?= $bill_detail['order_date']?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Khoá học đã đặt</label>
                            <div class="form-control">
                                <?= $bill_detail['name_course'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_student" class="form-label">Tên học viên đặt</label>
                            <div class="form-control">
                                <?= $bill_detail['name_student'] ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_pay" class="form-label">Tổng tiền</label>
                            <div class="form-control">
                                <?= $bill_detail['order_pay'] ?>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="<?= BILLS ?>" class="btn btn-secondary">Quay lại</a>
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
