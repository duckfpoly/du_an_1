<div class="container" style="margin-top:5%;">
    <div class="row">
        <div>
            <div class="f-modal-alert">
                <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo '
                                <div class="f-modal-icon f-modal-success animate">
                                    <span class="f-modal-line f-modal-tip animateSuccessTip"></span>
                                    <span class="f-modal-line f-modal-long animateSuccessLong"></span>
                                    <div class="f-modal-placeholder"></div>
                                    <div class="f-modal-fix"></div>
                                </div>
                            ';
                        }
                        else {
                            echo '
                                <div class="f-modal-icon f-modal-error animate">
                                    <span class="f-modal-x-mark">
                                        <span class="f-modal-line f-modal-left animateXLeft"></span>
                                        <span class="f-modal-line f-modal-right animateXRight"></span>
                                    </span>
                                    <div class="f-modal-placeholder"></div>
                                    <div class="f-modal-fix"></div>
                                </div>
                            ';
                        }
                    } else {
                        echo '
                            <div class="f-modal-icon f-modal-warning scaleWarning">
                                <span class="f-modal-body pulseWarningIns"></span>
                                <span class="f-modal-dot pulseWarningIns"></span>
                            </div>
                        ';
                    }
                ?>
            </div>
            <h2 class="text-center  mb-5">
                <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<span class='text-success'>Thanh toán thành công</span>";
                        } else {
                            echo "<span class='text-danger'>Thanh toán thất bại</span>";
                        }
                    } else {
                        echo "<span class='text-warning'>Giao dịch không hợp lệ</span>";
                    }
                ?>
            </h2>
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Số tiền</th>
                            <th>Ngân hàng</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $order_id ?></td>
                            <td><?= $order_amount / 100?> VNĐ</td>
                            <td><?= $order_bank ?></td>
                            <td><?= $pay_time ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-center pt-3">
                <?php
                if ($secureHash == $vnp_SecureHash) {
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        echo "<span class='text-success'>Chúc mừng bạn đã đăng ký học thành công ! Vui lòng theo dõi email để nhận lịch học nhé.</span>";
                    } else {
                        echo "<span class='text-danger'>Giao dịch thất bại. Vui lòng đăng ký lại !</span>";
                    }
                } else {
                    echo "<span class='text-warning'>Giao dịch không hợp lệ. Vui lòng đăng ký lại !</span>";
                }
                ?>
            </p>
            <p class="text-center pt-3">Chúc bạn một ngày tốt lành !</p>
            <center>
                <div class="mt-5">
                    <a href="<?= BASE_URL ?>" class="btn btn-md btn-secondary">Quay về trang chủ </a>
                </div>
            </center>
        </div>
    </div>
</div>
