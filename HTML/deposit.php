<?php
session_start();
include("config/db.php");

$acc = $_SESSION['account_no'];

if (isset($_POST['deposit'])) {
    $amount = $_POST['amount'];

    mysqli_query($conn, "UPDATE users SET balance = balance + $amount WHERE account_no='$acc'");
    mysqli_query($conn, "INSERT INTO transactions (account_no, txn_type, amount)
                          VALUES ('$acc', 'Deposit', $amount)");
    header("Location: dashboard.php");
}
?>

<form method="post">
  <h2>Deposit Amount</h2>
  <input type="number" name="amount" required>
  <button name="deposit">Deposit</button>
</form>
