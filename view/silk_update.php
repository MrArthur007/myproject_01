<?php

    session_start();
    include '../model/database.php'; 
    
    if(isset($_POST['btn_update'])) {

        $silk_id = $_POST['silk_id'];

        $prov_id = $_POST['silk_provice'];
        $silk_name = $_POST['silk_name'];
        $silk_des = $_POST['silk_des'];

        try {

            $update_stmt = $db->prepare("UPDATE silk_main SET provice_id = :provice_id ,silk_name = :silk_name ,silk_description = :silk_des WHERE silk_id = '$silk_id'");
            $update_stmt->bindParam(":provice_id" ,$prov_id);
            $update_stmt->bindParam(":silk_name" ,$silk_name);
            $update_stmt->bindParam(":silk_des" ,$silk_des);

            if($update_stmt->execute()) {

                echo "<script>alert('Update Successful')</script>";
                echo "<script>window.location.href='silk_manage.php'</script>";

            }

        } catch (PDOException $e) {

            $e->getMessage();

        }
    }



?>