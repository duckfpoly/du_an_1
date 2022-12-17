<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Chi tiết hóa đơn </h6>
                        <div class="d-flex justify-content-between align-items-center d-none">
                            <form action="<?= ORDERS ?>/destroy" method="post">
                                <input type="hidden" name="id_order" value="<?= $_GET['id'] ?>">
                                <button onclick="return confirm('Bạn muốn xóa hóa đơn ' + <?= $detail['order_code'] ?> + '?') " class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="p-3">
                        <div class="container-fluid">
                            <div class="container">
                                <!-- Title -->
                                <div class="d-flex justify-content-between align-items-center py-3">
                                    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Mã đơn hàng #<?= $detail['order_code'] ?></h2>
                                </div>
                                <!-- Main content -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Details -->
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="mb-3 d-flex justify-content-between d-none">
                                                    <div>
                                                        <span class="me-3"><?= format_datetime('datetime',$detail['order_date'])  ?></span>
                                                        <span class="me-3">#<?= $detail['order_code'] ?></span>
                                                        <?= $detail['status'] == 0 ? '<span class="badge rounded-pill bg-secondary">Chưa thanh toán</span>' : '' ?>
                                                        <?= $detail['status'] == 1 ? '<span class="badge rounded-pill bg-danger">Thanh toán thất bại</span>' : '' ?>
                                                        <?= $detail['status'] == 2 ? '<span class="badge rounded-pill bg-success">Đã thanh toán</span>' : '' ?>
                                                    </div>
                                                </div>
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Tên lớp</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center mb-2">
                                                                <div class="flex-shrink-0">
                                                                    <img src="<?= BASE_URL ?>assets/uploads/courses/<?= $course['image_course'] ?>" alt="" width="35" class="img-fluid">
                                                                </div>
                                                                <div class="flex-lg-grow-1 ms-3">
                                                                    <h6 class="small mb-0"><a href="#" class="text-reset"><?= $detail['name_class'] ?></a></h6>
                                                                    <span class="small">Khóa học: <?= $course['name_course'] ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?= $detail['name_class'] ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Payment -->
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h3 class="h6">Phương thức thanh toán</h3>
                                                        <p>
                                                            <?= $detail['order_pay'] == 0 ? 'Thanh toán tại trung tâm' : '' ?>
                                                            <?= $detail['order_pay'] == 1 ? 'Thanh toán chuyển khoản VietQR' : '' ?>
                                                            <?= $detail['order_pay'] == 2 ? 'Thanh toán qua VNPAY' : '' ?>
                                                            <div class="mt-3"></div>
                                                            Tổng tiền: <?= number_format($detail['amount'], 0, '', ',') ?> VNĐ
                                                            <div class="mt-3"></div>
                                                            <?= $detail['status'] == 0 ? '<span class="badge rounded-pill bg-secondary">Chưa thanh toán</span>' : '' ?>
                                                            <?= $detail['status'] == 1 ? '<span class="badge rounded-pill bg-danger">Thanh toán thất bại</span>' : '' ?>
                                                            <?= $detail['status'] == 2 ? '<span class="badge rounded-pill bg-success">Đã thanh toán</span>' : '' ?>
<!--                                                            <span class="badge bg-success rounded-pill mt-2">PAID</span>-->
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h3 class="h6">Học viên đăng ký</h3>
                                                            Họ tên: <strong><?= $detail['name_student'] ?></strong>
                                                            <div class="mt-3"></div>
                                                            Email: <a href="mailto:<?= $detail['email_student'] ?>"><?= $detail['email_student'] ?></a>
                                                            <div class="mt-3"></div>
                                                            Số điện thoại: <a href="tel:<?= $detail['phone_student'] ?>"><?= $detail['phone_student'] ?></a>
                                                            <div class="mt-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <div class="card mb-4">
                                            <div class="card-body" id="image_order">
                                                <h3 class="h6">Ảnh hóa đơn</h3>
                                                <img src="<?= BASE_URL ?>assets/uploads/courses/course_4.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="<?= ORDERS ?>" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<style>
    #image_order {
        min-height: 410px;
    }
    #image_order img{
        width: 100%;
        height: 500px;
        border-radius: 10px;
    }
    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 1rem;
    }
    .text-reset {
        --bs-text-opacity: 1;
        color: inherit!important;
    }
    a {
        color: #5465ff;
        text-decoration: none;
    }
</style>

