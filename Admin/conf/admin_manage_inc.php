<?php

    class ManageAdmin extends DB {

        // Insert Zone
        public function InsertAdmin($uname ,$passwd ,$fname ,$email ,$tel) {
            
            try {
                    $insert_stmt = $this->connected()->prepare("INSERT INTO admin_user (username ,password ,fullname ,email ,phone_num) VALUES (?,?,?,?,?)");
                    $insert_stmt->bindParam(1, $uname);
                    $insert_stmt->bindParam(2, $passwd);
                    $insert_stmt->bindParam(3, $fname);
                    $insert_stmt->bindParam(4, $email);
                    $insert_stmt->bindParam(5, $tel);
                    if($insert_stmt->execute()) {
                       return $_SESSION['insert_success'] = "การเพิ่มข้อมูลแอดมินเสร็จสมบูรณ์..." . header("Refresh:3" , "location: admin_manage.php");
                    }
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function CheckInsert($uname ,$passwd ,$fname ,$email ,$tel){

            $check_stmt = $this->connected()->prepare("SELECT * FROM admin_user WHERE username = '$uname' AND password = '$passwd'");
            $check_stmt->execute();


            while ($row = $check_stmt->fetch(PDO::FETCH_ASSOC)) {
                
                $db_user = $row['username'];
                $db_pass = $row['password'];

            }

            if($uname != isset($db_user) AND $passwd != isset($db_pass)) {
                $objRegister = new ManageAdmin;
                $objRegister->InsertAdmin($uname ,$passwd ,$fname ,$email ,$tel);
            } else {
                return $_SESSION['insert_error'] = "มีชื่อผู้ใช้และรหัสผ่านนี้อยู่ในระบบแล้ว" . header("Refresh:5" , "location: admin_manage.php");
            }

        }
        // Insert Zone

    }


?>