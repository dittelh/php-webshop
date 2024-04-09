<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members panel</title>
    <link rel="stylesheet" href="../index.css">
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
        <a href="../login/logout_page.php">
            <li class="link">Logout</li>
        </a> 
    </ul>
</div>

<h2 class="bodyMarginTop">Members Panel</h2>
<p>Welcome <?= $_SESSION['name'] ?> </p>
<p>You are now logged in as a Member! </p>

</body>
</html>