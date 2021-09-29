<?php 
    session_start();
    include '../model/database.php';
    if(isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    } 

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="../component/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php include "index_admin_navbar.php"; ?>
    <?php

        $select_stmt = $db->prepare("SELECT * FROM silk_gallery INNER JOIN silk_main on silk_gallery.silk_id = silk_main.silk_id");
        $select_stmt->execute();

    ?>
    <div class="container-fluid">
        <div class="row">   
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index_admin.php">
                            <span class="ml-2">หน้าหลัก</span>
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="silk_manage.php">
                               <span class="ml-2">จัดการข้อมูลผ้าไหม</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="silk_gallery_manage.php">
                               <span class="ml-2">จัดการข้อมูลรูปภาพ</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_manage.php">
                               <span class="ml-2">จัดการข้อมูลแอดมิน</span>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../login_admin.php">
                            <span class="ml-2">ออกจากระบบ</span>
                          </a>
                        </li>
                      </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">จัดการข้อมูลรูปภาพ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h2 class="fs-3">ข้อมูลรูปภาพทั้งหมด</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">img id</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">รูป</th>
                            <th scope="col">ชื่อรูป</th>
                            <th scope="col">URL</th>
                            <th scope="col">จัดการข้อมูลรูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row); 
                        ?>
                        <tr>
                            <th scope="row"><?php echo $img_id; ?></th>
                            <td><?php echo $silk_name; ?></td>
                            <td><img src="../src/img_web/<?php echo $img_name; ?>" class="img-thumbnail" width="200" height="200" alt="..."></td>
                            <td><?php echo $img_name; ?></td>
                            <td><?php echo $img_url; ?></td>
                            <td>
                                <a type="button" class="btn btn-success" href="img_insert.php">เพิ่ม</a>
                                <a type="button" class="btn btn-warning" href="">แก้ไข</a>
                                <a type="button" class="btn btn-danger" href="">ลบ</a>
                            </td>
                        </tr>

                    </tbody>
                    <?php

                    }

                    ?> 
                    </table>

            </main>
        </div>
    </div>

  

<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="../component/js/bootstrap.min.js"></script>


</body>
</html>