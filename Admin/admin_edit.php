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

        $id = $_REQUEST['edit_id'];

        $sql = "SELECT * FROM admin_user WHERE user_id = '$id'";
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
        <h2>แก้ไขข้อมูลแอดมินภายในระบบ</h2>
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
        <form action="conf/admin_update.php" method="post">

            <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="">ID</label>
                <input class="form-control" style="width: 80px;" type="number" name="U_IDdb" value="<?php echo $id; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="edit_uname" value="<?php echo $username; ?>" class="form-control">
            </div>
            <div class="">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" id="myInput" name="u_passwd" value="<?php echo $password; ?>" class="form-control" maxlength="6" id="exampleInputPassword1">
                <div class="p-2">
                    <input type="checkbox" onclick="myFunction()"> <span class="fs-6">Show Password</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">fullname</label>
                <input type="text" name="u_fname" value="<?php echo $fullname; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="u_email" value="<?php echo $email; ?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="">Tel.</label>
                <input class="form-control" name="u_tel" value="<?php echo $phone_num; ?>" type="tel" pattern="[0-9]{3}-[0-9]{7}" maxlength="11"/>
            </div>
            <button type="submit" name="btn_update" class="btn btn-warning">Update</button>
            <input class="btn btn-secondary" onclick="history.back()" value="Cancel">
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
            }
        }
    } else {
        echo "Access Denide";
    }
?>