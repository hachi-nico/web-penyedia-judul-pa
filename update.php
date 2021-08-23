<?php

	include_once("db.php");
	include_once("sessionControl.php");

	if(isset($_POST["update"])) {
		$id = $_POST["id"];
		$topik = $_POST["topik"];
		$judul = $_POST["judul"];
		$abstrak = $_POST["abstrak"];

		$sql = "UPDATE data_pa SET topik ='$topik', judul='$judul', abstrak='$abstrak' WHERE id=$id";
		$result = mysqli_query($conn, $sql);

		if($result) {
			echo "
				<script>
					alert('Berhasil update data');
					document.location.href = 'admin.php';
				</script>";
		} else {
			echo "
				<script>
					alert('Terjadi kesalahan server');
				</script>";
		}
	}

?>

<?php

	$queryId = $_GET["id"];
	$querySql = "SELECT * FROM data_pa WHERE id=$queryId";
	$queryResult = mysqli_query($conn, $querySql);

?>

<html>
<head>
	<title>Edit</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
	<link rel="shortcut icon" href="dist/images/logo.svg">
</head>
<body class="bg-dark">
	<?php include_once("assets/navbar.html"); ?>
	<div class="container mt-5">
		<div class="card mb-5">
			<div class="card-body">
				<h1 class="text-center">Edit Data</h1>
				<form method="post" action="">
					<?php while($data = mysqli_fetch_array($queryResult)) : ?>
						<div class="form-group">
							<label for="topik">Topik</label>
							<input type="text" name="topik" value="<?= $data["topik"]; ?>" id="topik" class="form-control">
						</div>
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" name="judul" value="<?= $data["judul"]; ?>" id="judul" class="form-control">
						</div>
						<div class="form-group">
							<label for="abstrak">Abstrak</label>
							<textarea id="abstrak" name="abstrak" cols="50" rows="7" class="form-control"><?= $data["abstrak"]; ?></textarea>
						</div>
					<?php endwhile; ?>
						<input type="hidden" name="id" value=<?= $_GET["id"]; ?>>
						<input type="submit" name="update" value="Update" class="btn btn-primary mt-2">
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>