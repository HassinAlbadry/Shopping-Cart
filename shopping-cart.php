<?php   
session_start(); // start session

?>

<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <link rel="stylesheet" type="text/css" href="shopping-cart.css">

</head>
<body>


<div class="container">
  <div class="heading">
    <h1>
      <span class="shopper"></span> Shopping Cart
    </h1>
    
    <a href="#" class="visibility-cart transition is-open">X</a>    
  </div>
  
  <div class="cart transition is-open">

      <form action="update-cart.php" method="post"> <!-- form sends to update cart page to handle update cart done from shopping cart page --> 
    <input type="submit"  value="update cart">
    
    <!--<a href="#" class="btn btn-update">Update cart</a>-->
    <a></a>
    <a href="empty-cart.php" class="btn btn-update" style="margin-right: 5px;">Empty cart</a>


    
    
    <div class="table">
      
      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center "> 
          Price
        </div>
        <div class="col col-qty align-center">QTY</div>
        <!--<div class="col">VAT</div>-->
        <div class="col">Total</div>
      </div>

<?php if(isset($_SESSION['cart'])): ?> <!-- checks if session is set -->
<?php $total=0  ;?> <!-- defines total variable to calculate total--> 
<?php  foreach($_SESSION['cart'] as $option): ?>  <!-- loop thru cart session to display products in cart -->
      <div class="layout-inline row">
<!-- echo products in cart -->
        <div class="col col-pro layout-inline">
          <img src="<?php echo $option['image']; ?>" alt="itemImage" />
          <p><?php   echo $option['name']; ?></p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>$<?php  echo $option['price'] ; ?></p>
        </div>


        <?php $name=$option['quantity']; ?>
        <div class="col col-qty layout-inline">
         <!-- <a href="#" class="qty qty-minus">-</a> -->
            <input type="hidden" name="id[]" id="id"  value="<?php echo $option['id'] ?>" />
            <input type="numeric"   name="quantity[]" id="quan" value="<?php echo $option['quantity']; ?>" />
          <!-- <a href="#" onclick="increase('<?php echo $option['id']; ?>','<?php echo $option['quantity'] ?>')" class="qty qty-plus">+</a>--> 
         <!-- <button onclick="increase('<?php //echo $option['id']; ?>','<?php //echo $option['quantity'] ?>')" class="qty qty-plus">+</button>-->

         
        </div>
        
        <!--<div class="col col-vat col-numeric">
          <p>£2.95</p>
        </div>-->
        <div class="col col-total col-numeric"> <p> $<?php  echo $option['price']*$option['quantity'] ; ?></p>
          <?php $total +=  $option['price']*$option['quantity'] ;?>
        </div>
      </div>
          
<?php  endforeach;?> 
<?php endif;?>

</form>

       <div class="tf">
         <div class="row layout-inline">
           <div class="col">
             <!--<p>Tax</p>-->
           </div>
           <div class="col"></div>
         </div>
         <div class="row layout-inline">
           <div class="col">
            <!-- <p>Shipping</p> -->
           </div>
           <div class="col"></div>
         </div>
          <div class="row layout-inline">
           <div class="col">
             <p>Total</p>
           </div>
           <div class="col col-total col-numeric"><?php if(!empty($total)) echo '<h2 style="color:#3b303d;">'.'$'.$total.'</h2>'; ?></div>
         </div>
       </div>         
  </div>


     
</div>

<script src="shopping-cart.js"></script>



</script>
</body>
</html>