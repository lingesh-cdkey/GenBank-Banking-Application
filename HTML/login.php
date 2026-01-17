<?php
session_start();
include("config/db.php");

if (isset($_POST['login'])) {
    $acc = $_POST['account_no'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE account_no='$acc' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['account_no'] = $acc;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Account Number or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Customer Login</h2>
  <form method="post">
    <input type="text" name="account_no" placeholder="Account Number" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
  </form>
  <p style="color:red;"><?php echo $error ?? ''; ?></p>
</body>
</html>
