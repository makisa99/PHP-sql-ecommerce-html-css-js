<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pocetna</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<script>
			$(function(){
			  $('.bxslider').bxSlider({
			    auto: 'true',
			    slideWidth: 800	
			  });
			});
		</script>
    </head>
    <body>
        <?php
            include("includes/auth.php");
            include("includes/db.php");
            require('includes/header.php');

            if (isset($_REQUEST['submit'])){
                $ime = mysqli_real_escape_string($conn, stripslashes($_REQUEST['ime']));
                $cena = mysqli_real_escape_string($conn, stripslashes($_REQUEST['cena'])); 
				$slika = mysqli_real_escape_string($conn, stripslashes($_REQUEST['slika']));
				

                $query = "INSERT INTO laptops (ime, cena, pic_url) VALUES ('$ime', '$cena', '$slika')";
                $result = mysqli_query($conn, $query);
                if($result){
                    echo "<h3 class='text-center'>Laptop added successfully!</h3><br/>";
                } else {
                    echo "Error";
                }
            }
        ?>    
        <?php if($_SESSION['admin'] == 1){ ?>
             <center>   <div class="col-md-2">
                    <h1>Add laptop </h1>
                    <form method="post">
                        <input type="text" name="ime" placeholder="Name" class="form-control" required><br><br>
                        <input type="text" name="cena" placeholder="Price" class="form-control" required><br><br>
						<input type="text" name="slika" placeholder="Pic url" class="form-control" required><br><br>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </form>
                </div> </center>
        <?php } else { ?> 
		 <section class="main">
				<?php include 'includes/slider.php';?>
		</section>
        <?php } ?>
		<?php
		include 'reklame.php';
		include 'includes/footer.php';
		?> 
    </body>
</html>