<?php include "db.php" ?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="/product-page.css" rel="stylesheet">


</head>

<body>
<div class="container">
<div class="col-xs-12 col-md-6">
	<!-- First product column box start here-->
	<?php  while($row = $resultEven->fetch_assoc()):?> <!-- loop thru tags to echo products col from database-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="<?php echo $row['image']; ?>" class="img-responsive"> 
						<span class="tag2 hot">
							HOT
						</span> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?php echo $row['name']; ?>  <!-- product name --> 
							 
							</a>
							<a href="#">
								<span><?php echo  $row['category']; ?></span> <!-- product category --> 
								
							</a>                            

						</h5>
						<p class="price-container">
							<span>$<?php echo $row['price'] ?></span>   <!-- Price -->
							
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p><?php echo $row['shortdesc'] ?> </p> <!-- short description -->
					
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12"> 


							<form action="<?php echo htmlspecialchars('/db.php') ?>" method="post"> 

								  <input type="hidden"  id="id" name="id" value="<?php echo $row['id']; ?>"><br><br>

								 

								  <input type="submit" class="btn btn-info" value="Add to cart">
								 
								  <a href="javascript:void(0);" class="btn btn-info">More info</a>

							</form>

                            
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->

<?php endwhile; ?>   <!-- first column loop ends here -->

</div>
<div class="col-xs-12 col-md-6">
<!-- Second product column box start here-->
<?php  while($row = $resultOdd->fetch_assoc()):?> <!-- loop thru tags to echo products col from database-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="<?php echo $row['image']; ?>" alt="194x228" class="img-responsive"> 
						<span class="tag3 special">
							Special
						</span> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?php echo $row['name']; ?> <span><?php echo  $row['category']; ?></span>
							</a>
						</h5>
						<p class="price-container">
							<span>$<?php echo $row['price'] ?></span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p><?php echo $row['shortdesc'] ?></p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12"> 
			    <form action="<?php echo htmlspecialchars('/db.php') ?>" method="post"> 

	               <input type="hidden"  id="id" name="id" value="<?php echo $row['id']; ?>"><br><br>

                            <input type="submit" class="btn btn-info" value="Add to cart">
								 
                            <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>

				</form>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->

<?php endwhile; ?> <!-- second products column end loop here -->
</div>




        
</div>
</div>
</body>
</html>

