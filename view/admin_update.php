<?php

    session_start();
    include '../model/database.php'; 
    
    if(isset($_POST['btn_update'])) {

        $user_id = $_POST['user_id'];

        $uname = $_POST['username'];
        $passwd = $_POST['password'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $pnum = $_POST['phone_num'];

        try {

            $update_stmt = $db->prepare("UPDATE admin_user SET username = :uname ,password= :passwd ,fullname = :fname ,email = :email ,phone_num = :pnum WHERE user_id = '$user_id'");
            $update_stmt->bindParam(":uname" ,$uname);
            $update_stmt->bindParam(":passwd" ,$passwd);
            $update_stmt->bindParam(":fname" ,$fname);
            $update_stmt->bindParam(":email" ,$email);
            $update_stmt->bindParam(":pnum" ,$pnum);

            if($update_stmt->execute()) {

                echo "<script>alert('Update Successful')</script>";
                echo "<script>window.location.href='admin_manage.php'</script>";

            }

        } catch (PDOException $e) {

            $e->getMessage();

        }
    }



?>