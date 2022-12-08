<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách hóa đơn</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="<?= ORDERS ?>">
                                <select onchange="this.form.submit()" class="form-control" name="status">
                                    <option value="" <?= isset($_GET['status']) ? "" : "disabled" ?> selected>Lọc</option>
                                    <?php $status = isset($_GET['status']) ? $_GET['status'] : "" ?>
                                    <option value="0" <?= $status == 0 ? 'selected' : "" ?>>Chưa thanh toán</option>
                                    <option value="1" <?= $status == 1 ? 'selected' : "" ?>>Thanh toán lỗi</option>
                                    <option value="2" <?= $status == 2 ? 'selected' : "" ?>>Đã thanh toán</option>
                                </select>
                            </form>
                            &emsp;|&emsp;
                            <form action="<?= ORDERS ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Nhập mã hóa đơn" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
                                <?php
                                    if(isset($_GET['s'])){
                                        echo '&emsp;<a class="btn btn-outline-primary" href="'.ORDERS.'">X</a>';
                                    }else {
                                        echo '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hóa đơn</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thời gian đăng ký</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Học viên</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lớp</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($read_order)){ ?>
                                <?php foreach ($read_order as $keys => $values):?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['order_code'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= format_datetime('datetime',$values['order_date'])  ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_student'] ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['email_student'] ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_class'] ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['amount'] ?></p></td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <select
                                                        name="status_order" <?= $values['status'] == 1 || $values['status'] == 2 ? 'disabled' : "" ?>
                                                        id="status_order"
                                                        class="form-control w-75  <?= $values['status'] == 2 ? 'bg-success text-white' : "" ?> <?= $values['status'] == 1 ? 'bg-warning text-white' : "" ?>"
                                                        data-id="<?= $values['id'] ?>"
                                                        data-id-class="<?= $values['id_class'] ?>"
                                                        data-id-student="<?= $values['id_students'] ?>"
                                                        onchange="change_qtyy(this)">
                                                    <option value="0" <?= $values['status'] == 0 ? 'selected' : "" ?>>Chưa thanh toán</option>
                                                    <option value="1" <?= $values['status'] == 1 ? 'selected' : "" ?>>Thanh toán thất bại</option>
                                                    <option value="2" <?= $values['status'] == 2 ? 'selected' : "" ?>>Đã thanh toán</option>
                                                </select>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= ORDERS ?>/detail/<?= $values['id'] ?>">Chi tiết</a></span>&emsp;
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <h3 class="mb-0 text-center">Chưa có hóa đơn !</h3>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let change_qtyy = element => {
        var id_class    = element.getAttribute('data-id-class');
        var id_student  = element.getAttribute('data-id-student');
        var status      = element.value;
        var id          = element.getAttribute('data-id');
        var dataString  = 'id='+id+'&status='+status+'&id_student='+id_student+'&id_class='+ id_class;
        $.ajax({
            type: "POST",
            url: '<?= ORDERS ?>/edit',
            data: dataString,
            success: function () {
                if(status == 1) {
                    element.setAttribute("disabled", true)
                    element.style.color = "#fff";
                    element.style.background = "#fb6340";
                }
                else if(status == 2) {
                    element.setAttribute("disabled", true)
                    element.style.color = "#fff";
                    element.style.background = "#2dce89";
                    var storeStudent =
                        'id_class='     + id_class      +
                        '&id_student='  + id_student
                    $.ajax({
                        type: "POST",
                        url: '<?= CLASSES ?>/storeStudent',
                        data: storeStudent,
                        success: function () {
                            console.log('success')
                        }
                    });
                }
                showSuccessToast('Success','Cập nhật thành công !','success')
            }
        });
    }
</script>