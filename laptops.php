<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laptops</title>
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
			<h2 class="text-center">Our best laptops</h2>
	            <?php
					$user_id = $_SESSION['user_id'];
				
					$sql = "SELECT id, ime, cena FROM laptops";
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
								if ($field == "cena"){
									echo "<td> $" . $value . "</td>";	
								}
								else{
					        	echo "<td>" . $value . "</td>";	
								}
					        } 
					    }

					   	$cart_add = "cart_add.php?laptopID=" . $row["id"];
						$cart_remove = "cart_remove.php?laptopID=" . $row["id"];
						
						$preview = "preview_laptop.php?laptopID=" . $row["id"];	
						echo "<td><a href='{$preview}' class='btn btn-success'>Preview</a>";
						
						
						$queryExist = "SELECT user_id FROM cart WHERE laptop_id = '{$row['id']}' and user_id ='$user_id' ";
						$resultExist = mysqli_query($conn, $queryExist);
						$count = mysqli_num_rows($resultExist);
						if ($count > 0){
							echo "<td><a href='{$cart_remove}' class='btn btn-info'>Remove from cart</a></td>";
						}
						else{
							echo "<td><a href='{$cart_add}' class='btn btn-success'>Add to cart</a></td>";
						}
								
					
						
					    if($_SESSION['admin'] == 1) {
							$delete = "delete_laptop.php?laptopID=" . $row["id"];
						    echo "<td>
						    		<a href='{$delete}' class='btn btn-danger'>Delete!</a>
						    	</td>";
					    }
						echo "</tr>";
					}
					echo "</table>";
				?>
		</div>
		<?php
		include 'reklame.php';
		include 'includes/footer.php';
		?> 
	</body>
</html>