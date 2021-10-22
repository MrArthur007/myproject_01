<?php

    require_once '../model/database.php';

    if(!empty($_REQUEST['delete_id'])){

        $id = $_REQUEST['delete_id'];

        $delete_stmt = $db->prepare('DELETE FROM admin_user WHERE user_id = :id');
        $delete_stmt->bindParam(':id', $id);
        if($delete_stmt->execute()) {

            echo "<script>alert('Delete Admin Success!!');</script>";
            echo "<script>window.location.href='admin_manage.php';</script>";
        }
        
    } else {

        echo "Access Denide";

    }




?>