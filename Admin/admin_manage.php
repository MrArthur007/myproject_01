<?php 
    session_start();

    if(isset($_SESSION['page_id']) == session_id()) {
    require "conf/database.php";
    include 'conf/FetchAll.php';
    include 'conf/admin_manage_inc.php';

    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $objFetchAllUser = new FetchAll;
    }
        $objFname = new FetchAll;

    if(isset($_POST['btn_insert'])) {

        $adminId = $_POST['IDdb'];
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

        if(!empty($uname && $passwd && $fname && $email && $tel)) {

            $objCheckInsert = new ManageAdmin;
            $objCheckInsert->CheckInsert($adminId ,$uname ,$passwd ,$fname ,$email ,$tel);


        } else {

            $_SESSION['insert_error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลแอดมิน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/index_admin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <!-- sidebar -->
    <?php include 'Layout/sideBar.php' ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container">
        <h2>ข้อมูลแอดมินภายในระบบ</h2>
        <p class="fs-3 text-start text-danger m-0 p-0">
            <?php 
                if(isset($_SESSION['insert_error'])) {
                    
                    echo $_SESSION['insert_error'];
                    echo("<meta http-equiv='refresh' content='3'>");
                    unset($_SESSION['insert_error']);

                } 
            ?>
        </p>
        <p class="fs-3 text-start text-success m-0 p-0">
            <?php 
                if(isset($_SESSION['insert_success'])) {

                    echo $_SESSION['insert_success'];
                    unset($_SESSION['insert_success']);

                } 
            ?>
        </p>
        <hr>
        <div class="row">
            <div class="col-md-12">
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>จัดการข้อมูลแอดมินในระบบ</h2>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-success" data-bs-toggle="modal" href="#insertAdmin" role="button"><i class="fas fa-users-cog"></i><span><b>เพิ่ม</b></span></a>					
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อยูสเซอร์</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>อีเมล์</th>
                                    <th>เบอร์โทร</th>
                                    <th>แก้ไข/ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $objFetchAllUser->FetchUser();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
            </div>
        </div>
        
        <!-- Insert Admin Modal -->
        <?php include 'Layout/insertModal.php'; ?>

        </div>

    </main>
    <!-- page-content" -->
    </div>
    <!-- page-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="JS/index_admin.js"></script>  
    <script>
        function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
</body>
</html>

<?php
    } else {
        echo "Access Denide";
    }
?>