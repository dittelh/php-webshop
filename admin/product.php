<?php
class Product {
    public function __construct(
        private $productID,
        private $productName,
        private $productImage,
        private $productPrice,
        private $productDescription,
        private $productCategory,
        private $productStock
    )
    {
        
    }

    public function getProductID() {
        return $this->productID;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getProductImage() {
        return $this->productImage;
    }

    public function getProductPrice() {
        return $this->productPrice;
    }

    public function getProductDescription() {
        return $this->productDescription;
    }

    public function getProductCategory() {
        return $this->productCategory;
    }

    public function getProductStock() {
        return $this->productStock;
    }
    
};