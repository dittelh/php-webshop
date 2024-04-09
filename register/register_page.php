<?php 
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="./register_page.css">
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
     if(isset($_SESSION['isLoggedIn']) || isset($_SESSION['isUser'])) {
        echo '  <a href="../admin/admin_page.php">
                 <li class="link">Admin Panel</li>
                </a> 
                <a href="./logout_page.php">
                  <li class="link">Logout</li>
                </a> ';
     } else {
        echo '<a href="./login_page.php">
                    <li class="link">Login</li>
                </a> ';
     }
     ?> 
    </ul>
</div>

<h2 class="bodyMarginTop">Register</h2>
<form action="./register_action.php" method="post">
  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="phone"><b>Phone</b></label>
    <input type="number" placeholder="Enter phone" name="phone" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter address" name="address" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>

    <?php 
        if(isset($_SESSION['errorMessage'])) {
            echo $_SESSION['errorMessage'];
        }
    ?>
  </div>
</form>
</body>
</html>