<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
<!-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps " id="sidenav-main"> -->
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= DASHBOARD ?>" >
            <img src="<?= BASE_URL ?>/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">DDH Manager</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="dashboard" href="<?= DASHBOARD ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Trang chủ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="categories" href="<?= CATEGORIES ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Danh mục khóa học</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="courses" href="<?= COURSES ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Khóa học</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="teachers" href="<?= TEACHERS ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Giảng viên</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="students" href="<?= STUDENTS ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Học viên</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="classes" href="<?= CLASSES ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lớp</span>
                </a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" id="bills" href="--><?//= BILLS ?><!--">-->
<!--                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">-->
<!--                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>-->
<!--                    </div>-->
<!--                    <span class="nav-link-text ms-1">Hóa đơn</span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="nav-item">
                <a class="nav-link" id="orders" href="<?= ORDERS ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Hóa đơn</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="rates"  href="<?= RATES ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Đánh giá</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sales"  href="<?= SALES ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Khuyến mãi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="statistical"  href="<?= STATISTICAL ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Thống kê</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
