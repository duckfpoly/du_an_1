<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách lớp học</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="<?= CLASSES ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="classes" class="form-control" placeholder="Tìm lớp học" value="<?= isset($_GET['classes']) ? $_GET['classes'] : "" ?>">
                                <?php
                                if(isset($_GET['classes'])){
                                    echo '&emsp;<a class="btn btn-outline-primary" href="'.CLASSES.'">X</a>';
                                }else {
                                    echo  '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                }
                                ?>
                            </form>
                            &emsp;|&emsp;
                            <a class="btn btn-success m-0" href="<?= CLASSES ?>/create">Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên lớp học</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giảng viên</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khóa học</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số học viên</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khai giảng</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($read_class)){ ?>
                                <?php foreach ($read_class as $keys => $values): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['id'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_class'] ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_teacher'] ?></p></td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['name_course'] ?></span>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0 text-center"><?= count_std_class($values['id']) ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0 text-center"><?= format_date($values['time_start']) ?></p></td>
                                        <td class="align-middle text-center text-sm">
                                            <?=
                                                $values['status_class'] == 0
                                                ? '<span class="badge badge-sm bg-gradient-success">Mở</span>'
                                                : '<span class="badge badge-sm bg-gradient-warning">Đóng</span>'
                                            ?>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold d-none"><a class="btn btn-primary m-0"  href="<?= CLASSES ?>/addStudent/<?= $values['id'] ?>">Thêm HV</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-primary m-0"  href="<?= CLASSES ?>/showStudent/<?= $values['id'] ?>">DSHV</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0"  href="<?= CLASSES ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold d-none">
                                                <form action="<?= CLASSES ?>/destroy/<?= $values['id'] ?>" method="post">
                                                    <button onclick="return confirm('Bạn muốn xóa lớp học <?= $values['name_class'] ?> do giảng viên <?= $values['name_teacher'] ?> dạy ?')" class="btn btn-danger m-0">Xóa</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <h3 class="mb-0 text-center">Chưa có lớp học</h3>
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
