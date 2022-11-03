<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-3">
                    <div class="text-center">
                        <h3>Chi tiết khóa học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3">
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Tên khóa học</label>
                            <div class="form-control">
                                {{ $courses->name_course }}
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Đơn giá</label>
                            <div class="form-control">
                                {{ $courses->price_course }}
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Đánh giá ( <span class="Stars" style="--rating: {{ $courses->star_course * 5 }};" aria-label="Rating of this product is 2.3 out of 5."></span> )</label>
                            <div class="form-control">
                                {{ $courses->star_course }}
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Số lượng đánh giá</label>
                            <div class="form-control">
                                {{ $courses->rate_course }}
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Mô tả khóa học</label>
                            <div class="form-control">
                                {{ $courses->description_course }}
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_course" class="form-label">Trích dẫn</label>
                            <div class="form-control">
                                {{ $courses->quote }}
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="<?= $root_url_2 ?>courses" class="btn btn-secondary">Quay lại</a>
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

