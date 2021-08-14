<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
	</head>
	<body>
		<?php
		require ('includes/db.php');
		
		if (isset($_REQUEST['submit'])){
			$name = mysqli_real_escape_string($conn, stripslashes($_REQUEST['name']));
            $email = mysqli_real_escape_string($conn, stripslashes($_REQUEST['email']));
            $password = mysqli_real_escape_string($conn, stripslashes($_REQUEST['password']));	
			$query = "INSERT INTO users (ime, email, sifra) VALUES ('$name', '$email', '".md5($password)."')";
			$result = mysqli_query($conn,$query);
			if($result){
				echo "<div class='form'>
				<h3>Successfully registered.</h3><br/>
                <a href='login.php'>Login</a>
                </div>";
		}
		else{
			echo "Registration failed";
		}
		} else{
		?>
                <div class="form">
				<h2>Register</h2>
				<form name = "registration" method = "post">
					<input type="text" name="name" placeholder="Name" required/><br><br>
					<input type="email" name="email" placeholder="Email" required/><br><br>
					<input type="password" name="password" placeholder="Password" required/><br><br>
					<button type="submit" name="submit">Register</button> 
				</form>
			</div>
		</div>
		<?php } ?>
		<?php include 'includes/footer.php';?> 
	</body>
</html>