<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Remove from cart</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            include("includes/auth.php");
            include("includes/db.php");
            require('includes/header.php');

            if(isset($_GET['laptopID'])!="") {
                $laptop_id = $_GET['laptopID'];

                $query = "DELETE FROM cart WHERE laptop_id='{$laptop_id}' AND user_id='{$_SESSION['user_id']}'";
                $result = mysqli_query($conn, $query);
                if($result){
                    echo "<div class='alert alert-success'>Removed from cart</div>";
                } else {
                    echo "Error";
                }
            } 
        ?>
		<?php
		include 'reklame.php';
		include 'includes/footer.php';
		?> 
    </body>
	
</html>