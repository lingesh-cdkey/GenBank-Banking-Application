<?php
session_start();
include("config/db.php");

$acc = $_SESSION['account_no'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT balance FROM users WHERE account_no='$acc'"));

if (isset($_POST['withdraw'])) {
    $amount = $_POST['amount'];

    if ($amount <= $user['balance']) {
        mysqli_query($conn, "UPDATE users SET balance = balance - $amount WHERE account_no='$acc'");
        mysqli_query($conn, "INSERT INTO transactions (account_no, txn_type, amount)
                              VALUES ('$acc', 'Withdraw', $amount)");
        header("Location: dashboard.php");
    } else {
        echo "Insufficient Balance";
    }
}
?>

<form method="post">
  <h2>Withdraw Amount</h2>
  <input type="number" name="amount" required>
  <button name="withdraw">Withdraw</button>
</form>
