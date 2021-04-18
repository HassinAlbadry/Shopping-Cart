<?php 
session_start();
// page to handle update cart button from shopping cart page
$arrId=array();
$arrQuan=array();
$i=0;

// loop thru product quanitites from shopping cart page

foreach ($_POST['quantity'] as  $quantity) {
	array_push($arrQuan,$quantity);

}

// loop thru product ids from shopping cart page

foreach ($_POST['id'] as  $id) {
	array_push($arrId,$id);
}


// combine both ids and quantities into one array
$combinedIdsQuans=array_combine( $arrId, $arrQuan);

// loop thru cart session and the combined array and update quantity if ids from cart quals ids from combined array
foreach ($_SESSION['cart'] as $key=>$value) {
	foreach ($combinedIdsQuans as $ids => $quans) {
		if ($value["id"] == $ids) {
           $_SESSION["cart"][$key]['quantity'] =  $quans;
       }
	}
    
       
  }

  // redirect to shopping cart after updating quantities.

header("Location: http://shopping-cart/shopping-cart.php"); 


?>