<?php
function check_email_teacher($email_teacher){
    $sql = "SELECT * FROM `teachers` WHERE email_teacher = ?";
    $check_email_teacher = (new process())->query_one($sql, $email_teacher);
    if($check_email_teacher > 0) { return "Tên giảng viên đã được sử dụng !"; }
}
function check_id_teacher($id){
    $sql = "SELECT * FROM `teachers` WHERE id = ?";
    $check_ID = (new process())->query_one($sql, $id);
    if(!isset($check_ID['id'])) {
        return "Giảngviên không tồn tại !";
    }
}
function teachers_create($name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at){
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
        (new process())->query_sql($sql,$name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at);
}
function teacher_read(){
    $sql = "SELECT * FROM `teachers`";
    return (new process())->query($sql);
}
function teachers_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id){
    $sql = "UPDATE `courses` SET 
                `name_teacher`          =   ?,
                `email_teacher`         =   ?,
                `phone_teacher`         =   ?,
                `password_teacher`      =   ?,
                `image_teacher`         =   ?,
                `about_teacher`         =   ?,
                `scope_teacher`         =   ?,
                `created_at`            =   ?
                WHERE id = ?
        ";
    (new process())->query_sql($sql,$name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id);
}
function teacher_delete($id){
    $sql = "DELETE FROM teachers WHERE id = ?";
    (new process())->query_sql($sql,$id);
}
function teacher_detail($id){
    $sql = "SELECT *  FROM teachers WHERE id = ?";
    return (new process())->query_one($sql,$id);
}
function teacher_search($key){
    $sql = "SELECT * FROM courses WHERE name_course LIKE '%$key%'";
    return (new process())->query($sql);
}
?>