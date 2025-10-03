<?php
$host = "localhost";
$user = "root";      // غيّرها حسب إعداداتك
$pass = "";          // كلمة المرور للـ MySQL
$db   = "users";   // اسم قاعدة البيانات

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>