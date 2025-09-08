<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>

<body>
<!-- Sidebar -->
<div class="sidebar">
    <h1>Dashboard</h1>
    <a href="#">Home</a>
    <a href="#">Profile</a>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <a href="#">Logout</a>
</div>

<!-- Main Content -->
<div class="main">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <div class="cards">
        <div class="card">
            <h3>Users</h3>
            <p>245</p>
        </div>
        <div class="card">
            <h3>Items</h3>
            <p>1450</p>
        </div>
        <div class="card">
            <h3>Orders</h3>
            <p>125</p>
        </div>
        <div class="card">
            <h3>Income</h3>
            <p>$3,450</p>
        </div>
    </div>
</div>

</body>
</html>