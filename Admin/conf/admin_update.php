<?php
    session_start();
    
    require 'database.php'; 

    $objServer = new DB;
    

    if(isset($_POST['btn_update'])) {

        $id = $_POST['edit_id'];
        $up_uname = $_POST['edit_uname'];
        $up_passwd = $_POST['u_passwd'];
        $up_fname = $_POST['u_fname'];
        $up_email = $_POST['u_email'];
        $up_tel = $_POST['u_tel'];

        try {

            $sql = "UPDATE admin_user SET username = :uname ,password = :upasswd ,fullname = :ufname ,email = :uemail ,phone_num = :utel WHERE user_id = '$id'";

            $update_stmt = $objServer->connected()->prepare($sql);
            $update_stmt->bindParam(":uname" ,$up_uname);
            $update_stmt->bindParam(":upasswd" ,$up_passwd);
            $update_stmt->bindParam(":ufname" ,$up_fname);
            $update_stmt->bindParam(":uemail" ,$up_email);
            $update_stmt->bindParam(":utel" ,$up_tel);

        if($update_stmt->execute()) {

            header("location: ../admin_edit.php?edit_id=$id");
            $_SESSION['update_success'] = "แก้ไขข้อมูลแอดมินสำเร็จ...";

        }

        } catch (PDOException $e) {

        $e->getMessage();

        }

    }

    


?>