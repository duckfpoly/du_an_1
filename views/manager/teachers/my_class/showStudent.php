<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Danh sách học viên</h5>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <section class="container-fluid py-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <div class="card-header pb-0">
                                            <div class="text-center">
                                                <h3>Danh sách học viên thuộc lớp học <?= $update_class['name_class'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="p-3">
                                                <?php for ($x = 0 ; $x <= 1 ; $x++): ?>
                                                    <div style="margin-bottom: 100px">
                                                        <div>
                                                            <p>
                                                                Thứ <?= $x == 0 ? '2 - 4 - 6' : '3 - 5 - 7' ?>
                                                            </p>
                                                        </div>
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="home-tab-<?= $x ?>" data-bs-toggle="tab" data-bs-target="#home-<?= $x ?>" type="button" role="tab" aria-controls="home-<?= $x ?>" aria-selected="true">Ca 1</button>
                                                            </li>
                                                            <?php for ($i = 2; $i <= 6; $i++): ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="item-<?= $i ?>-tab" data-bs-toggle="tab" data-bs-target="#item-<?= $i ?>-tab-<?= $x ?>" type="button" role="tab" aria-controls="item-<?= $i ?>-tab-<?= $x ?>" aria-selected="false">Ca <?= $i ?></button>
                                                                </li>
                                                            <?php endfor; ?>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active"  id="home-<?= $x ?>" role="tabpanel" aria-labelledby="home-tab-<?= $x ?>">
                                                                <table class="table text-center mt-3">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Image</th>
                                                                        <th>Name</th>
                                                                        <th>Phone</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php if(!empty(read_std($id,$x,1))){ ?>
                                                                        <?php foreach (read_std($id,$x,1) as $key => $values){?>
                                                                            <tr class="item_students">
                                                                                <td>
                                                                                    <?= $key+= 1 ?>
                                                                                </td>
                                                                                <td>
                                                                                    <img src="<?= $host.'assets/uploads/students/'.$values['image_student'] ?>" alt="Country flag" width="50px" height="50px">
                                                                                </td>
                                                                                <td>
                                                                                    <?= $values['name_student'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?= $values['phone_student'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <form action="<?= CLASSES ?>/deleteStudent" method="post">
                                                                                        <input type="hidden" name="id_student" value="<?= $values['id'] ?>">
                                                                                        <input type="hidden" name="id_class"   value="<?= $_GET['id'] ?>">
                                                                                        <button class="btn btn-danger" type="submit">Xóa</button>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } } else { ?>
                                                                        <tr>
                                                                            <td colspan="5">Chưa có học viên</td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php for ($i = 2; $i <= 6; $i++): ?>
                                                                <div class="tab-pane fade" id="item-<?= $i ?>-tab-<?= $x ?>" role="tabpanel" aria-labelledby="item-<?= $i ?>-tab-<?= $x ?>">
                                                                    <table class="table text-center mt-3">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Image</th>
                                                                            <th>Name</th>
                                                                            <th>Phone</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php if(!empty(read_std($id,$x,$i))){ ?>
                                                                            <?php foreach (read_std($id,$x,$i) as $key => $values){?>
                                                                                <tr class="item_students">
                                                                                    <td>
                                                                                        <?= $key+= 1 ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <img src="<?= $host.'assets/uploads/students/'.$values['image_student'] ?>" alt="Country flag" width="50px" height="50px">
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $values['name_student'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $values['phone_student'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <form action="<?= CLASSES ?>/deleteStudent" method="post">
                                                                                            <input type="hidden" name="id_student" value="<?= $values['id'] ?>">
                                                                                            <input type="hidden" name="id_class"   value="<?= $_GET['id'] ?>">
                                                                                            <button class="btn btn-danger" type="submit">Xóa</button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } } else { ?>
                                                                            <tr>
                                                                                <td colspan="5">Chưa có học viên</td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php endfor; ?>
                                                        </div>
                                                    </div>
                                                <?php endfor; ?>
                                                <div class="mt-5">
                                                    <a href="<?= CLASS_TEACHER ?>" class="btn btn-secondary">Quay lại</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
