<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?= DASHBOARD_TEACHER ?>" class="simple-text logo-mini">
                CT
            </a>
            <a href="<?= DASHBOARD_TEACHER ?>" class="simple-text logo-normal">
                <?= getSession('user')['name_teacher'] ?>
            </a>
        </div>
        <ul class="nav">
            <li id="dashboard">
                <a href="<?= DASHBOARD_TEACHER ?>">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li id="my_class">
                <a href="<?= CLASS_TEACHER ?>">
                    <i class="tim-icons icon-atom"></i>
                    <p>Quản lý lớp</p>
                </a>
            </li>
            <li id="my_class_archive">
                <a href="<?= CLASSARCHIVE_TEACHER ?>">
                    <i class="tim-icons icon-atom"></i>
                    <p>Lớp học đã lưu trữ</p>
                </a>
            </li>
<!--            <li id="teaching_schedule">-->
<!--                <a href="--><?//= TEACHING_PROFILE ?><!--">-->
<!--                    <i class="tim-icons icon-atom"></i>-->
<!--                    <p>Lịch dạy</p>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="#">-->
<!--                    <i class="tim-icons icon-atom"></i>-->
<!--                    <p>Điểm danh</p>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="#">-->
<!--                    <i class="tim-icons icon-atom"></i>-->
<!--                    <p>Nhập điểm</p>-->
<!--                </a>-->
<!--            </li>-->
    </div>
</div>
