<?php 
    session_start();
    if(isset($_SESSION['page_id']) == session_id()) {
    require "conf/database.php";
    include 'conf/FetchAll.php';
    include 'conf/silk_manage_inc.php';
    include 'conf/silk_detail_inc.php';
    $objServer = new DB;
    $objFname = new FetchAll;   
    $objSilkType = new ManageSilkType;
    $objFetchAll = new FetchAll;
    $objSilkDetail = new silkDetail;
    if(isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $objFetchAllUser = new FetchAll;

    }

        if(!empty($_REQUEST['edit_id'])) {

            $s_id = $_REQUEST['edit_id'];
            $prov_name = $_REQUEST['provice_name'];

            $sql = "SELECT * FROM silk_data WHERE silk_id = '$s_id'";
            $select_edit_stmt = $objServer->connected()->prepare($sql);
            $select_edit_stmt->execute();

            while ($row = $select_edit_stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

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
                <form action="conf/silk_detail_update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="silk_id" value="<?php echo $silk_id; ?>">
                    <input type="hidden" name="img_oldName" value="<?php echo $images; ?>">
                    <div class="mb-3">
                        <label for="">ลำดับ</label>
                        <input class="form-control" style="width: 80px;" type="number" name="s_id" value="<?php echo $silk_id; ?>">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3 mt-3">
                            <img id="output" src="conf/silk_detail_img/<?php echo $images; ?>" class="rounded" width="250" height="250">
                        </div>
                        <input type="file" name="image" value="" class="form-control w-50" onchange="loadFile(event)" require>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="">ประเภทผ้าทอ</label>
                        <select class="form-select" aria-label="Default select example" name="type_id">
                            <?php  $objSilkDetail->FetchAllSilkTypeSelected($s_id); ?>
                            <?php $objSilkType->FetchAllSilkTypeForInsert(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">ชื่อผ้าทอ</label>
                        <input class="form-control" type="text" name="title" value="<?php echo $title; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="">จังหวัด</label>
                        <select class="form-select" aria-label="Default select example" name="s_prov">
                            <option selected value="<?php echo $prov_name; ?>"><?php echo $prov_name; ?></option>
                            <?php $objFetchAll->FetchProvice(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดผ้าทอ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $silk_detail; ?>" placeholder="<?php echo $silk_detail; ?>" name="s_detail"><?php echo $silk_detail; ?></textarea>
                    </div>
                    <input class="btn btn-warning rounded" type="submit" name="btn_update" value="แก้ไข">
                    <a class="btn btn-secondary" href="silk_detail.php" style="width:100px;">ยกเลิก</a>
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
            }
        }

    } else {
        echo "Access Denide";
    }
?>