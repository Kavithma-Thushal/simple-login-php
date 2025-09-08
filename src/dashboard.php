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

    <!-- Cards -->
    <div class="cards">
        <div class="card">
            <h3>Customers</h3>
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

    <div class="stats-section">
        <!-- Chart -->
        <div class="chart-container">
            <canvas id="chart"></canvas>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>001</td>
                    <td>David</td>
                    <td>Keyboard</td>
                    <td>Completed</td>
                    <td>$120</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>John</td>
                    <td>Mouse</td>
                    <td>Pending</td>
                    <td>$45</td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Jane</td>
                    <td>Monitor</td>
                    <td>Completed</td>
                    <td>$300</td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Mark</td>
                    <td>Headset</td>
                    <td>Completed</td>
                    <td>$80</td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>Alice</td>
                    <td>Keyboard</td>
                    <td>Pending</td>
                    <td>$120</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Customers', 'Items', 'Orders', 'Income'],
            datasets: [{
                label: 'Stats',
                data: [245, 1450, 125, 3450],
                backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#f1c40f'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {display: false}
            },
            scales: {
                y: {beginAtZero: true}
            }
        }
    });
</script>

</body>
</html>