<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ko, sta?</title>
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
			<h2 class="text-center">Contact requests</h2>
	            <?php
					$sql = "SELECT id, user_id, problem FROM contact";
					$result = mysqli_query($conn, $sql);
					$rows = mysqli_num_rows($result);
					if($rows == 0){
                            echo "<div class='alert alert-success'>Nothing to show</div>";
                        } else {
					echo "<br>";
					echo "<table id = 'tabela' border='1' class='table table-bordered'>";
					echo "<tr>";
					echo "<th>Email</th>";
					echo "<th>Problem</th>";

					echo "</tr>";
					while ($row = mysqli_fetch_assoc($result)) {	
					    echo "<tr>";
					    foreach ($row as $field => $value) {
					        if ($field == "user_id" || $field == "problem"){
								if (is_numeric($value)){
									$sql2 = "SELECT email FROM users WHERE id = '$value'";
									$result2 = mysqli_query($conn, $sql2);
									$row2 = mysqli_fetch_assoc($result2);
									$value = $row2["email"];
								}
					        	echo "<td>" . $value . "</td>";	
					        } 
					    }	
						    if($_SESSION['admin'] == 1) {
							$delete = "delete_contact.php?contactID=" . $row["id"];
						    echo "<td>
						    		<a href='{$delete}' class='btn btn-success'>Solved</a>
						    	</td>";
					    }
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