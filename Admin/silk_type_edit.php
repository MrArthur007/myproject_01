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
    $objServer = new DB;
    
    if(!empty($_REQUEST['edit_id'])) {

        $t_id = $_REQUEST['edit_id'];

        $sql = "SELECT * FROM silk_type WHERE type_id = '$t_id'";
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
        <h2>แก้ไขข้อมูลประเภทผ้าทอ</h2>
        <p class="fs-3 text-start text-danger m-0 p-0">
            <?php 
                if(isset($_SESSION['update_error'])) {
                    echo $_SESSION['update_error'];
                    echo("<meta http-equiv='refresh' content='3'>");
                    unset($_SESSION['update_error']);
                } 
            ?>
        </p>
        <p class="fs-3 text-start text-success m-0 p-0">
            <?php 
                if(isset($_SESSION['update_success'])) {
                    echo $_SESSION['update_success'];
                    echo("<meta http-equiv='refresh' content='3'>");
                    unset($_SESSION['update_success']);
                } 
            ?>
        </p>
        <form action="conf/silk_type_update.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $type_id; ?>">
            <div class="mb-3">
                <label for="">ID</label>
                <input class="form-control" style="width: 80px;" type="number" name="U_typeId" value="<?php echo $type_id; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ประเภทผ้าทอ</label>
                <input type="text" name="typeName" value="<?php echo $type_name; ?>" class="form-control">
            </div>
            <button type="submit" name="btn_update" class="btn btn-warning" style="width:100px;">แก้ไข</button>
            <a class="btn btn-secondary" href="silk_type.php" style="width:100px;">ยกเลิก</a>
        </form>
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
            }
        }
    } else {
        echo "Access Denide";
    }
?>