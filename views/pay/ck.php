<section class="mb-5">
    <div class="container">
        <div class="row">
            <div>
                <div class="f-modal-alert">
                    <div class="f-modal-icon f-modal-success animate">
                        <span class="f-modal-line f-modal-tip animateSuccessTip"></span>
                        <span class="f-modal-line f-modal-long animateSuccessLong"></span>
                        <div class="f-modal-placeholder"></div>
                        <div class="f-modal-fix"></div>
                    </div>
                </div>
                <h2 class="text-center  mb-5">
                    <span class='text-success'>Cảm ơn bạn đã đăng ký khóa học</span>
                </h2>
<!--                <div id="timer"></div>-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Mã hóa đơn #<?= $order_code ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <td>Thông tin lớp và khóa học đăng ký</td>
                                <td>Giảng viên</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <img src="<?= BASE_URL ?>assets/uploads/courses/<?= $class['image_course'] ?>" alt="" width="35" class="img-fluid">
                                        </div>
                                        <div class="flex-lg-grow-1 ms-3">
                                            <h6 class="small mb-0"><a href="#" class="text-reset"><?= $class['name_class'] ?></a></h6>
                                            <span class="small">Khóa học: <?= $class['name_course'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $class['name_teacher'] ?></td>
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
                                    <?= $order_pay == 1 ? 'Chuyển khoản ngân hàng' : '' ?>
                                    <div class="mt-3"></div>
                                    Tổng tiền: <?= number_format($price_total, 0, '', ',') ?> VNĐ
                                    <div class="mt-3"></div>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Học viên đăng ký</h3>
                                Họ tên: <strong><?= $student['name_student']?></strong>
                                <div class="mt-3"></div>
                                Email: <a href="mailto:<?= $student['email_student'] ?>"><?= $student['email_student'] ?></a>
                                <div class="mt-3"></div>
                                Số điện thoại: <a href="tel:<?= $student['phone_student'] ?>"><?= $student['phone_student'] ?></a>
                                <div class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Thanh toán</h3>
                                <p>
                                    <ul>
                                    <li>Số tài khoản: 0823565831</li>
                                    <li>Ngân hàng MBBank: 0823565831</li>
                                    <li>Chủ tài khoản: TRUNG TAM DAY HOC LAP TRINH HDO</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Ghi chú</h3>
                                Học viên có thể chuyển qua số tài khoản hoặc có thể quét mã QR
                                <div class="mt-3"></div>
                                Sau khi thanh toán thành công học viên sẽ được thêm vào lớp đã đăng ký
                                <div class="mt-3"></div>
                                Học viên vui lòng đóng học phí trong vòng 24h. Nếu không hóa đơn sẽ tự động hủy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body" id="image_order">
                        <h3 class="h6">QR Thanh toán</h3>
                        <img src="<?= BASE_URL ?>/assets/img/qr_pay.png" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center pt-3">
        Chúc bạn một ngày tốt lành !
    </p>
    <center>
        <div class="mt-5">
            <a href="<?= BASE_URL ?>" class="btn btn-md btn-secondary">Quay về trang chủ </a>
        </div>
    </center>
</section>
<script>
    startTime()
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('timer').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(function() {
            startTime();
        }, 1000);
    }
</script>
