  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Chúc mừng bạn</h1>
            <p class="text-lead text-white">Bây giờ hãy nhập mật khẩu mới và đăng nhập thôi nào</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Nhập mật khẩu mới</h5>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="" id="form-1">
                <div class="mb-3 form-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu mới">
                    <div class="form-message text-danger mt-1"></div>
                </div>
                <div class="mb-3 form-group">
                  <input type="password" class="form-control" id="confirm_password" placeholder="Nhập lại mật khẩu mới">
                    <div class="form-message text-danger mt-1"></div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Đặt lại mật khẩu</button>
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
            Validator.isRequired("#password", "Vui lòng nhập password"),
            Validator.isRequired("#confirm_password", "Vui lòng nhập password"),
            Validator.minLength('#password', 8),
            Validator.minLength('#confirm_password', 8),
            Validator.isConfirmed('#confirm_password', function() {
                  return document.querySelector('#password').value;
              }, 'Mật khẩu nhập lại không chính xác')
          ],
      });
    });
  </script>
