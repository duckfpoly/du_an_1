<?php
    // tạo jwt
    $payload = array (
        'name'  => 'Nguyen Duc',
        'phone' => '0823565831',
        'email' => 'nguyenduc10603@gmail.com',
        'admin' => true,
        'exp'   => time() + (86400 * 10)
    );
    $jwt = generate_jwt($payload);
    $bearer_token = get_bearer_token();
    if(empty($bearer_token)){
        echo json_encode(array(
            'error' => 'Access denied !',
        ));
    }else {
        $is_jwt_valid = is_jwt_valid($bearer_token);
        if($is_jwt_valid == true) {
            $auth = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTmd1eWVuIER1YyIsInBob25lIjoiMDgyMzU2NTgzMSIsImVtYWlsIjoibmd1eWVuZHVjMTA2MDNAZ21haWwuY29tIiwiYWRtaW4iOnRydWUsImV4cCI6MTY2OTgwNTQ4Nn0.PByr6NO_lYgDSnT-KkW0bLBgsNzfIySHO_IofdxiHsw';
            if($bearer_token == $auth) {
                if (isset($_GET['module'])) {
                    $module = $_GET['module'];
                    switch ($module){
                        case 'categories':
                            include_once 'api/module/'.$module.'.php';
                            include_once 'api/component/'.$module.'.php';
                            break;
                        case 'courses':
                            include_once 'api/module/'.$module.'.php';
                            include_once 'api/component/'.$module.'.php';
                            break;
                    }
                }
            } else {
                echo json_encode(array(
                    'error' => 'Access denied !'
                ));
            }
        } else {
            echo json_encode(array(
                'error' => 'Access denied !'
            ));
        }
    }
?>