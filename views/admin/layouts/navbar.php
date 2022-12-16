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
            <button onclick="hide_noti()" class="p-0 position-relative text-white" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border: none">
                <span id="count_noti" class="d-none position-absolute top-0 start-0 translate-middle-x text-light bg-danger text-center fw-bold" style="width: 15px; height: 15px; font-size: 8px; border-radius: 50%"></span>
                <i class="fa fa-bell cursor-pointer"></i>
            </button>
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton" id="show_notifications"></ul>
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
    function render_notifications(){
         axios.get("<?= BASE_URL ?>api/notifications")
            .then(function (response) {
                $("#show_notifications").html(response.data.notification);
                if(response.data.unseen_notification > 0 ){
                    $('#count_noti').removeClass('d-none')
                    $('#count_noti').text(response.data.unseen_notification)
                }
            })
            .catch(function (error) {
                console.log('Message: ' + error);
            });
    }
    render_notifications();
    setInterval(function(){
        render_notifications();
    }, 1000);
    function hide_noti(){
        var count_noti = document.querySelector('#count_noti')
        count_noti.classList.add("d-none");
        axios.put("<?= BASE_URL ?>api/notifications")
            .then((res) => {})
            .catch((error) => {console.error(error);});
    }
</script>
