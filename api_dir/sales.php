<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
class sales {
    public function __construct(){
        $this->conn = (new db())->connect();
    }
    public function read(){
        $sql = "SELECT * FROM sales";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num  = $stmt->rowCount();
        if($num > 0){
            $data_array = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $data_item = array(
                    'id'                => $id,
                    'sale_code'         => $sale_code,
                    'percent_discount'  => $percent_discount,
                    'time'              => $time
                );
                array_push($data_array,$data_item);
            }
            return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
        }
    }
}
?>