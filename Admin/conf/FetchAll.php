<?php

    class FetchAll extends DB {

        public function FetchUser() {

            try {

                $sql = "SELECT * FROM admin_user";
                $select_stmt = $this->connected()->prepare($sql);
                $select_stmt->execute();

                $result = $select_stmt->fetchAll();

                foreach ($result as $row) {

                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $fname = $row['fullname'];
                    $email = $row['email'];
                    $tel = $row['phone_num'];

                    $table =    "<tr>" . 
                                "<td>" . $user_id . "</td>" .
                                "<td>" . $username . "</td>" .
                                "<td>" . $fname . "</td>" .
                                "<td>" . $email . "</td>" .
                                "<td>" . $tel . "</td>" .
                                "<td>". 
                                "<a href='admin_edit.php?edit_id=$user_id'>" . 
                                "<i class='fas fa-pen' data-toggle='tooltip' title='Edit'></i>". 
                                "</a>".
                                "<a href='conf/admin_delete.php?delete_id=$user_id' onclick='return confirm('คุณต้องการลบผู้ใช้ : $username หรือไม่');' class='delete'>" . 
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


        public function FetchFullname ($id) {
            try {    

                $sql = "SELECT * FROM admin_user WHERE user_id = '$id'";
                $select_stmt = $this->connected()->prepare($sql);
                $select_stmt->execute();
                $result = $select_stmt->fetchAll();

                
                foreach ($result as $row) {
                    $value_FName = $row['fullname'];
                }
                
                echo $value_FName;

            } catch (PDOException $error) {
                echo "Something wrong!!" . $error->getMessage();
            }
        }


        public function FetchProvice() {

            $sql = "SELECT * FROM provinces";
            $select_stmt = $this->connected()->prepare($sql);
            $select_stmt->execute();
            $result = $select_stmt->fetchAll();
            foreach ($result as $row) {
                $value_prov= $row['name_th'];

                echo "<option value='$value_prov'>$value_prov</option>";

            }
            
        }




        




    }

?>