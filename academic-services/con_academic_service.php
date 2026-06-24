<?php

    $host ="localhost";
    $dbname ="academic_service";
    $username ="root";
    $password ="";

    try {

        

        //echo "Connection successfully";

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();          //ถ้าเกิดข้อผิดพลาด

    }



?>