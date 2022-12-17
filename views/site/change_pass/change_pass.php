<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Thay đổi mật khẩu</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Đổi mật khẩu</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class='bg-white rounded my-5 p-4 shadow-sm m_top container section-padding40 fix'>
        <form action='<?= PROFILE?>' method='post' enctype='multipart/form-data' onsubmit="return false">
            <div class='row'>
                <div class="mb-3 col form-group">
                    <label for="password" class="form-label">Mật khẩu cũ</label>
                    <input type="password" id='old_pass' class="form-control form_setup text-dark">
                </div>
                <div class="mb-3 col form-group">
                    <label for="new_pass" class="form-label">Mật khẩu mới</label>
                    <input type="password" id ='new_pass' class="form-control form_setup text-dark" >
                </div>
            </div>
            <div class="mb-3 form-group ">
                <label for="comfirm_pass" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" id ='comfirm_pass' class="form-control form_setup text-dark">
            </div>
            <input type="text" hidden name="updated_at" id="updated_at" value='<?= date('d-m-y h:i:s')?>'>
            <input type="submit" onclick='update_pass()' name='btn_update'  value="Lưu" class="btn btn-primary">
        </form>
    </div>
</main>

<script>
    var url = location.href;
    function update_pass(){
        let old_pass     = document.querySelector('#old_pass').value;
        let new_pass     = document.querySelector('#new_pass').value;
        let comfirm_pass = document.querySelector('#comfirm_pass').value;
        let updated_at   = document.querySelector('#updated_at').value;
        if(old_pass.length < 6){
            showSuccessToast('Cảnh báo','Input mật khẩu cũ chưa đủ 8 ký tự !','error')
        }
        else if(new_pass.length < 6) {
            showSuccessToast('Cảnh báo','Input mật khẩu mới chưa đủ 8 ký tự !','error')
        }
        else if(comfirm_pass.length < 6) {
            showSuccessToast('Cảnh báo','Input nhập lại mật khẩu mới chưa đủ 8 ký tự !','error')
        }
        else if(new_pass != comfirm_pass){
            showSuccessToast('Cảnh báo','Mật khẩu mới và nhập lại mật khẩu mới không khớp !','error')
        }
        else {
            updatePasswordStudent(<?= getSession('user')['id'] ?>,old_pass,new_pass);
        }
    }
</script>
<script>
    function updatePasswordStudent(idStudent,oldPass,newPass){
        axios
            .get("api/students", {
                params: {
                    id: idStudent,
                    old_pass: oldPass,
                    new_pass: newPass
                }
            })
            .then((res) => {
                console.log(res.data)
                showSuccessToast('Thông báo',res.data.message,'success')
            })
            .catch((error) => {
                console.error(error);
            });
    }
</script>
<style>
    .colorOldPrice{
        color: rgba(0,0,0,0.3) !important;
    }
    .textPrice{
        font-size:17px !important;
    }

    .avatar_user{
        max-width: 40px;
        object-fit: cover;
    }
    .avatar-img{
        max-width: 100px;
        border-radius: 10px;
        object-fit: cover;
    }
    .form_setup{
        padding: 14px 15px;
        border-radius: 10px;
        font-size:15px;
    }
</style>
