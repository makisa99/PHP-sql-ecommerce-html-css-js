<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delete laptop</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    </head>
    <body>
        <?php
            include("includes/auth.php");
            include("includes/db.php");
            require('includes/header.php');

            if(isset($_GET['laptopID'])!="") {
                $laptopID = $_GET['laptopID'];
                $query = "DELETE FROM laptops WHERE id='{$laptopID}'";
                $result = mysqli_query($conn, $query);
                if($result){
                    echo "<div class='alert alert-success'>Laptop deleted successfully</div>";
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