<?php

if(isset($_SESSION['page_id']) == session_id()) {

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $sql ="WHERE ";
}

?>
<html>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">ระบบแอดมิน</a>
            <div id="close-sidebar">
                <i class="far fa-window-close"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" style="width: 56px; height: 56px;" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
            </div>
            <div class="user-info">
            <span class="user-name">
                <?php $objFname->FetchFullname($id); ?>
            </span>
            <span class="user-status">
                <i class="fa fa-circle"></i>
                <span>Online</span>
            </span>
            <span class="user-status">
                <i class="fas fa-user-edit"></i>
                <span><a href="admin_edit.php?edit_id=<?php echo $id; ?>" class="link-light">Edit Profile</a></span>
            </span>
            </div>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-menu">
            <ul>
            <li class="header-menu">
                <span>General</span>
            </li>
            <li class="sidebar">
                <a href="index_admin.php">
                    <i class="fas fa-home"></i>
                    <span>หน้าหลักแอดมิน</span>
                </a>
            </li>
            <li class="sidebar">
                <a href="admin_manage.php">
                    <i class="fas fa-user-cog"></i>
                    <span>จัดการข้อมูลแอดมิน</span>
                </a>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                <i class="fa fa-tachometer-alt"></i>
                <span>จัดการข้อมูลผ้าทอ</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a href="silk_type.php">ประเภทผ้าทอ</a>
                    </li>
                    <li>
                    <a href="silk_detail.php">รายละเอียดผ้าทอผ้าทอ</a>
                    </li>
                </ul>
                </div>
            </li>
            <hr class="mt-2 mb-2 w-75 border border-ligh m-auto">
            <li>
                <a href="Logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>ออกจากระบบ</span>
                </a>
            </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="Logout.php">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
</html>

<?php
        
    } else {

        echo "Access Denide";

    } 


?>