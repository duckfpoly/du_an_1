<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
class request_categories {
    public function read(){
        header('Access-Control-Allow-Methods: GET');
        $data = new Categories((new db())->connect());
        $read = $data->read();
        $num  = $read->rowCount();
        if($num > 0){
            $data_array = [];
            while($row = $read->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $data_item = array(
                    'id'    => $id,
                    'name'  => $name_category
                );
                array_push($data_array,$data_item);
            }
            return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
        }
    }
    public function create(){
        header('Access-Control-Allow-Methods: POST');
        $data = new Categories((new db())->connect());
        $result = json_decode(file_get_contents("php://input"));
        $data->name = $result->name;
        if($data->create()){
            return json_encode(array('message' => 'Created successfully'));
        }
        else {
            return json_encode(array('message' => "Don't create !"));
        }
    }
    public function update(){
        header('Access-Control-Allow-Methods: PUT');
        $data = new Categories((new db())->connect());
        $result = json_decode(file_get_contents("php://input"));
        $data->id 	= $result->id;
        $data->name = $result->name;
        if($data->update()){
            return json_encode(array('message' => 'Update successfully'));
        }
        else {
            return json_encode(array('message' => "Don't Update !"));
        }
    }
    public function delete(){
        header('Access-Control-Allow-Methods: DELETE');
        $data = new Categories((new db())->connect());
        $result = json_decode(file_get_contents("php://input"));
        $data->id = $result->id;
        if($data->delete()){
            return json_encode(array('message' => 'Delete successfully'));
        }
        else {
            return json_encode(array('message' => "Don't delete !"));
        }
    }
    public function detail(){
        header('Access-Control-Allow-Methods: GET');
        $result     = json_decode(file_get_contents("php://input"));
        $data       = new Categories((new db())->connect());
        $data->id   = $result->id;
        $check      = $data->check_id();
        if(isset($check)){
            return json_encode(array('message' => $check));
        }
        else {
            $data->show();
            $data_item = array(
                'id'    => $data->id,
                'name'  => $data->name_category
            );
            return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
        }
    }
}
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'post'){
            echo (new request_categories)->create();
        }
        else if($act == 'update'){
            echo (new request_categories)->update();
        }
        else if($act == 'delete'){
            echo (new request_categories)->delete();
        }
        else if($act == 'detail'){
            echo (new request_categories)->detail();
        }
        else {
            echo json_encode(array('message' => "Don't handle API !"));
        }
    }
    else {
        print_r((new request_categories)->read());
    }
?>
