<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách khóa học</h6>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-success m-0" href="<?= COURSES ?>/create">Thêm</a>
                            &emsp;
                            <form>
                                <input type="search" name="s" placeholder="Tìm kiếm ..." class="form-control">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-2">
                        <table class="table align-items-center " id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên khóa học</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn giá</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($courses_read as $keys => $values): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $values['id'] ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_course'] ?></p></td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?= number_format($values['price_course'], 0, '', ',') ?> VNĐ</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= 
                                            $values['status_course'] == 0 
                                            ? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>'
                                            : '<span class="badge badge-sm bg-gradient-warning">Chưa kích hoạt</span>'
                                        ?>
                                    </td>
                                    <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                        <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-primary m-0" href="<?= COURSES ?>/detail/<?= $values['id'] ?>">Chi tiết</a></span>&emsp;
                                        <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= COURSES ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <form action="<?= COURSES ?>/destroy/<?= $values['id'] ?>" method="post">
                                                <button onclick="return confirm('Bạn muốn xóa khóa học <?= $values['name_course'] ?> ?')" class="btn btn-danger m-0">Xóa</button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>