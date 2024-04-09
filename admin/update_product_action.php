<?php
require_once '../database/databaseService.php';

$productID = $_POST['productID'];
$productName = $_POST['productName'];
$productImage = $_POST['productImage'];
$productPrice = $_POST['productPrice'];
$productDescription = $_POST['productDescription'];
$productCategory = $_POST['productCategory'];
$productStock = $_POST['productStock'];

$databaseService = new DatabaseService();
$connection = $databaseService->getConnection();

$updateProductSQL = 
'UPDATE products
SET 
productName = :productName,
imgPath = :imgPath,
price = :price,
description = :description,
category = :category,
stock = :stock
WHERE productID = :productID
';

$statement = $connection->prepare($updateProductSQL);
$statement->bindParam(':productID', $productID);
$statement->bindParam(':productName', $productName);
$statement->bindParam(':imgPath', $productImage);
$statement->bindParam(':price', $productPrice);
$statement->bindParam(':description', $productDescription);
$statement->bindParam(':category', $productCategory);
$statement->bindParam(':stock', $productStock);

try {
    $statement->execute();
    header('Location: http://localhost:8000/admin/admin_page.php');
    die();
} catch (PDOException $e) {
    echo $e->getMessage();
};