<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách danh mục</h6>
                        <div class="d-flex justify-content-between align-items-center">

                            <form action="<?= CATEGORIES ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm danh mục" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
                                <?php
                                if(isset($_GET['s'])){
                                    echo '&emsp;<a class="btn btn-outline-primary" href="'.CATEGORIES.'">X</a>';
                                }else {
                                    echo '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                }
                                ?>
                            </form>
                            &emsp;|&emsp;
                            <a class="btn btn-success m-0" href="<?= CATEGORIES ?>/create">Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Khóa học thuộc danh mục</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($read_category)){ ?>
                                    <?php $i = 0; foreach ($read_category as $keys => $values): $i++?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $i ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_category'] ?></p></td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= count_course_with_cate($values['id']) ?> khóa học</p></td>
                                        <td>
                                            <?=
                                            $values['status'] == 0
                                                ? '<span class="badge badge-sm bg-gradient-success">Kích hoạt</span>'
                                                : '<span class="badge badge-sm bg-gradient-warning">Chưa kích hoạt</span>'
                                            ?>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <?php if($values['id'] === 1) { ?>
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <button disabled class="btn btn-outline-danger m-0">Không thể sửa</button>
                                                </span>&emsp;
                                            <?php } else { ?>
                                                <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= CATEGORIES ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                                <span class="text-secondary text-xs font-weight-bold d-none">
                                                <?php if(count_course_with_cate($values['id']) > 0){ ?>
                                                    <button onclick="showSuccessToast('Cảnh báo', 'Không thể xóa danh mục', 'error')" class="btn btn-danger">Xóa</button>
                                                <?php }else { ?>
                                                    <form action="<?= CATEGORIES ?>/destroy" method="post">
                                                        <input type="hidden" name="id_cate" value="<?= $values['id'] ?>">
                                                        <button onclick="return confirm('Bạn muốn xóa danh mục khóa học <?= $values['name_category'] ?> ?')" class="btn btn-danger m-0">Xóa</button>
                                                    </form>
                                                <?php } ?>
                                            </span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h3 class="mb-0 text-center">Chưa có danh mục</h3>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="paginationn">
                        <?php pagination($data_cate[1], $data_cate[2], CATEGORIES); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .paginationn {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .paginationn a,
    .paginationn span
    {
        margin: 2px;
        padding: 10px;
        /*border: 1px solid black;*/
        border-radius: 20px;
        transition: 0.5s all;
    }
    .paginationn a:hover,
    .paginationn span.active {
        background: cadetblue;
        color: #fff;
    }
</style>