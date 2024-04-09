<?php
require_once '../database/databaseService.php';

$productID = $_POST['productID'];

$databaseService = new DatabaseService();
$connection = $databaseService->getConnection();

$deleteProductSQL = 
'DELETE FROM products WHERE productID = :productID';

$statement = $connection->prepare($deleteProductSQL);
$statement->bindParam(':productID', $productID);

try {
    $statement->execute();
    header('Location: http://localhost:8000/admin/admin_page.php');
    die();
} catch (PDOException $e) {
    echo $e->getMessage();
};