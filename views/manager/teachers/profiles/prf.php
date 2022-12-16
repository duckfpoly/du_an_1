<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Thông tin cá nhân</h5>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="container">
                            <div class="main-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="<?= BASE_URL?>assets/uploads/teachers/<?= $teacher_detail['image_teacher'] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110px" height="110px">
                                                    <div class="mt-3">
                                                        <h4 id="name_teacherr"><?= $teacher_detail['name_teacher'] ?></h4>
                                                        <p class="text-secondary mb-1"><?= $teacher_detail['scope_teacher'] ?> Developer</p>
<!--                                                        <p class="text-muted font-size-sm">--><?//= $teacher_detail['id'] ?><!--</p>-->
<!--                                                        <button class="btn btn-primary">Follow</button>-->
<!--                                                        <button class="btn btn-outline-primary">Message</button>-->
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                                <style>
                                                    .list-group li {
                                                        background:  transparent !important;
                                                    }
                                                </style>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                            </svg> Github
                                                        </h6>
                                                        <span class="text-secondary"> aloalo</span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                            </svg> Facebook
                                                        </h6>
                                                        <span class="text-secondary"> aloalo</span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                            </svg> Instagram
                                                        </h6>
                                                        <span class="text-secondary"> aloalo</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Cập nhật ảnh đại diện</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <form enctype="multipart/form-data">
                                                        <input type="file" name="" id="" class="form-control">
                                                        <button type="button" class="btn">Lưu</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Cập nhật thông tin</h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="form-1">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Họ và tên</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" id="name_teacher" value="<?= $teacher_detail['name_teacher'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" id="email_teacher" value="<?= $teacher_detail['email_teacher'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Số điện thoại</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" id="phone_teacher" value="<?= $teacher_detail['phone_teacher'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="button" class="btn btn-primary px-4" value="Lưu" onclick="save_profiles()">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Cập nhật mật khẩu</h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="form-2">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Mật khẩu cũ</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="password" class="form-control" id="old_password">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Mật khẩu mới</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="password" class="form-control" id="password_new">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Nhập lại mật khẩu mới</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="password" class="form-control" id="confirm_password_new">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="button" class="btn btn-primary px-4" value="Cập nhật" onclick="save_new_password()">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row d-none">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                                        <p>Web Design</p>
                                                        <div class="progress mb-3" style="height: 5px">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <p>Website Markup</p>
                                                        <div class="progress mb-3" style="height: 5px">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <p>One Page</p>
                                                        <div class="progress mb-3" style="height: 5px">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <p>Mobile Template</p>
                                                        <div class="progress mb-3" style="height: 5px">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <p>Backend API</p>
                                                        <div class="progress" style="height: 5px">
                                                            <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function save_profiles(){
        var name    = document.getElementById('name_teacher').value
        var email   = document.getElementById('email_teacher').value
        var phone    = document.getElementById('phone_teacher').value
        if(name == '' && email == '' && phone == ''){
            showSuccessToast('Cảnh báo','Vui lòng nhập đầy đủ thông tin !','warning')
        }else {
            var dataString = 'name_teacher='+name+'&email_teacher='+email+'&phone_teacher='+phone
            $.ajax({
                type: "POST",
                url: '<?= TEACHER_PROFILE ?>/update_profile',
                data: dataString,
                success: function () {
                    showSuccessToast('Success', 'Cập nhật thành công !', 'success')
                    document.getElementById('name_teacherr').innerText = name;
                }
            });
        }
    }
    function save_new_password(){
        var old_password            = document.getElementById('old_password').value
        var password_new            = document.getElementById('password_new').value
        var confirm_password_new    = document.getElementById('confirm_password_new').value
        if(old_password.length < 1){
            showSuccessToast('Cảnh báo','Input mật khẩu cũ chưa đủ 8 ký tự !','error')
        }
        else if(password_new.length < 2) {
            showSuccessToast('Cảnh báo','Input mật khẩu mới chưa đủ 8 ký tự !','error')
        }
        else if(confirm_password_new.length < 2) {
            showSuccessToast('Cảnh báo','Input nhập lại mật khẩu mới chưa đủ 8 ký tự !','error')
        }
        else {
            axios
                .get("<?= BASE_URL ?>api/teachers", {
                    headers: {
                        Authorization: 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTmd1eWVuIER1YyIsInBob25lIjoiMDgyMzU2NTgzMSIsImVtYWlsIjoibmd1eWVuZHVjMTA2MDNAZ21haWwuY29tIiwiYWRtaW4iOnRydWUsImV4cCI6MTY2OTgwNTQ4Nn0.PByr6NO_lYgDSnT-KkW0bLBgsNzfIySHO_IofdxiHsw'
                    },
                    params: {
                        id: <?= getSession('user')['id'] ?>
                    }
                })
                .then((res) => {
                    var pass_teacher = <?= getSession('user')['password_teacher'] ?>;
                    var old_pass = res.data.password_teacher
                    if(old_password != <?= getSession('user')['password_teacher'] ?>) {
                        showSuccessToast('Cảnh báo','Mật khẩu cũ không đúng !','error')
                    }
                    else if(password_new != confirm_password_new){
                        showSuccessToast('Cảnh báo','Mật khẩu mới và nhập lại mật khẩu mới không khớp !','error')
                    }
                    else {
                        var dataString = 'password_teacher=' + password_new
                        $.ajax({
                            type: "POST",
                            url: '<?= TEACHER_PROFILE ?>/update_password',
                            data: dataString,
                            success: function () {
                                old_password.value = ''
                                password_new.value = ''
                                confirm_password_new.value = ''
                                showSuccessToast('Success','Cập nhật mật khẩu thành công !','success')
                            }
                        });
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }
</script>


