<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Danh sách danh mục</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-success m-0" href="<?= CATEGORIES ?>/create">Thêm</a>
                            &emsp;|&emsp;
                            <form action="<?= CATEGORIES ?>" class="d-flex justify-content-center align-items-center">
                                <input type="search" name="s" class="form-control" placeholder="Tìm kiếm">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center " id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($read_category)){ ?>
                                    <?php foreach ($read_category as $keys => $values): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $values['id'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0"><?= $values['name_category'] ?></p></td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="<?= CATEGORIES ?>/update/<?= $values['id'] ?>">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <form action="<?= CATEGORIES ?>/destroy/<?= $values['id'] ?>" method="post">
                                                    <button onclick="return confirm('Bạn muốn xóa khóa học <?= $values['name_category'] ?> ?')" class="btn btn-danger m-0">Xóa</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <h3 class="mb-0 text-center">Chưa có danh mục</h3>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        var table = $("#example").DataTable({
            language: {
                paginate: {
                    previous: '<span class="prev-icon"><</span>',
                    next: '<span class="next-icon">></span>',
                },
                lengthMenu: "Hiển thị _MENU_ mục",
                zeroRecords: "Nothing found - sorry",
                info: "Đang xem _PAGE_ trên _PAGES_ mục",
                infoEmpty: "Không có dữ liệu",
                infoFiltered: "(lọc trong _MAX_ dữ liệu)",
                search: "Tìm kiếm _INPUT_",
            },
            searching: false,
            paging: true,
            info: true,
            responsive: true,
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });
</script>
<style>
    .dt-buttons {
        float: right !important;
        margin-bottom: 30px !important;
    }
    .dt-button {
        background: none !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 6px rgb(50 50 93 / 10%), 0 1px 3px rgb(0 0 0 / 8%);
        transition: 0.3s all ease-in-out;
        background: transparent !important;
        border: none !important;

    }
    .dt-button:hover {
        border: none !important;
        transform: translateY(-1.5px);
    }
</style>