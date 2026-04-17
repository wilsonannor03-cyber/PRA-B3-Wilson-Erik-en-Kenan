<?php
session_start();
require_once 'config.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = "SELECT * FROM users WHERE username = :username";
$stmt = $conn->prepare($query);
$stmt->execute([':username' => $username]);
 
$user = $stmt->fetch();
 
if ($user && password_verify($password, $user['password'])) {
 
    $_SESSION['user_id'] = $user['id'];
 
    header("Location: index.php");
    exit;
 
} else {
    echo "Login mislukt";
}
 