<?php
    if(getSession('user')){
        if(getSession('user')['role'] != 0){
            location(BASE_URL);
        }
        else {
            $id = getSession('user')['id'];
            if (isset($_GET['action'])) {
                $act = $_GET['action'];
                switch ($act) {
                    case "update_profile":
                        $name_teacher       = $_POST['name_teacher'];
                        $email_teacher      = $_POST['email_teacher'];
                        $phone_teacher      = $_POST['phone_teacher'];
                        $updated_at         = date("Y-m-d H:i:s");
                        teacher_profiles_update($name_teacher,$email_teacher,$phone_teacher,$updated_at,$id);
                        break;
                    case "update_password":
                        $password_teacher       = $_POST['password_teacher'];
                        $updated_at             = date("Y-m-d H:i:s");
                        teacher_password_update($password_teacher,$updated_at,$id);
                        break;
                    default:
                        location(BASE_URL . "page_not_found");
                        break;
                }
            } else {
                $teacher_detail = teacher_detail(getSession('user')['id']);
                include 'views/manager/teachers/profiles/prf.php';
            }
        }
    }else {
        location(BASE_URL);
    }
?>