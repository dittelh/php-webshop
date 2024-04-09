<?php 
session_start();
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="./login_page.css">
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
      <a href="./login_page.php">
        <li class="link">Login</li>
      </a>     
    </ul>
</div>

<p class="bodyMarginTop">You are logged out!</p>


</body>
</html>