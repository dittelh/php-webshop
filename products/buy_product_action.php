<?php 
session_start();

require_once '../database/databaseService.php';

$productID = $_POST['productID'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productAmount = $_POST['productAmount'];
$productStock = $_POST['productStock'];
$newStock = $productStock - $productAmount;
$categories = $_POST['categories'] ?? '';

$databaseService = new DatabaseService();
$connection = $databaseService->getConnection();

$cartSQL = 
'UPDATE products 
SET stock = :stock
WHERE productID = :productID
';

$statement = $connection->prepare($cartSQL);
$statement->bindParam(':productID', $productID);
$statement->bindParam(':stock', $newStock);

try {
    $statement->execute();
    $_SESSION['cart'][$productID]['amount'] = $productAmount;
    $_SESSION['cart'][$productID]['name'] = $productName;
    $_SESSION['cart'][$productID]['totalPrice'] = (int) $productAmount* (int) $productPrice;
    $url = 'http://localhost:8000/products/products_page.php' . (!empty($categories) ? '?category=' . $categories : '');
    header('Location: ' . $url);
    die();
} catch (PDOException $e) {
    echo $e->getMessage();
};