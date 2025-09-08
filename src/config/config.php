<?php
$host = "localhost";
$user = "root";
$password = "1234";
$db = "demo";

// Create connection
$connection = new mysqli($host, $user, $password);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create database if it doesn't exist
$createDB = "CREATE DATABASE IF NOT EXISTS $db";
if ($connection->query($createDB) === TRUE) {
} else {
    die("Error creating database: " . $connection->error);
}

// Choose DB
$connection->select_db($db);

// Create users table if it doesn’t exist
$createUserTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($connection->query($createUserTable) === TRUE) {
} else {
    die("Error creating table: " . $connection->error);
}
?>