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
          <a href="#" class="nav-link text-white p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="text-danger position-absolute top-0 start-0 translate-middle-x" style="font-size: 5px">(🔴)</span> <i class="fa fa-bell cursor-pointer"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton" id="notifications">

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
    var auth = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTmd1eWVuIER1YyIsInBob25lIjoiMDgyMzU2NTgzMSIsImVtYWlsIjoibmd1eWVuZHVjMTA2MDNAZ21haWwuY29tIiwiYWRtaW4iOnRydWUsImV4cCI6MTY2OTgwNTQ4Nn0.PByr6NO_lYgDSnT-KkW0bLBgsNzfIySHO_IofdxiHsw';
    axios.get("<?= BASE_URL ?>api/notifications", {
        headers: {
            Authorization: 'Bearer ' + auth
        },
    })
        .then((res) => {
            var results = res.data;
            console.log(results);
            results.forEach((items) => {

            })
        })
        .catch((error) => {
            console.error(error);
        });
</script>

<!--<script>-->
<!--    $(document).ready(function () {-->
<!---->
<!--        function load_unseen_notification(view = '') {-->
<!--            $.ajax({-->
<!--                url: "fetch.php",-->
<!--                method: "POST",-->
<!--                data: {view: view},-->
<!--                dataType: "json",-->
<!--                success: function (data) {-->
<!--                    $('.dropdown-menu').html(data.notification);-->
<!--                    if (data.unseen_notification > 0) {-->
<!--                        $('.count').html(data.unseen_notification);-->
<!--                    }-->
<!--                }-->
<!--            });-->
<!--        }-->
<!---->
<!--        load_unseen_notification();-->
<!---->
<!--        $('#comment_form').on('submit', function (event) {-->
<!--            event.preventDefault();-->
<!--            if ($('#subject').val() != '' && $('#comment').val() != '') {-->
<!--                var form_data = $(this).serialize();-->
<!--                $.ajax({-->
<!--                    url: "insert.php",-->
<!--                    method: "POST",-->
<!--                    data: form_data,-->
<!--                    success: function (data) {-->
<!--                        $('#comment_form')[0].reset();-->
<!--                        load_unseen_notification();-->
<!--                    }-->
<!--                });-->
<!--            } else {-->
<!--                alert("Both Fields are Required");-->
<!--            }-->
<!--        });-->
<!---->
<!--        $(document).on('click', '.dropdown-toggle', function () {-->
<!--            $('.count').html('');-->
<!--            load_unseen_notification('yes');-->
<!--        });-->
<!---->
<!--        setInterval(function () {-->
<!--            load_unseen_notification()-->
<!--        }, 1000);-->
<!---->
<!--    });-->
<!--</script>-->