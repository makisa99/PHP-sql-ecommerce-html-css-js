<div class="reklame-box">
	<h2>Najnoviji<font color="red"> ASUS ROG</font></h2>
	<h3>Samo <font color="green"> $998</font></h3>
	<?php
		//include("includes/auth.php");
       //     include("includes/db.php");
		$user_id = $_SESSION['user_id'];
				

		$cart_add = "cart_add.php?laptopID=15";
		$cart_buy = "cart_buy.php?laptopID=15";
		$preview = "preview_laptop.php?laptopID=15";	
						
						
								
		$queryExist = "SELECT user_id FROM cart WHERE laptop_id = 15 and user_id ='$user_id' ";
		$resultExist = mysqli_query($conn, $queryExist);
		$count = mysqli_num_rows($resultExist);
		if ($count > 0){
			echo "<a href='{$cart_buy}' class='btn btn-success'>BUY!</a>";
		}
			else{
			echo "<a href='{$preview}' class='btn btn-primary'>Preview</a> ";
				echo "<a href='{$cart_add}' class='btn btn-success'>Add to cart</a>";
				} 
	?>
</div>
