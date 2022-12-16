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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Thông tin của tôi</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Thông tin</a></li>
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
        <div class='d-flex gap-3 mb-4'>
            <img class='avatar-img' src="assets/uploads/students/<?= $data_user['image_student']?>" alt="">
            <div class="name-user">
                <p class='fw-bold fs-4 mt-2 name_user_profile'><?= $data_user['name_student']?></p>
                <p class='fst-italic'>Code ko bug xoa group</p>
            </div>
        </div>
        <form action='<?= PROFILE?>' method='post' enctype='multipart/form-data' onsubmit="return false">
            <div class='row'>
                <div class="mb-3 col form-group">
                    <label for="exampleInputEmail1" class="form-label">Tên khách hàng</label>
                    <input type="text" name='name' id='name' value='<?= $data_user['name_student']?>' class="form-control text-dark form_setup" id="exampleInputEmail1">
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                </div>
                <div class="mb-3 col form-group">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name ='email' value='<?= $data_user['email_student']?>' class="form-control text-dark form_setup" disabled placeholder="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class='row'>
                <div class="mb-3 col form-group">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                    <input type="text" name='phone_number' id='phone_number' value='<?= $data_user['phone_student']?>' class="form-control text-dark form_setup" id="exampleInputEmail1">
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                </div>
                <div class="mb-3 form-group col">
                    <label for="exampleInputEmail1" class="form-label">Avatar</label>
                    <input type="file" name ='avatar' id ='avatar'  class="form-control text-dark form_setup" id="exampleInputEmail1">
                </div>
            </div>    
            <input type="text" hidden name="updated_at" id="updated_at" value='<?= date('d-m-y h:i:s')?>'>

            <input type="submit" onclick='update()' name='btn_update'  value="Lưu" class="btn btn-primary">
        </form>
    </div>
</main>

<script>

var url = location.href;
const phone_number = document.querySelector('#phone_number').value;
let regex = /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/;
function update(){
    let name_user_profile = document.querySelectorAll('.name_user_profile');
    
    console.log()
    let avatar_user = document.querySelector('#avatar').files;
    console.log(avatar_user[0])
    let arr = Array.from(avatar_user);
    let name_user = document.querySelector('#name').value;
    let new_phone = document.querySelector('#phone_number').value;
    let updated_at = document.querySelector('#updated_at').value;
    let update = 'btn_update';
    let phone2 = '0388444506'
    let data_profile;
    if(!name_user){
        showSuccessToast('Cảnh báo', 'Vui lòng điền đủ thông tin', 'warning')
    }else{
        if(new_phone){
            if (!new_phone.match(regex)){
                return showSuccessToast('Cảnh báo', 'Số điện thoại không tồn tại', 'warning')
            }else{
                data_profile = {
                    dataType: 'text',
                    contentType: false,
                    processData: false,
                    btn_update : update,
                    cache: false,
                    updated :updated_at,
                    name_student : name_user,
                    image_student: arr.length ? avatar_user[0] : '',
                    phone : new_phone,
                }

            }

        }else{
            data_profile = {
                dataType: 'text',
                contentType: false,
                processData: false,
                cache: false,
                btn_update : update,
                updated :updated_at,
                name_student : name_user,
                image_student: arr.length ? avatar_user[0] : '',
                phone : phone_number,
            }
        }
        $.ajax({
            type: "POST",
            url : url,
            data: data_profile,
            success: function () {
                showSuccessToast('Success', 'Cập nhật thành công', 'success');
                name_user_profile.forEach((item) =>{
                    console.log(item)
                    item.innerText = name_user

                })
            }
        });
    }
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