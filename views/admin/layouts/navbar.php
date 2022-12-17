<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="<?= DASHBOARD ?>">Trang chủ</a></li>
        <?php 
          if(isset($_GET['module']) == true){
            if(isset($_GET['act']) == true){
              echo ' 
                <li class="breadcrumb-item text-sm text-white active" aria-current="page"><a class="opacity-5 text-white" href="'.ADMIN.$_GET['module'].'">'.ucfirst($_GET['module']).'</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">'.ucfirst($_GET['act']).'</li>
              ';
            }
            else {
              echo '<li class="breadcrumb-item text-sm text-white active" aria-current="page">'.ucfirst($_GET['module']).'</li>';
            }
          }
        ?>
      </ol>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="#" class="nav-link text-white p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
          <a href="#" class="nav-link text-white p-0">
            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
          </a>
        </li>
        <li class="nav-item dropdown pe-2 d-flex align-items-center" id="notifications">
            <button class="p-0 position-relative text-white" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border: none">
                <span id="count_noti" class="d-none position-absolute top-0 start-0 translate-middle-x text-light bg-danger text-center fw-bold" style="width: 15px; height: 15px; font-size: 8px; border-radius: 50%"></span>
                <i class="fa fa-bell cursor-pointer"></i>
            </button>
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" style="min-width: 300px" aria-labelledby="dropdownMenuButton" id="show_notifications">
              <p class="fw-bold">Thông báo mới</p>
              <div id="unseen"></div>
              <hr>
              <p class="fw-bold">Trước đó</p>
              <div id="seen">
                  <li class="mb-2 text-center">
                      <p class="border-radius-md fw-bold" style="font-size: 13px">Không có thông báo !</p>
                  </li>
              </div>
          </ul>
        </li>&emsp;
        <li class="nav-item d-flex align-items-center">
          <a href="<?= SIGNOUT ?>" class="nav-link text-white font-weight-bold px-0">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none">Đăng xuất</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
    var reload_noti = setInterval(getData, 1000);
    getData();
    function getData(callback){
        axios.get("<?= BASE_URL ?>api/notifications")
            .then(function (response) {
                render_notifications(response.data)
            })
            .catch(function (error) {
                console.log('Message: ' + error);
            });
    }
    function render_notifications(data){
        if(data.count_unseen_notification > 0 ){
            $('#count_noti').removeClass('d-none')
            $("#unseen").html(data.unseen_notification);
            $('#count_noti').text(data.count_unseen_notification)
            setTimeout(function () {
                // showNotifications('Đơn đăng ký mới')

            },1000)
        }
        else {
            $("#unseen").html(`
                <li class="mb-2 text-center">
                    <p class="border-radius-md fw-bold" style="font-size: 13px">Chưa có thông báo mới !</p>
                </li>
            `);
            $('#count_noti').addClass('d-none')
        }
        $("#seen").html(data.seen_notification);
    }
    $('#dropdownMenuButton').click(function() {
        $('#count_noti').addClass('d-none')
    });
    // clearInterval(reload_noti);
    function updateStatusNotification(id_noti) {
        const input = {
            'id': Number(id_noti),
        }
        axios.put("<?= BASE_URL ?>api/notifications", input , {
            headers: {
                'content-type': 'application/json',
            },
        })
        .then((res) => {
            showNotifications('Đánh dấu là đã đọc !')
        })
        .catch((error) => {console.error(error);});
    }

</script>
