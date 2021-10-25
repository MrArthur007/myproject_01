<?php

    require 'conf/database.php';
    $objServer = new DB;
    $sql = "SELECT * FROM silk_type";

    $select_stmt = $objServer->connected()->prepare($sql);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll();

    $sql_card = "SELECT * FROM silk_data INNER JOIN silk_type ON silk_data.type_id = silk_type.type_id";
    if(isset($_GET['type_id']) && !empty($_GET['type_id'])){
        $sql_card .= " WHERE silk_data.type_id = '".$_GET['type_id']."'";
    }
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $sql_card .= " WHERE silk_data.title OR silk_data.silk_provice LIKE '%".$_GET['search']."%'";
    }
    $select_stmt_card = $objServer->connected()->prepare($sql_card);
    $select_stmt_card->execute();
    $result_data = $select_stmt_card->fetchAll();
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        body {
            background-image: url("src/img/index_bg.jpg");
            background-size: cover;
            background-color: #cccccc;
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
    <div class="container-fluid text-center bg-light">
        <div class="row p-4">
            <h3 class="">รายการผ้าทอภาคเหนือ</h3>
            <div class="position-static top-0 end-0">
                <div class="col-2">
                    <form action=" " method="get">
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="ค้นหา" value="<?=(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <ul class="list-group mt-4">
                    <li class="list-group-item bg-dark text-white p-3">ประเถทผ้าทอ</li>
                        <a href="silk_show.php" class="list-group-item text-dark list-menu-custom active-list-menu-custom">ทั้งหมด</a>
                    <?php foreach ($result as $row) { ?>
                        <a href="?type_id=<?php echo $row['type_id']; ?>" class="list-group-item text-dark list-menu-custom"><?php echo $row['type_name']; ?></a>
                    <?php } ?>
                </ul>
            </div>
            <div class="d-flex col-8">
                <?php foreach ($result_data as $row_data) { ?>
                <div class="d-flex col-12 col-sm-4 p-4">
                    <div class="card p-3">
                        <img src="Admin/conf/silk_detail_img/<?php echo $row_data['images']; ?>" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $row_data['title']; ?></h5>
                        <p class="card-text">ประเภทผ้าทอ : <?php echo $row_data['type_name']; ?></p>
                        <a href="silk_detail.php?page_id=<?php echo $row_data['silk_id']; ?>" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>