<?php
session_start();
require_once '../database/databaseService.php';

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];

function validateInput($input, $regex, $errorMessage) {
    if (!preg_match($regex, $input)) {
        $_SESSION['errorMessage'] .= $errorMessage;
    }
}

$_SESSION['errorMessage'] = '';

// Validate name
validateInput($name, '/^[A-Za-z\- ]+$/', 'Name should contain only alphabets, - and space. ');

// Validate phone
validateInput($phone, '/^\d{8}$/', 'Phone number should be 8 digits. ');

// Validate address
validateInput($address, '/^.*$/', 'Address should be alphanumeric with spaces. ');

// Validate email
validateInput($email, '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'Invalid email format. ');

// If there are any error messages, redirect back to the form
if (!empty($_SESSION['errorMessage'])) {
header("Location: register_page.php");
exit();
} else {
    // No errors, proceed with registration
    $databaseService = new DatabaseService();
    $connection = $databaseService->getConnection();

    $sql = "INSERT INTO user (name, phone, address, email, password, role) 
    VALUES(:name, :phone, :address, :email, :password, :role)";

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $role = 'user';

    $statement = $connection->prepare($sql);    
    $statement->bindParam(':email', $email);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':phone', $phone);
    $statement->bindParam(':address', $address);
    $statement->bindParam(':password', $hashedPassword);
    $statement->bindParam(':role', $role);

    try {
        $statement->execute();
        header('Location: http://localhost:8000/login/login_page.php');
        die();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}