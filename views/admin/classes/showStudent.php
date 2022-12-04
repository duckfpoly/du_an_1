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
                        <div style="margin-bottom: 100px">
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
                                <?php if(!empty($studentClass)){ ?>
                                <?php foreach ($studentClass as $key => $values){?>
                                    <tr class="item_students">
                                        <td>
                                            <?= $key+= 1 ?>
                                        </td>
                                        <td>
                                            <img src="<?= BASE_URL.'assets/uploads/students/'.$values['image_student'] ?>" alt="Country flag" width="50px" height="50px">
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
                        <div class="mt-5">
                            <a href="<?= CLASSES ?>" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
