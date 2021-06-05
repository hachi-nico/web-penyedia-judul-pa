<?php

    include_once("db.php");

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user where nama = '$nama'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);

        if($result) {
            if(password_verify($password, $data['password'])) {
                echo("<script>
				alert('berhasil login');
				document.location.href = 'index.php';
			  	</script>");
            }            
        } else {            
            echo("<script>
				alert('gagal');				
			  	</script>" . mysqli_error($conn));
        }
    }

?>

<html>
<head>
	<title>Login Admin</title>
	<?php include_once("assets/bootstrap/bootstrapCss.html"); ?>
</head>
<body class="bg-primary">	
	<div class="container mt-5">
		<div class="card mb-5">
			<div class="card-body">				
				<h1 class="text-center">Login Admin</h1>				
				<form action="" method="post">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" id="nama" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control">
					</div>					
					<input type="submit" name="submit" value="Tambahkan" class="btn btn-primary">							
				</form>				
			</div>
		</div>
	</div>		
	<?php include_once("assets/bootstrap/bootstrapJs.html"); ?>   
</body>
</html>