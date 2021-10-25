<?php
    session_start();

    require 'database.php';
    $objServer = new DB;
    if(!empty($_REQUEST['delete_id'])){

        $id = $_REQUEST['delete_id'];
        $img_name = $_GET['img_name'];
        $dir = "silk_detail_img/";

        $sql = "DELETE FROM silk_data WHERE silk_id = :id";
        $delete_stmt = $objServer->connected()->prepare($sql);
        $delete_stmt->bindParam(':id', $id);
        if($delete_stmt->execute()) {

            unlink($dir.$img_name);
            return $_SESSION['insert_error'] = "ลบข้อมูลรายละเอียดผ้าทอสำเร็จ..." .
            header("location: ../silk_detail.php");

        }
        
    } else {
        echo "Access Denide";
    }




?>