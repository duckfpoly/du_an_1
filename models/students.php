<?php
    function check_image_student($image_student) {
        $sql = "SELECT * FROM `students` WHERE image_student = ?";
        $check_image_student = query_one($sql, $image_student);
        if($check_image_student > 0) {
            return 'Ảnh đã được sử dụng !';
        }}
    function read_student(){
        $sql = "SELECT * FROM students";
        return query($sql);
    }
    // function count_student(){
    //     $sql = "SELECT COUNT(*) FROM students";
    //     return query_value($sql);
    // }

    function check_email_student($email_student){
        $sql = "SELECT * FROM `students` WHERE email_student = ?";
        $check_email_student = query_one($sql, $email_student);
        if($check_email_student > 0) {
            return 'Email đã được sử dụng !';
        }
    }

    function check_phone_student($phone_student){
        $sql = "SELECT * FROM `students` WHERE phone_student = ?";
        $check_phone_student = query_one($sql, $phone_student);
        if($check_phone_student > 0) {
            return 'Số điện thoại đã được sử dụng !';
        }
    }

    function check_id_student($id){
        $sql = "SELECT * FROM `students` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return 'Học viên không tồn tại !';
        }
    }

    function students_create($name_student,$email_student,$phone_student, $password_student,$image_student,$created_at){
        //        $output     = '<p>Dear, '.$name_teacher.'</p>';
        //        $output .= '
        //                        <h1>Đăng ký tài khoản thành công</h1>
        //                        <p>DDH Teams xin được gửi tài khoản và mật khẩu của giảng viên:</p>
        //                        <ul>
        //                            <li><strong>Tài khoản: </strong>'.$email_teacher.'</li>
        //                            <li><strong>Mật khẩu: </strong>'.$password_teacher.'</li>
        //                        </ul>
        //                    ';
        //        $output .= '
        //                        <p>Nếu không phải bạn đăng ký <br>
        //                        Vui lòng nhấn <a href="mailto:ndcake.store@gmai.com">vào đây</a> để gửi email liên hệ lại với chúng tôi
        //                        hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
        //                    ';
        //        $output .= '<p>Thanks,</p>';
        //        $output .= '<p>DDH Teams</p>';
        //        send_mail($email_teacher,$output,"SIGN UP ACCOUNT");
                $password_student_hash = password_hash($password_student,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `students` SET 
                        `name_student`          =   ?,
                        `email_student`         =   ?,
                        `phone_student`         =   ?,
                        `password_student`      =   ?,
                        `image_student`         =   ?,
                        `created_at`            =   ?
                ";
                query_sql($sql,$name_student,$email_student,$phone_student,$password_student_hash,$image_student,$created_at);
            }
            function student_read(){
                $sql = "SELECT * FROM `students` ORDER BY id DESC";
                return query($sql);
            }
            function students_update($name_student,$email_student,$phone_student,$password_student,$image_student,$created_at,$updated_at,$status_student,$id){
                $sql = "UPDATE `students` SET 
                            `name_student`          =   ?,
                            `email_student`         =   ?,
                            `phone_student`         =   ?,
                            `password_student`      =   ?,
                            `image_student`         =   ?,
                            `created_at`            =   ?,
                            `updated_at`            =   ?,
                            `status_student`        =   ?
                            WHERE id = ?
                    ";
                query_sql($sql,$name_student,$email_student,$phone_student,$password_student,$image_student,$created_at,$updated_at,$status_student,$id);
            }
            function student_delete($id){
                $sql = "DELETE FROM students WHERE id = ?";
                query_sql($sql,$id);
            }
            function student_detail($id){
                $sql = "SELECT *  FROM students WHERE id = ?";
                return query_one($sql,$id);
            }
            function student_search($key){
                $sql = "SELECT * FROM students WHERE name_student LIKE '%$key%'";
                return query($sql);
            }
            function count_student(){
                $sql = "SELECT COUNT(*) FROM students";
                return query_value($sql);
            }   
?>