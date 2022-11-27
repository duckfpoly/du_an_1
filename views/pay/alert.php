<?php $host = 'http://localhost/courses/' ?>
<link rel="stylesheet" href="<?= $host ?>assets/admin/css/argon-dashboard.css"/>
<link rel="stylesheet" href="<?= $host ?>css/alert_pay.css">
<div class="container" style="margin-top:5%;">
    <div class="row">
        <div>
            <div class="f-modal-alert">
                <div class="f-modal-icon f-modal-warning scaleWarning">
                    <span class="f-modal-body pulseWarningIns"></span>
                    <span class="f-modal-dot pulseWarningIns"></span>
                </div>
            </div>
            <h2 class="text-center  mb-5">
                <span class='text-warning'>Lỗi đăng ký</span>
            </h2>
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Khóa học</th>
                            <th>Lớp</th>
                            <th>Ngày học</th>
                            <th>Ca học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Backend</td>
                            <td>Lập trình Java Backend</td>
                            <td>Thứ 2 - 4 - 6</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-center pt-3">
                Lớp đã đủ số lượng học viên của ngày 2 4 6 - ca 5. Bạn vui lòng đăng ký thời gian khác !
            </p>
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
