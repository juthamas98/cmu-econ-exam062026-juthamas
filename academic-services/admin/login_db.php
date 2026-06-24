<?php

    session_status();
    include_once "config/functions.php";

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        //ตรวจสอบข้อมูลที่ส่งมาว่ามีใน database
        $stmt = $con->prepare("SELECT * FROM users WHERE username = :username");
        //ผูกค่า bind และรันคำสั่ง execute
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch();

        //มีข้อมูล user และมีpssที่ส่งมาตรงกับpssในdatabase
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["adminid"] = $user["id"];

            echo json_encode([
                "status" => "success",
                "message" => "Login successfully"
            ]);

        }else {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid username or password"
            ]);
        }

    }



?>