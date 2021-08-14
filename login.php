<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
	</head>
	<body>
	<?php
		require('includes/db.php');
		session_start();
		
		if (isset($_POST['submit'])){
			$email = mysqli_real_escape_string($conn, stripslashes($_REQUEST['email']));
			$password = mysqli_real_escape_string($conn, stripslashes($_REQUEST['password']));
			$query = "SELECT * FROM users WHERE email='$email' and sifra='".md5($password)."'";
			$result = mysqli_query($conn, $query);
			$rows = mysqli_num_rows($result);
			if($rows == 1){
			
		        	$rowsingle = mysqli_fetch_array($result, MYSQLI_ASSOC);
			    	$_SESSION['email'] = $email;
			    	$_SESSION['user_id'] = $rowsingle['id'];
			    	$_SESSION['admin'] = (int) $rowsingle['admin'];
			    	header("Location: index.php");
		        } else {
					echo "<div class='form'>
					<h3>Login failed</h3>
					<br/><a href='login.php'>Click here to try again</a></div>";
				}
			} else {
	?>
<div class="containeeer">
		<span class="text1">Welcome</span>
		<span class="text2">Mario Ferketić 3599</span>
	</div>
		<div class="form">
			<h1>Ulogujte se</h1><br>
			<form method="post" name="login">
				<input type="text" name="email" placeholder="Email" required/><br><br>
				<input type="password" name="password" placeholder="Password" required/><br><br>
				<button type="submit" name="submit">Login</button>
			</form><br>
			<p>Not registered yet? <a href='register.php'>Register here</a></p>
		</div>
		<?php } ?>
		<?php include 'includes/footer.php';?> 
	</body>
</html>