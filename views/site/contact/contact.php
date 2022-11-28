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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Kết nối với chúng tôi</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Liên hệ</a></li>
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
    <!--?  Contact Area start  -->
    <section class="contact-section">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.61594618922!2d105.78995971542355!3d21.048047592494374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab30160f7fd9%3A0x4a1e6e1a119ecb78!2zMTIwIEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1669449119770!5m2!1svi!2s"
                        width="100%"
                        height="500px"
                        style="border:0; border-radius: 10px"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Liên hệ</h2>
                </div>
                <div class="col-lg-8">
                    <form action="https://script.google.com/macros/s/AKfycbxDQsxgJS0rlnvsNmC5EocOOcRcNmbTf2vQ5r3viuf0Iy_5Ppqo/exec" method="get" role="form" id="test-form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group rounded">
                                    <input type="email" name="email" class="form-control p-3" id="email" placeholder="Email">
                                    <span></span>
                                    <small></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control p-3" name="message" rows="5" placeholder="Nội dung ..." id="message"></textarea>
                                    <span></span>
                                    <small></small>
                                </div>
                            </div>
                            <div class="col-md-12 text-center my-3 mb-5">
                                <div class="show-error"></div>
                                <div id="error-message" class="error-message ">Gửi thất bại ❌❌❌</div>
                                <div id="sent-message" class="sent-message ">✔✔✔ Cảm ơn bạn đã gửi. Thank you!</div>
                            </div>
                            <div class="col-md-12 text-center mb-5">
                                <button type="submit" id="submit-form" class="btn btn-outline-secondary p-2 w-25">Gửi</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>120, Hoang Quoc Viet</h3>
                            <p>Cau Giay, Ha Noi</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+84 123 456 789</h3>
                            <p>Mon to Fri 8am to 7pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>courses.app@gmail.com</h3>
                            <p>Gửi cho chúng tôi bất cứ lúc nào!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const name = document.querySelector("#email")
    const message = document.querySelector("#message")
    const btnLogin = document.querySelector("#submit-form")
    const errorMessageDiv = document.querySelector(".show-error")
    function showErrorMessage(message){
        errorMessageDiv.innerHTML = message
    }
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };
    const validate = () => {
        const email = document.querySelector("#email").value
        if (!validateEmail(email)) {
            showErrorMessage("Vui lòng nhập email !")
        }
        return false;
    }
    $('#email').on('input', validate);
    name.onclick = function(e){
        e.preventDefault()
        name.style.border = "";
        showErrorMessage("")
    }
    message.onclick = function(e){
        e.preventDefault()
        message.style.border = "";
        showErrorMessage("")
    }
    btnLogin.onclick = function(e){
        e.preventDefault()
        if(name.value == ""){
            showErrorMessage("Vui lòng nhập email !")
            name.style.border = "1px solid red";
            return false;
        }

        if(message.value ==""){
            showErrorMessage("Vui lòng nhập nội dung cần gửi !")
            message.style.border = "1px solid red";
            return false;
        }
        showErrorMessage("")
        $(document).ready(function () {
            var data = $('form#test-form').serialize();
            $.ajax({
                type: 'GET',
                url: 'https://script.google.com/macros/s/AKfycbxDQsxgJS0rlnvsNmC5EocOOcRcNmbTf2vQ5r3viuf0Iy_5Ppqo/exec',
                dataType: 'json',
                crossDomain: true,
                data: data,
                success: function (data) {
                    if (data == 'false') {
                        document.querySelector('#error-message').style.display = "block";
                    } else {
                        $('#name').val('');
                        $('#message').val('');
                        document.querySelector('#sent-message').style.display = "block";
                    }
                }
            });
            return false;
        });
    }
</script>

<style>
    .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: center;
        padding: 15px;
        font-weight: 600;
        border-radius: 10px;
    }

    .show-error {
        color: #ed3c0d;
        height: 50px;
        line-height: 50px;
    }

    .php-email-form .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        font-weight: 600;
        border-radius: 10px;
    }

</style>