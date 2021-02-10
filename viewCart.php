<?php
session_start();
require_once 'cartManager.php';
require_once 'products.php';

if (!isset($_SESSION['shoppingCart'])) {
    $_SESSION['shoppingCart'] = [];
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	CartManager::removeProductFromCart($_POST['name']);
}


?>
<html>
<head>
<title>View Cart</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--  This is just so I can format it easier without any css, I get it's a bit of an overkill  -->
</head>
<body class="d-flex flex-row justify-content-center">
    <div class="d-flex flex-column mt-5 mr-5">
        <a class="btn btn-info ml-3 mt-3" href="index.php">Back To Index</a>
    </div>
    <div class="d-flex flex-column mt-5">
    <h1>Your Cart:</h1>
        <?php
        CartManager::getCartContents();
        ?>
    </div>
    <div class="d-flex flex-column mt-5 ml-5">
        <h1>Cart Quantity: <?php echo CartManager::getCartCount(); ?></h1>
        <h1>Cart Subtotal: $<?php echo CartManager::getCartSubtotal(); ?></h1>
    </div>
</body>
</html>