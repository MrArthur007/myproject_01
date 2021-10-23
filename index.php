<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เว็บผ้าทอภาคเหนือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-image: url("src/img/index_bg.jpg");
            background-size: cover;
            background-color: #cccccc;
        }
    </style>
</head>
<body>

    <?php include 'Layout/nav-bar.php'; ?>
    <div class="container border border-warning border-2 bg-light p-3 mt-3 mb-3">
        <div class="row">
            <div class="col mb-5">
                <?php include 'Layout/carousel.php'; ?>
            </div>
            <div class="w-100"><hr class="m-auto border border-2 border-dark"></div>
            <div class="col mt-5 mb-3">
                <h2 class="fs-1 text-center p-3">จังหวัดทั้งหมดในภาคเหนือ</h2>
                <div class="text-center mt-2 mb-2">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">เชียงใหม่</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">เชียงราย</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">พะเยา</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">ลำพูน</button>
                        </div>
                        <div class="w-100 p-2"></div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">ลำปาง</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">แพร่</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">น่าน</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-success w-100">แม่ฮ่องสอน</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>