<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách khóa học</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Lọc giảng viên
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                                    <?php foreach($teacher_read as $key => $values): ?>
                                        <li><a class="dropdown-item" href="<?=$sort."?teachers=".$values['id']?>"><?= $values['name_teacher'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            &emsp;|&emsp;
                            <div class="btn-group">
                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Lọc danh mục
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                                    <?php foreach($category_read as $key => $values): ?>
                                        <li><a class="dropdown-item" href="<?=$sort."?cate=".$values['id']?>"><?= $values['name_category'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            &emsp;|&emsp;
                            <div class="btn-group">
                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Lọc
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                                    <li><a class="dropdown-item" href="<?=$sort?>?sort=name_asc">Tên từ A - Z</a></li>
                                    <li><a class="dropdown-item" href="<?=$sort?>?sort=name_desc">Tên từ Z - A</a></li>
                                    <li><a class="dropdown-item" href="<?=$sort?>?sort=price_asc">Giá từ cao -> thấp</a></li>
                                    <li><a class="dropdown-item" href="<?=$sort?>?sort=price_asc">Giá từ thấp -> cao</a></li>
                                </ul>
                            </div>
                            &emsp;|&emsp;
                            <form action="<?= COURSES ?>" class="d-flex justify-content-center align-items-center w-30">
                                <input type="search" name="course" class="form-control" placeholder="Tìm khóa học" value="<?= isset($_GET['course']) ? $_GET['course'] : "" ?>">
                                <?php
                                if(isset($_GET['course'])){
                                    echo '&emsp;<a class="btn btn-outline-primary" href="'.COURSES.'">X</a>';
                                }else {
                                    echo  '&emsp;<button class="btn btn-outline-primary">Tìm</button>';
                                }
                                ?>
                            </form>
                            &emsp;|&emsp;
                            <a class="btn btn-success m-0" href="<?= COURSES ?>/create">Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên khóa học</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giảng viên</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá khóa học</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Danh mục</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($courses_read)){ ?>
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
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_teacher'] ?></p></td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= number_format($values['price_course'], 0, '', ',') ?> VNĐ</span>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0 text-center"><?= $values['name_category'] ?></p></td>
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
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <h3 class="mb-0 text-center">Chưa có khóa học</h3>
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
    .dropdown-menu {
        border: 1px solid #cccccc;
    }
    .btn {
        margin-bottom: 0 !important;
    }
</style>