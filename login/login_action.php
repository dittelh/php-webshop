<?php 
session_start();
require_once '../database/databaseService.php';

$email = $_POST['email'];
$password = $_POST['password'];
$user = getUser($email);
$verifiedPassword = checkPassword($password, $user);


if ($verifiedPassword && $user['role'] === 'admin') {
    $_SESSION['isLoggedIn'] = 'True';
    header('Location: http://localhost:8000/admin/admin_page.php');
    die();
    } else if ($verifiedPassword && $user['role'] === 'user') {
        $_SESSION['isUser'] = 'True';
        $_SESSION['name'] = $user['name'];
        header('Location: http://localhost:8000/register/register_is_logged_in.php');
        die();
    } else {
    $_SESSION['errorMessage'] = 'Wrong password - try again!';
    header('Location: http://localhost:8000/login/login_page.php');
}


function getUser($email) {
    $databaseService = new DatabaseService();
    $connection = $databaseService->getConnection();

    $emailSQL = 'SELECT * FROM user 
    WHERE email = :email';

    $statement = $connection->prepare($emailSQL);
    $statement->bindParam(':email', $email);

    try {
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
};

function checkPassword($password, $user) {
    return password_verify($password, $user['password']);
};