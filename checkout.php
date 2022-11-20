<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mains.css">

</head>
<body>
        <section class="breadcrumb_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_iner">
                            <h2>CHECKOUT</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <form method="post" id="forms" >
                <div class="d-flex flex-wrap justify-content-between align-items-start" id="main_content">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h3>Thông tin người đăng ký</h3>
                        <div class="col-md-12 form-group mb-4 mt-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required />
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div>
                            <div class="mb-3">
                                <h3>Thanh toán</h3>
                            </div>
                            <input required type="radio" name="pay_option" value="0" id="offline">
                            <label class="item" for="offline">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Thanh toán tại trung tâm
                                    <img src="https://bizweb.dktcdn.net/100/329/122/files/02icon-cod.png?v=1639559673947" alt="">
                                </div>
                            </label>
                            <input required type="radio" name="pay_option" value="1" id="vnpay">
                            <label class="item" for="vnpay">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Thanh toán VNPAY
                                    <img src="https://bizweb.dktcdn.net/assets/themes_support/payment_icon_vnpay.png" alt="">
                                </div>
                            </label>
                            <input required type="radio" name="pay_option" value="2" id="vietqr">
                            <label class="item" for="vietqr">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Chuyển khoản qua ngân hàng (VietQR)
                                    <img src="https://bizweb.dktcdn.net/100/329/122/files/01icon-vietqr.png?v=1639481626593" alt="">
                                </div>
                                <div class="content">
                                    VietQR là nhận diện thương hiệu chung cho các dịch vụ thanh toán, chuyển khoản bằng mã QR được xử lý qua mạng lưới Napas do Ngân hàng Nhà nước Việt Nam ban hành.
                                    <br>
                                    <br>
                                    Quý khách sẽ nhận SMS và email thông báo khi scan thanh toán thành công.
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="order_box">
                            <h2>Thông tin đơn hàng</h2>
                            <table class="table" id="example">
                                <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Khóa học</th>
                                    <th>Lớp</th>
                                    <th>Giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a class="text-dark" href="#">
                                                <img style="width: 65px; height: 65px;" class="rounded" src="assets/uploads/admin/products/" alt="">
                                            </a>
                                        </td>
                                        <td><a class="text-dark" href="#">
                                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        ReactJs
                                                    </span>
                                            </a></td>
                                        <td class="quantity">1</td>
                                        <td>2,333 VND</td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="list list_2">
                                <li>
                                    <a href="#" class="fw-bold">Tổng tiền thanh toán
                                        <span><span id="total_order">300,000 VNĐ</span></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mt-4 text-center">
                                <button type="submit" name="process_pay" id="process_pay" class="btn_1" value="process_pay">Đăng ký</button>
                            </div>
                            <div>
                                <a href="#"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
</body>
</html>