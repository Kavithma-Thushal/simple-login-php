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
    <style>
        body {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            background: #ecf0f1;
            min-height: 100vh;
        }

        .sidebar {
            background: #2c3e50;
            color: white;
            width: 220px;
            min-height: 100vh;
            padding-top: 20px;
            box-sizing: border-box;
        }

        .sidebar h1 {
            font-size: 22px;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: white;
            padding-left: 55px;
            text-align: left;
        }

        .sidebar a:hover {
            background: #34495e;
            text-decoration: none;
        }

        .main {
            flex: 1;
            margin-left: 30px;
            padding-top: 30px;
        }

        .main h2 {
            text-align: left;
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            padding-right: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }
    </style>
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