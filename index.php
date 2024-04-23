<?php 
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontpage</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="menu">
   <ul>
      <a href="index.php">
        <li class="link">Frontpage</li>
      </a>
     <li>
       Cakes
       <ul>
       <li>
           Cheesecakes
           <ul>
             <li class="link">
               <a href="./products/products_page.php?category=cheesecake,fruity">Fruity </a>
             </li>
             <li class="link">
               <a href="./products/products_page.php?category=cheesecake,sweet">Sweet</a>
             </li>
           </ul>
         </li>
         <li>
           Cupcakes
           <ul>
             <li class="link">
               <a href="./products/products_page.php?category=cupcakes,with-frosting">With frosting</a>
             </li>
             <li class="link">
               <a href="./products/products_page.php?category=cupcakes,without-frosting">Without frosting</a>
             </li>
           </ul>
         </li>
       </ul>
     </li>
     <li>
      Icecreams
       <ul>
         <li class="link">
           <a href="./products/products_page.php?category=icecreams,vegan">Vegan</a>
         </li>
         <li>
           Non-vegan
           <ul>
              <li class="link">
                <a href="./products/products_page.php?category=icecreams,non-vegan,chocolate">Chocolate</a>
              </li>
              <li class="link">
                <a href="./products/products_page.php?category=icecreams,non-vegan,caramel">Caramel</a>
              </li>          
           </ul>
         </li>
       </ul>
     </li>
     <?php 
     if(isset($_SESSION['isLoggedIn']) || isset($_SESSION['isUser'])) {
        echo '  <a href="./admin/admin_page.php">
                 <li class="link">Admin Panel</li>
                </a> 
                <a href="./login/logout_page.php">
                  <li class="link">Logout</li>
                </a> ';
     } else {
        echo '<a href="./login/login_page.php">
                    <li class="link">Login</li>
                </a> ';
     }
     ?> 
    </ul>
</div>
<div class="bodyMarginTop centerText">
  <h1>Welcome to the shop which have everything to your sweet tooth!</h1>
</div>
</body>
</html>