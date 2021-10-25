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

    if(!empty($_REQUEST['page_id'])) {

        $s_id = $_REQUEST['page_id'];

        $sql = "SELECT * FROM silk_data INNER JOIN silk_type ON silk_data.type_id = silk_type.type_id WHERE silk_data.silk_id = '$s_id'";
        $select_edit_stmt = $objServer->connected()->prepare($sql);
        $select_edit_stmt->execute();
        $row = $select_edit_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        if(isset($_POST['btn_insert'])) {

            $s_id = $_POST['s_id'];

            if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])) {
                $extension = array("jpeg" ,"jpg" ,"png");
                $target = 'conf/silk_gallery/';
    
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
    
                if(!empty($s_id AND $file_name)) {
    
                    try {

                        $sql = "INSERT INTO silK_gallery (silk_id ,img_name) VALUES (?,?)";
        
                        $insert_stmt = $objServer->connected()->prepare($sql);;
                        $insert_stmt->bindParam(1, $s_id);
                        $insert_stmt->bindParam(2, $file_name);
        
                        if($insert_stmt->execute()) {
        
                           $_SESSION['insert_success'] = "การเพิ่มข้อมูลเสร็จสมบูรณ์...";
        
                        }
            
                        
                    } catch (PDOException $error) {
                        $error->getMessage();
                    }
        
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
    <title>การจัดแกลลอรี่ผ้าทอ</title>
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
        <h2>การจัดการแกลลอรี่ : <?php echo $type_name; ?></h2>
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
            <div class="col bg-light border border-1">
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="s_id" value="<?php echo $silk_id; ?>">
                    <div class="mb-3 text-center">
                        <div class="mb-3 mt-3">
                            <img id="output" class="rounded" width="300" height="300">
                        </div>
                        <input type="file" name="image" class="form-control w-75 m-auto" onchange="loadFile(event)" require>
                        <div class="mb-3 mt-3">
                            <button class="btn btn-success" name="btn_insert">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 ms-2 bg-light border border-1" >
            <div class="container table-responsive py-5">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark text-center">
                        <tr>
                        <th scope="col" style="width: 80px;">ลำดับ</th>
                        <th scope="col" style="width: 120px;">รูป</th>
                        <th scope="col" style="width: 80px;">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $objSilkDetail->FetchGallery($s_id); ?>
                    </tbody>
                </table>
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
        

    } else {
        echo "Access Denide";
    }
?>