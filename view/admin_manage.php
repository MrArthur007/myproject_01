<?php 
    session_start();
    include '../model/database.php';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลแอดมิน</title>
    <link rel="stylesheet" type="text/css" href="../component/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php include "index_admin_navbar.php"; ?>
    <?php     

    $select_stmt = $db->prepare("SELECT * FROM admin_user");
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
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h2 class="fs-3">แก้ไขข้อมูลแอดมิน</h2>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">AdminID</th>
                            <th scope="col">username</th>
                            <th scope="col">password</th>
                            <th scope="col">ชื่อ - นามสกุล</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">เบอร์โทรศัพย์</th>
                            <th scope="col">จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row); 
                        ?>
                        <tr>
                            <td><?php echo $user_id; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $password; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone_num; ?></td>
                            <td>
                                <a type="button" class="btn btn-success" href="admin_insert.php">เพิ่ม</a>
                                <a type="button" class="btn btn-warning" href="admin_edit.php?admin_id=<?php echo $user_id; ?>">แก้ไข</a>
                                <a type="button" class="btn btn-danger" href="admin_delete.php?delete_id=<?php echo $user_id; ?>">ลบ</a>
                            </td>  
                            <?php

                            }

                            ?> 
                        </tr>
                    </tbody>
                </table>


                </div>

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