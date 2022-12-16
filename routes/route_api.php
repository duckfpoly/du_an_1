<?php
    require_once 'api_dir/fomat_datetime.php';
    function route_method($module){
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'PUT':
                echo (new $module())->update();
                break;
            case 'POST':
                echo (new $module())->create();
                break;
            case 'GET':
                if(isset($_GET['id'])){
                    echo (new $module())->detail();
                }
                elseif (isset($_GET['q'])){
                    print_r((new $module())->search());
                }
                else {
                    echo (new $module())->read();
                }
                break;
            case 'DELETE':
                echo (new $module())->delete();
                break;
            default:
                echo json_encode(array('message' => 'error'));
                break;
        }
    }
    if (isset($_GET['module'])) {
        $module = $_GET['module'];
        $dir    = 'api_dir/'.$module.'.php';
        switch ($module){
            case 'categories':
                require_once $dir;
                route_method($module);
                break;
            case 'courses':
                require_once $dir;
                route_method($module);
                break;
            case 'sales':
                require_once $dir;
                route_method($module);
                break;
            case 'teachers':
                require_once $dir;
                route_method($module);
                break;
            case 'students':
                require_once $dir;
                route_method($module);
                break;
            case 'notifications':
                require_once $dir;
                route_method($module);
                break;
        }
    }
?>