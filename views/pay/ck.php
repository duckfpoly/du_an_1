<?php $host = 'http://localhost/courses/' ?>
<link rel="stylesheet" href="<?= $host ?>assets/admin/css/argon-dashboard.css"/>
<link rel="stylesheet" href="<?= $host ?>css/alert_pay.css">
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
                            <td>111</td>
                            <td>1 VNĐ</td>
                            <td>2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="pay_now">
                <img src="<?= $host ?>/assets/img/qr_pay.png" alt="Image QR Pay" width="300px">
            </div>
            <div id="timer"></div>

            <p class="text-center pt-3">
                Chúc bạn một ngày tốt lành !
            </p>
            <center>
                <div class="mt-5">
                    <a href="<?= $host ?>" class="btn btn-md btn-secondary">Quay về trang chủ </a>
                </div>
            </center>
        </div>
    </div>
</div>

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