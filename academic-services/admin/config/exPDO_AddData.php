php<?php
// 1. ตั้งค่าการเชื่อมต่อฐานข้อมูล
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_username';
$password = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    // สร้างออ็อบเจ็กต์ PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. เตรียมคำสั่ง SQL (ใช้ : แทนตัวแปรเพื่อความปลอดภัย)
    $sql = "INSERT INTO users (name, email, age) VALUES (:name, :email, :age)";
    $stmt = $pdo->prepare($sql);

    // 3. ข้อมูลที่ต้องการเพิ่ม
    $name = "สมชาย ใจดี";
    $email = "somchai@example.com";
    $age = 28;

    // 4. ผูกค่า (Bind) และรันคำสั่ง (Execute)
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    
    // หรือสามารถรันผ่าน array ใน execute() โดยตรงได้เช่นกัน
    // $stmt->execute([$name, $email, $age]);

    $stmt->execute();
    
    echo "เพิ่มข้อมูลสำเร็จ!";

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>