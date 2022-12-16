var url         = location.href;
var data        = [];
function save() {
    var image       = document.getElementById('image_student').value
    var name        = document.getElementById('name_student').value
    var checkbox    = document.getElementsByName("rate");
    for (var i = 0; i < checkbox.length; i++){
        if (checkbox[i].checked === true){
            var rate    = checkbox[i].value
        }
    }
    var content     = document.getElementById('content_rate').value
    var id_course   = document.getElementById('id_course').value
    var id_student  = document.getElementById('id_student').value

    if(rate == ''){
        showSuccessToast('Cảnh báo', 'Vui lòng đánh giá sao!', 'warning')
    }
    else if(content == ''){
        showSuccessToast('Cảnh báo', 'Vui lòng viết đánh giá của bạn!', 'warning')
    }
    else{
        var send_cmt    = 'send_cmt';
        var dataString  =
            'send_cmt='         + send_cmt +
            '&rate='            + rate +
            '&id_course='       + id_course +
            '&id_student='      + id_student +
            '&content_rate='    + content;
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function () {
                showSuccessToast('Success', 'Cảm ơn bạn đã đánh giá khóa học', 'success')
                document.getElementById('stt_cmt').innerText = 'Đã đăng';
                setTimeout(function () {
                    document.getElementById('stt_cmt').innerText = '';
                },3000);
            }
        });
        var item = {
            name: name,
            image: image,
            rate: rate,
            content: content
        }
        this.data.push(item)
   
        show()
        clear()
    }
}
function show() {
    if(document.getElementById('no_review')) {
        document.getElementById('no_review').innerHTML = '';
    }
    var count_rate1 = Number(document.getElementById('count_rate_1').innerText)
    var count_rate2 = Number(document.getElementById('count_rate_2').innerText)
    var list = this.data.reverse();
    var list_cmt = ``;
    for (var i = 0; i < data.length; i++) {
        list_cmt += `
            <li>
                <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                    <div class="comment_image">
                        <img src="${host}assets/uploads/students/${list[i].image}" alt="Image User">
                    </div>
                    <div class="comment_content">
                        <div class="comment_title_container ">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <div class="comment_author"><a href="#">${list[i].name}</a></div>
                                    <div class="Stars" style="--rating: ${list[i].rate};"></div>
                                </div>
                                <div class="comment_time" id="stt_cmt">Đang đăng</div>
                            </div>
                        </div> 
                        <div class="comment_text"><p>${list[i].content}</p></div>
                        <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                            <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>0</span></a></div>&emsp;
                            <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span>0</span></a></div>
                        </div>
                    </div>
                </div>
            </li>
        `
    }
    document.getElementById('rate_list').innerHTML = list_cmt
    var add_number_rate = count_rate1 + 1
    var add_number_rate2 = count_rate2 + 1
    document.getElementById('count_rate_1').innerText = add_number_rate
    document.getElementById('count_rate_2').innerText = add_number_rate2
}
function clear() {
    document.getElementById('content_rate').value = ""
}