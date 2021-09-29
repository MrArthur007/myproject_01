<?php

    session_start();
    include('model/database.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ ผู้ดูแลระบบ</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="component/css/bootstrap.min.css">
    <style>

        body {
            background-image: url(src/img/login_bg.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .vertical-center {
            min-height: 100%;  
            min-height: 100vh; 

            display: flex;
            align-items: center;
        }

        .container {
            opacity: .9;
            color: black;
        }

    </style>
</head>
<body>

    <div class="jumbotron vertical-center">
        <div class="container bg-light bg-gradient p-0 w-50 rounded-3 shadow-lg">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active fs-3 link-warning" data-bs-toggle="tab" href="#login">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 link-warning" data-bs-toggle="tab" href="#register">REGISTER</a>
                </li>
            </ul>
            <!-- Tab Panes -->
            <div class="tab-content">
                <!-- Login Tab Pane -->
                <div role="tabpanel" class="tab-pane fade show active" id="login">
                    <!-- Login Form -->
                    <div class="p-5">
                        <form action="controller/login_db.php" method="post">
                            <p class="text-center bg-warning p-3 rounded-3 fs-1 fw-bold text-light" style="text-shadow: 1px 1px 6px grey;">LOGIN</p>
                            <!-- Show Error Session Login -->
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="error fs-7 text-danger p-2">
                                    <h3 class="text-center">
                                        <?php 
                                            echo  $_SESSION['error'];
                                            unset($_SESSION['error']);
                                        ?>
                                    </h3>
                                </div>
                            <?php endif ?>

                            <?php if (isset($_SESSION['regis_complete'])) : ?>
                                <div class="error fs-7 text-success p-2">
                                    <h3 class="text-center">
                                        <?php 
                                            echo  $_SESSION['regis_complete'];
                                            unset($_SESSION['regis_complete']);
                                        ?>
                                    </h3>
                                </div>
                            <?php endif ?>

                            <div class="mb-3 mt-4">
                                <label for="" class="form-label fs-4">Username</label>
                                <input type="text" name="user_id" class="form-control fs-5 border border-dark" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label fs-4">Password</label>
                                <input type="password" name="passwd" class="form-control fs-5 border border-dark" id="exampleInputPassword1" placeholder="Enter your password" maxlength="6">
                                <div class="fs-7 text-danger p-2">* รหัสอย่างน้อย 6 ตัวอักษร</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning fs-4 shadow-lg" name="login_button">เข้าสู้ระบบ</button>
                                <button type="submit" onclick="window.history.go(-1); return false;" class="btn btn-secondary fs-4 shadow-lg">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Tab Pane -->
                <div role="tabpanel" class="tab-pane fade" id="register">
                    <!-- Register Form -->
                    <div class="p-5">
                        <form action="controller/login_db.php" method="post">
                            <p class="text-center bg-warning p-3 rounded-3 fs-1 fw-bold text-light" style="text-shadow: 1px 1px 6px grey;">REGISTER</p>
                            <!-- Show Error Session Register -->
                            <?php if (isset($_SESSION['regis_error'])) : ?>
                                <div class="error fs-7 text-danger p-2">
                                    <h3 class="text-center">
                                        <?php 
                                            echo  $_SESSION['regis_error'];
                                            unset($_SESSION['regis_error']);
                                        ?>
                                    </h3>
                                </div>
                            <?php endif ?>

                                <div class="mb-3 mt-4">
                                    <label for="" class="form-label fs-4">Enter Username</label>
                                    <input type="text" name="regis_user_id" class="form-control fs-5 border border-dark" placeholder="Enter your username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fs-4">Enter Password</label>
                                    <input type="password" name="regis_passwd" class="form-control fs-5 border border-dark" id="exampleInputPassword1" placeholder="Enter your password" maxlength="6">
                                    <div class="fs-7 text-danger p-2">* รหัสอย่างน้อย 6 ตัวอักษร</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fs-4">Enter Fullname</label>
                                    <input type="text" name="fullname" class="form-control fs-5 border border-dark" placeholder="ชื่อ - นามสกุลจริง">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fs-4">Email address</label>
                                    <input type="email" name="email" class="form-control fs-5 border border-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fs-4">Phone number</label>
                                    <input type="tel" name="phone_num" class="form-control fs-5 border border-dark" maxlength="11" placeholder="000-0000000" pattern="[0-9]{3}-[0-9]{7}" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning fs-4 shadow-lg" name="regis_button">สมัครสมาชิก</button>
                                    <button type="submit" onclick="window.history.go(-1); return false;" class="btn btn-secondary fs-4 shadow-lg">ยกเลิก</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="component/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
</body>
</html>