<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách danh mục</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-success m-0" href="<?= CATEGORIES ?>/create">Thêm</a>
                            &emsp;|&emsp;
                            <form action="<?= CATEGORIES ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm danh mục" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Khóa học thuộc danh mục</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($read_category)){ ?>
                                    <?php foreach ($read_category as $keys => $values): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['id'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_category'] ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= count_course_with_cate($values['id']) ?> khóa học</p></td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= CATEGORIES ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <form action="<?= CATEGORIES ?>/destroy/<?= $values['id'] ?>" method="post">
                                                    <button onclick="return confirm('Bạn muốn xóa khóa học <?= $values['name_category'] ?> ?')" class="btn btn-danger m-0">Xóa</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <h3 class="mb-0 text-center">Chưa có danh mục</h3>
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