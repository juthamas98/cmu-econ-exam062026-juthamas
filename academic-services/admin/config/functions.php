<?php

    $host ="localhost";
    $dbname ="academic_service";
    $username ="root";
    $password ="";

    try {

        $dsn ="mysql:host=$host;dbname=$dbname;charset=utf8mb4";  // data sources name
        // สร้าง Object PDO
        $con = new PDO($dsn, $username, $password);               // สร้างการเชื่อมต่อส่ง argmentค่าจริง

        // ตั้งค่า Attribute
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ตั้งให้แสดง Error เป็น Exception
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // ตั้งค่ารูปแบบการดึงข้อมูลเริ่มต้นจากDB (ดึงเป็น Array ชื่อคอลัมน์) ex. $result['column_neme']
        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 

        //echo "Connection successfully";

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();          //ถ้าเกิดข้อผิดพลาด

    }



?>