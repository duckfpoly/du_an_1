document.addEventListener("DOMContentLoaded", function () {
    Validator({
        form: "#forms_payment",
        formGroupSelector: ".form-group",
        errorSelector: ".form-message",
        rules: [
            Validator.isRequired("#name", "Vui lòng nhập tên"),
            Validator.isRequired("#email", "Vui lòng nhập email"),
            Validator.isEmail('#email', "Email không tồn tại"),
            Validator.isRequired("#phone", "Vui lòng nhập số điện thoại"),
            Validator.isPhone("#phone", "Số điện thoại không tồn tại"),
        ],
    });
});
var auth = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTmd1eWVuIER1YyIsInBob25lIjoiMDgyMzU2NTgzMSIsImVtYWlsIjoibmd1eWVuZHVjMTA2MDNAZ21haWwuY29tIiwiYWRtaW4iOnRydWUsImV4cCI6MTY2OTgwNTQ4Nn0.PByr6NO_lYgDSnT-KkW0bLBgsNzfIySHO_IofdxiHsw';
document.getElementById('apply_id_coupon').addEventListener("click", apply_coupon);
document.getElementById('input_coupon').addEventListener("click", remove_div);
function remove_div(){
    document.getElementById('show_message').innerHTML = ''
}
function apply_coupon(){
    if(document.getElementById("input_coupon").value == ''){
        document.getElementById("show_message").innerHTML = `
                <div class="alert alert-danger" >
                    Vui lòng nhập mã giảm giá !
                </div>
            `
    }
    else {
        axios.get("api/sales", {
            headers: {
                Authorization: 'Bearer ' + auth
            },
        })
            .then((res) => {
                var results = res.data;
                results.forEach((items) => {
                    if(items.sale_code == document.getElementById("input_coupon").value){
                        if(Number(new Date()) > Number(new Date(items.time))){
                            document.getElementById("show_message").innerHTML = `
                                     <div class="alert alert-danger" >
                                        Mã giảm giá đã hết hạn !
                                    </div>
                                `
                        } else {
                            var price = document.getElementById("price_course").getAttribute('data-price');
                            document.getElementById("input_coupon").value = items.sale_code
                            document.getElementById("input_coupon").setAttribute('disabled',true)
                            document.getElementById("apply_id_coupon").setAttribute('disabled',true)
                            document.getElementById("total_order").innerText = new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(Number(price) - ((Number(price) * Number(items.percent_discount)) / 100))
                            document.getElementById("price_total").value = Number(price) - ((Number(price) * Number(items.percent_discount)) / 100)
                        }
                    }
                    // else {
                    //     document.getElementById("show_message").innerHTML = `
                    //         <div class="alert alert-danger" >
                    //             Mã giảm giá không hợp lệ
                    //         </div>
                    //     `
                    // }
                })
            })
            .catch((error) => {
                console.error(error);
            });
    }
}