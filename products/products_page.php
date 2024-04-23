<?php 
session_start();

require_once '../admin/read_products_action.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="products_page.css">
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
               <a href="./products_page.php?category=cheesecake,fruity">Fruity </a>
             </li>
             <li class="link">
               <a href="./products_page.php?category=cheesecake,sweet">Sweet</a>
             </li>
           </ul>
         </li>
         <li>
           Cupcakes
           <ul>
             <li class="link">
               <a href="./products_page.php?category=cupcakes,with-frosting">With frosting</a>
             </li>
             <li class="link">
               <a href="./products_page.php?category=cupcakes,without-frosting">Without frosting</a>
             </li>
           </ul>
         </li>
       </ul>
     </li>
     <li>
      Icecreams
       <ul>
         <li class="link">
           <a href="./products_page.php?category=icecreams,vegan">Vegan</a>
         </li>
         <li>
           Non-vegan
           <ul>
              <li class="link">
                <a href="./products_page.php?category=icecreams,non-vegan,chocolate">Chocolate</a>
              </li>
              <li class="link">
                <a href="./products_page.php?category=icecreams,non-vegan,caramel">Caramel</a>
              </li>          
           </ul>
         </li>
       </ul>
     </li>
     <?php 
     if(isset($_SESSION['isLoggedIn']) || isset($_SESSION['isUser'])) {
        echo '  <a href="../admin/admin_page.php">
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

<div class="wholeDiv bodyMarginTop">
  <div>
  <h2 class="centerText">Products</h2>
  <?php 
  $categories = isset($_GET['category']) ?  explode(',', $_GET['category']) : '';
  $final_category = is_array($categories) ? end($categories) : '';
  foreach ($products as $product) {
    $productCategories = explode(',', $product->getProductCategory());
    if (!empty($final_category) && !in_array($final_category, $productCategories)) {
      continue;
    }
    ?>
    <form action="buy_product_action.php" method="post" class="productCard">
      <img class="productImg" src="<?= $product->getProductImage()?>" alt="<?= $product->getProductName()?>">
      <h4><?= $product->getProductName()?></h4>
      <div class="priceDiv">
        <p>Price:</p>
        <p><?= $product->getProductPrice()?>,-</p>
      </div>
      
      <div class="productStockDiv">
        <p>Product Stock:</p>
        <p><?= $product->getProductStock()?></p>
        <input type="hidden" name="productID" value="<?= $product->getProductID()?>">
        <input type="hidden" name="productStock" value="<?= $product->getProductStock()?>">
        <input type="hidden" name="productName" value="<?= $product->getProductName()?>">
        <input type="hidden" name="productPrice" value="<?= $product->getProductPrice()?>">
        <input type="hidden" name="categories" value="<?= $_GET['category'] ?? ''?>"> 
      </div>
      
      <div class="productAmountDiv">
        <label for="productAmount">Product Amount:</label>
        <input type="number" name="productAmount" placeholder="Enter how many you want" required>
      </div>
  
      <button class="submitBtn" type="submit">Add to cart</button>
    </form>
    <?php
  }
  ?>
  </div>

  <div class="vl"></div>
  
  <div>
    <h2 class="centerText">Your cart</h2>
    <div class="cartDiv">
      <?php 
      $cartTotalPrice = 0;
      if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $cartItem) {
          $cartTotalPrice += $cartItem['totalPrice'];
          ?>
          <div class="cartItem">
            <p class="itemName"><?= $cartItem['name'] ?></p>
            <p>Amount: <br><?= $cartItem['amount'] ?></p>
            <p>Item total price: <br><?= $cartItem['totalPrice'] ?>,-</p>
          </div>
          <?php
        }
      };
      ?>
      <div class="totalPriceDiv">
        <p>Total price:</p>
        <p><?= $cartTotalPrice ?>,-</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>