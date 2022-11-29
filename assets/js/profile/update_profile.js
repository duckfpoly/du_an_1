var url = location.href;
function update(){
    let avatar_user = document.querySelector('#avatar').files;
    let arr = Array.from(avatar_user);
    let name_user = document.querySelector('#name').value;
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

