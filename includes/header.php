<header class="text-center mt-3 mb-5">
	<a href="index.php" class="btn btn-secondary">Pocetna</a>
    <a href="laptops.php" class="btn btn-secondary">Laptops</a>
	<a href="search.php" class="btn btn-secondary">Search</a>
	<a href="cart.php" class="btn btn-secondary">Cart</a>
	<a href="contact.php" class="btn btn-secondary">Contact</a>
    <a href="includes/logout.php" class="btn btn-warning">Logout</a>
	<?php 
		if($_SESSION['admin'] == 1) {
							echo '<a href="kosta.php" class="btn btn-warning">Ko sta?</a>';
							echo '<a href="sold.php" class="btn btn-success">Sold</a>';
		}
	?>
</header>