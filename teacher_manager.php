<?php
    include 'global.php';
    checkSessionTeacher();
    $id_teacher = getSession('user')['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= BASE_URL ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/favicon.png">
    <title><?php title_tab('view', 'dashboard'); ?> </title>
    <link href="<?= BASE_URL ?>manager/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>manager/assets/css/black-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
</head>
<body class="">
    <div class="wrapper">
        <?php include 'manager/teachers/layout/sidebar.php' ?>
        <div class="main-panel">
            <?php
                include 'manager/teachers/layout/navbar.php';
                include 'routes/route_manager.php';
            ?>
        </div>
    </div>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/validate.js">                       </script>
    <script src="<?= BASE_URL ?>manager/assets/js/core/jquery.min.js">                      </script>
    <script src="<?= BASE_URL ?>manager/assets/js/core/popper.min.js">                      </script>
    <script src="<?= BASE_URL ?>manager/assets/js/core/bootstrap.min.js">                   </script>
    <script src="<?= BASE_URL ?>manager/assets/js/plugins/perfect-scrollbar.jquery.min.js"> </script>
    <script src="<?= BASE_URL ?>manager/assets/js/black-dashboard.min.js?v=1.0.0">          </script>
</body>
</html>