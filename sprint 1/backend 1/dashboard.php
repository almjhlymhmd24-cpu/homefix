<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Dashboard</title>
</head>
<body>
  <div class="container">
    <h2>Welcome, <?php echo $_SESSION['user']; ?> 🎉</h2>
    <p>You have successfully logged in.</p>
    <a href="logout.php" class="btn">Logout</a>
  </div>
</body>
</html>