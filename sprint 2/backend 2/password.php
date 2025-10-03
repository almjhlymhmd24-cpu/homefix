<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // التحقق من كلمة المرور الحالية
    $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    if ($user && password_verify($current_password, $user['password_hash'])) {
        if ($new_password === $confirm_password) {
            if (strlen($new_password) >= 6) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
                $stmt->execute([$hashed_password, $_SESSION['user_id']]);

                $success = "تم تغيير كلمة المرور بنجاح";
            } else {
                $error = "كلمة المرور يجب أن تكون 6 أحرف على الأقل";
            }
        } else {
            $error = "كلمات المرور غير متطابقة";
        }
    } else {
        $error = "كلمة المرور الحالية غير صحيحة";
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="form-section">
        <h2>كلمة المرور</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" class="password-form">
            <div class="form-group">
                <label for="current_password">كلمة المرور الحالية</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">كلمة المرور الجديدة</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">تأكيد كلمة المرور</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary">تأكيد</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>