<?php
session_start();

 if(isset($_SESSION['cart'])){

 	session_unset();
    header("Location: http://shopping-cart/shopping-cart.php"); 

 }


	?>