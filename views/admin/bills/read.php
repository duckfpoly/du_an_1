<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách khoá học</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="<?= BILLS ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm hoá đơn" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đặt</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khoá học đã đặt</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên học viên đặt</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tổng tiền</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái ( test )</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody> 
                            <?php if(!empty($all_data)){ ?>
                                <?php foreach ($all_data as $keys => $values): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['id'] ?></h6>
                                                </div>  
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['order_date'] ?></p></td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['name_course'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['name_student'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['order_pay'] ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm" id="status_payy">
                                            <?=
                                            $values['status'] == 0
                                                ? '<span class="badge badge-sm bg-gradient-success">Đã thanh toán</span>'
                                                : '<span class="badge badge-sm bg-gradient-danger">Chưa thanh toán</span>'
                                            ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <select name="status_order" id="status_order" class="form-control" data-item="<?= $values['id'] ?>"  onchange="change_qtyy(this)">
                                                <option value="0" <?= $values['status'] == 0 ? 'selected' : "" ?>>Đã thanh toán</option>
                                                <option value="1" <?= $values['status'] == 1 ? 'selected' : "" ?>>Chưa thanh toán</option>
                                            </select>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-primary m-0" href="<?= BILLS ?>/detail/<?= $values['id_dh'] ?>">Chi tiết</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= BILLS ?>/update/<?= $values['id_dh'] ?>">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <form action="<?= BILLS ?>/destroy/<?= $values['id_dh'] ?>" method="post">
                                                    <button onclick="return confirm('Bạn muốn xóa hoá đơn <?= $values['id_dh'] ?> ?')" class="btn btn-danger m-0" >Xóa</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <h3 class="mb-0 text-center">Chưa có hoá đơn</h3>
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
<style>
    #image_teacher {
        width: 100px;
        height: 100px;
        border-radius: 20px;
    }
</style>

<script>
    let change_qtyy = element => {
        var id = element.getAttribute('data-item');
        var status           =  document.getElementById('status_order').value
        var dataString =
            'id='                 + id +
            '&status='            + status;
        $.ajax({
            type: "POST",
            url: '<?= BILLS ?>/edit/'+id,
            data: dataString,
            success: function () {
                showSuccessToast('Success','Cập nhật thành công !' + status,'success')
            }
        });
    }
</script>