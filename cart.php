<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cart</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    </head>
    <body>
        <?php
            include("includes/auth.php");
            include("includes/db.php");
            require('includes/header.php');
        ?>
            	
				<div class="row justify-content-md-center">
            <div class="col-md-8">
			<h2 class="text-center">Shopping cart</h2>
	            <?php
					$user_id = $_SESSION['user_id'];
					$sql = "SELECT laptop_id FROM cart WHERE user_id = '$user_id'";
					$result = mysqli_query($conn, $sql);
					$rows = mysqli_num_rows($result);
					if($rows == 0){ ?>
                            <div style = "margin-left:10%;margin-right:10%;"><h2><a href='laptops.php'>Your shopping cart is empty! Click here to browse our inventory!</a></h2></div>
							<?php
                        } else {
				$j_ids[] = array();
				while($row = mysqli_fetch_array($result)){
					array_push($j_ids, $row['laptop_id']);
				}

				$ids = join(',', array_map('intval', $j_ids));

				$sql = "SELECT * FROM laptops WHERE id IN ($ids)";
				$result = mysqli_query($conn, $sql);
				echo "<br>";
					echo "<table border='1' class='table table-bordered'>";
					echo "<tr>";
					echo "<th>Ime</th>";
					echo "<th>Cena</th>";

					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					    foreach ($row as $field => $value) {
					        if ($field == "ime" || $field == "cena"){
					        	echo "<td>" . $value . "</td>";	
					        } 
					    }
						
						$preview = "preview_laptop.php?laptopID=" . $row["id"];	
						echo "<td><a href='{$preview}' class='btn btn-success'>Preview</a>";
						
						$cart_remove = "cart_remove.php?laptopID=" . $row["id"];
						echo "<td><a href='{$cart_remove}' class='btn btn-info'>Remove from cart</a></td>";
						
						$cart_buy = "cart_buy.php?laptopID=" . $row["id"];
						echo "<td><a href='{$cart_buy}' class='btn btn-success'>BUY!</a></td>";
						
						echo "</tr>";
					}
					echo "</table>";
					}
					
				?>
			</div>
		</div>
		<?php
		include 'reklame.php';
		include 'includes/footer.php';
		?> 
	</body>
</html>