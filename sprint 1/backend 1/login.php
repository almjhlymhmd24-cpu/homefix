<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body>
  <div class="login-box">
    <img src="image\user.svg" alt="workers" class="hero">
    <h2>Log In</h2>
    <form action="auth.php" method="POST">
      <input type="text" name="email_phone" placeholder="Email or PhoneNumber" required>
      <input type="password" name="password" placeholder="Password" required>
      <label><input type="checkbox" name="remember"> Remember me</label>
      <button type="submit" class="btn">Login</button>
    </form>
     
  </div>
</body>
</html>