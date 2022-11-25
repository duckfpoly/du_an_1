<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Thêm khuyến mãi</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3">
                        <form action="<?= SALES ?>/store" method="post" id="form-1">
                            <div class="form-group ">
                                <label for="sale_code" class="form-label">Mã khuyến mãi</label>
                                <input type="text" name="sale_code" id="sale_code" class="form-control" value="<?= rand_code(6) ?>">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="percent" class="form-label">Phần trăm giảm</label>
                                <input type="number" min="0" max="99" name="percent" id="percent" class="form-control">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="form-group ">
                                <label for="time" class="form-label">Thời gian hết hạn</label>
                                <input type="date" name="time" min="<?= date("Y-m-d") ?>" id="time" class="form-control">
                                <div class="form-message text-danger mt-1"></div>
                            </div>
                            <div class="mt-5">
                                <a href="<?= SALES ?>" class="btn btn-secondary">Quay lại</a>
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
                Validator.isRequired("#sale_code", "Vui lòng nhập mã khuyến mãi"),
                Validator.isRequired("#percent", "Vui lòng nhập phần trăm giảm"),
                Validator.isRequired("#time", "Vui lòng nhập thời gian hết hạn"),
            ],
        });
    });

</script>