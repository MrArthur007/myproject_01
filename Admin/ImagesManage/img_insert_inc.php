<?php
    session_start();
    include '../model/database.php';   

if(isset($_POST['img_insert'])){
        
    if(!empty($_FILES['img']['name'])){ 

        $dir = "../src/img_web/";
        $extension = array("jepg" ,"jpg" ,"png" ,"gif");
        $fileImg = $dir;
        $silk_id = $_POST['silk_id'];

            foreach($_FILES['img']['tmp_name'] as $key => $tmp_name) {

                $img_name = $_FILES['img']['name'][$key];
                $img_tmp = $_FILES['img']['tmp_name'][$key];
                $ext = pathinfo($img_name, PATHINFO_EXTENSION);

                if(in_array($ext,$extension)){
                    if(!file_exists($dir.$img_name)){
                        if(move_uploaded_file($img_tmp,$dir.$img_name)) {
                            
                            $silk_id = $_POST['silk_id'];

                            try {

                                $img_insert_stmt = $db->prepare("INSERT INTO silk_gallery (silk_id ,img_name ,img_url) VALUES (?,?,?)");
                                $img_insert_stmt->bindParam(1 ,$silk_id);
                                $img_insert_stmt->bindParam(2 ,$img_name);
                                $img_insert_stmt->bindParam(3 ,$dir);

                                if($img_insert_stmt->execute()) {
                            
                                    echo "<script>alert('Insert Success!!');</script>";
                                    echo "<script>window.location.href='img_insert.php';</script>";

                                }
                            
                            } catch (PDOException $e) {

                                $e->getMessage();

                                

                            }

                        }
                    } else {

                        echo "<script>alert('Images is alrady exits!!');</script>";
                        echo "<script>window.location.href='img_insert.php';</script>";
                    }
                }

            }
    } else {

        echo "<script>alert('No file select!!');</script>";
        echo "<script>window.location.href='img_insert.php';</script>";
        
    }

} else {

    echo "<script>alert('No file select!!');</script>";


}


?>