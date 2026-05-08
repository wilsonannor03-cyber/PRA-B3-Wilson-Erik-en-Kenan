<?php
session_start();
require_once 'config/config.php';  // ✅ staat nu bovenaan

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    header("Location: inloggen.php?error=Vul alle velden in");
    exit;
}

$query = "SELECT * FROM users WHERE username = :username LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->execute([':username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: inloggen.php?error=Gebruiker bestaat niet");
    exit;
}

if (!password_verify($password, $user['password'])) {
    header("Location: inloggen.php?error=Wachtwoord klopt niet");
    exit;
}

$_SESSION['user_id'] = $user['id'];
header("Location: index.php");
exit;