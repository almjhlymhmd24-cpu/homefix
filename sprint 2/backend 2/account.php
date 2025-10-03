<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // معالجة تحديث الإعدادات
    $language = sanitize($_POST['language']);
    $notifications = isset($_POST['notifications']) ? 1 : 0;
    $privacy = sanitize($_POST['privacy']);
    $location = sanitize($_POST['location']);

    try {
        $stmt = $pdo->prepare("INSERT INTO user_settings (user_id, language, notifications, privacy, location)
                               VALUES (?, ?, ?, ?, ?)
                               ON DUPLICATE KEY UPDATE language = VALUES(language), notifications = VALUES(notifications), privacy = VALUES(privacy), location = VALUES(location)");
        $stmt->execute([$_SESSION['user_id'], $language, $notifications, $privacy, $location]);

        $success = "تم تحديث الإعدادات بنجاح";
    } catch(PDOException $e) {
        $error = "حدث خطأ أثناء التحديث: " . $e->getMessage();
    }
}

// جلب الإعدادات الحالية
$stmt = $pdo->prepare("SELECT * FROM user_settings WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$settings = $stmt->fetch();

include 'includes/header.php';
?>

<div class="container">
    <div class="account-section">
        <h2>حسابي</h2>

        <div class="user-info-card">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
            <p>@<?php echo $_SESSION['username']; ?></p>
        </div>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" class="settings-form">
            <div class="settings-group">
                <h3>الإعدادات</h3>

                <div class="form-group">
                    <label for="language">لغة التطبيق</label>
                    <select id="language" name="language">
                        <option value="ar" <?php echo ($settings['language'] ?? 'ar') == 'ar' ? 'selected' : ''; ?>>العربية</option>
                        <option value="en" <?php echo ($settings['language'] ?? 'ar') == 'en' ? 'selected' : ''; ?>>English</option>
                    </select>
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="notifications" name="notifications" 
                           <?php echo ($settings['notifications'] ?? 1) ? 'checked' : ''; ?>>
                    <label for="notifications">تنبيهات البريد/إشعارات</label>
                </div>

                <div class="form-group">
                    <label for="privacy">الخصوصية</label>
                    <select id="privacy" name="privacy">
                        <option value="public" <?php echo ($settings['privacy'] ?? 'public') == 'public' ? 'selected' : ''; ?>>عام</option>
                        <option value="private" <?php echo ($settings['privacy'] ?? 'public') == 'private' ? 'selected' : ''; ?>>خاص</option>
                    </select>
                </div>
            </div>

            <div class="settings-group">
                <h3>الموقع</h3>
                <div class="form-group">
                    <input type="text" id="location" name="location" 
                           value="<?php echo $settings['location'] ?? ''; ?>" 
                           placeholder="أدخل موقعك">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                <a href="password.php" class="btn btn-secondary">تغيير كلمة السر</a>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>