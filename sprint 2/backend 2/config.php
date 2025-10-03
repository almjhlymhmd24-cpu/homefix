<?php
session_start();

// إعدادات قاعدة البيانات
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'users');

// الاتصال بقاعدة البيانات
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// تهيئة المستخدم
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // للمثال فقط - في التطبيق الحقيقي يتم من خلال تسجيل الدخول
    $_SESSION['user_name'] = "محمد علي";
    $_SESSION['username'] = "moh_al123";
}

// دالة للحماية من XSS
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
?>