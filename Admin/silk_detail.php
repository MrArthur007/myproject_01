<?php 
    session_start();
    if(isset($_SESSION['page_id']) == session_id()) {
    require "conf/database.php";
    include 'conf/FetchAll.php';
    include 'conf/silk_manage_inc.php';
    include 'conf/silk_detail_inc.php';
    $objFname = new FetchAll;   
    $objSilkType = new ManageSilkType;
    $objFetchAll = new FetchAll;
    $objSilkDetail = new silkDetail;
    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $objFetchAllUser = new FetchAll;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจัดการรายละเอียดข้อมูลผ้าทอ</title>
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
        <h2>ข้อมูลรายละเอียดผ้าทอ</h2>
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
                    echo("<meta http-equiv='refresh' content='3'>");
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
                                    <h2>ตารางข้อมูลรายละเอียดผ้าทอ</h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="silk_detail_insert.php" class="btn btn-success p-2 ps-3 pe-3 rounded"><i class="fas fa-plus-square"></i><span><b>เพิ่มรายละเอียดผ้าทอ</b></span></a>						
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 80px;">ลำดับ</th>
                                    <th style="width: 120px;">ประเภทผ้าทอ</th>
                                    <th style="width: 120px;">รูปภาพ</th>
                                    <th style="width: 120px;">ชื่อผ้าทอ</th>
                                    <th style="width: 120px;">จังหวัด</th>
                                    <th style="width: 200px;">รายละเอียด</th>
                                    <th class="text-truncate" style="width: 180px;">แก้ไข/จัดการรูปภาพ/ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $objSilkDetail->FetchAllDetail(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
            </div>

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
</body>
</html>

<?php
    } else {
        echo "Access Denide";
    }
?>