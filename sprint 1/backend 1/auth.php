<?php
include "db.php";

$email_phone = $_POST['email_phone'];
$password_input    = $_POST['password'];

$sql = "SELECT * FROM users WHERE email=? OR phone=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email_phone, $email_phone);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $user =$result->fetch_assoc();
    $hashed_password_form_db=$user ['password_hash'];
    if(password_verify($password_input,$hashed_password_form_db)){
          session_start();
    $_SESSION['user_id'] = $user['id'];
    header("Location: dashboard.php");
    exit();
    }
    else{
        echo "❌ البريد/الهاتف أو كلمة المرور غير صحيحة";
    }
  
} else {
    echo "❌ البريد/الهاتف أو كلمة المرور غير صحيحة";
}
?>