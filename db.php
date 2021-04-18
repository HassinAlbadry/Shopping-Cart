<?php 
  session_start();  // start a session

// define variables and setup connections
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "products";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
		}

	$sqlEven = "SELECT  * FROM products WHERE (id%2=0)"; // pull db products based on id passed from prod page.
  $sqlOdd = "SELECT  * FROM products WHERE (id%2!=0)"; // pull second prod column from db based on id passed.
  
  //Query results 
  $resultEven = $conn->query($sqlEven);
  $resultOdd = $conn->query($sqlOdd);


// run query to select everything from db equals to id
  if(isset($_POST['id'])){
  $id=$_POST['id'];
  $sqlshopping="SELECT * FROM products WHERE id='$id'";
  $shopping=$conn->query($sqlshopping);


  while($row = $shopping->fetch_assoc()){
    // if session not set then assign to empty array
    if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  
// define array for shopping cart items that stores to session
    $bag = array(
    "id"=>$row['id'],
    "name" => $row['name'],
    "price" => $row['price'],
    "quantity"=>1,
    "image" =>$row['image']

    
   );

  $idFound=false;
// loop thru session to update quantity if product added more than once by user
  foreach ($_SESSION['cart'] as $key=>$value) {
    if ($value["id"] == $id) {
           $idFound=true;
           $_SESSION["cart"][$key]['quantity'] +=  1;
       }
       
  }

  // if not found then add entire product array to shopping cart session

if($idFound==false) $_SESSION['cart'][] = $bag;
header("Location: http://shopping-cart/shopping-cart.php"); // redirect to shopping cart after updating session

}
}
     
$conn->close();




?>

