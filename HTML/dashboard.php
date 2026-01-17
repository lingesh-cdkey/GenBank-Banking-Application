<?php
session_start();
include("config/db.php");

if (!isset($_SESSION['account_no'])) {
    header("Location: login.php");
}

$acc = $_SESSION['account_no'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE account_no='$acc'"));
$transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE account_no='$acc' ORDER BY txn_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Welcome, <?php echo $user['name']; ?></h2>
  <h3>Balance: ₹<?php echo $user['balance']; ?></h3>

  <a href="deposit.php" class="btn">Deposit</a>
  <a href="withdraw.php" class="btn">Withdraw</a>
  <a href="logout.php" class="btn danger">Logout</a>

  <h3>Transaction History</h3>
  <table>
    <tr>
      <th>Type</th>
      <th>Amount</th>
      <th>Date</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($transactions)) { ?>
    <tr>
      <td><?php echo $row['txn_type']; ?></td>
      <td>₹<?php echo $row['amount']; ?></td>
      <td><?php echo $row['txn_date']; ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
