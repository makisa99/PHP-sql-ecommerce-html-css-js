<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    </head>
    <body>
	<?php
		include("includes/auth.php");
        include("includes/db.php");
        require('includes/header.php');

            if (isset($_REQUEST['submit'])){
                $desc = mysqli_real_escape_string($conn, stripslashes($_REQUEST['desc']));
				$user_id = $_SESSION['user_id'];
                $query = "INSERT INTO contact (user_id, problem) VALUES ('$user_id', '$desc')";
                $result = mysqli_query($conn, $query);
                if($result){
                    echo "<h3 class='text-center' style = 'color: white;'>Expect answer in couple minutes!</h3><br/>";
                } else {
                    echo "Error";
                }
            }else{
         ?>
		<div style = "margin-left:10%;margin-right:10%;">
			<form method="post">
				<textarea class="form-control" rows="5" name="desc" placeholder = "Ovde kucajte text..." required></textarea>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<?php } ?>
		<?php
		include 'reklame.php';
		include 'includes/footer.php';
		?>  
	</body>
</html>