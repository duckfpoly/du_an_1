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
                    <label for="password" class="form-label">Tên khách hàng</label>
                    <input type="text" name='password' disabled id='password' value='<?= $data_user['password_student']?>' class="form-control text-dark">
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                </div>
                <div class="mb-3 col form-group">
                    <label for="new_pass" class="form-label">Mật khẩu mới</label>
                    <input type="text" name ='new_pass' id ='new_pass' value='' class="form-control text-dark" >
                </div>
            </div>

            <div class="mb-3 form-group ">
                <label for="comfirm_pass" class="form-label">Xác nhận mật khẩu</label>
                <input type="text" name ='comfirm_pass' id ='comfirm_pass'  class="form-control text-dark">
            </div>
 
            <input type="text" hidden name="updated_at" id="updated_at" value='<?= date('d-m-y h:i:s')?>'>
            <input type="submit" onclick='update_pass()' name='btn_update'  value="Lưu" class="btn btn-primary">
        </form>
    </div>
</main>

<script>
    var url = location.href;
    function update_pass(){
        let password = document.querySelector('#password').value;
        let new_pass = document.querySelector('#new_pass').value;
        let comfirm_pass = document.querySelector('#comfirm_pass').value;
        let update = 'btn_update';
        let data_profile;
        if(!name_user){
            showSuccessToast('Cảnh báo', 'Vui lòng điền đủ thông tin', 'warning')
        }else{
            if(arr.length){
                //data_profile = `btn_update=${update}&name_student=${name_user}&image_student=${arr[0].name}`;
                data_profile = {
                    btn_update : update,
                    name_student : name_user,
                    image_student: arr[0].name,
                }

            }else{
                // data_profile = `btn_update=${update}&name_student=${name_user}}`;
                data_profile = {
                    btn_update : update,
                    name_student : name_user,
                }
            }
            $.ajax({
                type: "POST",
                url : url,
                data: data_profile,
                success: function () {
                    showSuccessToast('Success', 'Cập nhật thành công', 'success');
                }
            });
        }
    }

</script>