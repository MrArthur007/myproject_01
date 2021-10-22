<?php

    session_start();
    $_SESSION['page_id'] = session_id();
    require 'Admin/conf/database.php';
    include 'Admin/LoginAdmin/login_db.php';

    if (isset($_POST['btn_login'])) {

        $username = $_POST['login_uname'];
        $password = $_POST['login_passwd'];

        if (!empty($username && $password)) {

            $objLogin = new LoginRegis;
            $objLogin->Login($username ,$password);

        } else {

            if(empty($username)) {
                $_SESSION['error'] = "กรุณากรอกไอดีผู้ใช้งาน";
            }

            if(empty($password)) {
                $_SESSION['error'] = "กรุณากรอกพาสเวิรด์";
            }

            if(empty($username) && empty($password)){
                $_SESSION['error'] = "กรุณากรอกไอดี และ พาสเวิรด์";
            }

        }

    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบแอดมิน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="src/CSS/login_admin.css" rel="stylesheet"> 
</head>
<body>
    
    <section>
        <div class="container rounded-2 border border-2 border-light">
            <div class="user signinBx">
                <div class="Box"><img class="rounded-2" src="src/img_02/login_bg_02.jpg" alt="" /></div>
                <div class="formBx">
                <form method="post">
                    <h2>เข้าสู่ระบบแอดมิน</h2>
                    <p class="text-center text-danger p-0 m-0">
                        <?php 
                            if(isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            } 
                        ?>
                    </p>
                    <p class="text-center text-success p-0 m-0">
                        <?php 
                            if(isset($_SESSION['success'])) {
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            } 
                        ?>
                    </p>
                    <input type="text" name="login_uname" placeholder="ไอดีผู้ใช้งาน" />
                    <input type="password" name="login_passwd" placeholder="รหัสผ่าน" maxlength="6" />
                    <input type="submit" name="btn_login" value="เข้าสู่ระบบ">
                </form>
                </div>
            </div>
                          
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>     
</body>
</html>