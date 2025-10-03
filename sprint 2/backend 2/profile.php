<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = sanitize($_POST['full_name']);
    $username = sanitize($_POST['username']);

    try {
        $stmt = $pdo->prepare("UPDATE users SET full_name = ?, username = ? WHERE id = ?");
        $stmt->execute([$full_name, $username, $_SESSION['user_id']]);

        $_SESSION['user_name'] = $full_name;
        $_SESSION['username'] = $username;

        $success = "تم تحديث الملف الشخصي بنجاح";
    } catch(PDOException $e) {
        $error = "حدث خطأ أثناء التحديث: " . $e->getMessage();
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="form-section">
        <h2>الملف الشخصي</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" class="profile-form">
            <div class="form-group">
                <label for="full_name">الاسم كامل</label>
                <input type="text" id="full_name" name="full_name" 
                       value="<?php echo $_SESSION['user_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="username">اسم المستخدم</label>
                <input type="text" id="username" name="username" 
                       value="<?php echo $_SESSION['username']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">تأكيد</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>