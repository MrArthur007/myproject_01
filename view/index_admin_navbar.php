
<?php

    include_once "../model/database.php";


        $user_id = $_SESSION['user_id'];
        
        $select_stmt = $db->prepare("SELECT * FROM admin_user WHERE user_id = '$user_id'");
        $select_stmt->execute();

        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

?>

<html>
    <nav class="navbar navbar-light bg-warning p-3">

        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="../src/img/Admin Picture.png" alt="" width="54" height="42">
            </a>
            <a class="navbar-brand text-light fs-3" href="index_admin.php">
                ผู้ดูแลระบบ เว็ปทอผ้าภาคเหนือ
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="col-12 col-md-4 col-lg-2 justify-content-center">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div>

        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Hello, <?php echo $username; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="admin_edit.php?admin_id=<?php echo $user_id; ?>">Edit Profile</a></li>
                <li><a class="dropdown-item" href="../login_admin.php">Sign Out</a></li>
            </ul>
        </div>

    </nav>
</html>

<?php
        }
?>