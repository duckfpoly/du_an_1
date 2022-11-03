<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Thêm khóa học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3 ">
                        <form action="" method="post" id="form-1">
                            <div class="form-group ">
                                <label for="" class="form-label">Tên khóa học</label>
                                <input type="text" name="name_course" id="name_course" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="price_course" class="form-label">Đơn giá</label>
                                <input type="number" name="price_course" id="price_course" class="form-control" min="0">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="description_course" class="form-label">Mô tả khóa học</label>
                                <input type="text" name="description_course" id="description_course" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="quote" class="form-label">Trích dẫn</label>
                                <input type="text" name="quote" id="quote" class="form-control">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= $root_url_2 ?>courses" class="btn btn-secondary">Quay lại</a>
                                <button class="btn btn-success" type="submit">Thêm</button>
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
