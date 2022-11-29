<?php
    function check_image_teacher($image_teacher){
        $sql = "SELECT * FROM `teachers` WHERE image_teacher = ?";
        $check_image_teacher = query_one($sql, $image_teacher);
        if($check_image_teacher > 0) {
            return 'Ảnh đã được sử dụng !';
        }
    }
    function check_email_teacher($email_teacher){
        $sql = "SELECT * FROM `teachers` WHERE email_teacher = ?";
        $check_email_teacher = query_one($sql, $email_teacher);
        if($check_email_teacher > 0) {
            return 'Email đã được sử dụng !';
        }
    }
    function check_phone_teacher($phone_teacher){
        $sql = "SELECT * FROM `teachers` WHERE phone_teacher = ?";
        $check_phone_teacher = query_one($sql, $phone_teacher);
        if($check_phone_teacher > 0) {
            return 'Số điện thoại đã được sử dụng !';
        }
    }
    function check_id_teacher($id){
        $sql = "SELECT * FROM `teachers` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return 'Giảng viên không tồn tại !';
        }
    }
    function teachers_create($name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at){
        $output     = '<p>Dear, '.$name_teacher.'</p>';
        $output .= '
                        <h1>Đăng ký tài khoản thành công</h1>
                        <p>DDH Teams xin được gửi tài khoản và mật khẩu của giảng viên:</p>
                        <ul>
                            <li><strong>Tài khoản: </strong>Email mà bạn đã đăng ký</li>
                            <li><strong>Mật khẩu: </strong>'.$password_teacher.'</li>
                        </ul>
                    ';
        $output .= '
                        <p>Nếu không phải bạn đăng ký <br>
                        Vui lòng nhấn <a href="mailto:ndcake.store@gmai.com">vào đây</a> để gửi email liên hệ lại với chúng tôi
                        hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
                    ';
        $output .= '<p>Thanks,</p>';
        $output .= '<p>DDH Teams</p>';
        send_mail($email_teacher,$output,"SIGN UP ACCOUNT");
        $password_teacher_hash = password_hash($password_teacher,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `teachers` SET 
                `name_teacher`          =   ?,
                `email_teacher`         =   ?,
                `phone_teacher`         =   ?,
                `password_teacher`      =   ?,
                `image_teacher`         =   ?,
                `about_teacher`         =   ?,
                `scope_teacher`         =   ?,
                `created_at`            =   ?
        ";
        query_sql($sql,$name_teacher,$email_teacher,$phone_teacher,$password_teacher_hash,$image_teacher,$about_teacher,$scope_teacher,$created_at);
    }
    function teacher_read(){
        $sql = "SELECT * FROM `teachers` ORDER BY id DESC";
        return query($sql);
    }
    function teachers_update($name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at,$updated_at,$status_teacher,$id){
        $sql = "UPDATE `teachers` SET 
                    `name_teacher`          =   ?,
                    `email_teacher`         =   ?,
                    `phone_teacher`         =   ?,
                    `password_teacher`      =   ?,
                    `image_teacher`         =   ?,
                    `about_teacher`         =   ?,
                    `scope_teacher`         =   ?,
                    `created_at`            =   ?,
                    `updated_at`            =   ?,
                    `status_teacher`        =   ?
                    WHERE id = ?
            ";
        query_sql($sql,$name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at,$updated_at,$status_teacher,$id);
    }
    function teacher_delete($id){
        $sql = "DELETE FROM teachers WHERE id = ?";
        query_sql($sql,$id);
    }
    function teacher_detail($id){
        $sql = "SELECT *  FROM teachers WHERE id = ?";
        return query_one($sql,$id);
    }
    function teacher_search($key){
        $sql = "SELECT * FROM teachers WHERE name_teacher LIKE '%$key%'";
        return query($sql);
    }
    function count_teacher(){
        $sql = "SELECT COUNT(*) FROM teachers";
        return query_value($sql);
    }

    function teacher_profiles_update($name_teacher,$email_teacher,$phone_teacher,$updated_at,$id){
        $sql = "UPDATE `teachers` SET 
                        `name_teacher`          =   ?,
                        `email_teacher`         =   ?,
                        `phone_teacher`         =   ?,
                        `updated_at`            =   ?
                        WHERE id = ?
                ";
        query_sql($sql,$name_teacher,$email_teacher,$phone_teacher,$updated_at,$id);
    }
    function teacher_password_update($password_teacher,$updated_at,$id){
        $sql = "UPDATE `teachers` SET 
                `password_teacher`         =   ?,
                `updated_at`               =   ?
                WHERE id = ?
                ";
        query_sql($sql,$password_teacher,$updated_at,$id);
    }
?>