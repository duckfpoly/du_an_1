<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách đánh giá</h6>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                            <form action="<?= RATES ?>">
                                <select onchange="this.form.submit()" class="form-control" name="c">
                                    <option value="all" <?= isset($_GET['c']) ? "" : "disabled" ?> selected>Lọc</option>
                                    <?php $c = isset($_GET['c']) ? $_GET['c'] : "" ?>
                                    <?php foreach ($all_course as $value):?>
                                    <option value="<?= $value['id']?>"<?= $c == $value['id'] ? 'selected' : ""?> ><?= $value['name_course']?></option>
                                    <?php endforeach?>
                                </select>
                            </form>
                            <form action="<?= RATES ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm đánh giá" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đánh giá</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nội dung</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khóa học</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($read_comment)){ ?>
                                <?php foreach ($read_comment as $keys => $values): ?>
                                    <tr>
                                        <td><?= $keys + 1?></td>
                                        <td class="text-center">
                                            <?= $values['name_student'] ?>
                                        </td>
                                        <td class="text-center"><p class="text-xs text-center font-weight-bold mb-0"><?= $values['content_rate'] ?></p></td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['name_course'] ?></span>
                                        </td>
                                        <td>
                                            <select class="form-control text-center" data-id-rate="<?= $values['id_cmt'] ?>" onchange="change_qtyy(this)">>
                                                <option value="0" <?= $values['status'] == 0 ? 'selected' : '' ?>>Hiện</option>
                                                <option value="1" <?= $values['status'] == 1 ? 'selected' : '' ?>>Ẩn</option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr class='d-flex justify-content-center'>
                                    <td colspan="5" class="text-center">
                                        <h5 class="mb-0 text-center " style="color:red;font-style:italic;">Chưa có đánh giá nào</h5>
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
        var id          = element.getAttribute('data-id-rate');
        var status      = element.value;
        var dataString  = 'id_rate='+id+'&status='+status;
        $.ajax({
            type: "POST",
            url: '<?= RATES ?>/update-status',
            data: dataString,
            success: function () {
                showSuccessToast('Success','Cập nhật thành công !','success')
            }
        });
    }
</script>