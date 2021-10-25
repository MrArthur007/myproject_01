<?php

    class silkDetail extends DB {

        public function insertSilkDetail($s_id , $type_id ,$file_name,$title ,$s_prov ,$s_detail) {

            try {

                $sql = "INSERT INTO silK_data (silk_id ,type_id ,images ,title ,silk_provice ,silk_detail) VALUES (?,?,?,?,?,?)";

                $insert_stmt = $this->connected()->prepare($sql);
                $insert_stmt->bindParam(1, $s_id);
                $insert_stmt->bindParam(2, $type_id);
                $insert_stmt->bindParam(3, $file_name);
                $insert_stmt->bindParam(4, $title);
                $insert_stmt->bindParam(5, $s_prov);
                $insert_stmt->bindParam(6, $s_detail);

                if($insert_stmt->execute()) {

                   return $_SESSION['insert_success'] = "การเพิ่มข้อมูลเสร็จสมบูรณ์...";

                }
    
                
            } catch (PDOException $error) {
                $error->getMessage();
            }
            
        }

        public function FetchAllDetail () {
            $sql = "SELECT * FROM silk_data INNER JOIN silk_type ON silk_data.type_id = silk_type.type_id";

            $select_stmt = $insert_stmt = $this->connected()->prepare($sql);
            $select_stmt->execute();

            $result = $select_stmt->fetchAll();

            foreach ($result as $row) {

                $s_id = $row['silk_id'];
                $TypeName = $row['type_name'];
                $images = $row['images'];
                $Title = $row['title'];
                $s_prov = $row['silk_provice'];
                $s_detail = $row['silk_detail'];

                $table =    "<tr class='text-center'>" . 
                            "<td>" . $s_id  . "</td>" .
                            "<td>" . $TypeName . "</td>" .
                            "<td>" . "<img src='conf/silk_detail_img/$images' class='img-thumbnail'>" . "</td>" .
                            "<td>" . $Title . "</td>" .
                            "<td>" . $s_prov . "</td>" .
                            "<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;'>" . $s_detail . "</td>" .
                            "<td>". 
                            "<a href='silk_detail_edit.php?edit_id=$s_id&&provice_name=$s_prov'>" . 
                            "<i class='fas fa-pen' data-toggle='tooltip' title='Edit'></i>". 
                            "</a>".
                            "<a href='silk_gallery.php?page_id=$s_id'>" . 
                            "<i class='fas fa-image' data-toggle='tooltip' title='Gallary'></i>". 
                            "</a>".
                            "<a href='conf/silk_detail_delete.php?delete_id=$s_id&&img_name=$images' class='delete'>" . 
                            "<i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>" .
                            "</a>".  
                            "</td>".
                            "</tr>";

                echo $table;

            }
        }

        public function FetchAllSilkTypeSelected($s_id) {

            try {
                
                $sql = "SELECT * FROM silk_type WHERE type_id = $s_id";
                $select_stmt = $this->connected()->prepare($sql);
                $select_stmt->execute();

                $result = $select_stmt->fetchAll();
                foreach ($result as $row) {
                    $silk_name = $row['type_name'];
                    $type_id = $row['type_id'];                    
                    echo "<option selected value='$type_id'>$silk_name</option>";
                }

            } catch (PDOException $error) {
                $error->getMessage();
            }

        }

        public function FetchGallery($s_id) {

            try {
                
                $sql = "SELECT * FROM silk_gallery WHERE silk_id = $s_id";
                $select_stmt = $this->connected()->prepare($sql);
                $select_stmt->execute();

                $result = $select_stmt->fetchAll();
                foreach ($result as $row) {

                    $img_id = $row['img_id'];
                    $img_name = $row['img_name'];   
                    $silk_id = $row['silk_id'];
                    $table = "<tr class='text-center' style='height: 120px;'>" . 
                    "<td>" . $img_id  . "</td>" .
                    "<td>" . "<img src='conf/silk_gallery/$img_name' class='img-thumbnail'>" . "</td>" .
                    "<td>". 
                    "<a href='conf/silk_gallery_delete.php?delete_id=$img_id&&img_name=$img_name&&page_id=$silk_id' class='delete'>" . 
                    "<i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>" .
                    "</a>".  
                    "</td>".
                    "</tr>";

                     echo $table;

                }

            } catch (PDOException $error) {
                $error->getMessage();
            }


        }


    }


?>