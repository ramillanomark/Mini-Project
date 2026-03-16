<?php
session_start();

$conn = mysqli_connect("localhost", "root", "");
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS portfolio_db");
mysqli_select_db($conn, "portfolio_db");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
)");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    tech_used VARCHAR(255),
    date_added DATE
)");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100),
    skill_level VARCHAR(50)
)");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(100),
    company VARCHAR(100),
    description TEXT,
    year VARCHAR(20)
)");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    date_sent DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$check = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users"));
if ($check[0] == 0) {
    $pass = password_hash("admin123", PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('admin', '$pass')");
}
?>
