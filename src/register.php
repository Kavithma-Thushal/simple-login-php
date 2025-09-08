<?php
session_start();
require __DIR__ . '/config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check duplicate email
    $check = $connection->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Email already registered!";
    } else {
        $createSQL = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $createSQL->bind_param("sss", $username, $email, $password);

        if ($createSQL->execute()) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: login.php");
            exit();
        } else {
            $error = "Error: " . $createSQL->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<div class="container">
    <h2>Register</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if (!empty($_SESSION['success'])) echo "<p class='success'>" . $_SESSION['success'] . "</p>"; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>