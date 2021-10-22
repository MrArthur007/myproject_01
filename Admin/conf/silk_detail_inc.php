<?php

    class silkDetail extends DB {

        public function insertSilkDetail($s_id , $type_name ,$title ,$s_prov ,$s_detail) {

            try {

                $sql = "INSERT INTO silK_data (silk_id ,type_name ,title ,silk_provice ,silk_detail) VALUES (?,?,?,?,?)";

                $insert_stmt = $this->connected()->prepare($sql);
                $insert_stmt->bindParam(1, $s_id);
                $insert_stmt->bindParam(2, $type_name);
                $insert_stmt->bindParam(3, $title);
                $insert_stmt->bindParam(4, $s_prov);
                $insert_stmt->bindParam(5, $s_detail);

                if($insert_stmt->execute()) {

                   return $_SESSION['insert_success'] = "การเพิ่มข้อมูลเสร็จสมบูรณ์...";

                }
    
                
            } catch (PDOException $error) {
                $error->getMessage();
            }
            
        }

        public function FetchAllDetail () {
            $sql = "SELECT * FROM silk_data";

            $select_stmt = $insert_stmt = $this->connected()->prepare($sql);
            $select_stmt->execute();

            $result = $select_stmt->fetchAll();

            foreach ($result as $row) {

                $s_id = $row['silk_id'];
                $TypeName = $row['type_name'];
                $Title = $row['title'];
                $s_prov = $row['silk_provice'];
                $s_detail = $row['silk_detail'];

                $table =    "<tr class='text-center'>" . 
                            "<td>" . $s_id  . "</td>" .
                            "<td>" . $TypeName . "</td>" .
                            "<td>" . $Title . "</td>" .
                            "<td>" . $s_prov . "</td>" .
                            "<td>" . $s_detail . "</td>" .
                            "<td>". 
                            "<a href='silk_type_edit.php?edit_id=$s_id'>" . 
                            "<i class='fas fa-pen' data-toggle='tooltip' title='Edit'></i>". 
                            "</a>".
                            "<a href='conf/silk_type_delete.php?delete_id=$s_id' class='delete'>" . 
                            "<i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>" .
                            "</a>".  
                            "</td>".
                            "</tr>";

                echo $table;

            }
        }


    }


?>