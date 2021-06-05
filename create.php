<?php
    
	include_once("db.php");

	if(isset($_POST['submit'])) {        		
		$judul = $_POST['judul'];
		$topik = $_POST['topik'];
		$abstrak = $_POST['abstrak'];								
						
		$sql = "INSERT INTO data_pa (topik, judul, abstrak) VALUES ('$topik', '$judul', '$abstrak')";
        $result = mysqli_query($conn, $sql);
						
        if($result) {            
            echo("<script>
				alert('berhasil menambahkan data');
				document.location.href = 'index.php';
			  	</script>");
        } else {            
            echo("<script>
				alert('gagal menambahkan data');
				document.location.href = 'index.php';
			  	</script>");
        }

    }

?>

<html>
<head>
	<title>Create</title>
    <link rel="stylesheet" href="assets/style.css">
	<?php include_once("assets/bootstrap/bootstrapCss.html"); ?>
</head>
<body class="bg-primary">
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
						<textarea id="abstrak" name="abstrak" cols="50" rows="7" class="form-control">							
						</textarea>
					</div>												
					<input type="submit" name="submit" value="Tambahkan" class="btn btn-primary">							
				</form>
				<a href="index.php" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>		
	<?php include_once("assets/bootstrap/bootstrapJs.html"); ?>   
</body>
</html>

 