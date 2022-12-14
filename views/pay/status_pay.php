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
                            echo "<span class='text-success'>Thanh to??n th??nh c??ng</span>";
                        } else {
                            echo "<span class='text-danger'>Thanh to??n th???t b???i</span>";
                        }
                    } else {
                        echo "<span class='text-warning'>Giao d???ch kh??ng h???p l???</span>";
                    }
                ?>
            </h2>
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>M?? ????n h??ng</th>
                            <th>S??? ti???n</th>
                            <th>Ng??n h??ng</th>
                            <th>Th???i gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $order_id ?></td>
                            <td><?= $order_amount / 100?> VN??</td>
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
                        echo "<span class='text-success'>Ch??c m???ng b???n ???? ????ng k?? h???c th??nh c??ng ! Vui l??ng theo d??i email ????? nh???n l???ch h???c nh??.</span>";
                    } else {
                        echo "<span class='text-danger'>Giao d???ch th???t b???i. Vui l??ng ????ng k?? l???i !</span>";
                    }
                } else {
                    echo "<span class='text-warning'>Giao d???ch kh??ng h???p l???. Vui l??ng ????ng k?? l???i !</span>";
                }
                ?>
            </p>
            <p class="text-center pt-3">Ch??c b???n m???t ng??y t???t l??nh !</p>
            <center>
                <div class="mt-5">
                    <a href="<?= BASE_URL ?>" class="btn btn-md btn-secondary">Quay v??? trang ch??? </a>
                </div>
            </center>
        </div>
    </div>
</div>
