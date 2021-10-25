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

    if(isset($_POST['btn_insert'])) {

        $s_id = $_POST['s_id'];
        $type_id = $_POST['type_id'];
        $title = $_POST['title'];
        $s_prov = $_POST['s_prov'];
        $s_detail = $_POST['s_detail'];
        if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])) {
            $extension = array("jpeg" ,"jpg" ,"png");
            $target = 'conf/silk_detail_img/';

            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $ext = pathinfo($file_name,PATHINFO_EXTENSION);

            if(in_array($ext ,$extension)) {
                if(!file_exists($target.$file_name)) {
                    if(move_uploaded_file($file_tmp,$target.$file_name)) {
                        $file_name = $file_name;
                    } else {
                        $_SESSION['insert_error'] = "เพิ่มไฟล์เข้า folder ไม่สำเร็จ...";
                    }
                } else {
                    $newFilename = time().$file_name; 
                    if(move_uploaded_file($file_tmp,$target.$newFilename)) {
                        $file_name= $newFilename;
                    } else {
                        $_SESSION['insert_error'] = "เพิ่มไฟล์เข้า folder ไม่สำเร็จ...";
                    }
                }
            } else {
                $_SESSION['insert_error'] = "ประเภทไฟล์ไม่ถูกต้อง...";
            }

            if(!empty($type_id AND $file_name AND $title AND $s_prov AND $s_detail)) {

                $objSilkDetail->insertSilkDetail($s_id , $type_id ,$file_name ,$title ,$s_prov ,$s_detail);
    
            } else {
    
                $_SESSION['insert_error'] =  "กรุณากรอกข้อมูลให้ครบถ้วน...";
    
            }

        } else {
            $_SESSION['insert_error'] = "ไม่ได้เลือกรูป...";
        }

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
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">ลำดับ</label>
                        <input class="form-control" style="width: 80px;" type="number" name="s_id">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3 mt-3">
                            <img id="output" class="rounded" width="250" height="250">
                        </div>
                        <input type="file" name="image" class="form-control w-50" onchange="loadFile(event)" require>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="">ประเภทผ้าทอ</label>
                        <select class="form-select" aria-label="Default select example" name="type_id">
                            <?php $objSilkType->FetchAllSilkTypeForInsert(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">ชื่อผ้าทอ</label>
                        <input class="form-control" type="text" name="title" placeholder="ชื่อหัวข้อ" />
                    </div>
                    <div class="mb-3">
                        <label for="">จังหวัด</label>
                        <select class="form-select" aria-label="Default select example" name="s_prov">
                            <?php $objFetchAll->FetchProvice(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดผ้าทอ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="s_detail"></textarea>
                    </div>
                    <input class="btn btn-success rounded" type="submit" name="btn_insert" value="Insert">
                    <button class="btn btn-secondary">Cancle</button>
                </form>

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
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>
</html>

<?php
    } else {
        echo "Access Denide";
    }
?>