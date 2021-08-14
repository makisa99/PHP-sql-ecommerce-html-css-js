<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            include("includes/auth.php");
            include("includes/db.php");
            require('includes/header.php'); 
        ?>

                <div class="form" style="width: 60rem; margin: 0 auto;">
                    <?php
                        if(isset($_GET['laptopID'])!="") {
                            $laptopID = $_GET['laptopID'];

                            $query = "SELECT * FROM laptops WHERE id='{$laptopID}'";
                            $result = mysqli_query($conn, $query);
                            $rowsingle = mysqli_fetch_array($result);

                            $slika = $rowsingle["pic_url"];
                            echo "<h2 class='card-title'>" . $rowsingle["ime"] . "</h2>";
                            echo "<img class='card-img-top' src='{$slika}' />";
                            echo "<h3>" . $rowsingle["cena"] . "</h3>";
                        } 
                    ?>
        </div>
    </body>
	<?php
		include 'reklame.php';
		include 'includes/footer.php';
		?> 
</html>