<?php 
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;
            case "store":
                $name_student           = $_POST['name_student'];
                $email_student          = $_POST['email_student'];
                $phone_student          = $_POST['phone_student'];
                $password_student       = $_POST['password_student'];
                $image_student          = $_FILES['image_student']['name'];
                $created_at             = date("Y-m-d H:i:s");

                $redirect = STUDENTS."/create";
                //kiem tra rong
                check_empty($name_student       ,$redirect);
                check_empty($email_student      ,$redirect);
                check_empty($phone_student      ,$redirect);
                check_empty($password_student   ,$redirect);
                check_empty($image_student      ,$redirect);

                // Kiểm tra xem trong db tồn tại email | phone chưa
                check_data(check_email_student($email_student),$redirect);
                check_data(check_phone_student($phone_student),$redirect);

//                save_file('image_student', 'students');
                $saveImg = saveImage('image_student','students');
                isset($saveImg) && show_error($saveImg,STUDENTS.'/create');

                students_create($name_student,$email_student,$phone_student, $password_student,$image_student,$created_at);
                location(STUDENTS);
                break;
            case "update":
                $id = $_GET["id"];
                check_empty($id,STUDENTS);
                $student_detail = student_detail($id);
                include_once $direct_act;
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,STUDENTS);
                // nếu tồn tại thì nhận dữ liệu từ form
                $name_student           = $_POST['name_student'];
                $email_student          = $_POST['email_student'];
                $phone_student          = $_POST['phone_student'];
                $password_student       = $_POST['password_student'];
                $created_at             = $_POST['created_at'];
                $updated_at             = date("Y-m-d H:i:s");
                $status_student         = $_POST['status_student'];
                // gọi fn chi tiết để kiểm tra dữ liệu ( email, phone )
                $student_detail         = student_detail($id);
                // kiểm tra ảnh
                // Nếu ảnh up lên giống ảnh gốc thì sẽ up lại ảnh cũ,ngược lại thì up ảnh mới và lưu vào thư mục
                $image_goc              = $student_detail['image_student'];
                $image_up               = $_FILES['image_student']['name'];
                if (empty($image_up)) {
                    $image_student = $image_goc;
                } else {
                    $image_student = $image_up;
//                    save_file('image_student', 'students');
                    $saveImg = saveImage('image_student','students');
                    isset($saveImg) && show_error($saveImg,STUDENTS.'/update/'.$id);
                }
                // Nếu dữ liệu update == dữ liệu trên database thì sẽ update bình thường
                // Nếu dữ liệu update != dữ liệu trên databse thì sẽ tiếp tục check ( k trùng thì update, ngược lại k update trả về 1 thông báo và về lại giao diện update )
                compare_data($email_student,$student_detail['email_student'],check_email_student($email_student),STUDENTS.'/update/'.$id);
                compare_data($phone_student,$student_detail['phone_student'],check_phone_student($phone_student),STUDENTS.'/update/'.$id);
                // Sau khi pass qua validate => Thực hiện update lên database
                students_update($name_student,$email_student,$phone_student,$password_student,$image_student,$created_at,$updated_at,$status_student,$id);
                // update hoàn thành, điều hướng về trang danh sách
                location(STUDENTS);
                break;

            case "destroy":
                die(location(STUDENTS));
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,STUDENTS);
                // Khi pass qua validate => gọi model thực hiện delete
                student_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(STUDENTS);
                break;
            case "detail":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,STUDENTS);
                // Nếu tồn tại thì gọi model chi tiết để lấy thông tin và trả về giao diện chi tiết
                $student_detail = student_detail($id);
                include_once $direct_act;
                break;
            default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['s'])){
            check_empty($_GET['s'],STUDENTS);
            $read_student   = student_search($_GET['s']);
        }else {
            $read_student   = student_read();
        }
        include_once $direct_read;
    }
?>