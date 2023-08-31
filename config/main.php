<?php
include 'connection.php';
include '../app/model/User.php';

// Create an instance of the PDO connection object
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create an instance of the UserModel class and pass the PDO connection
$userModel = new UserModel($pdo);

// Now you can use the UserModel methods to interact with the users table
$users = $userModel->getUsers();

// Rest of your code...
?>
