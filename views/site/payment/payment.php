<?php if(!isset($_SESSION['user'])){
    location(BASE_URL.'account/sign_in');
} ?>
<style>
    #name,#email,#phone {
        padding: 10px;
        font-size: 20px;
    }
    .item {
        font-size: 20px;
        margin: 10px 0px 10px 0px;
    }
</style>
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>THANH TOÁN</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-5">
    <form method="post" action='pay' id="forms_payment" >
        <input type="hidden" name="id_student"      value="<?= getSession('user')['id'] ?>" >
        <input type="hidden" name="id_class"        value="<?= $class['id']?>" >
        <input type="hidden" name="order_code"      value="<?= $order_code ?>" >
        <div class="d-flex flex-wrap justify-content-between align-items-start" id="main_content">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <h3>Thông tin người đăng ký</h3>
                <div class="col-md-12 form-group mb-4 mt-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['name_student'] : ''?>" />
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                </div>
                <div class="col-md-12 form-group mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  value="<?= isset($_SESSION['user']) ? $_SESSION['user']['email_student'] : ''?>"/>
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                </div>
                <div class="col-md-12 form-group mb-4">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone"  value="<?= isset($_SESSION['user']) ? $_SESSION['user']['phone_student'] : ''?>"/>
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                    <input type="text" hidden name='date_time' value='<?php echo date('d-m-y h:i:s')?>'>
                    <input type="text" hidden value ='<?= $id?>' name='id_course'>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div>
                    <div class="mb-3">
                        <h3>Thanh toán</h3>
                    </div>
<!--                    <input type="radio" name="pay_option" value="0" id="offline">-->
<!--                    <label class="item" for="offline">-->
<!--                        <div class="title d-flex justify-content-between align-items-center">-->
<!--                            Thanh toán tại trung tâm-->
<!--                            <img src="https://bizweb.dktcdn.net/100/329/122/files/02icon-cod.png?v=1639559673947" alt="">-->
<!--                        </div>-->
<!--                    </label>-->
                    <input  type="radio" name="pay_option" value="1" id="vietqr">
                    <label class="item" for="vietqr">
                        <div class="title d-flex justify-content-between align-items-center">
                            Chuyển khoản qua ngân hàng (VietQR)
                            <img src="https://bizweb.dktcdn.net/100/329/122/files/01icon-vietqr.png?v=1639481626593" alt="">
                        </div>
                        <div class="content">
                            VietQR là nhận diện thương hiệu chung cho các dịch vụ thanh toán, chuyển khoản bằng mã QR được xử lý qua mạng lưới Napas do Ngân hàng Nhà nước Việt Nam ban hành.
                            <br>
                            <br>
                            Quý khách sẽ nhận email thông báo khi thanh toán.
                        </div>
                    </label>
                    <input  type="radio" name="pay_option" value="2" id="vnpay">
                    <label class="item" for="vnpay">
                        <div class="title d-flex justify-content-between align-items-center">
                            Thanh toán VNPAY
                            <img src="https://bizweb.dktcdn.net/assets/themes_support/payment_icon_vnpay.png" alt="">
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="order_box">
                    <h2>Thông tin đơn hàng - <?= $order_code ?></h2>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Khóa học</th>
                                <td>Lớp</td>
                                <td>Giảng viên</td>
                                <td>Ngày học</td>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a class="text-dark" href="#">
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                            <?= $class['name_course']?>
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <?= $class['name_class']?>
                                </td>
                                <td>
                                    <?= $class['name_teacher']?>
                                </td>
                                <td>
                                    <?= $class['time_learn']== 0 ? '2 - 4 - 6' : '3 - 5 - 7' ?>
                                </td>
                                <td>
                                    <input
                                            type="text"
                                            readonly
                                            class="form-controll"
                                            id="price_course"
                                            data-price="<?= total_no_fomat($class['price_course'],$class['discount']) ?>"
                                            value="<?= total($class['price_course'],$class['discount'])?>"
                                            style="background: none; border: none">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cupon_areaa d-flex mb-3">
                        <form>
                            <input type="text" class="form-control w-50" placeholder="Nhập mã giảm giá ..." id="input_coupon"/>
                            <button type="button" class="btn btn-outline-secondary" id="apply_id_coupon" style="margin-left: 20px;">Áp dụng</button>
                        </form>
                    </div>
                    <div id="show_message"></div>
                    <ul class="list list_2">
                        <li>
                            <a href="#" class="fw-bold">Tổng tiền thanh toán
                                <input type="hidden" id="price_total" name="price_total" value="<?= total_no_fomat($class['price_course'],$class['discount']) ?>" >
                                <span>
                                    <span id="total_order">
                                        <?= total($class['price_course'],$class['discount'])?>
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mt-4 text-center">
                        <button onclick="ValidateForm(this.form)" name="redirect" id="redirect" class="btn_1" type="button">Đăng ký</button>
                    </div>
                    <div>
                        <a href="#"><i class="fa-solid fa-arrow-left"></i>Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<script src="<?= BASE_URL ?>assets/js/checkout/checkout.js"></script>
<script LANGUAGE="JavaScript">
    function ValidateForm(form){
        // if ( ( form.pay_option[0].checked == false ) && ( form.pay_option[1].checked == false ) && ( form.pay_option[2].checked == false ) ) {
        if ( ( form.pay_option[0].checked == false ) && ( form.pay_option[1].checked == false ) ) {
            showSuccessToast('Warning','Vui lòng chọn hình thức thanh toán','warning')
            return false;
        }else {
            form.submit()
        }
    }
</script>
