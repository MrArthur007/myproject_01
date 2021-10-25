<?php

    require 'conf/database.php';
    $objServer = new DB;

    if($_REQUEST['page_id']) {

        $s_id = $_REQUEST['page_id'];

        $sql = "SELECT * FROM silk_data INNER JOIN silk_type ON silk_data.type_id = silk_type.type_id WHERE silk_data.silk_id = '$s_id'";
        $select_stmt = $objServer->connected()->prepare($sql);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เว็บผ้าทอภาคเหนือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        .container-fluid {
            height: 100%;
            overflow-y: hidden; /* don't show content that exceeds my height */
        }
        body {
            background-image: url("src/img/index_bg.jpg");
            background-size: cover;
            background-color: #cccccc;
            height: 100%;
        }

        .list-menu-custom:hover {
            background-color: grey;
            color: white;
        
        }
        .active-list-menu-custom {
            background-color: lightgrey;
        }
    </style>
</head>
<body>

    <?php include 'Layout/nav-bar-silkshow.php'; ?>
    <div class="container-fluid bg-light h-100 p-4">
        <div class="row p-4 text-center">
            <h3 class="mt-3 mb-4"><b>รายละเอียด : </b><?php echo $row['title']; ?></h3>
            <div class="col-5 me-5 p-4 border border-2 rounded-3">
                <img src="Admin/conf/silk_detail_img/<?php echo $row['images']; ?>" id="preview" class="img-fluid rounded-2" width="100%" height="100%" alt="">
                <?php 
                    $sql_gallery = "SELECT * FROM silk_gallery WHERE silk_id = '$s_id'"; 
                    $select_gallery = $objServer->connected()->prepare($sql_gallery);
                    $select_gallery->execute();
                    $result = $select_gallery->fetchAll();
                ?>
                <div class="d-flex overflow-auto mt-3">
                    <div class="col-3 me-2">
                        <img src="Admin/conf/silk_detail_img/<?php echo $row['images']; ?>" class="img-fluid rounded-2" width="100%" onclick="preview(this.src)" alt="">
                    </div>
                <?php foreach ($result as $key => $row_gal) { ?>
                    <div class="col-3 me-2">
                        <img src="Admin/conf/silk_gallery/<?php echo $row_gal['img_name']; ?>" class="img-fluid" width="100%" onclick="preview(this.src)">
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="col-6 p-3 text-start">
                <p class="fs-4"><b>ประเภทผ้าทอ : </b> <?php echo $row['type_name']; ?></p>
                <p class="fs-4"><b>จังหวัด : </b> <?php echo $row['silk_provice']; ?></p>
                <p class="fs-5"><b>รายละเอียด : </b> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['silk_detail']; ?></p>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function preview(src) {
            document.getElementById('preview').src = src;
        }
    </script>
</body>
</html>


<?php 
    } else {
        echo "Access Denide";
    }
?>