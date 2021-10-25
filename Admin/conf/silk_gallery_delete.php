<?php
    session_start();

    require 'database.php';
    $objServer = new DB;
    if(!empty($_REQUEST['delete_id'])){

        $id = $_REQUEST['delete_id'];
        $page_id = $_GET['page_id'];
        $img_name = $_GET['img_name'];
        $dir = "silk_gallery/";

        $sql = "DELETE FROM silk_gallery WHERE img_id = :id";
        $delete_stmt = $objServer->connected()->prepare($sql);
        $delete_stmt->bindParam(':id', $id);
        if($delete_stmt->execute()) {

            unlink($dir.$img_name);
            return $_SESSION['insert_error'] = "ลบข้อมูลรายละเอียดผ้าทอสำเร็จ..." .
            header("location: ../silk_gallery.php?page_id=$page_id");

        }
        
    } else {

        echo "Access Denide";

    }

?>