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
    <title>เพิ่มรูปภาพผ้าไหม</title>
    <link rel="stylesheet" type="text/css" href="../component/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php include "index_admin_navbar.php"; ?>
    <?php  

  
    try {

        $select_stmt = $db->prepare("SELECT * FROM silk_main");
        $select_stmt->execute(); 

    } catch (PDOException $e) {
        $e->getMessage();
    }
    
    $result = $select_stmt->fetchAll();
    
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
                          <a class="nav-link" href="#">
                            <span class="ml-2">ออกจากระบบ</span>
                          </a>
                        </li>
                      </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Insert Images</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h2 class="fs-3">เพิ่มรูปภาพผ้าไหม</h2>

                <form action="img_insert_inc.php" method="post" enctype="multipart/form-data" class="border border-2 p-2 rounded-2">
                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">ชื่อผ้าไหม</label>
                            <select class="form-select" name="silk_id" aria-label="Default select example">
                                <?php foreach ($result as $value) { ?>
                                    <option value="<?php echo $value["silk_id"]; ?>"><?php echo $value["silk_name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" name="img[]" id="formFile" multiple/>
                        </div>
                  
                        <div class="w-100 m-3"></div>
                        <div class="col">
                            <button type="submit" class="btn btn-success border border-1" name="img_insert">Insert</button>
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-light border border-1">Cancle</button>
                        </div>
                    </div>
                </form>

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