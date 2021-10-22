<?php
    session_start();

    require 'database.php';
    $objServer = new DB;
    if(!empty($_REQUEST['delete_id'])){

        $id = $_REQUEST['delete_id'];
        $sql = "DELETE FROM admin_user WHERE user_id = :id";
        $delete_stmt = $objServer->connected()->prepare($sql);
        $delete_stmt->bindParam(':id', $id);
        if($delete_stmt->execute()) {

            return $_SESSION['insert_error'] = "ลบแอดมินสำเร็จ..." .
            header("location: ../admin_manage.php");

        }
        
    } else {

        echo "Access Denide";

    }




?>