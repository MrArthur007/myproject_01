<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผ้าทอพื้นเมืองภาคเหนือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        #navbar-bg {

            background-image: url(src/img/index_bg.jpg);
            
        }


        .sidebar {
            position:fixed;
            background-color:#EEE;
            display:table-cell;
            height:100%;

        }

    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row navbar-main">
        <div id="navbar-bg" class="col p-4 w-100 bg-danger">
            <h1 class="text-end fs-1 text-light">ผ้าทอพื้นเมืองภาคเหนือ</h1>
        </div>
        <div class="w-100"></div>
        <div class="col m-0 p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-warning mt-10 border border-1 border-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><span class="fs-3">ผ้าทอพื้นเมืองภาคเหนือ</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><span class="fs-5">หน้าหลัก</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#"><span class="fs-5">ผลิตภัณฑ์ผ้าทอ</span></a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

   <div class="row">
       <div class="col">
        <div class="sidebar p-3 bg-light" style="width: 280px;">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Search" />
            </div>
            <buttown type="button" class="btn btn-warning text-light w-100 mt-3">
                <i class="fas fa-search">Search</i>
            </buttown>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <span class="fs-4">ผลิตภัณฑ์ผ้าทอ</span>
                <li class="nav-item">
                    <button class="btn btn-toggle align-items-center text-start w-100 rounded" data-bs-toggle="collapse" data-bs-target="#provice-collapse" aria-expanded="true">
                    <span class="fs-5">จังหวัด</span>
                    </button>
                    <div class="collapse show" id="provice-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="nav-link link-dark">เชียงใหม่</a></li>
                        <li><a href="#" class="nav-link link-dark">เชียงราย</a></li>
                        <li><a href="#" class="nav-link link-dark">พะเยา</a></li>
                        <li><a href="#" class="nav-link link-dark">ลำปาง</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <button class="btn btn-toggle align-items-center text-start w-100 rounded" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                    <span class="fs-5">ชื่อลายผ้า</span>
                    </button>
                    <div class="collapse show" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="nav-link link-dark">Overview</a></li>
                        <li><a href="#" class="nav-link link-dark">Weekly</a></li>
                        <li><a href="#" class="nav-link link-dark">Monthly</a></li>
                        <li><a href="#" class="nav-link link-dark">Annually</a></li>
                    </ul>
                    </div>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="login_admin.php">Login</a></li>
                </ul>
            </div>
        </div>
       </div>
   </div>     


    
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>