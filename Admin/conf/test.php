<?php

    require 'database.php';
    require 'FetchAll.php';

    $objTest = new FetchAll;
    $objTest->FetchUser();
    echo implode($output_uname);

?>