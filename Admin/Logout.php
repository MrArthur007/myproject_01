<?php

    session_start();
    session_regenerate_id();
    unset($_SESSION["user_id"]);
    unset($_SESSION['page_id']);
    session_destroy();

    header("Location: ../login_admin.php");

?>