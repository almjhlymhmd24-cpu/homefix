<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة المستخدمين</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <a href="index.php" class="nav-logo">حسابي</a>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">الملف الشخصي</a>
                    </li>
                    <li class="nav-item">
                        <a href="password.php" class="nav-link">كلمة المرور</a>
                    </li>
                    <li class="nav-item">
                        <a href="account.php" class="nav-link">الإعدادات</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link logout">تسجيل الخروج</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main-content">