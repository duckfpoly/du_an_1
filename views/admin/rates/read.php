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
                        <table class="table align-items-center " id="examplee">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đánh giá</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nội dung</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khóa học</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giảng viên</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($read_comment)){ ?>
                                <?php foreach ($read_comment as $keys => $values): ?>
                                    <tr>
                                        <td><?= $keys + 1?></td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['name_student'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center"><p class="text-xs text-center font-weight-bold mb-0"><?= $values['content_rate'] ?></p></td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['name_course'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['name_teacher'] ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?=
                                            $values['status_teacher'] == 0
                                                ? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>'
                                                : '<span class="badge badge-sm bg-gradient-danger">Cấm</span>'
                                            ?>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
<!--                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-primary m-0" href="--><?//= RATES ?><!--/detail/--><?//= $values['id'] ?><!--">Chi tiết</a></span>&emsp;-->
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <form action="<?= RATES ?>/destroy/<?= $values['id_cmt'] ?>" method="post">
                                                    <button onclick="return confirm('Bạn muốn xóa đánh giá ?')" class="btn btn-danger m-0" >Xóa</button>
                                                </form>
                                            </span>
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