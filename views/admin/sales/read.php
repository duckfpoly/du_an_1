<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách khuyến mãi</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="<?= SALES ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm khuyến mãi" value="<?= isset($_GET['s']) ? $_GET['s'] : "" ?>">
                                <?php
                                    if(isset($_GET['s'])){
                                        echo '&emsp;<a class="btn btn-outline-primary" href="'.SALES.'">X</a>';
                                    }else {
                                        echo '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                    }
                                ?>
                            </form>
                            &emsp;|&emsp;
                            <a class="btn btn-success m-0" href="<?= SALES ?>/create">Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="examplee">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mã khuyến mãi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phần trăm giảm ( % )</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày hết hạn</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($read_sale)){ ?>
                                <?php foreach ($read_sale as $keys => $values):?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $keys + 1 ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0">
                                                <?= $values['sale_code']  ?>
                                            </p></td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $values['percent_discount'] ?>%
                                            </p>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0">
                                                <?= format_date($values['time']) ?>
                                            </p></td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= SALES ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold d-none">
                                                <form action="<?= SALES ?>/destroy" method="post">
                                                    <input type="hidden" name="id_sale" value="<?= $values['id'] ?>">
                                                    <button onclick="return confirm('Bạn muốn xóa khuyến mãi <?= $values['sale_code'] ?> ?')" class="btn btn-danger m-0">Xóa</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <h3 class="mb-0 text-center">Chưa có khuyến mại</h3>
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