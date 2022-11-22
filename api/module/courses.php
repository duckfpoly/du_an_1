<?php
class Courses {
    public function __construct($db){
        $this->conn = $db;
    }
    public function read(){
        $sql = "SELECT * FROM courses";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function show(){
        $sql = "SELECT * FROM categories WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name_category = $row['name_category'];
    }
    public function create(){
        $query = "INSERT INTO categories SET name_category=:name";
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        // bind data
        $stmt->bindParam(':name', $this->name);
        if($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
    public function update(){
        $query = "UPDATE categories SET name_category=:name WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        // bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        if($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
    public function delete(){
        $query = "DELETE FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        // bind data
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
    public function search($key){
        $sql = "SELECT * FROM courses  WHERE name_course LIKE '%$key%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
?>