<div class="container" style="margin-top:5%;">
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
                <span class='text-success'>Đăng ký học thành công</span>
            </h2>
            <div>
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Số tiền</th>
                        <th>Thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $order_code ?></td>
                        <td><?= $price_total ?> VNĐ</td>
                        <td><?= $order_date ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-center pt-3">
                Vui lòng đến trung tâm để nộp học phí. Chúc bạn một ngày tốt lành !
            </p>
            <center>
                <div class="mt-5">
                    <a href="<?= BASE_URL ?>" class="btn btn-md btn-secondary">Quay về trang chủ </a>
                </div>
            </center>
        </div>
    </div>
</div>
