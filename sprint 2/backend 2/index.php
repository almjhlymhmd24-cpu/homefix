<?php
include 'config.php';
include 'includes/header.php';
?>

<div class="container">
    <div class="welcome-section">
        <h1>مرحباً بك، <?php echo $_SESSION['user_name']; ?></h1>
        <p>اسم المستخدم: <?php echo $_SESSION['username']; ?></p>

        <div class="quick-actions">
            <a href="profile.php" class="action-card">
                <h3>الملف الشخصي</h3>
                <p>إدارة معلوماتك الشخصية</p>
            </a>
            <a href="password.php" class="action-card">
                <h3>كلمة المرور</h3>
                <p>تغيير كلمة المرور</p>
            </a>
            <a href="account.php" class="action-card">
                <h3>الإعدادات</h3>
                <p>إعدادات الحساب والتطبيق</p>
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>