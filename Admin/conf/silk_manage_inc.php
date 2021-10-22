<?php

    class ManageSilkType extends DB {

        public function InsertSilkType($typeID ,$typeName) {

            $sql = "SELECT * FROM silk_type WHERE type_name = '$typeName'";
            $check_stmt = $this->connected()->prepare($sql);
            $check_stmt->execute();

            while ($row = $check_stmt->fetch(PDO::FETCH_ASSOC)) {
                $db_typeName = $row['type_name'];
            }

            if ($typeName != isset($db_typeName)) {

                $sql_insert  = "INSERT INTO silk_type (type_id ,type_name) VALUES (?,?)";
                $insert_stmt = $this->connected()->prepare($sql_insert);
                $insert_stmt->bindParam(1, $typeID);
                $insert_stmt->bindParam(2, $typeName);

                if($insert_stmt->execute()) {
                    return $_SESSION['insert_success'] = "การเพิ่มข้อมูลประเภทผ้าทอเสร็จสมบูรณ์...";
                } else {
                    return $_SESSION['insert_error'] = "มีบางอย่างผิดปกติกรุณาตรวจสอบข้อมูลว่าถูกต้องหรือไม่... ";
                }

            } else {
                return $_SESSION['insert_error'] = "มีประเภทผ้าทอชนิดนี้อยู่ในระบบ แล้ว... ";
            }

        }

        public function FetchAllSilkType () {
            try {

                $sql = "SELECT * FROM silk_type";
                $select_stmt = $this->connected()->prepare($sql);
                $select_stmt->execute();

                $result = $select_stmt->fetchAll();

                foreach ($result as $row) {

                    $typeID = $row['type_id'];
                    $TypeName = $row['type_name'];

                    $table =    "<tr>" . 
                                "<td class='text-center'>" . $typeID . "</td>" .
                                "<td class='text-center'>" . $TypeName . "</td>" .
                                "<td>". 
                                "<a href='silk_type_edit.php?edit_id=$typeID'>" . 
                                "<i class='fas fa-pen' data-toggle='tooltip' title='Edit'></i>". 
                                "</a>".
                                "<a href='conf/silk_type_delete.php?delete_id=$typeID' class='delete'>" . 
                                "<i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>" .
                                "</a>".  
                                "</td>".
                                "</tr>";

                    echo $table;

                }

            } catch (PDOException $e) {
                echo "Something wrong!!" . $e->getMessage();
            }
        }

        public function FetchAllSilkTypeForInsert() {

            try {
                $sql = "SELECT * FROM silk_type";
                $select_stmt = $this->connected()->prepare($sql);
                $select_stmt->execute();

                $result = $select_stmt->fetchAll();
                foreach ($result as $row) {
                    $silk_name = $row['type_name'];
                    
                    echo "<option value='$silk_name'>$silk_name</option>";


                }

            } catch (PDOException $error) {
                $error->getMessage();
            }

        }

    }
?>