<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Thống kê</h6>
                        <div >
                            <form action="<?= STATISTICAL ?>" class="d-flex align-items-center justify-content-center">
                                <span>Từ:</span>&nbsp;<input type="date" class="form-control" name="date_start" required value="<?= isset($_GET['date_start']) ? $_GET['date_start'] : "" ?>">
                                <div>&emsp;</div>
                                <span>Đến:</span>&nbsp;<input type="date" class="form-control" name="date_end" required value="<?= isset($_GET['date_end']) ? $_GET['date_end'] : "" ?>">
                                <div>&emsp;</div>
                                <?php
                                if(isset($_GET['date_start']) && isset($_GET['date_end']) ){
                                    echo '&emsp;<a class="btn btn-outline-primary" href="'.STATISTICAL.'">X</a>';
                                }else {
                                    echo '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="p-3">
                        <div class="mb-5" id="doanh_thu">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6>Doanh thu</h6>
                                    <form action="<?= STATISTICAL ?>">
                                        <select onchange="this.form.submit()" class="form-control" name="filter_pay">
                                            <option value="" <?= isset($_GET['filter_pay']) ? "" : "filter_pay" ?> selected>Lọc</option>
                                            <?php $status = isset($_GET['filter_pay']) ? $_GET['filter_pay'] : "" ?>
                                            <option value="0" <?= $status == 0 ? 'selected' : "" ?>>Tháng này</option>
                                            <option value="1" <?= $status == 1 ? 'selected' : "" ?>>Tháng trước</option>
                                            <option value="2" <?= $status == 2 ? 'selected' : "" ?>>Năm trước</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng tiền đăng ký</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($turn_over, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Thực nhận</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($actually_received, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Chưa thanh toán</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($unpaids, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Thanh toán lỗi</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($des_pay, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5" id="student">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6>Học viên</h6>
                                <form action="<?= STATISTICAL ?>">
                                    <select onchange="this.form.submit()" class="form-control" name="filter_std">
                                        <option value="" <?= isset($_GET['filter_std']) ? "" : "filter_std" ?> selected>Lọc</option>
                                        <?php $status = isset($_GET['filter_std']) ? $_GET['filter_std'] : "" ?>
                                        <option value="0" <?= $status == 0 ? 'selected' : "" ?>>Tháng này</option>
                                        <option value="1" <?= $status == 1 ? 'selected' : "" ?>>Tháng trước</option>
                                        <option value="2" <?= $status == 2 ? 'selected' : "" ?>>Năm trước</option>
                                    </select>
                                </form>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng tài khoản đã tạo</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?=  $total_std  ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Đăng ký học</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $join_class ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Chờ xác nhận</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $wait_join ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Đăng ký bị hủy</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $no_join ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    h5 {
        margin-top: 5px;
    }
</style>
