<?php
        session_start();
        include '../model/database.php';  

        $select_stmt = $db->prepare("SELECT * FROM silk_main INNER JOIN silk_provice on silk_main.provice_id = silk_provice.provice_id");
        $select_stmt->execute();


        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            echo $silk_name;
            echo "<br>";
            echo $provice_name;
            echo "<br>";

        }



        
            
        
?>