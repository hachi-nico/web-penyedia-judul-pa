<?php

	include_once("db.php");

	$id = $_GET["id"];
	$sql = "SELECT * FROM data_pa WHERE id=$id";
	$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Abstrak</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="dist/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
	<link rel="shortcut icon" href="dist/images/logo.svg">
</head>
<body style="background-color: #1F2229;">
	<?php include_once("assets/abstrakPageNavbar.html"); ?>
	<div class="container mt-5">
		<div class="card mb-5">
			<div class="card-body">
                <?php while($data = mysqli_fetch_array($result)) : ?>
					<p class="mb-0">Judul: <?= $data["judul"]; ?></p>
					<p class="mb-0">Topik: <?= $data["topik"]; ?></p>
					<hr>
					<p class="mb-0">Abstrak:</p>
					<p class="mb-0"><?= $data["abstrak"]; ?></p>
                <?php endwhile; ?>
				<a href="mainPage.php" class="button button-primary mt-5">Kembali</a>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>