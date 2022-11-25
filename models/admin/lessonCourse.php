<?php
    function import_csv_file(){
        if(isset($_POST['importSubmit'])){
            // Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            // Validate whether selected file is a CSV file
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
                // If the file is uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    // Skip the first line
                    fgetcsv($csvFile);
                    // Parse data from CSV file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        // Get row data
                        $content    = $line[0];
                        $id_lesson  = (int)$line[1];
                        // $db->query("INSERT INTO detail_lesson (content, id_lesson) VALUES ('".$content."', '".$id_lesson."')");
                        $sql = "INSERT INTO `detail_lesson` SET `content` = ?, `id_lesson` = ?";
                        query_sql($sql,$content,$id_lesson);
                    }
                    // Close opened CSV file
                    fclose($csvFile);
                    $qstring = '?status=succ';
                }else{
                    $qstring = '?status=err';
                }
            }else{
                $qstring = '?status=invalid_file';
            }
        }
    }
?>