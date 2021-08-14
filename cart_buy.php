<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add to cart</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            include("includes/auth.php");
            include("includes/db.php");
            require('includes/header.php');	
        ?>
<div class="row justify-content-md-center">
            <div class="col-md-8">
                <?php
                    if(isset($_GET['laptopID'])!="") {
                        $laptop_id = $_GET['laptopID'];
                        $user_id = $_SESSION['user_id'];

                        $queryExist = "SELECT * FROM cart WHERE user_id='$user_id' and laptop_id='$laptop_id'";
                        $resultExist = mysqli_query($conn, $queryExist);
                        $query = "INSERT INTO sold (user_id, laptop_id) Values ('$user_id', '$laptop_id')";
                        $result = mysqli_query($conn, $query);
                        if($result) {
                            echo "<div class='alert alert-success'>You just bought yourself a laptop! Congratz!</div>";
							$query = "DELETE FROM cart WHERE laptop_id='{$laptop_id}' AND user_id='{$_SESSION['user_id']}'";
							$result = mysqli_query($conn, $query);
                        } else {
								echo "<div class='alert alert-warning'>Error</div>";
                            }  
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