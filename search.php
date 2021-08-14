<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search</title>
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
				<form action="search.php" method = "POST">
				<h3>Search: </p><input type = "text" placeholder ="ex. Asus" name = "inputPrvi" required> 		<button type = "submit">Search</button></h3>
	
			</form>
	            <?php
			if (isset($_POST["inputPrvi"])){
				$nazivNovi = $_POST['inputPrvi'];
				$result = mysqli_query($conn, "SELECT ime, cena FROM laptops WHERE ime LIKE '$nazivNovi%'");
				echo "<br>";
				echo "<table border='1' class='table table-bordered'>";
				echo "<tr>";
				echo "<th>Ime</th>";
                echo "<th>Cena</th>";
                echo "</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
				    echo "<tr>";
				    foreach ($row as $field => $value) {
				        echo "<td>" . $value . "</td>";
				    }
				    echo "</tr>";
				}
				echo "</table>";
				}
				else{
					echo "<div><p>Search through our inventory</p></div>";
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