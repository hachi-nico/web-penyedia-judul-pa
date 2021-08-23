<?php

	include_once("db.php");
	include_once("sessionControl.php");

	if(isset($_POST["submit"])) {
		$judul = $_POST["judul"];
		$topik = $_POST["topik"];
		$abstrak = $_POST["abstrak"];

		$sql = "INSERT INTO data_pa (topik, judul, abstrak) VALUES ('$topik', '$judul', '$abstrak')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "
				<script>
					alert('Berhasil menambahkan data');
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

<html>
<head>
	<title>Create</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="dist/images/logo.svg">
</head>
<body class="bg-dark">
	<?php include_once("assets/navbar.html"); ?>
	<div class="container mt-5">
		<div class="card mb-5">
			<div class="card-body">
				<h1 class="text-center">Tambah Data</h1>
				<form action="" method="post">
					<div class="form-group">
						<label for="topik">Topik</label>
						<input type="text" id="topik" name="topik" class="form-control">
					</div>
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" id="judul" name="judul" class="form-control">
					</div>
					<div class="form-group">
						<label for="abstrak">Abstrak</label>
						<textarea id="abstrak" name="abstrak" cols="50" rows="7" class="form-control"></textarea>
					</div>
					<input type="submit" name="submit" value="Tambahkan" class="btn btn-info mt-2">
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

