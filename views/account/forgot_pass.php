  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Quên mật khẩu!</h1>
            <p class="text-lead text-white">Nhập email và làm theo hướng dẫn để lấy lại mật khẩu</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Nhập địa chỉ email</h5>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="" id="form-1">
                <div class="mb-3 form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Địa chỉ email" >
                    <div class="form-message text-danger mt-1"></div>
                </div>
                  <h5 class="text-danger text-center mb-4"><br><?= isset($check_email) ? $check_email : "" ?></h5>
                  <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Lấy lại mật khẩu</button>
                </div>
                <div class="mb-3 form-group d-flex justify-content-end">
                  <p class="text-sm mt-3 mb-0">Quay lại trang&nbsp;<a href="<?= SIGIN ?>" class="text-dark font-weight-bolder">Đăng nhập</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      Validator({
          form: "#form-1",
          formGroupSelector: ".form-group",
          errorSelector: ".form-message",
          rules: [
            Validator.isRequired("#email", "Vui lòng nhập email"),
            Validator.isEmail('#email'),
          ],
      });
    });
  </script>
