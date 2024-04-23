<?php 
session_start();

require_once './read_products_action.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="admin_page.css">
</head>
<body>
<div class="menu">
   <ul>
      <a href="../index.php">
        <li class="link">Frontpage</li>
      </a>
     <li>
       Cakes
       <ul>
       <li>
           Cheesecakes
           <ul>
             <li class="link">
               <a href="../products/products_page.php?category=cheesecake,fruity">Fruity </a>
             </li>
             <li class="link">
               <a href="../products/products_page.php?category=cheesecake,sweet">Sweet</a>
             </li>
           </ul>
         </li>
         <li>
           Cupcakes
           <ul>
             <li class="link">
               <a href="../products/products_page.php?category=cupcakes,with-frosting">With frosting</a>
             </li>
             <li class="link">
               <a href="../products/products_page.php?category=cupcakes,without-frosting">Without frosting</a>
             </li>
           </ul>
         </li>
       </ul>
     </li>
     <li>
      Icecreams
       <ul>
         <li class="link">
           <a href="../products/products_page.php?category=icecreams,vegan">Vegan</a>
         </li>
         <li>
           Non-vegan
           <ul>
              <li class="link">
                <a href="../products/products_page.php?category=icecreams,non-vegan,chocolate">Chocolate</a>
              </li>
              <li class="link">
                <a href="../products/products_page.php?category=icecreams,non-vegan,caramel">Caramel</a>
              </li>          
           </ul>
         </li>
       </ul>
     </li>
     <?php 
     if(isset($_SESSION['isLoggedIn'])) {
        echo '  <a href="./admin_page.php">
                 <li class="link">Admin Panel</li>
                </a> 
                <a href="../login/logout_page.php">
                  <li class="link">Logout</li>
                </a> ';
     } else {
        echo '<a href="../login/login_page.php">
                    <li class="link">Login</li>
                </a> ';
     }
     ?> 
    </ul>
</div>
<?php 
if(!isset($_SESSION['isLoggedIn'])) {
  echo '<p class="bodyMarginTop"> Restricted Area: requires authentication! <p/>';
  die();
}
?>

<h2 class="bodyMarginTop">Admin Panel</h2>
<form action="./create_product_action.php" method="post">
  <div class="addProductDiv">
    <h3>Add a Product</h3>
    <label for="productName">Product Name:</label>
    <input type="text" name="productName" placeholder="Enter Product Name" required>

    <label for="productImage">Product Image:</label>
    <input type="text" name="productImage" placeholder="Enter Product Image" required>

    <label for="productPrice">Product Price:</label>
    <input type="number" name="productPrice" placeholder="Enter Product Price" required>

    <label for="productDescription">Product Description:</label>
    <input type="text" name="productDescription" placeholder="Enter Product Description" required>

    <label for="productCategory">Product Category:</label>
    <select name="productCategory">
      <option value="cakes,cheesecakes,fruity">Cakes > Cheesecake > Fruity</option>
      <option value="cakes,cheesecakes,sweet">Cakes > Cheesecake > Sweet</option>
      <option value="cakes,cupcakes,with-frosting">Cakes > Cupcakes > With frosting</option>
      <option value="cakes,cupcakes,without-frosting">Cakes > Cupcakes > Without frosting</option>
      <option value="icecreams,vegan">Icecreams > Vegan</option>
      <option value="icecreams,non-vegan,chocolate">Icecreams > Non-vegan > Chocolate</option>
      <option value="icecreams,non-vegan,caramel">Icecreams > Non-vegan > Caramel</option>
    </select>

    <label for="productStock">Product Stock:</label>
    <input type="number" name="productStock" placeholder="Enter how many to add" required>

    <button class="btn" type="submit">Add Product</button>
  </div>
</form>


<h3 class="marginTop">Available Products</h3>
<div class="productsDiv">
  <?php
  foreach ($products as $product) {
  ?>
  <div class="productDiv">
    <h4>Edit or delete product</h4>
    <form action="./update_product_action.php" method="post">
      <div class="editDiv">
        <input type="hidden" name="productID" value="<?= $product->getProductID()?>">
  
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" required value="<?= $product->getProductName()?>">
  
        <label for="productImage">Product Image:</label>
        <input type="text" name="productImage" required value="<?= $product->getProductImage()?>">
  
        <label for="productPrice">Product Price:</label>
        <input type="number" name="productPrice" required value="<?= $product->getProductPrice()?>">
  
        <label for="productDescription">Product Description:</label>
        <input type="text" name="productDescription" required value="<?= $product->getProductDescription()?>">
  
        <label for="productCategory">Product Category:</label>
        <select name="productCategory" >
          <option value="cakes,cheesecakes,fruity" <?= $product->getProductCategory() === 'cakes,cheesecakes,fruity' ? 'selected' : ''?>>Cakes > Cheesecake > Fruity</option>
          <option value="cakes,cheesecakes,sweet"  <?= $product->getProductCategory() === 'cakes,cheesecakes,sweet' ? 'selected' : ''?>>Cakes > Cheesecake > Sweet</option>
          <option value="cakes,cupcakes,with-frosting" <?= $product->getProductCategory() === 'cakes,cupcakes,with-frosting' ? 'selected' : ''?>>Cakes > Cupcakes > With frosting</option>
          <option value="cakes,cupcakes,without-rosting" <?= $product->getProductCategory() === 'cakes,cupcakes,without-rosting' ? 'selected' : ''?>>Cakes > Cupcakes > Without frosting</option>
          <option value="icecreams,vegan" <?= $product->getProductCategory() === 'icecreams,vegan' ? 'selected' : ''?>>Icecreams > Vegan</option>
          <option value="icecreams,non-vegan,chocolate" <?= $product->getProductCategory() === 'icecreams,non-vegan,chocolate' ? 'selected' : ''?>>Icecreams > Non-vegan > Chocolate</option>
          <option value="icecreams,non-vegan,caramel" <?= $product->getProductCategory() === 'icecreams,non-vegan,caramel' ? 'selected' : ''?>>Icecreams > Non-vegan > Caramel</option>
        </select>
  
        <label for="productDescription">Product Stock:</label>
        <input type="text" name="productStock" required value="<?= $product->getProductStock()?>">
  
        <button class="btn" type="submit">Edit Product</button>
      </div>
    </form>  
    
    <form action="./delete_product_action.php" method="post">
      <div class="deleteDiv"><input type="hidden" name="productID" value="<?= $product->getProductID()?>">
        <button class="deleteBtn" type="submit">Delete Product</button>
      </div> 
    </form>
    
  </div>
  <?php
  }
  ?>

</div>


</body>
</html>