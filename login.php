<?php

    include_once("db.php");

	session_start();

	if(isset($_SESSION["login"])) {
		header('location: admin.php');
	}

?>

<html>
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/styles.css">
	<link rel="shortcut icon" href="dist/images/logo.svg">
</head>
<body class="bg-dark">
	<div class="container mt-5">
		<div class="card m-auto login-card">
			<div class="card-body">
				<h1 class="text-center">Admin Login</h1>
				<form action="" method="post">
					<div class="form-group">
						<label for="nama">Username</label>
						<input type="text" id="nama" name="nama" class="form-control custom-form">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control login-form">
					</div>
					<input type="submit" name="submit" value="login" class="btn btn-info">
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php

	if(isset($_POST["submit"])) {
		$nama = $_POST["nama"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM user where nama = '$nama'";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($result);

		if($result) {
			if(password_verify($password, $data["password"])) {
				$_SESSION["login"] = true;
				echo "
					<script>
					alert('Login berhasil');
					document.location.href = 'admin.php';
					</script>";
			} else {
			echo "
				<script>
					alert('Login gagal, periksa username dan password');
				</script>";
			}
		} else {
			echo "
				<script>
					alert('Terjadi kesalahan server');
				</script>";
		}
	}

?>