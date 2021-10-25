<?php
    session_start();
    
    require './database.php'; 

    $objServer = new DB;
    
    if(isset($_POST['btn_update'])) {

        $id = $_POST['edit_id'];
        $up_typeName = $_POST['typeName'];
        try {

            $sql = "UPDATE silk_type SET type_name = :typeName WHERE type_id = '$id'";
            $update_stmt = $objServer->connected()->prepare($sql);
            $update_stmt->bindParam(":typeName" ,$up_typeName);

        if($update_stmt->execute()) {

            header("location: ../silk_type_edit.php?edit_id=$id");
            $_SESSION['update_success'] = "แก้ไขข้อมูลแอดมินสำเร็จ...";

        }

        } catch (PDOException $e) {
        $e->getMessage();
        }

    }

    


?>