<?php
require_once '../database/databaseService.php';
require_once 'product.php';

$categories = $_GET['category'] ?? '';
$products = getProducts($categories);

function getProducts($categories) {
    $databaseService = new DatabaseService();
    $connection = $databaseService->getConnection();

    $productsSQL = 'SELECT * FROM products';

    $statement = $connection->prepare($productsSQL);

    try {
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $productObjects = [];
        foreach ($rows as $row) {
            $product = new Product($row['productID'],$row['productName'],$row['imgPath'],$row['price'],
            $row['description'],$row['category'],$row['stock']);
            $productObjects[] = $product;
        }
        return $productObjects;
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
};

