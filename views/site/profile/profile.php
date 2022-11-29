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
                <p class='fw-bold fs-4 mt-2'><?= $data_user['name_student']?></p>
                <p class='fst-italic'>Code ko bug xoa group</p>
            </div>
        </div>
        <form action='' method='post' id='form_profile' enctype='multipart/form-data'>
            <div class='row'>
                <div class="mb-3 col form-group">
                    <label for="exampleInputEmail1" class="form-label">Tên khách hàng</label>
                    <input type="text" name='name' id='name' value='<?= $data_user['name_student']?>' class="form-control text-dark" id="exampleInputEmail1">
                    <small class="form-message text-danger mt-1 fst-italic"></small>
                </div>
                <div class="mb-3 col form-group">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name ='email' value='<?= $data_user['email_student']?>' class="form-control text-dark" disabled placeholder="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>  
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Avatar</label>
                <input type="file" name ='avatar'  class="form-control text-dark" id="exampleInputEmail1">
            </div>

            <button type="submit" name='btn_submit' class="btn btn-primary">Lưu</button>
        </form>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      Validator({
          form: "#form_profile",
          formGroupSelector: ".form-group",
          errorSelector: ".form-message",
          rules: [
            Validator.isRequired("#name", "Vui lòng nhập họ tên"),
          ],
      });
    });
  </script>