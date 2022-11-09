<?php
    function connect(){
        $conn = null;
        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
    function query_sql($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($sql_args);
            return $stmt;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function query_value($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        } catch (PDOException $e) {
            throw $e;
        }
    }
?>