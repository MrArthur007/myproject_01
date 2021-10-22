<?php 
    session_start();
    include('../model/database.php');

    $errors;
    $regis_error;

    // Login to Database
    if (isset($_POST['login_button'])) {

        $username = $_POST['user_id'];
        $password = $_POST['passwd'];


        if (!empty($username && $password)) {
            
            try {

                $login_stmt = $db->prepare("SELECT * FROM admin_user WHERE username = :uname AND password = :pass");
                $login_stmt->bindParam(":uname" ,$username);
                $login_stmt->bindParam(":pass" ,$password);
                $login_stmt->execute();

                while ($row = $login_stmt->fetch(PDO::FETCH_ASSOC)) {

                    $db_userID = $row['user_id'];
                    $db_user = $row['username'];
                    $db_pass = $row['password'];


                }

                if($username == $db_user AND $password == $db_pass) {

                    $_SESSION['user_id'] = $db_userID;
                    $_SESSION['login'] = $username;
                    $_SESSION['success'] =  "<script>alert('Login!!');</script>";
                    header("location: ../view/index_admin.php");

                } else {

                    $_SESSION['error'] = "Wrong Username or Password!";
                    header("location: ../login_admin.php");

                }

            } catch (PDOException $e) {
                $e->getMessage();
            }

        } else {

            if(empty($username)) {
                $_SESSION['error'] = "Username is Required";
                header("location: ../login_admin.php");
            }

            if(empty($password)) {
                $_SESSION['error'] = "Password is Required";
                header("location: ../login_admin.php");
            }

            if(empty($username) && empty($password)){
                $_SESSION['error'] = "Username & Password is required";
                header("location: ../login_admin.php");
            }

        }
    }

    // Register to Database
    if(isset($_POST['regis_button'])) {
        
        $regis_uname = $_POST['regis_user_id'];
        $regis_passwd = $_POST['regis_passwd'];
        $regis_fname = $_POST['fullname'];
        $regis_email = $_POST['email'];
        $regis_pnum = $_POST['phone_num'];
        


        if(!empty($regis_uname && $regis_passwd && $regis_fname && $regis_email && $regis_pnum)) {

                try {

                    $insert_stmt = $db->prepare("INSERT INTO admin_user (username ,password ,fullname ,email ,phone_num) VALUES (?,?,?,?,?)");
                    $insert_stmt->bindParam(1, $regis_uname);
                    $insert_stmt->bindParam(2, $regis_passwd);
                    $insert_stmt->bindParam(3, $regis_fname);
                    $insert_stmt->bindParam(4, $regis_email);
                    $insert_stmt->bindParam(5, $regis_pnum);
                    
                    if($insert_stmt->execute()){

                        $_SESSION['regis_complete'] = "Your Registered Now Login!!";
                        header("location: ../login_admin.php");

                    } else {
                
                        header("location: ../login_admin.php");
        
                    }
                } catch (PDOException $e) {

                    $e->getMessage();

                }

        } else {
                $_SESSION['regis_error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
                header("location: ../login_admin.php");
        }


    }

?>
