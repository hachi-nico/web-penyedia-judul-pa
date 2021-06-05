<?php

	include_once("db.php");
	
	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$topik = $_POST['topik'];
		$judul = $_POST['judul'];
		$abstrak = $_POST['abstrak'];	
		
		$sql = "UPDATE data_pa SET topik ='$topik', judul='$judul', abstrak='$abstrak' WHERE id=$id";			
		$result = mysqli_query($conn, $sql);
			
		if($result) {
			echo("<script>
					alert('berhasil update data');
					document.location.href = 'index.php';
				</script>");				
		} else {
			echo("<script>
					alert('gagal update data');
					document.location.href = 'index.php';
				</script>");				
		}
	}

?>

<?php

	$queryId = $_GET['id'];
	$querySql = "SELECT * FROM data_pa WHERE id=$queryId";
	$queryResult = mysqli_query($conn, $querySql);

?>

<html>
<head>	
	<title>Update</title>
	<link rel="stylesheet" href="assets/style.css">
	<?php include_once("assets/bootstrap/bootstrapCss.html"); ?>
</head> 
<body class="bg-primary">
	<?php include_once("assets/navbar.html"); ?>    
	<div class="container mt-5">	
		<div class="card mb-5">
			<div class="card-body">
				<h1 class="text-center">Edit Data</h1>					
				<form method="post" action="">		
					<?php while($data = mysqli_fetch_array($queryResult)) : ?>
						<div class="form-group">
							<label for="topik">Topik</label>
							<input type="text" name="topik" value="<?= $data['topik']; ?>" id="topik" class="form-control">
						</div>
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" name="judul" value="<?= $data['judul']; ?>" id="judul" class="form-control">
						</div>
						<div class="form-group">
							<label for="abstrak">Abstrak</label>
							<input type="text" name="abstrak" value="<?= $data['abstrak']; ?>" id="abstrak" class="form-control">	
						</div>																		
					<?php endwhile; ?>
						<input type="hidden" name="id" value=<?= $_GET['id']; ?>>
						<input type="submit" name="update" value="Update" class="btn btn-primary">
				</form>
				<a href="index.php" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>
	<?php include_once("assets/bootstrap/bootstrapJs.html"); ?>
</body>
</html>