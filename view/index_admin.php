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
    <title>หน้าหลัก : แอดมิน</title>
    <link rel="stylesheet" type="text/css" href="../component/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php include "index_admin_navbar.php"; ?>

    <div class="container-fluid">
        <div class="row">   
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h2 class="fs-3">ข้อมูลผ้าไหมทั้งหมด</h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">จังหวัด</th>
                        <th scope="col">ชื่อผ้าไหม</th>
                        <th scope="col">จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Fetch Silk Data
                        try {

                        $select_stmt = $db->prepare("SELECT * FROM silk_main");
                        $select_stmt->execute(); 

                            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                $db_id = $row['silk_id'];
                                $db_provice = $row['provice_id'];
                                $db_silkName = $row['silk_name'];

                                echo "<tr>";
                                echo "<td>$db_id</td>";
                                echo "<td>$db_provice</td>";
                                echo "<td>$db_silkName</td>";
                                echo "<td>
                                        <a class='btn btn-primary' href='silk_manage.php'>จัดการข้อมูลผ้าไหม</a>
                                        <a class='btn btn-secondary' href='silk_gallery_manage.php'>จัดการข้อมูลรูปภาพ</a>
                                      </td>";
                                echo "</tr>";

                            }

                        } catch (PDOException $e)  {
                            $e->getMessage();
                        }

                    ?>
                    </tbody>
                </table>
                <?php
                // Fetch Admin Data

                $select_stmt = $db->prepare("SELECT * FROM admin_user");
                $select_stmt->execute();

                ?>
                <hr class="mt-5 border border-2 border-warning">
                <h2 class="fs-3 mt-5 mb-4">ข้อมูลแอดมินในระบบทั้งหมด</h2>
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
                                <a type="button" class="btn btn-primary" href="admin_manage.php">จัดการข้อมูลแอดมิน</a>
                            </td>  
                            <?php

                            }

                            ?> 
                        </tr>
                    </tbody>
                </table>

                <?php
                // Fetch Gallery Data

                $select_stmt = $db->prepare("SELECT * FROM silk_gallery INNER JOIN silk_main on silk_gallery.silk_id = silk_main.silk_id");
                $select_stmt->execute();

                ?>
                <hr class="mt-5 border border-2 border-warning">
                <h2 class="fs-3 mt-5 mb-4">ข้อมูลแอดมินในระบบทั้งหมด</h2>
                <div class="overflow-auto list-group">
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
                                    <a type="button" class="btn btn-primary" href="silk_gallery_manage.php">จัดการข้อมูลรูปภาพ</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
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