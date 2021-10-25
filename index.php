<?php

    require 'conf/database.php';
    $objServer = new DB;
    $sql = "SELECT * FROM silk_data INNER JOIN silk_type ON silk_data.type_id = silk_type.type_id LIMIT 3";

    $select_stmt = $objServer->connected()->prepare($sql);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll();

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
        body {
            background-image: url("src/img/index_bg.jpg");
            background-size: cover;
            background-color: #cccccc;
        }
        html, body {
            height: 100%;
        }
        .container-fluid {
            height: 100%;
            overflow-y: hidden; /* don't show content that exceeds my height */
        }
    </style>
</head>
<body>

    <?php include 'Layout/nav-bar.php'; ?>
    <div class="container border border-light border-1 rounded bg-light mt-3 mb-3">
        <div class="row align-items-center h-100">
            <div class="col mx-auto">
                <img src="fixed_image/index_img_01.jpg" class="img-fluid rounded-3 m-auto" data-aos="zoom-in" data-aos-duration="1800" alt="">
            </div>
            <div class="col bg-dark text-light p-3 m-3 rounded-3">
                <h1 class="fs-2" data-aos="fade-left" data-aos-duration="1600"><b>ผ้าทอภาคเหนือ</b></h1>
                <p class="fs-6" data-aos="fade-left" data-aos-duration="1800">&nbsp;&nbsp;&nbsp;&nbsp;ผ้าทอในบริเวณภาคเหนือ หรือ 
                ล้านนาในปัจจุบันคือบริเวณภาคเหนือ ได้แก่จังหวัดเชียงราย พะเยา ฃำพูน ฃำปาง 
                แพร่ น่าน เชียงใหม่ และ แม่ฮ่องสอน จนถึงดินแดนบางส่วนของประเทศพม่า ประเทศจีน และ ลาว
                </p>
                <p class="fs-6" data-aos="fade-left" data-aos-duration="1800">
                &nbsp;&nbsp;&nbsp;&nbsp;
                จากประวัติศาสตร์และลักษณะภูมิประเทศดังกล่าว ทำให้ภาคเหนือเป็นดินแดนที่มีขนบประเพณีวัฒนธรรมเป็นของตัวเอง โดยเฉพาะกลุ่มไทยวนหรือโยนก 
                ปัจจุบันเรียกตนเองว่า “ไทยวน” แต่เดิมมักเรียก “ลาวพุงดำ” เพราะนิยมสักลายตรงบริเวณต้นขาและหน้าทอง ไทยวนเป็นชนกลุ่มใหญ่ที่ตั้งถิ่นฐานอยู่บริเวณจังหวัดเชียงใหม่
                ลำพูน และ ลำปาง ไทลื้อเป็นอีกกลุ่มหนึ่งที่มีจำนวนมากรองจากไทยวน ไทลื้อตั้งถิ่นฐานอยู่บริเวณจังหวัดเชียงราย พะเยา และ น่าน นอกจากนี้ยังมีชนกลุ่มน้อย เช่น ลัวะ กระเหรี่ยง 
                ไทใหญ่ มอญ ตลอดไปจนภึงชายไทยภูเขาเผ่าต่างๆ เช่นแม้ว มูเซอ อีก้อ เย้า ลีซอ กระจายอยู่ในจังหวัดต่างๆ บริเวณภาคเหนือ
                </p>
            </div>
            
        </div>
        <div class="row align-items-center h-100">
            <div class="col bg-warning text-dark p-3 m-3 rounded-3">
                <h1 class="fs-3" data-aos="fade-right" data-aos-duration="1600"><b>จุดสังเกตุผ้าซิ่นภาคเหนือ</b></h1>
                <p class="fs-5" data-aos="fade-right" data-aos-duration="1800">
                    – <b class="text-success">หัวซิ่น</b> ส่วนที่อยู่ติดกับเอว มักใช้ผ้าพื้นสีขาว สีแดง หรือสีดำต่อกับตัวซิ่นเพื่อให้ซิ่นยาวพอดีกับความสูงของผู้นุ่ง และช่วยให้ใช้ได้คงทน 
                    เพราะเป็นชายพกต้องขมวดเหน็บเอวบ่อยๆ
                </p>
                <p class="fs-5" data-aos="fade-right" data-aos-duration="1800">
                    – <b class="text-info">ตัวซิ่น</b> ส่วนกลางของซิ่น กว้างตามความกว้างของฟืม ทำให้ลายผ้าขวางลำตัว มักทอเป็นริ้วๆ มีสีต่างๆ กัน เช่น ริ้วเหลืองพื้นดำ 
                    หรือทอยกเป็นตาสีเหลี่ยม หรือทอเป็นลายเล็กๆ
                </p>
                <p class="fs-5" data-aos="fade-right" data-aos-duration="1800">
                    – <b class="text-light">ตีนซิ่น</b> ส่วนล่างสุด อาจเป็นสีแดง สีดำ หรือทอลายจกเรียก ซิ่นตีนจก ชาวไทยวนนิยมทอตีนจกแคบ เช่น ซิ่นตีนจกแม่แจ่ม บริเวณอำเภอแม่แจ่ม จังหวัดเชียงใหม่ 
                    มักทอลายสี่เหลี่ยมข้าวหลามตัดอยู่ตรงกลาง เชิงล่างสุดเป็นสีแดง ซิ่นตีนจกของคหบดีหรือเจ้านายมักสอดดิ้นเงินหรือดิ้นทองให้สวยงามยิ่งขึ้น
                </p>
            </div>
            <div class="col">
                <img src="fixed_image/สังเกตุ.jpg" class="img-fluid rounded-3 m-auto" data-aos="zoom-in" data-aos-duration="1800" alt="">
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5 bg-light">
        <div class="row text-center">
            <div class="col p-3">
                <h1 class="fs-1">รายการผ้าทอภาคเหนือเบื้องต้น</h1>
            </div>
            <div class="w-100"></div>
            <?php foreach ($result as $row) { ?>
            <div class="col-12 col-sm-4 p-4">
                <div class="card p-3">
                    <img src="Admin/conf/silk_detail_img/<?php echo $row['images']; ?>" class="card-img-top img-thumbnail" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text">ประเภทผ้าทอ : <?php echo $row['type_name']; ?></p>
                    <a href="silk_detail.php?page_id=<?php echo $row['silk_id']; ?>" class="btn btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <footer class="text-center bg-light border border-top">
        <p>
            @LandWare Coporation : 
            <a href="login_admin.php">ไปยังหน้าแอดมิน</a>
        </p>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>