<?php
    if(isset($_POST['view'])){
    if($_POST["view"] == ''){
        echo 'View rỗng ';
    }}
    if(isset($_POST['view'])){
        if($_POST["view"] != ''){
            $update_query = "UPDATE notification_admin SET status = 1 WHERE status = 0";
            query_sql($update_query);
        }
        $query = "SELECT * FROM notification_admin ORDER BY id DESC LIMIT 10";
        $result = query($query);
        $output = '';
        if(!empty($result)){
            foreach ($result as $key => $items){
                $output .= '
                    <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="#">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">'.$items['body'].'</span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        '.$items['time'].'
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end align-items-center" style="font-size: 5px; margin-left: 20px">
                                    <div>🔴</div>
                                </div>
                            </div>
                        </a>
                    </li>
                ';
            }
        }
        else{
            $output .= '
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="#">Chưa có thông báo</a>
                </li>
            ';
        }
        $count = query_value("SELECT COUNT(*) FROM notification_admin WHERE status = 0");
        $data = array(
            'notification' => $output,
            'unseen_notification'  => $count
        );
        echo json_encode($data);
    }
?>



