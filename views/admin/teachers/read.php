<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách giảng viên</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="<?= TEACHERS ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm giảng viên" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
                                <?php
                                if(isset($_GET['s'])){
                                    echo '&emsp;<a class="btn btn-outline-primary" href="'.TEACHERS.'">X</a>';
                                }else {
                                    echo '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                }
                                ?>
                            </form>
                            &emsp;|&emsp;
                            <a class="btn btn-success m-0" href="<?= TEACHERS ?>/create">Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ảnh</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên giảng viên</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số điện thoại</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($read_teacher)){ ?>
                                <?php foreach ($read_teacher as $keys => $values): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['id'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0">
                                                <img src="<?= $dir_img.$values['image_teacher'] ?>" alt="" width="50px" height="50px" class="rounded">
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_teacher'] ?></p></td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['phone_teacher'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $values['email_teacher'] ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?=
                                            $values['status_teacher'] == 0
                                                ? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>'
                                                : '<span class="badge badge-sm bg-gradient-danger">Cấm</span>'
                                            ?>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
<!--                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-primary m-0" href="--><?//= TEACHERS ?><!--/detail/--><?//= $values['id'] ?><!--">Chi tiết</a></span>&emsp;-->
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= TEACHERS ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold d-none">
                                                <form action="<?= TEACHERS ?>/destroy/<?= $values['id'] ?>" method="post">
                                                    <button onclick="return confirm('Bạn muốn xóa giảng viên <?= $values['name_teacher'] ?> ?')" class="btn btn-danger m-0" >Xóa</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <h3 class="mb-0 text-center">Chưa có giảng viên</h3>
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