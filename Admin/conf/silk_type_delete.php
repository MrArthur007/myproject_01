<?php
    session_start();

    require 'database.php';
    $objServer = new DB;
    if(!empty($_REQUEST['delete_id'])){

        $id = $_REQUEST['delete_id'];
        $sql = "DELETE FROM silk_type WHERE type_id = :id";
        $delete_stmt = $objServer->connected()->prepare($sql);
        $delete_stmt->bindParam(':id', $id);
        if($delete_stmt->execute()) {
            return $_SESSION['insert_error'] = "ลบข้อมูลประเภทผ้าทอสำเร็จ..." .
            header("location: ../silk_type.php");
        }
        
    } else {

        echo "Access Denide";

    }




?>