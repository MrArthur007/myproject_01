<?php 
    session_start();
    require_once('database.php');
    $objServer = NEW DB;

    if (isset($_REQUEST['btn_update'])) {
            $id = $_POST['silk_id'];
            $s_id = $_POST['s_id'];
            $type_id = $_POST['type_id'];
            $img_Oname = $_POST['img_oldName'];
            $title = $_POST['title'];
            $s_prov = $_POST['s_prov'];
            $s_detail = $_POST['s_detail'];

            $image_file = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];

            $path = "silk_detail_img/".$image_file;
            $directory = "silk_detail_img/"; 

        if ($image_file) {
            if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                if (!file_exists($path)) { 
            
                    unlink($directory.$img_Oname); 
                    move_uploaded_file($temp, 'silk_detail_img/'.$image_file); 

                } else {
                    $_SESSION['insert_error'] = "มีไฟล์อยู่ในโฟล์เดอร์แล้ว...";
                    header("location: ../silk_detail_edit.php?edit_id=$s_id&&provice_name=$s_prov");
                }
            } else {
                $_SESSION['insert_error'] = "ประเภทไฟล์ไม่ถูกต้อง...";
                header("location: ../silk_detail_edit.php?edit_id=$s_id&&provice_name=$s_prov");
            }
        } else {
            $image_file = $img_Oname; 
        }
    
        if(!empty($image_file)) {

            try {
                $sql = "UPDATE silk_data SET silk_id = :s_id, type_id = :type_id ,images = :img ,title = :title ,silk_provice = :s_prov ,silk_detail = :s_detail WHERE silk_id = :id";
                $update_stmt = $objServer->connected()->prepare($sql);
                $update_stmt->bindParam(':s_id', $s_id);
                $update_stmt->bindParam(':type_id', $type_id);
                $update_stmt->bindParam(':img', $image_file);
                $update_stmt->bindParam(':title', $title);
                $update_stmt->bindParam(':s_prov', $s_prov);
                $update_stmt->bindParam(':s_detail', $s_detail);
                $update_stmt->bindParam(':id' ,$id);
                

                if ($update_stmt->execute()) {

                    header("location: ../silk_detail_edit.php?edit_id=$s_id&&provice_name=$s_prov") . $_SESSION['insert_success'] = "การแก้ไขรายละเอียดผ้าทอเสร็จสมบูรณ์...";
                    
                }
            
                
            } catch(PDOException $e) {
                $e->getMessage();
            }

        } else {
            return $_SESSION['insert_error'] = "มีข้อผิดพลาดบางอย่าง...";
            header("location: ../silk_detail_edit.php?edit_id=$s_id&&provice_name=$s_prov");

        }
    
    
    
    }


?>